<?php
/* Validation messages file for usermanagement module */

return array(

	'email' => array
	(
		'not_empty' => 'Please enter an e-mail address.',
		'email' => 'The e-mail address is not valid.',
		'unique_email' => 'The e-mail address is already registered.',
	),
	
	'username' => array
	(
		'not_empty' => 'Please enter a username.',
		'alpha_numeric' => 'The username can consist only of alpha numerical characters',
		'min_length' => 'Please enter a username longer than 5 characters.',
		'unique_username' => 'The username is already registered.',
	),

	'password' => array
	(
		'not_empty' => 'Please enter a password.',
		'min_length' => 'Please enter a password longer than 6 characters.',
		'matches' => 'The password you entered does not match'
	),

	'confirm-password' => array
	(
		'matches' => 'The password you entered does not match.'
	)
	
);