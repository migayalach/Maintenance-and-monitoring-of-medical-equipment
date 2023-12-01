-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-10-2022 a las 02:39:34
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `electromedicina`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `idArchivo` int(11) NOT NULL,
  `idMantenimiento` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `tipo` varchar(250) NOT NULL,
  `ruta` text DEFAULT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `archivos`
--

INSERT INTO `archivos` (`idArchivo`, `idMantenimiento`, `idUsuario`, `nombre`, `tipo`, `ruta`, `fecha`) VALUES
(2, 4, 4, 'cbn.png', 'png', '../../archivos/4/cbn.png', '2022-10-05 05:04:13'),
(11, 4, 4, 'LABORATORIO B.pdf', 'pdf', '../../archivos/4/LABORATORIO B.pdf', '2022-10-09 18:48:18'),
(12, 4, 1, 'Lab - 4 Aplicaciones de funciones en tiempo real, II-2022.pdf', 'pdf', '../../archivos/1/Lab - 4 Aplicaciones de funciones en tiempo real, II-2022.pdf', '2022-10-09 18:57:33'),
(13, 4, 1, 'woman.jpg', 'jpg', '../../archivos/1/woman.jpg', '2022-10-09 19:14:12'),
(14, 4, 1, 'logo.png', 'png', '../../archivos/1/logo.png', '2022-10-09 21:18:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `idAsistencia` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `fechaAsistencia` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`idAsistencia`, `idUsuario`, `fechaAsistencia`) VALUES
(1, 1, '2022-10-09 19:46:57'),
(2, 1, '2022-10-09 19:49:44'),
(3, 1, '2022-10-09 21:01:26'),
(4, 1, '2022-10-09 21:04:57'),
(5, 1, '2022-10-09 21:09:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encargadounidad`
--

CREATE TABLE `encargadounidad` (
  `idEncargado` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `fechaEncargado` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `encargadounidad`
--

INSERT INTO `encargadounidad` (`idEncargado`, `nombre`, `fechaEncargado`) VALUES
(1, 'Cuca', '2022-09-28 19:08:48'),
(2, 'Pipocas', '2022-09-28 19:27:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `idEquipo` int(11) NOT NULL,
  `idTipoEstado` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `nroSerie` varchar(50) DEFAULT NULL,
  `nroInventario` varchar(50) DEFAULT NULL,
  `fechaEquipo` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`idEquipo`, `idTipoEstado`, `nombre`, `marca`, `modelo`, `nroSerie`, `nroInventario`, `fechaEquipo`) VALUES
(1, 1, 'Ecografo', 'X-ONE', '123', 'INT-123', '123', '2022-09-28 19:23:52'),
(2, 1, 'Desfibrilador', 'Evito', 'Chaparre Drogras', 'INT-0123', '10000000', '2022-09-28 19:31:52'),
(3, 2, 'ElectroBisturi', 'Apple', '999', 'INT-666', '666', '2022-09-28 19:34:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento`
--

CREATE TABLE `mantenimiento` (
  `idMantenimiento` int(11) NOT NULL,
  `idTipoMantenimiento` int(11) NOT NULL,
  `idEquipo` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `fechaMantenimiento` date NOT NULL,
  `nroDocumento` varchar(100) NOT NULL,
  `reporte` varchar(1000) NOT NULL,
  `observacion` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mantenimiento`
--

INSERT INTO `mantenimiento` (`idMantenimiento`, `idTipoMantenimiento`, `idEquipo`, `idUsuario`, `fechaMantenimiento`, `nroDocumento`, `reporte`, `observacion`) VALUES
(4, 1, 3, 1, '2022-09-28', '1', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel`
--

CREATE TABLE `nivel` (
  `idNivel` int(11) NOT NULL,
  `tipo` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `nivel`
--

INSERT INTO `nivel` (`idNivel`, `tipo`) VALUES
(1, 'Administrador'),
(2, 'Estandar'),
(3, 'Visitante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoestado`
--

CREATE TABLE `tipoestado` (
  `idTipoEstado` int(11) NOT NULL,
  `estadoGarantia` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipoestado`
--

INSERT INTO `tipoestado` (`idTipoEstado`, `estadoGarantia`) VALUES
(1, 'Garantia'),
(2, 'Sin garantia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipomantenimiento`
--

CREATE TABLE `tipomantenimiento` (
  `idTipoMantenimiento` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipomantenimiento`
--

INSERT INTO `tipomantenimiento` (`idTipoMantenimiento`, `nombre`) VALUES
(1, 'Preventivo'),
(2, 'Correctivo'),
(3, 'Semestral'),
(4, 'Trimestral');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad`
--

CREATE TABLE `unidad` (
  `idUnidad` int(11) NOT NULL,
  `idEquipo` int(11) NOT NULL,
  `idEncargado` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `unidad`
--

INSERT INTO `unidad` (`idUnidad`, `idEquipo`, `idEncargado`, `nombre`) VALUES
(1, 3, 1, 'Cardiologia'),
(2, 1, 2, 'Ecografia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `idNivel` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `carnet` varchar(15) NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `email` varchar(245) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `clave` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `idNivel`, `nombre`, `apellido`, `carnet`, `direccion`, `email`, `celular`, `usuario`, `clave`) VALUES
(1, 1, 'Jenny', 'Avalos Choque', '123', 'UPEA', '1|@1', '123', '1', '356a192b7913b04c54574d18c28d46e6395428ab'),
(4, 2, '2', '2', '2', '2', '2@2', '2', '2', 'da4b9237bacccdf19c0760cab7aec4a8359010b0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`idArchivo`),
  ADD KEY `idMantenimiento` (`idMantenimiento`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`idAsistencia`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `encargadounidad`
--
ALTER TABLE `encargadounidad`
  ADD PRIMARY KEY (`idEncargado`);

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`idEquipo`),
  ADD KEY `idTipoEstado` (`idTipoEstado`);

--
-- Indices de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD PRIMARY KEY (`idMantenimiento`),
  ADD KEY `idTipoMantenimiento` (`idTipoMantenimiento`),
  ADD KEY `idEquipo` (`idEquipo`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `nivel`
--
ALTER TABLE `nivel`
  ADD PRIMARY KEY (`idNivel`);

--
-- Indices de la tabla `tipoestado`
--
ALTER TABLE `tipoestado`
  ADD PRIMARY KEY (`idTipoEstado`);

--
-- Indices de la tabla `tipomantenimiento`
--
ALTER TABLE `tipomantenimiento`
  ADD PRIMARY KEY (`idTipoMantenimiento`);

--
-- Indices de la tabla `unidad`
--
ALTER TABLE `unidad`
  ADD PRIMARY KEY (`idUnidad`),
  ADD KEY `idEquipo` (`idEquipo`),
  ADD KEY `idEncargado` (`idEncargado`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `idNivel` (`idNivel`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `idArchivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `idAsistencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `encargadounidad`
--
ALTER TABLE `encargadounidad`
  MODIFY `idEncargado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `idEquipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  MODIFY `idMantenimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `nivel`
--
ALTER TABLE `nivel`
  MODIFY `idNivel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipoestado`
--
ALTER TABLE `tipoestado`
  MODIFY `idTipoEstado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipomantenimiento`
--
ALTER TABLE `tipomantenimiento`
  MODIFY `idTipoMantenimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `unidad`
--
ALTER TABLE `unidad`
  MODIFY `idUnidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD CONSTRAINT `archivos_ibfk_1` FOREIGN KEY (`idMantenimiento`) REFERENCES `mantenimiento` (`idMantenimiento`),
  ADD CONSTRAINT `archivos_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `asistencia_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD CONSTRAINT `equipo_ibfk_1` FOREIGN KEY (`idTipoEstado`) REFERENCES `tipoestado` (`idTipoEstado`);

--
-- Filtros para la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD CONSTRAINT `mantenimiento_ibfk_1` FOREIGN KEY (`idTipoMantenimiento`) REFERENCES `tipomantenimiento` (`idTipoMantenimiento`),
  ADD CONSTRAINT `mantenimiento_ibfk_2` FOREIGN KEY (`idEquipo`) REFERENCES `equipo` (`idEquipo`),
  ADD CONSTRAINT `mantenimiento_ibfk_3` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `unidad`
--
ALTER TABLE `unidad`
  ADD CONSTRAINT `unidad_ibfk_1` FOREIGN KEY (`idEquipo`) REFERENCES `equipo` (`idEquipo`),
  ADD CONSTRAINT `unidad_ibfk_2` FOREIGN KEY (`idEncargado`) REFERENCES `encargadounidad` (`idEncargado`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idNivel`) REFERENCES `nivel` (`idNivel`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
