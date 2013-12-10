<?php

return array
(
	'policy_number' => array
	(
		'not_empty' => 'Policy Number is required'
	),
	
	'first_name' => array
	(
		'not_empty' => 'First Name is required.'
	),
	
	'last_name' => array
	(
		'not_empty' => 'Last Name is required.'
	),	

	'street_address' => array
	(
		'not_empty' => 'Street Address is required.'
	),	
	
	'city' => array
	(
		'not_empty' => 'City is required.'
	),		
	
	'state' => array
	(
		'not_empty' => 'State is required.'
	),	
	
	'zip' => array
	(
		'not_empty' => 'Zip Code is required.',
		'numeric' => 'Zip Code must be numeric.',
		'exact_length' => 'This must be a 5 digit USA Zip Code'
	),	
	
	'phone' => array
	(
		'not_empty' => 'Phone number is required.',
		'_valid_phone' => 'Invalid phone number.'
	),	
	
	'phone2' => array
	(
		'_valid_phone' => 'Invalid phone number.'
	),	
	
	'inspection_zip' => array
	(
		'numeric' => 'Zip Code must be numeric.',
		'exact_length' => 'This must be a 5 digit USA Zip Code'
	),		
	
	'date_of_loss' => array
	(
		'date' => 'Invalid date.',
		'_valid_date'  => 'Invalid date.'
	),		
	
	'how_many_stories' => array
	(
		'numeric' => 'Nr. of Stories must be numeric.'
	),

	'contact1_phone' => array
	(
		'_valid_phone' => 'Invalid phone number.'
	),		
	
	'contact2_phone' => array
	(
		'_valid_phone' => 'Invalid phone number.'
	),		
	
	'message' => array
	(
		'not_empty' => 'Message is required.'
	),
	
	'inspector_id' => array
	(
		'not_empty' => 'Please select the inspector.'
	),
	
	'date_of_inspection' => array
	(
		'not_empty' => 'Please select the date of the inspection.',
		'date' => 'Invalid date.',
		'_valid_inspection_date' => 'Invalid date.'
	),

	'price' => array(
		'not_empty' => 'Price cannot be empty',
		'numeric' => 'Price has to be a numeric value'
	)	
);