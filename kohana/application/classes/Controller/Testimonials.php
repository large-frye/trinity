<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Testimonials extends Controller_Master {

      protected $_post = null;

     	public function __construct(Kohana_Request $request, Kohana_Response $response){
     		parent::__construct($request, $response);
     		$this->testimonials_model=Model::factory('Testimonials');
     	}


   	public function before(){
   		parent::before();
   		$this->template->hide_right_side = true;
   		$this->template->whole_page= true;
         $this->_post = $this->request->post();
   	}


 public function after() {
         parent::after();
      }

  public function action_index()
	{

		$this->template->content = View::factory('testimonials/index');	
	}




}

?>