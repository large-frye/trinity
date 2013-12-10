<?php return array (
  'name' => 'inspection photos table',
  'description' => '',
  'sql_up' => 'CREATE TABLE `inspection_photos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `workorder_id` bigint(20) unsigned NOT NULL,
  `original_name` text NOT NULL,
  `filename` text NOT NULL,
  `thumbnail_filename` text NOT NULL,
  `mime` varchar(200) NOT NULL DEFAULT \'\',
  `error` text NOT NULL,
  `published` tinyint(1) DEFAULT \'0\',
  `description` text,
  `category_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `workorder_id` (`workorder_id`),
  CONSTRAINT `inspection_photos_ibfk_1` FOREIGN KEY (`workorder_id`) REFERENCES `work_orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;',
  'sql_down' => 'DROP TABLE `inspection_photos`;',
  'has_data' => false,
  'date' => 1364975273,
)?>