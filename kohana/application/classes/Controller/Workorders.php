<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Workorders extends Controller_Account {
    
    protected $_post = null;

    public function __construct(Kohana_Request $request, Kohana_Response $response) {
    	parent::__construct($request, $response);
        $this->workorders_model = Model::factory('workorders');
    }



    public function before() {
    	parent::before();
    	$this->template->homepage = false;
        $this->template->side_bar = View::factory('workorders/side-bar');
        $this->_post = $this->request->post();
    }



    public function action_submit() {
    	$view = View::factory('workorders/submit');
    	$view->clients = $this->account_model->get_clients();
        $view->inspection_types = array('Basic Inspections', 'Expert Inspections', 'Engineer Reports');
        $view->price = $this->workorders_model->get_price();

        // Handle $_POST
        if ($this->request->method() === 'POST') {
            $validation_result = $this->workorders_model->validate_workorder($this->_post);

            if (!$validation_result['error']) {
                $new_work_order_result = $this->workorders_model->add_workorder($this->_post);
                
                if ($new_work_order_result['status']) {
                    Session::instance()->set('add_new_work_order', true);
                    $this->request->redirect('/account');
                } else {
                    $view->errors = $new_work_order_result['error'];
                }
            } else {
                $view->post = $this->_post;
                $view->errors = $validation_result['errors'];
            }
        }

    	$this->template->content = $view;
    }



    /**
     * Action: View a workorder. 
     *
     */
    public function action_view() {
        $view = View::factory('workorders/view');
        $view->details = $this->workorders_model->get_workorder_details($this->request->param('id'));
        $view->admin = $this->user_type === Model_Account::ADMIN ? true : false;
        
        $this->template->content = $view;
    }



    public function action_index() {
        Request::redirect('/account');
    }



    public function after() {
    	parent::after();
    }
}