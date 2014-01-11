<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Inspections extends Controller_Account {

    public function __construct($request, $response) {
        parent::__construct($request, $response);
        $this->workorders_model = Model::factory('workorders');
        $this->inspections_model = Model::factory('inspections');
        $this->settings_model = Model::factory('settings');
    }


    public function before() {
        parent::before();
        $this->template->homepage = false;
        $this->template->side_bar = View::factory('inspections/side-bar');
        $this->_admin = $this->user_type === Model_Account::ADMIN ? true : false;
        $this->_inspector = $this->user_type === Model_Account::INSPECTOR ? true : false;
    }



    public function action_index() {
        parent::action_index();
    }

  
    public function action_viewphotos() {
        $view = View::factory('inspections/viewphotos');
        $this->template->side_bar = View::factory('inspections/photo-sidebar');
                   $this->template->content = $view;
    }

    public function action_editphotos() {
        $view = View::factory('inspections/editphotos');
        $this->template->side_bar = View::factory('inspections/photo-sidebar');
        $this->template->content = $view;
    }

    public function action_uploadphotos() {
        $view = View::factory('inspections/uploadphotos');
        $view->categories = $this->settings_model->get_categories();
       //print_r($this->template->script);
       // array('name' => 'src', ....) $this->template->scripts; 
       // unset($this->template->scripts[''];
        $this->template->side_bar = View::factory('inspections/photo-sidebar');
        $this->template->content = $view;
    }



    public function action_view() {
        $view = View::factory('workorders/view');
        $view->inspectors = $this->workorders_model->get_inspectors();
        $view->inspection_statuses = $this->workorders_model->get_inspection_statuses();
        $view->admin = $this->_admin;
        $view->inspector = $this->_inspector;

        if ($this->request->method() === 'POST') {
            if (isset($this->_post['set_inspection_status'])) {
                if ($this->workorders_model->set_workorder_inspection_status($this->_post, $this->request->param('id'))) {
                    $view->success = "Work order has been updated.";
                } else {

                    $view->error = "There was an error updating this order's status. Please try again.";
                }
            } else if(isset($this->_post['add_comment'])){
                $this->workorders_model->add_comment($this->_post, $this->request->param('id'), $this->_user->id);
            }
        }

        $view->details = $this->workorders_model->get_workorder_details($this->request->param('id'));
        $view->messages = $this->workorders_model->get_workorder_comments($this->request->param('id'));
        $this->template->content = $view;
    }



    public function action_form() {
        $view = View::factory('inspections/form');

        // Will be empty if there is no inspection form save for this report. 
        $pre_fill_inspection_data = $this->inspections_model->get_inspection_data($this->request->param('id'));

        $view->workorder_details = $this->workorders_model->get_workorder_details($this->request->param('id'));
        $view->inspection_type = $view->workorder_details->is_expert == 1 ? "Expert Inspection" : "Basic Inspection";
        $view->roof_ages = $this->inspections_model->get_roof_ages();
        $view->roof_heights = $this->inspections_model->get_roof_heights();
        $view->framing_types = $this->inspections_model->get_type_of_framing();
        $view->pitches = $this->inspections_model->get_pitches();
        $view->layers = $this->inspections_model->get_layers();
        $view->roofing_types = $this->inspections_model->get_type_of_roofing();
        $view->if_rolled = $this->inspections_model->get_if_rolled();
        $view->conditions = $this->inspections_model->get_condition();
        $view->remove_reset_tarp = $this->inspections_model->get_remove_reset_trap();
        $view->lift_up_minor_reset_tarp = $this->inspections_model->get_lift_up_minor_reset_trap();
        $view->previous_repairs = $this->inspections_model->get_previous_repairs_made();
        $view->collateral_damamges = $this->inspections_model->get_collateral_damages();
        $view->slopes = $this->inspections_model->get_slopes();
        $view->wind_roof_peeled_back = $this->inspections_model->get_wind_roof_peeled_back();
        $view->lighting_amount_damaged = $this->inspections_model->get_lighting_amount_damaged();
        $view->lighting_damages = $this->inspections_model->get_lighting_damages();
        $view->get_vermin_choices = $this->inspections_model->get_vermin_choices();
        $view->vandalism_choices = $this->inspections_model->get_vandalism_choices();
        $view->siding_types = $this->inspections_model->get_siding_types();
        $view->miscellanous_damages = $this->inspections_model->get_miscellanous_damages();
        $view->appliances = $this->inspections_model->get_appliances_information();
        $view->tree_information = $this->inspections_model->get_fall_tree_information();
        $view->debris = $this->inspections_model->get_excess_debris();
        $view->water_damages = $this->inspections_model->get_water_damages();
        $view->product_defects = $this->inspections_model->get_product_defects();
        $view->workmanship = $this->inspections_model->get_workmanship();
        $view->aged_worn = $this->inspections_model->get_aged_worn();
        $view->fire_damages = $this->inspections_model->get_fire_damages();

        if ($this->request->method() === "POST") {
            $valid = Validation::factory($this->_post);

            $valid->rule('csrf', 'not_empty')
                  ->rule('csrf', 'Security::check');

            if($valid->check()) {
                echo 'passed';
            } else {
                echo 'failed';
            }
            echo Security::token();
            echo "<pre>";
            print_r($this->_post);
            die();
        }

        $this->template->content = $view;
    }



    public function after() {
        parent::after();
    }
}