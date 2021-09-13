-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Apr 05, 2016 at 08:58 AM
-- Server version: 5.5.48-cll
-- PHP Version: 5.4.31

SET FOREIGN_KEY_CHECKS=0;
SET time_zone = "+05:30";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `grafix_jasapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `carraige`
--

CREATE TABLE IF NOT EXISTS `carraige` (
  `carriage_id` int(11) NOT NULL AUTO_INCREMENT,
  `carriage_h_mm` varchar(3) NOT NULL,
  `carriage_status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`carriage_id`),
  UNIQUE KEY `carriage_h_mm` (`carriage_h_mm`)
);

--
-- Truncate table before insert `carraige`
--

TRUNCATE TABLE `carraige`;
--
-- Dumping data for table `carraige`
--

INSERT INTO `carraige` (`carriage_id`, `carriage_h_mm`, `carriage_status`) VALUES
(1, '1', 1),
(2, '2', 1),
(3, '4', 1),
(4, '5', 1),
(5, '7', 1),
(6, '12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `client_id` int(3) NOT NULL AUTO_INCREMENT,
  `client_name` varchar(200) NOT NULL,
  UNIQUE KEY `client_id_2` (`client_id`),
  KEY `client_id` (`client_id`)
);

--
-- Truncate table before insert `clients`
--

TRUNCATE TABLE `clients`;
--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `client_name`) VALUES
(1, 'DFS');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE IF NOT EXISTS `color` (
  `color_id` int(11) NOT NULL AUTO_INCREMENT,
  `color_count` int(11) NOT NULL,
  `color_status` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`color_id`),
  UNIQUE KEY `color_count` (`color_count`)
);

--
-- Truncate table before insert `color`
--

TRUNCATE TABLE `color`;
--
-- Dumping data for table `color`
--

INSERT INTO `color` (`color_id`, `color_count`, `color_status`) VALUES
(1, 4, '1'),
(2, 6, '1'),
(3, 7, '1');

-- --------------------------------------------------------

--
-- Table structure for table `curing`
--

