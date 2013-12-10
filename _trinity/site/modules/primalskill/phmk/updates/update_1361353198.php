<?php return array (
  'name' => 'Table for work orders',
  'description' => '',
  'sql_up' => 'CREATE TABLE `work_orders` (
	`id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
	`type` TINYINT NULL DEFAULT NULL,
	`user_id` BIGINT(20) UNSIGNED NULL DEFAULT NULL,
	`first_name` VARCHAR(200) NULL DEFAULT NULL,
	`last_name` VARCHAR(200) NULL DEFAULT NULL,
	`street_address` VARCHAR(200) NULL DEFAULT NULL,
	`address_2` VARCHAR(200) NULL DEFAULT NULL,
	`city` VARCHAR(200) NULL DEFAULT NULL,
	`zip` VARCHAR(5) NULL DEFAULT NULL,
	`phone` VARCHAR(30) NULL DEFAULT NULL,
	`created_on_utc` DATETIME NULL DEFAULT NULL,	
	PRIMARY KEY (`id`)
)
COLLATE=\'utf8_unicode_ci\'
ENGINE=InnoDB;',
  'sql_down' => 'DROP TABLE IF EXISTS `work_orders`;',
  'has_data' => false,
  'date' => 1361353198,
)?>