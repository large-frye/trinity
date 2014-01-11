<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Invoice extends Controller_Account {

    protected 

    public function __construct($request, $response) {
        parent::__construct($request, $response);
    }



    public function before() {
        parent::before();

        if (!$this->invoice_model->check_if_inspection_report_exists($this->_workorder_id)) {

        }
    }



    public function after() {
        parent::after();
    }
}
