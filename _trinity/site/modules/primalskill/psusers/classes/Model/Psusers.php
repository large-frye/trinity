<?php
/**
 * Media model for usermanagement
 *
 * @version 1.0
 *
 */
class Model_Psusers extends Model_Database
{

	/**
	 * @var string The users table name
	 */
	public $_table_name = 'auth_users';
	
	// Other table names which are used in this model
	public $_password_codes_table = 'users_password_codes';
	public $_sessions_table = 'sessions';	
	
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
	 * @var array Holds the post data 
	 */
	protected $_post_data = array();
	
	/**
	 * @var array Holds any errors that occur upon validation
	 */
	protected $_post_errors = array();
	
	protected $_is_validated = null;
	
	
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
	 * The main function that signs up a user
	 * @param array $post Holds the incoming $_POST data
	 * @return boolean
	 */
	public function sign_up()
	{
		
		try
		{
			// Check if the data is validated
			if ( !$this->_is_validated )
			{
				return false;
			}

			$hash = Auth::instance()->hash_password($this->_post_data['password']);
			
			// Generate activation code
			$activation_code = md5($this->_post_data['email'] .date('Ymdhis'));
			
			$this->_data['username'] = strtolower($this->_post_data['username']);
			$this->_data['email'] = strtolower($this->_post_data['email']);
			$this->_data['password'] = $hash['hash'];
			$this->_data['pw_salt'] = $hash['salt'];
			$this->_data['created_on_utc'] = date('Y-m-d H:i:s');
			$this->_data['activation_code'] = $activation_code;
			
			// Call the save function
			$this->_save_user();
			
			return true;
		}
		catch(Database_Exception $e)
		{	
			throw $e;
		}
		
		return false;
	}
	
	/**
	 * Function for updating a user - this also can change password if necessary
	 * @return boolean
	 */
	public function update()
	{
		// Check if the user is loaded, and the data is validated
		if ( (!$this->is_loaded) || ($this->id === null) ||  (!$this->_is_validated) )
		{
			return false;
		}
		
		// Validate
		try
		{

			if ( isset($this->_post_data['password']) && Valid::not_empty($this->_post_data['password']) )
			{
				$hash = Auth::instance()->hash_password($this->_post_data['password']);
				$this->_data['password'] = $hash['hash'];
				$this->_data['pw_salt'] = $hash['salt'];
			}
			
			$this->_data['username'] = strtolower($this->_post_data['username']);
			$this->_data['email'] = strtolower($this->_post_data['email']);
			$this->_data['modified_on_utc'] = date('Y-m-d H:i:s');
			
			// Call the save functiion
			$this->_save_user();
			
			return true;

		}
		catch(Exception $e)
		{
			throw $e;
		}
	}	
	
	/**
	 * Validate the incoming data to match the requirements
	 * 
	 * @param Array POST data
	 * @return bool
	 */
	public function validate_data($post)
	{
		$this->_post_data = $post;
		// Start with sanitize
		$this->_post_data = Security::sanitize($this->_post_data);
		
		$this->_post_data = Arr::map('trim', $this->_post_data);
		
		// Build validation
		$val = Validation::factory($this->_post_data)
				->bind(':model', $this)
				->rule('email', 'not_empty')
				->rule('email', 'email')
				->rule('email', array(':model', 'unique_email'))
				->rule('username', 'not_empty')
				->rule('username', 'alpha_numeric')
				->rule('username', array(':model', 'unique_username'));
				
				if ( isset($this->_post_data['password']) && Valid::not_empty($this->_post_data['password']) )
				{
					$val->rule('password', 'not_empty')
							->rule('password', 'min_length', array(':value', 6))
							->rule('password', 'matches', array(':validation', ':field', 'confirm-password'));
				}		
		
		// Check if data is valid		
		if ( $val->check() )
		{
			$this->_is_validated = true;
			
			return true;
		}
		
		// Pass the errors
		$this->_post_errors = $val->errors('users_validation');
		
		return false;
	}	
	
