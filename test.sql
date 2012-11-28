-- MySQL dump 10.13  Distrib 5.1.66, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: scaperockn
-- ------------------------------------------------------
-- Server version	5.1.66-0ubuntu0.11.10.2

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
-- Table structure for table `Users`
--

DROP TABLE IF EXISTS `Users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Users` (
  `Username` varchar(20) DEFAULT NULL,
  `Password` varchar(32) DEFAULT NULL,
  `Motto` varchar(20) DEFAULT NULL,
  `ProfileImage` varchar(250) DEFAULT NULL,
  `CreatedDate` date DEFAULT NULL,
  `Biography` varchar(500) DEFAULT NULL,
  `rsn` varchar(20) DEFAULT NULL,
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Team` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Users`
--

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;
INSERT INTO `Users` VALUES ('Admin','823da4223e46ec671a10ea13d7823534','I am cool','','1994-03-19','','Das Wanderer',1,'SL'),('Chris','823da4223e46ec671a10ea13d7823534','','','2012-11-05','','',2,'Community'),('Fred','823da4223e46ec671a10ea13d7823534','','','2012-11-05','','',3,'Media'),('Dan','823da4223e46ec671a10ea13d7823534','','','2012-11-09','','',4,'User');
/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forumsection`
--

DROP TABLE IF EXISTS `forumsection`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forumsection` (
  `forum_id` int(11) NOT NULL AUTO_INCREMENT,
  `forumName` varchar(20) DEFAULT NULL,
  `orderNo` int(11) DEFAULT NULL,
  PRIMARY KEY (`forum_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forumsection`
--

LOCK TABLES `forumsection` WRITE;
/*!40000 ALTER TABLE `forumsection` DISABLE KEYS */;
INSERT INTO `forumsection` VALUES (1,'Home',0),(2,'Discussion',1),(3,'Media',2);
/*!40000 ALTER TABLE `forumsection` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `postarchive`
--

DROP TABLE IF EXISTS `postarchive`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `postarchive` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `thread_id` int(11) DEFAULT NULL,
  `poster_id` int(11) DEFAULT NULL,
  `message` varchar(200) DEFAULT NULL,
  `postedDate` datetime DEFAULT NULL,
  `forum_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `postarchive`
--

LOCK TABLES `postarchive` WRITE;
/*!40000 ALTER TABLE `postarchive` DISABLE KEYS */;
INSERT INTO `postarchive` VALUES (41,16,1,'tdthrtr','0000-00-00 00:00:00',2),(39,15,1,'afsdfsd','0000-00-00 00:00:00',1),(38,15,1,'trgt','0000-00-00 00:00:00',1),(37,14,1,'Helllo','0000-00-00 00:00:00',1),(36,13,1,'trhrth','0000-00-00 00:00:00',2),(34,12,2,'Hai Der','0000-00-00 00:00:00',1),(32,11,1,'First Post','0000-00-00 00:00:00',1),(40,16,1,'yjyj','0000-00-00 00:00:00',2);
/*!40000 ALTER TABLE `postarchive` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `postsection`
--

DROP TABLE IF EXISTS `postsection`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `postsection` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `thread_id` int(11) DEFAULT NULL,
  `poster_id` int(11) DEFAULT NULL,
  `message` varchar(200) DEFAULT NULL,
  `postedDate` datetime DEFAULT NULL,
  `forum_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `postsection`
--

LOCK TABLES `postsection` WRITE;
/*!40000 ALTER TABLE `postsection` DISABLE KEYS */;
INSERT INTO `postsection` VALUES (41,16,1,'Post hidden','2012-11-28 16:29:29',2),(40,16,1,'Post hidden','2012-11-28 16:29:12',2),(39,15,1,'Post hidden','2012-11-28 16:23:09',1),(38,15,1,'Post hidden','2012-11-28 16:22:34',1),(37,14,1,'Post hidden','2012-11-28 15:58:52',1),(36,13,1,'Post hidden','2012-11-13 10:54:07',2),(35,12,1,'Inappropriate. Locked.','2012-11-12 17:36:43',1),(34,12,2,'Post hidden','2012-11-12 17:36:24',1),(33,11,1,'Unappropriate. Locked.','2012-11-12 17:35:45',1),(32,11,1,'Post hidden','2012-11-12 17:35:18',1);
/*!40000 ALTER TABLE `postsection` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `threadarchive`
--

DROP TABLE IF EXISTS `threadarchive`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `threadarchive` (
  `thread_id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) DEFAULT NULL,
  `subject` varchar(30) DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `forum_id` int(11) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`thread_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `threadarchive`
--

LOCK TABLES `threadarchive` WRITE;
/*!40000 ALTER TABLE `threadarchive` DISABLE KEYS */;
INSERT INTO `threadarchive` VALUES (13,1,'rth','2012-11-13 10:54:07',2,'open'),(14,1,'Re: PHP include dont','2012-11-28 15:58:52',1,'locked'),(11,1,'Test','2012-11-12 17:35:18',1,'locked'),(12,2,'St00f','2012-11-12 17:36:24',1,'locked');
/*!40000 ALTER TABLE `threadarchive` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `threadsection`
--

DROP TABLE IF EXISTS `threadsection`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `threadsection` (
  `thread_id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) DEFAULT NULL,
  `subject` varchar(30) DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `forum_id` int(11) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`thread_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `threadsection`
--

LOCK TABLES `threadsection` WRITE;
/*!40000 ALTER TABLE `threadsection` DISABLE KEYS */;
INSERT INTO `threadsection` VALUES (16,1,'hyyy','2012-11-28 16:29:12',2,'open'),(15,1,'hr','2012-11-28 16:22:34',1,'locked');
/*!40000 ALTER TABLE `threadsection` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-11-28 17:46:34
