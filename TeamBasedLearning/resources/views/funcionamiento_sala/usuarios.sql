-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2018 a las 19:40:20
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
  `id_alu` varchar(9) NOT NULL,
  `nom_alu` varchar(30) NOT NULL,
  `ape_alu` varchar(30) NOT NULL,
  `cod_cur` varchar(10) NOT NULL,
  `id_sal` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id_alu`, `nom_alu`, `ape_alu`, `cod_cur`, `id_sal`) VALUES
('198765432', 'Juan', 'Perez', 'INFO1101', 1),
('199824309', 'Lorena', 'Vivar', 'INFO1101', 29),
('201239874', 'Pablo', 'Romero', 'INFO1101', 29),
('202439874', 'Teresa', 'Rodriguez', 'INFO1101', 29),
('200398874', 'Carlos', 'Rubular', 'INFO1101', 29),
('190002564', 'Alejandra', 'Cofre', 'INFO1101', 29),
('209312090', 'Soledad', 'Vega', 'INFO1101', 30),
('195533887', 'Genaro', 'Alarcon', 'INFO1101', 30),
('199322445', 'Jorge', 'Tapia', 'INFO1101', 30),
('194334000', 'Nicolas', 'Lira', 'INFO1101', 30),
('212432890', 'Fernanda', 'Cofre', 'INFO1101', 30),
('190111111', 'Gaston', 'Jaramillo', 'INFO1101', 31),
('196111111', 'Luis', 'Urra', 'INFO1101', 31),
('196111011', 'Humberto', 'Ferreira', 'INFO1101', 31),
('186111011', 'Gloria', 'Ruiz', 'INFO1101', 31),
('196311010', 'Andrea', 'Cerda', 'INFO1101', 31),
('199824309', 'Lorena', 'Vivar', 'BIO0101', 33),
('12340055k', 'Julia', 'Cofre', 'BIO0102', 35),
('12340059k', 'Almendra', 'Romero', 'BIO0102', 35),
('100000000', 'Patricia', 'Pereira', 'BIO0102', 37),
('2', 'Luz', 'Astete', 'BIO0102', 38),
('2', 'Luz', 'Astete', 'INFO1101', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `cod_cur` varchar(10) NOT NULL,
  `nom_cur` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`cod_cur`, `nom_cur`) VALUES
('BIO0101', 'Biologia molecular'),
('BIO0102', 'El cuerpo humano'),
('INFO1101', 'Programacion 1'),
('INFO4444', 'Teoria de sistemas'),
('INFO9191', 'Programacion 3');

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
(112, 'Lorena', 3, '2018-11-17', 'AdiÃ³s', '29'),
(113, 'Lorena', 3, '2018-11-17', 'AdiÃ³s', '29'),
(114, 'Lorena', 3, '2018-11-17', 'AdiÃ³s', '29'),
(115, 'Lorena', 3, '2018-11-17', 'AdiÃ³s', '29'),
(116, 'Lorena', 3, '2018-11-17', 'AdiÃ³s', '29'),
(117, 'Lorena', 3, '2018-11-17', 'AdiÃ³s', '29'),
(118, 'Lorena', 3, '2018-11-17', 'AdiÃ³s', '29'),
(119, 'Lorena', 3, '2018-11-17', 'AdiÃ³s', '29'),
(120, 'Lorena', 3, '2018-11-17', 'AdiÃ³s', '29'),
(121, 'Lorena', 3, '2018-11-18', 'mm', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `retro`
--

CREATE TABLE `retro` (
  `id_retro` int(5) NOT NULL,
  `id_tema` int(3) NOT NULL,
  `comentario` varchar(800) NOT NULL,
  `id_us` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `retro`
--

INSERT INTO `retro` (`id_retro`, `id_tema`, `comentario`, `id_us`) VALUES
(1, 1, 'Con append se agregan elementos al final de un arreglo', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sala`
--

