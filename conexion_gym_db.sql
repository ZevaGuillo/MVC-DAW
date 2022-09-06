-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: conexion_gym_db
-- ------------------------------------------------------
-- Server version	8.0.27

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
-- Table structure for table `articulo`
--

DROP TABLE IF EXISTS `articulo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `articulo` (
  `id` int NOT NULL,
  `art_nombre` varchar(25) DEFAULT NULL,
  `nombre` varchar(25) DEFAULT NULL,
  `apellido` varchar(25) DEFAULT NULL,
  `cedula` int DEFAULT NULL,
  `correo` varchar(25) DEFAULT NULL,
  `direccion` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articulo`
--

LOCK TABLES `articulo` WRITE;
/*!40000 ALTER TABLE `articulo` DISABLE KEYS */;
INSERT INTO `articulo` VALUES (2,'mancuerna','Fernando','FDFFFSDF',955188941,'nandocse','dsdsddsdsds'),(3,'pesarusa','Fernando','FDFFFSDF',0,'asasaasasa','dsdsddsdsds'),(4,'mancuerna','FSSFSDFS','Marcillo',955188941,'nandocse','dsdsddsdsds'),(5,'mancuerna','FSSFSDFS','Marcillo',955188941,'nandocse','dsdsddsdsds'),(7,'pesarusa','Fernando','Marcillo',909676751,'nandocse','GALLEGOS LARA'),(8,'cuerda','Fernando','Marcillo',0,'asasaasasa','GALLEGOS LARA'),(9,'mancuerna','Fernando','Marcillo',955188941,'nandocse','GALLEGOS LARA'),(10,'mancuerna','Fernando','Marcillo',955188941,'nandocse','GALLEGOS LARA'),(11,'mancuerna','Fernando','Marcillo',0,'asasaasasa','dsdsddsdsds'),(12,'mancuerna','Fernando','Marcillo',955188941,'asasaasasa','dsdsddsdsds'),(13,'mancuerna','Fernando','Marcillo',955188941,'asasaasasa','dsdsddsdsds'),(14,'mancuerna','Fernando','Marcillo',0,'nandocse','GALLEGOS LARA'),(15,'mancuerna','FSSFSDFS','Marcillo',955188941,'nandocse','dsdsddsdsds'),(16,'mancuerna','Fernando','Marcillo',955188941,'asasaasasa','dsdsddsdsds'),(17,'mancuerna','Fernando','FDFFFSDF',955188941,'asasaasasa','dsdsddsdsds'),(18,'mancuerna','FSSFSDFS','Marcillo',955188941,'asasaasasa','GALLEGOS LARA'),(19,'mancuerna','FSSFSDFS','Marcillo',0,'nandocse','dsdsddsdsds'),(20,'mancuerna','FSSFSDFS','Marcillo',955188941,'nandocse','dsdsddsdsds'),(21,'mancuerna','FSSFSDFS','Marcillo',955188941,'nandocse','dsdsddsdsds'),(22,'mancuerna','reteterteter','trtertertrtr',0,'rtrtertretret','tertetrtertret'),(0,'mancuerna','PACMAN','asdf',2134,'sf','sdf');
/*!40000 ALTER TABLE `articulo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cliente` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `telefono` int NOT NULL,
  `email` varchar(250) NOT NULL,
  `asunto` varchar(100) NOT NULL,
  `mensaje` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'guillermo',9444,'guillo@gmail.com','Prueba ','quiero probar esto'),(3,'David ',434543,'guielrmo@g.com','Comer','Comer rikco');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nosotros`
--

DROP TABLE IF EXISTS `nosotros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nosotros` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `pagoMensual` int NOT NULL,
  `fecha` date NOT NULL,
  `objetivos` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10000 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nosotros`
--

LOCK TABLES `nosotros` WRITE;
/*!40000 ALTER TABLE `nosotros` DISABLE KEYS */;
INSERT INTO `nosotros` VALUES (1,'Natanael','johanan.munozs@ug.edu.ec',60,'2022-12-30','Tonificaci&oacute;n'),(9999,'Natanael','johanan.munozs@ug.edu.ec',60,'2022-12-30','Tonificaci&oacute;n');
/*!40000 ALTER TABLE `nosotros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `producto` (
  `prd_id` int NOT NULL AUTO_INCREMENT,
  `prd_nombre` varchar(45) DEFAULT NULL,
  `prd_valor` float DEFAULT NULL,
  `prd_cantidad` int DEFAULT NULL,
  `prd_estado` varchar(3) DEFAULT NULL,
  `prd_codigo_proveedor_producto` int DEFAULT NULL,
  `prd_fecha_actualizacion` date DEFAULT NULL,
  PRIMARY KEY (`prd_id`),
  KEY `prv_id_idx` (`prd_codigo_proveedor_producto`),
  CONSTRAINT `prv_id` FOREIGN KEY (`prd_codigo_proveedor_producto`) REFERENCES `proveedores` (`prv_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (2,'Joe',104,11,'11',200,'2022-09-06'),(5,'gym',200,6,'6',200,'2022-09-06'),(6,'Xiaomi Redmi Note 10 Pro',200,122,'122',200,'2022-09-06'),(7,'Xiaomi Redmi Note 10 Pro',200,122,'122',200,'2022-09-06'),(8,'Xiaomi Redmi Note 10 Pro',200,122,'122',200,'2022-09-06'),(9,'sadas',1,123,'123',100,'2022-09-06'),(10,'sadas',1,123,'123',100,'2022-09-06'),(11,'torti',97,900,'900',200,'2022-09-06'),(12,'torti',97,900,'900',200,'2022-09-06');
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `proveedores` (
  `prv_id` int NOT NULL AUTO_INCREMENT,
  `prv_nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`prv_id`)
) ENGINE=InnoDB AUTO_INCREMENT=201 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedores`
--

LOCK TABLES `proveedores` WRITE;
/*!40000 ALTER TABLE `proveedores` DISABLE KEYS */;
INSERT INTO `proveedores` VALUES (100,'Natanael'),(200,'NC_CODE');
/*!40000 ALTER TABLE `proveedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suscripcion`
--

DROP TABLE IF EXISTS `suscripcion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `suscripcion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `apellido` varchar(60) NOT NULL,
  `edad` int NOT NULL,
  `genero` varchar(60) NOT NULL,
  `plan` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suscripcion`
--

LOCK TABLES `suscripcion` WRITE;
/*!40000 ALTER TABLE `suscripcion` DISABLE KEYS */;
INSERT INTO `suscripcion` VALUES (1,'Joe','0',21,'Masculino','MENSUAL'),(2,'Joe','Velez',21,'Masculino','ANUAL');
/*!40000 ALTER TABLE `suscripcion` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-09-06  8:16:31
