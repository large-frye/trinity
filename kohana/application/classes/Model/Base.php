<?php defined('SYSPATH') or die('No direct script access.');

class Model_Base extends Model {

    public $db; 

	public function __construct() {
		$this->db = Database::instance('default');
	}
}