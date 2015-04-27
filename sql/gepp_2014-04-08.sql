# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.6.16)
# Database: gepp
# Generation Time: 2014-04-09 01:10:59 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table cedis
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cedis`;

CREATE TABLE `cedis` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `cedis` WRITE;
/*!40000 ALTER TABLE `cedis` DISABLE KEYS */;

INSERT INTO `cedis` (`id`, `nombre`)
VALUES
	(112,'AEROPUERTO'),
	(117,'IZCALLI'),
	(135,'VALLEJO'),
	(221,'CUERNAVACA'),
	(261,'CANCUN'),
	(281,'NORTE'),
	(321,'SAN LUIS REFRESCO'),
	(341,'QUERETARO'),
	(345,'LEON ORIENTE'),
	(441,'SAN MARCOS'),
	(481,'APODACA'),
	(520,'CD JUAREZ'),
	(521,'CHIHUAHUA'),
	(701,'MEXICALI'),
	(704,'TIJUANA'),
	(705,'TOLUCA'),
	(707,'ENSENADA'),
	(712,'HERMOSILLO'),
	(743,'CABO SAN LUCAS DA'),
	(826,'BRISEÑO'),
	(860,'MORELIA ZON IND'),
	(885,'CELAYA PLANTA'),
	(887,'PTO VALLARTA'),
	(923,'PUEBLA PLANTA'),
	(941,'VERACRUZ PLANTA'),
	(947,'XALAPA');

/*!40000 ALTER TABLE `cedis` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sucursal
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sucursal`;

CREATE TABLE `sucursal` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `no_de_cliente` int(11) NOT NULL,
  `razon_social` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `calle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no_exterior` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `no_interior` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `cp` char(5) COLLATE utf8_unicode_ci NOT NULL,
  `colonia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ciudad` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `delegacion_o_municipio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado_o_provincia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `referencias` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `cadena_comercial_id` int(11) NOT NULL,
  `activo` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dias_de_proceso` text COLLATE utf8_unicode_ci,
  `direccion` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `mails_alertas` text COLLATE utf8_unicode_ci NOT NULL,
  `cedis_id` int(11) NOT NULL,
  `ruta` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`,`cadena_comercial_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `sucursal` WRITE;
/*!40000 ALTER TABLE `sucursal` DISABLE KEYS */;

