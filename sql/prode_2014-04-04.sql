# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.6.16)
# Database: prode
# Generation Time: 2014-04-04 22:55:38 +0000
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
  `grupo` varchar(1) NOT NULL DEFAULT '',
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
	(32,'Uruguay','D');

/*!40000 ALTER TABLE `equipos` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table partidos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `partidos`;

CREATE TABLE `partidos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_equipo_a` int(11) unsigned NOT NULL,
  `id_equipo_b` int(11) unsigned NOT NULL,
  `goles_a` int(2) unsigned DEFAULT NULL,
  `goles_b` int(2) unsigned DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `partidos` WRITE;
/*!40000 ALTER TABLE `partidos` DISABLE KEYS */;

INSERT INTO `partidos` (`id`, `id_equipo_a`, `id_equipo_b`, `goles_a`, `goles_b`, `fecha`)
VALUES
	(1,7,14,NULL,NULL,'2014-06-12 17:00:00'),
	(2,26,8,NULL,NULL,'2014-06-13 13:00:00'),
	(3,16,28,2,0,'2014-06-13 16:00:00'),
	(4,9,4,NULL,NULL,'2014-06-13 19:00:00'),
	(5,10,20,NULL,NULL,'2014-06-14 13:00:00'),
	(6,12,25,NULL,NULL,'2014-06-14 22:00:00'),
	(7,32,13,NULL,NULL,'2014-06-14 16:00:00'),
	(8,22,24,NULL,NULL,'2014-06-14 19:00:00'),
	(9,31,15,NULL,NULL,'2014-06-15 13:00:00'),
	(10,18,21,NULL,NULL,'2014-06-15 16:00:00'),
	(11,3,6,NULL,NULL,'2014-06-15 19:00:00'),
	(12,23,27,NULL,NULL,'2014-06-16 16:00:00'),
	(13,1,29,NULL,NULL,'2014-06-16 13:00:00'),
	(14,19,17,NULL,NULL,'2014-06-16 19:00:00'),
	(15,5,2,NULL,NULL,'2014-06-17 13:00:00'),
	(16,30,11,NULL,NULL,'2014-06-17 19:00:00'),
	(17,7,26,NULL,NULL,'2014-06-17 16:00:00'),
	(18,8,14,NULL,NULL,'2014-06-18 19:00:00'),
	(19,16,9,NULL,NULL,'2014-06-18 16:00:00'),
	(20,4,28,NULL,NULL,'2014-06-18 13:00:00'),
	(21,10,12,NULL,NULL,'2014-06-19 13:00:00'),
	(22,25,20,NULL,NULL,'2014-06-19 19:00:00'),
	(23,32,22,NULL,NULL,'2014-06-19 16:00:00'),
	(24,24,13,NULL,NULL,'2014-06-20 13:00:00'),
	(25,31,18,NULL,NULL,'2014-06-20 16:00:00'),
	(26,21,15,NULL,NULL,'2014-06-20 19:00:00'),
	(27,3,23,NULL,NULL,'2014-06-21 13:00:00'),
	(28,27,6,NULL,NULL,'2014-06-21 19:00:00'),
	(29,1,19,NULL,NULL,'2014-06-21 16:00:00'),
	(30,17,29,NULL,NULL,'2014-06-22 19:00:00'),
	(31,5,30,NULL,NULL,'2014-06-22 13:00:00'),
	(32,11,2,NULL,NULL,'2014-06-22 16:00:00'),
	(33,8,7,NULL,NULL,'2014-06-23 17:00:00'),
	(34,14,26,NULL,NULL,'2014-06-23 17:00:00'),
	(35,4,16,NULL,NULL,'2014-06-23 13:00:00'),
	(36,28,9,NULL,NULL,'2014-06-23 13:00:00'),
	(37,25,10,NULL,NULL,'2014-06-24 17:00:00'),
	(38,20,12,NULL,NULL,'2014-06-24 17:00:00'),
	(39,24,32,NULL,NULL,'2014-06-24 13:00:00'),
	(40,13,22,NULL,NULL,'2014-06-24 13:00:00'),
	(41,21,31,NULL,NULL,'2014-06-25 17:00:00'),
	(42,15,18,NULL,NULL,'2014-06-25 17:00:00'),
	(43,27,3,NULL,NULL,'2014-06-25 13:00:00'),
	(44,6,23,NULL,NULL,'2014-06-25 13:00:00'),
	(45,17,1,NULL,NULL,'2014-06-26 13:00:00'),
	(46,29,19,NULL,NULL,'2014-06-26 13:00:00'),
	(47,11,5,NULL,NULL,'2014-06-26 17:00:00'),
	(48,2,30,NULL,NULL,'2014-06-26 17:00:00');

/*!40000 ALTER TABLE `partidos` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table preguntas
# ------------------------------------------------------------

DROP TABLE IF EXISTS `preguntas`;

CREATE TABLE `preguntas` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) unsigned NOT NULL,
  `etapa` varchar(50) NOT NULL DEFAULT '',
  `respuesta` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table pronosticos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pronosticos`;

CREATE TABLE `pronosticos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) unsigned NOT NULL,
  `id_partido` int(11) unsigned NOT NULL,
  `goles_a` int(2) unsigned NOT NULL,
  `goles_b` int(2) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `pronosticos` WRITE;
/*!40000 ALTER TABLE `pronosticos` DISABLE KEYS */;

INSERT INTO `pronosticos` (`id`, `id_usuario`, `id_partido`, `goles_a`, `goles_b`, `created_at`, `updated_at`)
VALUES
	(1,2,3,1000,0,'2014-04-02 22:27:22','2014-04-02 22:27:22'),
	(2,2,4,1000,1000,'2014-04-02 22:27:22','2014-04-02 22:27:22'),
	(3,2,20,0,1000,'2014-04-02 22:27:22','2014-04-02 22:27:22'),
	(4,2,19,1000,1000,'2014-04-02 22:27:22','2014-04-02 22:27:22'),
	(5,2,35,1000,0,'2014-04-02 22:27:22','2014-04-02 22:27:22'),
	(6,2,36,1000,1000,'2014-04-02 22:27:22','2014-04-02 22:27:22');

/*!40000 ALTER TABLE `pronosticos` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table usuarios
# ------------------------------------------------------------

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nick` varchar(100) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(100) NOT NULL DEFAULT '',
  `telefono` varchar(100) NOT NULL DEFAULT '',
  `localidad` varchar(100) NOT NULL DEFAULT '',
  `nombre` varchar(100) NOT NULL DEFAULT '',
  `apellido` varchar(100) NOT NULL DEFAULT '',
  `apodo` varchar(100) NOT NULL DEFAULT '',
  `foto` varchar(100) NOT NULL DEFAULT '',
  `id_candidato` int(11) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `grupo` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;

INSERT INTO `usuarios` (`id`, `nick`, `email`, `password`, `telefono`, `localidad`, `nombre`, `apellido`, `apodo`, `foto`, `id_candidato`, `created_at`, `updated_at`, `grupo`)
VALUES
	(1,'admin','','$2y$10$R7hcz0WfGY0vQipa2D7HN.RVp0yfzmpbc/GAYd7SHWsOGZbdfrMz2','','','','','','',NULL,'2014-03-30 22:16:37','2014-03-30 22:16:37',1),
	(2,'usuario','usuario@usuario.com','$2y$10$P1dCxcLkgqPVgbaguCDhHONlBko6amcfFsRzqaxX5zb.bW8w6qhVW','telefono','localidad','nombre','apellido','apodo','ySIphRe.jpg',9,'2014-03-30 22:21:35','2014-04-04 00:05:42',2);

/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
