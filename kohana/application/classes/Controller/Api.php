<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Api extends Controller {

    public function __construct(Kohana_Request $request, Kohana_Response $response) {
        parent::__construct($request, $response);

        $this->workorders_model = Model::factory('Workorders');
        $this->invoice_model = Model::factory('Invoice');
    }



    public function before() {
        parent::before();
        // code...
    }



    public function action_getClients() {
        echo $this->workorders_model->get_clients('json');
    }


    public function action_items() {
        echo json_encode($this->invoice_model->get_invoice_options($this->request->param('id')));
    }

    public function action_addItem() {
        $postData = file_get_contents("php://input");
        $request = json_decode($postData);


        $this->invoice_model->add_invoice_items($request, $this->request->param('id'));
    }




    public function after() {
        parent::after();
        // code...
    }

}