-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 28-02-2023 a las 08:49:41
-- Versión del servidor: 10.5.19-MariaDB
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `portal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alerts`
--

CREATE TABLE `alerts` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idmedia` varchar(45) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'P'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `alerts`
--

INSERT INTO `alerts` (`id`, `iduser`, `idmedia`, `status`) VALUES
(1, 1, '4', 'L'),
(2, 3, '5', 'P'),
(3, 3, '6', 'P'),
(4, 3, '7', 'P'),
(5, 5, '7', 'P'),
(7, 1, '8', 'L'),
(8, 3, '8', 'P'),
(9, 5, '8', 'P'),
(10, 1, '9', 'L'),
(11, 3, '9', 'P'),
(12, 5, '9', 'P'),
(13, 8, '10', 'P'),
(14, 9, '10', 'P'),
(16, 10, '11', 'P'),
(18, 10, '12', 'P'),
(19, 3, '13', 'P'),
(20, 5, '13', 'P'),
(22, 1, '14', 'L'),
(23, 8, '14', 'P'),
(24, 9, '14', 'P'),
(27, 1, '15', 'L'),
(28, 8, '15', 'P'),
(29, 9, '15', 'P'),
(30, 1, '16', 'L'),
(31, 8, '16', 'P'),
(32, 9, '16', 'P'),
(33, 10, '16', 'P'),
(38, 1, '17', 'L'),
(39, 7, '17', 'P'),
(40, 8, '17', 'P'),
(41, 9, '17', 'P'),
(42, 10, '17', 'P'),
(43, 1, '18', 'L'),
(44, 7, '18', 'P'),
(45, 8, '18', 'P'),
(46, 9, '18', 'P'),
(47, 10, '18', 'P'),
(48, 1, '19', 'L'),
(49, 3, '19', 'P'),
(50, 5, '19', 'P'),
(51, 10, '19', 'P'),
(52, 1, '20', 'L'),
(53, 3, '20', 'P'),
(54, 5, '20', 'P'),
(55, 10, '20', 'P'),
(59, 1, '21', 'L'),
(60, 10, '21', 'P'),
(61, 14, '21', 'L'),
(64, 1, '22', 'L'),
(65, 10, '22', 'P'),
(66, 14, '22', 'L'),
(67, 1, '23', 'L'),
(68, 3, '23', 'P'),
(69, 5, '23', 'P'),
(70, 10, '23', 'P'),
(71, 14, '23', 'L'),
(74, 1, '24', 'L'),
(75, 3, '24', 'P'),
(76, 5, '24', 'P'),
(77, 10, '24', 'P'),
(78, 14, '24', 'P'),
(79, 15, '24', 'L'),
(80, 17, '24', 'P'),
(81, 18, '24', 'P'),
(89, 1, '25', 'L'),
(90, 3, '25', 'P'),
(91, 5, '25', 'P'),
(92, 10, '25', 'P'),
(93, 14, '25', 'P'),
(94, 15, '25', 'L'),
(95, 17, '25', 'P'),
(96, 18, '25', 'P'),
(104, 1, '26', 'L'),
(105, 3, '26', 'P'),
(106, 5, '26', 'P'),
(107, 10, '26', 'P'),
(108, 14, '26', 'P'),
(109, 15, '26', 'L'),
(110, 17, '26', 'P'),
(111, 18, '26', 'P'),
(120, 1, '27', 'L'),
(121, 7, '27', 'P'),
(122, 8, '27', 'P'),
(123, 9, '27', 'P'),
(124, 10, '27', 'P'),
(125, 15, '27', 'P'),
(126, 17, '27', 'P'),
(127, 18, '27', 'P'),
(135, 1, '28', 'L'),
(136, 7, '28', 'P'),
(137, 8, '28', 'P'),
(138, 9, '28', 'P'),
(139, 10, '28', 'P'),
(140, 15, '28', 'P'),
(141, 17, '28', 'P'),
(142, 18, '28', 'P'),
(143, 1, '29', 'L'),
(144, 3, '29', 'P'),
(145, 5, '29', 'P'),
(146, 10, '29', 'P'),
(147, 14, '29', 'P'),
(148, 15, '29', 'P'),
(149, 17, '29', 'P'),
(150, 1, '30', 'L'),
(151, 3, '30', 'P'),
(152, 5, '30', 'P'),
(153, 10, '30', 'P'),
(154, 14, '30', 'P'),
(155, 15, '30', 'P'),
(156, 17, '30', 'P'),
(157, 1, '31', 'L'),
(158, 3, '31', 'P'),
(159, 5, '31', 'P'),
(160, 10, '31', 'P'),
(161, 14, '31', 'P'),
(162, 15, '31', 'P'),
(163, 17, '31', 'P'),
(164, 19, '31', 'L'),
(165, 21, '31', 'P'),
(172, 1, '32', 'L'),
(173, 7, '32', 'P'),
(174, 8, '32', 'P'),
(175, 9, '32', 'P'),
(176, 10, '32', 'P'),
(177, 15, '32', 'P'),
(178, 17, '32', 'P'),
(179, 18, '32', 'P'),
(180, 22, '32', 'P'),
(181, 23, '32', 'P'),
(187, 1, '33', 'L'),
(188, 7, '33', 'P'),
(189, 8, '33', 'P'),
(190, 9, '33', 'P'),
(191, 10, '33', 'P'),
(192, 15, '33', 'P'),
(193, 17, '33', 'P'),
(194, 18, '33', 'P'),
(195, 22, '33', 'P'),
(196, 23, '33', 'P');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(5, 'Contabilidad FYN'),
(9, 'Manuales de Procedimientos'),
(6, 'Proyecto 1'),
(7, 'Proyecto 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `media`
--

CREATE TABLE `media` (
  `id` int(11) UNSIGNED NOT NULL,
  `idcategorie` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `media`
--

INSERT INTO `media` (`id`, `idcategorie`, `file_name`, `file_type`) VALUES
(4, 3, 'uploads/files/f3/prueba.png', '.'),
(5, 5, 'uploads/files/f5/HINGESAB-07.jpg', '.'),
(6, 5, 'uploads/files/f5/HINGESAB-06.jpg', '.'),
(7, 5, 'uploads/files/f5/VM_AVISO-03.21.22.png', '.'),
(8, 3, 'uploads/files/f3/user128.jpg', '.'),
(9, 3, 'uploads/files/f3/Book de English 2022.docx', '.'),
(10, 6, 'uploads/files/f6/Book de English 2022.docx', '.'),
(11, 7, 'uploads/files/f7/graapp.webp', '.'),
(12, 7, 'uploads/files/f7/Captura de Pantalla 2022-02-06 a la(s) 21.51.58.png', '.'),
(13, 5, 'uploads/files/f5/graapp.webp', '.'),
(14, 6, 'uploads/files/f6/graapp.webp', '.'),
(15, 6, 'uploads/files/f6/descarga.jpeg', '.'),
(16, 6, 'uploads/files/f6/Fonts.txt', '.'),
(17, 6, 'uploads/files/f6/MexDer_Compulsa_Manual_Operativo_30_noviembre_21.pdf', '.'),
(18, 6, 'uploads/files/f6/#HASHTAG.docx', '.'),
(19, 5, 'uploads/files/f5/317487076_3347208008881621_1246237982887193022_n.jpg', '.'),
(20, 5, 'uploads/files/f5/sistemas_pino.jpg', '.'),
(21, 8, 'uploads/files/f8/sistemas_pino.jpg', '.'),
(22, 8, 'uploads/files/f8/demo.jpg', '.'),
(23, 5, 'uploads/files/f5/demo.jpg', '.'),
(24, 5, 'uploads/files/f5/excel.xlsx', '.'),
(25, 5, 'uploads/files/f5/word.docx', '.'),
(26, 5, 'uploads/files/f5/Powerpoint.pptx', '.'),
(27, 6, 'uploads/files/f6/sistemas_pino.jpg', '.'),
(28, 6, 'uploads/files/f6/demo.jpg', '.'),
(29, 5, 'uploads/files/f5/DARES.pdf', '.'),
(30, 5, 'uploads/files/f5/Captura de pantalla 2022-12-30 a la(s) 10.10.51.png', '.'),
(31, 5, 'uploads/files/f5/Liquidacion_de_Temporada_de_Invierno_2022_2023_artes.xlsx', '.'),
(32, 6, 'uploads/files/f6/JPG.pdf', '.'),
(33, 6, 'uploads/files/f6/PDF.pdf', '.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messages`
--

