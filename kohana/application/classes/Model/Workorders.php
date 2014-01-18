<?php defined('SYSPATH') or die('No direct script access.');

class Model_Workorders extends Model_Base {
    
    protected $_users_model = null;

    public function __construct() {
    	parent::__construct();

        $this->_users_model = Model::factory('users');
    }



    public function get_price($price_id = null) {
    	if ($price_id === null) {
            $price_id = 10;
    	}

    	return DB::query(Database::SELECT, "SELECT * FROM settings WHERE id = :price_id")
    	           ->parameters(array(':price_id' => $price_id))
    	           ->as_object()
    	           ->execute($this->db)
    	           ->current();
    }



    public function validate_workorder($post) {
        $valid_post = Validation::factory($post);

        $valid_post->rule('policy_number', 'not_empty')
                   ->rule('first_name', 'not_empty')
                   ->rule('last_name', 'not_empty')
                   ->rule('street_address', 'not_empty')
                   ->rule('city', 'not_empty')
                   ->rule('state', 'not_empty')
                   ->rule('zip', 'not_empty')
                   ->rule('zip', 'Valid::digit')
                   ->rule('phone', 'not_empty')
                   ->rule('phone', 'Valid::phone')
                   ->rule('phone2', 'Valid::phone');

        return $valid_post->check() ? array('error' => false) : array('error'  => true,
        	                                                          'errors' => $valid_post->errors('default'));
    }



    /** 
     * Add a work order to the database. 
     *
     * @param array $post
     */
    public function add_workorder($post) {
        print_r($post);
        $parameters = array(':id'                         => null,
                            ':type'                       => $post['type'],
                            ':user_id'                    => $post['user_id'],
                            ':policy_number'              => $post['policy_number'],
                            ':first_name'                 => $post['first_name'],
                            ':last_name'                  => $post['last_name'],
                            ':street_address'             => $post['street_address'],
                            ':city'                       => $post['city'],
                            ':state'                      => $post['state'],
                            ':zip'                        => $post['zip'],
                            ':phone'                      => $post['phone'],
                            ':phone2'                     => $post['phone2'],
                            ':created_on_utc'             => date('Y-m-d h:i:s'),
                            ':is_expert'                  => isset($post['is_expert']) ? true : false,
                            ':damage_type'                => null,
                            ':date_of_loss'               => null,
                            ':tarped'                     => $post['tarped'],
                            ':estimate_scope_requirement' => $post['estimate_scope_requirement'],
                            ':special_instructions'       => $post['special_instructions'],
                            ':status'                     => 1,
                            ':inspector_id'               => null,
                            ':inspection_status'          => 1,
                            ':inspection_type'            => null,
                            ':date_of_inspection'         => null,
                            ':time_of_inspection'         => null,
                            ':price'                      => !isset($post['price']) ? $this->_get_price($post['type']) : $post['price'],
                            ':is_generated_pdf'           => null,
                            ':last_generated'             => null, 
                            ':generate_report_status'     => null,
                            ':comments'                   => null,
                            ':commenter_id'               => null);

        $lat_long = $this->_generate_lat_long($post);
        $parameters[':latitude'] = $lat_long['lat'];
        $parameters[':longtitude'] = $lat_long['lng'];

        try {
            DB::insert('work_orders')->values(array_keys($parameters))
                ->parameters($parameters)
                ->execute($this->db);
            return array('status' => true);
        } catch (Database_Exception $e) {
            return array('status' => false, 'error' => $e->message);
        }
    }


    private function _get_price($type) {
        return DB::query(Database::SELECT, "SELECT value FROM settings WHERE name LIKE '%price_" . $type . "%'")->as_object()->execute($this->db)->current()->value;
    }



    private function _generate_lat_long($post) {
        $url = "http://maps.googleapis.com/maps/api/geocode/json?address=" . str_replace(' ', '+', $post['street_address']) . "+" . $post['city'] . "+" . $post['state'] . "+" . $post['zip'] . "&sensor=true";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = json_decode(curl_exec($ch), true);

        if ($response['status'] === 'ZERO_RESULTS') {
            return array('lat' => 0, 'lng' => 0);
        }

        return $response['results'][0]['geometry']['location'];
    }



