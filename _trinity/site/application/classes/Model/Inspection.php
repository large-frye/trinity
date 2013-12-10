<?php
/**
 * The model that handles the inspection
 */
class Model_Inspection extends Model_Core
{
	
	/**
	 * @var string The inspection meta table name
	 */
	protected $_inspection_meta_table = 'inspection_meta';
	
	/**
	 * @var array Holds any errors 
	 */
	protected $_errors = array();
	
	/**
	 * @var int The id of the work order
	 */
	protected $work_order_id = null;
	
	/**
	 * @var array Meta data for inspection
	 */
	protected $_inspection_meta = array();
	
	/**
	 * @var array Will hold the incoming POST
	 */
	protected $_post_data = array();

	
	protected $_validations = array(
		'base' => array(
			'was_insured_present' => 'not_empty',
			'roof_access' => 'not_empty',
			'roof_access' => array(':model','_not_blank'),
			'roof_square_feet' => 'not_empty',
			'estimated_age_of_roof' => 'not_empty',
			'estimated_age_of_roof' => array(':model','_not_blank'),
			'roof_height' => 'not_empty',
			'roof_height' => array(':model','_not_blank'),
			'type_of_framing' => 'not_empty',
			'type_of_framing' => array(':model','_not_blank'),
			'pitch_1' => 'not_empty',
			'pitch_1' => array(':model','_not_blank'),
			'layers' => 'not_empty',
			'layers' => array(':model','_not_blank'),
			'type_of_roofing' => 'not_empty',
			'condition' => 'not_empty',
			'condition' => array(':model','_not_blank'),
			'remove_reset_tarp' => 'not_empty',
			'remove_reset_tarp' => array(':model','_not_blank'),
			'lift_up_minor_reset_tarp' => 'not_empty',
			'lift_up_minor_reset_tarp' => array(':model','_not_blank'),
			'collateral_damages_to_property' => 'not_empty',
			'collateral_damages_to_property' => array(':model','_not_blank')
		),
		'wind' => array(
			'wind_shingles_damaged' => 'not_empty',
			'wind_roof_peeled_back' => 'not_empty'
		),
		'hail' => array(
			'hail_amount_damaged' => 'not_empty'
		),
		'lightning' => array(
			'lightning_amount_damaged' => 'not_empty',
			'lightning_damages' => 'not_empty'
		),
		'vermin' => array(
			'vermin_roofing_damage' => 'not_empty',
			'vermin_fascia_damage' => 'not_empty',
			'vermin_vent_damage' => 'not_empty'
		),
		'vandalism' => array(
			'vandalism_skylights' => 'not_empty',
			'vandalism_roof_decking_cut' => 'not_empty'
		),
		'ice' => array(
			'ice_damming' => 'not_empty',
			'ice_fallen_ice' => 'not_empty'
		),
		'appliances' => array(
			'appliances_skylights' => 'not_empty',
			'appliances_antenna_sattelite_dish' => 'not_empty',
			'appliances_ac_units' => 'not_empty'
		),
		'fallen_tree' => array(
			'fallen_tree_amount_of_damage' => 'not_empty',
			'fallen_tree_damages' => 'not_empty'
		),
		'excess_debris' => array(
			'excess_debris_location' => 'not_empty'
		),
		'standing_water' => array(
			'standing_water_select' => 'not_empty'
		),
		'product_defects' => array(
			'product_defects_asphalt_coating' => 'not_empty',
			'product_defects_blistering' => 'not_empty',
			'product_defects_flaking' => 'not_empty'
		),
		'workmanship' => array(
			'workmanship_improper_nailing' => 'not_empty',
			'workmanship_improper_overlap' => 'not_empty',
			'workmanship_flashing' => 'not_empty',
			'workmanship_flashing_missing' => 'not_empty',
			'workmanship_venting' => 'not_empty',
			'workmanship_incorrect_materials' => 'not_empty',
			'workmanship_excessive_layers' => 'not_empty',
			'workmanship_sub_par_deck' => 'not_empty'
		),
		'aged_worn' => array(
			'aged_worn_check_that_apply' => 'not_empty'
		),
		'fire_damages' => array(
			'fire_damages_check_that_apply' => 'not_empty'
		)
	);
	
