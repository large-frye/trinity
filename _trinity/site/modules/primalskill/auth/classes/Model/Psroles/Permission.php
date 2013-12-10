<?php 

/**
 * Driver for Psrole for handling the roles
 */
class Model_Psroles_Permission extends Model_Psroles
{
	public function __construct()
	{
		$this->_valid_columns = array('id', 'variable', 'description');
		$this->_main_table = $this->_permissions_table;
		$this->_slug_required = 'variable';
	}
	
	/**
	 * Validate incoming data
	 * There are two things to validate: roles and permissions
	 * @param array $post The incoming POST array
	 * @param string $type Decides what to validate
	 * @return boolean
	 */
	public function validate($post = array(), $type = 'role')
	{
		$this->_post_data = Psk_Security::sanitize($post);
		
		$required = 'variable';

		$val = Validation::factory($this->_post_data)
				->rule($required, 'not_empty');
		
		if ( $val->check() )
		{
			try
			{
				$this->_post_data[$required] = $this->generate_slug($this->_post_data[$required], $type);
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
		if ( empty($this->_data) )
		{
			return false;
		}
		
		$col = 'permission_id';
		
		try
		{
			Database::instance()->begin();
			
			$q = DB::query(Database::DELETE, 'DELETE FROM '.$this->_main_table.' WHERE id = :id')
					->param(':id', $this->_data['id'])
					->execute();
					
			$q = DB::query(Database::DELETE, 'DELETE FROM '.$this->_roles_permissions_table.' WHERE '.$col.' = :id')
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