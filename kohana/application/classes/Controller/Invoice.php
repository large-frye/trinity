<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Invoice extends Controller_Account {

    protected $_workorder_id = null;

    public function __construct($request, $response) {
        parent::__construct($request, $response);

        $this->invoice_model = Model::factory('Invoice');
        $this->workorders_model = Model::factory('Workorders');
        $this->_workorder_id = $this->request->param('id');
    }



    public function before() {
        parent::before();

        if ($this->invoice_model->check_if_inspection_report_exists($this->_workorder_id) <= 0) {
            Session::instance()->set('invoice_does_not_exist', 'There is no inspection for this workorder yet.');
            $this->request->redirect('/account');
        }

        $this->template->homepage = false;
        $this->template->side_bar = View::factory('invoice/side-bar');
        $this->_admin = $this->user_type === Model_Account::ADMIN ? true : false;
        $this->_inspector = $this->user_type === Model_Account::INSPECTOR ? true : false;
    }



    public function action_index() {
        $view = View::factory('invoice/index');

        if ($this->request->method() === "POST") {
            if ($this->invoice_model->validate_invoice_meta_form($this->_post, $this->_workorder_id)) {
                $view->success = "Your extra invoice data were added successfully.";
            } else {
                $view->errors = Model_Invoice::$errors;
            }
        }

        $view->invoice_meta = $this->invoice_model->invoice_meta($this->_workorder_id);
        $this->template->content = $view;
    }



    public function action_generate() {
        $view = View::factory('invoice/generate');
        $view->workorder_details = $this->workorders_model->get_workorder_details($this->_workorder_id);
        $view->invoice_meta = $this->invoice_model->invoice_meta($this->_workorder_id);
        $view->invoice_exists = $this->invoice_model->check_if_invoice_pdf_exists($this->_workorder_id);
        if ($this->request->method() === 'POST') {
            if (isset($this->_post['generate_pdf'])) {
                if ($this->invoice_model->create_invoice($this->_workorder_id, $view->workorder_details)) {
                    // Don't need to do anything.
                } else {
                    $view->errors = Model_Invoice::$errors;
                }
            } else if (isset($this->_post['view_pdf'])) {
                 $this->invoice_model->view_invoice($this->_workorder_id);
            } else {
                if ($this->invoice_model->send_invoice($this->_workorder_id, $view->workorder_details, $this->mailer_model)) {
                    $view->success = "Your email was sent successfully.";
                } else {
                    $view->errors = Model_Invoice::$errors;
                }
            }
        }
        $this->template->content = $view;
    }



    public function after() {
        parent::after();
    }
}
