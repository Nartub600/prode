# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.6.16)
# Database: prode
# Generation Time: 2014-04-12 23:17:48 +0000
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
	(48,'Segundo Grupo H','');

/*!40000 ALTER TABLE `equipos` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
