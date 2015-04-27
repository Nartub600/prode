# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.6.16)
# Database: prode
# Generation Time: 2014-04-05 21:52:40 +0000
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


# Dump of table mensajes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `mensajes`;

CREATE TABLE `mensajes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) unsigned NOT NULL,
  `texto` text,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `mensajes` WRITE;
/*!40000 ALTER TABLE `mensajes` DISABLE KEYS */;

INSERT INTO `mensajes` (`id`, `id_usuario`, `texto`, `created_at`, `updated_at`)
VALUES
	(1,2,'ponete un mensaje..','2014-04-05 20:34:07','2014-04-05 20:34:07'),
	(2,3,'Bachi no existís','2014-04-05 21:52:05','2014-04-05 21:52:05');

/*!40000 ALTER TABLE `mensajes` ENABLE KEYS */;
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
	(1,'grupos','A',7,14,2,1,'2014-06-12 17:00:00'),
	(2,'grupos','A',26,8,1,1,'2014-06-13 13:00:00'),
	(3,'grupos','B',16,28,NULL,NULL,'2014-06-13 16:00:00'),
	(4,'grupos','B',9,4,NULL,NULL,'2014-06-13 19:00:00'),
	(5,'grupos','C',10,20,NULL,NULL,'2014-06-14 13:00:00'),
	(6,'grupos','C',12,25,NULL,NULL,'2014-06-14 22:00:00'),
	(7,'grupos','D',32,13,NULL,NULL,'2014-06-14 16:00:00'),
	(8,'grupos','D',22,24,NULL,NULL,'2014-06-14 19:00:00'),
	(9,'grupos','E',31,15,NULL,NULL,'2014-06-15 13:00:00'),
	(10,'grupos','E',18,21,NULL,NULL,'2014-06-15 16:00:00'),
	(11,'grupos','F',3,6,NULL,NULL,'2014-06-15 19:00:00'),
	(12,'grupos','F',23,27,NULL,NULL,'2014-06-16 16:00:00'),
	(13,'grupos','G',1,29,NULL,NULL,'2014-06-16 13:00:00'),
	(14,'grupos','G',19,17,NULL,NULL,'2014-06-16 19:00:00'),
	(15,'grupos','H',5,2,NULL,NULL,'2014-06-17 13:00:00'),
	(16,'grupos','H',30,11,NULL,NULL,'2014-06-17 19:00:00'),
	(17,'grupos','A',7,26,NULL,NULL,'2014-06-17 16:00:00'),
	(18,'grupos','A',8,14,NULL,NULL,'2014-06-18 19:00:00'),
	(19,'grupos','B',16,9,NULL,NULL,'2014-06-18 16:00:00'),
	(20,'grupos','B',4,28,NULL,NULL,'2014-06-18 13:00:00'),
	(21,'grupos','C',10,12,NULL,NULL,'2014-06-19 13:00:00'),
	(22,'grupos','C',25,20,NULL,NULL,'2014-06-19 19:00:00'),
	(23,'grupos','D',32,22,NULL,NULL,'2014-06-19 16:00:00'),
	(24,'grupos','D',24,13,NULL,NULL,'2014-06-20 13:00:00'),
	(25,'grupos','E',31,18,NULL,NULL,'2014-06-20 16:00:00'),
	(26,'grupos','E',21,15,NULL,NULL,'2014-06-20 19:00:00'),
	(27,'grupos','F',3,23,NULL,NULL,'2014-06-21 13:00:00'),
	(28,'grupos','F',27,6,NULL,NULL,'2014-06-21 19:00:00'),
	(29,'grupos','G',1,19,NULL,NULL,'2014-06-21 16:00:00'),
	(30,'grupos','G',17,29,NULL,NULL,'2014-06-22 19:00:00'),
	(31,'grupos','H',5,30,NULL,NULL,'2014-06-22 13:00:00'),
	(32,'grupos','H',11,2,NULL,NULL,'2014-06-22 16:00:00'),
	(33,'grupos','A',8,7,NULL,NULL,'2014-06-23 17:00:00'),
	(34,'grupos','A',14,26,NULL,NULL,'2014-06-23 17:00:00'),
	(35,'grupos','B',4,16,NULL,NULL,'2014-06-23 13:00:00'),
	(36,'grupos','B',28,9,NULL,NULL,'2014-06-23 13:00:00'),
	(37,'grupos','C',25,10,NULL,NULL,'2014-06-24 17:00:00'),
	(38,'grupos','C',20,12,NULL,NULL,'2014-06-24 17:00:00'),
	(39,'grupos','D',24,32,NULL,NULL,'2014-06-24 13:00:00'),
	(40,'grupos','D',13,22,NULL,NULL,'2014-06-24 13:00:00'),
	(41,'grupos','E',21,31,NULL,NULL,'2014-06-25 17:00:00'),
	(42,'grupos','E',15,18,NULL,NULL,'2014-06-25 17:00:00'),
	(43,'grupos','F',27,3,NULL,NULL,'2014-06-25 13:00:00'),
	(44,'grupos','F',6,23,NULL,NULL,'2014-06-25 13:00:00'),
	(45,'grupos','G',17,1,NULL,NULL,'2014-06-26 13:00:00'),
	(46,'grupos','G',29,19,NULL,NULL,'2014-06-26 13:00:00'),
	(47,'grupos','H',11,5,NULL,NULL,'2014-06-26 17:00:00'),
	(48,'grupos','H',2,30,NULL,NULL,'2014-06-26 17:00:00');

/*!40000 ALTER TABLE `partidos` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table preguntas
# ------------------------------------------------------------

DROP TABLE IF EXISTS `preguntas`;

CREATE TABLE `preguntas` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fase` varchar(50) NOT NULL,
  `id_usuario` int(11) unsigned NOT NULL,
  `respuesta` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `preguntas` WRITE;
