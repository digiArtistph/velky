-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 27, 2013 at 12:04 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `velkydb`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_graph_accident_type`(IN mdatefrom DATE, IN mdateto DATE, IN mtopn TINYINT)
BEGIN

    DECLARE recordnotfound INT DEFAULT 0;
    DECLARE l_count INT DEFAULT 0;
    DECLARE l_at_id INT DEFAULT 0;
    DECLARE l_name VARCHAR(255);
    DECLARE l_date DATE;

    DECLARE curTopN CURSOR FOR SELECT COUNT(a.acdnttype) AS `count`, at.at_id, at.name, DATE(a.stamp) AS `Date` FROM accidents a LEFT JOIN accidenttype at ON a.acdnttype=at.at_id WHERE ((DATE(a.stamp) BETWEEN mdatefrom AND mdateto) AND at.at_id IN (SELECT a.acdnttype FROM accidents a LEFT JOIN accidenttype at ON a.acdnttype=at.at_id WHERE DATE(a.stamp) BETWEEN mdatefrom AND mdateto GROUP BY a.acdnttype ORDER BY COUNT(a.acdnttype) DESC)) GROUP BY DATE(a.stamp), a.acdnttype ORDER BY at.name DESC;

    DECLARE CONTINUE HANDLER FOR NOT FOUND SET recordnotfound = 1;

    # creaates temporary table
     DROP TEMPORARY TABLE IF EXISTS `tmptbl_graph_accident_type`;
     CREATE TEMPORARY TABLE `tmptbl_graph_accident_type`(
       `count` INT,
       acdnttype INT,
       name VARCHAR(255) NULL,
       `date` DATE
     ) ENGINE=MyISAM COMMENT' this tables exists within a session only';

     OPEN curTopN;

     main_loop:LOOP
       FETCH curTopN INTO l_count, l_at_id, l_name, l_date;

       IF recordnotfound = 1 THEN
         LEAVE main_loop;
       END IF;

       INSERT INTO `tmptbl_graph_accident_type` SET `count` = l_count, acdnttype = l_at_id, name = l_name, `date` = l_date;

     END LOOP main_loop;

     CLOSE curTopN;


     -- SELECT * FROM `tmptbl_graph_accident_type`;
      SELECT COUNT(a.acdnttype) AS `count`, at.at_id, at.name, DATE(a.stamp) AS `Date` FROM accidents a LEFT JOIN accidenttype at ON a.acdnttype=at.at_id WHERE ((DATE(a.stamp) BETWEEN mdatefrom AND mdateto) AND at.at_id IN (SELECT a.acdnttype FROM accidents a LEFT JOIN accidenttype at ON a.acdnttype=at.at_id WHERE DATE(a.stamp) BETWEEN mdatefrom AND mdateto GROUP BY a.acdnttype ORDER BY COUNT(a.acdnttype) DESC)) GROUP BY DATE(a.stamp), a.acdnttype ORDER BY at.name DESC;


  END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insert_ambulance`(IN m_plateno VARCHAR(32), IN m_capacity INT, IN m_hospital INT)
BEGIN
	DECLARE lst_id INT DEFAULT 0;
	
	DECLARE EXIT HANDLER FOR SQLWARNING ROLLBACK;
	DECLARE EXIT HANDLER FOR SQLEXCEPTION ROLLBACK;
	
	START TRANSACTION;
	
	# inserts new record in the table ambulances
	INSERT INTO ambulances SET plateno = m_plateno, capacity = m_capacity;


	SET lst_id = LAST_INSERT_ID();

	
	# inserts new record in the hospitals_ambulances table
	INSERT INTO hospitals_ambulances SET h_id = m_hospital, amb_id = lst_id;
	
	COMMIT;
	
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `accidents`
--

