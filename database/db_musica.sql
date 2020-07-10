-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-07-2020 a las 19:08:46
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_musica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `band`
--

CREATE TABLE `band` (
  `id_band` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `songs` varchar(500) NOT NULL,
  `year` int(11) NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `id_genres_fk` int(11) NOT NULL,
  `album` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `band`
--

INSERT INTO `band` (`id_band`, `name`, `songs`, `year`, `image`, `id_genres_fk`, `album`) VALUES
(1, 'Soda Stereo', '1-cuando pase el temblor, 2-nada personal', 2006, 'upload/tasks/5f089f539a362.jpg', 0, 'nada personal'),
(2, 'AC/DC', 'highway to hell, girls got ritmy', 1999, 'upload/tasks/5f089fee1eda6.jpg', 0, 'highway to hell'),
(4, 'calamaro', 'el salmon', 1999, NULL, 0, 'el salmon'),
(5, 'cumbia', 'sdsdads,asdadsad', 2006, NULL, 3, 'no se '),
(13, 'Algo va a salir', 'perra, cariñito, corazon espinadp', 2020, 'upload/tasks/5f089e8682000.jpg', 0, 'no tiene nombre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coments`
--

CREATE TABLE `coments` (
  `id_coments` int(11) NOT NULL,
  `coments` varchar(500) NOT NULL,
  `puntage` int(11) NOT NULL,
  `id_user_fk` int(11) NOT NULL,
  `id_band_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `coments`
--

INSERT INTO `coments` (`id_coments`, `coments`, `puntage`, `id_user_fk`, `id_band_fk`) VALUES
(1, 'muy bueno', 5, 1, 1),
(2, 'maso maso', 4, 2, 2),
(9, 'mortal el cd\r\n', 4, 13, 5),
(12, 'no me gusta la cumbia!!!!', 1, 2, 5),
(13, 'probando', 2, 1, 3),
(14, 'dato', 3, 3, 3),
(18, 'a ver si anda', 1, 1, 10),
(19, 'andara??', 1, 13, 10),
(21, 'jjh', 4, 22, 10),
(39, ' Tremendo CD', 5, 1, 5),
(47, 'sjdhsadhsad', 1, 1, 12),
(64, ' que ondaaa', 5, 1, 4),
(65, 'No me gusta la cumbia!!!!', 1, 20, 5),
(66, 'probando', 1, 1, 4),
(71, 'dale gordooooo!!!!', 5, 1, 13),
(72, 'buena priiii', 4, 22, 13),
(73, 'Gran CD', 1, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genre`
--

CREATE TABLE `genre` (
  `id_genres` int(11) NOT NULL,
  `name_genre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `genre`
--

INSERT INTO `genre` (`id_genres`, `name_genre`) VALUES
(1, 'Rock Nacional'),
(2, 'Rock Internacional'),
(3, 'Cumbia'),
(5, 'jbcjsda'),
(6, 'wwwww');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `priority` int(11) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `priority`) VALUES
(1, 'cristian', '$2y$12$IIJG4Gm71CNnz2LuhFnjc.xaGlXYYddogpwrk.izoWu5WW8OYpW2K', 1),
(13, 'cerati', '$2y$10$HRiXZVil2bep/OGbwkBLqOfgd8oD1Gd46dBkuCmoDzBW69l15i.Dq', 1),
(14, 'sabina', '$2y$10$TLKwGaYtRL7c.lEJu5dl.e13xlrvu5yiMP2HdxrFUehtjfB0oBa8K', 2),
(15, 'calamaro', '$2y$10$CwqRDDnrgbFSa8IqCd6kru9/YJ4PZR7V/myU1GdDViSU17xRaELZy', 2),
(19, 'luis', '$2y$10$zqgXyktaGAKwR1.ZpUS3X.fVP3Y2TrAA.rD16AIRD/Gz.fdCQPzCm', 2),
(20, 'Julio', '$2y$10$3Nwh84uyq0BIY5lgXno0P.pSqBpXkViOo8flrGGYSVqCw8YnU3sRm', 2),
(21, 'aaaaaaaaaaaaaaa', '$2y$10$iBZwVeFQWGnx8IpXIDmK5eNtjf9z9AkCmtD4gGJ1KricMrx6cU2Zi', 2),
(22, 'flaco', '$2y$10$8uRwF0RLuMkI.PPfonwZJ.vgR2u4qJZotqFD6fgWM.dV7RTwRpbja', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `band`
--
ALTER TABLE `band`
  ADD PRIMARY KEY (`id_band`);

--
-- Indices de la tabla `coments`
--
ALTER TABLE `coments`
  ADD PRIMARY KEY (`id_coments`);

--
-- Indices de la tabla `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id_genres`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `band`
--
ALTER TABLE `band`
  MODIFY `id_band` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `coments`
--
ALTER TABLE `coments`
  MODIFY `id_coments` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT de la tabla `genre`
--
ALTER TABLE `genre`
  MODIFY `id_genres` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
