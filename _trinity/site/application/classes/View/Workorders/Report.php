<?php

class View_Workorders_Report extends View_Protected_Layout
{
	protected $_template = 'workorders/report';

	/**
	 * @var Array The Workorder data
	 */	
	public $workorder_data = null;
	
	public $estimates = null;
	
	protected $_m_workorders = null;	
	
	protected $_m_inspection  = null;	
	
	protected $_m_estimates  = null;	
	
	public $total_estimates = null;
	
	public $show_generate_pdf = false;	
	
	public $show_send_pdf = false;
	
	public $show_generating_pdf = false;
	
	public $adjuster = false;
	
	protected $_meta_mapping =
					array
					(
						'was_insured_present' => 'was_insured_present',
						'roof_access' => 'roof_access',
						'did_use_ladder' => 'did_use_ladder',
						'why_not_walked_on_roof' => 'why_not_walked_on_roof',
						'estimated_age_of_roof' => 'estimated_age_of_roof',
						'roof_height' => 'roof_height',
						'type_of_framing' => 'type_of_framing',
						'pitch_1' => 'pitch_1',
						'pitch_2' => 'pitch_2',
						'pitch_3' => 'pitch_3',
						'layers' => 'layers',
						'type_of_roofing' => 'type_of_roofing',			
						'if_rolled' => 'if_rolled',
						'condition' => 'condition',
						'remove_reset_tarp' => 'remove_reset_tarp',
						'lift_up_minor_reset_tarp' => 'lift_up_minor_reset_tarp',
						'previous_repairs_made' => 'previous_repairs_made',
						'collateral_damages_to_property' => 'collateral_damages_to_property',		

						'wind_shingles_damaged_slope' => 'slope',
						'wind_roof_peeled_back' => 'wind_roof_peeled_back',
						'wind_roof_peeled_back_slope' => 'slope',

						'hail_amount_damaged_slope' => 'slope',

						'lightning_amount_damaged' => 'lightning_amount_damaged',
						'lightning_amount_damaged_slope' => 'slope',
						'lightning_damages' => 'lightning_damages',	

						'vermin_roofing_damage' => 'vermin_roofing_damage' ,
						'vermin_roofing_damage_slope' => 'slope',
						'vermin_fascia_damage' => 'vermin_fascia_damage',
						'vermin_fascia_damage_slope' => 'slope',
						'vermin_vent_damage' => 'vermin_vent_damage',			
						'vermin_vent_damage_slope' => 'slope',
						
						'vandalism_skylights' => 'vandalism_skylights',
						'vandalism_skylights_slope' => 'slope',
						'vandalism_roof_decking_cut' => 'vandalism_roof_decking_cut',
						'vandalism_roof_decking_cut_slope' => 'slope',
						
						'ice_damming_slope' => 'slope',
						'ice_fallen_ice_slope' => 'slope',
						
						'appliances_skylights' => 'appliances_skylights',
						'appliances_skylights_slope' => 'slope',
						'appliances_antenna_sattelite_dish' => 'appliances_antenna_sattelite_dish',
						'appliances_antenna_sattelite_dish_slope' => 'slope',
						'appliances_ac_units' => 'appliances_ac_units',
						'appliances_ac_units_slope' => 'slope',

						'fallen_tree_amount_of_damage' => 'fallen_tree_amount_of_damage',
						'fallen_tree_amount_of_damage_slope' => 'slope',
						'fallen_tree_damages' => 'fallen_tree_damages',

						'excess_debris_location' => 'excess_debris_location',
						'excess_debris_location_slope' => 'slope',

						'standing_water_select' => 'standing_water_select',
						'standing_water_select_slope' => 'slope',
						
						'product_defects_asphalt_coating' => 'product_defects_asphalt_coating_defect',
						'product_defects_asphalt_coating_slope' => 'slope',
						'product_defects_blistering' => 'product_defects_blistering',
						'product_defects_blistering_slope' => 'slope',
						'product_defects_flaking' => 'product_defects_flaking',
						'product_defects_flaking_slope' => 'slope',

						'workmanship_improper_nailing' => 'improper_installation_nailing',
						'workmanship_improper_nailing_slope' => 'slope',
						'workmanship_improper_overlap_slope' => 'slope',
						'workmanship_flashing' => 'improper_installation_flashing',
						'workmanship_flashing_slope' => 'slope',
						'workmanship_flashing_missing' => 'improper_installation_flashing_missing',
						'workmanship_flashing_missing_slope' => 'slope',
						'workmanship_venting' => 'improper_installation_venting',
						'workmanship_venting_slope' => 'slope',
						'workmanship_incorrect_materials_slope' => 'slope',
						'workmanship_excessive_layers_slope' => 'slope',
						'workmanship_sub_par_deck' => 'improper_installation_sub_par_deck',
						'workmanship_sub_par_deck_slope' => 'slope',
						'aged_worn_check_that_apply' => 'aged_worn',
						'aged_worn_check_that_apply_slope' => 'slope',
						
						'fire_damages_check_that_apply' => 'fire_damages',
						'fire_damages_check_that_apply_slope' => 'slope',
					);
					
	public $inspection_data = 				
					array
					(
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
						'general_comments' => null
					);				
					
	public $causes = 
					array
					(
						'wind',
						'hail',
						'lightning',
						'vermin',
						'vandalism',
						'ice',
						'appliances',
						'fallen_tree',
						'excess_debris',
						'standing_water',
						'product_defects',
						'workmanship',
						'aged_worn',
						'fire_damages'						
					);					
	