CREATE TABLE IF NOT EXISTS `curing` (
  `curing_id` int(11) NOT NULL AUTO_INCREMENT,
  `curing_label` varchar(50) NOT NULL,
  `curing_status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`curing_id`),
  UNIQUE KEY `curing_label` (`curing_label`)
);

--
-- Truncate table before insert `curing`
--

TRUNCATE TABLE `curing`;
--
-- Dumping data for table `curing`
--

INSERT INTO `curing` (`curing_id`, `curing_label`, `curing_status`) VALUES
(1, '35', 1),
(2, '55', 1),
(3, '65', 1),
(4, '75', 1),
(5, '100', 1),
(6, '35-45-55', 1),
(7, '40-45-55', 1),
(8, '35-50-55', 1),
(9, '40-50-55', 1),
(10, '45-55-55', 1),
(11, 'Heavy - Minimum', 1),
(12, 'Heavy - Low', 1),
(13, 'Heavy - Medium', 1),
(14, 'Heavy - High', 1),
(15, 'Light - Minimum', 1),
(16, 'Light - Low', 1),
(17, 'Light - Medium', 1),
(18, 'Light - High', 1);

-- --------------------------------------------------------

--
-- Table structure for table `density`
--

CREATE TABLE IF NOT EXISTS `density` (
  `density_id` int(3) NOT NULL AUTO_INCREMENT,
  `density_name` varchar(200) NOT NULL,
  PRIMARY KEY (`density_id`)
);

--
-- Truncate table before insert `density`
--

TRUNCATE TABLE `density`;
--
-- Dumping data for table `density`
--

INSERT INTO `density` (`density_id`, `density_name`) VALUES
(1, 'ND'),
(2, 'DD');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `jsid` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `created_on` timestamp NOT NULL,
  PRIMARY KEY (`jsid`),
  KEY `job_id` (`job_id`)
);

--
-- Truncate table before insert `jobs`
--

TRUNCATE TABLE `jobs`;
--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`jsid`, `job_id`, `client_id`, `created_on`) VALUES
(1, 280, 1, '2016-04-01 09:56:14'),
(2, 1, 1, '2016-04-01 10:48:46');

-- --------------------------------------------------------

--
-- Table structure for table `jobs_meta`
--

CREATE TABLE IF NOT EXISTS `jobs_meta` (
  `jmsid` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `rtl_id` int(11) NOT NULL,
  `prnt_type_id` int(11) NOT NULL,
  `prnt_size_w_mm` int(11) NOT NULL,
  `prnt_size_l_mm` varchar(50) NOT NULL,
  `prnt_size_w_in` varchar(50) NOT NULL,
  `prnt_size_l_in` varchar(50) NOT NULL,
  `prnt_size_sqft` varchar(50) NOT NULL,
  `no_copies` int(11) NOT NULL,
  `total_print_sqft` varchar(50) NOT NULL,
  `waste_size_w_mm` varchar(50) NOT NULL,
  `waste_size_l_mm` varchar(50) NOT NULL,
  `total_waste_sqft` varchar(50) NOT NULL,
  `media_brand_id` int(11) NOT NULL,
  `media_type_id` int(11) NOT NULL,
  `roll_number` int(11) NOT NULL,
  `platform_id` int(11) NOT NULL,
  `media_used_w_in` varchar(50) NOT NULL,
  `media_used_l_in` varchar(50) NOT NULL,
  `density_id` int(11) NOT NULL,
  `prnt_speed_id` int(11) NOT NULL,
  `prnt_mode_id` int(11) NOT NULL,
  `direction` varchar(10) NOT NULL,
  `prnt_qlty_id` int(11) NOT NULL,
  `carriage_id` int(11) NOT NULL,
  `station_id` int(11) NOT NULL,
  `pass_id` int(11) NOT NULL,
  `curing_id` int(11) NOT NULL,
  `shutter_mode_id` int(11) NOT NULL,
  `ink_used_rtl` int(11) NOT NULL,
  `prnt_time` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_media_w_ft` varchar(50) NOT NULL,
  `total_media_l_ft` varchar(50) NOT NULL,
  `total_media_used_sqft` varchar(50) NOT NULL,
  `total_media_waste_w` varchar(50) NOT NULL,
  `total_media_waste_h` varchar(50) NOT NULL,
  `total_media_waste_b` varchar(50) NOT NULL,
  `total_media_wastage_sqft` varchar(50) NOT NULL,
  `total_ink_used` varchar(50) NOT NULL,
  `total_prnt_time` int(11) NOT NULL,
  `job_date` date NOT NULL,
  `job_start_time` time NOT NULL,
  `job_end_time` time NOT NULL,
  `printer_id` int(11) NOT NULL,
  UNIQUE KEY `jmsid_3` (`jmsid`),
  KEY `job_id` (`job_id`),
  KEY `jmsid` (`jmsid`),
  KEY `jmsid_2` (`jmsid`),
  KEY `job_id_2` (`job_id`)
);

--
-- Truncate table before insert `jobs_meta`
--

TRUNCATE TABLE `jobs_meta`;
--
-- Dumping data for table `jobs_meta`
--