	protected $_slopes_for = array(
		'wind_shingles_damaged',
		'wind_roof_peeled_back',
		'hail_amount_damaged',
		'lightning_amount_damaged',
		'vermin_roofing_damage',
		'vermin_fascia_damage',
		'vermin_vent_damage',
		'vandalism_skylights',
		'vandalism_roof_decking_cut',
		'ice_damming',
		'ice_fallen_ice',
		'appliances_skylights',
		'appliances_antenna_sattelite_dish',
		'appliances_ac_units',
		'fallen_tree_amount_of_damage',
		'excess_debris_location',
		'standing_water_select',
		'product_defects_asphalt_coating',
		'product_defects_blistering',
		'product_defects_flaking',
		'workmanship_improper_nailing',
		'workmanship_improper_overlap',
		'workmanship_flashing',
		'workmanship_flashing_missing',
		'workmanship_venting',
		'workmanship_incorrect_materials',
		'workmanship_excessive_layers',
		'workmanship_sub_par_deck',
		'aged_worn_check_that_apply',
		'fire_damages_check_that_apply'
	);
	
	public function __construct($work_order_id = null)
	{
		if ( $work_order_id == null || !is_numeric($work_order_id) )
		{
			throw new Kohana_Exception('Cannot instantiate inspections model without work_order_id');
		}
		
		$this->_work_order_id = $work_order_id;
	}
	
	/**
	 * Validates the incoming data
	 * @param array $post The POST data
	 * @return boolean
	 */
	public function validate(Array $post = array())
	{
		$this->_post_data = $post;
		
		// Build base validation first
		$val = Validation::factory($post)
			->bind(':model', $this);
		
		foreach ( $this->_validations['base'] as $key => $value )
		{
			$val->rule($key, $value);
		}
		
		// Now see which cause of loss fields are checked
		$causes_of_loss = array_keys($this->_validations);
		unset($causes_of_loss['base']);
		
		$causes_of_loss = array_intersect($causes_of_loss, array_keys($this->_post_data));
		
		$are_causes = true;
		
		$causes_valid = true;
		
		if ( empty($causes_of_loss) )
		{
			$this->_errors['causes_of_loss'] = 'Please select at least one cause of loss';
			$are_causes = false;
		}
		
		foreach ( $causes_of_loss as $cause )
		{
			$cause_fields_completed = 0;
			
			foreach ( $this->_validations[$cause] as $key => $value )
			{
				if ( isset($this->_post_data[$key]) )
				{
					if ( is_array( $this->_post_data[$key] ) )
					{
					
						$without_blank = array_diff($this->_post_data[$key], array('blank'));
						
						if ( ! empty($without_blank) )
						{
							$cause_fields_completed++;
						}
					}
					else
					{
						if ( $this->_post_data[$key] != 'blank' )
						{
							$cause_fields_completed++;
						}
					}
					
				}

				$val->rule($key, $value);
				
				if (isset($this->_post_data[$key]))
				{
					if ( is_array($this->_post_data[$key]) )
					{
						$selected_subsection = $this->_post_data[$key];
					}
					else
					{
						$selected_subsection = array($this->_post_data[$key]);
					}
					
					$selected_subsection = array_diff($selected_subsection, array('blank') );
					
					if ( in_array($key, $this->_slopes_for) && !empty($selected_subsection) )
					{
						$val->rule($key.'_slope', 'not_empty');
					}
				}	
			}
			
			
			if ( $cause_fields_completed === 0)
			{
				$this->_errors[$cause] = 'Please complete this section';
				$causes_valid = false;
			}
			
		}
		
		$post_val = $val->check();
		
		if ( $post_val && $are_causes && $causes_valid )
		{
			return true;
		}
		
		$this->_errors = array_merge($this->_errors, $val->errors('validation/inspection'));
		
	//	var_dump( $this->_errors );exit;
		
		return false;
	}
	
	 public function _not_blank($name)
	 {
		return $name != 'blank';
	 }	
	
