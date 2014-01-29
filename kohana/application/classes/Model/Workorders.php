<?php defined('SYSPATH') or die('No direct script access.');

class Model_Workorders extends Model_Base {
    
    protected $_users_model = null;

    protected $_inspection_model = null;

    public static $errors = null;

    public function __construct() {
    	parent::__construct();

        $this->_users_model = Model::factory('Users');
        $this->_inspection_model = Model::factory('Inspections');
        $this->_report_file_path = $_SERVER['DOCUMENT_ROOT'] . "/assets/pdf/reports/";
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
        $parameters[':pdfLoc'] = null;

        try {
            DB::insert('work_orders')->values(array_keys($parameters))
                ->parameters($parameters)
                ->execute($this->db);
            return array('status' => true);
        } catch (Database_Exception $e) {
            print_r($e->getMessage());
            return array('status' => false, 'error' => $e->getMessage());
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



    public function edit_workorder($files, $post, $workorder_id) {
        //functions to move PDF into directory 

        $path = "/assets/xact/";

        $uploaddir = '..'.$path.$workorder_id.'/';
        if (!is_dir($uploaddir) && !mkdir($uploaddir)){
          die("Error creating folder");
        }


        // File location with name
        $tmpName = $files['xact']['tmp_name'];
        $mimeType =  $files['xact']['type'];    
        $fileName = $files['xact']['name']; 
        $fileName = preg_replace("/[^A-Z0-9._-]/i", "_", $fileName);
     

        $pathAndName = $uploaddir.$fileName;
        $moveResult = move_uploaded_file($tmpName, $pathAndName);
       
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
                            ':price'                      => $post['price'],
                            ':pdfLoc'                    =>  $pathAndName);

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



    public function get_policy_holder($workorder_id) {
        return DB::query(Database::SELECT, "SELECT policy_number, 
                                                   CONCAT(first_name, ' ', last_name) as insured,
                                                   street_address, 
                                                   CONCAT(city, ', ', state, ', ', zip) as full_address,
                                                   phone
                                            FROM work_orders
                                            WHERE id = :id")
                   ->parameters(array(':id' => $workorder_id))
                   ->as_object()
                   ->execute($this->db)
                   ->current();
    }



    public function get_adjuster_for_workorder($workorder_id) {
        return DB::query(Database::SELECT, "SELECT CONCAT(p.first_name, ' ', p.last_name) as adjuster,
                                                   p.phone, p.insurance_company
                                            FROM work_orders wo
                                            LEFT JOIN users u ON u.id = wo.user_id
                                            LEFT JOIN profiles p ON p.user_id = u.id
                                            WHERE wo.id = :id")
                   ->parameters(array(':id' => $workorder_id))
                   ->as_object()
                   ->execute($this->db)
                   ->current();
    }



    public function get_inspection_report($workorder_id) {
        $report_serialized = DB::query(Database::SELECT, "SELECT `key`, `value` FROM inspection_meta WHERE workorder_id = :id")
                                                 ->parameters(array(':id' => $workorder_id))
                                                 ->as_object()
                                                 ->execute($this->db);

        $report = array();
        $pre_built_data = $this->_inspection_model->build_values_for_report();
        $bool_fields = array('was_insured_present', 'was_roofer_present', 'was_roof_climbed', 'agreed_wind', 'agreed_hail', 'refused_test_squares');

        foreach ($report_serialized as $row) {
            if ($row->key != "csrf") {
                if (preg_match('/a:/', $row->value)) {
                    $array = unserialize($row->value);
                    $report[$row->key] = "";

                    foreach ($array as $key => $value) {
                        if (is_string($key) && !preg_match('/slope/', $key)) {
                            $report[$row->key][$key] = $value;
                        }
                        else if (isset($pre_built_data[$row->key][$value]) && is_numeric($value)) {
                            $report[$row->key] .= $pre_built_data[$row->key][$value] . "<br>";
                        } else {
                            if (!is_array($report[$row->key])) {
                                $report[$row->key] .= $value . "<br>";
                            } 
                        }
                    }
                } else {
                    if (in_array($row->key, $bool_fields)) {
                        $report[$row->key] = $row->value == 1 ? "Yes" : "No";
                    } else if (isset($pre_built_data[$row->key][$row->value])) {
                        if ($pre_built_data[$row->key][$row->value] !== "Please Select One") {
                            $report[$row->key] = $pre_built_data[$row->key][$row->value] . "<br>";
                        }
                    } else {
                        $report[$row->key] = $row->value;
                    }
                }
            }
        } 

        switch ($report['type']) {
            case 0: 
                $report['type'] = "Basic Inspection";
                break;
            case 1: 
                $report['type'] = "Expert Inspection";
                break;
        }

        // We need to do another seperation for summary of findings vs. roofing information
        $roofing_info = true;
        foreach ($report as $key => $value) {
            if ($roofing_info) {
                $report['roofing_info'][$key] = $value;
            } else {
                $report['damages'][$key] = $value;
            }

            if ($key === "collateral_damage_detail_description") {
                $roofing_info = false;
            }
        }

        $header_original = "";
        $header = "";

        // Need to handle the damages and any headers
        foreach ($report['damages'] as $key => $value) {
            if (preg_match('/header/', $key)) {
                $header = str_replace('_header', '', $key);
                $header_original = $key;
            }
                
            if ($header !== "") {
                if(preg_match('/' . $header . '/', $key)) {
                    if ($key != $header_original) {
                        $report['damages'][$header_original][$key] = $value;
                    }
                    unset($report['damages'][$key]);
                };
            }
        }

        return $report;
    }



    public function generate_report($workorder_id, $parentCategories, $photos) {
        // We need to determine the view we are going to be use.
        $view = $this->_get_pdf_view($workorder_id);
        $view->parentCategories = $parentCategories;
        $view->photos = $photos;
      
        // Need to get all of the data possible for this report
        $view->report_data = $this->first_page_data_output($this->get_inspection_report($workorder_id));

        $view->report_data = $this->_handle_damages($view->report_data);

        // Get all of inspection data and report. 
        $view->inspection_data = (array) $this->get_workorder_details($workorder_id);

        // Get static text for reports.
        $view->static_damage_text = $this->_get_static_damages_text();

        // Check to see if xactimate report exists
        // $view->xactimate = $this->check_if_xactimate_exists($workorder_id);

        // Setup `dompdf`
        $this->_dompdf_setup(true, '4096M');

        // Create `dompdf` object
        try {
            $dompdf = new DOMPDF();
            $dompdf->load_html($view);
            $dompdf->render();
            $file = $this->_report_file_path . $workorder_id . ".pdf";
            $fp = fopen($file, 'w+');
            fwrite($fp, $dompdf->output());
            fclose($fp);
            $dompdf->stream($workorder_id . ".pdf");
            return true;
        } catch (Exception $e) {       
            $this::$errors = "Error processing this PDF." . $e;
            return false;
        }
    }



    public function first_page_data_output($data) {
        $checks = array('Yes' => 'policyholder was present and we were able ',
                        'No'  => 'policyholder was not present and we were unable ');

        if ($data['was_insured_present'] === "Yes") {
            $data['was_insured_present_str'] = $checks['Yes'];
        } else {
            $data['was_insured_present_str'] = $checks['No'];
        }

        // Handle roofer string. 
        $data = $this->_build_roofer_string($data);

        return $data;
    }



    public function check_if_xactimate_exists($workorder_id) {
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/assets/xact/' . $workorder_id)) {
            return true;
        }

        return false;
    }



    private function _handle_damages($data) {
        // $data = $this->_set_damage_str($data, array('metal_header' => 'metal_damage_str'));

        foreach ($data as $key => $value) {
            if (preg_match('/metal_damages/', $key)) {
                $data = $this->_handle_metal_damage_str($data, $key, $value);
            } else if (preg_match('/hail_size/', $key)) {
                $data['damages']['metal_header']['metal_damage_hail_size'] = 
                    "Based on the dents of the soft metals and/or spatter on the roof and secondary indicators, the estimated hail diameter was measured at: " . 
                    str_replace('_', '/', $data['damages']['metal_header']['metal_damage_hail_size']) . "\"";
            } else if (preg_match('/slope_vermin_(roofing|fascia|vent)_damage$/', $key)) {
                $data = $this->_set_vermin_damage($data, $key, $value);
            } else if (preg_match('/lightning_damages/', $key)) {
                $data = $this->_set_lightning_damage($data, $key, $value);
            } else if (preg_match('/(slope_ice_damming|slope_fallen_ice)/', $key)) {
                $data = $this->_set_ice_damage($data, $key, $value);
            } else if (preg_match('/excess_debris/', $key)) {
                $data = $this->_set_excess_debris($data, $key, $value);
            } else if ( preg_match('/standing_water/', $key) ) {
                $data = $this->_set_standing_water($data, $key, $value);
            } else if ( preg_match('/product_defects/', $key) ) {
                if (!preg_match('/header/', $key)) {
                    $data = $this->_set_product_defects($data, $key, $value);
                }
            } else if ( preg_match('/workmanship|improper/', $key)) {
                $data = $this->_set_workmanship($data, $key, $value);
            } else if ( preg_match('/worn/', $key)) {
                $data = $this->_set_aged_worn($data, $key, $value);
            }
        }

        return $data;
    }



    private function _set_aged_worn($data, $key, $value) {
        $str = "";

        if ( is_array($value) ) {

        foreach ( $value as $k => $v ) {
            $str .= $v . ", ";
        }

        $data['damages']['aged_worn_header'][$key] = "<b>" . str_replace('_', ' ', $key) . ":</b> " . str_replace('(+c):', '- comment: ', $str);
        }else {
        $data['damages']['aged_worn_header'][$key] = "<b>" . str_replace('_', ' ', $key) . ":</b> " . "<b>" . $value . "</b>"; 
    }

        return $data;
    }


    private function _set_workmanship($data, $key, $value) {
        $str = "";

        if ( is_array($value) ) {

        foreach ( $value as $k => $v ) {
            $str .= $v . ", ";
        }

        $data['damages']['workmanship_header'][$key] = "<b>" . str_replace('_', ' ', $key) . ":</b> " . str_replace('(+c):', '- comment: ', $str);
        }else {
        $data['damages']['workmanship_header'][$key] = "<b>" . str_replace('_', ' ', $key) . ":</b> " . "<b>" . $value . "</b>"; 
    }

        return $data;
    }



    private function _set_product_defects($data, $key, $value) {
        $str = "";

        if ( is_array($value) ) {

        foreach ( $value as $k => $v ) {
            $str .= $v . ", ";
        }

        $data['damages']['product_defects_header'][$key] = "<b>" . str_replace('_', ' ', $key) . ":</b> " . str_replace('(+c):', '- comment: ', $str);
    } else {
        $data['damages']['product_defects_header'][$key] = "<b>" . str_replace('_', ' ', $key) . ":</b> " . "<b>" . $value . "</b>"; 
    }

        return $data;
    }



    private function _set_standing_water($data, $key, $value) {
        $str = "";

        if ( is_array($value) ) {

        foreach ( $value as $k => $v ) {
            $str .= $v . ", ";
        }

        $data['damages']['standing_water_header'][$key] = "<b>" . str_replace('_', ' ', $key) . ":</b> " . str_replace('(+c):', '- comment: ', $str);
        }

        return $data;
    }



    private function _handle_metal_damage_str($data, $key, $value) {
        $b_str = "";

        foreach ($value as $k => $v) {
            $b_str .= $v . " " . $k . ", ";
        }

        $data['damages']['metal_header']['metal_damages'] = "We also found cosmetic denting to the thin gauge aluminum vents on the roof: " . $b_str;
        return $data;
    }


    private function _set_damage_str($data, $array) {
        foreach ($array as $value) {
            
        }
    }



    private function _set_vermin_damage($data, $key, $value) {
        unset($data['damages']['vermin_header'][$key]);
        $_key = str_replace('slope_vermin_', '', $key);
        $_key = str_replace('_damage', '', $_key);

        $b_str = "";

        foreach ($value as $k => $v) {
            $b_str .= $v . "<br />";
        }

        $data['damages']['vermin_header'][ucfirst($_key) . " Damage"] = "<b>" . ucfirst($_key) . " Damage:</b> "  . str_replace('(+c):', '- comment: ', $b_str);

        

       // $data['damages']['lightning_header']['lightning_damages'] = "<b>We found lightning damages to the following:</b> " . $b_str . "of the dwelling.";

        return $data;
    }


    private function _set_lightning_damage($data, $key, $value) {
        $b_str = "";

        foreach ($value as $k => $v) {
            $b_str .= $v . ", ";
        }

        $data['damages']['lightning_header']['lightning_damages'] = "<b>We found lightning damages to the following:</b> " . $b_str . "of the dwelling.";

        return $data;
    }



    private function _set_ice_damage($data, $key, $value) {
        $header = str_replace('slope', '', $key);
        $header = str_replace('_', ' ', $header);

        $b_str = "";

        foreach ($value as $k => $v) {
            $b_str .= $v . "<br />";
        }

        $data['damages']['ice_header'][$key] = "<b>" . ucfirst($header) . ":</b> " . $b_str;
        return $data;
    }




    private function _set_excess_debris($data, $key, $value) {
        switch ($key) {
            case "excess_debris_location" : 
                $str = "";
                foreach ($value as $k => $v) {
                    $str .= $v . ", ";
                }
                $data['damages']['excess_debris_header'][$key] = "We found the following excess debris damages: <b>" . $str . "</b>.";
                break;
            case "slope_excess_debris_location" :
                $str = "";
                foreach ($value as $k => $v) {
                    $str .= $v . ", ";
                }
                $data['damages']['excess_debris_header'][$key] = "We found the following damage to the slope due to excess debris: " 
                                                                  . str_replace('(+c):', '- comment: ', $str);
                break;
        }

        return $data;
    }



    private function _get_static_damages_text() {
        return array('wind_header' => 'Our wind damage inspection consists of inspecting every roof slope to verify any and 
                                      all wind damaged components to all types of roofing systems.',
                     'hail_header' => 'Our hail damage inspection consists of looking on all directional slopes for granular 
                                       displacement on the shingles that are about the size in diameter of a dime, and supported 
                                       by mat fracture. These areas of granular displacement must be found consistently across 
                                       the entire directional slope that we are assessing (which is a characteristic of hail damage). 
                                       We use a 10’ X 10’ test square on all 4 directional slopes to test the statistical average of hail.');
    }



    private function _build_roofer_string($data) {
        $str = "";
        $no_inspector = "There was not a roofer present for this inspection.";
        
        if ($data['was_roofer_present'] === "Yes") {
            $data['was_roofer_present_str'] = $data['roofer'] . " with " . $data['roofer_company_name'] . " attended the inspection and ";
        } else {
            $data['was_roofer_present_str'] = $no_inspector;
        }

        if ($data['was_roof_climbed'] === "Yes" && $data['was_roofer_present_str'] != $no_inspector) {
            $data['was_roof_climbed'] = " and climbed the roof.";
        } else if ($data['was_roofer_present_str'] != $no_inspector) {
            $data['was_roof_climbed'] = " and did not climb the roof.";
        } else {
            $data['was_roof_climbed'] = "";
        }

        if ($data['agreed_wind'] === "Yes" && $data['was_roofer_present_str'] != $no_inspector) {
            $data['agreed_wind'] = " agreed ";
        } else if ($data['was_roofer_present_str'] != $no_inspector) {
            $data['agreed_wind'] = " did not agree ";
        }

        if ($data['agreed_hail'] === "Yes" && $data['was_roofer_present_str'] != $no_inspector) {
            if ($data['agreed_wind'] === "No") {
                $data['agreed_hail'] = " but agreed ";
            } else {
                $data['agreed_hail'] = " and agreed ";
            }
        } else if ($data['was_roofer_present_str'] != $no_inspector) {
            $data['agreed_hail'] = " did not agree ";
        }

        if ($data['was_roofer_present_str'] != $no_inspector) {
            $data['roofing_agree_str'] = "The roofing contract " . $data['agreed_wind'] . " with our assessment of wind damage " . $data['agreed_hail'] . 
                                         " with our assessment of hail damage";
        } else {
            $data['roofing_agree_str'] = "";
        }

        return $data;
    }



    private function _dompdf_setup($errors, $buffer_size) {
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/dompdf/dompdf_config.inc.php")) { 
            include ($_SERVER['DOCUMENT_ROOT'] . "/dompdf/dompdf_config.inc.php"); 
        } else {
            die('file can\'t be found');
        }

        // Set memory limit with $buffer_size
        ini_set("memory_limit", $buffer_size);

        set_time_limit(0);

        if ($errors) {
            ini_set('display_errors', 1);
            error_reporting(E_ALL);
        }
    }



    private function _get_pdf_view($workorder_id) {
        try { 
            $result = DB::query(Database::SELECT, "SELECT type FROM work_orders WHERE id = :id")
                          ->parameters(array(':id' => $workorder_id))
                          ->as_object()
                          ->execute($this->db);

            if ($result->count() > 0) {
                switch($result->current()->type) {
                    case 0 : 
                        $view = View::factory('pdf/basic-report');
                        break;
                    case 1 : 
                    case 2 : 
                        $view = View::factory('pdf/expert-report');
                        break;
                }
            } else {
                $this::$errors = "Couldn't find a record for this work order.";
                return false;
            }
        } catch (Database_Exception $e) {
            $this::$errors = $e->getMessage();
            return false;
        }

        return $view;
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


