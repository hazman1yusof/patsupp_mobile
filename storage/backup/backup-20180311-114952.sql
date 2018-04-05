-- MySQL dump 10.13  Distrib 5.7.19, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: customerSupport
-- ------------------------------------------------------
-- Server version	5.7.19

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
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ticket_id` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `text` mediumtext COLLATE utf8mb4_unicode_ci,
  `message_type` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updflg` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,'1','2018-02-25 04:16:33','2018-02-25 04:16:33','<p>`121`2`12</p>','agent','1','0'),(2,'3','2018-02-25 04:57:50','2018-02-25 04:57:50','<p>123123</p>','customer','2','0'),(3,'3','2018-02-25 04:57:53','2018-02-25 04:57:53','<p>123123131</p>','customer','2','0'),(4,'3','2018-02-25 04:58:07','2018-02-25 04:58:07','<p>23123123</p>','customer','2','0'),(5,'3','2018-02-25 04:58:11','2018-02-25 04:58:11','<p>21213123</p>','customer','2','0'),(6,'3','2018-02-25 04:58:26','2018-02-25 04:58:26','<p>213123</p>','agent','1','0'),(7,'3','2018-02-25 04:58:55','2018-02-25 04:58:55','<p>213123</p>','agent','1','0'),(8,'3','2018-02-25 04:59:02','2018-02-25 04:59:02','<p>213123</p>','agent','1','0'),(9,'3','2018-02-25 05:00:00','2018-02-25 05:00:14','<p>12121212123d daewqe</p>','agent','1','1'),(10,'3','2018-02-25 05:00:18','2018-02-25 05:00:18','<p>1`1``11`</p>','agent','1','0'),(11,'3','2018-02-25 05:00:56','2018-02-25 05:00:56','<p>21321312313</p>','agent','1','0'),(12,'3','2018-02-25 05:01:06','2018-02-25 05:01:06','<p>23232323</p>','agent','1','0'),(13,'3','2018-02-25 05:01:38','2018-02-25 05:01:38','<p>213123213123</p>','agent','1','0'),(14,'3','2018-02-25 05:06:28','2018-02-25 05:06:28','<p>12321312323</p>','agent','1','0'),(15,'3','2018-02-25 05:07:04','2018-02-25 05:07:04','<p>213123123213</p>','agent','1','0'),(16,'3','2018-02-25 05:07:44','2018-02-25 05:07:44','<p>213123123123</p>','agent','1','0'),(17,'3','2018-02-25 05:07:59','2018-02-25 05:07:59','<p>123213213123</p>','agent','1','0'),(18,'3','2018-02-25 05:08:08','2018-02-25 05:08:08','<p>12312321312</p>','agent','1','0'),(19,'4','2018-02-25 06:26:47','2018-02-25 06:26:47','<p>12121212</p>','agent','1','0');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2018_02_10_112614_create_tickets_table',1),(4,'2018_02_10_112702_create_messages_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tickets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assign_to` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `report_by` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updflg` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tickets`
--

LOCK TABLES `tickets` WRITE;
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
INSERT INTO `tickets` VALUES (1,'123213123','<p>213123123</p>','Answered','Medium','Question','1','2','hazman','0','2018-02-25 04:16:22','2018-02-25 04:16:33'),(2,'123123','12313232323232323232222222222222222','Open','Medium','Question','1','2','hazman','0','2018-02-25 04:44:12','2018-02-25 04:44:12'),(3,'123123123','21314','Answered','Medium','Question','1','2','hazman','0','2018-02-25 04:45:59','2018-02-25 04:58:26'),(4,'12313','123123123','Answered','High','Question','1','2','hazman','0','2018-02-25 05:09:05','2018-02-25 06:26:47');
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT 'Active',
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Active','hazman','agent','hazman.yusof@gmail.com','$2y$10$5MHGYRsJpWnAElG0G3.TPuJqrmOPLfq0wzI8w5gLDrH/6/O/aKDa2','site admin','testing','1gVYI7wcOYfd4oZi2Q1pCFnNCZpqDx7ooNSCTygMrECcXsMXUSecV3zJnq4S','2018-02-25 04:01:11','2018-02-25 04:01:11'),(2,'Active','123123','customer','hazman.yusof@gmail.com','$2y$10$LvSnVhJet2aKmGELZVFy1uak658zHsR2OSPIt4Qf3Gq9HTt7pRt2q','213213','123123','FwJXxN7w9nd0FGwtqcxgkldd78ghRRBdUGjqlVXmT6Bgsrv69rjpmdfW7nnG','2018-02-25 04:16:06','2018-02-25 04:16:06');
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

-- Dump completed on 2018-03-11 18:50:20
