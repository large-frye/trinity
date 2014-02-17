<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Maps extends Controller_Account {

      protected $_post = null;

     	public function __construct(Kohana_Request $request, Kohana_Response $response){
     		parent::__construct($request, $response);
     	}

   	public function before(){
   		  parent::before();
   		  $this->template->homepage = false;
        $this->_post = $this->request->post();
        $this->user_type = $this->account_model->get_user_type($this->_user->id);
        $this->template->maps = true;
        $this->template->locations = $this->account_model->get_work_orders($this->_user->id, $this->user_type);
        print_r($this->template->locations);
   	}


   	public function action_index(){
   	   $this->template->content=View::factory('maps/index');
   	}

      public function after() {
         parent::after();
      }
   }
