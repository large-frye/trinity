<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Inspections extends Controller_Account {

    public function __construct($request, $response) {
        parent::__construct($request, $response);
        $this->workorders_model = Model::factory('workorders');
    }


    public function before() {
    	parent::before();
	    $this->template->homepage = false;
    	$this->template->side_bar = View::factory('inspections/side-bar');
    	$this->_admin = $this->user_type === Model_Account::ADMIN ? true : false;
    	$this->_inspector = $this->user_type === Model_Account::INSPECTOR ? true : false;
    }



    public function action_index() {
    	parent::action_index();
    }



    public function action_view() {
    	$view = View::factory('workorders/view');
        $view->inspectors = $this->workorders_model->get_inspectors();
        $view->inspection_statuses = $this->workorders_model->get_inspection_statuses();
        $view->admin = $this->_admin;
        $view->inspector = $this->_inspector;

        if ($this->request->method() === 'POST') {
            if (isset($this->_post['set_inspection_status'])) {
                if ($this->workorders_model->set_workorder_inspection_status($this->_post, $this->request->param('id'))) {
                    $view->success = "Work order has been updated.";
                } else {
                    $view->error = "There was an error updating this order's status. Please try again.";
                }
            }else if(isset($this->_post['add_comment'])){
                $this->workorders_model->add_comment($this->_post, $this->request->param('id'));
            }
        }

        $view->details = $this->workorders_model->get_workorder_details($this->request->param('id'));
        $view->messages  = $this->workorders_model->get_workorder_comments($this->request->param('id'));
        $this->template->content = $view;
    }



    public function action_form() {
        $view = View::factory('inspections/form');
        $view->workorder_details = $this->workorders_model->get_workorder_details($this->request->param('id'));

        $this->template->content = $view;
    }



    public function after() {
        parent::after();
    }
}