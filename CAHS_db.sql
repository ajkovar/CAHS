-- MySQL dump 10.11
--
-- Host: localhost    Database: fsem08g1
-- ------------------------------------------------------
-- Server version	5.0.51a-3ubuntu5.1

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
-- Current Database: `fsem08g1`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `fsem08g1` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `fsem08g1`;

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `appointments` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `service_id` smallint(5) unsigned NOT NULL,
  `customer_id` int(10) unsigned NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `bid_id` int(10) unsigned default NULL,
  `help_status` char(1) NOT NULL default 'N',
  PRIMARY KEY  (`id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=105 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `appointments`
--

LOCK TABLES `appointments` WRITE;
/*!40000 ALTER TABLE `appointments` DISABLE KEYS */;
INSERT INTO `appointments` VALUES (1,3,5,'2008-07-26 10:00:00','2008-07-26 11:30:00',NULL,'N'),(2,3,6,'2008-07-26 10:00:00','2008-07-26 11:30:00',NULL,'N'),(3,3,6,'2008-07-27 10:00:00','2008-07-27 11:30:00',NULL,'N'),(4,3,5,'2008-07-27 10:00:00','2008-07-27 11:30:00',NULL,'N'),(35,1,44,'2008-07-27 08:00:00','2008-07-27 09:00:00',NULL,'Y'),(34,1,44,'2008-07-27 08:00:00','2008-07-27 09:00:00',NULL,'Y'),(33,1,44,'2008-07-27 08:00:00','2008-07-27 09:00:00',NULL,'Y'),(32,1,44,'2008-07-27 08:00:00','2008-07-27 09:00:00',NULL,'Y'),(30,1,44,'2008-07-27 08:00:00','2008-07-27 09:00:00',NULL,'Y'),(31,1,44,'2008-07-27 08:00:00','2008-07-27 09:00:00',NULL,'Y'),(36,1,44,'2008-07-27 08:00:00','2008-07-27 09:00:00',NULL,'Y'),(37,3,44,'2008-07-27 08:00:00','2008-07-27 08:30:00',NULL,'Y'),(38,3,44,'2008-07-27 08:00:00','2008-07-27 08:30:00',NULL,'Y'),(39,3,44,'2008-07-27 08:00:00','2008-07-27 08:30:00',NULL,'Y'),(40,3,44,'2008-07-27 08:00:00','2008-07-27 08:30:00',NULL,'Y'),(41,3,44,'2008-07-27 08:00:00','2008-07-27 08:30:00',NULL,'Y'),(42,3,44,'2008-07-27 08:00:00','2008-07-27 08:30:00',NULL,'Y'),(43,3,44,'2008-07-27 08:00:00','2008-07-27 08:30:00',NULL,'Y'),(44,3,44,'2008-07-27 08:00:00','2008-07-27 08:30:00',NULL,'Y'),(45,3,44,'2008-07-27 08:00:00','2008-07-27 08:30:00',NULL,'Y'),(46,3,44,'2008-07-27 08:00:00','2008-07-27 08:30:00',NULL,'Y'),(47,3,44,'2008-07-27 08:00:00','2008-07-27 08:30:00',NULL,'Y'),(48,3,44,'2008-07-27 08:00:00','2008-07-27 08:30:00',NULL,'Y'),(49,3,44,'2008-07-27 08:00:00','2008-07-27 08:30:00',NULL,'Y'),(50,3,44,'2008-07-27 08:00:00','2008-07-27 08:30:00',NULL,'Y'),(51,3,44,'2008-07-27 08:00:00','2008-07-27 08:30:00',NULL,'Y'),(52,3,44,'2008-07-27 08:00:00','2008-07-27 08:30:00',NULL,'Y'),(53,1,44,'2008-07-28 08:00:00','2008-07-28 09:00:00',NULL,'Y'),(54,1,44,'2008-07-28 12:30:00','2008-07-28 13:30:00',NULL,'Y'),(55,3,5,'2008-07-30 15:30:00','2008-07-30 16:00:00',NULL,'Y'),(56,1,44,'2008-08-01 08:00:00','2008-08-01 09:00:00',NULL,'Y'),(57,2,44,'2008-08-01 08:00:00','2008-08-01 08:30:00',NULL,'Y'),(58,3,44,'2008-08-01 08:00:00','2008-08-01 08:30:00',NULL,'Y'),(59,1,44,'2008-08-13 08:00:00','2008-08-13 09:00:00',NULL,'Y'),(60,1,44,'2008-08-02 08:00:00','2008-08-02 09:00:00',NULL,'Y'),(61,1,44,'2008-08-02 08:00:00','2008-08-02 09:00:00',NULL,'Y'),(62,1,44,'2008-08-02 09:00:00','2008-08-02 10:00:00',NULL,'Y'),(63,1,44,'2008-08-02 11:00:00','2008-08-02 12:00:00',NULL,'Y'),(64,1,44,'2008-08-02 08:00:00','2008-08-02 09:00:00',NULL,'Y'),(65,1,44,'2008-08-02 08:00:00','2008-08-02 09:00:00',NULL,'Y'),(66,1,44,'2008-08-02 08:00:00','2008-08-02 09:00:00',NULL,'Y'),(67,1,44,'2008-08-02 08:00:00','2008-08-02 09:00:00',NULL,'Y'),(68,1,5,'2008-08-02 10:30:00','2008-08-02 11:30:00',NULL,'Y'),(69,1,5,'2008-08-08 08:00:00','2008-08-08 09:00:00',NULL,'Y'),(95,3,6,'2008-08-05 08:00:00','2008-08-05 08:30:00',NULL,'N'),(94,1,6,'2008-08-07 09:00:00','2008-08-07 10:00:00',NULL,'Y'),(93,3,6,'2008-08-10 08:00:00','2008-08-10 08:30:00',NULL,'Y'),(92,4,6,'2008-08-05 08:00:00','2008-08-05 09:00:00',NULL,'Y'),(91,4,6,'2008-08-15 08:00:00','2008-08-15 09:00:00',16,'F'),(90,2,6,'2008-08-11 08:00:00','2008-08-11 08:30:00',NULL,'Y'),(89,2,6,'2008-08-11 08:00:00','2008-08-11 08:30:00',10,'F'),(84,1,5,'2008-08-03 08:00:00','2008-08-03 09:00:00',NULL,'Y'),(85,1,5,'2008-08-04 08:00:00','2008-08-04 09:00:00',NULL,'Y'),(86,1,5,'2008-08-11 08:00:00','2008-08-11 09:00:00',NULL,'Y'),(87,1,5,'2008-08-04 08:00:00','2008-08-04 09:00:00',NULL,'N'),(88,1,5,'2008-08-15 08:00:00','2008-08-15 09:00:00',NULL,'Y'),(96,1,51,'2008-08-08 08:00:00','2008-08-08 09:00:00',NULL,'Y'),(97,1,51,'2008-08-08 08:00:00','2008-08-08 09:00:00',NULL,'Y'),(98,1,51,'2008-08-06 08:00:00','2008-08-06 09:00:00',NULL,'Y'),(99,1,51,'2008-08-06 08:00:00','2008-08-06 09:00:00',NULL,'Y'),(100,1,51,'2008-08-05 11:30:00','2008-08-05 12:30:00',NULL,'Y'),(101,1,51,'2008-08-05 08:00:00','2008-08-05 09:00:00',NULL,'Y'),(102,1,51,'2008-08-05 08:00:00','2008-08-05 09:00:00',NULL,'N'),(103,1,51,'2008-08-05 08:00:00','2008-08-05 09:00:00',NULL,'N'),(104,1,51,'2008-08-05 08:00:00','2008-08-05 09:00:00',NULL,'N');
/*!40000 ALTER TABLE `appointments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bids`
--

DROP TABLE IF EXISTS `bids`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `bids` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `mechanic_id` int(10) unsigned NOT NULL,
  `appointment_id` int(10) unsigned NOT NULL,
  `amount` decimal(7,2) NOT NULL,
  `date` datetime NOT NULL,
  `bid_status` char(1) NOT NULL default 'N',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `bids`
--

LOCK TABLES `bids` WRITE;
/*!40000 ALTER TABLE `bids` DISABLE KEYS */;
INSERT INTO `bids` VALUES (1,8,69,'25.00','0000-00-00 00:00:00','N'),(2,7,69,'27.00','0000-00-00 00:00:00','N'),(3,7,69,'5.00','2008-08-03 00:00:00','N'),(4,7,69,'5.00','2008-08-03 15:54:51','N'),(5,7,69,'4.00','2008-08-03 15:55:07','N'),(6,7,59,'55.00','2008-08-03 15:56:05','N'),(7,7,59,'55.00','2008-08-03 15:56:24','N'),(8,7,59,'45.00','2008-08-04 06:35:22','N'),(9,8,93,'50.00','2008-08-04 06:43:32','N'),(10,8,89,'60.00','2008-08-04 06:43:41','S'),(11,7,94,'50.00','2008-08-04 12:29:00','N'),(12,7,85,'30.00','2008-08-04 12:29:08','N'),(13,7,86,'25.00','2008-08-04 12:29:15','N'),(14,7,88,'15.00','2008-08-04 12:29:21','N'),(15,7,90,'25.00','2008-08-04 12:29:26','N'),(16,8,91,'30.00','2008-08-04 12:30:22','S');
/*!40000 ALTER TABLE `bids` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mechanic_abilities`
--

DROP TABLE IF EXISTS `mechanic_abilities`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `mechanic_abilities` (
  `service_id` smallint(5) unsigned NOT NULL,
  `mechanic_id` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`mechanic_id`,`service_id`),
  KEY `service_id` (`service_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `mechanic_abilities`
--

LOCK TABLES `mechanic_abilities` WRITE;
/*!40000 ALTER TABLE `mechanic_abilities` DISABLE KEYS */;
INSERT INTO `mechanic_abilities` VALUES (1,7),(2,7),(3,7),(2,8),(3,8),(4,8);
/*!40000 ALTER TABLE `mechanic_abilities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resource_descriptions`
--

DROP TABLE IF EXISTS `resource_descriptions`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `resource_descriptions` (
  `id` smallint(5) unsigned NOT NULL auto_increment,
  `name` char(25) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `type` char(1) NOT NULL,
  `total` smallint(5) unsigned NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `resource_descriptions`
--

LOCK TABLES `resource_descriptions` WRITE;
/*!40000 ALTER TABLE `resource_descriptions` DISABLE KEYS */;
INSERT INTO `resource_descriptions` VALUES (1,'Large Workspace','25.00','S',2),(2,'Workspace with Lift','50.00','S',2),(3,'Small Workspace','15.00','S',2),(4,'Wrench','5.00','T',5);
/*!40000 ALTER TABLE `resource_descriptions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resource_requirements`
--

DROP TABLE IF EXISTS `resource_requirements`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `resource_requirements` (
  `service_id` smallint(5) unsigned NOT NULL,
  `resource_id` smallint(5) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `resource_requirements`
--

LOCK TABLES `resource_requirements` WRITE;
/*!40000 ALTER TABLE `resource_requirements` DISABLE KEYS */;
INSERT INTO `resource_requirements` VALUES (3,2),(2,4),(4,2),(1,4);
/*!40000 ALTER TABLE `resource_requirements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resources_used`
--

DROP TABLE IF EXISTS `resources_used`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `resources_used` (
  `apt_id` int(10) unsigned NOT NULL,
  `description_id` smallint(5) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `resources_used`
--

LOCK TABLES `resources_used` WRITE;
/*!40000 ALTER TABLE `resources_used` DISABLE KEYS */;
INSERT INTO `resources_used` VALUES (1,2),(2,2),(3,2),(4,2),(34,1),(33,1),(32,1),(31,1),(35,1),(30,1),(36,1),(37,2),(38,2),(39,2),(40,2),(41,2),(42,2),(43,2),(44,2),(45,2),(46,2),(47,2),(48,2),(49,2),(50,2),(51,2),(52,2),(53,1),(54,1),(55,2),(56,1),(57,1),(58,2),(59,1),(60,1),(61,1),(62,1),(63,3),(64,3),(65,3),(66,2),(67,2),(68,2),(69,3),(70,1),(71,1),(72,1),(73,1),(74,1),(75,1),(76,1),(77,1),(78,1),(79,1),(80,2),(81,1),(82,3),(83,1),(84,1),(85,1),(86,1),(87,1),(88,1),(89,1),(90,1),(91,2),(92,2),(93,2),(94,3),(95,2),(96,1),(97,1),(98,1),(99,1),(100,1),(101,1),(102,1),(103,3),(104,3);
/*!40000 ALTER TABLE `resources_used` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `services` (
  `id` smallint(5) unsigned NOT NULL auto_increment,
  `name` char(25) NOT NULL,
  `cost` decimal(7,2) NOT NULL,
  `duration` smallint(5) unsigned NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (1,'Tune Up','45.00',60),(2,'Oil Change','35.00',30),(3,'Tire Rotation','25.00',30),(4,'Brake Repair','30.00',60);
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `username` char(15) NOT NULL,
  `password` char(15) NOT NULL,
  `first_name` char(18) NOT NULL,
  `last_name` char(18) NOT NULL,
  `user_type` char(1) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `username` (`username`,`password`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (5,'a','a','Joe','Shmoe','C'),(6,'b','b','Tom','Shmom','C'),(7,'c','c','Amanda','Hugginkiss','M'),(8,'d','d','Frank','Thomas','M'),(44,'jsmith','jsmith','John','Smith','C'),(51,'e','e','Slick','Rick','C'),(50,'someguy','someguy','Some','Guy','C');
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

-- Dump completed on 2008-08-04 18:38:50
