<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Workorders extends Controller_Account {
    
    public function __construct(Kohana_Request $request, Kohana_Response $response) {
    	parent::__construct($request, $response);
    }



    public function before() {
    	parent::before();
    	$this->template->homepage = false;
    	$this->template->side_bar = View::factory('workorders/side-bar');
    }



    public function action_submit() {
    	$view = View::factory('workorders/submit');
    	$view->clients = $this->account_model->get_clients();
    	$this->template->content = $view;
    }



    public function after() {
    	parent::after();
    }
}