	/**
	 * Saves the user after validation into auth_users table
	 * @return bool
	 */
	protected function _save_user()
	{	
		// We have teh table columns saved, so we iterate through them and get the data from the _data array
		try
		{
			// We have to decide if we have an insert, or an update
			if ( $this->id === null )
			{
				Database::instance()->begin();
				// Build query - unset the id since this is insert
				$data = $this->_table_columns;
				unset($data['id']);
				
				$str = 'INSERT INTO '.$this->_table_name.'('.implode(',',$data).') VALUES (:'.implode(',:',$data).')';
				
				$q = DB::query(Database::INSERT, $str);
				
				// Now pass the data from _data to parameters
				foreach( $data as $col )
				{
					$q->param(':'.$col, $this->_data[$col]);
				}
				
				$q = $q->execute();
				
				// Pass the insert id
				$this->_data['id'] = $q[0];
				
				Database::instance()->commit();
			}
			else
			{
				Database::instance()->begin();
				
				// Build query
				$str = 'UPDATE '.$this->_table_name.' SET ';
				foreach( $this->_table_columns as $col )
				{
					$str .= $col.' = :'.$col.', ';
				}
				
				// Cutting the last "," from the query
				$str = rtrim($str, ', ');
				
				$str .= ' WHERE id = :id';
				
				$q = DB::query(Database::UPDATE, $str);
				
				// Now add data
				$this->_data['id'] = (int)$this->_data['id'];
				
				foreach( $this->_table_columns as $col )
				{
					$q->param(':'.$col, $this->_data[$col]);
				}
				
				$q = $q->execute();
					
				Database::instance()->commit();
			}
		}
		catch(Database_Exception $e)
		{	
			Database::instance()->rollback();
			throw $e;
		}
	}	
	
	/**
	 * Activate the user (which must be already loaded)
	 *
	 * @throws Database_Exception
	 * @return bool
	 */
	public function activate()
	{
		if ( ($this->is_loaded) && ($this->id !== null) )
		{
			try 
			{
				$sql = 'UPDATE ' .$this->_table_name .' SET activation_code = "1" WHERE id = :id ;';
				
				$r = DB::query(Database::UPDATE, $sql)
						->param(':id', (int)$this->id)
						->execute();
				
				if ($r > 0)
				{
					return true;
				}
				
				return true;
				
			} 
			catch (Database_Exception $e) 
			{
				throw $e;
			}
						
		}
		
		return false;
	}	
	
	/**
	 * Used to soft delete a user 
	 * @return bool
	 */
	public function delete()
	{
	
		if ( ($this->is_loaded) && ($this->id !== null) )
		{
			try 
			{
				$sql = 'UPDATE ' .$this->_table_name .' SET deleted = (1-IFNULL(deleted,0))*(1-IFNULL(deleted,0)) WHERE id = :id ;';
				
				$r = DB::query(Database::UPDATE, $sql)
						->param(':id', (int)$this->id)
						->execute();
				
				if ( isset($this->session_id))
				{
					$r2 = DB::query(Database::DELETE,'DELETE FROM '.$this->_sessions_table.' WHERE session_id = :session_id;')
							->param(':session_id',$this->session_id)
							->execute();
				}		
				
				return true;
				
			} 
			catch (Database_Exception $e) 
			{
				throw $e;
			}
		}
		return false;

	}	

	/**
	 * Used to hard delete a user 
	 * @return bool
	 */	
	public function erase()
	{
		if ( ($this->is_loaded) && ($this->id !== null) )
		{
			try 
			{
			
				if ( isset($this->session_id))
				{
					$r = DB::query(Database::DELETE,'DELETE FROM '.$this->_sessions_table.' WHERE session_id = :session_id;')
							->param(':session_id',$this->session_id)
							->execute();
				}				
			
				$sql = 'DELETE FROM ' .$this->_table_name .' WHERE id = :id ;';
				
				$r = DB::query(Database::UPDATE, $sql)
						->param(':id', (int)$this->id)
						->execute();	
				
				return true;
				
			} 
			catch (Database_Exception $e) 
			{
				throw $e;
			}			
		}		
	}

