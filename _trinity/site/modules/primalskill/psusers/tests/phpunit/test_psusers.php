<?php
/**
 * Unit test for users model
 */
class Test_Users extends PHPUnit_Framework_TestCase
{
	protected $_m_users = null;
	
	protected function setUp()
	{
		// Instantiate the model
		$this->_m_users = new Model_Psusers();
		
		// We have to set the table names to test ones, but first we have to create the test tables
		$q = DB::query(Database::INSERT, 'CREATE TABLE IF NOT EXISTS test_auth_users LIKE auth_users')->execute();
		$q = DB::query(Database::INSERT, 'CREATE TABLE IF NOT EXISTS test_auth_roles_users LIKE auth_roles_users')->execute();
//		$q = DB::query(Database::INSERT, 'CREATE TABLE IF NOT EXISTS test_users_password_codes LIKE users_password_codes')->execute();
//		$q = DB::query(Database::INSERT, 'CREATE TABLE IF NOT EXISTS test_user_profiles LIKE user_profiles')->execute();
		
		$this->_m_users->change_table_name();
		$this->_m_users->roles_users_table = 'test_auth_roles_users';
//		$this->_m_users->password_codes_table = 'test_users_password_codes';
//		$this->_m_users->_profile_table = 'test_user_profiles';
	}
	
	/**
	 * Testing the signup process
	 * We call one function for sign-up, since the otehrs are inner functions, protected ones
	 */
	public function testSignup()
	{
		
		// First we simply call the sign-up function with no data to call the return errors function
		$this->assertFalse($this->_m_users->sign_up(array()));
		
		$this->assertTrue(is_array($this->_m_users->return_errors()));
		
		// Then we populate a test array with correct data and create a user
		$data = array(
			'username' => 'testphpunit',
			'email' => 'test@test.com',
			'password' => '123456',
			'confirm-password' => '123456'
		);
		
		$this->assertTrue($this->_m_users->sign_up($data));
		
		$user = $this->_m_users->load_by(array('username' => 'testphpunit'));
		
		// Activate the user
		$this->assertTrue($this->_m_users->activate());
		
		// Now delete the test user
		$this->assertTrue($this->_m_users->delete());
	}
	
	/**
	 * Used to test a password reset or recovery
	 */
/*	public function testPassword()
	{
		// We have to make a user for testing
	
		// Then we populate a test array with correct data and create a user
		$data = array(
			'username' => 'testphpunit',
			'email' => 'test@test.com',
			'password' => '123456',
			'confirm-password' => '123456',
			'first_name' => 'Test',
			't_and_c' => '1'
		);
		
		$this->assertTrue($this->_m_users->sign_up($data));
		
		$user = $this->_m_users->load_by(array('username' => 'testphpunit'));
		
		// Now the user is loaded, generate a code
		$this->assertTrue($this->_m_users->generate_password_code());
		
		// Get the code
		$code = $this->_m_users->get_pwcode_by(array('user_id' => $this->_m_users->id));
		$code = $code['code'];
		$this->assertInternalType('string', $code);
		
		// Get by code to test
		$user_id = $this->_m_users->get_pwcode_by(array('code' => $code));
		$user_id = $user_id['user_id'];
		$this->assertTrue(is_numeric($user_id));
		
		// Now delete the code and the user
		$this->assertTrue($this->_m_users->generate_password_code(true));
		
		$this->assertTrue($this->_m_users->delete());
	}
*/	
	protected function tearDown()
	{
		// The model gets cleaned up automatically, but we have to delete the test tables
		$q = DB::query(Database::DELETE, 'DROP TABLE IF EXISTS test_auth_users')->execute();
		$q = DB::query(Database::DELETE, 'DROP TABLE IF EXISTS test_auth_roles_users')->execute();
		$q = DB::query(Database::DELETE, 'DROP TABLE IF EXISTS test_users_password_codes')->execute();
		$q = DB::query(Database::DELETE, 'DROP TABLE IF EXISTS test_user_profiles')->execute();
	}
}