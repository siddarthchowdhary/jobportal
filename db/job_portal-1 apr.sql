-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 01, 2013 at 07:03 PM
-- Server version: 5.5.29
-- PHP Version: 5.3.10-1ubuntu3.6

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
  `industry_type` smallint(6) NOT NULL DEFAULT '5' COMMENT '4-itConsultant,5-software_development,6-networking,7-finance,8-databaseConsultant,9-domainManagement',
  `key_functional_area` varchar(150) NOT NULL COMMENT 'comma seperated major functional area of company',
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0 is active, 1 is inactive',
  `creation_date` datetime DEFAULT NULL COMMENT 'creation time of company',
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'date and time of last updation',
  `city` varchar(50) NOT NULL COMMENT 'city of company location',
  `country` varchar(30) NOT NULL COMMENT 'country where company is located',
  PRIMARY KEY (`id`),
  UNIQUE KEY `company_name` (`company_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='details of each company' AUTO_INCREMENT=11 ;

--
-- Dumping data for table `company_details`
--

INSERT INTO `company_details` (`id`, `company_name`, `website`, `industry_type`, `key_functional_area`, `status`, `creation_date`, `last_update`, `city`, `country`) VALUES
(1, 'sap_india', 'www.sap.com', 6, 'linux', '0', '2010-12-23 12:23:40', '2013-03-12 05:40:30', 'banglore,noida', 'India'),
(2, 'protivity', 'www.protivity.com', 7, 'account,insurence', '0', '2010-12-23 12:23:40', '2013-03-12 05:45:12', 'gurgaon', 'India'),
(3, 'times_job', 'www.times.com', 4, 'bpo', '0', '2010-12-23 12:23:40', '2013-03-12 05:46:31', 'gurgaon', 'India'),
(4, 'microsoft', 'www.microsoft.com', 5, 'c,c#,c++,windows,asp', '0', '2010-12-23 12:23:40', '2013-03-12 05:49:02', 'washington', 'America'),
(5, 'grepcity', 'www.grepcity.com', 5, 'oops,java', '0', '2010-12-23 12:23:40', '2013-03-12 05:50:38', 'noida', 'India'),
(6, 'wipro', 'www.wipro.com', 5, 'andriod,sqlite', '0', '2010-12-23 12:23:40', '2013-03-12 05:34:30', 'banglore,noida', 'India'),
(7, 'tcs', 'www.tcs.com', 4, 'java,finance,c#', '0', '2013-03-18 10:44:23', '2013-03-18 05:14:23', 'delhi,banglore,noida,hyderabad', 'india'),
(8, 'osscube', 'www.osscube.com', 5, 'web_services,mobile_applications', '0', '2013-03-18 10:47:15', '2013-03-18 05:17:15', 'noida', 'india'),
(9, 'ibm', 'www.ibm.com/in/en/', 8, 'sql_server_support,database_consultant', '0', '2013-03-18 10:52:17', '2013-03-18 05:22:17', 'banglore,hyderabad,chennai', 'india'),
(10, 'godaddy', 'in.godaddy.com/', 9, 'website_hosting', '0', '2013-03-18 11:09:47', '2013-03-18 05:39:47', 'pune,mumbai', 'india');

-- --------------------------------------------------------

--
-- Table structure for table `employer_details`
--

CREATE TABLE IF NOT EXISTS `employer_details` (
  `id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'unique id for each employer',
  `user_id` int(5) NOT NULL COMMENT 'foreign key to users table',
  `company_id` int(5) NOT NULL COMMENT 'foreign key to company_details',
  `contact_number` varchar(20) NOT NULL COMMENT 'contact number of employer',
  `gender` enum('10','11') NOT NULL DEFAULT '10' COMMENT '10-male,11-female',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `company_id` (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='employer profile details' AUTO_INCREMENT=7 ;

--
-- Dumping data for table `employer_details`
--

INSERT INTO `employer_details` (`id`, `user_id`, `company_id`, `contact_number`, `gender`) VALUES
(3, 1, 1, '9876754321', '10'),
(4, 2, 1, '9875623489', '10'),
(5, 3, 5, '9542368745', '10'),
(6, 4, 9, '7821598523', '11');

-- --------------------------------------------------------

--
-- Table structure for table `inactive_employer_details`
--

CREATE TABLE IF NOT EXISTS `inactive_employer_details` (
  `id` int(5) NOT NULL COMMENT 'unique id for each unverified employer',
  `email` varchar(90) NOT NULL COMMENT 'email of employer',
  `password` varchar(50) NOT NULL COMMENT 'password of employer',
  `company_id` int(5) NOT NULL COMMENT 'foreign key to company_details',
  `contact_number` int(15) NOT NULL COMMENT 'contact number of employer',
  `validation_string` varchar(50) NOT NULL COMMENT 'validation string for email validation',
  `employer_name` varchar(50) NOT NULL COMMENT 'name of employer-HR',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='temporary data storage for employer until sucessfull mail validation';

-- --------------------------------------------------------

--
-- Table structure for table `inactive_jobseeker_details`
--

CREATE TABLE IF NOT EXISTS `inactive_jobseeker_details` (
  `id` int(5) NOT NULL COMMENT 'unique id for each jobseeker',
  `email` varchar(90) NOT NULL COMMENT 'email of jobseeker',
  `password` varchar(50) NOT NULL COMMENT 'password of jobseeker',
  `displayname` varchar(50) NOT NULL COMMENT 'display name of jobseeker',
  `validation_string` varchar(50) NOT NULL COMMENT 'validation string for email validation',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='temporary data storage for jobseeker until sucessfull mail validation';

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='jobseeker educational details' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `jobseeker_educational_details`
--

INSERT INTO `jobseeker_educational_details` (`id`, `personal_id`, `highest_degree`, `graduation_degree`, `post_graduation_degree`, `PhD`, `other_degree`, `last_update`) VALUES
(2, 6, 'MCA', 'BCA', 'MCA', 'bhgfdr', '', '2013-03-28 12:51:47'),
(3, 7, 'MCA', 'BCA', 'MCA', '', '', '2013-03-29 09:40:22');

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
  `country` varchar(50) NOT NULL COMMENT 'nationality of job seeker',
  `pincode` int(10) NOT NULL COMMENT 'pincode of current_city',
  `contact_number` int(15) NOT NULL COMMENT 'current contact number of jobseeker',
  `last_update` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'date and time of last updation',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='jobseeker personal details' AUTO_INCREMENT=9 ;

--
-- Dumping data for table `jobseeker_personal_details`
--

INSERT INTO `jobseeker_personal_details` (`id`, `user_id`, `firstname`, `middlename`, `lastname`, `gender`, `date_of_birth`, `permanent_address`, `current_address`, `current_city`, `current_state`, `country`, `pincode`, `contact_number`, `last_update`) VALUES
(6, 2, 'Siddarth', '', 'Chowdhary', '10', '1989-12-05', 'Malviya Nagar', 'Malviya Nagar', 'New Delhi', 'delhi', 'India', 110017, 987325233, '2013-03-28 10:26:22'),
(7, 1, 'saurabh', '', 'agarwal', '10', '1989-11-17', 'bulandsheher', 'laxmi nagar', 'new delhi', 'delhi', 'india', 110092, 110092, '2013-03-29 09:39:48'),
(8, 2, 'Siddarth', '', 'Chowdhary', '10', '1989-12-05', 'Malviya Nagar', 'Malviya Nagar', 'New Delhi', 'delhi', 'India', 110017, 987325233, '2013-03-31 13:46:48');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='jobseeker professional details' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `jobseeker_professional_details`
--

INSERT INTO `jobseeker_professional_details` (`id`, `personal_id`, `experience`, `keyskills`, `current_industry`, `functional_area`, `last_update`) VALUES
(2, 6, 12, 'php,mysql,ajax,jquery', 'IT-Software Development', 'php', '2013-03-28 12:22:33'),
(3, 7, 10, 'dba', 'IT-Software Development', 'php', '2013-03-29 09:43:13');

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
  UNIQUE KEY `job_id_2` (`job_id`,`user_id`),
  KEY `job_id` (`job_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='details of job applied' AUTO_INCREMENT=30 ;

--
-- Dumping data for table `jobs_applied`
--

INSERT INTO `jobs_applied` (`job_id`, `user_id`, `date_of_applying`, `id`) VALUES
(1, 2, '2013-04-01 07:56:26', 26),
(1, 11, '2013-04-01 08:24:20', 27),
(1, 1, '2013-04-01 08:34:11', 29);

-- --------------------------------------------------------

--
-- Table structure for table `jobs_available`
--

CREATE TABLE IF NOT EXISTS `jobs_available` (
  `id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'unique id for each job',
  `name_of_post` varchar(40) NOT NULL COMMENT 'name of opening',
  `experience_required` tinyint(4) NOT NULL COMMENT 'required experience for the job',
  `employer_id` int(5) NOT NULL COMMENT 'foreign key to employer_details',
  `date_of_job_posted` datetime NOT NULL COMMENT 'date on which job is posted',
  `date_of_last_applying` datetime NOT NULL COMMENT 'last applying date',
  `expected_salary` int(11) NOT NULL COMMENT 'expected salary for the job',
  `status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 is active , 1 is inactive',
  `last_updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'date and time of last updation',
  `job_description` varchar(200) NOT NULL COMMENT 'brief decription of job',
  `job_location` varchar(20) NOT NULL COMMENT 'location of the available job',
  `job_category` varchar(20) NOT NULL COMMENT 'category of the job available',
  `keywords` varchar(150) NOT NULL COMMENT 'meta data for this job etnry',
  PRIMARY KEY (`id`),
  KEY `company_id` (`employer_id`),
  KEY `employer_id` (`employer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='details of job available' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `jobs_available`
--

INSERT INTO `jobs_available` (`id`, `name_of_post`, `experience_required`, `employer_id`, `date_of_job_posted`, `date_of_last_applying`, `expected_salary`, `status`, `last_updated`, `job_description`, `job_location`, `job_category`, `keywords`) VALUES
(1, 'Software Engineer', 5, 6, '2013-03-26 00:00:00', '0000-00-00 00:00:00', 400000, '0', '2013-03-26 05:42:09', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ultricies, massa ut malesuada faucibus, sapien nisi mollis dui, et viverra metus metus sit amet mauris. Aenean tellus tortor, conse', 'noida', 'IT-Software', 'php,mysql');

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
  `usertype` smallint(6) NOT NULL DEFAULT '2' COMMENT '1-admin,2-jobseeker,3-employer',
  `creation_date` datetime NOT NULL COMMENT 'creation time of user',
  `last_login_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'last login date and time',
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0 is active, 1 is inactive',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='login details of jobseeker and employer' AUTO_INCREMENT=13 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `password`, `displayname`, `email`, `usertype`, `creation_date`, `last_login_time`, `status`) VALUES
(1, '7f6d9e39b45fe3f706fe00d4027100ff', 'saurabh agarwal', 'saurabh.agarwal@osscube.com', 2, '2013-03-20 18:26:31', '2013-03-20 12:56:31', '0'),
(2, '575ed21475fce302e3976cea2f90e616', 'siddarth chowdhary', 'siddarth.chowdhary@osscube.com', 2, '2013-03-20 18:28:43', '2013-03-20 12:58:43', '0'),
(3, 'c91b919e7d984e7913ab34078bacbf09', 'pankaj yadav', 'pankaj.yadav@osscube.com', 2, '2013-03-20 18:30:40', '2013-03-20 13:00:40', '0'),
(4, '1632fa64c6d9c85b42bc51296800830f', 'Jasleen Kaur', 'jasleen.kaur@osscube.com', 2, '2013-03-20 18:31:45', '2013-03-20 13:01:45', '0'),
(5, '136774b86791b9ad6a788da7403218d5', 'Ashwani Singh', 'ashwani.singh@osscube.com', 2, '2013-03-20 18:33:07', '2013-03-20 13:03:07', '0'),
(6, 'e848947a553f48f1b29c0f2bebd74302', 'Prince Pandey', 'prince.pandey@osscube.com', 2, '2013-03-20 18:33:52', '2013-03-20 13:03:52', '0'),
(7, 'bdb47e4503a709d8441d11c487bed70e', 'chetan sharma', 'chetan@osscube.com', 3, '2013-03-20 18:34:45', '2013-03-20 13:04:45', '0'),
(10, 'f589a6959f3e04037eb2b3eb0ff726ac', 'abhishek arora', 'abhishek.arora@osscube.com', 2, '0000-00-00 00:00:00', '2013-03-29 11:23:42', '1'),
(11, 'c7e7571e424d5ef643057d73c9b01ba9', 'sam winchester', 'sam@osscube.com', 2, '0000-00-00 00:00:00', '2013-03-31 05:54:58', '1'),
(12, 'a2083d1a6ffe3724c3972164c9275b1e', 'nokia mobile', 'nokia@osscube.com', 2, '0000-00-00 00:00:00', '2013-03-31 06:02:51', '1');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employer_details`
--
ALTER TABLE `employer_details`
  ADD CONSTRAINT `employer_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employer_details_ibfk_2` FOREIGN KEY (`company_id`) REFERENCES `company_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `jobs_applied_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs_available` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jobs_applied_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jobs_available`
--
ALTER TABLE `jobs_available`
  ADD CONSTRAINT `jobs_available_ibfk_2` FOREIGN KEY (`employer_id`) REFERENCES `employer_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
