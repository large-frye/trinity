<?php 

class Controller_Admin_Dashboard extends Controller_Admin
{

	public function before()
	{
		parent::before();	
		
		if ( ! $this->_user->roles->has('admin') )
		{
			$this->redirect('/');
			exit;
		}
	}

	public function action_index()
	{
		$this->_view = new View_Admin_Dashboard();
	}
	
}