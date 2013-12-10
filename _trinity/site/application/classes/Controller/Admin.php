<?php
/**
 * Trinity base controller for admin
 */
class Controller_Admin extends Controller_Protected
{

	public function before()
	{
		parent::before();
		
		if ( !$this->_user->roles->has('admin') )
		{
			Message::instance()->error(__('You do not have permission to view this page'));

			HTTP::redirect($this->_redirect_url);
		}
	}
	
}