<?php defined('SYSPATH') or die('No direct script access.');

class Model_Users extends Model_Base {
    
    public function __construct() {
    	parent::__construct();
    }



    public function create_user($post) {
        $parameters = array(':id' => null,
                            ':user_id' => $user->id,
                            ':first_name' => $post['first_name'],
                            ':last_name'  => $post['last_name'],
                            ':phone'      => $post['phone'],
                            ':geographic_region' => $post['geographic_region'],
                            ':insurance_company' => $post['insurance_company']);

        $roles_params = array(':user_id' => $user->id,
                              ':role_id' => $post['role_id']);

        try { 
            $user = ORM::factory('User');
            $user->username = $post['username'];
            $user->email    = $post['email'];
            $user->password = $post['password']; 
            $user->save();

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
        } catch (ORM_Validation_Exception $e) {
            print_r($e);
        }

        $post = array();
    }



    public function edit_user($post, $user_id) {
        try { 
            $user = ORM::factory('User', $user_id);
            $user->username = $post['username'];
            $user->email    = $post['email'];
            $user->password = $post['password']; 
            $user->save();

            $role = DB::query(Database::SELECT, "SELECT role_id FROM roles_users WHERE user_id = :user_id AND role_id != 1")
                        ->parameters(array(':user_id' => $user_id))
                        ->as_object()
                        ->execute($this->db)
                        ->current();

            // Update `roles_users`
            DB::update('roles_users')->set(array('role_id' => $post['role_id']))->where('role_id', '=', ':role_id')
                ->parameters(array(':role_id' => $role->role_id))
                ->execute($this->db);

            // Update `profiles`
            DB::update('profiles')->set(array('first_name' => $post['first_name'],
                                              'last_name'  => $post['last_name'],
                                              'phone'      => $post['phone'],
                                              'geographic_region' => $post['geographic_region'],
                                              'insurance_company' => $post['insurance_company']))->where('user_id', '=', ':user_id')
                ->parameters(array(':user_id' => $user_id))
                ->execute($this->db);
        } catch (ORM_Validation_Exception $e) {
            print_r($e);
            die();
        }

        $post = array();
    }

    public function create_user_rules(){

                
        return array(
            'user' => array(
                'not_empty' => 'You must provide a username.',
                'Valid::phone' => 'Please provide a valid phone number.',
                'Valid::email' => 'Please enter an e-mail address.',
                'username_available' => 'This username is not available.',
                'password_confirm' => 'Passwords do not match.',
                'min_length' => 'Password must be atleast 6 characters.',
            )
        );
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
                    ->rule('password', 'not_empty')
                    ->rule('password', 'min_length', array(':value', '6'))
                    ->rule('password_confirm', 'matches', array(':validation', 'password_confirm', 'password'));
          if ($valid_post->check()) {
              return array('error' => false);
          } else {
              return array('error' => true, 'errors' => $valid_post->errors('default'));
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