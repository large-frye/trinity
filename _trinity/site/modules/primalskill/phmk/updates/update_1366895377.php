<?php return array (
  'name' => 'Generating pdf - Data',
  'description' => '',
  'sql_up' => 'ALTER TABLE `work_orders`
	ADD COLUMN `last_generated` DATETIME NULL DEFAULT NULL AFTER `is_generated_pdf`,
	ADD COLUMN `generate_report_status` VARCHAR(30) NULL DEFAULT NULL AFTER `last_generated`;',
  'sql_down' => 'ALTER TABLE `work_orders`
	DROP COLUMN `last_generated`,
	DROP COLUMN `generate_report_status`;',
  'has_data' => false,
  'date' => 1366895377,
)?>