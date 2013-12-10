<?php

return array
(

	'user-sign-up' => array
	(
		'verb' => 'signed up',
		'object' => 'new user',
		'actor_string' => 'System'
	),
	
	'user-logged-in' => array
	(
		'verb' => 'logged in',
		'object' => 'to website',
		'actor_string' => null
	),

	'user-logged-out' => array
	(
		'verb' => 'logged out',
		'object' => 'from website',
		'actor_string' => null
	),	
	
	'user-edited-profile' => array
	(
		'verb' => 'edited',
		'object' => 'his/her profile',
		'actor_string' => null
	),		
	
	'work-order-submit' => array
	(
		'verb' => 'submitted',
		'object' => 'new work order',
		'actor_string' => null
	),

	'admin-work-order-edited' => array
	(
		'verb' => 'edited',
		'object' => 'work order',
		'actor_string' => null
	),	

	'wrote-comment' => array
	(
		'verb' => 'wrote',
		'object' => 'comment for work order',
		'actor_string' => null
	),		
	
	'inspector-updated-inspection' => array
	(
		'verb' => 'updated',
		'object' => 'inspection form',
		'actor_string' => null
	),		

	'inspector-updated-inspection-estimate' => array
	(
		'verb' => 'updated',
		'object' => 'inspection estimate',
		'actor_string' => null
	)	
);


?>