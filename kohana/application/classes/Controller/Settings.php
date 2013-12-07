<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Settings extends Controller_Master {

      protected $_post = null;

     	public function __construct(Kohana_Request $request, Kohana_Response $response){
     		parent::__construct($request, $response);
     		$this->settings_model=Model::factory('Settings');


     	}

   	public function before(){
   		parent::before();
   		$this->template->homepage = false;
         $this->template->side_bar = View::factory('settings/side_bar');
         $this->_post = $this->request->post();
   	}


   	public function action_index(){
   	   $this->template->content=View::factory('settings/index');
   	}



    // Darren you get to do this method, real quick and will help you with creating a model. 
    // TODO: action_email
   	public function action_email(){
      $view = View::factory('settings/email');
      if ($this->request->method() === 'POST') {
            $validate_result= $this->settings_model->validate_email_update($this->_post);
      
        if (!$validate_result['error']) {
         
                $this->settings_model->update_emails($this->_post);
            } else {
                $view->errors = $validate_result['errors'];
                $view->user = (object) $this->_post;
            }
       }
      $view->emailTemplate = $this->settings_model->get_email(); 
      $this->template->content=$view;
   	}


     public function action_categories(){

        if ($this->request->method() === 'POST') {
             $validate_result= $this->settings_model->validate_edit_categories($this->_post);
             
          if (!$validate_result['error']) {
             foreach($this->_post as $key =>$request) {

               switch ($key) {
                    case 'edit_category':
                        $this->settings_model->edit_categories($this->_post);
                        break;
                    case 'delete_category':
                       $this->settings_model->delete_categories($this->_post);
                        break;
                    case 'add_category':
                          $this->settings_model->add_categories($this->_post);
                        break;
                     case 'change_parent':
                          $this->settings_model->change_parent_categories($this->_post);
                        break;
                }
              }
            }
        }

       if($this->request->param('id')==='edit'){
         $view = View::factory('settings/edit');
         $view->categories = $this->settings_model->get_categories();
       }else {
         $view = View::factory('settings/categories');
         $view->categories = $this->settings_model->get_categories();
     }
       $this->template->content=$view;
    }


      public function action_prices() {
          $view = View::factory('settings/prices');

          if ($this->request->method() === 'POST') {
              $this->settings_model->set_prices($this->_post);
              $view->post = $this->_post;
          }

          $view->prices = $this->settings_model->get_prices();
          $this->template->content = $view;
      }

      public function after() {
         parent::after();
      }
   }
