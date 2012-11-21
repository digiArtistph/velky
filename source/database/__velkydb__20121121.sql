-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 21, 2012 at 02:57 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(75) DEFAULT NULL,
  `mname` varchar(75) DEFAULT NULL,
  `lname` varchar(75) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `addr1` mediumtext,
  `addr2` mediumtext,
  `utype` enum('0','1','2') DEFAULT NULL COMMENT '0: admin, 1: cca, 2: reserved',
  `status` enum('0','1') DEFAULT NULL COMMENT '0: inactive, 1: otherwise',
  PRIMARY KEY (`u_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `users`
--