	/**
	 * Used to ban a user 
	 * @param Int action (1 if Ban, 0 if Unban)
	 * @return bool
	 */	
	public function ban($action = 1)
	{
		if ( ($this->is_loaded) && ($this->id !== null) )
		{
			try 
			{
				$sql = 'UPDATE ' .$this->_table_name .' SET banned = :action WHERE id = :id ;';
				
				$r = DB::query(Database::UPDATE, $sql)
						->param(':id', (int)$this->id)
						->param(':action', (int)$action)
						->execute();
				
				if ( isset($this->session_id))
				{
					$r2 = DB::query(Database::DELETE,'DELETE FROM '.$this->_sessions_table.' WHERE session_id = :session_id;')
							->param(':session_id',$this->session_id)
							->execute();
				}		
				
				return true;
				
			} 
			catch (Database_Exception $e) 
			{
				throw $e;
			}
		}
		return false;		
	}
	
	
	/**
	 * Reseting password for the loaded user
	 *
	 * @param String The new password
	 * @return Bool|Array True if the resetpw succeded, otherwise an array with the validation error messages
	 */
	public function reset_password($new_pass)
	{

		$val = Validation::factory(array(
		'password' => $new_pass))
		->rule('password','not_empty')
		->rule('password', 'min_length', array(':value', '6'))
		->rule('password','alpha_numeric');
		
		if ( $val->check() )
		{
			
			//Populating the hashed password and salt variable
			$hash_and_salt = Auth::instance()->hash_password($new_pass);
			$password = $hash_and_salt['hash'];
			$pw_salt = $hash_and_salt['salt']; 
			
			try
			{
				$query = DB::query(Database::UPDATE,'UPDATE '.$this->_table_name.' SET `password`=:password, `pw_salt`=:pw_salt WHERE `id` = :id')
					->parameters(
							array(
								':password' => $password,
								':pw_salt' => $pw_salt,
								':id' => $this->id
								) 
					)
					->execute();
				
				if ( count($query) > 0 )
				{		
					return true;
				}

			}
			catch (Exception $e)
			{
				throw $e;
			}
		}
		else
		{
			return $val->errors('errors');
		}
	}	
	
	/**
	 * Generating a password
	 *
	 * @ param int Length of the generated password
	 * @ return string Generated password
	 */
	public function generate_pass( $length = 8 )
	{
		$validCharacters = "abcdefghijklmnopqrstuxyvwzABCDEFGHIJKLMNOPQRSTUXYVWZ0123456789";
		$validCharNumber = strlen($validCharacters);
		
		    $result = "";

			for ($i = 0; $i < $length; $i++)
			{
			
				$index = mt_rand(0, $validCharNumber - 1);
				$result .= $validCharacters[$index];
	
			}

		return $result;	 
	}	
	
	/**
	 * Generates a code for a user that can be used upon password recovery and password reset
	 * Needs the user to be loaded
	 * @param bool $delete When a code is used and the password reset, we need to delete the code - we use this param for this reason
	 * @return boolean
	 */
	public function generate_password_code($delete = false)
	{
		// Check if the user is loaded
		if ( (!$this->is_loaded) || ($this->id === null) )
		{
			return false;
		}
		
		try
		{
			Database::instance()->begin();
			
			// First delete any possible codes that already exist to prevent a user from having multiple reset codes
			$q = DB::query(Database::DELETE, 'DELETE FROM '.$this->_password_codes_table.' WHERE user_id = :id')
					->param(':id', (int)$this->id)
					->execute();
			
			if ( $delete === false )
			{
				// Now generate code and save it
				$code = md5($this->email.'_'.time());
				
				$str = 'INSERT INTO '.$this->_password_codes_table.'(user_id, code) VALUES (:id, :code)';
				
				$q = DB::query(Database::INSERT, $str)
						->param(':id', (int)$this->id)
						->param(':code', $code)
						->execute();
			}
	
			Database::instance()->commit();
			
			return true;
		}
		catch(Database_Exception $de)
		{
			Database::instance()->rollback();
			throw $de;
		}
	}
	
