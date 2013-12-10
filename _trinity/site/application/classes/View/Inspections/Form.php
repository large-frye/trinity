<?php

class View_Inspections_Form extends View_Protected_Layout
{
	protected $_template = 'inspections/form';
	
	/**
	 * @var string Form token for CSRF attacks
	 */
	public $csrf_token = null;
	
	/**
	 * Array Holds the array with form validation errors 
	 */
	public $errors = null;

	/**
	 * @var String Form POST URL
	 */
	public $post_url = '';
		
	/**
	 * @var Object Inspection Model
	 */	
	protected $_m_inspection = null;
	
	protected $_m_workorders = null;
	
	public $is_expert = null;
	public $show_is_expert = null;
	
	/**
	 * @var Object Form elements
	 */
	 public $e_was_insured_present = null; 
	 public $e_roof_access = null;
	 public $e_did_use_ladder = null;
	 public $e_why_not_walked_on_roof = null;
	 public $e_estimated_age_of_roof = null;
	 public $e_roof_height = null;
	 public $e_type_of_framing = null;
	 public $e_pitch_1 = null;
	 public $e_pitch_2 = null;
	 public $e_pitch_3 = null;
	 public $e_layers = null;
	 public $e_type_of_roofing = null;
	 public $e_if_rolled = null;
	 public $e_condition = null;
	 public $e_remove_reset_tarp = null;
	 public $e_lift_up_minor_reset_tarp = null;
	 public $e_previous_repairs_made = null;
	 public $e_collateral_damages_to_property = null;
	 public $e_wind_shingles_damaged_slope = null;
	 public $e_wind_roof_peeled_back = null;
	 public $e_wind_roof_peeled_back_slope = null;
	 public $e_lightning_amount_damaged = null;
	 public $e_lightning_amount_damaged_slope = null;
	 public $e_lightning_damages = null;
	 
	 public $e_fallen_tree_damages = null;
	 public $e_excess_debris_location = null;
	 public $e_excess_debris_location_slope = null; 
	 public $e_standing_water_select = null;
	 public $e_standing_water_select_slope = null; 
	 public $e_product_defects_asphalt_coating_defect = null; 
	 public $e_product_defects_asphalt_coating_defect_slope = null; 
	 public $e_workmanship_improper_nailing = null; 
	 public $e_workmanship_improper_nailing_slope = null; 
	 
