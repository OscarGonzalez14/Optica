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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consulta`
--

LOCK TABLES `consulta` WRITE;
/*!40000 ALTER TABLE `consulta` DISABLE KEYS */;
INSERT INTO `consulta` VALUES (9,'','',11,5,'2019-04-10 21:37:31','','','','','','','','','','','','','','','','','','','','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(10,'Vision Borrosa','Nada',1,5,'2019-04-10 22:49:14','+1','','','','','+1','','','','','+1','','','','','+1','','','','','Vision Sencilla con AR','Hipermetropia','---','--',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(11,'Cefalea','----',1,5,'2019-04-10 22:51:56','+2','','','','','+2','','','','','+2','','','','','+2','','','','','----','---','===','----',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(12,'Ardor','nada',2,5,'2019-04-10 23:05:57','+3','','','','','+3','','','','','+3','','','','','+3','','','','','Lente Blanco','Miopia','--','---',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(13,'ardor','Ninguna',3,5,'2019-04-11 15:57:53','+4','','','','','+4','','','','','+4','','','','','+4','','','','','Lente Blanco','hipermetropia','Gotas','eeeee',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(14,'Hipermetropia','Ninguna',3,5,'2019-04-12 16:39:47','+67','+67','+67','+67','+67','+67','+67','+67','+67','+67','+67','+67','+67','+67','+67','+67','+67','+67','+67','+67','Lente rojo','ninguna','Gotas','ninguna','+67','+67','+67','+67','+67','+67','+67','+67','+67','+67'),(15,'nada','ninguna',5,5,'2019-04-13 17:37:55','+1','+1','+1','+1','+1','+1','+1','+1','+1','+1','+1','+1','+1','+1','+1','+1','+1','+1','+1','+1','Lente Blanco','Astigmatismo','Gotas','nada','+1','+1','+1','+1','+1','+1','+1','+1','+1','+1'),(16,'Hipermetropia','Astigmatismo',8,5,'2019-04-14 00:15:32','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','Lente Blanco','Hipermetropia','Gotas','ninguna','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25'),(17,'Hipermetropia','Vision borrosa',10,4,'2019-04-14 01:01:49','+3','+3','+3','+3','+3','+3','+3','+3','+3','+3','+3','+3','+3','+3','+3','+3','+3','+3','+3','+3','Lente blanco','Hipermetropia','Gotas','Ninguna','+3','+3','+3','+3','+3','+3','+3','+3','+3','+3'),(18,'Astigmatismo','Hipermetropia',13,5,'2019-04-15 03:49:56','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','Lente Blanco','nada','Gotas','-----','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25','+0.25'),(19,'Vision borrosa','miopia',15,4,'2019-04-18 20:33:27','-1.00','','','','','-1.00','','','','','-1.00','','','','','-1.00','','','','','VS','miopia','ninguno','Para Lectura','-0.75','','','','','-0.75','','','',''),(20,'cefalea','miopia',15,4,'2019-04-18 20:40:03','-0.75','','','','','-0.75','','','','','-0.75','','','','','-0.75','','','','','VS AR','miopia','','Para ver de lejos','-0.75','','','','','-0.75','','','','');
/*!40000 ALTER TABLE `consulta` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_compras`
--

