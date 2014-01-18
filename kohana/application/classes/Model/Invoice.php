<?php defined('SYSPATH') or die('No direct script access.');

class Model_Invoice extends Model_Base {

    public static $errors = null;

    protected $_file_path = null;

    protected $_web_file_path = null;

    public function __construct() {
        parent::__construct();

        $this->workorders_model = Model::factory('workorders');
       //  $this->mailer_model = Model::factory('mailer');
        $this->_file_path = $_SERVER['DOCUMENT_ROOT'] . "trinity/assets/pdf/output/" . "invoice_";
        $this->_web_file_path = str_replace($_SERVER['DOCUMENT_ROOT'], '', $this->_file_path);
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



    public function invoice_meta($id) {
        return DB::query(Database::SELECT, "SELECT description, amount FROM invoice_meta WHERE workorder_id = :id")
                   ->parameters(array(':id' => $id))
                   ->as_object()
                   ->execute($this->db);
    }



    public function view_invoice($workorder_id) {
        if (file_exists($this->_file_path . $workorder_id . ".pdf")) {
            Request::current()->redirect($this->_web_file_path . $workorder_id . ".pdf");
        }
    }



    public function create_invoice($workorder_id, $data) {
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/trinity/dompdf/dompdf_config.inc.php")) { 
            include ($_SERVER['DOCUMENT_ROOT'] . "/trinity/dompdf/dompdf_config.inc.php"); 
        } else {
            die('file can\'t be found');
        }

        ini_set("memory_limit", "512M");
        ini_set('display_errors', 1);
        error_reporting(E_ALL);

        try {
            $dompdf = new DOMPDF();
            $pdf_html = View::factory('pdf/invoice');
            $pdf_html->inspection_data = (array) $data;
            $pdf_html->total = $this->_get_total($workorder_id, $pdf_html->inspection_data['price']);
            $pdf_html->invoice_meta = $this->invoice_meta($workorder_id);
            $dompdf->load_html($pdf_html);
            $dompdf->render();
            $file = $this->_file_path . $workorder_id . ".pdf";
            file_put_contents($file, $dompdf->output());
            $dompdf->stream('sample.pdf');
            return true;
        } catch (Exception $e) {
            $this::$errors = "Error processing this PDF." . $e;
            return false;
        }
    }



    public function send_invoice($workorder_id, $details, $mailer_model) {
        if (!$this->check_if_invoice_pdf_exists($workorder_id)) {
           return false;
        }

        $mailer_model->send_mail($details->adjuster_email, 'a.frye4@gmail.com', 'Trinity Inspection Invoice for Work Order: ' . $workorder_id,
                                       13, array('::first_name::' => $details->first_name,
                                                 '::last_name::'  => $details->last_name), null, null, array($this->_file_path . $workorder_id . ".pdf"));
        return true;
    }



    public function check_if_invoice_pdf_exists($workorder_id) {
        if (!file_exists($this->_file_path . $workorder_id . ".pdf")) {
            self::$errors = "File does not exist. Try \"View PDF Invoice again.\".";
            return false;
        } else {
            return true;
        }
    }



    public function validate_invoice_meta_form($post, $workorder_id) {
        $_post = Validation::factory($post);

        $_post->rule('descriptions', 'Valid::alpha_dash', array('descriptions'))
              ->rule('ammounts', 'Valid::numeric');

        if ($_post->check()) {
            return $this->_insert_invoice_meta($post, $workorder_id);
        } else {
            $this::$errors = $_post->errors('default');
            return false;
        }
    }



    private function _insert_invoice_meta($post, $id) {
        $parameters = array();

        try {
            DB::delete('invoice_meta')->where('workorder_id', '=', ':id')->parameters(array(':id' => $id))->execute($this->db);

            for ($i = 0; $i < count($post['descriptions']); $i++) {
                $parameters[] = array(':id' => null,
                                      ':workorder_id' => $id,
                                      ':description' => $post['descriptions'][$i],
                                      ':amount'      => $post['amounts'][$i]);
            }

            foreach ($parameters as $params) {
                DB::insert('invoice_meta')->values(array_keys($params))->parameters($params)->execute($this->db);
            }

            return true;
        } catch (Database_Exception $e) {
            $this::$errors = $e->get_message();
            return false;
        }
    }



    private function _get_total($workorder_id, $price) {
        $invoice_meta = $this->invoice_meta($workorder_id);
        $total = $price;

        if ($invoice_meta->count() == 0) {
            return $price;
        } else {
            foreach ($invoice_meta as $meta) {
                $total += $meta->amount;
            }

            return $total;
        }
    }
}