	 /**
	  * @var Array Inspection Data
	  */
	public $data = 
		array
		(
			'id' => null,
			'work_order_id' => null,
			'date_of_inspection' => null,
			'first_name' => null,
			'last_name' => null,
			'street_address' => null,
			'address_2' => null,
			'city' => null,
			'zip' => null,
			'phone' => null,
			'was_insured_present' => null,
			'roof_access' => null,
			'did_use_ladder' => null,
			'why_not_walked_on_roof' => null,
			'roof_square_feet' => null,
			'estimated_age_of_roof' => null,
			'roof_height' => null,
			'type_of_framing' => null,
			'pitch_1' => null,
			'pitch_2' => null,
			'pitch_3' => null,
			'layers' => null,
			'type_of_roofing' => null,			
			'if_rolled' => null,
			'condition' => null,
			'remove_reset_tarp' => null,
			'lift_up_minor_reset_tarp' => null,
			'previous_repairs_made' => null,
			'collateral_damages_to_property' => null,		
			'collateral_damage_detail_description' => null,		
			'wind' => null,
			'wind_shingles_damaged' => null,
			'wind_shingles_damaged_slope' => null,
			'wind_roof_peeled_back' => null,
			'wind_roof_peeled_back_slope' => null,
			'hail' => null,
			'hail_amount_damaged' => null,
			'hail_amount_damaged_slope' => null,
			'lightning' => null,
			'lightning_amount_damaged' => null,
			'lightning_amount_damaged_slope' => null,
			'lightning_damages' => null,	
			'vermin' => null,
			'vermin_roofing_damage' => null,
			'vermin_roofing_damage_slope' => null,
			'vermin_fascia_damage' => null,
			'vermin_fascia_damage_slope' => null,
			'vermin_vent_damage' => null,			
			'vermin_vent_damage_slope' => null,	
			'vandalism' => null,
			'vandalism_skylights' => null,
			'vandalism_skylights_slope' => null,
			'vandalism_roof_decking_cut' => null,
			'vandalism_roof_decking_cut_slope' => null,
			'ice' => null,
			'ice_damming' => null,
			'ice_damming_slope' => null,
			'ice_fallen_ice' => null,
			'ice_fallen_ice_slope' => null,
			'appliances' => null,
			'appliances_skylights' => null,
			'appliances_skylights_slope' => null,
			'appliances_antenna_sattelite_dish' => null,
			'appliances_antenna_sattelite_dish_slope' => null,
			'appliances_ac_units' => null,
			'appliances_ac_units_slope' => null,
			'fallen_tree' => null,
			'fallen_tree_amount_of_damage' => null,
			'fallen_tree_amount_of_damage_slope' => null,
			'fallen_tree_damages' => null,
			'excess_debris' => null,
			'excess_debris_location' => null,
			'excess_debris_location_slope' => null,
			'standing_water' => null,
			'standing_water_select' => null,
			'standing_water_select_slope' => null,
			'product_defects' => null,
			'product_defects_asphalt_coating' => null,
			'product_defects_asphalt_coating_slope' => null,
			'product_defects_blistering' => null,
			'product_defects_blistering_slope' => null,
			'product_defects_flaking' => null,
			'product_defects_flaking_slope' => null,
			'workmanship' => null,
			'workmanship_improper_nailing' => null,
			'workmanship_improper_nailing_slope' => null,
			'workmanship_improper_overlap' => null,
			'workmanship_improper_overlap_slope' => null,
			'workmanship_flashing' => null,
			'workmanship_flashing_slope' => null,
			'workmanship_flashing_missing' => null,
			'workmanship_flashing_missing_slope' => null,
			'workmanship_venting' => null,
			'workmanship_venting_slope' => null,
			'workmanship_incorrect_materials' => null,
			'workmanship_incorrect_materials_slope' => null,
			'workmanship_excessive_layers' => null,
			'workmanship_excessive_layers_slope' => null,
			'workmanship_sub_par_deck' => null,
			'workmanship_sub_par_deck_slope' => null,
			'workmanship_other' => null,
			'workmanship_comments' => null,
			'aged_worn' => null,
			'aged_worn_check_that_apply' => null,
			'aged_worn_check_that_apply_slope' => null,
			'fire_damages' => null,
			'fire_damages_check_that_apply' => null,
			'fire_damages_check_that_apply_slope' => null,
			'general_comments' => null,
			'photo' => null,
			'diagram' => null,
			'is_completed' => null,
			'is_expert' => null,
			'is_expert_inspector' => null
		);			
		
		public $workorder_data = null;
			
	 
	public function __construct($m_inspection = null, $m_workorders = null)
	{		
		parent::__construct(); 
		
		$this->_m_inspection = $m_inspection;
		$this->_m_workorders = $m_workorders;
	
		$this->_set_links();
		$this->_set_variables();
		$this->_set_assets();
		
		$this->generate_elements();
		
		$this->_load_data();
		$this->_set_sidebar();

	}
	
	/**
	 * Set links
	 */
	protected function _set_links()
	{
		$this->post_url = Route::url('inspector', array('controller' => 'inspections', 'action' => 'form'));
	}
	
	/**
	 * Set variables
	 */
	protected function _set_variables()
	{
		// Pass the token for the form
		$this->csrf_token = Security::CSRF_token();
	}	
	
