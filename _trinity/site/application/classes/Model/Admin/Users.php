<?php
/**
 * Users model for admin
 * @uses Model_Psusers
 */
class Model_Admin_Users extends Model_Psusers
{
	
	public $_roles_users_table = 'auth_roles_users';
	public $_roles_table = 'auth_roles';

	/**
	 * Return the users by role
	 * @param Int Role ID
	 */
	public function get_by_role($role_id)
	{
		$sql = 'SELECT * FROM '.$this->_roles_users_table. ' ru
					 LEFT JOIN '.$this->_table_name.' u ON ru.user_id = u.id  
						WHERE ru.role_id = :role_id';
						
		$q = DB::query(Database::SELECT, $sql)
							->param(':role_id', $role_id)
							->execute();		
							
		if ( $q->count() > 0 )
		{
			$q = $q->as_array();
		}
		else
		{
			$q = array();
		}				
		
		return $q;
	}
	
	/**
	 * Return users for admins usermanagement (Superadmin users will not be returned)
	 * @return Array Users
	 */
	public function get_userlist(array $filter = null)
	{
		$sql = 'SELECT u.* FROM '.$this->_roles_users_table. ' ru
					 LEFT JOIN '.$this->_table_name.' u ON ru.user_id = u.id  
						LEFT JOIN '.$this->_roles_table.' r ON r.id = ru.role_id  
							WHERE r.code != "superadmin" ';
							
		if ( !empty($filter) )
		{
			$sql .= ' AND ';
			
			$parameters = array();
			
			foreach($filter as $key => $value)
			{
				array_push($parameters, 'u.'.$key.'='.$value);
			}
			
			$sql .= implode(' AND ', $parameters);

		}								
		
		$sql .=	' GROUP BY u.id';
						
		$q = DB::query(Database::SELECT, $sql)
							->execute();		
							
		if ( $q->count() > 0 )
		{
			$q = $q->as_array();
		}
		else
		{
			$q = array();
		}				
		
		return $q;		
	}
	
	/**
	 * Check if a user can be hard deleted 
	 * If a user is linked to a workorder as a client or as an inspector, this cannot be deleted
	 *
	 * @param User ID
	 * @return Bool
	 */
	public function check_users_connections($id)
	{
		$sql = 'SELECT COUNT(*) FROM work_orders 
						WHERE user_id =:id OR inspector_id = :id';
						
		$q = DB::query(Database::SELECT, $sql)
							->param(':id', $id)
							->execute();			

		$r = $q->as_array();
		
		return !(bool)$r[0]['COUNT(*)'];
		
		
	}
}