<?php
/**
 * Model which handles the work order operations
 *
 */
class Model_Workorders extends Model_Core
{

	/**
	 * @var array Holds the incoming post data
	 */
	protected $_post_data = array();
	
	/**
	 * @var array Holds the column names of the table that holds the data
	 */
	protected $_table_columns = array(
		'id',
		'type',
		'user_id',
		'policy_number',
		'first_name',
		'last_name',
		'street_address',
		'city',
		'state',
		'zip',
		'phone',
		'phone2',
		'created_on_utc',
		'damage_type',
		'date_of_loss',
		'tarped',
		'estimate_scope_requirement',
		'special_instructions',
		'status',
		'inspector_id',
		'price',
		'is_generated_pdf',

		'is_expert'

	);
	
	/**
	 * @var string The name of the table - needs to be public for testing purposes
	 */
	public $_table_name = 'work_orders';
	
	public $_statuses_table_name = 'work_order_statuses';	
	
	public $_profile_table = 'user_profiles';
	
	public $actor_user = null;

	public $_inspection_statuses_table_name = 'inspection_statuses';	

	
	/**
	 * @var array Holds the data that gets served through the php magical functions
	 */
	protected $_data = array(
		'id' => null,
		'type' => '',
		'user_id' => '',
		'policy_number' => '',
		'first_name' => '',
		'last_name' => '',
		'street_address' => '',
		'city' => '',
		'state' => '',
		'zip' => '',
		'phone' => '',		
		'phone2' => '',		
		'created_on_utc' => '0000-00-00 00:00:00',
		'damage_type' => '',
		'date_of_loss' => null,
		'tarped' => null,
		'estimate_scope_requirement' => '',		
		'special_instructions' => '',		
		'status' => 1,
		'inspector_id' => null,
		'price' => 0,
		'is_generated_pdf' => 0,
		
		'is_loaded' => false, // Set true when a work order is loaded into the model
		'is_checked' => false, // Used for the save function - saves only if the data was checked
		'is_expert' => null
	);	
	
	protected $_status_data = null;
	
	
	/**
	 * Get a row from the workorders table given by specific columns such as id, .. etc. and load it into the object.
	 * Example:
	 * load_by( array('id' => '123') );
	 *
	 * @param array Where clause by which to filter the table rows.
	 * @return Bool.
	 *
	 */
	public function load_by( Array $by )
	{
		$sql = 'SELECT * FROM '.$this->_table_name;
		
		if ( !empty($by) )
		{
			$sql .= ' WHERE ';
			
			$parameters = array();
			
			foreach($by as $key => $value)
			{
				array_push($parameters, $key.'='.$value);
			}
			
			$sql .= implode(' AND ', $parameters);

		}	
		
		$q = DB::query(Database::SELECT, $sql);
		
		foreach( $by as $key => $value )
		{
			if ( in_array($key, $this->_table_columns) )
			{
				$q->param(':'.$key, $value);
			}
		}			
		
		$q = $q->execute();
		
		if ( $q->count() > 0 )
		{
			$result = $q->as_array();
			
			$this->_data = $result[0];
			
			return true;
		}
		
		return false;		
	}


	
	/**
	 * Checks if the workorder data in the post is ok and can be worked with
	 * This will also save the post data to the inner _data if everything is right
	 * @param array $post The POST data
	 * @return boolean | array True if data is ok, validation errors otherwise
	 */
	public function check_data($post = array())
	{
		// Sanitize the post and pass to inner variable
		$this->_post_data = Security::sanitize($post);
		
		if ( !isset($this->_post_data['is_expert']) ) 
		{
			$this->_post_data['is_expert'] = 0;
		}
		
		// build validation
		$val = Validation::factory($this->_post_data)
				->bind(':model', $this)
				->rule('policy_number', 'not_empty')
				->rule('first_name', 'not_empty')
				->rule('last_name', 'not_empty')
				->rule('street_address', 'not_empty')				
				->rule('city', 'not_empty')
				->rule('state', 'not_empty')
				->rule('zip', 'not_empty')
				->rule('zip', 'numeric')
				->rule('zip' ,'exact_length',array(':value',5))
				->rule('phone', 'not_empty')
				->rule('phone', array(':model','_valid_phone'))
				->rule('phone2', array(':model','_valid_phone'))
				->rule('inspection_zip', 'numeric')
				->rule('inspection_zip' ,'exact_length',array(':value',5))				
				->rule('how_many_stories', 'numeric')				
				->rule('contact1_phone', array(':model','_valid_phone'))
				->rule('contact2_phone', array(':model','_valid_phone'))	
				->rule('date_of_loss', array(':model','_valid_date'));		
		
		if ( $this->_data['id'] != null )
		{
			$val->rule('price', 'not_empty')
					->rule('price', 'numeric');
		}
		
		// If all ok, set the data and return true
		if ( $val->check() )
		{
			foreach ( $this->_data as $key => $value )
			{
				$this->_data[$key] = ( isset($this->_post_data[$key]) && $key != 'created_on_utc' )? $this->_post_data[$key] : $value;
			}
			
			if ( isset($this->_data['date_of_loss']) && $this->_data['date_of_loss'] != '' )
			{
				$this->_data['date_of_loss']  = date('Y-m-d', strtotime($this->_data['date_of_loss'] ));
			}
			else
			{
				$this->_data['date_of_loss'] = null;
			}
			
			if ( isset($this->_data['how_many_stories']) && $this->_data['how_many_stories'] == '' )
			{
				$this->_data['how_many_stories'] = null;
			}			
			
			if ( $this->_data['is_expert'] == null )
			{
				$this->_data['is_expert'] = 0;
			}

			$this->_data['is_checked'] = true;
			
			return true;
		}
		
		return $val->errors('validation/workorders');
	}	
	
