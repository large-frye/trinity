<?php
/**
 * View model for the password reset page
 */
class View_Authentication_Resetpassword extends View_Layout
{

	protected $_template = 'authentication/resetpassword';

	/**
	 * @var object Holds an instance of the users model
	 */
	protected $_m_users = null;
	
	/**
	 * @var string The url where the post will go
	 */
	public $post_url = '';
	
	/**
	 * @var array Holds the data that will populate the form, like errors and input
	 */
	public $data = array();
	
	public $csrf_token = '';
	
	/**
	 * Use the constructor to pass the users model, elaready loaded with the user data
	 * @param object $m_users The users model object
	 */
	public function __construct($m_users, $code)
	{
		$this->_m_users = $m_users;
		
		$this->post_url = Route::url('authentication', array('action' => 'resetpassword')).'?code='.$code;
		$this->csrf_token = Security::CSRF_token();
	}
	
	/**
	 * This function gets the incoming data (post in this case) and populates inner variables
	 * @param array $data Holds the data we want to populate
	 */
	public function fill_data($data = array())
	{
		// Firstly we get the errors if tehre are any
		$errors = $this->_m_users->return_errors();
		
		// Iterate through the data and set 
		foreach( $data as $key => $value )
		{
			$this->data[$key] = $value;
			
			if ( isset($errors[$key]) )
			{
				$this->data['error_'.$key] = $errors[$key];
			}
		}
	}
}