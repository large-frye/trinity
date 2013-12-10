<?php

/**
 *
 * View model for normal login
 * Handle the login and logout processes
 *
 */
class View_Authentication_Login extends View_Layout
{

	protected $_template = 'authentication/login';
	
	/**
	 * @var string Form token for CSRF attacks
	 */
	public $csrf_token = null;
		
	/**
	 * @var string Form POST url
	 */
	public $login_post_url = null;
	
	public $signup_url = null;
	
	/**
	 * @var string Holds the url to the email request
	 */
	public $forgot_password_url = '';
	
	/**
	 * @var string Hold error if exists
	 */
	public $error_message = null;
	
	public function __construct()
	{		
		$this->_set_links();
		$this->_set_variables();
		
	}
	
	private function _set_links()
	{
		// Post URL which handles the login process
		$this->login_post_url = Route::url('authentication', array('action' => 'login'));
		$this->forgot_password_url = Route::url('authentication', array('action' => 'forgotpassword'));
		echo $this->forgot_password_url;
		$this->signup_url = Route::url('signup', array('action' => 'client'));
	}
	
	private function _set_variables()
	{
		// Pass the token for the form
		$this->csrf_token = Security::CSRF_token();
	}
}	