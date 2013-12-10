<?php return array (
  'name' => 'Time for inspection',
  'description' => '',
  'sql_up' => 'ALTER TABLE `work_orders`
	ADD COLUMN `time_of_inspection` TIME NULL DEFAULT NULL AFTER `date_of_inspection`;',
  'sql_down' => 'ALTER TABLE `work_orders`
	REMOVE COLUMN `time_of_inspection`;',
  'has_data' => false,
  'date' => 1365076073,
)?>