CREATE TABLE `messages` (
  `id` int(11) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idcategorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `iduser`, `idcategorie`) VALUES
(4, 1, 3),
(18, 1, 5),
(21, 1, 8),
(1, 2, 2),
(8, 3, 2),
(7, 3, 3),
(6, 3, 4),
(5, 3, 5),
(3, 4, 2),
(10, 5, 2),
(9, 5, 3),
(11, 5, 4),
(12, 5, 5),
(24, 7, 6),
(14, 8, 6),
(15, 9, 6),
(25, 10, 5),
(23, 10, 6),
(16, 10, 7),
(17, 10, 8),
(27, 14, 5),
(26, 14, 8),
(28, 15, 5),
(29, 15, 6),
(30, 17, 5),
(31, 17, 6),
(33, 18, 6),
(35, 18, 8),
(48, 19, 5),
(49, 19, 9),
(46, 21, 5),
(45, 21, 9),
(41, 22, 6),
(40, 22, 7),
(42, 23, 6),
(44, 23, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `username` varchar(50) NOT NULL,
  `mail` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_level` int(11) NOT NULL,
  `image` varchar(255) DEFAULT 'no_image.jpg',
  `status` int(1) NOT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `mail`, `password`, `user_level`, `image`, `status`, `last_login`) VALUES
(1, 'Williams Arellano', 'admin', '', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 'pzg9wa7o1.jpg', 1, '2023-02-28 14:49:16'),
(19, 'Karina Sanchez', 'Fynconsultores', 'Fynconsultores2022@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 3, 'no_image.jpg', 1, '2023-01-07 22:07:06'),
(21, 'Karina ConsultorÃ­a', 'Fynconsultores2022@gmail.com', 'Fynconsultores2022@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2, 'no_image.jpg', 1, '2023-01-03 03:05:26'),
(22, 'Williams Arellano', 'Warellanodev', 'Hello@warellano.dev', '7fcd5316a7b2a14baada438703e7241c3a8ec656', 2, 'no_image.jpg', 1, '2023-01-02 21:36:38'),
(23, 'Paola Colunga', 'Pcolunga', 'Pcolunga@spressweb.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 3, 'no_image.jpg', 1, '2023-01-02 21:44:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_groups`
--

CREATE TABLE `user_groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(150) NOT NULL,
  `group_level` int(11) NOT NULL,
  `group_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `user_groups`
--

INSERT INTO `user_groups` (`id`, `group_name`, `group_level`, `group_status`) VALUES
(1, 'Administrador', 1, 1),
(2, 'Editor', 2, 1),
(3, 'Clientes', 3, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alerts`
--
ALTER TABLE `alerts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user` (`iduser`,`idmedia`),
  ADD KEY `status` (`iduser`,`status`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indices de la tabla `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cat` (`idcategorie`,`file_name`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `messages` ADD FULLTEXT KEY `messsage` (`message`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cat` (`iduser`,`idcategorie`),
  ADD KEY `usr` (`idcategorie`,`iduser`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `user_level` (`user_level`);

--
-- Indices de la tabla `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `group_level` (`group_level`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alerts`
--
ALTER TABLE `alerts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_user` FOREIGN KEY (`user_level`) REFERENCES `user_groups` (`group_level`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