	public $download_pdf_url = null;
	
	public $photos = null;
	
	public $last_page_break = false;

	
	public function __construct($m_workorders = null, $m_inspection = null)
	{		
		parent::__construct();	
	
		$this->_m_workorders = $m_workorders;
		
		$this->_m_inspection = $m_inspection;
		
		$this->_load_data();
	
		$this->_set_variables();
		$this->_set_sidebar();
		
	}
	
	protected function _load_data()
	{
		$this->workorder_data = $this->_m_workorders->return_data();
		
		$m_psusers = new Model_Psusers();
		
		$m_psusers->load_by( array( 'id' => $this->workorder_data['user_id']) );
		
		$m_profile = new Model_Profile($m_psusers);
		
		$m_profile->load();
		
		$this->adjuster = $m_profile->return_data();
		
		$this->workorder_data['date_of_inspection'] = date('m-d-Y', strtotime($this->workorder_data['date_of_inspection']));			
		
		if ( isset($this->workorder_data['time_of_inspection'] ))
		{
			$exploded_time = explode(':', $this->workorder_data['time_of_inspection']);
			$this->workorder_data['time_of_inspection'] = $exploded_time[0].':'.$exploded_time[1];
		}
		
		$this->_m_inspection->load_inspection();
		
		$this->_m_estimates = new Model_Estimates($this->workorder_data['id']);
		$this->_m_estimates->load();
		
		$this->estimates = $this->_m_estimates->return_estimates();
		
		$inspection_data = $this->_m_inspection->return_data();
		
		foreach( $inspection_data as $key => $value )
		{
			if ( array_key_exists($key, $this->inspection_data) )
			{
				$this->inspection_data[$key] = $inspection_data[$key];
			}
		}

		foreach($this->inspection_data as $key => $value)
		{
			if ( array_key_exists($key, $this->_meta_mapping) )
			{
				$this->inspection_data[$key] = $this->_return_value( $this->inspection_data[$key], Inspection_Data::${$this->_meta_mapping[$key]} );
			}
			
			if ( $this->inspection_data[$key] == 1 && in_array($key, $this->causes) )
			{
				$this->inspection_data[$key] = true;
			}
		}
		
		if ( $this->estimates != false )
		{
			$this->total_estimates = 0;
			
			for($i=0, $mi=count($this->estimates); $i<$mi; $i++)
			{
				$this->total_estimates += $this->estimates[$i]['amount'];
			}
		}
		
		$m_photos = new Model_Inspection_Photos($this->workorder_data['id']);
		
		$this->photos = $m_photos->get_published_data();
		
		if ($this->photos !== false)
		{
		
			$m_categories = new Model_Categories();
		
			for ( $i = 0, $mi = count($this->photos); $i < $mi; $i++ )
			{
		
				$this->photos[$i]['orig_url'] = Route::url('getphoto', array(
					'size' => 'r',
					'workorder_id' => $this->photos[$i]['workorder_id'],
					'photo_id' => $this->photos[$i]['report_filename']
				));		

		
				$this->photos[$i]['thumb_url'] = Route::url('getphoto', array(
					'size' => 't',
					'workorder_id' => $this->photos[$i]['workorder_id'],
					'photo_id' => $this->photos[$i]['thumbnail_filename']
				));				
				
				if ( isset($this->photos[$i]['category_id']) && $this->photos[$i]['category_id'] != null )
				{
					$subcategory = $m_categories->get_category($this->photos[$i]['category_id']);
					
					if ( $subcategory != false )
					{
						$subcategory = $m_categories->return_data();
						
						$this->photos[$i]['subcategory'] = $subcategory['name'];
						
						if ( $subcategory['parent_id'] != 0 )
						{
							$category = $m_categories->get_category($subcategory['parent_id']);
							$category = $m_categories->return_data();
					
							$this->photos[$i]['category'] = $category['name'];
						}
					}
				}
			}	
		}
		
	}
	
	protected function _set_variables()
	{
		$this->download_pdf_url = Route::url('get', array('controller' => 'pdf', 'action' => 'workorder', 'type' => 'report', 'id' => $this->workorder_data['id']));
	}
	
	protected function _return_value($element_values, $from)
	{
		$elements_needed = array();
	
		if ( !is_array($element_values) )
		{	
			$element_values = array($element_values);
		}
		
		foreach( $element_values as $value )
		{
			if ( array_key_exists($value, $from['data']) )
			{
				array_push($elements_needed, $from['data'][$value]);
			}
		}
		
		return implode(', ', $elements_needed);
	}
	
	public function show_download_pdf()
	{
		if (isset($this->workorder_data['is_generated_pdf']) && $this->workorder_data['is_generated_pdf'] == 1)
		{
			return true;
		}
		
		return false;
	}

	protected function _set_sidebar()
	{
		$this->_partials = array(
			'sidebar' => 'protected/sidebar'
		);
		
		$sublinks = array();
		
		if ( $this->show_download_pdf() )
		{
			$sublinks[] = array(
				'sub_url' => $this->download_pdf_url,
				'sub_name' => 'Download Report',
			);
		}
		
		$this->has_sidebar = true;
		
		$this->sidebar_links[] = array(
			'url' => '#',
			'name' => 'Report',
			'has_sublinks' => true,
			'current' => true,
			'sub_links' => $sublinks
		);
	}
}