INSERT INTO `jobs_meta` (`jmsid`, `job_id`, `client_id`, `rtl_id`, `prnt_type_id`, `prnt_size_w_mm`, `prnt_size_l_mm`, `prnt_size_w_in`, `prnt_size_l_in`, `prnt_size_sqft`, `no_copies`, `total_print_sqft`, `waste_size_w_mm`, `waste_size_l_mm`, `total_waste_sqft`, `media_brand_id`, `media_type_id`, `roll_number`, `platform_id`, `media_used_w_in`, `media_used_l_in`, `density_id`, `prnt_speed_id`, `prnt_mode_id`, `direction`, `prnt_qlty_id`, `carriage_id`, `station_id`, `pass_id`, `curing_id`, `shutter_mode_id`, `ink_used_rtl`, `prnt_time`, `user_id`, `total_media_w_ft`, `total_media_l_ft`, `total_media_used_sqft`, `total_media_waste_w`, `total_media_waste_h`, `total_media_waste_b`, `total_media_wastage_sqft`, `total_ink_used`, `total_prnt_time`, `job_date`, `job_start_time`, `job_end_time`, `printer_id`) VALUES
(1, 99, 0, 0, 0, 0, '', '', '', '', 0, '', '', '', '', 0, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', 0, '0000-00-00', '00:00:00', '00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `machine`
--

CREATE TABLE IF NOT EXISTS `machine` (
  `machine_id` int(11) NOT NULL AUTO_INCREMENT,
  `machine_label` varchar(255) NOT NULL,
  `machine_status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`machine_id`),
  UNIQUE KEY `machine_label` (`machine_label`)
);

--
-- Truncate table before insert `machine`
--

TRUNCATE TABLE `machine`;
--
-- Dumping data for table `machine`
--

INSERT INTO `machine` (`machine_id`, `machine_label`, `machine_status`) VALUES
(1, 'QS 3200 Vutek', 1),
(2, 'VIRTU RS 25/48', 1),
(3, 'Siko M64s A', 1),
(4, 'Siko M64s B', 1);

-- --------------------------------------------------------

--
-- Table structure for table `media_brand`
--

CREATE TABLE IF NOT EXISTS `media_brand` (
  `media_brand_id` int(3) NOT NULL AUTO_INCREMENT,
  `media_brand_name` varchar(200) NOT NULL,
  `media_brand_status` int(1) DEFAULT '1',
  PRIMARY KEY (`media_brand_id`)
);

--
-- Truncate table before insert `media_brand`
--

TRUNCATE TABLE `media_brand`;
--
-- Dumping data for table `media_brand`
--

INSERT INTO `media_brand` (`media_brand_id`, `media_brand_name`, `media_brand_status`) VALUES
(1, '3M 8520 MATT LAMINATION', 1),
(2, '3M PII', 1),
(3, '3M PIII', 1),
(4, '3M PIV', 1),
(5, '3M 1110 - 10 MATT', 1),
(6, '3M 1110 - 20M BLACK BACK', 1),
(7, '3M 1220 - 114 GLOSS', 1),
(8, '3M 1220 - 114 MATT', 1),
(9, '3M 3630 - 20', 1),
(10, '3M 3650 - 114', 1),
(11, '3M 7725 - 20 MATT VINYLE', 1),
(12, '3M 7725 - 324 FROSTED', 1),
(13, '3M 8519 CLEAR', 1),
(14, '3M 8991 CLEAR', 1),
(15, '3M IJ 1110 - 20G BLACK BACK', 1),
(16, '3M IJ 1220G - 10 GLOSS', 1),
(17, '3M IJ 1220G - 10 MATT', 1),
(18, '3M IJ 180C WHITE', 1),
(19, '3M IJ 35C - 20 MATT', 1),
(20, '3M IJ 40 C - 10 R GLOSS', 1),
(21, '3M IJ 40 C - 20 R MATT', 1),
(22, '3M IJ 3352 WHITE', 1),
(23, '3M SC - 30 100 WHITE', 1),
(24, 'ARLON 3220 MATT LAMINATION', 1),
(25, 'ARLON 4570', 1),
(26, 'ARLON DPF 4560 GTX GLOSS', 1),
(27, 'ARLON DPF 4570', 1),
(28, 'ARLON DPF 500G CLEAR 100 MICRON', 1),
(29, 'ARLON DPF 540 G WHITE', 1),
(30, 'AVERY DOL 1100 DURABLE MATT', 1),
(31, 'AVERY DOL 2100 MATT LAM.', 1),
(32, 'AVERY FLEX', 1),
(33, 'AVERY GREY GOLD GLOSS WHITE', 1),
(34, 'AVERY MPI 1020 CLEAR/PREM/100TB', 1),
(35, 'AVERY MPI 6551 PWF (ONE WAY)', 1),
(36, 'CAMLINE CANVAS FINE', 1),
(37, 'CC SATIN 260 GSM', 1),
(38, 'HP - BACKLIT POLYESTER TRANSLITE FILM', 1),
(39, 'HP - PHOTOREALISTIC POSTER PAPER', 1),
(40, 'LINTEC LAG E - 2000ZC', 1),
(41, 'MAX ROYAL MAT VINYL LITE', 1),
(42, 'NOVASTAR S/A WALL CAVIAR - 374', 1),
(43, 'ONE WAY VISION FILM 016146 UV', 1),
(44, 'ONE WAY VISION NINGBO 016145 UV', 1),
(45, 'PVC RIGID SHEETS 2 MM', 1),
(46, 'PVC RIGID SHEETS 2.8 MM', 1),
(47, 'PVC RIGID SHEETS 5 MM', 1),
(48, 'PVC RIGID SHEETS 10 MM', 1),
(49, 'SKIN', 1),
(50, 'JUTE PRIMIUM', 1),
(51, 'TELA PINTURA FABRIC (JUTE) CANVAS', 1),
(52, 'TYVEK 1082', 1),
(53, 'VENTURA WINDOW FILM (2MIL CLEAR)', 1),
(54, 'WALL COVERING TRADEROUT WHITE', 1),
(55, 'YUPO SYNTETIC PAPER GRADE XAD 1062', 1),
(56, 'YUPO SYNTHETIC PAPER GRADE BLU 150', 1),
(57, 'YUPO SYNTHETIC PAPER GRADE XAD 1068', 1),
(58, 'HP Translite', 1),
(59, 'Arlon 500 MT White', 1);

-- --------------------------------------------------------

--
-- Table structure for table `media_group`
--

CREATE TABLE IF NOT EXISTS `media_group` (
  `media_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `media_group_label` varchar(200) NOT NULL,
  `media_group_status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`media_group_id`),
  UNIQUE KEY `media_group_label` (`media_group_label`)
);

--
-- Truncate table before insert `media_group`
--

TRUNCATE TABLE `media_group`;
--
-- Dumping data for table `media_group`
--

INSERT INTO `media_group` (`media_group_id`, `media_group_label`, `media_group_status`) VALUES
(1, 'Seiko ColorPainter M-64s - Jasras Gloss', 1),
(2, 'Seiko ColorPainter M-64s - Jasras Matte', 1),
(3, 'Seiko ColorPainter M-64s - High Density', 1),
(4, 'Jasras', 1);

-- --------------------------------------------------------

--
-- Table structure for table `media_type`
--

CREATE TABLE IF NOT EXISTS `media_type` (
  `media_type_id` int(3) NOT NULL AUTO_INCREMENT,
  `media_type_name` varchar(200) NOT NULL,
  `media_type_status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`media_type_id`)
);

