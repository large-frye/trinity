<?php defined('SYSPATH') or die('No direct script access.');

class Model_Invoice extends Model_Base {

    public function __construct() {
        parent::__construct();


    }



    /**
     * Check to see if there is data in `inspection_meta` for $id
     *
     * @param  int $id
     * @return int
     */
    public function check_if_inspection_report_exists($id) {
        return DB::query(Database::SELECT, "SELECT id FROM inspection_meta WHERE workorder_id = :id")
                   ->parameters(array(':id' => $id))
                   ->as_object()
                   ->execute($this->db)
                   ->count();
    }
}