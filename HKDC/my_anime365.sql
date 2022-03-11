-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 11-03-2022 a las 13:40:06
-- Versión del servidor: 5.7.36
-- Versión de PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `my_anime365`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atletas`
--

DROP TABLE IF EXISTS `atletas`;
CREATE TABLE IF NOT EXISTS `atletas` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `Club` varchar(100) NOT NULL,
  `Cedula` varchar(100) NOT NULL,
  `Nombres` varchar(100) NOT NULL,
  `Apellidos` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `Edad` varchar(100) NOT NULL,
  `F_N` varchar(100) NOT NULL,
  `tel` varchar(100) NOT NULL,
  `Cinturon` varchar(100) NOT NULL,
  `Genero` varchar(100) NOT NULL,
  `Peso` varchar(100) NOT NULL,
  `Categoria_Edad` varchar(100) NOT NULL,
  `Rango` varchar(100) NOT NULL,
  `Categoria_Peso` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `username` varchar(100) NOT NULL,
  `fecha` varchar(100) NOT NULL,
  `hora` varchar(100) NOT NULL,
  `operacion` varchar(100) NOT NULL,
  `id` int(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `logs`
--

INSERT INTO `logs` (`username`, `fecha`, `hora`, `operacion`, `id`) VALUES
('Kek-SUPERUSER', '2017/03/01', '10:27:56', 'inicio de sesion', 1),
('Kek-SUPERUSER', '2017/03/01', '10:34:29', 'inicio de sesion', 2),
('Kek-SUPERUSER', '2017/03/01', '10:34:36', 'cierre de sesion', 3),
('Kek-SUPERUSER', '2017/03/01', '10:38:22', 'inicio de sesion', 4),
('Kek-SUPERUSER', '2017/03/01', '10:40:32', 'cierre de sesion', 5),
('Kek-SUPERUSER', '2017/03/01', '10:40:46', 'inicio de sesion', 6),
('Kek-SUPERUSER', '2017/03/01', '10:41:15', 'cierre de sesion', 7),
('Kek-SUPERUSER', '2017/03/01', '10:52:36', 'inicio de sesion', 8),
('Kek-SUPERUSER', '2017/03/01', '10:57:17', 'inicio de sesion', 9),
('Kek-SUPERUSER', '2017/03/01', '10:58:20', 'cierre de sesion', 10),
('', '2022/03/11', '09:33:19', 'cierre de sesion', 11),
('Kek-SUPERUSER', '2022/03/11', '09:35:30', 'cierre de sesion', 12),
('Kek-SUPERUSER', '2022/03/11', '09:36:15', 'cierre de sesion', 13),
('Kek-SUPERUSER', '2022/03/11', '09:37:12', 'inicio de sesion', 14),
('Kek-SUPERUSER', '2022/03/11', '09:37:15', 'cierre de sesion', 15),
('Kek-SUPERUSER', '2022/03/11', '09:37:18', 'inicio de sesion', 16),
('Kek-SUPERUSER', '2022/03/11', '09:38:16', 'cierre de sesion', 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `edad` int(3) NOT NULL,
  `fn` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `club` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `correo`, `nombre`, `apellido`, `edad`, `fn`, `direccion`, `telefono`, `club`) VALUES
(1, 'Kek-SUPERUSER', 'jd3t2qh36r', 'rochugui10@gmail.com', 'Roberto', 'Velasquez', 20, '07-12-1996', 'Cojedes', '04120371921', 'baqueano');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
