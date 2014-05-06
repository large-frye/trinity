<?php defined('SYSPATH') or die('No direct script access.');

class Model_Inspections extends Model_Base {

    public static $errors = null;

    public static $messages = null;

    public function __construct() {
        parent::__construct();
        $this->custom_validation_model = Model::factory('Custom');
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
            'jet' => 'Jet',
            'steel' => 'Steel',
            '20_year 3_tab' => '20-Year 3-Tab',
            '25_year 3_tab' => '25-Year 3-Tab',
            '40_year 3_tab' => '40-Year 3-Tab',
            '50_year 3_tab' => '50-Year 3-Tab',
            'tile' => 'Tile',
            't_lock' => 'T-Lock',
            'wood shake' => 'Wood Shake',
            '30_year laminated' => '30-Year Laminated',
            '40_year laminated' => '40-Year Laminated',
            '50_year laminated' => '50-Year Laminated',
            'tpo' => 'TPO',
            'pvc' => 'PVC',
            'epdm' => 'EPDM',
            'modified bituminous' => 'Modified Bituminous',
            'built_up membrane' => 'Built-Up Membrane',
            'fiberglass' => 'Fiberglass',
            'slate' => 'Slate',
            'rolled' => 'Rolled',
            'terracotta' => 'Terracotta',
            'others' => 'Others',
            'metal' => 'Metal'
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
            'vehicle' => 'Vehicle',
            'vinyl siding' => 'Vinyl Siding',
            'gutters' => 'Gutters',
            'wood decking' => 'Wood Decking',
            'windows/doors' => 'Windows/Doors',
            'Landscaping' => 'Landscaping',
            'downspouts' => 'Downspouts',
            'screens' => 'Screens', 
            'aluminum fascia' => 'Aluminum Fascia',
            'fence material' => 'Fence Material',
        );
    }



    public function get_slopes() {
        return array(
            'front' => 'Front',
            'rear' => 'Rear',
            'left' => 'Left',
            'right' => 'Right',
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
            'antenna' => 'Antenna',
            'sheathing/framing' => 'Sheathing/Framing',
            'flashing' => 'Flashing',
            'chimney' => 'Chimney'
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



    public function get_siding_types() {
        return array('vinyl' => 'Vinyl',
                     'brick' => 'Brick',
                     'stucco' => 'Stucco',
                     'wood composite' => 'Wood Composite',
                     'aluminum'       => 'Aluminum',
                     'cedar shake'    => 'Cedar Shake',
                     'metal panel'    => 'Metal Panel');
    }



    public function get_roof_conditions() {
        return array('interior damage' => 'Interior Damage',
                     'brittle test failure' => 'Brittle Test Failure',
                     'mechanical damage'    => 'Mechanical Damage',
                     'high nailing'         => 'High Nailing',
                     'nail extrusions'      => 'Nail Extrusions',
                     'water intrusion'      => 'Water Intrusion',
                     'vent pipe failing failure' => 'Vent Pipe Flashing Failure',
                     'missing shingles'          => 'Missing Shingles',
                     'lichen growth'             => 'Lichen Growth',
                     'algae growth'              => 'Algae Growth',
                     'spatter present'           => 'Spatter Present',
                     'blistering'                => 'Blistering',
                     'slippage'                  => 'Slippage',
                     'flashing breach'           => 'Flashing Breach');
    }



    public function get_appliances_information() {
        return array('skylights' => array('grass cracked' => 'Glass Cracked',
                                          'flashing cracked' => 'Flashing Cracked',
                                          'flashing clogged' => 'Flashing Clogged'),
                     'antenna'   => array('supports' => 'Supports'),
        );
    }



    public function get_fall_tree_information() {
        return array('amount_of_damage' => array('blank' => 'Please Select One', 
                                                 'n_a' => 'N/A',
                                                 '0' => '0 sq ft',
                                                 '1-25' => '1-25 sq ft',
                                                 '25-50' => '25-50 sq ft',
                                                 '50-100' => '50-100 sq ft',
                                                 'Over 100' => 'Over 100 sq ft'),
                     'damages' => array('roofing scratched' => 'Roofing Scratched',
                                        'flashing' => 'Flashing',
                                        'holes in decking' => 'Holes in Decking',
                                        'venting' => 'Venting',
                                        'framing' => 'Framing',
                                        'antenna' => 'Antenna',
                                        'fascia' => 'Fascia',
                                        'ac' => 'A/C Unit',
                                        'gutters' => 'Gutters',
                                        'roofing damaged or missing' => 'Roofing Damaged or Missing',
                                        'skylights/windows' => 'Skylights/Windows')
        );
    }



    public function get_excess_debris() {
        return array(
            'on decking' => 'On Decking',
            'in valleys' => 'In Valleys',
            'in drains' => 'In Drains',
            'around skylights' => 'Around Skylights',
            'in gutters' => 'In Gutters',
            'gable ends' => 'Gable Ends'
        );
    }



    public function get_water_damages() {
        return array(
            'improper drainage' => 'Improper Drainage',
            'roof pitched incorrectly' => 'Roof Pitched Incorrectly',
            'clogged drains' => 'Clogged Drains'
        );
    }



    public function get_product_defects() {
        return array(
            'blank' => 'Please Select One',
            'n_a' => 'N/A',
            '10%' => '10%',
            '25%' => '25%',
            '50%' => '50%',
            '100%' => '100%'
        );
    }



    public function get_workmanship() {
        return array('blank' => 'Please Select One',
                     'improper_nailing' => array('overdriven' => 'Over Driven',
                                                 'underdriven' => 'Under Driven',
                                                 'over nailed' => 'Over Nailed',
                                                 'high nailing' => 'High Nailing'),
                     'improper_overlap' => array('yes' => 'Yes'),
                     'flashing'         => array('flashing missing' => 'Flashing Missing',
                                                 'crushed'          => 'Crushed',
                                                 'top nailed'       => 'Top Nailed',
                                                 'improper materials' => 'Improper Materials',
                                                 'raised/loose'       => 'Raised/Loose'),
                     'flashing_missing' => array('apron' => 'Apron', 
                                                 'step'  => 'Step',
                                                 'valley' => 'Valley',
                                                 'chimney' => 'Chimney'),
                     'venting'          => array('missing' => 'Missing',
                                                 'insufficient' => 'Insufficient'),
                     'incorrect_materials' => array('yes' => 'Yes'),
                     'excessive_layers'    => array('yes' => 'Yes'),
                     'other'               => array('yes' => 'Yes'));
    }



    public function get_aged_worn() {
        return array('drying' => 'Drying',
                     'significant granular loss' => 'Significant Granular Loss',
                     'cupping' => 'Cupping',
                     'splitting wood' => 'Splitting Wood',
                     'shrinkage' => 'Shrinkage',
                     'delamination' => 'Delamination',
                     'flashing missing' => 'Flashing missing',
                     'cracking' => 'Cracking',
                     'shading' => 'Shading');
    }



    public function get_fire_damages() {
        return array('roofing burned' => 'Roofing Burned',
                     'flashing burned' => 'Flashing Burned',
                     'sheathing burned' => 'Sheathing Burned',
                     'antenna burned' => 'Antenna Burned',
                     'framing burned' => 'Framing Burned',
                     'a/c burned' => 'A/C Burned',
                     'skylights burned' => 'Skylights Burned'
        );
    }



   public function get_fraud_wind_input_text() {
        return array('intentional_mechanical_damage' => 'During the course of inspection, damages to the shingles were found to be inconsistent with natural wind damage. 
                                                         These damages include the following.',
                     'seasonal_debris' => 'Seasonal debris was found beneath the mechanically damaged shingles. It is physically impossible for natural 
                                           wind to damage a shingle without removing this seasonal debris.',
                     'center_fractures' => 'Center fractures were found. A center fracture is a shingle that has been creased more heavily in the center 4-5 
                                            inches of the tab than on the outer edges of the tab.","Often, center fractured shingles have a severed reinforcing 
                                            mat, severed only in the center 4-5 inches. This is due to excessive force being applied in the middle - natural wind 
                                            cannot create a stress concentration solely in the center of the tab.',
                     'low_heavy_creases' => 'Low heavy horizontal creases were found on the shingle tabs. There is no point of resistance at the vertical midpoint 
                                             of the shingle - the resistance point is the top of the keyways or the bottom edge of the overlaying shingle course.',
                     'damage_walkable_areas_only' => 'Damages were limited to the walkable and easily accessible areas of the roof (i.e. within reach of valleys and ridges 
                                                      and on low-pitch slopes',
                     'no_damage_eve' => 'No damages were found within several feet of the eaves. The eaves, especially at the corners, are among the most 
                                         susceptible areas of the roof to be wind damaged. However, no damages were found along the eaves.',
                     'torn_asphalt' => 'Torn asphalt sealant strips were found beneath the creased and/or missing tabs with unbonded undamaged shingle tabs nearby. 
                                        The asphalt sealant strips were very well bonded and would therefore require considerable force to tear the top layer of the 
                                        asphalt from the shingle beneath. Natural wind would damage the unbonded shingles before tearing a well bonded shingle.',
                     'tool_marks' => 'Tool marks were found in the asphalt sealant strips and/or on the underside of the damaged shingle, indicating a tool 
                                      was used to separate a well-bonded shingles',
                     'corner_granule_loss' => 'The bottom right or left corner of the shingles have a roughly a 2-inch by 2-inch area of granule loss, indicating 
                                               where force was applied when the shingle was manually lifted.',
                     'failed_attempts' => 'Failed attempts to lift the shingle tabs were also found. These failed attempts consist of edges and/or corners pulled
                                           up from the shingles below - with creases, tears, or granules removed where the tab was not fully pulled up from the 
                                           shingle beneath.',
                     'granules_on_face' => 'When a shingle is creased, the granules are released from the face of the shingle. Natural wind will remove these released 
                                             granules from the face of the shingle. Loose granules on the face of the shingle indicate that wind was not present 
                                             at the time of the shingle creasing.',
                     'violation' => 'The damaged shingles were evenly distributed throughout all directional slopes which is not a characteristic of a naturally 
                                     occurring wind event. During naturallly occurring wind events, approximately 80% of damages will typically be found on the 
                                     windward slopes. The remaining approximately 20% of wind damages will typically be found on the leeward slopes.');
    }



    public function get_fraud_hail_input_text() {
        return array('intentional mechanical damage' => 'During the course of inspection, damages to the shingles were found to be inconsistent with natural hail damage.',
                     'ball pein hammer' => 'Damages present appeared to be due to a ball-pein type hammer, the impacts were all approximately the same size and shape, 
                                            were almost perfectly circular, and the granules were crushed and cracked at the points of impact',
                     'agitated asphalt' => 'The asphalt in the damaged areas of the shingles was a lighter color (more brown/gray) than the surrounding asphalt. This 
                                            is a sign that the asphalt was agitated recently by a tool or object',
                     'no mat fracture'  => 'During the physical inspection of the damaged areas, no mat fracture was found at the location of the damaged areas.',
                     'crushed embedded granules' => 'Within the damaged areas of the shingle, the granules have been crushed, severed, and have been embedded in the 
                                                     asphalt. This indicates a hard object or tool was used to strike the shingle. Hail, which is ice, will extract the granules, 
                                                     leaving exposed asphalt instead of crushing, severing, or embedding the granules.',
                     'inconsistent across slope' => 'No damages were found within several feet of the eaves. Natural hail damage will be a consistent pattern across the 
                                                     entire directional facing slope.',
                     'no damage near eve' => 'No damages were found within several feet of the eaves. Natural hail damage will be a consistent pattern across the entire 
                                              directional facing slope.',
                     'inconsistent secondary' => 'After forensically measuring the secondary hail indicators, which are soft metal denting and spatter (where present), 
                                                  we found the hail size to be too small to damage the shingles.');
    }

    public function get_fraud_wind_input() {
        return array('intentional_mechanical_damage' => 'Intentional Mechanical Damage',
                     'seasonal_debris' => 'Seasonal Debris',
                     'center_fractures' => 'Center Fractures',
                     'low_heavy_creases' => 'Low Heavy Creases',
                     'damage_walkable_areas_only' => 'Damage Walkable Areas Only',
                     'no_damage_eve' => 'No damage in 3ft of Eave',
                     'torn_asphalt' => 'Torn Asphalt',
                     'tool_marks' => 'Tool Marks',
                     'corner_granule_loss' => 'Corner Granule Loss',
                     'failed_attempts' => 'Failed Attempts',
                     'granules_on_face' => 'Granules on Face',
                     'violation' => '80/20 Violation');
    }



    public function get_fraud_hail_input() {
        return array('intentional mechanical damage' => 'Intentional Mechanical Damage',
                     'ball pein hammer' => 'Ball Pein Hammer',
                     'agitated asphalt' => 'Agitated Asphalt',
                     'no mat fracture' => 'No Mat Fracture',
                     'crushed embedded granules' => 'Crushed/Embedded Granules',
                     'inconsistent across slope' => 'Inconsistent Across Slope',
                     'no damage near eve' => 'No damage near eve',
                     'incosistent secondary' => 'Inconsistent Secondary Indicators');
    }



    /*public function get_fraud_hail_input() {
        return array('During the course of inspection, damages to the shingles were found to be inconsistent with natural hail damage. 
                      These damages include the following.' => 'Intentional Mechanical Damage',
                     'Damages present appeared to be due to a ball-pein type hammer, the impacts were all approximately the same size 
                      and shape, were almost perfectly circular, and the granules were crushed and cracked at the points of impact.' => 'Ball Pein Hammer',
                     'The asphalt in the damaged areas of the shingles was a lighter color (more brown/gray) than the surrounding asphalt. 
                      This is a sign that the asphalt was agitated recently by a tool or object.' => 'Agitated Asphalt',
                     'During the physical inspection of the damaged areas, no mat fracture was found at the location of the damaged areas.' => 'No Mat Fracture',
                     'Within the damaged areas of the shingle, the granules have been crushed, severed, and have been embedded in the 
                      asphalt. This indicates a hard object or tool was used to strike the shingle. Hail, which is ice, will extract 
                      the granules, leaving exposed asphalt instead of crushing, severing, or embedding the granules.' => 'Crushed/Embedded Granules',
                     'The damaged shingles were not consistent across the entire slope. Natural hail damage will be a consistent 
                      pattern across the entire directional facing slope.' => 'Inconsistent Across Slope',
                     'No damages were found within several feet of the eaves. Natural hail damage will be a consistent pattern 
                      across the entire directional facing slope.' => 'No Damage Near Eave',
                     'After forensically measuring the secondary hail indicators, which are soft metal denting and spatter 
                     (where present), we found the hail size to be too small to damage the shingles.' => 'Inconsistent Secondary Indicators');
    }*/



    public function get_siding_damaged() {
        return array('siding was damaged' => 'Yes',
                     'siding was not damaged' => 'No');
    }



    public function get_house_faces() {
        return array('direction' => array('n_s_e_w' => 'N, S, E, W',
                                          'ne_sw_se_nw' => 'NE, SW, SE, NW'),
                     'directional' => array('front' => 'Front',
                                            'rear'  => 'Rear',
                                            'left' => 'Left',
                                            'right' => 'Right'));
    }



    public function get_metal_damages() {
        return array('aluminum ridge vent' => 'Aluminum Ridge Vent',
                     'heat vent' => 'Heat Vent',
                     'square vent' => 'Square Vent',
                     'power vent' => 'Power Vent',
                     'turbines' => 'Turbines',
                     'skylights' => 'Skylights',
                     'satellites' => 'Satellites',
                     'cap shingles' => 'Cap Shingles',
                     'ac units' => 'A/C Units');
    }



    public function get_hail_sizes() {
        return array('1_4-1_2' => '1/4" - 1/2"',
                     '1_2-3_4' => '1/2" - 3/4"',
                     '3_4-1' => '3/4" - 1"',
                     '1-1_4' => '1" - 1/4"',
                     '1_1/4-1_1/2' => '1 1/4" - 1 1/2"',
                     '1_1/2-1_3/4' => '1 1/2" - 1 3/4"',
                     '1_3/4-2' => '1 3/4" - 2');
    }



    public function get_shingle_anomalies() {
        return array('large areas of granule release'        => 'Large areas of granule release',
                     'small areas of granule release'        => 'Small areas of granule release',
                     'overall widespread of granule release' => 'Overall widespread areas of early granule release',
                     'stress fractures'                      => 'Stress Fractures',
                     'craze cracking of asphalt'             => 'Craze cracking of asphalt');
    }



    public function validate_inpsection_report($post, $id) {
        $valid = Validation::factory($post);

        if (!isset($post['report_type'])) {
        $valid->rule('csrf', 'not_empty')
              ->rule('csrf', 'Security::check')
              ->rule('type_of_roofing', 'not_empty')
              ->rule('siding_type', 'not_empty')
              ->rule('roof_conditions', 'not_empty')
              ->rule('estimated_age_of_roof', array($this->custom_validation_model, 'validate_dropdown_value'), 
                  array($post['estimated_age_of_roof'], 'n_a'))
              ->rule('roof_height', array($this->custom_validation_model, 'validate_dropdown_value'), 
                  array($post['roof_height'], 'n_a'))
              ->rule('pitch_1', array($this->custom_validation_model, 'validate_dropdown_value'), 
                  array($post['pitch_1'], 'n_a'))
              ->rule('house_face', array($this->custom_validation_model, 'validate_dropdown_value'), array($post['house_face'], 'n_a'));

        if (isset($post['wind_shingles_damaged_slope'])) {
            $valid->rule('wind_shingles_damaged_slope', array($this->custom_validation_model, 'validate_slope_values'),
                array($post['wind_shingles_damaged_slope']));
        }

        if ($valid->check()) {
            return $this->_insert_inspection_report_data($post, $id);
        } else {
            $this::$errors = $valid->errors('default');
            return false;
        }
        } else {
            return $this->_insert_inspection_report_data($post, $id);
        }
    }



    public function get_inspection_data($id, $post = array()) {
        $data = array();

        $results = DB::query(Database::SELECT, "SELECT `key`, `value` FROM inspection_meta WHERE workorder_id = :id")
                      ->parameters(array(':id' => $id))
                      ->as_object()
                      ->execute($this->db);

        foreach ($results as $result) {
            $data[$result->key] = $result->value;
        }

        if (!empty($post)) {
            foreach ($data as $key => $value) {
                if (in_array($key, array_keys($post))) {
                    $data[$key] = $post[$key];
                }
            }

            $data += $post;
        }

        return $data;
    }


    public function get_estimates($id) {
        return DB::query(Database::SELECT, "SELECT description, amount FROM estimates WHERE workorder_id = :id")
                   ->parameters(array(':id' => $id))
                   ->as_object()
                   ->execute($this->db);
    }



    public function validate_estimate_form($post, $id) {
        $_post = Validation::factory($post);
        $_post->rule('descriptions', 'Valid::alpha_dash', array('descriptions'))
              ->rule('ammounts', 'Valid::numeric');

        if ($_post->check()) {
            return $this->_update_estimate($post, $id);
        } else {
            Model_Inspections::$errors = $_post->errors('default');
            return false;
        }
    }



    /**
     * Check to see if a work order is a basic inspection and insured/admin wanted to let the inspector
     * know that it can be auto-upgraded to an expert inspection.
     *
     * @param  int $id
     * @return boolean
     */
    public function check_for_auto_upgrade($id, $inspection_upgrade) {

        if ($inspection_upgrade !== null) {
            $type = $inspection_upgrade == 1 ? 1 : 0;
        try {
            $result = DB::update('work_orders')
                          ->set(array('type' => ':type'))
                          ->where('id', '=', ':id')
                          ->parameters(array(':id' => $id,
                                             ':type' => $type))
                          ->execute($this->db);
        } catch (Database_Exception $e) {
            $this::$errors = $e->getMessage();
            return true;
        }
        }

        $this::$messages = "You have successfully upgraded this inspection from basic to expert.";
        return false;

        $results = DB::query(Database::SELECT, "SELECT is_expert, type FROM work_orders WHERE id = :id")
                       ->parameters(array(':id' => $id))
                       ->as_object()
                       ->execute($this->db)
                       ->current();

        return $results->is_expert == 1 && $results->type == 0 ? true : false;
    }



    public function get_slope_values($data) {
        $slopes = array('wind_shingles_damaged_slope', 'slope_hail_amount_damaged', 'slope_wind_roof_peeled_back', 'slope_lightning_amount_damaged',
                        'slope_vermin_roofing_damage', 'slope_vermin_fascia_damage', 'slope_vermin_vent_damage',
                        'slope_ice_damming', 'slope_fallen_ice', 'slope_excess_debris_location', 'slope_standing_water', 'slope_shingle_anomalies_asphalt',
                        'slope_shingle_anomalies_blistering', 'slope_shingle_anomalies_flaking', 'slope_workmanship_improper_nailing', 'slope_workmanship_improper_overlap',
                        'slope_workmanship_flashing', 'slope_workmanship_flashing_missing', 'slope_workmanship_venting', 'slope_workmanship_incorrect_materials',
                        'slope_workmanship_excessive_layers', 'slope_aged_worn');
        $keys = array_keys($this->get_slopes());
        

        foreach ($slopes as $slope) {
            if (in_array($slope, array('slope_vermin_fascia_damage', 'slope_vermin_vent_damage', 'slope_excess_debris_location', 'slope_standing_water',
                                       'slope_shingle_anomalies_asphalt', 'slope_shingle_anomalies_blistering', 'slope_shingle_anomalies_flaking',
                                       'slope_workmanship_improper_nailing', 'slope_workmanship_improper_overlap', 'slope_workmanship_flashing', 
                                       'slope_workmanship_flashing_missing', 'slope_workmanship_venting', 'slope_workmanship_incorrect_materials',
                                       'slope_workmanship_excessive_layers', 'slope_aged_worn'))) {
                $keys += array('entire roof' => 'Entire Roof');
            }
            foreach ($keys as $key) {
                if (isset($data[$slope]) && is_array($data[$slope])) {
                    if(isset($data[$slope][$key])) {
                        $values[$slope][$key] = $data[$slope][$key];
                    } else {
                        $values[$slope][$key] = $key;
                    }
                } else if (isset($data[$slope])) {
                    $_val = unserialize($data[$slope]);
                    if (isset($_val[$key])) {
                        $values[$slope][$key] = $_val[$key];
                    } else {
                        $values[$slope][$key] = $key;
                    }
                } else {
                    $values[$slope][$key] = "";
                }
            }
        }

        return $values;
    }



    public function sift_data_values($data) {
        $fallen_tree_damages = $this->get_fall_tree_information();
        $workmanship = $this->get_workmanship();
        $_values = array('fallen_tree_damages' => array_keys($fallen_tree_damages['damages']),
                         'shingle_anomalies_types' => array_keys($this->get_shingle_anomalies()),
                         'fraud_wind_input' => array_keys($this->get_fraud_wind_input()),
                         'fraud_hail_input' => array_keys($this->get_fraud_hail_input()),
                         'collateral_damages' => array_keys($this->get_collateral_damages()),
                         'metal_damages' => array_keys($this->get_metal_damages()),
                         'lightning_damages' => array_keys($this->get_lighting_damages()),
                         'excess_debris_location' => array_keys($this->get_excess_debris()),
                         'standing_water_select' => array_keys($this->get_water_damages()),
                         'workmanship_flashing' => array_keys($workmanship['flashing']),
                         'workmanship_flashing_missing' => array_keys($workmanship['flashing_missing']),
                         'workmanship_venting' => array_keys($workmanship['venting']),
                         'workmanship_improper_nailing' => array_keys($workmanship['improper_nailing']),
                         'aged_worn_check_that_apply' => array_keys($this->get_aged_worn()));
        $values = array();
        
        foreach ($_values as $key => $value) {
            $keys = $value;

            foreach ($keys as $_key) {
                if (isset($data[$key]) && is_array($data[$key])) {
                    if(isset($data[$key][$_key])) {
                        $values[$key][$_key] = $data[$key][$_key];
                    } else {
                        $values[$key][$_key] = $_key;
                    }
                } else if (isset($data[$key])) {
                    $_val = unserialize($data[$key]);
                    if (isset($_val[$_key])) {
                        $values[$key][$_key] = $_val[$_key];
                    } else {
                        $values[$key][$_key] = $_key;
                    }
                } else {
                    $values[$key][$_key] = $_key;
                }
            }
        }

        return $values;
    }



    public function build_values_for_report() {
        $data = array();
        $data['estimated_age_of_roof'] = $this->get_roof_ages();
        $data['roof_height'] = $this->get_roof_heights();
        $data['framing_types'] = $this->get_type_of_framing();
        $data['pitch_1'] = $this->get_pitches();
        $data['pitch_2'] = $this->get_pitches();
        $data['pitch_3'] = $this->get_pitches();
        $data['layers'] = $this->get_layers();
        $data['type_of_roofing'] = $this->get_type_of_roofing();
        $data['if_rolled'] = $this->get_if_rolled();
        $data['condition'] = $this->get_condition();
        $data['remove_reset_tarp'] = $this->get_remove_reset_trap();
        $data['lift_up_minor_reset_tarp'] = $this->get_lift_up_minor_reset_trap();
        $data['siding_type'] = $this->get_siding_types();
        $data['previous_repairs_made'] = $this->get_previous_repairs_made();
        $data['roof_conditions'] = $this->get_roof_conditions();
        $data['collateral_damages_to_property'] = $this->get_collateral_damages();
        $data['slopes'] = $this->get_slopes();
        $data['wind_roof_peeled_back'] = $this->get_wind_roof_peeled_back();
        $data['fraud_wind_input'] = $this->get_fraud_wind_input();
        $data['fraud_hail_input'] = $this->get_fraud_hail_input();
        $data['siding_damages'] = $this->get_siding_damaged();
        $data['house_faces'] = $this->get_house_faces();
        return $data;
    }



    private function _update_estimate($post, $id) {
        $parameters = array();

        try {
            DB::delete('estimates')->where('workorder_id', '=', ':id')->parameters(array(':id' => $id))->execute($this->db);

            for ($i = 0; $i < count($post['descriptions']); $i++) {
                $parameters[] = array(':id' => null,
                                      ':workorder_id' => $id,
                                      ':description' => $post['descriptions'][$i],
                                      ':amount'      => $post['amounts'][$i]);
            }

            foreach ($parameters as $params) {
                DB::insert('estimates')->values(array_keys($params))->parameters($params)->execute($this->db);
            }

            return true;
        } catch (Database_Exception $e) {
            Model_Inspections::$errors = $e->get_message();
            return false;
        }
    }



    private function _insert_inspection_report_data($post, $id) {
        $parameters = array(':id' => null,
                            ':workorder_id' => $id);

        try {
            DB::delete('inspection_meta')->where('workorder_id', '=', ':id')->parameters(array(':id' => $id))->execute($this->db);

            foreach ($post as $key => $value) {
                $parameters[':key'] = $key;
                $parameters[':value'] = is_array($value) ? serialize($value) : $value;

                DB::insert('inspection_meta')->values(array_keys($parameters))->parameters($parameters)->execute($this->db);
            }

            return true;
        } catch (Database_Exception $e) {
            Model_Inspections::$errors = $e->getMessage();
            return false;
        }
    }


    public function get_photos_by_id($id){
             $result = DB::query(Database::SELECT, 'SELECT p.*, c.name from inspection_photos p 
                LEFT JOIN categories c
                ON p.category_id = c.id 
                WHERE workorder_id = :id 
                ORDER BY categoryParent_id, FileOrder')
                      ->parameters(array(':id' => $id))
                      ->as_object()
                      ->execute($this->db);

        return $result;

    }


    public function update_photo_categories($post){


            for ($i = 0; $i < count($post); $i++) {
            $tmpArry = explode(':', $post[$i]);
            $photoID = $tmpArry[0];
            $catParentId = $tmpArry[1];
            $catId = $tmpArry[2];
    
            $result = DB::update('inspection_photos')
                          ->set(array(
                            'categoryParent_id' => ':catParentId',
                            'category_id' => ':catId'))
                          ->where('id', '=', ':id')
                          ->parameters(array(':id' => $photoID,
                                             ':catParentId' => $catParentId,
                                             ':category_id' => $catId,
                                             ':catId' => $catId ))
                          ->execute($this->db);
        }

        return true;

    }

    public function update_photo_order($post){
     foreach ($post as $key => $value) {
            $tmpArry = explode(':', $post[$key]);
            $photoID = $tmpArry[0];
            $order = $tmpArry[1];
          
     
            $result = DB::update('inspection_photos')
                          ->set(array(
                            'FileOrder' => ':FileOrder'
                                    ))
                          ->where('id', '=', ':id')
                          ->parameters(array(':id' => $photoID,
                                             ':FileOrder' => $order ))
                          ->execute($this->db);
        }

        return true;

    }

    public function delete_photos($post){
        $arrySize = count($post);
        for ($i = 0; $i < $arrySize; $i++) {
            $tmpAry = explode(',', $post[$i]);
            $pLoc = $tmpAry[1];
            $id = $tmpAry[0];
           DB::delete('inspection_photos')->where('id', '=', ':id')->parameters(array(':id' => $id))->execute($this->db);
           try {
            unlink('..'.$pLoc);
            }  catch (Exception $e) {
               // echo 'Caught exception: ',  $e->getMessage(), "\n";
            }
        }
    }
        public function delete_all_photos($id){
            $allPhotos = DB::query(Database::SELECT, 'SELECT p.*, c.name from inspection_photos p 
                LEFT JOIN categories c
                ON p.category_id = c.id 
                WHERE workorder_id = :id 
                ORDER BY categoryParent_id, FileOrder')
                      ->parameters(array(':id' => $id))
                      ->as_object()
                      ->execute($this->db);
        $arrySize = count($allPhotos);
        for ($i = 0; $i < $arrySize; $i++) {
           
             DB::delete('inspection_photos')->where('id', '=', ':id')->parameters(array(':id' => $allPhotos[$i]->id))->execute($this->db);
           try {
            unlink('..'.$allPhotos[$i]->fileLocation);
            }  catch (Exception $e) {
               // echo 'Caught exception: ',  $e->getMessage(), "\n";
            }
        }
    }
    public function save_photos($post,  $files, $id) {
        $path = "/assets/photos/";

        $uploaddir = '..'.$path.$id.'/';
        if (!is_dir($uploaddir) && !mkdir($uploaddir)){
          die("Error creating folder");
        }
        
         for ($i = 0; $i < count($files['filesToUpload']['name']); $i++) {
        // File location with name
        $tmpName = $files['filesToUpload']['tmp_name'][$i];
        $mimeType =  $files['filesToUpload']['type'][$i];  
        $fileName = $files['filesToUpload']['name'][$i]; 
        $fileName = preg_replace("/[^A-Z0-9._-]/i", "_", $fileName);
         if(isset($tmpName) && isset($mimeType) && isset($fileName)){


        $pathAndName = $uploaddir.$fileName;
        $moveResult = move_uploaded_file($tmpName, $pathAndName);

        if($moveResult){
         $parameters = array(':id' => null,
                            ':workorder_id' => $id,
                            ':filename' => $fileName,
                            ':mime' => $mimeType,
                            ':categoryParent_id' =>null,
                            ':category_id' => null,
                            ':FileOrder' => null,
                            ':fileLocation' => $pathAndName,
                     );
       try{
         DB::insert('inspection_photos')
                ->values(array_keys($parameters))
                ->parameters($parameters)
                ->execute($this->db);

            }
            catch (Database_Exception $e) {
             print_r($e->getMessage()); 
         }
            }
        }
         }
        return true;
          
    }

}

