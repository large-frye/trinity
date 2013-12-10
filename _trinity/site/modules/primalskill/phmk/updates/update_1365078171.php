<?php return array (
  'name' => 'User profile table',
  'description' => '',
  'sql_up' => 'CREATE TABLE IF NOT EXISTS `user_profiles` (
	`id` INT UNSIGNED NULL AUTO_INCREMENT,
	`user_id` INT UNSIGNED NULL,
	`first_name` VARCHAR(250) NULL,
	`last_name` VARCHAR(250) NULL,
	`phone` VARCHAR(50) NULL,
	`geographic_region` VARCHAR(250) NULL,
	PRIMARY KEY (`id`)
)
COLLATE=\'utf8_unicode_ci\'
ENGINE=InnoDB;
',
  'sql_down' => 'DROP TABLE IF EXISTS user_profiles',
  'has_data' => false,
  'date' => 1365078171,
)?>