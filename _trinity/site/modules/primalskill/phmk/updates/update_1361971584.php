<?php return array (
  'name' => 'Workorders is_expert column',
  'description' => '',
  'sql_up' => 'ALTER TABLE `work_orders`
	ADD COLUMN `is_expert` TINYINT UNSIGNED NULL DEFAULT NULL AFTER `created_on_utc`;',
  'sql_down' => 'ALTER TABLE `work_orders`
	DROP COLUMN `is_expert` TINYINT',
  'has_data' => false,
  'date' => 1361971584,
)?>