	/**
	 * Load an inspection by its ID
	 * @param int $id
	 * @return boolean
	 */
	public function load_inspection()
	{
		
		try
		{
			$this->_sql = 'SELECT * FROM '.$this->_inspection_meta_table.' WHERE workorder_id = :id';
			
			$this->_q = DB::query(Database::SELECT, $this->_sql)
					->param(':id', (int)$this->_work_order_id)
					->execute();
			
			$result = $this->_get_results();
			
			if ( $result !== false )
			{
				$this->_inspection_meta = $this->decode($result);
			}
			
			return true;
		}
		catch(Database_Exception $db_e)
		{
			throw $db_e;
		}
	}
	
	/**
	 * Save the inspection data
	 */
	public function save()
	{
		try
		{
			$this->_save_meta();
		}
		catch( Exception $e )
		{
			throw $e;
		}
	}
	
	/**
	 * Inner function, saves meta for an inspection
	 */
	protected function _save_meta()
	{
		// data, which not needed to save.
		$not_save = array
							(
								'csrf_token', 
								'first_name',
								'last_name',
								'street_address',
								'address_2',
								'city',
								'zip',
								'phone',
								'date_of_inspection'
							);
							
		$causes_not_selected = array();					
	
		try
		{	
			//
			$causes = array_keys($this->_validations);
			unset($causes['base']);
			
			//build an array which contains the causes that were not selected
			foreach( $causes as $cause )
			{
				if ( !isset($this->_post_data[$cause]) )
				{
					array_push($causes_not_selected, $cause);
				}
			}
			
			foreach($this->_post_data as $key => $value)
			{
				//unset the data which not needed to save
				if ( in_array( $key, $not_save) )
				{
					unset($this->_post_data[$key]);
				}
				
				//unset the subsections where the section was not selected
				for ($i=0, $mi=count($causes_not_selected); $i<$mi; $i++)
				{
					if ( strpos($key, $causes_not_selected[$i]) === 0 )
					{
						unset($this->_post_data[$key]);			
						break;
					}
				}
				
			}
			
			
			Database::instance()->begin();		
			
			$data = $this->encode($this->_post_data);
			
			// Fist delete the old meta and reinsert the new ones
			$this->_sql = 'DELETE FROM '.$this->_inspection_meta_table.' WHERE workorder_id = :id';
			
			$this->_q = DB::query(Database::DELETE, $this->_sql)
					->param(':id', $this->_work_order_id)
					->execute();
			
			foreach ( $data as $row )
			{
				$this->_insert_data($this->_inspection_meta_table, $row);
			}
			
			Database::instance()->commit();
		}
		catch(Database_Exception $db_e)
		{
			Database::instance()->rollback();
			throw $db_e;
		}
	}
	
	/**
	 * Encodes the post data with serialize for arrays
	 * - checkboxes, radios, multiselects, stc
	 * @param array $data The array to go through on
	 * @return array The reworked array
	 */
	private function encode(Array $data)
	{
		$reworked = array();
		foreach ( $data as $key => $value )
		{
			$tmp = array();
			$tmp['workorder_id'] = (int)$this->_work_order_id;
			$tmp['key'] = $key;
			
			if ( is_array($value) )
			{
				$value = array_diff($value, array('blank'));
				$tmp['value'] = serialize($value);
			}
			else
			{
				$tmp['value'] = $value;
			}
			
			$reworked[] = $tmp;
		}
		
		return $reworked;
	}
	
	/**
	 * After loaded from db, we have to decode the data
	 * @param array $data The array to go through on
	 * @return array The reworked array
	 */
	private function decode(Array $data)
	{
		$reworked = array();
		for ( $i = 0, $max = count($data); $i < $max; $i++ )
		{
			$value = @unserialize($data[$i]['value']);
			
			if ( $value === false)
			{
				$value = $data[$i]['value'];
			}
			$reworked[$data[$i]['key']] = $value;
		}
		
		return $reworked;
	}
	
	/**
	 * Return the inspection data
	 *
	 * @return Array with 2 indexes: 'inspection' => [Inspection data], 'inspection_meta' => [Inspection Meta data]
	 */
	public function return_data()
	{
		return $this->_inspection_meta;
	//	return array( 'inspection' => $this->_inspection, 'inspection_meta' => $this->_inspection_meta );
	}

		
	/**
	 * Return the validation errors
	 *
	 * @return Array 
	 */	
	public function return_errors()
	{
		return $this->_errors;
	}
}