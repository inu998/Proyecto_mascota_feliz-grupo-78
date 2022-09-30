-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-09-2022 a las 05:37:18
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mascota_feliz`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_visita_medicamento`
--

CREATE TABLE `detalle_visita_medicamento` (
  `Id_visita_medicamento` int(11) NOT NULL,
  `id_visita` int(11) NOT NULL,
  `id_medicamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_visita_medicamento`
--

INSERT INTO `detalle_visita_medicamento` (`Id_visita_medicamento`, `id_visita`, `id_medicamento`) VALUES
(4, 1, 2),
(5, 1, 1),
(6, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_afiliacion`
--

CREATE TABLE `tb_afiliacion` (
  `id_afiliacion` int(11) NOT NULL,
  `Afiliacion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_afiliacion`
--

INSERT INTO `tb_afiliacion` (`id_afiliacion`, `Afiliacion`) VALUES
(1, 'Afiliado'),
(2, 'No afiliado'),
(3, 'Prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_estado`
--

CREATE TABLE `tb_estado` (
  `id_estado` int(11) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_estado`
--

INSERT INTO `tb_estado` (`id_estado`, `estado`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_estado_salud`
--

CREATE TABLE `tb_estado_salud` (
  `id_estado_salud` int(11) NOT NULL,
  `estado_salud` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_estado_salud`
--

INSERT INTO `tb_estado_salud` (`id_estado_salud`, `estado_salud`) VALUES
(1, 'Sano'),
(2, 'Enfermo'),
(3, 'Recuperacion'),
(4, 'Prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_mascota`
--

CREATE TABLE `tb_mascota` (
  `id_mascota` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `id_tipo_especie` int(11) NOT NULL,
  `cedula_usuario` varchar(20) NOT NULL,
  `id_afiliacion` int(11) NOT NULL,
  `raza` varchar(20) NOT NULL,
  `color` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_mascota`
--

INSERT INTO `tb_mascota` (`id_mascota`, `nombre`, `id_tipo_especie`, `cedula_usuario`, `id_afiliacion`, `raza`, `color`) VALUES
(1, 'Firulais', 3, '321', 1, 'Criollo', 'Cafe'),
(4, 'andres', 1, '321', 2, 'French Poodle', 'blanco'),
(5, 'rayo', 1, '4321', 1, 'pitbull', 'cafe-blanco');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_medicamentos`
--

CREATE TABLE `tb_medicamentos` (
  `Id_medicamento` int(11) NOT NULL,
  `Nombre_medicamento` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_medicamentos`
--

INSERT INTO `tb_medicamentos` (`Id_medicamento`, `Nombre_medicamento`) VALUES
(1, 'Hialurina'),
(2, 'Acetaminofen'),
(3, 'Prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipo_especie`
--

CREATE TABLE `tb_tipo_especie` (
  `id_tipo_especie` int(11) NOT NULL,
  `tipo_especie` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_tipo_especie`
--

INSERT INTO `tb_tipo_especie` (`id_tipo_especie`, `tipo_especie`) VALUES
(1, 'perro'),
(2, 'Gato'),
(3, 'Prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipo_usuario`
--

CREATE TABLE `tb_tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL,
  `tipo_usuario` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_tipo_usuario`
--

INSERT INTO `tb_tipo_usuario` (`id_tipo_usuario`, `tipo_usuario`) VALUES
(1, 'Administrador'),
(2, 'registro'),
(3, 'Veterinario'),
(4, 'cliente'),
(5, 'propietario'),
(6, 'Prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `cedula` varchar(20) NOT NULL,
  `id_tipo_usuario` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `contrasena` varchar(50) NOT NULL,
  `tarjeta_profesional` varchar(50) DEFAULT NULL,
  `id_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_usuario`
--

INSERT INTO `tb_usuario` (`cedula`, `id_tipo_usuario`, `nombres`, `apellidos`, `direccion`, `telefono`, `correo`, `contrasena`, `tarjeta_profesional`, `id_estado`) VALUES
('123', 1, 'Hugo', 'Ortega', 'cra 20 #14/15', '75489693', 'andresortega@gmail.com', '123', NULL, 1),
('123456', 3, 'ruben ', 'bravo ', 'cll 34', '3123567576', 'veterinario@gmail.com', '123456', '123456', 1),
('321', 4, 'leidy', 'conde', 'cll 9', '45467634', 'cliente@gmail.com', '321', '0', 1),
('4321', 4, 'martha', 'cecilia', 'parcelacion el tambo', '5539814', 'martha@gmail.com', '4321', '0', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_visita`
--

CREATE TABLE `tb_visita` (
  `id_visita` int(11) NOT NULL,
  `fecha_hora` date NOT NULL,
  `id_mascota` int(11) NOT NULL,
  `cedula_veterinario` varchar(20) NOT NULL,
  `id_estado_salud` int(11) NOT NULL,
  `Peso` varchar(20) NOT NULL,
  `Temperatura` varchar(20) NOT NULL,
  `FrecuenciaRes` varchar(20) NOT NULL,
  `FrecuenciaCar` varchar(20) NOT NULL,
  `Recomendaciones` varchar(500) NOT NULL,
  `costoVisita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_visita`
--

INSERT INTO `tb_visita` (`id_visita`, `fecha_hora`, `id_mascota`, `cedula_veterinario`, `id_estado_salud`, `Peso`, `Temperatura`, `FrecuenciaRes`, `FrecuenciaCar`, `Recomendaciones`, `costoVisita`) VALUES
(1, '2022-09-23', 1, '123456', 4, '1', '1', '1', '1', '1', 1),
(2, '2022-09-29', 1, '123456', 2, '123', '123', '123', '123', 'prueba', 2000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalle_visita_medicamento`
--
ALTER TABLE `detalle_visita_medicamento`
  ADD PRIMARY KEY (`Id_visita_medicamento`),
  ADD KEY `id_visita` (`id_visita`),
  ADD KEY `id_medicamento` (`id_medicamento`);

--
-- Indices de la tabla `tb_afiliacion`
--
ALTER TABLE `tb_afiliacion`
  ADD PRIMARY KEY (`id_afiliacion`);

--
-- Indices de la tabla `tb_estado`
--
ALTER TABLE `tb_estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `tb_estado_salud`
--
ALTER TABLE `tb_estado_salud`
  ADD PRIMARY KEY (`id_estado_salud`);

--
-- Indices de la tabla `tb_mascota`
--
ALTER TABLE `tb_mascota`
  ADD PRIMARY KEY (`id_mascota`),
  ADD KEY `cedula_usuario` (`cedula_usuario`),
  ADD KEY `id_tipo_especie` (`id_tipo_especie`),
  ADD KEY `id_afiliacion` (`id_afiliacion`);

--
-- Indices de la tabla `tb_medicamentos`
--
ALTER TABLE `tb_medicamentos`
  ADD PRIMARY KEY (`Id_medicamento`);

--
-- Indices de la tabla `tb_tipo_especie`
--
ALTER TABLE `tb_tipo_especie`
  ADD PRIMARY KEY (`id_tipo_especie`);

--
-- Indices de la tabla `tb_tipo_usuario`
--
ALTER TABLE `tb_tipo_usuario`
  ADD PRIMARY KEY (`id_tipo_usuario`);

--
-- Indices de la tabla `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`cedula`),
  ADD KEY `id_tipo_usuario` (`id_tipo_usuario`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indices de la tabla `tb_visita`
--
ALTER TABLE `tb_visita`
  ADD PRIMARY KEY (`id_visita`),
  ADD KEY `id_mascota` (`id_mascota`),
  ADD KEY `cedula_usuario` (`cedula_veterinario`),
  ADD KEY `id_estado_salud` (`id_estado_salud`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalle_visita_medicamento`
--
ALTER TABLE `detalle_visita_medicamento`
  MODIFY `Id_visita_medicamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tb_afiliacion`
--
ALTER TABLE `tb_afiliacion`
  MODIFY `id_afiliacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tb_estado`
--
ALTER TABLE `tb_estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tb_estado_salud`
--
ALTER TABLE `tb_estado_salud`
  MODIFY `id_estado_salud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tb_mascota`
--
ALTER TABLE `tb_mascota`
  MODIFY `id_mascota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tb_medicamentos`
--
ALTER TABLE `tb_medicamentos`
  MODIFY `Id_medicamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tb_tipo_especie`
--
ALTER TABLE `tb_tipo_especie`
  MODIFY `id_tipo_especie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tb_tipo_usuario`
--
ALTER TABLE `tb_tipo_usuario`
  MODIFY `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tb_visita`
--
ALTER TABLE `tb_visita`
  MODIFY `id_visita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_visita_medicamento`
--
ALTER TABLE `detalle_visita_medicamento`
  ADD CONSTRAINT `detalle_visita_medicamento_ibfk_1` FOREIGN KEY (`id_visita`) REFERENCES `tb_visita` (`id_visita`),
  ADD CONSTRAINT `detalle_visita_medicamento_ibfk_2` FOREIGN KEY (`id_medicamento`) REFERENCES `tb_medicamentos` (`Id_medicamento`);

--
-- Filtros para la tabla `tb_mascota`
--
ALTER TABLE `tb_mascota`
  ADD CONSTRAINT `tb_mascota_ibfk_1` FOREIGN KEY (`id_tipo_especie`) REFERENCES `tb_tipo_especie` (`id_tipo_especie`),
  ADD CONSTRAINT `tb_mascota_ibfk_2` FOREIGN KEY (`id_afiliacion`) REFERENCES `tb_afiliacion` (`id_afiliacion`),
  ADD CONSTRAINT `tb_mascota_ibfk_3` FOREIGN KEY (`cedula_usuario`) REFERENCES `tb_usuario` (`cedula`),
  ADD CONSTRAINT `tb_mascota_ibfk_4` FOREIGN KEY (`id_tipo_especie`) REFERENCES `tb_tipo_especie` (`id_tipo_especie`),
  ADD CONSTRAINT `tb_mascota_ibfk_5` FOREIGN KEY (`id_afiliacion`) REFERENCES `tb_afiliacion` (`id_afiliacion`);

--
-- Filtros para la tabla `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD CONSTRAINT `tb_usuario_ibfk_1` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tb_tipo_usuario` (`id_tipo_usuario`),
  ADD CONSTRAINT `tb_usuario_ibfk_2` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tb_tipo_usuario` (`id_tipo_usuario`),
  ADD CONSTRAINT `tb_usuario_ibfk_3` FOREIGN KEY (`id_estado`) REFERENCES `tb_estado` (`id_estado`);

--
-- Filtros para la tabla `tb_visita`
--
ALTER TABLE `tb_visita`
  ADD CONSTRAINT `tb_visita_ibfk_1` FOREIGN KEY (`id_mascota`) REFERENCES `tb_mascota` (`id_mascota`),
  ADD CONSTRAINT `tb_visita_ibfk_2` FOREIGN KEY (`cedula_veterinario`) REFERENCES `tb_usuario` (`cedula`),
  ADD CONSTRAINT `tb_visita_ibfk_3` FOREIGN KEY (`id_estado_salud`) REFERENCES `tb_estado_salud` (`id_estado_salud`),
  ADD CONSTRAINT `tb_visita_ibfk_4` FOREIGN KEY (`id_estado_salud`) REFERENCES `tb_estado_salud` (`id_estado_salud`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
