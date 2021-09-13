-- phpMyAdmin SQL Dump
-- version 4.4.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 20, 2015 at 06:18 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET FOREIGN_KEY_CHECKS=0;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `25-jasras-app`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `job_id` int(9) NOT NULL,
  `client_id` int(3) NOT NULL,
  `rtl_name` varchar(200) NOT NULL,
  `prnt_type_id` int(3) NOT NULL,
  `prnt_size_w_mm` float NOT NULL,
  `prnt_size_l_mm` float NOT NULL,
  `prnt_size_w_in` double(8,2) NOT NULL,
  `prnt_size_l_in` double(8,2) NOT NULL,
  `prnt_size_sqft` double(8,2) NOT NULL,
  `no_copies` int(3) NOT NULL,
  `waste_size_w_mm` double(8,2) NOT NULL,
  `waste_size_l_mm` double(8,2) NOT NULL,
  `total_waste_sqft` double(8,2) NOT NULL,
  `media_brand_id` int(3) NOT NULL,
  `media_type_id` int(3) NOT NULL,
  `roll_number` int(9) NOT NULL,
  `platform_id` int(3) NOT NULL,
  `media_used_w_in` double(8,2) NOT NULL,
  `media_used_l_in` double(8,2) NOT NULL,
  `density_id` int(3) NOT NULL,
  `prnt_speed` float NOT NULL,
  `prnt_mode_id` int(3) NOT NULL,
  `direction` varchar(10) NOT NULL,
  `prnt_qlty_id` int(3) NOT NULL,
  `carriage_h_mm` float NOT NULL,
  `head_elevation` float NOT NULL,
  `passes` varchar(10) NOT NULL,
  `curing_power` varchar(10) NOT NULL,
  `shutter_mode_id` int(3) NOT NULL,
  `ink_used_rtl` float NOT NULL,
  `prnt_time` float NOT NULL,
  `user_id` int(3) NOT NULL,
  `job_date` date NOT NULL,
  `total_media_w_ft` double(8,2) NOT NULL,
  `total_media_l_ft` double(8,2) NOT NULL,
  `total_media_used_sqft` double(8,2) NOT NULL,
  `total_media_waste_w` double(8,2) NOT NULL,
  `total_media_waste_h` double(8,2) NOT NULL,
  `total_media_waste_b` double(8,2) NOT NULL,
  `total_media_wastage_sqft` double(8,2) NOT NULL,
  `total_ink_used` double(8,2) NOT NULL,
  `total_prnt_time` int(9) NOT NULL,
  `job_start_time` time NOT NULL,
  `job_end_time` time NOT NULL,
  `printer_id` int(9) NOT NULL
) TYPE=InnoDB;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD KEY `job_id` (`job_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(9) NOT NULL AUTO_INCREMENT;SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
