<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Api extends Controller {

    public function __construct(Kohana_Request $request, Kohana_Response $response) {
        parent::__construct($request, $response);

        $this->workorders_model = Model::factory('Workorders');
    }



    public function before() {
        parent::before();
        // code...
    }



    public function action_getClients() {
        echo $this->workorders_model->get_clients('json');
    }



    public function after() {
        parent::after();
        // code...
    }

}