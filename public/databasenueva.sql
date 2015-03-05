CREATE DATABASE  IF NOT EXISTS `sistventas` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sistventas`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: sistventas
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(45) NOT NULL,
  `descripcion_categoria` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Lubricantes',NULL),(2,'Aceites',NULL),(3,'Quimicos',NULL),(4,'Aerosoles',NULL),(5,'Chemaqua',NULL);
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `idclientes` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `ruc` bigint(20) DEFAULT NULL,
  `nombre_cliente` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion_cliente` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono_cliente` int(9) DEFAULT NULL,
  `acreditacion` int(2) DEFAULT NULL COMMENT '1 - no acreditado, 2 - en proceso de acreditacion , 3 - acreditado',
  `correo` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idclientes`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (0000000015,10458457684,'cliente de prueba','los olivos ',172834938,3,'corrreo@gmail.com','2015-02-19 04:03:14','2015-02-19 04:03:14'),(0000000016,12345676524,'cvcvcvbv','vbvbvbv',43434343,3,NULL,'2015-02-21 14:15:18','2015-02-21 14:15:18'),(0000000017,20123456784,'jose sac','san martin de porres',2147483647,1,'jose@hotmail.com','2015-03-01 18:34:17','2015-03-01 18:34:17'),(0000000018,0,'gtgtgtg','gtgtgt',0,1,'gtgtgtg','2015-03-01 23:43:26','2015-03-01 23:43:26'),(0000000019,0,'gtgtgtg','gtgtgt',0,1,'gtgtgtg','2015-03-01 23:43:40','2015-03-01 23:43:40'),(0000000020,0,'gtgtgtg','gtgtgt',0,1,'gtgtgtg','2015-03-01 23:43:52','2015-03-01 23:43:52'),(0000000021,0,'gtgtgtg','gtgtgt',0,1,'gtgtgtg','2015-03-01 23:45:24','2015-03-01 23:45:24'),(0000000022,54675897095,'atix sac','surco',7657489,1,'gtgtgtg@hoytmail.com','2015-03-01 23:50:56','2015-03-01 23:50:56'),(0000000023,98564536434,'dfsdf','dsfdsf',0,1,'dsfdsf','2015-03-01 23:51:52','2015-03-01 23:51:52'),(0000000024,43242343244,'dfsdf','sdfdsf',0,1,'sdfsdf','2015-03-01 23:53:52','2015-03-01 23:53:52'),(0000000025,0,'gtgtgtgfd','gtgtgt',0,1,'gtgtgtg','2015-03-02 00:04:43','2015-03-02 00:04:43'),(0000000026,3443534543,'435','5345345',34534534,1,'345435435','2015-03-02 00:06:42','2015-03-02 00:06:42'),(0000000027,0,'gtgtgtgrewr','gtgtgt',0,1,'gtgtgtg','2015-03-02 00:15:31','2015-03-02 00:15:31'),(0000000028,45676545676,'empresa sac','sadasd',34238343,1,'sdsadasd','2015-03-02 00:19:33','2015-03-02 00:19:33'),(0000000029,56545678765,'fgfgf','fgfg',0,1,'fgfg','2015-03-02 00:20:50','2015-03-02 00:20:50'),(0000000030,10458457684,'cliente de prueba','los olivos ',172834938,1,'corrreo@gmail.com','2015-03-02 02:45:41','2015-03-02 02:45:41'),(0000000031,10458457684,'cliente de prueba','los olivos ',172834938,1,'corrreo@gmail.com','2015-03-02 02:45:42','2015-03-02 02:45:42'),(0000000032,10458457684,'cliente de prueba','los olivos ',172834938,1,'corrreo@gmail.com','2015-03-02 02:45:49','2015-03-02 02:45:49'),(0000000033,10458457684,'cliente de prueba','los olivos ',172834938,1,'corrreo@gmail.com','2015-03-02 02:45:50','2015-03-02 02:45:50'),(0000000034,10458457684,'cliente de prueba','los olivos ',172834938,1,'corrreo@gmail.com','2015-03-02 02:45:51','2015-03-02 02:45:51'),(0000000035,10458457684,'cliente de prueba','los olivos ',172834938,1,'corrreo@gmail.com','2015-03-02 02:45:54','2015-03-02 02:45:54'),(0000000036,4555,'dvdsv','dsvdsv',0,1,'dvsdvds','2015-03-02 03:03:09','2015-03-02 03:03:09'),(0000000037,0,'gtgtgtg','gtgtgt',42343,1,'gtgtgtg','2015-03-02 03:05:16','2015-03-02 03:05:16'),(0000000038,0,'gtgtgtg','gtgtgt',0,1,'gtgtgtg','2015-03-02 03:31:12','2015-03-02 03:31:12'),(0000000039,76546783904,'juan gonzáles','san martin de porres jr 89',536748383,1,'juan@gmail.com','2015-03-02 03:36:30','2015-03-02 03:36:30'),(0000000040,76546783904,'juan gonzáles','san martin de porres jr 89',536748383,1,'juan@gmail.com','2015-03-02 03:37:18','2015-03-02 03:37:18'),(0000000041,65748950948,'digesa sac','san juan de lurigancho ',132456367,1,'correo@hotmail.com','2015-03-04 02:30:25','2015-03-04 02:30:25'),(0000000042,56543565423,'dfsdf','sdfdsfs',342342,1,'sdfdsf','2015-03-04 02:35:47','2015-03-04 02:35:47'),(0000000043,45675678678,'dsfs','dfsdfsdg',0,1,'gfgdfgdf','2015-03-04 02:37:26','2015-03-04 02:37:26'),(0000000044,87879894555,'fgfdg','fdgfd',0,1,'dfgfdgh','2015-03-04 02:39:03','2015-03-04 02:39:03'),(0000000045,89879879789,'gfgdfg','dfgdfg',0,1,'dfgdfg','2015-03-04 02:42:29','2015-03-04 02:42:29'),(0000000046,89879789870,'sdfsdfsdfs','sdfsdfsdf',0,1,'sfsdfsdf','2015-03-04 02:44:28','2015-03-04 02:44:28'),(0000000047,89879789870,'sdfsdfsdfs','sdfsdfsdf',0,1,'sfsdfsdf','2015-03-04 02:44:53','2015-03-04 02:44:53'),(0000000048,53453453454,'dsfsdf','sdfdsf',0,1,'sdfdsfdsf','2015-03-04 02:51:29','2015-03-04 02:51:29'),(0000000049,45454543534,'sdfsdfs','fsdfsdfs',0,1,'sdfsdf','2015-03-04 02:57:05','2015-03-04 02:57:05'),(0000000050,53453456546,'gfdgdfgd','gdfgdfgfdg',0,1,'dfgdfgdfg','2015-03-04 02:58:41','2015-03-04 02:58:41'),(0000000051,45465657547,'dsfsdf','sdfsdf',0,1,'dfsdfsdf','2015-03-04 02:59:49','2015-03-04 02:59:49'),(0000000052,34235465464,'dfsdfas','grtgtr',0,1,'gtgrtg','2015-03-04 06:02:47','2015-03-04 06:02:47'),(0000000053,56237489234,'ultimo','direccion ultima dde pruba',787665637,1,'asasa@hotmail.com','2015-03-05 02:24:43','2015-03-05 02:24:43');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cotizacion`
--

DROP TABLE IF EXISTS `cotizacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cotizacion` (
  `idcotizacion` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `contacto` varchar(45) DEFAULT NULL,
  `tipo_pago` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idclientes` int(10) unsigned zerofill NOT NULL,
  `precio` decimal(9,2) DEFAULT NULL,
  `igv` decimal(9,2) DEFAULT NULL,
  `preciototal` decimal(9,2) DEFAULT NULL,
  `direccion_despacho` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcotizacion`),
  KEY `fk_cotizacion_clientes1_idx` (`idclientes`),
  CONSTRAINT `fk_cotizacion_clientes1` FOREIGN KEY (`idclientes`) REFERENCES `clientes` (`idclientes`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cotizacion`
