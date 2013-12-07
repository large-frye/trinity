<?php defined('SYSPATH') or die('No direct script access.');

class Model_Custom extends Model_Base {

		public function validate_name($post){
			if(!isset($post['delete_category']) || !isset($post['change_parent']) ){
				  return Valid::not_empty($post['name']) ? true : false;
			}
		}


}


?>