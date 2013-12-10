<?php

/**
 * View Model for client signup
 */
class View_Registration_Client extends View_Layout
{
	protected $_template = 'registration/client';
	
	/**
	 * @var string Form token for CSRF attacks
	 */
	public $csrf_token = null;
	
	/**
	 * Array Holds the array with form validation errors 
	 */
	public $errors = null;
	
	public $data = null;
	
	public $post_url = '';
	public $login_url = '';

	public function __construct()
	{		
		$this->_set_links();
		$this->_set_variables();
	}
	
	private function _set_links()
	{
		$this->post_url = Route::url('signup', array('action' => 'client'));
	}
	
	private function _set_variables()
	{
		// Pass the token for the form
		$this->csrf_token = Security::CSRF_token();
	}	

}