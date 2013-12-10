<?php 

/**
 * Driver for Psrole for handling the users -> ONLY GETTING DATA
 */
class Model_Psroles_User extends Model_Psroles
{
	public function __construct()
	{
		$this->_valid_columns = array('id', 'username', 'email');
		$this->_main_table = $this->_users_table;
	}
	
	public function save()
	{
		return false;
	}

}