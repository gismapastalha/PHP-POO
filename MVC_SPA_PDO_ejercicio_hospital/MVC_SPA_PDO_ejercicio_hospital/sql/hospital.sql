-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-08-2019 a las 11:23:28
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hospital`
--
CREATE DATABASE IF NOT EXISTS `hospital` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `hospital`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

DROP TABLE IF EXISTS `paciente`;
CREATE TABLE `paciente` (
  `idpaciente` int(11) NOT NULL,
  `nif` varchar(10) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `fechaingreso` date DEFAULT NULL,
  `fechaalta` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`idpaciente`, `nif`, `nombre`, `apellidos`, `fechaingreso`, `fechaalta`) VALUES
(4, '12545645H', 'Margaret', 'Rose', '2019-03-13', NULL),
(7, '34567897U', 'John', 'Rambo', '2019-03-20', '0000-00-00'),
(10, '12345644Y', 'Anne', 'Rambo', '2019-03-04', NULL),
(15, '45675658H', 'Johny', 'Mentero', '2019-03-05', '2019-03-13'),
(17, '34567867U', 'Margaretti', 'Rambinni', '2019-03-20', NULL),
(18, '76765774Y', 'Knauss', 'Maffei', '2019-03-05', NULL),
(32, '12345671L', 'Arch', 'Stanton', '2019-03-13', '2019-08-31'),
(33, '10000004K', 'Tucco', 'Beneditto Pacífico', '2019-08-05', NULL),
(34, '45445444J', 'Rippley', 'Gomes', '2019-08-20', '2019-08-27'),
(35, '12345656H', 'Piluca', 'Drew', '2019-08-12', NULL),
(38, '34455666J', 'Marion', 'Cobretti', '2019-08-13', NULL),
(39, '34411666J', 'Rocky', 'Balboa', '2019-08-13', NULL),
(40, '10001166J', 'Filemón', 'Pi', '2019-08-13', NULL),
(41, '10007766J', 'Karl', 'Heinz', '2019-08-13', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`idpaciente`),
  ADD UNIQUE KEY `nif_UNIQUE` (`nif`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `idpaciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
