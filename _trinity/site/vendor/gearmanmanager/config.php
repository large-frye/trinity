<?php

// Example PHP config

$gearman_config = array(
	'GearmanManager' => array(
		'worker_dir' => realpath(dirname(__FILE__)).DIRECTORY_SEPARATOR.'../../application/workers',
		'include' => '*',
		'count' => 10,
		'dedicated_count' => 1,
		'max_worker_lifetime' => 3600,
		'auto_update' => 1,
	),
    "workers" => array(

        "EmailMessage" => array(

            "count" => 5

        ),
		"GeneratePDF" => array(

            "count" => 5

        ),
    )

);

?>