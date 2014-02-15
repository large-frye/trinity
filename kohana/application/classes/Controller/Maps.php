<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Users extends Controller_Account {

	private $_user_model = null;

	protected $_post = null;

   public function __construct(Kohana_Request $request, Kohana_Response $response){
            parent::__construct($request, $response);
            $this->settings_model=Model::factory('Maps');


        }



        

    public function before() {
    	parent::before();
    	$this->_post = $this->request->post();
    }
   

    public function action_index(){
       $this->template->content=View::factory('maps/index');
    }

    public function after() {
    	parent::after();
    }
}