<?php return array (
  'name' => 'Inspection meta table',
  'description' => '',
  'sql_up' => 'CREATE TABLE IF NOT EXISTS `invoice_meta` (
	`id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
	`workorder_id` INT(10) UNSIGNED NULL DEFAULT NULL,
	`description` TEXT NULL DEFAULT NULL COLLATE \'utf8_unicode_ci\',
	`amount` FLOAT NULL COLLATE \'utf8_unicode_ci\',
	PRIMARY KEY (`id`)
)',
  'sql_down' => 'DROP TABLE IF EXISTS inspection_meta;',
  'has_data' => false,
  'date' => 1363082797,
)?>