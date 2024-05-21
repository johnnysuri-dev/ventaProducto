-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-02-2023 a las 04:42:20
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gabinete`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id_cursos` int(10) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id_cursos`, `nombre`) VALUES
(1, 'PRE-KINDER A'),
(2, 'PRE-KINDER B'),
(3, 'PRE-KINDER C'),
(8, 'PRIMERO A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datosfamilia`
--

CREATE TABLE `datosfamilia` (
  `id_datosFamilia` int(11) NOT NULL,
  `tutorPadre` varchar(50) NOT NULL,
  `tutorMadre` varchar(50) NOT NULL,
  `telefono1` int(11) NOT NULL,
  `telefono2` int(11) NOT NULL,
  `ocupacionPadre` varchar(11) NOT NULL,
  `ocupacionMadre` varchar(11) NOT NULL,
  `id_estudiante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrevista1`
--

CREATE TABLE `entrevista1` (
  `id_entrevista` int(10) NOT NULL,
  `Lenguaje` varchar(300) NOT NULL,
  `matematica` varchar(300) NOT NULL,
  `PsicomotricidadFina` varchar(200) NOT NULL,
  `PsicomotricidadGruesa` varchar(200) NOT NULL,
  `id_Curso` int(10) NOT NULL,
  `id_estudiante` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrevista2`
--

CREATE TABLE `entrevista2` (
  `id_entrevista2` int(10) NOT NULL,
  `Datos_Clinicos` varchar(300) NOT NULL,
  `desarrollo_Cognitivo` varchar(300) NOT NULL,
  `motricidad_Gruesa` varchar(200) NOT NULL,
  `motricidad_Fina` varchar(200) NOT NULL,
  `desarrollo_Sensorial` varchar(300) NOT NULL,
  `comunicacion_Linguistico` varchar(250) NOT NULL,
  `desarrollo_Social_Afectivo` varchar(300) NOT NULL,
  `observaciones` varchar(300) NOT NULL,
  `tiene` varchar(10) NOT NULL,
  `compromiso` varchar(500) NOT NULL,
  `id_estudiante` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `id_estudiante` int(10) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `genero` varchar(10) NOT NULL,
  `ci` int(10) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `conQuienVive` varchar(10) NOT NULL,
  `nacionalidad` varchar(15) NOT NULL,
  `id_cursos` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `color` varchar(7) DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `curso` varchar(30) NOT NULL,
  `id_estudiante` int(10) NOT NULL,
  `estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informeprueba`
--

CREATE TABLE `informeprueba` (
  `id_informePrueba` int(10) NOT NULL,
  `fechaAplicacion` date NOT NULL,
  `interpretacion` varchar(100) NOT NULL,
  `diagnosticoPresuntivo` varchar(100) NOT NULL,
  `Recomendaciones` varchar(100) NOT NULL,
  `id_prueba` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pruebas`
--

CREATE TABLE `pruebas` (
  `id_pruebas` int(10) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombreCategoria` varchar(150) DEFAULT NULL,
  `fechaCaptura` date DEFAULT NULL,
  `id_estudiante` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesiones`
--

CREATE TABLE `sesiones` (
  `id_sesiones` int(10) NOT NULL,
  `fechaSesiones` date NOT NULL,
  `objetivo` varchar(100) NOT NULL,
  `actividad` varchar(100) NOT NULL,
  `resultado` varchar(100) NOT NULL,
  `apoyo` varchar(100) NOT NULL,
  `diagnostico` varchar(100) NOT NULL,
  `comportamiento` varchar(20) NOT NULL,
  `id_estudiante` int(10) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` tinytext DEFAULT NULL,
  `fechaCaptura` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `email`, `password`, `fechaCaptura`) VALUES
(1, 'johnny', 'suri', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '2021-06-07');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_cursos`);

--
-- Indices de la tabla `datosfamilia`
--
ALTER TABLE `datosfamilia`
  ADD PRIMARY KEY (`id_datosFamilia`),
  ADD KEY `id_estudiante` (`id_estudiante`);

--
-- Indices de la tabla `entrevista1`
--
ALTER TABLE `entrevista1`
  ADD PRIMARY KEY (`id_entrevista`),
  ADD KEY `relacion de estudiante y entrevista` (`id_estudiante`),
  ADD KEY `id_Curso` (`id_Curso`);

--
-- Indices de la tabla `entrevista2`
--
ALTER TABLE `entrevista2`
  ADD PRIMARY KEY (`id_entrevista2`),
  ADD KEY `id_estudiante` (`id_estudiante`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`id_estudiante`),
  ADD KEY `cursos` (`id_cursos`),
  ADD KEY `usuario` (`id_usuario`);

--
-- Indices de la tabla `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_estudiante` (`id_estudiante`);

--
-- Indices de la tabla `informeprueba`
--
ALTER TABLE `informeprueba`
  ADD PRIMARY KEY (`id_informePrueba`),
  ADD KEY `pueba_informe` (`id_prueba`);

--
-- Indices de la tabla `pruebas`
--
ALTER TABLE `pruebas`
  ADD PRIMARY KEY (`id_pruebas`),
  ADD KEY `estudiante` (`id_estudiante`);

--
-- Indices de la tabla `sesiones`
--
ALTER TABLE `sesiones`
  ADD PRIMARY KEY (`id_sesiones`),
  ADD KEY `relacion` (`id_estudiante`),
  ADD KEY `usuario` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id_cursos` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `datosfamilia`
--
ALTER TABLE `datosfamilia`
  MODIFY `id_datosFamilia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `entrevista1`
--
ALTER TABLE `entrevista1`
  MODIFY `id_entrevista` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `entrevista2`
--
ALTER TABLE `entrevista2`
  MODIFY `id_entrevista2` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `id_estudiante` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT de la tabla `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `informeprueba`
--
ALTER TABLE `informeprueba`
  MODIFY `id_informePrueba` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pruebas`
--
ALTER TABLE `pruebas`
  MODIFY `id_pruebas` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sesiones`
--
ALTER TABLE `sesiones`
  MODIFY `id_sesiones` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `datosfamilia`
--
ALTER TABLE `datosfamilia`
  ADD CONSTRAINT `datosfamilia_ibfk_1` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiante` (`id_estudiante`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `entrevista2`
--
ALTER TABLE `entrevista2`
  ADD CONSTRAINT `entrevista2_ibfk_1` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiante` (`id_estudiante`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`id_cursos`) REFERENCES `cursos` (`id_cursos`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estudiante_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiante` (`id_estudiante`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `informeprueba`
--
ALTER TABLE `informeprueba`
  ADD CONSTRAINT `informeprueba_ibfk_1` FOREIGN KEY (`id_prueba`) REFERENCES `pruebas` (`id_pruebas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pruebas`
--
ALTER TABLE `pruebas`
  ADD CONSTRAINT `pruebas_ibfk_1` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiante` (`id_estudiante`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sesiones`
--
ALTER TABLE `sesiones`
  ADD CONSTRAINT `sesiones_ibfk_1` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiante` (`id_estudiante`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
