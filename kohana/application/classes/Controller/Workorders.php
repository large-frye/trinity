<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Workorders extends Controller_Account {
    
    protected $_post = null;

    protected $_admin = null;

    protected $_inpsector = null;

    protected $_workorder_id = null;

    public function __construct(Kohana_Request $request, Kohana_Response $response) {
    	parent::__construct($request, $response);
        $this->workorders_model = Model::factory('workorders');
        $this->_user_model = Model::factory('users');
        $this->_workorder_id = $this->request->param('id');
    }



    public function before() {
    	parent::before();
    	$this->template->homepage = false;
        $this->_post = $this->request->post();
        $this->template->side_bar = View::factory('workorders/side-bar');
        $this->_admin = $this->user_type === Model_Account::ADMIN ? true : false;
        $this->_inspector = $this->user_type === Model_Account::INSPECTOR ? true : false;
        $this->_client = $this->user_type === Model_Account::CLIENT ? true : false;

        if ($this->_inspector) {
            $this->request->redirect('/account');
        }
    }



    public function action_generate_pdf() {
        echo phpinfo();
        // $pdf = new PDFlib();

        //if ($p->PDF_begin_document("", "") == 0) {
        //   die ("Error: ") . $p->get_errmsg();
        // }
    }



    public function action_submit() {
    	$view = View::factory('workorders/submit');
    	$view->clients = $this->account_model->get_clients();
        $view->inspection_types = array('Basic Inspections', 'Expert Inspections', 'Engineer Reports');
        $view->price = $this->workorders_model->get_price();
        $view->client = $this->_client;
        $view->user_id = $this->_client ? $this->_user->id : null;
        $type_selected = $this->request->param('id');
        $view->type_selected = isset($type_selected) ? $type_selected : null;

        // Handle $_POST
        if ($this->request->method() === 'POST') {
            $validation_result = $this->workorders_model->validate_workorder($this->_post);

            if (!$validation_result['error']) {
                $new_work_order_result = $this->workorders_model->add_workorder($this->_post);
                
                if ($new_work_order_result['status']) {
                    // Send email to user who submitted. If an admin created the work order send to adjuster/client selected.
                    $this->workorders_model->send_submission_emails($this->_user->id, $this->user_type, $this->mailer_model);

                    // Send a notice to user and redirect.
                    Session::instance()->set('add_new_work_order', "Your work order has been added successfully.");
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
        $view->workorder_statuses = $this->workorders_model->get_workorder_statuses();
        $view->hours = $this->workorders_model->get_workorder_hours();
        $view->minutes = $this->workorders_model->get_workorder_minutes();
        $view->inspectors = $this->workorders_model->get_inspectors();
        $view->inspection_statuses = $this->workorders_model->get_inspection_statuses();
        $view->admin = $this->_admin;
        $view->inspector = $this->_inspector;

        if ($this->request->method() === 'POST') {
            if (isset($this->_post['set_status'])) {
                if($this->workorders_model->set_workorder_status($this->_post, $this->request->param('id'))) {
                    $view->success = "Work order has been updated.";
                    $this->workorders_model->send_notice_to_inspector($this->_post, $this->mailer_model);
                } else {
                    $view->error = "There was an error updating this order's status. Please try again.";
                }
            } else if (isset($this->_post['set_inspection_status'])) {
                if ($this->workorders_model->set_workorder_inspection_status($this->_post, $this->request->param('id'))) {
                    $view->success = "Work order has been updated.";
                } else {
                    $view->error = "There was an error updating this order's status. Please try again.";
                }
            } else if(isset($this->_post['add_comment'])){
                $this->workorders_model->add_comment($this->_post, $this->request->param('id'), $this->_user->id);
            }
        }
        $view->details = $this->workorders_model->get_workorder_details($this->request->param('id'));
        $view->messages  = $this->workorders_model->get_workorder_comments($this->request->param('id'));
        $this->template->content = $view;
    }



    public function action_edit() {
        $request_param = $this->request->param('id');
        if (!isset($request_param)) {
            $this->request->redirect('/account');
        }

        // Create view now and handle variables being passed.
        $view = View::factory('workorders/edit');
        $view->clients = $this->account_model->get_clients();
        $view->inspection_types = array('Basic Inspections', 'Expert Inspections', 'Engineer Reports');
        $view->price = $this->workorders_model->get_price();
        $view->details = $this->workorders_model->get_workorder_details($request_param);
        $view->is_expert = $view->details->is_expert == 0 ? "" : "checked";
        $view->is_tarped = $view->details->tarped == 0 ? 0 : 1;

        // Check $this->_post and validate
        if ($this->request->method() === 'POST') {
            $validation_result = $this->workorders_model->validate_workorder($this->_post);

            if (!$validation_result['error']) {
                $edit_work_order_status = $this->workorders_model->edit_workorder($this->_post, $request_param);
                
                if ($edit_work_order_status['status']) {
                    Session::instance()->set('edit_new_work_order', "You have successfully updated your order.");
                    $this->request->redirect('/account');
                } else {
                    $view->errors = $edit_work_order_status['error'];
                }
            } else {
                $view->post = $this->_post;
                $view->errors = $validation_result['errors'];
            }
        }
        

        $this->template->content = $view;
    }



    public function action_report() {
        if (!isset($this->_workorder_id)) {
            throw new Exception('Error finding report. Seems to be you are missing something.');
        }

        $view = View::factory('workorders/report');
        $view->inspection_details = $this->workorders_model->get_workorder_details($this->_workorder_id);
        $view->policy_holder_info = $this->workorders_model->get_policy_holder($this->_workorder_id);
        $view->adjuster = $this->workorders_model->get_adjuster_for_workorder($this->_workorder_id);
        $view->inspection_report = $this->workorders_model->get_inspection_report($this->_workorder_id);
        $this->template->content = $view;
    }



    public function action_index() {
        Request::redirect('/account');
    }



    public function after() {
    	parent::after();
    }
}