<?php defined('SYSPATH') or die('No direct script access.');

class Model_Invoice extends Model_Base {

    public static $errors = null;

    protected $_file_path = null;

    protected $_web_file_path = null;

    public function __construct() {
        parent::__construct();

        $this->workorders_model = Model::factory('Workorders');
       //  $this->mailer_model = Model::factory('mailer');
        $this->_file_path = $_SERVER['DOCUMENT_ROOT'] . "/assets/pdf/output/" . "invoice_";
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
        $workorder_info = $this->workorders_model->get_workorder_details($workorder_id);
        
        if (file_exists($this->_file_path . $workorder_info->last_name . "_Claim" . $workorder_info->policy_number . ".pdf")) {
            Request::current()->redirect($this->_web_file_path . $workorder_info->last_name . "_Claim" . $workorder_info->policy_number . ".pdf");
        }
    }



    public function create_invoice($workorder_id, $data) {
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/dompdf/dompdf_config.inc.php")) { 
            include ($_SERVER['DOCUMENT_ROOT'] . "/dompdf/dompdf_config.inc.php"); 
        } else {
            die('file can\'t be found');
        }

        ini_set("memory_limit", "512M");
        ini_set('display_errors', 1);
        error_reporting(E_ALL);

        $workorder_info = $this->workorders_model->get_workorder_details($workorder_id);

        try {
            $dompdf = new DOMPDF();
            $pdf_html = View::factory('pdf/invoice');
            $pdf_html->inspection_data = (array) $data;
            $pdf_html->total = $this->_get_total($workorder_id, $pdf_html->inspection_data['price']);
            $pdf_html->invoice_meta = $this->invoice_meta($workorder_id);
            $dompdf->load_html($pdf_html);
            $dompdf->render();
            $file = $this->_file_path . $workorder_info->last_name . "_Invoice" . $workorder_info->policy_number . ".pdf";
            file_put_contents($file, $dompdf->output());
            $dompdf->stream($workorder_info->last_name . "_Invoice" . $workorder_info->policy_number . ".pdf");
            return true;
        } catch (Exception $e) {
            $this::$errors = "Error processing this PDF." . $e;
            return false;
        }
    }


    public function add_invoice_items($req, $workorder_id) {

        // Delete from `invoice_meta`
        DB::delete('invoice_meta')
            ->where('workorder_id', '=', ':id')
            ->parameters(array(
                ':id' => $workorder_id
                ))
            ->execute($this->db);

        foreach ($req as $item) {
            $parameters = array(
                ':id' => null,
                ':workorder_id' => $workorder_id,
                ':description' => $item->name,
                ':amount' => $item->cost
                );

            DB::insert('invoice_meta')->values(array_keys($parameters))->parameters($parameters)->execute($this->db);
        }

    }



    public function send_invoice($workorder_id, $details, $mailer_model) {
        if (!$this->check_if_invoice_pdf_exists($workorder_id)) {
           return false;
        }

        print_r($details);

        /* $mailer_model->send_mail($details->adjuster_email, 'a.frye4@gmail.com', 'Trinity Inspection Invoice for Work Order: ' . $workorder_id,
                                       13, array('::first_name::' => $details->first_name,
                                                 '::last_name::'  => $details->last_name), null, null, array($this->_file_path . $workorder_id . ".pdf")); */
        return true;
    }



    public function check_if_invoice_pdf_exists($workorder_id) {
        $workorder_info = $this->workorders_model->get_workorder_details($workorder_id);

        if (!file_exists($this->_file_path . $workorder_info->last_name . "_Claim" . $workorder_info->policy_number . ".pdf")) {
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


    public function get_invoice_options($workorder_id) {
        $items = array(
            'bir' => array(
                'cost' => '200',
                'name' => 'Basic Inspection Report'
            ),

            'ssd_up_7_pitch' => array(
                'cost' => '250', 
                'name' => 'Single Story Dwelling Up to a 7 Pitch'
                ),

            'tsd_up_7_pitch' => array(
                'cost' => '300',
                'name' => 'Two Story Dwelling Up to a 7 Pitch'
                ),

            'ssd_over_7_pitch' => array(
                'cost' => '350',
                'name' => 'Single Story Dwelling Over a 7 Pitch'
                ),

            'tsd_over_7_pitch' => array(
                'cost' => '375',
                'name' => 'Two Story Dwelling Over a 7 Pitch'
                ),

            'ida_m' => array(
                'cost' => '50',
                'name' => 'Interior Damage Assessment and Measurements'
                ),
            'ler' => array(
                'cost' => '500',
                'name' => 'Licensed Engineer\'s Report, Inspected By An Engineer. Add this to base price above.'
                ),
                     

            'ads' => array(
                'cost' => '50',
                'name' => 'Additional detached structures (base price includes dwelling plus one detached structure)',
                ),

            'any_70' => array(
                'cost' => '100',
                'name' => 'Any Structure over 70 Squares'
                ),

            'any_200' => array(
                'cost' => '200',
                'name' => 'Any Structure over 200 Squares'
                ),
            
            'add_story_2' => array(
                'cost' => '100', 
                'name' => 'Any additional story over 2 Stories'
                ),
                     
            'add_story' => array(
                'cost' => '100',
                'name' => 'Additional story'
                ),

            'extra_third' => array(
                'cost' => '50',
                'name' => 'Extra Building (Third)',
                ),

            'extra_fourth' => array(
                'cost' => '50',
                'name' => 'Extra Building (Fourth)',
                ),

            'extra_fifth' => array(
                'cost' => '50',
                'name' => 'Extra Building (Fifth)',
                ),

            'extra_sixth' => array(
                'cost' => '50',
                'name' => 'Extra Building (Sixth)',
                ),

            'discount' => array(
                'cost' => '-50',
                'name' => 'Multiple Building Discount',
                ),

            'est_o_dam' => array(
                'cost' => '50',
                'name' => 'Estimate of Damages'
                )

            );

        // CHeck to see if any of the $item are in the DB
        $itemsDB = DB::query(Database::SELECT, "SELECT description, amount FROM invoice_meta WHERE workorder_id = :id")
            ->parameters(array(
                ':id' => $workorder_id
                ))
            ->as_object()
            ->execute($this->db);

        $count = 0;

        foreach ($items as $key => $item) {

            foreach ($itemsDB as $itemDB) {
                if ($item['name'] == $itemDB->description) {
                    $items[$key]['checked'] = true;
                    $items[$key]['cost'] = $itemDB->amount;
                }
            }
        }

        $names = array();

        foreach ($items as $key => $value) {
            $names[] = $value['name'];
        }

        foreach ($itemsDB as $itemDB) {
            if (!in_array($itemDB->description, $names)) {
                $items[strtolower(str_replace(' ', '_', $itemDB->description))] = array(
                    'cost' => $itemDB->amount,
                    'name' => $itemDB->description,
                    'checked' => true,
                    );
            }
        }

        return $items;
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
        $total = 0;

        foreach ($invoice_meta as $meta) {
            $total += $meta->amount;
        }

        return $total;
        
    }
}