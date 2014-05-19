<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Workorders extends Controller_Account {
    
    protected $_post = null;

    protected $_admin = null;

    protected $_inpsector = null;

    protected $_workorder_id = null;

    public function __construct(Kohana_Request $request, Kohana_Response $response) {
    	parent::__construct($request, $response);
        $this->workorders_model = Model::factory('Workorders');
        $this->_user_model = Model::factory('Users');
        $this->inspections_model = Model::factory('Inspections');
        $this->settings_model = Model::factory('Settings');
        $this->invoice_model = Model::factory('Invoice');
        $this->_workorder_id = $this->request->param('id');
        $this->_report_file_path = $_SERVER['DOCUMENT_ROOT'] . "/assets/pdf/reports/";
    }



    public function before() {
    	parent::before();
    	$this->template->homepage = false;
        $this->_post = $this->request->post();
        $this->template->side_bar = View::factory('workorders/side-bar');
        $this->template->side_bar->workorder_id = $this->_workorder_id;
        $this->_admin = $this->user_type === Model_Account::ADMIN ? true : false;
        $this->_inspector = $this->user_type === Model_Account::INSPECTOR ? true : false;
        $this->_client = $this->user_type === Model_Account::CLIENT ? true : false;

        if ($this->_inspector) {
            $this->request->redirect('/account');
        }

        $this->template->app = "ng-app=\"autocompleteApp\"";
    }



    /** 
     * Action: Submit a workorder
     *
     */
    public function action_submit() {
    	$view = View::factory('workorders/submit');
    	$view->clients = $this->account_model->get_clients();
        $view->inspection_types = array('Basic Inspections', 'Expert Inspections', 'Engineer Reports');
        $view->price = $this->workorders_model->get_price();
        $view->client = $this->_client;
        $view->user_id = $this->_client ? $this->_user->id : null;
        $view->hours = $this->workorders_model->get_workorder_hours();
        $view->minutes = $this->workorders_model->get_workorder_minutes();
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
        $view->inspection_types = array('Basic Inspections', 'Expert Inspections', 'Engineer Reports');
        $view->price = $this->workorders_model->get_price();
        $view->details = $this->workorders_model->get_workorder_details($request_param);
        $view->client = $this->workorders_model->get_client_name($view->details->user_id);
        $view->is_expert = $view->details->is_expert == 0 ? "" : "checked";
        $view->is_tarped = $view->details->tarped == 0 ? 0 : 1;

        // Check $this->_post and validate
        if ($this->request->method() === 'POST') {
            $validation_result = $this->workorders_model->validate_workorder($this->_post);

            if (!$validation_result['error']) {
                $edit_work_order_status = $this->workorders_model->edit_workorder($_FILES, $this->_post, $request_param);
                
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
        $report_send_session = Session::instance()->get('report_sent');

        if ($this->invoice_model->check_if_inspection_report_exists($this->_workorder_id) <= 0) {
            Session::instance()->set('invoice_does_not_exist', 'There is no inspection for this workorder yet.');
            $this->request->redirect('/account');
        }

        if (!isset($this->_workorder_id)) {
            throw new Exception('Error finding report. Seems to be you are missing something.');
        }

        $view = View::factory('workorders/report');
        $view->workorder_id = $this->_workorder_id;
        $view->inspection_details = $this->workorders_model->get_workorder_details($this->_workorder_id);
        $view->policy_holder_info = $this->workorders_model->get_policy_holder($this->_workorder_id);
        $view->adjuster = $this->workorders_model->get_adjuster_for_workorder($this->_workorder_id);
        $view->inspection_report = $this->workorders_model->get_inspection_report($this->_workorder_id, true);
        $view->photos = $this->inspections_model->get_photos_by_id($this->_workorder_id);
        $view->categories = $this->settings_model->get_parent_categories();
        $view->xactimate = $this->workorders_model->check_if_xactimate_exists($this->_workorder_id);
        $view->send_report = $this->workorders_model->check_if_report_exists($this->_workorder_id);
        $view->report_send_session = $report_send_session;
        $view->report_type = $this->workorders_model->get_workorder_type($this->_workorder_id);

        $this->template->content = $view;
    }



    public function action_generate() {
        if (!isset($this->_workorder_id)) {
            throw new Exception('Error finding report. Seems to be you are missing something.');
        }

        $parentCategories = $this->settings_model->get_parent_categories();
        $photos =  $this->inspections_model-> get_photos_by_id($this->_workorder_id);
        $status = $this->workorders_model->generate_report($this->_workorder_id, $parentCategories,$photos);
        $workorder_info = $this->workorders_model->get_workorder_details($this->_workorder_id);
        
        if ($status) {
            if (Model_Workorders::$type === Model_Workorders::EXPERT_INSPECTION) {
                $this->request->redirect('/assets/pdf/reports/'. str_replace(' ', '', $workorder_info->last_name) . "_Claim" . str_replace(' ', '', $workorder_info->policy_number) . ".pdf");
            } else {
                $this->request->redirect('/assets/pdf/reports/'. str_replace(' ', '', $workorder_info->last_name) . "_Claim" . str_replace(' ', '', $workorder_info->policy_number) . ".pdf");
            }
        } else {
            print_r(Model_Workorders::$errors);
        }
    }



    public function action_index() {
        Request::current()->redirect('/account');
    }



    public function action_send() { 
        $workorder_info = $this->workorders_model->get_workorder_details($this->_workorder_id);
        echo $workorder_info->adjuster_email;
        die();
        $status = $this->mailer_model->send_mail('dholmblad@gmail.com', 'admin@trinity.is', 'Inspection Report for work order id : ' . $this->_workorder_id, 15, 
                                                  array('::username::'      => $workorder_info->adjuster,
                                                        '::workorder_id::'  => $this->_workorder_id), 
                                                  null, null,
                                                  array($this->_report_file_path . str_replace(' ', '', $workorder_info->last_name) . "_Claim" . 
                                                        str_replace(' ', '', $workorder_info->policy_number) . ".pdf"));

        // Redirect to the report page.
        Session::instance()->set('report_sent', 'This report has been sent to the user successfully');
        $this->request->redirect('/workorders/report/' . $this->request->param('id'));
    }



    public function after() {
    	parent::after();
    }
}