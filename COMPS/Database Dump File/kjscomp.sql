-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2014 at 09:31 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kjscomp`
--
CREATE DATABASE IF NOT EXISTS `kjscomp` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `kjscomp`;

-- --------------------------------------------------------

--
-- Table structure for table `2009_2010`
--

CREATE TABLE IF NOT EXISTS `2009_2010` (
  `std_ID` varchar(20) NOT NULL,
  `std_Name` varchar(70) DEFAULT NULL,
  `std_Gender` varchar(7) DEFAULT NULL,
  `std_Ct_Num` varchar(15) DEFAULT NULL,
  `std_EmailID` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`std_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `2009_2010`
--

INSERT INTO `2009_2010` (`std_ID`, `std_Name`, `std_Gender`, `std_Ct_Num`, `std_EmailID`) VALUES
('200611001', 'ADIVAREKAR AMRITA', 'F', '9969006542', 'purple_2300@yahoo.co.in'),
('200611002', 'AIGAL NIRANJAN', 'M', '9029043206', 'niranjan.aigal@gmail.com'),
('200611003', 'ANSARI SHAHBAAZ', 'M', '9821080375', 'ansari.shahbaaz89@gmail.com'),
('200611004', 'BAG GOPAL BHAJA RINA', 'M', '9768834080', 'gopalbagg@gmail.com'),
('200611005', 'BAPAT MUKUL', 'M', '9820352539', ' madhavabapat@gmail.com'),
('200611006', 'CHAUDHARI PANKAJ', 'M', '9892315472', 'pankaj2121b027@gmail.com'),
('200611007', 'CHAVAN TIRTHA', 'F', '9987504399', 'tertha.chavan912@rediffmail.com'),
('200611008', 'CHURI MANAS', 'M', '9967837753', 'manaschuri@gmail.com'),
('200611009', 'DELIWALA SOUMIL', 'M', '9773170767', 'soumil4u.1988@gmail.com'),
('200611010', 'DHAKAPPA VARUN', 'M', '9768178820', 'varun.dkp@gmail.com'),
('200611011', 'GADI SIDDESH', 'M', '9820869918', 'sid.mon.united@gmail.com'),
('200611012', 'GANDHI PRIYANKA', 'F', '9820412890', 'psg1712@yahoo.com'),
('200611013', 'IYENGAR NAVYA', 'F', '9867666701', 'navyaiyengar@gmail.com'),
('200611014', 'IYENGAR RANGAPRASAD', 'M', '9819240914', 'ranga.lonely@gmail.com'),
('200611015', 'J SURESH', 'M', '9987767371', 'jp.sures@gmail.com'),
('200611016', 'JADHAV NILEEMA', 'F', '9773758166', 'nilee21@gmail.com'),
('200611017', 'JAIN DIPESH', 'M', '9833620736', 'dipeshli@gmail.com'),
('200611018', 'JAIN RICHA', 'F', '9969273723', 'jain_rich5@yahoo.co.in'),
('200611019', 'JOSHI RUCHI SUNIL SMITA', 'F', '9920332055', 'ruchi_josh@hotmail.com'),
('200611020', 'KADAM PRASHANT', 'M', '7208317377', 'prashantkadam88@gmail.com'),
('200611021', 'KAMBLE ARTHI', 'F', '9619121043', 'kamblearathi@yahoo.in'),
('200611022', 'KOLHE TEJAS', 'M', '9821079504', 'tejas090388@yahoo.in'),
('200611023', 'KOTHARI MANSI', 'F', '9820358911', 'mansi_sweet1989@yahoo.com'),
('200611024', 'MEHTA VAIBHAV', 'M', '9821835087', 'vaibhav.mehta386@gmail.com'),
('200611025', 'MEMANE NAVNATH', 'M', '9820116739', 'nav.memane@yahoo.com'),
('200611026', 'MISTRY ANITA', 'F', '9819079162', 'mistryanita@yahoo.com'),
('200611027', 'MITHUL SOMASUNDARAM', 'M', '7829572714', 'mithul14s@gmail.com'),
('200611028', 'MITRA BISHWARUP', 'M', '9820486069', 'bishwarup.mitra@gmail.com'),
('200611029', 'MODY GAURAV', 'M', '9870748442', 'gauravmody@gmail.com'),
('200611030', 'NAIR ROSHNI', 'F', '9821180375', 'twinkleroshani@yahoo.co.in'),
('200611031', 'NIMNA SREEDHARAN', 'F', '9220508516', 'sreedharan.nimna@gmail.com'),
('200611032', 'PAREKH MIHIR', 'M', '9821310382', 'mihir8989@yahoo.in'),
('200611033', 'PARMAR DHAVAL', 'M', '9819155319', 'imgettingsick@gmail.com'),
('200611034', 'PASAD JIGAR', 'M', '9967233904', 'imgettingsick@gmail.com'),
('200611035', 'PATIL KAUSTUBH', 'M', '9833481187', 'kdpatil.19@gmail.com'),
('200611036', 'PATEL PRATIKKUMAR', 'M', '9426884993', 'pratik_aka_pp@yahoo.com'),
('200611037', 'PILLAI APARNA', 'F', '9869938585', 'aparnapillai19@rediffmail.com'),
('200611038', 'PUNWANI ROSHAN', 'M', '9545516261', 'roshan.punwani@gmail.com'),
('200611039', 'PURANIK DEEPTI', 'F', '9769226659', 'puranikdeep@yahoo.comin'),
('200611040', 'RATHOD ABHAY', 'M', '9819697353', 'abhayrathod702@gmail,com'),
('200611041', 'SANDBHOR SHEKHAR', 'M', '9664287630', 'ask.shekharss@gmail.com'),
('200611042', 'SHAH HARDIK', 'M', '9769595009', 'hardik_shah1888@yahoo.co.in'),
('200611043', 'SHAH JIGAR', 'M', '9773517366', 'jigar_high_on_life@yahoo.com'),
('200611044', 'SHAH KUNAL', 'M', '9870072248', 'kunalshah1307@gmail.com'),
('200611045', 'SHAH POOJA', 'F', '9819124661', 'poprpa@gmail.com'),
('200611046', 'SHAH PRANAV', 'M', '9819090288', 'pranav_prons@yahoo.com'),
('200611047', 'SHAH SHRADDHA', 'F', '9869961418', 'shraddhashah0211@gmail.com'),
('200611048', 'SHAH VAIBHAV', 'M', '9969089172', 'kjsomaiya09@gmail.com'),
('200611049', 'SHAIKH YASSER', 'M', '9892317653', 'yras.exe@gmail.com'),
('200611050', 'SHANBHAG SRINATH', 'M', '9769447004', 'shanbhag88@gmail.com'),
('200611051', 'SHEJAWAL RAJU', 'M', '9702596655', 'rajushejawal@gmail.com'),
('200611052', 'SHETH KINJAL', 'F', '8097485191', 'sheth.kinjal9@gmail.com'),
('200611053', 'SHIRODKAR RAGHUVIR', 'M', '9869649144', 'raghuvir.v.shirodkar@gmail.com'),
('200611054', 'SINGH MALVIKA', 'F', '9833669465', 'singhmalvi@gmail.com'),
('200611055', 'SWARNKAR RITURAJ ', 'M', '9503864988', 'anishsoni88@gmail.com'),
('200611056', 'SWETA BALASUBRAMANIAN', 'F', '9867096306', 'swetha.friends@rediffmail.com'),
('200611057', 'TAPIYAWALA ROHAN', 'M', '9773531790', 'rohantapiyawala@yahoo.com'),
('200611058', 'THANAWALA HITESH', 'M', '9869671831', 'hitesh1988@yahoo.com'),
('200611059', 'TRIVEDI SAMIR', 'M', '9619199788', 'samirtrivedi81@gmail.com'),
('200611060', 'VALA RAKESH MANSUKHLAL', 'M', '9870080604', 'rakeshvala88@yahoo.com'),
('200611061', 'VASANI SIDDESH', 'M', '9820869918', 'sid.man.united@gmail.com'),
('200611062', 'VICHARE MAYUR', 'M', '9821415142', 'mayur294@gmail.com'),
('200611063', 'VIJAN DIMPLE ', 'F', '9892635199', 'dimple_vij@hotmail.com'),
('200611064', 'VITHALANI NIKHIL ', 'M', '9821327002', 'nikhilv9999@yahoo.co.in'),
('200611065', 'WAGHMODE RESHMA', 'F', '9222237112', 'waghmodereshma@yahoo.in'),
('200611066', 'ZUNJARAO SAGAR', 'M', '9503285443', 'zunjarrao.sagar@gmail.com'),
('200611067', 'DIVYA SANTOSH', 'M', '9049540194', 'div21788@gmail.com'),
('200611068', 'THAKER SAGAR', 'M', '', ''),
('200611069', 'ARJUN SANJAY', 'M', '', ''),
('200611070', 'DAWARE SAJID', 'M', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `academic_info`
--

CREATE TABLE IF NOT EXISTS `academic_info` (
  `id` varchar(10) NOT NULL,
  `fac_name` varchar(100) NOT NULL,
  `mobile_no` varchar(15) NOT NULL,
  `qualification` varchar(30) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `passing_year` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `sub_taught` varchar(100) NOT NULL,
  `joining_date` date NOT NULL,
  `area_of_interest` varchar(1000) NOT NULL,
  `appointment_nature` varchar(30) NOT NULL,
  `approval_type` varchar(50) NOT NULL,
  `approval_letterNo` varchar(50) NOT NULL,
  `previous_college` varchar(100) NOT NULL,
  `previous_college_letterNo` varchar(50) NOT NULL,
  `scale_grade` varchar(30) NOT NULL,
  `superannuation_date` date NOT NULL,
  `teaching_experience` int(20) NOT NULL,
  `industry_experience` int(20) NOT NULL,
  `total_service_years` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `name` (`fac_name`),
  KEY `name_2` (`fac_name`),
  KEY `mobile_no` (`mobile_no`),
  KEY `fac_name` (`fac_name`),
  KEY `fac_name_2` (`fac_name`),
  KEY `fac_name_3` (`fac_name`),
  KEY `joining_date` (`joining_date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `academic_info`
--

INSERT INTO `academic_info` (`id`, `fac_name`, `mobile_no`, `qualification`, `subject`, `passing_year`, `designation`, `sub_taught`, `joining_date`, `area_of_interest`, `appointment_nature`, `approval_type`, `approval_letterNo`, `previous_college`, `previous_college_letterNo`, `scale_grade`, `superannuation_date`, `teaching_experience`, `industry_experience`, `total_service_years`) VALUES
('000000', 'Test Test Test', '00000000000', 'Test Qualification', 'Test Subject', '2000-01', 'Assistant Professor', 'Test', '2000-01-01', 'Test', 'Regular', 'Test Approval Type', 'Test Approval Letter Number', 'Test Previous College', 'Test Previous College Letter Number', 'Test Scale/Grade', '2000-01-01', 5, 5, '10');

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE IF NOT EXISTS `adminlogin` (
  `userid` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `sec_que` varchar(1000) NOT NULL,
  `answer` varchar(50) NOT NULL,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `admin_userid` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`userid`, `password`, `sec_que`, `answer`, `name`) VALUES
('admin', '05a671c66aefea124cc08b76ea6d30bb', 'What was the make and model of your first car?', 'testtest', 'Viral');

-- --------------------------------------------------------

--
-- Table structure for table `facultyinfo`
--

CREATE TABLE IF NOT EXISTS `facultyinfo` (
  `fac_id` varchar(10) NOT NULL,
  `fac_name` varchar(100) NOT NULL,
  `fac_image` varchar(150) NOT NULL,
  PRIMARY KEY (`fac_id`),
  KEY `fac_name` (`fac_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facultyinfo`
--

INSERT INTO `facultyinfo` (`fac_id`, `fac_name`, `fac_image`) VALUES
('000000', 'Test', 'Images/000000.jpg'),
('220018', 'uday rote', 'Images/220018.jpg'),
('220056', 'Kavita Bathe', 'Images/220056.jpg'),
('220066', '', 'Images/Demo_Image.jpg'),
('220080', 'Jyoti', 'Images/220080.jpg'),
('220103', 'Chitra Bhole', 'Images/220103.jpg'),
('220105', 'Sarita Ambadekar', 'Images/220105.jpg'),
('220109', '', 'Images/Demo_Image.jpg'),
('220112', 'Shyamal', 'Images/220112.jpg'),
('220155', 'ArvinD Pandi Dorai', 'Images/220155.jpg'),
('220168', 'Jignasha Dalal', 'Images/220168.jpg'),
('220175', 'Shubhada Labde', 'Images/220175.jpg'),
('220183', '', 'Images/Demo_Image.jpg'),
('220204', 'Nilambari', 'Images/220204.jpg'),
('220205', 'Shraddha Joshi', 'Images/220205.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `facultylogin`
--

CREATE TABLE IF NOT EXISTS `facultylogin` (
  `userid` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `sec_que` varchar(1000) NOT NULL,
  `answer` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `userid` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facultylogin`
--

INSERT INTO `facultylogin` (`userid`, `password`, `sec_que`, `answer`, `email`) VALUES
('000000', '05a671c66aefea124cc08b76ea6d30bb', 'What is your favourite color?', 'testtest', 'test@test.test'),
('220018', 'cc81954fd5246ca4468f33c8bb548bbe', 'What was the make and model of your first car?', 'waganR', 'udayrote@somaiya.edu'),
('220056', '22fd4a87468028a627efa55a9d50ad74', 'What was your childhood nickname?', 'xyz', 'kavita.bathe@gmail.com'),
('220066', '', '', '', ''),
('220080', 'ff1203d8f53acf6f3db77bb17676fbbe', 'What was your childhood nickname?', 'jyot', 'wadmare_jyoti@yahoo.com'),
('220103', '919653e680cb7c172265c12db55b9850', 'What is your favourite color?', 'pink', 'cbhole@somaiya.edu'),
('220105', 'b1b10212a18c80429aa753525a7eb1bb', 'What is your favourite color?', 'pink', 'sarita.ambadekar@somaiya.edu'),
('220109', '', '', '', ''),
('220112', '01d574401fde32b3c7c4607cc3add89a', 'What is your favourite color?', 'orange', 'kseema13@rediffmail.com'),
('220155', '5f385d1b7289f139578fd34b99a816bb', 'What was your childhood nickname?', 'ecell', 'arvindd@somaiya.edu'),
('220168', 'fb7818f9c3337bfb0161452671276f35', 'What is your favourite color?', 'black', 'jignasha@somaiya.edu'),
('220175', '94494975270728145a4e15b87752fdee', 'What is your favourite color?', ' blue', 'varsac2002@gmail.com'),
('220183', '', '', '', ''),
('220204', 'd765da4da3d13cb19c1092f3c2728da9', 'What is your favourite color?', 'orange', 'nilambari.joshi@somaiya.edu'),
('220205', 'ab6654441fc735b8cbaf15fdf2cf107e', 'What was the make and model of your first car?', 'mobile', 'shraddha.joshi@somaiya.edu');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_detail`
--

CREATE TABLE IF NOT EXISTS `faculty_detail` (
  `id` varchar(10) NOT NULL,
  `biography` longtext NOT NULL,
  `publication` longtext NOT NULL,
  `blogs` longtext NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_detail`
--

INSERT INTO `faculty_detail` (`id`, `biography`, `publication`, `blogs`) VALUES
('000000', 'Viral Patel\r\n\r\n\r\n\r\n	Viral Patel\r\n\r\n\r\n\r\n		Viral Patel\r\n\r\n\r\n\r\n			Viral Patel																			', '																									', '																									'),
('220018', '', '', ''),
('220056', '', '', ''),
('220066', '', '', ''),
('220080', '', '', ''),
('220103', '', '', ''),
('220105', '', '', ''),
('220109', '', '', ''),
('220112', '', '', ''),
('220155', '', '', ''),
('220168', '', '', ''),
('220175', '', '', ''),
('220183', '', '', ''),
('220204', '', '', ''),
('220205', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `guest_lecture`
--

CREATE TABLE IF NOT EXISTS `guest_lecture` (
  `sr_no` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `faculty_name` varchar(100) NOT NULL,
  `speaker_name` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `topic_name` varchar(500) NOT NULL,
  PRIMARY KEY (`sr_no`),
  KEY `faculty_name` (`faculty_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guest_lecture`
--

INSERT INTO `guest_lecture` (`sr_no`, `faculty_name`, `speaker_name`, `date`, `topic_name`) VALUES
('2014-03-16 15:29:21', 'Test Test Test', 'Test', '2014-03-01', ''),
('2014-03-16 15:39:17', 'Test Test Test', 'Test', '2014-03-01', ''),
('2014-04-21 06:12:04', 'Shyamal Satish Virnodkar', 'Aditya Ghushe', '2014-02-01', ''),
('2014-04-21 06:12:56', 'Shyamal Satish Virnodkar', 'Mr. Sachin Karve', '2014-04-05', '');

-- --------------------------------------------------------

--
-- Table structure for table `hr_info`
--

CREATE TABLE IF NOT EXISTS `hr_info` (
  `id` varchar(10) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `religion` varchar(30) NOT NULL,
  `caste` varchar(30) NOT NULL,
  `bank_ac_no` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_info`
--

INSERT INTO `hr_info` (`id`, `sex`, `religion`, `caste`, `bank_ac_no`) VALUES
('000000', 'male', 'Test Religion', 'Test Caste', '000000000000000'),
('220018', '', '', '', ''),
('220056', 'female', 'Hindu', 'Maratha Patil', '29010100287166'),
('220066', '', '', '', ''),
('220080', '', '', '', ''),
('220103', 'female', 'Hindu', 'Open', '029010100344709'),
('220105', 'female', 'hindu', 'Teli', '0'),
('220109', '', '', '', ''),
('220112', 'female', 'Hindu', 'Vaishya-Vani', '909010035090657'),
('220155', 'male', 'Hindu', 'Open', '0112101062378'),
('220168', 'female', 'Hindu', 'NA', 'NA'),
('220175', 'female', 'Hindu', 'OBC', '87987454'),
('220183', '', '', '', ''),
('220204', 'female', 'hindu', 'brahmin', '913010052516906'),
('220205', 'female', 'TEST', 'TEST', 'TEST');

-- --------------------------------------------------------

--
-- Table structure for table `papers_presented`
--

CREATE TABLE IF NOT EXISTS `papers_presented` (
  `id` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `title` varchar(1000) NOT NULL,
  `place` varchar(1000) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `papers_presented`
--

INSERT INTO `papers_presented` (`id`, `date`, `title`, `place`) VALUES
('000000', '2014-02-01', 'TEST TITLE', 'TEST PLACE'),
('220056', '2012-04-09', 'Application of Data mining algorithms for cafeteria automation ', '1. International Conference on Innovative Science and Engineering technology,(ICISE) at V.V.P. Engineering college,Rajkot,Gujrat.'),
('220056', '2011-02-04', ' Application of Web mining for Distance Education', '2. National Conference on Emerging Technologies and Applications in Engg. and Science(NCETAES-2011) on at saraswati College of Engineering,Kharghar,Navi Mumbai'),
('220112', '0014-05-04', 'Creativity,Lateral thinking and Innovation', 'Lab 602'),
('220056', '2011-01-29', 'Application of Clustering in Virtual Stock Market', '3. International Conference on Advances in computing ,Communication control  at Fr.C.R.C.E.,Bandra(ICAC3-11)'),
('220056', '2012-06-01', 'Frequent Pattern Mining based on Clustering and Association Rule Algorithm', '4.  International Journal of Advance Research in Computer Science Vol 3 No-3 May June 2012 ISSN No.0976-5697'),
('220103', '2011-03-26', 'Platonism: A validation platform for protocols & services', 'Tiwari college of engineering '),
('220103', '2011-12-14', 'A survey of security in Traditional Distributed System', 'Vidyalankar College of Engineering,Wadala'),
('220103', '2012-10-15', 'Content Based Image Retrival', 'Karjat'),
('220103', '2012-11-13', 'Handwritten Devanagari Character Recognition', 'Indore'),
('220204', '2013-01-02', 'Analytical Survey of Security in Virtualized Environment', 'International Journal of Computer Science and Information Technology and Security (IJCSITS)'),
('220204', '2013-01-05', 'Survey of Security in Service Oriented Architecture', 'International Journal of Engineering Research and Applications (IJERA)'),
('220204', '2013-01-06', 'Intrusion Detection in Virtualized Environment', 'International Journal of Computational Engineering Research');

-- --------------------------------------------------------

--
-- Table structure for table `rfid_info`
--

CREATE TABLE IF NOT EXISTS `rfid_info` (
  `id` varchar(10) NOT NULL,
  `fac_name` varchar(100) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL,
  `department` varchar(100) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `address` text NOT NULL,
  `mobile_no` varchar(15) NOT NULL,
  `residence_no` varchar(30) NOT NULL,
  `PAN_no` varchar(30) NOT NULL,
  `PF_no` varchar(100) NOT NULL,
  `join_date` date NOT NULL,
  `confirm_date` date NOT NULL,
  `email_id` varchar(80) NOT NULL,
  `birth_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `mobile_no` (`mobile_no`),
  KEY `fac_name` (`fac_name`),
  KEY `fac_name_2` (`fac_name`),
  KEY `fac_name_3` (`fac_name`),
  KEY `fac_name_4` (`fac_name`),
  KEY `fac_name_5` (`fac_name`),
  KEY `fac_name_6` (`fac_name`),
  KEY `fac_name_7` (`fac_name`),
  KEY `fac_name_8` (`fac_name`),
  KEY `fac_name_9` (`fac_name`),
  KEY `fac_name_10` (`fac_name`),
  KEY `fac_name_11` (`fac_name`),
  KEY `fac_name_12` (`fac_name`),
  KEY `fac_name_13` (`fac_name`),
  KEY `fac_name_14` (`fac_name`),
  KEY `fac_name_15` (`fac_name`),
  KEY `fac_name_16` (`fac_name`),
  KEY `fac_name_17` (`fac_name`),
  KEY `join_date` (`join_date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rfid_info`
--

INSERT INTO `rfid_info` (`id`, `fac_name`, `designation`, `role`, `department`, `blood_group`, `address`, `mobile_no`, `residence_no`, `PAN_no`, `PF_no`, `join_date`, `confirm_date`, `email_id`, `birth_date`) VALUES
('000000', 'Test Test Test', 'Assistant Professor', 'Faculty', 'Computer Engineering', 'Test Blood', 'Test Address', '00000000000', '00000000000', '0000000000', '0000000000', '2000-01-01', '2000-01-01', 'test@test.test', '2000-01-01'),
('220018', 'Uday Umakant Rote', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '0000-00-00'),
('220056', 'Kavita Devanand Bathe', 'Assistant Professor', 'Faculty', 'Computer Engineering', 'AB+', 'C-602,Vrindavan Park,Plot no 9,Sector-34,Kamothe,Navi Mumbai', '9892829102', '02227430794', 'AKJPG9238R', 'MH/28114/125', '2007-03-01', '2007-03-01', 'kavitag@somaiya.edu', '1982-10-04'),
('220066', 'Mrunali Amit Desai', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '0000-00-00'),
('220080', 'Jyoti Ganesh Wadmare', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '0000-00-00'),
('220103', 'Chitra Pravin Bhole', 'Assistant Professor', 'Faculty', 'Computer Engineering', 'B+ve', 'Dreams housing society,Bldg- 3A ,Flat No-607,Bhandup(w)', '9619186380', '21661180', 'ALHPB8732A', 'MH/28114161', '0008-08-04', '2008-08-04', 'cbhole@somaiya.edu', '1980-06-21'),
('220105', 'Sarita Prashant Ambadekar', 'Assistant Professor', 'Faculty', 'Computer Engineering', 'o+', 'AL-6 ,24/13,panchvati Apt. sector 5 ,Airoli,\r\nNavi mumbai.', '9867009240', '0', '0', '0', '2008-08-16', '0009-12-08', 'sarita.ambadekar@somaiya.edu', '1977-02-01'),
('220109', 'Nisha Ameya Vanjari', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '0000-00-00'),
('220112', 'Shyamal Satish Virnodkar', 'Assistant Professor', 'Faculty', 'Computer Engineering', 'B+', 'Udyan Darshan , Near Paranjpe Hall, Datar Colony,Bhandup-E.', '09869406401', '9869252350', 'AJFPK9971Q', 'MH/28114/182', '2009-01-08', '2011-01-08', 'shyamal@somaiya.edu', '1978-12-10'),
('220155', 'Arvind Pandi Dorai', 'Lecturer', 'Faculty', 'Computer Engineering', 'A+ve', '701, Rajgir Sadan, Opp Sion Railway Station, Sion(w), Mumbai - 400022', '9029408800', '1', 'BLNPA6773R', '000', '2014-01-02', '2014-01-02', 'arvindd@somaiya.edu', '1987-08-13'),
('220168', 'Jignasha Vipul Dalal', 'Assistant Professor', 'Faculty', 'Computer Engineering', 'B-ve', 'G1/304, Moraj residency, Palm beach road, sec -16, sanpada', '9819071749', '3', 'AEA7586C', 'NA', '2012-06-18', '2012-06-18', 'jignasha@somaiya.edu', '1973-10-14'),
('220175', 'Shubhada Labde', 'Assistant Professor', 'Faculty', 'Computer Engineering', 'O+ve', 'A-1o2,Sunny Garden CHS.,Plot no.28,Sector-20/C,Airoli,Navi Mumbai-400708', '9819287127', '9819287127', 'ADDPL6190N', '11323', '2012-09-07', '2014-09-07', 'Shubhada.l@somaiya.edu', '1978-12-12'),
('220183', 'Rachita Shah', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '0000-00-00'),
('220204', 'Nilambari Joshi', 'Assistant Professor', 'Faculty', 'Computer Engineering', 'O +ve', 'C-1001, Rameshwar, Neelkanth Heights,\r\nPokhran Rd.2, Thane(w)-400601', '9930393471', '02225857491', 'AGVPD6446J', 'NA', '2014-01-01', '2016-01-01', 'nilambari.joshi@somaiya.edu', '1981-08-01'),
('220205', 'Shraddha Joshi', 'Assistant Professor', 'Faculty', 'Computer Engineering', 'TEST', 'TEST', '1', '1', 'TEST', 'TEST', '2014-03-01', '2014-03-01', 'a@a.a', '2014-03-01');

-- --------------------------------------------------------

--
-- Table structure for table `roll_no_sem_vi`
--

CREATE TABLE IF NOT EXISTS `roll_no_sem_vi` (
  `roll_no` int(20) NOT NULL,
  `student_name` varchar(100) DEFAULT NULL,
  `year` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`roll_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roll_no_sem_vi`
--

INSERT INTO `roll_no_sem_vi` (`roll_no`, `student_name`, `year`) VALUES
(1, 'Viral', '2012-2013'),
(2, 'Patel', '2012-2013');

-- --------------------------------------------------------

--
-- Table structure for table `seminars`
--

CREATE TABLE IF NOT EXISTS `seminars` (
  `Sr_No.` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id` varchar(10) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `name` varchar(500) NOT NULL,
  `place` varchar(500) NOT NULL,
  `seminar_nature` varchar(50) NOT NULL,
  KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seminars`
--

INSERT INTO `seminars` (`Sr_No.`, `id`, `date_from`, `date_to`, `name`, `place`, `seminar_nature`) VALUES
('2014-04-23 07:11:07', '000000', '2014-12-31', '2014-12-31', 'Test Seminar', 'Test', 'Attended');

-- --------------------------------------------------------

--
-- Table structure for table `sem_iii`
--

CREATE TABLE IF NOT EXISTS `sem_iii` (
  `seat_no` varchar(20) NOT NULL,
  `sem_III_result` varchar(10) DEFAULT NULL,
  `sem_IV_result` varchar(10) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `pp1_wr` int(50) DEFAULT NULL,
  `pp1_wr_info` varchar(10) DEFAULT NULL,
  `pp1_tw` int(50) DEFAULT NULL,
  `pp1_tw_info` varchar(10) DEFAULT NULL,
  `pp1_pr_or` int(50) DEFAULT NULL,
  `pp1_pr_or_info` varchar(10) DEFAULT NULL,
  `pp2_wr` int(50) DEFAULT NULL,
  `pp2_wr_info` varchar(10) DEFAULT NULL,
  `pp2_tw` int(50) DEFAULT NULL,
  `pp2_tw_info` varchar(10) DEFAULT NULL,
  `pp2_pr_or` int(50) DEFAULT NULL,
  `pp2_pr_or_info` varchar(10) DEFAULT NULL,
  `pp3_wr` int(50) DEFAULT NULL,
  `pp3_wr_info` varchar(10) DEFAULT NULL,
  `pp3_tw` int(50) DEFAULT NULL,
  `pp3_tw_info` varchar(10) DEFAULT NULL,
  `pp3_pr_or` int(50) DEFAULT NULL,
  `pp3_pr_or_info` varchar(10) DEFAULT NULL,
  `pp4_wr` int(50) DEFAULT NULL,
  `pp4_wr_info` varchar(10) DEFAULT NULL,
  `pp4_tw` int(50) DEFAULT NULL,
  `pp4_tw_info` varchar(10) DEFAULT NULL,
  `pp4_pr_or` int(50) DEFAULT NULL,
  `pp4_pr_or_info` varchar(10) DEFAULT NULL,
  `pp5_wr` int(50) DEFAULT NULL,
  `pp5_wr_info` varchar(10) DEFAULT NULL,
  `pp5_tw` int(50) DEFAULT NULL,
  `pp5_tw_info` varchar(10) DEFAULT NULL,
  `pp5_pr_or` int(50) DEFAULT NULL,
  `pp5_pr_or_info` varchar(10) DEFAULT NULL,
  `pp6_tw` int(50) DEFAULT NULL,
  `pp6_tw_info` varchar(10) DEFAULT NULL,
  `pp6_pr_or` int(50) DEFAULT NULL,
  `pp6_pr_or_info` varchar(10) DEFAULT NULL,
  `sem6_total` int(50) DEFAULT NULL,
  `sem6_total_info` varchar(10) DEFAULT NULL,
  `sem5_total` int(50) DEFAULT NULL,
  `sem5_total_info` varchar(10) DEFAULT NULL,
  `total` int(50) DEFAULT NULL,
  `percentage` varchar(50) DEFAULT NULL,
  `remark` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`seat_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sem_iii`
--

INSERT INTO `sem_iii` (`seat_no`, `sem_III_result`, `sem_IV_result`, `name`, `pp1_wr`, `pp1_wr_info`, `pp1_tw`, `pp1_tw_info`, `pp1_pr_or`, `pp1_pr_or_info`, `pp2_wr`, `pp2_wr_info`, `pp2_tw`, `pp2_tw_info`, `pp2_pr_or`, `pp2_pr_or_info`, `pp3_wr`, `pp3_wr_info`, `pp3_tw`, `pp3_tw_info`, `pp3_pr_or`, `pp3_pr_or_info`, `pp4_wr`, `pp4_wr_info`, `pp4_tw`, `pp4_tw_info`, `pp4_pr_or`, `pp4_pr_or_info`, `pp5_wr`, `pp5_wr_info`, `pp5_tw`, `pp5_tw_info`, `pp5_pr_or`, `pp5_pr_or_info`, `pp6_tw`, `pp6_tw_info`, `pp6_pr_or`, `pp6_pr_or_info`, `sem6_total`, `sem6_total_info`, `sem5_total`, `sem5_total_info`, `total`, `percentage`, `remark`) VALUES
('3126001', 'PASS', 'PASS', '/ADEP KAVITA VASUDEV HEMALATHA', 47, ' ', 16, ' ', 21, ' ', 47, ' ', 18, ' ', 17, ' ', 48, ' ', 17, ' ', 39, ' ', 40, ' ', 17, ' ', 18, ' ', 44, ' ', 18, ' ', 18, ' ', 19, ' ', 19, ' ', 463, ' ', 460, '+', 923, '54.29', 'S'),
('3126002', 'PASS', 'FAIL', 'AMBHORE HARSHAL SHASHIKANT MANGALA      ', 41, ' ', 14, ' ', 38, ' ', 40, ' ', 12, ' ', 16, ' ', 57, ' ', 15, ' ', 38, ' ', 59, ' ', 12, ' ', 17, ' ', 42, ' ', 17, ' ', 24, ' ', 20, ' ', 21, ' ', 483, ' ', 447, '+', 930, '54.71', 'RS4'),
('3126003', 'PASS', 'PASS', '/AMRUTKAR SNEHAL DILIP VIDYA            ', 57, ' ', 20, ' ', 34, ' ', 56, ' ', 17, ' ', 18, ' ', 57, ' ', 18, ' ', 35, ' ', 57, ' ', 18, ' ', 17, ' ', 46, ' ', 21, ' ', 21, ' ', 18, ' ', 16, ' ', 526, ' ', 468, '+', 994, '58.47', 'S'),
('3126004', 'PASS', 'PASS', 'APSINGEKAR ABHAY SHRINIVASRAO SUNANDA   ', 62, ' ', 18, ' ', 40, ' ', 53, ' ', 18, ' ', 21, ' ', 63, ' ', 17, ' ', 38, ' ', 63, ' ', 19, ' ', 17, ' ', 43, ' ', 20, ' ', 22, ' ', 22, ' ', 20, ' ', 556, ' ', 516, '+', 1072, '63.06', 'I'),
('3126005', 'PASS', 'PASS', 'BANDIVADEKAR AKSHAY ARVIND RUPALI       ', 70, ' ', 21, ' ', 45, ' ', 68, ' ', 22, ' ', 23, ' ', 57, ' ', 23, ' ', 47, ' ', 67, ' ', 23, ' ', 22, ' ', 57, ' ', 23, ' ', 21, ' ', 23, ' ', 22, ' ', 634, ' ', 609, '+', 1243, '73.12', 'I'),
('3126006', 'PASS', 'PASS', '/BARNA PRIYANKA NARESH BHAWANA          ', 56, ' ', 20, ' ', 46, ' ', 46, ' ', 19, ' ', 22, ' ', 61, ' ', 20, ' ', 47, ' ', 54, ' ', 14, ' ', 18, ' ', 48, ' ', 20, ' ', 22, ' ', 21, ' ', 23, ' ', 557, ' ', 576, '+', 1133, '66.65', 'I'),
('3126007', 'PASS', 'PASS', 'BHANUSHALI JAGDISH GOVIND LILAVANTI     ', 68, ' ', 19, ' ', 45, ' ', 65, ' ', 20, ' ', 22, ' ', 59, ' ', 20, ' ', 45, ' ', 67, ' ', 19, ' ', 19, ' ', 60, ' ', 19, ' ', 22, ' ', 21, ' ', 21, ' ', 611, ' ', 572, '+', 1183, '69.59', 'I'),
('3126008', 'PASS', 'PASS', 'BHANUSHALI MIT SHANKARLAL SHANTI        ', 58, ' ', 20, ' ', 40, ' ', 55, ' ', 19, ' ', 21, ' ', 61, ' ', 12, ' ', 40, ' ', 64, ' ', 20, ' ', 19, ' ', 57, ' ', 20, ' ', 22, ' ', 21, ' ', 21, ' ', 570, ' ', 536, '+', 1106, '65.06', 'I'),
('3126009', 'PASS', 'PASS', '/BHANUSHALI POOJA MANOJ NAMRATA         ', 65, ' ', 16, ' ', 42, ' ', 55, ' ', 16, ' ', 22, ' ', 68, ' ', 19, ' ', 44, ' ', 71, ' ', 17, ' ', 17, ' ', 47, ' ', 17, ' ', 23, ' ', 21, ' ', 22, ' ', 582, ' ', 553, '+', 1135, '66.76', 'I'),
('3126010', 'PASS', 'PASS', 'BHANUSHALI RITESH SHANKARLAL ANJANABEN  ', 56, ' ', 15, ' ', 40, ' ', 42, ' ', 14, ' ', 21, ' ', 51, ' ', 16, ' ', 40, ' ', 66, ' ', 18, ' ', 17, ' ', 46, ' ', 18, ' ', 21, ' ', 12, ' ', 12, ' ', 505, ' ', 504, '+', 1009, '59.35', 'S'),
('3126011', 'PASS', 'PASS', 'BHATIA ANUJ RAMESH BHARTI               ', 34, '*', 21, ' ', 44, ' ', 61, ' ', 16, ' ', 22, ' ', 48, ' ', 15, ' ', 42, ' ', 57, ' ', 20, ' ', 20, ' ', 43, ' ', 21, ' ', 22, ' ', 22, ' ', 23, ' ', 531, '*', 526, '+', 1057, '62.18', 'I,O.5045'),
('3126012', 'PASS', 'PASS', 'BHAVE ANIKET PRASHANT VISHAKHA          ', 62, ' ', 19, ' ', 43, ' ', 51, ' ', 18, ' ', 22, ' ', 66, ' ', 17, ' ', 45, ' ', 68, ' ', 19, ' ', 19, ' ', 62, ' ', 21, ' ', 23, ' ', 22, ' ', 22, ' ', 599, ' ', 639, '+', 1238, '72.82', 'I'),
('3126013', 'PASS', 'PASS', 'BHOIRA SAUD MOHAMED ILYAS WAHEDA        ', 64, ' ', 19, ' ', 45, ' ', 69, ' ', 20, ' ', 23, ' ', 54, ' ', 17, ' ', 46, ' ', 68, ' ', 20, ' ', 20, ' ', 56, ' ', 21, ' ', 24, ' ', 23, ' ', 22, ' ', 611, ' ', 647, '+', 1258, '74.00', 'I'),
('3126014', 'PASS', 'PASS', 'BIHANI CHANDRESH GOVIND SADHANA         ', 53, ' ', 18, ' ', 47, ' ', 52, ' ', 14, ' ', 21, ' ', 57, ' ', 18, ' ', 40, ' ', 45, ' ', 19, ' ', 17, ' ', 43, ' ', 19, ' ', 23, ' ', 21, ' ', 23, ' ', 530, ' ', 567, '+', 1097, '64.53', 'I'),
('3126015', 'PASS', 'PASS', 'BOLKE SAMEER GANPAT SONABAI             ', 53, ' ', 20, ' ', 40, ' ', 70, ' ', 13, ' ', 20, ' ', 56, ' ', 17, ' ', 40, ' ', 67, ' ', 20, ' ', 18, ' ', 48, ' ', 20, ' ', 22, ' ', 21, ' ', 23, ' ', 568, ' ', 549, '+', 1117, '65.71', 'I'),
('3126016', 'PASS', 'PASS', '/CHANDAN DEVANSHI PANKAJ GEETA          ', 73, ' ', 16, ' ', 42, ' ', 60, ' ', 16, ' ', 21, ' ', 63, ' ', 18, ' ', 42, ' ', 60, ' ', 17, ' ', 18, ' ', 57, ' ', 17, ' ', 20, ' ', 21, ' ', 22, ' ', 583, ' ', 555, '+', 1138, '66.94', 'I'),
('3126017', 'PASS', 'PASS', '/CHOUDHARY KOMAL NANDU REKHA            ', 74, ' ', 21, ' ', 46, ' ', 70, ' ', 23, ' ', 21, ' ', 63, ' ', 24, ' ', 48, ' ', 74, ' ', 24, ' ', 23, ' ', 58, ' ', 22, ' ', 23, ' ', 23, ' ', 22, ' ', 659, ' ', 675, '+', 1334, '78.47', 'I'),
('3126018', 'PASS', 'PASS', 'DHANDE PUSHKAR GENDULAL KUNDA           ', 30, 'F', 16, 'E', 40, 'E', 52, 'E', 14, 'E', 19, 'E', 43, 'E', 15, 'E', 38, 'E', 49, 'E', 17, 'E', 17, 'E', 40, 'E', 20, 'E', 22, 'E', 21, 'E', 20, 'E', 473, ' ', 418, 'x', 891, '52.41', 'F'),
('3126019', 'PASS', 'PASS', 'DHOPEY KUNAL VIJAY SARALA               ', 64, ' ', 21, ' ', 40, ' ', 73, ' ', 18, ' ', 23, ' ', 68, ' ', 21, ' ', 42, ' ', 61, ' ', 21, ' ', 19, ' ', 41, ' ', 21, ' ', 22, ' ', 23, ' ', 22, ' ', 600, ' ', 532, '+', 1132, '66.59', 'I'),
('3126020', 'PASS', 'PASS', '/DIGHE SHRADDHA VIJAY SANDHYA           ', 58, ' ', 20, ' ', 38, ' ', 55, ' ', 16, ' ', 20, ' ', 66, ' ', 18, ' ', 40, ' ', 53, ' ', 19, ' ', 20, ' ', 44, ' ', 20, ' ', 21, ' ', 20, ' ', 19, ' ', 547, ' ', 566, '+', 1113, '65.47', 'I'),
('3126021', 'PASS', 'PASS', 'DONGARE NILAY SANJEEV SHARMILA          ', 44, 'E', 13, 'E', 12, 'F', 45, 'E', 10, 'E', 15, 'E', 41, 'E', 13, 'E', 38, 'E', 44, 'E', 11, 'E', 16, 'E', 29, 'F', 13, 'E', 21, 'E', 17, 'E', 21, 'E', 403, ' ', 430, '+', 833, '49.00', 'F'),
('3126022', 'PASS', 'PASS', 'FERNANDES RYAN ROBERT JOVITA            ', 72, ' ', 18, ' ', 39, ' ', 63, ' ', 14, ' ', 18, ' ', 76, ' ', 18, ' ', 44, ' ', 65, ' ', 20, ' ', 19, ' ', 58, ' ', 21, ' ', 22, ' ', 22, ' ', 21, ' ', 610, ' ', 585, '+', 1195, '70.29', 'I'),
('3126023', 'PASS', 'PASS', 'GADHIA HARSHAL DHANSUKH RITA            ', 60, ' ', 15, ' ', 42, ' ', 74, ' ', 17, ' ', 20, ' ', 59, ' ', 17, ' ', 44, ' ', 57, ' ', 19, ' ', 21, ' ', 46, ' ', 20, ' ', 21, ' ', 21, ' ', 22, ' ', 575, ' ', 569, '+', 1144, '67.29', 'I'),
('3126024', 'PASS', 'PASS', 'GAJRA AJAY NAVIN PREMILA                ', 71, ' ', 21, ' ', 44, ' ', 56, ' ', 19, ' ', 21, ' ', 56, ' ', 19, ' ', 45, ' ', 59, ' ', 21, ' ', 22, ' ', 57, ' ', 20, ' ', 22, ' ', 21, ' ', 21, ' ', 595, ' ', 534, '+', 1129, '66.41', 'I'),
('3126025', 'PASS', 'PASS', '/GOHIL ANKITA GIRISH USHA               ', 67, ' ', 23, ' ', 44, ' ', 40, ' ', 22, ' ', 21, ' ', 65, ' ', 24, ' ', 48, ' ', 68, ' ', 24, ' ', 23, ' ', 43, ' ', 24, ' ', 21, ' ', 22, ' ', 21, ' ', 600, ' ', 614, '+', 1214, '71.41', 'I'),
('3126026', 'PASS', 'PASS', 'GOSWAMI VISHAL VIPIN PREETI             ', 62, ' ', 17, ' ', 38, ' ', 70, ' ', 14, ' ', 18, ' ', 52, ' ', 18, ' ', 40, ' ', 65, ' ', 19, ' ', 19, ' ', 52, ' ', 21, ' ', 20, ' ', 20, ' ', 21, ' ', 566, ' ', 545, '+', 1111, '65.35', 'I'),
('3126027', 'PASS', 'PASS', 'GUPTA ANIL KUMAR JAMUNA PRASAD MANJU    ', 51, ' ', 16, ' ', 41, ' ', 43, ' ', 12, ' ', 15, ' ', 55, ' ', 17, ' ', 40, ' ', 46, ' ', 17, ' ', 18, ' ', 40, ' ', 21, ' ', 21, ' ', 21, ' ', 21, ' ', 495, ' ', 457, '+', 952, '56.00', 'S'),
('3126028', 'PASS', 'PASS', 'GUPTA PAVAN HARISHANKER NANHIDEVI       ', 41, 'E', 16, 'E', 11, 'F', 40, 'E', 12, 'E', 17, 'E', 55, 'E', 17, 'E', 38, 'E', 47, 'E', 12, 'E', 11, 'E', 33, 'F', 15, 'E', 18, 'E', 11, 'E', 11, 'E', 405, ' ', 444, '+', 849, '49.94', 'F'),
('3126029', 'PASS', 'PASS', 'HEGDE SURAJ NAMDEV SHOBHA               ', 70, ' ', 21, ' ', 40, ' ', 69, ' ', 21, ' ', 21, ' ', 64, ' ', 21, ' ', 40, ' ', 70, ' ', 20, ' ', 20, ' ', 57, ' ', 20, ' ', 21, ' ', 20, ' ', 20, ' ', 615, ' ', 617, '+', 1232, '72.47', 'I'),
('3126030', 'PASS', 'PASS', '/JADHAV NIRMALA NARAYAN REKHA           ', 55, ' ', 22, ' ', 35, ' ', 64, ' ', 22, ' ', 21, ' ', 66, ' ', 21, ' ', 38, ' ', 61, ' ', 23, ' ', 23, ' ', 45, ' ', 23, ' ', 20, ' ', 22, ' ', 20, ' ', 581, ' ', 545, '+', 1126, '66.24', 'I'),
('3126031', 'PASS', 'PASS', 'JADHAV SAURABH ASHOK MANDAKINI          ', 42, ' ', 18, ' ', 34, ' ', 43, ' ', 14, ' ', 19, ' ', 49, ' ', 18, ' ', 40, ' ', 53, ' ', 18, ' ', 15, ' ', 35, '*', 21, ' ', 20, ' ', 18, ' ', 16, ' ', 473, '*', 465, '+', 938, '55.18', 'S,O.5045'),
('3126032', 'PASS', 'PASS', 'JAIN NIKHIL VINODKUMAR VIJAYLAXMI       ', 45, ' ', 16, ' ', 34, ' ', 48, ' ', 13, ' ', 16, ' ', 45, ' ', 16, ' ', 38, ' ', 50, ' ', 17, ' ', 18, ' ', 51, ' ', 19, ' ', 20, ' ', 20, ' ', 22, ' ', 488, ' ', 459, '+', 947, '55.71', 'S'),
('3126033', 'PASS', 'PASS', '/JATHAR PRAJAKTA SURYAKANT SUNANDA      ', 52, ' ', 15, ' ', 33, ' ', 75, ' ', 19, ' ', 18, ' ', 50, ' ', 15, ' ', 38, ' ', 53, ' ', 16, ' ', 18, ' ', 45, ' ', 18, ' ', 20, ' ', 13, ' ', 14, ' ', 512, ' ', 497, '+', 1009, '59.35', 'S'),
('3126034', 'PASS', 'PASS', 'JOSHI RAHUL RAMANAND SUJATA             ', 64, ' ', 18, ' ', 42, ' ', 55, ' ', 13, ' ', 18, ' ', 61, ' ', 19, ' ', 45, ' ', 70, ' ', 19, ' ', 19, ' ', 57, ' ', 21, ' ', 22, ' ', 19, ' ', 20, ' ', 582, ' ', 579, '+', 1161, '68.29', 'I'),
('3126035', 'PASS', 'PASS', '/KADAM POOJA SURESH ANITA               ', 68, ' ', 19, ' ', 35, ' ', 47, ' ', 19, ' ', 18, ' ', 67, ' ', 19, ' ', 42, ' ', 50, ' ', 21, ' ', 20, ' ', 44, ' ', 20, ' ', 22, ' ', 22, ' ', 21, ' ', 554, ' ', 564, '+', 1118, '65.76', 'I'),
('3126036', 'PASS', 'PASS', 'KARANI DHAVAL MANOJ JAYASHREE           ', 67, ' ', 19, ' ', 42, ' ', 70, ' ', 19, ' ', 21, ' ', 66, ' ', 21, ' ', 36, ' ', 71, ' ', 19, ' ', 17, ' ', 49, ' ', 21, ' ', 22, ' ', 21, ' ', 22, ' ', 603, ' ', 592, '+', 1195, '70.29', 'I'),
('3126037', 'PASS', 'PASS', 'KAUL KANAV KAPIL ASHA                   ', 67, ' ', 20, ' ', 42, ' ', 59, ' ', 16, ' ', 21, ' ', 64, ' ', 21, ' ', 36, ' ', 47, ' ', 20, ' ', 20, ' ', 51, ' ', 19, ' ', 21, ' ', 20, ' ', 19, ' ', 563, ' ', 601, '+', 1164, '68.47', 'I'),
('3126038', 'PASS', 'PASS', '/KOLI SHRADDHA MOHAN SMITA              ', 62, 'E', 15, 'E', 21, 'E', 68, 'E', 11, 'E', 5, 'F', 55, 'E', 12, 'E', 12, 'F', 67, 'E', 10, 'E', 4, 'F', 41, 'E', 12, 'E', 4, 'F', 10, 'E', 5, 'F', 414, ' ', 468, '+', 882, '51.88', 'F'),
('3126039', 'PASS', 'PASS', '/KOTHARI SHEETAL JAYESH DAKSHA          ', 66, ' ', 16, ' ', 34, ' ', 69, ' ', 13, ' ', 19, ' ', 67, ' ', 19, ' ', 38, ' ', 67, ' ', 16, ' ', 18, ' ', 50, ' ', 17, ' ', 20, ' ', 20, ' ', 21, ' ', 570, ' ', 539, '+', 1109, '65.24', 'I'),
('3126040', 'PASS', 'PASS', '/LAD SHRUTIKA NEELKANTH GEETA           ', 64, ' ', 20, ' ', 40, ' ', 64, ' ', 20, ' ', 20, ' ', 65, ' ', 18, ' ', 37, ' ', 61, ' ', 21, ' ', 18, ' ', 43, ' ', 21, ' ', 21, ' ', 20, ' ', 20, ' ', 573, ' ', 505, '+', 1078, '63.41', 'I'),
('3126041', 'PASS', 'PASS', 'LIMAYE SOUMITRA CHANDRAKANT ALKA        ', 64, ' ', 20, ' ', 41, ' ', 62, ' ', 21, ' ', 20, ' ', 70, ' ', 22, ' ', 43, ' ', 64, ' ', 21, ' ', 22, ' ', 47, ' ', 23, ' ', 21, ' ', 23, ' ', 23, ' ', 607, ' ', 580, '+', 1187, '69.82', 'I'),
('3126042', 'PASS', 'PASS', 'MALKAR NITIN MADHUKAR MAI               ', 44, 'E', 15, 'E', 41, 'E', 22, 'F', 15, 'E', 18, 'E', 58, 'E', 18, 'E', 42, 'E', 41, 'E', 20, 'E', 18, 'E', 40, 'E', 19, 'E', 20, 'E', 19, 'E', 18, 'E', 468, ' ', 463, '+', 931, '54.76', 'F'),
('3126043', 'PASS', 'PASS', '/MANE ASMITA VILAS SUNITA               ', 52, 'E', 11, 'E', 10, 'F', 25, 'F', 15, 'E', 14, 'E', 67, 'E', 12, 'E', 32, 'E', 47, 'E', 11, 'E', 17, 'E', 45, 'E', 18, 'E', 19, 'E', 12, 'E', 13, 'E', 420, ' ', 458, 'x', 878, '51.65', 'F'),
('3126044', 'PASS', 'PASS', 'MANE NIKHIL SHRIMANT MAYA               ', 41, ' ', 18, ' ', 40, ' ', 32, '*', 17, ' ', 17, ' ', 59, ' ', 16, ' ', 40, ' ', 43, ' ', 21, ' ', 18, ' ', 44, ' ', 21, ' ', 20, ' ', 20, ' ', 19, ' ', 486, '*', 496, '+', 982, '57.76', 'S,O.5045'),
('3126045', 'PASS', 'PASS', '/MANE SHRUTI SANDIP GAURI               ', 40, 'E', 16, 'E', 34, 'E', 40, 'E', 20, 'E', 19, 'E', 49, 'E', 20, 'E', 44, 'E', 40, 'E', 18, 'E', 19, 'E', 27, 'F', 20, 'E', 21, 'E', 20, 'E', 21, 'E', 468, ' ', 496, '+', 964, '56.71', 'F'),
('3126046', 'PASS', 'PASS', '/MARNE KRUTIKA CHANDRAKANT SHARDA       ', 75, ' ', 19, ' ', 41, ' ', 72, ' ', 20, ' ', 23, ' ', 69, ' ', 19, ' ', 42, ' ', 72, ' ', 18, ' ', 20, ' ', 50, ' ', 19, ' ', 20, ' ', 19, ' ', 21, ' ', 619, ' ', 604, '+', 1223, '71.94', 'I'),
('3126047', 'PASS', 'PASS', '/MAURYA PINKI RAMAWADH SAVITRI          ', 49, ' ', 22, ' ', 44, ' ', 65, ' ', 21, ' ', 19, ' ', 63, ' ', 19, ' ', 44, ' ', 70, ' ', 23, ' ', 20, ' ', 44, ' ', 24, ' ', 22, ' ', 22, ' ', 22, ' ', 593, ' ', 574, '+', 1167, '68.65', 'I'),
('3126048', 'PASS', 'PASS', 'MODI ASHUTOSH MUKESH DHARMISTHA         ', 45, 'E', 10, 'E', 12, 'F', 40, 'E', 10, 'E', 5, 'F', 40, 'E', 12, 'E', 11, 'F', 47, 'E', 10, 'E', 2, 'F', 40, 'E', 11, 'E', 3, 'F', 14, 'E', 5, 'F', 317, ' ', 432, 'x ', 749, '44.06', 'F'),
('3126049', 'PASS', 'PASS', 'MUKHILAN VARADARAJAN RANI               ', 55, ' ', 20, ' ', 44, ' ', 54, ' ', 19, ' ', 21, ' ', 65, ' ', 19, ' ', 45, ' ', 57, ' ', 20, ' ', 20, ' ', 40, ' ', 19, ' ', 22, ' ', 20, ' ', 21, ' ', 561, ' ', 566, '+', 1127, '66.29', 'I'),
('3126050', 'PASS', 'PASS', '/NADAR DIVYA ANBALAGAN REGINA           ', 61, ' ', 22, ' ', 47, ' ', 40, ' ', 20, ' ', 20, ' ', 58, ' ', 22, ' ', 46, ' ', 59, ' ', 21, ' ', 19, ' ', 50, ' ', 24, ' ', 20, ' ', 19, ' ', 19, ' ', 567, ' ', 580, '+', 1147, '67.47', 'I'),
('3126051', 'PASS', 'PASS', 'NANAWARE AMOL MADHUKAR SANGITA          ', 55, ' ', 19, ' ', 46, ' ', 46, ' ', 19, ' ', 20, ' ', 58, ' ', 20, ' ', 38, ' ', 49, ' ', 17, ' ', 20, ' ', 41, ' ', 20, ' ', 20, ' ', 21, ' ', 20, ' ', 529, ' ', 511, '+', 1040, '61.18', 'I'),
('3126052', 'PASS', 'PASS', '/NEHETE PRITAM MOHAN REKHA              ', 57, ' ', 17, ' ', 39, ' ', 53, ' ', 20, ' ', 21, ' ', 65, ' ', 18, ' ', 38, ' ', 61, ' ', 18, ' ', 18, ' ', 44, ' ', 18, ' ', 19, ' ', 19, ' ', 20, ' ', 545, ' ', 557, '+', 1102, '64.82', 'I'),
('3126053', 'PASS', 'PASS', '/NIMBALKAR  RASHMI VIVEKANAND VIDYA     ', 59, ' ', 17, ' ', 47, ' ', 56, ' ', 13, ' ', 19, ' ', 69, ' ', 18, ' ', 42, ' ', 64, ' ', 18, ' ', 18, ' ', 55, ' ', 19, ' ', 18, ' ', 18, ' ', 20, ' ', 570, ' ', 581, '+', 1151, '67.71', 'I'),
('3126054', 'PASS', 'PASS', '/PARMAR VARSHIKA VIJAY GEETA            ', 70, ' ', 16, ' ', 41, ' ', 75, ' ', 16, ' ', 19, ' ', 66, ' ', 16, ' ', 43, ' ', 68, ' ', 16, ' ', 19, ' ', 52, ' ', 20, ' ', 19, ' ', 20, ' ', 21, ' ', 597, ' ', 553, '+', 1150, '67.65', 'I'),
('3126055', 'PASS', 'PASS', 'PATEL VINEET HASMUKHLAL GEETABEN        ', 35, '*', 18, ' ', 45, ' ', 68, ' ', 20, ' ', 20, ' ', 52, ' ', 14, ' ', 42, ' ', 40, ' ', 17, ' ', 19, ' ', 53, ' ', 20, ' ', 22, ' ', 22, ' ', 21, ' ', 528, '*', 466, '+', 994, '58.47', 'S,O.5045'),
('3126056', 'PASS', 'PASS', 'PATEL VIRAL BALUBHAI PRAVINABEN         ', 63, ' ', 23, ' ', 45, ' ', 76, ' ', 24, ' ', 22, ' ', 70, ' ', 20, ' ', 48, ' ', 72, ' ', 23, ' ', 23, ' ', 67, ' ', 24, ' ', 22, ' ', 22, ' ', 20, ' ', 664, ' ', 657, '+', 1321, '77.71', 'I'),
('3126057', 'PASS', 'PASS', 'PATHAK ROHIT GIRISH BAGESHRI            ', 60, ' ', 16, ' ', 47, ' ', 43, ' ', 13, ' ', 20, ' ', 61, ' ', 17, ' ', 47, ' ', 53, ' ', 15, ' ', 18, ' ', 42, ' ', 21, ' ', 21, ' ', 22, ' ', 22, ' ', 538, ' ', 537, '+', 1075, '63.24', 'I'),
('3126058', 'PASS', 'PASS', '/PATIL LEENA TANAJIRAO VAIJAYANTI       ', 75, ' ', 18, ' ', 42, ' ', 56, ' ', 16, ' ', 19, ' ', 75, ' ', 18, ' ', 45, ' ', 71, ' ', 20, ' ', 19, ' ', 54, ' ', 20, ' ', 20, ' ', 21, ' ', 21, ' ', 610, ' ', 592, '+', 1202, '70.71', 'I'),
('3126059', 'PASS', 'PASS', 'PATIL PRATHAMESH PRADEEP PRERNA         ', 61, ' ', 16, ' ', 44, ' ', 68, ' ', 18, ' ', 21, ' ', 70, ' ', 17, ' ', 46, ' ', 60, ' ', 20, ' ', 20, ' ', 53, ' ', 22, ' ', 22, ' ', 23, ' ', 23, ' ', 604, ' ', 563, '+', 1167, '68.65', 'I'),
('3126060', 'PASS', 'PASS', '/PATIL TEJALI SUBHASH SAMITA            ', 73, ' ', 17, ' ', 41, ' ', 84, ' ', 17, ' ', 17, ' ', 60, ' ', 21, ' ', 47, ' ', 68, ' ', 19, ' ', 19, ' ', 53, ' ', 22, ' ', 21, ' ', 23, ' ', 23, ' ', 625, ' ', 612, '+', 1237, '72.76', 'I'),
('3126061', 'PASS', 'PASS', '/PAWAR SHAMAL SURESH PUSHPALATA         ', 72, ' ', 20, ' ', 41, ' ', 49, ' ', 14, ' ', 15, ' ', 70, ' ', 20, ' ', 46, ' ', 69, ' ', 22, ' ', 19, ' ', 51, ' ', 20, ' ', 22, ' ', 20, ' ', 21, ' ', 591, ' ', 570, '+', 1161, '68.29', 'I'),
('3126062', 'PASS', 'PASS', '/PHADNIS PRACHETA SUBHASH SUSHAMA       ', 73, ' ', 23, ' ', 47, ' ', 86, ' ', 24, ' ', 22, ' ', 67, ' ', 22, ' ', 46, ' ', 72, ' ', 23, ' ', 23, ' ', 58, ' ', 24, ' ', 22, ' ', 22, ' ', 22, ' ', 676, ' ', 663, '+', 1339, '78.76', 'I'),
('3126063', 'FAIL', 'FAIL', 'ROKADE VAIBHAV CHANDRAKANT KAMAL        ', 0, ' ', 15, 'E', 45, 'E', 0, ' ', 11, 'E', 15, 'E', 44, 'E', 12, 'E', 22, 'E', 40, 'E', 11, 'E', 12, 'E', 0, ' ', 18, 'E', 19, 'E', 21, 'E', 19, 'E', 304, ' ', 0, ' ', 304, '17.88', 'F'),
('3126064', 'PASS', 'PASS', '/ROY MANISHA KAMESHWAR KUMAR JINDRA     ', 73, ' ', 19, ' ', 44, ' ', 75, ' ', 22, ' ', 21, ' ', 74, ' ', 20, ' ', 45, ' ', 63, ' ', 21, ' ', 23, ' ', 51, ' ', 20, ' ', 22, ' ', 22, ' ', 22, ' ', 637, ' ', 621, '+', 1258, '74.00', 'I'),
('3126065', 'PASS', 'PASS', 'SANGHVI VIKRANT DILIP SANDHYA           ', 52, ' ', 20, ' ', 45, ' ', 49, ' ', 15, ' ', 20, ' ', 56, ' ', 19, ' ', 44, ' ', 56, ' ', 20, ' ', 21, ' ', 40, ' ', 19, ' ', 20, ' ', 21, ' ', 23, ' ', 540, ' ', 592, '+', 1132, '66.59', 'I'),
('3126066', 'PASS', 'PASS', 'SATAM DINESH BABAJI SULEKHA             ', 73, ' ', 16, ' ', 41, ' ', 48, ' ', 13, ' ', 16, ' ', 51, ' ', 14, ' ', 39, ' ', 55, ' ', 14, ' ', 12, ' ', 47, ' ', 18, ' ', 21, ' ', 21, ' ', 19, ' ', 518, ' ', 514, '+', 1032, '60.71', 'I'),
('3126067', 'FAIL', 'FAIL', 'SAWANT ADITYA RATNAKAR NEHA             ', 0, ' ', 14, 'E', 38, 'E', 0, ' ', 12, 'E', 15, 'E', 0, ' ', 11, 'E', 38, 'E', 0, ' ', 11, 'E', 13, 'E', 0, ' ', 18, 'E', 19, 'E', 13, 'E', 12, 'E', 214, ' ', 0, ' ', 214, '12.59', 'F'),
('3126068', 'PASS', 'PASS', 'VAIDYA AMIT SADASHIV SUNANDA            ', 70, ' ', 16, ' ', 47, ' ', 42, ' ', 18, ' ', 22, ' ', 70, ' ', 17, ' ', 47, ' ', 64, ' ', 19, ' ', 19, ' ', 55, ' ', 22, ' ', 22, ' ', 23, ' ', 22, ' ', 595, ' ', 582, '+', 1177, '69.24', 'I'),
('3126069', 'PASS', 'PASS', 'VALOTIA DHAVAL RAJENDRA BAKULA          ', 64, ' ', 21, ' ', 45, ' ', 76, ' ', 16, ' ', 21, ' ', 65, ' ', 19, ' ', 47, ' ', 65, ' ', 17, ' ', 18, ' ', 54, ' ', 22, ' ', 22, ' ', 20, ' ', 18, ' ', 610, ' ', 588, '+', 1198, '70.47', 'I'),
('3126070', 'PASS', 'PASS', '/WALIWADEKAR MADHURA SHRINAND PREETI    ', 51, ' ', 21, ' ', 41, ' ', 74, ' ', 24, ' ', 22, ' ', 68, ' ', 22, ' ', 48, ' ', 66, ' ', 22, ' ', 22, ' ', 51, ' ', 24, ' ', 23, ' ', 22, ' ', 23, ' ', 624, ' ', 644, '+', 1268, '74.59', 'I'),
('3126071', 'PASS', 'PASS', '/WANDRE NIKITA PRADIP SHAILAJA          ', 44, 'E', 16, 'E', 25, 'E', 43, 'E', 12, 'E', 13, 'E', 49, 'E', 16, 'E', 36, 'E', 40, 'E', 12, 'E', 4, 'F', 42, 'E', 17, 'E', 19, 'E', 13, 'E', 13, 'E', 414, ' ', 431, '+', 845, '49.71', 'F'),
('3126072', 'PASS', 'PASS', 'MODI PRIYANK ATUL RACHANA               ', 40, '+', 10, '+', 25, '+', 40, '+', 18, '+', 16, '+', 0, ' ', 10, '+', 22, '+', 0, ' ', 15, '+', 16, '+', 47, '+', 15, '+', 19, '+', 20, '+', 21, '+', 334, ' ', 0, ' ', 334, '19.65', 'AA'),
('3126073', 'PASS', 'PASS', 'PARASHAR AKSHAY ANIL ANJANA             ', 40, '+', 16, '+', 38, '+', 44, ' ', 15, '+', 20, '+', 42, '+', 16, '+', 26, '+', 45, ' ', 17, '+', 17, '+', 40, '+', 19, '+', 22, '+', 23, '+', 22, '+', 462, ' ', 433, '+', 895, '52.65', 'P'),
('3126074', 'PASS', 'PASS', 'RANE SANSKAR SANDESH SHUBHANGI          ', 58, '+', 10, '+', 31, '+', 0, 'F', 14, '+', 16, '+', 40, '+', 10, '+', 22, '+', 40, '+', 15, '+', 15, '+', 40, '+', 14, '+', 16, '+', 12, '+', 15, '+', 368, ' ', 0, ' ', 368, '21.65', 'F'),
('3126075', 'PASS', 'PASS', 'SAXENA SHASHANK SUNIT CHITRA            ', 18, 'F', 10, '+', 34, '+', 0, ' ', 15, '+', 18, '+', 49, 'E', 10, '+', 33, '+', 0, ' ', 15, '+', 15, '+', 24, 'F', 15, '+', 22, '+', 15, '+', 17, '+', 310, ' ', 0, ' ', 310, '18.24', 'F'),
('3126076', 'PASS', 'PASS', 'UMAR PANKAJ SALIGRAM GEETA              ', 40, '+', 13, '+', 45, '+', 28, 'F', 11, '+', 10, '+', 50, '+', 12, '+', 28, '+', 40, '+', 10, '+', 15, '+', 40, '+', 15, '+', 12, '+', 10, '+', 10, '+', 389, ' ', 411, 'x', 800, '47.06', 'F');

-- --------------------------------------------------------

--
-- Table structure for table `sem_iv`
--

CREATE TABLE IF NOT EXISTS `sem_iv` (
  `seat_no` varchar(20) NOT NULL,
  `sem_III_result` varchar(10) DEFAULT NULL,
  `sem_IV_result` varchar(10) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `pp1_wr` int(50) DEFAULT NULL,
  `pp1_wr_info` varchar(10) DEFAULT NULL,
  `pp1_tw` int(50) DEFAULT NULL,
  `pp1_tw_info` varchar(10) DEFAULT NULL,
  `pp1_pr_or` int(50) DEFAULT NULL,
  `pp1_pr_or_info` varchar(10) DEFAULT NULL,
  `pp2_wr` int(50) DEFAULT NULL,
  `pp2_wr_info` varchar(10) DEFAULT NULL,
  `pp2_tw` int(50) DEFAULT NULL,
  `pp2_tw_info` varchar(10) DEFAULT NULL,
  `pp2_pr_or` int(50) DEFAULT NULL,
  `pp2_pr_or_info` varchar(10) DEFAULT NULL,
  `pp3_wr` int(50) DEFAULT NULL,
  `pp3_wr_info` varchar(10) DEFAULT NULL,
  `pp3_tw` int(50) DEFAULT NULL,
  `pp3_tw_info` varchar(10) DEFAULT NULL,
  `pp3_pr_or` int(50) DEFAULT NULL,
  `pp3_pr_or_info` varchar(10) DEFAULT NULL,
  `pp4_wr` int(50) DEFAULT NULL,
  `pp4_wr_info` varchar(10) DEFAULT NULL,
  `pp4_tw` int(50) DEFAULT NULL,
  `pp4_tw_info` varchar(10) DEFAULT NULL,
  `pp4_pr_or` int(50) DEFAULT NULL,
  `pp4_pr_or_info` varchar(10) DEFAULT NULL,
  `pp5_wr` int(50) DEFAULT NULL,
  `pp5_wr_info` varchar(10) DEFAULT NULL,
  `pp5_tw` int(50) DEFAULT NULL,
  `pp5_tw_info` varchar(10) DEFAULT NULL,
  `pp5_pr_or` int(50) DEFAULT NULL,
  `pp5_pr_or_info` varchar(10) DEFAULT NULL,
  `pp6_tw` int(50) DEFAULT NULL,
  `pp6_tw_info` varchar(10) DEFAULT NULL,
  `pp6_pr_or` int(50) DEFAULT NULL,
  `pp6_pr_or_info` varchar(10) DEFAULT NULL,
  `sem6_total` int(50) DEFAULT NULL,
  `sem6_total_info` varchar(10) DEFAULT NULL,
  `sem5_total` int(50) DEFAULT NULL,
  `sem5_total_info` varchar(10) DEFAULT NULL,
  `total` int(50) DEFAULT NULL,
  `percentage` varchar(50) DEFAULT NULL,
  `remark` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`seat_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sem_iv`
--

INSERT INTO `sem_iv` (`seat_no`, `sem_III_result`, `sem_IV_result`, `name`, `pp1_wr`, `pp1_wr_info`, `pp1_tw`, `pp1_tw_info`, `pp1_pr_or`, `pp1_pr_or_info`, `pp2_wr`, `pp2_wr_info`, `pp2_tw`, `pp2_tw_info`, `pp2_pr_or`, `pp2_pr_or_info`, `pp3_wr`, `pp3_wr_info`, `pp3_tw`, `pp3_tw_info`, `pp3_pr_or`, `pp3_pr_or_info`, `pp4_wr`, `pp4_wr_info`, `pp4_tw`, `pp4_tw_info`, `pp4_pr_or`, `pp4_pr_or_info`, `pp5_wr`, `pp5_wr_info`, `pp5_tw`, `pp5_tw_info`, `pp5_pr_or`, `pp5_pr_or_info`, `pp6_tw`, `pp6_tw_info`, `pp6_pr_or`, `pp6_pr_or_info`, `sem6_total`, `sem6_total_info`, `sem5_total`, `sem5_total_info`, `total`, `percentage`, `remark`) VALUES
('3126001', 'PASS', 'PASS', '/ADEP KAVITA VASUDEV HEMALATHA', 47, ' ', 16, ' ', 21, ' ', 47, ' ', 18, ' ', 17, ' ', 48, ' ', 17, ' ', 39, ' ', 40, ' ', 17, ' ', 18, ' ', 44, ' ', 18, ' ', 18, ' ', 19, ' ', 19, ' ', 463, ' ', 460, '+', 923, '54.29', 'S'),
('3126002', 'PASS', 'FAIL', 'AMBHORE HARSHAL SHASHIKANT MANGALA      ', 41, ' ', 14, ' ', 38, ' ', 40, ' ', 12, ' ', 16, ' ', 57, ' ', 15, ' ', 38, ' ', 59, ' ', 12, ' ', 17, ' ', 42, ' ', 17, ' ', 24, ' ', 20, ' ', 21, ' ', 483, ' ', 447, '+', 930, '54.71', 'RS4'),
('3126003', 'PASS', 'PASS', '/AMRUTKAR SNEHAL DILIP VIDYA            ', 57, ' ', 20, ' ', 34, ' ', 56, ' ', 17, ' ', 18, ' ', 57, ' ', 18, ' ', 35, ' ', 57, ' ', 18, ' ', 17, ' ', 46, ' ', 21, ' ', 21, ' ', 18, ' ', 16, ' ', 526, ' ', 468, '+', 994, '58.47', 'S'),
('3126004', 'PASS', 'PASS', 'APSINGEKAR ABHAY SHRINIVASRAO SUNANDA   ', 62, ' ', 18, ' ', 40, ' ', 53, ' ', 18, ' ', 21, ' ', 63, ' ', 17, ' ', 38, ' ', 63, ' ', 19, ' ', 17, ' ', 43, ' ', 20, ' ', 22, ' ', 22, ' ', 20, ' ', 556, ' ', 516, '+', 1072, '63.06', 'I'),
('3126005', 'PASS', 'PASS', 'BANDIVADEKAR AKSHAY ARVIND RUPALI       ', 70, ' ', 21, ' ', 45, ' ', 68, ' ', 22, ' ', 23, ' ', 57, ' ', 23, ' ', 47, ' ', 67, ' ', 23, ' ', 22, ' ', 57, ' ', 23, ' ', 21, ' ', 23, ' ', 22, ' ', 634, ' ', 609, '+', 1243, '73.12', 'I'),
('3126006', 'PASS', 'PASS', '/BARNA PRIYANKA NARESH BHAWANA          ', 56, ' ', 20, ' ', 46, ' ', 46, ' ', 19, ' ', 22, ' ', 61, ' ', 20, ' ', 47, ' ', 54, ' ', 14, ' ', 18, ' ', 48, ' ', 20, ' ', 22, ' ', 21, ' ', 23, ' ', 557, ' ', 576, '+', 1133, '66.65', 'I'),
('3126007', 'PASS', 'PASS', 'BHANUSHALI JAGDISH GOVIND LILAVANTI     ', 68, ' ', 19, ' ', 45, ' ', 65, ' ', 20, ' ', 22, ' ', 59, ' ', 20, ' ', 45, ' ', 67, ' ', 19, ' ', 19, ' ', 60, ' ', 19, ' ', 22, ' ', 21, ' ', 21, ' ', 611, ' ', 572, '+', 1183, '69.59', 'I'),
('3126008', 'PASS', 'PASS', 'BHANUSHALI MIT SHANKARLAL SHANTI        ', 58, ' ', 20, ' ', 40, ' ', 55, ' ', 19, ' ', 21, ' ', 61, ' ', 12, ' ', 40, ' ', 64, ' ', 20, ' ', 19, ' ', 57, ' ', 20, ' ', 22, ' ', 21, ' ', 21, ' ', 570, ' ', 536, '+', 1106, '65.06', 'I'),
('3126009', 'PASS', 'PASS', '/BHANUSHALI POOJA MANOJ NAMRATA         ', 65, ' ', 16, ' ', 42, ' ', 55, ' ', 16, ' ', 22, ' ', 68, ' ', 19, ' ', 44, ' ', 71, ' ', 17, ' ', 17, ' ', 47, ' ', 17, ' ', 23, ' ', 21, ' ', 22, ' ', 582, ' ', 553, '+', 1135, '66.76', 'I'),
('3126010', 'PASS', 'PASS', 'BHANUSHALI RITESH SHANKARLAL ANJANABEN  ', 56, ' ', 15, ' ', 40, ' ', 42, ' ', 14, ' ', 21, ' ', 51, ' ', 16, ' ', 40, ' ', 66, ' ', 18, ' ', 17, ' ', 46, ' ', 18, ' ', 21, ' ', 12, ' ', 12, ' ', 505, ' ', 504, '+', 1009, '59.35', 'S'),
('3126011', 'PASS', 'PASS', 'BHATIA ANUJ RAMESH BHARTI               ', 34, '*', 21, ' ', 44, ' ', 61, ' ', 16, ' ', 22, ' ', 48, ' ', 15, ' ', 42, ' ', 57, ' ', 20, ' ', 20, ' ', 43, ' ', 21, ' ', 22, ' ', 22, ' ', 23, ' ', 531, '*', 526, '+', 1057, '62.18', 'I,O.5045'),
('3126012', 'PASS', 'PASS', 'BHAVE ANIKET PRASHANT VISHAKHA          ', 62, ' ', 19, ' ', 43, ' ', 51, ' ', 18, ' ', 22, ' ', 66, ' ', 17, ' ', 45, ' ', 68, ' ', 19, ' ', 19, ' ', 62, ' ', 21, ' ', 23, ' ', 22, ' ', 22, ' ', 599, ' ', 639, '+', 1238, '72.82', 'I'),
('3126013', 'PASS', 'PASS', 'BHOIRA SAUD MOHAMED ILYAS WAHEDA        ', 64, ' ', 19, ' ', 45, ' ', 69, ' ', 20, ' ', 23, ' ', 54, ' ', 17, ' ', 46, ' ', 68, ' ', 20, ' ', 20, ' ', 56, ' ', 21, ' ', 24, ' ', 23, ' ', 22, ' ', 611, ' ', 647, '+', 1258, '74.00', 'I'),
('3126014', 'PASS', 'PASS', 'BIHANI CHANDRESH GOVIND SADHANA         ', 53, ' ', 18, ' ', 47, ' ', 52, ' ', 14, ' ', 21, ' ', 57, ' ', 18, ' ', 40, ' ', 45, ' ', 19, ' ', 17, ' ', 43, ' ', 19, ' ', 23, ' ', 21, ' ', 23, ' ', 530, ' ', 567, '+', 1097, '64.53', 'I'),
('3126015', 'PASS', 'PASS', 'BOLKE SAMEER GANPAT SONABAI             ', 53, ' ', 20, ' ', 40, ' ', 70, ' ', 13, ' ', 20, ' ', 56, ' ', 17, ' ', 40, ' ', 67, ' ', 20, ' ', 18, ' ', 48, ' ', 20, ' ', 22, ' ', 21, ' ', 23, ' ', 568, ' ', 549, '+', 1117, '65.71', 'I'),
('3126016', 'PASS', 'PASS', '/CHANDAN DEVANSHI PANKAJ GEETA          ', 73, ' ', 16, ' ', 42, ' ', 60, ' ', 16, ' ', 21, ' ', 63, ' ', 18, ' ', 42, ' ', 60, ' ', 17, ' ', 18, ' ', 57, ' ', 17, ' ', 20, ' ', 21, ' ', 22, ' ', 583, ' ', 555, '+', 1138, '66.94', 'I'),
('3126017', 'PASS', 'PASS', '/CHOUDHARY KOMAL NANDU REKHA            ', 74, ' ', 21, ' ', 46, ' ', 70, ' ', 23, ' ', 21, ' ', 63, ' ', 24, ' ', 48, ' ', 74, ' ', 24, ' ', 23, ' ', 58, ' ', 22, ' ', 23, ' ', 23, ' ', 22, ' ', 659, ' ', 675, '+', 1334, '78.47', 'I'),
('3126018', 'PASS', 'PASS', 'DHANDE PUSHKAR GENDULAL KUNDA           ', 30, 'F', 16, 'E', 40, 'E', 52, 'E', 14, 'E', 19, 'E', 43, 'E', 15, 'E', 38, 'E', 49, 'E', 17, 'E', 17, 'E', 40, 'E', 20, 'E', 22, 'E', 21, 'E', 20, 'E', 473, ' ', 418, 'x', 891, '52.41', 'F'),
('3126019', 'PASS', 'PASS', 'DHOPEY KUNAL VIJAY SARALA               ', 64, ' ', 21, ' ', 40, ' ', 73, ' ', 18, ' ', 23, ' ', 68, ' ', 21, ' ', 42, ' ', 61, ' ', 21, ' ', 19, ' ', 41, ' ', 21, ' ', 22, ' ', 23, ' ', 22, ' ', 600, ' ', 532, '+', 1132, '66.59', 'I'),
('3126020', 'PASS', 'PASS', '/DIGHE SHRADDHA VIJAY SANDHYA           ', 58, ' ', 20, ' ', 38, ' ', 55, ' ', 16, ' ', 20, ' ', 66, ' ', 18, ' ', 40, ' ', 53, ' ', 19, ' ', 20, ' ', 44, ' ', 20, ' ', 21, ' ', 20, ' ', 19, ' ', 547, ' ', 566, '+', 1113, '65.47', 'I'),
('3126021', 'PASS', 'PASS', 'DONGARE NILAY SANJEEV SHARMILA          ', 44, 'E', 13, 'E', 12, 'F', 45, 'E', 10, 'E', 15, 'E', 41, 'E', 13, 'E', 38, 'E', 44, 'E', 11, 'E', 16, 'E', 29, 'F', 13, 'E', 21, 'E', 17, 'E', 21, 'E', 403, ' ', 430, '+', 833, '49.00', 'F'),
('3126022', 'PASS', 'PASS', 'FERNANDES RYAN ROBERT JOVITA            ', 72, ' ', 18, ' ', 39, ' ', 63, ' ', 14, ' ', 18, ' ', 76, ' ', 18, ' ', 44, ' ', 65, ' ', 20, ' ', 19, ' ', 58, ' ', 21, ' ', 22, ' ', 22, ' ', 21, ' ', 610, ' ', 585, '+', 1195, '70.29', 'I'),
('3126023', 'PASS', 'PASS', 'GADHIA HARSHAL DHANSUKH RITA            ', 60, ' ', 15, ' ', 42, ' ', 74, ' ', 17, ' ', 20, ' ', 59, ' ', 17, ' ', 44, ' ', 57, ' ', 19, ' ', 21, ' ', 46, ' ', 20, ' ', 21, ' ', 21, ' ', 22, ' ', 575, ' ', 569, '+', 1144, '67.29', 'I'),
('3126024', 'PASS', 'PASS', 'GAJRA AJAY NAVIN PREMILA                ', 71, ' ', 21, ' ', 44, ' ', 56, ' ', 19, ' ', 21, ' ', 56, ' ', 19, ' ', 45, ' ', 59, ' ', 21, ' ', 22, ' ', 57, ' ', 20, ' ', 22, ' ', 21, ' ', 21, ' ', 595, ' ', 534, '+', 1129, '66.41', 'I'),
('3126025', 'PASS', 'PASS', '/GOHIL ANKITA GIRISH USHA               ', 67, ' ', 23, ' ', 44, ' ', 40, ' ', 22, ' ', 21, ' ', 65, ' ', 24, ' ', 48, ' ', 68, ' ', 24, ' ', 23, ' ', 43, ' ', 24, ' ', 21, ' ', 22, ' ', 21, ' ', 600, ' ', 614, '+', 1214, '71.41', 'I'),
('3126026', 'PASS', 'PASS', 'GOSWAMI VISHAL VIPIN PREETI             ', 62, ' ', 17, ' ', 38, ' ', 70, ' ', 14, ' ', 18, ' ', 52, ' ', 18, ' ', 40, ' ', 65, ' ', 19, ' ', 19, ' ', 52, ' ', 21, ' ', 20, ' ', 20, ' ', 21, ' ', 566, ' ', 545, '+', 1111, '65.35', 'I'),
('3126027', 'PASS', 'PASS', 'GUPTA ANIL KUMAR JAMUNA PRASAD MANJU    ', 51, ' ', 16, ' ', 41, ' ', 43, ' ', 12, ' ', 15, ' ', 55, ' ', 17, ' ', 40, ' ', 46, ' ', 17, ' ', 18, ' ', 40, ' ', 21, ' ', 21, ' ', 21, ' ', 21, ' ', 495, ' ', 457, '+', 952, '56.00', 'S'),
('3126028', 'PASS', 'PASS', 'GUPTA PAVAN HARISHANKER NANHIDEVI       ', 41, 'E', 16, 'E', 11, 'F', 40, 'E', 12, 'E', 17, 'E', 55, 'E', 17, 'E', 38, 'E', 47, 'E', 12, 'E', 11, 'E', 33, 'F', 15, 'E', 18, 'E', 11, 'E', 11, 'E', 405, ' ', 444, '+', 849, '49.94', 'F'),
('3126029', 'PASS', 'PASS', 'HEGDE SURAJ NAMDEV SHOBHA               ', 70, ' ', 21, ' ', 40, ' ', 69, ' ', 21, ' ', 21, ' ', 64, ' ', 21, ' ', 40, ' ', 70, ' ', 20, ' ', 20, ' ', 57, ' ', 20, ' ', 21, ' ', 20, ' ', 20, ' ', 615, ' ', 617, '+', 1232, '72.47', 'I'),
('3126030', 'PASS', 'PASS', '/JADHAV NIRMALA NARAYAN REKHA           ', 55, ' ', 22, ' ', 35, ' ', 64, ' ', 22, ' ', 21, ' ', 66, ' ', 21, ' ', 38, ' ', 61, ' ', 23, ' ', 23, ' ', 45, ' ', 23, ' ', 20, ' ', 22, ' ', 20, ' ', 581, ' ', 545, '+', 1126, '66.24', 'I'),
('3126031', 'PASS', 'PASS', 'JADHAV SAURABH ASHOK MANDAKINI          ', 42, ' ', 18, ' ', 34, ' ', 43, ' ', 14, ' ', 19, ' ', 49, ' ', 18, ' ', 40, ' ', 53, ' ', 18, ' ', 15, ' ', 35, '*', 21, ' ', 20, ' ', 18, ' ', 16, ' ', 473, '*', 465, '+', 938, '55.18', 'S,O.5045'),
('3126032', 'PASS', 'PASS', 'JAIN NIKHIL VINODKUMAR VIJAYLAXMI       ', 45, ' ', 16, ' ', 34, ' ', 48, ' ', 13, ' ', 16, ' ', 45, ' ', 16, ' ', 38, ' ', 50, ' ', 17, ' ', 18, ' ', 51, ' ', 19, ' ', 20, ' ', 20, ' ', 22, ' ', 488, ' ', 459, '+', 947, '55.71', 'S'),
('3126033', 'PASS', 'PASS', '/JATHAR PRAJAKTA SURYAKANT SUNANDA      ', 52, ' ', 15, ' ', 33, ' ', 75, ' ', 19, ' ', 18, ' ', 50, ' ', 15, ' ', 38, ' ', 53, ' ', 16, ' ', 18, ' ', 45, ' ', 18, ' ', 20, ' ', 13, ' ', 14, ' ', 512, ' ', 497, '+', 1009, '59.35', 'S'),
('3126034', 'PASS', 'PASS', 'JOSHI RAHUL RAMANAND SUJATA             ', 64, ' ', 18, ' ', 42, ' ', 55, ' ', 13, ' ', 18, ' ', 61, ' ', 19, ' ', 45, ' ', 70, ' ', 19, ' ', 19, ' ', 57, ' ', 21, ' ', 22, ' ', 19, ' ', 20, ' ', 582, ' ', 579, '+', 1161, '68.29', 'I'),
('3126035', 'PASS', 'PASS', '/KADAM POOJA SURESH ANITA               ', 68, ' ', 19, ' ', 35, ' ', 47, ' ', 19, ' ', 18, ' ', 67, ' ', 19, ' ', 42, ' ', 50, ' ', 21, ' ', 20, ' ', 44, ' ', 20, ' ', 22, ' ', 22, ' ', 21, ' ', 554, ' ', 564, '+', 1118, '65.76', 'I'),
('3126036', 'PASS', 'PASS', 'KARANI DHAVAL MANOJ JAYASHREE           ', 67, ' ', 19, ' ', 42, ' ', 70, ' ', 19, ' ', 21, ' ', 66, ' ', 21, ' ', 36, ' ', 71, ' ', 19, ' ', 17, ' ', 49, ' ', 21, ' ', 22, ' ', 21, ' ', 22, ' ', 603, ' ', 592, '+', 1195, '70.29', 'I'),
('3126037', 'PASS', 'PASS', 'KAUL KANAV KAPIL ASHA                   ', 67, ' ', 20, ' ', 42, ' ', 59, ' ', 16, ' ', 21, ' ', 64, ' ', 21, ' ', 36, ' ', 47, ' ', 20, ' ', 20, ' ', 51, ' ', 19, ' ', 21, ' ', 20, ' ', 19, ' ', 563, ' ', 601, '+', 1164, '68.47', 'I'),
('3126038', 'PASS', 'PASS', '/KOLI SHRADDHA MOHAN SMITA              ', 62, 'E', 15, 'E', 21, 'E', 68, 'E', 11, 'E', 5, 'F', 55, 'E', 12, 'E', 12, 'F', 67, 'E', 10, 'E', 4, 'F', 41, 'E', 12, 'E', 4, 'F', 10, 'E', 5, 'F', 414, ' ', 468, '+', 882, '51.88', 'F'),
('3126039', 'PASS', 'PASS', '/KOTHARI SHEETAL JAYESH DAKSHA          ', 66, ' ', 16, ' ', 34, ' ', 69, ' ', 13, ' ', 19, ' ', 67, ' ', 19, ' ', 38, ' ', 67, ' ', 16, ' ', 18, ' ', 50, ' ', 17, ' ', 20, ' ', 20, ' ', 21, ' ', 570, ' ', 539, '+', 1109, '65.24', 'I'),
('3126040', 'PASS', 'PASS', '/LAD SHRUTIKA NEELKANTH GEETA           ', 64, ' ', 20, ' ', 40, ' ', 64, ' ', 20, ' ', 20, ' ', 65, ' ', 18, ' ', 37, ' ', 61, ' ', 21, ' ', 18, ' ', 43, ' ', 21, ' ', 21, ' ', 20, ' ', 20, ' ', 573, ' ', 505, '+', 1078, '63.41', 'I'),
('3126041', 'PASS', 'PASS', 'LIMAYE SOUMITRA CHANDRAKANT ALKA        ', 64, ' ', 20, ' ', 41, ' ', 62, ' ', 21, ' ', 20, ' ', 70, ' ', 22, ' ', 43, ' ', 64, ' ', 21, ' ', 22, ' ', 47, ' ', 23, ' ', 21, ' ', 23, ' ', 23, ' ', 607, ' ', 580, '+', 1187, '69.82', 'I'),
('3126042', 'PASS', 'PASS', 'MALKAR NITIN MADHUKAR MAI               ', 44, 'E', 15, 'E', 41, 'E', 22, 'F', 15, 'E', 18, 'E', 58, 'E', 18, 'E', 42, 'E', 41, 'E', 20, 'E', 18, 'E', 40, 'E', 19, 'E', 20, 'E', 19, 'E', 18, 'E', 468, ' ', 463, '+', 931, '54.76', 'F'),
('3126043', 'PASS', 'PASS', '/MANE ASMITA VILAS SUNITA               ', 52, 'E', 11, 'E', 10, 'F', 25, 'F', 15, 'E', 14, 'E', 67, 'E', 12, 'E', 32, 'E', 47, 'E', 11, 'E', 17, 'E', 45, 'E', 18, 'E', 19, 'E', 12, 'E', 13, 'E', 420, ' ', 458, 'x', 878, '51.65', 'F'),
('3126044', 'PASS', 'PASS', 'MANE NIKHIL SHRIMANT MAYA               ', 41, ' ', 18, ' ', 40, ' ', 32, '*', 17, ' ', 17, ' ', 59, ' ', 16, ' ', 40, ' ', 43, ' ', 21, ' ', 18, ' ', 44, ' ', 21, ' ', 20, ' ', 20, ' ', 19, ' ', 486, '*', 496, '+', 982, '57.76', 'S,O.5045'),
('3126045', 'PASS', 'PASS', '/MANE SHRUTI SANDIP GAURI               ', 40, 'E', 16, 'E', 34, 'E', 40, 'E', 20, 'E', 19, 'E', 49, 'E', 20, 'E', 44, 'E', 40, 'E', 18, 'E', 19, 'E', 27, 'F', 20, 'E', 21, 'E', 20, 'E', 21, 'E', 468, ' ', 496, '+', 964, '56.71', 'F'),
('3126046', 'PASS', 'PASS', '/MARNE KRUTIKA CHANDRAKANT SHARDA       ', 75, ' ', 19, ' ', 41, ' ', 72, ' ', 20, ' ', 23, ' ', 69, ' ', 19, ' ', 42, ' ', 72, ' ', 18, ' ', 20, ' ', 50, ' ', 19, ' ', 20, ' ', 19, ' ', 21, ' ', 619, ' ', 604, '+', 1223, '71.94', 'I'),
('3126047', 'PASS', 'PASS', '/MAURYA PINKI RAMAWADH SAVITRI          ', 49, ' ', 22, ' ', 44, ' ', 65, ' ', 21, ' ', 19, ' ', 63, ' ', 19, ' ', 44, ' ', 70, ' ', 23, ' ', 20, ' ', 44, ' ', 24, ' ', 22, ' ', 22, ' ', 22, ' ', 593, ' ', 574, '+', 1167, '68.65', 'I'),
('3126048', 'PASS', 'PASS', 'MODI ASHUTOSH MUKESH DHARMISTHA         ', 45, 'E', 10, 'E', 12, 'F', 40, 'E', 10, 'E', 5, 'F', 40, 'E', 12, 'E', 11, 'F', 47, 'E', 10, 'E', 2, 'F', 40, 'E', 11, 'E', 3, 'F', 14, 'E', 5, 'F', 317, ' ', 432, 'x ', 749, '44.06', 'F'),
('3126049', 'PASS', 'PASS', 'MUKHILAN VARADARAJAN RANI               ', 55, ' ', 20, ' ', 44, ' ', 54, ' ', 19, ' ', 21, ' ', 65, ' ', 19, ' ', 45, ' ', 57, ' ', 20, ' ', 20, ' ', 40, ' ', 19, ' ', 22, ' ', 20, ' ', 21, ' ', 561, ' ', 566, '+', 1127, '66.29', 'I'),
('3126050', 'PASS', 'PASS', '/NADAR DIVYA ANBALAGAN REGINA           ', 61, ' ', 22, ' ', 47, ' ', 40, ' ', 20, ' ', 20, ' ', 58, ' ', 22, ' ', 46, ' ', 59, ' ', 21, ' ', 19, ' ', 50, ' ', 24, ' ', 20, ' ', 19, ' ', 19, ' ', 567, ' ', 580, '+', 1147, '67.47', 'I'),
('3126051', 'PASS', 'PASS', 'NANAWARE AMOL MADHUKAR SANGITA          ', 55, ' ', 19, ' ', 46, ' ', 46, ' ', 19, ' ', 20, ' ', 58, ' ', 20, ' ', 38, ' ', 49, ' ', 17, ' ', 20, ' ', 41, ' ', 20, ' ', 20, ' ', 21, ' ', 20, ' ', 529, ' ', 511, '+', 1040, '61.18', 'I'),
('3126052', 'PASS', 'PASS', '/NEHETE PRITAM MOHAN REKHA              ', 57, ' ', 17, ' ', 39, ' ', 53, ' ', 20, ' ', 21, ' ', 65, ' ', 18, ' ', 38, ' ', 61, ' ', 18, ' ', 18, ' ', 44, ' ', 18, ' ', 19, ' ', 19, ' ', 20, ' ', 545, ' ', 557, '+', 1102, '64.82', 'I'),
('3126053', 'PASS', 'PASS', '/NIMBALKAR  RASHMI VIVEKANAND VIDYA     ', 59, ' ', 17, ' ', 47, ' ', 56, ' ', 13, ' ', 19, ' ', 69, ' ', 18, ' ', 42, ' ', 64, ' ', 18, ' ', 18, ' ', 55, ' ', 19, ' ', 18, ' ', 18, ' ', 20, ' ', 570, ' ', 581, '+', 1151, '67.71', 'I'),
('3126054', 'PASS', 'PASS', '/PARMAR VARSHIKA VIJAY GEETA            ', 70, ' ', 16, ' ', 41, ' ', 75, ' ', 16, ' ', 19, ' ', 66, ' ', 16, ' ', 43, ' ', 68, ' ', 16, ' ', 19, ' ', 52, ' ', 20, ' ', 19, ' ', 20, ' ', 21, ' ', 597, ' ', 553, '+', 1150, '67.65', 'I'),
('3126055', 'PASS', 'PASS', 'PATEL VINEET HASMUKHLAL GEETABEN        ', 35, '*', 18, ' ', 45, ' ', 68, ' ', 20, ' ', 20, ' ', 52, ' ', 14, ' ', 42, ' ', 40, ' ', 17, ' ', 19, ' ', 53, ' ', 20, ' ', 22, ' ', 22, ' ', 21, ' ', 528, '*', 466, '+', 994, '58.47', 'S,O.5045'),
('3126056', 'PASS', 'PASS', 'PATEL VIRAL BALUBHAI PRAVINABEN         ', 63, ' ', 23, ' ', 45, ' ', 76, ' ', 24, ' ', 22, ' ', 70, ' ', 20, ' ', 48, ' ', 72, ' ', 23, ' ', 23, ' ', 67, ' ', 24, ' ', 22, ' ', 22, ' ', 20, ' ', 664, ' ', 657, '+', 1321, '77.71', 'I'),
('3126057', 'PASS', 'PASS', 'PATHAK ROHIT GIRISH BAGESHRI            ', 60, ' ', 16, ' ', 47, ' ', 43, ' ', 13, ' ', 20, ' ', 61, ' ', 17, ' ', 47, ' ', 53, ' ', 15, ' ', 18, ' ', 42, ' ', 21, ' ', 21, ' ', 22, ' ', 22, ' ', 538, ' ', 537, '+', 1075, '63.24', 'I'),
('3126058', 'PASS', 'PASS', '/PATIL LEENA TANAJIRAO VAIJAYANTI       ', 75, ' ', 18, ' ', 42, ' ', 56, ' ', 16, ' ', 19, ' ', 75, ' ', 18, ' ', 45, ' ', 71, ' ', 20, ' ', 19, ' ', 54, ' ', 20, ' ', 20, ' ', 21, ' ', 21, ' ', 610, ' ', 592, '+', 1202, '70.71', 'I'),
('3126059', 'PASS', 'PASS', 'PATIL PRATHAMESH PRADEEP PRERNA         ', 61, ' ', 16, ' ', 44, ' ', 68, ' ', 18, ' ', 21, ' ', 70, ' ', 17, ' ', 46, ' ', 60, ' ', 20, ' ', 20, ' ', 53, ' ', 22, ' ', 22, ' ', 23, ' ', 23, ' ', 604, ' ', 563, '+', 1167, '68.65', 'I'),
('3126060', 'PASS', 'PASS', '/PATIL TEJALI SUBHASH SAMITA            ', 73, ' ', 17, ' ', 41, ' ', 84, ' ', 17, ' ', 17, ' ', 60, ' ', 21, ' ', 47, ' ', 68, ' ', 19, ' ', 19, ' ', 53, ' ', 22, ' ', 21, ' ', 23, ' ', 23, ' ', 625, ' ', 612, '+', 1237, '72.76', 'I'),
('3126061', 'PASS', 'PASS', '/PAWAR SHAMAL SURESH PUSHPALATA         ', 72, ' ', 20, ' ', 41, ' ', 49, ' ', 14, ' ', 15, ' ', 70, ' ', 20, ' ', 46, ' ', 69, ' ', 22, ' ', 19, ' ', 51, ' ', 20, ' ', 22, ' ', 20, ' ', 21, ' ', 591, ' ', 570, '+', 1161, '68.29', 'I'),
('3126062', 'PASS', 'PASS', '/PHADNIS PRACHETA SUBHASH SUSHAMA       ', 73, ' ', 23, ' ', 47, ' ', 86, ' ', 24, ' ', 22, ' ', 67, ' ', 22, ' ', 46, ' ', 72, ' ', 23, ' ', 23, ' ', 58, ' ', 24, ' ', 22, ' ', 22, ' ', 22, ' ', 676, ' ', 663, '+', 1339, '78.76', 'I'),
('3126063', 'FAIL', 'FAIL', 'ROKADE VAIBHAV CHANDRAKANT KAMAL        ', 0, ' ', 15, 'E', 45, 'E', 0, ' ', 11, 'E', 15, 'E', 44, 'E', 12, 'E', 22, 'E', 40, 'E', 11, 'E', 12, 'E', 0, ' ', 18, 'E', 19, 'E', 21, 'E', 19, 'E', 304, ' ', 0, ' ', 304, '17.88', 'F'),
('3126064', 'PASS', 'PASS', '/ROY MANISHA KAMESHWAR KUMAR JINDRA     ', 73, ' ', 19, ' ', 44, ' ', 75, ' ', 22, ' ', 21, ' ', 74, ' ', 20, ' ', 45, ' ', 63, ' ', 21, ' ', 23, ' ', 51, ' ', 20, ' ', 22, ' ', 22, ' ', 22, ' ', 637, ' ', 621, '+', 1258, '74.00', 'I'),
('3126065', 'PASS', 'PASS', 'SANGHVI VIKRANT DILIP SANDHYA           ', 52, ' ', 20, ' ', 45, ' ', 49, ' ', 15, ' ', 20, ' ', 56, ' ', 19, ' ', 44, ' ', 56, ' ', 20, ' ', 21, ' ', 40, ' ', 19, ' ', 20, ' ', 21, ' ', 23, ' ', 540, ' ', 592, '+', 1132, '66.59', 'I'),
('3126066', 'PASS', 'PASS', 'SATAM DINESH BABAJI SULEKHA             ', 73, ' ', 16, ' ', 41, ' ', 48, ' ', 13, ' ', 16, ' ', 51, ' ', 14, ' ', 39, ' ', 55, ' ', 14, ' ', 12, ' ', 47, ' ', 18, ' ', 21, ' ', 21, ' ', 19, ' ', 518, ' ', 514, '+', 1032, '60.71', 'I'),
('3126067', 'FAIL', 'FAIL', 'SAWANT ADITYA RATNAKAR NEHA             ', 0, ' ', 14, 'E', 38, 'E', 0, ' ', 12, 'E', 15, 'E', 0, ' ', 11, 'E', 38, 'E', 0, ' ', 11, 'E', 13, 'E', 0, ' ', 18, 'E', 19, 'E', 13, 'E', 12, 'E', 214, ' ', 0, ' ', 214, '12.59', 'F'),
('3126068', 'PASS', 'PASS', 'VAIDYA AMIT SADASHIV SUNANDA            ', 70, ' ', 16, ' ', 47, ' ', 42, ' ', 18, ' ', 22, ' ', 70, ' ', 17, ' ', 47, ' ', 64, ' ', 19, ' ', 19, ' ', 55, ' ', 22, ' ', 22, ' ', 23, ' ', 22, ' ', 595, ' ', 582, '+', 1177, '69.24', 'I'),
('3126069', 'PASS', 'PASS', 'VALOTIA DHAVAL RAJENDRA BAKULA          ', 64, ' ', 21, ' ', 45, ' ', 76, ' ', 16, ' ', 21, ' ', 65, ' ', 19, ' ', 47, ' ', 65, ' ', 17, ' ', 18, ' ', 54, ' ', 22, ' ', 22, ' ', 20, ' ', 18, ' ', 610, ' ', 588, '+', 1198, '70.47', 'I'),
('3126070', 'PASS', 'PASS', '/WALIWADEKAR MADHURA SHRINAND PREETI    ', 51, ' ', 21, ' ', 41, ' ', 74, ' ', 24, ' ', 22, ' ', 68, ' ', 22, ' ', 48, ' ', 66, ' ', 22, ' ', 22, ' ', 51, ' ', 24, ' ', 23, ' ', 22, ' ', 23, ' ', 624, ' ', 644, '+', 1268, '74.59', 'I'),
('3126071', 'PASS', 'PASS', '/WANDRE NIKITA PRADIP SHAILAJA          ', 44, 'E', 16, 'E', 25, 'E', 43, 'E', 12, 'E', 13, 'E', 49, 'E', 16, 'E', 36, 'E', 40, 'E', 12, 'E', 4, 'F', 42, 'E', 17, 'E', 19, 'E', 13, 'E', 13, 'E', 414, ' ', 431, '+', 845, '49.71', 'F'),
('3126072', 'PASS', 'PASS', 'MODI PRIYANK ATUL RACHANA               ', 40, '+', 10, '+', 25, '+', 40, '+', 18, '+', 16, '+', 0, ' ', 10, '+', 22, '+', 0, ' ', 15, '+', 16, '+', 47, '+', 15, '+', 19, '+', 20, '+', 21, '+', 334, ' ', 0, ' ', 334, '19.65', 'AA'),
('3126073', 'PASS', 'PASS', 'PARASHAR AKSHAY ANIL ANJANA             ', 40, '+', 16, '+', 38, '+', 44, ' ', 15, '+', 20, '+', 42, '+', 16, '+', 26, '+', 45, ' ', 17, '+', 17, '+', 40, '+', 19, '+', 22, '+', 23, '+', 22, '+', 462, ' ', 433, '+', 895, '52.65', 'P'),
('3126074', 'PASS', 'PASS', 'RANE SANSKAR SANDESH SHUBHANGI          ', 58, '+', 10, '+', 31, '+', 0, 'F', 14, '+', 16, '+', 40, '+', 10, '+', 22, '+', 40, '+', 15, '+', 15, '+', 40, '+', 14, '+', 16, '+', 12, '+', 15, '+', 368, ' ', 0, ' ', 368, '21.65', 'F'),
('3126075', 'PASS', 'PASS', 'SAXENA SHASHANK SUNIT CHITRA            ', 18, 'F', 10, '+', 34, '+', 0, ' ', 15, '+', 18, '+', 49, 'E', 10, '+', 33, '+', 0, ' ', 15, '+', 15, '+', 24, 'F', 15, '+', 22, '+', 15, '+', 17, '+', 310, ' ', 0, ' ', 310, '18.24', 'F'),
('3126076', 'PASS', 'PASS', 'UMAR PANKAJ SALIGRAM GEETA              ', 40, '+', 13, '+', 45, '+', 28, 'F', 11, '+', 10, '+', 50, '+', 12, '+', 28, '+', 40, '+', 10, '+', 15, '+', 40, '+', 15, '+', 12, '+', 10, '+', 10, '+', 389, ' ', 411, 'x', 800, '47.06', 'F');

-- --------------------------------------------------------

--
-- Table structure for table `sem_v`
--

CREATE TABLE IF NOT EXISTS `sem_v` (
  `seat_no` varchar(20) NOT NULL,
  `sem_III_result` varchar(10) DEFAULT NULL,
  `sem_IV_result` varchar(10) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `pp1_wr` varchar(50) DEFAULT NULL,
  `pp1_wr_info` varchar(10) DEFAULT NULL,
  `pp1_tw` varchar(50) DEFAULT NULL,
  `pp1_tw_info` varchar(10) DEFAULT NULL,
  `pp1_pr_or` varchar(50) DEFAULT NULL,
  `pp1_pr_or_info` varchar(10) DEFAULT NULL,
  `pp2_wr` varchar(50) DEFAULT NULL,
  `pp2_wr_info` varchar(10) DEFAULT NULL,
  `pp2_tw` varchar(50) DEFAULT NULL,
  `pp2_tw_info` varchar(10) DEFAULT NULL,
  `pp2_pr_or` varchar(50) DEFAULT NULL,
  `pp2_pr_or_info` varchar(10) DEFAULT NULL,
  `pp3_wr` varchar(50) DEFAULT NULL,
  `pp3_wr_info` varchar(10) DEFAULT NULL,
  `pp3_tw` varchar(50) DEFAULT NULL,
  `pp3_tw_info` varchar(10) DEFAULT NULL,
  `pp3_pr_or` varchar(50) DEFAULT NULL,
  `pp3_pr_or_info` varchar(10) DEFAULT NULL,
  `pp4_wr` varchar(50) DEFAULT NULL,
  `pp4_wr_info` varchar(10) DEFAULT NULL,
  `pp4_tw` varchar(50) DEFAULT NULL,
  `pp4_tw_info` varchar(10) DEFAULT NULL,
  `pp5_wr` varchar(50) DEFAULT NULL,
  `pp5_wr_info` varchar(10) DEFAULT NULL,
  `pp5_tw` varchar(50) DEFAULT NULL,
  `pp5_tw_info` varchar(10) DEFAULT NULL,
  `pp5_pr_or` varchar(50) DEFAULT NULL,
  `pp5_pr_or_info` varchar(10) DEFAULT NULL,
  `pp6_wr` varchar(50) NOT NULL,
  `pp6_wr_info` varchar(100) NOT NULL,
  `pp6_tw` varchar(50) DEFAULT NULL,
  `pp6_tw_info` varchar(10) DEFAULT NULL,
  `sem5_total` varchar(50) DEFAULT NULL,
  `sem5_total_info` varchar(10) DEFAULT NULL,
  `percentage` varchar(50) DEFAULT NULL,
  `remark` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`seat_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sem_v`
--

INSERT INTO `sem_v` (`seat_no`, `sem_III_result`, `sem_IV_result`, `name`, `pp1_wr`, `pp1_wr_info`, `pp1_tw`, `pp1_tw_info`, `pp1_pr_or`, `pp1_pr_or_info`, `pp2_wr`, `pp2_wr_info`, `pp2_tw`, `pp2_tw_info`, `pp2_pr_or`, `pp2_pr_or_info`, `pp3_wr`, `pp3_wr_info`, `pp3_tw`, `pp3_tw_info`, `pp3_pr_or`, `pp3_pr_or_info`, `pp4_wr`, `pp4_wr_info`, `pp4_tw`, `pp4_tw_info`, `pp5_wr`, `pp5_wr_info`, `pp5_tw`, `pp5_tw_info`, `pp5_pr_or`, `pp5_pr_or_info`, `pp6_wr`, `pp6_wr_info`, `pp6_tw`, `pp6_tw_info`, `sem5_total`, `sem5_total_info`, `percentage`, `remark`) VALUES
('3225001', 'PASS', 'FAIL', '/ANVEKAR SNEHAL SHIVANAND SEEMA         ', '21', 'F', '19', 'E', '32', 'E', '53', 'E', '18', 'E', '35', 'E', '40', 'E', '20', 'E', '17', 'E', '52', 'E', '19', 'E', '44', 'E', '18', 'E', '12', 'E', '30', 'E', '19', 'E', '449', '', '52.82', 'F'),
('3225002', 'PASS', 'PASS', 'BAGWE TANMAY AJIT AMRUTA                ', '51', ' ', '18', ' ', '35', ' ', '51', ' ', '18', ' ', '35', ' ', '62', ' ', '20', ' ', '20', ' ', '47', ' ', '19', ' ', '49', ' ', '16', ' ', '18', ' ', '36', ' ', '21', ' ', '516', '', '60.71', 'P'),
('3225003', 'PASS', 'FAIL', 'BHANUSHALI KAILASH SHANKAR MANISHA      ', '27', 'F', '17', 'E', '33', 'E', '41', 'E', '17', 'E', '38', 'E', '46', 'E', '19', 'E', '17', 'E', '51', 'E', '20', 'E', '53', 'E', '20', 'E', '20', 'E', '38', 'E', '19', 'E', '476', '', '56.00', 'F'),
('3225004', 'FAIL', 'FAIL', 'BHANUSHALI KUSHAL JAWAHAR DAXA          ', '40', '', '16', '', '32', '', '47', '', '15', '', '25', '', '40', '', '15', '', '14', '', '33', '*', '18', '', '51', '', '15', '', '20', '', '33', '', '17', '', '431', '*', '50.71', 'RS3,RS4'),
('3225005', 'PASS', 'PASS', 'BHAT KUNAL MAHARAJ KRISHAN SUNITA       ', '48', ' ', '17', ' ', '24', ' ', '49', ' ', '18', ' ', '35', ' ', '46', ' ', '19', ' ', '14', ' ', '40', ' ', '12', ' ', '46', ' ', '18', ' ', '19', ' ', '36', ' ', '18', ' ', '459', '', '54.00', 'P'),
('3225006', 'PASS', 'PASS', '/CHAUDHARY SAMIKSHA DHANRAJ PRIYANKA    ', '48', ' ', '23', ' ', '32', ' ', '53', ' ', '20', ' ', '40', ' ', '66', ' ', '24', ' ', '17', ' ', '77', ' ', '22', ' ', '71', ' ', '20', ' ', '18', ' ', '37', ' ', '21', ' ', '589', '', '69.29', 'P'),
('3225007', 'FAIL', 'FAIL', 'CHOTHANI HITEN CHUNILAL HANSHA          ', '29', 'F', '16', 'E', '25', 'E', '40', 'E', '18', 'E', '39', 'E', 'AA', '  ', '17', 'E', '17', 'E', '52', 'E', '17', 'E', '43', 'E', '18', 'E', '20', 'E', '31', 'E', '15', 'E', '397', '', '46.71', 'F'),
('3225008', 'PASS', 'PASS', 'DARJI NISHIT GUNVANTBHAI USHABEN        ', '40', ' ', '23', ' ', '38', ' ', '44', ' ', '23', ' ', '42', ' ', '51', ' ', '22', ' ', '20', ' ', '40', ' ', '23', ' ', '59', ' ', '21', ' ', '23', ' ', '32', ' ', '17', ' ', '518', '', '60.94', 'P'),
('3225009', 'PASS', 'PASS', 'DAVE PARTH DINESH HARSHA                ', '47', ' ', '12', ' ', '38', ' ', '55', ' ', '16', ' ', '22', ' ', '40', ' ', '12', ' ', '12', ' ', '48', ' ', '14', ' ', '41', ' ', '12', ' ', '10', ' ', '36', ' ', '19', ' ', '434', '', '51.06', 'P'),
('3225010', 'FAIL', 'PASS', 'DHUMAL RAHUL KAMLESH SANGEETA           ', '48', ' ', '11', ' ', '40', ' ', '43', ' ', '12', ' ', '25', ' ', '40', ' ', '11', ' ', '13', ' ', '40', ' ', '12', ' ', '58', ' ', '13', ' ', '18', ' ', '33', ' ', '19', ' ', '436', '', '51.29', 'P'),
('3225011', 'PASS', 'PASS', 'GALA NEEL MANISH DAKSHA                 ', '49', ' ', '16', ' ', '38', ' ', '53', ' ', '18', ' ', '32', ' ', '41', ' ', '16', ' ', '15', ' ', '42', ' ', '15', ' ', '67', ' ', '20', ' ', '17', ' ', '31', ' ', '19', ' ', '489', '', '57.53', 'P'),
('3225012', 'PASS', 'PASS', 'GANDHI KRUSHAB VASANT MANISHA           ', '41', ' ', '16', ' ', '40', ' ', '40', ' ', '18', ' ', '34', ' ', '45', ' ', '16', ' ', '15', ' ', '41', ' ', '17', ' ', '62', ' ', '20', ' ', '20', ' ', '33', ' ', '21', ' ', '479', '', '56.35', 'P'),
('3225013', 'PASS', 'PASS', 'GHADIGAONKAR SANDESH LAXMAN LEENA       ', '42', ' ', '18', ' ', '24', ' ', '51', ' ', '16', ' ', '33', ' ', '40', ' ', '16', ' ', '15', ' ', '50', ' ', '16', ' ', '47', ' ', '15', ' ', '16', ' ', '33', ' ', '17', ' ', '449', '', '52.82', 'P'),
('3225014', 'PASS', 'PASS', 'GUNJAL JAYESH SUKHADEO MEENA            ', '52', ' ', '20', ' ', '22', ' ', '41', ' ', '16', ' ', '35', ' ', '53', ' ', '19', ' ', '15', ' ', '52', ' ', '17', ' ', '43', ' ', '14', ' ', '17', ' ', '33', ' ', '19', ' ', '468', '', '55.06', 'P'),
('3225015', 'PASS', 'PASS', '/GUPTA ANJALI GANESH SUMAN              ', '56', ' ', '17', ' ', '22', ' ', '54', ' ', '22', ' ', '39', ' ', '40', ' ', '21', ' ', '18', ' ', '50', ' ', '17', ' ', '52', ' ', '23', ' ', '21', ' ', '38', ' ', '21', ' ', '511', '', '60.12', 'P'),
('3225016', 'PASS', 'PASS', 'JADEJA KULDEEP KANAKSINH ANTARBA        ', '46', ' ', '16', ' ', '35', ' ', '46', ' ', '19', ' ', '32', ' ', '40', ' ', '10', ' ', '15', ' ', '48', ' ', '12', ' ', '40', ' ', '16', ' ', '18', ' ', '29', ' ', '11', ' ', '433', '', '50.94', 'P'),
('3225017', 'PASS', 'PASS', 'JOBIN JOHN BABU LISSY                   ', '40', 'E', '19', 'E', '30', 'E', '41', 'E', '18', 'E', '38', 'E', '33', 'F', '18', 'E', '16', 'E', '33', 'F', '19', 'E', '17', 'F', '17', 'E', '21', 'E', '33', 'E', '21', 'E', '414', '', '48.71', 'F'),
('3225018', 'PASS', 'PASS', '/JOSHI JUILI SHRIKANT SAROJ             ', '50', ' ', '19', ' ', '40', ' ', '53', ' ', '21', ' ', '42', ' ', '60', ' ', '24', ' ', '23', ' ', '53', ' ', '18', ' ', '57', ' ', '20', ' ', '23', ' ', '39', ' ', '21', ' ', '563', '', '66.24', 'P'),
('3225019', 'PASS', 'PASS', 'JOSHI VARUN ATUL SANDHYA                ', '54', ' ', '19', ' ', '44', ' ', '65', ' ', '23', ' ', '47', ' ', '61', ' ', '23', ' ', '23', ' ', '79', ' ', '23', ' ', '63', ' ', '21', ' ', '23', ' ', '40', ' ', '21', ' ', '629', '', '74.00', 'P'),
('3225020', 'PASS', 'PASS', 'KARMAKAR SURAJIT PRADEEP SUMITA         ', '58', '', '24', '', '38', '', '42', '', '21', '', '47', '', '31', '*', '23', '', '23', '', '75', '', '23', '', '57', '', '21', '', '21', '', '30', '', '21', '', '555', '*', '65.29', 'F'),
('3225021', 'PASS', 'FAIL', 'KATKORIA KEVIN KAMAL MITA               ', '18', 'F', '15', 'E', '30', 'E', '40', 'E', '16', 'E', '30', 'E', '43', 'E', '18', 'E', '16', 'E', '21', 'F', '17', 'E', '45', 'E', '20', 'E', '15', 'E', '28', 'E', '18', 'E', '390', '', '45.88', 'F'),
('3225022', 'FAIL', 'FAIL', 'KAZI FAHIM NIYAZ SHAGUFTA \n (PROVISIONAL)               ', '21', 'F', '17', 'E', '35', 'E', '31', 'F', '16', 'E', '28', 'E', 'AA', '  ', '10', 'E', '12', 'E', '27', 'F', '11', 'E', '40', 'E', '14', 'E', '15', 'E', '34', 'E', '19', 'E', '330', '', '38.82', 'F'),
('3225024', 'PASS', 'PASS', '/LAD TANVI DILIP SADHANA                ', '54', ' ', '23', ' ', '38', ' ', '48', ' ', '19', ' ', '35', ' ', '47', ' ', '21', ' ', '21', ' ', '51', ' ', '21', ' ', '50', ' ', '20', ' ', '20', ' ', '37', ' ', '21', ' ', '526', '', '61.88', 'P'),
('3225025', 'PASS', 'FAIL', 'MAHADIK AKSHAY GOPALRAO SEEMA           ', '28', 'F', '12', 'E', '25', 'E', '47', 'E', '17', 'E', '40', 'E', '41', 'E', '15', 'E', '14', 'E', '27', 'F', '17', 'E', '41', 'E', '17', 'E', '19', 'E', '27', 'E', '17', 'E', '404', '', '47.53', 'F'),
('3225026', 'PASS', 'PASS', 'MANGE PRATIK ARVIND DAMAYANTI           ', '45', 'E', '15', 'E', '04', 'F', '63', 'E', '14', 'E', '25', 'E', '43', 'E', '12', 'E', '12', 'E', '47', 'E', '10', 'E', '55', 'E', '12', 'E', '13', 'E', '33', 'E', '16', 'E', '419', '', '49.29', 'P'),
('3225027', 'PASS', 'PASS', 'MATH AKSHAYKUMAR MALENDRA SHEELA        ', '40', ' ', '17', ' ', '40', ' ', '59', ' ', '20', ' ', '38', ' ', '65', ' ', '21', ' ', '18', ' ', '46', ' ', '21', ' ', '60', ' ', '21', ' ', '22', ' ', '40', ' ', '19', ' ', '547', '', '64.35', 'P'),
('3225028', 'PASS', 'PASS', 'MATLAWALA DEVANSHU BHADRESH PRITI       ', '53', ' ', '19', ' ', '40', ' ', '63', ' ', '21', ' ', '45', ' ', '59', ' ', '21', ' ', '23', ' ', '57', ' ', '22', ' ', '64', ' ', '20', ' ', '23', ' ', '34', ' ', '21', ' ', '585', '', '68.82', 'P'),
('3225029', 'PASS', 'PASS', 'MEHTA JIGAR MUNJAL KINJAL               ', '56', ' ', '20', ' ', '44', ' ', '70', ' ', '23', ' ', '47', ' ', '79', ' ', '24', ' ', '23', ' ', '75', ' ', '20', ' ', '73', ' ', '24', ' ', '23', ' ', '40', ' ', '22', ' ', '663', '', '78.00', 'P'),
('3225030', 'PASS', 'PASS', 'MESTRY ANUP SUDHAKAR UMA                ', '56', ' ', '21', ' ', '30', ' ', '49', ' ', '20', ' ', '47', ' ', '55', ' ', '20', ' ', '20', ' ', '57', ' ', '19', ' ', '71', ' ', '24', ' ', '23', ' ', '34', ' ', '20', ' ', '566', '', '66.59', 'P'),
('3225031', 'PASS', 'PASS', '/MISHRA NEHA DEEPAK MEENA               ', '52', ' ', '19', ' ', '35', ' ', '59', ' ', '21', ' ', '40', ' ', '66', ' ', '23', ' ', '18', ' ', '56', ' ', '21', ' ', '77', ' ', '21', ' ', '22', ' ', '36', ' ', '22', ' ', '588', '', '69.18', 'P'),
('3225032', 'PASS', 'PASS', 'MISRA SAHIL SAMEER ARTI                 ', '40', ' ', '15', ' ', '40', ' ', '47', ' ', '19', ' ', '38', ' ', '50', ' ', '20', ' ', '19', ' ', '40', ' ', '20', ' ', '47', ' ', '20', ' ', '20', ' ', '33', ' ', '21', ' ', '489', '', '57.53', 'P'),
('3225033', 'PASS', 'PASS', 'MOHATE TUSHAR LAXMAN REKHA              ', '32', 'F', '16', 'E', '30', 'E', '40', 'E', '15', 'E', '30', 'E', '40', 'E', '14', 'E', '15', 'E', '23', 'F', '20', 'E', '43', 'E', '18', 'E', '18', 'E', '31', 'E', '19', 'E', '404', '', '47.53', 'F'),
('3225034', 'PASS', 'PASS', '/NADAR NIRMALA DEVI THANGA PANDI PALKANI', '58', 'E', '18', 'E', '38', 'E', '53', 'E', '20', 'E', '38', 'E', '50', 'E', '21', 'E', '17', 'E', '27', 'F', '20', 'E', '57', 'E', '19', 'E', '18', 'E', '32', 'E', '21', 'E', '507', '', '59.65', 'F'),
('3225035', 'PASS', 'PASS', 'NAGARIA JAY ASHOK RENUKA                ', '46', '', '18', '', '24', '', '50', '', '19', '', '39', '', '49', '', '18', '', '21', '', '36', '*', '17', '', '55', '', '19', '', '17', '', '33', '', '20', '', '481', '*', '56.59', 'F'),
('3225036', 'FAIL', 'FAIL', 'NIKAM ANIKET SHIVAJI SUJATA', '00', 'F', '11', 'E', '25', 'E', '27', 'F', '13', 'E', '30', 'E', '25', 'F', '10', 'E', '12', 'E', '21', 'F', '10', 'E', 'AA', '  ', '10', 'E', '17', 'E', '25', 'E', '16', 'E', '252', '', '29.65', 'F'),
('3225037', 'PASS', 'PASS', 'PANCHAL ANILKUMAR MAHENDRAKUMAR BHARATI', '01', 'F', '10', 'E', '38', 'E', '40', 'E', '15', 'E', '20', 'E', '42', 'E', '10', 'E', '05', 'F', '46', 'E', '19', 'E', '43', 'E', '13', 'E', '6', 'F', '32', 'E', '15', 'E', '355', '', '41.76', 'F'),
('3225038', 'FAIL', 'FAIL', '/PANCHAL NAMRATA MAHENDRA KAPILA        ', '29', 'F', '22', 'E', '25', 'E', '40', 'E', '18', 'E', '32', 'E', '58', 'E', '21', 'E', '15', 'E', '16', 'F', '18', 'E', '48', 'E', '20', 'E', '17', 'E', '30', 'E', '17', 'E', '426', '', '50.12', 'F'),
('3225039', 'PASS', 'PASS', '/PANCHAL NEHA RAMESHCHANDRA ARUNA        ', '56', ' ', '19', ' ', '35', ' ', '54', ' ', '21', ' ', '39', ' ', '49', ' ', '22', ' ', '19', ' ', '54', ' ', '21', ' ', '64', ' ', '23', ' ', '23', ' ', '33', ' ', '21', ' ', '553', '', '65.06', 'P'),
('3225040', 'FAIL', 'PASS', '/PANCHAL POONAM DINESHBHAI ARUNA        ', '43', ' ', '22', ' ', '28', ' ', '40', ' ', '18', ' ', '42', ' ', '45', ' ', '22', ' ', '18', ' ', '46', ' ', '22', ' ', '53', ' ', '21', ' ', '20', ' ', '32', ' ', '18', ' ', '490', '', '57.65', 'P'),
('3225041', 'PASS', 'PASS', 'PANDA VIKRAM HARIHAR LALITA             ', '40', ' ', '17', ' ', '30', ' ', '46', ' ', '19', ' ', '37', ' ', '44', ' ', '21', ' ', '16', ' ', '62', ' ', '21', ' ', '51', ' ', '19', ' ', '16', ' ', '27', ' ', '18', ' ', '484', '', '56.94', 'P'),
('3225042', 'PASS', 'PASS', '/PASALKAR PRANALI HARI HARSHADA         ', '48', ' ', '24', ' ', '25', ' ', '60', ' ', '22', ' ', '42', ' ', '69', ' ', '22', ' ', '18', ' ', '48', ' ', '21', ' ', '65', ' ', '21', ' ', '22', ' ', '40', ' ', '21', ' ', '568', '', '66.82', 'P'),
('3225043', 'PASS', 'PASS', '/PATEL BINJAL SHANTILAL REKHA           ', '40', 'E', '15', 'E', '04', 'F', '47', 'E', '17', 'E', '35', 'E', '12', 'F', '13', 'E', '14', 'E', '24', 'F', '17', 'E', '51', 'E', '18', 'E', '21', 'E', '34', 'E', '21', 'E', '383', '', '45.06', 'F'),
('3225044', 'FAIL', 'PASS', '/PATEL MONIKA LAXMAN SARLA              ', '41', ' ', '18', ' ', '25', ' ', '51', ' ', '18', ' ', '33', ' ', '53', ' ', '22', ' ', '16', ' ', '41', ' ', '20', ' ', '40', ' ', '17', ' ', '18', ' ', '27', ' ', '19', ' ', '459', '', '54.00', 'P'),
('3225045', 'PASS', 'PASS', 'PATIL AKSHAY LAXMAN SUVARNA             ', '46', ' ', '21', ' ', '24', ' ', '54', ' ', '17', ' ', '35', ' ', '57', ' ', '19', ' ', '14', ' ', '53', ' ', '17', ' ', '75', ' ', '17', ' ', '18', ' ', '38', ' ', '19', ' ', '524', '', '61.65', 'P'),
('3225046', 'PASS', 'PASS', 'PATIL SUJEET GANJIDHAR CHANDRABHAGA', '23', 'F', '12', 'E', '35', 'E', '43', 'E', '13', 'E', '32', 'E', '41', 'E', '10', 'E', '12', 'E', '43', 'E', '12', 'E', '46', 'E', '11', 'E', '13', 'E', '25', 'E', '13', 'E', '384', '', '45.18', 'F'),
('3225047', 'PASS', 'PASS', 'RAGHVANI VIREN KANJI HARSHA             ', '44', ' ', '17', ' ', '25', ' ', '42', ' ', '18', ' ', '30', ' ', '57', ' ', '13', ' ', '13', ' ', '40', ' ', '16', ' ', '51', ' ', '18', ' ', '14', ' ', '29', ' ', '21', ' ', '448', '', '52.71', 'P'),
('3225048', 'PASS', 'PASS', '/RAICHURA MITTALI DHARMESH NALINI       ', '20', 'F', '13', 'E', '5', 'F', '40', 'E', '17', 'E', '33', 'E', '30', 'F', '13', 'E', '14', 'E', '17', 'F', '15', 'E', '40', 'E', '16', 'E', '20', 'E', '30', 'E', '17', 'E', '340', '', '40.00', 'F'),
('3225049', 'PASS', 'FAIL', 'RASAL VIJAY MADHUKAR RATAN              ', '33', '*', '17', '', '30', '', '40', '', '17', '', '34', '', '40', '', '17', '', '18', '', '41', '', '17', '', '44', '', '16', '', '19', '', '22', '', '19', '', '424', '*', '49.88', 'F'),
('3225050', 'PASS', 'PASS', 'RATHOD ARVIND BHIMRAO RENUKA            ', '46', ' ', '16', ' ', '32', ' ', '58', ' ', '19', ' ', '38', ' ', '65', ' ', '19', ' ', '18', ' ', '66', ' ', '20', ' ', '58', ' ', '19', ' ', '21', ' ', '32', ' ', '14', ' ', '541', '', '63.65', 'P'),
('3225051', 'FAIL', 'PASS', '/RAUT NILAMBARI NILESH ANJALI', '25', 'F', '17', 'E', '23', 'E', '40', 'E', '13', 'E', '15', 'E', '44', 'E', '16', 'E', '16', 'E', '62', 'E', '19', 'E', '40', 'E', '17', 'E', '18', 'E', '28', 'E', '21', 'E', '414', '', '48.71', 'F'),
('3225052', 'PASS', 'PASS', 'SAINI MANDEEP SINGH MANMOHAN SINGH SARBJEET KAUR', '27', 'F', '19', 'E', '30', 'E', '50', 'E', '15', 'E', '29', 'E', '45', 'E', '19', 'E', '16', 'E', '54', 'E', '18', 'E', '41', 'E', '19', 'E', '20', 'E', '26', 'E', '19', 'E', '447', '', '52.59', 'F'),
('3225053', 'FAIL', 'FAIL', 'SAMANI HARSH ATUL BHAVANA               ', '21', 'F', '18', 'E', '22', 'E', '40', 'E', '14', 'E', '16', 'E', '53', 'E', '20', 'E', '16', 'E', '40', 'E', '15', 'E', '56', 'E', '18', 'E', '20', 'E', '25', 'E', '17', 'E', '411', '', '48.35', 'F'),
('3225054', 'PASS', 'PASS', 'SAPHALE CHAITANYA PRADIP PRIYA', '15', 'F', '12', 'E', '38', 'E', '32', 'F', '13', 'E', '38', 'E', '08', 'F', '10', 'E', '12', 'E', '17', 'F', '13', 'E', '40', 'E', '10', 'E', '19', 'E', '22', 'E', '13', 'E', '312', '', '36.71', 'F'),
('3225055', 'PASS', 'PASS', 'SARAK SANDIP POPAT CHHAYA', '10', 'F', '12', 'E', '25', 'E', '40', 'E', '13', 'E', '29', 'E', '17', 'F', '13', 'E', '11', 'E', '25', 'F', '13', 'E', 'AA', '  ', '13', 'E', '6', 'F', '29', 'E', '14', 'E', '270', '', '31.76', 'F'),
('3225056', 'PASS', 'PASS', 'SAWANT GAURAV BALIRAM ANAGHA            ', '45', ' ', '20', ' ', '30', ' ', '58', ' ', '16', ' ', '35', ' ', '60', ' ', '17', ' ', '18', ' ', '76', ' ', '22', ' ', '64', ' ', '19', ' ', '19', ' ', '32', ' ', '19', ' ', '550', '', '64.71', 'P'),
('3225057', 'PASS', 'PASS', '/SAWANT KARISHMA PREMANAND ARCHANA      ', '48', ' ', '23', ' ', '30', ' ', '58', ' ', '19', ' ', '38', ' ', '61', ' ', '21', ' ', '18', ' ', '66', ' ', '20', ' ', '53', ' ', '21', ' ', '22', ' ', '37', ' ', '21', ' ', '556', '', '65.41', 'P'),
('3225058', 'PASS', 'PASS', 'SHAH DHRUMIL SHAILESH JAGRUTI           ', '54', ' ', '19', ' ', '30', ' ', '52', ' ', '16', ' ', '35', ' ', '58', ' ', '16', ' ', '15', ' ', '54', ' ', '12', ' ', '56', ' ', '20', ' ', '18', ' ', '36', ' ', '20', ' ', '511', '', '60.12', 'P'),
('3225059', 'FAIL', 'FAIL', 'SHAH KUNAL VIPUL NISHITA                ', '44', 'E', '18', 'E', '05', 'F', '40', 'E', '17', 'E', '30', 'E', '44', 'E', '18', 'E', '15', 'E', '64', 'E', '17', 'E', '53', 'E', '19', 'E', '20', 'E', '32', 'E', '16', 'E', '452', '', '53.18', 'P'),
('3225060', 'FAIL', 'PASS', 'SHAH PARTH ANISH PRITI                  ', '31', 'F', '18', 'E', '25', 'E', '49', 'E', '16', 'E', '15', 'E', '43', 'E', '15', 'E', '14', 'E', '34', 'F', '14', 'E', '40', 'E', '16', 'E', '18', 'E', '32', 'E', '18', 'E', '398', '', '46.82', 'F'),
('3225061', 'PASS', 'PASS', 'SHAH RISHABH SHAILESH RAKSHA            ', '32', 'F', '17', 'E', '32', 'E', '40', 'E', '19', 'E', '38', 'E', '34', 'F', '14', 'E', '19', 'E', '63', 'E', '15', 'E', '45', 'E', '14', 'E', '19', 'E', '34', 'E', '19', 'E', '454', '', '53.41', 'F'),
('3225062', 'PASS', 'FAIL', 'SHANBHAG VARUN ABHAY SANDHYA            ', '26', 'F', '14', 'E', '44', 'E', '52', 'E', '17', 'E', '35', 'E', '32', 'F', '15', 'E', '18', 'E', '40', 'E', '18', 'E', '40', 'E', '17', 'E', '21', 'E', '38', 'E', '19', 'E', '446', '', '52.47', 'F'),
('3225063', 'PASS', 'PASS', 'SHENDE SANGRAM RAJARAM HAUSA            ', '49', ' ', '17', ' ', '35', ' ', '58', ' ', '19', ' ', '45', ' ', '68', ' ', '19', ' ', '22', ' ', '58', ' ', '20', ' ', '42', ' ', '21', ' ', '21', ' ', '25', ' ', '17', ' ', '536', '', '63.06', 'P'),
('3225064', 'PASS', 'PASS', '/SHINDE APURVA RAVINDRA RASHMI           ', '41', ' ', '15', ' ', '28', ' ', '58', ' ', '16', ' ', '30', ' ', '65', ' ', '21', ' ', '22', ' ', '67', ' ', '22', ' ', '62', ' ', '20', ' ', '20', ' ', '35', ' ', '20', ' ', '542', '', '63.76', 'P'),
('3225065', 'FAIL', 'FAIL', '/SONAWANE MAYURI RAJARAM ALKA           ', '40', '', '15', '', '35', '', '43', '', '15', '', '33', '', '33', '*', '17', '', '16', '', '45', '', '19', '', '47', '', '16', '', '19', '', '34', '', '18', '', '445', '*', '52.35', 'F'),
('3225066', 'PASS', 'PASS', 'SONI MAULIK SURESH DIMPLE               ', '26', 'F', '21', 'E', '30', 'E', '45', 'E', '22', 'E', '40', 'E', '52', 'E', '18', 'E', '16', 'E', '43', 'E', '19', 'E', '51', 'E', '22', 'E', '22', 'E', '34', 'E', '19', 'E', '480', '', '56.47', 'F'),
('3225067', 'FAIL', 'FAIL', 'SONWALKAR AMIT KISAN SUJATA             ', '18', 'F', '16', 'E', '30', 'E', '50', 'E', '19', 'E', '35', 'E', '35', 'F', '17', 'E', '15', 'E', '26', 'F', '19', 'E', '58', 'E', '23', 'E', '22', 'E', '32', 'E', '22', 'E', '437', '', '51.41', 'F'),
('3225068', 'PASS', 'FAIL', 'TANNA RAJ UMESH SUNITA                  ', '23', 'F', '16', 'E', '35', 'E', '24', 'F', '19', 'E', '32', 'E', '41', 'E', '13', 'E', '12', 'E', '00', 'F', '11', 'E', '20', 'F', '18', 'E', '18', 'E', '29', 'E', '18', 'E', '329', '', '38.71', 'F'),
('3225069', 'PASS', 'PASS', '/THAKKER KHYATI VINOD POONAM            ', '25', 'F', '18', 'E', '32', 'E', '46', 'E', '17', 'E', '34', 'E', '50', 'E', '18', 'E', '17', 'E', '45', 'E', '19', 'E', '35', 'F', '20', 'E', '17', 'E', '32', 'E', '17', 'E', '442', '', '52.00', 'F'),
('3225070', 'PASS', 'PASS', 'TIWARI ASHUTOSH VIJAYSHANKAR KANCHAN    ', '49', ' ', '17', ' ', '40', ' ', '40', ' ', '19', ' ', '45', ' ', '59', ' ', '17', ' ', '14', ' ', '66', ' ', '20', ' ', '62', ' ', '23', ' ', '23', ' ', '40', ' ', '20', ' ', '554', '', '65.18', 'P'),
('3225071', 'PASS', 'PASS', 'TRIVEDI DEVANSH HAREKRISHNA UMA         ', '69', ' ', '23', ' ', '38', ' ', '60', ' ', '24', ' ', '45', ' ', '77', ' ', '24', ' ', '23', ' ', '72', ' ', '24', ' ', '71', ' ', '24', ' ', '22', ' ', '42', ' ', '22', ' ', '660', '', '77.65', 'P'),
('3225072', 'PASS', 'PASS', 'VIRA DHANIL CHETAN BHAVANA              ', '29', 'F', '21', 'E', '35', 'E', '42', 'E', '20', 'E', '40', 'E', '48', 'E', '19', 'E', '15', 'E', '46', 'E', '18', 'E', '40', 'E', '20', 'E', '22', 'E', '32', 'E', '21', 'E', '468', '', '55.06', 'F'),
('3225073', 'PASS', 'PASS', 'VISHWEKAR ADITYA CHANDRAKANT NEHA       ', '58', ' ', '18', ' ', '35', ' ', '61', ' ', '20', ' ', '44', ' ', '67', ' ', '18', ' ', '21', ' ', '41', ' ', '20', ' ', '73', ' ', '20', ' ', '20', ' ', '40', ' ', '22', ' ', '578', '', '68.00', 'P'),
('3225074', 'PASS', 'PASS', 'YADAV ASHISH KUMAR MAHENDRA GEETA       ', '40', ' ', '16', ' ', '30', ' ', '42', ' ', '16', ' ', '39', ' ', '54', ' ', '17', ' ', '15', ' ', '50', ' ', '19', ' ', '51', ' ', '17', ' ', '20', ' ', '34', ' ', '17', ' ', '477', '', '56.12', 'P'),
('3225075', 'PASS', 'PASS', 'YADAV RAHUL SATIRAM GIRIJA              ', '05', 'F', '15', 'E', '25', 'E', '40', 'E', '15', 'E', '36', 'E', '10', 'F', '16', 'E', '12', 'E', '42', 'E', '15', 'E', '09', 'F', '13', 'E', '18', 'E', '23', 'E', '15', 'E', '309', '', '36.35', 'F');

-- --------------------------------------------------------

--
-- Table structure for table `sem_vi`
--

CREATE TABLE IF NOT EXISTS `sem_vi` (
  `seat_no` varchar(20) NOT NULL,
  `sem_III_result` varchar(10) DEFAULT NULL,
  `sem_IV_result` varchar(10) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `pp1_wr` int(50) DEFAULT NULL,
  `pp1_wr_info` varchar(10) DEFAULT NULL,
  `pp1_tw` int(50) DEFAULT NULL,
  `pp1_tw_info` varchar(10) DEFAULT NULL,
  `pp1_pr_or` int(50) DEFAULT NULL,
  `pp1_pr_or_info` varchar(10) DEFAULT NULL,
  `pp2_wr` int(50) DEFAULT NULL,
  `pp2_wr_info` varchar(10) DEFAULT NULL,
  `pp2_tw` int(50) DEFAULT NULL,
  `pp2_tw_info` varchar(10) DEFAULT NULL,
  `pp2_pr_or` int(50) DEFAULT NULL,
  `pp2_pr_or_info` varchar(10) DEFAULT NULL,
  `pp3_wr` int(50) DEFAULT NULL,
  `pp3_wr_info` varchar(10) DEFAULT NULL,
  `pp3_tw` int(50) DEFAULT NULL,
  `pp3_tw_info` varchar(10) DEFAULT NULL,
  `pp3_pr_or` int(50) DEFAULT NULL,
  `pp3_pr_or_info` varchar(10) DEFAULT NULL,
  `pp4_wr` int(50) DEFAULT NULL,
  `pp4_wr_info` varchar(10) DEFAULT NULL,
  `pp4_tw` int(50) DEFAULT NULL,
  `pp4_tw_info` varchar(10) DEFAULT NULL,
  `pp4_pr_or` int(50) DEFAULT NULL,
  `pp4_pr_or_info` varchar(10) DEFAULT NULL,
  `pp5_wr` int(50) DEFAULT NULL,
  `pp5_wr_info` varchar(10) DEFAULT NULL,
  `pp5_tw` int(50) DEFAULT NULL,
  `pp5_tw_info` varchar(10) DEFAULT NULL,
  `pp5_pr_or` int(50) DEFAULT NULL,
  `pp5_pr_or_info` varchar(10) DEFAULT NULL,
  `pp6_tw` int(50) DEFAULT NULL,
  `pp6_tw_info` varchar(10) DEFAULT NULL,
  `pp6_pr_or` int(50) DEFAULT NULL,
  `pp6_pr_or_info` varchar(10) DEFAULT NULL,
  `sem6_total` int(50) DEFAULT NULL,
  `sem6_total_info` varchar(10) DEFAULT NULL,
  `sem5_total` int(50) DEFAULT NULL,
  `sem5_total_info` varchar(10) DEFAULT NULL,
  `total` int(50) DEFAULT NULL,
  `percentage` varchar(50) DEFAULT NULL,
  `remark` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`seat_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sem_vi`
--

INSERT INTO `sem_vi` (`seat_no`, `sem_III_result`, `sem_IV_result`, `name`, `pp1_wr`, `pp1_wr_info`, `pp1_tw`, `pp1_tw_info`, `pp1_pr_or`, `pp1_pr_or_info`, `pp2_wr`, `pp2_wr_info`, `pp2_tw`, `pp2_tw_info`, `pp2_pr_or`, `pp2_pr_or_info`, `pp3_wr`, `pp3_wr_info`, `pp3_tw`, `pp3_tw_info`, `pp3_pr_or`, `pp3_pr_or_info`, `pp4_wr`, `pp4_wr_info`, `pp4_tw`, `pp4_tw_info`, `pp4_pr_or`, `pp4_pr_or_info`, `pp5_wr`, `pp5_wr_info`, `pp5_tw`, `pp5_tw_info`, `pp5_pr_or`, `pp5_pr_or_info`, `pp6_tw`, `pp6_tw_info`, `pp6_pr_or`, `pp6_pr_or_info`, `sem6_total`, `sem6_total_info`, `sem5_total`, `sem5_total_info`, `total`, `percentage`, `remark`) VALUES
('3126001', 'PASS', 'PASS', '/ADEP KAVITA VASUDEV HEMALATHA', 47, ' ', 16, ' ', 21, ' ', 47, ' ', 18, ' ', 17, ' ', 48, ' ', 17, ' ', 39, ' ', 40, ' ', 17, ' ', 18, ' ', 44, ' ', 18, ' ', 18, ' ', 19, ' ', 19, ' ', 463, ' ', 460, '+', 923, '54.29', 'S'),
('3126002', 'PASS', 'FAIL', 'AMBHORE HARSHAL SHASHIKANT MANGALA      ', 41, ' ', 14, ' ', 38, ' ', 40, ' ', 12, ' ', 16, ' ', 57, ' ', 15, ' ', 38, ' ', 59, ' ', 12, ' ', 17, ' ', 42, ' ', 17, ' ', 24, ' ', 20, ' ', 21, ' ', 483, ' ', 447, '+', 930, '54.71', 'RS4'),
('3126003', 'PASS', 'PASS', '/AMRUTKAR SNEHAL DILIP VIDYA            ', 57, ' ', 20, ' ', 34, ' ', 56, ' ', 17, ' ', 18, ' ', 57, ' ', 18, ' ', 35, ' ', 57, ' ', 18, ' ', 17, ' ', 46, ' ', 21, ' ', 21, ' ', 18, ' ', 16, ' ', 526, ' ', 468, '+', 994, '58.47', 'S'),
('3126004', 'PASS', 'PASS', 'APSINGEKAR ABHAY SHRINIVASRAO SUNANDA   ', 62, ' ', 18, ' ', 40, ' ', 53, ' ', 18, ' ', 21, ' ', 63, ' ', 17, ' ', 38, ' ', 63, ' ', 19, ' ', 17, ' ', 43, ' ', 20, ' ', 22, ' ', 22, ' ', 20, ' ', 556, ' ', 516, '+', 1072, '63.06', 'I'),
('3126005', 'PASS', 'PASS', 'BANDIVADEKAR AKSHAY ARVIND RUPALI       ', 70, ' ', 21, ' ', 45, ' ', 68, ' ', 22, ' ', 23, ' ', 57, ' ', 23, ' ', 47, ' ', 67, ' ', 23, ' ', 22, ' ', 57, ' ', 23, ' ', 21, ' ', 23, ' ', 22, ' ', 634, ' ', 609, '+', 1243, '73.12', 'I'),
('3126006', 'PASS', 'PASS', '/BARNA PRIYANKA NARESH BHAWANA          ', 56, ' ', 20, ' ', 46, ' ', 46, ' ', 19, ' ', 22, ' ', 61, ' ', 20, ' ', 47, ' ', 54, ' ', 14, ' ', 18, ' ', 48, ' ', 20, ' ', 22, ' ', 21, ' ', 23, ' ', 557, ' ', 576, '+', 1133, '66.65', 'I'),
('3126007', 'PASS', 'PASS', 'BHANUSHALI JAGDISH GOVIND LILAVANTI     ', 68, ' ', 19, ' ', 45, ' ', 65, ' ', 20, ' ', 22, ' ', 59, ' ', 20, ' ', 45, ' ', 67, ' ', 19, ' ', 19, ' ', 60, ' ', 19, ' ', 22, ' ', 21, ' ', 21, ' ', 611, ' ', 572, '+', 1183, '69.59', 'I'),
('3126008', 'PASS', 'PASS', 'BHANUSHALI MIT SHANKARLAL SHANTI        ', 58, ' ', 20, ' ', 40, ' ', 55, ' ', 19, ' ', 21, ' ', 61, ' ', 12, ' ', 40, ' ', 64, ' ', 20, ' ', 19, ' ', 57, ' ', 20, ' ', 22, ' ', 21, ' ', 21, ' ', 570, ' ', 536, '+', 1106, '65.06', 'I'),
('3126009', 'PASS', 'PASS', '/BHANUSHALI POOJA MANOJ NAMRATA         ', 65, ' ', 16, ' ', 42, ' ', 55, ' ', 16, ' ', 22, ' ', 68, ' ', 19, ' ', 44, ' ', 71, ' ', 17, ' ', 17, ' ', 47, ' ', 17, ' ', 23, ' ', 21, ' ', 22, ' ', 582, ' ', 553, '+', 1135, '66.76', 'I'),
('3126010', 'PASS', 'PASS', 'BHANUSHALI RITESH SHANKARLAL ANJANABEN  ', 56, ' ', 15, ' ', 40, ' ', 42, ' ', 14, ' ', 21, ' ', 51, ' ', 16, ' ', 40, ' ', 66, ' ', 18, ' ', 17, ' ', 46, ' ', 18, ' ', 21, ' ', 12, ' ', 12, ' ', 505, ' ', 504, '+', 1009, '59.35', 'S'),
('3126011', 'PASS', 'PASS', 'BHATIA ANUJ RAMESH BHARTI               ', 34, '*', 21, ' ', 44, ' ', 61, ' ', 16, ' ', 22, ' ', 48, ' ', 15, ' ', 42, ' ', 57, ' ', 20, ' ', 20, ' ', 43, ' ', 21, ' ', 22, ' ', 22, ' ', 23, ' ', 531, '*', 526, '+', 1057, '62.18', 'I,O.5045'),
('3126012', 'PASS', 'PASS', 'BHAVE ANIKET PRASHANT VISHAKHA          ', 62, ' ', 19, ' ', 43, ' ', 51, ' ', 18, ' ', 22, ' ', 66, ' ', 17, ' ', 45, ' ', 68, ' ', 19, ' ', 19, ' ', 62, ' ', 21, ' ', 23, ' ', 22, ' ', 22, ' ', 599, ' ', 639, '+', 1238, '72.82', 'I'),
('3126013', 'PASS', 'PASS', 'BHOIRA SAUD MOHAMED ILYAS WAHEDA        ', 64, ' ', 19, ' ', 45, ' ', 69, ' ', 20, ' ', 23, ' ', 54, ' ', 17, ' ', 46, ' ', 68, ' ', 20, ' ', 20, ' ', 56, ' ', 21, ' ', 24, ' ', 23, ' ', 22, ' ', 611, ' ', 647, '+', 1258, '74.00', 'I'),
('3126014', 'PASS', 'PASS', 'BIHANI CHANDRESH GOVIND SADHANA         ', 53, ' ', 18, ' ', 47, ' ', 52, ' ', 14, ' ', 21, ' ', 57, ' ', 18, ' ', 40, ' ', 45, ' ', 19, ' ', 17, ' ', 43, ' ', 19, ' ', 23, ' ', 21, ' ', 23, ' ', 530, ' ', 567, '+', 1097, '64.53', 'I'),
('3126015', 'PASS', 'PASS', 'BOLKE SAMEER GANPAT SONABAI             ', 53, ' ', 20, ' ', 40, ' ', 70, ' ', 13, ' ', 20, ' ', 56, ' ', 17, ' ', 40, ' ', 67, ' ', 20, ' ', 18, ' ', 48, ' ', 20, ' ', 22, ' ', 21, ' ', 23, ' ', 568, ' ', 549, '+', 1117, '65.71', 'I'),
('3126016', 'PASS', 'PASS', '/CHANDAN DEVANSHI PANKAJ GEETA          ', 73, ' ', 16, ' ', 42, ' ', 60, ' ', 16, ' ', 21, ' ', 63, ' ', 18, ' ', 42, ' ', 60, ' ', 17, ' ', 18, ' ', 57, ' ', 17, ' ', 20, ' ', 21, ' ', 22, ' ', 583, ' ', 555, '+', 1138, '66.94', 'I'),
('3126017', 'PASS', 'PASS', '/CHOUDHARY KOMAL NANDU REKHA            ', 74, ' ', 21, ' ', 46, ' ', 70, ' ', 23, ' ', 21, ' ', 63, ' ', 24, ' ', 48, ' ', 74, ' ', 24, ' ', 23, ' ', 58, ' ', 22, ' ', 23, ' ', 23, ' ', 22, ' ', 659, ' ', 675, '+', 1334, '78.47', 'I'),
('3126018', 'PASS', 'PASS', 'DHANDE PUSHKAR GENDULAL KUNDA           ', 30, 'F', 16, 'E', 40, 'E', 52, 'E', 14, 'E', 19, 'E', 43, 'E', 15, 'E', 38, 'E', 49, 'E', 17, 'E', 17, 'E', 40, 'E', 20, 'E', 22, 'E', 21, 'E', 20, 'E', 473, ' ', 418, 'x', 891, '52.41', 'F'),
('3126019', 'PASS', 'PASS', 'DHOPEY KUNAL VIJAY SARALA               ', 64, ' ', 21, ' ', 40, ' ', 73, ' ', 18, ' ', 23, ' ', 68, ' ', 21, ' ', 42, ' ', 61, ' ', 21, ' ', 19, ' ', 41, ' ', 21, ' ', 22, ' ', 23, ' ', 22, ' ', 600, ' ', 532, '+', 1132, '66.59', 'I'),
('3126020', 'PASS', 'PASS', '/DIGHE SHRADDHA VIJAY SANDHYA           ', 58, ' ', 20, ' ', 38, ' ', 55, ' ', 16, ' ', 20, ' ', 66, ' ', 18, ' ', 40, ' ', 53, ' ', 19, ' ', 20, ' ', 44, ' ', 20, ' ', 21, ' ', 20, ' ', 19, ' ', 547, ' ', 566, '+', 1113, '65.47', 'I'),
('3126021', 'PASS', 'PASS', 'DONGARE NILAY SANJEEV SHARMILA          ', 44, 'E', 13, 'E', 12, 'F', 45, 'E', 10, 'E', 15, 'E', 41, 'E', 13, 'E', 38, 'E', 44, 'E', 11, 'E', 16, 'E', 29, 'F', 13, 'E', 21, 'E', 17, 'E', 21, 'E', 403, ' ', 430, '+', 833, '49.00', 'F'),
('3126022', 'PASS', 'PASS', 'FERNANDES RYAN ROBERT JOVITA            ', 72, ' ', 18, ' ', 39, ' ', 63, ' ', 14, ' ', 18, ' ', 76, ' ', 18, ' ', 44, ' ', 65, ' ', 20, ' ', 19, ' ', 58, ' ', 21, ' ', 22, ' ', 22, ' ', 21, ' ', 610, ' ', 585, '+', 1195, '70.29', 'I'),
('3126023', 'PASS', 'PASS', 'GADHIA HARSHAL DHANSUKH RITA            ', 60, ' ', 15, ' ', 42, ' ', 74, ' ', 17, ' ', 20, ' ', 59, ' ', 17, ' ', 44, ' ', 57, ' ', 19, ' ', 21, ' ', 46, ' ', 20, ' ', 21, ' ', 21, ' ', 22, ' ', 575, ' ', 569, '+', 1144, '67.29', 'I'),
('3126024', 'PASS', 'PASS', 'GAJRA AJAY NAVIN PREMILA                ', 71, ' ', 21, ' ', 44, ' ', 56, ' ', 19, ' ', 21, ' ', 56, ' ', 19, ' ', 45, ' ', 59, ' ', 21, ' ', 22, ' ', 57, ' ', 20, ' ', 22, ' ', 21, ' ', 21, ' ', 595, ' ', 534, '+', 1129, '66.41', 'I'),
('3126025', 'PASS', 'PASS', '/GOHIL ANKITA GIRISH USHA               ', 67, ' ', 23, ' ', 44, ' ', 40, ' ', 22, ' ', 21, ' ', 65, ' ', 24, ' ', 48, ' ', 68, ' ', 24, ' ', 23, ' ', 43, ' ', 24, ' ', 21, ' ', 22, ' ', 21, ' ', 600, ' ', 614, '+', 1214, '71.41', 'I'),
('3126026', 'PASS', 'PASS', 'GOSWAMI VISHAL VIPIN PREETI             ', 62, ' ', 17, ' ', 38, ' ', 70, ' ', 14, ' ', 18, ' ', 52, ' ', 18, ' ', 40, ' ', 65, ' ', 19, ' ', 19, ' ', 52, ' ', 21, ' ', 20, ' ', 20, ' ', 21, ' ', 566, ' ', 545, '+', 1111, '65.35', 'I'),
('3126027', 'PASS', 'PASS', 'GUPTA ANIL KUMAR JAMUNA PRASAD MANJU    ', 51, ' ', 16, ' ', 41, ' ', 43, ' ', 12, ' ', 15, ' ', 55, ' ', 17, ' ', 40, ' ', 46, ' ', 17, ' ', 18, ' ', 40, ' ', 21, ' ', 21, ' ', 21, ' ', 21, ' ', 495, ' ', 457, '+', 952, '56.00', 'S'),
('3126028', 'PASS', 'PASS', 'GUPTA PAVAN HARISHANKER NANHIDEVI       ', 41, 'E', 16, 'E', 11, 'F', 40, 'E', 12, 'E', 17, 'E', 55, 'E', 17, 'E', 38, 'E', 47, 'E', 12, 'E', 11, 'E', 33, 'F', 15, 'E', 18, 'E', 11, 'E', 11, 'E', 405, ' ', 444, '+', 849, '49.94', 'F'),
('3126029', 'PASS', 'PASS', 'HEGDE SURAJ NAMDEV SHOBHA               ', 70, ' ', 21, ' ', 40, ' ', 69, ' ', 21, ' ', 21, ' ', 64, ' ', 21, ' ', 40, ' ', 70, ' ', 20, ' ', 20, ' ', 57, ' ', 20, ' ', 21, ' ', 20, ' ', 20, ' ', 615, ' ', 617, '+', 1232, '72.47', 'I'),
('3126030', 'PASS', 'PASS', '/JADHAV NIRMALA NARAYAN REKHA           ', 55, ' ', 22, ' ', 35, ' ', 64, ' ', 22, ' ', 21, ' ', 66, ' ', 21, ' ', 38, ' ', 61, ' ', 23, ' ', 23, ' ', 45, ' ', 23, ' ', 20, ' ', 22, ' ', 20, ' ', 581, ' ', 545, '+', 1126, '66.24', 'I'),
('3126031', 'PASS', 'PASS', 'JADHAV SAURABH ASHOK MANDAKINI          ', 42, ' ', 18, ' ', 34, ' ', 43, ' ', 14, ' ', 19, ' ', 49, ' ', 18, ' ', 40, ' ', 53, ' ', 18, ' ', 15, ' ', 35, '*', 21, ' ', 20, ' ', 18, ' ', 16, ' ', 473, '*', 465, '+', 938, '55.18', 'S,O.5045'),
('3126032', 'PASS', 'PASS', 'JAIN NIKHIL VINODKUMAR VIJAYLAXMI       ', 45, ' ', 16, ' ', 34, ' ', 48, ' ', 13, ' ', 16, ' ', 45, ' ', 16, ' ', 38, ' ', 50, ' ', 17, ' ', 18, ' ', 51, ' ', 19, ' ', 20, ' ', 20, ' ', 22, ' ', 488, ' ', 459, '+', 947, '55.71', 'S'),
('3126033', 'PASS', 'PASS', '/JATHAR PRAJAKTA SURYAKANT SUNANDA      ', 52, ' ', 15, ' ', 33, ' ', 75, ' ', 19, ' ', 18, ' ', 50, ' ', 15, ' ', 38, ' ', 53, ' ', 16, ' ', 18, ' ', 45, ' ', 18, ' ', 20, ' ', 13, ' ', 14, ' ', 512, ' ', 497, '+', 1009, '59.35', 'S'),
('3126034', 'PASS', 'PASS', 'JOSHI RAHUL RAMANAND SUJATA             ', 64, ' ', 18, ' ', 42, ' ', 55, ' ', 13, ' ', 18, ' ', 61, ' ', 19, ' ', 45, ' ', 70, ' ', 19, ' ', 19, ' ', 57, ' ', 21, ' ', 22, ' ', 19, ' ', 20, ' ', 582, ' ', 579, '+', 1161, '68.29', 'I'),
('3126035', 'PASS', 'PASS', '/KADAM POOJA SURESH ANITA               ', 68, ' ', 19, ' ', 35, ' ', 47, ' ', 19, ' ', 18, ' ', 67, ' ', 19, ' ', 42, ' ', 50, ' ', 21, ' ', 20, ' ', 44, ' ', 20, ' ', 22, ' ', 22, ' ', 21, ' ', 554, ' ', 564, '+', 1118, '65.76', 'I'),
('3126036', 'PASS', 'PASS', 'KARANI DHAVAL MANOJ JAYASHREE           ', 67, ' ', 19, ' ', 42, ' ', 70, ' ', 19, ' ', 21, ' ', 66, ' ', 21, ' ', 36, ' ', 71, ' ', 19, ' ', 17, ' ', 49, ' ', 21, ' ', 22, ' ', 21, ' ', 22, ' ', 603, ' ', 592, '+', 1195, '70.29', 'I'),
('3126037', 'PASS', 'PASS', 'KAUL KANAV KAPIL ASHA                   ', 67, ' ', 20, ' ', 42, ' ', 59, ' ', 16, ' ', 21, ' ', 64, ' ', 21, ' ', 36, ' ', 47, ' ', 20, ' ', 20, ' ', 51, ' ', 19, ' ', 21, ' ', 20, ' ', 19, ' ', 563, ' ', 601, '+', 1164, '68.47', 'I'),
('3126038', 'PASS', 'PASS', '/KOLI SHRADDHA MOHAN SMITA              ', 62, 'E', 15, 'E', 21, 'E', 68, 'E', 11, 'E', 5, 'F', 55, 'E', 12, 'E', 12, 'F', 67, 'E', 10, 'E', 4, 'F', 41, 'E', 12, 'E', 4, 'F', 10, 'E', 5, 'F', 414, ' ', 468, '+', 882, '51.88', 'F'),
('3126039', 'PASS', 'PASS', '/KOTHARI SHEETAL JAYESH DAKSHA          ', 66, ' ', 16, ' ', 34, ' ', 69, ' ', 13, ' ', 19, ' ', 67, ' ', 19, ' ', 38, ' ', 67, ' ', 16, ' ', 18, ' ', 50, ' ', 17, ' ', 20, ' ', 20, ' ', 21, ' ', 570, ' ', 539, '+', 1109, '65.24', 'I'),
('3126040', 'PASS', 'PASS', '/LAD SHRUTIKA NEELKANTH GEETA           ', 64, ' ', 20, ' ', 40, ' ', 64, ' ', 20, ' ', 20, ' ', 65, ' ', 18, ' ', 37, ' ', 61, ' ', 21, ' ', 18, ' ', 43, ' ', 21, ' ', 21, ' ', 20, ' ', 20, ' ', 573, ' ', 505, '+', 1078, '63.41', 'I'),
('3126041', 'PASS', 'PASS', 'LIMAYE SOUMITRA CHANDRAKANT ALKA        ', 64, ' ', 20, ' ', 41, ' ', 62, ' ', 21, ' ', 20, ' ', 70, ' ', 22, ' ', 43, ' ', 64, ' ', 21, ' ', 22, ' ', 47, ' ', 23, ' ', 21, ' ', 23, ' ', 23, ' ', 607, ' ', 580, '+', 1187, '69.82', 'I'),
('3126042', 'PASS', 'PASS', 'MALKAR NITIN MADHUKAR MAI               ', 44, 'E', 15, 'E', 41, 'E', 22, 'F', 15, 'E', 18, 'E', 58, 'E', 18, 'E', 42, 'E', 41, 'E', 20, 'E', 18, 'E', 40, 'E', 19, 'E', 20, 'E', 19, 'E', 18, 'E', 468, ' ', 463, '+', 931, '54.76', 'F'),
('3126043', 'PASS', 'PASS', '/MANE ASMITA VILAS SUNITA               ', 52, 'E', 11, 'E', 10, 'F', 25, 'F', 15, 'E', 14, 'E', 67, 'E', 12, 'E', 32, 'E', 47, 'E', 11, 'E', 17, 'E', 45, 'E', 18, 'E', 19, 'E', 12, 'E', 13, 'E', 420, ' ', 458, 'x', 878, '51.65', 'F'),
('3126044', 'PASS', 'PASS', 'MANE NIKHIL SHRIMANT MAYA               ', 41, ' ', 18, ' ', 40, ' ', 32, '*', 17, ' ', 17, ' ', 59, ' ', 16, ' ', 40, ' ', 43, ' ', 21, ' ', 18, ' ', 44, ' ', 21, ' ', 20, ' ', 20, ' ', 19, ' ', 486, '*', 496, '+', 982, '57.76', 'S,O.5045'),
('3126045', 'PASS', 'PASS', '/MANE SHRUTI SANDIP GAURI               ', 40, 'E', 16, 'E', 34, 'E', 40, 'E', 20, 'E', 19, 'E', 49, 'E', 20, 'E', 44, 'E', 40, 'E', 18, 'E', 19, 'E', 27, 'F', 20, 'E', 21, 'E', 20, 'E', 21, 'E', 468, ' ', 496, '+', 964, '56.71', 'F'),
('3126046', 'PASS', 'PASS', '/MARNE KRUTIKA CHANDRAKANT SHARDA       ', 75, ' ', 19, ' ', 41, ' ', 72, ' ', 20, ' ', 23, ' ', 69, ' ', 19, ' ', 42, ' ', 72, ' ', 18, ' ', 20, ' ', 50, ' ', 19, ' ', 20, ' ', 19, ' ', 21, ' ', 619, ' ', 604, '+', 1223, '71.94', 'I'),
('3126047', 'PASS', 'PASS', '/MAURYA PINKI RAMAWADH SAVITRI          ', 49, ' ', 22, ' ', 44, ' ', 65, ' ', 21, ' ', 19, ' ', 63, ' ', 19, ' ', 44, ' ', 70, ' ', 23, ' ', 20, ' ', 44, ' ', 24, ' ', 22, ' ', 22, ' ', 22, ' ', 593, ' ', 574, '+', 1167, '68.65', 'I'),
('3126048', 'PASS', 'PASS', 'MODI ASHUTOSH MUKESH DHARMISTHA         ', 45, 'E', 10, 'E', 12, 'F', 40, 'E', 10, 'E', 5, 'F', 40, 'E', 12, 'E', 11, 'F', 47, 'E', 10, 'E', 2, 'F', 40, 'E', 11, 'E', 3, 'F', 14, 'E', 5, 'F', 317, ' ', 432, 'x ', 749, '44.06', 'F'),
('3126049', 'PASS', 'PASS', 'MUKHILAN VARADARAJAN RANI               ', 55, ' ', 20, ' ', 44, ' ', 54, ' ', 19, ' ', 21, ' ', 65, ' ', 19, ' ', 45, ' ', 57, ' ', 20, ' ', 20, ' ', 40, ' ', 19, ' ', 22, ' ', 20, ' ', 21, ' ', 561, ' ', 566, '+', 1127, '66.29', 'I'),
('3126050', 'PASS', 'PASS', '/NADAR DIVYA ANBALAGAN REGINA           ', 61, ' ', 22, ' ', 47, ' ', 40, ' ', 20, ' ', 20, ' ', 58, ' ', 22, ' ', 46, ' ', 59, ' ', 21, ' ', 19, ' ', 50, ' ', 24, ' ', 20, ' ', 19, ' ', 19, ' ', 567, ' ', 580, '+', 1147, '67.47', 'I'),
('3126051', 'PASS', 'PASS', 'NANAWARE AMOL MADHUKAR SANGITA          ', 55, ' ', 19, ' ', 46, ' ', 46, ' ', 19, ' ', 20, ' ', 58, ' ', 20, ' ', 38, ' ', 49, ' ', 17, ' ', 20, ' ', 41, ' ', 20, ' ', 20, ' ', 21, ' ', 20, ' ', 529, ' ', 511, '+', 1040, '61.18', 'I'),
('3126052', 'PASS', 'PASS', '/NEHETE PRITAM MOHAN REKHA              ', 57, ' ', 17, ' ', 39, ' ', 53, ' ', 20, ' ', 21, ' ', 65, ' ', 18, ' ', 38, ' ', 61, ' ', 18, ' ', 18, ' ', 44, ' ', 18, ' ', 19, ' ', 19, ' ', 20, ' ', 545, ' ', 557, '+', 1102, '64.82', 'I'),
('3126053', 'PASS', 'PASS', '/NIMBALKAR  RASHMI VIVEKANAND VIDYA     ', 59, ' ', 17, ' ', 47, ' ', 56, ' ', 13, ' ', 19, ' ', 69, ' ', 18, ' ', 42, ' ', 64, ' ', 18, ' ', 18, ' ', 55, ' ', 19, ' ', 18, ' ', 18, ' ', 20, ' ', 570, ' ', 581, '+', 1151, '67.71', 'I'),
('3126054', 'PASS', 'PASS', '/PARMAR VARSHIKA VIJAY GEETA            ', 70, ' ', 16, ' ', 41, ' ', 75, ' ', 16, ' ', 19, ' ', 66, ' ', 16, ' ', 43, ' ', 68, ' ', 16, ' ', 19, ' ', 52, ' ', 20, ' ', 19, ' ', 20, ' ', 21, ' ', 597, ' ', 553, '+', 1150, '67.65', 'I'),
('3126055', 'PASS', 'PASS', 'PATEL VINEET HASMUKHLAL GEETABEN        ', 35, '*', 18, ' ', 45, ' ', 68, ' ', 20, ' ', 20, ' ', 52, ' ', 14, ' ', 42, ' ', 40, ' ', 17, ' ', 19, ' ', 53, ' ', 20, ' ', 22, ' ', 22, ' ', 21, ' ', 528, '*', 466, '+', 994, '58.47', 'S,O.5045'),
('3126056', 'PASS', 'PASS', 'PATEL VIRAL BALUBHAI PRAVINABEN         ', 63, ' ', 23, ' ', 45, ' ', 76, ' ', 24, ' ', 22, ' ', 70, ' ', 20, ' ', 48, ' ', 72, ' ', 23, ' ', 23, ' ', 67, ' ', 24, ' ', 22, ' ', 22, ' ', 20, ' ', 664, ' ', 657, '+', 1321, '77.71', 'I'),
('3126057', 'PASS', 'PASS', 'PATHAK ROHIT GIRISH BAGESHRI            ', 60, ' ', 16, ' ', 47, ' ', 43, ' ', 13, ' ', 20, ' ', 61, ' ', 17, ' ', 47, ' ', 53, ' ', 15, ' ', 18, ' ', 42, ' ', 21, ' ', 21, ' ', 22, ' ', 22, ' ', 538, ' ', 537, '+', 1075, '63.24', 'I'),
('3126058', 'PASS', 'PASS', '/PATIL LEENA TANAJIRAO VAIJAYANTI       ', 75, ' ', 18, ' ', 42, ' ', 56, ' ', 16, ' ', 19, ' ', 75, ' ', 18, ' ', 45, ' ', 71, ' ', 20, ' ', 19, ' ', 54, ' ', 20, ' ', 20, ' ', 21, ' ', 21, ' ', 610, ' ', 592, '+', 1202, '70.71', 'I'),
('3126059', 'PASS', 'PASS', 'PATIL PRATHAMESH PRADEEP PRERNA         ', 61, ' ', 16, ' ', 44, ' ', 68, ' ', 18, ' ', 21, ' ', 70, ' ', 17, ' ', 46, ' ', 60, ' ', 20, ' ', 20, ' ', 53, ' ', 22, ' ', 22, ' ', 23, ' ', 23, ' ', 604, ' ', 563, '+', 1167, '68.65', 'I'),
('3126060', 'PASS', 'PASS', '/PATIL TEJALI SUBHASH SAMITA            ', 73, ' ', 17, ' ', 41, ' ', 84, ' ', 17, ' ', 17, ' ', 60, ' ', 21, ' ', 47, ' ', 68, ' ', 19, ' ', 19, ' ', 53, ' ', 22, ' ', 21, ' ', 23, ' ', 23, ' ', 625, ' ', 612, '+', 1237, '72.76', 'I'),
('3126061', 'PASS', 'PASS', '/PAWAR SHAMAL SURESH PUSHPALATA         ', 72, ' ', 20, ' ', 41, ' ', 49, ' ', 14, ' ', 15, ' ', 70, ' ', 20, ' ', 46, ' ', 69, ' ', 22, ' ', 19, ' ', 51, ' ', 20, ' ', 22, ' ', 20, ' ', 21, ' ', 591, ' ', 570, '+', 1161, '68.29', 'I'),
('3126062', 'PASS', 'PASS', '/PHADNIS PRACHETA SUBHASH SUSHAMA       ', 73, ' ', 23, ' ', 47, ' ', 86, ' ', 24, ' ', 22, ' ', 67, ' ', 22, ' ', 46, ' ', 72, ' ', 23, ' ', 23, ' ', 58, ' ', 24, ' ', 22, ' ', 22, ' ', 22, ' ', 676, ' ', 663, '+', 1339, '78.76', 'I'),
('3126063', 'FAIL', 'FAIL', 'ROKADE VAIBHAV CHANDRAKANT KAMAL        ', 0, ' ', 15, 'E', 45, 'E', 0, ' ', 11, 'E', 15, 'E', 44, 'E', 12, 'E', 22, 'E', 40, 'E', 11, 'E', 12, 'E', 0, ' ', 18, 'E', 19, 'E', 21, 'E', 19, 'E', 304, ' ', 0, ' ', 304, '17.88', 'F'),
('3126064', 'PASS', 'PASS', '/ROY MANISHA KAMESHWAR KUMAR JINDRA     ', 73, ' ', 19, ' ', 44, ' ', 75, ' ', 22, ' ', 21, ' ', 74, ' ', 20, ' ', 45, ' ', 63, ' ', 21, ' ', 23, ' ', 51, ' ', 20, ' ', 22, ' ', 22, ' ', 22, ' ', 637, ' ', 621, '+', 1258, '74.00', 'I'),
('3126065', 'PASS', 'PASS', 'SANGHVI VIKRANT DILIP SANDHYA           ', 52, ' ', 20, ' ', 45, ' ', 49, ' ', 15, ' ', 20, ' ', 56, ' ', 19, ' ', 44, ' ', 56, ' ', 20, ' ', 21, ' ', 40, ' ', 19, ' ', 20, ' ', 21, ' ', 23, ' ', 540, ' ', 592, '+', 1132, '66.59', 'I'),
('3126066', 'PASS', 'PASS', 'SATAM DINESH BABAJI SULEKHA             ', 73, ' ', 16, ' ', 41, ' ', 48, ' ', 13, ' ', 16, ' ', 51, ' ', 14, ' ', 39, ' ', 55, ' ', 14, ' ', 12, ' ', 47, ' ', 18, ' ', 21, ' ', 21, ' ', 19, ' ', 518, ' ', 514, '+', 1032, '60.71', 'I'),
('3126067', 'FAIL', 'FAIL', 'SAWANT ADITYA RATNAKAR NEHA             ', 0, ' ', 14, 'E', 38, 'E', 0, ' ', 12, 'E', 15, 'E', 0, ' ', 11, 'E', 38, 'E', 0, ' ', 11, 'E', 13, 'E', 0, ' ', 18, 'E', 19, 'E', 13, 'E', 12, 'E', 214, ' ', 0, ' ', 214, '12.59', 'F'),
('3126068', 'PASS', 'PASS', 'VAIDYA AMIT SADASHIV SUNANDA            ', 70, ' ', 16, ' ', 47, ' ', 42, ' ', 18, ' ', 22, ' ', 70, ' ', 17, ' ', 47, ' ', 64, ' ', 19, ' ', 19, ' ', 55, ' ', 22, ' ', 22, ' ', 23, ' ', 22, ' ', 595, ' ', 582, '+', 1177, '69.24', 'I'),
('3126069', 'PASS', 'PASS', 'VALOTIA DHAVAL RAJENDRA BAKULA          ', 64, ' ', 21, ' ', 45, ' ', 76, ' ', 16, ' ', 21, ' ', 65, ' ', 19, ' ', 47, ' ', 65, ' ', 17, ' ', 18, ' ', 54, ' ', 22, ' ', 22, ' ', 20, ' ', 18, ' ', 610, ' ', 588, '+', 1198, '70.47', 'I'),
('3126070', 'PASS', 'PASS', '/WALIWADEKAR MADHURA SHRINAND PREETI    ', 51, ' ', 21, ' ', 41, ' ', 74, ' ', 24, ' ', 22, ' ', 68, ' ', 22, ' ', 48, ' ', 66, ' ', 22, ' ', 22, ' ', 51, ' ', 24, ' ', 23, ' ', 22, ' ', 23, ' ', 624, ' ', 644, '+', 1268, '74.59', 'I'),
('3126071', 'PASS', 'PASS', '/WANDRE NIKITA PRADIP SHAILAJA          ', 44, 'E', 16, 'E', 25, 'E', 43, 'E', 12, 'E', 13, 'E', 49, 'E', 16, 'E', 36, 'E', 40, 'E', 12, 'E', 4, 'F', 42, 'E', 17, 'E', 19, 'E', 13, 'E', 13, 'E', 414, ' ', 431, '+', 845, '49.71', 'F');

-- --------------------------------------------------------

--
-- Table structure for table `sem_vii`
--

CREATE TABLE IF NOT EXISTS `sem_vii` (
  `seat_no` varchar(20) NOT NULL,
  `sem_III_result` varchar(10) DEFAULT NULL,
  `sem_IV_result` varchar(10) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `pp1_wr` int(50) DEFAULT NULL,
  `pp1_wr_info` varchar(10) DEFAULT NULL,
  `pp1_tw` int(50) DEFAULT NULL,
  `pp1_tw_info` varchar(10) DEFAULT NULL,
  `pp1_pr_or` int(50) DEFAULT NULL,
  `pp1_pr_or_info` varchar(10) DEFAULT NULL,
  `pp2_wr` int(50) DEFAULT NULL,
  `pp2_wr_info` varchar(10) DEFAULT NULL,
  `pp2_tw` int(50) DEFAULT NULL,
  `pp2_tw_info` varchar(10) DEFAULT NULL,
  `pp2_pr_or` int(50) DEFAULT NULL,
  `pp2_pr_or_info` varchar(10) DEFAULT NULL,
  `pp3_wr` int(50) DEFAULT NULL,
  `pp3_wr_info` varchar(10) DEFAULT NULL,
  `pp3_tw` int(50) DEFAULT NULL,
  `pp3_tw_info` varchar(10) DEFAULT NULL,
  `pp3_pr_or` int(50) DEFAULT NULL,
  `pp3_pr_or_info` varchar(10) DEFAULT NULL,
  `pp4_wr` int(50) DEFAULT NULL,
  `pp4_wr_info` varchar(10) DEFAULT NULL,
  `pp4_tw` int(50) DEFAULT NULL,
  `pp4_tw_info` varchar(10) DEFAULT NULL,
  `pp4_pr_or` int(50) DEFAULT NULL,
  `pp4_pr_or_info` varchar(10) DEFAULT NULL,
  `pp5_wr` int(50) DEFAULT NULL,
  `pp5_wr_info` varchar(10) DEFAULT NULL,
  `pp5_tw` int(50) DEFAULT NULL,
  `pp5_tw_info` varchar(10) DEFAULT NULL,
  `pp5_pr_or` int(50) DEFAULT NULL,
  `pp5_pr_or_info` varchar(10) DEFAULT NULL,
  `pp6_tw` int(50) DEFAULT NULL,
  `pp6_tw_info` varchar(10) DEFAULT NULL,
  `pp6_pr_or` int(50) DEFAULT NULL,
  `pp6_pr_or_info` varchar(10) DEFAULT NULL,
  `sem6_total` int(50) DEFAULT NULL,
  `sem6_total_info` varchar(10) DEFAULT NULL,
  `sem5_total` int(50) DEFAULT NULL,
  `sem5_total_info` varchar(10) DEFAULT NULL,
  `total` int(50) DEFAULT NULL,
  `percentage` varchar(50) DEFAULT NULL,
  `remark` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`seat_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sem_vii`
--

INSERT INTO `sem_vii` (`seat_no`, `sem_III_result`, `sem_IV_result`, `name`, `pp1_wr`, `pp1_wr_info`, `pp1_tw`, `pp1_tw_info`, `pp1_pr_or`, `pp1_pr_or_info`, `pp2_wr`, `pp2_wr_info`, `pp2_tw`, `pp2_tw_info`, `pp2_pr_or`, `pp2_pr_or_info`, `pp3_wr`, `pp3_wr_info`, `pp3_tw`, `pp3_tw_info`, `pp3_pr_or`, `pp3_pr_or_info`, `pp4_wr`, `pp4_wr_info`, `pp4_tw`, `pp4_tw_info`, `pp4_pr_or`, `pp4_pr_or_info`, `pp5_wr`, `pp5_wr_info`, `pp5_tw`, `pp5_tw_info`, `pp5_pr_or`, `pp5_pr_or_info`, `pp6_tw`, `pp6_tw_info`, `pp6_pr_or`, `pp6_pr_or_info`, `sem6_total`, `sem6_total_info`, `sem5_total`, `sem5_total_info`, `total`, `percentage`, `remark`) VALUES
('3126001', 'PASS', 'PASS', '/ADEP KAVITA VASUDEV HEMALATHA', 47, ' ', 16, ' ', 21, ' ', 47, ' ', 18, ' ', 17, ' ', 48, ' ', 17, ' ', 39, ' ', 40, ' ', 17, ' ', 18, ' ', 44, ' ', 18, ' ', 18, ' ', 19, ' ', 19, ' ', 463, ' ', 460, '+', 923, '54.29', 'S'),
('3126002', 'PASS', 'FAIL', 'AMBHORE HARSHAL SHASHIKANT MANGALA      ', 41, ' ', 14, ' ', 38, ' ', 40, ' ', 12, ' ', 16, ' ', 57, ' ', 15, ' ', 38, ' ', 59, ' ', 12, ' ', 17, ' ', 42, ' ', 17, ' ', 24, ' ', 20, ' ', 21, ' ', 483, ' ', 447, '+', 930, '54.71', 'RS4'),
('3126003', 'PASS', 'PASS', '/AMRUTKAR SNEHAL DILIP VIDYA            ', 57, ' ', 20, ' ', 34, ' ', 56, ' ', 17, ' ', 18, ' ', 57, ' ', 18, ' ', 35, ' ', 57, ' ', 18, ' ', 17, ' ', 46, ' ', 21, ' ', 21, ' ', 18, ' ', 16, ' ', 526, ' ', 468, '+', 994, '58.47', 'S'),
('3126004', 'PASS', 'PASS', 'APSINGEKAR ABHAY SHRINIVASRAO SUNANDA   ', 62, ' ', 18, ' ', 40, ' ', 53, ' ', 18, ' ', 21, ' ', 63, ' ', 17, ' ', 38, ' ', 63, ' ', 19, ' ', 17, ' ', 43, ' ', 20, ' ', 22, ' ', 22, ' ', 20, ' ', 556, ' ', 516, '+', 1072, '63.06', 'I'),
('3126005', 'PASS', 'PASS', 'BANDIVADEKAR AKSHAY ARVIND RUPALI       ', 70, ' ', 21, ' ', 45, ' ', 68, ' ', 22, ' ', 23, ' ', 57, ' ', 23, ' ', 47, ' ', 67, ' ', 23, ' ', 22, ' ', 57, ' ', 23, ' ', 21, ' ', 23, ' ', 22, ' ', 634, ' ', 609, '+', 1243, '73.12', 'I'),
('3126006', 'PASS', 'PASS', '/BARNA PRIYANKA NARESH BHAWANA          ', 56, ' ', 20, ' ', 46, ' ', 46, ' ', 19, ' ', 22, ' ', 61, ' ', 20, ' ', 47, ' ', 54, ' ', 14, ' ', 18, ' ', 48, ' ', 20, ' ', 22, ' ', 21, ' ', 23, ' ', 557, ' ', 576, '+', 1133, '66.65', 'I'),
('3126007', 'PASS', 'PASS', 'BHANUSHALI JAGDISH GOVIND LILAVANTI     ', 68, ' ', 19, ' ', 45, ' ', 65, ' ', 20, ' ', 22, ' ', 59, ' ', 20, ' ', 45, ' ', 67, ' ', 19, ' ', 19, ' ', 60, ' ', 19, ' ', 22, ' ', 21, ' ', 21, ' ', 611, ' ', 572, '+', 1183, '69.59', 'I'),
('3126008', 'PASS', 'PASS', 'BHANUSHALI MIT SHANKARLAL SHANTI        ', 58, ' ', 20, ' ', 40, ' ', 55, ' ', 19, ' ', 21, ' ', 61, ' ', 12, ' ', 40, ' ', 64, ' ', 20, ' ', 19, ' ', 57, ' ', 20, ' ', 22, ' ', 21, ' ', 21, ' ', 570, ' ', 536, '+', 1106, '65.06', 'I'),
('3126009', 'PASS', 'PASS', '/BHANUSHALI POOJA MANOJ NAMRATA         ', 65, ' ', 16, ' ', 42, ' ', 55, ' ', 16, ' ', 22, ' ', 68, ' ', 19, ' ', 44, ' ', 71, ' ', 17, ' ', 17, ' ', 47, ' ', 17, ' ', 23, ' ', 21, ' ', 22, ' ', 582, ' ', 553, '+', 1135, '66.76', 'I'),
('3126010', 'PASS', 'PASS', 'BHANUSHALI RITESH SHANKARLAL ANJANABEN  ', 56, ' ', 15, ' ', 40, ' ', 42, ' ', 14, ' ', 21, ' ', 51, ' ', 16, ' ', 40, ' ', 66, ' ', 18, ' ', 17, ' ', 46, ' ', 18, ' ', 21, ' ', 12, ' ', 12, ' ', 505, ' ', 504, '+', 1009, '59.35', 'S'),
('3126011', 'PASS', 'PASS', 'BHATIA ANUJ RAMESH BHARTI               ', 34, '*', 21, ' ', 44, ' ', 61, ' ', 16, ' ', 22, ' ', 48, ' ', 15, ' ', 42, ' ', 57, ' ', 20, ' ', 20, ' ', 43, ' ', 21, ' ', 22, ' ', 22, ' ', 23, ' ', 531, '*', 526, '+', 1057, '62.18', 'I,O.5045'),
('3126012', 'PASS', 'PASS', 'BHAVE ANIKET PRASHANT VISHAKHA          ', 62, ' ', 19, ' ', 43, ' ', 51, ' ', 18, ' ', 22, ' ', 66, ' ', 17, ' ', 45, ' ', 68, ' ', 19, ' ', 19, ' ', 62, ' ', 21, ' ', 23, ' ', 22, ' ', 22, ' ', 599, ' ', 639, '+', 1238, '72.82', 'I'),
('3126013', 'PASS', 'PASS', 'BHOIRA SAUD MOHAMED ILYAS WAHEDA        ', 64, ' ', 19, ' ', 45, ' ', 69, ' ', 20, ' ', 23, ' ', 54, ' ', 17, ' ', 46, ' ', 68, ' ', 20, ' ', 20, ' ', 56, ' ', 21, ' ', 24, ' ', 23, ' ', 22, ' ', 611, ' ', 647, '+', 1258, '74.00', 'I'),
('3126014', 'PASS', 'PASS', 'BIHANI CHANDRESH GOVIND SADHANA         ', 53, ' ', 18, ' ', 47, ' ', 52, ' ', 14, ' ', 21, ' ', 57, ' ', 18, ' ', 40, ' ', 45, ' ', 19, ' ', 17, ' ', 43, ' ', 19, ' ', 23, ' ', 21, ' ', 23, ' ', 530, ' ', 567, '+', 1097, '64.53', 'I'),
('3126015', 'PASS', 'PASS', 'BOLKE SAMEER GANPAT SONABAI             ', 53, ' ', 20, ' ', 40, ' ', 70, ' ', 13, ' ', 20, ' ', 56, ' ', 17, ' ', 40, ' ', 67, ' ', 20, ' ', 18, ' ', 48, ' ', 20, ' ', 22, ' ', 21, ' ', 23, ' ', 568, ' ', 549, '+', 1117, '65.71', 'I'),
('3126016', 'PASS', 'PASS', '/CHANDAN DEVANSHI PANKAJ GEETA          ', 73, ' ', 16, ' ', 42, ' ', 60, ' ', 16, ' ', 21, ' ', 63, ' ', 18, ' ', 42, ' ', 60, ' ', 17, ' ', 18, ' ', 57, ' ', 17, ' ', 20, ' ', 21, ' ', 22, ' ', 583, ' ', 555, '+', 1138, '66.94', 'I'),
('3126017', 'PASS', 'PASS', '/CHOUDHARY KOMAL NANDU REKHA            ', 74, ' ', 21, ' ', 46, ' ', 70, ' ', 23, ' ', 21, ' ', 63, ' ', 24, ' ', 48, ' ', 74, ' ', 24, ' ', 23, ' ', 58, ' ', 22, ' ', 23, ' ', 23, ' ', 22, ' ', 659, ' ', 675, '+', 1334, '78.47', 'I'),
('3126018', 'PASS', 'PASS', 'DHANDE PUSHKAR GENDULAL KUNDA           ', 30, 'F', 16, 'E', 40, 'E', 52, 'E', 14, 'E', 19, 'E', 43, 'E', 15, 'E', 38, 'E', 49, 'E', 17, 'E', 17, 'E', 40, 'E', 20, 'E', 22, 'E', 21, 'E', 20, 'E', 473, ' ', 418, 'x', 891, '52.41', 'F'),
('3126019', 'PASS', 'PASS', 'DHOPEY KUNAL VIJAY SARALA               ', 64, ' ', 21, ' ', 40, ' ', 73, ' ', 18, ' ', 23, ' ', 68, ' ', 21, ' ', 42, ' ', 61, ' ', 21, ' ', 19, ' ', 41, ' ', 21, ' ', 22, ' ', 23, ' ', 22, ' ', 600, ' ', 532, '+', 1132, '66.59', 'I'),
('3126020', 'PASS', 'PASS', '/DIGHE SHRADDHA VIJAY SANDHYA           ', 58, ' ', 20, ' ', 38, ' ', 55, ' ', 16, ' ', 20, ' ', 66, ' ', 18, ' ', 40, ' ', 53, ' ', 19, ' ', 20, ' ', 44, ' ', 20, ' ', 21, ' ', 20, ' ', 19, ' ', 547, ' ', 566, '+', 1113, '65.47', 'I'),
('3126021', 'PASS', 'PASS', 'DONGARE NILAY SANJEEV SHARMILA          ', 44, 'E', 13, 'E', 12, 'F', 45, 'E', 10, 'E', 15, 'E', 41, 'E', 13, 'E', 38, 'E', 44, 'E', 11, 'E', 16, 'E', 29, 'F', 13, 'E', 21, 'E', 17, 'E', 21, 'E', 403, ' ', 430, '+', 833, '49.00', 'F'),
('3126022', 'PASS', 'PASS', 'FERNANDES RYAN ROBERT JOVITA            ', 72, ' ', 18, ' ', 39, ' ', 63, ' ', 14, ' ', 18, ' ', 76, ' ', 18, ' ', 44, ' ', 65, ' ', 20, ' ', 19, ' ', 58, ' ', 21, ' ', 22, ' ', 22, ' ', 21, ' ', 610, ' ', 585, '+', 1195, '70.29', 'I'),
('3126023', 'PASS', 'PASS', 'GADHIA HARSHAL DHANSUKH RITA            ', 60, ' ', 15, ' ', 42, ' ', 74, ' ', 17, ' ', 20, ' ', 59, ' ', 17, ' ', 44, ' ', 57, ' ', 19, ' ', 21, ' ', 46, ' ', 20, ' ', 21, ' ', 21, ' ', 22, ' ', 575, ' ', 569, '+', 1144, '67.29', 'I'),
('3126024', 'PASS', 'PASS', 'GAJRA AJAY NAVIN PREMILA                ', 71, ' ', 21, ' ', 44, ' ', 56, ' ', 19, ' ', 21, ' ', 56, ' ', 19, ' ', 45, ' ', 59, ' ', 21, ' ', 22, ' ', 57, ' ', 20, ' ', 22, ' ', 21, ' ', 21, ' ', 595, ' ', 534, '+', 1129, '66.41', 'I'),
('3126025', 'PASS', 'PASS', '/GOHIL ANKITA GIRISH USHA               ', 67, ' ', 23, ' ', 44, ' ', 40, ' ', 22, ' ', 21, ' ', 65, ' ', 24, ' ', 48, ' ', 68, ' ', 24, ' ', 23, ' ', 43, ' ', 24, ' ', 21, ' ', 22, ' ', 21, ' ', 600, ' ', 614, '+', 1214, '71.41', 'I'),
('3126026', 'PASS', 'PASS', 'GOSWAMI VISHAL VIPIN PREETI             ', 62, ' ', 17, ' ', 38, ' ', 70, ' ', 14, ' ', 18, ' ', 52, ' ', 18, ' ', 40, ' ', 65, ' ', 19, ' ', 19, ' ', 52, ' ', 21, ' ', 20, ' ', 20, ' ', 21, ' ', 566, ' ', 545, '+', 1111, '65.35', 'I'),
('3126027', 'PASS', 'PASS', 'GUPTA ANIL KUMAR JAMUNA PRASAD MANJU    ', 51, ' ', 16, ' ', 41, ' ', 43, ' ', 12, ' ', 15, ' ', 55, ' ', 17, ' ', 40, ' ', 46, ' ', 17, ' ', 18, ' ', 40, ' ', 21, ' ', 21, ' ', 21, ' ', 21, ' ', 495, ' ', 457, '+', 952, '56.00', 'S'),
('3126028', 'PASS', 'PASS', 'GUPTA PAVAN HARISHANKER NANHIDEVI       ', 41, 'E', 16, 'E', 11, 'F', 40, 'E', 12, 'E', 17, 'E', 55, 'E', 17, 'E', 38, 'E', 47, 'E', 12, 'E', 11, 'E', 33, 'F', 15, 'E', 18, 'E', 11, 'E', 11, 'E', 405, ' ', 444, '+', 849, '49.94', 'F'),
('3126029', 'PASS', 'PASS', 'HEGDE SURAJ NAMDEV SHOBHA               ', 70, ' ', 21, ' ', 40, ' ', 69, ' ', 21, ' ', 21, ' ', 64, ' ', 21, ' ', 40, ' ', 70, ' ', 20, ' ', 20, ' ', 57, ' ', 20, ' ', 21, ' ', 20, ' ', 20, ' ', 615, ' ', 617, '+', 1232, '72.47', 'I'),
('3126030', 'PASS', 'PASS', '/JADHAV NIRMALA NARAYAN REKHA           ', 55, ' ', 22, ' ', 35, ' ', 64, ' ', 22, ' ', 21, ' ', 66, ' ', 21, ' ', 38, ' ', 61, ' ', 23, ' ', 23, ' ', 45, ' ', 23, ' ', 20, ' ', 22, ' ', 20, ' ', 581, ' ', 545, '+', 1126, '66.24', 'I'),
('3126031', 'PASS', 'PASS', 'JADHAV SAURABH ASHOK MANDAKINI          ', 42, ' ', 18, ' ', 34, ' ', 43, ' ', 14, ' ', 19, ' ', 49, ' ', 18, ' ', 40, ' ', 53, ' ', 18, ' ', 15, ' ', 35, '*', 21, ' ', 20, ' ', 18, ' ', 16, ' ', 473, '*', 465, '+', 938, '55.18', 'S,O.5045'),
('3126032', 'PASS', 'PASS', 'JAIN NIKHIL VINODKUMAR VIJAYLAXMI       ', 45, ' ', 16, ' ', 34, ' ', 48, ' ', 13, ' ', 16, ' ', 45, ' ', 16, ' ', 38, ' ', 50, ' ', 17, ' ', 18, ' ', 51, ' ', 19, ' ', 20, ' ', 20, ' ', 22, ' ', 488, ' ', 459, '+', 947, '55.71', 'S'),
('3126033', 'PASS', 'PASS', '/JATHAR PRAJAKTA SURYAKANT SUNANDA      ', 52, ' ', 15, ' ', 33, ' ', 75, ' ', 19, ' ', 18, ' ', 50, ' ', 15, ' ', 38, ' ', 53, ' ', 16, ' ', 18, ' ', 45, ' ', 18, ' ', 20, ' ', 13, ' ', 14, ' ', 512, ' ', 497, '+', 1009, '59.35', 'S'),
('3126034', 'PASS', 'PASS', 'JOSHI RAHUL RAMANAND SUJATA             ', 64, ' ', 18, ' ', 42, ' ', 55, ' ', 13, ' ', 18, ' ', 61, ' ', 19, ' ', 45, ' ', 70, ' ', 19, ' ', 19, ' ', 57, ' ', 21, ' ', 22, ' ', 19, ' ', 20, ' ', 582, ' ', 579, '+', 1161, '68.29', 'I'),
('3126035', 'PASS', 'PASS', '/KADAM POOJA SURESH ANITA               ', 68, ' ', 19, ' ', 35, ' ', 47, ' ', 19, ' ', 18, ' ', 67, ' ', 19, ' ', 42, ' ', 50, ' ', 21, ' ', 20, ' ', 44, ' ', 20, ' ', 22, ' ', 22, ' ', 21, ' ', 554, ' ', 564, '+', 1118, '65.76', 'I'),
('3126036', 'PASS', 'PASS', 'KARANI DHAVAL MANOJ JAYASHREE           ', 67, ' ', 19, ' ', 42, ' ', 70, ' ', 19, ' ', 21, ' ', 66, ' ', 21, ' ', 36, ' ', 71, ' ', 19, ' ', 17, ' ', 49, ' ', 21, ' ', 22, ' ', 21, ' ', 22, ' ', 603, ' ', 592, '+', 1195, '70.29', 'I'),
('3126037', 'PASS', 'PASS', 'KAUL KANAV KAPIL ASHA                   ', 67, ' ', 20, ' ', 42, ' ', 59, ' ', 16, ' ', 21, ' ', 64, ' ', 21, ' ', 36, ' ', 47, ' ', 20, ' ', 20, ' ', 51, ' ', 19, ' ', 21, ' ', 20, ' ', 19, ' ', 563, ' ', 601, '+', 1164, '68.47', 'I'),
('3126038', 'PASS', 'PASS', '/KOLI SHRADDHA MOHAN SMITA              ', 62, 'E', 15, 'E', 21, 'E', 68, 'E', 11, 'E', 5, 'F', 55, 'E', 12, 'E', 12, 'F', 67, 'E', 10, 'E', 4, 'F', 41, 'E', 12, 'E', 4, 'F', 10, 'E', 5, 'F', 414, ' ', 468, '+', 882, '51.88', 'F'),
('3126039', 'PASS', 'PASS', '/KOTHARI SHEETAL JAYESH DAKSHA          ', 66, ' ', 16, ' ', 34, ' ', 69, ' ', 13, ' ', 19, ' ', 67, ' ', 19, ' ', 38, ' ', 67, ' ', 16, ' ', 18, ' ', 50, ' ', 17, ' ', 20, ' ', 20, ' ', 21, ' ', 570, ' ', 539, '+', 1109, '65.24', 'I'),
('3126040', 'PASS', 'PASS', '/LAD SHRUTIKA NEELKANTH GEETA           ', 64, ' ', 20, ' ', 40, ' ', 64, ' ', 20, ' ', 20, ' ', 65, ' ', 18, ' ', 37, ' ', 61, ' ', 21, ' ', 18, ' ', 43, ' ', 21, ' ', 21, ' ', 20, ' ', 20, ' ', 573, ' ', 505, '+', 1078, '63.41', 'I'),
('3126041', 'PASS', 'PASS', 'LIMAYE SOUMITRA CHANDRAKANT ALKA        ', 64, ' ', 20, ' ', 41, ' ', 62, ' ', 21, ' ', 20, ' ', 70, ' ', 22, ' ', 43, ' ', 64, ' ', 21, ' ', 22, ' ', 47, ' ', 23, ' ', 21, ' ', 23, ' ', 23, ' ', 607, ' ', 580, '+', 1187, '69.82', 'I'),
('3126042', 'PASS', 'PASS', 'MALKAR NITIN MADHUKAR MAI               ', 44, 'E', 15, 'E', 41, 'E', 22, 'F', 15, 'E', 18, 'E', 58, 'E', 18, 'E', 42, 'E', 41, 'E', 20, 'E', 18, 'E', 40, 'E', 19, 'E', 20, 'E', 19, 'E', 18, 'E', 468, ' ', 463, '+', 931, '54.76', 'F'),
('3126043', 'PASS', 'PASS', '/MANE ASMITA VILAS SUNITA               ', 52, 'E', 11, 'E', 10, 'F', 25, 'F', 15, 'E', 14, 'E', 67, 'E', 12, 'E', 32, 'E', 47, 'E', 11, 'E', 17, 'E', 45, 'E', 18, 'E', 19, 'E', 12, 'E', 13, 'E', 420, ' ', 458, 'x', 878, '51.65', 'F'),
('3126044', 'PASS', 'PASS', 'MANE NIKHIL SHRIMANT MAYA               ', 41, ' ', 18, ' ', 40, ' ', 32, '*', 17, ' ', 17, ' ', 59, ' ', 16, ' ', 40, ' ', 43, ' ', 21, ' ', 18, ' ', 44, ' ', 21, ' ', 20, ' ', 20, ' ', 19, ' ', 486, '*', 496, '+', 982, '57.76', 'S,O.5045'),
('3126045', 'PASS', 'PASS', '/MANE SHRUTI SANDIP GAURI               ', 40, 'E', 16, 'E', 34, 'E', 40, 'E', 20, 'E', 19, 'E', 49, 'E', 20, 'E', 44, 'E', 40, 'E', 18, 'E', 19, 'E', 27, 'F', 20, 'E', 21, 'E', 20, 'E', 21, 'E', 468, ' ', 496, '+', 964, '56.71', 'F'),
('3126046', 'PASS', 'PASS', '/MARNE KRUTIKA CHANDRAKANT SHARDA       ', 75, ' ', 19, ' ', 41, ' ', 72, ' ', 20, ' ', 23, ' ', 69, ' ', 19, ' ', 42, ' ', 72, ' ', 18, ' ', 20, ' ', 50, ' ', 19, ' ', 20, ' ', 19, ' ', 21, ' ', 619, ' ', 604, '+', 1223, '71.94', 'I'),
('3126047', 'PASS', 'PASS', '/MAURYA PINKI RAMAWADH SAVITRI          ', 49, ' ', 22, ' ', 44, ' ', 65, ' ', 21, ' ', 19, ' ', 63, ' ', 19, ' ', 44, ' ', 70, ' ', 23, ' ', 20, ' ', 44, ' ', 24, ' ', 22, ' ', 22, ' ', 22, ' ', 593, ' ', 574, '+', 1167, '68.65', 'I'),
('3126048', 'PASS', 'PASS', 'MODI ASHUTOSH MUKESH DHARMISTHA         ', 45, 'E', 10, 'E', 12, 'F', 40, 'E', 10, 'E', 5, 'F', 40, 'E', 12, 'E', 11, 'F', 47, 'E', 10, 'E', 2, 'F', 40, 'E', 11, 'E', 3, 'F', 14, 'E', 5, 'F', 317, ' ', 432, 'x ', 749, '44.06', 'F'),
('3126049', 'PASS', 'PASS', 'MUKHILAN VARADARAJAN RANI               ', 55, ' ', 20, ' ', 44, ' ', 54, ' ', 19, ' ', 21, ' ', 65, ' ', 19, ' ', 45, ' ', 57, ' ', 20, ' ', 20, ' ', 40, ' ', 19, ' ', 22, ' ', 20, ' ', 21, ' ', 561, ' ', 566, '+', 1127, '66.29', 'I'),
('3126050', 'PASS', 'PASS', '/NADAR DIVYA ANBALAGAN REGINA           ', 61, ' ', 22, ' ', 47, ' ', 40, ' ', 20, ' ', 20, ' ', 58, ' ', 22, ' ', 46, ' ', 59, ' ', 21, ' ', 19, ' ', 50, ' ', 24, ' ', 20, ' ', 19, ' ', 19, ' ', 567, ' ', 580, '+', 1147, '67.47', 'I'),
('3126051', 'PASS', 'PASS', 'NANAWARE AMOL MADHUKAR SANGITA          ', 55, ' ', 19, ' ', 46, ' ', 46, ' ', 19, ' ', 20, ' ', 58, ' ', 20, ' ', 38, ' ', 49, ' ', 17, ' ', 20, ' ', 41, ' ', 20, ' ', 20, ' ', 21, ' ', 20, ' ', 529, ' ', 511, '+', 1040, '61.18', 'I'),
('3126052', 'PASS', 'PASS', '/NEHETE PRITAM MOHAN REKHA              ', 57, ' ', 17, ' ', 39, ' ', 53, ' ', 20, ' ', 21, ' ', 65, ' ', 18, ' ', 38, ' ', 61, ' ', 18, ' ', 18, ' ', 44, ' ', 18, ' ', 19, ' ', 19, ' ', 20, ' ', 545, ' ', 557, '+', 1102, '64.82', 'I'),
('3126053', 'PASS', 'PASS', '/NIMBALKAR  RASHMI VIVEKANAND VIDYA     ', 59, ' ', 17, ' ', 47, ' ', 56, ' ', 13, ' ', 19, ' ', 69, ' ', 18, ' ', 42, ' ', 64, ' ', 18, ' ', 18, ' ', 55, ' ', 19, ' ', 18, ' ', 18, ' ', 20, ' ', 570, ' ', 581, '+', 1151, '67.71', 'I'),
('3126054', 'PASS', 'PASS', '/PARMAR VARSHIKA VIJAY GEETA            ', 70, ' ', 16, ' ', 41, ' ', 75, ' ', 16, ' ', 19, ' ', 66, ' ', 16, ' ', 43, ' ', 68, ' ', 16, ' ', 19, ' ', 52, ' ', 20, ' ', 19, ' ', 20, ' ', 21, ' ', 597, ' ', 553, '+', 1150, '67.65', 'I'),
('3126055', 'PASS', 'PASS', 'PATEL VINEET HASMUKHLAL GEETABEN        ', 35, '*', 18, ' ', 45, ' ', 68, ' ', 20, ' ', 20, ' ', 52, ' ', 14, ' ', 42, ' ', 40, ' ', 17, ' ', 19, ' ', 53, ' ', 20, ' ', 22, ' ', 22, ' ', 21, ' ', 528, '*', 466, '+', 994, '58.47', 'S,O.5045'),
('3126056', 'PASS', 'PASS', 'PATEL VIRAL BALUBHAI PRAVINABEN         ', 63, ' ', 23, ' ', 45, ' ', 76, ' ', 24, ' ', 22, ' ', 70, ' ', 20, ' ', 48, ' ', 72, ' ', 23, ' ', 23, ' ', 67, ' ', 24, ' ', 22, ' ', 22, ' ', 20, ' ', 664, ' ', 657, '+', 1321, '77.71', 'I'),
('3126057', 'PASS', 'PASS', 'PATHAK ROHIT GIRISH BAGESHRI            ', 60, ' ', 16, ' ', 47, ' ', 43, ' ', 13, ' ', 20, ' ', 61, ' ', 17, ' ', 47, ' ', 53, ' ', 15, ' ', 18, ' ', 42, ' ', 21, ' ', 21, ' ', 22, ' ', 22, ' ', 538, ' ', 537, '+', 1075, '63.24', 'I'),
('3126058', 'PASS', 'PASS', '/PATIL LEENA TANAJIRAO VAIJAYANTI       ', 75, ' ', 18, ' ', 42, ' ', 56, ' ', 16, ' ', 19, ' ', 75, ' ', 18, ' ', 45, ' ', 71, ' ', 20, ' ', 19, ' ', 54, ' ', 20, ' ', 20, ' ', 21, ' ', 21, ' ', 610, ' ', 592, '+', 1202, '70.71', 'I'),
('3126059', 'PASS', 'PASS', 'PATIL PRATHAMESH PRADEEP PRERNA         ', 61, ' ', 16, ' ', 44, ' ', 68, ' ', 18, ' ', 21, ' ', 70, ' ', 17, ' ', 46, ' ', 60, ' ', 20, ' ', 20, ' ', 53, ' ', 22, ' ', 22, ' ', 23, ' ', 23, ' ', 604, ' ', 563, '+', 1167, '68.65', 'I'),
('3126060', 'PASS', 'PASS', '/PATIL TEJALI SUBHASH SAMITA            ', 73, ' ', 17, ' ', 41, ' ', 84, ' ', 17, ' ', 17, ' ', 60, ' ', 21, ' ', 47, ' ', 68, ' ', 19, ' ', 19, ' ', 53, ' ', 22, ' ', 21, ' ', 23, ' ', 23, ' ', 625, ' ', 612, '+', 1237, '72.76', 'I'),
('3126061', 'PASS', 'PASS', '/PAWAR SHAMAL SURESH PUSHPALATA         ', 72, ' ', 20, ' ', 41, ' ', 49, ' ', 14, ' ', 15, ' ', 70, ' ', 20, ' ', 46, ' ', 69, ' ', 22, ' ', 19, ' ', 51, ' ', 20, ' ', 22, ' ', 20, ' ', 21, ' ', 591, ' ', 570, '+', 1161, '68.29', 'I'),
('3126062', 'PASS', 'PASS', '/PHADNIS PRACHETA SUBHASH SUSHAMA       ', 73, ' ', 23, ' ', 47, ' ', 86, ' ', 24, ' ', 22, ' ', 67, ' ', 22, ' ', 46, ' ', 72, ' ', 23, ' ', 23, ' ', 58, ' ', 24, ' ', 22, ' ', 22, ' ', 22, ' ', 676, ' ', 663, '+', 1339, '78.76', 'I'),
('3126063', 'FAIL', 'FAIL', 'ROKADE VAIBHAV CHANDRAKANT KAMAL        ', 0, ' ', 15, 'E', 45, 'E', 0, ' ', 11, 'E', 15, 'E', 44, 'E', 12, 'E', 22, 'E', 40, 'E', 11, 'E', 12, 'E', 0, ' ', 18, 'E', 19, 'E', 21, 'E', 19, 'E', 304, ' ', 0, ' ', 304, '17.88', 'F'),
('3126064', 'PASS', 'PASS', '/ROY MANISHA KAMESHWAR KUMAR JINDRA     ', 73, ' ', 19, ' ', 44, ' ', 75, ' ', 22, ' ', 21, ' ', 74, ' ', 20, ' ', 45, ' ', 63, ' ', 21, ' ', 23, ' ', 51, ' ', 20, ' ', 22, ' ', 22, ' ', 22, ' ', 637, ' ', 621, '+', 1258, '74.00', 'I'),
('3126065', 'PASS', 'PASS', 'SANGHVI VIKRANT DILIP SANDHYA           ', 52, ' ', 20, ' ', 45, ' ', 49, ' ', 15, ' ', 20, ' ', 56, ' ', 19, ' ', 44, ' ', 56, ' ', 20, ' ', 21, ' ', 40, ' ', 19, ' ', 20, ' ', 21, ' ', 23, ' ', 540, ' ', 592, '+', 1132, '66.59', 'I'),
('3126066', 'PASS', 'PASS', 'SATAM DINESH BABAJI SULEKHA             ', 73, ' ', 16, ' ', 41, ' ', 48, ' ', 13, ' ', 16, ' ', 51, ' ', 14, ' ', 39, ' ', 55, ' ', 14, ' ', 12, ' ', 47, ' ', 18, ' ', 21, ' ', 21, ' ', 19, ' ', 518, ' ', 514, '+', 1032, '60.71', 'I'),
('3126067', 'FAIL', 'FAIL', 'SAWANT ADITYA RATNAKAR NEHA             ', 0, ' ', 14, 'E', 38, 'E', 0, ' ', 12, 'E', 15, 'E', 0, ' ', 11, 'E', 38, 'E', 0, ' ', 11, 'E', 13, 'E', 0, ' ', 18, 'E', 19, 'E', 13, 'E', 12, 'E', 214, ' ', 0, ' ', 214, '12.59', 'F'),
('3126068', 'PASS', 'PASS', 'VAIDYA AMIT SADASHIV SUNANDA            ', 70, ' ', 16, ' ', 47, ' ', 42, ' ', 18, ' ', 22, ' ', 70, ' ', 17, ' ', 47, ' ', 64, ' ', 19, ' ', 19, ' ', 55, ' ', 22, ' ', 22, ' ', 23, ' ', 22, ' ', 595, ' ', 582, '+', 1177, '69.24', 'I'),
('3126069', 'PASS', 'PASS', 'VALOTIA DHAVAL RAJENDRA BAKULA          ', 64, ' ', 21, ' ', 45, ' ', 76, ' ', 16, ' ', 21, ' ', 65, ' ', 19, ' ', 47, ' ', 65, ' ', 17, ' ', 18, ' ', 54, ' ', 22, ' ', 22, ' ', 20, ' ', 18, ' ', 610, ' ', 588, '+', 1198, '70.47', 'I'),
('3126070', 'PASS', 'PASS', '/WALIWADEKAR MADHURA SHRINAND PREETI    ', 51, ' ', 21, ' ', 41, ' ', 74, ' ', 24, ' ', 22, ' ', 68, ' ', 22, ' ', 48, ' ', 66, ' ', 22, ' ', 22, ' ', 51, ' ', 24, ' ', 23, ' ', 22, ' ', 23, ' ', 624, ' ', 644, '+', 1268, '74.59', 'I'),
('3126071', 'PASS', 'PASS', '/WANDRE NIKITA PRADIP SHAILAJA          ', 44, 'E', 16, 'E', 25, 'E', 43, 'E', 12, 'E', 13, 'E', 49, 'E', 16, 'E', 36, 'E', 40, 'E', 12, 'E', 4, 'F', 42, 'E', 17, 'E', 19, 'E', 13, 'E', 13, 'E', 414, ' ', 431, '+', 845, '49.71', 'F'),
('3126072', 'PASS', 'PASS', 'MODI PRIYANK ATUL RACHANA               ', 40, '+', 10, '+', 25, '+', 40, '+', 18, '+', 16, '+', 0, ' ', 10, '+', 22, '+', 0, ' ', 15, '+', 16, '+', 47, '+', 15, '+', 19, '+', 20, '+', 21, '+', 334, ' ', 0, ' ', 334, '19.65', 'AA'),
('3126073', 'PASS', 'PASS', 'PARASHAR AKSHAY ANIL ANJANA             ', 40, '+', 16, '+', 38, '+', 44, ' ', 15, '+', 20, '+', 42, '+', 16, '+', 26, '+', 45, ' ', 17, '+', 17, '+', 40, '+', 19, '+', 22, '+', 23, '+', 22, '+', 462, ' ', 433, '+', 895, '52.65', 'P'),
('3126074', 'PASS', 'PASS', 'RANE SANSKAR SANDESH SHUBHANGI          ', 58, '+', 10, '+', 31, '+', 0, 'F', 14, '+', 16, '+', 40, '+', 10, '+', 22, '+', 40, '+', 15, '+', 15, '+', 40, '+', 14, '+', 16, '+', 12, '+', 15, '+', 368, ' ', 0, ' ', 368, '21.65', 'F'),
('3126075', 'PASS', 'PASS', 'SAXENA SHASHANK SUNIT CHITRA            ', 18, 'F', 10, '+', 34, '+', 0, ' ', 15, '+', 18, '+', 49, 'E', 10, '+', 33, '+', 0, ' ', 15, '+', 15, '+', 24, 'F', 15, '+', 22, '+', 15, '+', 17, '+', 310, ' ', 0, ' ', 310, '18.24', 'F'),
('3126076', 'PASS', 'PASS', 'UMAR PANKAJ SALIGRAM GEETA              ', 40, '+', 13, '+', 45, '+', 28, 'F', 11, '+', 10, '+', 50, '+', 12, '+', 28, '+', 40, '+', 10, '+', 15, '+', 40, '+', 15, '+', 12, '+', 10, '+', 10, '+', 389, ' ', 411, 'x', 800, '47.06', 'F');

-- --------------------------------------------------------

--
-- Table structure for table `sem_viii`
--

CREATE TABLE IF NOT EXISTS `sem_viii` (
  `seat_no` varchar(20) NOT NULL,
  `sem_III_result` varchar(10) DEFAULT NULL,
  `sem_IV_result` varchar(10) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `pp1_wr` int(50) DEFAULT NULL,
  `pp1_wr_info` varchar(10) DEFAULT NULL,
  `pp1_tw` int(50) DEFAULT NULL,
  `pp1_tw_info` varchar(10) DEFAULT NULL,
  `pp1_pr_or` int(50) DEFAULT NULL,
  `pp1_pr_or_info` varchar(10) DEFAULT NULL,
  `pp2_wr` int(50) DEFAULT NULL,
  `pp2_wr_info` varchar(10) DEFAULT NULL,
  `pp2_tw` int(50) DEFAULT NULL,
  `pp2_tw_info` varchar(10) DEFAULT NULL,
  `pp2_pr_or` int(50) DEFAULT NULL,
  `pp2_pr_or_info` varchar(10) DEFAULT NULL,
  `pp3_wr` int(50) DEFAULT NULL,
  `pp3_wr_info` varchar(10) DEFAULT NULL,
  `pp3_tw` int(50) DEFAULT NULL,
  `pp3_tw_info` varchar(10) DEFAULT NULL,
  `pp3_pr_or` int(50) DEFAULT NULL,
  `pp3_pr_or_info` varchar(10) DEFAULT NULL,
  `pp4_wr` int(50) DEFAULT NULL,
  `pp4_wr_info` varchar(10) DEFAULT NULL,
  `pp4_tw` int(50) DEFAULT NULL,
  `pp4_tw_info` varchar(10) DEFAULT NULL,
  `pp4_pr_or` int(50) DEFAULT NULL,
  `pp4_pr_or_info` varchar(10) DEFAULT NULL,
  `pp5_wr` int(50) DEFAULT NULL,
  `pp5_wr_info` varchar(10) DEFAULT NULL,
  `pp5_tw` int(50) DEFAULT NULL,
  `pp5_tw_info` varchar(10) DEFAULT NULL,
  `pp5_pr_or` int(50) DEFAULT NULL,
  `pp5_pr_or_info` varchar(10) DEFAULT NULL,
  `pp6_tw` int(50) DEFAULT NULL,
  `pp6_tw_info` varchar(10) DEFAULT NULL,
  `pp6_pr_or` int(50) DEFAULT NULL,
  `pp6_pr_or_info` varchar(10) DEFAULT NULL,
  `sem6_total` int(50) DEFAULT NULL,
  `sem6_total_info` varchar(10) DEFAULT NULL,
  `sem5_total` int(50) DEFAULT NULL,
  `sem5_total_info` varchar(10) DEFAULT NULL,
  `total` int(50) DEFAULT NULL,
  `percentage` varchar(50) DEFAULT NULL,
  `remark` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`seat_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sem_viii`
--

INSERT INTO `sem_viii` (`seat_no`, `sem_III_result`, `sem_IV_result`, `name`, `pp1_wr`, `pp1_wr_info`, `pp1_tw`, `pp1_tw_info`, `pp1_pr_or`, `pp1_pr_or_info`, `pp2_wr`, `pp2_wr_info`, `pp2_tw`, `pp2_tw_info`, `pp2_pr_or`, `pp2_pr_or_info`, `pp3_wr`, `pp3_wr_info`, `pp3_tw`, `pp3_tw_info`, `pp3_pr_or`, `pp3_pr_or_info`, `pp4_wr`, `pp4_wr_info`, `pp4_tw`, `pp4_tw_info`, `pp4_pr_or`, `pp4_pr_or_info`, `pp5_wr`, `pp5_wr_info`, `pp5_tw`, `pp5_tw_info`, `pp5_pr_or`, `pp5_pr_or_info`, `pp6_tw`, `pp6_tw_info`, `pp6_pr_or`, `pp6_pr_or_info`, `sem6_total`, `sem6_total_info`, `sem5_total`, `sem5_total_info`, `total`, `percentage`, `remark`) VALUES
('3126001', 'PASS', 'PASS', '/ADEP KAVITA VASUDEV HEMALATHA', 47, ' ', 16, ' ', 21, ' ', 47, ' ', 18, ' ', 17, ' ', 48, ' ', 17, ' ', 39, ' ', 40, ' ', 17, ' ', 18, ' ', 44, ' ', 18, ' ', 18, ' ', 19, ' ', 19, ' ', 463, ' ', 460, '+', 923, '54.29', 'S'),
('3126002', 'PASS', 'FAIL', 'AMBHORE HARSHAL SHASHIKANT MANGALA      ', 41, ' ', 14, ' ', 38, ' ', 40, ' ', 12, ' ', 16, ' ', 57, ' ', 15, ' ', 38, ' ', 59, ' ', 12, ' ', 17, ' ', 42, ' ', 17, ' ', 24, ' ', 20, ' ', 21, ' ', 483, ' ', 447, '+', 930, '54.71', 'RS4'),
('3126003', 'PASS', 'PASS', '/AMRUTKAR SNEHAL DILIP VIDYA            ', 57, ' ', 20, ' ', 34, ' ', 56, ' ', 17, ' ', 18, ' ', 57, ' ', 18, ' ', 35, ' ', 57, ' ', 18, ' ', 17, ' ', 46, ' ', 21, ' ', 21, ' ', 18, ' ', 16, ' ', 526, ' ', 468, '+', 994, '58.47', 'S'),
('3126004', 'PASS', 'PASS', 'APSINGEKAR ABHAY SHRINIVASRAO SUNANDA   ', 62, ' ', 18, ' ', 40, ' ', 53, ' ', 18, ' ', 21, ' ', 63, ' ', 17, ' ', 38, ' ', 63, ' ', 19, ' ', 17, ' ', 43, ' ', 20, ' ', 22, ' ', 22, ' ', 20, ' ', 556, ' ', 516, '+', 1072, '63.06', 'I'),
('3126005', 'PASS', 'PASS', 'BANDIVADEKAR AKSHAY ARVIND RUPALI       ', 70, ' ', 21, ' ', 45, ' ', 68, ' ', 22, ' ', 23, ' ', 57, ' ', 23, ' ', 47, ' ', 67, ' ', 23, ' ', 22, ' ', 57, ' ', 23, ' ', 21, ' ', 23, ' ', 22, ' ', 634, ' ', 609, '+', 1243, '73.12', 'I'),
('3126006', 'PASS', 'PASS', '/BARNA PRIYANKA NARESH BHAWANA          ', 56, ' ', 20, ' ', 46, ' ', 46, ' ', 19, ' ', 22, ' ', 61, ' ', 20, ' ', 47, ' ', 54, ' ', 14, ' ', 18, ' ', 48, ' ', 20, ' ', 22, ' ', 21, ' ', 23, ' ', 557, ' ', 576, '+', 1133, '66.65', 'I'),
('3126007', 'PASS', 'PASS', 'BHANUSHALI JAGDISH GOVIND LILAVANTI     ', 68, ' ', 19, ' ', 45, ' ', 65, ' ', 20, ' ', 22, ' ', 59, ' ', 20, ' ', 45, ' ', 67, ' ', 19, ' ', 19, ' ', 60, ' ', 19, ' ', 22, ' ', 21, ' ', 21, ' ', 611, ' ', 572, '+', 1183, '69.59', 'I'),
('3126008', 'PASS', 'PASS', 'BHANUSHALI MIT SHANKARLAL SHANTI        ', 58, ' ', 20, ' ', 40, ' ', 55, ' ', 19, ' ', 21, ' ', 61, ' ', 12, ' ', 40, ' ', 64, ' ', 20, ' ', 19, ' ', 57, ' ', 20, ' ', 22, ' ', 21, ' ', 21, ' ', 570, ' ', 536, '+', 1106, '65.06', 'I'),
('3126009', 'PASS', 'PASS', '/BHANUSHALI POOJA MANOJ NAMRATA         ', 65, ' ', 16, ' ', 42, ' ', 55, ' ', 16, ' ', 22, ' ', 68, ' ', 19, ' ', 44, ' ', 71, ' ', 17, ' ', 17, ' ', 47, ' ', 17, ' ', 23, ' ', 21, ' ', 22, ' ', 582, ' ', 553, '+', 1135, '66.76', 'I'),
('3126010', 'PASS', 'PASS', 'BHANUSHALI RITESH SHANKARLAL ANJANABEN  ', 56, ' ', 15, ' ', 40, ' ', 42, ' ', 14, ' ', 21, ' ', 51, ' ', 16, ' ', 40, ' ', 66, ' ', 18, ' ', 17, ' ', 46, ' ', 18, ' ', 21, ' ', 12, ' ', 12, ' ', 505, ' ', 504, '+', 1009, '59.35', 'S'),
('3126011', 'PASS', 'PASS', 'BHATIA ANUJ RAMESH BHARTI               ', 34, '*', 21, ' ', 44, ' ', 61, ' ', 16, ' ', 22, ' ', 48, ' ', 15, ' ', 42, ' ', 57, ' ', 20, ' ', 20, ' ', 43, ' ', 21, ' ', 22, ' ', 22, ' ', 23, ' ', 531, '*', 526, '+', 1057, '62.18', 'I,O.5045'),
('3126012', 'PASS', 'PASS', 'BHAVE ANIKET PRASHANT VISHAKHA          ', 62, ' ', 19, ' ', 43, ' ', 51, ' ', 18, ' ', 22, ' ', 66, ' ', 17, ' ', 45, ' ', 68, ' ', 19, ' ', 19, ' ', 62, ' ', 21, ' ', 23, ' ', 22, ' ', 22, ' ', 599, ' ', 639, '+', 1238, '72.82', 'I'),
('3126013', 'PASS', 'PASS', 'BHOIRA SAUD MOHAMED ILYAS WAHEDA        ', 64, ' ', 19, ' ', 45, ' ', 69, ' ', 20, ' ', 23, ' ', 54, ' ', 17, ' ', 46, ' ', 68, ' ', 20, ' ', 20, ' ', 56, ' ', 21, ' ', 24, ' ', 23, ' ', 22, ' ', 611, ' ', 647, '+', 1258, '74.00', 'I'),
('3126014', 'PASS', 'PASS', 'BIHANI CHANDRESH GOVIND SADHANA         ', 53, ' ', 18, ' ', 47, ' ', 52, ' ', 14, ' ', 21, ' ', 57, ' ', 18, ' ', 40, ' ', 45, ' ', 19, ' ', 17, ' ', 43, ' ', 19, ' ', 23, ' ', 21, ' ', 23, ' ', 530, ' ', 567, '+', 1097, '64.53', 'I'),
('3126015', 'PASS', 'PASS', 'BOLKE SAMEER GANPAT SONABAI             ', 53, ' ', 20, ' ', 40, ' ', 70, ' ', 13, ' ', 20, ' ', 56, ' ', 17, ' ', 40, ' ', 67, ' ', 20, ' ', 18, ' ', 48, ' ', 20, ' ', 22, ' ', 21, ' ', 23, ' ', 568, ' ', 549, '+', 1117, '65.71', 'I'),
('3126016', 'PASS', 'PASS', '/CHANDAN DEVANSHI PANKAJ GEETA          ', 73, ' ', 16, ' ', 42, ' ', 60, ' ', 16, ' ', 21, ' ', 63, ' ', 18, ' ', 42, ' ', 60, ' ', 17, ' ', 18, ' ', 57, ' ', 17, ' ', 20, ' ', 21, ' ', 22, ' ', 583, ' ', 555, '+', 1138, '66.94', 'I'),
('3126017', 'PASS', 'PASS', '/CHOUDHARY KOMAL NANDU REKHA            ', 74, ' ', 21, ' ', 46, ' ', 70, ' ', 23, ' ', 21, ' ', 63, ' ', 24, ' ', 48, ' ', 74, ' ', 24, ' ', 23, ' ', 58, ' ', 22, ' ', 23, ' ', 23, ' ', 22, ' ', 659, ' ', 675, '+', 1334, '78.47', 'I'),
('3126018', 'PASS', 'PASS', 'DHANDE PUSHKAR GENDULAL KUNDA           ', 30, 'F', 16, 'E', 40, 'E', 52, 'E', 14, 'E', 19, 'E', 43, 'E', 15, 'E', 38, 'E', 49, 'E', 17, 'E', 17, 'E', 40, 'E', 20, 'E', 22, 'E', 21, 'E', 20, 'E', 473, ' ', 418, 'x', 891, '52.41', 'F'),
('3126019', 'PASS', 'PASS', 'DHOPEY KUNAL VIJAY SARALA               ', 64, ' ', 21, ' ', 40, ' ', 73, ' ', 18, ' ', 23, ' ', 68, ' ', 21, ' ', 42, ' ', 61, ' ', 21, ' ', 19, ' ', 41, ' ', 21, ' ', 22, ' ', 23, ' ', 22, ' ', 600, ' ', 532, '+', 1132, '66.59', 'I'),
('3126020', 'PASS', 'PASS', '/DIGHE SHRADDHA VIJAY SANDHYA           ', 58, ' ', 20, ' ', 38, ' ', 55, ' ', 16, ' ', 20, ' ', 66, ' ', 18, ' ', 40, ' ', 53, ' ', 19, ' ', 20, ' ', 44, ' ', 20, ' ', 21, ' ', 20, ' ', 19, ' ', 547, ' ', 566, '+', 1113, '65.47', 'I'),
('3126021', 'PASS', 'PASS', 'DONGARE NILAY SANJEEV SHARMILA          ', 44, 'E', 13, 'E', 12, 'F', 45, 'E', 10, 'E', 15, 'E', 41, 'E', 13, 'E', 38, 'E', 44, 'E', 11, 'E', 16, 'E', 29, 'F', 13, 'E', 21, 'E', 17, 'E', 21, 'E', 403, ' ', 430, '+', 833, '49.00', 'F'),
('3126022', 'PASS', 'PASS', 'FERNANDES RYAN ROBERT JOVITA            ', 72, ' ', 18, ' ', 39, ' ', 63, ' ', 14, ' ', 18, ' ', 76, ' ', 18, ' ', 44, ' ', 65, ' ', 20, ' ', 19, ' ', 58, ' ', 21, ' ', 22, ' ', 22, ' ', 21, ' ', 610, ' ', 585, '+', 1195, '70.29', 'I'),
('3126023', 'PASS', 'PASS', 'GADHIA HARSHAL DHANSUKH RITA            ', 60, ' ', 15, ' ', 42, ' ', 74, ' ', 17, ' ', 20, ' ', 59, ' ', 17, ' ', 44, ' ', 57, ' ', 19, ' ', 21, ' ', 46, ' ', 20, ' ', 21, ' ', 21, ' ', 22, ' ', 575, ' ', 569, '+', 1144, '67.29', 'I'),
('3126024', 'PASS', 'PASS', 'GAJRA AJAY NAVIN PREMILA                ', 71, ' ', 21, ' ', 44, ' ', 56, ' ', 19, ' ', 21, ' ', 56, ' ', 19, ' ', 45, ' ', 59, ' ', 21, ' ', 22, ' ', 57, ' ', 20, ' ', 22, ' ', 21, ' ', 21, ' ', 595, ' ', 534, '+', 1129, '66.41', 'I'),
('3126025', 'PASS', 'PASS', '/GOHIL ANKITA GIRISH USHA               ', 67, ' ', 23, ' ', 44, ' ', 40, ' ', 22, ' ', 21, ' ', 65, ' ', 24, ' ', 48, ' ', 68, ' ', 24, ' ', 23, ' ', 43, ' ', 24, ' ', 21, ' ', 22, ' ', 21, ' ', 600, ' ', 614, '+', 1214, '71.41', 'I'),
('3126026', 'PASS', 'PASS', 'GOSWAMI VISHAL VIPIN PREETI             ', 62, ' ', 17, ' ', 38, ' ', 70, ' ', 14, ' ', 18, ' ', 52, ' ', 18, ' ', 40, ' ', 65, ' ', 19, ' ', 19, ' ', 52, ' ', 21, ' ', 20, ' ', 20, ' ', 21, ' ', 566, ' ', 545, '+', 1111, '65.35', 'I'),
('3126027', 'PASS', 'PASS', 'GUPTA ANIL KUMAR JAMUNA PRASAD MANJU    ', 51, ' ', 16, ' ', 41, ' ', 43, ' ', 12, ' ', 15, ' ', 55, ' ', 17, ' ', 40, ' ', 46, ' ', 17, ' ', 18, ' ', 40, ' ', 21, ' ', 21, ' ', 21, ' ', 21, ' ', 495, ' ', 457, '+', 952, '56.00', 'S'),
('3126028', 'PASS', 'PASS', 'GUPTA PAVAN HARISHANKER NANHIDEVI       ', 41, 'E', 16, 'E', 11, 'F', 40, 'E', 12, 'E', 17, 'E', 55, 'E', 17, 'E', 38, 'E', 47, 'E', 12, 'E', 11, 'E', 33, 'F', 15, 'E', 18, 'E', 11, 'E', 11, 'E', 405, ' ', 444, '+', 849, '49.94', 'F'),
('3126029', 'PASS', 'PASS', 'HEGDE SURAJ NAMDEV SHOBHA               ', 70, ' ', 21, ' ', 40, ' ', 69, ' ', 21, ' ', 21, ' ', 64, ' ', 21, ' ', 40, ' ', 70, ' ', 20, ' ', 20, ' ', 57, ' ', 20, ' ', 21, ' ', 20, ' ', 20, ' ', 615, ' ', 617, '+', 1232, '72.47', 'I'),
('3126030', 'PASS', 'PASS', '/JADHAV NIRMALA NARAYAN REKHA           ', 55, ' ', 22, ' ', 35, ' ', 64, ' ', 22, ' ', 21, ' ', 66, ' ', 21, ' ', 38, ' ', 61, ' ', 23, ' ', 23, ' ', 45, ' ', 23, ' ', 20, ' ', 22, ' ', 20, ' ', 581, ' ', 545, '+', 1126, '66.24', 'I'),
('3126031', 'PASS', 'PASS', 'JADHAV SAURABH ASHOK MANDAKINI          ', 42, ' ', 18, ' ', 34, ' ', 43, ' ', 14, ' ', 19, ' ', 49, ' ', 18, ' ', 40, ' ', 53, ' ', 18, ' ', 15, ' ', 35, '*', 21, ' ', 20, ' ', 18, ' ', 16, ' ', 473, '*', 465, '+', 938, '55.18', 'S,O.5045'),
('3126032', 'PASS', 'PASS', 'JAIN NIKHIL VINODKUMAR VIJAYLAXMI       ', 45, ' ', 16, ' ', 34, ' ', 48, ' ', 13, ' ', 16, ' ', 45, ' ', 16, ' ', 38, ' ', 50, ' ', 17, ' ', 18, ' ', 51, ' ', 19, ' ', 20, ' ', 20, ' ', 22, ' ', 488, ' ', 459, '+', 947, '55.71', 'S'),
('3126033', 'PASS', 'PASS', '/JATHAR PRAJAKTA SURYAKANT SUNANDA      ', 52, ' ', 15, ' ', 33, ' ', 75, ' ', 19, ' ', 18, ' ', 50, ' ', 15, ' ', 38, ' ', 53, ' ', 16, ' ', 18, ' ', 45, ' ', 18, ' ', 20, ' ', 13, ' ', 14, ' ', 512, ' ', 497, '+', 1009, '59.35', 'S'),
('3126034', 'PASS', 'PASS', 'JOSHI RAHUL RAMANAND SUJATA             ', 64, ' ', 18, ' ', 42, ' ', 55, ' ', 13, ' ', 18, ' ', 61, ' ', 19, ' ', 45, ' ', 70, ' ', 19, ' ', 19, ' ', 57, ' ', 21, ' ', 22, ' ', 19, ' ', 20, ' ', 582, ' ', 579, '+', 1161, '68.29', 'I'),
('3126035', 'PASS', 'PASS', '/KADAM POOJA SURESH ANITA               ', 68, ' ', 19, ' ', 35, ' ', 47, ' ', 19, ' ', 18, ' ', 67, ' ', 19, ' ', 42, ' ', 50, ' ', 21, ' ', 20, ' ', 44, ' ', 20, ' ', 22, ' ', 22, ' ', 21, ' ', 554, ' ', 564, '+', 1118, '65.76', 'I'),
('3126036', 'PASS', 'PASS', 'KARANI DHAVAL MANOJ JAYASHREE           ', 67, ' ', 19, ' ', 42, ' ', 70, ' ', 19, ' ', 21, ' ', 66, ' ', 21, ' ', 36, ' ', 71, ' ', 19, ' ', 17, ' ', 49, ' ', 21, ' ', 22, ' ', 21, ' ', 22, ' ', 603, ' ', 592, '+', 1195, '70.29', 'I'),
('3126037', 'PASS', 'PASS', 'KAUL KANAV KAPIL ASHA                   ', 67, ' ', 20, ' ', 42, ' ', 59, ' ', 16, ' ', 21, ' ', 64, ' ', 21, ' ', 36, ' ', 47, ' ', 20, ' ', 20, ' ', 51, ' ', 19, ' ', 21, ' ', 20, ' ', 19, ' ', 563, ' ', 601, '+', 1164, '68.47', 'I'),
('3126038', 'PASS', 'PASS', '/KOLI SHRADDHA MOHAN SMITA              ', 62, 'E', 15, 'E', 21, 'E', 68, 'E', 11, 'E', 5, 'F', 55, 'E', 12, 'E', 12, 'F', 67, 'E', 10, 'E', 4, 'F', 41, 'E', 12, 'E', 4, 'F', 10, 'E', 5, 'F', 414, ' ', 468, '+', 882, '51.88', 'F'),
('3126039', 'PASS', 'PASS', '/KOTHARI SHEETAL JAYESH DAKSHA          ', 66, ' ', 16, ' ', 34, ' ', 69, ' ', 13, ' ', 19, ' ', 67, ' ', 19, ' ', 38, ' ', 67, ' ', 16, ' ', 18, ' ', 50, ' ', 17, ' ', 20, ' ', 20, ' ', 21, ' ', 570, ' ', 539, '+', 1109, '65.24', 'I'),
('3126040', 'PASS', 'PASS', '/LAD SHRUTIKA NEELKANTH GEETA           ', 64, ' ', 20, ' ', 40, ' ', 64, ' ', 20, ' ', 20, ' ', 65, ' ', 18, ' ', 37, ' ', 61, ' ', 21, ' ', 18, ' ', 43, ' ', 21, ' ', 21, ' ', 20, ' ', 20, ' ', 573, ' ', 505, '+', 1078, '63.41', 'I'),
('3126041', 'PASS', 'PASS', 'LIMAYE SOUMITRA CHANDRAKANT ALKA        ', 64, ' ', 20, ' ', 41, ' ', 62, ' ', 21, ' ', 20, ' ', 70, ' ', 22, ' ', 43, ' ', 64, ' ', 21, ' ', 22, ' ', 47, ' ', 23, ' ', 21, ' ', 23, ' ', 23, ' ', 607, ' ', 580, '+', 1187, '69.82', 'I'),
('3126042', 'PASS', 'PASS', 'MALKAR NITIN MADHUKAR MAI               ', 44, 'E', 15, 'E', 41, 'E', 22, 'F', 15, 'E', 18, 'E', 58, 'E', 18, 'E', 42, 'E', 41, 'E', 20, 'E', 18, 'E', 40, 'E', 19, 'E', 20, 'E', 19, 'E', 18, 'E', 468, ' ', 463, '+', 931, '54.76', 'F'),
('3126043', 'PASS', 'PASS', '/MANE ASMITA VILAS SUNITA               ', 52, 'E', 11, 'E', 10, 'F', 25, 'F', 15, 'E', 14, 'E', 67, 'E', 12, 'E', 32, 'E', 47, 'E', 11, 'E', 17, 'E', 45, 'E', 18, 'E', 19, 'E', 12, 'E', 13, 'E', 420, ' ', 458, 'x', 878, '51.65', 'F'),
('3126044', 'PASS', 'PASS', 'MANE NIKHIL SHRIMANT MAYA               ', 41, ' ', 18, ' ', 40, ' ', 32, '*', 17, ' ', 17, ' ', 59, ' ', 16, ' ', 40, ' ', 43, ' ', 21, ' ', 18, ' ', 44, ' ', 21, ' ', 20, ' ', 20, ' ', 19, ' ', 486, '*', 496, '+', 982, '57.76', 'S,O.5045'),
('3126045', 'PASS', 'PASS', '/MANE SHRUTI SANDIP GAURI               ', 40, 'E', 16, 'E', 34, 'E', 40, 'E', 20, 'E', 19, 'E', 49, 'E', 20, 'E', 44, 'E', 40, 'E', 18, 'E', 19, 'E', 27, 'F', 20, 'E', 21, 'E', 20, 'E', 21, 'E', 468, ' ', 496, '+', 964, '56.71', 'F'),
('3126046', 'PASS', 'PASS', '/MARNE KRUTIKA CHANDRAKANT SHARDA       ', 75, ' ', 19, ' ', 41, ' ', 72, ' ', 20, ' ', 23, ' ', 69, ' ', 19, ' ', 42, ' ', 72, ' ', 18, ' ', 20, ' ', 50, ' ', 19, ' ', 20, ' ', 19, ' ', 21, ' ', 619, ' ', 604, '+', 1223, '71.94', 'I'),
('3126047', 'PASS', 'PASS', '/MAURYA PINKI RAMAWADH SAVITRI          ', 49, ' ', 22, ' ', 44, ' ', 65, ' ', 21, ' ', 19, ' ', 63, ' ', 19, ' ', 44, ' ', 70, ' ', 23, ' ', 20, ' ', 44, ' ', 24, ' ', 22, ' ', 22, ' ', 22, ' ', 593, ' ', 574, '+', 1167, '68.65', 'I'),
('3126048', 'PASS', 'PASS', 'MODI ASHUTOSH MUKESH DHARMISTHA         ', 45, 'E', 10, 'E', 12, 'F', 40, 'E', 10, 'E', 5, 'F', 40, 'E', 12, 'E', 11, 'F', 47, 'E', 10, 'E', 2, 'F', 40, 'E', 11, 'E', 3, 'F', 14, 'E', 5, 'F', 317, ' ', 432, 'x ', 749, '44.06', 'F'),
('3126049', 'PASS', 'PASS', 'MUKHILAN VARADARAJAN RANI               ', 55, ' ', 20, ' ', 44, ' ', 54, ' ', 19, ' ', 21, ' ', 65, ' ', 19, ' ', 45, ' ', 57, ' ', 20, ' ', 20, ' ', 40, ' ', 19, ' ', 22, ' ', 20, ' ', 21, ' ', 561, ' ', 566, '+', 1127, '66.29', 'I'),
('3126050', 'PASS', 'PASS', '/NADAR DIVYA ANBALAGAN REGINA           ', 61, ' ', 22, ' ', 47, ' ', 40, ' ', 20, ' ', 20, ' ', 58, ' ', 22, ' ', 46, ' ', 59, ' ', 21, ' ', 19, ' ', 50, ' ', 24, ' ', 20, ' ', 19, ' ', 19, ' ', 567, ' ', 580, '+', 1147, '67.47', 'I'),
('3126051', 'PASS', 'PASS', 'NANAWARE AMOL MADHUKAR SANGITA          ', 55, ' ', 19, ' ', 46, ' ', 46, ' ', 19, ' ', 20, ' ', 58, ' ', 20, ' ', 38, ' ', 49, ' ', 17, ' ', 20, ' ', 41, ' ', 20, ' ', 20, ' ', 21, ' ', 20, ' ', 529, ' ', 511, '+', 1040, '61.18', 'I'),
('3126052', 'PASS', 'PASS', '/NEHETE PRITAM MOHAN REKHA              ', 57, ' ', 17, ' ', 39, ' ', 53, ' ', 20, ' ', 21, ' ', 65, ' ', 18, ' ', 38, ' ', 61, ' ', 18, ' ', 18, ' ', 44, ' ', 18, ' ', 19, ' ', 19, ' ', 20, ' ', 545, ' ', 557, '+', 1102, '64.82', 'I'),
('3126053', 'PASS', 'PASS', '/NIMBALKAR  RASHMI VIVEKANAND VIDYA     ', 59, ' ', 17, ' ', 47, ' ', 56, ' ', 13, ' ', 19, ' ', 69, ' ', 18, ' ', 42, ' ', 64, ' ', 18, ' ', 18, ' ', 55, ' ', 19, ' ', 18, ' ', 18, ' ', 20, ' ', 570, ' ', 581, '+', 1151, '67.71', 'I'),
('3126054', 'PASS', 'PASS', '/PARMAR VARSHIKA VIJAY GEETA            ', 70, ' ', 16, ' ', 41, ' ', 75, ' ', 16, ' ', 19, ' ', 66, ' ', 16, ' ', 43, ' ', 68, ' ', 16, ' ', 19, ' ', 52, ' ', 20, ' ', 19, ' ', 20, ' ', 21, ' ', 597, ' ', 553, '+', 1150, '67.65', 'I'),
('3126055', 'PASS', 'PASS', 'PATEL VINEET HASMUKHLAL GEETABEN        ', 35, '*', 18, ' ', 45, ' ', 68, ' ', 20, ' ', 20, ' ', 52, ' ', 14, ' ', 42, ' ', 40, ' ', 17, ' ', 19, ' ', 53, ' ', 20, ' ', 22, ' ', 22, ' ', 21, ' ', 528, '*', 466, '+', 994, '58.47', 'S,O.5045'),
('3126056', 'PASS', 'PASS', 'PATEL VIRAL BALUBHAI PRAVINABEN         ', 63, ' ', 23, ' ', 45, ' ', 76, ' ', 24, ' ', 22, ' ', 70, ' ', 20, ' ', 48, ' ', 72, ' ', 23, ' ', 23, ' ', 67, ' ', 24, ' ', 22, ' ', 22, ' ', 20, ' ', 664, ' ', 657, '+', 1321, '77.71', 'I'),
('3126057', 'PASS', 'PASS', 'PATHAK ROHIT GIRISH BAGESHRI            ', 60, ' ', 16, ' ', 47, ' ', 43, ' ', 13, ' ', 20, ' ', 61, ' ', 17, ' ', 47, ' ', 53, ' ', 15, ' ', 18, ' ', 42, ' ', 21, ' ', 21, ' ', 22, ' ', 22, ' ', 538, ' ', 537, '+', 1075, '63.24', 'I'),
('3126058', 'PASS', 'PASS', '/PATIL LEENA TANAJIRAO VAIJAYANTI       ', 75, ' ', 18, ' ', 42, ' ', 56, ' ', 16, ' ', 19, ' ', 75, ' ', 18, ' ', 45, ' ', 71, ' ', 20, ' ', 19, ' ', 54, ' ', 20, ' ', 20, ' ', 21, ' ', 21, ' ', 610, ' ', 592, '+', 1202, '70.71', 'I'),
('3126059', 'PASS', 'PASS', 'PATIL PRATHAMESH PRADEEP PRERNA         ', 61, ' ', 16, ' ', 44, ' ', 68, ' ', 18, ' ', 21, ' ', 70, ' ', 17, ' ', 46, ' ', 60, ' ', 20, ' ', 20, ' ', 53, ' ', 22, ' ', 22, ' ', 23, ' ', 23, ' ', 604, ' ', 563, '+', 1167, '68.65', 'I'),
('3126060', 'PASS', 'PASS', '/PATIL TEJALI SUBHASH SAMITA            ', 73, ' ', 17, ' ', 41, ' ', 84, ' ', 17, ' ', 17, ' ', 60, ' ', 21, ' ', 47, ' ', 68, ' ', 19, ' ', 19, ' ', 53, ' ', 22, ' ', 21, ' ', 23, ' ', 23, ' ', 625, ' ', 612, '+', 1237, '72.76', 'I'),
('3126061', 'PASS', 'PASS', '/PAWAR SHAMAL SURESH PUSHPALATA         ', 72, ' ', 20, ' ', 41, ' ', 49, ' ', 14, ' ', 15, ' ', 70, ' ', 20, ' ', 46, ' ', 69, ' ', 22, ' ', 19, ' ', 51, ' ', 20, ' ', 22, ' ', 20, ' ', 21, ' ', 591, ' ', 570, '+', 1161, '68.29', 'I'),
('3126062', 'PASS', 'PASS', '/PHADNIS PRACHETA SUBHASH SUSHAMA       ', 73, ' ', 23, ' ', 47, ' ', 86, ' ', 24, ' ', 22, ' ', 67, ' ', 22, ' ', 46, ' ', 72, ' ', 23, ' ', 23, ' ', 58, ' ', 24, ' ', 22, ' ', 22, ' ', 22, ' ', 676, ' ', 663, '+', 1339, '78.76', 'I'),
('3126063', 'FAIL', 'FAIL', 'ROKADE VAIBHAV CHANDRAKANT KAMAL        ', 0, ' ', 15, 'E', 45, 'E', 0, ' ', 11, 'E', 15, 'E', 44, 'E', 12, 'E', 22, 'E', 40, 'E', 11, 'E', 12, 'E', 0, ' ', 18, 'E', 19, 'E', 21, 'E', 19, 'E', 304, ' ', 0, ' ', 304, '17.88', 'F'),
('3126064', 'PASS', 'PASS', '/ROY MANISHA KAMESHWAR KUMAR JINDRA     ', 73, ' ', 19, ' ', 44, ' ', 75, ' ', 22, ' ', 21, ' ', 74, ' ', 20, ' ', 45, ' ', 63, ' ', 21, ' ', 23, ' ', 51, ' ', 20, ' ', 22, ' ', 22, ' ', 22, ' ', 637, ' ', 621, '+', 1258, '74.00', 'I'),
('3126065', 'PASS', 'PASS', 'SANGHVI VIKRANT DILIP SANDHYA           ', 52, ' ', 20, ' ', 45, ' ', 49, ' ', 15, ' ', 20, ' ', 56, ' ', 19, ' ', 44, ' ', 56, ' ', 20, ' ', 21, ' ', 40, ' ', 19, ' ', 20, ' ', 21, ' ', 23, ' ', 540, ' ', 592, '+', 1132, '66.59', 'I'),
('3126066', 'PASS', 'PASS', 'SATAM DINESH BABAJI SULEKHA             ', 73, ' ', 16, ' ', 41, ' ', 48, ' ', 13, ' ', 16, ' ', 51, ' ', 14, ' ', 39, ' ', 55, ' ', 14, ' ', 12, ' ', 47, ' ', 18, ' ', 21, ' ', 21, ' ', 19, ' ', 518, ' ', 514, '+', 1032, '60.71', 'I'),
('3126067', 'FAIL', 'FAIL', 'SAWANT ADITYA RATNAKAR NEHA             ', 0, ' ', 14, 'E', 38, 'E', 0, ' ', 12, 'E', 15, 'E', 0, ' ', 11, 'E', 38, 'E', 0, ' ', 11, 'E', 13, 'E', 0, ' ', 18, 'E', 19, 'E', 13, 'E', 12, 'E', 214, ' ', 0, ' ', 214, '12.59', 'F'),
('3126068', 'PASS', 'PASS', 'VAIDYA AMIT SADASHIV SUNANDA            ', 70, ' ', 16, ' ', 47, ' ', 42, ' ', 18, ' ', 22, ' ', 70, ' ', 17, ' ', 47, ' ', 64, ' ', 19, ' ', 19, ' ', 55, ' ', 22, ' ', 22, ' ', 23, ' ', 22, ' ', 595, ' ', 582, '+', 1177, '69.24', 'I'),
('3126069', 'PASS', 'PASS', 'VALOTIA DHAVAL RAJENDRA BAKULA          ', 64, ' ', 21, ' ', 45, ' ', 76, ' ', 16, ' ', 21, ' ', 65, ' ', 19, ' ', 47, ' ', 65, ' ', 17, ' ', 18, ' ', 54, ' ', 22, ' ', 22, ' ', 20, ' ', 18, ' ', 610, ' ', 588, '+', 1198, '70.47', 'I'),
('3126070', 'PASS', 'PASS', '/WALIWADEKAR MADHURA SHRINAND PREETI    ', 51, ' ', 21, ' ', 41, ' ', 74, ' ', 24, ' ', 22, ' ', 68, ' ', 22, ' ', 48, ' ', 66, ' ', 22, ' ', 22, ' ', 51, ' ', 24, ' ', 23, ' ', 22, ' ', 23, ' ', 624, ' ', 644, '+', 1268, '74.59', 'I'),
('3126071', 'PASS', 'PASS', '/WANDRE NIKITA PRADIP SHAILAJA          ', 44, 'E', 16, 'E', 25, 'E', 43, 'E', 12, 'E', 13, 'E', 49, 'E', 16, 'E', 36, 'E', 40, 'E', 12, 'E', 4, 'F', 42, 'E', 17, 'E', 19, 'E', 13, 'E', 13, 'E', 414, ' ', 431, '+', 845, '49.71', 'F'),
('3126072', 'PASS', 'PASS', 'MODI PRIYANK ATUL RACHANA               ', 40, '+', 10, '+', 25, '+', 40, '+', 18, '+', 16, '+', 0, ' ', 10, '+', 22, '+', 0, ' ', 15, '+', 16, '+', 47, '+', 15, '+', 19, '+', 20, '+', 21, '+', 334, ' ', 0, ' ', 334, '19.65', 'AA'),
('3126073', 'PASS', 'PASS', 'PARASHAR AKSHAY ANIL ANJANA             ', 40, '+', 16, '+', 38, '+', 44, ' ', 15, '+', 20, '+', 42, '+', 16, '+', 26, '+', 45, ' ', 17, '+', 17, '+', 40, '+', 19, '+', 22, '+', 23, '+', 22, '+', 462, ' ', 433, '+', 895, '52.65', 'P'),
('3126074', 'PASS', 'PASS', 'RANE SANSKAR SANDESH SHUBHANGI          ', 58, '+', 10, '+', 31, '+', 0, 'F', 14, '+', 16, '+', 40, '+', 10, '+', 22, '+', 40, '+', 15, '+', 15, '+', 40, '+', 14, '+', 16, '+', 12, '+', 15, '+', 368, ' ', 0, ' ', 368, '21.65', 'F'),
('3126075', 'PASS', 'PASS', 'SAXENA SHASHANK SUNIT CHITRA            ', 18, 'F', 10, '+', 34, '+', 0, ' ', 15, '+', 18, '+', 49, 'E', 10, '+', 33, '+', 0, ' ', 15, '+', 15, '+', 24, 'F', 15, '+', 22, '+', 15, '+', 17, '+', 310, ' ', 0, ' ', 310, '18.24', 'F'),
('3126076', 'PASS', 'PASS', 'UMAR PANKAJ SALIGRAM GEETA              ', 40, '+', 13, '+', 45, '+', 28, 'F', 11, '+', 10, '+', 50, '+', 12, '+', 28, '+', 40, '+', 10, '+', 15, '+', 40, '+', 15, '+', 12, '+', 10, '+', 10, '+', 389, ' ', 411, 'x', 800, '47.06', 'F');

-- --------------------------------------------------------

--
-- Table structure for table `topicreport`
--

CREATE TABLE IF NOT EXISTS `topicreport` (
  `sr_no` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fac_name` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `day` varchar(10) NOT NULL,
  `sub_th` varchar(50) NOT NULL,
  `topic_th` text NOT NULL,
  `lec_time` varchar(50) NOT NULL,
  `sub_pr` varchar(50) NOT NULL,
  `topic_pr` text NOT NULL,
  `batch` varchar(20) NOT NULL,
  `pr_time` varchar(50) NOT NULL,
  `remark` text NOT NULL,
  PRIMARY KEY (`sr_no`),
  KEY `fac_name` (`fac_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `academic_info`
--
ALTER TABLE `academic_info`
  ADD CONSTRAINT `academic_info_ibfk_1` FOREIGN KEY (`id`) REFERENCES `facultyinfo` (`fac_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `academic_info_ibfk_3` FOREIGN KEY (`mobile_no`) REFERENCES `rfid_info` (`mobile_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `academic_info_ibfk_4` FOREIGN KEY (`fac_name`) REFERENCES `rfid_info` (`fac_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `academic_info_ibfk_5` FOREIGN KEY (`joining_date`) REFERENCES `rfid_info` (`join_date`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `facultylogin`
--
ALTER TABLE `facultylogin`
  ADD CONSTRAINT `faculty_key` FOREIGN KEY (`userid`) REFERENCES `facultyinfo` (`fac_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faculty_detail`
--
ALTER TABLE `faculty_detail`
  ADD CONSTRAINT `faculty_detail_ibfk_1` FOREIGN KEY (`id`) REFERENCES `facultyinfo` (`fac_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `guest_lecture`
--
ALTER TABLE `guest_lecture`
  ADD CONSTRAINT `guest_lecture_ibfk_1` FOREIGN KEY (`faculty_name`) REFERENCES `rfid_info` (`fac_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hr_info`
--
ALTER TABLE `hr_info`
  ADD CONSTRAINT `hr_info_ibfk_1` FOREIGN KEY (`id`) REFERENCES `facultyinfo` (`fac_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rfid_info`
--
ALTER TABLE `rfid_info`
  ADD CONSTRAINT `rfid_info_ibfk_1` FOREIGN KEY (`id`) REFERENCES `facultyinfo` (`fac_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `topicreport`
--
ALTER TABLE `topicreport`
  ADD CONSTRAINT `topicreport_ibfk_1` FOREIGN KEY (`fac_name`) REFERENCES `rfid_info` (`fac_name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
