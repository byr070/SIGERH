-- MySQL dump 10.13  Distrib 5.6.20, for Win32 (x86)
--
-- Host: localhost    Database: bd_sgrh
-- ------------------------------------------------------
-- Server version	5.6.20

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
-- Table structure for table `acciones`
--

DROP TABLE IF EXISTS `acciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acciones` (
  `ACC_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ACC_DESCRIPCION` varchar(50) COLLATE utf8_bin NOT NULL,
  `ACTIVADO` tinyint(1) NOT NULL DEFAULT '1',
  `CREADO` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `MODIFICADO` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ACC_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acciones`
--

LOCK TABLES `acciones` WRITE;
/*!40000 ALTER TABLE `acciones` DISABLE KEYS */;
INSERT INTO `acciones` VALUES (1,'Crear',1,'2015-03-31 00:44:16','2015-03-31 05:44:16');
INSERT INTO `acciones` VALUES (2,'Ver',1,'2015-03-31 00:44:16','2015-03-31 05:44:16');
INSERT INTO `acciones` VALUES (3,'Editar',1,'2015-03-31 00:44:16','2015-03-31 05:44:16');
INSERT INTO `acciones` VALUES (4,'Eliminar',1,'2015-03-31 00:44:16','2015-03-31 05:44:16');
/*!40000 ALTER TABLE `acciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cantones`
--

DROP TABLE IF EXISTS `cantones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cantones` (
  `CNT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `CNT_NOMBRE` varchar(60) DEFAULT NULL,
  `CNT_CREADO` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `CNT_MODIFICADO` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `PROVINCIA_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`CNT_ID`),
  KEY `FK_PROVINCIA_ID` (`PROVINCIA_ID`),
  CONSTRAINT `FK_PROVINCIA_ID` FOREIGN KEY (`PROVINCIA_ID`) REFERENCES `provincias` (`PRV_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=225 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cantones`
--

LOCK TABLES `cantones` WRITE;
/*!40000 ALTER TABLE `cantones` DISABLE KEYS */;
INSERT INTO `cantones` VALUES (1,'Camilo Ponce Enriquez','2015-04-05 16:33:53','2015-04-05 21:33:53',1);
INSERT INTO `cantones` VALUES (2,'Chordeleg','2015-04-05 16:33:53','2015-04-05 21:33:53',1);
INSERT INTO `cantones` VALUES (3,'Cuenca','2015-04-05 16:33:53','2015-04-05 21:33:53',1);
INSERT INTO `cantones` VALUES (4,'El Pan','2015-04-05 16:33:53','2015-04-05 21:33:53',1);
INSERT INTO `cantones` VALUES (5,'Giron','2015-04-05 16:33:53','2015-04-05 21:33:53',1);
INSERT INTO `cantones` VALUES (6,'Guachapala','2015-04-05 16:33:53','2015-04-05 21:33:53',1);
INSERT INTO `cantones` VALUES (7,'Gualaceo','2015-04-05 16:33:53','2015-04-05 21:33:53',1);
INSERT INTO `cantones` VALUES (8,'Nabon','2015-04-05 16:33:53','2015-04-05 21:33:53',1);
INSERT INTO `cantones` VALUES (9,'Oña','2015-04-05 16:33:53','2015-04-05 21:33:53',1);
INSERT INTO `cantones` VALUES (10,'Paute','2015-04-05 16:33:53','2015-04-05 21:33:53',1);
INSERT INTO `cantones` VALUES (11,'Pucara','2015-04-05 16:33:53','2015-04-05 21:33:53',1);
INSERT INTO `cantones` VALUES (12,'San Fernando','2015-04-05 16:33:53','2015-04-05 21:33:53',1);
INSERT INTO `cantones` VALUES (13,'Santa Isabel','2015-04-05 16:33:53','2015-04-05 21:33:53',1);
INSERT INTO `cantones` VALUES (14,'Sevilla De Oro','2015-04-05 16:33:53','2015-04-05 21:33:53',1);
INSERT INTO `cantones` VALUES (15,'Sigsig','2015-04-05 16:33:53','2015-04-05 21:33:53',1);
INSERT INTO `cantones` VALUES (16,'Caluma','2015-04-05 17:24:42','2015-04-05 22:24:42',2);
INSERT INTO `cantones` VALUES (17,'Chillanes','2015-04-05 17:24:42','2015-04-05 22:24:42',2);
INSERT INTO `cantones` VALUES (18,'Echeandia','2015-04-05 17:24:42','2015-04-05 22:24:42',2);
INSERT INTO `cantones` VALUES (19,'Guaranda','2015-04-05 17:24:42','2015-04-05 22:24:42',2);
INSERT INTO `cantones` VALUES (20,'Las Naves','2015-04-05 17:24:43','2015-04-05 22:24:43',2);
INSERT INTO `cantones` VALUES (21,'San Jose De Chimbo','2015-04-05 17:24:43','2015-04-05 22:24:43',2);
INSERT INTO `cantones` VALUES (22,'San Miguel','2015-04-05 17:24:43','2015-04-05 22:24:43',2);
INSERT INTO `cantones` VALUES (23,'Azogues','2015-04-05 17:24:43','2015-04-05 22:24:43',3);
INSERT INTO `cantones` VALUES (24,'Biblian','2015-04-05 17:24:43','2015-04-05 22:24:43',3);
INSERT INTO `cantones` VALUES (25,'Cañar','2015-04-05 17:24:43','2015-04-05 22:24:43',3);
INSERT INTO `cantones` VALUES (26,'Deleg','2015-04-05 17:24:43','2015-04-05 22:24:43',3);
INSERT INTO `cantones` VALUES (27,'El Tambo','2015-04-05 17:24:43','2015-04-05 22:24:43',3);
INSERT INTO `cantones` VALUES (28,'La Troncal','2015-04-05 17:24:43','2015-04-05 22:24:43',3);
INSERT INTO `cantones` VALUES (29,'Suscal','2015-04-05 17:24:43','2015-04-05 22:24:43',3);
INSERT INTO `cantones` VALUES (30,'Bolivar','2015-04-05 17:24:43','2015-04-05 22:24:43',4);
INSERT INTO `cantones` VALUES (31,'Espejo','2015-04-05 17:24:43','2015-04-05 22:24:43',4);
INSERT INTO `cantones` VALUES (32,'Mira','2015-04-05 17:24:43','2015-04-05 22:24:43',4);
INSERT INTO `cantones` VALUES (33,'Montufar','2015-04-05 17:24:43','2015-04-05 22:24:43',4);
INSERT INTO `cantones` VALUES (34,'San Pedro De Huaca','2015-04-05 17:24:43','2015-04-05 22:24:43',4);
INSERT INTO `cantones` VALUES (35,'Tulcan','2015-04-05 17:24:43','2015-04-05 22:24:43',4);
INSERT INTO `cantones` VALUES (36,'Alausi','2015-04-05 17:24:43','2015-04-05 22:24:43',5);
INSERT INTO `cantones` VALUES (37,'Chambo','2015-04-05 17:24:43','2015-04-05 22:24:43',5);
INSERT INTO `cantones` VALUES (38,'Chunchi','2015-04-05 17:24:43','2015-04-05 22:24:43',5);
INSERT INTO `cantones` VALUES (39,'Colta','2015-04-05 17:24:43','2015-04-05 22:24:43',5);
INSERT INTO `cantones` VALUES (40,'Cumanda','2015-04-05 17:24:43','2015-04-05 22:24:43',5);
INSERT INTO `cantones` VALUES (41,'Guamote','2015-04-05 17:24:43','2015-04-05 22:24:43',5);
INSERT INTO `cantones` VALUES (42,'Guano','2015-04-05 17:24:43','2015-04-05 22:24:43',5);
INSERT INTO `cantones` VALUES (43,'Pallatanga','2015-04-05 17:24:43','2015-04-05 22:24:43',5);
INSERT INTO `cantones` VALUES (44,'Penipe','2015-04-05 17:24:43','2015-04-05 22:24:43',5);
INSERT INTO `cantones` VALUES (45,'Riobamba','2015-04-05 17:24:43','2015-04-05 22:24:43',5);
INSERT INTO `cantones` VALUES (46,'La Mana','2015-04-05 17:24:43','2015-04-05 22:24:43',6);
INSERT INTO `cantones` VALUES (47,'Latacunga','2015-04-05 17:24:43','2015-04-05 22:24:43',6);
INSERT INTO `cantones` VALUES (48,'Pangua','2015-04-05 17:24:43','2015-04-05 22:24:43',6);
INSERT INTO `cantones` VALUES (49,'Pujili','2015-04-05 17:24:43','2015-04-05 22:24:43',6);
INSERT INTO `cantones` VALUES (50,'Salcedo','2015-04-05 17:24:44','2015-04-05 22:24:44',6);
INSERT INTO `cantones` VALUES (51,'Saquisili','2015-04-05 17:24:44','2015-04-05 22:24:44',6);
INSERT INTO `cantones` VALUES (52,'Sigchos','2015-04-05 17:24:44','2015-04-05 22:24:44',6);
INSERT INTO `cantones` VALUES (53,'Arenillas','2015-04-05 17:24:44','2015-04-05 22:24:44',7);
INSERT INTO `cantones` VALUES (54,'Atahualpa','2015-04-05 17:24:44','2015-04-05 22:24:44',7);
INSERT INTO `cantones` VALUES (55,'Balsas','2015-04-05 17:24:44','2015-04-05 22:24:44',7);
INSERT INTO `cantones` VALUES (56,'Chilla','2015-04-05 17:24:44','2015-04-05 22:24:44',7);
INSERT INTO `cantones` VALUES (57,'El Guabo','2015-04-05 17:24:44','2015-04-05 22:24:44',7);
INSERT INTO `cantones` VALUES (58,'Huaquillas','2015-04-05 17:24:44','2015-04-05 22:24:44',7);
INSERT INTO `cantones` VALUES (59,'Las Lajas','2015-04-05 17:24:44','2015-04-05 22:24:44',7);
INSERT INTO `cantones` VALUES (60,'Machala','2015-04-05 17:24:44','2015-04-05 22:24:44',7);
INSERT INTO `cantones` VALUES (61,'Marcabeli','2015-04-05 17:24:44','2015-04-05 22:24:44',7);
INSERT INTO `cantones` VALUES (62,'Pasaje','2015-04-05 17:24:44','2015-04-05 22:24:44',7);
INSERT INTO `cantones` VALUES (63,'Piñas','2015-04-05 17:24:44','2015-04-05 22:24:44',7);
INSERT INTO `cantones` VALUES (64,'Portovelo','2015-04-05 17:24:44','2015-04-05 22:24:44',7);
INSERT INTO `cantones` VALUES (65,'Santa Rosa','2015-04-05 17:24:44','2015-04-05 22:24:44',7);
INSERT INTO `cantones` VALUES (66,'Zaruma','2015-04-05 17:24:44','2015-04-05 22:24:44',7);
INSERT INTO `cantones` VALUES (67,'Atacames','2015-04-05 17:24:44','2015-04-05 22:24:44',8);
INSERT INTO `cantones` VALUES (68,'Eloy Alfaro','2015-04-05 17:24:44','2015-04-05 22:24:44',8);
INSERT INTO `cantones` VALUES (69,'Esmeraldas','2015-04-05 17:24:44','2015-04-05 22:24:44',8);
INSERT INTO `cantones` VALUES (70,'La Concordia','2015-04-05 17:24:44','2015-04-05 22:24:44',8);
INSERT INTO `cantones` VALUES (71,'Muisne','2015-04-05 17:24:44','2015-04-05 22:24:44',8);
INSERT INTO `cantones` VALUES (72,'Quininde','2015-04-05 17:24:44','2015-04-05 22:24:44',8);
INSERT INTO `cantones` VALUES (73,'Rio Verde','2015-04-05 17:24:44','2015-04-05 22:24:44',8);
INSERT INTO `cantones` VALUES (74,'San Lorenzo','2015-04-05 17:24:44','2015-04-05 22:24:44',8);
INSERT INTO `cantones` VALUES (75,'Isabela','2015-04-05 17:24:44','2015-04-05 22:24:44',9);
INSERT INTO `cantones` VALUES (76,'San Cristobal','2015-04-05 17:24:44','2015-04-05 22:24:44',9);
INSERT INTO `cantones` VALUES (77,'Santa Cruz','2015-04-05 17:24:44','2015-04-05 22:24:44',9);
INSERT INTO `cantones` VALUES (78,'Alfredo Baquerizo Moreno','2015-04-05 17:24:45','2015-04-05 22:24:45',10);
INSERT INTO `cantones` VALUES (79,'Balao','2015-04-05 17:24:45','2015-04-05 22:24:45',10);
INSERT INTO `cantones` VALUES (80,'Balzar','2015-04-05 17:24:45','2015-04-05 22:24:45',10);
INSERT INTO `cantones` VALUES (81,'Colimes','2015-04-05 17:24:45','2015-04-05 22:24:45',10);
INSERT INTO `cantones` VALUES (82,'Coronel Marcelino Maridueña','2015-04-05 17:24:45','2015-04-05 22:24:45',10);
INSERT INTO `cantones` VALUES (83,'Daule','2015-04-05 17:24:45','2015-04-05 22:24:45',10);
INSERT INTO `cantones` VALUES (84,'Duran','2015-04-05 17:24:45','2015-04-05 22:24:45',10);
INSERT INTO `cantones` VALUES (85,'El Empalme','2015-04-05 17:24:45','2015-04-05 22:24:45',10);
INSERT INTO `cantones` VALUES (86,'El Triunfo','2015-04-05 17:24:45','2015-04-05 22:24:45',10);
INSERT INTO `cantones` VALUES (87,'General Antonio Elizalde','2015-04-05 17:24:45','2015-04-05 22:24:45',10);
INSERT INTO `cantones` VALUES (88,'Guayaquil','2015-04-05 17:24:45','2015-04-05 22:24:45',10);
INSERT INTO `cantones` VALUES (89,'Isidro Ayora','2015-04-05 17:24:45','2015-04-05 22:24:45',10);
INSERT INTO `cantones` VALUES (90,'Lomas De Sargentillo','2015-04-05 17:24:45','2015-04-05 22:24:45',10);
INSERT INTO `cantones` VALUES (91,'Milagro','2015-04-05 17:24:45','2015-04-05 22:24:45',10);
INSERT INTO `cantones` VALUES (92,'Naranjal','2015-04-05 17:24:45','2015-04-05 22:24:45',10);
INSERT INTO `cantones` VALUES (93,'Naranjito','2015-04-05 17:24:45','2015-04-05 22:24:45',10);
INSERT INTO `cantones` VALUES (94,'Nobol','2015-04-05 17:24:45','2015-04-05 22:24:45',10);
INSERT INTO `cantones` VALUES (95,'Palestina','2015-04-05 17:24:45','2015-04-05 22:24:45',10);
INSERT INTO `cantones` VALUES (96,'Pedro Carbo','2015-04-05 17:24:45','2015-04-05 22:24:45',10);
INSERT INTO `cantones` VALUES (97,'Playas','2015-04-05 17:24:45','2015-04-05 22:24:45',10);
INSERT INTO `cantones` VALUES (98,'Samborondon','2015-04-05 17:24:45','2015-04-05 22:24:45',10);
INSERT INTO `cantones` VALUES (99,'Santa Lucia','2015-04-05 17:24:45','2015-04-05 22:24:45',10);
INSERT INTO `cantones` VALUES (100,'Simon Bolivar','2015-04-05 17:24:45','2015-04-05 22:24:45',10);
INSERT INTO `cantones` VALUES (101,'Urbina Jado','2015-04-05 17:24:45','2015-04-05 22:24:45',10);
INSERT INTO `cantones` VALUES (102,'Yaguachi','2015-04-05 17:24:45','2015-04-05 22:24:45',10);
INSERT INTO `cantones` VALUES (103,'Antonio Ante','2015-04-05 17:24:46','2015-04-05 22:24:46',11);
INSERT INTO `cantones` VALUES (104,'Cotacachi','2015-04-05 17:24:46','2015-04-05 22:24:46',11);
INSERT INTO `cantones` VALUES (105,'Ibarra','2015-04-05 17:24:46','2015-04-05 22:24:46',11);
INSERT INTO `cantones` VALUES (106,'Otavalo','2015-04-05 17:24:46','2015-04-05 22:24:46',11);
INSERT INTO `cantones` VALUES (107,'Pimampiro','2015-04-05 17:24:46','2015-04-05 22:24:46',11);
INSERT INTO `cantones` VALUES (108,'San Miguel De Urcuqui','2015-04-05 17:24:46','2015-04-05 22:24:46',11);
INSERT INTO `cantones` VALUES (109,'Calvas','2015-04-05 17:24:46','2015-04-05 22:24:46',12);
INSERT INTO `cantones` VALUES (110,'Catamayo','2015-04-05 17:24:46','2015-04-05 22:24:46',12);
INSERT INTO `cantones` VALUES (111,'Celica','2015-04-05 17:24:46','2015-04-05 22:24:46',12);
INSERT INTO `cantones` VALUES (112,'Chaguarpamba','2015-04-05 17:24:46','2015-04-05 22:24:46',12);
INSERT INTO `cantones` VALUES (113,'Espindola','2015-04-05 17:24:46','2015-04-05 22:24:46',12);
INSERT INTO `cantones` VALUES (114,'Gonzanama','2015-04-05 17:24:46','2015-04-05 22:24:46',12);
INSERT INTO `cantones` VALUES (115,'Loja','2015-04-05 17:24:46','2015-04-05 22:24:46',12);
INSERT INTO `cantones` VALUES (116,'Macara','2015-04-05 17:24:46','2015-04-05 22:24:46',12);
INSERT INTO `cantones` VALUES (117,'Olmedo','2015-04-05 17:24:46','2015-04-05 22:24:46',12);
INSERT INTO `cantones` VALUES (118,'Paltas','2015-04-05 17:24:46','2015-04-05 22:24:46',12);
INSERT INTO `cantones` VALUES (119,'Pindal','2015-04-05 17:24:46','2015-04-05 22:24:46',12);
INSERT INTO `cantones` VALUES (120,'Puyango','2015-04-05 17:24:47','2015-04-05 22:24:47',12);
INSERT INTO `cantones` VALUES (121,'Quilanga','2015-04-05 17:24:47','2015-04-05 22:24:47',12);
INSERT INTO `cantones` VALUES (122,'Saraguro','2015-04-05 17:24:47','2015-04-05 22:24:47',12);
INSERT INTO `cantones` VALUES (123,'Sozoranga','2015-04-05 17:24:47','2015-04-05 22:24:47',12);
INSERT INTO `cantones` VALUES (124,'Zapotillo','2015-04-05 17:24:47','2015-04-05 22:24:47',12);
INSERT INTO `cantones` VALUES (125,'Baba','2015-04-05 17:24:47','2015-04-05 22:24:47',13);
INSERT INTO `cantones` VALUES (126,'Babahoyo','2015-04-05 17:24:47','2015-04-05 22:24:47',13);
INSERT INTO `cantones` VALUES (127,'Buena Fe','2015-04-05 17:24:47','2015-04-05 22:24:47',13);
INSERT INTO `cantones` VALUES (128,'Mocache','2015-04-05 17:24:47','2015-04-05 22:24:47',13);
INSERT INTO `cantones` VALUES (129,'Montalvo','2015-04-05 17:24:47','2015-04-05 22:24:47',13);
INSERT INTO `cantones` VALUES (130,'Palenque','2015-04-05 17:24:47','2015-04-05 22:24:47',13);
INSERT INTO `cantones` VALUES (131,'Puebloviejo','2015-04-05 17:24:47','2015-04-05 22:24:47',13);
INSERT INTO `cantones` VALUES (132,'Quevedo','2015-04-05 17:24:47','2015-04-05 22:24:47',13);
INSERT INTO `cantones` VALUES (133,'Quinsaloma','2015-04-05 17:24:47','2015-04-05 22:24:47',13);
INSERT INTO `cantones` VALUES (134,'Urdaneta','2015-04-05 17:24:47','2015-04-05 22:24:47',13);
INSERT INTO `cantones` VALUES (135,'Valencia','2015-04-05 17:24:47','2015-04-05 22:24:47',13);
INSERT INTO `cantones` VALUES (136,'Ventanas','2015-04-05 17:24:47','2015-04-05 22:24:47',13);
INSERT INTO `cantones` VALUES (137,'Vinces','2015-04-05 17:24:47','2015-04-05 22:24:47',13);
INSERT INTO `cantones` VALUES (138,'24 De Mayo','2015-04-05 17:24:47','2015-04-05 22:24:47',14);
INSERT INTO `cantones` VALUES (139,'Bolivar','2015-04-05 17:24:47','2015-04-05 22:24:47',14);
INSERT INTO `cantones` VALUES (140,'Chone','2015-04-05 17:24:47','2015-04-05 22:24:47',14);
INSERT INTO `cantones` VALUES (141,'El Carmen','2015-04-05 17:24:47','2015-04-05 22:24:47',14);
INSERT INTO `cantones` VALUES (142,'Flavio Alfaro','2015-04-05 17:24:48','2015-04-05 22:24:48',14);
INSERT INTO `cantones` VALUES (143,'Jama','2015-04-05 17:24:48','2015-04-05 22:24:48',14);
INSERT INTO `cantones` VALUES (144,'Jaramijo','2015-04-05 17:24:48','2015-04-05 22:24:48',14);
INSERT INTO `cantones` VALUES (145,'Jipijapa','2015-04-05 17:24:48','2015-04-05 22:24:48',14);
INSERT INTO `cantones` VALUES (146,'Junin','2015-04-05 17:24:48','2015-04-05 22:24:48',14);
INSERT INTO `cantones` VALUES (147,'Manta','2015-04-05 17:24:48','2015-04-05 22:24:48',14);
INSERT INTO `cantones` VALUES (148,'Montecristi','2015-04-05 17:24:48','2015-04-05 22:24:48',14);
INSERT INTO `cantones` VALUES (149,'Olmedo','2015-04-05 17:24:48','2015-04-05 22:24:48',14);
INSERT INTO `cantones` VALUES (150,'Pajan','2015-04-05 17:24:48','2015-04-05 22:24:48',14);
INSERT INTO `cantones` VALUES (151,'Pedernales','2015-04-05 17:24:48','2015-04-05 22:24:48',14);
INSERT INTO `cantones` VALUES (152,'Pichincha','2015-04-05 17:24:48','2015-04-05 22:24:48',14);
INSERT INTO `cantones` VALUES (153,'Portoviejo','2015-04-05 17:24:48','2015-04-05 22:24:48',14);
INSERT INTO `cantones` VALUES (154,'Puerto Lopez','2015-04-05 17:24:48','2015-04-05 22:24:48',14);
INSERT INTO `cantones` VALUES (155,'Rocafuerte','2015-04-05 17:24:48','2015-04-05 22:24:48',14);
INSERT INTO `cantones` VALUES (156,'San Vicente','2015-04-05 17:24:48','2015-04-05 22:24:48',14);
INSERT INTO `cantones` VALUES (157,'Santa Ana','2015-04-05 17:24:48','2015-04-05 22:24:48',14);
INSERT INTO `cantones` VALUES (158,'Sucre','2015-04-05 17:24:48','2015-04-05 22:24:48',14);
INSERT INTO `cantones` VALUES (159,'Tosagua','2015-04-05 17:24:48','2015-04-05 22:24:48',14);
INSERT INTO `cantones` VALUES (160,'Gualaquiza','2015-04-05 17:24:48','2015-04-05 22:24:48',15);
INSERT INTO `cantones` VALUES (161,'Huamboya','2015-04-05 17:24:48','2015-04-05 22:24:48',15);
INSERT INTO `cantones` VALUES (162,'Limon Indanza','2015-04-05 17:24:48','2015-04-05 22:24:48',15);
INSERT INTO `cantones` VALUES (163,'Logroño','2015-04-05 17:24:49','2015-04-05 22:24:49',15);
INSERT INTO `cantones` VALUES (164,'Morona','2015-04-05 17:24:49','2015-04-05 22:24:49',15);
INSERT INTO `cantones` VALUES (165,'Pablo VI','2015-04-05 17:24:49','2015-04-05 22:24:49',15);
INSERT INTO `cantones` VALUES (166,'Palora','2015-04-05 17:24:49','2015-04-05 22:24:49',15);
INSERT INTO `cantones` VALUES (167,'San Juan Bosco','2015-04-05 17:24:49','2015-04-05 22:24:49',15);
INSERT INTO `cantones` VALUES (168,'Santiago','2015-04-05 17:24:49','2015-04-05 22:24:49',15);
INSERT INTO `cantones` VALUES (169,'Sucua','2015-04-05 17:24:49','2015-04-05 22:24:49',15);
INSERT INTO `cantones` VALUES (170,'Taisha','2015-04-05 17:24:49','2015-04-05 22:24:49',15);
INSERT INTO `cantones` VALUES (171,'Tiwintza','2015-04-05 17:24:49','2015-04-05 22:24:49',15);
INSERT INTO `cantones` VALUES (172,'Archidona','2015-04-05 17:24:49','2015-04-05 22:24:49',16);
INSERT INTO `cantones` VALUES (173,'Carlos Julio Arosemena','2015-04-05 17:24:49','2015-04-05 22:24:49',16);
INSERT INTO `cantones` VALUES (174,'El Chaco','2015-04-05 17:24:49','2015-04-05 22:24:49',16);
INSERT INTO `cantones` VALUES (175,'Quijos','2015-04-05 17:24:49','2015-04-05 22:24:49',16);
INSERT INTO `cantones` VALUES (176,'Tena','2015-04-05 17:24:49','2015-04-05 22:24:49',16);
INSERT INTO `cantones` VALUES (177,'Aguarico','2015-04-05 17:24:49','2015-04-05 22:24:49',17);
INSERT INTO `cantones` VALUES (178,'La Joya De Los Sachas','2015-04-05 17:24:49','2015-04-05 22:24:49',17);
INSERT INTO `cantones` VALUES (179,'Loreto','2015-04-05 17:24:49','2015-04-05 22:24:49',17);
INSERT INTO `cantones` VALUES (180,'Orellana','2015-04-05 17:24:49','2015-04-05 22:24:49',17);
INSERT INTO `cantones` VALUES (181,'Arajuno','2015-04-05 17:24:49','2015-04-05 22:24:49',18);
INSERT INTO `cantones` VALUES (182,'Mera','2015-04-05 17:24:49','2015-04-05 22:24:49',18);
INSERT INTO `cantones` VALUES (183,'Pastaza','2015-04-05 17:24:49','2015-04-05 22:24:49',18);
INSERT INTO `cantones` VALUES (184,'Santa Clara','2015-04-05 17:24:49','2015-04-05 22:24:49',18);
INSERT INTO `cantones` VALUES (185,'Cayambe','2015-04-05 17:24:49','2015-04-05 22:24:49',19);
INSERT INTO `cantones` VALUES (186,'Mejia','2015-04-05 17:24:50','2015-04-05 22:24:50',19);
INSERT INTO `cantones` VALUES (187,'Pedro Moncayo','2015-04-05 17:24:50','2015-04-05 22:24:50',19);
INSERT INTO `cantones` VALUES (188,'Pedro Vicente Maldonado','2015-04-05 17:24:50','2015-04-05 22:24:50',19);
INSERT INTO `cantones` VALUES (189,'Puerto Quito','2015-04-05 17:24:50','2015-04-05 22:24:50',19);
INSERT INTO `cantones` VALUES (190,'Quito','2015-04-05 17:24:50','2015-04-05 22:24:50',19);
INSERT INTO `cantones` VALUES (191,'Rumiñahui','2015-04-05 17:24:50','2015-04-05 22:24:50',19);
INSERT INTO `cantones` VALUES (192,'San Miguel De Los Bancos','2015-04-05 17:24:50','2015-04-05 22:24:50',19);
INSERT INTO `cantones` VALUES (193,'Libertad','2015-04-05 17:24:50','2015-04-05 22:24:50',20);
INSERT INTO `cantones` VALUES (194,'Salinas','2015-04-05 17:24:50','2015-04-05 22:24:50',20);
INSERT INTO `cantones` VALUES (195,'Santa Elena','2015-04-05 17:24:50','2015-04-05 22:24:50',20);
INSERT INTO `cantones` VALUES (196,'Santo Domingo De Los Tsachilas','2015-04-05 17:24:50','2015-04-05 22:24:50',21);
INSERT INTO `cantones` VALUES (197,'Cascales','2015-04-05 17:24:50','2015-04-05 22:24:50',22);
INSERT INTO `cantones` VALUES (198,'Cuyabeno','2015-04-05 17:24:50','2015-04-05 22:24:50',22);
INSERT INTO `cantones` VALUES (199,'Gonzalo Pizarro','2015-04-05 17:24:50','2015-04-05 22:24:50',22);
INSERT INTO `cantones` VALUES (200,'Lago Agrio','2015-04-05 17:24:50','2015-04-05 22:24:50',22);
INSERT INTO `cantones` VALUES (201,'Putumayo','2015-04-05 17:24:50','2015-04-05 22:24:50',22);
INSERT INTO `cantones` VALUES (202,'Shushufindi','2015-04-05 17:24:50','2015-04-05 22:24:50',22);
INSERT INTO `cantones` VALUES (203,'Sucumbios','2015-04-05 17:24:50','2015-04-05 22:24:50',22);
INSERT INTO `cantones` VALUES (204,'Ambato','2015-04-05 17:24:50','2015-04-05 22:24:50',23);
INSERT INTO `cantones` VALUES (205,'Baños','2015-04-05 17:24:50','2015-04-05 22:24:50',23);
INSERT INTO `cantones` VALUES (206,'Cevallos','2015-04-05 17:24:50','2015-04-05 22:24:50',23);
INSERT INTO `cantones` VALUES (207,'Mocha','2015-04-05 17:24:51','2015-04-05 22:24:51',23);
INSERT INTO `cantones` VALUES (208,'Patate','2015-04-05 17:24:51','2015-04-05 22:24:51',23);
INSERT INTO `cantones` VALUES (209,'Quero','2015-04-05 17:24:51','2015-04-05 22:24:51',23);
INSERT INTO `cantones` VALUES (210,'San Pedro De Pelileo','2015-04-05 17:24:51','2015-04-05 22:24:51',23);
INSERT INTO `cantones` VALUES (211,'Santiago De Pillaro','2015-04-05 17:24:51','2015-04-05 22:24:51',23);
INSERT INTO `cantones` VALUES (212,'Tisaleo','2015-04-05 17:24:51','2015-04-05 22:24:51',23);
INSERT INTO `cantones` VALUES (213,'Centinela Del Condor','2015-04-05 17:24:51','2015-04-05 22:24:51',24);
INSERT INTO `cantones` VALUES (214,'Chinchipe','2015-04-05 17:24:51','2015-04-05 22:24:51',24);
INSERT INTO `cantones` VALUES (215,'El Pangui','2015-04-05 17:24:51','2015-04-05 22:24:51',24);
INSERT INTO `cantones` VALUES (216,'Nangaritza','2015-04-05 17:24:51','2015-04-05 22:24:51',24);
INSERT INTO `cantones` VALUES (217,'Palanda','2015-04-05 17:24:51','2015-04-05 22:24:51',24);
INSERT INTO `cantones` VALUES (218,'Paquisha','2015-04-05 17:24:51','2015-04-05 22:24:51',24);
INSERT INTO `cantones` VALUES (219,'Yacuambi','2015-04-05 17:24:51','2015-04-05 22:24:51',24);
INSERT INTO `cantones` VALUES (220,'Yantzaza','2015-04-05 17:24:51','2015-04-05 22:24:51',24);
INSERT INTO `cantones` VALUES (221,'Zamora','2015-04-05 17:24:51','2015-04-05 22:24:51',24);
INSERT INTO `cantones` VALUES (222,'El Piedrero','2015-04-05 17:24:51','2015-04-05 22:24:51',25);
INSERT INTO `cantones` VALUES (223,'Las Golondrinas','2015-04-05 17:24:51','2015-04-05 22:24:51',25);
INSERT INTO `cantones` VALUES (224,'Manga Del Cura','2015-04-05 17:24:51','2015-04-05 22:24:51',25);
/*!40000 ALTER TABLE `cantones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cargos`
--

DROP TABLE IF EXISTS `cargos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargos` (
  `CRG_ID` int(11) NOT NULL AUTO_INCREMENT,
  `CRG_NOMBRE` varchar(15) DEFAULT NULL,
  `CRG_DESCRIPCION` varchar(60) DEFAULT NULL,
  `CRG_CREADO` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `CRG_MODIFICADO` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `JORNADA_ID` int(11) NOT NULL,
  `HORARIO_ID` int(11) NOT NULL,
  PRIMARY KEY (`CRG_ID`),
  KEY `cargos_ibfk_1` (`JORNADA_ID`),
  KEY `cargos_ibfk_2` (`HORARIO_ID`),
  CONSTRAINT `cargos_ibfk_1` FOREIGN KEY (`JORNADA_ID`) REFERENCES `jornadas` (`JRN_ID`),
  CONSTRAINT `cargos_ibfk_2` FOREIGN KEY (`HORARIO_ID`) REFERENCES `horarios` (`HRR_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargos`
--

LOCK TABLES `cargos` WRITE;
/*!40000 ALTER TABLE `cargos` DISABLE KEYS */;
/*!40000 ALTER TABLE `cargos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `ip_address` varchar(16) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` VALUES ('c23343d3c5198a9a426e3d9c2e7dc999','::1','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.65 Safari/537.36',1432262734,'');
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuadrillas`
--

DROP TABLE IF EXISTS `cuadrillas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuadrillas` (
  `CDR_ID` int(11) NOT NULL AUTO_INCREMENT,
  `CDR_NOMBRE` varchar(60) DEFAULT NULL,
  `CDR_UBICACION` varchar(80) DEFAULT NULL,
  `CDR_CREADO` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `CDR_MODIFICADO` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `PROYECTO_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`CDR_ID`),
  KEY `FK_PROYECTO_ID` (`PROYECTO_ID`),
  CONSTRAINT `FK_PROYECTO_ID` FOREIGN KEY (`PROYECTO_ID`) REFERENCES `proyectos` (`PRY_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuadrillas`
--

LOCK TABLES `cuadrillas` WRITE;
/*!40000 ALTER TABLE `cuadrillas` DISABLE KEYS */;
/*!40000 ALTER TABLE `cuadrillas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleados`
--

DROP TABLE IF EXISTS `empleados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empleados` (
  `EMP_ID` int(11) NOT NULL AUTO_INCREMENT,
  `EMP_NOMBRE_COMPLETO` varchar(60) DEFAULT NULL,
  `EMP_NUMERO_CEDULA` varchar(13) DEFAULT NULL,
  `EMP_CEDULA_MILITAR` varchar(12) DEFAULT NULL,
  `EMP_FECHA_NACIMIENTO` date DEFAULT NULL,
  `LUGAR_NACIMIENTO` int(11) DEFAULT NULL,
  `PROVINCIA_RESIDENCIA` int(11) DEFAULT NULL,
  `EMP_DIRECCION_DOMICILIO` varchar(80) DEFAULT NULL,
  `EMP_ESTADO` varchar(10) DEFAULT NULL,
  `EMP_ESTADO_CIVIL` varchar(10) DEFAULT NULL,
  `EMP_NOMBRE_CONYUGE` varchar(60) DEFAULT NULL,
  `EMP_NUMERO_HIJOS` int(11) DEFAULT NULL,
  `EMP_EMERG_NOMBRE` varchar(60) DEFAULT NULL,
  `EMP_EMERG_PARENTESCO` varchar(20) DEFAULT NULL,
  `EMP_EMERG_TELEFONO` varchar(10) DEFAULT NULL,
  `EMP_EMERG_TIPO_SANGRE` varchar(6) DEFAULT NULL,
  `EMP_FECHA_INGRESO` date DEFAULT NULL,
  `EMP_FECHA_SALIDA` date DEFAULT NULL,
  `EMP_CREADO` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `EMP_MODIFICADO` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ORGANIZACION_ID` int(11) DEFAULT NULL,
  `CUADRILLA_ID` int(11) DEFAULT NULL,
  `TIPO_ID` int(11) DEFAULT NULL,
  `TARJETA_ID` int(11) DEFAULT NULL,
  `CARGO_ID` int(11) DEFAULT NULL,
  `USUARIO_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`EMP_ID`),
  KEY `FK_CARGO_ID` (`CARGO_ID`),
  KEY `FK_CUADRILLA_ID` (`CUADRILLA_ID`),
  KEY `FK_LUGAR_NACIMIENTO` (`LUGAR_NACIMIENTO`),
  KEY `FK_ORGANIZACION_ID` (`ORGANIZACION_ID`),
  KEY `FK_PROVINCIA_RESIDENCIA` (`PROVINCIA_RESIDENCIA`),
  KEY `FK_TARJETA_ID` (`TARJETA_ID`),
  KEY `FK_TIPO_ID` (`TIPO_ID`),
  KEY `FK_USUARIO_ID` (`USUARIO_ID`),
  CONSTRAINT `FK_CARGO_ID` FOREIGN KEY (`CARGO_ID`) REFERENCES `cargos` (`CRG_ID`),
  CONSTRAINT `FK_CUADRILLA_ID` FOREIGN KEY (`CUADRILLA_ID`) REFERENCES `cuadrillas` (`CDR_ID`),
  CONSTRAINT `FK_LUGAR_NACIMIENTO` FOREIGN KEY (`LUGAR_NACIMIENTO`) REFERENCES `parroquias` (`PRR_ID`),
  CONSTRAINT `FK_ORGANIZACION_ID` FOREIGN KEY (`ORGANIZACION_ID`) REFERENCES `organizaciones` (`ORG_ID`),
  CONSTRAINT `FK_PROVINCIA_RESIDENCIA` FOREIGN KEY (`PROVINCIA_RESIDENCIA`) REFERENCES `provincias` (`PRV_ID`),
  CONSTRAINT `FK_TARJETA_ID` FOREIGN KEY (`TARJETA_ID`) REFERENCES `tarjetas` (`TRJ_ID`),
  CONSTRAINT `FK_TIPO_ID` FOREIGN KEY (`TIPO_ID`) REFERENCES `tipos` (`TIP_ID`),
  CONSTRAINT `FK_USUARIO_ID` FOREIGN KEY (`USUARIO_ID`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleados`
--

LOCK TABLES `empleados` WRITE;
/*!40000 ALTER TABLE `empleados` DISABLE KEYS */;
INSERT INTO `empleados` VALUES (1,'Usuario de Prueba','1717709966',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00','2015-05-22 01:43:14',NULL,NULL,NULL,NULL,NULL,2);
/*!40000 ALTER TABLE `empleados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feriados`
--

DROP TABLE IF EXISTS `feriados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feriados` (
  `FRD_ID` int(11) NOT NULL AUTO_INCREMENT,
  `FRD_DESCRIPCION` varchar(50) NOT NULL,
  `FRD_DIA` int(11) NOT NULL,
  `FRD_MES` int(11) NOT NULL,
  `FRD_RECUPERABLE` tinyint(1) DEFAULT '0',
  `FRD_ESTADO` tinyint(1) NOT NULL DEFAULT '1',
  `FRD_CREADO` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `FRD_MODIFICADO` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`FRD_ID`),
  UNIQUE KEY `UK_FERIADO` (`FRD_DESCRIPCION`,`FRD_DIA`,`FRD_MES`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feriados`
--

LOCK TABLES `feriados` WRITE;
/*!40000 ALTER TABLE `feriados` DISABLE KEYS */;
INSERT INTO `feriados` VALUES (1,'Año Nuevo',1,1,0,1,'2015-05-20 02:06:48','2015-05-20 07:06:48');
INSERT INTO `feriados` VALUES (2,'Año Nuevo',2,1,0,1,'2015-05-20 02:06:48','2015-05-20 07:06:48');
INSERT INTO `feriados` VALUES (3,'Año Nuevo',3,1,0,1,'2015-05-20 02:06:48','2015-05-20 07:06:48');
INSERT INTO `feriados` VALUES (4,'Año Nuevo',4,1,0,1,'2015-05-20 02:06:48','2015-05-20 07:06:48');
INSERT INTO `feriados` VALUES (5,'Carnaval',16,2,0,1,'2015-05-20 02:06:48','2015-05-20 07:06:48');
INSERT INTO `feriados` VALUES (6,'Carnaval',17,2,0,1,'2015-05-20 02:06:48','2015-05-20 07:06:48');
INSERT INTO `feriados` VALUES (7,'Viernes Santo',3,4,0,1,'2015-05-20 02:06:48','2015-05-20 07:06:48');
INSERT INTO `feriados` VALUES (8,'Día del Trabajo',1,5,0,1,'2015-05-20 02:06:48','2015-05-20 07:06:48');
INSERT INTO `feriados` VALUES (9,'Batalla de Pichincha',24,5,0,1,'2015-05-20 02:06:48','2015-05-20 07:06:48');
INSERT INTO `feriados` VALUES (10,'Primer Grito de Independencia',10,9,0,1,'2015-05-20 02:06:48','2015-05-20 07:06:48');
INSERT INTO `feriados` VALUES (11,'Independencia de Guayaquil',9,10,0,1,'2015-05-20 02:06:48','2015-05-20 07:06:48');
INSERT INTO `feriados` VALUES (12,'Día de Difuntos',2,11,0,1,'2015-05-20 02:06:48','2015-05-20 07:06:48');
INSERT INTO `feriados` VALUES (13,'Independencia de Cuenca',3,11,0,1,'2015-05-20 02:06:48','2015-05-20 07:06:48');
INSERT INTO `feriados` VALUES (14,'Navidad',25,12,0,1,'2015-05-20 02:06:48','2015-05-20 07:06:48');
/*!40000 ALTER TABLE `feriados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horarios`
--

DROP TABLE IF EXISTS `horarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `horarios` (
  `HRR_ID` int(11) NOT NULL AUTO_INCREMENT,
  `HRR_FECHA_INICIO` date NOT NULL,
  `HRR_FECHA_FIN` date NOT NULL,
  `HRR_HORA_INICIO` time NOT NULL,
  `HRR_HORA_FIN` time NOT NULL,
  PRIMARY KEY (`HRR_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horarios`
--

LOCK TABLES `horarios` WRITE;
/*!40000 ALTER TABLE `horarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `horarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jornadas`
--

DROP TABLE IF EXISTS `jornadas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jornadas` (
  `JRN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `JRN_DIAS_TRABAJO` smallint(2) NOT NULL,
  `JRN_DIAS_DESCANSO` smallint(2) NOT NULL,
  PRIMARY KEY (`JRN_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jornadas`
--

LOCK TABLES `jornadas` WRITE;
/*!40000 ALTER TABLE `jornadas` DISABLE KEYS */;
/*!40000 ALTER TABLE `jornadas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `login` varchar(50) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_attempts`
--

LOCK TABLES `login_attempts` WRITE;
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `login_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modulos`
--

DROP TABLE IF EXISTS `modulos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modulos` (
  `MDL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `MDL_DESCRIPCION` varchar(50) COLLATE utf8_bin NOT NULL,
  `ADMIN` tinyint(1) NOT NULL DEFAULT '0',
  `ACTIVADO` tinyint(1) NOT NULL DEFAULT '1',
  `CREADO` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `MODIFICADO` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`MDL_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modulos`
--

LOCK TABLES `modulos` WRITE;
/*!40000 ALTER TABLE `modulos` DISABLE KEYS */;
INSERT INTO `modulos` VALUES (1,'Empleados',0,1,'2015-03-31 00:44:15','2015-04-20 08:39:53');
INSERT INTO `modulos` VALUES (2,'Horarios',0,0,'2015-03-31 00:44:15','2015-04-11 01:44:36');
INSERT INTO `modulos` VALUES (3,'Pagos',0,0,'2015-03-31 00:44:15','2015-04-11 01:44:42');
INSERT INTO `modulos` VALUES (4,'Usuarios',1,1,'2015-03-31 00:44:15','2015-04-20 08:39:53');
INSERT INTO `modulos` VALUES (5,'Roles',1,1,'2015-03-31 00:44:15','2015-04-20 08:39:53');
INSERT INTO `modulos` VALUES (6,'Modulos',1,1,'2015-03-31 00:44:15','2015-04-20 08:39:53');
INSERT INTO `modulos` VALUES (7,'Permisos',1,1,'2015-03-31 00:44:15','2015-04-20 08:39:53');
/*!40000 ALTER TABLE `modulos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organizaciones`
--

DROP TABLE IF EXISTS `organizaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `organizaciones` (
  `ORG_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ORG_NOMBRE` varchar(60) DEFAULT NULL,
  `ORG_CREADO` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ORG_MODIFICADO` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ORG_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organizaciones`
--

LOCK TABLES `organizaciones` WRITE;
/*!40000 ALTER TABLE `organizaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `organizaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parroquias`
--

DROP TABLE IF EXISTS `parroquias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parroquias` (
  `PRR_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PRR_NOMBRE` varchar(60) DEFAULT NULL,
  `PRR_CREADO` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `PRR_MODIFICADO` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `CANTON_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`PRR_ID`),
  KEY `FK_CANTON_ID` (`CANTON_ID`),
  CONSTRAINT `FK_CANTON_ID` FOREIGN KEY (`CANTON_ID`) REFERENCES `cantones` (`CNT_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=1025 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parroquias`
--

LOCK TABLES `parroquias` WRITE;
/*!40000 ALTER TABLE `parroquias` DISABLE KEYS */;
INSERT INTO `parroquias` VALUES (1,'Camilo Ponce Enriquez','2015-04-05 20:52:57','2015-04-06 01:52:57',1);
INSERT INTO `parroquias` VALUES (2,'El Carmen De Pijili','2015-04-05 20:52:57','2015-04-06 01:52:57',1);
INSERT INTO `parroquias` VALUES (3,'Chordeleg','2015-04-05 20:52:57','2015-04-06 01:52:57',2);
INSERT INTO `parroquias` VALUES (4,'La Union','2015-04-05 20:52:57','2015-04-06 01:52:57',2);
INSERT INTO `parroquias` VALUES (5,'Luis Galarza Orellana','2015-04-05 20:52:57','2015-04-06 01:52:57',2);
INSERT INTO `parroquias` VALUES (6,'Principal','2015-04-05 20:52:57','2015-04-06 01:52:57',2);
INSERT INTO `parroquias` VALUES (7,'San Martin De Puzhio','2015-04-05 20:52:57','2015-04-06 01:52:57',2);
INSERT INTO `parroquias` VALUES (8,'Baños','2015-04-05 20:52:58','2015-04-06 01:52:58',3);
INSERT INTO `parroquias` VALUES (9,'Chaucha','2015-04-05 20:52:58','2015-04-06 01:52:58',3);
INSERT INTO `parroquias` VALUES (10,'Checa (Jidcay)','2015-04-05 20:52:58','2015-04-06 01:52:58',3);
INSERT INTO `parroquias` VALUES (11,'Chiquintad','2015-04-05 20:52:58','2015-04-06 01:52:58',3);
INSERT INTO `parroquias` VALUES (12,'Cuenca','2015-04-05 20:52:58','2015-04-06 01:52:58',3);
INSERT INTO `parroquias` VALUES (13,'Cumbe','2015-04-05 20:52:58','2015-04-06 01:52:58',3);
INSERT INTO `parroquias` VALUES (14,'Llacao','2015-04-05 20:52:58','2015-04-06 01:52:58',3);
INSERT INTO `parroquias` VALUES (15,'Molleturo','2015-04-05 20:52:58','2015-04-06 01:52:58',3);
INSERT INTO `parroquias` VALUES (16,'Nulti','2015-04-05 20:52:58','2015-04-06 01:52:58',3);
INSERT INTO `parroquias` VALUES (17,'Octavio Cordero Palacios','2015-04-05 20:52:58','2015-04-06 01:52:58',3);
INSERT INTO `parroquias` VALUES (18,'Paccha','2015-04-05 20:52:58','2015-04-06 01:52:58',3);
INSERT INTO `parroquias` VALUES (19,'Quingeo','2015-04-05 20:52:58','2015-04-06 01:52:58',3);
INSERT INTO `parroquias` VALUES (20,'Ricaurte','2015-04-05 20:52:58','2015-04-06 01:52:58',3);
INSERT INTO `parroquias` VALUES (21,'San Joaquin','2015-04-05 20:52:58','2015-04-06 01:52:58',3);
INSERT INTO `parroquias` VALUES (22,'Santa Ana','2015-04-05 20:52:58','2015-04-06 01:52:58',3);
INSERT INTO `parroquias` VALUES (23,'Sayausi','2015-04-05 20:52:58','2015-04-06 01:52:58',3);
INSERT INTO `parroquias` VALUES (24,'Sidcay','2015-04-05 20:52:58','2015-04-06 01:52:58',3);
INSERT INTO `parroquias` VALUES (25,'Sinincay','2015-04-05 20:52:58','2015-04-06 01:52:58',3);
INSERT INTO `parroquias` VALUES (26,'Tarqui','2015-04-05 20:52:58','2015-04-06 01:52:58',3);
INSERT INTO `parroquias` VALUES (27,'Turi','2015-04-05 20:52:59','2015-04-06 01:52:59',3);
INSERT INTO `parroquias` VALUES (28,'Valle','2015-04-05 20:52:59','2015-04-06 01:52:59',3);
INSERT INTO `parroquias` VALUES (29,'Victoria Del Portete','2015-04-05 20:52:59','2015-04-06 01:52:59',3);
INSERT INTO `parroquias` VALUES (30,'El Pan','2015-04-05 20:52:59','2015-04-06 01:52:59',4);
INSERT INTO `parroquias` VALUES (31,'San Vicente','2015-04-05 20:52:59','2015-04-06 01:52:59',4);
INSERT INTO `parroquias` VALUES (32,'Asuncion','2015-04-05 20:52:59','2015-04-06 01:52:59',5);
INSERT INTO `parroquias` VALUES (33,'Giron','2015-04-05 20:52:59','2015-04-06 01:52:59',5);
INSERT INTO `parroquias` VALUES (34,'San Gerardo','2015-04-05 20:52:59','2015-04-06 01:52:59',5);
INSERT INTO `parroquias` VALUES (35,'Guachapala','2015-04-05 20:52:59','2015-04-06 01:52:59',6);
INSERT INTO `parroquias` VALUES (36,'Daniel Cordova Toral','2015-04-05 20:52:59','2015-04-06 01:52:59',7);
INSERT INTO `parroquias` VALUES (37,'Gualaceo','2015-04-05 20:52:59','2015-04-06 01:52:59',7);
INSERT INTO `parroquias` VALUES (38,'Jadan','2015-04-05 20:52:59','2015-04-06 01:52:59',7);
INSERT INTO `parroquias` VALUES (39,'Luis Cordero Vega','2015-04-05 20:52:59','2015-04-06 01:52:59',7);
INSERT INTO `parroquias` VALUES (40,'Mariano Moreno','2015-04-05 20:52:59','2015-04-06 01:52:59',7);
INSERT INTO `parroquias` VALUES (41,'Remigio Crespo Toral','2015-04-05 20:52:59','2015-04-06 01:52:59',7);
INSERT INTO `parroquias` VALUES (42,'San Juan','2015-04-05 20:52:59','2015-04-06 01:52:59',7);
INSERT INTO `parroquias` VALUES (43,'Simon Bolivar','2015-04-05 20:52:59','2015-04-06 01:52:59',7);
INSERT INTO `parroquias` VALUES (44,'Zhidmad','2015-04-05 20:52:59','2015-04-06 01:52:59',7);
INSERT INTO `parroquias` VALUES (45,'Cochapata','2015-04-05 20:52:59','2015-04-06 01:52:59',8);
INSERT INTO `parroquias` VALUES (46,'El Progreso','2015-04-05 20:52:59','2015-04-06 01:52:59',8);
INSERT INTO `parroquias` VALUES (47,'Las Nieves (Chaya)','2015-04-05 20:52:59','2015-04-06 01:52:59',8);
INSERT INTO `parroquias` VALUES (48,'Nabon','2015-04-05 20:52:59','2015-04-06 01:52:59',8);
INSERT INTO `parroquias` VALUES (49,'Oña','2015-04-05 20:52:59','2015-04-06 01:52:59',9);
INSERT INTO `parroquias` VALUES (50,'Susudel','2015-04-05 20:52:59','2015-04-06 01:52:59',9);
INSERT INTO `parroquias` VALUES (51,'Bulan','2015-04-05 20:52:59','2015-04-06 01:52:59',10);
INSERT INTO `parroquias` VALUES (52,'Chican','2015-04-05 20:52:59','2015-04-06 01:52:59',10);
INSERT INTO `parroquias` VALUES (53,'Dug-Dug','2015-04-05 20:52:59','2015-04-06 01:52:59',10);
INSERT INTO `parroquias` VALUES (54,'El Cabo','2015-04-05 20:53:00','2015-04-06 01:53:00',10);
INSERT INTO `parroquias` VALUES (55,'Guarainag','2015-04-05 20:53:00','2015-04-06 01:53:00',10);
INSERT INTO `parroquias` VALUES (56,'Paute','2015-04-05 20:53:00','2015-04-06 01:53:00',10);
INSERT INTO `parroquias` VALUES (57,'San Cristobal','2015-04-05 20:53:00','2015-04-06 01:53:00',10);
INSERT INTO `parroquias` VALUES (58,'Tomebamba','2015-04-05 20:53:00','2015-04-06 01:53:00',10);
INSERT INTO `parroquias` VALUES (59,'Pucara','2015-04-05 20:53:00','2015-04-06 01:53:00',11);
INSERT INTO `parroquias` VALUES (60,'San Rafael De Sharug','2015-04-05 20:53:00','2015-04-06 01:53:00',11);
INSERT INTO `parroquias` VALUES (61,'Chumblin','2015-04-05 20:53:00','2015-04-06 01:53:00',12);
INSERT INTO `parroquias` VALUES (62,'San Fernando','2015-04-05 20:53:00','2015-04-06 01:53:00',12);
INSERT INTO `parroquias` VALUES (63,'Abdon Calderon','2015-04-05 20:53:00','2015-04-06 01:53:00',13);
INSERT INTO `parroquias` VALUES (64,'Santa Isabel','2015-04-05 20:53:00','2015-04-06 01:53:00',13);
INSERT INTO `parroquias` VALUES (65,'Zhaglli','2015-04-05 20:53:00','2015-04-06 01:53:00',13);
INSERT INTO `parroquias` VALUES (66,'Amaluza','2015-04-05 20:53:00','2015-04-06 01:53:00',14);
INSERT INTO `parroquias` VALUES (67,'Palmas','2015-04-05 20:53:00','2015-04-06 01:53:00',14);
INSERT INTO `parroquias` VALUES (68,'Sevilla De Oro','2015-04-05 20:53:00','2015-04-06 01:53:00',14);
INSERT INTO `parroquias` VALUES (69,'Cuchil','2015-04-05 20:53:00','2015-04-06 01:53:00',15);
INSERT INTO `parroquias` VALUES (70,'Gima','2015-04-05 20:53:00','2015-04-06 01:53:00',15);
INSERT INTO `parroquias` VALUES (71,'Guel','2015-04-05 20:53:00','2015-04-06 01:53:00',15);
INSERT INTO `parroquias` VALUES (72,'Ludo','2015-04-05 20:53:00','2015-04-06 01:53:00',15);
INSERT INTO `parroquias` VALUES (73,'San Bartolome','2015-04-05 20:53:00','2015-04-06 01:53:00',15);
INSERT INTO `parroquias` VALUES (74,'San Jose De Raranga','2015-04-05 20:53:00','2015-04-06 01:53:00',15);
INSERT INTO `parroquias` VALUES (75,'Sigsig','2015-04-05 20:53:00','2015-04-06 01:53:00',15);
INSERT INTO `parroquias` VALUES (76,'Caluma','2015-04-05 20:53:00','2015-04-06 01:53:00',16);
INSERT INTO `parroquias` VALUES (77,'Chillanes','2015-04-05 20:53:00','2015-04-06 01:53:00',17);
INSERT INTO `parroquias` VALUES (78,'San Jose Del Tambo','2015-04-05 20:53:00','2015-04-06 01:53:00',17);
INSERT INTO `parroquias` VALUES (79,'Echeandia','2015-04-05 20:53:00','2015-04-06 01:53:00',18);
INSERT INTO `parroquias` VALUES (80,'Facundo Vela','2015-04-05 20:53:00','2015-04-06 01:53:00',19);
INSERT INTO `parroquias` VALUES (81,'Guaranda','2015-04-05 20:53:00','2015-04-06 01:53:00',19);
INSERT INTO `parroquias` VALUES (82,'Julio E. Moreno','2015-04-05 20:53:00','2015-04-06 01:53:00',19);
INSERT INTO `parroquias` VALUES (83,'Salinas','2015-04-05 20:53:00','2015-04-06 01:53:00',19);
INSERT INTO `parroquias` VALUES (84,'San Lorenzo','2015-04-05 20:53:00','2015-04-06 01:53:00',19);
INSERT INTO `parroquias` VALUES (85,'San Luis De Pambil','2015-04-05 20:53:00','2015-04-06 01:53:00',19);
INSERT INTO `parroquias` VALUES (86,'San Simon (Yacoto)','2015-04-05 20:53:00','2015-04-06 01:53:00',19);
INSERT INTO `parroquias` VALUES (87,'Santafe (Santa Fe)','2015-04-05 20:53:00','2015-04-06 01:53:00',19);
INSERT INTO `parroquias` VALUES (88,'Simiatug','2015-04-05 20:53:00','2015-04-06 01:53:00',19);
INSERT INTO `parroquias` VALUES (89,'Las Naves','2015-04-05 20:53:00','2015-04-06 01:53:00',20);
INSERT INTO `parroquias` VALUES (90,'Asuncion (Asancoto)','2015-04-05 20:53:00','2015-04-06 01:53:00',21);
INSERT INTO `parroquias` VALUES (91,'Magdalena (Chapacoto)','2015-04-05 20:53:01','2015-04-06 01:53:01',21);
INSERT INTO `parroquias` VALUES (92,'San Jose De Chimbo','2015-04-05 20:53:01','2015-04-06 01:53:01',21);
INSERT INTO `parroquias` VALUES (93,'San Sebastian','2015-04-05 20:53:01','2015-04-06 01:53:01',21);
INSERT INTO `parroquias` VALUES (94,'Telimbela','2015-04-05 20:53:01','2015-04-06 01:53:01',21);
INSERT INTO `parroquias` VALUES (95,'Balsapamba','2015-04-05 20:53:01','2015-04-06 01:53:01',22);
INSERT INTO `parroquias` VALUES (96,'Bilovan','2015-04-05 20:53:01','2015-04-06 01:53:01',22);
INSERT INTO `parroquias` VALUES (97,'Regulo De Mora','2015-04-05 20:53:01','2015-04-06 01:53:01',22);
INSERT INTO `parroquias` VALUES (98,'San Miguel','2015-04-05 20:53:01','2015-04-06 01:53:01',22);
INSERT INTO `parroquias` VALUES (99,'San Pablo','2015-04-05 20:53:01','2015-04-06 01:53:01',22);
INSERT INTO `parroquias` VALUES (100,'San Vicente','2015-04-05 20:53:01','2015-04-06 01:53:01',22);
INSERT INTO `parroquias` VALUES (101,'Santiago','2015-04-05 20:53:01','2015-04-06 01:53:01',22);
INSERT INTO `parroquias` VALUES (102,'Azogues','2015-04-05 20:53:01','2015-04-06 01:53:01',23);
INSERT INTO `parroquias` VALUES (103,'Cojitambo','2015-04-05 20:53:01','2015-04-06 01:53:01',23);
INSERT INTO `parroquias` VALUES (104,'Guapan','2015-04-05 20:53:01','2015-04-06 01:53:01',23);
INSERT INTO `parroquias` VALUES (105,'Javier Loyola','2015-04-05 20:53:01','2015-04-06 01:53:01',23);
INSERT INTO `parroquias` VALUES (106,'Luis Cordero','2015-04-05 20:53:01','2015-04-06 01:53:01',23);
INSERT INTO `parroquias` VALUES (107,'Pindilig','2015-04-05 20:53:01','2015-04-06 01:53:01',23);
INSERT INTO `parroquias` VALUES (108,'Rivera','2015-04-05 20:53:01','2015-04-06 01:53:01',23);
INSERT INTO `parroquias` VALUES (109,'San Miguel','2015-04-05 20:53:01','2015-04-06 01:53:01',23);
INSERT INTO `parroquias` VALUES (110,'Taday','2015-04-05 20:53:01','2015-04-06 01:53:01',23);
INSERT INTO `parroquias` VALUES (111,'Biblian','2015-04-05 20:53:01','2015-04-06 01:53:01',24);
INSERT INTO `parroquias` VALUES (112,'Jerusalen','2015-04-05 20:53:01','2015-04-06 01:53:01',24);
INSERT INTO `parroquias` VALUES (113,'Nazon','2015-04-05 20:53:01','2015-04-06 01:53:01',24);
INSERT INTO `parroquias` VALUES (114,'San Francisco De Sageo','2015-04-05 20:53:01','2015-04-06 01:53:01',24);
INSERT INTO `parroquias` VALUES (115,'Turupamba','2015-04-05 20:53:01','2015-04-06 01:53:01',24);
INSERT INTO `parroquias` VALUES (116,'Cañar','2015-04-05 20:53:01','2015-04-06 01:53:01',25);
INSERT INTO `parroquias` VALUES (117,'Chontamarca','2015-04-05 20:53:02','2015-04-06 01:53:02',25);
INSERT INTO `parroquias` VALUES (118,'Chorocopte','2015-04-05 20:53:02','2015-04-06 01:53:02',25);
INSERT INTO `parroquias` VALUES (119,'Ducur','2015-04-05 20:53:02','2015-04-06 01:53:02',25);
INSERT INTO `parroquias` VALUES (120,'General Morales','2015-04-05 20:53:02','2015-04-06 01:53:02',25);
INSERT INTO `parroquias` VALUES (121,'Gualleturo','2015-04-05 20:53:02','2015-04-06 01:53:02',25);
INSERT INTO `parroquias` VALUES (122,'Honorato Vasquez','2015-04-05 20:53:02','2015-04-06 01:53:02',25);
INSERT INTO `parroquias` VALUES (123,'Ingapirca','2015-04-05 20:53:02','2015-04-06 01:53:02',25);
INSERT INTO `parroquias` VALUES (124,'Juncal','2015-04-05 20:53:02','2015-04-06 01:53:02',25);
INSERT INTO `parroquias` VALUES (125,'San Antonio','2015-04-05 20:53:02','2015-04-06 01:53:02',25);
INSERT INTO `parroquias` VALUES (126,'Ventura','2015-04-05 20:53:02','2015-04-06 01:53:02',25);
INSERT INTO `parroquias` VALUES (127,'Zhud','2015-04-05 20:53:02','2015-04-06 01:53:02',25);
INSERT INTO `parroquias` VALUES (128,'Deleg','2015-04-05 20:53:02','2015-04-06 01:53:02',26);
INSERT INTO `parroquias` VALUES (129,'Solano','2015-04-05 20:53:02','2015-04-06 01:53:02',26);
INSERT INTO `parroquias` VALUES (130,'El Tambo','2015-04-05 20:53:02','2015-04-06 01:53:02',27);
INSERT INTO `parroquias` VALUES (131,'La Troncal','2015-04-05 20:53:02','2015-04-06 01:53:02',28);
INSERT INTO `parroquias` VALUES (132,'Manuel J. Calle','2015-04-05 20:53:02','2015-04-06 01:53:02',28);
INSERT INTO `parroquias` VALUES (133,'Pancho Negro','2015-04-05 20:53:02','2015-04-06 01:53:02',28);
INSERT INTO `parroquias` VALUES (134,'Suscal','2015-04-05 20:53:02','2015-04-06 01:53:02',29);
INSERT INTO `parroquias` VALUES (135,'Bolivar','2015-04-05 20:53:02','2015-04-06 01:53:02',30);
INSERT INTO `parroquias` VALUES (136,'Garcia Moreno','2015-04-05 20:53:02','2015-04-06 01:53:02',30);
INSERT INTO `parroquias` VALUES (137,'Los Andes','2015-04-05 20:53:02','2015-04-06 01:53:02',30);
INSERT INTO `parroquias` VALUES (138,'Monte Olivo','2015-04-05 20:53:02','2015-04-06 01:53:02',30);
INSERT INTO `parroquias` VALUES (139,'San Rafael','2015-04-05 20:53:02','2015-04-06 01:53:02',30);
INSERT INTO `parroquias` VALUES (140,'San Vicente De Pusir','2015-04-05 20:53:02','2015-04-06 01:53:02',30);
INSERT INTO `parroquias` VALUES (141,'El Angel','2015-04-05 20:53:02','2015-04-06 01:53:02',31);
INSERT INTO `parroquias` VALUES (142,'El Goaltal','2015-04-05 20:53:02','2015-04-06 01:53:02',31);
INSERT INTO `parroquias` VALUES (143,'La Libertad (Alizo)','2015-04-05 20:53:02','2015-04-06 01:53:02',31);
INSERT INTO `parroquias` VALUES (144,'San Isidro','2015-04-05 20:53:03','2015-04-06 01:53:03',31);
INSERT INTO `parroquias` VALUES (145,'Concepcion','2015-04-05 20:53:03','2015-04-06 01:53:03',32);
INSERT INTO `parroquias` VALUES (146,'Jijon Y Caamaño','2015-04-05 20:53:03','2015-04-06 01:53:03',32);
INSERT INTO `parroquias` VALUES (147,'Juan Montalvo','2015-04-05 20:53:03','2015-04-06 01:53:03',32);
INSERT INTO `parroquias` VALUES (148,'Mira (Chontahuasi)','2015-04-05 20:53:03','2015-04-06 01:53:03',32);
INSERT INTO `parroquias` VALUES (149,'Chitan De Navarrete','2015-04-05 20:53:03','2015-04-06 01:53:03',33);
INSERT INTO `parroquias` VALUES (150,'Cristobal Colon','2015-04-05 20:53:03','2015-04-06 01:53:03',33);
INSERT INTO `parroquias` VALUES (151,'Fernandez Salvador','2015-04-05 20:53:03','2015-04-06 01:53:03',33);
INSERT INTO `parroquias` VALUES (152,'La Paz','2015-04-05 20:53:03','2015-04-06 01:53:03',33);
INSERT INTO `parroquias` VALUES (153,'Piartal','2015-04-05 20:53:03','2015-04-06 01:53:03',33);
INSERT INTO `parroquias` VALUES (154,'San Gabriel','2015-04-05 20:53:03','2015-04-06 01:53:03',33);
INSERT INTO `parroquias` VALUES (155,'Huaca','2015-04-05 20:53:03','2015-04-06 01:53:03',34);
INSERT INTO `parroquias` VALUES (156,'Mariscal Sucre','2015-04-05 20:53:03','2015-04-06 01:53:03',34);
INSERT INTO `parroquias` VALUES (157,'El Carmelo (El Pun)','2015-04-05 20:53:03','2015-04-06 01:53:03',35);
INSERT INTO `parroquias` VALUES (158,'El Chical','2015-04-05 20:53:03','2015-04-06 01:53:03',35);
INSERT INTO `parroquias` VALUES (159,'Julio Andrade (Orejuela)','2015-04-05 20:53:03','2015-04-06 01:53:03',35);
INSERT INTO `parroquias` VALUES (160,'Maldonado','2015-04-05 20:53:03','2015-04-06 01:53:03',35);
INSERT INTO `parroquias` VALUES (161,'Pioter','2015-04-05 20:53:03','2015-04-06 01:53:03',35);
INSERT INTO `parroquias` VALUES (162,'Santa Martha De Cuba','2015-04-05 20:53:03','2015-04-06 01:53:03',35);
INSERT INTO `parroquias` VALUES (163,'Tobar Donoso (La Bocana)','2015-04-05 20:53:03','2015-04-06 01:53:03',35);
INSERT INTO `parroquias` VALUES (164,'Tufiño','2015-04-05 20:53:03','2015-04-06 01:53:03',35);
INSERT INTO `parroquias` VALUES (165,'Tulcan','2015-04-05 20:53:03','2015-04-06 01:53:03',35);
INSERT INTO `parroquias` VALUES (166,'Urbina (Taya)','2015-04-05 20:53:03','2015-04-06 01:53:03',35);
INSERT INTO `parroquias` VALUES (167,'Achupallas','2015-04-05 20:53:03','2015-04-06 01:53:03',36);
INSERT INTO `parroquias` VALUES (168,'Alausi','2015-04-05 20:53:03','2015-04-06 01:53:03',36);
INSERT INTO `parroquias` VALUES (169,'Guasuntos','2015-04-05 20:53:03','2015-04-06 01:53:03',36);
INSERT INTO `parroquias` VALUES (170,'Huigra','2015-04-05 20:53:03','2015-04-06 01:53:03',36);
INSERT INTO `parroquias` VALUES (171,'Multitud','2015-04-05 20:53:03','2015-04-06 01:53:03',36);
INSERT INTO `parroquias` VALUES (172,'Pistishi (Nariz Del Diablo)','2015-04-05 20:53:03','2015-04-06 01:53:03',36);
INSERT INTO `parroquias` VALUES (173,'Pumallacta (Pumal-Lacta)','2015-04-05 20:53:03','2015-04-06 01:53:03',36);
INSERT INTO `parroquias` VALUES (174,'Sevilla','2015-04-05 20:53:03','2015-04-06 01:53:03',36);
INSERT INTO `parroquias` VALUES (175,'Sibambe','2015-04-05 20:53:03','2015-04-06 01:53:03',36);
INSERT INTO `parroquias` VALUES (176,'Tixan','2015-04-05 20:53:03','2015-04-06 01:53:03',36);
INSERT INTO `parroquias` VALUES (177,'Chambo','2015-04-05 20:53:03','2015-04-06 01:53:03',37);
INSERT INTO `parroquias` VALUES (178,'Capzol','2015-04-05 20:53:03','2015-04-06 01:53:03',38);
INSERT INTO `parroquias` VALUES (179,'Chunchi','2015-04-05 20:53:03','2015-04-06 01:53:03',38);
INSERT INTO `parroquias` VALUES (180,'Compud','2015-04-05 20:53:04','2015-04-06 01:53:04',38);
INSERT INTO `parroquias` VALUES (181,'Gonzol','2015-04-05 20:53:04','2015-04-06 01:53:04',38);
INSERT INTO `parroquias` VALUES (182,'Llagos','2015-04-05 20:53:04','2015-04-06 01:53:04',38);
INSERT INTO `parroquias` VALUES (183,'Cañi','2015-04-05 20:53:04','2015-04-06 01:53:04',39);
INSERT INTO `parroquias` VALUES (184,'Columbe','2015-04-05 20:53:04','2015-04-06 01:53:04',39);
INSERT INTO `parroquias` VALUES (185,'Juan De Velasco (Pangor)','2015-04-05 20:53:04','2015-04-06 01:53:04',39);
INSERT INTO `parroquias` VALUES (186,'Santiago De Quito','2015-04-05 20:53:04','2015-04-06 01:53:04',39);
INSERT INTO `parroquias` VALUES (187,'Villa La Union','2015-04-05 20:53:04','2015-04-06 01:53:04',39);
INSERT INTO `parroquias` VALUES (188,'Cumanda','2015-04-05 20:53:04','2015-04-06 01:53:04',40);
INSERT INTO `parroquias` VALUES (189,'Cebadas','2015-04-05 20:53:04','2015-04-06 01:53:04',41);
INSERT INTO `parroquias` VALUES (190,'Guamote','2015-04-05 20:53:04','2015-04-06 01:53:04',41);
INSERT INTO `parroquias` VALUES (191,'Palmira','2015-04-05 20:53:04','2015-04-06 01:53:04',41);
INSERT INTO `parroquias` VALUES (192,'Guanando','2015-04-05 20:53:04','2015-04-06 01:53:04',42);
INSERT INTO `parroquias` VALUES (193,'Guano','2015-04-05 20:53:04','2015-04-06 01:53:04',42);
INSERT INTO `parroquias` VALUES (194,'Ilapo','2015-04-05 20:53:04','2015-04-06 01:53:04',42);
INSERT INTO `parroquias` VALUES (195,'La Providencia','2015-04-05 20:53:04','2015-04-06 01:53:04',42);
INSERT INTO `parroquias` VALUES (196,'San Andres','2015-04-05 20:53:04','2015-04-06 01:53:04',42);
INSERT INTO `parroquias` VALUES (197,'San Gerardo De Pacaicaguan','2015-04-05 20:53:04','2015-04-06 01:53:04',42);
INSERT INTO `parroquias` VALUES (198,'San Isidro De Patulu','2015-04-05 20:53:04','2015-04-06 01:53:04',42);
INSERT INTO `parroquias` VALUES (199,'San Jose Del Chazo','2015-04-05 20:53:04','2015-04-06 01:53:04',42);
INSERT INTO `parroquias` VALUES (200,'Santa Fe De Galan','2015-04-05 20:53:04','2015-04-06 01:53:04',42);
INSERT INTO `parroquias` VALUES (201,'Valparaiso','2015-04-05 20:53:04','2015-04-06 01:53:04',42);
INSERT INTO `parroquias` VALUES (202,'Pallatanga','2015-04-05 20:53:04','2015-04-06 01:53:04',43);
INSERT INTO `parroquias` VALUES (203,'Bilbao','2015-04-05 20:53:04','2015-04-06 01:53:04',44);
INSERT INTO `parroquias` VALUES (204,'El Altar','2015-04-05 20:53:04','2015-04-06 01:53:04',44);
INSERT INTO `parroquias` VALUES (205,'La Candelaria','2015-04-05 20:53:04','2015-04-06 01:53:04',44);
INSERT INTO `parroquias` VALUES (206,'Matus','2015-04-05 20:53:04','2015-04-06 01:53:04',44);
INSERT INTO `parroquias` VALUES (207,'Penipe','2015-04-05 20:53:04','2015-04-06 01:53:04',44);
INSERT INTO `parroquias` VALUES (208,'Puela','2015-04-05 20:53:04','2015-04-06 01:53:04',44);
INSERT INTO `parroquias` VALUES (209,'San Antonio De Bayushig','2015-04-05 20:53:05','2015-04-06 01:53:05',44);
INSERT INTO `parroquias` VALUES (210,'Cacha','2015-04-05 20:53:05','2015-04-06 01:53:05',45);
INSERT INTO `parroquias` VALUES (211,'Calpi','2015-04-05 20:53:05','2015-04-06 01:53:05',45);
INSERT INTO `parroquias` VALUES (212,'Cubijies','2015-04-05 20:53:05','2015-04-06 01:53:05',45);
INSERT INTO `parroquias` VALUES (213,'Flores','2015-04-05 20:53:05','2015-04-06 01:53:05',45);
INSERT INTO `parroquias` VALUES (214,'Lican','2015-04-05 20:53:05','2015-04-06 01:53:05',45);
INSERT INTO `parroquias` VALUES (215,'Licto','2015-04-05 20:53:05','2015-04-06 01:53:05',45);
INSERT INTO `parroquias` VALUES (216,'Pungala','2015-04-05 20:53:05','2015-04-06 01:53:05',45);
INSERT INTO `parroquias` VALUES (217,'Punin','2015-04-05 20:53:05','2015-04-06 01:53:05',45);
INSERT INTO `parroquias` VALUES (218,'Quimiag','2015-04-05 20:53:05','2015-04-06 01:53:05',45);
INSERT INTO `parroquias` VALUES (219,'Riobamba','2015-04-05 20:53:05','2015-04-06 01:53:05',45);
INSERT INTO `parroquias` VALUES (220,'San Juan','2015-04-05 20:53:05','2015-04-06 01:53:05',45);
INSERT INTO `parroquias` VALUES (221,'San Luis','2015-04-05 20:53:05','2015-04-06 01:53:05',45);
INSERT INTO `parroquias` VALUES (222,'Guasaganda','2015-04-05 20:53:05','2015-04-06 01:53:05',46);
INSERT INTO `parroquias` VALUES (223,'La Mana','2015-04-05 20:53:05','2015-04-06 01:53:05',46);
INSERT INTO `parroquias` VALUES (224,'Pucayacu','2015-04-05 20:53:05','2015-04-06 01:53:05',46);
INSERT INTO `parroquias` VALUES (225,'11 De Noviembre (Ilinchi','2015-04-05 20:53:05','2015-04-06 01:53:05',47);
INSERT INTO `parroquias` VALUES (226,'Alaques (Alaquez)','2015-04-05 20:53:05','2015-04-06 01:53:05',47);
INSERT INTO `parroquias` VALUES (227,'Belisario Quevedo','2015-04-05 20:53:05','2015-04-06 01:53:05',47);
INSERT INTO `parroquias` VALUES (228,'Guaitacama (Guaytacama)','2015-04-05 20:53:05','2015-04-06 01:53:05',47);
INSERT INTO `parroquias` VALUES (229,'Joseguango Bajo','2015-04-05 20:53:05','2015-04-06 01:53:05',47);
INSERT INTO `parroquias` VALUES (230,'Latacunga','2015-04-05 20:53:05','2015-04-06 01:53:05',47);
INSERT INTO `parroquias` VALUES (231,'Mulalo','2015-04-05 20:53:05','2015-04-06 01:53:05',47);
INSERT INTO `parroquias` VALUES (232,'Poalo','2015-04-05 20:53:05','2015-04-06 01:53:05',47);
INSERT INTO `parroquias` VALUES (233,'San Juan De Pastocalle','2015-04-05 20:53:06','2015-04-06 01:53:06',47);
INSERT INTO `parroquias` VALUES (234,'Tanicuchi','2015-04-05 20:53:06','2015-04-06 01:53:06',47);
INSERT INTO `parroquias` VALUES (235,'Toacaso','2015-04-05 20:53:06','2015-04-06 01:53:06',47);
INSERT INTO `parroquias` VALUES (236,'El Corazon','2015-04-05 20:53:06','2015-04-06 01:53:06',48);
INSERT INTO `parroquias` VALUES (237,'Moraspungo','2015-04-05 20:53:06','2015-04-06 01:53:06',48);
INSERT INTO `parroquias` VALUES (238,'Pinllopata','2015-04-05 20:53:06','2015-04-06 01:53:06',48);
INSERT INTO `parroquias` VALUES (239,'Ramon Campaña','2015-04-05 20:53:06','2015-04-06 01:53:06',48);
INSERT INTO `parroquias` VALUES (240,'Angamarca','2015-04-05 20:53:06','2015-04-06 01:53:06',49);
INSERT INTO `parroquias` VALUES (241,'Guangaje','2015-04-05 20:53:06','2015-04-06 01:53:06',49);
INSERT INTO `parroquias` VALUES (242,'La Victoria','2015-04-05 20:53:06','2015-04-06 01:53:06',49);
INSERT INTO `parroquias` VALUES (243,'Pilalo','2015-04-05 20:53:06','2015-04-06 01:53:06',49);
INSERT INTO `parroquias` VALUES (244,'Pujili','2015-04-05 20:53:06','2015-04-06 01:53:06',49);
INSERT INTO `parroquias` VALUES (245,'Tingo','2015-04-05 20:53:06','2015-04-06 01:53:06',49);
INSERT INTO `parroquias` VALUES (246,'Zumbahua','2015-04-05 20:53:06','2015-04-06 01:53:06',49);
INSERT INTO `parroquias` VALUES (247,'Antonio Jose Holguin','2015-04-05 20:53:06','2015-04-06 01:53:06',50);
INSERT INTO `parroquias` VALUES (248,'Cusubamba','2015-04-05 20:53:06','2015-04-06 01:53:06',50);
INSERT INTO `parroquias` VALUES (249,'Mulalillo','2015-04-05 20:53:06','2015-04-06 01:53:06',50);
INSERT INTO `parroquias` VALUES (250,'Mulliquindil (Santa Ana)','2015-04-05 20:53:06','2015-04-06 01:53:06',50);
INSERT INTO `parroquias` VALUES (251,'Pansaleo','2015-04-05 20:53:06','2015-04-06 01:53:06',50);
INSERT INTO `parroquias` VALUES (252,'San Miguel','2015-04-05 20:53:06','2015-04-06 01:53:06',50);
INSERT INTO `parroquias` VALUES (253,'Canchagua','2015-04-05 20:53:06','2015-04-06 01:53:06',51);
INSERT INTO `parroquias` VALUES (254,'Chantilin','2015-04-05 20:53:07','2015-04-06 01:53:07',51);
INSERT INTO `parroquias` VALUES (255,'Cochapamba','2015-04-05 20:53:07','2015-04-06 01:53:07',51);
INSERT INTO `parroquias` VALUES (256,'Saquisili','2015-04-05 20:53:07','2015-04-06 01:53:07',51);
INSERT INTO `parroquias` VALUES (257,'Chugchilan','2015-04-05 20:53:07','2015-04-06 01:53:07',52);
INSERT INTO `parroquias` VALUES (258,'Isinlivi','2015-04-05 20:53:07','2015-04-06 01:53:07',52);
INSERT INTO `parroquias` VALUES (259,'Las Pampas','2015-04-05 20:53:07','2015-04-06 01:53:07',52);
INSERT INTO `parroquias` VALUES (260,'Palo Quemado','2015-04-05 20:53:07','2015-04-06 01:53:07',52);
INSERT INTO `parroquias` VALUES (261,'Sigchos','2015-04-05 20:53:07','2015-04-06 01:53:07',52);
INSERT INTO `parroquias` VALUES (262,'Arenillas','2015-04-05 20:53:07','2015-04-06 01:53:07',53);
INSERT INTO `parroquias` VALUES (263,'Carcabon','2015-04-05 20:53:07','2015-04-06 01:53:07',53);
INSERT INTO `parroquias` VALUES (264,'Chacras','2015-04-05 20:53:07','2015-04-06 01:53:07',53);
INSERT INTO `parroquias` VALUES (265,'Palmales','2015-04-05 20:53:07','2015-04-06 01:53:07',53);
INSERT INTO `parroquias` VALUES (266,'Ayapamba','2015-04-05 20:53:07','2015-04-06 01:53:07',54);
INSERT INTO `parroquias` VALUES (267,'Cerro Azul','2015-04-05 20:53:07','2015-04-06 01:53:07',54);
INSERT INTO `parroquias` VALUES (268,'Cordoncillo','2015-04-05 20:53:08','2015-04-06 01:53:08',54);
INSERT INTO `parroquias` VALUES (269,'Milagro','2015-04-05 20:53:08','2015-04-06 01:53:08',54);
INSERT INTO `parroquias` VALUES (270,'Paccha','2015-04-05 20:53:08','2015-04-06 01:53:08',54);
INSERT INTO `parroquias` VALUES (271,'San Jose','2015-04-05 20:53:08','2015-04-06 01:53:08',54);
INSERT INTO `parroquias` VALUES (272,'Balsas','2015-04-05 20:53:08','2015-04-06 01:53:08',55);
INSERT INTO `parroquias` VALUES (273,'Bellamaria','2015-04-05 20:53:08','2015-04-06 01:53:08',55);
INSERT INTO `parroquias` VALUES (274,'Chilla','2015-04-05 20:53:08','2015-04-06 01:53:08',56);
INSERT INTO `parroquias` VALUES (275,'Barbones (Sucre)','2015-04-05 20:53:08','2015-04-06 01:53:08',57);
INSERT INTO `parroquias` VALUES (276,'El Guabo','2015-04-05 20:53:08','2015-04-06 01:53:08',57);
INSERT INTO `parroquias` VALUES (277,'La Iberia','2015-04-05 20:53:08','2015-04-06 01:53:08',57);
INSERT INTO `parroquias` VALUES (278,'Rio Bonito','2015-04-05 20:53:08','2015-04-06 01:53:08',57);
INSERT INTO `parroquias` VALUES (279,'Tendales','2015-04-05 20:53:09','2015-04-06 01:53:09',57);
INSERT INTO `parroquias` VALUES (280,'Huaquillas','2015-04-05 20:53:09','2015-04-06 01:53:09',58);
INSERT INTO `parroquias` VALUES (281,'El Paraiso','2015-04-05 20:53:09','2015-04-06 01:53:09',59);
INSERT INTO `parroquias` VALUES (282,'La Libertad','2015-04-05 20:53:09','2015-04-06 01:53:09',59);
INSERT INTO `parroquias` VALUES (283,'La Victoria','2015-04-05 20:53:09','2015-04-06 01:53:09',59);
INSERT INTO `parroquias` VALUES (284,'San Isidro','2015-04-05 20:53:09','2015-04-06 01:53:09',59);
INSERT INTO `parroquias` VALUES (285,'El Retiro','2015-04-05 20:53:09','2015-04-06 01:53:09',60);
INSERT INTO `parroquias` VALUES (286,'Machala','2015-04-05 20:53:09','2015-04-06 01:53:09',60);
INSERT INTO `parroquias` VALUES (287,'El Ingenio','2015-04-05 20:53:09','2015-04-06 01:53:09',61);
INSERT INTO `parroquias` VALUES (288,'Marcabeli','2015-04-05 20:53:09','2015-04-06 01:53:09',61);
INSERT INTO `parroquias` VALUES (289,'Buenavista','2015-04-05 20:53:09','2015-04-06 01:53:09',62);
INSERT INTO `parroquias` VALUES (290,'Caña Quemada','2015-04-05 20:53:09','2015-04-06 01:53:09',62);
INSERT INTO `parroquias` VALUES (291,'Casacay','2015-04-05 20:53:09','2015-04-06 01:53:09',62);
INSERT INTO `parroquias` VALUES (292,'La Peaña','2015-04-05 20:53:09','2015-04-06 01:53:09',62);
INSERT INTO `parroquias` VALUES (293,'Pasaje','2015-04-05 20:53:09','2015-04-06 01:53:09',62);
INSERT INTO `parroquias` VALUES (294,'Progreso','2015-04-05 20:53:09','2015-04-06 01:53:09',62);
INSERT INTO `parroquias` VALUES (295,'Uzhcurrumi','2015-04-05 20:53:09','2015-04-06 01:53:09',62);
INSERT INTO `parroquias` VALUES (296,'Capiro','2015-04-05 20:53:09','2015-04-06 01:53:09',63);
INSERT INTO `parroquias` VALUES (297,'La Bocana','2015-04-05 20:53:10','2015-04-06 01:53:10',63);
INSERT INTO `parroquias` VALUES (298,'Moromoro','2015-04-05 20:53:10','2015-04-06 01:53:10',63);
INSERT INTO `parroquias` VALUES (299,'Piedras','2015-04-05 20:53:10','2015-04-06 01:53:10',63);
INSERT INTO `parroquias` VALUES (300,'Piñas','2015-04-05 20:53:10','2015-04-06 01:53:10',63);
INSERT INTO `parroquias` VALUES (301,'San Roque','2015-04-05 20:53:10','2015-04-06 01:53:10',63);
INSERT INTO `parroquias` VALUES (302,'Saracay','2015-04-05 20:53:10','2015-04-06 01:53:10',63);
INSERT INTO `parroquias` VALUES (303,'Curtincapa','2015-04-05 20:53:10','2015-04-06 01:53:10',64);
INSERT INTO `parroquias` VALUES (304,'Morales','2015-04-05 20:53:10','2015-04-06 01:53:10',64);
INSERT INTO `parroquias` VALUES (305,'Portovelo','2015-04-05 20:53:10','2015-04-06 01:53:10',64);
INSERT INTO `parroquias` VALUES (306,'Salati','2015-04-05 20:53:10','2015-04-06 01:53:10',64);
INSERT INTO `parroquias` VALUES (307,'Bellamaria','2015-04-05 20:53:10','2015-04-06 01:53:10',65);
INSERT INTO `parroquias` VALUES (308,'Bellavista','2015-04-05 20:53:10','2015-04-06 01:53:10',65);
INSERT INTO `parroquias` VALUES (309,'Jambeli','2015-04-05 20:53:10','2015-04-06 01:53:10',65);
INSERT INTO `parroquias` VALUES (310,'La Avanzada','2015-04-05 20:53:10','2015-04-06 01:53:10',65);
INSERT INTO `parroquias` VALUES (311,'San Antonio','2015-04-05 20:53:10','2015-04-06 01:53:10',65);
INSERT INTO `parroquias` VALUES (312,'Santa Rosa','2015-04-05 20:53:10','2015-04-06 01:53:10',65);
INSERT INTO `parroquias` VALUES (313,'Torata','2015-04-05 20:53:10','2015-04-06 01:53:10',65);
INSERT INTO `parroquias` VALUES (314,'Victoria','2015-04-05 20:53:10','2015-04-06 01:53:10',65);
INSERT INTO `parroquias` VALUES (315,'Abañin','2015-04-05 20:53:10','2015-04-06 01:53:10',66);
INSERT INTO `parroquias` VALUES (316,'Arcapamba','2015-04-05 20:53:11','2015-04-06 01:53:11',66);
INSERT INTO `parroquias` VALUES (317,'Guanazan','2015-04-05 20:53:11','2015-04-06 01:53:11',66);
INSERT INTO `parroquias` VALUES (318,'Guizhaguiña','2015-04-05 20:53:11','2015-04-06 01:53:11',66);
INSERT INTO `parroquias` VALUES (319,'Huertas','2015-04-05 20:53:11','2015-04-06 01:53:11',66);
INSERT INTO `parroquias` VALUES (320,'Malvas','2015-04-05 20:53:11','2015-04-06 01:53:11',66);
INSERT INTO `parroquias` VALUES (321,'Muluncay Grande','2015-04-05 20:53:11','2015-04-06 01:53:11',66);
INSERT INTO `parroquias` VALUES (322,'Salvias','2015-04-05 20:53:11','2015-04-06 01:53:11',66);
INSERT INTO `parroquias` VALUES (323,'Sinsao','2015-04-05 20:53:11','2015-04-06 01:53:11',66);
INSERT INTO `parroquias` VALUES (324,'Zaruma','2015-04-05 20:53:11','2015-04-06 01:53:11',66);
INSERT INTO `parroquias` VALUES (325,'Atacames','2015-04-05 20:53:11','2015-04-06 01:53:11',67);
INSERT INTO `parroquias` VALUES (326,'La Union','2015-04-05 20:53:11','2015-04-06 01:53:11',67);
INSERT INTO `parroquias` VALUES (327,'Sua','2015-04-05 20:53:11','2015-04-06 01:53:11',67);
INSERT INTO `parroquias` VALUES (328,'Tonchigue','2015-04-05 20:53:11','2015-04-06 01:53:11',67);
INSERT INTO `parroquias` VALUES (329,'Tonsupa','2015-04-05 20:53:11','2015-04-06 01:53:11',67);
INSERT INTO `parroquias` VALUES (330,'Anchayacu','2015-04-05 20:53:11','2015-04-06 01:53:11',68);
INSERT INTO `parroquias` VALUES (331,'Atahualpa','2015-04-05 20:53:11','2015-04-06 01:53:11',68);
INSERT INTO `parroquias` VALUES (332,'Borbon','2015-04-05 20:53:11','2015-04-06 01:53:11',68);
INSERT INTO `parroquias` VALUES (333,'Colon Eloy Del Maria','2015-04-05 20:53:11','2015-04-06 01:53:11',68);
INSERT INTO `parroquias` VALUES (334,'La Tola','2015-04-05 20:53:11','2015-04-06 01:53:11',68);
INSERT INTO `parroquias` VALUES (335,'Luis Vargas Torres','2015-04-05 20:53:12','2015-04-06 01:53:12',68);
INSERT INTO `parroquias` VALUES (336,'Maldonado','2015-04-05 20:53:12','2015-04-06 01:53:12',68);
INSERT INTO `parroquias` VALUES (337,'Pampanal De Bolivar','2015-04-05 20:53:12','2015-04-06 01:53:12',68);
INSERT INTO `parroquias` VALUES (338,'San Francisco De Onzole','2015-04-05 20:53:12','2015-04-06 01:53:12',68);
INSERT INTO `parroquias` VALUES (339,'San Jose De Cayapas','2015-04-05 20:53:12','2015-04-06 01:53:12',68);
INSERT INTO `parroquias` VALUES (340,'Santo Domingo De Onzole','2015-04-05 20:53:12','2015-04-06 01:53:12',68);
INSERT INTO `parroquias` VALUES (341,'Selva Alegre','2015-04-05 20:53:12','2015-04-06 01:53:12',68);
INSERT INTO `parroquias` VALUES (342,'Telembi','2015-04-05 20:53:12','2015-04-06 01:53:12',68);
INSERT INTO `parroquias` VALUES (343,'Timbire','2015-04-05 20:53:12','2015-04-06 01:53:12',68);
INSERT INTO `parroquias` VALUES (344,'Valdez (Limones)','2015-04-05 20:53:12','2015-04-06 01:53:12',68);
INSERT INTO `parroquias` VALUES (345,'Camarones','2015-04-05 20:53:12','2015-04-06 01:53:12',69);
INSERT INTO `parroquias` VALUES (346,'Chinca','2015-04-05 20:53:12','2015-04-06 01:53:12',69);
INSERT INTO `parroquias` VALUES (347,'Crnel. Carlos Concha Torres','2015-04-05 20:53:12','2015-04-06 01:53:12',69);
INSERT INTO `parroquias` VALUES (348,'Esmeraldas','2015-04-05 20:53:12','2015-04-06 01:53:12',69);
INSERT INTO `parroquias` VALUES (349,'Majua','2015-04-05 20:53:12','2015-04-06 01:53:12',69);
INSERT INTO `parroquias` VALUES (350,'San Mateo','2015-04-05 20:53:12','2015-04-06 01:53:12',69);
INSERT INTO `parroquias` VALUES (351,'Tabiazo','2015-04-05 20:53:12','2015-04-06 01:53:12',69);
INSERT INTO `parroquias` VALUES (352,'Tachina','2015-04-05 20:53:12','2015-04-06 01:53:12',69);
INSERT INTO `parroquias` VALUES (353,'Vuelta Larga','2015-04-05 20:53:12','2015-04-06 01:53:12',69);
INSERT INTO `parroquias` VALUES (354,'La Concordia','2015-04-05 20:53:12','2015-04-06 01:53:12',70);
INSERT INTO `parroquias` VALUES (355,'Bolivar','2015-04-05 20:53:13','2015-04-06 01:53:13',71);
INSERT INTO `parroquias` VALUES (356,'Daule','2015-04-05 20:53:13','2015-04-06 01:53:13',71);
INSERT INTO `parroquias` VALUES (357,'Galera','2015-04-05 20:53:13','2015-04-06 01:53:13',71);
INSERT INTO `parroquias` VALUES (358,'Muisne','2015-04-05 20:53:13','2015-04-06 01:53:13',71);
INSERT INTO `parroquias` VALUES (359,'Quingue (Olmedo Perdomo','2015-04-05 20:53:13','2015-04-06 01:53:13',71);
INSERT INTO `parroquias` VALUES (360,'Salima','2015-04-05 20:53:13','2015-04-06 01:53:13',71);
INSERT INTO `parroquias` VALUES (361,'San Francisco','2015-04-05 20:53:13','2015-04-06 01:53:13',71);
INSERT INTO `parroquias` VALUES (362,'San Gregorio','2015-04-05 20:53:13','2015-04-06 01:53:13',71);
INSERT INTO `parroquias` VALUES (363,'San Jose De Chamanga','2015-04-05 20:53:13','2015-04-06 01:53:13',71);
INSERT INTO `parroquias` VALUES (364,'Chura (Chancama)','2015-04-05 20:53:13','2015-04-06 01:53:13',72);
INSERT INTO `parroquias` VALUES (365,'Cube','2015-04-05 20:53:13','2015-04-06 01:53:13',72);
INSERT INTO `parroquias` VALUES (366,'La Union','2015-04-05 20:53:13','2015-04-06 01:53:13',72);
INSERT INTO `parroquias` VALUES (367,'Malimpia','2015-04-05 20:53:13','2015-04-06 01:53:13',72);
INSERT INTO `parroquias` VALUES (368,'Rosa Zarate (Quininde)','2015-04-05 20:53:13','2015-04-06 01:53:13',72);
INSERT INTO `parroquias` VALUES (369,'Viche','2015-04-05 20:53:13','2015-04-06 01:53:13',72);
INSERT INTO `parroquias` VALUES (370,'Chontaduro','2015-04-05 20:53:13','2015-04-06 01:53:13',73);
INSERT INTO `parroquias` VALUES (371,'Chumunde','2015-04-05 20:53:13','2015-04-06 01:53:13',73);
INSERT INTO `parroquias` VALUES (372,'Lagarto','2015-04-05 20:53:13','2015-04-06 01:53:13',73);
INSERT INTO `parroquias` VALUES (373,'Montalvo','2015-04-05 20:53:13','2015-04-06 01:53:13',73);
INSERT INTO `parroquias` VALUES (374,'Rioverde','2015-04-05 20:53:13','2015-04-06 01:53:13',73);
INSERT INTO `parroquias` VALUES (375,'Rocafuerte','2015-04-05 20:53:13','2015-04-06 01:53:13',73);
INSERT INTO `parroquias` VALUES (376,'5 De Junio','2015-04-05 20:53:13','2015-04-06 01:53:13',74);
INSERT INTO `parroquias` VALUES (377,'Alto Tambo','2015-04-05 20:53:13','2015-04-06 01:53:13',74);
INSERT INTO `parroquias` VALUES (378,'Ancon (Pichangal)','2015-04-05 20:53:13','2015-04-06 01:53:13',74);
INSERT INTO `parroquias` VALUES (379,'Calderon','2015-04-05 20:53:13','2015-04-06 01:53:13',74);
INSERT INTO `parroquias` VALUES (380,'Carondelet','2015-04-05 20:53:13','2015-04-06 01:53:13',74);
INSERT INTO `parroquias` VALUES (381,'Concepcion','2015-04-05 20:53:13','2015-04-06 01:53:13',74);
INSERT INTO `parroquias` VALUES (382,'Mataje','2015-04-05 20:53:13','2015-04-06 01:53:13',74);
INSERT INTO `parroquias` VALUES (383,'San Javier De Cachavi','2015-04-05 20:53:14','2015-04-06 01:53:14',74);
INSERT INTO `parroquias` VALUES (384,'San Lorenzo','2015-04-05 20:53:14','2015-04-06 01:53:14',74);
INSERT INTO `parroquias` VALUES (385,'Santa Rita','2015-04-05 20:53:14','2015-04-06 01:53:14',74);
INSERT INTO `parroquias` VALUES (386,'Tambillo','2015-04-05 20:53:14','2015-04-06 01:53:14',74);
INSERT INTO `parroquias` VALUES (387,'Tululbi','2015-04-05 20:53:14','2015-04-06 01:53:14',74);
INSERT INTO `parroquias` VALUES (388,'Urbina','2015-04-05 20:53:14','2015-04-06 01:53:14',74);
INSERT INTO `parroquias` VALUES (389,'Puerto Villamil','2015-04-05 20:53:14','2015-04-06 01:53:14',75);
INSERT INTO `parroquias` VALUES (390,'Tomas De Berlanga','2015-04-05 20:53:14','2015-04-06 01:53:14',75);
INSERT INTO `parroquias` VALUES (391,'El Progreso','2015-04-05 20:53:14','2015-04-06 01:53:14',76);
INSERT INTO `parroquias` VALUES (392,'Isla Santa Maria (Floreana)','2015-04-05 20:53:14','2015-04-06 01:53:14',76);
INSERT INTO `parroquias` VALUES (393,'Puerto Baquerizo Moreno','2015-04-05 20:53:14','2015-04-06 01:53:14',76);
INSERT INTO `parroquias` VALUES (394,'Bellavista','2015-04-05 20:53:14','2015-04-06 01:53:14',77);
INSERT INTO `parroquias` VALUES (395,'Puerto Ayora','2015-04-05 20:53:14','2015-04-06 01:53:14',77);
INSERT INTO `parroquias` VALUES (396,'Santa Rosa','2015-04-05 20:53:14','2015-04-06 01:53:14',77);
INSERT INTO `parroquias` VALUES (397,'Alfredo Baquerizo Moreno','2015-04-05 20:53:14','2015-04-06 01:53:14',78);
INSERT INTO `parroquias` VALUES (398,'Balao','2015-04-05 20:53:14','2015-04-06 01:53:14',79);
INSERT INTO `parroquias` VALUES (399,'Balzar','2015-04-05 20:53:14','2015-04-06 01:53:14',80);
INSERT INTO `parroquias` VALUES (400,'Colimes','2015-04-05 20:53:14','2015-04-06 01:53:14',81);
INSERT INTO `parroquias` VALUES (401,'San Jacinto','2015-04-05 20:53:14','2015-04-06 01:53:14',81);
INSERT INTO `parroquias` VALUES (402,'Coronel Marcelino Maridueña','2015-04-05 20:53:14','2015-04-06 01:53:14',82);
INSERT INTO `parroquias` VALUES (403,'Daule','2015-04-05 20:53:15','2015-04-06 01:53:15',83);
INSERT INTO `parroquias` VALUES (404,'Juan Bautista Aguirre','2015-04-05 20:53:15','2015-04-06 01:53:15',83);
INSERT INTO `parroquias` VALUES (405,'Laurel','2015-04-05 20:53:15','2015-04-06 01:53:15',83);
INSERT INTO `parroquias` VALUES (406,'Limonal','2015-04-05 20:53:15','2015-04-06 01:53:15',83);
INSERT INTO `parroquias` VALUES (407,'Los Lojas','2015-04-05 20:53:15','2015-04-06 01:53:15',83);
INSERT INTO `parroquias` VALUES (408,'Eloy Alfaro (Duran)','2015-04-05 20:53:15','2015-04-06 01:53:15',84);
INSERT INTO `parroquias` VALUES (409,'El Rosario','2015-04-05 20:53:15','2015-04-06 01:53:15',85);
INSERT INTO `parroquias` VALUES (410,'Guayas (Pueblo Nuevo)','2015-04-05 20:53:15','2015-04-06 01:53:15',85);
INSERT INTO `parroquias` VALUES (411,'Velasco Ibarra','2015-04-05 20:53:15','2015-04-06 01:53:15',85);
INSERT INTO `parroquias` VALUES (412,'El Triunfo','2015-04-05 20:53:15','2015-04-06 01:53:15',86);
INSERT INTO `parroquias` VALUES (413,'General Antonio Elizalde','2015-04-05 20:53:15','2015-04-06 01:53:15',87);
INSERT INTO `parroquias` VALUES (414,'Guayaquil','2015-04-05 20:53:15','2015-04-06 01:53:15',88);
INSERT INTO `parroquias` VALUES (415,'Juan Gomez Rendon (Progr','2015-04-05 20:53:15','2015-04-06 01:53:15',88);
INSERT INTO `parroquias` VALUES (416,'Morro','2015-04-05 20:53:15','2015-04-06 01:53:15',88);
INSERT INTO `parroquias` VALUES (417,'Posorja','2015-04-05 20:53:15','2015-04-06 01:53:15',88);
INSERT INTO `parroquias` VALUES (418,'Puna','2015-04-05 20:53:15','2015-04-06 01:53:15',88);
INSERT INTO `parroquias` VALUES (419,'Tenguel','2015-04-05 20:53:16','2015-04-06 01:53:16',88);
INSERT INTO `parroquias` VALUES (420,'Isidro Ayora','2015-04-05 20:53:16','2015-04-06 01:53:16',89);
INSERT INTO `parroquias` VALUES (421,'Lomas De Sargentillo','2015-04-05 20:53:16','2015-04-06 01:53:16',90);
INSERT INTO `parroquias` VALUES (422,'Chobo','2015-04-05 20:53:16','2015-04-06 01:53:16',91);
INSERT INTO `parroquias` VALUES (423,'Mariscal Sucre (Huaques)','2015-04-05 20:53:16','2015-04-06 01:53:16',91);
INSERT INTO `parroquias` VALUES (424,'Milagro','2015-04-05 20:53:16','2015-04-06 01:53:16',91);
INSERT INTO `parroquias` VALUES (425,'Roberto Astudillo','2015-04-05 20:53:16','2015-04-06 01:53:16',91);
INSERT INTO `parroquias` VALUES (426,'Jesus Maria','2015-04-05 20:53:16','2015-04-06 01:53:16',92);
INSERT INTO `parroquias` VALUES (427,'Naranjal','2015-04-05 20:53:16','2015-04-06 01:53:16',92);
INSERT INTO `parroquias` VALUES (428,'San Carlos','2015-04-05 20:53:16','2015-04-06 01:53:16',92);
INSERT INTO `parroquias` VALUES (429,'Santa Rosa De Flandes','2015-04-05 20:53:16','2015-04-06 01:53:16',92);
INSERT INTO `parroquias` VALUES (430,'Taura','2015-04-05 20:53:16','2015-04-06 01:53:16',92);
INSERT INTO `parroquias` VALUES (431,'Naranjito','2015-04-05 20:53:16','2015-04-06 01:53:16',93);
INSERT INTO `parroquias` VALUES (432,'Narcisa De Jesus','2015-04-05 20:53:16','2015-04-06 01:53:16',94);
INSERT INTO `parroquias` VALUES (433,'Palestina','2015-04-05 20:53:16','2015-04-06 01:53:16',95);
INSERT INTO `parroquias` VALUES (434,'Pedro Carbo','2015-04-05 20:53:16','2015-04-06 01:53:16',96);
INSERT INTO `parroquias` VALUES (435,'Sabanilla','2015-04-05 20:53:16','2015-04-06 01:53:16',96);
INSERT INTO `parroquias` VALUES (436,'Valle De La Virgen','2015-04-05 20:53:16','2015-04-06 01:53:16',96);
INSERT INTO `parroquias` VALUES (437,'General Villamil','2015-04-05 20:53:16','2015-04-06 01:53:16',97);
INSERT INTO `parroquias` VALUES (438,'Samborondon','2015-04-05 20:53:16','2015-04-06 01:53:16',98);
INSERT INTO `parroquias` VALUES (439,'Tarifa','2015-04-05 20:53:16','2015-04-06 01:53:16',98);
INSERT INTO `parroquias` VALUES (440,'Santa Lucia','2015-04-05 20:53:16','2015-04-06 01:53:16',99);
INSERT INTO `parroquias` VALUES (441,'Crnel.Lorenzo De Garaicoa','2015-04-05 20:53:16','2015-04-06 01:53:16',100);
INSERT INTO `parroquias` VALUES (442,'Simon Bolivar','2015-04-05 20:53:16','2015-04-06 01:53:16',100);
INSERT INTO `parroquias` VALUES (443,'El Salitre (Las Ramas)','2015-04-05 20:53:16','2015-04-06 01:53:16',101);
INSERT INTO `parroquias` VALUES (444,'General Vernaza','2015-04-05 20:53:16','2015-04-06 01:53:16',101);
INSERT INTO `parroquias` VALUES (445,'Junquillal','2015-04-05 20:53:16','2015-04-06 01:53:16',101);
INSERT INTO `parroquias` VALUES (446,'La Victoria (Ñauza)','2015-04-05 20:53:17','2015-04-06 01:53:17',101);
INSERT INTO `parroquias` VALUES (447,'Gral. Pedro J. Montero','2015-04-05 20:53:17','2015-04-06 01:53:17',102);
INSERT INTO `parroquias` VALUES (448,'Virgen De Fatima','2015-04-05 20:53:17','2015-04-06 01:53:17',102);
INSERT INTO `parroquias` VALUES (449,'Yaguachi Nuevo','2015-04-05 20:53:17','2015-04-06 01:53:17',102);
INSERT INTO `parroquias` VALUES (450,'Yaguachi Viejo (Cone)','2015-04-05 20:53:17','2015-04-06 01:53:17',102);
INSERT INTO `parroquias` VALUES (451,'Atuntaqui','2015-04-05 20:53:17','2015-04-06 01:53:17',103);
INSERT INTO `parroquias` VALUES (452,'Imbaya','2015-04-05 20:53:17','2015-04-06 01:53:17',103);
INSERT INTO `parroquias` VALUES (453,'San Francisco De Natabue','2015-04-05 20:53:17','2015-04-06 01:53:17',103);
INSERT INTO `parroquias` VALUES (454,'San Jose De Chaltura','2015-04-05 20:53:17','2015-04-06 01:53:17',103);
INSERT INTO `parroquias` VALUES (455,'San Roque','2015-04-05 20:53:17','2015-04-06 01:53:17',103);
INSERT INTO `parroquias` VALUES (456,'6 De Julio De Cuellaje','2015-04-05 20:53:17','2015-04-06 01:53:17',104);
INSERT INTO `parroquias` VALUES (457,'Apuela','2015-04-05 20:53:17','2015-04-06 01:53:17',104);
INSERT INTO `parroquias` VALUES (458,'Cotacachi','2015-04-05 20:53:17','2015-04-06 01:53:17',104);
INSERT INTO `parroquias` VALUES (459,'Garcia Moreno','2015-04-05 20:53:17','2015-04-06 01:53:17',104);
INSERT INTO `parroquias` VALUES (460,'Imantag','2015-04-05 20:53:17','2015-04-06 01:53:17',104);
INSERT INTO `parroquias` VALUES (461,'Peñaherrera','2015-04-05 20:53:17','2015-04-06 01:53:17',104);
INSERT INTO `parroquias` VALUES (462,'Plaza Gutierrez','2015-04-05 20:53:17','2015-04-06 01:53:17',104);
INSERT INTO `parroquias` VALUES (463,'Quiroga','2015-04-05 20:53:17','2015-04-06 01:53:17',104);
INSERT INTO `parroquias` VALUES (464,'Vacas Galindo (El Churo)','2015-04-05 20:53:17','2015-04-06 01:53:17',104);
INSERT INTO `parroquias` VALUES (465,'Ambuqui','2015-04-05 20:53:17','2015-04-06 01:53:17',105);
INSERT INTO `parroquias` VALUES (466,'Angochagua','2015-04-05 20:53:17','2015-04-06 01:53:17',105);
INSERT INTO `parroquias` VALUES (467,'Carolina','2015-04-05 20:53:17','2015-04-06 01:53:17',105);
INSERT INTO `parroquias` VALUES (468,'Ibarra','2015-04-05 20:53:17','2015-04-06 01:53:17',105);
INSERT INTO `parroquias` VALUES (469,'La Esperanza','2015-04-05 20:53:17','2015-04-06 01:53:17',105);
INSERT INTO `parroquias` VALUES (470,'Lita','2015-04-05 20:53:18','2015-04-06 01:53:18',105);
INSERT INTO `parroquias` VALUES (471,'Salinas','2015-04-05 20:53:18','2015-04-06 01:53:18',105);
INSERT INTO `parroquias` VALUES (472,'San Antonio','2015-04-05 20:53:18','2015-04-06 01:53:18',105);
INSERT INTO `parroquias` VALUES (473,'Dr. Miguel Egas Cabezas','2015-04-05 20:53:18','2015-04-06 01:53:18',106);
INSERT INTO `parroquias` VALUES (474,'Eugenio Espejo (Calpaqui)','2015-04-05 20:53:18','2015-04-06 01:53:18',106);
INSERT INTO `parroquias` VALUES (475,'Gonzalez Suarez','2015-04-05 20:53:18','2015-04-06 01:53:18',106);
INSERT INTO `parroquias` VALUES (476,'Otavalo','2015-04-05 20:53:18','2015-04-06 01:53:18',106);
INSERT INTO `parroquias` VALUES (477,'Pataqui','2015-04-05 20:53:18','2015-04-06 01:53:18',106);
INSERT INTO `parroquias` VALUES (478,'San Jose De Quichinche','2015-04-05 20:53:18','2015-04-06 01:53:18',106);
INSERT INTO `parroquias` VALUES (479,'San Juan De Iluman','2015-04-05 20:53:18','2015-04-06 01:53:18',106);
INSERT INTO `parroquias` VALUES (480,'San Pablo','2015-04-05 20:53:18','2015-04-06 01:53:18',106);
INSERT INTO `parroquias` VALUES (481,'San Rafael','2015-04-05 20:53:18','2015-04-06 01:53:18',106);
INSERT INTO `parroquias` VALUES (482,'Selva Alegre','2015-04-05 20:53:18','2015-04-06 01:53:18',106);
INSERT INTO `parroquias` VALUES (483,'Chuga','2015-04-05 20:53:18','2015-04-06 01:53:18',107);
INSERT INTO `parroquias` VALUES (484,'Mariano Acosta','2015-04-05 20:53:18','2015-04-06 01:53:18',107);
INSERT INTO `parroquias` VALUES (485,'Pimampiro','2015-04-05 20:53:18','2015-04-06 01:53:18',107);
INSERT INTO `parroquias` VALUES (486,'San Francisco De Sigsipa','2015-04-05 20:53:18','2015-04-06 01:53:18',107);
INSERT INTO `parroquias` VALUES (487,'Cahuasqui','2015-04-05 20:53:18','2015-04-06 01:53:18',108);
INSERT INTO `parroquias` VALUES (488,'La Merced De Buenos Aires','2015-04-05 20:53:19','2015-04-06 01:53:19',108);
INSERT INTO `parroquias` VALUES (489,'Pablo Arenas','2015-04-05 20:53:19','2015-04-06 01:53:19',108);
INSERT INTO `parroquias` VALUES (490,'San Blas','2015-04-05 20:53:19','2015-04-06 01:53:19',108);
INSERT INTO `parroquias` VALUES (491,'Tumbabiro','2015-04-05 20:53:19','2015-04-06 01:53:19',108);
INSERT INTO `parroquias` VALUES (492,'Urcuqui','2015-04-05 20:53:19','2015-04-06 01:53:19',108);
INSERT INTO `parroquias` VALUES (493,'Cariamanga','2015-04-05 20:53:19','2015-04-06 01:53:19',109);
INSERT INTO `parroquias` VALUES (494,'Colaisaca','2015-04-05 20:53:19','2015-04-06 01:53:19',109);
INSERT INTO `parroquias` VALUES (495,'El Lucero','2015-04-05 20:53:19','2015-04-06 01:53:19',109);
INSERT INTO `parroquias` VALUES (496,'Sangillin','2015-04-05 20:53:19','2015-04-06 01:53:19',109);
INSERT INTO `parroquias` VALUES (497,'Utuana','2015-04-05 20:53:19','2015-04-06 01:53:19',109);
INSERT INTO `parroquias` VALUES (498,'Catamayo (La Toma)','2015-04-05 20:53:19','2015-04-06 01:53:19',110);
INSERT INTO `parroquias` VALUES (499,'El Tambo','2015-04-05 20:53:19','2015-04-06 01:53:19',110);
INSERT INTO `parroquias` VALUES (500,'Guayquichuma','2015-04-05 20:53:19','2015-04-06 01:53:19',110);
INSERT INTO `parroquias` VALUES (501,'San Pedro De La Bendita','2015-04-05 20:53:19','2015-04-06 01:53:19',110);
INSERT INTO `parroquias` VALUES (502,'Zambi','2015-04-05 20:53:19','2015-04-06 01:53:19',110);
INSERT INTO `parroquias` VALUES (503,'Celica','2015-04-05 20:53:19','2015-04-06 01:53:19',111);
INSERT INTO `parroquias` VALUES (504,'Cruzpamba','2015-04-05 20:53:20','2015-04-06 01:53:20',111);
INSERT INTO `parroquias` VALUES (505,'Pozul (San Juan De Pozul','2015-04-05 20:53:20','2015-04-06 01:53:20',111);
INSERT INTO `parroquias` VALUES (506,'Sabanilla','2015-04-05 20:53:20','2015-04-06 01:53:20',111);
INSERT INTO `parroquias` VALUES (507,'Tnte. Maximiliano Rodrig','2015-04-05 20:53:20','2015-04-06 01:53:20',111);
INSERT INTO `parroquias` VALUES (508,'Amarillos','2015-04-05 20:53:20','2015-04-06 01:53:20',112);
INSERT INTO `parroquias` VALUES (509,'Buenavista','2015-04-05 20:53:20','2015-04-06 01:53:20',112);
INSERT INTO `parroquias` VALUES (510,'Chaguarpamba','2015-04-05 20:53:20','2015-04-06 01:53:20',112);
INSERT INTO `parroquias` VALUES (511,'El Rosario','2015-04-05 20:53:20','2015-04-06 01:53:20',112);
INSERT INTO `parroquias` VALUES (512,'Santa Rufina','2015-04-05 20:53:20','2015-04-06 01:53:20',112);
INSERT INTO `parroquias` VALUES (513,'27 De Abril','2015-04-05 20:53:20','2015-04-06 01:53:20',113);
INSERT INTO `parroquias` VALUES (514,'Amaluza','2015-04-05 20:53:21','2015-04-06 01:53:21',113);
INSERT INTO `parroquias` VALUES (515,'Bellavista','2015-04-05 20:53:21','2015-04-06 01:53:21',113);
INSERT INTO `parroquias` VALUES (516,'El Airo','2015-04-05 20:53:21','2015-04-06 01:53:21',113);
INSERT INTO `parroquias` VALUES (517,'El Ingenio','2015-04-05 20:53:21','2015-04-06 01:53:21',113);
INSERT INTO `parroquias` VALUES (518,'Jimbura','2015-04-05 20:53:21','2015-04-06 01:53:21',113);
INSERT INTO `parroquias` VALUES (519,'Santa Teresita','2015-04-05 20:53:21','2015-04-06 01:53:21',113);
INSERT INTO `parroquias` VALUES (520,'Changaimina (La Libertad','2015-04-05 20:53:21','2015-04-06 01:53:21',114);
INSERT INTO `parroquias` VALUES (521,'Gonzanama','2015-04-05 20:53:21','2015-04-06 01:53:21',114);
INSERT INTO `parroquias` VALUES (522,'Nambacola','2015-04-05 20:53:21','2015-04-06 01:53:21',114);
INSERT INTO `parroquias` VALUES (523,'Purunuma (Eguiguren)','2015-04-05 20:53:21','2015-04-06 01:53:21',114);
INSERT INTO `parroquias` VALUES (524,'Sacapalca','2015-04-05 20:53:21','2015-04-06 01:53:21',114);
INSERT INTO `parroquias` VALUES (525,'Chantaco','2015-04-05 20:53:21','2015-04-06 01:53:21',115);
INSERT INTO `parroquias` VALUES (526,'Chuquiribamba','2015-04-05 20:53:22','2015-04-06 01:53:22',115);
INSERT INTO `parroquias` VALUES (527,'El Cisne','2015-04-05 20:53:22','2015-04-06 01:53:22',115);
INSERT INTO `parroquias` VALUES (528,'Gualel','2015-04-05 20:53:22','2015-04-06 01:53:22',115);
INSERT INTO `parroquias` VALUES (529,'Jimbilla','2015-04-05 20:53:22','2015-04-06 01:53:22',115);
INSERT INTO `parroquias` VALUES (530,'Loja','2015-04-05 20:53:22','2015-04-06 01:53:22',115);
INSERT INTO `parroquias` VALUES (531,'Malacatos (Valladolid)','2015-04-05 20:53:22','2015-04-06 01:53:22',115);
INSERT INTO `parroquias` VALUES (532,'Quinara','2015-04-05 20:53:22','2015-04-06 01:53:22',115);
INSERT INTO `parroquias` VALUES (533,'San Lucas','2015-04-05 20:53:22','2015-04-06 01:53:22',115);
INSERT INTO `parroquias` VALUES (534,'San Pedro De Vilcabamba','2015-04-05 20:53:22','2015-04-06 01:53:22',115);
INSERT INTO `parroquias` VALUES (535,'Santiago','2015-04-05 20:53:22','2015-04-06 01:53:22',115);
INSERT INTO `parroquias` VALUES (536,'Taquil (Miguel Riofrio)','2015-04-05 20:53:22','2015-04-06 01:53:22',115);
INSERT INTO `parroquias` VALUES (537,'Vilcabamba (Victoria)','2015-04-05 20:53:22','2015-04-06 01:53:22',115);
INSERT INTO `parroquias` VALUES (538,'Yangana (Arsenio Castillo)','2015-04-05 20:53:22','2015-04-06 01:53:22',115);
INSERT INTO `parroquias` VALUES (539,'La Victoria','2015-04-05 20:53:23','2015-04-06 01:53:23',116);
INSERT INTO `parroquias` VALUES (540,'Larama','2015-04-05 20:53:23','2015-04-06 01:53:23',116);
INSERT INTO `parroquias` VALUES (541,'Macara','2015-04-05 20:53:23','2015-04-06 01:53:23',116);
INSERT INTO `parroquias` VALUES (542,'Sabiango (La Capilla)','2015-04-05 20:53:23','2015-04-06 01:53:23',116);
INSERT INTO `parroquias` VALUES (543,'La Tingue','2015-04-05 20:53:23','2015-04-06 01:53:23',117);
INSERT INTO `parroquias` VALUES (544,'Olmedo','2015-04-05 20:53:23','2015-04-06 01:53:23',117);
INSERT INTO `parroquias` VALUES (545,'Cangonama','2015-04-05 20:53:23','2015-04-06 01:53:23',118);
INSERT INTO `parroquias` VALUES (546,'Casanga','2015-04-05 20:53:23','2015-04-06 01:53:23',118);
INSERT INTO `parroquias` VALUES (547,'Catacocha','2015-04-05 20:53:23','2015-04-06 01:53:23',118);
INSERT INTO `parroquias` VALUES (548,'Guachanama','2015-04-05 20:53:23','2015-04-06 01:53:23',118);
INSERT INTO `parroquias` VALUES (549,'Lauro Guerrero','2015-04-05 20:53:23','2015-04-06 01:53:23',118);
INSERT INTO `parroquias` VALUES (550,'Orianga','2015-04-05 20:53:23','2015-04-06 01:53:23',118);
INSERT INTO `parroquias` VALUES (551,'San Antonio','2015-04-05 20:53:23','2015-04-06 01:53:23',118);
INSERT INTO `parroquias` VALUES (552,'Yamana','2015-04-05 20:53:23','2015-04-06 01:53:23',118);
INSERT INTO `parroquias` VALUES (553,'12 De Diciembre','2015-04-05 20:53:23','2015-04-06 01:53:23',119);
INSERT INTO `parroquias` VALUES (554,'Chaquinal','2015-04-05 20:53:23','2015-04-06 01:53:23',119);
INSERT INTO `parroquias` VALUES (555,'Pindal','2015-04-05 20:53:24','2015-04-06 01:53:24',119);
INSERT INTO `parroquias` VALUES (556,'Alamor','2015-04-05 20:53:24','2015-04-06 01:53:24',120);
INSERT INTO `parroquias` VALUES (557,'Ciano','2015-04-05 20:53:24','2015-04-06 01:53:24',120);
INSERT INTO `parroquias` VALUES (558,'El Arenal','2015-04-05 20:53:24','2015-04-06 01:53:24',120);
INSERT INTO `parroquias` VALUES (559,'El Limo (Mariana De Jesus)','2015-04-05 20:53:24','2015-04-06 01:53:24',120);
INSERT INTO `parroquias` VALUES (560,'Mercadillo','2015-04-05 20:53:24','2015-04-06 01:53:24',120);
INSERT INTO `parroquias` VALUES (561,'Vicentino','2015-04-05 20:53:24','2015-04-06 01:53:24',120);
INSERT INTO `parroquias` VALUES (562,'Fundochamba','2015-04-05 20:53:24','2015-04-06 01:53:24',121);
INSERT INTO `parroquias` VALUES (563,'Quilanga','2015-04-05 20:53:24','2015-04-06 01:53:24',121);
INSERT INTO `parroquias` VALUES (564,'San Antonio De Las Aradas','2015-04-05 20:53:24','2015-04-06 01:53:24',121);
INSERT INTO `parroquias` VALUES (565,'El Paraiso De Celen','2015-04-05 20:53:24','2015-04-06 01:53:24',122);
INSERT INTO `parroquias` VALUES (566,'El Tablon','2015-04-05 20:53:24','2015-04-06 01:53:24',122);
INSERT INTO `parroquias` VALUES (567,'Lluzhapa','2015-04-05 20:53:24','2015-04-06 01:53:24',122);
INSERT INTO `parroquias` VALUES (568,'Manu','2015-04-05 20:53:24','2015-04-06 01:53:24',122);
INSERT INTO `parroquias` VALUES (569,'San Antonio De Qumbe','2015-04-05 20:53:24','2015-04-06 01:53:24',122);
INSERT INTO `parroquias` VALUES (570,'San Pablo De Tenta','2015-04-05 20:53:24','2015-04-06 01:53:24',122);
INSERT INTO `parroquias` VALUES (571,'San Sebastian De Yuluc','2015-04-05 20:53:24','2015-04-06 01:53:24',122);
INSERT INTO `parroquias` VALUES (572,'Saraguro','2015-04-05 20:53:24','2015-04-06 01:53:24',122);
INSERT INTO `parroquias` VALUES (573,'Selva Alegre','2015-04-05 20:53:24','2015-04-06 01:53:24',122);
INSERT INTO `parroquias` VALUES (574,'Sumaypamba','2015-04-05 20:53:24','2015-04-06 01:53:24',122);
INSERT INTO `parroquias` VALUES (575,'Urdaneta (Paquishapa)','2015-04-05 20:53:24','2015-04-06 01:53:24',122);
INSERT INTO `parroquias` VALUES (576,'Nueva Fatima','2015-04-05 20:53:24','2015-04-06 01:53:24',123);
INSERT INTO `parroquias` VALUES (577,'Sozoranga','2015-04-05 20:53:24','2015-04-06 01:53:24',123);
INSERT INTO `parroquias` VALUES (578,'Tacamoros','2015-04-05 20:53:24','2015-04-06 01:53:24',123);
INSERT INTO `parroquias` VALUES (579,'Bolaspamba','2015-04-05 20:53:25','2015-04-06 01:53:25',124);
INSERT INTO `parroquias` VALUES (580,'Cazaderos','2015-04-05 20:53:25','2015-04-06 01:53:25',124);
INSERT INTO `parroquias` VALUES (581,'Garzareal','2015-04-05 20:53:25','2015-04-06 01:53:25',124);
INSERT INTO `parroquias` VALUES (582,'Limones','2015-04-05 20:53:25','2015-04-06 01:53:25',124);
INSERT INTO `parroquias` VALUES (583,'Paletillas','2015-04-05 20:53:25','2015-04-06 01:53:25',124);
INSERT INTO `parroquias` VALUES (584,'Zapotillo','2015-04-05 20:53:25','2015-04-06 01:53:25',124);
INSERT INTO `parroquias` VALUES (585,'Baba','2015-04-05 20:53:25','2015-04-06 01:53:25',125);
INSERT INTO `parroquias` VALUES (586,'Guare','2015-04-05 20:53:25','2015-04-06 01:53:25',125);
INSERT INTO `parroquias` VALUES (587,'Isla De Bejucal','2015-04-05 20:53:25','2015-04-06 01:53:25',125);
INSERT INTO `parroquias` VALUES (588,'Babahoyo','2015-04-05 20:53:25','2015-04-06 01:53:25',126);
INSERT INTO `parroquias` VALUES (589,'Caracol','2015-04-05 20:53:25','2015-04-06 01:53:25',126);
INSERT INTO `parroquias` VALUES (590,'Febres Cordero (Las Juntas)','2015-04-05 20:53:25','2015-04-06 01:53:25',126);
INSERT INTO `parroquias` VALUES (591,'La Union','2015-04-05 20:53:25','2015-04-06 01:53:25',126);
INSERT INTO `parroquias` VALUES (592,'Pimocha','2015-04-05 20:53:25','2015-04-06 01:53:25',126);
INSERT INTO `parroquias` VALUES (593,'Patricia Pilar','2015-04-05 20:53:25','2015-04-06 01:53:25',127);
INSERT INTO `parroquias` VALUES (594,'San Jacinto De Buena Fe','2015-04-05 20:53:25','2015-04-06 01:53:25',127);
INSERT INTO `parroquias` VALUES (595,'Mocache','2015-04-05 20:53:25','2015-04-06 01:53:25',128);
INSERT INTO `parroquias` VALUES (596,'Montalvo','2015-04-05 20:53:25','2015-04-06 01:53:25',129);
INSERT INTO `parroquias` VALUES (597,'Palenque','2015-04-05 20:53:25','2015-04-06 01:53:25',130);
INSERT INTO `parroquias` VALUES (598,'Puebloviejo','2015-04-05 20:53:25','2015-04-06 01:53:25',131);
INSERT INTO `parroquias` VALUES (599,'Puerto Pechiche','2015-04-05 20:53:25','2015-04-06 01:53:25',131);
INSERT INTO `parroquias` VALUES (600,'San Juan','2015-04-05 20:53:25','2015-04-06 01:53:25',131);
INSERT INTO `parroquias` VALUES (601,'La Esperanza','2015-04-05 20:53:25','2015-04-06 01:53:25',132);
INSERT INTO `parroquias` VALUES (602,'Quevedo','2015-04-05 20:53:25','2015-04-06 01:53:25',132);
INSERT INTO `parroquias` VALUES (603,'San Carlos','2015-04-05 20:53:25','2015-04-06 01:53:25',132);
INSERT INTO `parroquias` VALUES (604,'Quinsaloma','2015-04-05 20:53:25','2015-04-06 01:53:25',133);
INSERT INTO `parroquias` VALUES (605,'Catarama','2015-04-05 20:53:25','2015-04-06 01:53:25',134);
INSERT INTO `parroquias` VALUES (606,'Ricaurte','2015-04-05 20:53:25','2015-04-06 01:53:25',134);
INSERT INTO `parroquias` VALUES (607,'Valencia','2015-04-05 20:53:26','2015-04-06 01:53:26',135);
INSERT INTO `parroquias` VALUES (608,'Ventanas','2015-04-05 20:53:26','2015-04-06 01:53:26',136);
INSERT INTO `parroquias` VALUES (609,'Zapotal','2015-04-05 20:53:26','2015-04-06 01:53:26',136);
INSERT INTO `parroquias` VALUES (610,'Antonio Sotomayor','2015-04-05 20:53:26','2015-04-06 01:53:26',137);
INSERT INTO `parroquias` VALUES (611,'Vinces','2015-04-05 20:53:26','2015-04-06 01:53:26',137);
INSERT INTO `parroquias` VALUES (612,'Arq. Sixto Duran Ballen','2015-04-05 20:53:26','2015-04-06 01:53:26',138);
INSERT INTO `parroquias` VALUES (613,'Bellavista','2015-04-05 20:53:26','2015-04-06 01:53:26',138);
INSERT INTO `parroquias` VALUES (614,'Noboa','2015-04-05 20:53:26','2015-04-06 01:53:26',138);
INSERT INTO `parroquias` VALUES (615,'Sucre','2015-04-05 20:53:26','2015-04-06 01:53:26',138);
INSERT INTO `parroquias` VALUES (616,'Calceta','2015-04-05 20:53:26','2015-04-06 01:53:26',139);
INSERT INTO `parroquias` VALUES (617,'Membrillo','2015-04-05 20:53:26','2015-04-06 01:53:26',139);
INSERT INTO `parroquias` VALUES (618,'Quiroga','2015-04-05 20:53:26','2015-04-06 01:53:26',139);
INSERT INTO `parroquias` VALUES (619,'Boyaca','2015-04-05 20:53:26','2015-04-06 01:53:26',140);
INSERT INTO `parroquias` VALUES (620,'Canuto','2015-04-05 20:53:26','2015-04-06 01:53:26',140);
INSERT INTO `parroquias` VALUES (621,'Chibunga','2015-04-05 20:53:26','2015-04-06 01:53:26',140);
INSERT INTO `parroquias` VALUES (622,'Chone','2015-04-05 20:53:26','2015-04-06 01:53:26',140);
INSERT INTO `parroquias` VALUES (623,'Convento','2015-04-05 20:53:26','2015-04-06 01:53:26',140);
INSERT INTO `parroquias` VALUES (624,'Eloy Alfaro','2015-04-05 20:53:26','2015-04-06 01:53:26',140);
INSERT INTO `parroquias` VALUES (625,'Ricaurte','2015-04-05 20:53:26','2015-04-06 01:53:26',140);
INSERT INTO `parroquias` VALUES (626,'San Antonio','2015-04-05 20:53:27','2015-04-06 01:53:27',140);
INSERT INTO `parroquias` VALUES (627,'El Carmen','2015-04-05 20:53:27','2015-04-06 01:53:27',141);
INSERT INTO `parroquias` VALUES (628,'San Pedro De Suma','2015-04-05 20:53:27','2015-04-06 01:53:27',141);
INSERT INTO `parroquias` VALUES (629,'Wilfrido Loor Moreira','2015-04-05 20:53:27','2015-04-06 01:53:27',141);
INSERT INTO `parroquias` VALUES (630,'Flavio Alfaro','2015-04-05 20:53:27','2015-04-06 01:53:27',142);
INSERT INTO `parroquias` VALUES (631,'San Francisco De Novillo','2015-04-05 20:53:27','2015-04-06 01:53:27',142);
INSERT INTO `parroquias` VALUES (632,'Zapallo','2015-04-05 20:53:27','2015-04-06 01:53:27',142);
INSERT INTO `parroquias` VALUES (633,'Jama','2015-04-05 20:53:27','2015-04-06 01:53:27',143);
INSERT INTO `parroquias` VALUES (634,'Jaramijo','2015-04-05 20:53:27','2015-04-06 01:53:27',144);
INSERT INTO `parroquias` VALUES (635,'America','2015-04-05 20:53:27','2015-04-06 01:53:27',145);
INSERT INTO `parroquias` VALUES (636,'El Anegado','2015-04-05 20:53:27','2015-04-06 01:53:27',145);
INSERT INTO `parroquias` VALUES (637,'Jipijapa','2015-04-05 20:53:27','2015-04-06 01:53:27',145);
INSERT INTO `parroquias` VALUES (638,'Julcuy','2015-04-05 20:53:27','2015-04-06 01:53:27',145);
INSERT INTO `parroquias` VALUES (639,'La Union','2015-04-05 20:53:27','2015-04-06 01:53:27',145);
INSERT INTO `parroquias` VALUES (640,'Membrillal','2015-04-05 20:53:27','2015-04-06 01:53:27',145);
INSERT INTO `parroquias` VALUES (641,'Pedro Pablo Gomez','2015-04-05 20:53:27','2015-04-06 01:53:27',145);
INSERT INTO `parroquias` VALUES (642,'Puerto De Cayo','2015-04-05 20:53:27','2015-04-06 01:53:27',145);
INSERT INTO `parroquias` VALUES (643,'Junin','2015-04-05 20:53:27','2015-04-06 01:53:27',146);
INSERT INTO `parroquias` VALUES (644,'Manta','2015-04-05 20:53:27','2015-04-06 01:53:27',147);
INSERT INTO `parroquias` VALUES (645,'San Lorenzo','2015-04-05 20:53:27','2015-04-06 01:53:27',147);
INSERT INTO `parroquias` VALUES (646,'Santa Marianita','2015-04-05 20:53:28','2015-04-06 01:53:28',147);
INSERT INTO `parroquias` VALUES (647,'La Pila','2015-04-05 20:53:28','2015-04-06 01:53:28',148);
INSERT INTO `parroquias` VALUES (648,'Montecristi','2015-04-05 20:53:28','2015-04-06 01:53:28',148);
INSERT INTO `parroquias` VALUES (649,'Olmedo','2015-04-05 20:53:28','2015-04-06 01:53:28',149);
INSERT INTO `parroquias` VALUES (650,'Campozano','2015-04-05 20:53:28','2015-04-06 01:53:28',150);
INSERT INTO `parroquias` VALUES (651,'Cascol','2015-04-05 20:53:28','2015-04-06 01:53:28',150);
INSERT INTO `parroquias` VALUES (652,'Guale','2015-04-05 20:53:28','2015-04-06 01:53:28',150);
INSERT INTO `parroquias` VALUES (653,'Lascano','2015-04-05 20:53:28','2015-04-06 01:53:28',150);
INSERT INTO `parroquias` VALUES (654,'Pajan','2015-04-05 20:53:28','2015-04-06 01:53:28',150);
INSERT INTO `parroquias` VALUES (655,'10 De Agosto','2015-04-05 20:53:28','2015-04-06 01:53:28',151);
INSERT INTO `parroquias` VALUES (656,'Atahualpa','2015-04-05 20:53:28','2015-04-06 01:53:28',151);
INSERT INTO `parroquias` VALUES (657,'Cojimies','2015-04-05 20:53:28','2015-04-06 01:53:28',151);
INSERT INTO `parroquias` VALUES (658,'Pedernales','2015-04-05 20:53:28','2015-04-06 01:53:28',151);
INSERT INTO `parroquias` VALUES (659,'Barraganete','2015-04-05 20:53:28','2015-04-06 01:53:28',152);
INSERT INTO `parroquias` VALUES (660,'Pichincha','2015-04-05 20:53:28','2015-04-06 01:53:28',152);
INSERT INTO `parroquias` VALUES (661,'San Sebastian','2015-04-05 20:53:28','2015-04-06 01:53:28',152);
INSERT INTO `parroquias` VALUES (662,'Abdon Calderon','2015-04-05 20:53:28','2015-04-06 01:53:28',153);
INSERT INTO `parroquias` VALUES (663,'Alhajuela (Bajo Grande)','2015-04-05 20:53:28','2015-04-06 01:53:28',153);
INSERT INTO `parroquias` VALUES (664,'Chirijos','2015-04-05 20:53:29','2015-04-06 01:53:29',153);
INSERT INTO `parroquias` VALUES (665,'Crucita','2015-04-05 20:53:29','2015-04-06 01:53:29',153);
INSERT INTO `parroquias` VALUES (666,'Portoviejo','2015-04-05 20:53:29','2015-04-06 01:53:29',153);
INSERT INTO `parroquias` VALUES (667,'Pueblo Nuevo','2015-04-05 20:53:29','2015-04-06 01:53:29',153);
INSERT INTO `parroquias` VALUES (668,'Riochico (Rio Chico)','2015-04-05 20:53:29','2015-04-06 01:53:29',153);
INSERT INTO `parroquias` VALUES (669,'San Placido','2015-04-05 20:53:29','2015-04-06 01:53:29',153);
INSERT INTO `parroquias` VALUES (670,'Machalilla','2015-04-05 20:53:29','2015-04-06 01:53:29',154);
INSERT INTO `parroquias` VALUES (671,'Puerto Lopez','2015-04-05 20:53:29','2015-04-06 01:53:29',154);
INSERT INTO `parroquias` VALUES (672,'Salango','2015-04-05 20:53:29','2015-04-06 01:53:29',154);
INSERT INTO `parroquias` VALUES (673,'Rocafuerte','2015-04-05 20:53:29','2015-04-06 01:53:29',155);
INSERT INTO `parroquias` VALUES (674,'Canoa','2015-04-05 20:53:29','2015-04-06 01:53:29',156);
INSERT INTO `parroquias` VALUES (675,'San Vicente','2015-04-05 20:53:29','2015-04-06 01:53:29',156);
INSERT INTO `parroquias` VALUES (676,'Ayacucho','2015-04-05 20:53:29','2015-04-06 01:53:29',157);
INSERT INTO `parroquias` VALUES (677,'Honorato Vasquez','2015-04-05 20:53:29','2015-04-06 01:53:29',157);
INSERT INTO `parroquias` VALUES (678,'La Union','2015-04-05 20:53:29','2015-04-06 01:53:29',157);
INSERT INTO `parroquias` VALUES (679,'San Pablo','2015-04-05 20:53:29','2015-04-06 01:53:29',157);
INSERT INTO `parroquias` VALUES (680,'Santa Ana De Vuelta Larga','2015-04-05 20:53:29','2015-04-06 01:53:29',157);
INSERT INTO `parroquias` VALUES (681,'Bahia De Caraquez','2015-04-05 20:53:29','2015-04-06 01:53:29',158);
INSERT INTO `parroquias` VALUES (682,'Charapoto','2015-04-05 20:53:29','2015-04-06 01:53:29',158);
INSERT INTO `parroquias` VALUES (683,'San Isidro','2015-04-05 20:53:29','2015-04-06 01:53:29',158);
INSERT INTO `parroquias` VALUES (684,'Angel Pedro Giler','2015-04-05 20:53:29','2015-04-06 01:53:29',159);
INSERT INTO `parroquias` VALUES (685,'Bachillero','2015-04-05 20:53:29','2015-04-06 01:53:29',159);
INSERT INTO `parroquias` VALUES (686,'Tosagua','2015-04-05 20:53:29','2015-04-06 01:53:29',159);
INSERT INTO `parroquias` VALUES (687,'Amazonas (Rosario De Cuyes)','2015-04-05 20:53:29','2015-04-06 01:53:29',160);
INSERT INTO `parroquias` VALUES (688,'Bermejos','2015-04-05 20:53:30','2015-04-06 01:53:30',160);
INSERT INTO `parroquias` VALUES (689,'Bomboiza','2015-04-05 20:53:30','2015-04-06 01:53:30',160);
INSERT INTO `parroquias` VALUES (690,'Chiguinda','2015-04-05 20:53:30','2015-04-06 01:53:30',160);
INSERT INTO `parroquias` VALUES (691,'El Ideal','2015-04-05 20:53:30','2015-04-06 01:53:30',160);
INSERT INTO `parroquias` VALUES (692,'El Rosario','2015-04-05 20:53:30','2015-04-06 01:53:30',160);
INSERT INTO `parroquias` VALUES (693,'Gualaquiza','2015-04-05 20:53:30','2015-04-06 01:53:30',160);
INSERT INTO `parroquias` VALUES (694,'Nueva Tarqui','2015-04-05 20:53:30','2015-04-06 01:53:30',160);
INSERT INTO `parroquias` VALUES (695,'San Miguel De Cuyes','2015-04-05 20:53:30','2015-04-06 01:53:30',160);
INSERT INTO `parroquias` VALUES (696,'Chiguaza','2015-04-05 20:53:30','2015-04-06 01:53:30',161);
INSERT INTO `parroquias` VALUES (697,'Huamboya','2015-04-05 20:53:30','2015-04-06 01:53:30',161);
INSERT INTO `parroquias` VALUES (698,'General Leonidas Plaza G.','2015-04-05 20:53:30','2015-04-06 01:53:30',162);
INSERT INTO `parroquias` VALUES (699,'Indanza','2015-04-05 20:53:30','2015-04-06 01:53:30',162);
INSERT INTO `parroquias` VALUES (700,'San Antonio','2015-04-05 20:53:30','2015-04-06 01:53:30',162);
INSERT INTO `parroquias` VALUES (701,'San Miguel De Conchay','2015-04-05 20:53:30','2015-04-06 01:53:30',162);
INSERT INTO `parroquias` VALUES (702,'Santa Susana De Chiviaza','2015-04-05 20:53:30','2015-04-06 01:53:30',162);
INSERT INTO `parroquias` VALUES (703,'Yunganza','2015-04-05 20:53:30','2015-04-06 01:53:30',162);
INSERT INTO `parroquias` VALUES (704,'Logroño','2015-04-05 20:53:30','2015-04-06 01:53:30',163);
INSERT INTO `parroquias` VALUES (705,'Shimpis','2015-04-05 20:53:30','2015-04-06 01:53:30',163);
INSERT INTO `parroquias` VALUES (706,'Yaupi','2015-04-05 20:53:30','2015-04-06 01:53:30',163);
INSERT INTO `parroquias` VALUES (707,'Alshi','2015-04-05 20:53:30','2015-04-06 01:53:30',164);
INSERT INTO `parroquias` VALUES (708,'Cuchaentza','2015-04-05 20:53:30','2015-04-06 01:53:30',164);
INSERT INTO `parroquias` VALUES (709,'General Proaño','2015-04-05 20:53:30','2015-04-06 01:53:30',164);
INSERT INTO `parroquias` VALUES (710,'Macas','2015-04-05 20:53:30','2015-04-06 01:53:30',164);
INSERT INTO `parroquias` VALUES (711,'Rio Blanco','2015-04-05 20:53:31','2015-04-06 01:53:31',164);
INSERT INTO `parroquias` VALUES (712,'San Isidro','2015-04-05 20:53:31','2015-04-06 01:53:31',164);
INSERT INTO `parroquias` VALUES (713,'Sevilla Don Bosco','2015-04-05 20:53:31','2015-04-06 01:53:31',164);
INSERT INTO `parroquias` VALUES (714,'Sinai','2015-04-05 20:53:31','2015-04-06 01:53:31',164);
INSERT INTO `parroquias` VALUES (715,'Zuña (Zuñac)','2015-04-05 20:53:31','2015-04-06 01:53:31',164);
INSERT INTO `parroquias` VALUES (716,'Pablo VI','2015-04-05 20:53:31','2015-04-06 01:53:31',165);
INSERT INTO `parroquias` VALUES (717,'16 De Agosto','2015-04-05 20:53:31','2015-04-06 01:53:31',166);
INSERT INTO `parroquias` VALUES (718,'Arapicos','2015-04-05 20:53:31','2015-04-06 01:53:31',166);
INSERT INTO `parroquias` VALUES (719,'Cumanda','2015-04-05 20:53:31','2015-04-06 01:53:31',166);
INSERT INTO `parroquias` VALUES (720,'Palora (Metzera)','2015-04-05 20:53:31','2015-04-06 01:53:31',166);
INSERT INTO `parroquias` VALUES (721,'Sangay','2015-04-05 20:53:31','2015-04-06 01:53:31',166);
INSERT INTO `parroquias` VALUES (722,'Pan De Azucar','2015-04-05 20:53:31','2015-04-06 01:53:31',167);
INSERT INTO `parroquias` VALUES (723,'San Carlos De Limon','2015-04-05 20:53:31','2015-04-06 01:53:31',167);
INSERT INTO `parroquias` VALUES (724,'San Jacinto De Wakambeis','2015-04-05 20:53:31','2015-04-06 01:53:31',167);
INSERT INTO `parroquias` VALUES (725,'San Juan Bosco','2015-04-05 20:53:31','2015-04-06 01:53:31',167);
INSERT INTO `parroquias` VALUES (726,'Santiago De Pananza','2015-04-05 20:53:31','2015-04-06 01:53:31',167);
INSERT INTO `parroquias` VALUES (727,'Chupianza','2015-04-05 20:53:31','2015-04-06 01:53:31',168);
INSERT INTO `parroquias` VALUES (728,'Copal','2015-04-05 20:53:31','2015-04-06 01:53:31',168);
INSERT INTO `parroquias` VALUES (729,'Patuca','2015-04-05 20:53:31','2015-04-06 01:53:31',168);
INSERT INTO `parroquias` VALUES (730,'San Francisco De Chinimb','2015-04-05 20:53:31','2015-04-06 01:53:31',168);
INSERT INTO `parroquias` VALUES (731,'San Luis De El Acho','2015-04-05 20:53:31','2015-04-06 01:53:31',168);
INSERT INTO `parroquias` VALUES (732,'Santiago','2015-04-05 20:53:31','2015-04-06 01:53:31',168);
INSERT INTO `parroquias` VALUES (733,'Santiago De Mendez','2015-04-05 20:53:31','2015-04-06 01:53:31',168);
INSERT INTO `parroquias` VALUES (734,'Asuncion','2015-04-05 20:53:31','2015-04-06 01:53:31',169);
INSERT INTO `parroquias` VALUES (735,'Huambi','2015-04-05 20:53:31','2015-04-06 01:53:31',169);
INSERT INTO `parroquias` VALUES (736,'Santa Marianita De Jesus','2015-04-05 20:53:32','2015-04-06 01:53:32',169);
INSERT INTO `parroquias` VALUES (737,'Sucua','2015-04-05 20:53:32','2015-04-06 01:53:32',169);
INSERT INTO `parroquias` VALUES (738,'Huasaga','2015-04-05 20:53:32','2015-04-06 01:53:32',170);
INSERT INTO `parroquias` VALUES (739,'Macuma','2015-04-05 20:53:32','2015-04-06 01:53:32',170);
INSERT INTO `parroquias` VALUES (740,'Pumpuentsa','2015-04-05 20:53:32','2015-04-06 01:53:32',170);
INSERT INTO `parroquias` VALUES (741,'Taisha','2015-04-05 20:53:32','2015-04-06 01:53:32',170);
INSERT INTO `parroquias` VALUES (742,'Tutinentza','2015-04-05 20:53:32','2015-04-06 01:53:32',170);
INSERT INTO `parroquias` VALUES (743,'San Jose De Morona','2015-04-05 20:53:32','2015-04-06 01:53:32',171);
INSERT INTO `parroquias` VALUES (744,'Tiwintza','2015-04-05 20:53:32','2015-04-06 01:53:32',171);
INSERT INTO `parroquias` VALUES (745,'Archidona','2015-04-05 20:53:32','2015-04-06 01:53:32',172);
INSERT INTO `parroquias` VALUES (746,'Cotundo','2015-04-05 20:53:32','2015-04-06 01:53:32',172);
INSERT INTO `parroquias` VALUES (747,'San Pablo De Ushpayacu','2015-04-05 20:53:32','2015-04-06 01:53:32',172);
INSERT INTO `parroquias` VALUES (748,'Carlos Julio Arosemena Tola','2015-04-05 20:53:32','2015-04-06 01:53:32',173);
INSERT INTO `parroquias` VALUES (749,'El Chaco','2015-04-05 20:53:32','2015-04-06 01:53:32',174);
INSERT INTO `parroquias` VALUES (750,'Gonzalo Diaz De Pineda','2015-04-05 20:53:32','2015-04-06 01:53:32',174);
INSERT INTO `parroquias` VALUES (751,'Linares','2015-04-05 20:53:32','2015-04-06 01:53:32',174);
INSERT INTO `parroquias` VALUES (752,'Oyacachi','2015-04-05 20:53:32','2015-04-06 01:53:32',174);
INSERT INTO `parroquias` VALUES (753,'Santa Rosa','2015-04-05 20:53:32','2015-04-06 01:53:32',174);
INSERT INTO `parroquias` VALUES (754,'Sardinas','2015-04-05 20:53:32','2015-04-06 01:53:32',174);
INSERT INTO `parroquias` VALUES (755,'Baeza','2015-04-05 20:53:32','2015-04-06 01:53:32',175);
INSERT INTO `parroquias` VALUES (756,'Cosanga','2015-04-05 20:53:32','2015-04-06 01:53:32',175);
INSERT INTO `parroquias` VALUES (757,'Cuyuja','2015-04-05 20:53:32','2015-04-06 01:53:32',175);
INSERT INTO `parroquias` VALUES (758,'Papallacta','2015-04-05 20:53:32','2015-04-06 01:53:32',175);
INSERT INTO `parroquias` VALUES (759,'San Francisco De Borja','2015-04-05 20:53:32','2015-04-06 01:53:32',175);
INSERT INTO `parroquias` VALUES (760,'Sumaco','2015-04-05 20:53:33','2015-04-06 01:53:33',175);
INSERT INTO `parroquias` VALUES (761,'Ahuano','2015-04-05 20:53:33','2015-04-06 01:53:33',176);
INSERT INTO `parroquias` VALUES (762,'Chontapunta','2015-04-05 20:53:33','2015-04-06 01:53:33',176);
INSERT INTO `parroquias` VALUES (763,'Pano','2015-04-05 20:53:33','2015-04-06 01:53:33',176);
INSERT INTO `parroquias` VALUES (764,'Puerto Misahualli','2015-04-05 20:53:33','2015-04-06 01:53:33',176);
INSERT INTO `parroquias` VALUES (765,'Puerto Napo','2015-04-05 20:53:33','2015-04-06 01:53:33',176);
INSERT INTO `parroquias` VALUES (766,'Talag','2015-04-05 20:53:33','2015-04-06 01:53:33',176);
INSERT INTO `parroquias` VALUES (767,'Tena','2015-04-05 20:53:33','2015-04-06 01:53:33',176);
INSERT INTO `parroquias` VALUES (768,'Capitan Augusto Ribadeneyra','2015-04-05 20:53:33','2015-04-06 01:53:33',177);
INSERT INTO `parroquias` VALUES (769,'Cononaco','2015-04-05 20:53:33','2015-04-06 01:53:33',177);
INSERT INTO `parroquias` VALUES (770,'Nuevo Rocafuerte','2015-04-05 20:53:33','2015-04-06 01:53:33',177);
INSERT INTO `parroquias` VALUES (771,'Santa Maria De Huiririma','2015-04-05 20:53:33','2015-04-06 01:53:33',177);
INSERT INTO `parroquias` VALUES (772,'Tiputini','2015-04-05 20:53:33','2015-04-06 01:53:33',177);
INSERT INTO `parroquias` VALUES (773,'Yasuni','2015-04-05 20:53:33','2015-04-06 01:53:33',177);
INSERT INTO `parroquias` VALUES (774,'Enokanqui','2015-04-05 20:53:33','2015-04-06 01:53:33',178);
INSERT INTO `parroquias` VALUES (775,'La Joya De Los Sachas','2015-04-05 20:53:33','2015-04-06 01:53:33',178);
INSERT INTO `parroquias` VALUES (776,'Lago San Pedro','2015-04-05 20:53:33','2015-04-06 01:53:33',178);
INSERT INTO `parroquias` VALUES (777,'Pompeya','2015-04-05 20:53:33','2015-04-06 01:53:33',178);
INSERT INTO `parroquias` VALUES (778,'Rumipamba','2015-04-05 20:53:33','2015-04-06 01:53:33',178);
INSERT INTO `parroquias` VALUES (779,'San Carlos','2015-04-05 20:53:33','2015-04-06 01:53:33',178);
INSERT INTO `parroquias` VALUES (780,'San Sebastian Del Coca','2015-04-05 20:53:33','2015-04-06 01:53:33',178);
INSERT INTO `parroquias` VALUES (781,'Tres De Noviembre','2015-04-05 20:53:33','2015-04-06 01:53:33',178);
INSERT INTO `parroquias` VALUES (782,'Union Milagreña','2015-04-05 20:53:33','2015-04-06 01:53:33',178);
INSERT INTO `parroquias` VALUES (783,'Avila','2015-04-05 20:53:33','2015-04-06 01:53:33',179);
INSERT INTO `parroquias` VALUES (784,'Loreto','2015-04-05 20:53:33','2015-04-06 01:53:33',179);
INSERT INTO `parroquias` VALUES (785,'Puerto Murialdo','2015-04-05 20:53:34','2015-04-06 01:53:34',179);
INSERT INTO `parroquias` VALUES (786,'San Jose De Dahuano','2015-04-05 20:53:34','2015-04-06 01:53:34',179);
INSERT INTO `parroquias` VALUES (787,'San Jose De Payamino','2015-04-05 20:53:34','2015-04-06 01:53:34',179);
INSERT INTO `parroquias` VALUES (788,'San Vicente De Huaticocha','2015-04-05 20:53:34','2015-04-06 01:53:34',179);
INSERT INTO `parroquias` VALUES (789,'Alejandro Labaka','2015-04-05 20:53:34','2015-04-06 01:53:34',180);
INSERT INTO `parroquias` VALUES (790,'Dayuma','2015-04-05 20:53:34','2015-04-06 01:53:34',180);
INSERT INTO `parroquias` VALUES (791,'El Dorado','2015-04-05 20:53:34','2015-04-06 01:53:34',180);
INSERT INTO `parroquias` VALUES (792,'El Eden','2015-04-05 20:53:34','2015-04-06 01:53:34',180);
INSERT INTO `parroquias` VALUES (793,'Garcia Moreno','2015-04-05 20:53:34','2015-04-06 01:53:34',180);
INSERT INTO `parroquias` VALUES (794,'Ines Arango','2015-04-05 20:53:34','2015-04-06 01:53:34',180);
INSERT INTO `parroquias` VALUES (795,'La Belleza','2015-04-05 20:53:34','2015-04-06 01:53:34',180);
INSERT INTO `parroquias` VALUES (796,'Nuevo Paraiso','2015-04-05 20:53:34','2015-04-06 01:53:34',180);
INSERT INTO `parroquias` VALUES (797,'Puerto Francisco De Orellana','2015-04-05 20:53:34','2015-04-06 01:53:34',180);
INSERT INTO `parroquias` VALUES (798,'San Jose De Guayusa','2015-04-05 20:53:34','2015-04-06 01:53:34',180);
INSERT INTO `parroquias` VALUES (799,'San Luis De Armenia','2015-04-05 20:53:34','2015-04-06 01:53:34',180);
INSERT INTO `parroquias` VALUES (800,'Taracoa','2015-04-05 20:53:34','2015-04-06 01:53:34',180);
INSERT INTO `parroquias` VALUES (801,'Arajuno','2015-04-05 20:53:34','2015-04-06 01:53:34',181);
INSERT INTO `parroquias` VALUES (802,'Curaray','2015-04-05 20:53:34','2015-04-06 01:53:34',181);
INSERT INTO `parroquias` VALUES (803,'Madre Tierra','2015-04-05 20:53:34','2015-04-06 01:53:34',182);
INSERT INTO `parroquias` VALUES (804,'Mera','2015-04-05 20:53:35','2015-04-06 01:53:35',182);
INSERT INTO `parroquias` VALUES (805,'Shell','2015-04-05 20:53:35','2015-04-06 01:53:35',182);
INSERT INTO `parroquias` VALUES (806,'Canelos','2015-04-05 20:53:35','2015-04-06 01:53:35',183);
INSERT INTO `parroquias` VALUES (807,'Diez De Agosto','2015-04-05 20:53:35','2015-04-06 01:53:35',183);
INSERT INTO `parroquias` VALUES (808,'El Triunfo','2015-04-05 20:53:35','2015-04-06 01:53:35',183);
INSERT INTO `parroquias` VALUES (809,'Fatima','2015-04-05 20:53:35','2015-04-06 01:53:35',183);
INSERT INTO `parroquias` VALUES (810,'Montalvo (Andoas)','2015-04-05 20:53:35','2015-04-06 01:53:35',183);
INSERT INTO `parroquias` VALUES (811,'Pomona','2015-04-05 20:53:35','2015-04-06 01:53:35',183);
INSERT INTO `parroquias` VALUES (812,'Puyo','2015-04-05 20:53:35','2015-04-06 01:53:35',183);
INSERT INTO `parroquias` VALUES (813,'Rio Corrientes','2015-04-05 20:53:35','2015-04-06 01:53:35',183);
INSERT INTO `parroquias` VALUES (814,'Rio Tigre','2015-04-05 20:53:35','2015-04-06 01:53:35',183);
INSERT INTO `parroquias` VALUES (815,'Sarayacu','2015-04-05 20:53:35','2015-04-06 01:53:35',183);
INSERT INTO `parroquias` VALUES (816,'Simon Bolivar','2015-04-05 20:53:35','2015-04-06 01:53:35',183);
INSERT INTO `parroquias` VALUES (817,'Tarqui','2015-04-05 20:53:35','2015-04-06 01:53:35',183);
INSERT INTO `parroquias` VALUES (818,'Teniente Hugo Ortiz','2015-04-05 20:53:35','2015-04-06 01:53:35',183);
INSERT INTO `parroquias` VALUES (819,'Veracruz (Indillama)','2015-04-05 20:53:35','2015-04-06 01:53:35',183);
INSERT INTO `parroquias` VALUES (820,'San Jose','2015-04-05 20:53:36','2015-04-06 01:53:36',184);
INSERT INTO `parroquias` VALUES (821,'Santa Clara','2015-04-05 20:53:36','2015-04-06 01:53:36',184);
INSERT INTO `parroquias` VALUES (822,'Ascazubi','2015-04-05 20:53:36','2015-04-06 01:53:36',185);
INSERT INTO `parroquias` VALUES (823,'Cangahua','2015-04-05 20:53:36','2015-04-06 01:53:36',185);
INSERT INTO `parroquias` VALUES (824,'Cayambe','2015-04-05 20:53:36','2015-04-06 01:53:36',185);
INSERT INTO `parroquias` VALUES (825,'Olmedo (Pesillo)','2015-04-05 20:53:36','2015-04-06 01:53:36',185);
INSERT INTO `parroquias` VALUES (826,'Oton','2015-04-05 20:53:36','2015-04-06 01:53:36',185);
INSERT INTO `parroquias` VALUES (827,'Santa Rosa De Cuzubamba','2015-04-05 20:53:36','2015-04-06 01:53:36',185);
INSERT INTO `parroquias` VALUES (828,'Aloag','2015-04-05 20:53:36','2015-04-06 01:53:36',186);
INSERT INTO `parroquias` VALUES (829,'Aloasi','2015-04-05 20:53:36','2015-04-06 01:53:36',186);
INSERT INTO `parroquias` VALUES (830,'Cutuglahua','2015-04-05 20:53:36','2015-04-06 01:53:36',186);
INSERT INTO `parroquias` VALUES (831,'El Chaupi','2015-04-05 20:53:36','2015-04-06 01:53:36',186);
INSERT INTO `parroquias` VALUES (832,'Machachi','2015-04-05 20:53:36','2015-04-06 01:53:36',186);
INSERT INTO `parroquias` VALUES (833,'Manuel Cornejo Astorga','2015-04-05 20:53:36','2015-04-06 01:53:36',186);
INSERT INTO `parroquias` VALUES (834,'Tambillo','2015-04-05 20:53:37','2015-04-06 01:53:37',186);
INSERT INTO `parroquias` VALUES (835,'Uyumbicho','2015-04-05 20:53:37','2015-04-06 01:53:37',186);
INSERT INTO `parroquias` VALUES (836,'La Esperanza','2015-04-05 20:53:37','2015-04-06 01:53:37',187);
INSERT INTO `parroquias` VALUES (837,'Malchingui','2015-04-05 20:53:37','2015-04-06 01:53:37',187);
INSERT INTO `parroquias` VALUES (838,'Tabacundo','2015-04-05 20:53:37','2015-04-06 01:53:37',187);
INSERT INTO `parroquias` VALUES (839,'Tocachi','2015-04-05 20:53:37','2015-04-06 01:53:37',187);
INSERT INTO `parroquias` VALUES (840,'Tupigachi','2015-04-05 20:53:37','2015-04-06 01:53:37',187);
INSERT INTO `parroquias` VALUES (841,'Pedro Vicente Maldonado','2015-04-05 20:53:37','2015-04-06 01:53:37',188);
INSERT INTO `parroquias` VALUES (842,'Puerto Quito','2015-04-05 20:53:37','2015-04-06 01:53:37',189);
INSERT INTO `parroquias` VALUES (843,'Alangasi','2015-04-05 20:53:37','2015-04-06 01:53:37',190);
INSERT INTO `parroquias` VALUES (844,'Amaguaña','2015-04-05 20:53:37','2015-04-06 01:53:37',190);
INSERT INTO `parroquias` VALUES (845,'Atahualpa (Habaspamba)','2015-04-05 20:53:37','2015-04-06 01:53:37',190);
INSERT INTO `parroquias` VALUES (846,'Calacali','2015-04-05 20:53:37','2015-04-06 01:53:37',190);
INSERT INTO `parroquias` VALUES (847,'Calderon (Carapungo)','2015-04-05 20:53:37','2015-04-06 01:53:37',190);
INSERT INTO `parroquias` VALUES (848,'Chavezpamba','2015-04-05 20:53:37','2015-04-06 01:53:37',190);
INSERT INTO `parroquias` VALUES (849,'Checa (Chilpa)','2015-04-05 20:53:37','2015-04-06 01:53:37',190);
INSERT INTO `parroquias` VALUES (850,'Conocoto','2015-04-05 20:53:38','2015-04-06 01:53:38',190);
INSERT INTO `parroquias` VALUES (851,'Cumbaya','2015-04-05 20:53:38','2015-04-06 01:53:38',190);
INSERT INTO `parroquias` VALUES (852,'El Quinche','2015-04-05 20:53:38','2015-04-06 01:53:38',190);
INSERT INTO `parroquias` VALUES (853,'Gualea','2015-04-05 20:53:38','2015-04-06 01:53:38',190);
INSERT INTO `parroquias` VALUES (854,'Guangopolo','2015-04-05 20:53:38','2015-04-06 01:53:38',190);
INSERT INTO `parroquias` VALUES (855,'Guayllabamba','2015-04-05 20:53:38','2015-04-06 01:53:38',190);
INSERT INTO `parroquias` VALUES (856,'La Merced','2015-04-05 20:53:38','2015-04-06 01:53:38',190);
INSERT INTO `parroquias` VALUES (857,'Llano Chico','2015-04-05 20:53:38','2015-04-06 01:53:38',190);
INSERT INTO `parroquias` VALUES (858,'Lloa','2015-04-05 20:53:38','2015-04-06 01:53:38',190);
INSERT INTO `parroquias` VALUES (859,'Nanegal','2015-04-05 20:53:38','2015-04-06 01:53:38',190);
INSERT INTO `parroquias` VALUES (860,'Nanegalito','2015-04-05 20:53:38','2015-04-06 01:53:38',190);
INSERT INTO `parroquias` VALUES (861,'Nayon','2015-04-05 20:53:38','2015-04-06 01:53:38',190);
INSERT INTO `parroquias` VALUES (862,'Nono','2015-04-05 20:53:38','2015-04-06 01:53:38',190);
INSERT INTO `parroquias` VALUES (863,'Pacto','2015-04-05 20:53:38','2015-04-06 01:53:38',190);
INSERT INTO `parroquias` VALUES (864,'Perucho','2015-04-05 20:53:38','2015-04-06 01:53:38',190);
INSERT INTO `parroquias` VALUES (865,'Pifo','2015-04-05 20:53:39','2015-04-06 01:53:39',190);
INSERT INTO `parroquias` VALUES (866,'Pintag','2015-04-05 20:53:39','2015-04-06 01:53:39',190);
INSERT INTO `parroquias` VALUES (867,'Pomasqui','2015-04-05 20:53:39','2015-04-06 01:53:39',190);
INSERT INTO `parroquias` VALUES (868,'Puellaro','2015-04-05 20:53:39','2015-04-06 01:53:39',190);
INSERT INTO `parroquias` VALUES (869,'Puembo','2015-04-05 20:53:39','2015-04-06 01:53:39',190);
INSERT INTO `parroquias` VALUES (870,'Quito','2015-04-05 20:53:39','2015-04-06 01:53:39',190);
INSERT INTO `parroquias` VALUES (871,'San Antonio','2015-04-05 20:53:39','2015-04-06 01:53:39',190);
INSERT INTO `parroquias` VALUES (872,'San Jose De Minas','2015-04-05 20:53:39','2015-04-06 01:53:39',190);
INSERT INTO `parroquias` VALUES (873,'Tababela','2015-04-05 20:53:39','2015-04-06 01:53:39',190);
INSERT INTO `parroquias` VALUES (874,'Tumbaco','2015-04-05 20:53:39','2015-04-06 01:53:39',190);
INSERT INTO `parroquias` VALUES (875,'Yaruqui','2015-04-05 20:53:39','2015-04-06 01:53:39',190);
INSERT INTO `parroquias` VALUES (876,'Zambiza','2015-04-05 20:53:39','2015-04-06 01:53:39',190);
INSERT INTO `parroquias` VALUES (877,'Cotogchoa','2015-04-05 20:53:39','2015-04-06 01:53:39',191);
INSERT INTO `parroquias` VALUES (878,'Rumipamba','2015-04-05 20:53:40','2015-04-06 01:53:40',191);
INSERT INTO `parroquias` VALUES (879,'Sangolqui','2015-04-05 20:53:40','2015-04-06 01:53:40',191);
INSERT INTO `parroquias` VALUES (880,'Mindo','2015-04-05 20:53:40','2015-04-06 01:53:40',192);
INSERT INTO `parroquias` VALUES (881,'San Miguel De Los Bancos','2015-04-05 20:53:40','2015-04-06 01:53:40',192);
INSERT INTO `parroquias` VALUES (882,'La Libertad','2015-04-05 20:53:40','2015-04-06 01:53:40',193);
INSERT INTO `parroquias` VALUES (883,'Anconcito','2015-04-05 20:53:40','2015-04-06 01:53:40',194);
INSERT INTO `parroquias` VALUES (884,'Jose Luis Tamayo','2015-04-05 20:53:40','2015-04-06 01:53:40',194);
INSERT INTO `parroquias` VALUES (885,'Salinas','2015-04-05 20:53:40','2015-04-06 01:53:40',194);
INSERT INTO `parroquias` VALUES (886,'Atahualpa','2015-04-05 20:53:40','2015-04-06 01:53:40',195);
INSERT INTO `parroquias` VALUES (887,'Chanduy','2015-04-05 20:53:40','2015-04-06 01:53:40',195);
INSERT INTO `parroquias` VALUES (888,'Colonche','2015-04-05 20:53:40','2015-04-06 01:53:40',195);
INSERT INTO `parroquias` VALUES (889,'Manglaralto','2015-04-05 20:53:40','2015-04-06 01:53:40',195);
INSERT INTO `parroquias` VALUES (890,'San Jose De Ancon','2015-04-05 20:53:40','2015-04-06 01:53:40',195);
INSERT INTO `parroquias` VALUES (891,'Santa Elena','2015-04-05 20:53:40','2015-04-06 01:53:40',195);
INSERT INTO `parroquias` VALUES (892,'Simon Bolivar','2015-04-05 20:53:40','2015-04-06 01:53:40',195);
INSERT INTO `parroquias` VALUES (893,'Alluriquin','2015-04-05 20:53:40','2015-04-06 01:53:40',196);
INSERT INTO `parroquias` VALUES (894,'El Esfuerzo','2015-04-05 20:53:40','2015-04-06 01:53:40',196);
INSERT INTO `parroquias` VALUES (895,'Luz De America','2015-04-05 20:53:40','2015-04-06 01:53:40',196);
INSERT INTO `parroquias` VALUES (896,'Puerto Limon','2015-04-05 20:53:40','2015-04-06 01:53:40',196);
INSERT INTO `parroquias` VALUES (897,'San Jacinto Del Bua','2015-04-05 20:53:40','2015-04-06 01:53:40',196);
INSERT INTO `parroquias` VALUES (898,'Santa Maria Del Toachi','2015-04-05 20:53:40','2015-04-06 01:53:40',196);
INSERT INTO `parroquias` VALUES (899,'Santo Domingo De Los Colorados','2015-04-05 20:53:40','2015-04-06 01:53:40',196);
INSERT INTO `parroquias` VALUES (900,'Valle Hermoso','2015-04-05 20:53:40','2015-04-06 01:53:40',196);
INSERT INTO `parroquias` VALUES (901,'El Dorado De Cascales','2015-04-05 20:53:40','2015-04-06 01:53:40',197);
INSERT INTO `parroquias` VALUES (902,'Santa Rosa De Sucumbios','2015-04-05 20:53:40','2015-04-06 01:53:40',197);
INSERT INTO `parroquias` VALUES (903,'Sevilla','2015-04-05 20:53:40','2015-04-06 01:53:40',197);
INSERT INTO `parroquias` VALUES (904,'Aguas Negras','2015-04-05 20:53:40','2015-04-06 01:53:40',198);
INSERT INTO `parroquias` VALUES (905,'Cuyabeno','2015-04-05 20:53:40','2015-04-06 01:53:40',198);
INSERT INTO `parroquias` VALUES (906,'Tarapoa','2015-04-05 20:53:40','2015-04-06 01:53:40',198);
INSERT INTO `parroquias` VALUES (907,'El Reventador','2015-04-05 20:53:40','2015-04-06 01:53:40',199);
INSERT INTO `parroquias` VALUES (908,'Gonzalo Pizarro','2015-04-05 20:53:41','2015-04-06 01:53:41',199);
INSERT INTO `parroquias` VALUES (909,'Lumbaqui','2015-04-05 20:53:41','2015-04-06 01:53:41',199);
INSERT INTO `parroquias` VALUES (910,'Puerto Libre','2015-04-05 20:53:41','2015-04-06 01:53:41',199);
INSERT INTO `parroquias` VALUES (911,'Dureno','2015-04-05 20:53:41','2015-04-06 01:53:41',200);
INSERT INTO `parroquias` VALUES (912,'El Eno','2015-04-05 20:53:41','2015-04-06 01:53:41',200);
INSERT INTO `parroquias` VALUES (913,'General Farfan','2015-04-05 20:53:41','2015-04-06 01:53:41',200);
INSERT INTO `parroquias` VALUES (914,'Jambeli','2015-04-05 20:53:41','2015-04-06 01:53:41',200);
INSERT INTO `parroquias` VALUES (915,'Nueva Loja','2015-04-05 20:53:41','2015-04-06 01:53:41',200);
INSERT INTO `parroquias` VALUES (916,'Pacayacu','2015-04-05 20:53:41','2015-04-06 01:53:41',200);
INSERT INTO `parroquias` VALUES (917,'Sta. Cecilia','2015-04-05 20:53:41','2015-04-06 01:53:41',200);
INSERT INTO `parroquias` VALUES (918,'Palma Roja','2015-04-05 20:53:41','2015-04-06 01:53:41',201);
INSERT INTO `parroquias` VALUES (919,'Puerto Bolivar','2015-04-05 20:53:41','2015-04-06 01:53:41',201);
INSERT INTO `parroquias` VALUES (920,'Puerto El Carmen Del Putumayo','2015-04-05 20:53:41','2015-04-06 01:53:41',201);
INSERT INTO `parroquias` VALUES (921,'Puerto Rodriguez','2015-04-05 20:53:41','2015-04-06 01:53:41',201);
INSERT INTO `parroquias` VALUES (922,'Santa Elena','2015-04-05 20:53:41','2015-04-06 01:53:41',201);
INSERT INTO `parroquias` VALUES (923,'Limoncocha','2015-04-05 20:53:41','2015-04-06 01:53:41',202);
INSERT INTO `parroquias` VALUES (924,'Pañacocha','2015-04-05 20:53:41','2015-04-06 01:53:41',202);
INSERT INTO `parroquias` VALUES (925,'San Pedro De Los Cofanes','2015-04-05 20:53:41','2015-04-06 01:53:41',202);
INSERT INTO `parroquias` VALUES (926,'San Roque','2015-04-05 20:53:41','2015-04-06 01:53:41',202);
INSERT INTO `parroquias` VALUES (927,'Shushufindi','2015-04-05 20:53:41','2015-04-06 01:53:41',202);
INSERT INTO `parroquias` VALUES (928,'Siete De Julio','2015-04-05 20:53:41','2015-04-06 01:53:41',202);
INSERT INTO `parroquias` VALUES (929,'El Playon De San Francis','2015-04-05 20:53:41','2015-04-06 01:53:41',203);
INSERT INTO `parroquias` VALUES (930,'La Bonita','2015-04-05 20:53:41','2015-04-06 01:53:41',203);
INSERT INTO `parroquias` VALUES (931,'La Sofia','2015-04-05 20:53:41','2015-04-06 01:53:41',203);
INSERT INTO `parroquias` VALUES (932,'Rosa Florida','2015-04-05 20:53:41','2015-04-06 01:53:41',203);
INSERT INTO `parroquias` VALUES (933,'Santa Barbara','2015-04-05 20:53:41','2015-04-06 01:53:41',203);
INSERT INTO `parroquias` VALUES (934,'Ambatillo','2015-04-05 20:53:41','2015-04-06 01:53:41',204);
INSERT INTO `parroquias` VALUES (935,'Ambato','2015-04-05 20:53:41','2015-04-06 01:53:41',204);
INSERT INTO `parroquias` VALUES (936,'Atahualpa (Chisalata)','2015-04-05 20:53:41','2015-04-06 01:53:41',204);
INSERT INTO `parroquias` VALUES (937,'Augusto N. Martinez','2015-04-05 20:53:41','2015-04-06 01:53:41',204);
INSERT INTO `parroquias` VALUES (938,'Constantino Fernandez','2015-04-05 20:53:41','2015-04-06 01:53:41',204);
INSERT INTO `parroquias` VALUES (939,'Cunchibamba','2015-04-05 20:53:41','2015-04-06 01:53:41',204);
INSERT INTO `parroquias` VALUES (940,'Huachi Grande','2015-04-05 20:53:41','2015-04-06 01:53:41',204);
INSERT INTO `parroquias` VALUES (941,'Izamba','2015-04-05 20:53:41','2015-04-06 01:53:41',204);
INSERT INTO `parroquias` VALUES (942,'Juan Benigno Vela','2015-04-05 20:53:41','2015-04-06 01:53:41',204);
INSERT INTO `parroquias` VALUES (943,'Montalvo','2015-04-05 20:53:41','2015-04-06 01:53:41',204);
INSERT INTO `parroquias` VALUES (944,'Pasa','2015-04-05 20:53:41','2015-04-06 01:53:41',204);
INSERT INTO `parroquias` VALUES (945,'Picaigua','2015-04-05 20:53:42','2015-04-06 01:53:42',204);
INSERT INTO `parroquias` VALUES (946,'Pilaguin (Pilahuin)','2015-04-05 20:53:42','2015-04-06 01:53:42',204);
INSERT INTO `parroquias` VALUES (947,'Quisapincha (Quizapincha)','2015-04-05 20:53:42','2015-04-06 01:53:42',204);
INSERT INTO `parroquias` VALUES (948,'San Bartolome De Pinllog','2015-04-05 20:53:42','2015-04-06 01:53:42',204);
INSERT INTO `parroquias` VALUES (949,'San Fernando','2015-04-05 20:53:42','2015-04-06 01:53:42',204);
INSERT INTO `parroquias` VALUES (950,'Santa Rosa','2015-04-05 20:53:42','2015-04-06 01:53:42',204);
INSERT INTO `parroquias` VALUES (951,'Totoras','2015-04-05 20:53:42','2015-04-06 01:53:42',204);
INSERT INTO `parroquias` VALUES (952,'Unamuncho','2015-04-05 20:53:42','2015-04-06 01:53:42',204);
INSERT INTO `parroquias` VALUES (953,'Baños','2015-04-05 20:53:42','2015-04-06 01:53:42',205);
INSERT INTO `parroquias` VALUES (954,'Lligua','2015-04-05 20:53:42','2015-04-06 01:53:42',205);
INSERT INTO `parroquias` VALUES (955,'Rio Negro','2015-04-05 20:53:42','2015-04-06 01:53:42',205);
INSERT INTO `parroquias` VALUES (956,'Rio Verde','2015-04-05 20:53:42','2015-04-06 01:53:42',205);
INSERT INTO `parroquias` VALUES (957,'Ulba','2015-04-05 20:53:42','2015-04-06 01:53:42',205);
INSERT INTO `parroquias` VALUES (958,'Cevallos','2015-04-05 20:53:42','2015-04-06 01:53:42',206);
INSERT INTO `parroquias` VALUES (959,'Mocha','2015-04-05 20:53:42','2015-04-06 01:53:42',207);
INSERT INTO `parroquias` VALUES (960,'Pinguili','2015-04-05 20:53:42','2015-04-06 01:53:42',207);
INSERT INTO `parroquias` VALUES (961,'El Triunfo','2015-04-05 20:53:42','2015-04-06 01:53:42',208);
INSERT INTO `parroquias` VALUES (962,'Los Andes','2015-04-05 20:53:42','2015-04-06 01:53:42',208);
INSERT INTO `parroquias` VALUES (963,'Patate','2015-04-05 20:53:42','2015-04-06 01:53:42',208);
INSERT INTO `parroquias` VALUES (964,'Sucre','2015-04-05 20:53:42','2015-04-06 01:53:42',208);
INSERT INTO `parroquias` VALUES (965,'Quero','2015-04-05 20:53:42','2015-04-06 01:53:42',209);
INSERT INTO `parroquias` VALUES (966,'Rumipamba','2015-04-05 20:53:42','2015-04-06 01:53:42',209);
INSERT INTO `parroquias` VALUES (967,'Yanayacu - Mochapata','2015-04-05 20:53:42','2015-04-06 01:53:42',209);
INSERT INTO `parroquias` VALUES (968,'Benitez (Pachanlica)','2015-04-05 20:53:42','2015-04-06 01:53:42',210);
INSERT INTO `parroquias` VALUES (969,'Bolivar','2015-04-05 20:53:42','2015-04-06 01:53:42',210);
INSERT INTO `parroquias` VALUES (970,'Chiquicha','2015-04-05 20:53:42','2015-04-06 01:53:42',210);
INSERT INTO `parroquias` VALUES (971,'Cotalo','2015-04-05 20:53:43','2015-04-06 01:53:43',210);
INSERT INTO `parroquias` VALUES (972,'El Rosario (Rumichaca)','2015-04-05 20:53:43','2015-04-06 01:53:43',210);
INSERT INTO `parroquias` VALUES (973,'Garcia Moreno (Chumaqui)','2015-04-05 20:53:43','2015-04-06 01:53:43',210);
INSERT INTO `parroquias` VALUES (974,'Guambalo (Huambalo)','2015-04-05 20:53:43','2015-04-06 01:53:43',210);
INSERT INTO `parroquias` VALUES (975,'Pelileo','2015-04-05 20:53:43','2015-04-06 01:53:43',210);
INSERT INTO `parroquias` VALUES (976,'Salasaca','2015-04-05 20:53:43','2015-04-06 01:53:43',210);
INSERT INTO `parroquias` VALUES (977,'Baquerizo Moreno','2015-04-05 20:53:43','2015-04-06 01:53:43',211);
INSERT INTO `parroquias` VALUES (978,'Emilio Maria Teran','2015-04-05 20:53:43','2015-04-06 01:53:43',211);
INSERT INTO `parroquias` VALUES (979,'Marcos Espinel (Chacata)','2015-04-05 20:53:43','2015-04-06 01:53:43',211);
INSERT INTO `parroquias` VALUES (980,'Pillaro','2015-04-05 20:53:43','2015-04-06 01:53:43',211);
INSERT INTO `parroquias` VALUES (981,'Presidente Urbina','2015-04-05 20:53:43','2015-04-06 01:53:43',211);
INSERT INTO `parroquias` VALUES (982,'San Andres','2015-04-05 20:53:43','2015-04-06 01:53:43',211);
INSERT INTO `parroquias` VALUES (983,'San Jose De Poalo','2015-04-05 20:53:43','2015-04-06 01:53:43',211);
INSERT INTO `parroquias` VALUES (984,'San Miguelito','2015-04-05 20:53:43','2015-04-06 01:53:43',211);
INSERT INTO `parroquias` VALUES (985,'Quinchicoto','2015-04-05 20:53:43','2015-04-06 01:53:43',212);
INSERT INTO `parroquias` VALUES (986,'Tisaleo','2015-04-05 20:53:43','2015-04-06 01:53:43',212);
INSERT INTO `parroquias` VALUES (987,'Zumbi','2015-04-05 20:53:43','2015-04-06 01:53:43',213);
INSERT INTO `parroquias` VALUES (988,'Chito','2015-04-05 20:53:43','2015-04-06 01:53:43',214);
INSERT INTO `parroquias` VALUES (989,'El Chorro','2015-04-05 20:53:43','2015-04-06 01:53:43',214);
INSERT INTO `parroquias` VALUES (990,'La Chonta','2015-04-05 20:53:43','2015-04-06 01:53:43',214);
INSERT INTO `parroquias` VALUES (991,'Pucapamba','2015-04-05 20:53:43','2015-04-06 01:53:43',214);
INSERT INTO `parroquias` VALUES (992,'San Andres','2015-04-05 20:53:44','2015-04-06 01:53:44',214);
INSERT INTO `parroquias` VALUES (993,'Zumba','2015-04-05 20:53:44','2015-04-06 01:53:44',214);
INSERT INTO `parroquias` VALUES (994,'El Guismi','2015-04-05 20:53:44','2015-04-06 01:53:44',215);
INSERT INTO `parroquias` VALUES (995,'El Pangui','2015-04-05 20:53:44','2015-04-06 01:53:44',215);
INSERT INTO `parroquias` VALUES (996,'Pachicutza','2015-04-05 20:53:44','2015-04-06 01:53:44',215);
INSERT INTO `parroquias` VALUES (997,'Tundayme','2015-04-05 20:53:44','2015-04-06 01:53:44',215);
INSERT INTO `parroquias` VALUES (998,'Guayzimi','2015-04-05 20:53:44','2015-04-06 01:53:44',216);
INSERT INTO `parroquias` VALUES (999,'Nuevo Paraiso','2015-04-05 20:53:44','2015-04-06 01:53:44',216);
INSERT INTO `parroquias` VALUES (1000,'Zurmi','2015-04-05 20:53:44','2015-04-06 01:53:44',216);
INSERT INTO `parroquias` VALUES (1001,'El Porvenir Del Carmen','2015-04-05 20:53:44','2015-04-06 01:53:44',217);
INSERT INTO `parroquias` VALUES (1002,'La Canela','2015-04-05 20:53:44','2015-04-06 01:53:44',217);
INSERT INTO `parroquias` VALUES (1003,'Palanda','2015-04-05 20:53:44','2015-04-06 01:53:44',217);
INSERT INTO `parroquias` VALUES (1004,'San Francisco De Vergel','2015-04-05 20:53:44','2015-04-06 01:53:44',217);
INSERT INTO `parroquias` VALUES (1005,'Valladolid','2015-04-05 20:53:44','2015-04-06 01:53:44',217);
INSERT INTO `parroquias` VALUES (1006,'Bellavista','2015-04-05 20:53:44','2015-04-06 01:53:44',218);
INSERT INTO `parroquias` VALUES (1007,'Nuevo Quito','2015-04-05 20:53:44','2015-04-06 01:53:44',218);
INSERT INTO `parroquias` VALUES (1008,'Paquisha','2015-04-05 20:53:44','2015-04-06 01:53:44',218);
INSERT INTO `parroquias` VALUES (1009,'28 De Mayo','2015-04-05 20:53:45','2015-04-06 01:53:45',219);
INSERT INTO `parroquias` VALUES (1010,'La Paz','2015-04-05 20:53:45','2015-04-06 01:53:45',219);
INSERT INTO `parroquias` VALUES (1011,'Tutupali','2015-04-05 20:53:45','2015-04-06 01:53:45',219);
INSERT INTO `parroquias` VALUES (1012,'Chicaña','2015-04-05 20:53:45','2015-04-06 01:53:45',220);
INSERT INTO `parroquias` VALUES (1013,'Los Encuentros','2015-04-05 20:53:45','2015-04-06 01:53:45',220);
INSERT INTO `parroquias` VALUES (1014,'Yanzatza','2015-04-05 20:53:45','2015-04-06 01:53:45',220);
INSERT INTO `parroquias` VALUES (1015,'Cumbaratza','2015-04-05 20:53:45','2015-04-06 01:53:45',221);
INSERT INTO `parroquias` VALUES (1016,'Guadalupe','2015-04-05 20:53:45','2015-04-06 01:53:45',221);
INSERT INTO `parroquias` VALUES (1017,'Imbana','2015-04-05 20:53:45','2015-04-06 01:53:45',221);
INSERT INTO `parroquias` VALUES (1018,'Sabanilla','2015-04-05 20:53:45','2015-04-06 01:53:45',221);
INSERT INTO `parroquias` VALUES (1019,'San Carlos De Las Minas','2015-04-05 20:53:45','2015-04-06 01:53:45',221);
INSERT INTO `parroquias` VALUES (1020,'Timbara','2015-04-05 20:53:45','2015-04-06 01:53:45',221);
INSERT INTO `parroquias` VALUES (1021,'Zamora','2015-04-05 20:53:45','2015-04-06 01:53:45',221);
INSERT INTO `parroquias` VALUES (1022,'El Piedrero','2015-04-05 20:53:45','2015-04-06 01:53:45',222);
INSERT INTO `parroquias` VALUES (1023,'Las Golondrinas','2015-04-05 20:53:45','2015-04-06 01:53:45',223);
INSERT INTO `parroquias` VALUES (1024,'Manga Del Cura','2015-04-05 20:53:46','2015-04-06 01:53:46',224);
/*!40000 ALTER TABLE `parroquias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `periodos_salida`
--

DROP TABLE IF EXISTS `periodos_salida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `periodos_salida` (
  `PRD_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PRD_FECHA_INICIO` date NOT NULL,
  `PRD_FECHA_FIN` date NOT NULL,
  `PRD_HORA_INICIO` time NOT NULL,
  `PRD_HORA_FIN` time NOT NULL,
  `PRD_HORAS_DISPONIBLES` int(11) NOT NULL,
  `PRD_ESTADO` tinyint(1) NOT NULL DEFAULT '1',
  `PRD_CREADO` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `PRD_MODIFICADO` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `EMPLEADO_ID` int(11) NOT NULL,
  `TIPO_PERMISO_ID` int(11) NOT NULL,
  PRIMARY KEY (`PRD_ID`),
  KEY `FK_EMPLEADO_PERIODO_ID` (`EMPLEADO_ID`),
  KEY `FK_TIPO_PERMISO_ID` (`TIPO_PERMISO_ID`),
  CONSTRAINT `FK_EMPLEADO_PERIODO_ID` FOREIGN KEY (`EMPLEADO_ID`) REFERENCES `empleados` (`EMP_ID`),
  CONSTRAINT `FK_TIPO_PERMISO_ID` FOREIGN KEY (`TIPO_PERMISO_ID`) REFERENCES `tipos_permiso` (`TPP_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `periodos_salida`
--

LOCK TABLES `periodos_salida` WRITE;
/*!40000 ALTER TABLE `periodos_salida` DISABLE KEYS */;
/*!40000 ALTER TABLE `periodos_salida` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permisos`
--

DROP TABLE IF EXISTS `permisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permisos` (
  `PRM_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ROL_ID` int(11) NOT NULL,
  `MODULO_ID` int(11) DEFAULT NULL,
  `ACCION_ID` int(11) DEFAULT NULL,
  `ACTIVADO` tinyint(1) NOT NULL DEFAULT '1',
  `CREADO` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `MODIFICADO` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`PRM_ID`),
  UNIQUE KEY `UK_PERMISO` (`ROL_ID`,`MODULO_ID`,`ACCION_ID`),
  KEY `FK_MODULO_ID` (`MODULO_ID`),
  KEY `FK_ACCION_ID` (`ACCION_ID`),
  KEY `FK_ROL_ID` (`ROL_ID`),
  CONSTRAINT `FK_ACCION_ID` FOREIGN KEY (`ACCION_ID`) REFERENCES `acciones` (`ACC_ID`),
  CONSTRAINT `FK_MODULO_ID` FOREIGN KEY (`MODULO_ID`) REFERENCES `modulos` (`MDL_ID`),
  CONSTRAINT `FK_ROL_ID` FOREIGN KEY (`ROL_ID`) REFERENCES `roles` (`RLS_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permisos`
--

LOCK TABLES `permisos` WRITE;
/*!40000 ALTER TABLE `permisos` DISABLE KEYS */;
INSERT INTO `permisos` VALUES (1,1,1,1,1,'2015-03-31 00:59:44','2015-04-03 08:13:42');
INSERT INTO `permisos` VALUES (2,1,2,1,1,'2015-03-31 00:59:44','2015-03-31 05:59:44');
INSERT INTO `permisos` VALUES (3,1,3,1,1,'2015-03-31 00:59:44','2015-03-31 05:59:44');
INSERT INTO `permisos` VALUES (4,1,4,1,1,'2015-03-31 00:59:44','2015-03-31 05:59:44');
INSERT INTO `permisos` VALUES (5,1,1,2,1,'2015-03-31 00:59:44','2015-03-31 05:59:44');
INSERT INTO `permisos` VALUES (6,1,2,2,1,'2015-03-31 00:59:44','2015-03-31 05:59:44');
INSERT INTO `permisos` VALUES (7,1,3,2,1,'2015-03-31 00:59:44','2015-03-31 05:59:44');
INSERT INTO `permisos` VALUES (8,1,4,2,1,'2015-03-31 00:59:44','2015-03-31 05:59:44');
INSERT INTO `permisos` VALUES (9,1,5,2,1,'2015-03-31 00:59:44','2015-03-31 05:59:44');
INSERT INTO `permisos` VALUES (10,1,6,2,1,'2015-03-31 00:59:45','2015-03-31 05:59:45');
INSERT INTO `permisos` VALUES (11,1,7,2,1,'2015-03-31 00:59:45','2015-03-31 05:59:45');
INSERT INTO `permisos` VALUES (12,1,1,3,1,'2015-03-31 00:59:45','2015-03-31 05:59:45');
INSERT INTO `permisos` VALUES (13,1,2,3,1,'2015-03-31 00:59:45','2015-03-31 05:59:45');
INSERT INTO `permisos` VALUES (14,1,3,3,1,'2015-03-31 00:59:45','2015-03-31 05:59:45');
INSERT INTO `permisos` VALUES (15,1,4,3,1,'2015-03-31 00:59:45','2015-03-31 05:59:45');
INSERT INTO `permisos` VALUES (16,2,1,2,1,'2015-03-31 00:59:45','2015-04-03 07:30:54');
INSERT INTO `permisos` VALUES (17,2,2,2,1,'2015-03-31 00:59:45','2015-03-31 05:59:45');
INSERT INTO `permisos` VALUES (18,2,3,2,1,'2015-03-31 00:59:45','2015-03-31 05:59:45');
INSERT INTO `permisos` VALUES (24,3,2,2,0,'0000-00-00 00:00:00','2015-04-10 01:13:20');
INSERT INTO `permisos` VALUES (25,3,1,2,0,'0000-00-00 00:00:00','2015-04-10 01:31:35');
INSERT INTO `permisos` VALUES (26,1,6,3,1,'0000-00-00 00:00:00','2015-04-05 06:35:53');
INSERT INTO `permisos` VALUES (27,1,7,1,1,'0000-00-00 00:00:00','2015-04-05 06:43:01');
INSERT INTO `permisos` VALUES (28,1,7,3,1,'0000-00-00 00:00:00','2015-04-05 06:44:36');
/*!40000 ALTER TABLE `permisos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provincias`
--

DROP TABLE IF EXISTS `provincias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provincias` (
  `PRV_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PRV_NOMBRE` varchar(60) DEFAULT NULL,
  `PRV_CREADO` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `PRV_MODIFICADO` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`PRV_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provincias`
--

LOCK TABLES `provincias` WRITE;
/*!40000 ALTER TABLE `provincias` DISABLE KEYS */;
INSERT INTO `provincias` VALUES (1,'Azuay','2015-04-05 16:21:38','2015-04-05 21:21:38');
INSERT INTO `provincias` VALUES (2,'Bolivar','2015-04-05 16:22:14','2015-04-05 21:22:14');
INSERT INTO `provincias` VALUES (3,'Cañar','2015-04-05 16:22:14','2015-04-05 21:22:14');
INSERT INTO `provincias` VALUES (4,'Carchi','2015-04-05 16:22:14','2015-04-05 21:22:14');
INSERT INTO `provincias` VALUES (5,'Chimborazo','2015-04-05 16:22:14','2015-04-05 21:22:14');
INSERT INTO `provincias` VALUES (6,'Cotopaxi','2015-04-05 16:22:14','2015-04-05 21:22:14');
INSERT INTO `provincias` VALUES (7,'El Oro','2015-04-05 16:22:14','2015-04-05 21:22:14');
INSERT INTO `provincias` VALUES (8,'Esmeraldas','2015-04-05 16:22:14','2015-04-05 21:22:14');
INSERT INTO `provincias` VALUES (9,'Galápagos','2015-04-05 16:22:14','2015-04-05 21:22:14');
INSERT INTO `provincias` VALUES (10,'Guayas','2015-04-05 16:22:14','2015-04-05 21:22:14');
INSERT INTO `provincias` VALUES (11,'Imbabura','2015-04-05 16:22:14','2015-04-05 21:22:14');
INSERT INTO `provincias` VALUES (12,'Loja','2015-04-05 16:22:14','2015-04-05 21:22:14');
INSERT INTO `provincias` VALUES (13,'Los Rios','2015-04-05 16:22:14','2015-04-05 21:22:14');
INSERT INTO `provincias` VALUES (14,'Manabi','2015-04-05 16:22:14','2015-04-05 21:22:14');
INSERT INTO `provincias` VALUES (15,'Morona Santiago','2015-04-05 16:22:14','2015-04-05 21:22:14');
INSERT INTO `provincias` VALUES (16,'Napo','2015-04-05 16:22:14','2015-04-05 21:22:14');
INSERT INTO `provincias` VALUES (17,'Orellana','2015-04-05 16:22:14','2015-04-05 21:22:14');
INSERT INTO `provincias` VALUES (18,'Pastaza','2015-04-05 16:22:14','2015-04-05 21:22:14');
INSERT INTO `provincias` VALUES (19,'Pichincha','2015-04-05 16:22:14','2015-04-05 21:22:14');
INSERT INTO `provincias` VALUES (20,'Santa Elena','2015-04-05 16:22:14','2015-04-05 21:22:14');
INSERT INTO `provincias` VALUES (21,'Santo Domingo','2015-04-05 16:22:14','2015-04-05 21:22:14');
INSERT INTO `provincias` VALUES (22,'Sucumbíos','2015-04-05 16:22:14','2015-04-05 21:22:14');
INSERT INTO `provincias` VALUES (23,'Tungurahua','2015-04-05 16:22:14','2015-04-05 21:22:14');
INSERT INTO `provincias` VALUES (24,'Zamora Chinchipe','2015-04-05 16:22:14','2015-04-05 21:22:14');
INSERT INTO `provincias` VALUES (25,'Zonas No Delimitadas','2015-04-05 16:22:14','2015-04-05 21:22:14');
/*!40000 ALTER TABLE `provincias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proyectos`
--

DROP TABLE IF EXISTS `proyectos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proyectos` (
  `PRY_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PRY_NOMBRE` varchar(60) DEFAULT NULL,
  `PRY_CREADO` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `PRY_MODIFICADO` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`PRY_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proyectos`
--

LOCK TABLES `proyectos` WRITE;
/*!40000 ALTER TABLE `proyectos` DISABLE KEYS */;
/*!40000 ALTER TABLE `proyectos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `RLS_ID` int(11) NOT NULL AUTO_INCREMENT,
  `RLS_DESCRIPCION` varchar(50) COLLATE utf8_bin NOT NULL,
  `ACTIVADO` tinyint(1) NOT NULL DEFAULT '1',
  `CREADO` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `MODIFICADO` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`RLS_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Administrador',1,'2015-03-31 00:42:12','2015-03-31 05:42:12');
INSERT INTO `roles` VALUES (2,'Empleado',1,'2015-03-31 00:42:43','2015-03-31 05:42:43');
INSERT INTO `roles` VALUES (3,'Sin permisos',1,'0000-00-00 00:00:00','2015-04-10 01:11:11');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tarjetas`
--

DROP TABLE IF EXISTS `tarjetas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tarjetas` (
  `TRJ_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TRJ_VALOR` char(32) DEFAULT NULL,
  `TRJ_CREADO` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `TRJ_MODIFICADO` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`TRJ_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tarjetas`
--

LOCK TABLES `tarjetas` WRITE;
/*!40000 ALTER TABLE `tarjetas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tarjetas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `telefonos`
--

DROP TABLE IF EXISTS `telefonos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `telefonos` (
  `TLF_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TLF_NUMERO` varchar(11) DEFAULT NULL,
  `TLF_CREADO` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `TLF_MODIFICADO` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `EMPLEADO_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`TLF_ID`),
  KEY `FK_EMPLEADO_ID` (`EMPLEADO_ID`),
  CONSTRAINT `FK_EMPLEADO_ID` FOREIGN KEY (`EMPLEADO_ID`) REFERENCES `empleados` (`EMP_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `telefonos`
--

LOCK TABLES `telefonos` WRITE;
/*!40000 ALTER TABLE `telefonos` DISABLE KEYS */;
/*!40000 ALTER TABLE `telefonos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipos`
--

DROP TABLE IF EXISTS `tipos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipos` (
  `TIP_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TIP_NOMBRE` varchar(10) DEFAULT NULL,
  `TIP_CREADO` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `TIP_MODIFICADO` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`TIP_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos`
--

LOCK TABLES `tipos` WRITE;
/*!40000 ALTER TABLE `tipos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipos_permiso`
--

DROP TABLE IF EXISTS `tipos_permiso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipos_permiso` (
  `TPP_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TPP_DESCRIPCION` varchar(50) NOT NULL,
  `TPP_ACTIVADO` tinyint(1) NOT NULL DEFAULT '1',
  `TPP_CREADO` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `TPP_MODIFICADO` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`TPP_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos_permiso`
--

LOCK TABLES `tipos_permiso` WRITE;
/*!40000 ALTER TABLE `tipos_permiso` DISABLE KEYS */;
INSERT INTO `tipos_permiso` VALUES (1,'Paternidad',1,'2015-05-21 21:33:08','2015-05-22 02:33:08');
/*!40000 ALTER TABLE `tipos_permiso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_autologin`
--

DROP TABLE IF EXISTS `user_autologin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_autologin` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`key_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_autologin`
--

LOCK TABLES `user_autologin` WRITE;
/*!40000 ALTER TABLE `user_autologin` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_autologin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_profiles`
--

DROP TABLE IF EXISTS `user_profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `country` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_profiles`
--

LOCK TABLES `user_profiles` WRITE;
/*!40000 ALTER TABLE `user_profiles` DISABLE KEYS */;
INSERT INTO `user_profiles` VALUES (1,2,NULL,NULL);
/*!40000 ALTER TABLE `user_profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '1',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `new_password_key` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `new_password_requested` datetime DEFAULT NULL,
  `new_email` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `new_email_key` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `last_ip` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `group_id` int(11) NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`),
  KEY `FK_ROL_USER_ID` (`group_id`),
  CONSTRAINT `FK_ROL_USER_ID` FOREIGN KEY (`group_id`) REFERENCES `roles` (`RLS_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','$2a$08$hhroDoFe4DyNAkDPmrhoh./UzIjifcT/2pzApLoriRnNroeWFc2Tu','admin@admin.com',1,0,NULL,NULL,NULL,NULL,'1eb29d2deb07b87d3d2db6f567bf683a','::1','2015-05-22 02:27:07','2015-03-15 01:30:16','2015-05-22 00:27:07',1);
INSERT INTO `users` VALUES (2,'byr_070@hotmail.com','$2a$08$9L/GRAjbCsIiQVtpYfNwYO0nC8eB/HDQFjs/2p/59F7KHQjQv2RhS','byr_070@hotmail.com',1,0,NULL,NULL,NULL,NULL,NULL,'::1','0000-00-00 00:00:00','2015-05-22 03:43:04','2015-05-22 02:45:33',2);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vacaciones`
--

DROP TABLE IF EXISTS `vacaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vacaciones` (
  `VCC_ID` int(11) NOT NULL AUTO_INCREMENT,
  `VCC_FECHA_INICIO` date NOT NULL,
  `VCC_FECHA_FIN` date NOT NULL,
  `VCC_DIAS_DISPONIBLES` int(11) NOT NULL,
  `VCC_ACTIVADO` tinyint(1) NOT NULL DEFAULT '1',
  `VCC_CREADO` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `VCC_MODIFICADO` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `EMPLEADO_ID` int(11) NOT NULL,
  PRIMARY KEY (`VCC_ID`),
  KEY `FK_EMPLEADO_VACACION_ID` (`EMPLEADO_ID`),
  CONSTRAINT `FK_EMPLEADO_VACACION_ID` FOREIGN KEY (`EMPLEADO_ID`) REFERENCES `empleados` (`EMP_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vacaciones`
--

LOCK TABLES `vacaciones` WRITE;
/*!40000 ALTER TABLE `vacaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `vacaciones` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-05-21 21:50:42
