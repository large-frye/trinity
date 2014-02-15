<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Maps extends Controller_Master {

    public function __construct(Kohana_Request $request, Kohana_Response $response) {
        parent::__construct($request, $response);
    }



  public function before(){
        parent::before();
        $this->template->homepage = false;
         $this->_post = $this->request->post();
    }
   

    public function action_index(){
       $this->template->content=View::factory('maps');
    }

    public function after() {
    	parent::after();
    }

}		