<?php return array (
  'name' => 'estimates table',
  'description' => '',
  'sql_up' => 'CREATE TABLE `estimates` (
		`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
		`inspection_id` INT(10) UNSIGNED NULL DEFAULT NULL,
		`description` TEXT NULL COLLATE \'utf8_unicode_ci\',
		`amount` FLOAT UNSIGNED NULL DEFAULT NULL,
		PRIMARY KEY (`id`),
		INDEX `inspection_id` (`inspection_id`),
		CONSTRAINT `estimates_to_inspections` FOREIGN KEY (`inspection_id`) REFERENCES `inspections` (`id`) ON UPDATE CASCADE ON DELETE SET NULL
	)
	COLLATE=\'utf8_unicode_ci\'
	ENGINE=InnoDB;',
  'sql_down' => 'DROP TABLE IF EXISTS estimates;',
  'has_data' => false,
  'date' => 1361973855,
)?>