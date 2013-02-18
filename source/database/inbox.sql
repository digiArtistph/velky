-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 18, 2013 at 09:40 AM
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
