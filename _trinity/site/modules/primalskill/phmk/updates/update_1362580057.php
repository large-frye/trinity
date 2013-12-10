<?php return array (
  'name' => 'Inspection Statuses',
  'description' => '',
  'sql_up' => '-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.24-0ubuntu0.12.04.1 - (Ubuntu)
-- Server OS:                    debian-linux-gnu
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2013-03-06 16:26:14
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping structure for table trinity.inspection_statuses
DROP TABLE IF EXISTS `inspection_statuses`;
CREATE TABLE IF NOT EXISTS `inspection_statuses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table trinity.inspection_statuses: ~0 rows (approximately)
DELETE FROM `inspection_statuses`;
/*!40000 ALTER TABLE `inspection_statuses` DISABLE KEYS */;
INSERT INTO `inspection_statuses` (`id`, `name`) VALUES
	(1, \'In Progress\'),
	(2, \'On Hold\'),
	(3, \'Alert\'),
	(4, \'Complete\');
/*!40000 ALTER TABLE `inspection_statuses` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
',
  'sql_down' => 'DROP TABLE IF EXISTS `inspection_statuses`;',
  'has_data' => true,
  'date' => 1362580057,
)?>