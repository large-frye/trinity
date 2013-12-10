<?php return array (
  'name' => 'Workorders: Generated pdf column',
  'description' => '',
  'sql_up' => 'ALTER TABLE `work_orders`
	ADD COLUMN `is_generated_pdf` TINYINT(1) UNSIGNED NULL DEFAULT \'0\' AFTER `is_expert_inspector`;',
  'sql_down' => 'ALTER TABLE `work_orders`
	DROP COLUMN `is_generated_pdf;',
  'has_data' => true,
  'date' => 1363174323,
)?>