	public function _valid_date($date)
	{
		if (empty($date))
		{
			return true;
		}
		
		$normal_date = date_create_from_format('m-d-Y', $date);

		if ($normal_date == false)
		{
			return false;
		}
		
		$final_date = date_format($normal_date, 'Y-m-d');		
		
		if (Valid::date($final_date))
		{
			$this->_post_data['date_of_loss'] = $final_date;
			
			return true;
		}
		
		return false;
	}
	
	/**
	 * Create a new work order
	 *
	 * @param Int User ID
	 */
	public function create($user_id)
	{
		try
		{

			// Unset id since we have an insert
			$data = $this->_table_columns;
			unset($data['id']);
			
			$this->_data['created_on_utc'] = date('Y-m-d H:i:s');
			$this->_data['user_id'] = $user_id;
			
			$m_prices = new Model_Admin_Prices();
			
			$this->_data['price'] = $m_prices->get_price_by_type($this->_data['type']);
			
			$str = 'INSERT INTO '.$this->_table_name.'('.implode(',',$data).') VALUES (:'.implode(',:',$data).')';
			
			$q = DB::query(Database::INSERT, $str);
			
			// Pass the data
			foreach ( $data as $col )
			{
				$q->param(':'.$col, $this->_data[$col]);
			}
			
			$q = $q->execute();
			
			// Pass the insert id
			if ( $q[0] > 0 )
			{
				$this->_data['id'] = $q[0];
				
				$this->_send_notification_mail();
				
				return true;
			}
			
			return false;	

		}
		catch( Database_Exception $db_e )
		{	
			throw $db_e ;
		}			
			
	}
	
	public function edit()
	{
		try
		{
			// Build query
			$str = 'UPDATE '.$this->_table_name.' SET ';
			
			foreach( $this->_table_columns as $col )
			{
				$str .= $col.' = :'.$col.', ';
			}
			
			// Cutting the last "," from the query
			$str = rtrim($str, ', ');
			
			$str .= ' WHERE id = :id';
			
			$q = DB::query(Database::UPDATE, $str);
			
			// Now add data
			$this->_data['id'] = (int)$this->_data['id'];
			
			foreach( $this->_table_columns as $col )
			{
				$q->param(':'.$col, $this->_data[$col]);
			}
			
			$q = $q->execute();		
		}
		catch( Database_Exception $db_e )
		{	
			throw $db_e ;
		}			
	}
	

