CREATE DATABASE  IF NOT EXISTS `cupslog` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `cupslog`;
-- MySQL dump 10.13  Distrib 5.1.63, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: cupslog
-- ------------------------------------------------------
-- Server version	5.1.63-0ubuntu0.11.10.1

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
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `codigo` int(4) NOT NULL AUTO_INCREMENT,
  `impressora` varchar(30) DEFAULT NULL,
  `usuario` varchar(30) DEFAULT NULL,
  `cupsid` int(4) DEFAULT NULL,
  `data_impressao` datetime DEFAULT NULL,
  `pages` varchar(10) DEFAULT NULL,
  `ip` varchar(30) DEFAULT NULL,
  `nome_documento` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
INSERT INTO `jobs` VALUES (1,'hplaser','thais',372,'2013-06-03 13:54:10','1 1','192.168.1.81','jussa.png '),(2,'hplaser','thais',374,'2013-06-03 14:48:50','1 1','192.168.1.81','E-mail de EAC Software - Treinamentos desta semana adiados '),(3,'hplaser','breno',375,'2013-06-03 16:00:55','1 1','192.168.1.35','E-mail de EAC Software - Portal Prospect - ATA '),(4,'hplaser','breno',375,'2013-06-03 16:00:55','2 1','192.168.1.35','E-mail de EAC Software - Portal Prospect - ATA '),(5,'hplaser','breno',375,'2013-06-03 16:00:56','3 1','192.168.1.35','E-mail de EAC Software - Portal Prospect - ATA '),(6,'hplaser','eliseup',376,'2013-06-03 16:04:50','1 1','192.168.1.57','Sem título1 '),(7,'hplaser','eliseup',376,'2013-06-03 16:04:50','2 1','192.168.1.57','Sem título1 '),(8,'hplaser','eliseup',376,'2013-06-03 16:04:51','3 1','192.168.1.57','Sem título1 '),(9,'hplaser','eliseup',376,'2013-06-03 16:04:51','4 1','192.168.1.57','Sem título1 '),(10,'hplaser','eliseup',376,'2013-06-03 16:04:51','5 1','192.168.1.57','Sem título1 '),(11,'hplaser','eliseup',376,'2013-06-03 16:04:52','6 1','192.168.1.57','Sem título1 '),(12,'hplaser','eliseup',376,'2013-06-03 16:04:52','7 1','192.168.1.57','Sem título1 '),(13,'hplaser','eliseup',376,'2013-06-03 16:04:53','8 1','192.168.1.57','Sem título1 '),(14,'hplaser','eliseup',376,'2013-06-03 16:04:53','9 1','192.168.1.57','Sem título1 ');
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-06-03 16:27:39
