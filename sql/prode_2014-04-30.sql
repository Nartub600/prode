# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.6.16)
# Database: prode
# Generation Time: 2014-04-30 18:33:42 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table fechas
# ------------------------------------------------------------

DROP TABLE IF EXISTS `fechas`;

CREATE TABLE `fechas` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fase` varchar(50) DEFAULT NULL,
  `desde` timestamp NULL DEFAULT NULL,
  `hasta` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `fechas` WRITE;
/*!40000 ALTER TABLE `fechas` DISABLE KEYS */;

INSERT INTO `fechas` (`id`, `fase`, `desde`, `hasta`)
VALUES
	(1,'grupos','2014-05-01 00:00:00','2014-06-12 00:00:00'),
	(2,'octavos','2014-06-26 00:00:00','2014-06-28 00:00:00'),
	(3,'cuartos','2014-07-01 00:00:00','2014-07-04 00:00:00'),
	(4,'semi','2014-07-05 00:00:00','2014-07-08 00:00:00'),
	(5,'tercero','2014-07-09 00:00:00','2014-07-12 00:00:00'),
	(6,'final','2014-07-09 00:00:00','2014-07-13 00:00:00');

/*!40000 ALTER TABLE `fechas` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