	/**
	  * This function serves validation purposes only
	  * Checks if a phone is valid
	  * @param string The number to check
	  * @return boolean
	  */
	 public function _valid_phone($phone)
	 {
	  $pattern = '/^[+#*\(\)\[\]]*([0-9][ ext+-pw#*\(\)\[\]]*){6,45}$/';
	  
	  return (boolean)preg_match($pattern, $phone);
	 }	
	 
	 
	 /**
	  * Return the loaded data
	  *
	  * @return Array Work Order Data
	  */
	 public function return_data()
	 {
		return $this->_data;
	 }
	
	/**
	 * This function sends a mail for client about the work order submission
	 */
	public function _send_notification_mail()
	{

		$email_data = array();
		
		$m_settings = new Model_Settings();
		
		$settings_data = $m_settings->load_by(array('name' => 'email_template_workorder_created'));
		
		if ( $settings_data === false )
		{
			return false;
		}		
		
		$settings_data = Security::decode($settings_data);
		
		$m_users = new Model_Psusers;
		
		$user = $m_users->load_by( array( 'id' => $this->_data['user_id']) );

		$template = str_replace('::username::', $user->username, $settings_data->value);
		
		$email_data['message'] = $template;
		
		$email_data['subject'] = 'Trinity - Workorder Submission';
		
		$email_data['email'] = $user->email;
		
		$this->_send_mail($email_data);
	}
	
	/**
	 * Get work order statuses
	 *
	 * @return Array Work Order statuses
	 */
	public function get_statuses()
	{
		$sql = 'SELECT * FROM '.$this->_statuses_table_name;
		
		$q = DB::query(Database::SELECT, $sql)
				->execute();		
				
		if ( $q->count() > 0 )
		{
			return $q->as_array();
		}			
				
		return array();		
	}
	
	/**
	 * Validate the POST data on status set
	 *
	 * @param Array POST data
	 */
	public function check_status($post)
	{
		$this->_status_data = Security::sanitize($post);
		
		if ( $this->_status_data['status'] == 4 )
		{
			$val = Validation::factory($this->_status_data)
					->bind(':model', $this)
					->rule('date_of_inspection', 'not_empty')							
					->rule('date_of_inspection', array(':model','_valid_inspection_date'))
					->rule('inspector_id', 'not_empty')			
					->rule('inspector_id', 'numeric');			

			// If all ok, set the data and return true
			if ( $val->check() )
			{
				return true;
			}	
			else
			{
				return $val->errors('validation/workorders');
			}
		}
		
		return true;

	}
	
	public function _valid_inspection_date($date)
	{
		if (empty($date))
		{
			return true;
		}
		
		$normal_date = date_create_from_format('m-d-Y', $date);
	
		if ($normal_date == false)
		{
			return false;
		}	
	
		$final_date = date_format($normal_date, 'Y-m-d');		
		
		if (Valid::date($final_date))
		{
			$this->_status_data['date_of_inspection'] = $final_date;
			
			return true;
		}
		
		return false;
	}	
	
	/**
	 * Save the workorders status
	 */
	public function save_status()
	{
		try
		{
			$this->_data['id'] = (int)$this->_data['id'];	
			
			$this->actor_user = Auth::instance()->is_logged_in();			
			
			Database::instance()->begin();
		
			$str_down = 'UPDATE '.$this->_table_name.
								' SET
									inspector_id = NULL, 
									date_of_inspection = NULL,
									time_of_inspection = NULL 
								WHERE 
									id = :id ';
									
			$q_down = DB::query(Database::UPDATE, $str_down)
							->param(':id', $this->_data['id'])
							->execute();
			
			// Build query
			$str = 'UPDATE '.$this->_table_name.' SET status = :status ';
	
			if ( $this->_status_data['status'] == 4 )
			{
				$str .= ', inspector_id = :inspector_id, date_of_inspection = :date_of_inspection, time_of_inspection = :time_of_inspection ';
			}
			
			$str .= 'WHERE id = :id ';

			$q = DB::query(Database::UPDATE, $str)
					->param(':status', $this->_status_data['status'])
					->param(':id', $this->_data['id']);
					
			if ( $this->_status_data['status'] == 4 )
			{
				$this->_status_data['date_of_inspection'] = date('Y-m-d', strtotime($this->_status_data['date_of_inspection']));
				$this->_status_data['time_of_inspection'] = $this->_status_data['hour_of_inspection'].':'.$this->_status_data['min_of_inspection'];
			
				$q->param(':inspector_id', $this->_status_data['inspector_id'])
					->param(':date_of_inspection', $this->_status_data['date_of_inspection'])	
					->param(':time_of_inspection', $this->_status_data['time_of_inspection']);			
			}		

			//if the status type is Alert, we save the alert message
			if ( $this->_status_data['status'] == 3 && $this->_status_data['message'] != '' )
			{			
				$m_messages = new Model_Messages;
				
				$message_data = array();
				$message_data['from_id'] = $this->actor_user->id;
				$message_data['to_id'] = $this->_data['user_id'];
				$message_data['work_order_id'] = $this->_data['id'];
				$message_data['message'] = $this->_status_data['message'];
				
				if ( $m_messages->check_data($message_data) )
				{
					$m_messages->save();
				}
			}				
			
			$q = $q->execute();		
			
			Database::instance()->commit();	
			
			//email on Scheduled status
			if ($this->_status_data['status'] == 4 )
			{
				$this->_send_schedule_status_notifications();
			}		

			//email on Alert status
			if ($this->_status_data['status'] == 3 )
			{
				$this->_send_alert_status_notifications();				
			}			
			
			$this->_save_activity_feed();
			
		}
		catch( Database_Exception $db_e )
		{	
			Database::instance()->rollback();			
			throw $db_e ;
		}			
		catch( Exception $e )
		{		
			throw $e;
		}			
		
	}
	
