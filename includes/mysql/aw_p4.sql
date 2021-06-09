-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-06-2021 a las 09:42:49
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
  `Descripcion` varchar(1024) COLLATE utf8_spanish_ci NOT NULL,
  `Unidades` int(32) UNSIGNED NOT NULL,
  `Precio` int(32) UNSIGNED NOT NULL,
  `Imagen` varchar(128) COLLATE utf8_spanish_ci NOT NULL,
  `Premium` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `articulos_segunda_mano`
--

INSERT INTO `articulos_segunda_mano` (`Numero`, `Nombre`, `Descripcion`, `Unidades`, `Precio`, `Imagen`, `Premium`) VALUES
(4, 'Lavadora 2 mano', 'Con la lavadora Siemens obtendrás los mejores resultados en un abrir y cerrar de ojos. Resultados perfectos gracias a la mejor tecnología y a sus innovadoras funciones que no solo proporcionan resultados excepcionales en tu colada, sino que facilitan las tareas diarias. Olvida poner detergente y suavizante gracias a la autodosificación inteligente, consigue unos resultados perfectos para la colada diaria en menos de 1 hora con powerSpeed 59, pon la lavadora desde el trabajo con Home Connect y ahorra agua y electricidad gracias a la tecnología waterPerfect plus.', 0, 200, 'Lavadora_Siemens.jpg', 0),
(9, 'Uncharted 4', 'Tres años después de los hechos acaecidos en Uncharted 3: La traición de Drake, Nathan Drake ha dejado atrás la búsqueda de tesoros. Sin embargo, el destino no tarda en llamar a su puerta cuando su hermano Sam reaparece pidiéndole ayuda para salvar su vida, además de ofrecerle participar en una aventura ante la que Nathan no puede resistirse.', 31, 19, 'Uncharted4.jpg', 0),
(10, 'Pesas 2kg', 'Set de 2 pesas de vinilo de 2 kg perfectas para sus entrenamientos habituales.', 2, 15, 'Pesas.jpg', 0),
(11, 'Redmi Note 8T', 'El Xiaomi Redmi Note 8T es un smartphone Android con una pantalla Full HD+ de 6.3 pulgadas y potenciado por un procesador Snapdragon 665 de ocho núcleos, acompañado de 3GB de memoria RAM con 32GB de almacenamiento o 4GB de memoria RAM con opciones de 64GB o 128GB de almacenamiento interno.', 2, 189, 'Redmi_Note_8T.jpg', 1),
(12, 'Super Mario 3D World Bowsers Fury', '¡Únete a Mario, Luigi, Peach y Toad en su misión para salvar el reino de las hadas en Super Mario 3D World + Bowser’s Fury para Nintendo Switch! Rescata a la princesa hada y a sus amigas, en solitario o con hasta 3 jugadores más, en esta versión mejorada de Super Mario 3D World. Y después, también en solitario o con un amigo, ayuda a Bowsy a devolver a su papi a la normalidad en una aventura totalmente nueva: ¡Bowsers Fury!', 5, 40, 'Super_Mario_3D_World.jpg', 1),
(13, 'BenQ ZOWIE XL2411K Monitor', 'La nueva generación de monitores de PC para e-sports de la serie XL aumenta aún más la flexibilidad y precisión de ajuste, así como la comodidad de los jugadores, lo que les permite centrarse en su rendimiento en el juego, con 144hz una base mas pequeña y un ajuste fluido y flexible incluyendo la nueva tecnología DyAc', 3, 279, 'monitorbenq.jpg', 0),
(14, 'Seagate Expansion 2 4TB USB 3', 'Las unidades portátiles Expansion de Seagate son compactas y perfectas para un estilo de vida activo. Añada más espacio de almacenamiento instantáneamente a su equipo, y lleve sus archivos de gran tamaño a cualquier parte con este disco duro portátil de 2.5\" y una capacidad de 4TB.', 5, 95, 'usb4tb.jpg', 1),
(25, 'Television LG 32LM6370PLA 32 pulgadas LED FullHD', 'Televisor 32LM6370PLA de LG, su pantalla Full HD ofrece imágenes precisas con una resolución extraordinaria y colores ricos. Estado bueno con un rasguño en la parte superior', 39, 278, 'televisionLG.jpg', 0),
(34, 'Lotus Style Pulsera modelo LS2015-2/1', 'Pulsera lotus para mujer, muy buen estado', 4, 19, 'pulsera.jpg', 0),
(43, 'Alfombra Persa', 'Alfombra de estilo persa hecha a mano con lana de alta calidad bajo directrices de alta calidad. Buen estado', 0, 569, 'alfombra.jpg', 0),
(44, 'Pelicula Snatch: cerdos y diamantes (edicion metalica)', 'Peli en blu ray 4kHD', 2, 13, 'pelicula.jpg', 0),
(45, 'COWIN SE7 Auriculares con cancelación de ruido activa', 'Auriculares que compé hace 2 meses aun están en buen estado', 0, 30, 'auriculares.jpg', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id` int(32) NOT NULL,
  `idProducto` int(32) NOT NULL,
  `idUsuario` varchar(32) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Comprado` tinyint(1) NOT NULL,
  `unidades` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`id`, `idProducto`, `idUsuario`, `Comprado`, `unidades`) VALUES
