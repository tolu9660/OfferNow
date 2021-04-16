--
-- Volcado de datos para la tabla `articulos_segunda_mano`
--
INSERT INTO `articulos_segunda_mano` (`Numero`, `Nombre`, `Descripcion`, `Unidades`, `Precio`, `Imagen`) VALUES
(4, 'Lavadora 2 mano', 'Lavadora Siemens', 2, 247, 'imagenes/productos/Lavadora_Siemens.jpg'),
(9, 'Uncharted 4', 'Juego Uncharted 4 PS4', 32, 19, 'imagenes/productos/Uncharted4.jpg'),
(10, 'Pesas 4kg', '2 pesas de 4kg cada una', 3, 15, 'imagenes/productos/Pesas.jpg'),
(11, 'Redmi Note 8T', 'Movil Xiaomi Redmi Note 8T', 2, 189, 'imagenes/productos/Redmi_Note_8T.jpg'),
(12, 'Super Mario 3D World', 'Juego Super MArio 3D World Nintendo Switch', 5, 40, 'imagenes/productos/Super_Mario_3D_World.jpg');

--
-- Volcado de datos para la tabla `comentariosoferta`
--
INSERT INTO `comentariosoferta` (`ID`, `Texto`, `Titulo`, `ValoracionUtilidad`, `UsuarioID`, `OfertaID`) VALUES
(5, 'Buena capacidad y enfria bien', 'Muy buena nevera', 0, 'correo@correo.com', 2443);

--
-- Volcado de datos para la tabla `comentariossegundamano`
--
INSERT INTO `comentariossegundamano` (`ID`, `Texto`, `Titulo`, `ValoracionUtilidad`, `UsuarioID`, `SegundaManoID`) VALUES
(1, 'Uno de los juegos mas entretenidos que he jugado', 'Muy buen juego', 0, 'correo@correo.com', 9),
(3, 'Muy bueno', 'Juegazo', 0, 'correo@correo.com', 9),
(4, 'un 15', 'Perfecta', 0, 'correo@correo.com', 4);

--
-- Volcado de datos para la tabla `oferta`
--
INSERT INTO `oferta` (`Numero`, `Nombre`, `Descripcion`, `URL_Oferta`, `URL_Imagen`, `Valoracion`, `Precio`, `Creador`) VALUES
(2442, 'RAM 1', '16 Gb de RAM DDR4', 'amazon.es', 'imagenes/productos/ram.png', 0, 81, 'admin@admin.com'),
(2443, 'Nevera 1', 'Nevera Samsung 1000 litros capacidad con congelador', 'uuurfweqg', 'imagenes/productos/nevera.png', 1, 637, 'correo1@ucm.es'),
(2444, 'Intel Core I7', 'Procesador Intel i7 rebajado', 'www.amazon.es/Intel-Core-i7-10700K-Procesador-Casquillo/dp/B0883P8CNM/ref=sr_1_1', 'https://www.adslzone.net/app/uploads-adslzone.net/2016/07/Intel.jpg', 67, 293, 'correo@correo.com'),
(2449, 'Willful Smartwatch', 'Willful Smartwatch,Reloj Inteligente con Pulsómetro,Cronómetros,', 'www.amazon.es/Willful-Smartwatch-Inteligente-Cron%C3%B3metros-Impermeable/dp/B083DZPKTW', 'https://images-na.ssl-images-amazon.com/images/I/514Y7g-JQDL._AC_SY355_.jpg', 0, 34, 'persona@gmail.com'),
(2450, 'Monopoly para malos perdedores', 'Juego de Monopoly donde si pierdes gans', 'www.juguetilandia.com/producto/monopoly-para-malos-perdedores-hasbro-e9972-108833.htm?utm_source=www.chollometro.com&utm_campaign=idealo', 'https://cdn.juguetilandia.com/images/articulos/1999954422g00.jpg', 30, 23, 'persona@gmail.com');

--
-- Volcado de datos para la tabla `usuario`
--
INSERT INTO `usuario` (`Correo`, `Nombre`, `Contraseña`, `Premium`, `Admin`) VALUES
('admin@admin.com', 'Admin', 'Admin1', 0, 1),
('correo@correo.com', 'UsuarioPrueba1', 'Password1', 0, 0),
('correo1@ucm.es', 'UsuarioPrueba2', 'Password2', 0, 0),
('hola@hola.com', 'Hola', 'Hola1', 0, 0),
('persona@gmail.com', 'Persona', 'Persona1', 0, 0);
