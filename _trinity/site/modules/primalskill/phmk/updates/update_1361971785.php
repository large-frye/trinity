<?php return array (
  'name' => 'Inspections table is expert column',
  'description' => '',
  'sql_up' => 'ALTER TABLE `inspections`
	ADD COLUMN `is_expert_inspector` TINYINT NULL DEFAULT NULL AFTER `status`;',
  'sql_down' => 'ALTER TABLE `inspections`
	DROP COLUMN `is_expert_inspector`',
  'has_data' => false,
  'date' => 1361971785,
)?>