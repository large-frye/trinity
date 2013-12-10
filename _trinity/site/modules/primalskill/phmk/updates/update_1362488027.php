<?php return array (
  'name' => 'Getting rid of inspections table',
  'description' => '',
  'sql_up' => 'ALTER TABLE `inspection_meta`
	CHANGE COLUMN `inspection_id` `workorder_id` INT(10) UNSIGNED NULL DEFAULT NULL AFTER `id`;

ALTER TABLE `estimates`
	CHANGE COLUMN `inspection_id` `workorder_id` BIGINT UNSIGNED NULL DEFAULT NULL AFTER `id`,
	DROP FOREIGN KEY `estimates_to_inspections`;
	
DROP TABLE IF EXISTS inspections;',
  'sql_down' => 'ALTER TABLE `inspection_meta`
	CHANGE COLUMN `workorder_id` `inspection_id` INT(10) UNSIGNED NULL DEFAULT NULL AFTER `id`;

ALTER TABLE `estimates`
	CHANGE COLUMN `workorder_id` `inspection_id` BIGINT UNSIGNED NULL DEFAULT NULL AFTER `id`;',
  'has_data' => false,
  'date' => 1362488027,
)?>