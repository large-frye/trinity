<?php return array (
  'name' => 'Table forgot password codes',
  'description' => '',
  'sql_up' => 'CREATE TABLE `users_password_codes` (
	`user_id` VARCHAR(20) NULL DEFAULT NULL,
	`code` VARCHAR(200) NULL DEFAULT NULL
)
COLLATE=\'utf8_unicode_ci\'
ENGINE=InnoDB;',
  'sql_down' => 'DROP TABLE IF EXISTS `users_password_codes` ;',
  'has_data' => false,
  'date' => 1361284845,
)?>