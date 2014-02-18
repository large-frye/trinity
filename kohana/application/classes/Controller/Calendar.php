<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Calendar extends Controller_Account {

    public function __construct(Kohana_Request $request, Kohana_Response $response) {
        parent::__construct($request, $response);
    }



    public function before() {
        parent::before();
        
        $this->template->homepage = true;
        $this->template->calendar_app = "ng-app=\"calendarDemoApp\"";
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