LOCK TABLES `detalle_compras` WRITE;
/*!40000 ALTER TABLE `detalle_compras` DISABLE KEYS */;
INSERT INTO `detalle_compras` VALUES (25,'I000001',23,'MMJ 590','1','2019-04-05 01:54:54',4,'Metrocentro'),(26,'I00000002',23,'MMJ 590','2','2019-04-05 01:56:24',4,'empresarial metrocentro'),(27,'I00000003',24,'ENVISION','4','2019-04-05 01:57:54',4,'Metrocentro'),(28,'I00000004',24,'ENVISION','1','2019-04-05 01:58:40',4,'empresarial metrocentro'),(29,'I00000005',23,'MMJ 590','4','2019-04-06 15:41:00',5,'Metrocentro'),(30,'I00000005',24,'ENVISION','2','2019-04-06 15:41:00',5,'Metrocentro'),(31,'I00000006',23,'MMJ 590','1','2019-04-06 15:41:44',5,'Metrocentro'),(32,'I00000007',25,'MMJ 590','3','2019-04-20 04:17:23',5,'Metrocentro'),(33,'I00000008',23,'MMJ 590','7','2019-04-21 17:41:37',4,'Metrocentro'),(34,'I00000009',25,'MMJ 590','9','2019-04-21 17:41:55',4,'Metrocentro'),(35,'I00000010',24,'ENVISION','5','2019-04-23 05:07:04',4,'Metrocentro');
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_ventas`
--

LOCK TABLES `detalle_ventas` WRITE;
/*!40000 ALTER TABLE `detalle_ventas` DISABLE KEYS */;
INSERT INTO `detalle_ventas` VALUES (1,'V000001',23,'MMJ 590','123','1','2','120.54','2019-04-22',5,15),(2,'V000002',23,'MMJ 590','123','4','8','452.64','2019-04-22',5,15),(3,'V000003',23,'MMJ 590','123','1','3','119.31','2019-04-22',5,13),(4,'V000004',23,'MMJ 590','123','1','0','123','2019-04-22',5,14),(5,'V000005',24,'ENVISION','170.00','1','5','161.5','2019-04-22',4,15),(6,'V000006',25,'MMJ 590','123','1','1','121.77','2019-04-22',4,15),(7,'V000006',24,'ENVISION','170.00','1','0','170','2019-04-22',4,15);
/*!40000 ALTER TABLE `detalle_ventas` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pacientes`
--

LOCK TABLES `pacientes` WRITE;
/*!40000 ALTER TABLE `pacientes` DISABLE KEYS */;
INSERT INTO `pacientes` VALUES (13,'PA000002','Oscar Antonio Gonzalez','79745345','23','Informatica','UTEC','rosa@gmail.com','2019-04-17 01:28:24',5),(14,'PA000003','Carlos Andres Choto Vasquez','73848959','33','Optometra','AVPlus','andres01@gmail.com','2019-04-17 01:35:31',5),(15,'PA000004','Miguel Flores','7888888','25','Optometra','AVPlus','miguel@gmail.com','2019-04-18 20:30:02',4);
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
  `modelo` varchar(100) NOT NULL,
  `marca` varchar(45) NOT NULL,
  `color` varchar(45) NOT NULL,
  `precio_venta` varchar(45) NOT NULL,
  `stock` varchar(45) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `medidas` varchar(45) NOT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `fk_producto_usuario_idx` (`id_usuario`),
  CONSTRAINT `fk_producto_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (23,'MMJ 590','VERSACE','1SXxx','123','-6',5,'5239'),(24,'ENVISION','CONVERSE','C4','170.00','3',4,'53-18-135'),(25,'MMJ 590','VERSACE','1SXxx','123','2',4,'5240');
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
INSERT INTO `usuarios` VALUES (4,'038109-4','Carlos Andres Choto','OP002','7888888','andres01@gmail.com','SS','1','andres ','12345','12345','2019-03-28','1'),(5,'454324','Oscar Antonio Gonzalez','V001','7912384','oscar@gmail.com','Caserio La Vuelta','0','oscar','12345','12345','2019-03-31','1'),(6,'Miguel','Miguel','00000000000','78888','miguel@gmail.com','SS','1','mflores','54321','54321','2019-04-02','1');
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas`
--

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
INSERT INTO `ventas` VALUES (6,'2019-04-22','V000002','Miguel Flores','','$ 452.64','Efectivo','Contado',5,15,'empresarial metrocentro'),(7,'2019-04-22','V000003','Oscar Antonio Gonzalez','','$ 119.31','Descuento en Planilla','Credito',5,13,'Metrocentro'),(8,'2019-04-22','V000004','Carlos Andres Choto Vasquez','oscar','123','Descuento en Planilla','Contado',5,14,'Metrocentro'),(9,'2019-04-22','V000005','Miguel Flores','andres ','$ 161.5','Efectivo','Credito',4,15,'empresarial metrocentro'),(10,'2019-04-22','V000006','Miguel Flores','andres ','$ 291.77','Efectivo','Credito',4,15,'Metrocentro');
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

-- Dump completed on 2019-04-23 15:07:07
