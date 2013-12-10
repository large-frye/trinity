<?php return array (
  'name' => 'Sketches - Sketch',
  'description' => '',
  'sql_up' => 'INSERT INTO `categories` (`name`, `slug`) VALUES (\'Sketches\', \'sketches\');
CREATE TABLE `tmp`(`a` INT);
INSERT INTO `tmp`  SELECT id FROM `categories` WHERE slug=\'sketches\';
INSERT INTO `categories` (`name`, `slug`, `parent_id`) VALUES (\'Sketch\', \'sketch\', (SELECT `a` FROM `tmp` LIMIT 1));',
  'sql_down' => 'DELETE FROM `categories`  WHERE `slug` = \'sketches\';
DELETE FROM `categories`  WHERE `slug` = \'sketch\';',
  'has_data' => true,
  'date' => 1366973327,
)?>