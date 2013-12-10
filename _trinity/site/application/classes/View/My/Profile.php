<?php
/**
 * View model for handling the user profile
 */
class View_My_Profile extends View_Protected_Layout
{
	protected $_template = 'my/profile';
	
	/**
	 * @var Model_Psusers Instance of the users model
	 */
	private $_m_user = null;
	
	/**
	 * @var Model_Profile Instance of the profile
	 */
	private $_m_profile = null;
	
	/**
	 * @var array Holds the data
	 */
	public $data = array();
	
	/**
	 * @var string A valid CSRF token
	 */
	public $csrf_token = '';
	
	/**
	 * @var string The url of the form where teh post goes
	 */
	public $form_action = '';
	
	public $client_fields = false;
	
	public function __construct(Model_Psusers $m_user, Model_Profile $m_profile)
	{
		parent::__construct();
		
		$this->_m_user = $m_user;
		$this->_m_profile = $m_profile;
		
		$this->csrf_token = Security::CSRF_token();
		
		if ( $this->_user->roles->has('client') )
		{
			$this->client_fields = true;
		}
	}
	
	/**
	 * Fills the data from the model or the post
	 * @param array $incoming The incoming data if there is any
	 */
	public function fill_data($incoming = array())
	{
		$this->data = array();
		
		$profile = $this->_m_profile->return_data();
		
		$data = array();
		$data['username'] = $this->_m_user->username;
		$data['email'] = $this->_m_user->email;
		$data['password'] = '';
		$data['confirm-password'] = '';
		$data['first_name'] = $profile['first_name'];
		$data['last_name'] = $profile['last_name'];
		$data['phone'] = $profile['phone'];
		$data['geographic_region'] = $profile['geographic_region'];
		$data['insurance_company'] = $profile['insurance_company'];
		
		$errors = array_merge($this->_m_user->return_errors(), $this->_m_profile->return_errors());
		
		foreach( $incoming as $key => $value )
		{
			if ( in_array($key, array_keys($data)) )
			{
				$data[$key] = $value;
			}
			
			if ( array_key_exists($key, $errors) )
			{
				$data[$key.'_error'] = $errors[$key];
			}
		}
		
		$this->data[] = $data;
	}
}