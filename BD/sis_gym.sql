-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: sis_gym
-- ------------------------------------------------------
-- Server version	8.3.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `abono`
--

DROP TABLE IF EXISTS `abono`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `abono` (
  `id_abono` int NOT NULL AUTO_INCREMENT,
  `monto` decimal(10,2) DEFAULT NULL,
  `cliente` bigint DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `recepcionista` varchar(255) DEFAULT NULL,
  `derecho_pago` varchar(255) DEFAULT '',
  PRIMARY KEY (`id_abono`),
  KEY `abono_clienteFK` (`cliente`),
  CONSTRAINT `abono_clienteFK` FOREIGN KEY (`cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `abono`
--

LOCK TABLES `abono` WRITE;
/*!40000 ALTER TABLE `abono` DISABLE KEYS */;
INSERT INTO `abono` VALUES (8,225.00,13,'2023-06-13 15:06:11','Isai Ismael Sandoval Ccaccro','Matricula'),(11,100.00,12,'2023-10-16 23:15:53','Isai Ismael Sandoval Ccaccro','Matricula'),(12,150.00,12,'2023-10-16 23:16:40','Isai Ismael Sandoval Ccaccro','Matricula'),(15,50.00,29,'2023-10-17 22:57:48','Isai Ismael Sandoval Ccaccro','Matricula'),(16,75.00,29,'2023-10-17 22:59:56','Isai Ismael Sandoval Ccaccro','Matricula'),(17,100.00,30,'2023-10-18 09:12:13','Isai Ismael Sandoval Ccaccro','Matricula'),(18,25.00,30,'2023-10-18 09:13:28','Isai Ismael Sandoval Ccaccro','Matricula');
/*!40000 ALTER TABLE `abono` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asistencia`
--

DROP TABLE IF EXISTS `asistencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `asistencia` (
  `id_asistencia` bigint NOT NULL AUTO_INCREMENT,
  `id_cliente` bigint NOT NULL,
  `fecha_hora` datetime DEFAULT NULL,
  `marcado_por` varchar(255) DEFAULT '',
  PRIMARY KEY (`id_asistencia`),
  KEY `fk2` (`id_cliente`),
  CONSTRAINT `fk3` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asistencia`
--

LOCK TABLES `asistencia` WRITE;
/*!40000 ALTER TABLE `asistencia` DISABLE KEYS */;
INSERT INTO `asistencia` VALUES (44,12,'2023-02-18 00:50:21','mari'),(54,13,'2023-02-18 15:09:20','juana quispe quispe'),(61,12,'2023-02-20 10:32:24','mari'),(62,12,'2023-02-22 21:29:35','Isai Ismael Sandoval Ccaccro'),(63,13,'2023-02-22 21:36:40','Isai Ismael Sandoval Ccaccro'),(67,12,'2023-04-12 17:11:47','Isai Ismael Sandoval Ccaccro'),(69,12,'2023-10-16 23:17:27','mari'),(74,30,'2023-10-18 09:19:08','jhon perez guzman');
/*!40000 ALTER TABLE `asistencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cliente` (
  `id_cliente` bigint NOT NULL AUTO_INCREMENT,
  `id_membresia` bigint DEFAULT NULL,
  `tipo_usuario` varchar(255) DEFAULT NULL,
  `creado_por` varchar(255) DEFAULT '',
  `usuario` varchar(255) DEFAULT '',
  `password` varchar(255) DEFAULT '',
  `dni` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `desde` datetime DEFAULT NULL,
  `hasta` datetime DEFAULT NULL,
  `DT` int DEFAULT NULL,
  `DA` int DEFAULT NULL,
  `DR` int DEFAULT NULL,
  `foto` varchar(255) DEFAULT '',
  `pago` varchar(255) DEFAULT NULL,
  `debe` varchar(255) DEFAULT NULL,
  `codigo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`),
  KEY `fk5` (`id_membresia`),
  CONSTRAINT `fk5` FOREIGN KEY (`id_membresia`) REFERENCES `membresia` (`id_membresia`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,NULL,'administrador','','isai','202cb962ac59075b964b07152d234b70','74433542','Isai Ismael Sandoval Ccaccro','mari@gmail.com','925310896','av. ejercito',NULL,NULL,NULL,NULL,NULL,'usuario-1.jpg',NULL,NULL,NULL),(2,NULL,'vendedor','','juan','202cb962ac59075b964b07152d234b70','74433548','Juan Manuel Chavez','juan@gmail.com','987456321','jr. sucre',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(12,1,'cliente','Isai Ismael Sandoval Ccaccro','mari','202cb962ac59075b964b07152d234b70','11111111','mari','mari2@gmail.com','987456333','ayacucho','2023-02-17 00:00:00','2023-11-16 00:00:00',27,1,26,NULL,NULL,'0',NULL),(13,2,'cliente','Isai Ismael Sandoval Ccaccro','juana','202cb962ac59075b964b07152d234b70','78945633','juana quispe quispe','juana@gmail.com','987456321','ayacucho','2023-02-18 00:00:00','2023-07-19 00:00:00',0,0,0,NULL,NULL,'100',NULL),(17,NULL,'administrador','','prueba1','3f1b7ccad63d40a7b4c27dda225bf941','789','prueba1','prueba1@gmail.com','prueba1','prueba1',NULL,NULL,NULL,NULL,NULL,'usuario-17.jpg',NULL,NULL,NULL),(18,NULL,'administrador','','prueba2','96080775c113b0e5c3e32bdd26214aec','123','prueba2','marlenyvv@gmail.com','prueba2','prueba2',NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL),(19,NULL,'administrador','','isai2','202cb962ac59075b964b07152d234b70','555','isai','iassss@gmail.com','925310896','ayacucho',NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL),(20,NULL,'administrador','','isai3','e034fb6b66aacc1d48f445ddfb08da98','6666','isai','ias3@gmail.com','925310896','ayacucho',NULL,NULL,NULL,NULL,NULL,'usuario-20.jpg',NULL,NULL,NULL),(21,NULL,'vendedor','','isai4','202cb962ac59075b964b07152d234b70','787744634','isai','isai.ismael1999@gmail.com','925310896','ayacucho',NULL,NULL,NULL,NULL,NULL,'usuario-21.png',NULL,NULL,''),(23,5,'cliente','Isai Ismael Sandoval Ccaccro','juanka','202cb962ac59075b964b07152d234b70','111','juanka','juanka@gmail.com','123','ssss','2023-04-15 00:00:00','2023-10-15 00:00:00',0,0,0,'',NULL,'600',NULL),(29,1,'cliente','Isai Ismael Sandoval Ccaccro','admin','202cb962ac59075b964b07152d234b70','11112222','admin perez perez','admin@gmail.com','123456789','av ejercito','2023-10-17 00:00:00','2023-11-17 00:00:00',28,0,28,'usuario-29.jpg',NULL,'125',NULL),(30,1,'cliente','Isai Ismael Sandoval Ccaccro','user','202cb962ac59075b964b07152d234b70','12345678','jhon perez guzman','jhon@gmail.com','987456321','av ejercito','2023-10-18 00:00:00','2023-11-18 00:00:00',28,1,27,'usuario-30.jpg',NULL,'0',NULL);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresa`
--

DROP TABLE IF EXISTS `empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `empresa` (
  `id_empresa` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ubicacion` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `telefono` varchar(20) COLLATE utf8mb4_general_ci DEFAULT '',
  `correo` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_general_ci DEFAULT '',
  PRIMARY KEY (`id_empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa`
--

LOCK TABLES `empresa` WRITE;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` VALUES (1,'GyM PERÚ','Jr. Grau santa rosa','925310896','gym@gmail.com','logo.jpg');
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `membresia`
--

DROP TABLE IF EXISTS `membresia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `membresia` (
  `id_membresia` bigint NOT NULL AUTO_INCREMENT,
  `categoria` varchar(255) DEFAULT '',
  `nombre` varchar(255) DEFAULT NULL,
  `meses` varchar(255) DEFAULT NULL,
  `modo` varchar(255) DEFAULT NULL,
  `precio` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_membresia`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `membresia`
--

LOCK TABLES `membresia` WRITE;
/*!40000 ALTER TABLE `membresia` DISABLE KEYS */;
INSERT INTO `membresia` VALUES (1,'Maquinas','1 MES DIARIO','1','diario','125'),(2,'Maquinas','1 MES INTERDIARIO','1','interdiario','100'),(3,'Maquinas','3 MESES DIARIO','3','diario','270'),(4,'Maquinas','3 MESES INTERDIARIO','3','interdiario','255'),(5,'Maquinas','6 MESES DIARIO','6','diario','600'),(6,'Maquinas','12 MESES DIARIO','12','diario','800'),(7,'Maquinas Aeróbicos','1 MES DIARIO','1','diario','150'),(8,'Maquinas Aeróbicos','1 MES INTERDIARIO','1','interdiario','130'),(10,'prueba','prueba','10','diario','125');
/*!40000 ALTER TABLE `membresia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pago`
--

DROP TABLE IF EXISTS `pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pago` (
  `id_pago` bigint NOT NULL AUTO_INCREMENT,
  `id_cliente` bigint DEFAULT NULL,
  `registrado_por` varchar(255) DEFAULT '',
  `costo_total` varchar(255) DEFAULT NULL,
  `paga_con` varchar(255) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id_pago`),
  KEY `fk1` (`id_cliente`),
  KEY `fk2` (`registrado_por`),
  CONSTRAINT `fk1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pago`
--

LOCK TABLES `pago` WRITE;
/*!40000 ALTER TABLE `pago` DISABLE KEYS */;
INSERT INTO `pago` VALUES (6,12,'Isai Ismael Sandoval Ccaccro','125','50',NULL),(7,12,'Isai Ismael Sandoval Ccaccro','75','75',NULL),(8,13,'Isai Ismael Sandoval Ccaccro','495','495',NULL),(9,13,'Isai Ismael Sandoval Ccaccro','100','100',NULL),(10,12,'Isai Ismael Sandoval Ccaccro','200','0',NULL),(11,12,'Isai Ismael Sandoval Ccaccro','200','0',NULL),(12,12,'Isai Ismael Sandoval Ccaccro','200','150',NULL),(13,12,'Isai Ismael Sandoval Ccaccro','50','50',NULL),(14,23,'Juan Manuel Chavez','600','0',NULL),(15,23,'Juan Manuel Chavez','600','0',NULL),(16,13,'Isai Ismael Sandoval Ccaccro','225','225',NULL),(19,12,'Isai Ismael Sandoval Ccaccro','250','100',NULL),(20,12,'Isai Ismael Sandoval Ccaccro','150','150',NULL),(22,29,'Isai Ismael Sandoval Ccaccro','75','75',NULL),(23,30,'Isai Ismael Sandoval Ccaccro','25','25',NULL);
/*!40000 ALTER TABLE `pago` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-12 10:23:33
