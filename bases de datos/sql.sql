-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.32-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para veterinaria
CREATE DATABASE IF NOT EXISTS `veterinaria` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `veterinaria`;

-- Volcando estructura para tabla veterinaria.mascota
CREATE TABLE IF NOT EXISTS `mascota` (
  `idmascota` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `edad` varchar(45) DEFAULT NULL,
  `usuario_idusuario` int(11) NOT NULL,
  `tipo_mascota_idtipo_mascota` int(11) NOT NULL,
  `raza_idraza` int(11) NOT NULL,
  PRIMARY KEY (`idmascota`),
  KEY `fk_mascota_usuario_idx` (`usuario_idusuario`),
  KEY `fk_mascota_tipo_mascota1_idx` (`tipo_mascota_idtipo_mascota`),
  KEY `fk_mascota_raza1_idx` (`raza_idraza`),
  CONSTRAINT `fk_mascota_raza1` FOREIGN KEY (`raza_idraza`) REFERENCES `raza` (`idraza`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_mascota_tipo_mascota1` FOREIGN KEY (`tipo_mascota_idtipo_mascota`) REFERENCES `tipo_mascota` (`idtipo_mascota`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_mascota_usuario` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Volcando datos para la tabla veterinaria.mascota: ~4 rows (aproximadamente)
REPLACE INTO `mascota` (`idmascota`, `nombre`, `edad`, `usuario_idusuario`, `tipo_mascota_idtipo_mascota`, `raza_idraza`) VALUES
	(1, 'Atena', '2 años', 1, 1, 1),
	(2, 'kira', '1 año', 2, 1, 2),
	(3, 'saku', '1 año', 2, 2, 3),
	(7, 'VBCVB', '44', 7, 1, 7);

-- Volcando estructura para tabla veterinaria.raza
CREATE TABLE IF NOT EXISTS `raza` (
  `idraza` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion_raza` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idraza`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Volcando datos para la tabla veterinaria.raza: ~5 rows (aproximadamente)
REPLACE INTO `raza` (`idraza`, `descripcion_raza`) VALUES
	(1, 'pitbull'),
	(2, 'pastor alemán'),
	(3, 'Siamés'),
	(4, 'Persa'),
	(7, 'mongongo');

-- Volcando estructura para tabla veterinaria.tipo_mascota
CREATE TABLE IF NOT EXISTS `tipo_mascota` (
  `idtipo_mascota` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idtipo_mascota`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Volcando datos para la tabla veterinaria.tipo_mascota: ~3 rows (aproximadamente)
REPLACE INTO `tipo_mascota` (`idtipo_mascota`, `descripcion`) VALUES
	(1, 'Perro'),
	(2, 'Gato'),
	(4, 'ZCX');

-- Volcando estructura para tabla veterinaria.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `documento` varchar(15) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Volcando datos para la tabla veterinaria.usuario: ~4 rows (aproximadamente)
REPLACE INTO `usuario` (`idusuario`, `documento`, `nombre`, `apellido`, `email`) VALUES
	(1, '1052391445', 'Marco Antonio', 'Cipagauta Arbeláez', 'jcmp.marcos@hotmail.com'),
	(2, '1053899654', 'Liliana', 'Cipagauta Arbelaez', 'lili@hotmail.com'),
	(6, 'fdsfsd', 'Cristian', 'Garcia', 'criatiangarcia637@gmail.com'),
	(7, 'e', 'MAICOL', 'DKASD', 'DASDA');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
