<?php

/**
 * Custom authentication class
 * 
 * @author Primal Skill
 * @version 2.0
 *
 */
class Auth
{	
	/**
	 * @var object Holds the configuration file
	 */
	protected $_config = array();


	/**
	 * @var array Auth instances for each config file
	 */
	public static $instances = array();

	/**
	 * @var object The user model (Model_Auth_User)
	 */
	protected $_user = null;
	
	/**
	 * Singleton pattern for instantiating the Auth class
	 *
	 * @param string The name of the config file to load
	 * @return object The Auth object
	 *
	 */
	public static function instance($config_file = 'auth')
	{
		if (! isset(Auth::$instances[$config_file]) )
		{
			Auth::$instances[$config_file] = new Auth($config_file);
		}
		
		return Auth::$instances[$config_file];
	}
	
	/**
	 * Function for creating a psroles instance
	 * @return Psroles
	 */
	public static function Psroles($type = null)
	{
		return Model_Psroles::factory($type);
	}
	
	/**
	 * Instantiate the Auth
	 *
	 * @param string The name of the config file to load
	 * @return void
	 *
	 */
	protected function __construct($config_file = 'auth')
	{
		// Load the config 
		$this->_config = Kohana::$config->load($config_file);
		// Just check a key from the config to see if it was loaded or not
		if (! isset($this->_config->hash_method) )
		{
			throw new Auth_Exception('The configuration file :file was not found.', array(':file' => $config_file));
		}		
	}
	
	
	/** 
	 * Auto login a user, without using the password. It is used in a controlled environment
	 * (no user input, it is directly from the database)
	 *
	 * @uses Model_Auth_User
	 * @uses Model_Auth_User_Roles
	 * @uses Model_Auth_User_Permissions
	 *
	 * @return bool
	 */
	public function auto_login( Model_Auth_User $m_user )
	{
		// Login was successful, load the user's Roles and Permissions
		$this->_user = $m_user;
		
		$m_roles = new Model_Auth_User_Roles();
		$this->_user->roles = $m_roles->load($m_user);
			
		unset($m_roles);
						
		$m_permissions = new Model_Auth_User_Permissions();
		$this->_user->permissions = $m_permissions->load( $this->_user->roles->get_ids() );
		
		unset($m_permissions);
		

		// Save the user model in the session
		$this->_save_session();
		
		return true;
	}
	
	
	/**
	 * Logs in the User, creates the user model and saves it in the user's session
	 * 
	 * @param string The username
	 * @param string The password
	 * @return object|false Returns saved session of Model_Auth_User, false if login failed
	 *
	 */
	public function login($username = null, $password = null)
	{
		// Sanitize input, because in most of the cases it's passed directly to the method.
		$username = Psk_Security::sanitize($username);
		$password = Psk_Security::sanitize($password);
		
		// Get our User's model
		$this->_user = new Model_Auth_User();
		
		// Load the user's data into the object.
		$this->_user->load_by( array('username' => $username) );
		
		if ( $this->_user->is_loaded === true )
		{
			// Hash the unencrypted password against the pw_salt from the users table.
			$hashed_password = $this->hash_password($password, $this->_user->pw_salt);
			// Match the hashed passwords
			if ( $this->_user->password === $hashed_password['hash'] )
			{
				// Login was successful, load the user's Roles and Permissions
				$m_roles = new Model_Auth_User_Roles();
				$this->_user->roles = $m_roles->load($this->_user);
				
				unset($m_roles);
								
				$m_permissions = new Model_Auth_User_Permissions();
				$this->_user->permissions = $m_permissions->load( $this->_user->roles->get_ids() );
				
				unset($m_permissions);
				

				// Save the user model in the session
				$this->_save_session();
				
				return $this->is_logged_in();
			}
		}

		return false;
	}
	
	/**
	 * Log out the user and delete the session.
	 *
	 * @return boolean
	 *
	 */
	public function logout()
	{
		$user = Session::instance()->get($this->_config->session_key, false);
		
		try
		{
			$q = DB::query(Database::UPDATE, 'UPDATE auth_users SET session_id = "" WHERE id = :id')
					->param(':id', (int)$user->id)
					->execute();
		}
		catch(Exception $db_e){}
		
		$session = Session::instance();
		$session->delete($this->_config->session_key);
		$session->regenerate();
		
		unset($session);
		
		return ! $this->is_logged_in();
	}
	
	/**
	 * Verifies if a user is logged in.
	 *
	 * @return object|boolean If logged in it will return Model_Auth_User fro the session, false otherwise.
	 */
	public function is_logged_in()
	{
		return $this->get_user();
	}
	
	
	/**
	 * Get the logged in user
	 *
	 * @return object|boolean Model_Auth_User from the session or false otherwise.
	 */	
	public function get_user()
	{
		return Session::instance()->get($this->_config->session_key, false);
	}
	
	
	/**
	 * Save the user model in the session
	 *
	 * @return void
	 */
	protected function _save_session()
	{
		if ( (!isset($this->_config->session_key)) || (empty($this->_config->session_key)) )
		{
			throw new Auth_Exception('The session_key is not found in config file.');
		}
		
		// Save the user model in the session
		$session = Session::instance();
		$session
			->delete($this->_config->session_key)
			->regenerate();
		
		// Get the session ID and put it in the user model
		$this->_user->session_id = $session->id();
		$this->_user->update_session_id();
	
		$session->set($this->_config->session_key, $this->_user);	
	}
		
	
	/**
	 * Hash a password.
	 *
	 * @param string The unencrypted password string.
	 * @param string The password salt, when we want to test against a hashed password.
	 * @return array Returns a hash array containing the hashed password and it's salt.
	 *
	 */
	public function hash_password($password, $pw_salt = null)
	{
		$hash = array('hash' => '', 'salt' => null);
		
		if ( empty($this->_config->hash_method) !== true )
		{	
			if ( isset($this->_config->hash_iterations) )
			{
				if ($pw_salt === null)
				{
					$iterations = (int)$this->_config->hash_iterations;

					while($iterations >= 0)
					{
						$hash['salt'] = $this->_generate_salt($hash['salt']);
						$iterations -= 1;
					}					
				}
				else
				{
					$hash['salt'] = $pw_salt;
				}
				
				$hash['hash'] = $password .$hash['salt'];
				$iterations = (int)$this->_config->hash_iterations;
				
				while($iterations >=0)
				{
					$hash['hash'] = hash_hmac($this->_config->hash_method, $hash['hash'], $this->_config->shared_secret);
					$iterations -= 1;
				}
			}
			else
			{
				if ($salt === null)
				{
					$hash['salt'] = $this->_generate_salt(null);
				}
				else
				{
					$hash['salt'] = $pw_salt;
				}
				
				$hash['hash'] = hash_hmac($this->_config->hash_method, $password .$hash['salt'], $this->_config->shared_secret);
			}
			
			return $hash;	
		}
		
		return false;
	}
	
		
	/**
	 * Generate a random password salt hash.
	 * hash_password use this method
	 *
	 * @param string Predefined salt if exists.
	 * @return string The hashed salt.
	 *
	 */ 
	protected function _generate_salt($salt = null)
	{
		if ($salt === null)
		{
			$salt = '';
			$total_chars = strlen($this->_config->salt_chars) - 1;
			
			for ($i=0; $i<10; $i++)
			{
				$salt .= $this->_config->salt_chars[mt_rand(0, $total_chars)];
			}			
		}
		
		$salt = hash_hmac($this->_config->hash_method, date('Y-m-d-h-i-s') .$salt, $this->_config->shared_secret);
		
		return $salt;	
	}
}