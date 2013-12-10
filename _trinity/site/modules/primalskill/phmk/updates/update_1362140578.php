<?php return array (
  'name' => 'Table messages.',
  'description' => '',
  'sql_up' => 'CREATE TABLE `messages` (
	`id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
	`work_order_id` BIGINT(20) UNSIGNED NULL DEFAULT NULL,
	`date_time_utc` DATETIME NULL DEFAULT NULL,
	`from_id` BIGINT(20) UNSIGNED NULL DEFAULT NULL,
	`to_id` BIGINT(20) UNSIGNED NULL DEFAULT NULL,
	`type` TINYINT UNSIGNED NULL DEFAULT NULL,
	`subject` VARCHAR(200) NULL DEFAULT NULL,
	`message` TEXT NULL DEFAULT NULL,
	`status` TINYINT UNSIGNED NULL DEFAULT NULL,
	PRIMARY KEY (`id`)
)
COLLATE=\'utf8_unicode_ci\'
ENGINE=InnoDB;
',
  'sql_down' => 'DROP TABLE IF EXISTS `messages`;',
  'has_data' => false,
  'date' => 1362140578,
)?>