--
-- Truncate table before insert `media_type`
--

TRUNCATE TABLE `media_type`;
--
-- Dumping data for table `media_type`
--

INSERT INTO `media_type` (`media_type_id`, `media_type_name`, `media_type_status`) VALUES
(1, '3M 8520 MATT LAMINATION', 1),
(2, '3M PII', 1),
(3, '3M PIII', 1),
(4, '3M PIV', 1),
(5, '3M 1110 - 10 MATT', 1),
(6, '3M 1110 - 20M BLACK BACK', 1),
(7, '3M 1220 - 114 GLOSS', 1),
(8, '3M 1220 - 114 MATT', 1),
(9, '3M 3630 - 20', 1),
(10, '3M 3650 - 114', 1),
(11, '3M 7725 - 20 MATT VINYLE', 1),
(12, '3M 7725 - 324 FROSTED', 1),
(13, '3M 8519 CLEAR', 1),
(14, '3M 8991 CLEAR', 1),
(15, '3M IJ 1110 - 20G BLACK BACK', 1),
(16, '3M IJ 1220G - 10 GLOSS', 1),
(17, '3M IJ 1220G - 10 MATT', 1),
(18, '3M IJ 180C WHITE', 1),
(19, '3M IJ 35C - 20 MATT', 1),
(20, '3M IJ 40 C - 10 R GLOSS', 1),
(21, '3M IJ 40 C - 20 R MATT', 1),
(22, '3M IJ 3352 WHITE', 1),
(23, '3M SC - 30 100 WHITE', 1),
(24, 'ARLON 3220 MATT LAMINATION', 1),
(25, 'ARLON 4570', 1),
(26, 'ARLON DPF 4560 GTX GLOSS', 1),
(27, 'ARLON DPF 4570', 1),
(28, 'ARLON DPF 500G CLEAR 100 MICRON', 1),
(29, 'ARLON DPF 540 G WHITE', 1),
(30, 'AVERY DOL 1100 DURABLE MATT', 1),
(31, 'AVERY DOL 2100 MATT LAM', 1),
(32, 'AVERY FLEX', 1),
(33, 'AVERY GREY GOLD GLOSS WHITE', 1),
(34, 'AVERY MPI 1020 CLEAR/PREM/100TB', 1),
(35, 'AVERY MPI 6551 PWF (ONE WAY)', 1),
(36, 'CAMLINE CANVAS FINE', 1),
(37, 'CC SATIN 260 GSM', 1),
(38, 'HP - BACKLIT POLYESTER TRANSLITE FILM', 1),
(39, 'HP PHOTOREALISTIC POSTER PAPER', 1),
(40, 'LINTEC LAG E-2000ZC', 1),
(41, 'MAX ROYAL MAT VINYL LITE', 1),
(42, 'NOVASTAR S/A WALL CAVIAR-374', 1),
(43, 'ONE WAY VISION FILM 016146UV', 1),
(44, 'ONE WAY VISION NINGBO 016145UV', 1),
(45, 'PVC RIGID SHEETS - 2 MM', 1),
(46, 'PVC RIGID SHEETS - 2.8 MM', 1),
(47, 'PVC RIGID SHEETS - 5 MM', 1),
(48, 'PVC RIGID SHEETS - 10 MM', 1),
(49, 'SKIN', 1),
(50, 'JUTE PRIMIUM', 1),
(51, 'TELA PINTURA FABRIC (JUTE) CANVAS', 1),
(52, 'TYVEK 1082', 1),
(53, 'VENTURA WINDOW FILM (2MIL CLEAR)', 1),
(54, 'WALL COVERING TRADEROUT WHITE', 1),
(55, 'YUPO SYNTETIC PAPER GRADE XAD1062', 1),
(56, 'YUPO SYNTHETIC PAPER GRADE BLU150', 1),
(57, 'YUPO SYNTHETIC PAPER GRADE XAD 1068', 1),
(58, '3M ', 1),
(59, 'Arlon', 1),
(60, 'HP', 1);

