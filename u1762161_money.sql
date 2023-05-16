-- MySQL dump 10.13  Distrib 5.7.27-30, for Linux (x86_64)
--
-- Host: localhost    Database: u1762161_money
-- ------------------------------------------------------
-- Server version	5.7.27-30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*!50717 SELECT COUNT(*) INTO @rocksdb_has_p_s_session_variables FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'performance_schema' AND TABLE_NAME = 'session_variables' */;
/*!50717 SET @rocksdb_get_is_supported = IF (@rocksdb_has_p_s_session_variables, 'SELECT COUNT(*) INTO @rocksdb_is_supported FROM performance_schema.session_variables WHERE VARIABLE_NAME=\'rocksdb_bulk_load\'', 'SELECT 0') */;
/*!50717 PREPARE s FROM @rocksdb_get_is_supported */;
/*!50717 EXECUTE s */;
/*!50717 DEALLOCATE PREPARE s */;
/*!50717 SET @rocksdb_enable_bulk_load = IF (@rocksdb_is_supported, 'SET SESSION rocksdb_bulk_load = 1', 'SET @rocksdb_dummy_bulk_load = 0') */;
/*!50717 PREPARE s FROM @rocksdb_enable_bulk_load */;
/*!50717 EXECUTE s */;
/*!50717 DEALLOCATE PREPARE s */;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Yegulik\r\n'),(2,'Sog\'liq'),(3,'Shopping'),(4,'Sovg\'alar'),(5,'Yo\'lkira'),(6,'Uy harajatlari'),(7,'Internet'),(8,'Ta\'lim'),(9,'Boshqalar'),(13,'Non'),(14,'Suv');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expenses`
--

DROP TABLE IF EXISTS `expenses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expenses` (
  `expense_id` int(20) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(15) NOT NULL,
  `expense` int(20) NOT NULL,
  `expensedate` varchar(15) NOT NULL,
  `expensecategory` varchar(50) NOT NULL,
  `comm` text NOT NULL,
  PRIMARY KEY (`expense_id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expenses`
--

LOCK TABLES `expenses` WRITE;
/*!40000 ALTER TABLE `expenses` DISABLE KEYS */;
INSERT INTO `expenses` VALUES (30,'4',16000,'2023-02-01','Yegulik','Xoddog'),(31,'4',9000,'2023-02-01','Non',''),(38,'4',3200,'2023-02-02','Shopping','Tuxum'),(39,'1',12500,'2023-02-02','Obed','1,5L suv\r\nRollton\r\nPepsi 0,5'),(54,'1',15000,'2023-02-02','Boshqalar','Sigareta'),(59,'3',5,'2023-02-02','Boshqalar',''),(60,'3',30,'2023-02-02','Yegulik','Somsa'),(61,'3',3,'2023-02-02','Yo\'lkira','Metro'),(62,'3',5,'2023-02-03','Boshqalar',''),(63,'3',5,'2023-02-03','Suv','Pepsi'),(64,'3',33,'2023-02-03','Yegulik','Osh'),(65,'3',18,'2023-02-03','Shopping','Havas'),(66,'6',120000,'2023-02-03','Yo\'lkira','Ð¢Ð¾ÑˆÐºÐµÐ½Ñ‚Ð³Ð° Ñ‚Ð°ÐºÑÐ¸'),(72,'1',750000,'2023-02-08','Uy harajatlari','Kvartira to\'lovi.\r\n9860010101413390 Sobirov S.'),(73,'1',15000,'2023-02-08','Yegulik','Qorin g\'ami'),(74,'1',21500,'2023-02-08','Yegulik','Obed'),(75,'4',12402000,'2022-01-01','Boshqalar','2021 \r\nontabr_606 000\r\nnoyabr_9 497 500\r\ndekabr_1 914 000\r\n\r\n2022 yanvar_385 000'),(76,'4',1801000,'2022-02-01','Boshqalar',''),(77,'1',6000,'2023-02-09','Yegulik',''),(78,'1',5000,'2023-02-09','Sog\'liq',''),(79,'1',5000,'2023-02-09','Sog\'liq',''),(80,'1',3200,'2023-02-09','Yegulik',''),(81,'4',30000,'2023-02-09','Boshqalar','Non 9000\r\nParashok 15000\r\nBozorcha 6000');
/*!40000 ALTER TABLE `expenses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL DEFAULT 'empty.png',
  `password` varchar(50) NOT NULL,
  `telegram` varchar(21) NOT NULL,
  `reg_date` datetime NOT NULL,
  `rights` int(11) NOT NULL DEFAULT '0',
  `maxExpense` int(11) NOT NULL DEFAULT '40000',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Abbous','abbosbey02@gmail.com','1_1605924256.jpg','ba57e3644cb06dfd1081435ddaddda19','@test','2023-01-28 19:56:19',1,40000),(2,'Abduqodir','200065a@jdu.uz','empty.png','14e1b600b1fd579f47433b88e8d85291','','2023-01-28 21:21:06',0,40000),(3,'Jaloliddin ','jaloliddinfaxridinov4@GMAIL.COM','ph3.jpg','99235f216074053d7631e33eaacafc98','','2023-01-30 12:46:26',0,40000),(4,'Bekzod','begzodsafoyev65@gmail.com','bbg.jpg','c0475eb863c3cdd67ea7b11c3a9aea41','','2023-02-01 16:20:24',0,40000),(5,'Bekzod','begzodsafoyev65@gmail.com','empty.png','c0475eb863c3cdd67ea7b11c3a9aea41','','2023-02-02 11:58:16',0,40000),(6,'FARHOD','rakhimov1995@gmail.com','empty.png','dcf76935506bdaa64c2e383fc6e19fa1','','2023-02-03 20:16:52',0,40000),(7,'Farhod','rakhimov1995@gmail.com','empty.png','dcf76935506bdaa64c2e383fc6e19fa1','','2023-02-03 20:17:53',0,40000),(8,'APREL_14','xotambekabdurahmonov077@gmail.com','empty.png','503c9f6971a012ab2390772c692612fb','','2023-02-04 07:07:58',0,40000),(9,'Kamol2001','gegant011@gmail.com','empty.png','9bdf444dd24f187798c0ea06a20a08ad','','2023-02-04 18:23:07',0,40000);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!50112 SET @disable_bulk_load = IF (@is_rocksdb_supported, 'SET SESSION rocksdb_bulk_load = @old_rocksdb_bulk_load', 'SET @dummy_rocksdb_bulk_load = 0') */;
/*!50112 PREPARE s FROM @disable_bulk_load */;
/*!50112 EXECUTE s */;
/*!50112 DEALLOCATE PREPARE s */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-16 16:02:57
