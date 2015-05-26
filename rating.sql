-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Host: mysql1.alwaysdata.com
-- Generation Time: May 26, 2015 at 03:23 AM
-- Server version: 5.1.66-0+squeeze1
-- PHP Version: 5.3.6-11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bapatamol_webdb`
--

--
-- Table structure for table `blog_snoop`
--

CREATE TABLE IF NOT EXISTS `blog_snoop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `req_URI` varchar(50) NOT NULL,
  `req_time` bigint(20) NOT NULL,
  `remote_addr` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `blog_snoop`
--

INSERT INTO `blog_snoop` (`id`, `req_URI`, `req_time`, `remote_addr`) VALUES
(1, '/getRating.php?postID=abcd', 1432600399, '185.3.135.10');

-- --------------------------------------------------------

--
-- Table structure for table `blog_views`
--

CREATE TABLE IF NOT EXISTS `blog_views` (
  `postID` char(128) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog_views`
--

INSERT INTO `blog_views` (`postID`, `count`) VALUES
('abcd', 1);


-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE IF NOT EXISTS `rating` (
  `rating1` int(11) NOT NULL,
  `rating2` int(11) NOT NULL,
  `rating3` int(11) NOT NULL,
  `rating4` int(11) NOT NULL,
  `rating5` int(11) NOT NULL,
  `ratingCount` int(11) NOT NULL,
  `postID` char(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rating1`, `rating2`, `rating3`, `rating4`, `rating5`, `ratingCount`, `postID`) VALUES
(0, 0, 0, 0, 2, 2, '27e7fa5e1653f14dbf310435f353ca6195ef38b9'),
(0, 0, 1, 0, 0, 1, '2cfd481c0c83913994f82c1f01f188ab7e17f8ec');