-- --------------------------------------------------------

--
-- Table structure for table `passes`
--

CREATE TABLE IF NOT EXISTS `passes` (
  `pass_id` int(11) NOT NULL AUTO_INCREMENT,
  `pass_label` int(1) NOT NULL,
  `pass_status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`pass_id`),
  UNIQUE KEY `pass_label` (`pass_label`)
);

--
-- Truncate table before insert `passes`
--

TRUNCATE TABLE `passes`;
--
-- Dumping data for table `passes`
--

INSERT INTO `passes` (`pass_id`, `pass_label`, `pass_status`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `platform`
--

CREATE TABLE IF NOT EXISTS `platform` (
  `platform_id` int(3) NOT NULL AUTO_INCREMENT,
  `platform_type_name` varchar(200) NOT NULL,
  PRIMARY KEY (`platform_id`)
);

--
-- Truncate table before insert `platform`
--

TRUNCATE TABLE `platform`;
--
-- Dumping data for table `platform`
--

INSERT INTO `platform` (`platform_id`, `platform_type_name`) VALUES
(1, 'Rigid'),
(2, 'Flexi');

-- --------------------------------------------------------

--
-- Table structure for table `print_mode`
--

CREATE TABLE IF NOT EXISTS `print_mode` (
  `prnt_mode_id` int(3) NOT NULL AUTO_INCREMENT,
  `prnt_mode_name` varchar(200) NOT NULL,
  `prnt_mode_status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`prnt_mode_id`)
);

--
-- Truncate table before insert `print_mode`
--

