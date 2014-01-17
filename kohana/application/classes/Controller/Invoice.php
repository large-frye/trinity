<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Invoice extends Controller_Account {

    protected $_workorder_id = null;

    public function __construct($request, $response) {
        parent::__construct($request, $response);

        $this->invoice_model = Model::factory('invoice');
        $this->workorders_model = Model::factory('workorders');
        $this->_workorder_id = $this->request->param('id');
    }



    public function before() {
        parent::before();

        if ($this->invoice_model->check_if_inspection_report_exists($this->_workorder_id) <= 0) {
            Session::instance()->set('invoice_does_not_exist', 'There is no invoice for this workorder yet.');
            $this->request->redirect('/account');
        }

        $this->template->homepage = false;
        $this->template->side_bar = View::factory('invoice/side-bar');
        $this->_admin = $this->user_type === Model_Account::ADMIN ? true : false;
        $this->_inspector = $this->user_type === Model_Account::INSPECTOR ? true : false;
    }



    public function action_index() {
        $this->template->content = "Andrew";
    }



    public function action_generate() {
        $view = View::factory('invoice/generate');
        $view->workorder_details = $this->workorders_model->get_workorder_details($this->_workorder_id);
        $view->price = $this->invoice_model->get_prices($view->workorder_details->type);
        if ($this->request->method() === 'POST') {
            $this->invoice_model->create_invoice($this->_workorder_id);
        }
        $this->template->content = $view;
    }



    public function after() {
        parent::after();
    }
}