	/**
	 * Building up the e-maul data (alert status)
	 */
	protected function _send_alert_status_notifications()
	{
		$email_data = array();
		
		$m_settings = new Model_Settings();
		
		$settings_data = $m_settings->load_by(array('name' => 'email_template_workorder_alert'));
		
		if ( $settings_data === false )
		{
			return false;
		}		
		
		$settings_data = Security::decode($settings_data);
		
		$m_users = new Model_Psusers;
		
		$user = $m_users->load_by( array( 'id' => $this->_data['user_id']) );		

		$template = str_replace('::username::', $user->username, $settings_data->value);
		
		$email_data['message'] = $template;
		
		$email_data['subject'] = 'Trinity - Workorder Alert';
		
		$email_data['email'] = $user->email;
		
		$this->_send_mail($email_data);
		
	}
	
	
	/**
	 * Building up the e-mail data (alert status)
	 */
	protected function _send_completed_status_notifications()
	{
		var_dump('completed');
		$email_data = array();
		
		$m_settings = new Model_Settings();
		
		$settings_data = $m_settings->load_by(array('name' => 'email_template_inspection_completed'));
		
		if ( $settings_data === false )
		{
			return false;
		}		
		
		$settings_data = Security::decode($settings_data);
		
		$m_users = new Model_Admin_Users;
		
		$admins = $m_users->get_by_role(2);
		
		$admin_emails = array();
		
		
		for ($i=0, $mi=count($admins); $i<$mi; $i++)
		{
			array_push($admin_emails, $admins[$i]['email']);
		}

		$template = str_replace('::workorder_id::', $this->_data['id'], $settings_data->value);
		
		$email_data['message'] = $template;
		
		$email_data['subject'] = 'Trinity - Inspection Completed';
		
		$email_data['email'] = $admin_emails;
		
		$this->_send_mail($email_data);
		
	}	
	
	/**
	 * Building up the e-maul data (schedule status)
	 */
	public function _send_schedule_status_notifications()
	{

		$email_data = array();
		
		$m_settings = new Model_Settings();
		
		$settings_data = $m_settings->load_by(array('name' => 'email_template_workorder_scheduled'));
		
		if ( $settings_data === false )
		{
			return false;
		}		
		
		$settings_data = Security::decode($settings_data);
		
		$m_users = new Model_Psusers;
		
		$user = $m_users->load_by( array( 'id' => $this->_data['user_id']) );				
		
		$this->_status_data['date_of_inspection'] = date( 'm/d/Y', strtotime($this->_status_data['date_of_inspection']) ).' at '.$this->_status_data['time_of_inspection'] ;

		$template = str_replace('::username::', $user->username, $settings_data->value);
		
		$template = str_replace('::schedule_date::', $this->_status_data['date_of_inspection'], $template);
		
		$email_data['message'] = $template;
		
		$email_data['subject'] = 'Trinity - Inspection Date';
		
		$email_data['email'] = $user->email;
		
		$this->_send_mail($email_data);
		
	}
	
