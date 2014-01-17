<?php defined('SYSPATH') or die('No direct script access.');

class Model_Invoice extends Model_Base {

    public function __construct() {
        parent::__construct();

        $this->workorders_model = Model::factory('workorders');
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



    public function get_prices($type) {
        return DB::query(Database::SELECT, "SELECT value FROM settings WHERE name = 'workorder_type_price_" . $type . "'")
                   ->as_object()
                   ->execute($this->db)
                   ->current()
                   ->value;
    }



    public function create_invoice($workorder_id) {
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/trinity/dompdf/dompdf_config.inc.php")) { 
            include ($_SERVER['DOCUMENT_ROOT'] . "/trinity/dompdf/dompdf_config.inc.php"); 
        } else {
            die('file can\'t be found');
        }

        ini_set("memory_limit", "512M");
        ini_set('display_errors', 1);
        error_reporting(E_ALL);

        $dompdf = new DOMPDF();
        $pdf_html = View::factory('pdf/invoice');
        $pdf_html->inspection_data = (array) $this->workorders_model->get_workorder_details($workorder_id);
        //$pdf_html->data = (array) $data;
        $dompdf->load_html($pdf_html);
        $dompdf->render();
        $dompdf->stream('sample.pdf');
    }
}