INSERT INTO `sucursal` (`id`, `no_de_cliente`, `razon_social`, `calle`, `no_exterior`, `no_interior`, `cp`, `colonia`, `ciudad`, `delegacion_o_municipio`, `estado_o_provincia`, `referencias`, `cadena_comercial_id`, `activo`, `dias_de_proceso`, `direccion`, `mails_alertas`, `cedis_id`, `ruta`)
VALUES
	(1,24347,'COAPA','','','','','','','','','',1,'si','[\"3\",\"6\"]','Calle Puente 186, AMSA, Coyoacan, D.F., 14380','[\"Pepsi.Televenta@gepp.com\",\"karla.espinosa@gepp.com\",\"pablo.pena@gepp.com\",\"emma.caballero@gepp.com\",\"agustin.rodriguez@gepp.com\",\" CIC@gepp.com\"]',0,''),
	(2,24348,'MIXCOAC','','','','','','','','','',1,'si','[\"3\",\"6\"]','Blvd. A. Lopez Mateos 1181, Sn. Pedro de los Pinos, Alvaro Obregón, D.F., 01180','[\"Pepsi.Televenta@gepp.com\",\"karla.espinosa@gepp.com\",\"pablo.pena@gepp.com\",\"emma.caballero@gepp.com\",\"agustin.rodriguez@gepp.com\",\" CIC@gepp.com\"]',0,''),
	(3,14229,'SATELITE','','','','','','','','','',1,'si','[\"1\",\"4\"]','Cto. Comercial 2001, Cd. Satélite, Naucalpan, Edo. Mex., 53100','[\"Pepsi.Televenta@gepp.com\",\"karla.espinosa@gepp.com\",\"pablo.pena@gepp.com\",\"emma.caballero@gepp.com\",\"agustin.rodriguez@gepp.com\",\" CIC@gepp.com\"]',0,''),
	(4,14230,'INTERLOMAS','','','','','','','','','',1,'si','[\"1\",\"4\"]','Av. Magnocentro 4, Sn. Fernando La Herradura, Huixquilucan, Edo. Mex., 52765','[\"Pepsi.Televenta@gepp.com\",\"karla.espinosa@gepp.com\",\"pablo.pena@gepp.com\",\"emma.caballero@gepp.com\",\"agustin.rodriguez@gepp.com\",\" CIC@gepp.com\"]',0,''),
	(6,14231,'ARBOLEDAS','','','','','','','','','',1,'si','[\"3\",\"5\"]','Calle Sn Nicolás 10, Fracc. Ind. Sn Nicolás Tlaxcolpan, Tlalnepantla, Edo. Mex., 54030','[\"Pepsi.Televenta@gepp.com\",\"karla.espinosa@gepp.com\",\"pablo.pena@gepp.com\",\"emma.caballero@gepp.com\",\"agustin.rodriguez@gepp.com\",\" CIC@gepp.com\"]',0,''),
	(8,11276,'POLANCO','','','','','','','','','',1,'si','[\"1\",\"4\"]','Blvd. Miguel de Cervantes Saavedra 397, Irrigación, Miguel Hidalgo, D.F., 11500','[\"Pepsi.Televenta@gepp.com\",\"karla.espinosa@gepp.com\",\"pablo.pena@gepp.com\",\"emma.caballero@gepp.com\",\"agustin.rodriguez@gepp.com\",\" CIC@gepp.com\"]',0,''),
	(10,42738,'CUERNAVACA','','','','','','','','','',1,'si','[\"1\",\"3\",\"5\"]','Av Vicente Guerrero 205, Lomas de la Selva, Cuernavaca, Mor., 62270','[\"Pepsi.Televenta@gepp.com\",\"karla.espinosa@gepp.com\",\"pablo.pena@gepp.com\",\"emma.caballero@gepp.com\",\"agustin.rodriguez@gepp.com\",\" CIC@gepp.com\"]',0,''),
	(12,9907,'CANCÚN','','','','','','','','','',1,'si','[\"3\",\"5\"]','Av. Kabah esq. Yaxchilan, SM 21 MZ4 Lt2, Cancún, Q. Roo., 77500','[\"Pepsi.Televenta@gepp.com\",\"karla.espinosa@gepp.com\",\"pablo.pena@gepp.com\",\"emma.caballero@gepp.com\",\"agustin.rodriguez@gepp.com\",\" CIC@gepp.com\"]',0,''),
	(14,29031,'MÉRIDA','','','','','','','','','',1,'si','[\"1\",\"3\"]','Calle 60 220, Fracc. Del Norte, Merida, Yuc., 97120','[\"Pepsi.Televenta@gepp.com\",\"karla.espinosa@gepp.com\",\"pablo.pena@gepp.com\",\"emma.caballero@gepp.com\",\"agustin.rodriguez@gepp.com\",\" CIC@gepp.com\"]',0,''),
	(16,50564,'SAN LUIS POTOSI','','','','','','','','','',1,'si','[\"3\",\"6\"]','Av. Chapultepec 200, Fracc. Colinas del Parque, San Luis Potosí, SLP., 78260','[\"Pepsi.Televenta@gepp.com\",\"karla.espinosa@gepp.com\",\"pablo.pena@gepp.com\",\"emma.caballero@gepp.com\",\"agustin.rodriguez@gepp.com\",\" CIC@gepp.com\"]',0,''),
	(18,22810,'QUERETARO','','','','','','','','','',1,'si','[\"2\",\"4\"]','Blvd. B. Quintana Arrioja 4107, Plaza del Parque, Queretaro, Qro., 76169','[\"Pepsi.Televenta@gepp.com\",\"karla.espinosa@gepp.com\",\"pablo.pena@gepp.com\",\"emma.caballero@gepp.com\",\"agustin.rodriguez@gepp.com\",\" CIC@gepp.com\"]',0,''),
	(20,50857,'LEON','','','','','','','','','',1,'si','[\"1\",\"5\"]','Blvd. Juan Torres Landa 4137, Jardines de Jerez , León, Gto., 37229','[\"Pepsi.Televenta@gepp.com\",\"karla.espinosa@gepp.com\",\"pablo.pena@gepp.com\",\"emma.caballero@gepp.com\",\"agustin.rodriguez@gepp.com\",\" CIC@gepp.com\"]',0,''),
	(22,72834,'AGUASCALIENTES','','','','','','','','','',1,'si','[\"1\",\"5\"]','Blvd. Ags. Norte 802, Las Trojes, Aguascalientes, Ags., 20864','[\"Pepsi.Televenta@gepp.com\",\"karla.espinosa@gepp.com\",\"pablo.pena@gepp.com\",\"emma.caballero@gepp.com\",\"agustin.rodriguez@gepp.com\",\" CIC@gepp.com\"]',0,''),
	(24,1063,'MONTERREY I','','','','','','','','','',1,'si','[\"1\",\"4\"]','Lazaro Cárdenas 800, Del Valle, Monterrey, N.L., 66269','[\"Pepsi.Televenta@gepp.com\",\"karla.espinosa@gepp.com\",\"pablo.pena@gepp.com\",\"emma.caballero@gepp.com\",\"agustin.rodriguez@gepp.com\",\" CIC@gepp.com\"]',0,''),
	(26,1064,'MONTERREY II','','','','','','','','','',1,'si','[\"2\",\"5\"]','Alejandro de Rodas 6767, Cumbres, Monterrey, N.L., 64340','[\"Pepsi.Televenta@gepp.com\",\"karla.espinosa@gepp.com\",\"pablo.pena@gepp.com\",\"emma.caballero@gepp.com\",\"agustin.rodriguez@gepp.com\",\" CIC@gepp.com\"]',0,''),
	(28,1065,'MONTERREY III','','','','','','','','','',1,'si','[\"3\",\"6\"]','Carr. Nal. Km.265+500 5001, Bosques de Valle Alto, Monterrey, N.L., 64986','[\"Pepsi.Televenta@gepp.com\",\"karla.espinosa@gepp.com\",\"pablo.pena@gepp.com\",\"emma.caballero@gepp.com\",\"agustin.rodriguez@gepp.com\",\" CIC@gepp.com\"]',0,''),
	(30,23776,'CD. JUAREZ','','','','','','','','','',1,'si','[\"1\",\"3\",\"5\"]','Rancho Agua Caliente 6911, Pradera Dorada, Cd. Juarez, Chih., 32610','[\"Pepsi.Televenta@gepp.com\",\"karla.espinosa@gepp.com\",\"pablo.pena@gepp.com\",\"emma.caballero@gepp.com\",\"agustin.rodriguez@gepp.com\",\" CIC@gepp.com\"]',0,''),
	(32,11871,'CHIHUAHUA','','','','','','','','','',1,'si','[\"1\",\"3\",\"5\"]','Av. de la Juventud 7513, Las misiones 1, Chihuahua, Chih. 31115','[\"Pepsi.Televenta@gepp.com\",\"karla.espinosa@gepp.com\",\"pablo.pena@gepp.com\",\"emma.caballero@gepp.com\",\"agustin.rodriguez@gepp.com\",\" CIC@gepp.com\"]',0,''),
	(34,27207,'MEXICALI','','','','','','','','','',1,'si','[\"1\",\"3\",\"5\"]','C. Sn. Luis Río Col. Km 7.5, Ex ejido de Coahuila, Mexicali, B.C., 21397','[\"Pepsi.Televenta@gepp.com\",\"karla.espinosa@gepp.com\",\"pablo.pena@gepp.com\",\"emma.caballero@gepp.com\",\"agustin.rodriguez@gepp.com\",\" CIC@gepp.com\"]',0,''),
	(36,34916,'TIJUANA I','','','','','','','','','',1,'si','[\"1\",\"3\",\"5\"]','Enrique Silvestre 1400, Los Arenales, Tijuana, B.C., 22548','[\"Pepsi.Televenta@gepp.com\",\"karla.espinosa@gepp.com\",\"pablo.pena@gepp.com\",\"emma.caballero@gepp.com\",\"agustin.rodriguez@gepp.com\",\" CIC@gepp.com\"]',0,''),
	(38,34917,'TIJUANA II','','','','','','','','','',1,'si','[\"1\",\"3\",\"5\"]','Blvd Rodolfo Sánchez Tab 8943, Zona Urbana Rio Tijuana, Tijuana, B.C., 22320','[\"Pepsi.Televenta@gepp.com\",\"karla.espinosa@gepp.com\",\"pablo.pena@gepp.com\",\"emma.caballero@gepp.com\",\"agustin.rodriguez@gepp.com\",\" CIC@gepp.com\"]',0,''),
	(40,67797,'TOLUCA','','','','','','','','','',1,'si','[\"4\"]','Av. Juan Pablo II Sol 501 Norte L.22 , Barrio de San Mateo, Metepec, Edo. Mex., 52140','[\"Pepsi.Televenta@gepp.com\",\"karla.espinosa@gepp.com\",\"pablo.pena@gepp.com\",\"emma.caballero@gepp.com\",\"agustin.rodriguez@gepp.com\",\" CIC@gepp.com\"]',0,''),
	(42,4963,'ENSENADA','','','','','','','','','',1,'si','[\"1\",\"3\",\"5\"]','Carr. Transpeninsular Ens La Paz 4179, Carlos Pacheco, Ensenada, B.C., 22832','[\"Pepsi.Televenta@gepp.com\",\"karla.espinosa@gepp.com\",\"pablo.pena@gepp.com\",\"emma.caballero@gepp.com\",\"agustin.rodriguez@gepp.com\",\" CIC@gepp.com\"]',0,''),
	(44,13858,'HERMOSILLO','','','','','','','','','',1,'si','[\"1\",\"3\",\"5\"]','Av. Luis Donaldo Colosio 416, Villa Satelite, Hermosillo, Son., 83200','[\"Pepsi.Televenta@gepp.com\",\"karla.espinosa@gepp.com\",\"pablo.pena@gepp.com\",\"emma.caballero@gepp.com\",\"agustin.rodriguez@gepp.com\",\" CIC@gepp.com\"]',0,''),
	(46,0,'LOS CABOS','','','','','','','','','',1,'si','false','Carr. Transpeninsular KM 4.5, El Tezal, San José del Cabo, B.C.S., 23410','[\"Pepsi.Televenta@gepp.com\",\"karla.espinosa@gepp.com\",\"pablo.pena@gepp.com\",\"emma.caballero@gepp.com\",\"agustin.rodriguez@gepp.com\",\" CIC@gepp.com\"]',0,''),
	(48,2941,'GUADALAJARA I','','','','','','','','','',1,'si','[\"1\",\"5\"]','Av. Vallarta 4775, Fracc. Camichines Vallarta, Guadalajara, Jal., 45020','[\"Pepsi.Televenta@gepp.com\",\"karla.espinosa@gepp.com\",\"pablo.pena@gepp.com\",\"emma.caballero@gepp.com\",\"agustin.rodriguez@gepp.com\",\" CIC@gepp.com\"]',0,''),
	(50,2942,'GUADALAJARA II','','','','','','','','','',1,'si','[\"2\",\"6\"]','Blvd. Adolfo López Mateos, Fracc. Nueva Galicia, Tlajomulco de Zuñiga, Jal., 45645','[\"Pepsi.Televenta@gepp.com\",\"karla.espinosa@gepp.com\",\"pablo.pena@gepp.com\",\"emma.caballero@gepp.com\",\"agustin.rodriguez@gepp.com\",\" CIC@gepp.com\"]',0,''),
	(52,3849,'MORELIA','','','','','','','','','',1,'si','[\"2\",\"5\"]','Periferico Independencia 1000, Sor Juana Ines de la Cruz, Morelia, Mich., 58089','[\"Pepsi.Televenta@gepp.com\",\"karla.espinosa@gepp.com\",\"pablo.pena@gepp.com\",\"emma.caballero@gepp.com\",\"agustin.rodriguez@gepp.com\",\" CIC@gepp.com\"]',0,''),
	(54,1982,'CELAYA','','','','','','','','','',1,'si','[\"2\",\"6\"]','Av Tecnologico 651, Cd Industrial, Celaya, Gto., 38010','[\"Pepsi.Televenta@gepp.com\",\"karla.espinosa@gepp.com\",\"pablo.pena@gepp.com\",\"emma.caballero@gepp.com\",\"agustin.rodriguez@gepp.com\",\" CIC@gepp.com\"]',0,''),
	(56,2232,'PUERTO VALLARTA','','','','','','','','','',1,'si','[\"1\",\"5\"]','Av. Fluvial Vallarta 134, Fracc. Fluvial Vallarta, Puerto Vallarta, Jal., 48300','[\"Pepsi.Televenta@gepp.com\",\"karla.espinosa@gepp.com\",\"pablo.pena@gepp.com\",\"emma.caballero@gepp.com\",\"agustin.rodriguez@gepp.com\",\" CIC@gepp.com\"]',0,''),
	(58,3915,'PUEBLA','','','','','','','','','',1,'si','[\"1\"]','Blvd. Del Niño Poblano 2904, Concepción de la Cruz, Puebla, Pue., 72197','[\"Pepsi.Televenta@gepp.com\",\"karla.espinosa@gepp.com\",\"pablo.pena@gepp.com\",\"emma.caballero@gepp.com\",\"agustin.rodriguez@gepp.com\",\" CIC@gepp.com\"]',0,''),
	(60,3431,'VERACRUZ','','','','','','','','','',1,'si','[\"1\",\"5\"]','Blvd. Adolfo Ruiz Cortinez 1228 , Fraccionamiento S.U.T.S.E.M., Boca del Río, Ver., 94294','[\"Pepsi.Televenta@gepp.com\",\"karla.espinosa@gepp.com\",\"pablo.pena@gepp.com\",\"emma.caballero@gepp.com\",\"agustin.rodriguez@gepp.com\",\" CIC@gepp.com\"]',0,''),
	(62,2429,'XALAPA','','','','','','','','','',1,'si','[\"1\",\"6\"]','Carr. XalapaVeracruz Km 1.8 366, Fracc. Las Animas, Xalapa, Ver., 91190','[\"maimar@gmail.com\"]',0,''),
	(64,22065,'ACOXPA','','','','','','','','','',2,'si','[\"4\",\"6\"]','HACIENDA DE ACAMBAY 2, PRADO COAPA','[\"Pepsi.Televenta@gepp.com\",\"karla.espinosa@gepp.com\",\"pablo.pena@gepp.com\",\"emma.caballero@gepp.com\",\"agustin.rodriguez@gepp.com\",\" CIC@gepp.com\"]',0,''),
	(65,22086,'XOCHIMILCO','','','','','','','','','',2,'si','[\"3\",\"5\"]','PINO 38, BARRIO EL ROSARIO','[\"Pepsi.Televenta@gepp.com\",\"karla.espinosa@gepp.com\",\"pablo.pena@gepp.com\",\"emma.caballero@gepp.com\",\"agustin.rodriguez@gepp.com\",\" CIC@gepp.com\"]',0,''),
	(67,22078,'DEL VALLE','','','','','','','','','',2,'si','[\"4\",\"6\"]','ENRIQUE REBSAMEN 966, DEL VALLE','[\"Pepsi.Televenta@gepp.com\",\"karla.espinosa@gepp.com\",\"pablo.pena@gepp.com\",\"emma.caballero@gepp.com\",\"agustin.rodriguez@gepp.com\",\" CIC@gepp.com\"]',0,''),
	(69,22133,'SANTA ANA','','','','','','','','','',2,'si','[\"3\",\"6\"]','AV SANTA ANA 218 PB, EX EJIDOS DE CULHUACAN','[\"Pepsi.Televenta@gepp.com\",\"karla.espinosa@gepp.com\",\"pablo.pena@gepp.com\",\"emma.caballero@gepp.com\",\"agustin.rodriguez@gepp.com\",\" CIC@gepp.com\"]',0,''),
	(71,22091,'OBSERVATORIO','','','','','','','','','',3,'si','[\"2\",\"5\"]','AV OBSERVATORIO 457, HIDALGO','[\"Pepsi.Televenta@gepp.com\",\"karla.espinosa@gepp.com\",\"pablo.pena@gepp.com\",\"emma.caballero@gepp.com\",\"agustin.rodriguez@gepp.com\",\" CIC@gepp.com\"]',0,''),
	(72,22056,'METRO TACUBAYA','','','','','','','','','',3,'si','[\"2\",\"5\"]','INT METRO TACUBAYA CC02, TACUBAYA','[\"Pepsi.Televenta@gepp.com\",\"karla.espinosa@gepp.com\",\"pablo.pena@gepp.com\",\"emma.caballero@gepp.com\",\"agustin.rodriguez@gepp.com\",\" CIC@gepp.com\"]',0,'');

/*!40000 ALTER TABLE `sucursal` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
