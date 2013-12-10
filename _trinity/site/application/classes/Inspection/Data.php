<?php
/**
 * A simple php object that holds the dropdown and other data necessary for the inspection form
 */
class Inspection_Data
{
	public static $was_insured_present = array(
		'type' => 'radio',
		'data' => array(
			0 => 'Yes',
			1 => 'No'
		)
	);
	
	public static $roof_access = array(
		'type' => 'select',
		'data' => array(
			0 => 'Walked on roof',
			1 => 'Didn\'t walk on roof, DIDN\'T set ladder',
			2 => 'Didn\'t walk on roof, DID set ladder'
		)
	);
	
	public static $did_use_ladder = array(
		'type' => 'radio',
		'data' => array(
			0 => 'Yes',
			1 => 'No'
		)
	);
	
	public static $why_not_walked_on_roof = array(
		'type' => 'select',
		'data' => array(
			0 => 'Not Safe To Walk',
			1 => 'Steep Pitch',
			2 => 'Slate/Terracotta Roof'
		)
	);
	
	public static $estimated_age_of_roof = array(
		'type' => 'select',
		'data' => array(
			0 => 'Under 5 yrs',
			1 => '5-10',
			2 => '10-20',
			3 => 'Over 20'
		)
	);
	
	public static $roof_height = array(
		'type' => 'select',
		'data' => array(
			0 => '1 story',
			1 => '1.5 stories',
			2 => '2 stories',
			3 => '2.5 stories',
			4 => '3 stories',
			5 => '4 stories (latch entry)',
			6 => '5 stories (latch entry)'
		)
	);
	
	public static $type_of_framing = array(
		'type' => 'select',
		'data' => array(
			0 => 'Flat',
			1 => 'Gable',
			2 => 'Hip',
			3 => 'Shed',
			4 => 'Wiel Back',
			5 => 'Reverse Gable',
			6 => 'Gambrel',
			7 => 'Mansard',
			8 => 'Salt Box'
		)
	);
	
	public static $pitch_1 = array(
		'type' => 'select',
		'data' => array(
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
			12 => '12'
		)
	);
	
	public static $pitch_2 = array(
		'type' => 'select',
		'data' => array(
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
			12 => '12'
		)
	);
	
	public static $pitch_3 = array(
		'type' => 'select',
		'data' => array(
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
			12 => '12'
		)
	);
	
	public static $layers = array(
		'type' => 'select',
		'data' => array(
			0 => 'Flat',
			1 => '1',
			2 => '2',
			3 => '3',
			4 => 'Over 3'
		)
	);
	
	public static $type_of_roofing = array(
		'type' => 'checkbox',
		'data' => array(
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
		)
	);
	
	public static $if_rolled = array(
		'type' => 'checkbox',
		'data' => array(
			0 => 'Cold',
			1 => 'Hot',
			2 => 'Rubber',
			3 => 'Granulated '
		)
	);
	
	public static $condition = array(
		'type' => 'select',
		'data' => array(
			0 => 'Excellent',
			1 => 'Good',
			2 => 'Poor',
			3 => 'Beyond life expectancy',
			4 => 'Fair'
		)
	);
	
	public static $remove_reset_tarp = array(
		'type' => 'select',
		'data' => array(
			0 => 'Up to 120 Sq. Ft.',
			1 => '121 to 600 Sq. Ft.',
			2 => '601 to 900 Sq. Ft.',
			3 => 'No Tarp'
		)
	);
	
	public static $lift_up_minor_reset_tarp = array(
		'type' => 'select',
		'data' => array(
			0 => 'No Tarp Lift',
			1 => 'Up to 120 Sq. Ft.',
			2 => '121 to 600 Sq. Ft.',
			3 => '601 to 900 Sq. Ft.'
		)
	);
	
	public static $previous_repairs_made = array(
		'type' => 'checkbox',
		'data' => array(
			0 => 'Re-Roofed',
			1 => 'Tarped',
			2 => 'Tarred',
			3 => 'Sheathed',
			4 => 'Caulked',
			5 => 'Boarded Up'
		)
	);
	
	public static $collateral_damages_to_property = array(
		'type' => 'select',
		'data' => array(
			0 => 'N/A',
			1 => 'Vehicle',
			2 => 'Siding',
			3 => 'Gutters',
			4 => 'Decking',
			5 => 'Windows/Doors',
			6 => 'Landscaping'
		)
	);
	
	public static $slope = array(
		'type' => 'checkbox',
		'data' => array(
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
		)
	);
	
	public static $wind_roof_peeled_back = array(
		'type' => 'select',
		'data' => array(
			0 => 'N/A',
			1 => '1-10 sq ft',
			2 => '10-25 sq ft',
			3 => '25-50 sq ft',
			4 => '50-75 sq ft',
			5 => '75-100 sq ft',
			6 => 'Over 100 sq ft'
		)
	);
	
	public static $lightning_amount_damaged = array(
		'type' => 'select',
		'data' => array(
			0 => 'N/A',
			1 => '0 sq ft',
			2 => '1-50 sq ft',
			3 => '50-100 sq ft',
			4 => 'Over 100 sq ft'
		)
	);
	
	public static $lightning_damages = array(
		'type' => 'checkbox',
		'data' => array(
			0 => 'Roofing',
			1 => 'Antenna',
			2 => 'Sheathing/Framing',
			3 => 'Flashing',
			4 => 'Chimney'
		)
	);
	
	public static $vermin_roofing_damage = array(
		'type' => 'select',
		'data' => array(
			0 => 'N/A',
			1 => '0 sq ft',
			2 => '1-5 sq ft',
			3 => '5-10 sq ft',
			4 => 'Over 10 sq ft'
		)
	);
	
