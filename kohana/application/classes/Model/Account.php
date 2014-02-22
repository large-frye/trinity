<?php defined('SYSPATH') or die('No direct script access.');

class Model_Account extends Model_Base {

    const ADMIN     = 2;
    const INSPECTOR = 3;
    const CLIENT    = 4;

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



    public function get_work_orders($user_id, $user_type) {
        $where_clause = "1=1";

        switch ($user_type) {
            case '3' :
                $where_clause = "inspector_id = :user_id";
                break;
            case '4' :
                $where_clause = "uf.user_id = :user_id";
                break;
        }

        $result = DB::query(Database::SELECT, 'SELECT w.*, CONCAT(uf.first_name, " ", uf.last_name) as adjuster_name,
                                                      CONCAT(_uf.first_name, " ", _uf.last_name) as inspector_name,
                                                      wos.name as status_name, _is.name as inspection_status,
                                                      IF(it.name IS NULL, "No Type", it.name) as inspection_type, _uf.color as inspector_color
                                               FROM work_orders w
                                               LEFT JOIN users u ON u.id = w.user_id
                                               LEFT JOIN profiles uf ON uf.user_id = u.id
                                               LEFT JOIN users _u ON _u.id = w.inspector_id
                                               LEFT JOIN profiles _uf ON _uf.user_id = _u.id
                                               LEFT JOIN work_order_statuses wos ON wos.id = w.status
                                               LEFT JOIN inspection_statuses _is ON _is.id = w.inspection_status
                                               LEFT JOIN inspection_types it ON it.id = w.type
                                               LEFT JOIN inspections i ON i.work_order_id = w.id
                                               WHERE ' . $where_clause)
                      ->parameters(array(':user_id' => $user_id))
                      ->as_object()
                      ->execute($this->db);

        return $result;
    }



    public function get_user_list($status) {
        $result = DB::query(Database::SELECT, 'SELECT u.* 
                                               FROM users u 
                                               LEFT JOIN profiles p ON u.id = p.user_id
                                               WHERE u.status = :status
                                               GROUP BY u.id')
                      ->parameters(array(':status' => $status))
                      ->as_object()
                      ->execute($this->db);

        return $result;
    }



/**
* Check if the email already exists in the database
* @param $username
* @return boolean
*/
public static function unique_username($username)
{
    //check to see if username existsin the database
    return ! DB::select(array(DB::expr('COUNT(username)'), 'total'))
        ->from('users')
        ->where('username', '=', $username)
        ->execute()
        ->get('total');
}


/**
* Check if the email already exists in the database
* @param $email
* @return boolean
*/
  public static function unique_email($email)
{
    
    return ! DB::select(array(DB::expr('COUNT(email)'), 'total'))
        ->from('users')
        ->where('email', '=', $email)
        ->execute()
        ->get('total');
}
public static function user_exists($email){
  
  $result = DB::select(array(DB::expr('COUNT(email)'), 'total'))
        ->from('users')
        ->where('email', '=', $email)
        ->execute()
        ->get('total');
        if($result==0){
          return false;
        }else{
        return true;
      }
}




public function get_user_name($post){
return DB::query(Database::SELECT, 'SELECT id, username, email FROM users where email = :email')
                ->parameters(array(':email' => $post['email']))
                ->as_object()
                ->execute($this->db);
}


public function generateRandomString() {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < 10; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}


 public function send_forgotpassword($pass, $id, $mailer_model, $email, $uid){ 
    $user = ORM::factory('User', $id);
    $user->password = $pass; 
    $user->save();
     
     $mailer_model->send_mail($email, 'a.frye4@gmail.com', 'Trinity Password Reset', 5, 
      array('::username::' => $uid,
             '::password::' => $pass), null, null, null);

     return true;
 }
 public function validate_lost_password($post){
     $valid_post = Validation::factory($post);
     $valid_post->rule('email', 'Model_Account::user_exists');

  if ($valid_post->check()) {
              return array('error' => false);
          } else {
              return array('error' => true, 'errors' => $valid_post->errors('default'));
          }
                   
 }
 public function validate_new_user($post){

    $valid_post = Validation::factory($post);

         $valid_post->rule('first_name', 'not_empty')
                    ->rule('last_name', 'not_empty')
                    ->rule('phone', 'not_empty')
                    ->rule('phone', 'Valid::phone')
                    ->rule('geographic_region', 'not_empty')
                    ->rule('username', 'not_empty')
                    ->rule('username', 'Model_Account::unique_username')
                    ->rule('email', 'Valid::email')
                    ->rule('email', 'Model_Account::unique_email')
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
        $_clients = DB::query(Database::SELECT, 'SELECT u.id, u.email, CONCAT(p.first_name, " ", p.last_name) as adjuster_name
                                                 FROM users u 
                                                 LEFT JOIN roles_users ru ON u.id = ru.user_id 
                                                 LEFT JOIN profiles p ON p.user_id = u.id
                                                 WHERE ru.role_id = 4')
                        ->as_object()
                        ->execute($this->db);
        $clients = array();

        foreach($_clients as $client) {
            $clients[$client->id] = $client->adjuster_name;
        }

        return $clients;
    }



    /**
     * Return the current user's role_type
     *
     * @param  int $user_id
     * @return int
     */
    public function get_user_type($user_id) {
        $result = DB::query(Database::SELECT, "SELECT role_id FROM roles_users where user_id = :user_id AND role_id != 1")
                      ->parameters(array(':user_id' => $user_id))
                      ->as_object()
                      ->execute($this->db);

        foreach($result as $_result) {
            switch ($_result->role_id) {
                case $this::ADMIN :
                    return $this::ADMIN;
                case $this::INSPECTOR :
                    return $this::INSPECTOR;
                case $this::CLIENT :
                    return $this::CLIENT;
            }
        }
    }



    /**
     * Check to see if a report exists for a work order id
     *
     * @param int $workorder_id
     */
    public function check_if_inspection_report_exists ($workorder_id) {
        // $result = DB::query(Database::SELECT, "SELECT ")
    }



    /**
     * Get all inspector information
     *
     */
    public function get_inspectors_info () {
        return DB::query(Database::SELECT, "SELECT p.*
                                            FROM users u
                                            LEFT JOIN roles_users ru ON u.id = ru.user_id
                                            LEFT JOIN profiles p ON p.user_id = u.id
                                            WHERE ru.role_id = 3")
                   ->as_object()
                   ->execute($this->db);
    }





}