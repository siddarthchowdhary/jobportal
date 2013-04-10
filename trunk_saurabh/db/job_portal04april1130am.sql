-- MySQL dump 10.13  Distrib 5.5.29, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: job_portal
-- ------------------------------------------------------
-- Server version	5.5.29-0ubuntu0.12.04.1-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin_pages`
--

DROP TABLE IF EXISTS `admin_pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_pages` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `title` text NOT NULL,
  `content1` text NOT NULL,
  `content2` text NOT NULL,
  `created _date` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='Admin page table';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_pages`
--

LOCK TABLES `admin_pages` WRITE;
/*!40000 ALTER TABLE `admin_pages` DISABLE KEYS */;
INSERT INTO `admin_pages` VALUES (1,'AboutUs','','&lt;script&gt;window.location.href = &quot;http://www.osscube.com&quot;;&lt;/script&gt;','','0000-00-00'),(2,'ContactUS','','sakjfncsa,mfbnvm,casdfv','','0000-00-00');
/*!40000 ALTER TABLE `admin_pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_details`
--

DROP TABLE IF EXISTS `company_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company_details` (
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COMMENT='details of each company';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_details`
--

LOCK TABLES `company_details` WRITE;
/*!40000 ALTER TABLE `company_details` DISABLE KEYS */;
INSERT INTO `company_details` VALUES (1,'sap_india','www.sap.com',6,'linux','0','2010-12-23 12:23:40','2013-03-12 05:40:30','banglore,noida','India'),(2,'protivity','www.protivity.com',7,'account,insurence','0','2010-12-23 12:23:40','2013-03-12 05:45:12','gurgaon','India'),(3,'times_job','www.times.com',4,'bpo','0','2010-12-23 12:23:40','2013-03-12 05:46:31','gurgaon','India'),(4,'microsoft','www.microsoft.com',5,'c,c#,c++,windows,asp','0','2010-12-23 12:23:40','2013-03-12 05:49:02','washington','America'),(5,'grepcity','www.grepcity.com',5,'oops,java','0','2010-12-23 12:23:40','2013-03-12 05:50:38','noida','India'),(6,'wipro','www.wipro.com',5,'andriod,sqlite','0','2010-12-23 12:23:40','2013-03-12 05:34:30','banglore,noida','India'),(7,'tcs','www.tcs.com',4,'java,finance,c#','0','2013-03-18 10:44:23','2013-03-18 05:14:23','delhi,banglore,noida,hyderabad','india'),(8,'osscube','www.osscube.com',5,'web_services,mobile_applications','0','2013-03-18 10:47:15','2013-03-18 05:17:15','noida','india'),(9,'ibm','www.ibm.com/in/en/',8,'sql_server_support,database_consultant','0','2013-03-18 10:52:17','2013-03-18 05:22:17','banglore,hyderabad,chennai','india'),(10,'godaddy','in.godaddy.com/',9,'website_hosting','0','2013-03-18 11:09:47','2013-03-18 05:39:47','pune,mumbai','india');
/*!40000 ALTER TABLE `company_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employer_details`
--

DROP TABLE IF EXISTS `employer_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employer_details` (
  `id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'unique id for each employer',
  `user_id` int(5) NOT NULL COMMENT 'foreign key to users table',
  `company_id` int(5) NOT NULL COMMENT 'foreign key to company_details',
  `contact_number` varchar(20) NOT NULL COMMENT 'contact number of employer',
  `gender` enum('10','11') NOT NULL DEFAULT '10' COMMENT '10-male,11-female',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `company_id` (`company_id`),
  CONSTRAINT `employer_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `employer_details_ibfk_2` FOREIGN KEY (`company_id`) REFERENCES `company_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COMMENT='employer profile details';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employer_details`
--

LOCK TABLES `employer_details` WRITE;
/*!40000 ALTER TABLE `employer_details` DISABLE KEYS */;
INSERT INTO `employer_details` VALUES (3,1,1,'9876754321','10'),(4,2,1,'9875623489','10'),(5,3,5,'9542368745','10'),(6,4,9,'7821598523','11'),(8,7,5,'9874521598','10'),(9,13,8,'9874563214','10');
/*!40000 ALTER TABLE `employer_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inactive_employer_details`
--

DROP TABLE IF EXISTS `inactive_employer_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inactive_employer_details` (
  `id` int(5) NOT NULL COMMENT 'unique id for each unverified employer',
  `email` varchar(90) NOT NULL COMMENT 'email of employer',
  `password` varchar(50) NOT NULL COMMENT 'password of employer',
  `company_id` int(5) NOT NULL COMMENT 'foreign key to company_details',
  `contact_number` int(15) NOT NULL COMMENT 'contact number of employer',
  `validation_string` varchar(50) NOT NULL COMMENT 'validation string for email validation',
  `employer_name` varchar(50) NOT NULL COMMENT 'name of employer-HR',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='temporary data storage for employer until sucessfull mail validation';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inactive_employer_details`
--

LOCK TABLES `inactive_employer_details` WRITE;
/*!40000 ALTER TABLE `inactive_employer_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `inactive_employer_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inactive_jobseeker_details`
--

DROP TABLE IF EXISTS `inactive_jobseeker_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inactive_jobseeker_details` (
  `id` int(5) NOT NULL COMMENT 'unique id for each jobseeker',
  `email` varchar(90) NOT NULL COMMENT 'email of jobseeker',
  `password` varchar(50) NOT NULL COMMENT 'password of jobseeker',
  `displayname` varchar(50) NOT NULL COMMENT 'display name of jobseeker',
  `validation_string` varchar(50) NOT NULL COMMENT 'validation string for email validation',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='temporary data storage for jobseeker until sucessfull mail validation';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inactive_jobseeker_details`
--

LOCK TABLES `inactive_jobseeker_details` WRITE;
/*!40000 ALTER TABLE `inactive_jobseeker_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `inactive_jobseeker_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs_applied`
--

DROP TABLE IF EXISTS `jobs_applied`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs_applied` (
  `job_id` int(5) NOT NULL COMMENT 'foreign key to jobs_avialable_table',
  `user_id` int(5) NOT NULL COMMENT 'foreign key to users table',
  `date_of_applying` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'date and time of applying job',
  `id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'unique id of each job applied',
  PRIMARY KEY (`id`),
  UNIQUE KEY `job_id_2` (`job_id`,`user_id`),
  KEY `job_id` (`job_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `jobs_applied_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs_available` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `jobs_applied_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1 COMMENT='details of job applied';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs_applied`
--

LOCK TABLES `jobs_applied` WRITE;
/*!40000 ALTER TABLE `jobs_applied` DISABLE KEYS */;
INSERT INTO `jobs_applied` VALUES (1,2,'2013-04-01 07:56:26',26),(1,11,'2013-04-01 08:24:20',27),(1,1,'2013-04-01 08:34:11',29),(9,2,'2013-04-04 03:29:55',32);
/*!40000 ALTER TABLE `jobs_applied` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs_available`
--

DROP TABLE IF EXISTS `jobs_available`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs_available` (
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
  KEY `employer_id` (`employer_id`),
  CONSTRAINT `jobs_available_ibfk_2` FOREIGN KEY (`employer_id`) REFERENCES `employer_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COMMENT='details of job available';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs_available`
--

LOCK TABLES `jobs_available` WRITE;
/*!40000 ALTER TABLE `jobs_available` DISABLE KEYS */;
INSERT INTO `jobs_available` VALUES (1,'Software Engineer',5,6,'2013-03-26 00:00:00','0000-00-00 00:00:00',400000,'0','2013-03-26 05:42:09','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ultricies, massa ut malesuada faucibus, sapien nisi mollis dui, et viverra metus metus sit amet mauris. Aenean tellus tortor, conse','noida','IT-Software','php,mysql'),(3,'software developer',1,8,'2013-04-02 12:56:13','2013-11-13 00:00:00',10000,'0','2013-04-02 07:26:13','applet developer','delhi','java developer','java,php'),(7,'',0,8,'2013-04-02 13:40:10','0000-00-00 00:00:00',0,'0','2013-04-02 08:10:10','','','',''),(8,'',0,8,'2013-04-02 16:37:08','0000-00-00 00:00:00',0,'0','2013-04-02 11:07:08','','','',''),(9,'software engineer',5,8,'2013-04-04 08:59:06','2013-12-12 00:00:00',300000,'0','2013-04-04 03:29:06','lorem ipsim','noida','it_consultant','php,java,mysql'),(10,'http://localhost/jobportal/trunk/indexMa',0,8,'2013-04-04 10:38:53','0000-00-00 00:00:00',0,'0','2013-04-04 05:08:53','http://localhost/jobportal/trunk/indexMain.php?controller=pages&function=updateProfessional','http://localhost/job','http://localhost/job','http://localhost/jobportal/trunk/indexMain.php?controller=pages&function=updateProfessional');
/*!40000 ALTER TABLE `jobs_available` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobseeker_educational_details`
--

DROP TABLE IF EXISTS `jobseeker_educational_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobseeker_educational_details` (
  `id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'unique id for edcational details for each jobseeker',
  `personal_id` int(5) NOT NULL COMMENT 'foreign key to jobseeker_personal_details',
  `highest_degree` varchar(30) NOT NULL COMMENT 'highest degree of jobseeker',
  `graduation_degree` varchar(30) NOT NULL COMMENT 'graduation degree of jobseeker',
  `post_graduation_degree` varchar(30) DEFAULT NULL COMMENT 'post graduation degree of jobseeker',
  `PhD` varchar(30) DEFAULT NULL COMMENT 'PhD degree if any of jobseeker',
  `other_degree` varchar(30) DEFAULT NULL COMMENT 'any other degree or certifcation of jobseeker',
  `last_update` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'date and time of last updation',
  PRIMARY KEY (`id`),
  KEY `personal_id` (`personal_id`),
  CONSTRAINT `jobseeker_educational_details_ibfk_2` FOREIGN KEY (`personal_id`) REFERENCES `jobseeker_personal_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='jobseeker educational details';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobseeker_educational_details`
--

LOCK TABLES `jobseeker_educational_details` WRITE;
/*!40000 ALTER TABLE `jobseeker_educational_details` DISABLE KEYS */;
INSERT INTO `jobseeker_educational_details` VALUES (2,6,'MCA','BCA','MCA','none','sdsd','2013-03-28 12:51:47'),(3,7,'MCA','BCA','MCA','','','2013-03-29 09:40:22');
/*!40000 ALTER TABLE `jobseeker_educational_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobseeker_personal_details`
--

DROP TABLE IF EXISTS `jobseeker_personal_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobseeker_personal_details` (
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
  KEY `user_id` (`user_id`),
  CONSTRAINT `jobseeker_personal_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='jobseeker personal details';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobseeker_personal_details`
--

LOCK TABLES `jobseeker_personal_details` WRITE;
/*!40000 ALTER TABLE `jobseeker_personal_details` DISABLE KEYS */;
INSERT INTO `jobseeker_personal_details` VALUES (6,2,'dfdfd','','Chowdhary','10','1989-12-05','Malviya Nagar','Malviya Nagar','New Delhi','delhi','India',110017,987325233,'2013-03-28 10:26:22'),(7,1,'saurabh','','agarwal','10','1989-11-17','bulandsheher','laxmi nagar','new delhi','delhi','india',110092,110092,'2013-03-29 09:39:48'),(8,2,'dfdfd','','Chowdhary','10','1989-12-05','Malviya Nagar','Malviya Nagar','New Delhi','delhi','India',110017,987325233,'2013-03-31 13:46:48');
/*!40000 ALTER TABLE `jobseeker_personal_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobseeker_professional_details`
--

DROP TABLE IF EXISTS `jobseeker_professional_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobseeker_professional_details` (
  `id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'unique id for professional details of each jobseeker',
  `personal_id` int(5) NOT NULL COMMENT 'foreign key to jobseeker_personal_details table',
  `experience` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'experience of jobseeker in years',
  `keyskills` varchar(150) NOT NULL COMMENT 'key skills of jobseeker',
  `current_industry` varchar(40) NOT NULL COMMENT 'name of current industry of jobseeker',
  `functional_area` varchar(50) NOT NULL COMMENT 'current working area of the jobseeker',
  `last_update` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'date and time of last updation',
  PRIMARY KEY (`id`),
  KEY `personal_id` (`personal_id`),
  CONSTRAINT `jobseeker_professional_details_ibfk_2` FOREIGN KEY (`personal_id`) REFERENCES `jobseeker_personal_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='jobseeker professional details';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobseeker_professional_details`
--

LOCK TABLES `jobseeker_professional_details` WRITE;
/*!40000 ALTER TABLE `jobseeker_professional_details` DISABLE KEYS */;
INSERT INTO `jobseeker_professional_details` VALUES (2,6,12,'php,mysql,ajax,jquery','IT-Software Development','php','2013-03-28 12:22:33'),(3,7,10,'dba','IT-Software Development','php','2013-03-29 09:43:13');
/*!40000 ALTER TABLE `jobseeker_professional_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobseeker_resume`
--

DROP TABLE IF EXISTS `jobseeker_resume`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobseeker_resume` (
  `id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'unique id for each resume',
  `personal_id` int(5) NOT NULL COMMENT 'foreign key to jobseeker_personal_details',
  `resume` mediumblob NOT NULL COMMENT 'resume of jobseeker',
  `resume_header` varchar(100) DEFAULT NULL COMMENT 'header of the resume',
  `extension` tinytext NOT NULL COMMENT 'extension of resume like .doc or .pdf',
  PRIMARY KEY (`id`),
  KEY `personal_id` (`personal_id`),
  CONSTRAINT `jobseeker_resume_ibfk_1` FOREIGN KEY (`personal_id`) REFERENCES `jobseeker_personal_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COMMENT='jobseeker resume';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobseeker_resume`
--

LOCK TABLES `jobseeker_resume` WRITE;
/*!40000 ALTER TABLE `jobseeker_resume` DISABLE KEYS */;
INSERT INTO `jobseeker_resume` VALUES (4,6,'',NULL,'');
/*!40000 ALTER TABLE `jobseeker_resume` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `master_table`
--

DROP TABLE IF EXISTS `master_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `master_table` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'the unique id',
  `codetype` varchar(20) NOT NULL COMMENT 'coloumn name of different tables',
  `codevalue` varchar(20) NOT NULL COMMENT 'value of the above coloumn',
  `status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 is active , 1 inactive',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COMMENT='table used to search data throughout the database';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `master_table`
--

LOCK TABLES `master_table` WRITE;
/*!40000 ALTER TABLE `master_table` DISABLE KEYS */;
INSERT INTO `master_table` VALUES (1,'usertype','admin','0'),(2,'usertype','jobseeker','0'),(3,'usertype','employer','0'),(4,'industry_type','it_consultant','0'),(5,'industry_type','software_development','0'),(6,'industry_type','networking','0'),(7,'industry_type','finance','0'),(8,'industry_type','database_consultant','0'),(9,'industry_type','domain_management','0'),(10,'gender','male','0'),(11,'gender','female','0');
/*!40000 ALTER TABLE `master_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `myuploads`
--

DROP TABLE IF EXISTS `myuploads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `myuploads` (
  `fid` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(256) DEFAULT NULL,
  `url` varchar(30) DEFAULT NULL COMMENT 'ads url',
  `type` varchar(20) DEFAULT NULL COMMENT 'type of content',
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `myuploads`
--

LOCK TABLES `myuploads` WRITE;
/*!40000 ALTER TABLE `myuploads` DISABLE KEYS */;
INSERT INTO `myuploads` VALUES (1,'http://localhost/jobportal/trunk/indexMain.php?controller=pages&function=updateProfessional',NULL,'ads'),(10,'http://localhost/jobportal/trunk/indexMain.php?controller=pages&function=updateProfessional',NULL,'logo');
/*!40000 ALTER TABLE `myuploads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='login details of jobseeker and employer';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'7f6d9e39b45fe3f706fe00d4027100ff','saurabh agarwal','saurabh.agarwal@osscube.com',2,'2013-03-20 18:26:31','2013-03-20 12:56:31','0'),(2,'575ed21475fce302e3976cea2f90e616','siddarth chowdhary','siddarth.chowdhary@osscube.com',2,'2013-03-20 18:28:43','2013-03-20 12:58:43','0'),(3,'c91b919e7d984e7913ab34078bacbf09','pankaj yadav','pankaj.yadav@osscube.com',2,'2013-03-20 18:30:40','2013-03-20 13:00:40','0'),(4,'1632fa64c6d9c85b42bc51296800830f','Jasleen Kaur','jasleen.kaur@osscube.com',2,'2013-03-20 18:31:45','2013-03-20 13:01:45','0'),(5,'136774b86791b9ad6a788da7403218d5','Ashwani Singh','ashwani.singh@osscube.com',2,'2013-03-20 18:33:07','2013-03-20 13:03:07','0'),(6,'e848947a553f48f1b29c0f2bebd74302','Prince Pandey','prince.pandey@osscube.com',2,'2013-03-20 18:33:52','2013-03-20 13:03:52','0'),(7,'bdb47e4503a709d8441d11c487bed70e','chetan sharma','chetan@osscube.com',3,'2013-03-20 18:34:45','2013-03-20 13:04:45','0'),(10,'f589a6959f3e04037eb2b3eb0ff726ac','abhishek arora','abhishek.arora@osscube.com',2,'0000-00-00 00:00:00','2013-03-29 11:23:42','1'),(11,'c7e7571e424d5ef643057d73c9b01ba9','sam winchester','sam@osscube.com',2,'0000-00-00 00:00:00','2013-03-31 05:54:58','1'),(12,'a2083d1a6ffe3724c3972164c9275b1e','nokia mobile','nokia@osscube.com',2,'0000-00-00 00:00:00','2013-03-31 06:02:51','1'),(13,'81db6e1388d056a4be470fb58bd41d78','Deepak Gupta','deepak@osscube.com',3,'2013-04-04 09:05:47','2013-04-04 03:35:47','0'),(14,'21232f297a57a5a743894a0e4a801fc3','administrator','admin@admin.com',1,'2013-04-04 04:06:18','2013-04-04 04:06:18','1'),(15,'fbb1b3d8ca94bac2fb046742c957b61c','~!@#$%^&*() ~!@#$%^&*()','siddarth@osscube.com',2,'2013-04-04 10:27:59','2013-04-04 04:57:59','1'),(16,'e11170b8cbd2d74102651cb967fa28e5','<script>window.location.href=\"http://www.osscube.i','ddd@gmai.com',3,'2013-04-04 10:30:14','2013-04-04 05:00:14','0');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-04-04 11:24:44
