<?php return array (
  'name' => 'Status field in work_orders table',
  'description' => '',
  'sql_up' => 'ALTER TABLE `work_orders`
	ADD COLUMN `status` INT NOT NULL DEFAULT \'1\' AFTER `special_instructions`,
	ADD COLUMN `inspector_id` BIGINT(20) UNSIGNED NULL DEFAULT NULL AFTER `status`;',
  'sql_down' => 'ALTER TABLE `work_orders`
	DROP COLUMN `status`,
	DROP COLUMN `inspector_id`;',
  'has_data' => false,
  'date' => 1362475071,
)?>