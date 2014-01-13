<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Invoice extends Controller_Account {

    protected $_workorder_id = null;

    public function __construct($request, $response) {
        parent::__construct($request, $response);

        $this->invoice_model = Model::factory('invoice');
        $this->_workorder_id = $this->request->param('id');
    }



    public function before() {
        parent::before();

        echo $this->invoice_model->check_if_inspection_report_exists($this->_workorder_id);

        if ($this->invoice_model->check_if_inspection_report_exists($this->_workorder_id) <= 0) {
            Session::instance()->set('invoice_does_not_exist', 'There is no invoice for this workorder yet.');
            $this->request->redirect('/account');
        }
    }



    public function action_index() {
        $this->template->content = "Andrew";
    }



    public function after() {
        parent::after();
    }
}
