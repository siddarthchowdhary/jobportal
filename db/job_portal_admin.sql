-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 04, 2013 at 09:14 AM
-- Server version: 5.5.29
-- PHP Version: 5.3.10-1ubuntu3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `job_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_pages`
--

CREATE TABLE IF NOT EXISTS `admin_pages` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `title` text NOT NULL,
  `content1` text NOT NULL,
  `content2` text NOT NULL,
  `created _date` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Admin page table' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin_pages`
--

INSERT INTO `admin_pages` (`id`, `name`, `title`, `content1`, `content2`, `created _date`) VALUES
(1, 'AboutUs', '', 'Shine is about better and efficient recruitments.\r\n\r\nShine is brought to you by Firefly e-Ventures Ltd., a 100% subsidiary of HT Media. Firefly is HT Media''s latest initiative that will be focussing on building brands and businesses in the new media space.\r\n\r\nHT Media Ltd. is one of Indias largest and most respected names in the media industry, with a wide circulation and dedicated reader base. With brands like Hindustan Times, Hindi Hindustan, it combines an 84 year old tradition of ethical journalism with progressive business practices.\r\n\r\nIts latest brand, Mint, which is a business paper created in partnership with Wall Street Journal, has quickly earned a reputation for itself as a refreshing and well-researched newspaper.\r\n\r\nThe company has also recently entered the radio space through its another subsidiary co., HT Music &amp; Entertainment Co. Ltd. (HTME) with the launch of Fever 104 under HTME , which has already carved a significant share in the Delhi market, and is well on its way in other markets with the establishment of radio stations in ', '', '0000-00-00'),
(2, 'ContactUS', '', 'sakjfncsa,mfbnvm,casdfv', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `myuploads`
--

CREATE TABLE IF NOT EXISTS `myuploads` (
  `fid` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(256) DEFAULT NULL,
  `url` varchar(30) DEFAULT NULL COMMENT 'ads url',
  `type` varchar(20) DEFAULT NULL COMMENT 'type of content',
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `myuploads`
--

INSERT INTO `myuploads` (`fid`, `filename`, `url`, `type`) VALUES
(1, 'abc', NULL, 'ads'),
(10, 'abc', NULL, 'logo');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