	/**
	 * Gets the user id belonging to a password code or inverse
	 * @param array $by contains the conditions by which we get a row from db
	 * @return int | bool Returns the user id of code is good, or false if no code found
	 */
	public function get_pwcode_by($by = array())
	{
		try
		{	
			$q = DB::select()->from($this->_password_codes_table);
			
			foreach( $by as $key => $value )
			{
				$q->where($key, '=', $value);
			}
			
			$q = $q->execute();
			
			if ( $q->count() > 0 )
			{
				$q = $q->as_array();
				
				return $q[0];
			}
			
			return false;
		}
		catch(Database_Exception $de)
		{
			throw $de;
		}
	}
	
	
	/**
	 * Check wether the email is unique in the database or not.
	 *
	 * @return bool FALSE if not unique, TRUE if it is.
	 *
	 */
	public function unique_email($email)
	{
		return ! DB::select( array(DB::expr('COUNT(email)'), 'total') )
			->from($this->_table_name)
			->where('email', '=', strtolower($email))
			->where('id', '!=', (int)$this->id)
			->execute()
			->get('total');		
	}
	
	/**
	 * Check wether the username is unique in the database or not.
	 *
	 * @return bool FALSE if not unique, TRUE if it is.
	 *
	 */
	public function unique_username($username)
	{
		return ! DB::select( array(DB::expr('COUNT(username)'), 'total') )
			->from($this->_table_name)
			->where('username', '=', strtolower($username))
			->where('id', '!=', (int)$this->id)
			->execute()
			->get('total');		
	}	
	
	/**
	 * Function to get the users
	 * @param int $limit Limit for pagination
	 * @param int $offset Offset for pagination
	 * @param string Status (deleted, banned, active) 
	 * @return array The users
	 */
	public function get_users($limit = null, $offset = null, $status = null)
	{
		$extra_sql = ' WHERE 1=1 ';
		
		if ( $status !== null )
		{
			switch($status)
			{
				case 'active':
					$extra_sql .= ' AND deleted = 0 AND banned = 0';
					break;
				case 'deleted':
					$extra_sql .= ' AND deleted = 1';
					break;
				case 'banned':
					$extra_sql .= ' AND banned = 1 AND deleted != 1 ';
					break;					
			}
		}
		
		
		
		if ( $limit != null )
		{
			$extra_sql .= ' LIMIT '.$limit;
			$extra_sql .= ( $offset != null )? ' OFFSET '.$offset : '';
		}
		
		$q = DB::query(Database::SELECT,'SELECT * FROM '.$this->_table_name.$extra_sql)->execute();
		
		if ( $q->count() > 0 )
		{
			return $q->as_array();
		}
		
		return array();
	}
	
	/**
	 * This function is needed to get the total number of users for pagination
	 * @return int The number of users
	 */
	public function get_total_user_nr($status = null)
	{	
		$extra_sql = ' WHERE 1=1 ';
	
		if ( $status !== null )
		{
			switch($status)
			{
				case 'active':
					$extra_sql .= ' AND deleted = 0 AND banned = 0';
					break;
				case 'deleted':
					$extra_sql .= ' AND deleted = 1';
					break;
				case 'banned':
					$extra_sql .= ' AND banned = 1  AND deleted != 1 ';
					break;					
			}
		}	
		
	
		$q = DB::query(Database::SELECT,'SELECT COUNT(*) as nr FROM '.$this->_table_name.$extra_sql)->execute();
		
		$q = $q->as_array();
		
		return $q[0]['nr'];
	}
	
	/**
	 * Used only in tests, this function changes the default table name
	 */
	public function change_table_name($name = 'test_auth_users')
	{
		$this->_table_name = $name;
	}	
	
	/**
	 * Returns the loaded user
	 */
	public function return_data()
	{
		return $this->_data;
	}
	
	/**
	 * Return the errors array
	 */
	public function return_errors()
	{
		return $this->_post_errors;
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