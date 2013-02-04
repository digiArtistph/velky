-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 04, 2013 at 03:23 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=225 ;

--
-- Dumping data for table `accidents`
--

INSERT INTO `accidents` (`a_id`, `acdnttype`, `brgy`, `details`, `caller`, `acdntdate`, `rptdate`, `broadcasted`, `responded`) VALUES
(1, 1, 21, 'motor crashed', 'madel', '2013-01-02 19:12:01', '2013-02-03 19:12:06', 11, 10),
(192, 1, 21, 'car bumed', 'jenney', '2013-01-02 19:12:01', '2013-02-03 19:12:06', 11, 10),
(193, 1, 21, 'motor crashed', 'jenney', '2013-01-02 19:12:01', '2013-02-03 19:12:06', 11, 10),
(194, 1, 21, 'motor crashed', 'jenney', '2013-01-02 19:12:01', '2013-02-03 19:12:06', 11, 10),
(195, 1, 21, 'motor crashed', 'jenney', '2013-01-02 19:12:01', '2013-02-03 19:12:06', 11, 10),
(196, 1, 21, 'motor crashed', 'jenney', '2013-01-02 19:12:01', '2013-02-03 19:12:06', 11, 10),
(197, 1, 21, 'motor crashed', 'jenney', '2013-01-02 19:12:01', '2013-02-03 19:12:06', 11, 10),
(198, 1, 21, 'motor crashed', 'jenney', '2013-01-02 19:12:01', '2013-02-03 19:12:06', 11, 10),
(199, 1, 21, 'motor crashed', 'jenney', '2013-01-02 19:12:01', '2013-02-03 19:12:06', 11, 10),
(200, 1, 21, 'motor crashed', 'jenney', '2013-01-02 19:12:01', '2013-02-03 19:12:06', 11, 10),
(201, 1, 21, 'motor crashed', 'jenney', '2013-01-02 19:12:01', '2013-02-03 19:12:06', 11, 10),
(202, 1, 21, 'motor crashed', 'jenney', '2013-01-02 19:12:01', '2013-02-03 19:12:06', 11, 10),
(203, 1, 21, 'motor crashed', 'jenney', '2013-01-02 19:12:01', '2013-02-03 19:12:06', 11, 10),
(204, 1, 21, 'motor crashed', 'jenney', '2013-01-02 19:12:01', '2013-02-03 19:12:06', 11, 10),
(205, 1, 21, 'motor crashed', 'jenney', '2013-01-02 19:12:01', '2013-02-03 19:12:06', 11, 10),
(206, 1, 21, 'motor crashed', 'jenney', '2013-01-02 19:12:01', '2013-02-03 19:12:06', 11, 10),
(207, 1, 21, 'motor crashed', 'jenney', '2013-01-02 19:12:01', '2013-02-03 19:12:06', 11, 10),
(208, 1, 21, 'motor crashed', 'jenney', '2013-01-02 19:12:01', '2013-02-03 19:12:06', 11, 10),
(209, 1, 21, 'motor crashed', 'jenney', '2013-01-02 19:12:01', '2013-02-03 19:12:06', 11, 10),
(210, 1, 21, 'motor crashed', 'jenney', '2013-01-02 19:12:01', '2013-02-03 19:12:06', 11, 10),
(211, 1, 21, 'motor crashed', 'jenney', '2013-01-02 19:12:01', '2013-02-03 19:12:06', 11, 10),
(212, 1, 21, 'motor crashed', 'jenney', '2013-01-02 19:12:01', '2013-02-03 19:12:06', 11, 10),
(213, 1, 21, 'motor crashed', 'jenney', '2013-01-02 19:12:01', '2013-02-03 19:12:06', 11, 10),
(214, 1, 21, 'motor crashed', 'jenney', '2013-01-02 19:12:01', '2013-02-03 19:12:06', 11, 10),
(215, 1, 21, 'motor crashed', 'jenney', '2013-01-02 19:12:01', '2013-02-03 19:12:06', 11, 10),
(216, 1, 21, 'motor crashed', 'jenney', '2013-01-02 19:12:01', '2013-02-03 19:12:06', 11, 10),
(217, 1, 21, 'motor crashed', 'jenney', '2013-01-02 19:12:01', '2013-02-03 19:12:06', 11, 10),
(218, 1, 21, 'motor crashed', 'jenney', '2013-01-02 19:12:01', '2013-02-03 19:12:06', 11, 10),
(219, 1, 21, 'motor crashed', 'jenney', '2013-01-02 19:12:01', '2013-02-03 19:12:06', 11, 10),
(220, 1, 21, 'motor crashed', 'jenney', '2013-01-02 19:12:01', '2013-02-03 19:12:06', 11, 10),
(221, 1, 21, 'motor crashed', 'jenney', '2013-01-02 19:12:01', '2013-02-03 19:12:06', 11, 10),
(222, 1, 21, 'motor crashed', 'jenney', '2013-01-02 19:12:01', '2013-02-03 19:12:06', 11, 10),
(223, 1, 21, 'motor crashed', 'jenney', '2013-01-02 19:12:01', '2013-02-03 19:12:06', 11, 10),
(224, 1, 21, 'motor crashed', 'jenney', '2013-01-02 19:12:01', '2013-02-03 19:12:06', 11, 10);

-- --------------------------------------------------------

--
-- Table structure for table `accidenttype`
--

CREATE TABLE IF NOT EXISTS `accidenttype` (
  `at_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `status` enum('0','1') DEFAULT '1',
  PRIMARY KEY (`at_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `accidenttype`
--

INSERT INTO `accidenttype` (`at_id`, `name`, `status`) VALUES
(1, 'motor to jeep crash', '1'),
(2, 'car to motor', '1'),
(3, 'car crash', '1'),
(4, 'motor to car', '1');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `fname`, `mname`, `lname`, `email`, `password`, `addr1`, `addr2`, `utype`, `status`) VALUES
(1, 'tongbens', 'quisil', 'libago', 'juntals01@gmail.com', 'b9847b8ec210992a1394899591f23680', 'Consolacion CDO', NULL, '0', '1'),
(2, 'bentong', 'quisil', 'libago', 'admin@yahoo.com', 'b9847b8ec210992a1394899591f23680', 'cosolaction cdo', '', '0', NULL);