CREATE TABLE IF NOT EXISTS `accidents` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `acdnttype` tinyint(4) NOT NULL,
  `brgy` tinyint(4) NOT NULL,
  `details` mediumtext,
  `caller` varchar(255) DEFAULT NULL,
  `acdntdate` date DEFAULT NULL,
  `rptdate` date DEFAULT NULL,
  `broadcasted` tinyint(4) DEFAULT NULL COMMENT 'police|rta|hospital|firehouse. uses binary bits for 4 entities',
  `responded` tinyint(4) DEFAULT NULL COMMENT 'police|rta|hospital|firehouse. uses binary bits for 4 entities',
  `stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=251 ;

--
-- Dumping data for table `accidents`
--

INSERT INTO `accidents` (`a_id`, `acdnttype`, `brgy`, `details`, `caller`, `acdntdate`, `rptdate`, `broadcasted`, `responded`, `stamp`) VALUES
(1, 1, 21, 'motor crashed', 'madel', '2013-01-02', '2013-01-02', 11, 10, '2013-02-17 12:58:55'),
(192, 1, 21, 'car bumed', 'jenney', '2013-01-02', '2013-01-02', 11, 10, '2013-02-17 12:59:16'),
(193, 1, 21, 'motor crashed', 'jenney', '2013-01-02', '2013-01-02', 11, 10, '2013-01-01 14:10:31'),
(194, 1, 21, 'motor crashed', 'jenney', '2013-01-02', '2013-01-02', 11, 10, '2013-02-17 12:59:33'),
(195, 1, 21, 'motor crashed', 'jenney', '2013-01-02', '2013-01-02', 11, 10, '2013-01-02 13:00:04'),
(196, 8, 21, 'motor crashed', 'jenney', '2013-01-03', '2013-01-03', 11, 10, '2013-01-03 09:38:15'),
(197, 1, 21, 'motor crashed', 'jenney', '2013-01-03', '2013-01-03', 11, 10, '2013-01-02 18:00:05'),
(198, 1, 21, 'motor crashed', 'jenney', '2013-01-03', '2013-01-03', 11, 10, '2013-01-02 20:43:00'),
(199, 8, 21, 'motor crashed', 'jenney', '2013-01-03', '2013-01-03', 11, 10, '2013-01-03 09:13:26'),
(200, 7, 21, 'motor crashed', 'jenney', '2013-01-03', '2013-01-03', 11, 10, '2013-01-03 09:14:45'),
(201, 8, 21, 'motor crashed', 'jenney', '2013-01-03', '2013-01-03', 11, 10, '2013-01-03 09:15:19'),
(202, 8, 21, 'motor crashed', 'jenney', '2013-01-03', '2013-01-03', 11, 10, '2013-01-03 09:15:38'),
(203, 1, 21, 'motor crashed', 'jenney', '2013-01-03', '2013-01-03', 11, 10, '2013-01-03 04:25:09'),
(204, 1, 21, 'motor crashed', 'jenney', '2013-01-03', '2013-01-03', 11, 10, '2013-01-03 04:46:14'),
(205, 1, 21, 'motor crashed', 'jenney', '2013-01-03', '2013-01-03', 11, 10, '2013-01-03 05:30:13'),
(206, 7, 21, 'motor crashed', 'jenney', '2013-01-03', '2013-01-03', 11, 10, '2013-01-03 09:39:32'),
(207, 1, 21, 'motor crashed', 'jenney', '2013-01-03', '2013-01-03', 11, 10, '2013-01-03 05:55:54'),
(208, 1, 21, 'motor crashed', 'jenney', '2013-01-04', '2013-01-04', 11, 10, '2013-01-04 04:26:32'),
(209, 1, 21, 'motor crashed', 'jenney', '2013-01-05', '2013-01-05', 11, 10, '2013-01-05 00:36:36'),
(210, 7, 21, 'motor crashed', 'jenney', '2013-01-05', '2013-01-05', 11, 10, '2013-01-05 09:16:32'),
(211, 1, 21, 'motor crashed', 'jenney', '2013-01-05', '2013-01-05', 11, 10, '2013-01-05 00:39:56'),
(212, 1, 21, 'motor crashed', 'jenney', '2013-01-05', '2013-01-05', 11, 10, '2013-01-05 04:17:06'),
(213, 1, 21, 'motor crashed', 'jenney', '2013-01-05', '2013-01-05', 11, 10, '2013-01-05 04:53:10'),
(214, 1, 21, 'motor crashed', 'jenney', '2013-01-05', '2013-01-05', 11, 10, '2013-01-05 05:03:55'),
(215, 1, 21, 'motor crashed', 'jenney', '2013-01-05', '2013-01-05', 11, 10, '2013-01-05 05:24:04'),
(216, 1, 21, 'motor crashed', 'jenney', '2013-01-05', '2013-01-05', 11, 10, '2013-01-05 05:27:52'),
(217, 1, 21, 'motor crashed', 'jenney', '2013-01-06', '2013-01-06', 11, 10, '2013-01-06 03:12:17'),
(218, 7, 21, 'motor crashed', 'jenney', '2013-01-07', '2013-01-07', 11, 10, '2013-01-07 09:20:03'),
(219, 1, 21, 'motor crashed', 'jenney', '2013-01-07', '2013-01-07', 11, 10, '2013-01-07 00:07:50'),
(220, 7, 21, 'motor crashed', 'jenney', '2013-01-07', '2013-01-07', 11, 10, '2013-01-07 09:20:03'),
(221, 1, 21, 'motor crashed', 'jenney', '2013-01-07', '2013-01-07', 11, 10, '2013-01-07 02:23:00'),
(222, 1, 21, 'motor crashed', 'jenney', '2013-01-08', '2013-01-08', 11, 10, '2013-01-08 04:24:17'),
(223, 1, 21, 'motor crashed', 'jenney', '2013-01-08', '2013-01-08', 11, 10, '2013-01-08 04:41:10'),
(224, 1, 21, 'motor crashed', 'jenney', '2013-01-09', '2013-01-09', 11, 10, '2013-01-09 04:43:52'),
(225, 2, 24, 'car to car crashed', NULL, '2013-01-09', '2013-01-09', 11, 11, '2013-01-09 05:25:39'),
(226, 2, 24, 'car to car crashed', NULL, '2013-01-09', '2013-01-09', 11, 11, '2013-01-09 05:42:05'),
(227, 2, 24, 'car to car crashed', NULL, '2013-01-09', '2013-01-09', 11, 11, '2013-01-09 05:48:11'),
(228, 2, 24, 'car to car crashed', NULL, '2013-01-09', '2013-01-09', 11, 11, '2013-01-09 05:49:22'),
(229, 2, 24, 'car to car crashed', NULL, '2013-01-09', '2013-01-09', 11, 11, '2013-01-09 05:53:54'),
(230, 2, 24, 'car to car crashed', NULL, '2013-01-07', '2013-01-07', 11, 11, '2013-01-07 02:07:00'),
(231, 2, 24, 'car to car crashed', NULL, '2013-01-07', '2013-01-07', 11, 11, '2013-01-07 02:20:20'),
(232, 2, 24, 'car to car crashed', NULL, '2013-01-10', '2013-01-10', 11, 11, '2013-01-10 03:22:09'),
(233, 2, 24, 'car to car crashed', NULL, '2013-01-11', '2013-01-11', 11, 11, '2013-01-10 19:10:49'),
(234, 2, 24, 'car to car crashed', NULL, '2013-01-11', '2013-01-11', 11, 11, '2013-01-10 19:25:43'),
(235, 2, 24, 'car to car crashed', NULL, '2013-01-11', '2013-01-11', 11, 11, '2013-01-11 00:20:19'),
(236, 12, 24, 'car to car crashed', NULL, '2013-01-11', '2013-01-11', 11, 11, '2013-01-11 09:23:19'),
(237, 11, 24, 'car to car crashed', NULL, '2013-01-11', '2013-01-11', 11, 11, '2013-01-11 09:24:24'),
(238, 12, 24, 'car to car crashed', NULL, '2013-01-11', '2013-01-11', 11, 11, '2013-01-11 09:23:19'),
(239, 11, 24, 'car to car crashed', NULL, '2013-01-11', '2013-01-11', 11, 11, '2013-01-11 09:24:24'),
(240, 11, 24, 'Suv crashed', 'tongbens', '2013-01-11', '2013-01-11', 11, 11, '2013-01-11 09:24:24'),
(241, 12, 24, 'Suv crashed', 'tongbens', '2013-01-11', '2013-01-11', 11, 11, '2013-01-11 09:23:19'),
(242, 2, 24, 'Suv crashed', 'tongbens', '2013-01-11', '2013-01-11', 11, 11, '2013-01-11 05:20:14'),
(243, 2, 24, 'Suv crashed', 'tongbens', '2013-01-11', '2013-01-11', 11, 11, '2013-01-11 05:23:15'),
(244, 2, 24, 'Suv crashed', 'tongbens', '2013-01-11', '2013-01-11', 11, 11, '2013-01-11 05:27:19'),
(245, 2, 24, 'Suv crashed', 'tongbens', '2013-01-12', '2013-01-12', 11, 11, '2013-01-12 03:19:12'),
(246, 2, 24, 'Suv crashed', 'tongbens', '2013-01-12', '2013-01-12', 11, 11, '2013-01-12 03:31:29'),
(247, 2, 24, 'Suv crashed', 'tongbens', '2013-01-12', '2013-01-12', 11, 11, '2013-01-12 03:35:15'),
(248, 2, 24, 'Suv crashed', 'tongbens', '2013-01-12', '2013-01-12', 11, 11, '2013-01-12 06:50:55'),
(249, 11, 24, 'van crashed', 'junlax', '2013-01-12', '2013-01-12', 11, 11, '2013-01-12 09:24:24'),
(250, 2, 24, 'van crashed', 'junlax', '2013-01-13', '2013-01-13', 11, 11, '2013-01-12 20:31:27');

-- --------------------------------------------------------

--
-- Table structure for table `accidenttype`
--

CREATE TABLE IF NOT EXISTS `accidenttype` (
  `at_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `status` enum('0','1') DEFAULT '1',
  PRIMARY KEY (`at_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `accidenttype`
--

INSERT INTO `accidenttype` (`at_id`, `name`, `status`) VALUES
(1, 'Motorcylce', '1'),
(2, 'Car', '1'),
(6, 'Lane Departure Crash', '1'),
(7, 'Collision involving pedestrians and cyclists', '1'),
(8, 'Head-on collision', '1'),
(9, 'Run-off-road collision', '1'),
(10, 'Single-vehicle collision', '1'),
(11, 'Intersection collision', '1'),
(12, 'Rear-end collision', '1'),
(13, 'Angle or side impact', '1');

-- --------------------------------------------------------

--
-- Table structure for table `barangay`
--

CREATE TABLE IF NOT EXISTS `barangay` (
  `b_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL,
  PRIMARY KEY (`b_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=82 ;

--
-- Dumping data for table `barangay`
--

INSERT INTO `barangay` (`b_id`, `name`, `status`) VALUES
(1, 'Cugman', '1'),
(2, 'Agusan', '1'),
(3, 'Baikingon', '1'),
(4, 'Balubal', '1'),
(5, 'Balulang', '1'),
(6, 'Bayabas', '1'),
(7, 'Bayanga', '1'),
(8, 'Besigan', '1'),
(9, 'Bonbon', '1'),
(10, 'Bugo', '1'),
(11, 'Bulua', '1'),
(12, 'Camaman-an', '1'),
(13, 'Canitoan', '1'),
(14, 'Carmen', '1'),
(15, 'Consolacion', '1'),
(16, 'Cugman', '1'),
(17, 'Dansolihon', '1'),
(18, 'F.S. Catanico', '1'),
(19, 'Gusa', '1'),
(20, 'Iponan', '1'),
(21, 'Indahag', '1'),
(22, 'Kauswagan', '1'),
(23, 'Lapasan', '1'),
(24, 'Lumbia', '1'),
(25, 'Macabalan', '1'),
(26, 'Macasandig', '1'),
(27, 'Mambuaya', '1'),
(28, 'Nazareth', '1'),
(29, 'Pagalongan', '1'),
(30, 'Pagatpat', '1'),
(31, 'Patag', '1'),
(32, 'Pigsag-an', '1'),
(33, 'Puerto', '1'),
(34, 'Puntod', '1'),
(35, 'San Simon', '1'),
(36, 'Tablon', '1'),
(37, 'Tiglimao', '1'),
(38, 'Tagpangi', '1'),
(39, 'Tignapoloan', '1'),
(40, 'Tuburan', '1'),
(41, 'Tumpagon', '1'),
(42, 'Barangay 01 (Poblacion)', '1'),
(43, 'Barangay 02 (Poblacion)', '1'),
(44, 'Barangay 03 (Poblacion)', '1'),
(45, 'Barangay 04 (Poblacion)', '1'),
(46, 'Barangay 05 (Poblacion)', '1'),
(47, 'Barangay 06 (Poblacion)', '1'),
(48, 'Barangay 07 (Poblacion)', '1'),
(49, 'Barangay 08 (Poblacion)', '1'),
(50, 'Barangay 09 (Poblacion)', '1'),
(51, 'Barangay 10 (Poblacion)', '1'),
(52, 'Barangay 11 (Poblacion)', '1'),
(53, 'Barangay 12 (Poblacion)', '1'),
(54, 'Barangay 13 (Poblacion)', '1'),
(55, 'Barangay 14 (Poblacion)', '1'),
(56, 'Barangay 15 (Poblacion)', '1'),
(57, 'Barangay 16 (Poblacion)', '1'),
(58, 'Barangay 17 (Poblacion)', '1'),
(59, 'Barangay 18 (Poblacion)', '1'),
(60, 'Barangay 19 (Poblacion)', '1'),
(61, 'Barangay 20 (Poblacion)', '1'),
(62, 'Barangay 21 (Poblacion)', '1'),
(63, 'Barangay 22 (Poblacion)', '1'),
(64, 'Barangay 23 (Poblacion)', '1'),
(65, 'Barangay 24 (Poblacion)', '1'),
(66, 'Barangay 25 (Poblacion)', '1'),
(67, 'Barangay 26 (Poblacion)', '1'),
(68, 'Barangay 27 (Poblacion)', '1'),
(69, 'Barangay 28 (Poblacion)', '1'),
(70, 'Barangay 29 (Poblacion)', '1'),
(71, 'Barangay 30 (Poblacion)', '1'),
(72, 'Barangay 31 (Poblacion)', '1'),
(73, 'Barangay 32 (Poblacion)', '1'),
(74, 'Barangay 33 (Poblacion)', '1'),
(75, 'Barangay 34 (Poblacion)', '1'),
(76, 'Barangay 35 (Poblacion)', '1'),
(77, 'Barangay 36 (Poblacion)', '1'),
(78, 'Barangay 37 (Poblacion)', '1'),
(79, 'Barangay 38 (Poblacion)', '1'),
(80, 'Barangay 39 (Poblacion)', '1'),
(81, 'Barangay 40 (Poblacion)', '1');

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE IF NOT EXISTS `hospitals` (
  `h_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(150) DEFAULT NULL,
  `status` enum('0','1') DEFAULT '1',
  PRIMARY KEY (`h_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE IF NOT EXISTS `inbox` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message_id` int(15) NOT NULL,
  `number` bigint(15) NOT NULL,
  `message` text NOT NULL,
  `txtdate` datetime NOT NULL,
  `status` enum('1','0') NOT NULL,
  `repliable` enum('1','0') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=147 ;

--
-- Dumping data for table `inbox`
--

INSERT INTO `inbox` (`id`, `message_id`, `number`, `message`, `txtdate`, `status`, `repliable`) VALUES
(146, 12853678, 639175493206, 'Tamis balulang help us pls', '2013-02-17 10:24:26', '1', '1'),
(145, 12839969, 639352689566, 'Rta confirmed', '2013-02-15 23:38:50', '1', '0'),
(144, 12839900, 639175493206, 'Tamis balulang help us pls', '2013-02-15 23:27:13', '0', '0'),
(131, 12834609, 639352689566, 'RTA confirmed', '2013-02-06 23:23:14', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `police`
--

CREATE TABLE IF NOT EXISTS `police` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `station` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(150) DEFAULT NULL,
  `contactperson` varchar(255) DEFAULT NULL,
  `status` enum('0','1') DEFAULT '1',
  PRIMARY KEY (`p_id`),
  UNIQUE KEY `station` (`station`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rta`
--

CREATE TABLE IF NOT EXISTS `rta` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `office` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(150) DEFAULT NULL,
  `contactperson` varchar(255) DEFAULT NULL,
  `status` enum('0','1') DEFAULT '1',
  PRIMARY KEY (`r_id`),
  UNIQUE KEY `r_id` (`r_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(75) DEFAULT NULL,
  `mname` varchar(75) DEFAULT NULL,
  `lname` varchar(75) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) DEFAULT NULL,
  `addr1` mediumtext,
  `addr2` mediumtext,
  `utype` enum('0','1','2') DEFAULT NULL COMMENT '0: admin, 1: cca, 2: reserved',
  `status` enum('0','1') DEFAULT NULL COMMENT '0: inactive, 1: otherwise',
  PRIMARY KEY (`u_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `fname`, `mname`, `lname`, `email`, `password`, `addr1`, `addr2`, `utype`, `status`) VALUES
(1, 'Kenneth', 'Palmero', 'Vallejos', 'kenn_vall@yahoo.com', '2b45dd79684b41a595b5543904f1574a', NULL, NULL, '0', '1'),
(2, NULL, NULL, NULL, 'kennvall@gmail.com', NULL, NULL, NULL, NULL, NULL),
(3, 'Megan', 'Palmero', 'Vallejos', 'meganvallejos@yahoo.com', '92b68f33060be092d8463503ec7bc3fc', 'Zone 2, Cugman, Cagayan de Oro City', '', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `velky_sessions`
--

CREATE TABLE IF NOT EXISTS `velky_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `velky_sessions`
--

INSERT INTO `velky_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('2751afb95c69afc280a84a400eab0de7', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:12.0) Gecko/20100101 Firefox/12.0', 1361923081, 'a:4:{s:9:"user_data";s:0:"";s:15:"SADMIN_USERNAME";s:19:"kenn_vall@yahoo.com";s:17:"SADMIN_ISLOGGEDIN";b:1;s:15:"SADMIN_FULLNAME";s:0:"";}'),
('31a7695fde997d6ac6d9c9c8109b015b', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:12.0) Gecko/20100101 Firefox/12.0', 1361765529, 'a:4:{s:9:"user_data";s:0:"";s:15:"SADMIN_USERNAME";s:19:"kenn_vall@yahoo.com";s:17:"SADMIN_ISLOGGEDIN";b:1;s:15:"SADMIN_FULLNAME";s:0:"";}'),
('4f898bddd47dcac6c00469f91117ca32', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:12.0) Gecko/20100101 Firefox/12.0', 1361882748, 'a:4:{s:9:"user_data";s:0:"";s:15:"SADMIN_USERNAME";s:19:"kenn_vall@yahoo.com";s:17:"SADMIN_ISLOGGEDIN";b:1;s:15:"SADMIN_FULLNAME";s:0:"";}'),
('7942477d49634c8d9fc630969e5240a3', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:12.0) Gecko/20100101 Firefox/12.0', 1361751027, 'a:4:{s:9:"user_data";s:0:"";s:15:"SADMIN_USERNAME";s:19:"kenn_vall@yahoo.com";s:17:"SADMIN_ISLOGGEDIN";b:1;s:15:"SADMIN_FULLNAME";s:0:"";}'),
('89b1c1ea47373a1c6f94715220fa9f2c', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:12.0) Gecko/20100101 Firefox/12.0', 1361780414, 'a:4:{s:9:"user_data";s:0:"";s:15:"SADMIN_USERNAME";s:19:"kenn_vall@yahoo.com";s:17:"SADMIN_ISLOGGEDIN";b:1;s:15:"SADMIN_FULLNAME";s:0:"";}'),
('c48b2d261f2f7bc72d5756490cc0bee5', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:12.0) Gecko/20100101 Firefox/12.0', 1361725024, 'a:4:{s:9:"user_data";s:0:"";s:15:"SADMIN_USERNAME";s:19:"kenn_vall@yahoo.com";s:17:"SADMIN_ISLOGGEDIN";b:1;s:15:"SADMIN_FULLNAME";s:0:"";}'),
('e805b1d6460ec4a152868b4358f279f1', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:12.0) Gecko/20100101 Firefox/12.0', 1361898919, 'a:4:{s:9:"user_data";s:0:"";s:15:"SADMIN_USERNAME";s:19:"kenn_vall@yahoo.com";s:17:"SADMIN_ISLOGGEDIN";b:1;s:15:"SADMIN_FULLNAME";s:0:"";}'),
('e9cad03d67f5ce58a401130374c4be6d', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:12.0) Gecko/20100101 Firefox/12.0', 1361797302, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
