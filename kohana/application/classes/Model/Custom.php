<?php defined('SYSPATH') or die('No direct script access.');

class Model_Custom extends Model_Base {

		public function validate_name($post){
			if(!isset($post['delete_category']) || !isset($post['change_parent']) ){
				  return Valid::not_empty($post['name']) ? true : false;
			}
		}



        public function validate_dropdown_value($key_value, $value_not_allowed) {
            return $key_value != $value_not_allowed ? true : false;
        }



        public function validate_slope_values($value) {
            $error_values = array('left', 'right', 'front', 'rear');

            foreach ($value as $val) {
                if (in_array($val, $error_values)) {
                    return false;
                }
            }

            return true;
        }


}


?>