-- MySQL dump 10.13  Distrib 5.1.66, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: scaperockn
-- ------------------------------------------------------
-- Server version	5.1.66-0ubuntu0.11.10.3

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
  `Posts` int(11) DEFAULT NULL,
  `CreatedDate` date DEFAULT NULL,
  `Biography` varchar(500) DEFAULT NULL,
  `rsn` varchar(20) DEFAULT NULL,
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Team` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Users`
--

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;
INSERT INTO `Users` VALUES ('Admin','823da4223e46ec671a10ea13d7823534','I am cool',47,'1994-03-19','','Das Wanderer',1,'SL'),('Chris','823da4223e46ec671a10ea13d7823534','',3,'2012-11-05','','',2,'Community'),('Fred','823da4223e46ec671a10ea13d7823534','',2,'2012-11-05','','',3,'Media'),('Dan','823da4223e46ec671a10ea13d7823534','',1,'2012-11-09','','',4,'Member'),('charlie','823da4223e46ec671a10ea13d7823534','',6,'2012-11-29','','',5,'Member');
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
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=113 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `postsection`
--

LOCK TABLES `postsection` WRITE;
/*!40000 ALTER TABLE `postsection` DISABLE KEYS */;
INSERT INTO `postsection` VALUES (48,20,1,'dgesdv','2012-12-27 12:39:07',1,'open'),(47,20,1,'iohsehiogewe','2012-12-27 12:39:00',1,'hidden'),(46,19,1,'1gihowegioh','2012-12-26 18:12:38',1,'open'),(45,18,1,'Post hidden','2012-12-26 17:38:18',1,'open'),(44,17,1,'Post hidden','2012-12-26 13:46:42',1,'open'),(43,17,2,'Post hidden','2012-12-26 13:45:17',1,'open'),(42,17,2,'Post hidden','2012-11-29 14:02:19',1,'open'),(41,16,1,'Post hidden','2012-11-28 16:29:29',2,'open'),(40,16,1,'Post hidden','2012-11-28 16:29:12',2,'open'),(39,15,1,'Post hidden','2012-11-28 16:23:09',1,'open'),(38,15,1,'Post hidden','2012-11-28 16:22:34',1,'open'),(37,14,1,'Post hidden','2012-11-28 15:58:52',1,'open'),(36,13,1,'Post hidden','2012-11-13 10:54:07',2,'open'),(35,12,1,'Inappropriate. Locked.','2012-11-12 17:36:43',1,'open'),(34,12,2,'Post hidden','2012-11-12 17:36:24',1,'open'),(33,11,1,'Unappropriate. Locked.','2012-11-12 17:35:45',1,'open'),(32,11,1,'Post hidden','2012-11-12 17:35:18',1,'open'),(49,20,1,'wwqfa','2012-12-27 16:44:52',1,'open'),(50,21,1,'Hello','2012-12-28 11:17:12',1,'open'),(51,21,1,'Thread locked','2012-12-28 12:06:04',1,'open'),(52,22,4,'Surrender monkeys','2012-12-28 12:15:36',1,'open'),(53,22,1,'3wef','2012-12-28 12:16:27',1,'open'),(54,22,1,'Thread locked','2012-12-28 12:16:34',1,'open'),(55,22,1,'Thread re-opened','2012-12-28 12:17:51',1,'open'),(56,22,1,'Thread Locked again','2012-12-28 13:39:07',1,'open'),(57,23,1,'Hello','2012-12-28 13:39:07',2,'open'),(58,24,1,'Hellos','2013-01-02 15:57:48',2,'open'),(59,24,3,'Hi Admin!','2013-01-02 16:24:11',2,'open'),(60,23,3,'Hai Der Admin!','2013-01-02 16:34:03',2,'open'),(93,29,1,'fds','2013-01-09 16:53:39',1,'open'),(94,29,1,'fds','2013-01-09 16:53:41',1,'open'),(62,24,1,'Locked to prevent gravedigging.','2013-01-08 15:29:21',2,'hidden'),(63,21,1,'','2013-01-08 16:43:29',1,'open'),(64,21,1,'','2013-01-08 16:43:31',1,'open'),(65,21,0,'Hello','2013-01-08 16:53:51',1,'open'),(66,21,5,'Hello','2013-01-08 16:54:40',1,'open'),(67,25,5,'Hrewrere','2013-01-08 16:57:35',1,'open'),(68,25,5,'Hello','2013-01-08 17:08:39',1,'open'),(69,25,5,'grrerer','2013-01-09 10:26:31',1,'open'),(83,25,5,'&lt;a href=&quot;hgh&quot;&gt;hi&lt;/a&gt;','2013-01-09 10:57:25',1,'hidden'),(84,25,5,'&lt;a href=&quot;radio.php&quot;&gt;Radio&lt;/a&gt;','2013-01-09 10:57:40',1,'hidden'),(95,29,1,'Hello!','2013-01-09 16:54:03',1,'open'),(96,29,1,'Hai Der','2013-01-09 17:03:14',1,'open'),(86,22,1,'Following SL review this thread has been re-opened.','2013-01-09 11:08:33',1,'open'),(87,28,1,'\' OR \'\';','2013-01-09 11:53:17',1,'hidden'),(88,25,1,'&lt;a href=&quot;forums.php&quot;&gt;Forums&lt;/a&gt;','2013-01-09 11:55:37',1,'open'),(98,29,1,'gf','2013-01-09 17:03:50',1,'open'),(92,29,1,'fds','2013-01-09 16:53:34',1,'open'),(90,29,1,'Hai Der','2013-01-09 12:18:26',1,'open'),(91,25,1,'Hello','2013-01-09 13:40:29',1,'open'),(97,29,1,'gf','2013-01-09 17:03:35',1,'open'),(99,29,1,'39th post!','2013-01-09 17:04:38',1,'open'),(100,29,1,'40th Post!','2013-01-09 17:05:01',1,'open'),(101,29,1,'Dat forum spam','2013-01-09 17:05:38',1,'open'),(102,29,1,'Urgh work!','2013-01-09 17:06:34',1,'open'),(103,29,1,'fdsafsdfds','2013-01-09 17:06:51',1,'open'),(104,29,1,'fdsafsdfds','2013-01-09 17:08:28',1,'open'),(105,29,1,'gdsasgd','2013-01-09 17:08:37',1,'open'),(106,29,1,'gdsasgd','2013-01-09 17:10:17',1,'open'),(107,29,1,'gdsasgd','2013-01-09 17:11:06',1,'open'),(108,30,1,'gffbgf','2013-01-09 17:33:53',1,'open'),(109,31,1,'gbfgbf','2013-01-09 17:33:57',1,'open'),(110,32,1,'fddddddddddddddddddddddddg','2013-01-09 17:34:04',1,'open'),(111,33,1,'fgsgfdgff','2013-01-09 17:34:13',1,'open'),(112,34,1,'fgggggggggd','2013-01-09 17:34:22',1,'hidden');
/*!40000 ALTER TABLE `postsection` ENABLE KEYS */;
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
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `threadsection`
--

