<?php defined('SYSPATH') or die('No direct script access.');

class Model_Inspections extends Model_Base {


    public function __construct() {
    	parent::__construct();
    }



    public function get_roof_ages() {
    	return array("n_a"   => "Please Select One",
    		         "<5"    => "Under 5 years",
    		         "5-10"  => "5-10 years",
    		         "10-20" => "10-20 years",
    		         "20+"   => "Over 20 years");
    }



    public function get_roof_heights() {
    	return array("n_a" => "Please Select One",
    		         "1"   => "1 story",
    		         "1.5" => "1.5 stories",
    		         "2"   => "2 stories",
    		         "2.5" => "2.5 stories",
    		         "3"   => "3 stories",
    		         "4"   => "4 stories (latch entry)",
    		         "5"   => "5 stories (latch entry)");
    }



    public function get_type_of_framing() {
    	return array("n_a" => "Please Select One",
    		         "flat" => "Flat",
    		         "gable" => "Gable",
    		         "hip"   => "Hip",
    		         "shed"  => "Shed",
    		         "wiel_back" => "Wiel Back",
    		         "reverse_gable" => "Reverse Gable",
    		         "gambrel"       => "Gambrel",
    		         "mansard"       => "Mansard",
    		         "salt_box"      => "Salt Box"); 
    }



    public function get_pitches() {
    	return array('n_a' => 'Please Select One',
    		          0 => 'Flat',
    		          1 => '1',
    		          2 => '2',
    		          3 => '3',
    		          4 => '4',
    		          5 => '5',
    		          6 => '6',
    		          7 => '7',
    		          8 => '8',
    		          9 => '9',
    		          10 => '10',
    		          11 => '11',
    		          12 => '12');
    }



    public function get_layers() {
    	return array('n_a' => 'Please Select One',
			0 => 'Flat',
			1 => '1',
			2 => '2',
			3 => '3',
			4 => 'Over 3'
		);
    }



    public function get_type_of_roofing() {
    	return array(
			0 => 'Jet',
			1 => 'Steel',
			2 => '3 Tab',
			3 => 'Tile',
			4 => 'T-Lock',
			5 => 'Wood Shake',
			6 => 'Laminated Architectural',
			7 => 'Fiberglass',
			8 => 'Slate',
			9 => 'Rolled',
			10 => 'Terracotta',
			11 => 'Others',
			12 => 'Metal'
		);
    }



    public function get_if_rolled() {
    	return array(
			0 => 'Cold',
			1 => 'Hot',
			2 => 'Rubber',
			3 => 'Granulated '
		);
    }



    public function get_condition() {
    	return array(
			0 => 'Excellent',
			1 => 'Good',
			2 => 'Poor',
			3 => 'Beyond life expectancy',
			4 => 'Fair'
		);
    }



    public function get_remove_reset_trap() {
    	return array(
			0 => 'Up to 120 Sq. Ft.',
			1 => '121 to 600 Sq. Ft.',
			2 => '601 to 900 Sq. Ft.',
			3 => 'No Tarp'
		);
    }



    public function get_lift_up_minor_reset_trap() {
    	return array(
			0 => 'No Tarp Lift',
			1 => 'Up to 120 Sq. Ft.',
			2 => '121 to 600 Sq. Ft.',
			3 => '601 to 900 Sq. Ft.'
		);
    }



    public function get_previous_repairs_made() {
    	return array(
			0 => 'Re-Roofed',
			1 => 'Tarped',
			2 => 'Tarred',
			3 => 'Sheathed',
			4 => 'Caulked',
			5 => 'Boarded Up'
		);
    }



    public function get_collateral_damages() {
    	return array(
			0 => 'N/A',
			1 => 'Vehicle',
			2 => 'Siding',
			3 => 'Gutters',
			4 => 'Decking',
			5 => 'Windows/Doors',
			6 => 'Landscaping'
		);
    }



    public function get_slopes() {
    	return array(
			0 => 'Front',
			1 => 'Rear',
			2 => 'Front Left',
			3 => 'Rear Left',
			4 => 'Rear Right',
			5 => 'Side Left',
			6 => 'Side Right',
			7 => 'Rear Sub Roof',
			8 => 'Front Sub Roof',
			9 => 'Right Side Sub Roof',
			10 => 'Left Side Sub Roof',
			11 => 'Entire Roof',
			12 => 'Front Right',
			13 => 'Ridge'
		);
    }



    public function get_wind_roof_peeled_back() {
    	return array(
    		'blank' => 'Please Select One',
			0 => 'N/A',
			1 => '1-10 sq ft',
			2 => '10-25 sq ft',
			3 => '25-50 sq ft',
			4 => '50-75 sq ft',
			5 => '75-100 sq ft',
			6 => 'Over 100 sq ft'
		);
    }



    public function get_lighting_amount_damaged() {
    	return array(
    		'blank' => 'Please Select One',
			0 => 'N/A',
			1 => '0 sq ft',
			2 => '1-50 sq ft',
			3 => '50-100 sq ft',
			4 => 'Over 100 sq ft'
		);
    }



    public function get_lighting_damages() {
    	return array(
			0 => 'Roofing',
			1 => 'Antenna',
			2 => 'Sheathing/Framing',
			3 => 'Flashing',
			4 => 'Chimney'
		);
    }



    public function get_vermin_choices() {
    	return array('blank'   => 'Please Select One',
    		         'roofing' => array(0 => 'N/A',
    		         	                1 => '0 sq ft',
    		         	                2 => '1-5 sq ft',
    		         	                3 => '5-10 sq ft',
    		         	                4 => 'Over 10 sq ft'),
    		         'fascia' => array(0 => 'N/A',
    		         	               1 => '0 In ft',
    		         	               2 => '1-5 In ft',
    		         	               3 => 'Over 5 In ft'),
    		         'vent' => array(0 => 'N/A',
    		         	             1 => '0 sq ft',
    		         	             2 => '1 sq ft',
    		         	             3 => '2 sq ft',
    		         	             4 => '3 sq ft'));
    }



    public function get_vandalism_choices() {
    	return array('skylights' => array(0 => 'N/A',
    		                              1 => '1',
    		                              2 => '2',
    		                              3 => '3'),
    	             'roof_decking_cut' => array(0 => 'N/A',
    	             	                         1 => '0 sq ft',
    	             	                         2 => '1-5 sq ft',
    	             	                         3 => '5-10 sq ft',
    	             	                         4 => 'Over 10 sq ft'));
    }
}