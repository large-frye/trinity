<?php
/**
 * Model which handles the messages
 *
 */
class Model_Messages extends Model_Core
{

	/**
	 * @var array Holds the column names of the table that holds the data
	 */
	protected $_table_columns = array(
		'id',
		'work_order_id',
		'date_time_utc',
		'from_id',
		'to_id',
		'type',
		'subject',
		'message',
		'status'
	);
	
	/**
	 * @var string The name of the table - needs to be public for testing purposes
	 */
	public $_table_name = 'messages';
	
	/**
	 * @var array Holds the data that gets served through the php magical functions
	 */
	protected $_data = array(
		'id' => null,
		'work_order_id' => null,
		'date_time_utc' => '0000-00-00 00:00:00',
		'from_id' => null,
		'to_id' => null,
		'type' => null,
		'subject' => null,
		'message' => null,
		'is_checked' => false,
		'status' => 0
	);		
	
	public $status = array(
		0 => 'unread',
		1 => 'read'
	);
	
	public $type = array(
		0 => 'admin_inspector',
		1 => 'inspector_admin',	
		2 => 'admin_client',	
		3 => 'inspector_client'	
	);
	
	/**
	 * Checks if the message in the post is ok and can be saved
	 *
	 * @param array $post The POST data
	 * @return boolean | array True if data is ok, validation errors otherwise
	 */	
	public function check_data($post)
	{
		// Sanitize the post and pass to inner variable
		$this->_post_data = Security::sanitize($post);		
		
		$val = Validation::factory($this->_post_data)
				->rule('message', 'not_empty');

		// If all ok, set the data and return true
		if ( $val->check() )
		{
			foreach ( $this->_data as $key => $value )
			{
				$this->_data[$key] =  isset($this->_post_data[$key])? $this->_post_data[$key] : $value;
			}
			
			$this->_data['is_checked'] = true;
			
			return true;
		}
		
		return $val->errors('validation/workorders');		
	}
	
	/**
	 * Save the message into database
	 *
	 * @return Bool
	 */
	public function save()
	{
		
		if ( $this->_data['is_checked'] !== true )
		{
			return false;
		}
	
		// We have an insert to do
		// Unset id since we have an insert
		$data = $this->_table_columns;
		unset($data['id']);
		
		$this->_data['date_time_utc'] = date('Y-m-d H:i:s');
		
		try
		{
		
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
				
			/*	if ( $this->_data['type'] == 'admin_client' || $this->_data['type'] == 'inspector_client' )
				{
					$this->_send_mail();
				}
			*/	
				return true;
			}
			
			return false;				
		}
		catch( Exception $e )
		{
			throw $e;
		}
	}
	
	/**
	 * Edit a message
	 *
	 * @param Int message Id
	 */
	public function edit($id)
	{
		if ( $this->_data['is_checked'] !== true )
		{
			return false;
		}
		
		try
		{
			$sql = 'UPDATE '.$this->_table_name.' SET subject = :subject, message = :message WHERE id = :id ';

			$q = DB::query(Database::UPDATE, $sql)
					->parameters
						(
							array
							(
								':subject' => $this->_post_data['subject'],
								':message' => $this->_post_data['message']
							)
						)
					->execute();
					
			if ( $q->count() > 0 )
			{
				return true;
			}				
			
			return false;
		}
		catch( Exception $e)
		{
			throw $e;
		}
	}
	
	/**
	 * Get message(s) from the database by different filters. ( ex. $by = array('work_order_id' => 121) )
	 *
	 * @param Int Workorder Id
	 */
	public function get( Array $by )
	{
		$sql = 'SELECT m.*, frm.username AS from_username FROM '.$this->_table_name.' m
					LEFT JOIN auth_users frm ON frm.id = m.from_id ';
		
	/*	if ( !empty($by) )
		{
			foreach( $by as $key => $value )
			{
				if ( in_array($key, $this->_table_columns) )
				{
					$sql .= ' AND m.'.$key.' = :'.$key;
				}
			}
		}*/
		
		if ( !empty($by) )
		{
			$sql .= ' WHERE ';
			
			$parameters = array();
			
			foreach($by as $key => $value)
			{
				array_push($parameters, 'm.'.$key.'='.$value);
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
			
			return $result;
		}
		
		return array();		
		
	}
	
	/**
	 * Sending a mail to the client which contains the message
	 */
	public function _send_to_client()
	{
		// Create Gearman client
		$client= new GearmanClient();
		$client->addServer('127.0.0.1', 4730);
		
		$email_data = array();
		
		$m_settings = new Model_Settings();
		
		$settings_data = $m_settings->load_by(array('name' => 'email_template_message_for_client'));
		
		if ( $settings_data === false )
		{
			return false;
		}		
		
		$settings_data = Security::decode($settings_data);
		
		$m_users = new Model_Psusers;
		
		$user = $m_users->load_by( array( 'id' => $this->_data['to_id']) );

		$template = str_replace('::username::', $user->username, $settings_data->value);
		$template = str_replace('::message::', $user->_data['message'], $template);
		
		$email_data['message'] = $template;
		
		$email_data['subject'] = 'Trinity - Work Order Comment';
		
		$email_data['email'] = $user->email;
		
		$client->addTaskBackground('EmailMessage', json_encode($email_data));
		
		$result = $client->runTasks();				
	}
	
	
}