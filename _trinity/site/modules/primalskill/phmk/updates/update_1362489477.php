<?php return array (
  'name' => 'Full workorders table',
  'description' => '',
  'sql_up' => '-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.24-0ubuntu0.12.04.1 - (Ubuntu)
-- Server OS:                    debian-linux-gnu
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2013-03-05 14:42:20
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping structure for table trinity.work_orders
DROP TABLE IF EXISTS `work_orders`;
CREATE TABLE IF NOT EXISTS `work_orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(4) DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `first_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `street_address` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_2` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  `zip` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone2` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_on_utc` datetime DEFAULT NULL,
  `is_expert` tinyint(1) unsigned DEFAULT NULL,
  `inspection_address` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `inspection_address2` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `inspection_city` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `inspection_state` int(11) DEFAULT NULL,
  `inspection_zip` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `damage_type` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_of_loss` date DEFAULT NULL,
  `tarped` tinyint(1) unsigned DEFAULT NULL,
  `how_many_stories` int(11) DEFAULT NULL,
  `estimate_scope_requirement` text COLLATE utf8_unicode_ci,
  `contact1_first_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact1_last_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact1_phone` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact2_first_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact2_last_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact2_phone` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `special_instructions` text COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL DEFAULT \'1\',
  `inspector_id` bigint(20) unsigned DEFAULT NULL,
  `inspection_status` int(11) NOT NULL DEFAULT \'1\',
  `date_of_inspection` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
',
  'sql_down' => 'DROP TABLE IF EXISTS `work_orders`;',
  'has_data' => false,
  'date' => 1362489477,
)?>