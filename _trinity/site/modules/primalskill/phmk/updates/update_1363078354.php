<?php return array (
  'name' => 'Adding price column to work order',
  'description' => '',
  'sql_up' => 'ALTER TABLE `work_orders`
	ADD COLUMN `price` FLOAT UNSIGNED NULL DEFAULT NULL AFTER `is_expert_inspector`;
',
  'sql_down' => 'ALTER TABLE `work_orders`
	DROP COLUMN `price`;
',
  'has_data' => false,
  'date' => 1363078354,
)?>