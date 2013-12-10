<?php return array (
  'name' => 'Insurance company for clients.',
  'description' => '',
  'sql_up' => 'ALTER TABLE `user_profiles`
	ADD COLUMN `insurance_company` VARCHAR(250) NULL DEFAULT NULL AFTER `geographic_region`;',
  'sql_down' => 'ALTER TABLE `user_profiles`
	DROP COLUMN `insurance_company`;',
  'has_data' => false,
  'date' => 1366810127,
)?>