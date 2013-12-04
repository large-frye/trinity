<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Users extends Controller_Master {
    
    public function __construct(Kohana_Request $request, Kohana_Response $response) {
    	parent::__construct($request, $response);
    }



    public function action_index() {
    	$view = View::factory('users/index');

    	$this->template->content = $view;
    }
}