/*!40000 ALTER TABLE `preguntas` DISABLE KEYS */;

INSERT INTO `preguntas` (`id`, `fase`, `id_usuario`, `respuesta`)
VALUES
	(10,'grupos',3,130),
	(11,'grupos',2,341);

/*!40000 ALTER TABLE `preguntas` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table pronosticos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pronosticos`;

CREATE TABLE `pronosticos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fase` varchar(50) DEFAULT NULL,
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

INSERT INTO `pronosticos` (`id`, `fase`, `id_usuario`, `id_partido`, `goles_a`, `goles_b`, `created_at`, `updated_at`)
VALUES
	(481,'grupos',3,1,1000,0,'2014-04-05 21:17:02','2014-04-05 21:17:02'),
	(482,'grupos',3,2,1000,0,'2014-04-05 21:17:02','2014-04-05 21:17:02'),
	(483,'grupos',3,3,1000,0,'2014-04-05 21:17:02','2014-04-05 21:17:02'),
	(484,'grupos',3,4,1000,0,'2014-04-05 21:17:02','2014-04-05 21:17:02'),
	(485,'grupos',3,5,1000,0,'2014-04-05 21:17:02','2014-04-05 21:17:02'),
	(486,'grupos',3,6,1000,0,'2014-04-05 21:17:02','2014-04-05 21:17:02'),
	(487,'grupos',3,7,1000,0,'2014-04-05 21:17:02','2014-04-05 21:17:02'),
	(488,'grupos',3,8,1000,0,'2014-04-05 21:17:02','2014-04-05 21:17:02'),
	(489,'grupos',3,9,1000,0,'2014-04-05 21:17:02','2014-04-05 21:17:02'),
	(490,'grupos',3,10,1000,0,'2014-04-05 21:17:02','2014-04-05 21:17:02'),
	(491,'grupos',3,11,1000,0,'2014-04-05 21:17:02','2014-04-05 21:17:02'),
	(492,'grupos',3,12,1000,0,'2014-04-05 21:17:02','2014-04-05 21:17:02'),
	(493,'grupos',3,13,1000,0,'2014-04-05 21:17:02','2014-04-05 21:17:02'),
	(494,'grupos',3,14,1000,0,'2014-04-05 21:17:02','2014-04-05 21:17:02'),
	(495,'grupos',3,15,1000,0,'2014-04-05 21:17:02','2014-04-05 21:17:02'),
	(496,'grupos',3,16,1000,0,'2014-04-05 21:17:02','2014-04-05 21:17:02'),
	(497,'grupos',3,17,1000,0,'2014-04-05 21:17:02','2014-04-05 21:17:02'),
	(498,'grupos',3,18,1000,0,'2014-04-05 21:17:02','2014-04-05 21:17:02'),
	(499,'grupos',3,19,1000,0,'2014-04-05 21:17:02','2014-04-05 21:17:02'),
	(500,'grupos',3,20,1000,0,'2014-04-05 21:17:02','2014-04-05 21:17:02'),
	(501,'grupos',3,21,1000,0,'2014-04-05 21:17:02','2014-04-05 21:17:02'),
	(502,'grupos',3,22,1000,0,'2014-04-05 21:17:02','2014-04-05 21:17:02'),
	(503,'grupos',3,23,1000,0,'2014-04-05 21:17:02','2014-04-05 21:17:02'),
	(504,'grupos',3,24,1000,0,'2014-04-05 21:17:02','2014-04-05 21:17:02'),
	(505,'grupos',3,25,1000,0,'2014-04-05 21:17:02','2014-04-05 21:17:02'),
	(506,'grupos',3,26,1000,0,'2014-04-05 21:17:02','2014-04-05 21:17:02'),
	(507,'grupos',3,27,1000,0,'2014-04-05 21:17:02','2014-04-05 21:17:02'),
	(508,'grupos',3,28,1000,0,'2014-04-05 21:17:02','2014-04-05 21:17:02'),
	(509,'grupos',3,29,1000,0,'2014-04-05 21:17:02','2014-04-05 21:17:02'),
	(510,'grupos',3,30,1000,0,'2014-04-05 21:17:02','2014-04-05 21:17:02'),
	(511,'grupos',3,31,1000,0,'2014-04-05 21:17:02','2014-04-05 21:17:02'),
	(512,'grupos',3,32,1000,0,'2014-04-05 21:17:02','2014-04-05 21:17:02'),
	(513,'grupos',3,33,1000,0,'2014-04-05 21:17:02','2014-04-05 21:17:02'),
	(514,'grupos',3,34,1000,0,'2014-04-05 21:17:02','2014-04-05 21:17:02'),
	(515,'grupos',3,35,1000,0,'2014-04-05 21:17:02','2014-04-05 21:17:02'),
	(516,'grupos',3,36,1000,0,'2014-04-05 21:17:02','2014-04-05 21:17:02'),
	(517,'grupos',3,37,1000,0,'2014-04-05 21:17:02','2014-04-05 21:17:02'),
	(518,'grupos',3,38,1000,0,'2014-04-05 21:17:02','2014-04-05 21:17:02'),
	(519,'grupos',3,39,1000,0,'2014-04-05 21:17:02','2014-04-05 21:17:02'),
	(520,'grupos',3,40,1000,0,'2014-04-05 21:17:02','2014-04-05 21:17:02'),
	(521,'grupos',3,41,1000,0,'2014-04-05 21:17:02','2014-04-05 21:17:02'),
	(522,'grupos',3,42,1000,0,'2014-04-05 21:17:02','2014-04-05 21:17:02'),
	(523,'grupos',3,43,1000,0,'2014-04-05 21:17:02','2014-04-05 21:17:02'),
	(524,'grupos',3,44,1000,0,'2014-04-05 21:17:02','2014-04-05 21:17:02'),
	(525,'grupos',3,45,1000,0,'2014-04-05 21:17:02','2014-04-05 21:17:02'),
	(526,'grupos',3,46,1000,0,'2014-04-05 21:17:02','2014-04-05 21:17:02'),
	(527,'grupos',3,47,1000,0,'2014-04-05 21:17:02','2014-04-05 21:17:02'),
	(528,'grupos',3,48,1000,0,'2014-04-05 21:17:02','2014-04-05 21:17:02'),
	(529,'grupos',2,1,1000,0,'2014-04-05 21:24:48','2014-04-05 21:24:48'),
	(530,'grupos',2,2,1000,1000,'2014-04-05 21:24:48','2014-04-05 21:24:48'),
	(531,'grupos',2,3,1000,0,'2014-04-05 21:24:48','2014-04-05 21:24:48'),
	(532,'grupos',2,4,1000,1000,'2014-04-05 21:24:48','2014-04-05 21:24:48'),
	(533,'grupos',2,5,1000,0,'2014-04-05 21:24:48','2014-04-05 21:24:48'),
	(534,'grupos',2,6,1000,1000,'2014-04-05 21:24:48','2014-04-05 21:24:48'),
	(535,'grupos',2,7,1000,0,'2014-04-05 21:24:48','2014-04-05 21:24:48'),
	(536,'grupos',2,8,1000,1000,'2014-04-05 21:24:48','2014-04-05 21:24:48'),
	(537,'grupos',2,9,1000,0,'2014-04-05 21:24:48','2014-04-05 21:24:48'),
	(538,'grupos',2,10,1000,1000,'2014-04-05 21:24:48','2014-04-05 21:24:48'),
	(539,'grupos',2,11,1000,0,'2014-04-05 21:24:48','2014-04-05 21:24:48'),
	(540,'grupos',2,12,1000,1000,'2014-04-05 21:24:48','2014-04-05 21:24:48'),
	(541,'grupos',2,13,1000,0,'2014-04-05 21:24:48','2014-04-05 21:24:48'),
	(542,'grupos',2,14,1000,1000,'2014-04-05 21:24:48','2014-04-05 21:24:48'),
	(543,'grupos',2,15,1000,0,'2014-04-05 21:24:48','2014-04-05 21:24:48'),
	(544,'grupos',2,16,1000,1000,'2014-04-05 21:24:48','2014-04-05 21:24:48'),
	(545,'grupos',2,17,0,1000,'2014-04-05 21:24:48','2014-04-05 21:24:48'),
	(546,'grupos',2,18,1000,0,'2014-04-05 21:24:48','2014-04-05 21:24:48'),
	(547,'grupos',2,19,0,1000,'2014-04-05 21:24:48','2014-04-05 21:24:48'),
	(548,'grupos',2,20,1000,0,'2014-04-05 21:24:48','2014-04-05 21:24:48'),
	(549,'grupos',2,21,0,1000,'2014-04-05 21:24:48','2014-04-05 21:24:48'),
	(550,'grupos',2,22,1000,0,'2014-04-05 21:24:48','2014-04-05 21:24:48'),
	(551,'grupos',2,23,0,1000,'2014-04-05 21:24:48','2014-04-05 21:24:48'),
	(552,'grupos',2,24,1000,0,'2014-04-05 21:24:48','2014-04-05 21:24:48'),
	(553,'grupos',2,25,0,1000,'2014-04-05 21:24:48','2014-04-05 21:24:48'),
	(554,'grupos',2,26,1000,0,'2014-04-05 21:24:48','2014-04-05 21:24:48'),
	(555,'grupos',2,27,0,1000,'2014-04-05 21:24:48','2014-04-05 21:24:48'),
	(556,'grupos',2,28,1000,0,'2014-04-05 21:24:48','2014-04-05 21:24:48'),
	(557,'grupos',2,29,0,1000,'2014-04-05 21:24:48','2014-04-05 21:24:48'),
	(558,'grupos',2,30,1000,0,'2014-04-05 21:24:48','2014-04-05 21:24:48'),
	(559,'grupos',2,31,0,1000,'2014-04-05 21:24:48','2014-04-05 21:24:48'),
	(560,'grupos',2,32,1000,0,'2014-04-05 21:24:48','2014-04-05 21:24:48'),
	(561,'grupos',2,33,1000,1000,'2014-04-05 21:24:48','2014-04-05 21:24:48'),
	(562,'grupos',2,34,0,1000,'2014-04-05 21:24:48','2014-04-05 21:24:48'),
	(563,'grupos',2,35,1000,1000,'2014-04-05 21:24:48','2014-04-05 21:24:48'),
	(564,'grupos',2,36,0,1000,'2014-04-05 21:24:48','2014-04-05 21:24:48'),
	(565,'grupos',2,37,1000,1000,'2014-04-05 21:24:48','2014-04-05 21:24:48'),
	(566,'grupos',2,38,0,1000,'2014-04-05 21:24:48','2014-04-05 21:24:48'),
	(567,'grupos',2,39,1000,1000,'2014-04-05 21:24:48','2014-04-05 21:24:48'),
	(568,'grupos',2,40,0,1000,'2014-04-05 21:24:48','2014-04-05 21:24:48'),
	(569,'grupos',2,41,1000,1000,'2014-04-05 21:24:48','2014-04-05 21:24:48'),
	(570,'grupos',2,42,0,1000,'2014-04-05 21:24:48','2014-04-05 21:24:48'),
	(571,'grupos',2,43,1000,1000,'2014-04-05 21:24:48','2014-04-05 21:24:48'),
	(572,'grupos',2,44,0,1000,'2014-04-05 21:24:48','2014-04-05 21:24:48'),
	(573,'grupos',2,45,1000,1000,'2014-04-05 21:24:48','2014-04-05 21:24:48'),
	(574,'grupos',2,46,0,1000,'2014-04-05 21:24:48','2014-04-05 21:24:48'),
	(575,'grupos',2,47,1000,1000,'2014-04-05 21:24:48','2014-04-05 21:24:48'),
	(576,'grupos',2,48,0,1000,'2014-04-05 21:24:48','2014-04-05 21:24:48');

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
	(2,'usuario','usuario@usuario.com','$2y$10$P1dCxcLkgqPVgbaguCDhHONlBko6amcfFsRzqaxX5zb.bW8w6qhVW','telefono','localidad','Basilio','Valencia','Bachi','2.jpg',9,'2014-03-30 22:21:35','2014-04-05 20:16:55',2),
	(3,'usuario2','usuario2@usuario2.com','$2y$10$Xh7FqRYymjNC/jAk9jD9JenfNKxd8vJjJdGEpI21D2GpyZAWtMBh2','telefono','localidad','Casimiro','Sierra','Cacho','3.jpg',5,'2014-04-05 21:10:01','2014-04-05 21:14:54',2);

/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
