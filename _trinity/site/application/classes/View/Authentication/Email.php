<?php
/**
 * View model that displays a field for entering the email where the reset password link goes
 */
class View_Authentication_Email extends View_Layout
{

	protected $_template = 'authentication/email';

	/**
	 * @var string Form token for CSRF attacks
	 */
	public $csrf_token = null;
		
	/**
	 * @var string Holds the POST url
	 */
	public $post_url = '';
	
	public function __construct()
	{
		$this->post_url = Route::url('authentication', array('action' => 'forgotpassword'));
		
		$this->_set_variables();
	}
	
	private function _set_variables()
	{
		// Pass the token for the form
		$this->csrf_token = Security::CSRF_token();
	}
	
}