	public static $vermin_fascia_damage = array(
		'type' => 'select',
		'data' => array(
			0 => 'N/A',
			1 => '0 In ft',
			2 => '1-5 In ft',
			3 => 'Over 5 In ft'
		)
	);
	
	public static $vermin_vent_damage = array(
		'type' => 'select',
		'data' => array(
			0 => 'N/A',
			1 => '0 sq ft',
			2 => '1 sq ft',
			3 => '2 sq ft',
			4 => '3 sq ft'
		)
	);
	
	public static $vandalism_skylights = array(
		'type' => 'select',
		'data' => array(
			0 => 'N/A',
			1 => '1',
			2 => '2',
			3 => '3'
		)
	);
	
	public static $vandalism_roof_decking_cut = array(
		'type' => 'select',
		'data' => array(
			0 => 'N/A',
			1 => '0 sq ft',
			2 => '1-5 sq ft',
			3 => '5-10 sq ft',
			4 => 'Over 10 sq ft'
		)
	);
	
	public static $appliances_skylights = array(
		'type' => 'checkbox',
		'data' => array(
			0 => 'Glass Cracked',
			1 => 'Flashing Cracked',
			2 => 'Flashing Clogged'
		)
	);
	
	public static $appliances_antenna_sattelite_dish = array(
		'type' => 'checkbox',
		'data' => array(
			0 => 'Supports'
		)
	);
	
	public static $appliances_ac_units = array(
		'type' => 'checkbox',
		'data' => array(
			0 => 'Supports',
			1 => 'Flashing',
			2 => 'Plumbing/Wiring'
		)
	);
	
	public static $fallen_tree_amount_of_damage = array(
		'type' => 'select',
		'data' => array(
			0 => 'N/A',
			1 => '0 sq ft',
			2 => '1-25 sq ft',
			3 => '25-50 sq ft',
			4 => '50-100 sq ft',
			5 => 'Over 100 sq ft'
		)
	);
	
	public static $fallen_tree_damages = array(
		'type' => 'checkbox',
		'data' => array(
			0 => 'Roofing Scratched',
			1 => 'Flashing',
			2 => 'Holes in Decking',
			3 => 'Venting',
			4 => 'Framing',
			5 => 'Antenna',
			6 => 'Fascia',
			7 => 'A/C Unit',
			8 => 'Gutters',
			9 => 'Roofing Damaged or Missing',
			10 => 'Skylights/Windows'
		)
	);
	
	public static $excess_debris_location = array(
		'type' => 'checkbox',
		'data' => array(
			0 => 'On Decking',
			1 => 'In Valleys',
			2 => 'In Drains',
			3 => 'Around Skylights',
			4 => 'In Gutters',
			5 => 'Gable Ends'
		)
	);
	
	public static $standing_water_select = array(
		'type' => 'checkbox',
		'data' => array(
			0 => 'Improper Drainage',
			1 => 'Roof Pitched Incorrectly',
			2 => 'Clogged Drains'
		)
	);
	
	public static $product_defects_asphalt_coating_defect = array(
		'type' => 'select',
		'data' => array(
			0 => 'N/A',
			1 => '10%',
			2 => '25%',
			3 => '50%',
			4 => '100%'
		)
	);
	
	public static $product_defects_blistering = array(
		'type' => 'select',
		'data' => array(
			0 => 'N/A',
			1 => '10%',
			2 => '25%',
			3 => '50%',
			4 => '100%'
		)
	);
	
	public static $product_defects_flaking = array(
		'type' => 'select',
		'data' => array(
			0 => 'N/A',
			1 => '10%',
			2 => '25%',
			3 => '50%',
			4 => '100%'
		)
	);
	
	public static $improper_installation_nailing = array(
		'type' => 'checkbox',
		'data' => array(
			0 => 'Over Nailed',
			1 => 'Under Nailed',
			2 => 'Top Nailed',
			3 => 'High Nailing'
		)
	);
	
	public static $improper_installation_flashing = array(
		'type' => 'checkbox',
		'data' => array(
			0 => 'Flashing Missing',
			1 => 'Crushed',
			2 => 'Top Nailed',
			3 => 'Improper Materials',
			4 => 'Raised/Loose'
		)
	);
	
	public static $improper_installation_flashing_missing = array(
		'type' => 'checkbox',
		'data' => array(
			0 => 'Apron',
			1 => 'Step',
			2 => 'Valley',
			3 => 'Chimney'
		)
	);
	
	public static $improper_installation_venting = array(
		'type' => 'checkbox',
		'data' => array(
			0 => 'Missing',
			1 => 'Insufficient'
		)
	);
	
	public static $improper_installation_sub_par_deck = array(
		'type' => 'checkbox',
		'data' => array(
			0 => 'Incorrect Sheathing Size'
		)
	);
	
	public static $aged_worn = array(
		'type' => 'checkbox',
		'data' => array(
			0 => 'Drying',
			1 => 'Significant Granular Loss',
			2 => 'Cupping',
			3 => 'Splitting Wood',
			4 => 'Blistering',
			5 => 'Shrinkage',
			6 => 'Delamination',
			7 => 'Flashing missing',
			8 => 'Cracking',
			9 => 'Lichen/Moss',
			10 => 'Shading'
		)
	);
	
	public static $fire_damages = array(
		'type' => 'checkbox',
		'data' => array(
			0 => 'Roofing Burned',
			1 => 'Flashing Burned',
			2 => 'Sheathing Burned',
			3 => 'Antenna Burned',
			4 => 'Framing Burned',
			5 => 'A/C Burned',
			6 => 'Skylights Burned'
		)
	);
}