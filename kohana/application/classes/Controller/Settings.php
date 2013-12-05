<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Settings extends Controller_Master {
   	public function __construct(Kohana_Request $request, Kohana_Response $response){
   		parent::__construct($request, $response);

   	}

   	public function before(){
   		parent::before();
   		
   	}


   	public function action_index(){
   		echo($this->template->homepage);
   	 $this->template->content=View::factory('settings/index');
   	}
   }
