<?php defined('SYSPATH') or die('No direct script access.');

class Model_Settings extends Model_Base {
    
    public function __construct() {
    	parent::__construct();
    }



    public function get_email(){
    	$result = DB::query(Database::SELECT, "SELECT * FROM settings WHERE name NOT LIKE '%workorder_type_price%'")
        			   ->as_object()
        			   ->execute($this->db);
            return $result;
    }


    public function update_emails($post){
         foreach($post as $key =>$email) {
             DB::update('settings')->set(array('value' => $email))->where('id', '=', ':id')
                ->parameters(array(':id' => $key))
                ->execute($this->db);
         }
    }

    /*
    *to do
    */
    public function edit_categories($post){


    }

    /*
    *to do
    */
    public function add_categories($post){


    }
    /*
    *to do
    */
    public function delete_categories($post){


    }

    
    public function get_categories(){
            $result =  DB::query(Database::SELECT, "SELECT * FROM `categories` ORDER BY parent_id")
                   ->as_object()
                   ->execute($this->db);  
             return $result;
    }

    public function validate_email_update($post){
        $valid_post = Validation::factory($post);
        foreach($post as $key =>$email) {
            if($key!='submit'){
                   $valid_post->rule($key, 'not_empty');
            }
          }
          if ($valid_post->check()) {
              return array('error' => false);
          } else {
              return array('error' => true, 'errors' => $valid_post->errors('default'));
          }
    }

    /**
     * Get current prices in `settings` table. 
     *
     * @return MySQL_Result Object
     */
    public function get_prices() {
        return DB::query(Database::SELECT, "SELECT * FROM settings WHERE name LIKE '%workorder_type_price%'")
                   ->as_object()
                   ->execute($this->db);
    }



    public function set_prices($post) {
        foreach($post as $price_id => $price) {
            DB::update('settings')->set(array('value' => $price))->where('id', '=', ':price_id')
                ->parameters(array(':price_id' => $price_id))
                ->execute($this->db);
        }
    }

} // End Model_Settings