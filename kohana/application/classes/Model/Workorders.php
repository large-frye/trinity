<?php defined('SYSPATH') or die('No direct script access.');

class Model_Workorders extends Model_Base {
    
    protected $_users_model = null;

    protected $_inspection_model = null;

    public static $errors = null;

    public static $type = null;

    const BASIC_INSPECTION = 0;

    const EXPERT_INSPECTION = 1;

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

        $valid_post->rule('client', 'not_empty')
                   ->rule('policy_number', 'not_empty')
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
        $_date = str_replace('-', '/', $post['requested_date_of_inspection']);
        $hour = $post['am_or_pm'] == 'pm' && $post['hour_of_inspection'] != "12" ? intval($post['hour_of_inspection']) + 12 : $post['hour_of_inspection'];
        $parameters = array(':id'                         => null,
                            ':type'                       => $post['type'],
                            ':user_id'                    => $this->get_client_id($post['client']), // it is the client's id now. 
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
                            ':date_of_loss'               => date('Y-m-d', strtotime($_date)),
                            ':time_of_loss'               => date('h:i:s', strtotime($hour . ":" . $post['min_of_inspection'])),
                            ':interior_inspection'        => $post['interior_inspection'],
                            ':adjuster_present'           => $post['adjuster_present'],
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



    private function get_client_id($name) {
        return DB::query(Database::SELECT, "SELECT user_id FROM profiles WHERE CONCAT(TRIM(first_name), ' ', TRIM(last_name)) = :client")
                   ->parameters(array(
                       ':client' => $name))
                   ->as_object()
                   ->execute($this->db)
                   ->current()
                   ->user_id;
    }



    public function get_client_name($id) {
        return DB::query(Database::SELECT, "SELECT CONCAT(TRIM(first_name), ' ', TRIM(last_name)) as name FROM profiles WHERE user_id = :user_id")
                   ->parameters(array(
                       ':user_id' => $id))
                   ->as_object()
                   ->execute($this->db)
                   ->current()
                   ->name;
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
        $tmpName = $workorder_id;
        $mimeType =  $files['xact']['type'];    
        $fileName = $files['xact']['name']; 
        $fileName = preg_replace("/[^A-Z0-9._-]/i", "_", $fileName);
     

        $pathAndName = $uploaddir.$fileName;
        $moveResult = move_uploaded_file($_FILES['xact']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . $path . $workorder_id . ".pdf");
       
        $parameters = array(':id'                         => $workorder_id,
                            ':type'                       => $post['type'],
                            ':user_id'                    => $this->get_client_id($post['client']),
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
        $hour = $hour = $post['am_or_pm'] == 'pm' && $post['hour_of_inspection'] != "12" ? intval($post['hour_of_inspection']) + 12 : $post['hour_of_inspection'];
        $min = $post['min_of_inspection'];
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
                                                   u2.email as adjuster_email, p.insurance_company as company_name
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
        for($i = 1; $i <= 12; $i++) {
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
        return array('00' => '00', '15' => '15', '30' => '30', '45' => '45');
    }



    public function get_inspectors($type = '') {
    	$inspectors = array('' => '--Select Inspector');
    	$results = DB::query(Database::SELECT, "SELECT u.username, u.id
    		                                    FROM users u 
                                                LEFT JOIN roles_users ru ON ru.user_id = u.id
    		                                    WHERE ru.role_id = " . Model_Account::INSPECTOR)
    	               ->as_object()
    	               ->execute($this->db);

        if ($type === "json") {
            foreach($results as $result) {
                $inspectors[] = array(
                    'name' => $result->username,
                    'abbreviation' => ''
                    );
            }

            return json_encode($inspectors);
        }

    	foreach($results as $result) {
    		$inspectors[$result->id] = $result->username;
    	}


    	return $inspectors;
    }

    public function get_clients($type = '') {
        $results = DB::query(Database::SELECT, "SELECT u.username, u.id, CONCAT(TRIM(p.first_name), ' ', TRIM(p.last_name)) as name
                                                FROM users u
                                                LEFT JOIN roles_users ru ON ru.user_id = u.id
                                                LEFT JOIN profiles p ON p.user_id = u.id
                                                WHERE ru.role_id = " . Model_Account::CLIENT)
                       ->as_object()
                       ->execute($this->db);

        if ($type === "json") {
            foreach($results as $result) {
                $clients[] = array(
                    'name' => $result->name
                    );
            }

            return json_encode($clients);
        }

        return $results;
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
                $report['roofing_info'] = array();
                break;
            case 1: 
                $report['type'] = "Expert Inspection";
                break;
        }

        // We need to do another seperation for summary of findings vs. roofing information
        $roofing_info = true;
        foreach ($report as $key => $value) {
            if ($roofing_info && $report['type'] !== "Basic Inspection") {
                $report['roofing_info'][$key] = $value;
            } else {
                $report['damages'][$key] = $value;
            }

            if ($key === "roof_conditions") {
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

        // Hack for collateral damages
        if (isset($report['damages']['collateral_damamges_comments']) && $report['damages']['collateral_damamges_comments'] != "") {
            $report['damages']['collateral_damage_header']['collateral_damamges_comments'] = $report['damages']['collateral_damamges_comments'];
        }

        return $report;
    }



    /**
     * Handles the generation of the final pdf report.
     *
     */
    public function generate_report($workorder_id, $parentCategories, $photos) {
        // We need to determine the view we are going to be use.
        $view = $this->_get_pdf_view($workorder_id);

        // Get sketch photo
        foreach ($photos as $photo) {
            if ($photo->name === "Sketch") {
                $view->sketch = $photo;
            }
        }
      
        // Need to get all of the data possible for this report
        $view->report_data = $this->first_page_data_output($this->get_inspection_report($workorder_id));

        // Set fraud input and other damage information here. 
        $view->report_data = $this->_handle_damages($view->report_data);

        // Get all of inspection data and report. 
        $view->inspection_data = (array) $this->get_workorder_details($workorder_id);

        // Get static text for reports.
        $view->static_damage_text = $this->_get_static_damages_text();

        // Setup `dompdf`
        $this->_dompdf_setup(true, '4096M');

        // Create `dompdf` object
        try {
            // Create summary of findings and overview page. 
            $fp = null;
            $dompdf = new DOMPDF();
            $dompdf->load_html($view);
            $dompdf->render();
            $file = $this->_report_file_path . "step1_" . $workorder_id . ".pdf";
            $fp = fopen($file, 'w+');
            fwrite($fp, $dompdf->output());
            fclose($fp);

            // Reset $fp
            $fp = null;

            if ($this::$type === $this::EXPERT_INSPECTION) {
                $this->build_expert_pdf($view, $parentCategories, $photos, $workorder_id, $view->report_data);
            } else {
                $this->build_basic_pdf($view, $parentCategories, $photos, $workorder_id, $view->report_data);
            }
            
            return true;
        } catch (Exception $e) {       
            $this::$errors = "Error processing this PDF." . $e;
            return false;
        }
    }



    /**
     * Using DOMPDF build an expert inspection report
     *
     */
    public function build_expert_pdf($view, $parent_categories, $photos, $workorder_id, $report_data) {
        $workorder_info = $this->get_workorder_details($workorder_id);

        // Photos
        $this->_build_photos_pdf($view, $parent_categories, $photos, $workorder_id);

        // Explanation of Damages
        $this->_build_explanation_of_damages_pdf($view, $workorder_id);

        // Combine all the reports together
        $current_pdf_file = $this->_report_file_path . "step1_" . $workorder_id . ".pdf";
        $current_pdf_photos_file = $this->_report_file_path . "step2_" . $workorder_id . ".pdf";
        $current_pdf_exp_damages_file = $this->_report_file_path . "step3_" . $workorder_id . ".pdf";
        $xactimate_file = $_SERVER['DOCUMENT_ROOT'] . "/assets/xact/" . $workorder_id .".pdf";
                    
        if (file_exists($this->_report_file_path . str_replace(' ', '', $workorder_info->last_name) . "_Claim" . str_replace(' ', '', $workorder_info->policy_number) . ".pdf")) {
            unlink($this->_report_file_path . str_replace(' ', '', $workorder_info->last_name) . "_Claim" . str_replace(' ', '', $workorder_info->policy_number) . ".pdf");
        }

        if (Kohana::$environment === Kohana::DEVELOPMENT) {
            $cmd = "/usr/local/bin/pdftk";
        } else {
            $cmd = "/usr/bin/pdftk";
        }

        $file_name = $this->_report_file_path . str_replace(' ', '', $workorder_info->last_name) . "_Claim" . str_replace(' ', '', $workorder_info->policy_number) . ".pdf";

        exec($cmd . " " . $current_pdf_file . " " . $xactimate_file . " " . $current_pdf_photos_file . " " . $current_pdf_exp_damages_file . " " . 
             " cat output " . $file_name, $retval);
    }



    /**
     * Using DOMPDF build a basic inspection report
     *
     */
    public function build_basic_pdf($view, $parent_categories, $photos, $workorder_id, $report_data) {
        $workorder_info = $this->get_workorder_details($workorder_id);

        // Photos
        $this->_build_photos_pdf($view, $parent_categories, $photos, $workorder_id);

        // Combine all the reports together
        $current_pdf_file = $this->_report_file_path . "step1_" . $workorder_id . ".pdf";
        $current_pdf_photos_file = $this->_report_file_path . "step2_" . $workorder_id . ".pdf";
        $xactimate_file = $_SERVER['DOCUMENT_ROOT'] . "/assets/xact/" . $workorder_id .".pdf";

        if (file_exists($this->_report_file_path . str_replace(' ', '', $workorder_info->last_name) . "_Claim" . str_replace(' ', '', $workorder_info->policy_number) . ".pdf")) {
            unlink($this->_report_file_path . str_replace(' ', '', $workorder_info->last_name) . "_Claim" . str_replace(' ', '', $workorder_info->policy_number) . ".pdf");
        }

        if (Kohana::$environment === Kohana::DEVELOPMENT) {
            $cmd = "/usr/local/bin/pdftk";
        } else {
            $cmd = "/usr/bin/pdftk";
        }

        if (file_exists($xactimate_file)) {
            $xactimate = " " . $xactimate_file . " ";
        } else {
            $xactimate = " ";
        }

        exec($cmd . " " . $current_pdf_file . $xactimate . $current_pdf_photos_file . " " . 
             " cat output " . $this->_report_file_path . str_replace(' ', '', $workorder_info->last_name) . "_Claim" . str_replace(' ', '', $workorder_info->policy_number) . ".pdf", $retval);
    }



    private function _build_photos_pdf($view, $parentCategories, $photos, $workorder_id) {
        // Create the photos seperate
        try {
            $photos_view = View::factory('pdf/photos');
            $photos_view->parentCategories = $parentCategories;
            $photos_view->photos = $photos;
            $dompdf2 = new DOMPDF();
            $dompdf2->load_html($photos_view);
            $dompdf2->render();
            $file = $this->_report_file_path . "step2_" . $workorder_id . ".pdf";
            $fp = fopen($file, 'w+');
            fwrite($fp, $dompdf2->output());
            fclose($fp);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }



    private function _build_explanation_of_damages_pdf($view, $workorder_id) {
        // Next we need to create the explanation of damages. 
        try {
            $exp_damages = View::factory('pdf/explanation-of-damages');
            $exp_damages->damages = $this->_set_exp_damages($view->report_data);
            $exp_damages->data = $view->report_data;
            $dompdf3 = new DOMPDF();
            $dompdf3->load_html($exp_damages);
            $dompdf3->render();
            $file = $this->_report_file_path . "step3_" . $workorder_id . ".pdf";
            $fp = fopen($file, 'w+');
            fwrite($fp, $dompdf3->output());
            fclose($fp);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }



    /**
     * First page data output
     *
     */
    public function first_page_data_output($data) {
        if (!isset($data['report_type'])) {
            $checks = array('Yes' => 'policyholder was present and we were able ',
                            'No'  => 'policyholder was not present and we were unable ');

            if ($data['was_insured_present'] === "Yes") {
                $data['was_insured_present_str'] = $checks['Yes'];
            } else {
                $data['was_insured_present_str'] = $checks['No'];
            }

            // Handle roofer string. 
            $data = $this->_build_roofer_string($data);
        }

        return $data;
    }



    public function get_workorder_type($workorder_id) {
        return DB::query(Database::SELECT, 'SELECT CASE type
                                                       WHEN 0 THEN "Basic"
                                                       WHEN 1 THEN "Expert"
                                                   END as inspection_type
                                            FROM work_orders
                                            WHERE id = :id')
                   ->parameters(array(':id' => $workorder_id))
                   ->as_object()
                   ->execute()
                   ->current()
                   ->inspection_type;
    }


    
    /**
     * Check is xactimate exists
     *
     * @oparam int $workorder_id
     */
    public function check_if_xactimate_exists($workorder_id) {
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/assets/xact/' . $workorder_id . ".pdf")) {
            return true;
        }

        return false;
    }



    public function check_if_report_exists($workorder_id) {
        $workorder_info = $this->get_workorder_details($workorder_id);

        if (file_exists($this->_report_file_path . str_replace(' ', '', $workorder_info->last_name) . "_Claim" . str_replace(' ', '', $workorder_info->policy_number) . ".pdf")) {
            return true;
        } else {
            return false;
        }
    }



    private function _set_exp_damages($data) {
        $damages = $this->_inspection_model->get_roof_conditions();
        $exp_damages = $this->_get_exp_damages();
        $_damages = array();
        
        if (isset($data['roof_conditions'])) {
            $tmp_roof_conditions = explode('<br>', $data['roof_conditions']);
            foreach ($tmp_roof_conditions as $tmp_roof_condition) {
                if (isset($exp_damages[$tmp_roof_condition])) {
                    $_damages[$tmp_roof_condition] = $exp_damages[$tmp_roof_condition];
                }
            }
        }

        return $_damages;
    }



    private function _get_exp_damages() {
        return array('interior damage' => 'Interior damages were present. Interior leaks can be a result of hail and/or wind damage, but can also be a result of installation error 
                                           or improper maintenance of vent pipe flashing. Refer to the damage assessment for comments regarding any water intrusion concerns.',
                     'mechanical damage' => 'Mechanical damage is defined as damage which has occurred due to other than weather related conditions. Some good examples of mechanical 
                                             damage are the holes left in the shingles due to the use of toe boards during the roofing process. Other forms of mechanical damage are 
                                             foot traffic from installers and inspectors which can leaves areas of marred and/or exposed asphalt, shingle bundle scrapes, tool 
                                             marks, etc...',
                     'high nailing' => 'High nailing is a common incorrect installation method that can adversely impact the longevity of your roofing product. When a shingle is 
                                        nailed too high, the nail will miss the head lap of the shingle installed beneath it, causing the shingle to be nailed in only half the 
                                        recommended nailing places. In laminated shingles, this can cause delamination of the upper and lower laminate. High nailing often results 
                                        in slippage - refer to the paragraph entitled “Slippage” (if present) for the explanation of slippage.',
                     'nail extrusions' => 'Nail extrusions are often mistaken for wind damage. When a nail is pushed out through the forces of expansion and contraction on the 
                                           shank of a nail it will cause the nail to raise out of the position in which it was installed. This will cause the shingle directly 
                                           above it to be raised into the air giving the appearance that the wind has lifted it up. When viewed from the ground, the shingles 
                                           lifted by nail extrusions can appear very prominent and may seem to be a source of a possible leak. This, however, is not typically 
                                           the case. The nails that have been extruded should be hammered back into place or removed and replaced with a new nail. Routine 
                                           maintenance of these areas can fix the problem.',
                     'water intrusion' => 'Water intrusion concerns are defined as areas of possible leaks. These areas should be attended to immediately to prevent any future 
                                           water damage to the interior of the dwelling. Refer to the damage assessment for information regarding the possible leak entry points 
                                           noted on the roofing system. In most cases, leaks that are maintenance related from continual seepage, often take an extended 
                                           period of time to finally show as a stain on your ceiling or walls. Heavy rain and driving wind can accelerate the continual seepage, 
                                           causing the stain to appear during a single storm. This will often lead the policy holder to believe that there is a major problem 
                                           with the roofing system, which is often not the case. General routine inspection and maintenance should be performed yearly to insure 
                                           all aspects of the roofing system are in proper working order.',
                     'vent pipe failing failure' => 'Most roofing systems have plumbing pipes that protrude through the surface of the shingles. These pipes are used to draw 
                                                     air into the plumbing system. Some of the pipes use a rubber flashing boot to route rainwater away from the plumbing 
                                                     pipe and onto the shingles. As time progresses in the life span of the roof, the UV rays of the sun, and other elements 
                                                     of weather cause the rubber material to dry rot, crack, and split open. Many leaks are caused by this degradation of rubber 
                                                     material and are often mistaken for leaks caused by hail or wind damage. This water intrusion concern on the roofing system 
                                                     should be addressed immediately. Rubber vent pipe flashing should be replaced every 7-10 years to insure that they are in 
                                                     proper working condition.',
                     'lichen growth' => 'Lichen is an organic growth that often appears in, but is not limited to, the shaded portions of the roof. Lichen is an invasive growth 
                                         that feeds on the asphalt layer of a shingle often removing the granules directly below the lichen growth. When lichen is removed from 
                                         the shingle surface it can often look like hail marks because of the circular shape of lichen growth. Lichen growth can be differentiated 
                                         from hail damage based on the absence of impact marks (i.e. mat fracture). Furthermore, the areas of granule loss left behind from lichen
                                          growth are usually only on portions of the entire roof slope, so it does not appear in a consistent pattern throughout the entire slope.
                                           Hail damage will not occur on one section of an entire slope, but it will damage the entire slope consistently throughout. Lichen damage 
                                           can further be differentiated from hail damage by the lack of damage to the reinforcement mat.',
                     'algae growth' => 'Algae growth is a non invasive organic growth that appears on the portions of the roof that are more shaded (typically the North and East 
                                        slopes, but not limited to these slopes). This black or red looking growth does not affect the performance or the longevity of your 
                                        roofing system. It is only a visual blemish that can be removed by cleaning methods or the installation of certain metal components 
                                        to create a toxic environment which prevents algae growth. Spatter within the algae growth is used to confirm that hail has impacted 
                                        the roof recently, also indicating the size of the hail involved.',
                     'spatter present' => 'Spatter is the result of hail impacting areas of grime or oxidized metals, which removes the grime or oxidation, leaving a 
                     cleaned off area. This area of growth removal indicates the size and diameter of the hailstone. Usually spatter is found in the algae growth on the
                      shaded portions of a roof. Hail spatter is also found on objects that oxidize from the weather (e.g.: vinyl siding, satellite dishes, air 
                          conditioning units).',
                     'blistering' => 'During the manufacturing process, moisture in the form of water vapor and other gasses can become entrapped in the top layer 
                     of the bituminous asphalt coating prior to granule application. When the shingle is heated after installation on the roof, these entrapped
                      gasses can expand and form a bubble within the asphalt coating - this is called a closed blister because the asphalt coating remains intact 
                      with granule covering. When the top of the blister bursts, the granules on the blister are released and a small crater is formed - this is 
                      called an open blister. Blisters can be differentiated from hail damage because blistering does not damage the shingle reinforcing mat. Also,
                       granule loss due to blistering is upward and outward from within the shingle. Some shingles will still blister even with proper ventilation 
                       but unventilated roofs are more susceptible to blistering.',
                     'slippage' => 'Slippage of an asphalt roofing system is always the result of high nailing. High nailing is an incorrect installation method. 
                     Slippage typically occurs when a roof is steep, which can lead to shingles slipping downward out of their proper placement. When a shingle is 
                     nailed too high, the nail misses the head lap of the shingle installed beneath it. This means the shingle will be nailed in only half the 
                     recommended nailing places. For laminated shingles this can cause delamination of the upper and lower laminate.',
                     'flashing breach' => 'Most roofs have a series of flashing elements in key places to route water away from chimneys, skylights, framing walls, 
                     and other roofing transitions. It is the job of the counter-flashing and step-flashing to keep these areas watertight by routing the 
                     rainwater back on top of the roofing system. Often, during extended periods of heavy driving rain, these areas can be breached causing 
                     interior damage to a dwelling. Improper installation of these flashing elements can cause a leak to appear slowly over an extended period 
                     of time, often not affecting the interior walls or ceilings for years after installation.');
    }



    private function _handle_damages($data) {

        foreach ($data as $key => $value) {
            // Remove all blanks.
            if ($value == "blank") {
                unset($data[$key]);
            } else {
                if (preg_match('/metal_damages/', $key)) {
                    $data = $this->_handle_metal_damage_str($data, $key, $value);
                } else if (preg_match('/hail_size/', $key)) {
                    $data['damages']['metal_header']['metal_damage_hail_size'] = "Based on the dents of the soft metals and/or spatter
                         on the roof and secondary indicators, the estimated hail diameter was measured at: " . 
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
                } else if ( preg_match('/shingle_anomalies/', $key) ) {
                    if (!preg_match('/header/', $key)) {
                        $data = $this->_set_product_defects($data, $key, $value);
                    }
                } else if ( preg_match('/workmanship|improper/', $key)) {
                    $data = $this->_set_workmanship($data, $key, $value);
                } else if ( preg_match('/worn/', $key)) {
                    $data = $this->_set_aged_worn($data, $key, $value);
                } else if ( preg_match('/fraud/', $key)) {
                    $data = $this->_set_fraud_input($data, $key, $value);
                }
            }
        }

        if (!isset($data['damages']['wind_header'])) {
            $data['damages']['wind_header']['no_report'] = 'There was no wind damage found during our inspection.';
        }

        if (!isset($data['damages']['hail_header'])) {
            $data['damages']['hail_header']['no_report'] = 'There was no hail damage found during our inspection.';
        }

        return $data;
    }



    private function _set_fraud_input($data, $key, $value) {
        $fraud_inputs = array_merge($this->_inspection_model->get_fraud_hail_input_text(), $this->_inspection_model->get_fraud_wind_input_text());
        $header = str_replace('fraud_', '', $key);
        $header = str_replace('_input', '_header', $header);

        foreach ($value as $input) {
            if (isset($fraud_inputs[$input])) {
                $data['damages'][$header][$key][$input] = $fraud_inputs[$input];
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

        if ( is_array($value) && !empty($value)) {

        foreach ( $value as $k => $v ) {
            $str .= $v . ", ";
        }

        $data['damages']['workmanship_header'][$key] = "<b>" . str_replace('_', ' ', $key) . ":</b> " . str_replace('(+c):', '- comment: ', $str);
        }else if ($value != "") {
        $data['damages']['workmanship_header'][$key] = "<b>" . str_replace('_', ' ', $key) . ":</b> " . "<b>" . $value . "</b>"; 
    }

        return $data;
    }



    private function _set_product_defects($data, $key, $value) {
        $str = "";

        if ( is_array($value) ) {

            if ($key === "shingle_anomalies_types") {
                $verb = "were";
                $count = 0;

                if (count($value) === 1) {
                    $verb = "was";
                }

                $stmt = "The shingle anomalies found " . $verb;

                foreach ($value as $_k => $_v) {
                    if ($count + 1 == count($value)) {
                        $stmt .= " and " . $_k;
                        $stmt .= trim($_v) != "" ? " (" . $_v . ") ." : ".";
                    } else {
                        $stmt .= " " . $_k;
                        $stmt .= trim($_v) != "" ? " (" . $_v . ") ," : ", ";
                    }

                    $count++;
                }

                $data['damages']['shingle_anomalies_header'][$key] = "<b>" . $stmt . "</b>";
            } else {

                foreach ( $value as $k => $v ) {
                    $str .= $v . ", ";
                }

                $data['damages']['shingle_anomalies_header'][$key] = "<b>" . str_replace('_', ' ', $key) . ":</b> " . str_replace('(+c):', '- comment: ', $str);
            }
        } else {
            $data['damages']['shingle_anomalies_header'][$key] = "<b>" . str_replace('_', ' ', $key) . ":</b> " . "<b>" . $value . "</b>"; 
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
                        $this::$type = $this::BASIC_INSPECTION;
                        break;
                    case 1 : 
                    case 2 : 
                        $view = View::factory('pdf/expert-report');
                        $this::$type = $this::EXPERT_INSPECTION;
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


