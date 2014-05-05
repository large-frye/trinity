<?php defined( 'SYSPATH' ) or die( 'No direct script access.' );

class Controller_Inspections extends Controller_Account {

    protected $_workorder_id = null;

    protected $_auto_upgrade = null;

    public function __construct( $request, $response ) {
        parent::__construct( $request, $response );
        $this->workorders_model = Model::factory( 'Workorders' );
        $this->inspections_model = Model::factory( 'Inspections' );
        $this->settings_model = Model::factory( 'Settings' );

        if ( $this->request->action() === 'uploadphotos' ||
            $this->request->action() === 'catigorizephotos'||
            $this->request->action() === 'editphotos' ||
            $this->request->action() === 'viewphotos' ) {
            ini_set( 'upload_max_filesize', '10M' );
            ini_set( 'post_max_size', '10M' );
            $this->masterModel->js = array( 'http://code.jquery.com/jquery-1.9.1.js',
                "http://code.jquery.com/jquery-migrate-1.1.1.js",
                "/assets/js/inspection/sort.js",
                "http://code.jquery.com/ui/1.10.3/jquery-ui.js",
                "/assets/js/inspection/imgUploader.js", );
            ksort( $this->masterModel->js );
        }


        // Include PDF dompdf creation from HTML -> PDF
        //include($_SERVER['DOCUMENT_ROOT'] . "/trinity/dompdf/dompdf_config.inc.php");

        if ( file_exists( $_SERVER['DOCUMENT_ROOT'] . "/trinity/dompdf/dompdf_config.inc.php" ) ) {
            include $_SERVER['DOCUMENT_ROOT'] . "/trinity/dompdf/dompdf_config.inc.php";
        }
    }


    public function before() {
        parent::before();
        $this->template->homepage = false;
        $this->template->side_bar = View::factory( 'inspections/side-bar' );
        $this->_admin = $this->user_type === Model_Account::ADMIN ? true : false;
        $this->_inspector = $this->user_type === Model_Account::INSPECTOR ? true : false;
        $this->_workorder_id = $this->request->param( 'id' );
        $this->_auto_upgrade = $this->request->param( 'id2' );



        // /       ini_set("memory_limit", "120M");
        //        ini_set('display_errors', 1);
        //        error_reporting(E_ALL);

        //       $dompdf = new DOMPDF();
        //      $pdf_html = View::factory('pdf/generated');
        // $view = $_SERVER['DOCUMENT_ROOT'] . "/trinity/generated.php";
        //$dompdf->load_html($pdf_html);
        //$dompdf->render();
        //$dompdf->stream('sample.pdf');
    }



    public function action_test() {
        $this->template->content = View::factory( 'pdf/generated' );
    }



    public function action_index() {
        parent::action_index();
    }


    public function action_viewphotos() {
        $view = View::factory( 'inspections/viewphotos' );

        $view->categories = $this->settings_model->get_categories();
        $view->photos =  $this->inspections_model-> get_photos_by_id( $this->_workorder_id );
     
        $this->template->side_bar = View::factory( 'inspections/photo-sidebar' );
        $this->template->content = $view;
    }

    public function action_catigorizephotos() {
        $view = View::factory( 'inspections/catigorizephotos' );

        if ( $this->request->method() === 'POST' ) {
            $view->photos =  $this->inspections_model-> update_photo_categories( $this->_post );
        }
        $view->photos =  $this->inspections_model-> get_photos_by_id( $this->_workorder_id );
        $view->categories = $this->settings_model->get_categories();
        $this->template->side_bar = View::factory( 'inspections/photo-sidebar' );
        $this->template->content = $view;
    }

      public function action_deletephotos() {
        $view = View::factory( 'inspections/deletephotos' );

        if ( $this->request->method() === 'POST' ) {
            print_r($this->_post);
            die();
            $view->photos =  $this->inspections_model-> delete_photos( $this->_post );
        }
        $view->photos =  $this->inspections_model-> get_photos_by_id( $this->_workorder_id );
        $this->template->side_bar = View::factory( 'inspections/photo-sidebar' );
        $this->template->content = $view;
    }



    public function action_editphotos() {
        $view = View::factory( 'inspections/editphotos' );
        if ( $this->request->method() === 'POST' ) {
            $this->inspections_model->update_photo_order( $this->_post );
        }

        $view->parentCategories = $this->settings_model->get_parent_categories();
        $view->photos =  $this->inspections_model-> get_photos_by_id( $this->_workorder_id );

        $this->template->side_bar = View::factory( 'inspections/photo-sidebar' );
        $this->template->content = $view;
    }

    public function action_uploadphotos() {
        $view = View::factory( 'inspections/uploadphotos' );
        if ( $this->request->method() === 'POST' ) {
            if ( !empty( $_FILES ) ) {
                $this->inspections_model->save_photos( $this->_post, $_FILES, $this->_workorder_id );

                //redirectx
        //      $view->photos =  $this->inspections_model-> get_photos_by_id( $this->_workorder_id );
        //     $view->categories = $this->settings_model->get_categories();
                $this->request->redirect('/inspections/catigorizephotos/' . $this->_workorder_id);
            }
        }
 
        $this->template->side_bar = View::factory( 'inspections/photo-sidebar');
        $this->template->content = $view;
        
    }



