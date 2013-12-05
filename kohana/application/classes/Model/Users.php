<?php defined('SYSPATH') or die('No direct script access.');

class Model_Users extends Model_Base {
    
    public function __construct() {
    	parent::__construct();
    }



    public function create_user($post) {
        // Make sure that $post has `email` & `password_confirm` field or Kohana Authentication
        // will fail.
        try { 
            $user = ORM::factory('User');
            $user->username = $post['username'];
            $user->email    = $post['email'];
            $user->password = $post['password']; 
            $user->save();

        } catch (ORM_Validation_Exception $e) {
            print_r($e);
        }

        $parameters = array(':id' => null,
                            ':user_id' => $user->id,
                            ':first_name' => $post['first_name'],
                            ':last_name'  => $post['last_name'],
                            ':phone'      => $post['phone'],
                            ':geographic_region' => $post['geographic_region'],
                            ':insurance_company' => $post['insurance_company']);

        $roles_params = array(':user_id' => $user->id,
                              ':role_id' => $post['role_id']);

        // Need to add user_profiles
        DB::insert('profiles')
            ->values(array_keys($parameters))
            ->parameters($parameters)
            ->execute($this->db);

        // Need to add roles
        DB::insert('roles_users')
            ->values(array_keys($roles_params))
            ->parameters($roles_params)
            ->execute($this->db);

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
              return true;
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