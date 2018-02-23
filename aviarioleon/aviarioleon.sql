-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-02-2018 a las 19:18:36
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aviarioleon`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colleras`
--

CREATE TABLE `colleras` (
  `idCollera` int(11) NOT NULL,
  `idUnion` int(11) NOT NULL,
  `comienzoIncubacion` date NOT NULL,
  `eclosionPrevista` date NOT NULL,
  `postura1` int(11) NOT NULL,
  `postura2` int(11) NOT NULL,
  `postura3` int(11) NOT NULL,
  `jaula` int(11) NOT NULL,
  `observaciones` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `colleras`
--

INSERT INTO `colleras` (`idCollera`, `idUnion`, `comienzoIncubacion`, `eclosionPrevista`, `postura1`, `postura2`, `postura3`, `jaula`, `observaciones`) VALUES
(1, 1, '2018-01-02', '2018-02-22', 2, 0, 0, 3, 'PROBANDO'),
(2, 2, '2018-02-06', '2018-02-19', 12, 4, 6, 34, 'probando FECHAS'),
(3, 4, '2018-02-22', '2018-02-22', 3, 4, 5, 38, 'probando update'),
(4, 5, '2018-02-26', '2018-03-06', 4, 5, 6, 23, 'insert en jquery 2'),
(5, 6, '2018-02-14', '2018-03-03', 2, 6, 10, 14, 'probando de nuevo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `criadores`
--

CREATE TABLE `criadores` (
  `criador` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(15) NOT NULL,
  `sociedad` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `criadores`
--

INSERT INTO `criadores` (`criador`, `nombre`, `direccion`, `telefono`, `sociedad`) VALUES
('antonio2315', 'Felopano', 'calle arcoiris', 2223234, 'La del mundo'),
('jquery', 'jquery ui', 'java s', 44442244, 'javita'),
('martinito2378', 'David Martín', 'calle nintendo', 854535, 'Ilimitados S.A'),
('neko323', 'Nekodani Steam', 'calle el vicio', 82375, 'Steam 34'),
('pruebaCriador', 'probando nombre', 'probando dirección', 24324, 'sociedad de la prueba SL'),
('tocayo3144', 'tocayo deivi', 'calle steam', 234234, 'juegos SA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crias`
--

CREATE TABLE `crias` (
  `anilla` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `idCollera` int(11) NOT NULL,
  `fechaAnillado` date NOT NULL,
  `fechaDestete` date NOT NULL,
  `nacimiento` date NOT NULL,
  `observaciones` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `crias`
--

INSERT INTO `crias` (`anilla`, `idCollera`, `fechaAnillado`, `fechaDestete`, `nacimiento`, `observaciones`) VALUES
('nuevaCria12', 2, '2018-02-07', '2018-02-09', '2018-01-17', 'probando update crias'),
('pruebaCria1', 1, '2017-12-04', '2017-12-20', '2017-12-03', 'probandoo la criiaaaa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pajaros`
--

CREATE TABLE `pajaros` (
  `anilla` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `criador` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `nacimiento` date NOT NULL,
  `sexo` text COLLATE utf8_spanish_ci NOT NULL,
  `observaciones` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pajaros`
--

INSERT INTO `pajaros` (`anilla`, `criador`, `nacimiento`, `sexo`, `observaciones`) VALUES
('anillaPrueba2', 'neko323', '2018-02-19', 'macho', 'update fecha definitiva'),
('anillaPrueba3', 'jquery', '2017-12-20', 'hembra', 'probando fecha'),
('anillaPrueba4', 'tocayo3144', '2017-12-25', 'hembra', 'probando fecha 2'),
('anillita', 'antonio2315', '2018-01-05', 'hembra', 'cambiar fechas'),
('anillitaPrueba', 'antonio2315', '2018-01-02', 'macho', 'probando, probando mucho'),
('pruebaAnilla', 'pruebaCriador', '2017-12-04', 'macho', 'estamos  probando esto, a ver cómo funciona'),
('pruebaAnilla2', 'pruebaCriador', '2017-12-07', 'hembra', 'probando esto otra vez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unioncollera`
--

CREATE TABLE `unioncollera` (
  `idUnion` int(11) NOT NULL,
  `anillaMacho` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `anillaHembra` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `unioncollera`
--

INSERT INTO `unioncollera` (`idUnion`, `anillaMacho`, `anillaHembra`, `fecha`) VALUES
(1, 'pruebaAnilla', 'pruebaAnilla2', '2017-12-10'),
(2, 'anillaPrueba2', 'anillaPrueba3', '2018-02-06'),
(4, 'anillitaPrueba', 'anillaPrueba4', '2018-02-05'),
(5, 'pruebaAnilla', 'anillita', '2018-02-05'),
(6, 'anillitaPrueba', 'pruebaAnilla2', '2018-02-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `usr` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `grupo` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `usr`, `pass`, `grupo`) VALUES
(1, 'admin', 'admin', 'admins'),
(2, 'prueba', '1234', 'usuarios');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `colleras`
--
ALTER TABLE `colleras`
  ADD PRIMARY KEY (`idCollera`),
  ADD KEY `idUnion` (`idUnion`);

--
-- Indices de la tabla `criadores`
--
ALTER TABLE `criadores`
  ADD PRIMARY KEY (`criador`);

--
-- Indices de la tabla `crias`
--
ALTER TABLE `crias`
  ADD PRIMARY KEY (`anilla`),
  ADD KEY `idCollera` (`idCollera`);

--
-- Indices de la tabla `pajaros`
--
ALTER TABLE `pajaros`
  ADD PRIMARY KEY (`anilla`),
  ADD KEY `criador` (`criador`);

--
-- Indices de la tabla `unioncollera`
--
ALTER TABLE `unioncollera`
  ADD PRIMARY KEY (`idUnion`),
  ADD KEY `anillaMacho` (`anillaMacho`),
  ADD KEY `anillaHembra` (`anillaHembra`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `colleras`
--
ALTER TABLE `colleras`
  MODIFY `idCollera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `unioncollera`
--
ALTER TABLE `unioncollera`
  MODIFY `idUnion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `colleras`
--
ALTER TABLE `colleras`
  ADD CONSTRAINT `colleras_ibfk_1` FOREIGN KEY (`idUnion`) REFERENCES `unioncollera` (`idUnion`);

--
-- Filtros para la tabla `crias`
--
ALTER TABLE `crias`
  ADD CONSTRAINT `crias_ibfk_1` FOREIGN KEY (`idCollera`) REFERENCES `colleras` (`idCollera`);

--
-- Filtros para la tabla `pajaros`
--
ALTER TABLE `pajaros`
  ADD CONSTRAINT `pajaros_ibfk_1` FOREIGN KEY (`criador`) REFERENCES `criadores` (`criador`);

--
-- Filtros para la tabla `unioncollera`
--
ALTER TABLE `unioncollera`
  ADD CONSTRAINT `unioncollera_ibfk_1` FOREIGN KEY (`anillaMacho`) REFERENCES `pajaros` (`anilla`),
  ADD CONSTRAINT `unioncollera_ibfk_2` FOREIGN KEY (`anillaHembra`) REFERENCES `pajaros` (`anilla`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
