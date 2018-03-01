-- MySQL dump 10.13  Distrib 5.7.21, for Win64 (x86_64)
--
-- Host: localhost    Database: gs_db
-- ------------------------------------------------------
-- Server version	5.7.21-log

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
-- Current Database: `gs_db`
--

USE `gs_db`;

--
-- Table structure for table `gs_an_table`
--

DROP TABLE IF EXISTS `gs_an_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gs_an_table` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `naiyou` text COLLATE utf8_unicode_ci NOT NULL,
  `indate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gs_an_table`
--

LOCK TABLES `gs_an_table` WRITE;
/*!40000 ALTER TABLE `gs_an_table` DISABLE KEYS */;
INSERT INTO `gs_an_table` VALUES (5,'鏑木','鏑木','内容kaeta','2017-11-28 11:31:50'),(6,'やまさん','yamasan@test.jp','やまさあん','2017-11-28 12:20:28'),(8,'a','d','b','2017-11-30 17:17:39'),(9,'aaaaa','vvvvv','bbbbb','2017-11-30 17:19:03'),(10,'aaaaaa','dddddddd','gg','2017-11-30 17:20:22'),(11,'aaaaaa','dddddddd','gg','2017-11-30 17:20:22'),(12,'aaaaaa','dddddddd','gg','2017-11-30 17:20:24'),(13,'aaaaaa','dddddddd','gg','2017-11-30 17:20:25'),(14,'aaaaaa','dddddddd','gg','2017-11-30 17:20:26'),(15,'aaaaaa','dddddddd','gg','2017-11-30 17:20:26'),(16,'aaaaaa','dddddddd','gg','2017-11-30 17:20:27'),(17,'aaaaaa','dddddddd','gg','2017-11-30 17:20:27'),(18,'あいうえお','さしすせそ','ABC','2017-11-30 17:24:40'),(19,'やまざき','test@test.jp','kyou \r\n','2017-12-05 09:25:58'),(20,'TEST','TEST','TET','2017-12-05 09:38:35'),(21,'Yamazaki Daisuke','php.yamazaki@gmail.com','aaaaaaa','2017-12-06 11:31:54'),(22,'Yamazaki Daisuke','php.yamazaki@gmail.com','aaaaaaaaaa','2017-12-06 11:32:36'),(23,'Yamazaki Daisuke','ddddddd','dddddddddd','2017-12-06 11:32:59'),(24,'yamaza','php.yamazaki@gmail.com','aaaaaa','2017-12-07 12:32:44'),(25,'aaaaaa','php.yamazaki@gmail.com','aaaaaaaa','2017-12-07 12:33:00'),(26,'aaaa','php.yamazaki@gmail.com','qqq','2017-12-07 12:34:04'),(27,'Yamazaki Daisuke','php.yamazaki@gmail.com','aaaaa','2017-12-07 12:35:11'),(28,'Yamazaki Daisuke','php.yamazaki@gmail.com','aaaa','2017-12-07 12:36:03'),(29,'sssssss','dddddddddddd','sssssssssssssss','2017-12-07 16:49:50'),(30,'aaaaa','ddddd','dddd','2017-12-07 16:51:36'),(31,'ssss','dddd','ssssss','2017-12-07 16:52:12');
/*!40000 ALTER TABLE `gs_an_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gs_book_table`
--

DROP TABLE IF EXISTS `gs_book_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gs_book_table` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `title` varchar(64) DEFAULT NULL,
  `url` text,
  `memo` text,
  `datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gs_book_table`
--

LOCK TABLES `gs_book_table` WRITE;
/*!40000 ALTER TABLE `gs_book_table` DISABLE KEYS */;
INSERT INTO `gs_book_table` VALUES (7,'title','https://github.com/huton338','memo','2018-02-04 16:05:31');
/*!40000 ALTER TABLE `gs_book_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gs_question_table`
--

DROP TABLE IF EXISTS `gs_question_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gs_question_table` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `ans_user` varchar(64) DEFAULT NULL,
  `url` text,
  `question` text,
  `datetime` datetime DEFAULT NULL,
  `image` varchar(128) DEFAULT NULL,
  `upfile` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gs_question_table`
--

LOCK TABLES `gs_question_table` WRITE;
/*!40000 ALTER TABLE `gs_question_table` DISABLE KEYS */;
INSERT INTO `gs_question_table` VALUES (1,'aa','aaa','aaa','2018-02-11 13:45:09',NULL,'20180211054509d41d8cd98f00b204e9800998ecf8427e.txt'),(2,'test','aa','test','2018-02-11 14:25:20',NULL,NULL),(3,'test','aaaaaaaaaa','aaaaaaaaaaaaa','2018-02-11 14:25:33',NULL,NULL),(4,'test','aaa','aaaaa','2018-02-11 14:45:14',NULL,'20180211064514d41d8cd98f00b204e9800998ecf8427e.txt'),(5,'test1','aaa','aaa','2018-02-11 19:25:00',NULL,NULL);
/*!40000 ALTER TABLE `gs_question_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gs_twitter_table`
--

DROP TABLE IF EXISTS `gs_twitter_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gs_twitter_table` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `lid` varchar(128) DEFAULT NULL,
  `tw_name` varchar(64) DEFAULT NULL,
  `tw_id` varchar(64) DEFAULT NULL,
  `screen_name` varchar(64) DEFAULT NULL,
  `profile_image_url_https` varchar(255) DEFAULT NULL,
  `text` varchar(128) DEFAULT NULL,
  `oauth_token` varchar(128) DEFAULT NULL,
  `oauth_token_secret` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gs_twitter_table`
--

LOCK TABLES `gs_twitter_table` WRITE;
/*!40000 ALTER TABLE `gs_twitter_table` DISABLE KEYS */;
INSERT INTO `gs_twitter_table` VALUES (1,'test1','かわの','323273235','__poyo_poyo__','https://pbs.twimg.com/profile_images/819585077902352384/DgOGZvGw_normal.jpg','お、できた','323273235-qSi6dB0Wz8Gga0OwUI1qaiKTFFuNKVCpJnwipRpF','86xcVXzTQMrRvXVLwNpBlfo9dd9XuWrhGyceLsKT9IHqe');
/*!40000 ALTER TABLE `gs_twitter_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gs_user_table`
--

DROP TABLE IF EXISTS `gs_user_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gs_user_table` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) DEFAULT NULL,
  `lid` varchar(128) DEFAULT NULL,
  `lpw` varchar(64) DEFAULT NULL,
  `kanri_flg` int(1) DEFAULT NULL,
  `life_flg` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gs_user_table`
--

LOCK TABLES `gs_user_table` WRITE;
/*!40000 ALTER TABLE `gs_user_table` DISABLE KEYS */;
INSERT INTO `gs_user_table` VALUES (1,'root123','root','$2y$10$wmw91BZTZ5zLwdq02hkhwOAj7KRJs.tDyBMngoXLNX/QXPkd2zipi',1,0),(2,'test','test','$2y$10$TU1GAsCnafYTRwZkZtOJfu.gA2goGeqp89KRZQvV11mEdO5wSiVGa',0,0),(3,'test1','test1','$2y$10$Ge2bzMwdVfIjrSWDO4yvXO96CsznLhWC2tRNTu84PrI/UzDW6VPem',0,0);
/*!40000 ALTER TABLE `gs_user_table` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-02-11 19:45:17
