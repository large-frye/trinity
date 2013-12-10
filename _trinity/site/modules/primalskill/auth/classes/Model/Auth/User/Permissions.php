<?php

/**
 * This class represents a user's permissions as an object. It uses auth_permissions and auth_roles_permissions tables to retrieve the data.
 *
 * @version 1.0
 *
 */
class Model_Auth_User_Permissions extends Model_Database
{
	/**
	 * @var string The permissions table name
	 */
	protected $_table_name = 'auth_permissions';

	/**
	 * @var string The permissions lookup table name
	 */
	protected $_lookup_table_name = 'auth_roles_permissions';
		
	/**
	 * @var Table columns to retrieve in the permissions table.
	 */
	protected $_table_columns = array
	(
		'id',
		'variable'
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
	 * Get the user's permissions based on the user's roles if any. 
	 *
	 * @param array Role IDs by which to retrieve the permissions.
	 * @return object It will return the Model_Auth_Permissions object.
	 *
	 */
	public function load(Array $role_ids)
	{
		$this->_is_loaded = false;
		if ( empty($role_ids) ) { return false; }
		
		$q = DB::select_array($this->_table_columns)
				->from($this->_lookup_table_name)
				->join($this->_table_name)
					->on($this->_table_name .'.id', '=', $this->_lookup_table_name .'.permission_id')
				->where($this->_lookup_table_name .'.role_id', 'IN', $role_ids)
				->group_by($this->_lookup_table_name .'.permission_id')
				->execute();
		
		if ($q->count() > 0)
		{
			$this->_data = $q->as_array();
			$this->_is_loaded = true;
		}
		
		return $this;
	}
	
	/**
	 * @return boolean TRUE if the data was loaded successfully.
	 */
	public function is_loaded()
	{
		return $this->_is_loaded;
	}
	
	
	/**
	 * Checks wether a user can perform the given permission.
	 *
	 * @param string The permission variable to check.
	 * @return boolean
	 *
	 */
	public function can($permission_variable = null)
	{
		if ( $this->is_loaded() === false ) { return false; }
		
		for ($i=0, $mi=count($this->_data); $i<$mi; $i++)
		{
			if ( $this->_data[$i]['variable'] == $permission_variable )
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