--

LOCK TABLES `cotizacion` WRITE;
/*!40000 ALTER TABLE `cotizacion` DISABLE KEYS */;
INSERT INTO `cotizacion` VALUES (00000000015,'contacto de peuva',1,'2015-02-19 04:03:14','2015-02-19 04:03:14',0000000015,362.80,18.00,428.10,'direcccion de despacho 15',1),(00000000016,'vbvbvbv',1,'2015-02-21 14:15:18','2015-02-21 14:15:18',0000000016,426.40,18.00,503.15,'despacho 16',1),(00000000017,'jose martinez',1,'2015-03-01 18:34:17','2015-03-01 18:34:17',0000000017,1152.00,0.18,1359.36,'san martin despacho',1),(00000000018,'gtgtgtg',1,'2015-03-01 23:43:26','2015-03-01 23:43:26',0000000018,299.20,0.18,353.06,'tgtgtgt',1),(00000000019,'gtgtgtg',1,'2015-03-01 23:43:40','2015-03-01 23:43:40',0000000019,299.20,0.18,353.06,'tgtgtgt',1),(00000000020,'gtgtgtg',1,'2015-03-01 23:43:52','2015-03-01 23:43:52',0000000020,362.80,0.18,428.10,'tgtgtgt',1),(00000000021,'gtgtgtg',1,'2015-03-01 23:45:24','2015-03-01 23:45:24',0000000021,362.80,0.18,428.10,'tgtgtgt',1),(00000000022,'gtgtgtg',1,'2015-03-01 23:50:56','2015-03-01 23:50:56',0000000022,426.40,0.18,503.15,'tgtgtgt',1),(00000000023,'dsfdsf',1,'2015-03-01 23:51:52','2015-03-01 23:51:52',0000000023,413.30,0.18,487.69,'sdfsdfsd',1),(00000000024,'dsfdsfsd',1,'2015-03-01 23:53:52','2015-03-01 23:53:52',0000000024,763.20,0.18,900.58,'dsfdsf',1),(00000000025,'dfdf',1,'2015-03-02 00:04:43','2015-03-02 00:04:43',0000000025,897.60,0.18,1059.17,'dfdfdf',1),(00000000026,'345435435',1,'2015-03-02 00:06:43','2015-03-02 00:06:43',0000000026,110.70,0.18,130.63,'345345435',1),(00000000027,'werewrewr',1,'2015-03-02 00:15:31','2015-03-02 00:15:31',0000000027,1196.80,0.18,1412.22,'ewrewrewr',1),(00000000028,'dsfdsfds',1,'2015-03-02 00:19:33','2015-03-02 00:19:33',0000000028,1196.80,0.18,1412.22,'sdfdsfds',1),(00000000029,'fgfgf',1,'2015-03-02 00:20:50','2015-03-02 00:20:50',0000000029,254.40,0.18,300.19,'fgfgfg',1),(00000000030,'fdgfdg',2,'2015-03-02 02:45:41','2015-03-02 02:45:41',0000000030,1196.80,0.18,1412.22,'fdgfdgdf',1),(00000000031,'fdgfdg',2,'2015-03-02 02:45:42','2015-03-02 02:45:42',0000000031,1196.80,0.18,1412.22,'fdgfdgdf',1),(00000000032,'fdgfdg',2,'2015-03-02 02:45:49','2015-03-02 02:45:49',0000000032,1196.80,0.18,1412.22,'fdgfdgdf',1),(00000000033,'fdgfdg',2,'2015-03-02 02:45:50','2015-03-02 02:45:50',0000000033,1196.80,0.18,1412.22,'fdgfdgdf',1),(00000000034,'fdgfdg',2,'2015-03-02 02:45:51','2015-03-02 02:45:51',0000000034,1196.80,0.18,1412.22,'fdgfdgdf',1),(00000000035,'fdgfdg',2,'2015-03-02 02:45:54','2015-03-02 02:45:54',0000000035,1196.80,0.18,1412.22,'fdgfdgdf',1),(00000000036,'dsvdsv',1,'2015-03-02 03:03:10','2015-03-02 03:03:10',0000000036,1514.80,0.18,1787.46,'sdvdsv',1),(00000000037,'dsfsdfsdfdsf',1,'2015-03-02 03:05:16','2015-03-02 03:05:16',0000000037,13464.00,0.18,15887.52,'sdfsdfsdf',1),(00000000038,'dsfdsfsd',1,'2015-03-02 03:31:12','2015-03-02 03:31:12',0000000038,1196.80,0.18,1412.22,'sdfdsf',1),(00000000039,'juan gozales',2,'2015-03-02 03:36:30','2015-03-02 03:36:30',0000000039,1196.80,0.18,1412.22,'san martin despacho',1),(00000000040,'juan gozales',2,'2015-03-02 03:37:18','2015-03-02 03:37:18',0000000040,1196.80,0.18,1412.22,'san martin despacho',1),(00000000041,'pedrito',1,'2015-03-04 02:30:25','2015-03-04 02:30:25',0000000041,63.60,0.18,75.05,'direccion de despachi',1),(00000000042,'sdfsdf',1,'2015-03-04 02:35:47','2015-03-04 02:35:47',0000000042,254.40,0.18,300.19,'dfdsfsd',1),(00000000043,'dfgdfg',1,'2015-03-04 02:37:26','2015-03-04 02:37:26',0000000043,318.00,0.18,375.24,'dfgdfgdf',1),(00000000044,'dfgdfg',1,'2015-03-04 02:39:03','2015-03-04 02:39:03',0000000044,318.00,0.18,375.24,'ghghgh',1),(00000000045,'dfgdfg',1,'2015-03-04 02:42:29','2015-03-04 02:42:29',0000000045,83.90,0.18,99.00,'dfgdfg',1),(00000000046,'sdfsdfdsfsd',1,'2015-03-04 02:44:28','2015-03-04 02:44:28',0000000046,299.20,0.18,353.06,'sdfsdfsdf',1),(00000000047,'sdfsdfdsfsd',1,'2015-03-04 02:44:53','2015-03-04 02:44:53',0000000047,299.20,0.18,353.06,'sdfsdfsdf',1),(00000000048,'sdfsdf',1,'2015-03-04 02:51:29','2015-03-04 02:51:29',0000000048,167.80,0.18,198.00,'sdfsdfsdf',1),(00000000049,'sdfsdfsdf',1,'2015-03-04 02:57:05','2015-03-04 02:57:05',0000000049,190.80,0.18,225.14,'sdfsdf',1),(00000000050,'dfgdfgdf',1,'2015-03-04 02:58:41','2015-03-04 02:58:41',0000000050,69.96,0.18,82.55,'dfgdfgdf',1),(00000000051,'sdfsdf',1,'2015-03-04 02:59:50','2015-03-04 02:59:50',0000000051,190.80,0.18,225.14,'sdfsdf',1),(00000000052,'sfdsfsdfsdfsd',1,'2015-03-04 06:02:47','2015-03-04 06:02:47',0000000052,299.20,0.18,353.06,'rtgrtg',1),(00000000053,'pedro',1,'2015-03-05 02:24:43','2015-03-05 02:24:43',0000000053,1669.00,0.18,1969.42,'direccion de despacho',1);
/*!40000 ALTER TABLE `cotizacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_cotizacion`
--

DROP TABLE IF EXISTS `detalle_cotizacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_cotizacion` (
  `iddetalle_cotizacion` int(11) NOT NULL AUTO_INCREMENT,
  `detalle_cotizacioncol` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idproducto` int(11) NOT NULL,
  `idcotizacion` int(11) unsigned zerofill NOT NULL,
  `cantidad` int(4) DEFAULT NULL,
  `precio` decimal(9,2) DEFAULT NULL,
  PRIMARY KEY (`iddetalle_cotizacion`),
  KEY `fk_detalle_cotizacion_productos1_idx` (`idproducto`),
  KEY `fk_detalle_cotizacion_cotizacion1_idx` (`idcotizacion`),
  CONSTRAINT `fk_detalle_cotizacion_cotizacion1` FOREIGN KEY (`idcotizacion`) REFERENCES `cotizacion` (`idcotizacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_detalle_cotizacion_productos1` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`idproducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_cotizacion`
--

LOCK TABLES `detalle_cotizacion` WRITE;
/*!40000 ALTER TABLE `detalle_cotizacion` DISABLE KEYS */;
INSERT INTO `detalle_cotizacion` VALUES (19,NULL,NULL,NULL,1,00000000015,1,299.20),(20,NULL,NULL,NULL,2,00000000015,1,63.60),(21,NULL,NULL,NULL,1,00000000016,1,299.20),(22,NULL,NULL,NULL,2,00000000016,2,127.20),(23,NULL,NULL,NULL,1,00000000017,3,897.60),(24,NULL,NULL,NULL,2,00000000017,4,254.40),(25,NULL,NULL,NULL,1,00000000018,1,299.20),(26,NULL,NULL,NULL,1,00000000019,1,299.20),(27,NULL,NULL,NULL,1,00000000020,1,299.20),(28,NULL,NULL,NULL,2,00000000020,1,63.60),(29,NULL,NULL,NULL,1,00000000021,1,299.20),(30,NULL,NULL,NULL,2,00000000021,1,63.60),(31,NULL,NULL,NULL,1,00000000022,1,299.20),(32,NULL,NULL,NULL,2,00000000022,1,63.60),(33,NULL,NULL,NULL,3,00000000022,1,63.60),(34,NULL,NULL,NULL,4,00000000023,1,83.90),(35,NULL,NULL,NULL,9,00000000023,3,329.40),(36,NULL,NULL,NULL,2,00000000024,12,763.20),(37,NULL,NULL,NULL,1,00000000025,3,897.60),(38,NULL,NULL,NULL,10,00000000026,3,110.70),(39,NULL,NULL,NULL,1,00000000027,4,1196.80),(40,NULL,NULL,NULL,1,00000000028,4,1196.80),(41,NULL,NULL,NULL,3,00000000029,4,254.40),(42,NULL,NULL,NULL,1,00000000030,4,1196.80),(43,NULL,NULL,NULL,1,00000000031,4,1196.80),(44,NULL,NULL,NULL,1,00000000032,4,1196.80),(45,NULL,NULL,NULL,1,00000000033,4,1196.80),(46,NULL,NULL,NULL,1,00000000034,4,1196.80),(47,NULL,NULL,NULL,1,00000000035,4,1196.80),(48,NULL,NULL,NULL,1,00000000036,4,1196.80),(49,NULL,NULL,NULL,2,00000000036,5,318.00),(50,NULL,NULL,NULL,1,00000000037,45,13464.00),(51,NULL,NULL,NULL,1,00000000038,4,1196.80),(52,NULL,NULL,NULL,1,00000000039,4,1196.80),(53,NULL,NULL,NULL,1,00000000040,4,1196.80),(54,NULL,NULL,NULL,2,00000000041,1,63.60),(55,NULL,NULL,NULL,3,00000000042,4,254.40),(56,NULL,NULL,NULL,3,00000000043,5,318.00),(57,NULL,NULL,NULL,2,00000000044,5,318.00),(58,NULL,NULL,NULL,4,00000000045,1,83.90),(59,NULL,NULL,NULL,1,00000000046,1,299.20),(60,NULL,NULL,NULL,1,00000000047,1,299.20),(61,NULL,NULL,NULL,4,00000000048,2,167.80),(62,NULL,NULL,NULL,3,00000000049,3,190.80),(63,NULL,NULL,NULL,5,00000000050,1,69.96),(64,NULL,NULL,NULL,3,00000000051,3,190.80),(65,NULL,NULL,NULL,1,00000000052,1,299.20),(66,NULL,NULL,NULL,4,00000000053,1,83.90),(67,NULL,NULL,NULL,5,00000000053,3,209.88),(68,NULL,NULL,NULL,10,00000000053,3,110.70),(69,NULL,NULL,NULL,1,00000000053,2,598.40),(70,NULL,NULL,NULL,8,00000000053,4,123.60),(71,NULL,NULL,NULL,6,00000000053,4,160.92),(72,NULL,NULL,NULL,2,00000000053,6,381.60);
/*!40000 ALTER TABLE `detalle_cotizacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `distrito`
--

DROP TABLE IF EXISTS `distrito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `distrito` (
  `iddistrito` int(11) NOT NULL,
  `nombre_distrito` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`iddistrito`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `distrito`
--

LOCK TABLES `distrito` WRITE;
/*!40000 ALTER TABLE `distrito` DISABLE KEYS */;
/*!40000 ALTER TABLE `distrito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ingresos`
--

DROP TABLE IF EXISTS `ingresos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ingresos` (
  `idingresos` int(11) NOT NULL AUTO_INCREMENT,
  `idproducto` int(11) NOT NULL,
  `cantidad` int(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idingresos`),
  KEY `fk_ingresos_productos1_idx` (`idproducto`),
  CONSTRAINT `fk_ingresos_productos1` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`idproducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingresos`
--

LOCK TABLES `ingresos` WRITE;
/*!40000 ALTER TABLE `ingresos` DISABLE KEYS */;
/*!40000 ALTER TABLE `ingresos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orden_compra`
--

DROP TABLE IF EXISTS `orden_compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orden_compra` (
  `idorden_compra` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `despacho` int(11) DEFAULT NULL COMMENT '1->despachado,2->no despachado',
  `motivo_no_despacho` varchar(100) DEFAULT NULL,
  `distrito` int(11) DEFAULT NULL,
  `iddistrito` int(11) NOT NULL,
  `idcotizacion` int(11) unsigned zerofill NOT NULL,
  PRIMARY KEY (`idorden_compra`),
  KEY `fk_orden_compra_distrito1_idx` (`iddistrito`),
  KEY `fk_orden_compra_cotizacion1_idx` (`idcotizacion`),
  CONSTRAINT `fk_orden_compra_cotizacion1` FOREIGN KEY (`idcotizacion`) REFERENCES `cotizacion` (`idcotizacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_orden_compra_distrito1` FOREIGN KEY (`iddistrito`) REFERENCES `distrito` (`iddistrito`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orden_compra`
--

LOCK TABLES `orden_compra` WRITE;
/*!40000 ALTER TABLE `orden_compra` DISABLE KEYS */;
/*!40000 ALTER TABLE `orden_compra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personas`
--

DROP TABLE IF EXISTS `personas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personas` (
  `idpersonas` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(45) DEFAULT NULL,
  `apellido_paterno` varchar(45) DEFAULT NULL,
  `apellido_materno` varchar(45) DEFAULT NULL,
  `direccion_persona` varchar(100) DEFAULT NULL,
  `dni` int(8) DEFAULT NULL,
  `telefono` int(9) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idpersonas`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personas`
--

LOCK TABLES `personas` WRITE;
/*!40000 ALTER TABLE `personas` DISABLE KEYS */;
INSERT INTO `personas` VALUES (14,'catherine','reyes','asas',NULL,0,0,'adsdasd','2015-02-15 23:16:47',NULL),(15,'giordan','arevalo','asas',NULL,12345678,0,'gbap0506@hotmail.com','2015-02-15 23:18:42',NULL),(16,'prueba','prueba','apeurba',NULL,4584564,123456,'','2015-02-23 00:54:44',NULL),(17,'dfg','dfg','dg',NULL,4534543,34534345,'','2015-02-23 00:55:23',NULL),(18,'dfg','dfg','dg',NULL,4534543,34534345,'','2015-02-23 00:55:25',NULL),(19,'dfg','dfg','dg',NULL,4534543,34534345,'','2015-02-23 00:55:26',NULL),(20,'dfg','dfg','dg',NULL,4534543,34534345,'dfgdfg','2015-02-23 00:55:37',NULL),(21,'dfg','dfg','dg',NULL,4534543,34534345,'dfgdfg','2015-02-23 00:55:38',NULL),(22,'dfg','dfg','dg',NULL,4534543,34534345,'dfgdfg','2015-02-23 00:55:38',NULL),(23,'dfg','dfg','dg',NULL,4534543,34534345,'dfgdfg','2015-02-23 00:55:38',NULL),(24,'dfg','dfg','dg',NULL,4534543,34534345,'dfgdfg','2015-02-23 00:55:44',NULL),(25,'tert','ert','ert',NULL,0,0,'','2015-02-23 00:58:05',NULL),(26,'acreditacion','acreditacion','acreditacion',NULL,123456789,1234567,'','2015-02-23 04:12:43',NULL);
/*!40000 ALTER TABLE `personas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos` (
  `idproducto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_producto` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_producto` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `img_producto` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `precio_producto` decimal(9,2) NOT NULL,
  `stock` int(4) DEFAULT NULL,
  `idcategoria` int(11) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`idproducto`),
  KEY `fk_productos_categoria_idx` (`idcategoria`),
  CONSTRAINT `fk_productos_categoria` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`idcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,'AQUABROM PLUS','AQUABROM PLUS\r PLUS\r  \r ','aquabrom_plus',299.20,0,1,'2015-02-16 02:03:37','2015-02-16 02:03:37'),(2,'CBD-92','63.60\r\n63.60\r\n63.60\r\n63.60\r\n','cbd-92',63.60,300,1,'2015-02-16 02:06:27','2015-02-16 02:06:27'),(3,'CBD-93','CBD-93 CBD-93 CBD-93','cbd-93',63.60,120,5,'2015-02-16 02:07:09','2015-02-16 02:07:09'),(4,'PREMALUBE RED','PREMALUBE RE PREMALUBE RED','premalube_red',83.90,520,3,'2015-02-16 02:07:41','2015-02-16 02:07:41'),(5,'AEROLEX','AEROLEX AEROLEX AEROLEX','aerolex',69.96,145,4,'2015-02-16 02:09:22','2015-02-16 02:09:22'),(6,'FLASH','FLASH FLASH\r\n\r\n','flash',40.23,457,4,'2015-02-16 02:10:40','2015-02-16 02:10:40'),(7,'CHEMAQUA 100','CHEMAQUA 100','chemaqua_100',38.70,544,5,'2015-02-16 02:11:16','2015-02-16 02:11:16'),(8,'CHEMAQUA 777','CHEMAQUA 777\r\n','chemaqua_777',30.90,366,5,'2015-02-16 02:11:39','2015-02-16 02:11:39'),(9,'ELECTRA 221','ELECTRA 221 ELECTRA 221\r\n\r\n','electra_221',109.80,88,2,'2015-02-16 02:12:13','2015-02-16 02:12:13'),(10,'ENFORCE','ENFORCE ENFORCE\r\n\r\n','enforce',36.90,77,3,'2015-02-16 02:12:41','2015-02-16 02:12:41'),(11,'EVERBRITE GERM.','EVERBRITE GERM. EVERBRITE GERM.\r\n\r\n','everbrite_germ.',47.13,963,3,'2015-02-16 02:13:07','2015-02-16 02:13:07');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ruta`
--

DROP TABLE IF EXISTS `ruta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ruta` (
  `idruta` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_ruta` datetime DEFAULT NULL,
  `zona` varchar(45) DEFAULT NULL,
  `idorden_compra` int(11) unsigned zerofill NOT NULL,
  PRIMARY KEY (`idruta`),
  KEY `fk_ruta_orden_compra1_idx` (`idorden_compra`),
  CONSTRAINT `fk_ruta_orden_compra1` FOREIGN KEY (`idorden_compra`) REFERENCES `orden_compra` (`idorden_compra`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ruta`
--

LOCK TABLES `ruta` WRITE;
/*!40000 ALTER TABLE `ruta` DISABLE KEYS */;
/*!40000 ALTER TABLE `ruta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(255) NOT NULL,
  `password` varchar(70) NOT NULL,
  `idestado` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idtipo` int(2) DEFAULT NULL,
  `idpersonas` int(11) NOT NULL,
  `remember_token` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuarios_personas1_idx` (`idpersonas`),
  CONSTRAINT `fk_usuarios_personas1` FOREIGN KEY (`idpersonas`) REFERENCES `personas` (`idpersonas`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (2,'admin','$2y$10$6s7qYdutdbfaCg0HAigSc.0bBtBRttO30d34HtckO1U4T6XRTWr3S',1,'2015-02-15 23:16:47','2015-02-23 04:12:54',1,14,'WLbdTRTaFbe66Sbv7mLsgX9kpWf6UjlCfqyj1l37HMuV3ts5SjbZjtuwFDjR'),(3,'giordan','$2y$10$uCzOkTpBh6RFFCV8XL5oF.zAz/56k0njZRijFmaP5FfD9bee4RzZK',1,'2015-02-15 23:18:42',NULL,1,15,NULL),(4,'admin2','$2y$10$hYdachddREWNy9j5l.MiNOh.z8xSjvUivmLHcxomK/RkZK7AAynZe',1,'2015-02-23 00:54:44',NULL,1,16,NULL),(5,'dfgdfg','$2y$10$r1yogjlQLVQxTwSx/VegZ.xbl2MqYb/g4z3IIPBDNDDueX0NawhC.',1,'2015-02-23 00:55:23',NULL,2,17,NULL),(6,'dfgdfg','$2y$10$ihsFN98vt3fK5gaHUUN2Q.cylaB.yuagTyzSAKgYixtbJWoSN1swq',1,'2015-02-23 00:55:25',NULL,2,18,NULL),(7,'dfgdfg','$2y$10$B2yVfNOk4GlG52Rbcrlx2uKupW7sTAfEyR1DpLMPjYT4Sc5cBeL6u',1,'2015-02-23 00:55:26',NULL,2,19,NULL),(8,'dfgdfg','$2y$10$QiKY5fVvy2lecdh5gD1kmuwPuD1ajvJqw/j5woo1EtnuXPG6R.TcC',1,'2015-02-23 00:55:37',NULL,2,20,NULL),(9,'dfgdfg','$2y$10$qEMZr61yP4C8bc1IDssD2Os/OqT6KvVTdgB.NTEz1Su5gKgsEKfHu',1,'2015-02-23 00:55:38',NULL,2,21,NULL),(10,'dfgdfg','$2y$10$Wsg5S9KR0I.g4hVQtdCQ2Oiu3BI1fBj6X3nXnwSpoQMc9jiRJEecu',1,'2015-02-23 00:55:38',NULL,2,22,NULL),(11,'dfgdfg','$2y$10$0XZ.sCvZ5xVn7A4RGOTq7uppAo/9dHMc.JthGZIUHy5AM1QukcBfq',1,'2015-02-23 00:55:38',NULL,2,23,NULL),(12,'dfgdfg','$2y$10$.nnRMUuL8lmLXNPPIj5/ue.BiIaedQx7swpMgrHbvh1WEqXD81ZSq',1,'2015-02-23 00:55:44',NULL,2,24,NULL),(13,'acreditacion','$2y$10$lWvyjntZ.5JsqnLk/Ji9YeiYPrX/gho9CKVHn35.uxjUbtbgO.3QK',1,'2015-02-23 00:58:05','2015-02-23 04:21:26',4,25,'JUvSzdLk1nAGXH18ClH6qCCBIjyIns3TiweeDWTYTjKTJZpOB2NplboValPv');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'sistventas'
--
/*!50003 DROP PROCEDURE IF EXISTS `sp_prueba` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_prueba`(
in nombre varchar(100),
in descripcion varchar(100)
)
BEGIN

insert into productos (nombre_producto,img_producto,descripcion_producto,precio_producto,created_at,updated_at,idcategoria) values(nombre,descripcion,'dsfsdfsd','15',now(),now(),1);

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_registrar_cotizacion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_registrar_cotizacion`(
in vidprod int,
in vruc bigint,
in vnombre varchar(40),
in vcontacto varchar(40),
in vdireccion varchar(60),
in vcorreo varchar(100),
in vtelefono int,
in vpago int,
in vdirdespacho varchar(50),
in vcantidad int,
in vpreciot decimal(9,2),
in vpreciobruto decimal(9,2),
in vigv decimal(9,2),
in vprecioneto decimal(9,2),
in i int
)
BEGIN

	declare id,artcant,ncant int;


	if i=0 then
		insert into clientes(ruc,nombre_cliente,direccion_cliente,telefono_cliente,acreditacion,correo,created_at,updated_at) 
		value(vruc,vnombre,vdireccion,vtelefono,1,vcorreo,now(),now());

		set id=(select idclientes from clientes order by idclientes desc limit 1);
		
		insert into cotizacion (contacto,tipo_pago,idclientes,precio,igv,preciototal,direccion_despacho,estado,created_at,updated_at) 
		values(vcontacto,vpago,id,vpreciobruto,vigv,vprecioneto,vdirdespacho,1,now(),now());
	end if;

	set id=(select idcotizacion from cotizacion order by idcotizacion desc limit 1);
	
	insert into detalle_cotizacion(idproducto,idcotizacion,cantidad,precio) 
	value(vidprod,id,vcantidad,vpreciot);
	

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_registrar_usuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_registrar_usuario`(
	in vnombres varchar(40),
	in vapepaterno varchar(20),
	in vapematerno varchar(20),
	in vdni int,
	in vtelefono int,
	in vcorreo varchar(100),
	in vusuario varchar(20),
	in vcontra varchar(70),
	in vtipo_usuario int
)
BEGIN
	
	declare vidpersona ,vidusuario int; 
		

	insert into personas (nombres,apellido_paterno,apellido_materno,dni,telefono,correo,created_at) 
	value (vnombres,vapepaterno,vapematerno,vdni,vtelefono,vcorreo,now());

	set vidpersona = (select idpersonas from personas  order by idpersonas desc limit 1);

	insert into usuarios (usuario,password,idestado,created_at,idtipo,idpersonas) value(vusuario,vcontra,1,now(),vtipo_usuario,vidpersona);

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-03-04 21:37:56
