<?php return array (
  'name' => 'inspection photos - size for reports',
  'description' => '',
  'sql_up' => 'ALTER TABLE `inspection_photos`
	ADD COLUMN `report_filename` TEXT NOT NULL AFTER `thumbnail_filename`;',
  'sql_down' => 'ALTER TABLE `inspection_photos`
	REMOVE COLUMN `report_filename`',
  'has_data' => false,
  'date' => 1364988506,
)?>