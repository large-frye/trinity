<?php defined('SYSPATH') or die('No direct script access.');

class Model_Users extends Model_Base {
    
    public function __construct() {
    	parent::__construct();
    }



    public function create_user($post) {
        // Make sure that $post has `email` & `password_confirm` field or Kohana Authentication
        // will fail. 
        $user = ORM::factory('User')->create_user($post, array('username', 'password', 'email'));

        $post = array();
    }



    public function validate_create_user_form($post) {
         $valid_post = Validation::factory($post);

         $valid_post->rule('first_name', 'not_empty')
                    ->rule('last_name', 'not_empty')
                    ->rule('phone', 'not_empty')
                    ->rule('phone', 'Valid::phone')
                    ->rule('geographic_region', 'not_empty')
                    ->rule('username', 'not_empty')
                    // ->rule('username', '') Call unique username function
                    ->rule('email', 'not_empty')
                    ->rule('email', 'Valid::email')
                    ->rule('email', 'Valid::email_domain')
                    ->rule('password', 'not_empty')
                    ->rule('password', 'min_length', array(':value', '6'))
                    ->rule('password_confirm', 'matches', array(':validation', 'password_confirm', 'password'));

          if ($valid_post->check()) {

          } else {
              print_r($valid_post->errors('default'));
          }
    }


    public function get_user($user_id) {
    	return DB::query(Database::SELECT, "SELECT * FROM users u 
    		                                LEFT JOIN profiles p ON u.id = p.user_id
    		                                WHERE u.id = :user_id")
    	           ->parameters(array(':user_id' => $user_id))
    	           ->as_object()
    	           ->execute($this->db)
    	           ->current();
    }
}