	/**
	 * Secding e-mail with gearman
	 * @param Array Email data
	 */
	protected function _send_mail($email_data)
	{
		// Create Gearman client
		$client= new GearmanClient();
		
		$client->addServer('127.0.0.1', 4730);		

		$client->addTaskBackground('EmailMessage', json_encode($email_data));
		
		$result = $client->runTasks();		
	}
	
	/**
	 * Saving activity feed
	 */
	protected function _save_activity_feed()
	{
		if ( isset($this->_status_data['status']) )
		{
			$statuses = $this->get_statuses();
			
			$indexed_statuses = array();
			
			for ( $i=0, $mi=count($statuses); $i<$mi; $i++ )
			{
				$indexed_statuses[$statuses[$i]['id']] = $statuses[$i]['name'];
			}
			
			$status_name = ( isset($indexed_statuses[$this->_status_data['status']]) ) ? $indexed_statuses[$this->_status_data['status']] : 'unknown';
			
			Activity_Stream::instance()->add($this->actor_user->id, 'changed status', 'for '.$status_name, $this->_data['id']);
			
		}
		
		if ( isset($this->_inspection_status_data['inspection_status']) )
		{
			$inspection_statuses = $this->get_inspection_statuses();
			
			$indexed_statuses = array();
			
			for ( $i=0, $mi=count($inspection_statuses ); $i<$mi; $i++ )
			{
				$indexed_statuses[$inspection_statuses[$i]['id']] = $inspection_statuses[$i]['name'];
			}
			
			$status_name = ( isset($indexed_statuses[$this->_inspection_status_data['inspection_status']]) ) ? $indexed_statuses[$this->_inspection_status_data['inspection_status']] : 'unknown';
			
			Activity_Stream::instance()->add($this->actor_user->id, 'changed inspection status', 'for '.$status_name, $this->_data['id']);
			
		}		
		
		if ( isset($this->_status_data['status']) && $this->_status_data['status'] == 4 )
		{
			$m_users = new Model_Psusers();
			
			$inspector = $m_users->load_by(array('id' => $this->_status_data['inspector_id']));
		
			Activity_Stream::instance()->add($this->actor_user->id, 'assigned work order', 'for inspector '.$inspector->username, $this->_data['id']);
		}
		
		if ( isset($this->_status_data['status']) && $this->_status_data['status'] == 3 && $this->_status_data['message'] != ''  )
		{
			Activity_Stream::instance()->template('wrote-comment', $this->actor_user->id, $this->_data['id']);									
		}	

		if ( isset($this->_inspection_status_data['status']) && $this->_inspection_status_data['status'] == 3 && $this->_inspection_status_data['message'] != ''  )
		{
			Activity_Stream::instance()->template('wrote-comment', $this->actor_user->id, $this->_data['id']);									
		}			
		
	}

	/**
	 * Gets the list of workorders
	 * Valid values for param: admin, client, inspector
	 * @param string $for_who A param to decide whom the list is queried for
	 * @return array
	 */
	public function get_workorders( $for_who = 'admin', $user_id = null )
	{
		$extra_sql = '';
		switch($for_who)
		{
			case 'client':
				$extra_sql = ' AND w.user_id = '.(int)$user_id;
				break;
			case 'inspector':
				$extra_sql = ' AND w.inspector_id = '.(int)$user_id;
				break;
		}
		
		try
		{
			$this->_sql = 'SELECT w.*, CONCAT(i.first_name, " ", i.last_name) AS inspector_name, CONCAT(c.first_name, " ", c.last_name) AS client_name  FROM '.$this->_table_name.' w
						LEFT JOIN '.$this->_profile_table.' i ON i.user_id = w.inspector_id 
						LEFT JOIN '.$this->_profile_table.' c ON c.user_id = w.user_id 
						WHERE 1 = 1 '.$extra_sql;
			
			$this->_q = DB::query(Database::SELECT, $this->_sql)->execute();
			
			$result = $this->_get_results();
			
			if ( $result !== false )
			{
				return $result;
			}
			
			return array();
		}
		catch(Database_Exception $db_e)
		{
			throw $db_e;
		}
	}

