<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Workorders extends Controller_Account {
    
    public function __construct(Kohana_Request $request, Kohana_Response $response) {
    	parent::__construct($request, $response);
    }



    public function before() {
    	parent::before();
    	$this->template->homepage = false;
    	
    }



    public function action_submit() {
    	$view = View::factory('workorders/submit');
    	$view->clients = $this->account_model->get_clients();
        $this->template->side_bar = View::factory('workorders/side-bar');
    	$this->template->content = $view;
    }



    public function action_index() {
        parent::action_index();
    }



    public function after() {
    	parent::after();
    }
}