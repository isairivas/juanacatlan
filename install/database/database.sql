-- MySQL dump 10.13  Distrib 5.6.13, for osx10.7 (x86_64)
--
-- Host: localhost    Database: juanacatlan
-- ------------------------------------------------------
-- Server version	5.6.13

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
-- Table structure for table `categorias_transparencia`
--

DROP TABLE IF EXISTS `categorias_transparencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias_transparencia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text,
  `clave` varchar(255) DEFAULT NULL,
  `status` enum('ACTIVO','INACTIVO') NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias_transparencia`
--

LOCK TABLES `categorias_transparencia` WRITE;
/*!40000 ALTER TABLE `categorias_transparencia` DISABLE KEYS */;
INSERT INTO `categorias_transparencia` VALUES (1,'Articulo 32',NULL,'articulo_32','ACTIVO','2013-08-21 00:00:00'),(2,'Articulo 39',NULL,'articulo_39','ACTIVO','2013-08-21 00:00:00');
/*!40000 ALTER TABLE `categorias_transparencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eventos`
--

DROP TABLE IF EXISTS `eventos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eventos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `descripcion` text,
  `mes` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eventos`
--

LOCK TABLES `eventos` WRITE;
/*!40000 ALTER TABLE `eventos` DISABLE KEYS */;
INSERT INTO `eventos` VALUES (2,'Prueba','2013-10-01','asdasdasdsadasd',10);
/*!40000 ALTER TABLE `eventos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `noticias`
--

DROP TABLE IF EXISTS `noticias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `noticias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `contenido` text,
  `fecha` date NOT NULL,
  `status` enum('ACTIVO','INACTIVO') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `noticias`
--

LOCK TABLES `noticias` WRITE;
/*!40000 ALTER TABLE `noticias` DISABLE KEYS */;
INSERT INTO `noticias` VALUES (1,'Prueba','','Supongamos que realizamos un estudio sobre la poblaciÃ³n de estudiantes de una Universidad, en el que a travÃ©s de una muestra de 10 de ellos queremos obtener informaciÃ³n sobre el uso de barras de labios.<br>En primera aproximaciÃ³n lo que procede es hacer un muestreo aleatorio simple, pero en su lugar podemos reflexionar sobre el hecho de que el comportamiento de la poblaciÃ³n con respecto a este carÃ¡cter no es homogÃ©neo, y atendiendo a Ã©l, podemos dividir a la poblaciÃ³n en dos estratos:<br><br>Estudiantes masculinos (60% del total);<br>Estudiantes femeninos (40% restante).<br>de modo que se repartan proporcionalmente ambos grupos el nÃºmero total de muestras, en funciÃ³n de sus respectivos tamaÃ±os (6 varones y 4 mujeres). Esto es lo que se denomina asignaciÃ³n proporcional.<br>Si observamos con mÃ¡s atenciÃ³n, nos encontramos (salvo sorpresas de probabilidad reducida) que el comportamiento de los varones con respecto al carÃ¡cter que se estudia es muy homogÃ©neo y diferenciado del grupo de las mujeres.<br><br>Por otra parte, con toda seguridad la precisiÃ³n sobre el carÃ¡cter que estudiamos, serÃ¡ muy alta en el grupo de los varones aunque en la muestra haya muy pocos (pequeÃ±a varianza), mientras que en el grupo de las mujeres habrÃ¡ mayor dispersiÃ³n. Cuando las varianzas poblacionales son pequenÃ£s, con pocos elementos de una muestra se obtiene una informaciÃ³n mÃ¡s precisa del total de la poblaciÃ³n que cuando la varianza es grande. Por tanto, si nuestros medios sÃ³lo nos permiten tomar una muestra de 10 alumnos, serÃ¡ mÃ¡s conveniente dividir la muestra en dos estratos, y tomar mediante muestreo aleatorio simple cierto nÃºmero de individuos de cada estrato, de modo que se elegirÃ¡n mÃ¡s individuos en los grupos de mayor variabilidad. AsÃ­ probablemente obtendrÃ­amos mejores resultados estudiando una muestra de','2013-10-01','ACTIVO','2013-10-07 15:27:46',NULL);
/*!40000 ALTER TABLE `noticias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (3,'Transparencia'),(2,'Contenido'),(1,'Admin');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transparencia`
--

DROP TABLE IF EXISTS `transparencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transparencia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria_transparencia_id` int(11) NOT NULL,
  `is_subcategoria` enum('TRUE','FALSE') DEFAULT NULL,
  `nombre` varchar(255) NOT NULL,
  `contenido` text,
  `archivo` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `opcion_link` enum('ARCHIVO','LINK') NOT NULL,
  `status` enum('ACTIVO','INACTIVO') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transparencia`
--

LOCK TABLES `transparencia` WRITE;
/*!40000 ALTER TABLE `transparencia` DISABLE KEYS */;
INSERT INTO `transparencia` VALUES (2,2,'FALSE','test','teststs','','hhghgh jejeje','LINK','ACTIVO','2013-08-24 05:57:21','2013-08-30 00:01:37'),(3,1,NULL,'sdfsf','fdfd','','dfdf','LINK','ACTIVO','2013-08-24 18:51:14',NULL),(4,2,'TRUE','vccv','cvcv','','ccc','LINK','ACTIVO','2013-08-28 02:56:16',NULL),(5,2,NULL,'cbcbc','cbcbcb','','','LINK','ACTIVO','2013-08-28 02:56:27',NULL),(6,2,NULL,'cbcbc','cvcbc','','cbcb','LINK','ACTIVO','2013-08-28 02:56:36',NULL),(7,2,'FALSE','nuevo','','','http://www.elsalto.gob.mx/elsalto/sites/all/themes/theme473/docs/art32/Llineamientos_proteccion_de_informacion.pdf','ARCHIVO','ACTIVO','2013-08-28 03:00:17','2013-08-28 03:00:49');
/*!40000 ALTER TABLE `transparencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rol_id` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `status` enum('ACTIVO','INACTIVO') NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,1,'admin','091cd1c086d53ffd1f89fc753493c89b','admin','admin',NULL,'ACTIVO','2013-08-25 00:00:00'),(2,2,'contenido','57bb4b485f52628aab93cbde76d322d0','contenido',NULL,NULL,'ACTIVO','2013-08-29 00:00:00'),(3,3,'transparencia','007118cfc98eb275c25cd20b68c922cc','transparencia',NULL,NULL,'ACTIVO','2013-08-29 00:00:00');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-10-16 15:43:39
