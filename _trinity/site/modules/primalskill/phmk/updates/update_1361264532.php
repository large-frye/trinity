<?php return array (
  'name' => 'Adding settings table',
  'description' => '',
  'sql_up' => 'CREATE TABLE `settings` (
	`id` INT UNSIGNED NULL AUTO_INCREMENT,
	`name` VARCHAR(250) NULL,
	`value` TEXT NULL,
	`nice_name` VARCHAR(250) NULL,
	`description` TEXT NULL,
	PRIMARY KEY (`id`)
)
COLLATE=\'utf8_unicode_ci\'',
  'sql_down' => 'DROP TABLE IF EXISTS settings;',
  'has_data' => false,
  'date' => 1361264532,
)?>