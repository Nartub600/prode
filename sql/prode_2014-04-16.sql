# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.6.16)
# Database: prode
# Generation Time: 2014-04-16 13:08:50 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table equipos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `equipos`;

CREATE TABLE `equipos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL DEFAULT '',
  `grupo` varchar(1) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `equipos` WRITE;
/*!40000 ALTER TABLE `equipos` DISABLE KEYS */;

INSERT INTO `equipos` (`id`, `nombre`, `grupo`)
VALUES
	(1,'Alemania','G'),
	(2,'Argelia','H'),
	(3,'Argentina','F'),
	(4,'Australia','B'),
	(5,'Bélgica','H'),
	(6,'Bosnia y Herzegovina','F'),
	(7,'Brasil','A'),
	(8,'Camerún','A'),
	(9,'Chile','B'),
	(10,'Colombia','C'),
	(11,'Corea del Sur','H'),
	(12,'Costa de Marfil','C'),
	(13,'Costa Rica','D'),
	(14,'Croacia','A'),
	(15,'Ecuador','E'),
	(16,'España','B'),
	(17,'Estados Unidos','G'),
	(18,'Francia','E'),
	(19,'Ghana','G'),
	(20,'Grecia','C'),
	(21,'Honduras','E'),
	(22,'Inglaterra','D'),
	(23,'Irán','F'),
	(24,'Italia','D'),
	(25,'Japón','C'),
	(26,'México','A'),
	(27,'Nigeria','F'),
	(28,'Países Bajos','B'),
	(29,'Portugal','G'),
	(30,'Rusia','H'),
	(31,'Suiza','E'),
	(32,'Uruguay','D'),
	(33,'Ganador Grupo A',''),
	(34,'Segundo Grupo A',''),
	(35,'Ganador Grupo B',''),
	(36,'Segundo Grupo B',''),
	(37,'Ganador Grupo C',''),
	(38,'Segundo Grupo C',''),
	(39,'Ganador Grupo D',''),
	(40,'Segundo Grupo D',''),
	(41,'Ganador Grupo E',''),
	(42,'Segundo Grupo E',''),
	(43,'Ganador Grupo F',''),
	(44,'Segundo Grupo F',''),
	(45,'Ganador Grupo G',''),
	(46,'Segundo Grupo G',''),
	(47,'Ganador Grupo H',''),
	(48,'Segundo Grupo H',''),
	(49,'Ganador Partido 49',NULL),
	(50,'Ganador Partido 50',NULL),
	(51,'Ganador Partido 51',NULL),
	(52,'Ganador Partido 52',NULL),
	(53,'Ganador Partido 53',NULL),
	(54,'Ganador Partido 54',NULL),
	(55,'Ganador Partido 55',NULL),
	(56,'Ganador Partido 56',NULL),
	(57,'Ganador Partido 57',NULL),
	(58,'Ganador Partido 58',NULL),
	(59,'Ganador Partido 59',NULL),
	(60,'Ganador Partido 60',NULL),
	(61,'Ganador Partido 61',NULL),
	(62,'Perdedor Partido 61',NULL),
	(63,'Ganador Partido 62',NULL),
	(64,'Perdedor Partido 62',NULL);

/*!40000 ALTER TABLE `equipos` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table partidos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `partidos`;

CREATE TABLE `partidos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fase` varchar(50) DEFAULT NULL,
  `grupo` varchar(1) DEFAULT NULL,
  `id_equipo_a` int(11) unsigned NOT NULL,
  `id_equipo_b` int(11) unsigned NOT NULL,
  `goles_a` int(2) unsigned DEFAULT NULL,
  `goles_b` int(2) unsigned DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `partidos` WRITE;
/*!40000 ALTER TABLE `partidos` DISABLE KEYS */;

INSERT INTO `partidos` (`id`, `fase`, `grupo`, `id_equipo_a`, `id_equipo_b`, `goles_a`, `goles_b`, `fecha`)
VALUES
	(1,'grupos','A',7,14,2,0,'2014-06-12 20:00:00'),
	(2,'grupos','A',26,8,1,1,'2014-06-13 16:00:00'),
	(3,'grupos','B',16,28,0,0,'2014-06-13 19:00:00'),
	(4,'grupos','B',9,4,NULL,NULL,'2014-06-13 22:00:00'),
	(5,'grupos','C',10,20,NULL,NULL,'2014-06-14 16:00:00'),
	(6,'grupos','C',12,25,NULL,NULL,'2014-06-15 01:00:00'),
	(7,'grupos','D',32,13,NULL,NULL,'2014-06-14 19:00:00'),
	(8,'grupos','D',22,24,NULL,NULL,'2014-06-14 22:00:00'),
	(9,'grupos','E',31,15,NULL,NULL,'2014-06-15 16:00:00'),
	(10,'grupos','E',18,21,NULL,NULL,'2014-06-15 19:00:00'),
	(11,'grupos','F',3,6,NULL,NULL,'2014-06-15 22:00:00'),
	(12,'grupos','F',23,27,NULL,NULL,'2014-06-16 19:00:00'),
	(13,'grupos','G',1,29,NULL,NULL,'2014-06-16 16:00:00'),
	(14,'grupos','G',19,17,NULL,NULL,'2014-06-16 22:00:00'),
	(15,'grupos','H',5,2,NULL,NULL,'2014-06-17 16:00:00'),
	(16,'grupos','H',30,11,NULL,NULL,'2014-06-17 22:00:00'),
	(17,'grupos','A',7,26,NULL,NULL,'2014-06-17 19:00:00'),
	(18,'grupos','A',8,14,NULL,NULL,'2014-06-18 22:00:00'),
	(19,'grupos','B',16,9,NULL,NULL,'2014-06-18 19:00:00'),
	(20,'grupos','B',4,28,NULL,NULL,'2014-06-18 16:00:00'),
	(21,'grupos','C',10,12,NULL,NULL,'2014-06-19 16:00:00'),
	(22,'grupos','C',25,20,NULL,NULL,'2014-06-19 22:00:00'),
	(23,'grupos','D',32,22,NULL,NULL,'2014-06-19 19:00:00'),
	(24,'grupos','D',24,13,NULL,NULL,'2014-06-20 16:00:00'),
	(25,'grupos','E',31,18,NULL,NULL,'2014-06-20 19:00:00'),
	(26,'grupos','E',21,15,NULL,NULL,'2014-06-20 22:00:00'),
	(27,'grupos','F',3,23,NULL,NULL,'2014-06-21 16:00:00'),
	(28,'grupos','F',27,6,NULL,NULL,'2014-06-21 22:00:00'),
	(29,'grupos','G',1,19,NULL,NULL,'2014-06-21 19:00:00'),
	(30,'grupos','G',17,29,NULL,NULL,'2014-06-22 22:00:00'),
	(31,'grupos','H',5,30,NULL,NULL,'2014-06-22 16:00:00'),
	(32,'grupos','H',11,2,NULL,NULL,'2014-06-22 19:00:00'),
	(33,'grupos','A',8,7,NULL,NULL,'2014-06-23 20:00:00'),
	(34,'grupos','A',14,26,NULL,NULL,'2014-06-23 20:00:00'),
	(35,'grupos','B',4,16,NULL,NULL,'2014-06-23 16:00:00'),
	(36,'grupos','B',28,9,NULL,NULL,'2014-06-23 16:00:00'),
	(37,'grupos','C',25,10,NULL,NULL,'2014-06-24 20:00:00'),
	(38,'grupos','C',20,12,NULL,NULL,'2014-06-24 20:00:00'),
	(39,'grupos','D',24,32,NULL,NULL,'2014-06-24 16:00:00'),
	(40,'grupos','D',13,22,NULL,NULL,'2014-06-24 16:00:00'),
	(41,'grupos','E',21,31,NULL,NULL,'2014-06-25 20:00:00'),
	(42,'grupos','E',15,18,NULL,NULL,'2014-06-25 20:00:00'),
	(43,'grupos','F',27,3,NULL,NULL,'2014-06-25 16:00:00'),
	(44,'grupos','F',6,23,NULL,NULL,'2014-06-25 16:00:00'),
	(45,'grupos','G',17,1,NULL,NULL,'2014-06-26 16:00:00'),
	(46,'grupos','G',29,19,NULL,NULL,'2014-06-26 16:00:00'),
	(47,'grupos','H',11,5,NULL,NULL,'2014-06-26 20:00:00'),
	(48,'grupos','H',2,30,NULL,NULL,'2014-06-26 20:00:00'),
	(49,'octavos',NULL,33,36,NULL,NULL,'2014-06-28 16:00:00'),
	(50,'octavos',NULL,37,40,NULL,NULL,'2014-06-28 20:00:00'),
	(51,'octavos',NULL,41,44,NULL,NULL,'2014-06-29 16:00:00'),
	(52,'octavos',NULL,45,48,NULL,NULL,'2014-06-29 20:00:00'),
	(53,'octavos',NULL,35,34,NULL,NULL,'2014-06-30 16:00:00'),
	(54,'octavos',NULL,39,38,NULL,NULL,'2014-06-30 20:00:00'),
	(55,'octavos',NULL,43,42,NULL,NULL,'2014-07-01 16:00:00'),
	(56,'octavos',NULL,47,46,NULL,NULL,'2014-07-01 20:00:00'),
	(57,'cuartos',NULL,49,50,NULL,NULL,'2014-07-04 20:00:00'),
	(58,'cuartos',NULL,53,54,NULL,NULL,'2014-07-04 16:00:00'),
	(59,'cuartos',NULL,51,52,NULL,NULL,'2014-07-05 20:00:00'),
	(60,'cuartos',NULL,55,56,NULL,NULL,'2014-07-05 16:00:00'),
	(61,'semi',NULL,57,58,NULL,NULL,'2014-07-08 20:00:00'),
	(62,'semi',NULL,59,60,NULL,NULL,'2014-07-09 20:00:00'),
	(63,'tercero',NULL,62,64,NULL,NULL,'2014-07-12 20:00:00'),
	(64,'final',NULL,61,63,NULL,NULL,'2014-07-13 19:00:00');

/*!40000 ALTER TABLE `partidos` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
