-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-10-2019 a las 21:39:09
-- Versión del servidor: 10.1.40-MariaDB
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `micampo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `actividad_id` int(11) NOT NULL,
  `nombre` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`actividad_id`, `nombre`, `descripcion`) VALUES
(1, 'Arado', 'Herramienta de labranza utilizada para abrir surcos en la tierra y remover el suelo antes de sembrar'),
(2, 'Siembra Directa', 'Técnica de Cultivo sin Alteración de suelo mediante arado'),
(3, 'Fumigación o Pulverización Terrestre', 'Aplicación de Químicos plaguicidas'),
(4, 'Fertilización', 'Aplicación de Químicos Fertilizantes'),
(5, 'Cosecha', 'Cosecha del Cultivo mediante Cosechadoras');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campo`
--

CREATE TABLE `campo` (
  `campo_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `lat1` double DEFAULT NULL,
  `long1` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `campo`
--

INSERT INTO `campo` (`campo_id`, `usuario_id`, `nombre`, `lat1`, `long1`) VALUES
(1, 1, 'el campo en la ciudad', -32.40996144292236, -63.2165789231658),
(2, 1, 'Ucrania', 48.068285014521216, 34.92188796401023),
(3, 1, 'campo jose', 46.96025585673268, 33.75000972300767),
(4, 1, 'Venezuela', 5.499337975882405, -64.33593012392521),
(5, 7, 'campo del fede', -32.40949044356725, -63.21683574467897),
(6, 1, 'campo MartÃ­n', -32.343679524992915, -63.23646448552608);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cultivo`
--

CREATE TABLE `cultivo` (
  `cultivo_id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `periodo_cultivo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cultivo`
--

INSERT INTO `cultivo` (`cultivo_id`, `nombre`, `descripcion`, `periodo_cultivo_id`) VALUES
(1, 'Maiz', ' ', 2),
(2, 'Soja', ' ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_actividad`
--

CREATE TABLE `detalle_actividad` (
  `detalle_actividad_id` int(11) NOT NULL,
  `proyecto_cultivo_id` int(11) NOT NULL,
  `actividad_id` int(11) NOT NULL,
  `fecha_inicio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fecha_fin` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `estado_actividad_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `detalle_actividad`
--

INSERT INTO `detalle_actividad` (`detalle_actividad_id`, `proyecto_cultivo_id`, `actividad_id`, `fecha_inicio`, `fecha_fin`, `estado_actividad_id`) VALUES
(1, 1, 1, '2019-10-05 03:00:00', '2019-10-10 13:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `estado_id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` varchar(90) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ambito` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`estado_id`, `nombre`, `descripcion`, `ambito`) VALUES
(1, 'CREADO', 'Lote listo para se ocupado', 'Lote'),
(2, 'EN PREPARACIÓN', 'PROYECTO CREADO -> LOTE EN PREPARACIÓN', 'LOTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_actividad`
--

CREATE TABLE `estado_actividad` (
  `estado_actividad_id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `estado_actividad`
--

INSERT INTO `estado_actividad` (`estado_actividad_id`, `nombre`) VALUES
(1, 'PLANIFICADA'),
(2, 'EN EJECUCIÓN'),
(3, 'FINALIZADA'),
(4, 'CANCELADA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lote`
--

CREATE TABLE `lote` (
  `lote_id` int(11) NOT NULL,
  `campo_id` int(11) NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `tamano` double DEFAULT '0',
  `lat1` double NOT NULL,
  `lat2` double NOT NULL,
  `lat3` double NOT NULL,
  `lat4` double NOT NULL,
  `long1` double NOT NULL,
  `long2` double NOT NULL,
  `long3` double NOT NULL,
  `long4` double NOT NULL,
  `estado_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `lote`
--

INSERT INTO `lote` (`lote_id`, `campo_id`, `nombre`, `tamano`, `lat1`, `lat2`, `lat3`, `lat4`, `long1`, `long2`, `long3`, `long4`, `estado_id`) VALUES
(1, 1, 'lote en vm', 20, -32.41035233655423, -32.4109246629161, -32.40984029668842, -32.40920087964266, -63.2172280177474, -63.21667212992906, -63.21490690112114, -63.21549598127604, 2),
(2, 3, 'campo 1', 25, 46.954795975592745, 46.959048547615595, 46.95337204476512, 46.94610647842255, 33.74064277857541, 33.750951178371906, 33.75879865139723, 33.753235414624214, 1),
(5, 1, 'vm 2', 12, -32.408922636990376, -32.41057736144701, -32.4103962093761, -32.40810149065218, -63.21346018463373, -63.214847892522805, -63.21265920996666, -63.21144316345454, 1),
(6, 4, 'vavava', 12, 5.50118885596317, 5.497016858665894, 5.49637608855197, 5.500078195112582, -64.33283988386394, -64.3327684700489, -64.33022204786539, -64.33060828596354, 1),
(7, 2, 'lote cx', 70, 48.06973793499304, 48.06731936542703, 48.06526410809539, 48.0711240523426, 34.925306774675846, 34.92473445832729, 34.91768192499876, 34.9197418615222, 1),
(8, 5, 'el mÃ¡s capo ', 200, -32.41036139417082, -32.40924588524031, -32.40870836408857, -32.40876752270807, -63.217280991375446, -63.21550101041794, -63.21588758379221, -63.21860197931528, 2),
(9, 6, 'lote 1', 45, -32.34627641037818, -32.344700386297895, -32.34405116063039, -32.34573030018193, -63.235982023179524, -63.235570974648, -63.23719572275877, -63.23765270411968, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodocultivo`
--

CREATE TABLE `periodocultivo` (
  `periodo_cultivo_id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `periodocultivo`
--

INSERT INTO `periodocultivo` (`periodo_cultivo_id`, `nombre`, `fechaInicio`, `fechaFin`) VALUES
(1, 'Verano-Otoño', '2019-12-01', '2020-05-31'),
(2, 'Primavera-Verano', '2019-09-01', '2019-03-31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilegio`
--

CREATE TABLE `privilegio` (
  `privilegio_id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `privilegio`
--

INSERT INTO `privilegio` (`privilegio_id`, `nombre`, `descripcion`) VALUES
(1, 'ADMINISTRADOR', 'Privilegio de Administrador: Solo para desarrolladores del Sistema'),
(2, 'CLIENTE', 'Privilegio de Cliente: Cualquier persona registrada en el sistema.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto_cultivo`
--

CREATE TABLE `proyecto_cultivo` (
  `proyecto_cultivo_id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cultivo_id` int(11) NOT NULL,
  `lote_id` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `proyecto_cultivo`
--

INSERT INTO `proyecto_cultivo` (`proyecto_cultivo_id`, `nombre`, `fecha_registro`, `cultivo_id`, `lote_id`, `estado`) VALUES
(1, 'PRUEBA', '2019-10-03 17:40:15', 1, 1, 1),
(2, 'soja 2019 ', '2019-10-07 21:44:56', 1, 8, 1),
(3, 'maÃ­z 2019', '2019-10-07 23:12:45', 1, 9, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuario_id` int(11) NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `telefono` bigint(20) DEFAULT NULL,
  `contrasena` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `privilegio_id` int(11) NOT NULL DEFAULT '2',
  `estado` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `nombre`, `apellido`, `correo`, `telefono`, `contrasena`, `fecha_registro`, `privilegio_id`, `estado`) VALUES
(1, 'Gonzalo', 'Pedrotti', 'gonzapedrotti@hotmail.com', 3533434040, 'gonzapedrotti', '2019-09-07 20:21:16', 1, 1),
(2, 'JoaquÃ­n', 'RodrÃ­guez', 'joaquin@gmail.com', 353494649, '12345678', '2019-09-16 15:56:29', 2, 1),
(3, 'JoaquÃ­n', 'RodrÃ­guez', 'fati@gmail.com', 353494649, '12345678', '2019-09-16 15:57:06', 2, 0),
(4, 'Mario', 'Martinez', 'mario@gmail.com', 353341404, '123456789', '2019-09-16 17:14:18', 2, 0),
(5, 'DarÃ­o', 'Pedrotti', 'dario@hotmail.com', 353340807, '12345678', '2019-09-18 22:57:27', 2, 1),
(6, 'Manuel ', 'GÃ³mez', 'manu@gmail.com', 353349464, '123456', '2019-09-20 01:42:06', 2, 1),
(7, 'Federico', 'Zanin', 'fede@hotmail.com', 353419464, 'fede1234', '2019-10-07 21:41:09', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `variedad`
--

CREATE TABLE `variedad` (
  `variedad_id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cultivo_id` int(11) NOT NULL,
  `ciclo_dias` int(11) NOT NULL,
  `profundidad_siembra` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `variedad`
--

INSERT INTO `variedad` (`variedad_id`, `nombre`, `descripcion`, `cultivo_id`, `ciclo_dias`, `profundidad_siembra`) VALUES
(2, 'DM4612', 'grupo 4 medio con tecnología RR1 de resistencia a glifosato', 2, 145, 4.5),
(3, '2771 VT TRIPLE PRO', 'Maíz VT', 1, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona`
--

CREATE TABLE `zona` (
  `zona_id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `zona`
--

INSERT INTO `zona` (`zona_id`, `nombre`, `descripcion`) VALUES
(1, 'Sur de Córdoba', 'General Roca - Río Cuarto - Saenz Peña'),
(2, 'Centro, Sureste y Noreste de Córdoba', 'Mayoría de la Pcia de Cba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona_variedad`
--

CREATE TABLE `zona_variedad` (
  `zona_variedad_id` int(11) NOT NULL,
  `variedad_id` int(11) NOT NULL,
  `zona_id` int(11) NOT NULL,
  `nivel` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_siembra` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `zona_variedad`
--

INSERT INTO `zona_variedad` (`zona_variedad_id`, `variedad_id`, `zona_id`, `nivel`, `fecha_siembra`) VALUES
(1, 2, 1, 'MEDIO', '09-01'),
(2, 3, 2, 'ALTO', '12-12');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`actividad_id`);

--
-- Indices de la tabla `campo`
--
ALTER TABLE `campo`
  ADD PRIMARY KEY (`campo_id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `cultivo`
--
ALTER TABLE `cultivo`
  ADD PRIMARY KEY (`cultivo_id`);

--
-- Indices de la tabla `detalle_actividad`
--
ALTER TABLE `detalle_actividad`
  ADD PRIMARY KEY (`detalle_actividad_id`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`estado_id`);

--
-- Indices de la tabla `estado_actividad`
--
ALTER TABLE `estado_actividad`
  ADD PRIMARY KEY (`estado_actividad_id`);

--
-- Indices de la tabla `lote`
--
ALTER TABLE `lote`
  ADD PRIMARY KEY (`lote_id`);

--
-- Indices de la tabla `periodocultivo`
--
ALTER TABLE `periodocultivo`
  ADD PRIMARY KEY (`periodo_cultivo_id`);

--
-- Indices de la tabla `privilegio`
--
ALTER TABLE `privilegio`
  ADD PRIMARY KEY (`privilegio_id`);

--
-- Indices de la tabla `proyecto_cultivo`
--
ALTER TABLE `proyecto_cultivo`
  ADD PRIMARY KEY (`proyecto_cultivo_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario_id`),
  ADD KEY `privilegio_id` (`privilegio_id`);

--
-- Indices de la tabla `variedad`
--
ALTER TABLE `variedad`
  ADD PRIMARY KEY (`variedad_id`);

--
-- Indices de la tabla `zona`
--
ALTER TABLE `zona`
  ADD PRIMARY KEY (`zona_id`);

--
-- Indices de la tabla `zona_variedad`
--
ALTER TABLE `zona_variedad`
  ADD PRIMARY KEY (`zona_variedad_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `actividad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `campo`
--
ALTER TABLE `campo`
  MODIFY `campo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `cultivo`
--
ALTER TABLE `cultivo`
  MODIFY `cultivo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detalle_actividad`
--
ALTER TABLE `detalle_actividad`
  MODIFY `detalle_actividad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `estado_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estado_actividad`
--
ALTER TABLE `estado_actividad`
  MODIFY `estado_actividad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `lote`
--
ALTER TABLE `lote`
  MODIFY `lote_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `periodocultivo`
--
ALTER TABLE `periodocultivo`
  MODIFY `periodo_cultivo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `privilegio`
--
ALTER TABLE `privilegio`
  MODIFY `privilegio_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `proyecto_cultivo`
--
ALTER TABLE `proyecto_cultivo`
  MODIFY `proyecto_cultivo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `variedad`
--
ALTER TABLE `variedad`
  MODIFY `variedad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `zona`
--
ALTER TABLE `zona`
  MODIFY `zona_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `zona_variedad`
--
ALTER TABLE `zona_variedad`
  MODIFY `zona_variedad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `campo`
--
ALTER TABLE `campo`
  ADD CONSTRAINT `campo_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`usuario_id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`privilegio_id`) REFERENCES `privilegio` (`privilegio_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
