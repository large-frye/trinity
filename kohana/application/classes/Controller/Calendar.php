<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Calendar extends Controller_Account {

    public function __construct(Kohana_Request $request, Kohana_Response $response) {
        parent::__construct($request, $response);

        $this->workorders_model = Model::factory('Workorders');
    }



    public function before() {
        parent::before();
        
        $this->template->homepage = true;
        $this->template->calendar_app = "ng-app=\"calendarDemoApp\"";
        $this->template->events = $this->account_model->get_work_orders($this->_user->id, $this->user_type);
        $this->template->inspectors = $this->workorders_model->get_inspectors();
    }



    public function action_index() {
        $view = View::factory('calendar/index');
        $this->template->content = $view;
    }



    public function after() {
        parent::after();
        // code...
    }

}