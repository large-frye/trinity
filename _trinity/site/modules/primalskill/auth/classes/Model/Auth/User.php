<?php

/**
 * This class represents a user row as an object. It uses auth_users table to retrieve the data.
 *
 * @version 1.0
 *
 */
class Model_Auth_User extends Model_Database
{
	/**
	 * @var string The users table name
	 */
	protected $_table_name = 'auth_users';
	
	/**
	 * @var Table columns available in the users table.
	 */
	protected $_table_columns = array
	(
		'id',
		'username',
		'password',
		'pw_salt',
		'created_on_utc',
		'modified_on_utc',
		'session_id',
		'email',
		'activation_code',
		'deleted',
		'banned',
		'fb_id',
		'gplus_id'		
	);
	
	/**
	 * @var array Which data should the Users object hold that's needed for authentication.
	 */
	protected $_data = array
	(
		'id' => null,
		'username' => '',
		'password' => '',
		'pw_salt' => '',
		'created_on_utc' => '',
		'modified_on_utc' => '',
		'session_id' => '',
		'roles' => null,
		'permissions' => null,
		'email' => '',
		'activation_code' => '',
		'deleted' => 0,
		'banned' => 0,
		'fb_id' => '',
		'gplus_id' => '',
		
		'is_loaded' => false
	);
	
	/**
	 * Get a row from the users table given by specific columns such as id, username, etc. and load it into the object.
	 * Example:
	 * load_by( array('username' => 'test') );
	 *
	 * @param array Where clause by which to filter the table rows.
	 * @return object Returns the Model_Auth_User so it's chainable.
	 *
	 */
	public function load_by(Array $by)
	{
		$this->_data['is_loaded'] = false;
		
		$q = DB::select_array($this->_table_columns)
				->from($this->_table_name)
				->limit(1);
		
		if (! empty($by) )
		{
			foreach ($by as $key => $value)
			{
				$q = $q->where($key, '=', $value);
			}
		}
		
		$q = $q->execute();
		
		if ( $q->count() > 0 )
		{
			$r = $q->as_array();
			$r = $r[0];
			
			foreach ($r as $key => $value)
			{
				if ( array_key_exists($key, $this->_data) )
				{			
					$this->_data[$key] = $value;
				}
			}
			
			$this->_data['is_loaded'] = true;
		}
	
		return $this;
	}
	
	/**
	 * Updates the session ID in the users table.
	 *
	 * @return boolean
	 *
	 */
	public function update_session_id()
	{
		if ( $this->_data['is_loaded'] === false ) { return false; }
		
		$r = DB::update($this->_table_name)
				->set(array('session_id' => $this->_data['session_id']))
				->where('id', '=', $this->_data['id'])
				->execute();
		
		return (bool) $r;
	}
	
	/**
	 * PHP Magic method for getting dynamic class properties
	 * Example:
	 * $user = Model_Auth_User::factory();
	 * echo $user->username;
	 * 
	 * @param string The key which must exist in $this->_data.
	 * @return string Returns the _data array item if exists.
	 */
	public function __get($key)
	{
		if ( array_key_exists($key, $this->_data) )
		{
			return $this->_data[$key];
		}
		
		throw new Auth_Exception('Object property :key does not exist in :class', array(':key' => $key, ':class' => get_class($this)));
	}
	

	/**
	 * PHP Magic method for setting dynamic class properties
	 * Example:
	 * $user = Model_Auth_User::factory();
	 * echo $user->username = 'test';
	 * 
	 * @param string The key which must exist in $this->_data.
	 * @param string The value to which you want to set the data.
	 * @return void
	 */	
	public function __set($key, $value)
	{
		if ( array_key_exists($key, $this->_data) ) 
		{
			$this->_data[$key] = $value;
			return;
		}

		throw new Auth_Exception('Object property :key does not exist in :class', array(':key' => $key, ':class' => get_class($this)));
	}
	
	
	/**
	 * PHP Magic method for verifying dynamic class properties.
	 *
	 * @return boolean True if exists, False is not.
	 *
	 */
	public function __isset($key)
	{
		return isset($this->_data[$key]);
	}
	
	
	/**
	 * Sleep method for serialization
	 *
	 * @return array
	 */
	public function __sleep()
	{
		// Store only information about the object without db property
		return array_diff(array_keys(get_object_vars($this)), array('_db'));
	}
}