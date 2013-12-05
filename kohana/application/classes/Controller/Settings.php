<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Settings extends Controller_Master {
   	public function __construct(Kohana_Request $request, Kohana_Response $response){
   		parent::__construct($request, $response);
   		$this->settings_model=Model::factory('Settings');

   	}

   	public function before(){
   		parent::before();
   		$this->template->homepage = false;
         $this->template->side_bar = View::factory('settings/side_bar');
   	}


   	public function action_index(){
   	   $this->template->content=View::factory('settings/index');
   	}



      // Darren you get to do this method, real quick and will help you with creating a model. 
      // TODO: action_email
   	public function action_email(){
   		$view = View::factory('settings/email');
   		$emailTemplate = $this->settings_model->get_email_template();
   		$this->template->content=$view;
   	}


      public function action_prices() {
          $view = View::factory('settings/prices');
      }

      public function after() {
         parent::after();
      }
   }
