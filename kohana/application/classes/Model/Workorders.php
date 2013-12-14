<?php defined('SYSPATH') or die('No direct script access.');

class Model_Workorders extends Model_Base {
    
    public function __construct() {
    	parent::__construct();
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
                            ':damage_type'                => $post['damage_type'],
                            ':date_of_loss'               => $post['date_of_loss'],
                            ':tarped'                     => $post['tarped'],
                            ':estimate_scope_requirement' => $post['estimate_scope_requirement'],
                            ':special_instructions'       => $post['special_instructions'],
                            ':status'                     => 1,
                            ':inspector_id'               => null,
                            ':inspection_status'          => 1,
                            ':date_of_inspection'         => null,
                            ':time_of_inspection'         => null,
                            ':price'                      => $post['price'],
                            ':is_generated_pdf'           => null,
                            ':last_generated'             => null, 
                            ':generate_report_status'     => null,
                            ':comments'                   => null,
                            ':commenter_id'               => null);


        try {
            DB::insert('work_orders')->values(array_keys($parameters))
                ->parameters($parameters)
                ->execute($this->db);
            return array('status' => true);
        } catch (Exception $e) {
            return array('status' => false, 'error' => $e->message);
        }
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
                            ':date_of_inspection' => $post['date_of_inspection'],
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
    	                                           u.username 
    		                                FROM work_orders wo
    		                                LEFT JOIN work_order_statuses wos ON wos.id = wo.status
    		                                LEFT JOIN inspection_statuses _is ON _is.id = wo.inspection_status
    		                                LEFT JOIN users u ON u.id = inspector_id
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
    		                                    WHERE u.id IN (SELECT inspector_id FROM work_orders)")
    	               ->as_object()
    	               ->execute($this->db);

    	foreach($results as $result) {
    		$inspectors[$result->id] = $result->username;
    	}

    	return $inspectors;
    }
}