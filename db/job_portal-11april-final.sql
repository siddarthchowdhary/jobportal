-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 11, 2013 at 04:43 PM
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
(1, 'AboutUs', '', '&lt;script&gt;window.location.href = &quot;http://www.osscube.com&quot;;&lt;/script&gt;', '', '0000-00-00'),
(2, 'ContactUS', '', 'sakjfncsa,mfbnvm,casdfv', '', '0000-00-00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='employer profile details' AUTO_INCREMENT=35 ;

--
-- Dumping data for table `employer_details`
--

INSERT INTO `employer_details` (`id`, `user_id`, `company_id`, `contact_number`, `gender`) VALUES
(3, 1, 1, '9876754321', '10'),
(4, 2, 1, '9875623489', '10'),
(5, 3, 5, '9542368745', '10'),
(6, 4, 9, '7821598523', '11'),
(8, 7, 8, '9874521598', '10'),
(9, 13, 8, '9874563214', '10'),
(23, 50, 8, '7854125874', '10'),
(24, 60, 8, '7854125478', '10');

-- --------------------------------------------------------

--
-- Table structure for table `inactive_users`
--

CREATE TABLE IF NOT EXISTS `inactive_users` (
  `id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'unique id for each user',
  `user_id` int(5) NOT NULL COMMENT 'foreign key to users table',
  `validation_string` varchar(40) NOT NULL COMMENT 'validation string to verify email',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='inactive_users' AUTO_INCREMENT=8 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='jobseeker educational details' AUTO_INCREMENT=10 ;

--
-- Dumping data for table `jobseeker_educational_details`
--

INSERT INTO `jobseeker_educational_details` (`id`, `personal_id`, `highest_degree`, `graduation_degree`, `post_graduation_degree`, `PhD`, `other_degree`, `last_update`) VALUES
(2, 6, 'MCA', 'BCA', 'MCA', 'none', 'none', '2013-03-28 12:51:47'),
(3, 7, 'MCA', 'BCA', 'MCA', '', '', '2013-03-29 09:40:22'),
(4, 9, '', '', 'm.b.a', '', '', '2013-04-06 06:19:34'),
(5, 9, '', '', 'm.c.a.', '', '', '2013-04-06 06:20:04'),
(6, 9, '', '', 'm.b.a', '', '', '2013-04-06 06:20:30'),
(7, 9, '', '', 'm.b.a', 'sdkjkfc.swdlfhkoi.', 'fckjbgjkfce', '2013-04-06 06:21:57'),
(8, 9, '', '', 'm.b.a', '', 'jav (ind)', '2013-04-06 06:37:18'),
(9, 9, '', '', 'm.b.a', '', 'java(ind)', '2013-04-06 06:37:42');

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
  `contact_number` varchar(15) NOT NULL COMMENT 'current contact number of jobseeker',
  `last_update` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'date and time of last updation',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='jobseeker personal details' AUTO_INCREMENT=10 ;

--
-- Dumping data for table `jobseeker_personal_details`
--

INSERT INTO `jobseeker_personal_details` (`id`, `user_id`, `firstname`, `middlename`, `lastname`, `gender`, `date_of_birth`, `permanent_address`, `current_address`, `current_city`, `current_state`, `country`, `pincode`, `contact_number`, `last_update`) VALUES
(6, 2, 'siddarth', 'm', 'chowdhary', '10', '1989-12-05', 'Malviya Nagar', 'Malviya Nagar', 'delhi', 'delhi', 'India', 110017, '9873252330', '2013-03-28 10:26:22'),
(7, 1, 'saurabh', '', 'agarwal', '10', '1989-11-17', 'bulandsheher', 'laxmi nagar', 'new delhi', 'delhi', 'india', 110092, '110092', '2013-03-29 09:39:48'),
(8, 2, 'siddarth', 'm', 'chowdhary', '10', '1989-12-05', 'Malviya Nagar', 'Malviya Nagar', 'delhi', 'delhi', 'India', 110017, '9873252330', '2013-03-31 13:46:48'),
(9, 35, 'amber', 'aa', 'sharma', '10', '2013-04-03', 'Malviya Nagar', 'Malviya Nagar', 'new delhi', 'new delhi', 'india', 110017, '9874656321', '2013-04-06 03:07:55');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='jobseeker professional details' AUTO_INCREMENT=5 ;

--
-- Dumping data for table `jobseeker_professional_details`
--

INSERT INTO `jobseeker_professional_details` (`id`, `personal_id`, `experience`, `keyskills`, `current_industry`, `functional_area`, `last_update`) VALUES
(2, 6, 11, 'php,mysql,ajax,jquery', 'IT-Software Development', 'php', '2013-03-28 12:22:33'),
(3, 7, 10, 'dba', 'IT-Software Development', 'php', '2013-03-29 09:43:13'),
(4, 9, 7, 'asdfg,dfgh fgh', '', 'asdfg,dfgh,dfg', '2013-04-06 07:53:30');

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker_resume`
--

CREATE TABLE IF NOT EXISTS `jobseeker_resume` (
  `id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'unique id for each resume',
  `personal_id` int(5) NOT NULL COMMENT 'foreign key to jobseeker_personal_details',
  `resume` mediumblob NOT NULL COMMENT 'resume of jobseeker',
  `resume_header` varchar(100) DEFAULT NULL COMMENT 'header of the resume',
  `extension` tinytext NOT NULL COMMENT 'extension of resume like .doc or .pdf',
  `last_updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'last update time and date of resume uploading',
  PRIMARY KEY (`id`),
  KEY `personal_id` (`personal_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='jobseeker resume' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `jobseeker_resume`
--

INSERT INTO `jobseeker_resume` (`id`, `personal_id`, `resume`, `resume_header`, `extension`, `last_updated_on`) VALUES
(1, 6, '', NULL, 'doc', '2013-04-05 11:15:10');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='details of job applied' AUTO_INCREMENT=178 ;

--
-- Dumping data for table `jobs_applied`
--

INSERT INTO `jobs_applied` (`job_id`, `user_id`, `date_of_applying`, `id`) VALUES
(1, 2, '2013-04-04 14:52:23', 141),
(9, 2, '2013-04-04 14:52:30', 142),
(3, 2, '2013-04-04 14:52:33', 143),
(7, 2, '2013-04-04 15:11:07', 151),
(9, 34, '2013-04-05 11:03:07', 171),
(9, 35, '2013-04-06 03:05:36', 172),
(3, 35, '2013-04-06 03:16:44', 175),
(7, 59, '2013-04-09 09:17:43', 176);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='details of job available' AUTO_INCREMENT=10 ;

--
-- Dumping data for table `jobs_available`
--

INSERT INTO `jobs_available` (`id`, `name_of_post`, `experience_required`, `employer_id`, `date_of_job_posted`, `date_of_last_applying`, `expected_salary`, `status`, `last_updated`, `job_description`, `job_location`, `job_category`, `keywords`) VALUES
(1, 'Software Engineer', 5, 6, '2013-03-26 00:00:00', '0000-00-00 00:00:00', 400000, '0', '2013-03-26 05:42:09', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ultricies, massa ut malesuada faucibus, sapien nisi mollis dui, et viverra metus metus sit amet mauris. Aenean tellus tortor, conse', 'noida', 'IT-Software', 'php,mysql'),
(3, 'software developer', 1, 8, '2013-04-02 12:56:13', '2013-11-13 00:00:00', 10000, '0', '2013-04-02 07:26:13', 'applet developer', 'delhi', 'java developer', 'java,php'),
(7, '', 0, 8, '2013-04-02 13:40:10', '0000-00-00 00:00:00', 0, '0', '2013-04-02 08:10:10', '', '', '', ''),
(9, '!@#$%^&*', 5, 8, '2013-04-04 08:59:06', '2013-12-12 00:00:00', 300000, '0', '2013-04-04 03:29:06', 'lorem ipsim', 'noida', 'it_consultant', 'php,java,mysql');

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
(1, 'http://localhost/jobportal/trunk/indexMain.php?controller=pages&function=updateProfessional', NULL, 'ads'),
(10, 'http://localhost/jobportal/trunk/indexMain.php?controller=pages&function=updateProfessional', NULL, 'logo');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='login details of jobseeker and employer' AUTO_INCREMENT=76 ;

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
(7, 'ba0e1dfea8a44a98e755c036338277dc', 'chetan sharma', 'chetan@osscube.com', 3, '2013-03-20 18:34:45', '2013-03-20 13:04:45', '0'),
(10, 'f589a6959f3e04037eb2b3eb0ff726ac', 'abhishek arora', 'abhishek.arora@osscube.com', 2, '0000-00-00 00:00:00', '2013-03-29 11:23:42', '1'),
(11, 'c7e7571e424d5ef643057d73c9b01ba9', 'sam winchester', 'sam@osscube.com', 2, '0000-00-00 00:00:00', '2013-03-31 05:54:58', '1'),
(12, 'a2083d1a6ffe3724c3972164c9275b1e', 'nokia mobile', 'nokia@osscube.com', 2, '0000-00-00 00:00:00', '2013-03-31 06:02:51', '1'),
(13, '81db6e1388d056a4be470fb58bd41d78', 'Deepak Gupta', 'deepak@osscube.com', 3, '2013-04-04 09:05:47', '2013-04-04 03:35:47', '0'),
(14, '21232f297a57a5a743894a0e4a801fc3', 'administrator', 'admin@admin.com', 1, '2013-04-04 04:06:18', '2013-04-04 04:06:18', '1'),
(34, '9fe9cb12277af13c8bc31be450a3172c', 'micky mouse', 'micky@osscube.com', 2, '2013-04-05 16:32:37', '2013-04-05 11:02:37', '1'),
(35, '470fa523ae519e43b36cabf27131aa7f', 'amber sharma', 'amber@osscube.com', 2, '2013-04-06 08:31:35', '2013-04-06 03:01:35', '1'),
(36, '03c7c0ace395d80182db07ae2c30f034', 's s', 's', 3, '2013-04-06 14:49:47', '2013-04-06 09:19:47', '0'),
(44, 'f1290186a5d0b1ceab27f4e77c0c5d68', 'w w', 'w', 3, '2013-04-06 15:02:03', '2013-04-06 09:32:03', '0'),
(45, '7694f4a66316e53c8cdd9d9954bd611d', 'q q', 'q', 3, '2013-04-06 15:04:26', '2013-04-06 09:34:26', '0'),
(46, '0cc175b9c0f1b6a831c399e269772661', 'a a', 'a', 3, '2013-04-06 15:06:42', '2013-04-06 09:36:42', '0'),
(47, 'e1671797c52e15f763380b45e841ec32', 'e e', 'e', 3, '2013-04-06 15:08:39', '2013-04-06 09:38:39', '0'),
(49, '4b43b0aee35624cd95b910189b3dc231', 'r r', 'r', 3, '2013-04-06 15:12:57', '2013-04-06 09:42:57', '0'),
(50, 'd8578edf8458ce06fbc5bb76a58c5ca4', 'sa sa', 'as@gmail.com', 3, '2013-04-06 15:16:09', '2013-04-06 09:46:09', '0'),
(51, '4a8a08f09d37b73795649038408b5f33', 'c c', 'c', 3, '2013-04-06 15:17:07', '2013-04-06 09:47:07', '0'),
(54, '22d7fe8c185003c98f97e5d6ced420c7', 'dew dew', 'dew@dew.com', 2, '2013-04-06 15:46:32', '2013-04-06 10:16:32', '1'),
(55, '22d7fe8c185003c98f97e5d6ced420c7', 'pepsi pepsi', 'pepsi@pepsi.com', 2, '2013-04-06 16:12:36', '2013-04-06 10:42:36', '1'),
(56, '25d55ad283aa400af464c76d713c07ad', 'prince pandey', 'prince.pandey@gmail.com', 2, '2013-04-06 16:27:32', '2013-04-06 10:57:32', '1'),
(57, '25d55ad283aa400af464c76d713c07ad', 'fsdayc lkjhmnb', 'abc@gmail.com', 2, '2013-04-06 16:32:07', '2013-04-06 11:02:07', '1'),
(58, '2de1b2d6a6738df78c5f9733853bd170', 'akshay kumar', 'akshay@osscube.com', 2, '2013-04-09 09:11:49', '2013-04-09 03:41:49', '1'),
(59, 'e10adc3949ba59abbe56e057f20f883e', 'ggfgd fdbgf', 's@gms.vom', 2, '2013-04-09 14:38:31', '2013-04-09 09:08:31', '1'),
(60, 'b62b535ad89ce75db8dff8e3e1066294', 'aamir agarwal', 'aamir@osscube.com', 3, '2013-04-11 09:09:15', '2013-04-11 03:39:15', '1'),
(75, '3fc0a7acf087f549ac2b266baf94b8b1', 'champion boy', 'champ@gmail.com', 2, '2013-04-11 16:18:26', '2013-04-11 10:48:26', '1');

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
-- Constraints for table `inactive_users`
--
ALTER TABLE `inactive_users`
  ADD CONSTRAINT `inactive_users_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
