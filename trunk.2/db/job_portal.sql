-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 05, 2013 at 03:52 PM
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
-- Table structure for table `company_details`
--

CREATE TABLE IF NOT EXISTS `company_details` (
  `id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'unique id for each company',
  `company_name` varchar(50) NOT NULL COMMENT 'name of company',
  `website` varchar(50) DEFAULT NULL COMMENT 'name of website',
  `industry_type` enum('4','5','6','7','8','9') NOT NULL DEFAULT '5' COMMENT '4-it_consultant,5-software_devlopment,6-networking,7-finance,8-db_consultant,9-domain_mgmt',
  `key_functional_area` varchar(150) NOT NULL COMMENT 'comma seperated major functional area of company',
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0 is active, 1 is inactive',
  `creation_date` datetime DEFAULT NULL COMMENT 'creation time of company',
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'date and time of last updation',
  `city` varchar(50) NOT NULL COMMENT 'city of company location',
  `country` varchar(30) NOT NULL COMMENT 'country where company is located',
  PRIMARY KEY (`id`),
  UNIQUE KEY `company_name` (`company_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='details of each company' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employer_details`
--

CREATE TABLE IF NOT EXISTS `employer_details` (
  `id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'unique id for each employer',
  `user_id` int(5) NOT NULL COMMENT 'foreign key to users table',
  `employer_name` varchar(50) NOT NULL COMMENT 'name of employer-HR',
  `company_id` int(5) NOT NULL COMMENT 'foreign key to company_details',
  `contact_number` int(15) NOT NULL COMMENT 'contact number of employer',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='employer profile details' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `inactive_employer_details`
--

CREATE TABLE IF NOT EXISTS `inactive_employer_details` (
  `id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'unique id for each unverified employer',
  `email` varchar(90) NOT NULL COMMENT 'email of employer',
  `password` varchar(50) NOT NULL COMMENT 'password of employer',
  `company_id` int(5) NOT NULL COMMENT 'foreign key to company_details',
  `contact_number` int(15) NOT NULL COMMENT 'contact number of employer',
  `validation_string` varchar(50) NOT NULL COMMENT 'validation string for email validation',
  `employer_name` varchar(50) NOT NULL COMMENT 'name of employer-HR',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='temporary data storage for employer until sucessfull mail validation' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `inactive_jobseeker_details`
--

CREATE TABLE IF NOT EXISTS `inactive_jobseeker_details` (
  `id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'unique id for each jobseeker',
  `email` varchar(90) NOT NULL COMMENT 'email of jobseeker',
  `password` varchar(50) NOT NULL COMMENT 'password of jobseeker',
  `displayname` varchar(50) NOT NULL COMMENT 'display name of jobseeker',
  `validation_string` varchar(50) NOT NULL COMMENT 'validation string for email validation',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='temporary data storage for jobseeker until sucessfull mail validation' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker_educational_details`
--

CREATE TABLE IF NOT EXISTS `jobseeker_educational_details` (
  `id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'unique id for edcational details for each jobseeker',
  `personal_id` int(5) NOT NULL COMMENT 'foreign key to jobseeker_personal_details',
  `highest_degree` varchar(30) NOT NULL COMMENT 'highest degree of jobseeker',
  `graduation_degree` varchar(30) NOT NULL COMMENT 'graduation degree of jobseeker',
  `post_graduation_degree` varchar(30) DEFAULT NULL COMMENT 'post graduation degree of jobseeker',
  `PhD` varchar(30) DEFAULT NULL COMMENT 'PhD degree if any of jobseeker',
  `other_degree` varchar(30) DEFAULT NULL COMMENT 'any other degree or certifcation of jobseeker',
  `last_update` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'date and time of last updation',
  PRIMARY KEY (`id`),
  KEY `personal_id` (`personal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='jobseeker educational details' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker_personal_details`
--

CREATE TABLE IF NOT EXISTS `jobseeker_personal_details` (
  `id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'unique for each profile',
  `user_id` int(5) NOT NULL COMMENT 'foreign key to users table',
  `firstname` varchar(50) NOT NULL COMMENT 'first name of the jobseeker',
  `middlename` varchar(50) DEFAULT NULL COMMENT 'middle name of the jobseeker',
  `lastname` varchar(50) NOT NULL COMMENT 'last name of the jobseeker',
  `gender` enum('10','11') NOT NULL DEFAULT '10' COMMENT '10 is male, 11 is female',
  `date_of_birth` date NOT NULL COMMENT 'date of birth of the jobseeker',
  `permanent_address` varchar(300) NOT NULL COMMENT 'permanent address of the jobseeker',
  `current_address` varchar(300) NOT NULL COMMENT 'current address of jobseeker',
  `current_city` varchar(50) NOT NULL COMMENT 'current city of user',
  `current_state` varchar(50) NOT NULL COMMENT 'current state of jobseeker',
  `pincode` int(10) NOT NULL COMMENT 'pincode of current_city',
  `contact_number` int(15) NOT NULL COMMENT 'current contact number of jobseeker',
  `last_update` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'date and time of last updation',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='jobseeker personal details' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker_professional_details`
--

CREATE TABLE IF NOT EXISTS `jobseeker_professional_details` (
  `id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'unique id for professional details of each jobseeker',
  `personal_id` int(5) NOT NULL COMMENT 'foreign key to jobseeker_personal_details table',
  `experience` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'experience of jobseeker in years',
  `keyskills` varchar(150) NOT NULL COMMENT 'key skills of jobseeker',
  `current_industry` varchar(40) NOT NULL COMMENT 'name of current industry of jobseeker',
  `functional_area` varchar(50) NOT NULL COMMENT 'current working area of the jobseeker',
  `last_update` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'date and time of last updation',
  PRIMARY KEY (`id`),
  KEY `personal_id` (`personal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='jobseeker professional details' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker_resume`
--

CREATE TABLE IF NOT EXISTS `jobseeker_resume` (
  `id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'unique id for each resume',
  `personal_id` int(5) NOT NULL COMMENT 'foreign key to jobseeker_personal_details',
  `resume` mediumblob NOT NULL COMMENT 'resume of jobseeker',
  `resume_header` varchar(100) DEFAULT NULL COMMENT 'header of the resume',
  PRIMARY KEY (`id`),
  KEY `personal_id` (`personal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='jobseeker resume' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jobs_applied`
--

CREATE TABLE IF NOT EXISTS `jobs_applied` (
  `job_id` int(5) NOT NULL COMMENT 'foreign key to jobs_avialable_table',
  `user_id` int(5) NOT NULL COMMENT 'foreign key to users table',
  `date_of_applying` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'date and time of applying job',
  `id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'unique id of each job applied',
  PRIMARY KEY (`id`),
  KEY `job_id` (`job_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='details of job applied' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jobs_available`
--

CREATE TABLE IF NOT EXISTS `jobs_available` (
  `id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'unique id for each job',
  `name_of_post` varchar(40) NOT NULL COMMENT 'name of opening',
  `company_id` int(5) NOT NULL COMMENT 'foreign key to company_details',
  `experience_required` tinyint(4) NOT NULL COMMENT 'required experience for the job',
  `employer_id` int(5) NOT NULL COMMENT 'foreign key to employer_details',
  `date_of_job_posted` datetime NOT NULL COMMENT 'date on which job is posted',
  `date_of_last_applying` datetime NOT NULL COMMENT 'last applying date',
  `expected_salary` int(11) NOT NULL COMMENT 'expected salary for the job',
  `status` enum('0','1') NOT NULL COMMENT '0 is active , 1 is inactive',
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'date and time of last updation',
  `job_description` varchar(200) NOT NULL COMMENT 'brief decription of job',
  PRIMARY KEY (`id`),
  KEY `company_id` (`company_id`,`employer_id`),
  KEY `employer_id` (`employer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='details of job available' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `master_table`
--

CREATE TABLE IF NOT EXISTS `master_table` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'the unique id',
  `codetype` varchar(20) NOT NULL COMMENT 'coloumn name of different tables',
  `codevalue` varchar(20) NOT NULL COMMENT 'value of the above coloumn',
  `status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 is active , 1 inactive',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='table used to search data throughout the database' AUTO_INCREMENT=12 ;

--
-- Dumping data for table `master_table`
--

INSERT INTO `master_table` (`id`, `codetype`, `codevalue`, `status`) VALUES
(1, 'usertype', 'admin', '0'),
(2, 'usertype', 'jobseeker', '0'),
(3, 'usertype', 'employer', '0'),
(4, 'industry_type', 'it_consultant', '0'),
(5, 'industry_type', 'software_development', '0'),
(6, 'industry_type', 'networking', '0'),
(7, 'industry_type', 'finance', '0'),
(8, 'industry_type', 'database_consultant', '0'),
(9, 'industry_type', 'domain_management', '0'),
(10, 'gender', 'male', '0'),
(11, 'gender', 'female', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'unique id for each jobseeker and employer',
  `password` varchar(50) NOT NULL COMMENT 'unique password for each user',
  `displayname` varchar(50) NOT NULL COMMENT 'display name of the user',
  `email` varchar(150) NOT NULL COMMENT 'unique email id of each userid',
  `usertype` enum('1','2','3') NOT NULL DEFAULT '2' COMMENT '1 is admin,2 is jobseeker,3 is employer',
  `creation_date` datetime NOT NULL COMMENT 'creation time of user',
  `last_login_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'last login date and time',
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0 is active, 1 is inactive',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='login details of jobseeker and employer' AUTO_INCREMENT=4 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employer_details`
--
ALTER TABLE `employer_details`
  ADD CONSTRAINT `employer_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jobseeker_educational_details`
--
ALTER TABLE `jobseeker_educational_details`
  ADD CONSTRAINT `jobseeker_educational_details_ibfk_2` FOREIGN KEY (`personal_id`) REFERENCES `jobseeker_personal_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jobseeker_personal_details`
--
ALTER TABLE `jobseeker_personal_details`
  ADD CONSTRAINT `jobseeker_personal_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jobseeker_professional_details`
--
ALTER TABLE `jobseeker_professional_details`
  ADD CONSTRAINT `jobseeker_professional_details_ibfk_2` FOREIGN KEY (`personal_id`) REFERENCES `jobseeker_personal_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jobseeker_resume`
--
ALTER TABLE `jobseeker_resume`
  ADD CONSTRAINT `jobseeker_resume_ibfk_1` FOREIGN KEY (`personal_id`) REFERENCES `jobseeker_personal_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jobs_applied`
--
ALTER TABLE `jobs_applied`
  ADD CONSTRAINT `jobs_applied_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jobs_applied_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs_available` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jobs_available`
--
ALTER TABLE `jobs_available`
  ADD CONSTRAINT `jobs_available_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jobs_available_ibfk_2` FOREIGN KEY (`employer_id`) REFERENCES `employer_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
