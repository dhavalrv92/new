-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2014 at 09:32 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kjscomp_stock`
--
CREATE DATABASE IF NOT EXISTS `kjscomp_stock` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `kjscomp_stock`;

-- --------------------------------------------------------

--
-- Table structure for table `assistant_login`
--

CREATE TABLE IF NOT EXISTS `assistant_login` (
  `user_id` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `sec_que` varchar(50) NOT NULL,
  `answer` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assistant_login`
--

INSERT INTO `assistant_login` (`user_id`, `password`, `sec_que`, `answer`, `name`) VALUES
('0000000000', '05a671c66aefea124cc08b76ea6d30bb', 'What was your childhood nickname?', 'testtest', 'Test'),
('220132', '76157f5c23d7b3b06fa10099cfe2ab6a', 'What is your favourite color?', 'blue', 'Milind Thorat'),
('220141', '705c584a19f1fab8921be3abf9d89f42', 'What is your favourite color?', 'black', 'Anand S Kandalkar'),
('220165', 'bef2c9cf576d9daf6a9960364c546eb3', 'What is your favourite color?', 'red', 'Yogesh Mane');

-- --------------------------------------------------------

--
-- Table structure for table `challan_details`
--

CREATE TABLE IF NOT EXISTS `challan_details` (
  `sr_no` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lab_no` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `GI_No` int(100) NOT NULL,
  `invoice_no` varchar(100) NOT NULL,
  `challan_no` varchar(100) NOT NULL,
  `date_receipt` date NOT NULL,
  `supplier_manufacturer` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `equipment_no` varchar(100) NOT NULL,
  `unit` int(100) NOT NULL,
  `unit_cost` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `remarks` mediumtext NOT NULL,
  PRIMARY KEY (`sr_no`),
  KEY `lab_no` (`lab_no`,`name`),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `equipment_details`
--

CREATE TABLE IF NOT EXISTS `equipment_details` (
  `dept` varchar(100) NOT NULL DEFAULT 'Computer Engineering',
  `lab` varchar(100) NOT NULL,
  `name_equip` varchar(100) NOT NULL,
  `yr_purc` int(10) NOT NULL,
  `id_no` varchar(100) NOT NULL,
  `dt_instal` date NOT NULL,
  `dt_commission` date NOT NULL,
  `name_supp` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `cost_equip_rs` decimal(65,2) NOT NULL,
  `warranty_exp` date NOT NULL,
  `amc_sign` date NOT NULL,
  `name_maintenance` varchar(100) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  PRIMARY KEY (`id_no`),
  KEY `lab` (`lab`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `equipment_history`
--

CREATE TABLE IF NOT EXISTS `equipment_history` (
  `sr_no` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `lab` varchar(100) NOT NULL,
  `id_no` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `nature_of_problem` longtext NOT NULL,
  `corrective_action_taken` longtext NOT NULL,
  `repair_cost` decimal(65,2) NOT NULL,
  PRIMARY KEY (`sr_no`),
  KEY `id_no` (`id_no`),
  KEY `lab` (`lab`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stock_equipmentlist`
--

CREATE TABLE IF NOT EXISTS `stock_equipmentlist` (
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `lab_no` varchar(10) NOT NULL,
  `equipment_name` varchar(500) NOT NULL,
  `equipment_quantity` varchar(10) NOT NULL,
  PRIMARY KEY (`time_stamp`),
  KEY `lab_no` (`lab_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stock_furniturelist`
--

CREATE TABLE IF NOT EXISTS `stock_furniturelist` (
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `lab_no` varchar(10) NOT NULL,
  `furniture_description` varchar(500) NOT NULL,
  `furniture_quantity` varchar(50) NOT NULL,
  PRIMARY KEY (`time_stamp`),
  KEY `lab_no` (`lab_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stock_part1`
--

CREATE TABLE IF NOT EXISTS `stock_part1` (
  `lab_no` varchar(10) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `class` varchar(50) NOT NULL,
  `area` varchar(50) NOT NULL,
  `student_count` varchar(10) NOT NULL,
  `equipment_apparatus` varchar(502) NOT NULL,
  `fixture_furniture` varchar(500) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`lab_no`),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stock_part2`
--

CREATE TABLE IF NOT EXISTS `stock_part2` (
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `lab_no` varchar(10) NOT NULL,
  `year` varchar(20) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `recurring` varchar(60) NOT NULL,
  `nonrecurring` varchar(60) NOT NULL,
  `total` varchar(60) NOT NULL,
  PRIMARY KEY (`time_stamp`),
  KEY `lab_no` (`lab_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stock_softwarelist`
--

CREATE TABLE IF NOT EXISTS `stock_softwarelist` (
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `lab_no` varchar(10) NOT NULL,
  `software_name` varchar(500) NOT NULL,
  `software_quantity` varchar(10) NOT NULL,
  PRIMARY KEY (`time_stamp`),
  KEY `lab_no` (`lab_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `challan_details`
--
ALTER TABLE `challan_details`
  ADD CONSTRAINT `challan_details_ibfk_1` FOREIGN KEY (`lab_no`) REFERENCES `stock_part1` (`lab_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `challan_details_ibfk_2` FOREIGN KEY (`name`) REFERENCES `stock_part1` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stock_equipmentlist`
--
ALTER TABLE `stock_equipmentlist`
  ADD CONSTRAINT `stock_equipmentlist_ibfk_1` FOREIGN KEY (`lab_no`) REFERENCES `stock_part1` (`lab_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stock_furniturelist`
--
ALTER TABLE `stock_furniturelist`
  ADD CONSTRAINT `stock_furniturelist_ibfk_1` FOREIGN KEY (`lab_no`) REFERENCES `stock_part1` (`lab_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stock_part2`
--
ALTER TABLE `stock_part2`
  ADD CONSTRAINT `stock_part2_ibfk_1` FOREIGN KEY (`lab_no`) REFERENCES `stock_part1` (`lab_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stock_softwarelist`
--
ALTER TABLE `stock_softwarelist`
  ADD CONSTRAINT `stock_softwarelist_ibfk_1` FOREIGN KEY (`lab_no`) REFERENCES `stock_part1` (`lab_no`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
