<?php
/**
 * Model for handling auth permissions and roles, also the mapping between them
 */
class Model_Psroles extends Kohana_Model
{
	public $_permissions_table = 'auth_permissions';
	public $_roles_table = 'auth_roles';
	public $_users_table = 'auth_users';
	public $_roles_users_table = 'auth_roles_users';
	public $_roles_permissions_table = 'auth_roles_permissions';
	
	/**
	 * Loads permissions or roles by given parameters
	 * @param array $by Associative array with column name and value
	 * @param string $from Decides from where to get the values - can be permissions, roles or users
	 * @return array
	 */
	public function load_values_by(Array $by, $from = 'permissions')
	{
		switch($from)
		{
			case 'permissions':
				$valid_columns = array('id', 'variable', 'description');
				$table = $this->_permissions_table;
				break;
			case 'roles':
				$valid_columns = array('id', 'code', 'name', 'type');
				$table = $this->_roles_table;
				break;
			case 'users':
				$valid_columns = array('id', 'username', 'email');
				$table = $this->_users_table;
				break;
			default:
				$valid_columns = array('id', 'variable', 'description');
				$table = $this->_permissions_table;
		}
		
		try
		{
			$sql = 'SELECT * FROM '.$table.' WHERE 1 = 1 ';
			foreach( $by as $key => $value )
			{
				if ( in_array($key, $valid_columns) )
				{
					$sql .= ' AND '.$key.' = :'.$key;
				}
			}
			
			$query = DB::query(Database::SELECT, $sql);
			foreach( $by as $key => $value )
			{
				if ( in_array($key, $valid_columns) )
				{
					$query->param(':'.$key, $value);
				}
			}
			
			$query = $query->execute();
			
			if ( $query->count() > 0 )
			{
				return $query->as_array();
			}
			
			return array();
		}
		catch(Database_Exception $db_e)
		{
			throw $db_e;
		}
	}
	
	public function load_mapping()
	{
		
	}
}