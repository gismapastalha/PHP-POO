-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-06-2022 a las 13:45:12
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `comentarios`
--
CREATE DATABASE IF NOT EXISTS `comentarios` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `comentarios`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
CREATE TABLE `comentarios` (
  `idcomentario` int(11) NOT NULL,
  `comentario` varchar(600) DEFAULT NULL,
  `foto` varchar(60) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT current_timestamp(),
  `idusuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`idcomentario`, `comentario`, `foto`, `fecha`, `idusuario`) VALUES
(38, 'Comentario 1', NULL, '2022-06-21 11:39:01', 64),
(39, 'Comentario 2', NULL, '2022-06-21 11:39:01', 64),
(40, 'Comentario 3', NULL, '2022-06-21 11:39:26', 66),
(41, 'Comentario 4', NULL, '2022-06-21 11:39:26', 66),
(42, 'Comentario 5', NULL, '2022-06-21 11:39:55', 68),
(43, 'Comentario 6', NULL, '2022-06-21 11:39:55', 75),
(44, 'Comentario 7', NULL, '2022-06-21 11:41:01', 64),
(45, 'Comentario 8', NULL, '2022-06-21 11:42:50', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `nif` varchar(10) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `email` varchar(80) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `tipousuario` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nif`, `nombre`, `apellidos`, `email`, `password`, `timestamp`, `tipousuario`) VALUES
(64, '40000001A', 'Pepe', 'Viyuela', 'pepe@mail.com', 'pepe', '2016-05-20 14:53:31', NULL),
(66, '40000001B', 'John', 'Rambo', 'john@mail.com', 'john', '2016-05-20 15:40:35', 'AD'),
(68, '40000001C', 'Petra', 'Pedrusco', 'petra@mail.com', 'petra', '2016-05-27 17:22:06', ''),
(75, '40000001D', 'Johny', 'Mentero', 'johny@mail.com', 'johny', '2017-10-30 10:20:54', NULL),
(120, '40000006G', 'Fina', 'Gamenower', NULL, 'fina', '2020-09-24 16:54:58', NULL),
(121, '40000007H', 'Baster', 'Scroog', NULL, 'baster', '2020-09-24 16:55:39', 'AD');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`idcomentario`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `nif_UNIQUE` (`nif`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `idcomentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