TRUNCATE TABLE `print_mode`;
--
-- Dumping data for table `print_mode`
--

INSERT INTO `print_mode` (`prnt_mode_id`, `prnt_mode_name`, `prnt_mode_status`) VALUES
(1, 'XY', 1),
(2, 'HYBRID', 1),
(3, 'ROLL - ROLL', 1),
(4, 'FAST PRODUCTION', 1),
(5, 'PRODUCTION', 1),
(6, 'STANDARED', 1),
(7, 'QUALITY', 1),
(8, 'HIGH QUALITY', 1),
(9, 'HIGH QUALITY - HIGH DENSITY', 1);

-- --------------------------------------------------------

--
-- Table structure for table `print_quality`
--

CREATE TABLE IF NOT EXISTS `print_quality` (
  `prnt_qlty_id` int(3) NOT NULL AUTO_INCREMENT,
  `prnt_qlty_name` varchar(200) NOT NULL,
  `prnt_qlty_status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`prnt_qlty_id`)
);

--
-- Truncate table before insert `print_quality`
--

TRUNCATE TABLE `print_quality`;
--
-- Dumping data for table `print_quality`
--

INSERT INTO `print_quality` (`prnt_qlty_id`, `prnt_qlty_name`, `prnt_qlty_status`) VALUES
(1, '540 dpi', 1),
(2, '1080 dpi', 1),
(3, '360 x 540', 1),
(4, '360 x 1080', 1),
(5, '508 x 500', 1),
(6, '635 x 700', 1),
(7, '726 x 900', 1),
(8, '726 x 1200', 1),
(9, '1016 x 1200', 1),
(10, 'Jasra Matte 3M matte', 1),
(11, 'jasra High Density', 1);

-- --------------------------------------------------------

--
-- Table structure for table `print_speed`
--

CREATE TABLE IF NOT EXISTS `print_speed` (
  `prnt_speed_id` int(11) NOT NULL AUTO_INCREMENT,
  `prnt_speed_label` varchar(50) NOT NULL,
  `prnt_speed_status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`prnt_speed_id`),
  UNIQUE KEY `prnt_speed_label` (`prnt_speed_label`)
);

--
-- Truncate table before insert `print_speed`
--

TRUNCATE TABLE `print_speed`;
--
-- Dumping data for table `print_speed`
--

INSERT INTO `print_speed` (`prnt_speed_id`, `prnt_speed_label`, `prnt_speed_status`) VALUES
(1, '4', 1),
(2, '6', 1),
(3, '8', 1),
(4, '10', 1),
(5, '12', 1),
(6, '15', 1),
(7, '18', 1),
(8, '20', 1),
(9, 'HEAVY', 1),
(10, 'LIGHT', 1);

-- --------------------------------------------------------

--
-- Table structure for table `print_type`
--

CREATE TABLE IF NOT EXISTS `print_type` (
  `prnt_type_id` int(3) NOT NULL AUTO_INCREMENT,
  `prnt_type_name` varchar(200) NOT NULL,
  PRIMARY KEY (`prnt_type_id`)
);

--
-- Truncate table before insert `print_type`
--

TRUNCATE TABLE `print_type`;
--
-- Dumping data for table `print_type`
--

INSERT INTO `print_type` (`prnt_type_id`, `prnt_type_name`) VALUES
(1, 'Sample'),
(2, 'Test'),
(3, 'Print'),
(4, 'Cancel');

-- --------------------------------------------------------

--
-- Table structure for table `profile_env`
--

