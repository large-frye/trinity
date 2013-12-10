<?php

/**
 * This class represents a user's roles as an object. It uses auth_roles and auth_roles_users tables to retrieve the data.
 *
 * @version 1.0
 *
 */
class Model_Auth_User_Roles extends Model_Database
{
	/**
	 * Role types
	 */
	const TYPE_NORMAL = 1;
	const TYPE_SPECIAL = 2;
	const TYPE_MANAGEMENT = 3;
	
	
	/**
	 * @var string The roles table name
	 */
	protected $_table_name = 'auth_roles';

	/**
	 * @var string The roles lookup table name
	 */
	protected $_lookup_table_name = 'auth_roles_users';
		
	/**
	 * @var Table columns to retrieve from the roles table.
	 */
	protected $_table_columns = array
	(
		'id',
		'code',
		'type'		
	);
	
	
	/**
	 * @var array This will hold the data from the database.
	 */
	protected $_data = array();
	
		
	/**
	 * @var boolean Flag to verify if data was loaded or not.
	 */	
	protected $_is_loaded = false;
	
	
	/**
	 * Get the user's roles if any. 
	 *
	 * @param object Model_Auth_User class passed by reference in order to get the User ID.
	 * @return object Model_Auth_Role object.
	 *
	 */
	public function load(Model_Auth_User &$user)
	{
		$this->_is_loaded = false;
		
		$q = DB::select_array($this->_table_columns)
				->from($this->_table_name)
				->join($this->_lookup_table_name, 'LEFT')
					->on($this->_lookup_table_name .'.role_id', '=', $this->_table_name .'.id') 
				->where($this->_lookup_table_name .'.user_id', '=' , $user->id)
				->group_by($this->_table_name .'.id')
				->execute();
		
		if ($q->count() > 0)
		{
			$this->_data = $q->as_array();
			$this->_is_loaded = true;
		}
		
		return $this;
	}
	
	
	/**
	 * Get the role ids
	 *
	 * @return array Returns an array containing the role IDs.
	 *
	 */
	public function get_ids()
	{
		$tmp = array();
		
		if ( $this->is_loaded() === true )
		{
			for ($i=0, $mi=count($this->_data); $i<$mi; $i++)
			{
				array_push($tmp, $this->_data[$i]['id']);
			}			
		}
		
		return $tmp;
	}
	
	/**
	 * @return boolean TRUE if the data was loaded successfully.
	 */
	public function is_loaded()
	{
		return $this->_is_loaded;
	}
	
	
	/**
	 * Verifies wether the user has the role
	 *
	 * @param string The Role's code.
	 * @return boolean 
	 *
	 */
	public function has($role_code = null)
	{
		if ($this->is_loaded() === false) { return false; }
		
		for ($i=0, $mi=count($this->_data); $i<$mi; $i++)
		{
			if ( $this->_data[$i]['code'] == $role_code )
			{
				return true;
			}
		}
		
		return false;
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