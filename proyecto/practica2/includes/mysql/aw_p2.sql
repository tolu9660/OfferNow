-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-04-2021 a las 23:50:55
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aw_p2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos_segunda_mano`
--

CREATE TABLE `articulos_segunda_mano` (
  `Numero` int(32) NOT NULL,
  `Nombre` varchar(32) COLLATE utf8_spanish_ci NOT NULL,
  `Descripcion` varchar(32) COLLATE utf8_spanish_ci NOT NULL,
  `Unidades` int(32) UNSIGNED NOT NULL,
  `Precio` int(32) UNSIGNED NOT NULL,
  `Imagen` varchar(32) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `Numero` int(32) UNSIGNED NOT NULL,
  `Texto` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `Titulo` varchar(32) COLLATE utf8_spanish_ci NOT NULL,
  `ValoracionUtilidad` int(32) UNSIGNED NOT NULL,
  `Usuario` varchar(32) COLLATE utf8_spanish_ci NOT NULL,
  `Oferta` int(32) DEFAULT NULL,
  `Articulo2mano` int(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`Numero`, `Texto`, `Titulo`, `ValoracionUtilidad`, `Usuario`, `Oferta`, `Articulo2mano`) VALUES
(2419, 'adsfasdg', 'adasd', 0, 'correo@correo.com', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oferta`
--

CREATE TABLE `oferta` (
  `Numero` int(32) NOT NULL,
  `Nombre` varchar(32) COLLATE utf8_spanish_ci NOT NULL,
  `Descripcion` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `URL_Oferta` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `URL_Imagen` varchar(32) COLLATE utf8_spanish_ci NOT NULL,
  `Valoracion` int(32) UNSIGNED NOT NULL,
  `Precio` int(32) UNSIGNED NOT NULL,
  `Creador` varchar(32) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `oferta`
--

INSERT INTO `oferta` (`Numero`, `Nombre`, `Descripcion`, `URL_Oferta`, `URL_Imagen`, `Valoracion`, `Precio`, `Creador`) VALUES
(1, 'Oferta1', 'Oferta numero 1', 'url', 'qga34gqqg', 0, 25, 'correo@correo.com'),
(2, 'Oferta2', 'movil', 'asdasdsaf', 'imagen', 12, 12, 'user'),
(3, 'movil', 'movil', 'zmovil.php', 'imagenes/productos/movil.png', 12, 12, 'user');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Correo` varchar(32) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre` varchar(32) COLLATE utf8_spanish_ci NOT NULL,
  `Contraseña` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Premium` tinyint(1) NOT NULL DEFAULT 0,
  `Admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Correo`, `Nombre`, `Contraseña`, `Premium`, `Admin`) VALUES
('correo@correo.com', 'UsuarioPrueba1', 'Password1', 0, 0),
('user', 'userpass', '1234', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos_segunda_mano`
--
ALTER TABLE `articulos_segunda_mano`
  ADD PRIMARY KEY (`Numero`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`Numero`),
  ADD KEY `Usuario` (`Usuario`),
  ADD KEY `Oferta` (`Oferta`),
  ADD KEY `Articulo2mano` (`Articulo2mano`);

--
-- Indices de la tabla `oferta`
--
ALTER TABLE `oferta`
  ADD PRIMARY KEY (`Numero`),
  ADD KEY `Nombre` (`Nombre`),
  ADD KEY `Creador` (`Creador`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Correo`),
  ADD KEY `Nombre` (`Nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos_segunda_mano`
--
ALTER TABLE `articulos_segunda_mano`
  MODIFY `Numero` int(32) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `Numero` int(32) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2420;

--
-- AUTO_INCREMENT de la tabla `oferta`
--
ALTER TABLE `oferta`
  MODIFY `Numero` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2428;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`Usuario`) REFERENCES `usuario` (`Correo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`Articulo2mano`) REFERENCES `articulos_segunda_mano` (`Numero`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentarios_ibfk_3` FOREIGN KEY (`Oferta`) REFERENCES `oferta` (`Numero`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `oferta`
--
ALTER TABLE `oferta`
  ADD CONSTRAINT `oferta_ibfk_1` FOREIGN KEY (`Creador`) REFERENCES `usuario` (`Correo`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