    public function action_view() {
        $view = View::factory( 'workorders/view' );
        $view->inspectors = $this->workorders_model->get_inspectors();
        $view->inspection_statuses = $this->workorders_model->get_inspection_statuses();
        $view->admin = $this->_admin;
        $view->inspector = $this->_inspector;

        if ( $this->request->method() === 'POST' ) {
            if ( isset( $this->_post['set_inspection_status'] ) ) {
                if ( $this->workorders_model->set_workorder_inspection_status( $this->_post, $this->request->param( 'id' ) ) ) {
                    $view->success = "Work order has been updated.";
                } else {

                    $view->error = "There was an error updating this order's status. Please try again.";
                }
            } else if ( isset( $this->_post['add_comment'] ) ) {
                    $this->workorders_model->add_comment( $this->_post, $this->request->param( 'id' ), $this->_user->id );
                }
        }

        $view->details = $this->workorders_model->get_workorder_details( $this->request->param( 'id' ) );
        $view->messages = $this->workorders_model->get_workorder_comments( $this->request->param( 'id' ) );
        $this->template->content = $view;
    }



    public function action_form() {
        $view = View::factory( 'inspections/form' );

        // Check for auto_upgrade
        $view->auto_upgrade = $this->inspections_model->check_for_auto_upgrade( $this->_workorder_id, $this->_auto_upgrade );
        $view->errors = Model_Inspections::$errors;

        // Will be empty if there is no inspection form save for this report.
        $view->data = $this->inspections_model->get_inspection_data( $this->_workorder_id );
        $view->workorder_details = $this->workorders_model->get_workorder_details( $this->request->param( 'id' ) );
        $view->data['type'] = $view->workorder_details->type;
        $view = $view->workorder_details->type == 1 ? $this->_load_form( $view, true ) : $this->_load_form( $view, false );

        if ( $this->request->method() === "POST" ) {
            $view->form->post = $this->_post;

            if ( $this->inspections_model->validate_inpsection_report( $this->_post, $this->_workorder_id ) ) {
                $view->success = "Your inspection report was submitted successfully. Go to <a href=\"/inspections/uploadphotos/" . $this->_workorder_id . "\">upload photos</a>";
            } else {
                $view->errors = Model_Inspections::$errors;
                $view->form->errors = Model_Inspections::$errors;
            }
        }

        $this->template->content = $view;
    }



    public function action_estimates() {
        $view = View::factory( 'inspections/estimates' );

        if ( $this->request->method() === "POST" ) {
            if ( $this->inspections_model->validate_estimate_form( $this->_post, $this->_workorder_id ) ) {
                $view->success = "Your estimates were added successfully.";
            } else {
                $view->errors = Model_Inspections::$errors;
            }
        }

        $view->estimates = $this->inspections_model->get_estimates( $this->_workorder_id );
        $this->template->content = $view;
    }



    public function after() {
        parent::after();
    }



    private function _load_form( $view, $expert ) {
        $view->form = $expert ? View::factory( 'inspections/expert' ) : View::factory( 'inspections/basic' );
        $view->form->data = $this->inspections_model->get_inspection_data( $this->_workorder_id, $this->_post );

        $view->form->inspection_type = $view->workorder_details->type == 1 ? "Expert Inspection" : "Basic Inspection";
        $view->form->roof_ages = $this->inspections_model->get_roof_ages();
        $view->form->roof_heights = $this->inspections_model->get_roof_heights();
        $view->form->framing_types = $this->inspections_model->get_type_of_framing();
        $view->form->pitches = $this->inspections_model->get_pitches();
        $view->form->layers = $this->inspections_model->get_layers();
        $view->form->roofing_types = $this->inspections_model->get_type_of_roofing();
        $view->form->if_rolled = $this->inspections_model->get_if_rolled();
        $view->form->conditions = $this->inspections_model->get_condition();
        $view->form->remove_reset_tarp = $this->inspections_model->get_remove_reset_trap();
        $view->form->lift_up_minor_reset_tarp = $this->inspections_model->get_lift_up_minor_reset_trap();
        $view->form->siding_types = $this->inspections_model->get_siding_types();
        $view->form->previous_repairs = $this->inspections_model->get_previous_repairs_made();
        $view->form->roof_conditions = $this->inspections_model->get_roof_conditions();
        $view->form->collateral_damamges = $this->inspections_model->get_collateral_damages();
        $view->form->slopes = $this->inspections_model->get_slopes();
        $view->form->wind_roof_peeled_back = $this->inspections_model->get_wind_roof_peeled_back();
        $view->form->fraud_wind_input = $this->inspections_model->get_fraud_wind_input();
        $view->form->fraud_hail_input = $this->inspections_model->get_fraud_hail_input();
        $view->form->siding_damages = $this->inspections_model->get_siding_damaged();
        $view->form->house_faces = $this->inspections_model->get_house_faces();
        $view->form->slope_values = $this->inspections_model->get_slope_values( $view->form->data );
        $view->form->data_values = $this->inspections_model->sift_data_values( $view->form->data );
        $view->form->metal_damages = $this->inspections_model->get_metal_damages();
        $view->form->hail_sizes = $this->inspections_model->get_hail_sizes();

        if ( $expert ) {
            $view->form->lighting_amount_damaged = $this->inspections_model->get_lighting_amount_damaged();
            $view->form->lighting_damages = $this->inspections_model->get_lighting_damages();
            $view->form->get_vermin_choices = $this->inspections_model->get_vermin_choices();
            $view->form->vandalism_choices = $this->inspections_model->get_vandalism_choices();
            $view->form->tree_information = $this->inspections_model->get_fall_tree_information();
            $view->form->debris = $this->inspections_model->get_excess_debris();
            $view->form->water_damages = $this->inspections_model->get_water_damages();
            $view->form->shingle_anomalies = $this->inspections_model->get_product_defects();
            $view->form->workmanship = $this->inspections_model->get_workmanship();
            $view->form->aged_worn = $this->inspections_model->get_aged_worn();
            $view->form->fire_damages = $this->inspections_model->get_fire_damages();
            $view->form->shingle_anomalies_types = $this->inspections_model->get_shingle_anomalies();
        }



        return $view;
    }
}
