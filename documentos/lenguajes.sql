-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 27-05-2024 a las 01:48:15
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lenguajes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `frameworks`
--

CREATE TABLE `frameworks` (
  `id` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `lanzamiento` int(4) NOT NULL,
  `desarrollador` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `frameworks`
--

INSERT INTO `frameworks` (`id`, `nombre`, `lanzamiento`, `desarrollador`) VALUES
(2, 'angular', 2016, 'Google'),
(3, 'react', 2013, 'facebook'),
(4, 'Flutter', 2025, 'Por Alejandro');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `frameworks`
--
ALTER TABLE `frameworks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `frameworks`
--
ALTER TABLE `frameworks`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
