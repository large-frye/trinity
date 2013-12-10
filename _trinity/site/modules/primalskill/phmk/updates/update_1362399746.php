<?php return array (
  'name' => 'Extend work orders table',
  'description' => '',
  'sql_up' => 'ALTER TABLE `work_orders`
	ADD COLUMN `state` INT NULL DEFAULT NULL AFTER `city`,
	ADD COLUMN `phone2` VARCHAR(30) NULL DEFAULT NULL AFTER `phone`,
	ADD COLUMN `inspection_address` VARCHAR(200) NULL DEFAULT NULL AFTER `is_expert`,
	ADD COLUMN `inspection_address2` VARCHAR(200) NULL DEFAULT NULL AFTER `inspection_address`,
	ADD COLUMN `inspection_city` VARCHAR(200) NULL DEFAULT NULL AFTER `inspection_address2`,
	ADD COLUMN `inspection_state` INT NULL DEFAULT NULL AFTER `inspection_city`,
	ADD COLUMN `inspection_zip` VARCHAR(5) NULL DEFAULT NULL AFTER `inspection_state`,
	ADD COLUMN `damage_type` VARCHAR(200) NULL DEFAULT NULL AFTER `inspection_zip`,
	ADD COLUMN `date_of_loss` DATE NULL DEFAULT NULL AFTER `demage_type`,
	ADD COLUMN `tarped` TINYINT(1) UNSIGNED NULL DEFAULT NULL AFTER `date_of_loss`,
	ADD COLUMN `how_many_stories` INT NULL DEFAULT NULL AFTER `tarped`,
	ADD COLUMN `estimate_scope_requirement` TEXT NULL DEFAULT NULL AFTER `how-many_stories`,
	ADD COLUMN `contact1_first_name` VARCHAR(200) NULL DEFAULT NULL AFTER `estimate_scope_requirement`,
	ADD COLUMN `contact1_last_name` VARCHAR(200) NULL DEFAULT NULL AFTER `contact1_first_name`,
	ADD COLUMN `contact1_phone` VARCHAR(200) NULL DEFAULT NULL AFTER `contact1_last_name`,
	ADD COLUMN `contact2_first_name` VARCHAR(200) NULL DEFAULT NULL AFTER `contact1_phone`,
	ADD COLUMN `contact2_last_name` VARCHAR(200) NULL DEFAULT NULL AFTER `contact2_first_name`,
	ADD COLUMN `contact2_phone` VARCHAR(200) NULL DEFAULT NULL AFTER `contact2_last_name`,
	ADD COLUMN `special_instructions` TEXT NULL DEFAULT NULL AFTER `contact2_phone`;',
  'sql_down' => 'DROP TABLE IF EXISTS `work_orders`;
CREATE TABLE `work_orders` (
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
  'has_data' => false,
  'date' => 1362399746,
)?>