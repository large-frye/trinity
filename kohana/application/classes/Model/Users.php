<?php defined('SYSPATH') or die('No direct script access.');

class Model_Users extends Model_Base {
    
    public static $errors = null;

    public function __construct() {
    	  parent::__construct();
        
    }



    public function create_user($post, $mailer_model) {
        try { 
            $user = ORM::factory('User');
            $user->username = $post['username'];
            $user->email    = $post['email'];
            $user->password = $post['password']; 
            $user->created_on_utc = date('Y:m:d H:i:s');
            $user->status   = 1;
            $user->save();


              $parameters = array(':id' => null,
                                        ':user_id' => $user->id,
                                        ':first_name' => $post['first_name'],
                                        ':last_name'  => $post['last_name'],
                                        ':phone'      => $post['phone'],
                                        ':geographic_region' => $post['geographic_region'],
                                        ':insurance_company' => $post['insurance_company']);
              $roles_params = array(':user_id' => $user->id,
                                    ':role_id' => $post['role_id'],
                                    ':_role_id' => 1);



            // Need to add user_profiles
            DB::insert('profiles')
                ->values(array_keys($parameters))
                ->parameters($parameters)
                ->execute($this->db);

       
      $insert = DB::insert('roles_users'); 
      $roles = array(1, $post['role_id']); 
      foreach($roles as $role) { 
          $insert->values(array($user->id, $role));
      } 
      
          $insert->execute($this->db);

          $mailer_model->send_mail($post['email'], 'a.frye4@gmail.com', 'An account for you at Trinity has been created',
                                   16, array('::username::' => $post['username'],
                                             '::password::' => $post['password']), null, null, null);
          return true;
      } catch (ORM_Validation_Exception $e) {
          var_dump($e->errors());
          return false;
      }

      $post = array();
    }



    /**
     * Send confirmationi email.
     *
     */
    public function send_confirmation_email($post){

       print_r($post);
       die();
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
            DB::update('roles_users')->set(array('role_id' => ':role_id'))->where('user_id', '=', ':user_id')->where('role_id', '=', ':old_role_id')
                ->parameters(array(':role_id' => $post['role_id'],
                                   ':old_role_id' => $role->role_id,
                                   ':user_id' => $user_id))
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
            print_r($e->getMessage());
            $this->db->rollback();
        }

        $post = array();
    }



    public function edit_profile($post, $user_id) {
        try { 
            $user = ORM::factory('User', $user_id);
            $user->username = $post['username'];
            $user->email    = $post['email'];
            $user->password = $post['password']; 
            $user->created_on_utc = date('Y:m:d H:i:s');
            $user->status   = 1;
            $user->save();

            // Update `profiles`
            DB::update('profiles')->set(array('first_name' => $post['first_name'],
                                              'last_name'  => $post['last_name'],
                                              'phone'      => $post['phone'],
                                              'geographic_region' => $post['geographic_region'],
                                              'insurance_company' => isset($post['insurance_company']) ? $post['insurance_company'] : null))
                ->where('user_id', '=', ':user_id')
                ->parameters(array(':user_id' => $user_id))
                ->execute($this->db);
            return true;
        } catch (ORM_Validation_Exception $e) {
            throw new Exception($e->getMessage());
            $this->db->rollback();
        }

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


    public function get_user($user_id, $post = array()) {
        $data = array();

        $results = DB::query(Database::SELECT, "SELECT * FROM users u 
                                        LEFT JOIN profiles p ON u.id = p.user_id
                                        LEFT JOIN roles_users ru ON ru.user_id = u.id AND ru.role_id != 1
                                        WHERE u.id = :user_id")
                       ->parameters(array(':user_id' => $user_id))
                       ->execute($this->db)
                       ->as_array();

        foreach ($results as $key => $result) {
            foreach($result as $table_col_name => $table_val) {
                $data[$table_col_name] = $table_val;
            }
        }

        if (!empty($post)) {
            foreach ($data as $key => $value) {
                if (in_array($key, array_keys($post))) {
                    $data[$key] = $post[$key];
                }
            }

            $data += $post;
        }

        return (object) $data;
    }



    public function delete_user($user_id, $mailer_model) {
        try {
            DB::update('users')->set(array('status' => 2))->where('id', '=', ':id')->parameters(array(':id' => $user_id))->execute($this->db);

            $user = $this->get_user($user_id);

            $mailer_model->send_mail($user->email, 'a.frye4@gmail.com', 'Your account with Trinity has been deactivated',
                                       17, array('::name::' => $user->first_name), null, null, null);
            return true;
        } catch (Database_Exception $e) {
            $this::$errors = $e->getMessage();
            return false;
        }
    }



    public function activate_user($user_id, $mailer_model) {
        try {
            DB::update('users')->set(array('status' => 1))->where('id', '=', ':id')->parameters(array(':id' => $user_id))->execute($this->db);

            $user = $this->get_user($user_id);

            $mailer_model->send_mail($user->email, 'a.frye4@gmail.com', 'Your account with Trinity has been activated',
                                       18, array('::name::' => $user->first_name), null, null, null);
            return true;
        } catch (Database_Exception $e) {
            $this::$errors = $e->getMessage();
            return false;
        }
    }



    public function check_if_user_is_deleted($user_name) {
        $user = DB::query(Database::SELECT, "SELECT id FROM users WHERE username = :user_name AND status = 2")
                    ->parameters(array(':user_name' => $user_name))
                    ->as_object()
                    ->execute($this->db);

        return $user->count() > 0 ? true : false;
    }
}