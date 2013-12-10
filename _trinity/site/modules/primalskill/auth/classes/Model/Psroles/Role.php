<?php

/**
 * Driver for Psrole for handling the roles
 */
class Model_Psroles_Role extends Model_Psroles
{
	public function __construct()
	{
		$this->_valid_columns = array('id', 'code', 'name', 'type');
		$this->_main_table = $this->_roles_table;
		$this->_mapping_table = $this->_roles_permissions_table;
		$this->_slug_required = 'code';
	}
	/**
	 * Loads data from the mapping tables based on the parameters
	 * Can load all the mappings, or just the ones belonging to a given item
	 * @param int $by_id A valid id to load mappings by, but if left null, all the mappings are loaded
	 * @param string $mapping The mapping which to load
	 * @return array
	 */
	public function load_mapping($by_id = null, $mapping = 'roles_users')
	{
		switch($mapping)
		{
			case 'roles_users':
				$sql = 'SELECT m.*, u.username, r.code, r.name, r.type 
						FROM '.$this->_roles_users_table.' m
						LEFT JOIN '.$this->_users_table.' u ON u.id = m.user_id
						LEFT JOIN '.$this->_roles_table.' r ON r.id = m.role_id';
				
				if ( $by_id != null )
				{
					$sql .= ' WHERE m.user_id = :by_id';
				}
				break;
			case 'roles_permissions':
				$sql = 'SELECT m.*, r.code, p.variable, p.description
						FROM '.$this->_roles_permissions_table.' m
						LEFT JOIN '.$this->_roles_table.' r ON r.id = m.role_id
						LEFT JOIN '.$this->_permissions_table.' p ON p.id = m.permission_id';
				
				if ( $by_id != null )
				{
					$sql .= ' WHERE m.role_id = :by_id';
				}
				break;
			default:
				return array();
		}
		
		try
		{
			$query = DB::query(Database::SELECT, $sql)
					->param(':by_id', (int)$by_id)
					->execute();
					
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
	
	/**
	 * Add mapping
	 * Can add to both mapping tables
	 * IMPORTANT! This function takes the full mapping, deletes the old values and reinserts the mapping
	 * @param int $linked_id The id of the parent object - things get linked to this
	 * @param array $link_to An array with the ids that get linked to the parent
	 * @param string $mapping To decide which mapping table to use
	 * @return boolean
	 */
	public function add_mapping($linked_id = null, Array $link_to, $mapping = 'roles_users')
	{
		if ( $linked_id == null || !is_numeric($linked_id) )
		{
			return false;
		}
		
		switch($mapping)
		{
			case 'roles_users':
				$parent = 'user_id';
				$child = 'role_id';
				$table = $this->_roles_users_table;
				break;
			case 'roles_permissions':
				$parent = 'role_id';
				$child = 'permission_id';
				$table = $this->_roles_permissions_table;
				break;
		}
		
		$insert = 'INSERT INTO '.$table.'('.$parent.', '.$child.') VALUES(:'.$parent.', :'.$child.')';
		
		try
		{
			$c_val = 0;
			$i_q = DB::query(Database::INSERT, $insert)
					->bind(':'.$parent, $linked_id)
					->bind(':'.$child, $c_val);
			
			Database::instance()->begin();
			
			$del = DB::query(Database::DELETE, 'DELETE FROM '.$table.' WHERE '.$parent.' = :id')
					->param(':id', intval($linked_id))
					->execute();
					
			for( $i = 0, $max = count($link_to); $i < $max; $i++ )
			{
				$c_val = intval($link_to[$i]);
				$i_q->execute();
			}
			
			Database::instance()->commit();
			
			return true;
		}
		catch(Database_Exception $db_e)
		{
			Database::instance()->rollback();
			throw $db_e;
		}
	}
	
	/**
	 * Validate incoming data
	 * There are two things to validate: roles and permissions
	 * @param array $post The incoming POST array
	 * @param string $type Decides what to validate
	 * @return boolean
	 */
	public function validate($post = array())
	{
		if ( !empty($this->_data) )
		{
			$config = Kohana::$config->load('psroles');
			$default_role = $config['default'];
			
			if ( $this->_data['code'] == 'superadmin' || $this->_data['code'] == $default_role )
			{
				$this->_errors['code'] = __('Cannot edit superadmin or default role');
				return false;
			}
		}
		
		$this->_post_data = Psk_Security::sanitize($post);
		
		$required = 'code';
		
		$val = Validation::factory($this->_post_data)
				->rule($required, 'not_empty');
		
		if ( $val->check() )
		{
			try
			{
				$this->_post_data[$required] = $this->generate_slug($this->_post_data[$required]);
			}
			catch(Database_Exception $db_e)
			{
				throw $db_e;
			}
			return true;
		}
		else
		{
			$this->_errors = $val->errors('psroles');
		}
		
		return false;
	}
	
	/**
	 * Deletes a role or permission that is loaded into the _data variable
	 * @return boolean
	 */
	public function delete()
	{
		if ( !empty($this->_data) )
		{
			$config = Kohana::$config->load('psroles');
			$default_role = $config->get('default');
			
			if ( $this->_data['code'] == 'superadmin' || $this->_data['code'] == $default_role )
			{
				$this->_errors['code'] = __('Cannot delete superadmin or default role');
				return false;
			}
		}
		else
		{
			return false;
		}
		
		$col = 'role_id';
		
		try
		{
			Database::instance()->begin();
			
			$q = DB::query(Database::DELETE, 'DELETE FROM '.$this->_main_table.' WHERE id = :id')
					->param(':id', $this->_data['id'])
					->execute();
					
			$q = DB::query(Database::DELETE, 'DELETE FROM '.$this->_roles_permissions_table.' WHERE '.$col.' = :id')
					->param(':id', $this->_data['id'])
					->execute();
			
			$q = DB::query(Database::DELETE, 'DELETE FROM '.$this->_roles_users_table.' WHERE '.$col.' = :id')
					->param(':id', $this->_data['id'])
					->execute();
			
			Database::instance()->commit();
			return true;
		}
		catch(Database_Exception $db_e)
		{
			Database::instance()->rollback();
			throw $db_e;
		}
	}
}