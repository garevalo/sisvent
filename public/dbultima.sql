CREATE DATABASE  IF NOT EXISTS `sistventas` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sistventas`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: localhost    Database: sistventas
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Lubricantes',NULL),(2,'Aceites',NULL),(3,'Quimicos',NULL),(4,'Aerosoles',NULL),(5,'Chemaqua',NULL),(6,'Chemaqua2',NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (0000000001,20123458741,'atix sac','la encalada surco',123547896,3,'atix@hotmail.com','2015-04-16 22:58:43','2015-04-16 22:58:43'),(0000000002,20456456456,'atix sac','asdasdas',546456456,3,'atix@hotmail.com','2015-04-17 07:16:27','2015-04-17 07:16:27'),(0000000003,89564545621,'juniro','asdasd',342432423,3,'asdas@gmail.com','2015-04-22 12:23:38','2015-04-22 12:23:38'),(0000000004,67568798797,'htrretert','sdfgfgfg',455345345,3,'retert@gmail.com','2015-04-23 03:38:36','2015-05-23 23:27:14'),(0000000005,44456564645,'fsdfsdf','asdasd',242342342,3,'sdfsdfsd@hotmail.com','2015-04-27 01:53:21','2015-05-10 15:25:47'),(0000000006,56456756767,'hgfhgfhgf','sdfkhdsfk',456456456,3,'tyrewe@hotmail.com','2015-05-10 15:27:02','2015-05-24 00:11:09'),(0000000007,67765675675,'juan','los olivos',126985566,3,'juan@gmail.com','2015-05-10 15:28:48','2015-05-10 15:28:48'),(0000000008,69854126322,'pedro','asdasdasdasdsad asdn lasndkl nkl',456987456,3,'pedro@hotmail.com','2015-05-10 15:29:54','2015-05-10 15:29:54'),(0000000009,87989789789,'jmjmjm','daskdhalsd',2569854,1,'tert@yahho.com','2015-05-10 17:23:07','2015-05-10 17:23:07'),(0000000010,45657675675,'contado','san martin ',5231458,1,'ascas@yahoo.com','2015-05-13 05:39:42','2015-05-13 05:39:42'),(0000000011,34545345345,'gdfgdf','dfgdfgdfg',453453453,1,'ghjghj@hotmial.com','2015-05-22 02:21:59','2015-05-22 02:21:59'),(0000000012,65767567567,'hfghghf','rgrgtg',456456456,3,'ddsfs@yahpoo.com','2015-05-22 02:24:31','2015-05-22 02:24:31'),(0000000013,76575678768,'jhkjkjfhd','ghgfhgf',56456456,1,'fdgf@ahoo.com','2015-05-22 04:09:19','2015-05-22 04:09:19'),(0000000014,89789797897,'notificaion','notificacion',123456789,1,'noti@gmail.com','2015-06-06 23:14:08','2015-06-06 23:14:08'),(0000000015,89789795645,'asjdlkasjdl','asdasd',343423423,1,'asdasd@hotmail.com','2015-06-06 23:34:17','2015-06-06 23:34:17'),(0000000016,87897984564,'sdfddfgdf','sadasdasd',545645645,3,'dfsdf@gmail.com','2015-06-06 23:46:01','2015-06-06 23:46:01'),(0000000017,87897897947,'sldasjdkasd','dasdasdas',456456456,1,'asasd6@hotmail.com','2015-06-06 23:47:30','2015-06-06 23:47:30'),(0000000018,56465456456,'hjsdkfhsdjkfh','asdasdasd',342342342,1,'asdasd@hotmail.com','2015-06-08 04:36:51','2015-06-08 04:36:51');
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
  `iddistrito` int(11) DEFAULT NULL,
  `direccion_despacho` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` int(1) DEFAULT NULL COMMENT '1->activo,2->en proceso,3->cerrado',
  PRIMARY KEY (`idcotizacion`),
  KEY `fk_cotizacion_clientes1_idx` (`idclientes`),
  CONSTRAINT `fk_cotizacion_clientes1` FOREIGN KEY (`idclientes`) REFERENCES `clientes` (`idclientes`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cotizacion`
--

LOCK TABLES `cotizacion` WRITE;
/*!40000 ALTER TABLE `cotizacion` DISABLE KEYS */;
INSERT INTO `cotizacion` VALUES (00000000001,'Marcos',1,'2015-04-16 22:58:43','2015-04-16 22:58:43',0000000001,2446.00,0.18,2886.28,3,'la encalda 259 surco',3),(00000000002,'asdasdas',1,'2015-04-17 07:16:27','2015-04-17 07:16:27',0000000002,837.10,0.18,987.78,5,'asdasdasdasd',3),(00000000003,'ertertert',1,'2015-04-22 12:23:38','2015-04-22 12:23:38',0000000003,635.80,0.18,750.24,9,'ertertertert',3),(00000000004,'dgffdgfdg',2,'2015-04-23 03:38:36','2015-04-23 03:38:36',0000000004,1614.60,0.18,1905.23,12,'dfgdfgdfg',3),(00000000005,'asdasdasd',1,'2015-04-26 23:46:34','2015-04-26 23:46:34',0000000004,2486.00,0.18,2933.48,5,'fsdfsdfsdfsdfsdf',3),(00000000006,'sdfsdf',1,'2015-04-27 01:53:21','2015-04-27 01:53:21',0000000005,1541.00,0.18,1818.38,6,'sdfsdfsdf',3),(00000000007,'asdas',2,'2015-05-10 15:25:47','2015-05-10 15:25:47',0000000005,1518.00,0.18,1791.24,3,'los olivso 403 ',3),(00000000008,'dsfsdf',1,'2015-05-10 15:27:02','2015-05-10 15:27:02',0000000006,971.00,0.18,1145.78,1,'fgdfgdfg',3),(00000000009,'juan',1,'2015-05-10 15:28:48','2015-05-10 15:28:48',0000000007,1151.22,0.18,1358.44,1,'izagire 523',3),(00000000010,'pedro',1,'2015-05-10 15:29:54','2015-05-10 15:29:54',0000000008,576.88,0.18,680.72,3,'dsfsdfsdfsdf sdfsdfsd530',3),(00000000011,'asdasd',1,'2015-05-10 17:23:07','2015-05-10 17:23:07',0000000009,499.44,0.18,589.34,2,'asdasd',2),(00000000012,'caontacto',2,'2015-05-13 05:39:42','2015-05-13 05:39:42',0000000010,345.60,0.18,407.81,7,'cieneguilla',2),(00000000013,'5tg',2,'2015-05-22 02:21:59','2015-05-22 02:21:59',0000000011,378.00,0.18,446.04,10,'dfgdfgf',2),(00000000014,'trytryr',1,'2015-05-22 02:24:31','2015-05-22 02:24:31',0000000012,858.96,0.18,1013.57,12,'gfhgfhfghgfh',2),(00000000015,'fghgfh',1,'2015-05-22 04:09:19','2015-05-22 04:09:19',0000000013,543.30,0.18,641.09,8,'gfhgfhgfh',2),(00000000016,'dfgdfgdff',2,'2015-05-23 23:27:14','2015-05-23 23:27:14',0000000004,1541.00,0.18,1818.38,5,'dfgdfgdfg',2),(00000000017,'ddssdf',2,'2015-05-24 00:11:09','2015-05-24 00:11:09',0000000006,770.50,0.18,909.19,5,'sdafasdfasd',2),(00000000018,'asdasd',2,'2015-06-06 23:14:08','2015-06-06 23:14:08',0000000014,643.30,0.18,759.09,7,'asdasdasdas',2),(00000000019,'sdfsdf',2,'2015-06-06 23:34:17','2015-06-06 23:34:17',0000000015,337.08,0.18,397.75,10,'sdfsdfsdf',2),(00000000020,'asdasdas',1,'2015-06-06 23:46:01','2015-06-06 23:46:01',0000000016,345.60,0.18,407.81,6,'asdasdasdasd',2),(00000000021,'sadasdasd',2,'2015-06-06 23:47:30','2015-06-06 23:47:30',0000000017,1810.00,0.18,2135.80,6,'asdasdasd',1),(00000000022,'dfgdfgsdf',1,'2015-06-08 04:36:51','2015-06-08 04:36:51',0000000018,19080.00,0.18,22514.40,8,'dfgsdfgdfg',2);
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
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `idproducto` int(11) NOT NULL,
  `idcotizacion` int(11) unsigned zerofill NOT NULL,
  `cantidad` int(4) DEFAULT NULL,
  `precio` decimal(9,2) DEFAULT NULL,
  `pedido` int(1) DEFAULT NULL COMMENT '1->si , 2->no',
  `estado_pedido` int(1) DEFAULT NULL COMMENT '1->enproceso,2->atendido',
  PRIMARY KEY (`iddetalle_cotizacion`),
  KEY `fk_detalle_cotizacion_productos1_idx` (`idproducto`),
  KEY `fk_detalle_cotizacion_cotizacion1_idx` (`idcotizacion`),
  CONSTRAINT `fk_detalle_cotizacion_cotizacion1` FOREIGN KEY (`idcotizacion`) REFERENCES `cotizacion` (`idcotizacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_detalle_cotizacion_productos1` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`idproducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_cotizacion`
--

LOCK TABLES `detalle_cotizacion` WRITE;
/*!40000 ALTER TABLE `detalle_cotizacion` DISABLE KEYS */;
INSERT INTO `detalle_cotizacion` VALUES (1,'2015-04-16 22:58:43','2015-04-16 22:58:43',1,00000000001,5,2252.50,1,2),(2,'2015-04-16 22:58:43','2015-04-16 22:58:43',7,00000000001,5,193.50,1,2),(3,'2015-04-17 07:16:27','2015-04-17 07:16:27',4,00000000002,5,419.50,1,2),(4,'2015-04-17 07:16:27','2015-04-17 07:16:27',7,00000000002,6,232.20,1,2),(5,'2015-04-17 07:16:27','2015-04-17 07:16:27',8,00000000002,6,185.40,1,2),(6,'2015-04-22 12:23:38','2015-04-22 12:23:38',4,00000000003,5,419.50,NULL,NULL),(7,'2015-04-22 12:23:38','2015-04-22 12:23:38',8,00000000003,7,216.30,NULL,NULL),(8,'2015-04-23 03:38:36','2015-04-23 03:38:36',10,00000000004,34,1254.60,NULL,NULL),(9,'2015-04-23 03:38:36','2015-04-23 03:38:36',11,00000000004,12,360.00,NULL,NULL),(10,'2015-04-26 23:46:34','2015-04-26 23:46:34',4,00000000005,10,839.00,NULL,NULL),(11,'2015-04-26 23:46:34','2015-04-26 23:46:34',9,00000000005,15,1647.00,NULL,NULL),(12,'2015-04-27 01:53:21','2015-04-27 01:53:21',2,00000000006,10,905.00,1,2),(13,'2015-04-27 01:53:21','2015-04-27 01:53:21',3,00000000006,10,636.00,1,2),(14,'2015-05-10 15:25:47','2015-05-10 15:25:47',1,00000000007,4,1200.00,NULL,NULL),(15,'2015-05-10 15:25:47','2015-05-10 15:25:47',3,00000000007,5,318.00,NULL,NULL),(16,'2015-05-10 15:27:02','2015-05-10 15:27:02',4,00000000008,4,335.60,NULL,NULL),(17,'2015-05-10 15:27:02','2015-05-10 15:27:02',7,00000000008,6,232.20,NULL,NULL),(18,'2015-05-10 15:27:02','2015-05-10 15:27:02',9,00000000008,3,329.40,NULL,NULL),(19,'2015-05-10 15:27:02','2015-05-10 15:27:02',10,00000000008,2,73.80,NULL,NULL),(20,'2015-05-10 15:28:48','2015-05-10 15:28:48',5,00000000009,4,279.84,1,2),(21,'2015-05-10 15:28:48','2015-05-10 15:28:48',6,00000000009,6,241.38,1,2),(22,'2015-05-10 15:28:48','2015-05-10 15:28:48',9,00000000009,4,439.20,NULL,NULL),(23,'2015-05-10 15:28:48','2015-05-10 15:28:48',3,00000000009,3,190.80,NULL,NULL),(24,'2015-05-10 15:29:54','2015-05-10 15:29:54',2,00000000010,2,181.00,NULL,NULL),(25,'2015-05-10 15:29:54','2015-05-10 15:29:54',6,00000000010,6,241.38,1,2),(26,'2015-05-10 15:29:54','2015-05-10 15:29:54',8,00000000010,5,154.50,NULL,NULL),(27,'2015-05-10 17:23:07','2015-05-10 17:23:07',5,00000000011,4,279.84,NULL,NULL),(28,'2015-05-10 17:23:07','2015-05-10 17:23:07',9,00000000011,2,219.60,NULL,NULL),(29,'2015-05-13 05:39:42','2015-05-13 05:39:42',3,00000000012,3,190.80,NULL,NULL),(30,'2015-05-13 05:39:42','2015-05-13 05:39:42',7,00000000012,4,154.80,NULL,NULL),(31,'2015-05-22 02:21:59','2015-05-22 02:21:59',3,00000000013,4,254.40,NULL,NULL),(32,'2015-05-22 02:22:00','2015-05-22 02:22:00',8,00000000013,4,123.60,NULL,NULL),(33,'2015-05-22 02:24:31','2015-05-22 02:24:31',5,00000000014,6,419.76,NULL,NULL),(34,'2015-05-22 02:24:32','2015-05-22 02:24:32',9,00000000014,4,439.20,NULL,NULL),(35,'2015-05-22 04:09:19','2015-05-22 04:09:19',5,00000000015,5,349.80,NULL,NULL),(36,'2015-05-22 04:09:19','2015-05-22 04:09:19',7,00000000015,5,193.50,NULL,NULL),(37,'2015-05-23 23:27:14','2015-05-23 23:27:14',2,00000000016,10,905.00,NULL,NULL),(38,'2015-05-23 23:27:14','2015-05-23 23:27:14',3,00000000016,10,636.00,NULL,NULL),(39,'2015-05-24 00:11:09','2015-05-24 00:11:09',3,00000000017,5,318.00,NULL,NULL),(40,'2015-05-24 00:11:09','2015-05-24 00:11:09',2,00000000017,5,452.50,NULL,NULL),(41,'2015-06-06 23:14:08','2015-06-06 23:14:08',2,00000000018,5,452.50,NULL,NULL),(42,'2015-06-06 23:14:08','2015-06-06 23:14:08',3,00000000018,3,190.80,NULL,NULL),(43,'2015-06-06 23:34:17','2015-06-06 23:34:17',3,00000000019,2,127.20,NULL,NULL),(44,'2015-06-06 23:34:17','2015-06-06 23:34:17',5,00000000019,3,209.88,NULL,NULL),(45,'2015-06-06 23:46:01','2015-06-06 23:46:01',3,00000000020,3,190.80,NULL,NULL),(46,'2015-06-06 23:46:01','2015-06-06 23:46:01',7,00000000020,4,154.80,NULL,NULL),(47,'2015-06-06 23:47:30','2015-06-06 23:47:30',2,00000000021,20,1810.00,NULL,NULL),(48,'2015-06-08 04:36:51','2015-06-08 04:36:51',3,00000000022,300,19080.00,1,1);
/*!40000 ALTER TABLE `detalle_cotizacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `distrito`
--

DROP TABLE IF EXISTS `distrito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `distrito` (
  `iddistrito` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_distrito` varchar(45) DEFAULT NULL,
  `sector` int(11) DEFAULT NULL COMMENT '1->lima centro 2->moderna  3->norte  4->sur  5->este  6->callao',
  PRIMARY KEY (`iddistrito`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `distrito`
--

LOCK TABLES `distrito` WRITE;
/*!40000 ALTER TABLE `distrito` DISABLE KEYS */;
INSERT INTO `distrito` VALUES (1,'Ancón',3),(2,'Ate',5),(3,'Barranco',4),(4,'Breña',2),(5,'Carabayllo',3),(6,'Chaclacayo',5),(7,'Cieneguilla',5),(8,'Comas',3),(9,'Chorrillo',5),(10,'El Augustino',5),(11,'Independencia',3),(12,'Jesús María',2),(13,'Surco',4),(14,'San Juan de Lurigancho',5);
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingresos`
--

LOCK TABLES `ingresos` WRITE;
/*!40000 ALTER TABLE `ingresos` DISABLE KEYS */;
INSERT INTO `ingresos` VALUES (1,1,50,'2015-04-17 06:41:21',NULL),(2,8,50,'2015-04-17 06:41:33',NULL),(3,4,10,'2015-04-17 07:20:19',NULL),(4,8,10,'2015-04-17 07:20:32',NULL),(5,7,10,'2015-04-17 07:20:40',NULL),(6,1,5,'2015-04-19 00:33:52',NULL),(7,1,1,'2015-04-24 03:53:07',NULL),(8,1,1,'2015-04-24 03:53:43',NULL),(9,2,10,'2015-05-04 03:52:11',NULL),(10,3,10,'2015-05-04 03:52:20',NULL),(11,5,20,'2015-05-11 08:23:39',NULL),(12,6,20,'2015-05-11 08:23:47',NULL);
/*!40000 ALTER TABLE `ingresos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notificaciones`
--

DROP TABLE IF EXISTS `notificaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notificaciones` (
  `idnotificaciones` int(11) NOT NULL AUTO_INCREMENT,
  `idtipo` int(11) DEFAULT NULL,
  `idestado` int(11) DEFAULT NULL,
  `detalle_notificacion` varchar(45) DEFAULT NULL,
  `desde` int(11) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idnotificaciones`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notificaciones`
--

LOCK TABLES `notificaciones` WRITE;
/*!40000 ALTER TABLE `notificaciones` DISABLE KEYS */;
INSERT INTO `notificaciones` VALUES (1,2,2,'Se ha creado una nueva cotizacion :18',1,NULL,'2015-06-06 23:14:08',NULL),(2,2,2,'Se ha creado una nueva cotizacion :19',1,NULL,'2015-06-06 23:34:17',NULL),(3,2,2,'Se ha creado una nueva cotizacion :20',1,NULL,'2015-06-06 23:46:01',NULL),(4,2,2,'Se ha creado una nueva cotizacion :21',1,NULL,'2015-06-06 23:47:30',NULL),(5,2,2,'Cliente Acreditado:16',4,NULL,'2015-06-07 22:46:06',NULL),(6,2,2,'Producto Atendido:1 - Orden Compra:4',3,NULL,'2015-06-08 03:35:46',NULL),(7,2,2,'Producto Atendido:4<br> Orden Compra:5',3,NULL,'2015-06-08 03:36:53',NULL),(8,2,1,'Se ha creado una nueva cotizacion :22',1,NULL,'2015-06-08 04:36:51',NULL),(9,3,2,'El siguiente producto tiene poco Stock:7-CHEM',3,NULL,'2015-06-10 04:19:02',NULL),(10,3,1,'Poco Stock: 1 - AQUABROM SUPER PLUS',3,NULL,'2015-06-10 04:20:53',NULL),(11,3,1,'Poco Stock: AQUABROM SUPER PLUS(5)',3,NULL,'2015-06-10 04:23:20',NULL),(12,3,1,'Verifique Stock: CBD-92 stock actual: 4',3,NULL,'2015-06-10 04:25:35',NULL),(13,3,1,'Verifique Stock: FLASH - stock actual: 3',3,NULL,'2015-06-10 04:27:28',NULL);
/*!40000 ALTER TABLE `notificaciones` ENABLE KEYS */;
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
  `despacho` int(11) DEFAULT NULL COMMENT '1->no despachado,2-> despachado',
  `motivo_no_despacho` varchar(100) DEFAULT NULL,
  `fecha_no_cotizacion` datetime DEFAULT NULL,
  `fecha_despacho` datetime DEFAULT NULL,
  `idcotizacion` int(11) unsigned zerofill NOT NULL,
  `numero_factura` int(10) unsigned zerofill DEFAULT NULL,
  `numero_guia` int(10) unsigned zerofill DEFAULT NULL,
  PRIMARY KEY (`idorden_compra`),
  KEY `fk_orden_compra_cotizacion1_idx` (`idcotizacion`),
  CONSTRAINT `fk_orden_compra_cotizacion1` FOREIGN KEY (`idcotizacion`) REFERENCES `cotizacion` (`idcotizacion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orden_compra`
--

LOCK TABLES `orden_compra` WRITE;
/*!40000 ALTER TABLE `orden_compra` DISABLE KEYS */;
INSERT INTO `orden_compra` VALUES (00000000004,'2015-04-17 06:07:47',NULL,2,'2','2015-04-18 19:04:01','2015-04-23 23:42:59',00000000001,0000000001,0000000001),(00000000005,'2015-04-17 07:16:35',NULL,2,'3','2015-04-17 02:04:26','2015-04-24 00:09:36',00000000002,0000000002,0000000002),(00000000006,'2015-04-22 12:24:03',NULL,2,NULL,'2015-05-03 22:51:27','2015-04-26 18:44:11',00000000003,0000000003,0000000003),(00000000007,'2015-04-23 04:45:34',NULL,2,'2','2015-05-03 22:51:27','2015-04-26 20:47:31',00000000004,0000000004,0000000004),(00000000008,'2015-04-27 01:55:03',NULL,2,NULL,NULL,'2015-05-03 22:51:27',00000000005,0000000005,0000000005),(00000000009,'2015-04-27 01:55:16',NULL,2,NULL,NULL,'2015-05-03 23:02:12',00000000006,0000000006,0000000006),(00000000010,'2015-05-10 15:30:08',NULL,2,NULL,NULL,'2015-05-10 10:32:48',00000000007,NULL,NULL),(00000000011,'2015-05-10 16:05:44',NULL,2,NULL,NULL,'2015-05-10 11:33:21',00000000008,NULL,NULL),(00000000012,'2015-05-10 16:36:58',NULL,2,'3','2015-05-10 11:05:09','2015-05-11 03:24:22',00000000009,NULL,NULL),(00000000013,'2015-05-10 16:37:32',NULL,1,'3','2015-05-17 11:05:28','2015-05-12 08:04:55',00000000010,NULL,NULL),(00000000014,'2015-05-10 17:23:33',NULL,1,'2','2015-05-18 23:05:00',NULL,00000000011,NULL,NULL),(00000000015,'2015-05-13 05:56:54',NULL,1,NULL,NULL,NULL,00000000012,NULL,NULL),(00000000016,'2015-05-22 03:48:52',NULL,1,NULL,'2015-05-21 22:48:52',NULL,00000000013,NULL,NULL),(00000000017,'2015-05-22 04:03:05',NULL,1,NULL,'2015-05-21 23:03:05',NULL,00000000014,NULL,NULL),(00000000018,'2015-05-23 23:27:53',NULL,1,'4','2015-05-23 19:05:32',NULL,00000000016,NULL,NULL),(00000000019,'2015-05-24 00:11:43',NULL,1,NULL,'2015-05-23 19:11:43',NULL,00000000017,NULL,NULL),(00000000020,'2015-05-30 17:23:11',NULL,1,NULL,'2015-05-30 12:23:11',NULL,00000000015,NULL,NULL),(00000000021,'2015-06-07 19:08:15',NULL,1,'4','2015-06-07 14:06:31',NULL,00000000018,NULL,NULL),(00000000022,'2015-06-07 19:12:19',NULL,1,'4','2015-06-07 14:06:37',NULL,00000000019,NULL,NULL),(00000000023,'2015-06-07 20:17:59',NULL,1,NULL,'2015-06-07 15:17:59',NULL,00000000020,NULL,NULL),(00000000024,'2015-06-08 04:37:07',NULL,1,NULL,'2015-06-07 23:37:07',NULL,00000000022,NULL,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personas`
--

LOCK TABLES `personas` WRITE;
/*!40000 ALTER TABLE `personas` DISABLE KEYS */;
INSERT INTO `personas` VALUES (1,'catherine','reyes','asas',NULL,0,0,'adsdasd','2015-02-16 04:16:47',NULL),(2,'Pedro','Suarez','Carmona',NULL,23698745,123456789,'pedro@hotmail.com','2015-05-13 02:48:45','2015-06-06 22:53:06'),(3,'susana','castro','davila',NULL,25698545,25689456,'','2015-05-13 02:51:34',NULL),(4,'carlos','casca','lalala',NULL,25632145,5478541,'','2015-05-13 03:02:03',NULL),(5,'juan','juan','gonzales',NULL,58796521,236589652,'','2015-05-13 03:02:40',NULL);
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
  `estado_producto` int(11) DEFAULT NULL,
  PRIMARY KEY (`idproducto`),
  KEY `fk_productos_categoria_idx` (`idcategoria`),
  CONSTRAINT `fk_productos_categoria` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`idcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,'AQUABROM SUPER PLUS','AQUABROM SUPER','aquabrom_super_plus',300.00,4,1,'2015-02-16 07:03:37','2015-06-08 04:40:06',2),(2,'CBD-92 ','Descripción CBD-92','cbd-94',90.50,4,1,'2015-02-16 07:06:27','2015-03-16 04:24:18',1),(3,'CBD-93','CBD-93 CBD-93 CBD-93','cbd-93',63.60,12,2,'2015-02-16 07:07:09','2015-03-19 12:31:18',2),(4,'PREMALUBE RED','PREMALUBE RE PREMALUBE RED','premalube_red',83.90,12,3,'2015-02-16 07:07:41','2015-02-16 07:07:41',1),(5,'AEROLEX','AEROLEX AEROLEX AEROLEX','aerolex',69.96,22,4,'2015-02-16 07:09:22','2015-03-25 07:29:36',2),(6,'FLASH','FLASH FLASH\r\n\r\n','flash',40.23,3,4,'2015-02-16 07:10:40','2015-02-16 07:10:40',1),(7,'CHEMAQUA 100','CHEMAQUA 100','chemaqua_100',38.70,4,5,'2015-02-16 07:11:16','2015-02-16 07:11:16',1),(8,'CHEMAQUA 777','CHEMAQUA 777\r\n','chemaqua_777',30.90,62,5,'2015-02-16 07:11:39','2015-02-16 07:11:39',1),(9,'ELECTRA 221','ELECTRA 221 ELECTRA 221\r\n\r\n','electra_221',109.80,20,2,'2015-02-16 07:12:13','2015-02-16 07:12:13',1),(10,'ENFORCE','ENFORCE ENFORCE\r\n\r\n','enforce',36.90,100,3,'2015-02-16 07:12:41','2015-02-16 07:12:41',1),(11,'EVERBRITE GERM.','EVERBRITE GERM. EVERBRITE GERM.\r\n\r\n','everbrite_germ.',30.00,100,3,'2015-02-16 07:13:07','2015-03-19 12:35:41',2),(12,'producto de prueba','AQUABROM PLUS AQUABROM \r\n ','cdcdscsd',299.20,NULL,1,'2015-03-16 02:31:46','2015-03-30 02:16:37',1);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER trigger_producto_notificacion
AFTER UPDATE ON productos 
FOR EACH ROW 
BEGIN 
DECLARE cantidad INT; 
SELECT stock INTO cantidad FROM productos WHERE idproducto=OLD.idproducto; 
IF cantidad <= 5 THEN 

/*UPDATE TOTAL_VENTAS 
SET total=total+NEW.total 

WHERE idcliente=NEW.idcliente; */

insert into notificaciones(idtipo,idestado,detalle_notificacion,desde,created_at)
values(3,1, concat("Verifique Stock: ",OLD.nombre_producto,' - stock actual: ',NEW.stock),3,now());

END IF; 
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `ruta`
--

DROP TABLE IF EXISTS `ruta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ruta` (
  `idruta` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_ruta` datetime DEFAULT NULL,
  `iddistrito` int(11) DEFAULT NULL,
  `idorden_compra` int(11) unsigned zerofill NOT NULL,
  `precio` decimal(9,3) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL COMMENT '1->activo , 2->despacho, 3->cerrado',
  `fecha_creacion` datetime DEFAULT NULL,
  `fecha_salida` datetime DEFAULT NULL,
  PRIMARY KEY (`idruta`),
  KEY `fk_ruta_orden_compra1_idx` (`idorden_compra`),
  CONSTRAINT `fk_ruta_orden_compra1` FOREIGN KEY (`idorden_compra`) REFERENCES `orden_compra` (`idorden_compra`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ruta`
--

LOCK TABLES `ruta` WRITE;
/*!40000 ALTER TABLE `ruta` DISABLE KEYS */;
INSERT INTO `ruta` VALUES (1,'2015-06-20 23:06:25',3,00000000004,2886.280,3,'2015-04-17 01:07:48','2015-04-23 23:42:59'),(2,'2015-06-20 23:06:25',5,00000000005,987.780,3,'2015-04-17 02:16:35','2015-04-24 00:09:36'),(3,'2015-06-20 23:06:25',9,00000000006,750.240,3,'2015-04-22 07:24:03','2015-04-26 18:44:11'),(4,'2015-06-20 23:06:25',12,00000000007,1905.230,3,'2015-04-22 23:45:35','2015-04-26 20:47:31'),(5,'2015-06-20 23:06:25',5,00000000008,2933.480,3,'2015-04-26 20:55:03','2015-05-03 22:51:27'),(6,'2015-06-20 23:06:25',6,00000000009,1818.380,3,'2015-04-26 20:55:16','2015-05-03 23:02:12'),(7,'2015-06-20 23:06:25',3,00000000010,1791.240,3,'2015-05-10 10:30:08','2015-05-10 10:32:48'),(8,'2015-06-20 23:06:25',1,00000000011,1145.780,3,'2015-05-10 11:05:45','2015-05-10 11:33:21'),(9,'2015-06-20 23:06:25',1,00000000012,1358.440,3,'2015-05-10 11:36:58','2015-05-11 03:24:22'),(10,'2015-06-20 23:06:25',3,00000000013,680.720,3,'2015-05-10 11:37:32','2015-05-12 08:04:55'),(11,NULL,2,00000000014,589.340,1,'2015-05-10 12:23:33',NULL),(12,NULL,7,00000000015,407.810,1,'2015-05-13 00:56:54',NULL),(13,NULL,10,00000000016,446.040,1,'2015-05-21 22:48:53',NULL),(14,NULL,12,00000000017,1013.570,1,'2015-05-21 23:03:05',NULL),(15,NULL,5,00000000018,1818.380,1,'2015-05-23 18:27:53',NULL),(16,NULL,5,00000000019,909.190,1,'2015-05-23 19:11:43',NULL),(17,NULL,8,00000000020,641.090,1,'2015-05-30 12:23:12',NULL),(18,NULL,7,00000000021,759.090,1,'2015-06-07 14:08:15',NULL),(19,NULL,10,00000000022,397.750,1,'2015-06-07 14:12:19',NULL),(20,NULL,6,00000000023,407.810,1,'2015-06-07 15:17:59',NULL),(21,NULL,8,00000000024,22514.400,1,'2015-06-07 23:37:07',NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'admin','$2y$10$6s7qYdutdbfaCg0HAigSc.0bBtBRttO30d34HtckO1U4T6XRTWr3S',1,'2015-02-16 04:16:47','2015-06-06 23:14:45',1,1,'Dt2naLQsxCDzRN07wYjAPZVo8m5tLDoNIvH1yf5d8EG66XdhRGkewedGDVmw'),(2,'administrativo','$2y$10$Xdppk9vnYr.pVp6ttcK/guWOg4aIulV6glWLnAp7u1f3/Znq/V3/G',1,'2015-05-13 02:48:45','2015-06-06 23:27:25',2,2,'YrvPdRA718J4WY6fUgyKmtjMBO5kKpWc5Gy2L9EzXGxkQhkMnmrFFnwAOtkZ'),(3,'acreditacion','$2y$10$BGr.9f9JxTw2Lh82KYNBlO5g9Ju1EcYVYfLyk0BriZcHhvVNbOetC',1,'2015-05-13 02:51:34','2015-05-13 03:44:26',4,3,'q7rMObLnUT5OVPbAXwQkHxYn8QND14cdiuKIKEdqG8c6BY0ceuAhUVaL5mvb'),(4,'almacen','$2y$10$pbX714LavOKngZMeKOOL5eCyI14HXB/mwa2L3IQRdqpnNbk7nQKwu',1,'2015-05-13 03:02:03','2015-05-17 16:14:01',3,4,'gQJLg7YjeZJczSuAMlWXucGQ9ALWFicEwt0B1MElNqURK9nIdDc0Da8GfCZR'),(5,'despacho','$2y$10$EJbiwnt8dpHhZg3MNB41NeTyIzy4IucIQ0oFkHKodhUHoANe3Du1G',1,'2015-05-13 03:02:40','2015-05-13 03:47:55',5,5,'gg5vWJWevHRhceXPKygjxjCfTFHWpIlnQQkXY8KixitGnQN4MxcerzPChckR');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'sistventas'
--

--
-- Dumping routines for database 'sistventas'
--
/*!50003 DROP PROCEDURE IF EXISTS `sp_crear_orden_ruta` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_crear_orden_ruta`(
in vidcot int
)
BEGIN

declare viddistrito ,vidoc,cant,cantruta,vidprod,vcantprod int;
declare vprecio decimal(9,3);
declare done boolean default false;
declare cur CURSOR FOR select idproducto , cantidad from detalle_cotizacion where idcotizacion=vidcot;
declare CONTINUE HANDLER FOR SQLSTATE '02000' SET done=true;
-- select count(idorden_compra) into cant from cotizacion where idcotizacion = vidcot;
 

select count(oc.idorden_compra) into cant from cotizacion c
inner join orden_compra oc ON c.idcotizacion = oc.idcotizacion
where oc.idcotizacion = vidcot;

select oc.idorden_compra into vidoc from cotizacion c 
inner join orden_compra oc ON c.idcotizacion = oc.idcotizacion
where oc.idcotizacion = vidcot;

if cant=0 then
 
  insert into orden_compra (idcotizacion,created_at,fecha_no_cotizacion,despacho) values(vidcot,now(),now(),1);
 
update cotizacion set   estado = 2 where idcotizacion = vidcot;

select  c.iddistrito, c.preciototal into viddistrito , vprecio from cotizacion c
where c.idcotizacion = vidcot;

select c.iddistrito, c.preciototal, oc.idorden_compra into viddistrito , vprecio , vidoc from cotizacion c
inner join orden_compra oc ON c.idcotizacion = oc.idcotizacion where oc.idcotizacion = vidcot;


 -- crea la ruta
 insert into ruta (iddistrito,idorden_compra,precio,estado,fecha_creacion) values(viddistrito,vidoc,vprecio,1,now());

-- RESTAR PRODUCTOS QUE SALEN

	open cur;

	cur_loop:loop

		fetch cur into vidprod,vcantprod;
		if done then leave cur_loop; end if;
		
		update producto set stock=(select(select stock from productos where idproducto=vidprod) - vcantprod)  where idproducto=vidprod;
		

	end loop cur_loop;
	close cur;


end if;



-- select viddistrito;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_crear_ruta` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_crear_ruta`(
in vidoc int
)
BEGIN

declare viddistrito int;
declare vprecio decimal(9,3);

select c.iddistrito,c.preciototal into viddistrito,vprecio from cotizacion c 
inner join orden_compra oc on c.idcotizacion=oc.idcotizacion 
 where oc.idorden_compra = vidoc;

insert into ruta (iddistrito,idorden_compra,precio,estado,fecha_creacion) values(viddistrito,vidoc,vprecio,1,now());

-- select viddistrito;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_editar_usuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_editar_usuario`(
	in vnombres varchar(40),
	in vapepaterno varchar(20),
	in vapematerno varchar(20),
	in vdni int,
	in vtelefono int,
	in vcorreo varchar(100),
	in vusuario varchar(20),
	in vcontra varchar(70),
	in vtipo_usuario int,
	in videstado int,
	in vidusuario int
)
BEGIN
	
	declare vidpersona int; 

	 update usuarios 
		set usuario=vusuario,password=vcontra,idestado=videstado,
			idtipo=vtipo_usuario,updated_at=now()
		where id=vidusuario;

	set vidpersona = (select idpersonas from usuarios where id=vidusuario limit 1);
	
	 update personas 
		set nombres=vnombres,apellido_paterno=vapepaterno,apellido_materno=vapematerno,
			dni=vdni,telefono=vtelefono,correo=vcorreo,updated_at=now()
		where idpersonas=vidpersona;
	

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
in vdistrito int,
in i int
)
BEGIN

	declare id,idcli,idcotiza int;


	if i=0 then
		
		select idclientes into id from clientes where ruc=vruc limit 1;
		/* Validacion para verificar si es un cliente nuevo o antiguo*/
		if isnull(id) then 
			
			insert into clientes(ruc,nombre_cliente,direccion_cliente,telefono_cliente,acreditacion,correo,created_at,updated_at) 
			value(vruc,vnombre,vdireccion,vtelefono,1,vcorreo,now(),now());
			/* id cliente nuevo */
			set idcli=(select idclientes from clientes order by idclientes desc limit 1);
		else
			update clientes set 
					nombre_cliente=vnombre,direccion_cliente=vdireccion,telefono_cliente=vtelefono,
					correo=vcorreo,updated_at=now()
			where ruc=vruc;
			set idcli=id;
		end if;
		/* Fin validacion de cliente */		
		
		/* Registro de cotizacion con el cliente */
		insert into cotizacion (contacto,tipo_pago,idclientes,precio,igv,preciototal,direccion_despacho,iddistrito,estado,created_at,updated_at) 
		values(vcontacto,vpago,idcli,vpreciobruto,vigv,vprecioneto,vdirdespacho,vdistrito,1,now(),now());
	end if;

	set idcotiza=(select idcotizacion from cotizacion order by idcotizacion desc limit 1);
	
	insert into detalle_cotizacion(idproducto,idcotizacion,cantidad,precio) 
	value(vidprod,idcotiza,vcantidad,vpreciot);
	

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_registrar_despacho` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_registrar_despacho`(in idoc int)
BEGIN

declare idcoti int;

update orden_compra set despacho = 2, fecha_despacho = now() where idorden_compra=idoc;
update ruta set estado = 2, fecha_salida = now() where idorden_compra=idoc;

select idcotizacion into idcoti from orden_compra where idorden_compra=idoc;

update cotizacion set estado=3 where idcotizacion=idcoti;


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

-- Dump completed on 2015-07-16 22:32:58
