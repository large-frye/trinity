<?php
/**
 * Controller that handles the default sys view
 */
class Controller_Sys_Dashboard extends Controller_Systemplate
{
	public function action_index()
	{
		// Init view
		$view = View::factory('sys/dashboard');
		$this->_view->content = $view;
	}
}