<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller_Master {

	public function action_index()
	{
		$this->template->content = View::factory('index');
	}


	
	public function action_andrew() {
		$this->response->body('This is this action');
	}

} // End Welcome
