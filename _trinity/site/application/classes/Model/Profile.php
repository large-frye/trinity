<?php
/**
 * Model for handling extra user info
 */
class Model_Profile extends Model_Core
{
	/**
	 * @var string Name of the profile table
	 */
	protected $_profile_table = 'user_profiles';
	
	/**
	 * @var Model_Psusers
	 */
	protected $m_psusers = null;
	
	/**
	 * @var array Holds the data of the profile
	 */
	protected $_profile = array(
		'id' => 0,
		'user_id' => 0,
		'first_name' => '',
		'last_name' => '',
		'phone' => '',
		'geographic_region' => '',
		'insurance_company' =>''
	);
	
	/**
	 * @var array When passing data, we can give here the exceptions that cannot be changed from outside
	 */
	protected $_pass_exceptions = array('id', 'user_id');
	
	/**
	 * @var array Holds the post data throughout the model
	 */
	protected $_post_data = array();
	
	/**
	 * @var array Holds any errors occuring during validation and / or saving
	 */
	protected $_errors = array();
	
	/**
	 * @var boolean Used to check if data is validated before any DB handling
	 */
	protected $_is_validated = false;
	
	/**
	 * We use the constructor to take or make a new user model
	 * @param Model_Psusers $m We can pass a model that has the user already - Optional
	 */
	public function __construct(Model_Psusers $m = null)
	{
		if ( $m != null )
		{
			$this->m_psusers = $m;
		}
		else
		{
			$this->m_psusers = new Model_Psusers();
		}
	}
	
	/**
	 * Validates the incoming data
	 * @param array $post 
	 * @return boolean
	 */
	public function validate(Array $post)
	{
		$this->_post_data = $post;
		
		$val = Validation::factory($post)
				->bind(':model', $this)
				->rule('first_name', 'not_empty')
				->rule('last_name', 'not_empty')
				->rule('phone', 'not_empty')
				->rule('phone', array(':model', '_valid_phone'))
				->rule('geographic_region', 'not_empty');
		
		if ( $val->check() )
		{
			$this->_is_validated = true;
			$this->_pass_data();
			return true;
		}
		
		$this->_errors = $val->errors('validation/profile');
		
		return false;
	}
	
	private function _pass_data()
	{
		foreach ( $this->_post_data as $key => $value )
		{
			if ( !in_array($key, $this->_pass_exceptions) && in_array($key, array_keys($this->_profile)) )
			{
				$this->_profile[$key] = $value;
			}
		}
	}
	
	/**
	 * Saves the passed data into DB
	 * @return boolean
	 */
	public function save()
	{
		if ( !$this->_is_validated )
		{
			$this->_errors['save'] = 'Cannot save, data was not validated';
			return false;
		}
		
		try
		{	
			// See if we have insert or update
			if ( $this->_profile['id'] == null )
			{
				$this->_profile['user_id'] = (int)$this->m_psusers->id;
				$data = $this->_profile;
				unset($data['id']);
				
				$this->_profile['id'] = $this->_insert_data($this->_profile_table, $data);
			}
			else
			{
				$this->_update_data($this->_profile_table, $this->_profile);
			}
			
			return true;
		}
		catch(Database_Exception $db_e)
		{
			throw $db_e;
		}
	}
	
	/**
	 * Deletes a loaded district by id
	 * @return boolean
	 */
	public function delete()
	{
		try
		{
			$q = DB::query(Database::DELETE, 'DELETE FROM '.$this->_profile_table.' WHERE id = :id')
					->param(':id', $this->_profile['id'])
					->execute();
			
			$this->_profile = array(
				'id' => 0,
				'user_id' => 0,
				'first_name' => '',
				'last_name' => '',
				'phone' => '',
				'geographic_region' => '',
				'insurance_company' => ''
			);
			
			return true;
		}
		catch(Database_Exception $db_e)
		{
			throw $db_e;
		}
	}
	
	public function load()
	{
		if ( $this->m_psusers->id == null )
		{
			$this->errors['load'] = 'There is no user to load the profile for';
			return false;
		}
		
		try
		{
			$result = $this->get_table_data($this->_profile_table, 1, null, ' AND user_id = '.(int)$this->m_psusers->id);
			
			if ( !empty($result) )
			{
				$result = $result[0];
				
				foreach ( $this->_profile as $key => $value )
				{
					if ( in_array($key, array_keys($result)) )
					{
						$this->_profile[$key] = $result[$key];
					}
				}
			}

			return true;
		}
		catch(Database_Exception $db_e)
		{
			throw $db_e;
		}
	}
	
	/**
	 * This function serves validation purposes only
	 * Checks if a phone is valid
	 * @param string The number to check
	 * @return boolean
	 */
	public function _valid_phone($phone)
	{
		$pattern = '/^[+#*\(\)\[\]]*([0-9][ ext+-pw#*\(\)\[\]]*){6,45}$/';

		return (boolean)preg_match($pattern, $phone);
	}	
	
	public function return_data()
	{
		return $this->_profile;
	}
	
	public function return_errors()
	{
		return $this->_errors;
	}
}