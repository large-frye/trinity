<?php return array (
  'name' => 'Full categories table with data',
  'description' => '',
  'sql_up' => '-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.24-0ubuntu0.12.04.1 - (Ubuntu)
-- Server OS:                    debian-linux-gnu
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2013-03-11 11:34:51
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping structure for table trinity.categories
DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned DEFAULT \'0\',
  `name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table trinity.categories: ~77 rows (approximately)
DELETE FROM `categories`;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `parent_id`, `name`, `slug`) VALUES
	(1, 0, \'Dwelling Pictures\', \'dwelling-pictures\'),
	(3, 1, \'Front of Risk\', \'front-of-risk\'),
	(4, 0, \'Exterior pics\', \'exterior-pics\'),
	(5, 0, \'Roof pics\', \'roof-pics\'),
	(6, 0, \'Hail &amp; Wind damage Pics\', \'hail-amp-wind-damage-pics\'),
	(7, 0, \'What the Roofer was calling hail\', \'what-the-roofer-was-calling-hail\'),
	(8, 1, \'Right side of risk\', \'right-side-of-risk\'),
	(9, 1, \'Left side of risk\', \'left-side-of-risk\'),
	(10, 1, \'Rear of risk\', \'rear-of-risk\'),
	(11, 1, \'Detached garage\', \'detached-garage\'),
	(12, 1, \'Shed\', \'shed\'),
	(13, 1, \'Carport\', \'carport\'),
	(14, 1, \'Additional detached structure\', \'additional-detached-structure\'),
	(15, 4, \'Downspout - no storm damage\', \'downspout-no-storm-damage\'),
	(16, 4, \'Downspout - windblown\', \'downspout-windblown\'),
	(17, 4, \'Downspout - cosmetic hail dents\', \'downspout-cosmetic-hail-dents\'),
	(18, 4, \'Window screen - hail damaged\', \'window-screen-hail-damaged\'),
	(19, 4, \'Window screen - no damage\', \'window-screen-no-damage\'),
	(20, 4, \'Siding - windblown\', \'siding-windblown\'),
	(21, 4, \'Siding - hail damage\', \'siding-hail-damage\'),
	(22, 4, \'Soffit - windblown\', \'soffit-windblown\'),
	(23, 4, \'Aluminum trim - windblown\', \'aluminum-trim-windblown\'),
	(24, 4, \'Aluminum trim - cosmetic hail dents\', \'aluminum-trim-cosmetic-hail-dents\'),
	(25, 4, \'Gutters -  no damage\', \'gutters-no-damage\'),
	(26, 4, \'Gutters - windblown\', \'gutters-windblown\'),
	(27, 4, \'Gutters - cosmetic hail dents\', \'gutters-cosmetic-hail-dents\'),
	(28, 4, \'Gutterguards - no damage\', \'gutterguards-no-damage\'),
	(29, 4, \'Gutterguards - windblown\', \'gutterguards-windblown\'),
	(30, 4, \'Gutterguards - cosmetic hail dents\', \'gutterguards-cosmetic-hail-dents\'),
	(31, 4, \'Cosmetic hail dents\', \'cosmetic-hail-dents\'),
	(32, 4, \'Hail damaged\', \'hail-damaged\'),
	(33, 4, \'No damage\', \'no-damage\'),
	(34, 4, \'Windblown\', \'windblown\'),
	(35, 4, \'Spatter - hail size indicator\', \'spatter-hail-size-indicator\'),
	(36, 5, \'Layers\', \'layers\'),
	(37, 5, \'Underlayment\', \'underlayment\'),
	(38, 5, \'Drip edge\', \'drip-edge\'),
	(39, 5, \'Rake edge\', \'rake-edge\'),
	(40, 5, \'Roofing material\', \'roofing-material\'),
	(41, 5, \'Nailing pattern - shows roof is pliable for repairs\', \'nailing-pattern-shows-roof-is-pliable-for-repairs\'),
	(42, 5, \'Pitch gauge\', \'pitch-gauge\'),
	(43, 5, \'Overview of roof\', \'overview-of-roof\'),
	(44, 5, \'Pipe vent flashing - no water intrusion concern\', \'pipe-vent-flashing-no-water-intrusion-concern\'),
	(45, 5, \'Pipe vent flashing - water intrusion concern\', \'pipe-vent-flashing-water-intrusion-concern\'),
	(46, 5, \'Square vent - no cosmetic hail dents\', \'square-vent-no-cosmetic-hail-dents\'),
	(47, 5, \'Square vent - cosmetic hail dents\', \'square-vent-cosmetic-hail-dents\'),
	(48, 5, \'Heat vent - no cosmetic hail dents\', \'heat-vent-no-cosmetic-hail-dents\'),
	(49, 5, \'Heat vent - cosmetic hail dents\', \'heat-vent-cosmetic-hail-dents\'),
	(50, 5, \'Satellite\', \'satellite\'),
	(51, 5, \'Satellite - windblown\', \'satellite-windblown\'),
	(52, 5, \'Power vent - no cosmetic hail dents\', \'power-vent-no-cosmetic-hail-dents\'),
	(53, 5, \'Power vent - cosmetic hail dents\', \'power-vent-cosmetic-hail-dents\'),
	(54, 5, \'Skylight - no cosmetic hail dents\', \'skylight-no-cosmetic-hail-dents\'),
	(55, 5, \'Skylight - cosmetic hail dents\', \'skylight-cosmetic-hail-dents\'),
	(56, 5, \'Turbine - no cosmetic hail dents\', \'turbine-no-cosmetic-hail-dents\'),
	(57, 5, \'Turbine - cosmetic hail dents\', \'turbine-cosmetic-hail-dents\'),
	(58, 5, \'Aluminum ridge vent - no cosmetic hail dents\', \'aluminum-ridge-vent-no-cosmetic-hail-dents\'),
	(59, 5, \'Aluminum ridge vent - cosmetic hail dents\', \'aluminum-ridge-vent-cosmetic-hail-dents\'),
	(60, 5, \'Ridge cap - no damage\', \'ridge-cap-no-damage\'),
	(61, 6, \'Hail test square close-up\', \'hail-test-square-close-up\'),
	(62, 6, \'Hail test square overview\', \'hail-test-square-overview\'),
	(63, 6, \'Hail damaged shingle\', \'hail-damaged-shingle\'),
	(64, 6, \'Wind damaged shingle(s)\', \'wind-damaged-shingle-s-\'),
	(65, 6, \'Wind damaged membrane roofing\', \'wind-damaged-membrane-roofing\'),
	(66, 6, \'Hail damaged\', \'hail-damaged-1\'),
	(67, 6, \'Wind damaged\', \'wind-damaged\'),
	(68, 0, \'Mechanical Damage Photos\', \'mechanical-damage-photos\'),
	(69, 68, \'Mechanically damaged shingle(s)\', \'mechanically-damaged-shingle-s-\'),
	(70, 68, \'Mechanically damaged ridgevent\', \'mechanically-damaged-ridgevent\'),
	(71, 68, \'Debris still present beneath shingle\', \'debris-still-present-beneath-shingle\'),
	(72, 68, \'Failed attempt\', \'failed-attempt\'),
	(73, 68, \'Center weighted crease\', \'center-weighted-crease\'),
	(74, 68, \'Mid height crease\', \'mid-height-crease\'),
	(75, 0, \'Interior Assessment Photos\', \'interior-assessment-photos\'),
	(76, 75, \'Interior room\', \'interior-room\'),
	(77, 75, \'Interior staining\', \'interior-staining\'),
	(78, 75, \'Interior room sketch\', \'interior-room-sketch\');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
',
  'sql_down' => 'DROP TABLE IF EXISTS `categories`;',
  'has_data' => true,
  'date' => 1362994517,
)?>