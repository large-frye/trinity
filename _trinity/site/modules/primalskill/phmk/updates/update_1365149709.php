<?php return array (
  'name' => 'Changing work_orders table',
  'description' => '',
  'sql_up' => 'ALTER TABLE `work_orders`
	ADD COLUMN `policy_number` VARCHAR(250) NULL DEFAULT NULL AFTER `user_id`,
	CHANGE COLUMN `state` `state` VARCHAR(250) NULL DEFAULT NULL AFTER `city`,
	DROP COLUMN `address_2`,
	DROP COLUMN `inspection_address`,
	DROP COLUMN `inspection_address2`,
	DROP COLUMN `inspection_city`,
	DROP COLUMN `inspection_state`,
	DROP COLUMN `inspection_zip`,
	DROP COLUMN `how_many_stories`,
	DROP COLUMN `contact1_first_name`,
	DROP COLUMN `contact1_last_name`,
	DROP COLUMN `contact1_phone`,
	DROP COLUMN `contact2_first_name`,
	DROP COLUMN `contact2_last_name`,
	DROP COLUMN `contact2_phone`;',
  'sql_down' => ';',
  'has_data' => false,
  'date' => 1365149709,
)?>