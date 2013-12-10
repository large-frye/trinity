<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Account extends Model_Base {



	public function __construct() {
		parent::__construct();


	}



    /**
     * Validate user login $_POST
     *
     * @param  object $post
     * @return array
     */
	public function validate_login_post($post) {
        $valid_post = Validation::factory($post);

        $valid_post->rule('username', 'not_empty')
                   ->rule('password', 'not_empty');

        return $valid_post->check() ? array('status' => true) 
                                    : array('status' => valid, 
                                    	    'errors' => $valid_post->errors('default'));
	}
}