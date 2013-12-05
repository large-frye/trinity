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
        //	print_r($value);
        }
        			  
      }

    }