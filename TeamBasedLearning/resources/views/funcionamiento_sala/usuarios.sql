-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-11-2018 a las 20:37:49
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `usuarios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `id_alu` int(3) NOT NULL,
  `nom_alu` varchar(30) NOT NULL,
  `ape_alu` varchar(30) NOT NULL,
  `cod_cur` varchar(10) NOT NULL,
  `nivel` int(1) NOT NULL,
  `sala` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id_alu`, `nom_alu`, `ape_alu`, `cod_cur`, `nivel`, `sala`) VALUES
(1, 'Juan', 'Perez', 'INFO0001', 1, ''),
(2, 'Pedro', 'Perez', 'INFO0002', 1, ''),
(3, 'Carlos', 'Fernandez', 'INFO0001', 1, ''),
(4, 'Lorena', 'Aravena', 'INFO0002', 1, ''),
(5, 'Cesar', 'Cofre', 'INFO0001', 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `id` int(3) NOT NULL,
  `nom_cur` varchar(30) NOT NULL,
  `cod_cur` varchar(10) NOT NULL,
  `tema` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`id`, `nom_cur`, `cod_cur`, `tema`) VALUES
(1, 'Programacion 1', 'INFO0001', 'Introduccion a Python'),
(2, 'Programacion 2', 'INFO0002', 'Uso de awt y swing en Java');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE `mensaje` (
  `id` int(5) NOT NULL,
  `emisor` varchar(30) NOT NULL,
  `id_emisor` int(3) NOT NULL,
  `fecha` varchar(10) NOT NULL,
  `contenido` varchar(500) NOT NULL,
  `sala` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mensaje`
--

INSERT INTO `mensaje` (`id`, `emisor`, `id_emisor`, `fecha`, `contenido`, `sala`) VALUES
(1, 'Pedro', 2, '2018-10-31', 'Hola mundo!', 'Sala1'),
(2, 'Carlos', 3, '2018-10-31', 'Hola Pedro, tienes la 2?', 'Sala1'),
(3, 'Pedro', 2, '2018-11-01', 'chaito', 'Sala1'),
(4, 'Juan', 1, '2018-11-01', 'asd', 'Sala1'),
(5, 'Juan', 1, '2018-11-01', 'tonto', 'Sala1'),
(9, 'Pedro', 2, '2018-11-01', 'asdasdasd', 'Sala2'),
(10, 'Lorena', 4, '2018-11-01', 'Hola Pedro no escribas tonteras', 'Sala2'),
(11, 'Pedro', 2, '2018-11-01', 'Bueno disculpa', 'Sala2'),
(12, 'Pedro', 2, '2018-11-01', 'chao me voy', 'Sala2'),
(13, 'Pedro', 2, '2018-11-01', 'Volvi!', 'Sala2'),
(14, 'Lorena', 4, '2018-11-01', 'Que bueno', 'Sala2'),
(15, 'Pedro', 2, '2018-11-01', 'Soy Pedro', 'Sala2'),
(16, 'Lorena', 4, '2018-11-01', 'Si ya lo se', 'Sala2'),
(17, 'Pedro', 2, '2018-11-01', 'm', 'Sala2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sala`
--

CREATE TABLE `sala` (
  `id_sal` int(3) NOT NULL,
  `nom_sal` varchar(20) NOT NULL,
  `max_sal` int(1) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `cod_cur` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sala`
--

INSERT INTO `sala` (`id_sal`, `nom_sal`, `max_sal`, `estado`, `cod_cur`) VALUES
(1, 'Sala1', 5, 1, 'INFO0001'),
(2, 'Sala2', 5, 0, 'INFO0002'),
(3, 'Sala3', 5, 0, 'INFO0003');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
