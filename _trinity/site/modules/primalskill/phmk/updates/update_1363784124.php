<?php return array (
  'name' => 'Roles',
  'description' => '',
  'sql_up' => '-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.24-0ubuntu0.12.04.1 - (Ubuntu)
-- Server OS:                    debian-linux-gnu
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2013-03-20 14:53:40
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping structure for table trinity.auth_roles
DROP TABLE IF EXISTS `auth_roles`;
CREATE TABLE IF NOT EXISTS `auth_roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(100) DEFAULT NULL,
  `name` varchar(170) DEFAULT NULL,
  `type` tinyint(2) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table trinity.auth_roles: ~4 rows (approximately)
DELETE FROM `auth_roles`;
/*!40000 ALTER TABLE `auth_roles` DISABLE KEYS */;
INSERT INTO `auth_roles` (`id`, `code`, `name`, `type`) VALUES
	(1, \'superadmin\', \'Superadmin\', 1),
	(2, \'admin\', \'Admin\', 2),
	(3, \'inspector\', \'Inspector\', 2),
	(4, \'client\', \'Client\', 2);
/*!40000 ALTER TABLE `auth_roles` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
',
  'sql_down' => '-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.24-0ubuntu0.12.04.1 - (Ubuntu)
-- Server OS:                    debian-linux-gnu
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2013-03-20 14:53:40
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping structure for table trinity.auth_roles
DROP TABLE IF EXISTS `auth_roles`;
CREATE TABLE IF NOT EXISTS `auth_roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(100) DEFAULT NULL,
  `name` varchar(170) DEFAULT NULL,
  `type` tinyint(2) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table trinity.auth_roles: ~4 rows (approximately)
DELETE FROM `auth_roles`;
/*!40000 ALTER TABLE `auth_roles` DISABLE KEYS */;
INSERT INTO `auth_roles` (`id`, `code`, `name`, `type`) VALUES
	(1, \'superadmin\', \'Superadmin\', 1),
	(2, \'admin\', \'Admin\', 2),
	(3, \'inspector\', \'Inspector\', 2),
	(4, \'client\', \'Client\', 2);
/*!40000 ALTER TABLE `auth_roles` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
',
  'has_data' => true,
  'date' => 1363784124,
)?>