    public function edit_workorder($post, $workorder_id) {
        $parameters = array(':id'                         => $workorder_id,
                            ':type'                       => $post['type'],
                            ':user_id'                    => $post['user_id'],
                            ':policy_number'              => $post['policy_number'],
                            ':first_name'                 => $post['first_name'],
                            ':last_name'                  => $post['last_name'],
                            ':street_address'             => $post['street_address'],
                            ':city'                       => $post['city'],
                            ':state'                      => $post['state'],
                            ':zip'                        => $post['zip'],
                            ':phone'                      => $post['phone'],
                            ':phone2'                     => $post['phone2'],
                            ':is_expert'                  => isset($post['is_expert']) ? true : false,
                            ':damage_type'                => $post['damage_type'],
                            ':date_of_loss'               => $post['date_of_loss'],
                            ':tarped'                     => $post['tarped'],
                            ':estimate_scope_requirement' => $post['estimate_scope_requirement'],
                            ':special_instructions'       => $post['special_instructions'],
                            ':price'                      => $post['price']);

        $values = array();
        foreach($parameters as $parameter => $value) {
            $values[str_replace(':', '', $parameter)] = $parameter; 
        }

        unset($values['id']);

        try {
            DB::update('work_orders')->set($values)->where('id', '=', ':id')
                ->parameters($parameters)
                ->execute($this->db);
            return array('status' => true);
        } catch (Exception $e) {
            return array('status' => false, 'error' => $e->message);
        }
    }


    /**
    * Obtain comments for specific workorder
    * 
    * @param int $workorder_id
    */

