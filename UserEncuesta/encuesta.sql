-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2020 a las 17:07:28
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `encuesta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `contrasena` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `correo`, `contrasena`) VALUES
(1, 'eduardofranco366@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_encuesta`
--

CREATE TABLE `tb_encuesta` (
  `id_encuesta` int(10) UNSIGNED NOT NULL,
  `c_nombre_encuesta` varchar(150) DEFAULT NULL,
  `d_borrado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_encuesta`
--

INSERT INTO `tb_encuesta` (`id_encuesta`, `c_nombre_encuesta`, `d_borrado`) VALUES
(11, 'Prueba', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_encuesta_bloque`
--

CREATE TABLE `tb_encuesta_bloque` (
  `id_bloque` int(10) UNSIGNED NOT NULL,
  `id_encuesta` int(11) NOT NULL,
  `n_orden_bloque` int(11) DEFAULT NULL,
  `c_nombre_bloque` varchar(150) DEFAULT NULL,
  `d_borrado_bloque` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_encuesta_bloque`
--

INSERT INTO `tb_encuesta_bloque` (`id_bloque`, `id_encuesta`, `n_orden_bloque`, `c_nombre_bloque`, `d_borrado_bloque`) VALUES
(11, 11, 1, 'Prueba', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_encuesta_pregunta`
--

CREATE TABLE `tb_encuesta_pregunta` (
  `id_pregunta` int(10) UNSIGNED NOT NULL,
  `id_encuesta` int(11) NOT NULL,
  `id_bloque` int(11) DEFAULT NULL,
  `c_tipo_pregunta` varchar(2) NOT NULL DEFAULT 'SS' COMMENT 'SS: Seleccion Simple',
  `n_orden_pregunta` int(11) DEFAULT NULL,
  `c_titulo_pregunta` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `c_detalle_pregunta` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `d_borrado_pregunta` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_encuesta_pregunta`
--

INSERT INTO `tb_encuesta_pregunta` (`id_pregunta`, `id_encuesta`, `id_bloque`, `c_tipo_pregunta`, `n_orden_pregunta`, `c_titulo_pregunta`, `c_detalle_pregunta`, `d_borrado_pregunta`) VALUES
(25, 11, 11, 'SS', 1, 'Actividad que realiza actualmente', '', NULL),
(26, 11, 11, 'SS', 2, 'Si trabaja, ¿En su trabajo desarrolla actividades relacionadas con el perfil de su carrera y en qué porcentaje las realiza?', '', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_encuesta_pregunta_opcion`
--

CREATE TABLE `tb_encuesta_pregunta_opcion` (
  `id_opcion` int(10) UNSIGNED NOT NULL,
  `id_pregunta` int(11) NOT NULL,
  `id_encuesta` int(11) NOT NULL,
  `n_orden_opcion` int(11) DEFAULT NULL,
  `c_detalle_opcion` varchar(250) DEFAULT NULL,
  `c_tipo_opcion` varchar(2) NOT NULL DEFAULT 'OS' COMMENT 'OS: Opcion Simple',
  `n_valor` double(8,2) NOT NULL DEFAULT 0.00,
  `d_borrado_opcion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_encuesta_pregunta_opcion`
--

INSERT INTO `tb_encuesta_pregunta_opcion` (`id_opcion`, `id_pregunta`, `id_encuesta`, `n_orden_opcion`, `c_detalle_opcion`, `c_tipo_opcion`, `n_valor`, `d_borrado_opcion`) VALUES
(59, 25, 11, 1, 'trabaja', 'OS', 1.00, NULL),
(60, 25, 11, 2, 'Estudia', 'OS', 1.00, NULL),
(61, 25, 11, 3, 'nada', 'OS', 1.00, NULL),
(62, 26, 11, 1, 'Si', 'OS', 1.00, NULL),
(63, 26, 11, 2, 'Parcialmete', 'OS', 1.00, NULL),
(64, 26, 11, 3, 'No', 'OS', 1.00, NULL),
(65, 26, 11, 1, 'Especificar en caso de que no: ', 'OS', 1.00, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_encuesta_respuesta`
--

CREATE TABLE `tb_encuesta_respuesta` (
  `id_encuesta` int(10) UNSIGNED NOT NULL,
  `id_user` varchar(11) NOT NULL,
  `d_inicio_encuesta` datetime NOT NULL,
  `d_fin_encuesta` datetime NOT NULL,
  `c_estado` char(1) NOT NULL DEFAULT 'A' COMMENT 'Abierto,Cerrado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_encuesta_respuesta`
--

INSERT INTO `tb_encuesta_respuesta` (`id_encuesta`, `id_user`, `d_inicio_encuesta`, `d_fin_encuesta`, `c_estado`) VALUES
(7, '5', '2020-11-11 11:03:50', '2020-11-11 11:07:12', 'F'),
(8, '5', '2020-11-11 11:08:28', '0000-00-00 00:00:00', 'I'),
(9, '5', '2020-11-11 11:12:22', '0000-00-00 00:00:00', 'I'),
(11, '5', '2020-11-11 11:15:09', '0000-00-00 00:00:00', 'I');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_encuesta_respuesta_opcion`
--

CREATE TABLE `tb_encuesta_respuesta_opcion` (
  `id_respuesta_opcion` int(10) UNSIGNED NOT NULL,
  `id_encuesta` int(11) NOT NULL,
  `id_pregunta` int(11) NOT NULL,
  `id_opcion` int(11) NOT NULL,
  `d_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_encuesta_respuesta_opcion`
--

INSERT INTO `tb_encuesta_respuesta_opcion` (`id_respuesta_opcion`, `id_encuesta`, `id_pregunta`, `id_opcion`, `d_registro`) VALUES
(122, 7, 21, 55, '2020-11-11 11:07:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `contrasena` varchar(255) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `codigo` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `correo`, `contrasena`, `nombre`, `apellido`, `codigo`) VALUES
(1, 'user@gmail.com', 'user', 'User', 'User', '123456'),
(5, 'eduardofranco366@gmail.com', '1234', 'Jonathan', 'Franco', '92833');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tb_encuesta`
--
ALTER TABLE `tb_encuesta`
  ADD PRIMARY KEY (`id_encuesta`);

--
-- Indices de la tabla `tb_encuesta_bloque`
--
ALTER TABLE `tb_encuesta_bloque`
  ADD PRIMARY KEY (`id_bloque`);

--
-- Indices de la tabla `tb_encuesta_pregunta`
--
ALTER TABLE `tb_encuesta_pregunta`
  ADD PRIMARY KEY (`id_pregunta`);

--
-- Indices de la tabla `tb_encuesta_pregunta_opcion`
--
ALTER TABLE `tb_encuesta_pregunta_opcion`
  ADD PRIMARY KEY (`id_opcion`);

--
-- Indices de la tabla `tb_encuesta_respuesta`
--
ALTER TABLE `tb_encuesta_respuesta`
  ADD PRIMARY KEY (`id_encuesta`,`id_user`);

--
-- Indices de la tabla `tb_encuesta_respuesta_opcion`
--
ALTER TABLE `tb_encuesta_respuesta_opcion`
  ADD PRIMARY KEY (`id_respuesta_opcion`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_encuesta`
--
ALTER TABLE `tb_encuesta`
  MODIFY `id_encuesta` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tb_encuesta_bloque`
--
ALTER TABLE `tb_encuesta_bloque`
  MODIFY `id_bloque` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tb_encuesta_pregunta`
--
ALTER TABLE `tb_encuesta_pregunta`
  MODIFY `id_pregunta` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `tb_encuesta_pregunta_opcion`
--
ALTER TABLE `tb_encuesta_pregunta_opcion`
  MODIFY `id_opcion` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de la tabla `tb_encuesta_respuesta`
--
ALTER TABLE `tb_encuesta_respuesta`
  MODIFY `id_encuesta` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tb_encuesta_respuesta_opcion`
--
ALTER TABLE `tb_encuesta_respuesta_opcion`
  MODIFY `id_respuesta_opcion` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
