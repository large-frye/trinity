<?php

class Controller_Public extends Kohana_Controller
{	
	/**
	 * @var mixed Variable holding the ViewModel object
	 */
	protected $_view = null;
	
	public function before()
	{
		parent::before();
		
		if ( $this->request->method() == Request::POST )
		{
			if ( !array_key_exists('csrf_token', $_POST) )// || !Security::CSRF_valid($_POST['csrf_token']) )
			{
				throw new Kohana_Exception('Invalid token supplied. Reload the form and try again.');
			}
		}
	}
					
	public function after()
	{
		$psk_me = new Primalskill_Mustache_Engine( $this->_view );

		$this->response->body(
			$psk_me->render()
		);
				
		parent::after();	
	}	
}