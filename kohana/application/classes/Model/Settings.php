<?php defined('SYSPATH') or die('No direct script access.');

class Model_Settings extends Model_Base {
    
    public function __construct() {
    	parent::__construct();
    }



    public function get_email_template(){
    	$results = DB::query(Database::SELECT, 'select * from settings where description is not null')
        			   ->as_object()
        			   ->execute($this->db);

        echo "<pre>";

        foreach ($results as $key => $value) {
        	echo $value->name.'</br>';
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