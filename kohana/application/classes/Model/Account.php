<?php defined('SYSPATH') or die('No direct script access.');

class Model_Account extends Model_Base {



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
                                    : array('status' => false, 
                                    	    'errors' => $valid_post->errors('default'));
	}



    public function get_work_orders($user_id) {

        $result = DB::query(Database::SELECT, 'SELECT w.*, CONCAT(uf.first_name, " ", uf.last_name) as adjuster_name,
                                                      CONCAT(_uf.first_name, " ", _uf.last_name) as inspector_name,
                                                      wos.name as status_name, _is.name as inspection_status
                                               FROM work_orders w
                                               LEFT JOIN users u ON u.id = w.user_id
                                               LEFT JOIN profiles uf ON uf.user_id = u.id
                                               LEFT JOIN users _u ON _u.id = w.inspector_id
                                               LEFT JOIN profiles _uf ON _uf.user_id = _u.id
                                               LEFT JOIN work_order_statuses wos ON wos.id = w.status
                                               LEFT JOIN inspection_statuses _is ON _is.id = w.inspection_status
                                               WHERE 1=1')
                      ->parameters(array(':user_id' => $user_id))
                      ->as_object()
                      ->execute($this->db);

        return $result;
    }



    public function get_user_list($type) {
        $result = DB::query(Database::SELECT, 'SELECT u.* 
                                               FROM users u 
                                               LEFT JOIN profiles p ON u.id = p.user_id
                                               GROUP BY u.id')
                      ->parameters(array(':type' => $type))
                      ->as_object()
                      ->execute($this->db);

        return $result;
    }

public function add_new_user($post){

print_r($post);

}


  


 public function validate_new_user($post){

    $valid_post = Validation::factory($post);

         $valid_post->rule('first_name', 'not_empty')
                    ->rule('last_name', 'not_empty')
                    ->rule('phone', 'not_empty')
                    ->rule('phone', 'Valid::phone')
                    ->rule('geographic_region', 'not_empty')
                    ->rule('username', 'not_empty')
                    ->rule('email', 'Valid::email')
                    ->rule('insurance_company', 'not_empty')
                    ->rule('password', 'not_empty')
                    ->rule('confirm-password', 'not_empty')
                    ->rule('password', 'min_length', array(':value', '6'))
                    ->rule('confirm-password', 'matches', array(':validation', 'confirm-password', 'password'));
          if ($valid_post->check()) {
              return array('error' => false);
          } else {
              return array('error' => true, 'errors' => $valid_post->errors('default'));
          }

 }


    /**
     * Return roles to controller
     *
     * @return MySQL_Database Object
     */
    public function get_roles() {
        return DB::query(Database::SELECT, 'SELECT * FROM roles WHERE id > 1')
                   ->as_object()
                   ->execute($this->db);
    }



    public function get_clients() {
        $_clients = DB::query(Database::SELECT, 'SELECT u.id, u.email FROM users u LEFT JOIN roles_users ru ON u.id = ru.user_id WHERE ru.role_id = 4')
                        ->as_object()
                        ->execute($this->db);
        $clients = array();

        foreach($_clients as $client) {
            $clients[$client->id] = $client->email;
        }

        return $clients;
    }
}