(19, 9, 'josemanu@gmail.com', 1, 1),
(20, 10, 'roberpozilla@gmail.com', 1, 1),
(21, 43, 'admin@admin.com', 1, 2),
(22, 25, 'admin@admin.com', 1, 2);

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
(9, 'Justo lo que buscaba estoy encantada', 'buena oferta y buen precio!', 2, 'manuela99@gmail.com', 2443),
(10, 'Te indica muchos datos interesantes y curiosos al igual que los pasos, el ritmo cardiaco, de locos', 'Muy útil y buen precio', 4, 'josemanu@gmail.com', 2449),
(11, 'Encantado con este reloj y la oferta', 'Me gusta', 0, 'leo123@gmail.com', 2449),
(12, 'Se adapta bien a la mano', 'Muy comodo', 0, 'leo123@gmail.com', 2453),
(13, 'pequeña muy util si te mueves mucho de un lado a otro y necesitas una mesita', 'Me ha encantado entra en todos lados', 0, 'isabel1990@gmail.com', 2583);

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
(8, 'Me ha encantado la historia aunque un poco mas floja que el uncharted 3', 'Juegazo', 0, 'josemanu@gmail.com', 9),
(9, 'Me lo esperaba llegar en un peor estado pero muy bueno', 'Buen monitor y buen estado', 9, 'leo123@gmail.com', 13),
(10, 'muy bonita', 'Preciosa pulsera', 1, 'isabel1990@gmail.com', 34),
(11, 'buen monitor', 'De locos', 9, 'isabel1990@gmail.com', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oferta`
--

CREATE TABLE `oferta` (
  `Numero` int(32) NOT NULL,
  `Nombre` varchar(52) COLLATE utf8_spanish_ci NOT NULL,
  `Descripcion` varchar(1024) COLLATE utf8_spanish_ci NOT NULL,
  `URL_Oferta` varchar(512) COLLATE utf8_spanish_ci NOT NULL,
  `URL_Imagen` varchar(512) COLLATE utf8_spanish_ci NOT NULL,
  `Valoracion` int(32) UNSIGNED NOT NULL,
  `Precio` int(32) UNSIGNED NOT NULL,
  `Creador` varchar(32) COLLATE utf8_spanish_ci NOT NULL,
  `Premium` tinyint(1) NOT NULL DEFAULT 0,
  `ID2Mano` int(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `oferta`
--

INSERT INTO `oferta` (`Numero`, `Nombre`, `Descripcion`, `URL_Oferta`, `URL_Imagen`, `Valoracion`, `Precio`, `Creador`, `Premium`, `ID2Mano`) VALUES
(31, 'Venyilador Orbegozo SF 0147', 'Ventilador de Pie Orbegozo oscilante blanco de 50 W de potencia\r\nDispone de un asa que facilita su transporte\r\nGracias a su altura regulable podrás adaptar su uso a cualquier lugar\r\nTres velocidades de ventilación entre las que escoger la potencia de ventilación deseada\r\nEl diámetro de la hélice es de 40 cm', 'https://www.amazon.es/Orbegozo-SF-0147-Ventilador-velocidades/dp/B01D4YVY80/ref=sr_1_5?__mk_es_ES=%C3%85M%C3%85%C5%BD%C3%95%C3%91&dchild=1&keywords=ventilador&qid=1623171812&sr=8-5', 'ventilador.jpg', 67, 21, 'manuela99@gmail.com', 0, NULL),
(2443, 'Nevera Samsung RB38T675DSA ', 'Tecnología SpaceMax: Más espacio interior manteniendo el mismo tamaño exterior. Samsung ha reducido el grosor de las paredes maximizando la capacidad interior alcanzando hasta 390 litros de capacidad neta\r\nAll-Around Cooling: La temperatura se mantiene constante en cada balda gracias a que el aire frío sale por las múltiples ranuras dispuestas en cada una de ellas.', 'https://www.amazon.es/dp/B08D9RT8Q3/ref=redir_mobile_desktop?_encoding=UTF8&aaxitk=c2ddd79d23b21ba07492de7bb6825832&hsa_cr_id=6131583580202&pd_rd_plhdr=t&pd_rd_r=b998aa06-07e8-4de2-8b30-574293f99a35&pd_rd_w=7w1zw&pd_rd_wg=jWtcr&ref_=sbx_be_s_sparkle_mcd_asin_1_img', 'nevera.jpg', 920, 637, 'manuela99@gmail.com', 0, NULL),
(2444, 'Intel Core I7', 'El Core i7-10700K es un procesador de 8 núcleos y 16 hilos de proceso gracias a la tecnología HyperThreading de la marca, con una velocidad base de 3,8 GHz pero que aumenta hasta 5,1 GHz en modo Turbo. Cuenta con 16 MB Smart Cache de Intel, y su TDP es de 125 vatios (con descenso de TDP configurable a 95W)', 'https://www.amazon.es/Intel-Core-i7-10700K-Procesador-Casquillo/dp/B0883P8CNM/ref=sr_1_1', 'Intel.png', 760, 293, 'manuela99@gmail.com', 1, NULL),
(2449, 'Willful Smartwatch', 'El Willful Smartwatch tiene una pantalla TFT táctil de 1,3 pulgadas. Con un giro de muñeca se activa la pantalla sin necesidad de tocarla. Dispones de tres niveles de brillo para adaptarte a diferentes intensidades de luz. Su batería te proporciona una autonomía de hasta 7 días con un tiempo de carga de 2,5 horas.', 'https://www.amazon.es/Willful-Smartwatch-Inteligente-Cron%C3%B3metros-Impermeable/dp/B083DZPKTW', 'reloj.png', 420, 34, 'manuela99@gmail.com', 0, NULL),
(2450, 'Monopoly para malos perdedores', 'Este toque divertido al juego Monopoly cambia el sentido de la palabra “perder” y lo celebra. Los jugadores pueden ganar dinero en efectivo al hacer cosas que, por lo general, generan frustración en el juego, como ir a la Cárcel, pagar el alquiler de una propiedad o entrar en bancarrota.', 'https://www.juguetilandia.com/producto/monopoly-para-malos-perdedores-hasbro-e9972-108833.htm?utm_source=www.chollometro.com&utm_campaign=idealo', 'monopoly.png', 259, 23, 'manuela99@gmail.com', 1, NULL),
(2451, 'Silla gaming', 'La silla de diseño Racing, Stinger Station Alien está creada para que disfrutes al máximo de una experiencia envolvente y confortable en tus largas e intensas sesiones de juegos y también en tus jornadas de trabajo o estudios. Podrás disfrutar de un diseño deportivo y ergonómico, fabricado en materiales de máxima calidad, muy duraderos, suaves y acolchados que duplican su confort. La serie ALIEN se define por su estética racing, su diseño \"de otra galaxia\" y su máxima calidad en la configuración de sus materiales.', 'https://www.pccomponentes.com/woxter-stinger-station-alien-silla-gaming-blue', 'sillagaming.jpg', 211, 109, 'manuela99@gmail.com', 0, NULL),
(2452, 'Logitech Stereo Speakers Z120', 'Te presentamos los Logitech Stereo Speakers Z120, unos compactos altavoces USB con controles de volumen y encendido integrados facilitan la conexión de casi cualquier fuente de audio. Para que pueda disfrutar fácilmente de la música, el vídeo, etc. que prefiera. Estos altavoces compactos y versátiles son fáciles de conectar y controlar.', 'https://www.pccomponentes.com/logitech-stereo-speakers-z120', 'altavoceslogitech.jpg', 158, 15, 'manuela99@gmail.com', 0, NULL),
(2453, 'Logitech M705 Raton Inalambrico', 'El ratón Logitech Marathon Mouse M705 dura... y dura... y dura. Usa mucha menos energía que los ratones inalámbricos comparables de otras empresas, por lo que pueden pasar hasta tres años sin tener que cambiar las pilas. Además, cuenta con un receptor inalámbrico minúsculo que está acoplado permanentemente al ordenador, para que el ratón siempre esté listo para funcionar, en cualquier momento, en cualquier lugar y durante el tiempo necesario. Asimismo, el desplazamiento superrápido te permitirá desplazarte a gran velocidad por documentos largos para buscar lo que necesites sin pérdida de tiempo. El seguimiento láser ofrece un control preciso y uniforme del cursor. Y el diseño contorneado del ratón para la mano derecha resulta cómodo de principio a fin de la sesión.', 'https://www.pccomponentes.com/logitech-m705-marathon-mouse-raton-inalambrico-1000-dpi', 'raton.jpg', 81, 38, 'manuela99@gmail.com', 0, NULL),
(2454, 'Television LG 32LM6370PLA 32 pulgadas LED FullHD', 'Nuevo televisor 32LM6370PLA de LG, su pantalla Full HD ofrece imágenes precisas con una resolución extraordinaria y colores ricos.', 'https://www.pccomponentes.com/lg-32lm6370pla-32-led-fullhd-hdr10', 'televisionLG.jpg', 41, 278, 'manuela99@gmail.com', 0, NULL),
(2582, 'Regleta Trust 21059', '6 enchufes protegidos contra sobretensiones para conectar y alimentar dispositivos de forma segura\r\nPráctico interruptor general para apagar simultáneamente todos los dispositivos conectados\r\nEnchufes dotados con protección infantil para evitar que los niños accedan a los contactos de los enchufes\r\nEnchufes situados en ángulo de 45 grados para un mejor acceso\r\nInterruptor iluminado con indicación de modo activado o desactivado\r\nOrificios de sujeción para montaje fácil en pared', 'https://www.amazon.es/Trust-21059-Regleta-protecci%C3%B3n-sobretensiones/dp/B01KAFGMIS/ref=sr_1_5?__mk_es_ES=%C3%85M%C3%85%C5%BD%C3%95%C3%91&amp;dchild=1&amp;keywords=regleta&amp;qid=1623173109&amp;sr=8-5', 'regleta.jpg', 5, 10, 'leo123@gmail.com', 0, 0),
(2583, 'Mesa Resina Ratan Antracita', 'Medidas: 80x80x72 cm.\r\nRealizada en resina.\r\nSimil en ratan.\r\nIdeal para jardin, playa, terraza, patio, balcon, etc.', 'https://www.amazon.es/Papillon-Saturnia-8330121-Resina-Antracita/dp/B00A6FJPL4/ref=sr_1_16?__mk_es_ES=%C3%85M%C3%85%C5%BD%C3%95%C3%91&amp;dchild=1&amp;keywords=mesa&amp;qid=1623173320&amp;sr=8-16', 'mesa.jpg', 0, 39, 'leo123@gmail.com', 0, 0);

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
(8, 'Pantalones adidas', 'Pantalones adidas nuevos, los vendo porque me quedan grandes', 1, 20, 'pantalones.jpg', 'roberpozilla@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Correo` varchar(32) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre` varchar(32) COLLATE utf8_spanish_ci NOT NULL,
  `Contrasenia` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `Premium` tinyint(1) NOT NULL DEFAULT 0,
  `Admin` tinyint(1) NOT NULL DEFAULT 0,
  `Direccion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `tarjeta` varchar(16) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Correo`, `Nombre`, `Contrasenia`, `Premium`, `Admin`, `Direccion`, `tarjeta`) VALUES
('admin@admin.com', 'Admin1', '$2y$10$Lg9eC/a5y6EG4ImYqlX6WeHyE/03UGW6SUE8qD3nUHAbvZhmgIT5y', 1, 1, '0', '1111222233334444'),
('isabel1990@gmail.com', 'Isabel Collado', '$2y$10$7URax4iD3Cor2ggt2bzhNOsZaVoYTmu8Q8R/e0xmogq/WsyJmLSxm', 0, 0, 'Sastres,98', ''),
('josemanu@gmail.com', 'Jose Manuel', '$2y$10$qVigAtGtn37sJr/AsSnNtup45S2zc1yzbez..bpojn1PzBG7uHsRi', 0, 0, 'Rio,40', '4755123456784568'),
('leo123@gmail.com', 'Leonardo Ritzs', '$2y$10$Ml3spkP4q.F5MOJD5.7X9.21fmToGbRThwo8RtKOkefjOd1U1pXyG', 0, 0, 'Principe,12', ''),
('manuela99@gmail.com', 'Manuela Gomez', '$2y$10$JGfq5pQ/tkJmU9B/AIqq4OYpRDp5D8TxWcMmAXWgXfzCSrZL5beMm', 1, 0, 'Sebastian,28', ''),
('roberpozilla@gmail.com', 'Roberto Poza', '$2y$10$wAm/oIUUKvfDg3NutzYicOh..NOO7WlJpRFu2R2/0QHCuxT2cPTJi', 0, 0, 'sanchez,74', '5436853159743852');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos_segunda_mano`
--
ALTER TABLE `articulos_segunda_mano`
  ADD PRIMARY KEY (`Numero`);

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idProducto` (`idProducto`),
  ADD KEY `idUsuario` (`idUsuario`);

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
  ADD KEY `Creador` (`Creador`),
  ADD KEY `ID2Mano` (`ID2Mano`);

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
  MODIFY `Numero` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `comentariosoferta`
--
ALTER TABLE `comentariosoferta`
  MODIFY `ID` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `comentariossegundamano`
--
ALTER TABLE `comentariossegundamano`
  MODIFY `ID` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `oferta`
--
ALTER TABLE `oferta`
  MODIFY `Numero` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2585;

--
-- AUTO_INCREMENT de la tabla `posiblescompras`
--
ALTER TABLE `posiblescompras`
  MODIFY `Numero` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `articulos_segunda_mano` (`Numero`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`Correo`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `posiblescompras_ibfk_1` FOREIGN KEY (`UsuarioVendedor`) REFERENCES `usuario` (`Correo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