CREATE TABLE IF NOT EXISTS `profile_env` (
  `profile_id` int(11) NOT NULL AUTO_INCREMENT,
  `profile_label` text NOT NULL,
  `profile_status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`profile_id`)
);

--
-- Truncate table before insert `profile_env`
--

TRUNCATE TABLE `profile_env`;
--
-- Dumping data for table `profile_env`
--

INSERT INTO `profile_env` (`profile_id`, `profile_label`, `profile_status`) VALUES
(1, 'Virtu-RS25_Vinyl_1110_700_Aug_2015_260280116', 1),
(2, 'QS3200_Camlin_canvas_1080_apr_2015280116', 1),
(3, 'QS3200_Camlin_canvas_540_sep_2015_330280116', 1),
(4, 'QS3200_Panorama_canvas_540_jun_2015_330280116', 1),
(5, 'QS3200_Linen_540_jun_2015_330280116', 1),
(6, 'Virtu-RS25_Camlin_canvas_900_sep_2015_260280116', 1),
(7, 'QS3200_Vinyl_1110__540_apr_400_2015_more_black280116', 1),
(8, 'QS3200_New_canvas_540_sep_2015280116', 1),
(9, 'QS3200_Vinyl_1110__540_apr_340_2015280116', 1),
(10, 'QS3200_Star_wall_cover_1080_may_2015_280280116', 1),
(11, 'QS3200_Linen_1080_may_2015_280280116', 1),
(12, 'QS3200_Panorama_canvas_1080_apr_2015280116', 1),
(13, 'Virtu-RS25_Vinyl_1110_500_jun_2015__330280116', 1),
(14, 'Virtu-RS25_Vinyl_1110_1200_jul_2015_260280116', 1),
(15, 'Virtu-RS25_Vinyl_1110_700_oct_2015_260280116', 1),
(16, 'QS3200_Vinyl_1110_1080_apr_2015_280280116', 1),
(17, 'QS3200_Vinyl_1110__540_apr_400_2015280116', 1),
(18, 'Virtu-RS25_Vinyl_1110_700_oct_2015_more_bk280116', 1),
(19, 'Virtu-RS25_Vinyl__180c_dec_260_2015280116', 1),
(20, '1110 900 more col', 1),
(21, '1110 gloss 900', 1),
(22, '1110 max col', 1),
(23, '3m 1110 720', 1),
(24, '3m 1110 gloss', 1),
(25, 'arlon gloss', 1),
(26, 'arlon gloss 720', 1),
(27, 'ij 180 c', 1),
(28, 'leather', 1),
(29, '3m matte', 1),
(30, '3m acc matte', 1),
(31, 'ij 35c matte', 1),
(32, 'max matte new', 1),
(33, '3m gloss sav', 1),
(34, 'Backlit banner', 1),
(35, 'photo Relastic paper', 1),
(36, '1110 720 high density', 1),
(37, '1110 9000 hd', 1),
(38, 'ICICI Bank_Vinyl GLOW 2014 new', 1),
(39, 'JASRAS_QS_1080 NOV 2015', 1),
(40, 'NEW CANVAS OCT 540 2015', 1),
(41, 'Polyfab canvas 540 oct 2015', 1),
(42, 'PANORAMA CANVAS 540 OCT 2015', 1),
(43, 'Ventura clear oct 540 2015', 1),
(44, 'CAMLIN CANVAS OCT 1080 2015', 1),
(45, 'CAMLIN CANVAS OCT 540 2015', 1),
(46, 'PICA CANVAS OCT 540 2015', 1),
(47, 'JASRAS_QS_ORIG NEW 2015', 1),
(48, 'JASRAS_QS_ORIG NEW 2012', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rip_station`
--

CREATE TABLE IF NOT EXISTS `rip_station` (
  `station_id` int(11) NOT NULL AUTO_INCREMENT,
  `station_label` varchar(150) NOT NULL,
  `station_status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`station_id`),
  UNIQUE KEY `station_label` (`station_label`)
);

--
-- Truncate table before insert `rip_station`
--

TRUNCATE TABLE `rip_station`;
--
-- Dumping data for table `rip_station`
--

INSERT INTO `rip_station` (`station_id`, `station_label`, `station_status`) VALUES
(1, 'COLOURBRUST', 1),
(2, 'CALDERA', 1),
(3, 'PRODUCTION HOUSE', 1),
(4, 'EFI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rtlname`
--

CREATE TABLE IF NOT EXISTS `rtlname` (
  `rtl_id` int(11) NOT NULL AUTO_INCREMENT,
  `rtl_name` varchar(200) NOT NULL,
  `rtl_desc` text NOT NULL,
  `rtl_status` int(1) NOT NULL DEFAULT '1',
  `created_on` timestamp NOT NULL,
  PRIMARY KEY (`rtl_id`),
  UNIQUE KEY `rtl_name` (`rtl_name`)
);

--
-- Truncate table before insert `rtlname`
--

TRUNCATE TABLE `rtlname`;
--
-- Dumping data for table `rtlname`
--

INSERT INTO `rtlname` (`rtl_id`, `rtl_name`, `rtl_desc`, `rtl_status`, `created_on`) VALUES
(1, '751-AVA-1  [17UPS]', '', 1, '2015-12-13 15:05:16'),
(2, '447-A-12800X2800-A', '', 1, '2015-12-13 15:05:16'),
(3, 'ACC-B- 72X36', '', 1, '2015-12-13 15:05:33'),
(7, '447-A-12800X2800-B', '', 1, '2015-12-15 12:25:59'),
(8, '447-A-12800X2800-C', '', 1, '2015-12-15 12:26:30'),
(9, '447-A-12800X2800-D', 'some text...', 1, '2015-12-15 12:26:58'),
(10, '280_Arr piller tob sav april 3261 x 1815', '', 1, '2016-04-01 10:04:36'),
(11, '280_DUMP T500 x 600April 16 sav', '', 1, '2016-04-01 10:14:44');

-- --------------------------------------------------------

--
-- Table structure for table `shutter_mode`
--

CREATE TABLE IF NOT EXISTS `shutter_mode` (
  `shutter_mode_id` int(3) NOT NULL AUTO_INCREMENT,
  `shutter_mode_name` varchar(200) NOT NULL,
  PRIMARY KEY (`shutter_mode_id`)
);

--
-- Truncate table before insert `shutter_mode`
--

TRUNCATE TABLE `shutter_mode`;
--
-- Dumping data for table `shutter_mode`
--

INSERT INTO `shutter_mode` (`shutter_mode_id`, `shutter_mode_name`) VALUES
(1, 'Leading'),
(2, 'Trailing'),
(3, 'Leading & Trailing'),
(4, 'Singal'),
(5, 'Dubble'),
(6, 'Post'),
(7, 'fast production'),
(8, 'production'),
(9, 'standered'),
(10, 'Quality'),
(11, 'Max Quality');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `uid` int(9) NOT NULL AUTO_INCREMENT,
  `loginid` varchar(15) NOT NULL,
  `password` varchar(128) NOT NULL,
  `user_type` set('admin','client','staff') NOT NULL DEFAULT 'client',
  `fullname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `active` set('yes','no') NOT NULL DEFAULT 'yes',
  `last_login` datetime NOT NULL,
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`loginid`)
);

--
-- Truncate table before insert `user`
--

TRUNCATE TABLE `user`;
--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `loginid`, `password`, `user_type`, `fullname`, `email`, `active`, `last_login`, `created_on`) VALUES
(1, 'imran', '74d91c557471ae2be44157b3ae7e93f2f26fe67427b6ce91894ebf4f325f90e8', 'admin', 'Sayed Imran', 'millw0rm@gmail.com', 'yes', '2016-02-19 23:07:47', '2015-11-16 04:15:36'),
(3, 'demo', '74d91c557471ae2be44157b3ae7e93f2f26fe67427b6ce91894ebf4f325f90e8', 'admin', 'Demo', 'demo@demo.com', 'yes', '2016-04-04 10:19:13', '2015-11-20 04:46:03'),
(4, 'sachinmehta', '74d91c557471ae2be44157b3ae7e93f2f26fe67427b6ce91894ebf4f325f90e8', 'client', 'Sachin Mehta', 'sachin@yssmedia.com', 'yes', '0000-00-00 00:00:00', '2016-03-15 10:59:18'),
(5, 'print_account', '74d91c557471ae2be44157b3ae7e93f2f26fe67427b6ce91894ebf4f325f90e8', 'client', 'Printer Account', 'print@jasras.com', 'yes', '2016-04-05 02:52:29', '2016-04-04 07:49:39');
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
