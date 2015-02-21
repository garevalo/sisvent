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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idclientes`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (0000000015,10458457684,'cliente de prueba','los olivos ',172834938,'2015-02-19 04:03:14','2015-02-19 04:03:14'),(0000000016,123456765245,'cvcvcvbv','vbvbvbv',43434343,'2015-02-21 14:15:18','2015-02-21 14:15:18');
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
  PRIMARY KEY (`idcotizacion`),
  KEY `fk_cotizacion_clientes1_idx` (`idclientes`),
  CONSTRAINT `fk_cotizacion_clientes1` FOREIGN KEY (`idclientes`) REFERENCES `clientes` (`idclientes`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cotizacion`
--

LOCK TABLES `cotizacion` WRITE;
/*!40000 ALTER TABLE `cotizacion` DISABLE KEYS */;
INSERT INTO `cotizacion` VALUES (00000000015,'contacto de peuva',1,'2015-02-19 04:03:14','2015-02-19 04:03:14',0000000015,362.80,18.00,428.10),(00000000016,'vbvbvbv',1,'2015-02-21 14:15:18','2015-02-21 14:15:18',0000000016,426.40,18.00,503.15);
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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_cotizacion`
--

LOCK TABLES `detalle_cotizacion` WRITE;
/*!40000 ALTER TABLE `detalle_cotizacion` DISABLE KEYS */;
INSERT INTO `detalle_cotizacion` VALUES (19,NULL,NULL,NULL,1,00000000015,1,299.20),(20,NULL,NULL,NULL,2,00000000015,1,63.60),(21,NULL,NULL,NULL,1,00000000016,1,299.20),(22,NULL,NULL,NULL,2,00000000016,2,127.20);
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personas`
--

LOCK TABLES `personas` WRITE;
/*!40000 ALTER TABLE `personas` DISABLE KEYS */;
INSERT INTO `personas` VALUES (14,'catherine','reyes','asas',NULL,0,0,'adsdasd','2015-02-15 23:16:47',NULL),(15,'giordan','arevalo','asas',NULL,12345678,0,'gbap0506@hotmail.com','2015-02-15 23:18:42',NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,'AQUABROM PLUS','AQUABROM PLUS\r PLUS\r  \r ','aquabrom_plus',299.20,NULL,1,'2015-02-16 02:03:37','2015-02-16 02:03:37'),(2,'CBD-92','63.60\r\n63.60\r\n63.60\r\n63.60\r\n','cbd-92',63.60,NULL,1,'2015-02-16 02:06:27','2015-02-16 02:06:27'),(3,'CBD-93','CBD-93 CBD-93 CBD-93','cbd-93',63.60,NULL,5,'2015-02-16 02:07:09','2015-02-16 02:07:09'),(4,'PREMALUBE RED','PREMALUBE RE PREMALUBE RED','premalube_red',83.90,NULL,3,'2015-02-16 02:07:41','2015-02-16 02:07:41'),(5,'AEROLEX','AEROLEX AEROLEX AEROLEX','aerolex',69.96,NULL,4,'2015-02-16 02:09:22','2015-02-16 02:09:22'),(6,'FLASH','FLASH FLASH\r\n\r\n','flash',40.23,NULL,4,'2015-02-16 02:10:40','2015-02-16 02:10:40'),(7,'CHEMAQUA 100','CHEMAQUA 100','chemaqua_100',38.70,NULL,5,'2015-02-16 02:11:16','2015-02-16 02:11:16'),(8,'CHEMAQUA 777','CHEMAQUA 777\r\n','chemaqua_777',30.90,NULL,5,'2015-02-16 02:11:39','2015-02-16 02:11:39'),(9,'ELECTRA 221','ELECTRA 221 ELECTRA 221\r\n\r\n','electra_221',109.80,NULL,2,'2015-02-16 02:12:13','2015-02-16 02:12:13'),(10,'ENFORCE','ENFORCE ENFORCE\r\n\r\n','enforce',36.90,NULL,3,'2015-02-16 02:12:41','2015-02-16 02:12:41'),(11,'EVERBRITE GERM.','EVERBRITE GERM. EVERBRITE GERM.\r\n\r\n','everbrite_germ.',47.13,NULL,3,'2015-02-16 02:13:07','2015-02-16 02:13:07');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (2,'admin','$2y$10$6s7qYdutdbfaCg0HAigSc.0bBtBRttO30d34HtckO1U4T6XRTWr3S',1,'2015-02-15 23:16:47','2015-02-21 14:09:08',1,14,'gYBaI3EWzjnRHySGuG3toIEkpPy8sRvjzetwGXEDfzyHjfaDNFaHsVXElxZL'),(3,'giordan','$2y$10$uCzOkTpBh6RFFCV8XL5oF.zAz/56k0njZRijFmaP5FfD9bee4RzZK',1,'2015-02-15 23:18:42',NULL,1,15,NULL);
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
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_registrar_cotizacion`(
in vidprod int,
in vruc bigint,
in vnombre varchar(40),
in vcontacto varchar(40),
in vdireccion varchar(60),
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
		insert into clientes(ruc,nombre_cliente,direccion_cliente,telefono_cliente,created_at,updated_at) 
		value(vruc,vnombre,vdireccion,vtelefono,now(),now());

		set id=(select idclientes from clientes order by idclientes desc limit 1);
		
		insert into cotizacion (contacto,tipo_pago,idclientes,precio,igv,preciototal,created_at,updated_at) 
		values(vcontacto,vpago,id,vpreciobruto,vigv,vprecioneto,now(),now());
	end if;

	set id=(select idcotizacion from cotizacion order by idcotizacion desc limit 1);
	
	insert into detalle_cotizacion(idproducto,idcotizacion,cantidad,precio) 
	value(vidprod,id,vcantidad,vpreciot);
	
	-- Calcular el precio total de la orden de compra
	/*if i=u then
		update orden_compra set total=(select sum(cant*precio) as total from orden_materia 
		where idorden_compra=id)
		where idorden_compra=id;
	end if;	

	-- Actualizar cantidad de articulos
	set artcant = (select ifnull(cantidad,0) from materia_prima where idmateria_prima=vidmateria_prima) ;
	set ncant=(artcant+vcantidad);
	 
    update materia_prima set cantidad=ncant where idmateria_prima=vidmateria_prima;
*/
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

-- Dump completed on 2015-02-21 10:50:25
