<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Contact extends Controller_Master {

	public function action_index()
	{
		// 'content' is our $content variable in template.php
		$this->template->content = View::factory('contact/index');
	}

} // End Contact