	protected function _set_assets()
	{
		Asset::instance()
			->css('core/inspection/form')
			->js('core/inspection/form');
	}
	
	
	/**
	 * Generate the form elements
	 */
	public function generate_elements()
	{ 
		$this->e_was_insured_present = 
			$this->_render_element
						( 
							new View_Inspections_Element
							(
								Inspection_Data::$was_insured_present, 
								'was_insured_present', 
								$this->data['was_insured_present'], 
								$this->_element_error('was_insured_present')
							) 
						);	
		
		$this->e_roof_access = 
			$this->_render_element
							( 
								new View_Inspections_Element
								(
									Inspection_Data::$roof_access,
									'roof_access', 
									$this->data['roof_access'],
									$this->_element_error('roof_access')
								)
							);


		$this->e_did_use_ladder = 
			$this->_render_element
							( 
								new View_Inspections_Element
								(
									Inspection_Data::$did_use_ladder,
									'did_use_ladder',
									$this->data['did_use_ladder'],
									$this->_element_error('did_use_ladder')
								)
							);

		$this->e_why_not_walked_on_roof = 
			$this->_render_element
							(
								new View_Inspections_Element
								(
									Inspection_Data::$why_not_walked_on_roof,
									'why_not_walked_on_roof', 
									$this->data['why_not_walked_on_roof'], 
									$this->_element_error('why_not_walked_on_roof')
								) 
							);

		$this->e_estimated_age_of_roof =
			$this->_render_element
							(
								new View_Inspections_Element
								(
									Inspection_Data::$estimated_age_of_roof, 
									'estimated_age_of_roof', 
									$this->data['estimated_age_of_roof'], 
									$this->_element_error('estimated_age_of_roof')
								)
							);
	
		$this->e_roof_height = 
			$this->_render_element
						( 
							new View_Inspections_Element
							(
								Inspection_Data::$roof_height,
								'roof_height',
								$this->data['roof_height'],
								$this->_element_error('roof_height')
							) 
						);
						
		$this->e_type_of_framing = 
			$this->_render_element
						( 
							new View_Inspections_Element
							(
								Inspection_Data::$type_of_framing, 
								'type_of_framing',
								$this->data['type_of_framing'],
								$this->_element_error('type_of_framing')
							)
						);
	
		$this->e_pitch_1 =
			$this->_render_element
						( 
							new View_Inspections_Element
							(
								Inspection_Data::$pitch_1, 
								'pitch_1', 
								$this->data['pitch_1'], 
								$this->_element_error('pitch_1')
							)
						);
	
		$this->e_pitch_2 =
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$pitch_2,
								'pitch_2', 
								$this->data['pitch_2'],
								$this->_element_error('pitch_2')
							) 
						);

		$this->e_pitch_3 = 
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$pitch_3,
								'pitch_3', 
								$this->data['pitch_3'], 
								$this->_element_error('pitch_3')
							) 
						);

		$this->e_layers =
			$this->_render_element
						( 
							new View_Inspections_Element
							(
								Inspection_Data::$layers,
								'layers', 
								$this->data['layers'], 
								$this->_element_error('layers')
							)
						);

		$this->e_type_of_roofing = 
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$type_of_roofing, 
								'type_of_roofing',
								$this->data['type_of_roofing'],
								$this->_element_error('type_of_roofing'),
								false
							) 
						);
		
		$this->e_if_rolled =
			$this->_render_element
						( 
							new View_Inspections_Element
							(
								Inspection_Data::$if_rolled,
								'if_rolled',
								$this->data['if_rolled'], 
								$this->_element_error('if_rolled'),
								false
							) 
						);
		
		$this->e_condition = 
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$condition, 
								'condition', 
								$this->data['condition'], 
								$this->_element_error('condition')
							) 
						);
		
		$this->e_remove_reset_tarp = 
			$this->_render_element
						( 
							new View_Inspections_Element
							(
								Inspection_Data::$remove_reset_tarp,
								'remove_reset_tarp', 
								$this->data['remove_reset_tarp'], 
								$this->_element_error('remove_reset_tarp')
							)
						);
		
		$this->e_lift_up_minor_reset_tarp = 
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$lift_up_minor_reset_tarp,
								'lift_up_minor_reset_tarp', 
								$this->data['lift_up_minor_reset_tarp'], 
								$this->_element_error('lift_up_minor_reset_tarp')
							) 
						);
		
		$this->e_previous_repairs_made = 
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$previous_repairs_made,
								'previous_repairs_made', 
								$this->data['previous_repairs_made'], 
								$this->_element_error('previous_repairs_made'),
								false
							) 
						);
		
		$this->e_collateral_damages_to_property = 
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$collateral_damages_to_property,
								'collateral_damages_to_property', 
								$this->data['collateral_damages_to_property'],
								$this->_element_error('collateral_damages_to_property')
							)
						);

		$this->e_wind_shingles_damaged_slope = 
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$slope,
								'wind_shingles_damaged_slope',
								$this->data['wind_shingles_damaged_slope'], 
								$this->_element_error('wind_shingles_damaged_slope'),
								false
							) 
						);
						
		$this->e_wind_roof_peeled_back = 
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$wind_roof_peeled_back,
								'wind_roof_peeled_back',
								$this->data['wind_roof_peeled_back'],
								$this->_element_error('wind_roof_peeled_back')
							) 
						);
	
		$this->e_wind_roof_peeled_back_slope = 
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$slope,
								'wind_roof_peeled_back_slope',
								$this->data['wind_roof_peeled_back_slope'],
								$this->_element_error('wind_roof_peeled_back_slope'),
								false
							) 
						);

		$this->e_hail_amount_damaged_slope = 
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$slope,
								'hail_amount_damaged_slope', 
								$this->data['hail_amount_damaged_slope'], 
								$this->_element_error('hail_amount_damaged_slope'),
								false
							) 
						);

		$this->e_lightning_amount_damaged =
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$lightning_amount_damaged,
								'lightning_amount_damaged',
								$this->data['lightning_amount_damaged'], 
								$this->_element_error('lightning_amount_damaged')
							) 
						);
		
		$this->e_lightning_amount_damaged_slope = 
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$slope, 
								'lightning_amount_damaged_slope', 
								$this->data['lightning_amount_damaged_slope'], 
								$this->_element_error('lightning_amount_damaged_slope'),
								false
							) 
						);
		
		$this->e_lightning_damages = 
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$lightning_damages,
								'lightning_damages', 
								$this->data['lightning_damages'], 
								$this->_element_error('lightning_damages')
							) 
						);

		$this->e_vermin_roofing_damage = 
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$vermin_roofing_damage,
								'vermin_roofing_damage',
								$this->data['vermin_roofing_damage'],
								$this->_element_error('vermin_roofing_damage')
							) 
						);
	
		$this->e_vermin_roofing_damage_slope =
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$slope,
								'vermin_roofing_damage_slope',
								$this->data['vermin_roofing_damage_slope'],
								$this->_element_error('vermin_roofing_damage_slope'),
								false
							)
						);

		$this->e_vermin_fascia_damage =
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$vermin_fascia_damage,
								'vermin_fascia_damage', 
								$this->data['vermin_fascia_damage'], 
								$this->_element_error('vermin_fascia_damage')
							)
						);

		$this->e_vermin_fascia_damage_slope = 	
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$slope,
								'vermin_fascia_damage_slope', 
								$this->data['vermin_fascia_damage_slope'], 
								$this->_element_error('vermin_fascia_damage_slope'),
								false
							)
						);

		$this->e_vermin_vent_damage = 
			$this->_render_element
						( 
							new View_Inspections_Element
							(
								Inspection_Data::$vermin_vent_damage, 
								'vermin_vent_damage', 
								$this->data['vermin_vent_damage'], 
								$this->_element_error('vermin_vent_damage')
							) 
						);

		$this->e_vermin_vent_damage_slope = 
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$slope, 
								'vermin_vent_damage_slope',
								$this->data['vermin_vent_damage_slope'], 
								$this->_element_error('vermin_vent_damage_slope'),
								false
							) 
						);	
		
		$this->e_vandalism_skylights = 
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$vandalism_skylights,
								'vandalism_skylights', 
								$this->data['vandalism_skylights'], 
								$this->_element_error('vandalism_skylights')
							) 
						);

		$this->e_vandalism_skylights_slope = 
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$slope,
								'vandalism_skylights_slope',
								$this->data['vandalism_skylights_slope'], 
								$this->_element_error('vandalism_skylights_slope'),
								false
							) 
						);		

		$this->e_vandalism_roof_decking_cut = 
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$vandalism_roof_decking_cut, 
								'vandalism_roof_decking_cut', 
								$this->data['vandalism_roof_decking_cut'], 
								$this->_element_error('vandalism_roof_decking_cut')
							) 
						);

		$this->e_vandalism_roof_decking_cut_slope = 
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$slope,
								'vandalism_roof_decking_cut_slope', 
								$this->data['vandalism_roof_decking_cut_slope'],
								$this->_element_error('vandalism_roof_decking_cut_slope'),
								false
							)
						);			
		
		$this->e_ice_damming_slope = 
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$slope, 
								'ice_damming_slope', 
								$this->data['ice_damming_slope'], 
								$this->_element_error('ice_damming_slope'),
								false
							)		
						);			
	
		$this->e_ice_fallen_ice_slope = 
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$slope,
								'ice_fallen_ice_slope',
								$this->data['ice_fallen_ice_slope'],
								$this->_element_error('ice_fallen_ice_slope'),
								false
							) 
						);			
		
		$this->e_appliances_skylights =
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$appliances_skylights, 
								'appliances_skylights', 
								$this->data['appliances_skylights'], 
								$this->_element_error('appliances_skylights')
							) 
						);		
	
		$this->e_appliances_skylights_slope = 
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$slope,
								'appliances_skylights_slope', 
								$this->data['appliances_skylights_slope'], 
								$this->_element_error('appliances_skylights_slope'),
								false
							) 
						);					
		
		$this->e_appliances_antenna_sattelite_dish = 
			$this->_render_element
						( 
							new View_Inspections_Element
							(
								Inspection_Data::$appliances_antenna_sattelite_dish,
								'appliances_antenna_sattelite_dish', 
								$this->data['appliances_antenna_sattelite_dish'], 
								$this->_element_error('appliances_antenna_sattelite_dish')
							) 
						);		
		
		$this->e_appliances_antenna_sattelite_dish_slope = 
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$slope,
								'appliances_antenna_sattelite_dish_slope', 
								$this->data['appliances_antenna_sattelite_dish_slope'],
								$this->_element_error('appliances_antenna_sattelite_dish_slope'),
								false
							)						
						);			
		
		$this->e_appliances_ac_units = 
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$appliances_ac_units,
								'appliances_ac_units', 
								$this->data['appliances_ac_units'], 
								$this->_element_error('appliances_ac_units')
							) 
						);		
		
		$this->e_appliances_ac_units_slope =
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$slope,
								'appliances_ac_units_slope',
								$this->data['appliances_ac_units_slope'], 
								$this->_element_error('appliances_ac_units_slope'),
								false
							)
						);					
		
		$this->e_fallen_tree_amount_of_damage = 
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$fallen_tree_amount_of_damage, 
								'fallen_tree_amount_of_damage', 
								$this->data['fallen_tree_amount_of_damage'], 
								$this->_element_error('fallen_tree_amount_of_damage')
							) 
						);	
								
		$this->e_fallen_tree_amount_of_damage_slope =
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$slope,
								'fallen_tree_amount_of_damage_slope', 
								$this->data['fallen_tree_amount_of_damage_slope'], 
								$this->_element_error('fallen_tree_amount_of_damage_slope'),
								false
							) 
						);	
		
		$this->e_fallen_tree_damages =
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$fallen_tree_damages,
								'fallen_tree_damages', 
								$this->data['fallen_tree_damages'],
								$this->_element_error('fallen_tree_damages')
							)
						);	
	
		$this->e_excess_debris_location = 
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$excess_debris_location, 
								'excess_debris_location', 
								$this->data['excess_debris_location'], 
								$this->_element_error('excess_debris_location')
							) 
						);	
		
		$this->e_excess_debris_location_slope = 
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$slope, 
								'excess_debris_location_slope', 
								$this->data['excess_debris_location_slope'], 
								$this->_element_error('excess_debris_location_slope'),
								false
							) 
						);	
		
		$this->e_standing_water_select = 
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$standing_water_select,
								'standing_water_select', 
								$this->data['standing_water_select'], 
								$this->_element_error('standing_water_select')
							) 
						);	

		$this->e_standing_water_select_slope = 
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$slope,
								'standing_water_select_slope', 
								$this->data['standing_water_select_slope'], 
								$this->_element_error('standing_water_select_slope'),
								false
							) 
						);			
		
		$this->e_product_defects_asphalt_coating_defect = 
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$product_defects_asphalt_coating_defect, 
								'product_defects_asphalt_coating', 
								$this->data['product_defects_asphalt_coating'], 
								$this->_element_error('product_defects_asphalt_coating')
							) 
						);	
		
		$this->e_product_defects_asphalt_coating_defect_slope = 
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$slope,
								'product_defects_asphalt_coating_slope', 
								$this->data['product_defects_asphalt_coating_slope'], 
								$this->_element_error('product_defects_asphalt_coating_slope'),
								false
							)
						);				
		
		$this->e_product_defects_blistering = 
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$product_defects_blistering,
								'product_defects_blistering',
								$this->data['product_defects_blistering'], 
								$this->_element_error('product_defects_blistering')
							)			
						);	
		
		$this->e_product_defects_blistering_slope = 
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$slope,
								'product_defects_blistering_slope', 
								$this->data['product_defects_blistering_slope'], 
								$this->_element_error('product_defects_blistering_slope'),
								false
							) 
						);		
		
		$this->e_product_defects_flaking =
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$product_defects_flaking, 
								'product_defects_flaking', 
								$this->data['product_defects_flaking'], 
								$this->_element_error('product_defects_flaking')
							)				
						);	
		
		$this->e_product_defects_flaking_slope = 
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$slope, 
								'product_defects_flaking_slope',
								$this->data['product_defects_flaking_slope'],
								$this->_element_error('product_defects_flaking_slope'),
								false
							) 
						);			

		$this->e_improper_installation_nailing = 
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$improper_installation_nailing,
								'workmanship_improper_nailing', 
								$this->data['workmanship_improper_nailing'], 
								$this->_element_error('workmanship_improper_nailing')
							)
						);	

		$this->e_improper_installation_nailing_slope = 
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$slope, 
								'workmanship_improper_nailing_slope', 
								$this->data['workmanship_improper_nailing_slope'], 
								$this->_element_error('workmanship_improper_nailing_slope'),
								false
							)
						);			

		$this->e_improper_overlap_slope = 
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$slope, 
								'workmanship_improper_overlap_slope', 
								$this->data['workmanship_improper_overlap_slope'], 
								$this->_element_error('workmanship_improper_overlap_slope'),
								false
							)
						);			
	
		$this->e_improper_installation_flashing = 
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$improper_installation_flashing,
								'workmanship_flashing', 
								$this->data['workmanship_flashing'], 
								$this->_element_error('workmanship_flashing')
							) 
						);	
		
		$this->e_improper_installation_flashing_slope = 
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$slope,
								'workmanship_flashing_slope', 
								$this->data['workmanship_flashing_slope'], 
								$this->_element_error('workmanship_flashing_slope'),
								false
							) 
						);				
		
		$this->e_improper_installation_flashing_missing = 
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$improper_installation_flashing_missing,
								'workmanship_flashing_missing', 
								$this->data['workmanship_flashing_missing'], 
								$this->_element_error('workmanship_flashing_missing')
							) 
						);	
		
		$this->e_improper_installation_flashing_missing_slope = 
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$slope,
								'workmanship_flashing_missing_slope',
								$this->data['workmanship_flashing_missing_slope'], 
								$this->_element_error('workmanship_flashing_missing_slope'),
								false
							) 
						);			
		
		$this->e_improper_installation_venting = 
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$improper_installation_venting,
								'workmanship_venting', 
								$this->data['workmanship_venting'], 
								$this->_element_error('workmanship_venting')
							) 
						);	
		
		$this->e_improper_installation_venting_slope = 
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$slope, 
								'workmanship_venting_slope', 
								$this->data['workmanship_venting_slope'], 
								$this->_element_error('workmanship_venting_slope'),
								false
							)
						);		
		
		$this->e_workmanship_incorrect_materials_slope = 
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$slope,
								'workmanship_incorrect_materials_slope', 
								$this->data['workmanship_incorrect_materials_slope'], 
								$this->_element_error('workmanship_incorrect_materials_slope'),
								false
							) 
						);		
		
		$this->e_workmanship_excessive_layers_slope = 
			$this->_render_element
						( 
							new View_Inspections_Element
							(
								Inspection_Data::$slope,
								'workmanship_excessive_layers_slope', 
								$this->data['workmanship_excessive_layers_slope'], 
								$this->_element_error('workmanship_excessive_layers_slope'),
								false
							)
						);		
		
		$this->e_workmanship_sub_par_deck = 
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$improper_installation_sub_par_deck, 
								'workmanship_sub_par_deck', 
								$this->data['workmanship_sub_par_deck'], 
								$this->_element_error('workmanship_sub_par_deck')
							) 
						);	
		
		$this->e_workmanship_sub_par_deck_slope = 
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$slope, 
								'workmanship_sub_par_deck_slope', 
								$this->data['workmanship_sub_par_deck_slope'], 
								$this->_element_error('workmanship_sub_par_deck_slope'),
								false
							)
						);			

		$this->e_aged_worn = 
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$aged_worn,
								'aged_worn_check_that_apply', 
								$this->data['aged_worn_check_that_apply'], 
								$this->_element_error('aged_worn_check_that_apply')
							) 
						);	
		
		$this->e_aged_worn_slope =
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$slope,
								'aged_worn_check_that_apply_slope',
								$this->data['aged_worn_check_that_apply_slope'], 
								$this->_element_error('aged_worn_check_that_apply_slope'),
								false
							)
						);					
		
		$this->e_fire_damages = 
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$fire_damages,
								'fire_damages_check_that_apply', 
								$this->data['fire_damages_check_that_apply'],
								$this->_element_error('fire_damages_check_that_apply')
							)
						);	
		
		$this->e_fire_damages_slope =
			$this->_render_element
						(
							new View_Inspections_Element
							(
								Inspection_Data::$slope, 
								'fire_damages_check_that_apply_slope', 
								$this->data['fire_damages_check_that_apply_slope'], 
								$this->_element_error('fire_damages_check_that_apply_slope'),
								false
							) 
						);			
	} 
	
	/**
	 * Rendering a View Object
	 * 
	 * @param Object View
	 * @return String The rendered view
	 */
	protected function _render_element($element)
	{
		$engine = new Primalskill_Mustache_Engine( $element );
		
		return $engine->render();
	}
	
	/**
	 * Return the error message from errors array if this exists
	 * 
	 * @param String index of errors array
	 * @return String Error message
	 */
	protected function _element_error($index)
	{
		if ( isset($this->errors[$index]) )
		{
			if ( strpos($this->errors[$index], 'slope') !== false )
			{
				return 'Please select a slope in this section.';
			}
			
			return $this->errors[$index];
		}
		
		return null;
	}
	
	/**
	 * Loading the data(work order, inspection)
	 */
	protected function _load_data()
	{	
		$this->_m_inspection->load_inspection();
		$inspection_data = $this->_m_inspection->return_data();
		$this->workorder_data = $this->_m_workorders->return_data();
		
		$this->workorder_data['date_of_inspection'] = date('m-d-Y', strtotime($this->workorder_data['date_of_inspection']));			

		if ( isset($this->workorder_data['time_of_inspection'] ))
		{
			$exploded_time = explode(':', $this->workorder_data['time_of_inspection']);
			$this->workorder_data['time_of_inspection'] = $exploded_time[0].':'.$exploded_time[1];
		}
		
		foreach ( $this->data as $key => $value )
		{
			if ( isset($inspection_data[$key]) )
			{
				$this->data[$key]  = $inspection_data[$key];
			}
		}
		
		$this->_check_fields();
	}
	
	/**
	 * Repopulate the POST data in case of validation error
	 */
	public function repopulate_data($post = array())
	{

		foreach ( $this->data as $key => $value )
		{
			if ( isset($post[$key]) )
			{
				$this->data[$key]  = $post[$key];
			}			
			else
			{
				if ( $key != 'id' )
				{
					$this->data[$key]  = null;
				}
			}
		}		
		
		$this->_check_fields();
		
		$this->generate_elements();
	}
	
	/**
	 * Check the single checkboxes which are selected
	 */
	protected function _check_fields()
	{
		if ( isset($this->data['wind']) && $this->data['wind'] == 1 )
		{
			$this->checked_wind = true;
		}	
		else
		{
			$this->checked_wind = false;
		}
		
		if ( isset($this->data['hail']) && $this->data['hail'] == 1 )
		{
			$this->checked_hail = true;
		}			
		else
		{
			$this->checked_hail = false;
		}
		
		if ( isset($this->data['lightning']) && $this->data['lightning'] == 1 )
		{
			$this->checked_lightning = true;
		}	
		else
		{
			$this->checked_lightning = false;
		}		
		
		if ( isset($this->data['vermin']) && $this->data['vermin'] == 1 )
		{
			$this->checked_vermin = true;
		}	
		else
		{
			$this->checked_vermin = false;
		}			

		if ( isset($this->data['vandalism']) && $this->data['vandalism'] == 1 )
		{
			$this->checked_vandalism = true;
		}	
		else
		{
			$this->checked_vandalism = false;
		}			

		if ( isset($this->data['ice']) && $this->data['ice'] == 1 )
		{
			$this->checked_ice = true;
		}			
		else
		{
			$this->checked_ice = false;
		}	
		
		if ( isset($this->data['ice_damming']) && $this->data['ice_damming'] == 1 )
		{
			$this->checked_ice_damming = true;
		}	
		else
		{
			$this->checked_ice_damming = false;
		}			

		if ( isset($this->data['ice_fallen_ice']) && $this->data['ice_fallen_ice'] == 1 )
		{
			$this->checked_ice_fallen_ice = true;
		}	
		else
		{
			$this->checked_ice_fallen_ice = false;
		}				

		if ( isset($this->data['appliances']) && $this->data['appliances'] == 1 )
		{
			$this->checked_appliances = true;
		}	
		else
		{
			$this->checked_appliances = false;
		}		

		if ( isset($this->data['fallen_tree']) && $this->data['fallen_tree'] == 1 )
		{
			$this->checked_fallen_tree = true;
		}	
		else
		{
			$this->checked_fallen_tree = false;
		}			
	
		if ( isset($this->data['excess_debris']) && $this->data['excess_debris'] == 1 )
		{
			$this->checked_excess_debris = true;
		}	
		else
		{
			$this->checked_excess_debris = false;
		}		

		if ( isset($this->data['standing_water']) && $this->data['standing_water'] == 1 )
		{
			$this->checked_standing_water = true;
		}	
		else
		{
			$this->checked_standing_water = false;
		}		

		if ( isset($this->data['product_defects']) && $this->data['product_defects'] == 1 )
		{
			$this->checked_product_defects = true;
		}	
		else
		{
			$this->checked_product_defects = false;
		}			

		if ( isset($this->data['workmanship']) && $this->data['workmanship'] == 1 )
		{
			$this->checked_improper_installation = true;
		}
		else
		{
			$this->checked_improper_installation = false;
		}			
		
		if ( isset($this->data['workmanship_improper_overlap']) && $this->data['workmanship_improper_overlap'] == 1 )
		{
			$this->checked_workmanship_improper_overlap = true;
		}	
		else
		{
			$this->checked_workmanship_improper_overlap = false;
		}			

		if ( isset($this->data['workmanship_incorrect_materials']) && $this->data['workmanship_incorrect_materials'] == 1 )
		{
			$this->checked_workmanship_incorrect_materials = true;
		}	
		else
		{
			$this->checked_workmanship_incorrect_materials = false;
		}		

		if ( isset($this->data['workmanship_excessive_layers']) && $this->data['workmanship_excessive_layers'] == 1 )
		{
			$this->checked_workmanship_excessive_layers = true;
		}	
		else
		{
			$this->checked_workmanship_excessive_layers = false;
		}		
		
		if ( isset($this->data['workmanship_other']) && $this->data['workmanship_other'] == 1 )
		{
			$this->checked_workmanship_other = true;
		}	
		else
		{
			$this->checked_workmanship_other = false;
		}			

		if ( isset($this->data['aged_worn']) && $this->data['aged_worn'] == 1 )
		{
			$this->checked_aged_worn = true;
		}		
		else
		{
			$this->checked_aged_worn = false;
		}					
		
		if ( isset($this->data['fire_damages']) && $this->data['fire_damages'] == 1 )
		{
			$this->checked_fire_damages = true;
		}		
		else
		{
			$this->checked_fire_damages = false;
		}				

		if ( isset($this->data['is_completed']) && $this->data['is_completed'] == 1 )
		{
			$this->checked_is_completed = true;
		}	
		else
		{
			$this->checked_is_completed = false;
		}		
		
		if ( isset($this->workorder_data['is_expert']) && $this->workorder_data['is_expert'] == 1 )
		{
			$this->show_expert = true;
		}		
		else
		{
			$this->show_expert = false;
		}				
		
		if ( isset($this->data['is_expert_inspector']) && $this->data['is_expert_inspector'] == 1 )
		{
			$this->checked_is_expert = true;
		}	
		else
		{
			$this->checked_is_expert = false;
		}			
		
	}
	
	private function _set_sidebar()
	{
		$this->_partials = array(
			'sidebar' => 'protected/sidebar'
		);
		
		$this->has_sidebar = true;
		$this->sidebar_links[] = array(
			'url' => Route::url('inspector', array('controller' => 'inspections', 'action' => 'index')),
			'name' => 'Work Orders',
			'has_sublinks' => true,
			'current' => true,
			'sub_links' => array(
				array(
					'sub_url' => Route::url('inspector', array('controller' => 'inspections', 'action' => 'view', 'id' => $this->workorder_data['id'])),
					'sub_name' => 'View Work Order'
				),
				array(
					'sub_url' => Route::url('inspector', array('controller' => 'inspections', 'action' => 'form', 'id' => $this->workorder_data['id'])),
					'sub_name' => 'Inspection Form',
					'sub_current' => true
				),
				array(
					'sub_url' => Route::url('inspector', array('controller' => 'inspections', 'action' => 'estimates', 'id' => $this->workorder_data['id'])),
					'sub_name' => 'Estimates'
				)
			)
		);
	}
	
}