	/* Get work order statuses
	 *
	 * @return Array Work Order statuses
	 */
	public function get_inspection_statuses()
	{
		$sql = 'SELECT * FROM '.$this->_inspection_statuses_table_name;
		
		$q = DB::query(Database::SELECT, $sql)
				->execute();		
				
		if ( $q->count() > 0 )
		{
			return $q->as_array();
		}			
				
		return array();		
	}	
	
	/**
	 * Validate the POST data on inspection status set
	 *
	 * @param Array POST data
	 */
	public function check_inspection_status($post)
	{
		$this->_inspection_status_data = Security::sanitize($post);
		
		//validation here
		
		return true;
	}	
	
	/**
	 * Save the inspection status
	 */
	public function save_inspection_status()
	{
		try
		{
			$this->_data['id'] = (int)$this->_data['id'];	
			
			$this->actor_user = Auth::instance()->is_logged_in();				
			
			// Build query
			$str = 'UPDATE '.$this->_table_name.' SET inspection_status = :inspection_status WHERE id = :id ';

			$q = DB::query(Database::UPDATE, $str)
					->param(':inspection_status', $this->_inspection_status_data['inspection_status'])
					->param(':id', $this->_data['id']);

			//if the status type is Alert, we save the alert message
			if ( $this->_inspection_status_data['inspection_status'] == 3 && $this->_inspection_status_data['message'] != '' )
			{			
				$m_messages = new Model_Messages;
				
				$message_data = array();
				$message_data['from_id'] = $this->actor_user->id;
				$message_data['to_id'] = $this->_data['user_id'];
				$message_data['work_order_id'] = $this->_data['id'];
				$message_data['message'] = $this->_inspection_status_data['message'];
				
				if ( $m_messages->check_data($message_data) )
				{
					$m_messages->save();
				}
			}				
			
			$q = $q->execute();		

			//email on Alert status
			if ($this->_inspection_status_data['inspection_status'] == 3 )
			{
				$this->_send_alert_status_notifications();				
			}			

			//email on Alert status
			if ($this->_inspection_status_data['inspection_status'] == 4 )
			{
				$this->_send_completed_status_notifications();				
			}
			
			$this->_save_activity_feed();
			
		}
		catch( Database_Exception $db_e )
		{	
			throw $db_e ;
		}			
		
	}	
	
	/**
	 * Set if pdf generated for the workorder
	 * @param Int 1 - if is generated or 0 - if is not generated 
	 * @param String Status  Generate Status: ('generating', 'error', 'generated')
	 * @param Int 1 - if is generated or 0 - if is not generated 
	 */
	public function save_generated_pdf($value, $status, $date=null)
	{
		$str = 'UPDATE '.$this->_table_name.' SET is_generated_pdf = :value, generate_report_status = :status, last_generated = :date  WHERE id = :id  ';

		$q = DB::query(Database::UPDATE, $str)
				->param(':value', $value)
				->param(':status', $status)
				->param(':date', $date)
				->param(':id', $this->_data['id']);			
		
		$q = $q->execute();				
	}
	
	/**
	 * Sending the pdf in email
	 * Building up the e-maul data (schedule status)
	 */
	public function _send_report()
	{

		$email_data = array();
		
		$m_settings = new Model_Settings();
		
		$settings_data = $m_settings->load_by(array('name' => 'email_template_generated_report'));
		
		if ( $settings_data === false )
		{
			return false;
		}		
		
		$settings_data = Security::decode($settings_data);
		
		$m_users = new Model_Psusers;
		
		$user = $m_users->load_by( array( 'id' => $this->_data['user_id']) );				

		$template = str_replace('::username::', $user->username, $settings_data->value);
		
		$template = str_replace('::workorder_id::', $this->_data['id'], $template);
		
		$email_data['message'] = $template;
		
		$email_data['subject'] = 'Trinity - Work Order Report';
		
		$email_data['email'] = $user->email;
		
		$path = APPPATH.'media/inspections/'.$this->_data['id'].'/Report.pdf';		
		
		if ( !file_exists($path) )
		{
			return false;
		}
		
		$email_data['attachment'] = $path;
		
		$this->_send_mail($email_data);
		
		return true;
		
	}	

}