CREATE TABLE `sala` (
  `id_sal` int(3) NOT NULL,
  `nom_tema` varchar(50) NOT NULL,
  `max_sal` int(1) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `cod_cur` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sala`
--

INSERT INTO `sala` (`id_sal`, `nom_tema`, `max_sal`, `estado`, `cod_cur`) VALUES
(1, 'Introducción a Python', 5, 0, 'INFO1101'),
(22, 'La celula', 5, 0, 'BIO0101'),
(29, 'Arreglos en Rubi', 5, 0, 'INFO1101'),
(30, 'Arreglos en Rubi', 5, 0, 'INFO1101'),
(31, 'Arreglos en Rubi', 5, 0, 'INFO1101'),
(32, 'Arreglos en Rubi', 5, 0, 'INFO1101'),
(33, 'El aparato de Golgi', 5, 0, 'BIO0101'),
(34, 'La tiroides', 5, 0, 'BIO0102'),
(35, 'El higado', 5, 0, 'BIO0102'),
(36, 'El higado', 5, 0, 'BIO0102'),
(37, 'El esofago', 5, 0, 'BIO0102'),
(38, 'Sistema respiratorio', 5, 0, 'BIO0102');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temas`
--

CREATE TABLE `temas` (
  `id_tema` int(3) NOT NULL,
  `nom_tema` varchar(50) NOT NULL,
  `cod_cur` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `temas`
--

INSERT INTO `temas` (`id_tema`, `nom_tema`, `cod_cur`) VALUES
(1, 'Introduccion a Python', 'INFO1101'),
(4, 'La celula', 'BIO0101'),
(5, 'Arreglos en Rubi', 'INFO1101'),
(6, 'El aparato de Golgi', 'BIO0101'),
(7, 'La tiroides', 'BIO0102'),
(8, 'El higado', 'BIO0102'),
(9, 'El esofago', 'BIO0102'),
(10, 'Sistema respiratorio', 'BIO0102');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_us` int(3) NOT NULL,
  `nom_us` varchar(30) NOT NULL,
  `ape_us` varchar(30) NOT NULL,
  `nivel` int(1) NOT NULL,
  `pass` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_us`, `nom_us`, `ape_us`, `nivel`, `pass`) VALUES
(1, 'Juan', 'Perez', 1, '1234'),
(2, 'Cesar', 'Vera', 0, '1234'),
(3, 'Lorena', 'Vivar', 1, '1234'),
(4, 'Pablo', 'Romero', 1, '1234'),
(5, 'Teresa', 'Rodriguez', 1, '1234'),
(6, 'Carlos', 'Rubilar', 1, '1234'),
(7, 'Alejandra', 'Cofre', 1, '1234'),
(8, 'Soledad', 'Vega', 1, '1234'),
(9, 'Genaro', 'Alarcon', 1, '1234'),
(10, 'Jorge', 'Tapia', 1, '1234'),
(11, 'Nicolas', 'Lira', 1, '1234'),
(12, 'Fernanda', 'Cofre', 1, '1234'),
(13, 'Gaston', 'Jaramillo', 1, '1234'),
(14, 'Luis', 'Urra', 1, '1234'),
(15, 'Humberto', 'Ferreira', 1, '1234'),
(16, 'Gloria', 'Ruiz', 1, '1234'),
(17, 'Andrea', 'Cerda', 1, '1234'),
(22, 'Julia', 'Cofre', 1, ''),
(23, 'Almendra', 'Romero', 1, ''),
(12340062, 'Patricia', 'Pereira', 1, '100000000'),
(12340063, 'Luz', 'Astete', 1, '2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`cod_cur`);

--
-- Indices de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `retro`
--
ALTER TABLE `retro`
  ADD PRIMARY KEY (`id_retro`);

--
-- Indices de la tabla `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`id_sal`);

--
-- Indices de la tabla `temas`
--
ALTER TABLE `temas`
  ADD PRIMARY KEY (`id_tema`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_us`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT de la tabla `retro`
--
ALTER TABLE `retro`
  MODIFY `id_retro` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `sala`
--
ALTER TABLE `sala`
  MODIFY `id_sal` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `temas`
--
ALTER TABLE `temas`
  MODIFY `id_tema` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_us` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12340064;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
