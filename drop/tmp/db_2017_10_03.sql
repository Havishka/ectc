-- MySQL dump 10.13  Distrib 5.5.51-38.2, for Linux (x86_64)
--
-- Host: localhost    Database: ectc_lec
-- ------------------------------------------------------
-- Server version	5.5.51-38.2

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `admin_id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `branch_id` varchar(50) NOT NULL,
  `level` int(11) DEFAULT '1',
  `profile` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=113 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (100,'CADD RootUser','admin','chinthakavishwa99@gmail.com','21232f297a57a5a743894a0e4a801fc3','200',1,'37277-libraian2.jpg'),(101,'Admin KandyRoot','admin_k','admin_k@sliit.lk','21232f297a57a5a743894a0e4a801fc3','201',1,'13455-old-paper-texture.jpg'),(102,'Kurunagala DataEntry','admin_kng','admin_kng@gmail.com','21232f297a57a5a743894a0e4a801fc3','202',3,NULL),(103,'Colombo DataEntry','admin_col','admin_col@gmail.com','21232f297a57a5a743894a0e4a801fc3','203',3,NULL),(104,'Kegalle BranchManager','admin_kegalle','admin_keg@gmail.com','21232f297a57a5a743894a0e4a801fc3','204',2,NULL),(105,'Vimukthi Mudalige','vimukthim','vimukthimudalige@gmail.com','15de21c670ae7c3f6f3f1f37029303c9','201',1,'62094-49077-winchester-logo.jpg'),(108,'Chinthaka Dissanayake','sliit555','chinthakavishwa99@gmail.com','c2becee399842929ee57088b15aadcf2','200',1,'user.png'),(107,'Kurunagala CADD','cadd_k','changeme@cadd.lk','df7b1fd75861f775898a1db8d409dad6','202',2,'user.png'),(112,'Test user','Hello','chinthakavishwa99@gmail.com','3767dbde77b93f390415313d5321efae','203',1,'user.png');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `branch`
--

DROP TABLE IF EXISTS `branch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `branch` (
  `branch_id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`branch_id`)
) ENGINE=MyISAM AUTO_INCREMENT=211 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branch`
--

LOCK TABLES `branch` WRITE;
/*!40000 ALTER TABLE `branch` DISABLE KEYS */;
INSERT INTO `branch` VALUES (200,'Malabe'),(201,'Kandy'),(202,'Kurunagala'),(203,'Colombo'),(204,'Kegalle'),(205,'Batticaloa'),(206,'Bandarawela'),(207,'Jaffna'),(208,'Polonnaruwa'),(209,'Anuradhapura'),(210,'Kollupitiya');
/*!40000 ALTER TABLE `branch` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `branch_per`
--

DROP TABLE IF EXISTS `branch_per`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `branch_per` (
  `branch_per_id` int(50) NOT NULL,
  `percentage` int(3) NOT NULL,
  `date` varchar(100) DEFAULT NULL,
  `editedBy` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`branch_per_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branch_per`
--

LOCK TABLES `branch_per` WRITE;
/*!40000 ALTER TABLE `branch_per` DISABLE KEYS */;
INSERT INTO `branch_per` VALUES (200,50,'2017-09-01','admin root'),(201,20,'2017-09-01','admin root'),(202,20,'2017-09-01','admin root'),(203,20,'2017-09-01','admin root'),(204,20,'2017-09-01','admin root'),(205,0,'2017-09-01','admin root'),(206,20,'2017-09-01','admin root'),(207,20,'2017-09-01','admin root'),(208,25,'2017-09-01','admin root'),(209,25,'2017-09-01','admin root'),(210,25,'2017-09-01','admin root');
/*!40000 ALTER TABLE `branch_per` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course` (
  `course_id` int(200) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(150) NOT NULL,
  `course_fee` int(100) NOT NULL,
  `duration` varchar(100) NOT NULL,
  `state` varchar(10) DEFAULT 'T',
  `addedDate` varchar(54) DEFAULT NULL,
  `expdate` varchar(54) DEFAULT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course`
--

LOCK TABLES `course` WRITE;
/*!40000 ALTER TABLE `course` DISABLE KEYS */;
INSERT INTO `course` VALUES (1,'FCADD(AUTOCAD)',25000,'4','T','2017-09-19',NULL),(2,'FCADD MEP',27500,'2.5','T','2017-09-19',NULL),(3,'REVIT',32500,'2.5','T','2017-09-19',NULL),(4,'REVIT MEP',32500,'2.5','T','2017-09-19',NULL),(5,'DID',100000,'8','T','2017-09-19',NULL),(6,'DID MASTER DIP.',175000,'12','T','2017-09-19',NULL),(7,'DPPM',32500,'3','T','2017-09-19',NULL),(8,'PRO - E',45000,'2.5','T','2017-09-19',NULL),(9,'PPP (PRIMAVERA)',32500,'2.5','T','2017-09-19',NULL),(10,'QS',32500,'2.5','T','2017-09-19',NULL),(11,'MANUAL DRAFT',20000,'2.5','T','2017-09-19',NULL),(12,'3DS MAX',25000,'3','T','2017-09-19',NULL),(13,'CIVIL 3D',37500,'3','T','2017-09-19',NULL),(14,'STAAD PRO',36000,'2.5','T','2017-09-19',NULL),(15,'SOLID WORK',37500,'4','T','2017-09-19',NULL),(16,'QTO',20000,'6','F','2017-09-19','2017-09-19'),(17,'Navis Works',30000,'2.5','T','2017-09-19',NULL),(18,'SAP 2000',40000,'2.5','T','2017-09-19',NULL),(19,'Corel Draw',20000,'1','T','2017-09-19',NULL),(20,'Photoshop',20000,'1','T','2017-09-19',NULL),(21,'Illustrator',20000,'1','T','2017-09-19',NULL),(22,'Indesign',20000,'1','T','2017-09-19',NULL),(23,'MEP QS',25000,'2.5','T','2017-09-19',NULL),(24,'E-TABS',40000,'2.5','T','2017-09-19',NULL),(25,'AUTOCAD ELECTRICAL',28000,'2.5','T','2017-09-19',NULL),(26,'PMP',40000,'1','T','2017-09-19',NULL),(27,'CAPM',30000,'1','T','2017-09-19',NULL),(28,'FOUNDATION - PMI',20000,'1','T','2017-09-19',NULL);
/*!40000 ALTER TABLE `course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_installment`
--

DROP TABLE IF EXISTS `course_installment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course_installment` (
  `course_id` int(50) NOT NULL,
  `installment_01` int(100) DEFAULT NULL,
  `installment_02` int(100) DEFAULT NULL,
  `installment_03` int(100) DEFAULT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_installment`
--

LOCK TABLES `course_installment` WRITE;
/*!40000 ALTER TABLE `course_installment` DISABLE KEYS */;
INSERT INTO `course_installment` VALUES (14,14000,11000,11000),(13,15500,11000,11000),(12,10000,7500,7500),(11,12000,8000,0),(10,13500,9500,9500),(9,20000,12500,0),(8,18000,13500,13500),(7,13500,9500,9500),(6,70000,52500,52500),(5,40000,30000,30000),(4,20000,12500,0),(3,20000,12500,0),(2,11500,8000,8000),(1,10000,7500,7500),(15,15500,11000,11000),(16,12000,8000,0),(17,18000,12000,0),(18,24000,16000,0),(19,12000,8000,0),(20,12000,8000,0),(21,12000,8000,0),(22,12000,8000,0),(23,10000,7500,7500),(24,24000,16000,0),(25,16000,12000,0),(26,40000,0,0),(27,30000,0,0),(28,20000,0,0);
/*!40000 ALTER TABLE `course_installment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discount_group`
--

DROP TABLE IF EXISTS `discount_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `discount_group` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `memStart` int(100) DEFAULT NULL,
  `memEnd` int(100) DEFAULT NULL,
  `discount` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discount_group`
--

LOCK TABLES `discount_group` WRITE;
/*!40000 ALTER TABLE `discount_group` DISABLE KEYS */;
INSERT INTO `discount_group` VALUES (29,5,10,'0.2'),(30,11,15,'0.25'),(31,16,20,'0.30'),(32,21,100,'0.40'),(33,1,4,'0');
/*!40000 ALTER TABLE `discount_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discount_member`
--

DROP TABLE IF EXISTS `discount_member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `discount_member` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `prev_courses` int(50) DEFAULT NULL,
  `fullPay_discount` varchar(50) DEFAULT NULL,
  `halfPay_discount` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discount_member`
--

LOCK TABLES `discount_member` WRITE;
/*!40000 ALTER TABLE `discount_member` DISABLE KEYS */;
INSERT INTO `discount_member` VALUES (1,1,'10','0'),(2,2,'10','0'),(3,3,'15','5'),(4,4,'15','5'),(5,5,'20','10'),(6,6,'20','10');
/*!40000 ALTER TABLE `discount_member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log` (
  `log_id` int(255) NOT NULL AUTO_INCREMENT,
  `log_admin_id` varchar(50) DEFAULT NULL,
  `start_time` varchar(100) DEFAULT NULL,
  `end_time` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `log_details` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log`
--

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
INSERT INTO `log` VALUES (1,'admin_k','1506581480','newaccount','2017-09-28','Level 3 account created for Malabe DataEntry'),(2,'admin_k','1506581609','uptdaccount','2017-09-28','Malabe DataEntry2`s Account details updated!'),(3,'admin','1506581978','uptdaccount','2017-09-28','Malabe DataEntry2`s account deleted!'),(4,'admin_k','1506587031','uptdaccount','2017-09-28','Kegalle BranchManager`s Account details updated!'),(5,'admin_k','1506587061','newaccount','2017-09-28','Level 3 account created for test acc'),(6,'admin_k','1506587087','uptdaccount','2017-09-28','test acc`s account deleted!'),(7,'admin','1506589208','newaccount','2017-09-28','Level 2 account created for test'),(8,'admin_k','1506610549','uptdaccount','2017-09-28','test`s account deleted!'),(9,'admin_k','1506669003','newaccount','2017-09-29','Level 1 account created for Test user'),(10,'admin','1506928892','newcourse','2017-10-02','New student registered : NIC : 941681581V  '),(11,'admin','1506929528','newcourse','2017-10-02','New student registered : NIC : 946132616V  ');
/*!40000 ALTER TABLE `log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment` (
  `pay_id` int(250) NOT NULL AUTO_INCREMENT,
  `std_id` int(100) NOT NULL,
  `course_id` int(100) NOT NULL,
  `discount` varchar(100) NOT NULL DEFAULT '0',
  `tot_amount` varchar(100) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `pay_date` date DEFAULT NULL,
  `discount_remark` varchar(500) DEFAULT NULL,
  `approvalState` varchar(5) DEFAULT 'T',
  PRIMARY KEY (`pay_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_installment`
--

DROP TABLE IF EXISTS `payment_installment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment_installment` (
  `ins_id` int(150) NOT NULL AUTO_INCREMENT,
  `l_pay_date` date DEFAULT NULL,
  `std_id` int(50) NOT NULL,
  `course_id` int(50) NOT NULL,
  `installment_1` int(150) DEFAULT '0',
  `installment_2` int(150) DEFAULT '0',
  `installment_3` int(150) DEFAULT '0',
  PRIMARY KEY (`ins_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_installment`
--

LOCK TABLES `payment_installment` WRITE;
/*!40000 ALTER TABLE `payment_installment` DISABLE KEYS */;
/*!40000 ALTER TABLE `payment_installment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_receipt`
--

DROP TABLE IF EXISTS `payment_receipt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment_receipt` (
  `pr_id` int(250) NOT NULL AUTO_INCREMENT,
  `pr_date` date NOT NULL,
  `pr_std_id` int(50) NOT NULL,
  `pr_course_id` int(50) NOT NULL,
  `payment` varchar(100) DEFAULT NULL,
  `issuedBy` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`pr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_receipt`
--

LOCK TABLES `payment_receipt` WRITE;
/*!40000 ALTER TABLE `payment_receipt` DISABLE KEYS */;
/*!40000 ALTER TABLE `payment_receipt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student` (
  `std_id` int(200) NOT NULL AUTO_INCREMENT,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `nic` varchar(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `address` varchar(400) DEFAULT NULL,
  `dob` varchar(20) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `regDate` date DEFAULT NULL,
  `regFee` int(100) DEFAULT NULL,
  PRIMARY KEY (`std_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES (1,'E.R.G.P.M. Rajapaksha','-','941681581V','prasadmenurajapaksha@gmail.com','(076) 703-6046','No:109, Galpotha watta, Hindagolla, Kurunegala.','1994-06-16','male','student','2017-10-02',2000),(2,'W.R.A. Shanika Chathurangani','Ranasinghe','946132616V','mailchathuranasinghe@gmail.com','(077) 265-9976','No:288/2, Mahapitiya, Pothuhera.','1994-04-22','female','student','2017-10-02',2000);
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_branch`
--

DROP TABLE IF EXISTS `student_branch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_branch` (
  `std_id` varchar(50) NOT NULL,
  `branch_id` varchar(50) NOT NULL,
  PRIMARY KEY (`std_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_branch`
--

LOCK TABLES `student_branch` WRITE;
/*!40000 ALTER TABLE `student_branch` DISABLE KEYS */;
INSERT INTO `student_branch` VALUES ('1','202'),('2','202');
/*!40000 ALTER TABLE `student_branch` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_course`
--

DROP TABLE IF EXISTS `student_course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_course` (
  `std_course_id` int(50) NOT NULL AUTO_INCREMENT,
  `std_id` int(200) NOT NULL,
  `course_id` int(200) NOT NULL,
  `sc_date` varchar(100) DEFAULT NULL,
  `course_dur` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`std_course_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_course`
--

LOCK TABLES `student_course` WRITE;
/*!40000 ALTER TABLE `student_course` DISABLE KEYS */;
INSERT INTO `student_course` VALUES (1,1,9,'2017-10-02','2'),(2,2,9,'2017-10-02','2');
/*!40000 ALTER TABLE `student_course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_group`
--

DROP TABLE IF EXISTS `student_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_group` (
  `id` int(150) NOT NULL AUTO_INCREMENT,
  `group_id` varchar(100) DEFAULT NULL,
  `course_id` int(50) NOT NULL,
  `std_id` int(50) NOT NULL,
  `addedDate` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_group`
--

LOCK TABLES `student_group` WRITE;
/*!40000 ALTER TABLE `student_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `student_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_group_tot`
--

DROP TABLE IF EXISTS `student_group_tot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_group_tot` (
  `group_id` int(150) NOT NULL,
  `g_course_id` int(100) NOT NULL,
  `numMembers` int(50) NOT NULL,
  `g_branch_id` varchar(50) DEFAULT NULL,
  `dateCreate` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_group_tot`
--

LOCK TABLES `student_group_tot` WRITE;
/*!40000 ALTER TABLE `student_group_tot` DISABLE KEYS */;
INSERT INTO `student_group_tot` VALUES (1,1,5,'200',NULL);
/*!40000 ALTER TABLE `student_group_tot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_phone`
--

DROP TABLE IF EXISTS `student_phone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_phone` (
  `sp_id` int(100) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(50) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`sp_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_phone`
--

LOCK TABLES `student_phone` WRITE;
/*!40000 ALTER TABLE `student_phone` DISABLE KEYS */;
INSERT INTO `student_phone` VALUES (1,'1','(076) 703-6046'),(2,'2','(077) 265-9976');
/*!40000 ALTER TABLE `student_phone` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_pre_course`
--

DROP TABLE IF EXISTS `student_pre_course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_pre_course` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nic` varchar(15) NOT NULL,
  `last_course_id` int(50) DEFAULT NULL,
  `count_course` int(50) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_pre_course`
--

LOCK TABLES `student_pre_course` WRITE;
/*!40000 ALTER TABLE `student_pre_course` DISABLE KEYS */;
INSERT INTO `student_pre_course` VALUES (1,'941681581V',9,1),(2,'946132616V',9,1);
/*!40000 ALTER TABLE `student_pre_course` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-03  4:23:18
