<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Damagetypes extends Controller_Master {
     
    public function __construct(Kohana_Request $request, Kohana_Response $response) {
    	parent::__construct($request, $response);
    }



    public function action_index() {
    	$this->template->content = View::factory('damage_types/index');
    }
}