    public function get_workorder_comments($workorder_id){
            $result = DB::query(Database::SELECT, "SELECT work_order_id,date_time_utc, message, username FROM 
                messages AS t1 INNER JOIN users AS t2 ON t1.from_id = t2.id WHERE work_order_id =".$workorder_id)
                       ->as_object()
                       ->execute($this->db);
            return $result;

    }


 /**
    * add comment for specific workorder
    * 
    * @param int $workorder_id
    */

    public function add_comment($post, $workorder_id, $id){
        date_default_timezone_set("UTC");
        echo $workorder_id;
        echo $id;
              $parameters = array(':id' => null,
                            ':work_order_id' => $workorder_id,
                            ':date_time_utc' => date("Y-m-d H:i:s", time()),
                            ':from_id' => $id,    
                            ':to_id' =>null,
                            ':type' => null,
                            ':subject' =>null,
                            ':message' =>  $post['message'],
                            ':status' => null
                            );
         DB::insert('messages')
                ->values(array_keys($parameters))
                ->parameters($parameters)
                ->execute($this->db);

    }


    /**
     * Set workorder status
     *
     * @param  array $post
     * @param  int   $workorder_id
     * @return boolean
     */
    public function set_workorder_status($post, $workorder_id) {
        $hour = $post['hour_of_inspection'] < 10 ? '0' . $post['hour_of_inspection'] : $post['hour_of_inspection'];
        $min = $post['min_of_inspection'] < 10 ? '0' . $post['min_of_inspection'] : $post['min_of_inspection'];
        $parameters = array(':id'                 => $workorder_id,
                            ':status'             => $post['status'],
                            ':date_of_inspection' => date('Y-m-d', strtotime(str_replace('-', '/', $post['date_of_inspection']))),
                            ':time_of_inspection' => $hour . ':' . $min,
                            ':inspector_id'       => $post['inspector_id']);

        $values = array();
        foreach($parameters as $key => $value) {
            $values[str_replace(':', '', $key)] = $key;
        }

        try {
            $status = DB::update('work_orders')->set($values)->where('id', '=', ':id')
                ->parameters($parameters)
                ->execute($this->db);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }


    
    /**
     * Set workorder inspection status
     *
     * @param  array $post
     * @param  int   $workorder_id
     * @return boolean
     */
    public function set_workorder_inspection_status($post, $workorder_id) {
        $parameters = array(':id' => $workorder_id,
                            ':inspection_status' => $post['inspection_status']);
        $values = array();
        foreach($parameters as $key => $value) { $values[str_replace(':', '', $key)] = $key; }

        try {
            DB::update('work_orders')->set($values)->where('id', '=', ':id')
                ->parameters($parameters)
                ->execute($this->db);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }



    /**
     * Get workorder details
     *
     * @param int $workorder_id
     */
    public function get_workorder_details($workorder_id) {
    	return DB::query(Database::SELECT, "SELECT wo.*, wos.name as work_order_status, _is.name as _inspection_status,
    	                                           u.username, CONCAT(wo.first_name, ' ', wo.last_name) as insured,
                                                   CONCAT(wo.city, ', ', wo.state, ' ', wo.zip) as second_address,
                                                   CONCAT(p.first_name, ' ', p.last_name) as adjuster, 
                                                   u2.email as adjuster_email
    		                                FROM work_orders wo
    		                                LEFT JOIN work_order_statuses wos ON wos.id = wo.status
    		                                LEFT JOIN inspection_statuses _is ON _is.id = wo.inspection_status
    		                                LEFT JOIN users u ON u.id = inspector_id
                                            LEFT JOIN users u2 ON u2.id = wo.user_id
                                            LEFT JOIN profiles p ON p.user_id = u2.id
    		                                WHERE wo.id = :workorder_id")
    	           ->parameters(array(':workorder_id' => $workorder_id))
    	           ->as_object()
    	           ->execute($this->db)
    	           ->current(); // Returns the current row, should only have one row.
    }



    /**
     * Return the work order statuses available
     * 
     * @return array
     */
    public function get_workorder_statuses() {
    	$results = DB::query(Database::SELECT, "SELECT * FROM work_order_statuses")
    	               ->as_object()
    	               ->execute($this->db);

    	$statuses = array();
    	foreach($results as $result) {
    		$statuses[$result->id] = $result->name;
    	}

    	return $statuses;
    }



    public function get_inspection_statuses() {
    	$results = DB::query(Database::SELECT, "SELECT * FROM inspection_statuses")
    	               ->as_object()
    	               ->execute($this->db);
    	$inspection_statuses = array();
    	foreach($results as $result) {
    		$inspection_statuses[$result->id] = $result->name;
    	}

    	return $inspection_statuses;
    }


 
    /**
     * Return all the hours possible, 24 hr format
     *
     * @return array
     */
    public function get_workorder_hours() {
    	$hours = array();
        for($i = 0; $i < 24; $i++) {
        	if ($i < 10) {
        		$hours[$i] = '0' . $i;
        	} else {
        		$hours[$i] = $i;
        	}
        }

        return $hours;
    }



    /**
     * Return all the minutes
     *
     * @return array
     */
    public function get_workorder_minutes() {
    	$minutes = array();
        for($i = 0; $i < 60; $i++) {
        	if ($i < 10) {
        		$minutes[$i] = '0' . $i;
        	} else {
        		$minutes[$i] = $i;
        	}
        }

        return $minutes;
    }



    public function get_inspectors() {
    	$inspectors = array('' => '--Select Inspector');
    	$results = DB::query(Database::SELECT, "SELECT u.username, u.id
    		                                    FROM users u 
                                                LEFT JOIN roles_users ru ON ru.user_id = u.id
    		                                    WHERE ru.role_id = " . Model_Account::INSPECTOR)
    	               ->as_object()
    	               ->execute($this->db);

    	foreach($results as $result) {
    		$inspectors[$result->id] = $result->username;
    	}

    	return $inspectors;
    }



    public function send_submission_emails($user_id, $user_type, $mailer) {
        $user = $this->_users_model->get_user($user_id);

        switch ($user_type) {
            case Model_Account::CLIENT : 
                $this->_send_submit_client_email($user, $mailer);
                $this->_send_submit_admins_email($user, $mailer);
                break;
            case Model_Account::ADMIN : 
                $this->_send_submitted_by_admin_email($user, $mailer);
                break;
        }
    }



    public function send_notice_to_inspector($post, $mailer) {
        $user = $this->_users_model->get_user($post['inspector_id']);
        try {
            $mailer->send_mail($user->email, 'a.frye4@gmail.com', 'You have been assigned to an inspection',
                               19, array('::name::' => $user->first_name), null, null, null);
        } catch (Exception $e) {
            throw new Exception ("Error sending email. Please contact website administrator.");
        }
    }



    private function _send_submit_client_email($user, $mailer) {
        try {
            $mailer->send_mail($user->email, 'a.frye4@gmail.com', 'Recent Work Order Submission.',
                               2, array('::name::' => $user->first_name), null, null, null);
        } catch (Exception $e) {
            throw new Exception ("Error sending email. Please contact website administrator.");
        }
    }



    private function _send_submit_admins_email($user, $mailer) {
        $admins = $this->_get_admins();

        foreach ($admins as $admin) {
            try {
                $mailer->send_mail($admin->email, 'a.frye4@gmail.com', 'Recent Work Order Submission.',
                                   3, array('::username::' => $admin->username,
                                            '::first_name::' => $user->first_name,
                                            '::last_name::'  => $user->last_name), null, null, null);
            } catch (Exception $e) {
                throw new Exception ("Error sending email. Please contact website administrator.");
            }
        }
    }



    private function _send_submitted_by_admin_email($user, $mailer) {
        try {
            $mailer->send_mail($user->email, 'a.frye4@gmail.com', 'Recent Work Order Submission.',
                               4, array('::username::' => $user->first_name), null, null, null);
        } catch (Exception $e) {
            throw new Exception ("Error sending email. Please contact website administrator.");
        }
    }



    private function _get_admins() {
        return DB::query(Database::SELECT, "SELECT username, email 
                                            FROM users u 
                                            LEFT JOIN roles_users ru ON u.id = ru.role_id 
                                            WHERE ru.role_id = :role_id 
                                            ORDER BY id 
                                            LIMIT 1")
                                   ->parameters(array(':role_id' => Model_Account::ADMIN))
                                   ->as_object()
                                   ->execute($this->db);
    }
}


