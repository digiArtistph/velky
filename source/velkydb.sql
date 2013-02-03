-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 03, 2013 at 03:15 AM
-- Server version: 5.1.53
-- PHP Version: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `velkydb`
--

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
  `acdntdate` datetime DEFAULT NULL COMMENT 'date of the accident took place',
  `rptdate` datetime DEFAULT NULL COMMENT 'date of the report being called to',
  `broadcasted` tinyint(4) DEFAULT NULL COMMENT 'police|rta|hospital|firehouse. uses binary bits for 4 entities',
  `responded` tinyint(4) DEFAULT NULL COMMENT 'police|rta|hospital|firehouse. uses binary bits for 4 entities',
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `accidents`
--

INSERT INTO `accidents` (`a_id`, `acdnttype`, `brgy`, `details`, `caller`, `acdntdate`, `rptdate`, `broadcasted`, `responded`) VALUES
(1, 4, 0, 'turn turtle', 'pedro', '2013-01-02 00:00:00', '2013-01-02 00:00:00', NULL, NULL),
(2, 2, 2, 'side sweep', 'me', '2013-01-02 00:00:00', '2013-01-02 00:00:00', NULL, NULL),
(3, 2, 0, 'collision', 'me', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
(4, 2, 0, 'collision', 'me', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
(5, 2, 0, 'collision', 'me', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
(6, 2, 0, 'collision', 'me', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
(7, 2, 1, 'collision', 'me', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL);

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
-- Table structure for table `ambulances`
--

CREATE TABLE IF NOT EXISTS `ambulances` (
  `amb_id` int(11) NOT NULL AUTO_INCREMENT,
  `plateno` varchar(32) DEFAULT NULL,
  `capacity` tinyint(4) DEFAULT NULL,
  `active` enum('0','1') DEFAULT '1',
  PRIMARY KEY (`amb_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ambulances`
--


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
  `mobile` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`h_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`h_id`, `name`, `address`, `phone`, `status`, `mobile`) VALUES
(1, 'Polymedic', 'velez', '09175493206', '1', '09175493206');

-- --------------------------------------------------------

--
-- Table structure for table `hospitals_ambulances`
--

CREATE TABLE IF NOT EXISTS `hospitals_ambulances` (
  `h_id` int(11) NOT NULL,
  `amb_id` int(11) NOT NULL,
  PRIMARY KEY (`h_id`,`amb_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='cardinality: many to many';

--
-- Dumping data for table `hospitals_ambulances`
--


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
  `mobile` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`p_id`),
  UNIQUE KEY `station` (`station`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `police`
--

INSERT INTO `police` (`p_id`, `station`, `address`, `phone`, `contactperson`, `status`, `mobile`) VALUES
(1, '01', 'divisoria', '123454321', 'vinas', '1', '09352689566');

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
  `mobile` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`r_id`),
  UNIQUE KEY `r_id` (`r_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rta`
--

INSERT INTO `rta` (`r_id`, `office`, `address`, `phone`, `contactperson`, `status`, `mobile`) VALUES
(1, 'rta 1', 'carmen', '765431234', 'montalba', '1', NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `fname`, `mname`, `lname`, `email`, `password`, `addr1`, `addr2`, `utype`, `status`) VALUES
(2, 'Windyl', 'Abamonga', 'Khu', 'windylkhu@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'XHS', 'XES', '0', '1'),
(11, 'Kenneth', 'Imba', 'Vallejos', 'kennvall@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', '', '', '1', NULL),
(12, 'Norberto', 'Imba', 'Libago, Jr.', 'juntals01@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'Xavier University', 'Corrales', '1', NULL),
(13, 'Dannielle', 'Imba', 'Estanilla', 'danncliff@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', '', '', '1', NULL),
(14, 'Pedro', 'Imba', 'Dela Cruz', 'pedro@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', '', '', '1', NULL),
(15, 'Juan', 'Imba', 'Dela Cruz', 'juan@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', '', '', '1', NULL),
(16, 'Jose', 'Imba', 'Dela Cruz', 'jose@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', '', '', '1', NULL),
(17, 'Joseph', 'Imba', 'Khu', 'joseph@yahoo.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', '', '', '1', NULL),
(18, 'Clifford', 'Imba', 'Estanilla', 'clifford@yahoo.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', '', '', '1', NULL),
(19, 'Junjun', 'Imba', 'Libago', 'junjun@yahoo.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', '', '', '1', NULL);

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `velky_sessions`
--

INSERT INTO `velky_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('10d44b59cd28bf0fd248e364d0f653e3', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.57 Safari/537.17', 1359861082, 'a:4:{s:9:"user_data";s:0:"";s:15:"SADMIN_USERNAME";s:19:"windylkhu@gmail.com";s:17:"SADMIN_ISLOGGEDIN";b:1;s:15:"SADMIN_FULLNAME";s:0:"";}');
