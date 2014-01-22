<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Schedule extends Controller_Master {


    public function __construct(Kohana_Request $request, Kohana_Response $response) {
        parent::__construct($request, $response);
        $this->settings_model=Model::factory('Schedule');
    }

    public function before() {
   	    parent::before();
   		  $this->template->hide_right_side = true;
   		  $this->template->whole_page= true;
        $this->_post = $this->request->post();
   	}



    public function action_index() {
        $this->template->content = View::factory('schedule/index'); 
    }



    public function after() {
        parent::after();
    }
}
// End Scheduled