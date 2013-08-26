-- phpMyAdmin SQL Dump

-- Created At: 26-08-2013 

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: ` sitio web de juanacatlan`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_transparencia`
--

CREATE TABLE IF NOT EXISTS `categorias_transparencia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text,
  `clave` varchar(255) DEFAULT NULL,
  `status` enum('ACTIVO','INACTIVO') NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `categorias_transparencia`
--

INSERT INTO `categorias_transparencia` (`id`, `nombre`, `descripcion`, `clave`, `status`, `created_at`) VALUES
(1, 'Articulo 32', NULL, 'articulo_32', 'ACTIVO', '2013-08-21 00:00:00'),
(2, 'Articulo 39', NULL, 'articulo_39', 'ACTIVO', '2013-08-21 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`) VALUES
(3, 'Transparencia'),
(2, 'Contenido'),
(1, 'Admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transparencia`
--

CREATE TABLE IF NOT EXISTS `transparencia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria_transparencia_id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `contenido` text,
  `archivo` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `opcion_link` enum('ARCHIVO','LINK') NOT NULL,
  `status` enum('ACTIVO','INACTIVO') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `rol_id`, `usuario`, `password`, `nombre`, `apellidos`, `email`, `status`, `created_at`) VALUES
(1, 1, 'admin', '091cd1c086d53ffd1f89fc753493c89b', 'admin', 'admin', NULL, 'ACTIVO', '2013-08-25 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
