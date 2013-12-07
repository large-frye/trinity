<?php defined('SYSPATH') or die('No direct script access.');

class Model_Schedule extends Model_Base {
    
    public function __construct() {
    	parent::__construct();
    }

    
	public function action_index()
	{
		$this->template->content = View::factory('index');
	}

}



?>
