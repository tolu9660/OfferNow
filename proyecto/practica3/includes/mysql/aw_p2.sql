-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-05-2021 a las 13:46:46
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
  `Nombre` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `Descripcion` varchar(128) COLLATE utf8_spanish_ci NOT NULL,
  `Unidades` int(32) UNSIGNED NOT NULL,
  `Precio` int(32) UNSIGNED NOT NULL,
  `Imagen` varchar(128) COLLATE utf8_spanish_ci NOT NULL,
  `Premium` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `articulos_segunda_mano`
--

INSERT INTO `articulos_segunda_mano` (`Numero`, `Nombre`, `Descripcion`, `Unidades`, `Precio`, `Imagen`, `Premium`) VALUES
(4, 'Lavadora 2 mano', 'Lavadora Siemens', 2, 247, 'imagenes/productos/Lavadora_Siemens.jpg', 0),
(9, 'Uncharted 4', 'Juego Uncharted 4 PS4', 32, 19, 'imagenes/productos/Uncharted4.jpg', 0),
(10, 'Pesas 4kg', '2 pesas de 4kg cada una', 3, 15, 'imagenes/productos/Pesas.jpg', 0),
(11, 'Redmi Note 8T', 'Movil Xiaomi Redmi Note 8T', 2, 189, 'imagenes/productos/Redmi_Note_8T.jpg', 1),
(12, 'Super Mario 3D World', 'Juego Super MArio 3D World Nintendo Switch', 5, 40, 'imagenes/productos/Super_Mario_3D_World.jpg', 1),
(16, 'tfyguhiol', 'hola caracolaaa', 1224, 123, 'rednty,u.iojasd', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentariosoferta`
--

CREATE TABLE `comentariosoferta` (
  `ID` int(32) NOT NULL,
  `Texto` varchar(512) COLLATE utf8_spanish_ci NOT NULL,
  `Titulo` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `ValoracionUtilidad` int(32) NOT NULL,
  `UsuarioID` varchar(32) COLLATE utf8_spanish_ci NOT NULL,
  `OfertaID` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `comentariosoferta`
--

INSERT INTO `comentariosoferta` (`ID`, `Texto`, `Titulo`, `ValoracionUtilidad`, `UsuarioID`, `OfertaID`) VALUES
(5, 'Buena capacidad y enfria bien', 'Muy buena nevera', 0, 'correo@correo.com', 2443);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentariossegundamano`
--

CREATE TABLE `comentariossegundamano` (
  `ID` int(32) NOT NULL,
  `Texto` varchar(512) COLLATE utf8_spanish_ci NOT NULL,
  `Titulo` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `ValoracionUtilidad` int(32) NOT NULL,
  `UsuarioID` varchar(32) COLLATE utf8_spanish_ci NOT NULL,
  `SegundaManoID` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `comentariossegundamano`
--

INSERT INTO `comentariossegundamano` (`ID`, `Texto`, `Titulo`, `ValoracionUtilidad`, `UsuarioID`, `SegundaManoID`) VALUES
(1, 'Uno de los juegos mas entretenidos que he jugado', 'Muy buen juego', 0, 'correo@correo.com', 9),
(3, 'Muy bueno', 'Juegazo', 0, 'correo@correo.com', 9),
(4, 'un 15', 'Perfecta', 0, 'correo@correo.com', 4),
(6, 'sdagdgd', 'safasf', 0, 'u@u.com', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oferta`
--

CREATE TABLE `oferta` (
  `Numero` int(32) NOT NULL,
  `Nombre` varchar(32) COLLATE utf8_spanish_ci NOT NULL,
  `Descripcion` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `URL_Oferta` varchar(512) COLLATE utf8_spanish_ci NOT NULL,
  `URL_Imagen` varchar(512) COLLATE utf8_spanish_ci NOT NULL,
  `Valoracion` int(32) UNSIGNED NOT NULL,
  `Precio` int(32) UNSIGNED NOT NULL,
  `Creador` varchar(32) COLLATE utf8_spanish_ci NOT NULL,
  `Premium` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `oferta`
--

INSERT INTO `oferta` (`Numero`, `Nombre`, `Descripcion`, `URL_Oferta`, `URL_Imagen`, `Valoracion`, `Precio`, `Creador`, `Premium`) VALUES
(2443, 'Nevera 1', 'Nevera Samsung 1000 litros capacidad con congelador', 'uuurfweqg', 'imagenes/productos/nevera.png', 1, 637, 'correo1@ucm.es', 0),
(2444, 'Intel Core I7', 'Procesador Intel i7 rebajado', 'www.amazon.es/Intel-Core-i7-10700K-Procesador-Casquillo/dp/B0883P8CNM/ref=sr_1_1', 'https://www.adslzone.net/app/uploads-adslzone.net/2016/07/Intel.jpg', 67, 293, 'correo@correo.com', 1),
(2449, 'Willful Smartwatch', 'Willful Smartwatch,Reloj Inteligente con Pulsómetro,Cronómetros,', 'www.amazon.es/Willful-Smartwatch-Inteligente-Cron%C3%B3metros-Impermeable/dp/B083DZPKTW', 'https://images-na.ssl-images-amazon.com/images/I/514Y7g-JQDL._AC_SY355_.jpg', 0, 34, 'persona@gmail.com', 0),
(2450, 'Monopoly para malos perdedores', 'Juego de Monopoly donde si pierdes gans', 'www.juguetilandia.com/producto/monopoly-para-malos-perdedores-hasbro-e9972-108833.htm?utm_source=www.chollometro.com&utm_campaign=idealo', 'https://cdn.juguetilandia.com/images/articulos/1999954422g00.jpg', 30, 23, 'persona@gmail.com', 1),
(2560, 'Subida1', 'subeeeeeeeeeeee', '324234234ewd', 'C:/Pablo/Universidad/xampp/htdocs/AW/OfferNow/proyecto/practica3/imagenes/productos/ofertas/Ejes1.PNG', 0, 999999999, 'usuario@usuario.com', 0),
(2561, 'Subida 2222222222', 'Budeeeeeeeeee 2222222222', '2222222222222', '/AW/OfferNow/proyecto/practica3/imagenes/productos/ofertas/Snk.png', 0, 4294967295, 'usuario@usuario.com', 0),
(2562, 'iusmmufds', 'dsagadga', 'dasfadg', '/AW/OfferNow/proyecto/practica3/imagenes/productos/ofertas/EzgzWIAXoAE0uCI.png', 0, 35, 'usuario@usuario.com', 0),
(2563, 'iusmmufds', 'dsagadga', 'dasfadg', '/AW/OfferNow/proyecto/practica3/imagenes/productos/ofertas/EzgzWIAXoAE0uCI.png', 0, 35, 'usuario@usuario.com', 0),
(2564, 'nyukasdnas', 'sdfafaufda', 'adadfa', 'infografia-iso15504-7.jpeg', 0, 44444444, 'usuario@usuario.com', 0),
(2566, 'offf55555555555', '55555555555555', '555555555555', 'carro-de-comida.png', 0, 555555555, 'u@u.com', 0),
(2567, 'uyadbubafs', 'dsadgda', 'fsdgtt2t3445', 'carro-de-comida.png', 0, 35534, 'u@u.com', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posiblescompras`
--

CREATE TABLE `posiblescompras` (
  `Numero` int(32) NOT NULL,
  `Nombre` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `Descripcion` varchar(128) COLLATE utf8_spanish_ci NOT NULL,
  `Unidades` int(32) UNSIGNED NOT NULL,
  `Precio` int(32) UNSIGNED NOT NULL,
  `Imagen` varchar(128) COLLATE utf8_spanish_ci NOT NULL,
  `UsuarioVendedor` varchar(32) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `posiblescompras`
--

INSERT INTO `posiblescompras` (`Numero`, `Nombre`, `Descripcion`, `Unidades`, `Precio`, `Imagen`, `UsuarioVendedor`) VALUES
(1, 'Venta11111111', '111111111111vendidoooololxd', 111, 111111, '170c6a2d3817b80630704114ca8ce5c3.jpg', 'u@u.com');

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
('admin@admin.com', 'Admin1', '$2y$10$Lg9eC/a5y6EG4ImYqlX6WeHyE/03UGW6SUE8qD3nUHAbvZhmgIT5y', 1, 1),
('correo@correo.com', 'UsuarioPrueba1', 'Password1', 1, 0),
('correo1@ucm.es', 'UsuarioPrueba2', 'Password2', 0, 0),
('hola@hola.com', 'Hola', 'Hola1', 0, 0),
('persona@gmail.com', 'Persona', 'Persona1', 0, 0),
('u@u.com', 'usuarioooo', '$2y$10$2Qx2N9DQtPhWQJMpRw0oH.ZMnI1QE61o7c/1yvn6qllHF8ykgFDNy', 1, 0),
('usuario@usuario.com', 'Usuario1', '$2y$10$j50qME.DF5OBCNAzt9ozWu6zVN5.qFw.7tCNVQkxVrYLua0oFk7ky', 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos_segunda_mano`
--
ALTER TABLE `articulos_segunda_mano`
  ADD PRIMARY KEY (`Numero`);

--
-- Indices de la tabla `comentariosoferta`
--
ALTER TABLE `comentariosoferta`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `OfertaID` (`OfertaID`),
  ADD KEY `CreadorID` (`UsuarioID`);

--
-- Indices de la tabla `comentariossegundamano`
--
ALTER TABLE `comentariossegundamano`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Creador` (`UsuarioID`),
  ADD KEY `SegundaManoID` (`SegundaManoID`);

--
-- Indices de la tabla `oferta`
--
ALTER TABLE `oferta`
  ADD PRIMARY KEY (`Numero`),
  ADD KEY `Nombre` (`Nombre`),
  ADD KEY `Creador` (`Creador`);

--
-- Indices de la tabla `posiblescompras`
--
ALTER TABLE `posiblescompras`
  ADD PRIMARY KEY (`Numero`),
  ADD KEY `usuarioVendedor` (`UsuarioVendedor`);

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
  MODIFY `Numero` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `comentariosoferta`
--
ALTER TABLE `comentariosoferta`
  MODIFY `ID` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `comentariossegundamano`
--
ALTER TABLE `comentariossegundamano`
  MODIFY `ID` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `oferta`
--
ALTER TABLE `oferta`
  MODIFY `Numero` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2568;

--
-- AUTO_INCREMENT de la tabla `posiblescompras`
--
ALTER TABLE `posiblescompras`
  MODIFY `Numero` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentariosoferta`
--
ALTER TABLE `comentariosoferta`
  ADD CONSTRAINT `comentariosoferta_ibfk_1` FOREIGN KEY (`OfertaID`) REFERENCES `oferta` (`Numero`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentariosoferta_ibfk_2` FOREIGN KEY (`UsuarioID`) REFERENCES `usuario` (`Correo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comentariossegundamano`
--
ALTER TABLE `comentariossegundamano`
  ADD CONSTRAINT `comentariossegundamano_ibfk_1` FOREIGN KEY (`SegundaManoID`) REFERENCES `articulos_segunda_mano` (`Numero`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentariossegundamano_ibfk_2` FOREIGN KEY (`UsuarioID`) REFERENCES `usuario` (`Correo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `oferta`
--
ALTER TABLE `oferta`
  ADD CONSTRAINT `oferta_ibfk_1` FOREIGN KEY (`Creador`) REFERENCES `usuario` (`Correo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `posiblescompras`
--
ALTER TABLE `posiblescompras`
  ADD CONSTRAINT `posiblescompras_ibfk_1` FOREIGN KEY (`usuarioVendedor`) REFERENCES `usuario` (`Correo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
