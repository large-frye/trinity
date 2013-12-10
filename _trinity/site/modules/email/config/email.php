<?php

return array
(
	'default' => array
	(
		'incoming' => array
		(
			'host' => 'imap.googlemail.com',
			'port' => 993,
			'type' => 'ssl',
			'username' => 'psktest@primalskill.com',
			'password' => 'primsk2011'
		),
		
		'outgoing' => array
		(
			'host' => 'smtp.googlemail.com',
			'port' => 465,
			'type' => 'ssl',
			'username' => 'psktest@primalskill.com',
			'password' => 'primsk2011',
			
			'from' => array('psktest@primalskill.com' => 'PskTest')
		)
	)
	
	
);