LOCK TABLES `threadsection` WRITE;
/*!40000 ALTER TABLE `threadsection` DISABLE KEYS */;
INSERT INTO `threadsection` VALUES (21,1,'Hello','2012-12-28 11:17:12',1,'locked'),(19,1,'grhwgioh','2012-12-26 18:12:38',1,'closed'),(20,1,'Hegsehisg','2012-12-27 12:39:00',1,'closed'),(22,4,'Cheese eating ','2012-12-28 12:15:36',1,'open'),(23,1,'Hello','2013-01-02 11:24:27',2,'open'),(24,1,'Testin','2013-01-02 15:57:48',2,'open'),(25,5,'Hello','2013-01-08 16:57:35',1,'open'),(29,1,'Hello','2013-01-09 12:18:26',1,'open'),(28,1,'\' OR \'\';','2013-01-09 11:53:17',1,'closed'),(30,1,'gnf','2013-01-09 17:33:53',1,'open'),(31,1,'gfbbgfbgf','2013-01-09 17:33:57',1,'open'),(32,1,'gfgbfgffdfdfdf','2013-01-09 17:34:04',1,'open'),(33,1,'ggfgf','2013-01-09 17:34:13',1,'locked'),(34,1,'gfgdsgf','2013-01-09 17:34:22',1,'closed');
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

-- Dump completed on 2013-01-09 18:28:01
