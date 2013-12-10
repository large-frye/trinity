<?php return array (
  'name' => 'Auth',
  'description' => '',
  'sql_up' => '-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.24-0ubuntu0.12.04.1 - (Ubuntu)
-- Server OS:                    debian-linux-gnu
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2012-09-04 12:36:20
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping database structure for trinity
DROP DATABASE IF EXISTS `trinity`;
CREATE DATABASE IF NOT EXISTS `trinity` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `trinity`;


-- Dumping structure for table trinity.auth_permissions
DROP TABLE IF EXISTS `auth_permissions`;
CREATE TABLE IF NOT EXISTS `auth_permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `variable` varchar(200) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `variable` (`variable`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;


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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table trinity.auth_roles: ~2 rows (approximately)
DELETE FROM `auth_roles`;
/*!40000 ALTER TABLE `auth_roles` DISABLE KEYS */;
INSERT INTO `auth_roles` (`id`, `code`, `name`, `type`) VALUES
	(1, \'admin\', \'Administrator\', 3),
	(2, \'inspector\', \'Inspector\', 3),
	(3, \'client\', \'Client\', 3);
/*!40000 ALTER TABLE `auth_roles` ENABLE KEYS */;


-- Dumping structure for table trinity.auth_roles_permissions
DROP TABLE IF EXISTS `auth_roles_permissions`;
CREATE TABLE IF NOT EXISTS `auth_roles_permissions` (
  `role_id` bigint(20) unsigned DEFAULT NULL,
  `permission_id` bigint(20) unsigned DEFAULT NULL,
  UNIQUE KEY `role_id` (`role_id`,`permission_id`),
  KEY `permission_id` (`permission_id`),
  CONSTRAINT `auth_roles_permissions_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `auth_roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_roles_permissions_ibfk_2` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping structure for table trinity.auth_roles_users
DROP TABLE IF EXISTS `auth_roles_users`;
CREATE TABLE IF NOT EXISTS `auth_roles_users` (
  `role_id` bigint(20) unsigned DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  UNIQUE KEY `role_id` (`role_id`,`user_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `auth_roles_users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `auth_roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_roles_users_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `auth_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table trinity.auth_roles_users: ~3 rows (approximately)
DELETE FROM `auth_roles_users`;
/*!40000 ALTER TABLE `auth_roles_users` DISABLE KEYS */;
INSERT INTO `auth_roles_users` (`role_id`, `user_id`) VALUES
	(1, 25);
/*!40000 ALTER TABLE `auth_roles_users` ENABLE KEYS */;


-- Dumping structure for table trinity.auth_users
DROP TABLE IF EXISTS `auth_users`;
CREATE TABLE IF NOT EXISTS `auth_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `pw_salt` varchar(64) DEFAULT NULL,
  `created_on_utc` datetime NOT NULL,
  `modified_on_utc` datetime NOT NULL,
  `session_id` varchar(24) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `activation_code` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- Dumping data for table trinity.auth_users: ~2 rows (approximately)
DELETE FROM `auth_users`;
/*!40000 ALTER TABLE `auth_users` DISABLE KEYS */;
INSERT INTO `auth_users` (`id`, `username`, `password`, `pw_salt`, `created_on_utc`, `modified_on_utc`, `session_id`, `email`, `activation_code`) VALUES
	(1, \'admin\', \'a895a8714acd5d7733fea57604df586bfdb6b829758aa8998dfe412a63be0bcf\', \'d2cec050bfd25b93c19f3f585319761dd441bafb02df552546b947476d5bfed0\', \'2012-04-02 02:06:00\', \'2012-08-21 08:04:00\', \'5040b5d361dad4-55411355\', \'attilaf@primalskill.com\', \'1\');
/*!40000 ALTER TABLE `auth_users` ENABLE KEYS */;


-- Dumping structure for table trinity.sessions
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `session_id` varchar(24) COLLATE utf8_unicode_ci NOT NULL,
  `last_active` int(10) unsigned NOT NULL,
  `contents` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_active` (`last_active`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
',
  'sql_down' => 'DROP DATABASE IF EXISTS `trinity`; CREATE DATABASE `trinity` /*!40100 CHARACTER SET utf8 COLLATE \'utf8_unicode_ci\' */',
  'has_data' => true,
  'date' => 1360145355,
)?>