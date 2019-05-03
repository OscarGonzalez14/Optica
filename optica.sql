-- MySQL dump 10.15  Distrib 10.0.30-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: avplushost
-- ------------------------------------------------------
-- Server version	10.0.30-MariaDB-0+deb8u1

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
-- Table structure for table `abonos`
--

DROP TABLE IF EXISTS `abonos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `abonos` (
  `id_abono` int(11) NOT NULL AUTO_INCREMENT,
  `monto_abono` varchar(10) DEFAULT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_credito` int(11) NOT NULL,
  PRIMARY KEY (`id_abono`),
  KEY `fk_abonos_pacientes_idx` (`id_paciente`),
  KEY `fk_abonos_usuarios_idx` (`id_usuario`),
  KEY `fk_abonos_creditos_idx` (`id_credito`),
  CONSTRAINT `fk_abonos_creditos` FOREIGN KEY (`id_credito`) REFERENCES `creditos` (`id_credito`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_abonos_pacientes` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_abonos_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `abonos`
--

LOCK TABLES `abonos` WRITE;
/*!40000 ALTER TABLE `abonos` DISABLE KEYS */;
/*!40000 ALTER TABLE `abonos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(100) NOT NULL,
  `estado` enum('0','1') NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_categoria`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `categoria_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (4,'Metrocentro','1',5),(5,'empresarial metrocentro','1',5);
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compras`
--

DROP TABLE IF EXISTS `compras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compras` (
  `id_compras` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_compra` date NOT NULL,
  `numero_compra` varchar(100) NOT NULL,
  `comprador` varchar(100) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_compras`),
  KEY `fk_compras_usuario_idx` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compras`
--

LOCK TABLES `compras` WRITE;
/*!40000 ALTER TABLE `compras` DISABLE KEYS */;
INSERT INTO `compras` VALUES (1,'2018-01-31','F000001','eyter',1),(2,'2018-02-06','F000002','eyter',1),(3,'2018-02-07','F000003','eyter',1),(4,'2018-02-07','F000004','eyter',1),(5,'2018-09-04','F000005','eyter',1),(6,'2018-09-05','F000006','eyter',1);
/*!40000 ALTER TABLE `compras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consulta`
--

DROP TABLE IF EXISTS `consulta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consulta` (
  `id_consulta` int(11) NOT NULL AUTO_INCREMENT,
  `motivo` text,
  `patologias` text,
  `id_paciente` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `fecha_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `oiesfreasl` varchar(10) DEFAULT NULL,
  `oicilindrosl` varchar(10) DEFAULT NULL,
  `oiejesl` varchar(10) DEFAULT NULL,
  `oiprismal` varchar(10) DEFAULT NULL,
  `oiadicionl` varchar(10) DEFAULT NULL,
  `odesferasl` varchar(10) DEFAULT NULL,
  `odcilndrosl` varchar(10) DEFAULT NULL,
  `odejesl` varchar(10) DEFAULT NULL,
  `odprismal` varchar(10) DEFAULT NULL,
  `odadicionl` varchar(10) DEFAULT NULL,
  `oiesferasa` varchar(10) DEFAULT NULL,
  `oicolindrosa` varchar(10) DEFAULT NULL,
  `oiejesa` varchar(10) DEFAULT NULL,
  `oiprismaa` varchar(10) DEFAULT NULL,
  `oiadiciona` varchar(10) DEFAULT NULL,
  `odesferasa` varchar(10) DEFAULT NULL,
  `odcilindrosa` varchar(10) DEFAULT NULL,
  `odejesa` varchar(10) DEFAULT NULL,
  `dprismaa` varchar(10) DEFAULT NULL,
  `oddiciona` varchar(10) DEFAULT NULL,
  `sugeridos` varchar(200) DEFAULT NULL,
  `diagnostico` text,
  `medicamento` varchar(100) DEFAULT NULL,
  `observaciones` text,
  `oiesferasf` varchar(10) DEFAULT NULL,
  `oicolindrosf` varchar(10) DEFAULT NULL,
  `oiejesf` varchar(10) DEFAULT NULL,
  `oiprismaf` varchar(10) DEFAULT NULL,
  `oiadicionf` varchar(10) DEFAULT NULL,
  `odesferasf` varchar(10) DEFAULT NULL,
  `odcilindrosf` varchar(10) DEFAULT NULL,
  `odejesf` varchar(10) DEFAULT NULL,
  `dprismaf` varchar(10) DEFAULT NULL,
  `oddicionf` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_consulta`),
  KEY `fk_consulta_pacientes1_idx` (`id_paciente`),
  KEY `fk_consulta_usuarios` (`id_usuario`),
  CONSTRAINT `fk_consulta_pacientes` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_consulta_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consulta`
--

LOCK TABLES `consulta` WRITE;
/*!40000 ALTER TABLE `consulta` DISABLE KEYS */;
INSERT INTO `consulta` VALUES (9,'','',11,5,'2019-04-10 21:37:31','','','','','','','','','','','','','','','','','','','','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(10,'Vision Borrosa','Nada',1,5,'2019-04-10 22:49:14','+1','','','','','+1','','','','','+1','','','','','+1','','','','','Vision Sencilla con AR','Hipermetropia','---','--',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(11,'Cefalea','----',1,5,'2019-04-10 22:51:56','+2','','','','','+2','','','','','+2','','','','','+2','','','','','----','---','===','----',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(12,'Ardor','nada',2,5,'2019-04-10 23:05:57','+3','','','','','+3','','','','','+3','','','','','+3','','','','','Lente Blanco','Miopia','--','---',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(13,'ardor','Ninguna',3,5,'2019-04-11 15:57:53','+4','','','','','+4','','','','','+4','','','','','+4','','','','','Lente Blanco','hipermetropia','Gotas','eeeee',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(14,'Hipermetropia','Ninguna',3,5,'2019-04-12 16:39:47','+67','+67','+67','+67','+67','+67','+67','+67','+67','+67','+67','+67','+67','+67','+67','+67','+67','+67','+67','+67','Lente rojo','ninguna','Gotas','ninguna','+67','+67','+67','+67','+67','+67','+67','+67','+67','+67'),(15,'nada','ninguna',5,5,'2019-04-13 17:37:55','+1','+1','+1','+1','+1','+1','+1','+1','+1','+1','+1','+1','+1','+1','+1','+1','+1','+1','+1','+1','Lente Blanco','Astigmatismo','Gotas','nada','+1','+1','+1','+1','+1','+1','+1','+1','+1','+1'),(16,'Hipermetropia','Astigmatismo',8,5,'2019-04-14 00:15:32','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','Lente Blanco','Hipermetropia','Gotas','ninguna','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25'),(17,'Hipermetropia','Vision borrosa',10,4,'2019-04-14 01:01:49','+3','+3','+3','+3','+3','+3','+3','+3','+3','+3','+3','+3','+3','+3','+3','+3','+3','+3','+3','+3','Lente blanco','Hipermetropia','Gotas','Ninguna','+3','+3','+3','+3','+3','+3','+3','+3','+3','+3'),(18,'Astigmatismo','Hipermetropia',13,5,'2019-04-15 03:49:56','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','Lente Blanco','nada','Gotas','-----','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25'),(19,'Vision borrosa','miopia',15,4,'2019-04-18 20:33:27','-1.00','','','','','-1.00','','','','','-1.00','','','','','-1.00','','','','','VS','miopia','ninguno','Para Lectura','-0.75','','','','','-0.75','','','',''),(20,'cefalea','miopia',15,4,'2019-04-18 20:40:03','-0.75','','','','','-0.75','','','','','-0.75','','','','','-0.75','','','','','VS AR','miopia','','Para ver de lejos','-0.75','','','','','-0.75','','','',''),(21,'Vision Borrosa','Miopia',16,5,'2019-04-25 22:33:25','-1.00','','','','','-1.00','','','','','-1.00','','','','','-1.00','','','','','Lente Vision sencilla Plicarbonato c-ar','Miopia','','','-1.00','','','','','-1.00','','','',''),(22,'Cefalea','Mipia',16,4,'2019-04-25 22:36:11','-1.00','-1.00','','','','-1.00','','','','','-1.00','','','','','-1.00','','','','','Lente Vision sencilla Plicarbonato c-ar','miopia','','','-1.00','','','','','-1.00','','','','');
/*!40000 ALTER TABLE `consulta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `creditos`
--

DROP TABLE IF EXISTS `creditos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `creditos` (
  `id_credito` int(11) NOT NULL AUTO_INCREMENT,
  `monto` varchar(45) NOT NULL,
  `plazo` varchar(45) DEFAULT NULL,
  `saldo` varchar(45) DEFAULT NULL,
  `numero_venta` varchar(100) DEFAULT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_credito`),
  KEY `fk_creditos_pacientes_idx` (`id_paciente`),
  KEY `fk_creditos_usuarios_idx` (`id_usuario`),
  KEY `fk_creditos_ventas_idx` (`id_usuario`),
  CONSTRAINT `fk_creditos_pacientes` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_creditos_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `creditos`
--

LOCK TABLES `creditos` WRITE;
/*!40000 ALTER TABLE `creditos` DISABLE KEYS */;
INSERT INTO `creditos` VALUES (10,'123',NULL,'123','V000004',16,5),(11,'234',NULL,'$ 226.32','V000005',16,5),(12,'$ 369',NULL,'$ 369','V000006',13,5),(13,'$ 369',NULL,'$ 369','V000007',14,5),(14,'$ 615',NULL,'$ 615','V000008',15,5),(15,'123',NULL,'123','V000009',16,5),(16,'361.62',NULL,'361.62','V000010',16,5),(17,'474.3',NULL,'474.3','V000011',14,5),(18,'248.00',NULL,'248.00','V000012',16,5),(19,'245.00',NULL,'245.00','V000013',15,5),(20,'198.00',NULL,'198.00','V000014',16,5),(21,'170',NULL,'170','V000015',16,5),(22,'123',NULL,'123','V000016',16,5),(23,'170',NULL,'170','V000017',16,5),(24,'293',NULL,'293','V000018',14,5),(25,'75.00',NULL,'75.00','V000019',16,5),(26,'123',NULL,'123','V000020',16,5),(27,'246',NULL,'246','V000021',16,5),(28,'243.54',NULL,'243.54','V000022',15,5),(29,'243.54',NULL,'243.54','V000023',15,5),(30,'295.00',NULL,'295.00','V000024',14,5),(31,'309.00',NULL,'309.00','V000025',14,5),(32,'198.00',NULL,'198.00','0000001',16,5),(33,'251.00',NULL,'251.00','0000002',16,5),(34,'123',NULL,'123','1',16,5),(35,'126.00',NULL,'126.00','0000001',14,5),(36,'201.00',NULL,'201.00','0000002',16,5),(37,'362.00',NULL,'362.00','0000003',16,5);
/*!40000 ALTER TABLE `creditos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_compras`
--

DROP TABLE IF EXISTS `detalle_compras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_compras` (
  `id_detalle_compras` int(11) NOT NULL AUTO_INCREMENT,
  `numero_compra` varchar(100) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `cantidad_compra` varchar(100) NOT NULL,
  `fecha_compra` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_usuario` int(11) NOT NULL,
  `sucursal` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_detalle_compras`),
  KEY `fk_detalle_compras_producto_idx` (`id_producto`),
  KEY `fk_detalle_compras_usuario_idx` (`id_usuario`),
  CONSTRAINT `fk_detalle_compras_producto` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_detalle_compras_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_compras`
--

LOCK TABLES `detalle_compras` WRITE;
/*!40000 ALTER TABLE `detalle_compras` DISABLE KEYS */;
INSERT INTO `detalle_compras` VALUES (25,'I000001',23,'MMJ 590','1','2019-04-05 01:54:54',4,'Metrocentro'),(26,'I00000002',23,'MMJ 590','2','2019-04-05 01:56:24',4,'empresarial metrocentro'),(27,'I00000003',24,'ENVISION','4','2019-04-05 01:57:54',4,'Metrocentro'),(28,'I00000004',24,'ENVISION','1','2019-04-05 01:58:40',4,'empresarial metrocentro'),(29,'I00000005',23,'MMJ 590','4','2019-04-06 15:41:00',5,'Metrocentro'),(30,'I00000005',24,'ENVISION','2','2019-04-06 15:41:00',5,'Metrocentro'),(31,'I00000006',23,'MMJ 590','1','2019-04-06 15:41:44',5,'Metrocentro'),(32,'I00000007',25,'MMJ 590','3','2019-04-20 04:17:23',5,'Metrocentro'),(33,'I00000008',23,'MMJ 590','7','2019-04-21 17:41:37',4,'Metrocentro'),(34,'I00000009',25,'MMJ 590','9','2019-04-21 17:41:55',4,'Metrocentro'),(35,'I00000010',24,'ENVISION','5','2019-04-23 05:07:04',4,'Metrocentro'),(36,'I00000011',23,'MMJ 590','50','2019-04-30 17:42:36',5,'Metrocentro'),(37,'I00000012',24,'ENVISION','20','2019-04-30 19:01:40',5,'Metrocentro'),(38,'I00000013',32,'MMJ 590','10','2019-05-03 03:38:44',5,'empresarial metrocentro');
/*!40000 ALTER TABLE `detalle_compras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_ventas`
--

DROP TABLE IF EXISTS `detalle_ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_ventas` (
  `id_detalle_ventas` int(11) NOT NULL AUTO_INCREMENT,
  `numero_venta` varchar(100) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `producto` varchar(100) NOT NULL,
  `precio_venta` varchar(100) NOT NULL,
  `cantidad_venta` varchar(100) NOT NULL,
  `descuento` varchar(100) NOT NULL,
  `importe` varchar(100) DEFAULT NULL,
  `fecha_venta` date NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  PRIMARY KEY (`id_detalle_ventas`),
  KEY `fk_detalle_ventas_producto_idx` (`id_producto`),
  KEY `fk_detalle_ventas_usuario_idx` (`id_usuario`),
  KEY `fk_detalle_ventas_clientes_idx` (`id_paciente`),
  CONSTRAINT `fk_detalle_ventas_pacientes` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_detalle_ventas_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_ventas`
--

LOCK TABLES `detalle_ventas` WRITE;
/*!40000 ALTER TABLE `detalle_ventas` DISABLE KEYS */;
INSERT INTO `detalle_ventas` VALUES (97,'1',23,'MMJ 590','123','1','0','123','2019-05-02',5,16),(98,'0000001',23,'MMJ 590','123','1','0','123','2019-05-02',5,14),(99,'0000001',31,'solucion','3','1','0','3','2019-05-02',5,14),(100,'0000002',23,'MMJ 590','123','1','0','123','2019-05-02',5,16),(101,'0000002',26,'Visión Sencilla Policarbonato','75.00','1','0','75','2019-05-02',5,16),(102,'0000002',31,'solucion','3','1','0','3','2019-05-02',5,16),(103,'0000003',32,'MMJ 590','234','1','0','234','2019-05-02',5,16),(104,'0000003',28,'transitions','125.00','1','0','125','2019-05-02',5,16),(105,'0000003',31,'solucion','3','1','0','3','2019-05-02',5,16);
/*!40000 ALTER TABLE `detalle_ventas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lentes`
--

DROP TABLE IF EXISTS `lentes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lentes` (
  `id_lente` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  `precio_venta` varchar(45) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_lente`),
  KEY `fk_table1_usuarios_idx` (`id_usuario`),
  CONSTRAINT `fk_table1_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lentes`
--

LOCK TABLES `lentes` WRITE;
/*!40000 ALTER TABLE `lentes` DISABLE KEYS */;
INSERT INTO `lentes` VALUES (1,'Lente1','127',5);
/*!40000 ALTER TABLE `lentes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pacientes`
--

DROP TABLE IF EXISTS `pacientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pacientes` (
  `id_paciente` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(100) DEFAULT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `telefono` varchar(100) DEFAULT NULL,
  `edad` varchar(100) DEFAULT NULL,
  `ocupacion` varchar(100) DEFAULT NULL,
  `empresa` varchar(100) DEFAULT NULL,
  `correo` varchar(200) DEFAULT NULL,
  `fecha_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_paciente`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `pacientes_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pacientes`
--

LOCK TABLES `pacientes` WRITE;
/*!40000 ALTER TABLE `pacientes` DISABLE KEYS */;
INSERT INTO `pacientes` VALUES (13,'PA000002','Oscar Antonio Gonzalez','79745345','23','Informatica','UTEC','rosa@gmail.com','2019-04-17 01:28:24',5),(14,'PA000003','Carlos Andres Choto Vasquez','73848959','33','Optometra','AVPlus','andres01@gmail.com','2019-04-17 01:35:31',5),(15,'PA000004','Miguel Flores','7888888','25','Optometra','AVPlus','miguel@gmail.com','2019-04-18 20:30:02',4),(16,'PA000005','Carolina Navarro ','889999999','30','Asesora visual','AVPlus','carolina@outlook.com','2019-04-25 22:28:41',5);
/*!40000 ALTER TABLE `pacientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permisos`
--

DROP TABLE IF EXISTS `permisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permisos` (
  `id_permiso` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id_permiso`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permisos`
--

LOCK TABLES `permisos` WRITE;
/*!40000 ALTER TABLE `permisos` DISABLE KEYS */;
INSERT INTO `permisos` VALUES (1,'Categoria'),(2,'Productos'),(3,'Proveedores'),(4,'Ingresos'),(5,'Pacientes'),(6,'Ventas'),(7,'Reporte de Compras'),(8,'Reporte de Ventas'),(9,'Usuarios'),(10,'Empresa');
/*!40000 ALTER TABLE `permisos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `modelo` varchar(100) DEFAULT NULL,
  `marca` varchar(200) DEFAULT NULL,
  `color` varchar(200) DEFAULT NULL,
  `precio_venta` varchar(45) NOT NULL,
  `stock` varchar(200) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `medidas` varchar(200) DEFAULT NULL,
  `categoria` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `fk_producto_usuario_idx` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (23,'MMJ 590','VERSACE','1SXxx','123','10',5,'5239',NULL),(24,'ENVISION','CONVERSE','C4','170.00','11',5,'53-18-135',NULL),(25,'MMJ 590','VERSACE','1SXxx','123','-1',5,'5240',NULL),(26,'Visión Sencilla Policarbonato',NULL,NULL,'75.00','-12',5,NULL,'lentes'),(27,'solucion de limpieza',NULL,NULL,'3','-2',5,NULL,'accesorios'),(28,'transitions',NULL,NULL,'125.00','-7',4,NULL,'lentes'),(29,'ar',NULL,NULL,'75.00','-3',4,NULL,'lentes'),(30,'','VERSACE','1SXxx','123','0',4,'5240','aros'),(31,'solucion',NULL,NULL,'3','-5',5,NULL,'accesorios'),(32,'MMJ 590','GUCCI','2SXxx','234','8',5,'5239','aros');
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario_permiso`
--

DROP TABLE IF EXISTS `usuario_permiso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario_permiso` (
  `id_usuario_permiso` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_permiso` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario_permiso`),
  KEY `fk_usuario_permiso_usuario_idx` (`id_usuario`),
  KEY `fk_usuario_permiso_permiso_idx` (`id_permiso`)
) ENGINE=InnoDB AUTO_INCREMENT=180 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_permiso`
--

LOCK TABLES `usuario_permiso` WRITE;
/*!40000 ALTER TABLE `usuario_permiso` DISABLE KEYS */;
INSERT INTO `usuario_permiso` VALUES (32,2,1),(33,2,2),(110,3,1),(111,3,2),(112,3,3),(113,3,4),(114,3,5),(115,3,6),(116,3,7),(117,3,8),(118,3,9),(119,3,10),(140,1,1),(141,1,2),(142,1,3),(143,1,4),(144,1,5),(145,1,6),(146,1,7),(147,1,8),(148,1,9),(149,1,10),(160,4,1),(161,4,2),(162,4,3),(163,4,4),(164,4,5),(165,4,6),(166,4,7),(167,4,8),(168,4,9),(169,4,10),(170,5,1),(171,5,2),(172,5,3),(173,5,4),(174,5,5),(175,5,6),(176,5,7),(177,5,8),(178,5,9),(179,5,10);
/*!40000 ALTER TABLE `usuario_permiso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `cedula` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `cargo` enum('0','1') NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `password2` varchar(100) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `estado` enum('0','1') NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (4,'038109-4','Carlos Andres Choto','OP002','7888888','andres01@gmail.com','SS','1','andres ','12345','12345','2019-03-28','1'),(5,'454324','Oscar Antonio Gonzalez','ADMIN001','7912384','oscar@gmail.com','Caserio La Vuelta','0','oscar','12345','12345','2019-03-31','1'),(6,'Miguel','Miguel','00000000000','78888','miguel@gmail.com','SS','1','mflores','54321','54321','2019-04-02','1');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas`
--

DROP TABLE IF EXISTS `ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ventas` (
  `id_ventas` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_venta` date NOT NULL,
  `numero_venta` varchar(100) NOT NULL,
  `paciente` varchar(100) NOT NULL,
  `vendedor` varchar(100) NOT NULL,
  `subtotal` varchar(100) DEFAULT NULL,
  `tipo_pago` varchar(100) NOT NULL,
  `tipo_venta` varchar(100) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `sucursal` varchar(100) NOT NULL,
  PRIMARY KEY (`id_ventas`),
  KEY `fk_ventas_usuarios_idx` (`id_usuario`),
  KEY `fk_ventas_pacientes_idx` (`id_paciente`),
  CONSTRAINT `fk_ventas_pacientes` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ventas_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas`
--

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
INSERT INTO `ventas` VALUES (64,'2019-05-02','V000018','Carlos Andres Choto Vasquez','oscar','293','Empresarial','Crédito',5,14,'Metrocentro'),(65,'2019-05-02','V000019','Carolina Navarro ','oscar','75.00','Cargo Automático','Crédito',5,16,'Metrocentro'),(66,'2019-05-02','V000020','Carolina Navarro ','oscar','123','Empresarial','Crédito',5,16,'Metrocentro'),(67,'2019-05-02','V000021','Carolina Navarro ','oscar','246','Empresarial','Crédito',5,16,'Metrocentro'),(68,'2019-05-02','V000022','Miguel Flores','oscar','243.54','Empresarial','Crédito',5,15,'Metrocentro'),(69,'2019-05-02','V000023','Miguel Flores','oscar','243.54','Efectivo','Contado-Metrocentro',5,15,'Metrocentro'),(70,'2019-05-02','V000024','Carlos Andres Choto Vasquez','oscar','295.00','Empresarial','Crédito',5,14,'Metrocentro'),(71,'2019-05-02','V000025','Carlos Andres Choto Vasquez','oscar','309.00','Empresarial','Crédito',5,14,'Metrocentro'),(72,'2019-05-02','0000001','Carolina Navarro ','oscar','198.00','Empresarial','Crédito',5,16,'Metrocentro'),(73,'2019-05-02','0000002','Carolina Navarro ','oscar','251.00','Empresarial','Crédito',5,16,'Metrocentro'),(74,'2019-05-02','1','Carolina Navarro ','oscar','123','Empresarial','Crédito',5,16,'Metrocentro'),(75,'2019-05-02','0000001','Carlos Andres Choto Vasquez','oscar','126.00','Empresarial','Crédito',5,14,'Metrocentro'),(76,'2019-05-02','0000002','Carolina Navarro ','oscar','201.00','Efectivo','Contado-Metrocentro',5,16,'Metrocentro'),(77,'2019-05-02','0000003','Carolina Navarro ','oscar','362.00','Empresarial','Crédito',5,16,'Metrocentro');
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-02 22:55:08
