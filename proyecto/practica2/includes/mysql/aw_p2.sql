-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-04-2021 a las 16:53:27
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

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

--
-- Volcado de datos para la tabla `articulos_segunda_mano`
--

INSERT INTO `articulos_segunda_mano` (`Numero`, `Nombre`, `Descripcion`, `Unidades`, `Precio`, `Imagen`) VALUES
(1, 'Art 1', 'Articulo 1', 2, 55, 'fdsafadgg'),
(2, 'Art 2', 'Descr 2', 35, 35, 'uysdudsfu'),
(4, 'Lavadora 2 mano', 'Lavadora Siemens', 2, 247, 'imagenes/productos/Lavadora_Siem');

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
(2421, 'Muy buena calidad, 5 estrellas', 'Comentario1', 1, 'correo1@ucm.es', 2443, NULL),
(2422, 'Se rompió a los 5 dias', 'Comentario2', 3, 'admin@admin.com', 2443, NULL),
(2423, 'Muy util', 'COMENTARO EN i7', 0, 'correo@correo.com', 2444, NULL),
(2424, 'Buena ram', 'RAM COMENTARIO', 0, 'admin@admin.com', 2442, NULL),
(2431, 'su iwuywe  ni', 'uydyuu', 0, 'correo1@ucm.es', 2442, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oferta`
--

CREATE TABLE `oferta` (
  `Numero` int(32) NOT NULL,
  `Nombre` varchar(32) COLLATE utf8_spanish_ci NOT NULL,
  `Descripcion` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `URL_Oferta` varchar(128) COLLATE utf8_spanish_ci NOT NULL,
  `URL_Imagen` varchar(128) COLLATE utf8_spanish_ci NOT NULL,
  `Valoracion` int(32) UNSIGNED NOT NULL,
  `Precio` int(32) UNSIGNED NOT NULL,
  `Creador` varchar(32) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `oferta`
--

INSERT INTO `oferta` (`Numero`, `Nombre`, `Descripcion`, `URL_Oferta`, `URL_Imagen`, `Valoracion`, `Precio`, `Creador`) VALUES
(1, 'Oferta1', 'Oferta numero 1', 'url', 'qga34gqqg', 0, 25, 'correo@correo.com'),
(2442, 'RAM 1', '16 Gb de RAM DDR4', 'amazon.es', 'imagenes/productos/ram.png', 0, 81, 'admin@admin.com'),
(2443, 'Nevera 1', 'Nevera Samsung 1000 litros capacidad con congelador', 'uuurfweqg', 'imagenes/productos/nevera.png', 1, 637, 'correo1@ucm.es'),
(2444, 'Intel Core I7', 'Procesador Intel i7 rebajado', 'www.amazon.es/Intel-Core-i7-10700K-Procesador-Casquillo/dp/B0883P8CNM/ref=sr_1_1', 'https://www.adslzone.net/app/uploads-adslzone.net/2016/07/Intel.jpg', 67, 293, 'correo@correo.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Correo` varchar(32) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre` varchar(32) COLLATE utf8_spanish_ci NOT NULL,
  `Contraseña` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `Premium` tinyint(1) NOT NULL DEFAULT 0,
  `Admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Correo`, `Nombre`, `Contraseña`, `Premium`, `Admin`) VALUES
('admin@admin.com', 'Admin', 'Admin1', 0, 1),
('correo@correo.com', 'UsuarioPrueba1', 'Password1', 0, 0),
('correo1@ucm.es', 'UsuarioPrueba2', 'Password2', 0, 0),
('persona@gmail.com', 'Persona', 'Persona1', 0, 0);

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
  MODIFY `Numero` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `Numero` int(32) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2432;

--
-- AUTO_INCREMENT de la tabla `oferta`
--
ALTER TABLE `oferta`
  MODIFY `Numero` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2449;

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
