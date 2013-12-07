<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Settings extends Controller_Master {

      protected $_post = null;

   		public function __construct(Kohana_Request $request, Kohana_Response $response){
		   		parent::__construct($request, $response);
		   		$this->schedule_model=Model::factory('schedule');
		   	}



   }


   ?>