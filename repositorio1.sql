-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-10-2024 a las 03:51:50
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `repositorio1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`id`, `nombre`) VALUES
(24, 'CONTADURIA GENERAL'),
(25, 'SECRETARIADO EJECUTIVO'),
(26, 'SISTEMAS INFORMATICOS'),
(27, 'MECANICA AUTOMOTRIZ'),
(28, 'GASTRONOMIA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `id` int(11) NOT NULL,
  `area_prod` varchar(7) NOT NULL,
  `cod_carrera` varchar(7) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `nivel` varchar(20) NOT NULL,
  `campo_prod` varchar(20) NOT NULL,
  `turno` varchar(10) NOT NULL,
  `Modalidad` varchar(15) NOT NULL,
  `estado` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `id` int(11) NOT NULL,
  `id_carrera` int(11) NOT NULL,
  `documento` varchar(50) NOT NULL,
  `nombres` varchar(150) NOT NULL,
  `apellido_pat` varchar(100) DEFAULT NULL,
  `apellido_mat` varchar(100) DEFAULT NULL,
  `correo` varchar(150) NOT NULL,
  `telefono` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`id`, `id_carrera`, `documento`, `nombres`, `apellido_pat`, `apellido_mat`, `correo`, `telefono`) VALUES
(61, 26, '8412231', 'Carlos Daniel Parady', NULL, NULL, 'carlosparady@gmail.com', '77120014'),
(65, 27, '3673410', 'Maria Condori', NULL, NULL, 'mariacondori@gmail.com', '77101100'),
(70, 26, '5412011', 'Juan Villca', NULL, NULL, 'juanvillca@gmail.com', '72131234'),
(71, 26, '124578', 'Juan Pablo Calle', NULL, NULL, 'pablocalle@gmail.com', '77102102'),
(72, 26, '9012121', 'Jaime Paz', NULL, NULL, 'jaimepaz@gmail.com', '61223100');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `integrantes`
--

CREATE TABLE `integrantes` (
  `id` int(11) NOT NULL,
  `id_proyecto` int(11) NOT NULL,
  `id_estudiante` int(11) NOT NULL,
  `nota` int(11) NOT NULL,
  `observacion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `integrantes`
--

INSERT INTO `integrantes` (`id`, `id_proyecto`, `id_estudiante`, `nota`, `observacion`) VALUES
(32, 18, 61, 60, 'DESAPROBADO'),
(34, 20, 70, 99, 'APROBADO'),
(35, 23, 71, 90, 'APROBADO'),
(36, 24, 72, 100, 'APROBADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modalidad`
--

CREATE TABLE `modalidad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `modalidad`
--

INSERT INTO `modalidad` (`id`, `nombre`) VALUES
(15, 'PROYECTO DE GRADO'),
(16, 'PROYECTO SOCIOCOMUNITARIO PRODUCTIVO'),
(17, 'PROYECTO DE EMPRENDIMIENTO PRODUCTIVO'),
(18, 'TRABAJO DIRIGIDO EXTERNO'),
(19, 'GRADUACION POR EXELENCIA ACADEMICA'),
(20, 'GRADUACION POR EXPERIENCIA LABORAL'),
(21, 'PRUEBA ACADEMICA DE GRADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajos`
--

CREATE TABLE `trabajos` (
  `id` int(11) NOT NULL,
  `id_modalidad` int(11) NOT NULL,
  `id_carrera` int(11) NOT NULL DEFAULT 0,
  `cod` varchar(50) NOT NULL,
  `titulo` text NOT NULL,
  `descripcion` text NOT NULL,
  `archivo` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `anio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `trabajos`
--

INSERT INTO `trabajos` (`id`, `id_modalidad`, `id_carrera`, `cod`, `titulo`, `descripcion`, `archivo`, `fecha`, `anio`) VALUES
(17, 16, 25, 'SE-1', 'Sistema web y aplicación móvil para la administración y difusión de información, caso: asociación municipal de futbol de El Alto', 'El presente proyecto de grado denominado “SISTEMA WEB Y APLICACIÓN MÓVIL PARA LA ADMINISTRACIÓN Y DIFUSIÓN DE INFORMACIÓN CASO: ASOCIACIÓN MUNICIPAL DE FUTBOL DE EL ATO”, se desarrolla un Sistema Web para facilitar el registro, control y difusión de información de los campeonatos, y una Aplicación Móvil donde se recibe dicha información mediante mensajes push y haciendo que esta sea más accesible.', '4153f89f099c7908dc963774acdb24e8', '2024-09-18', 2024),
(18, 16, 25, 'SE-2', 'Sistema web de administración académica (SISEF) caso: unidad educativa \"Sergio Suarez Figueroa A\"', 'El presente proyecto Sistema Web de Administración Académica (SISEF), es para ayudar a la comunidad educativa Sergio Suárez Figueroa A, para estar informado sobre el seguimiento que realiza el Estudiante y facilitar al Docente resumiendo sus trabajos utilizando la tecnología Web.', '04e20379d5aa76511fd5a443b6521788', '2024-09-18', 2024),
(19, 15, 26, 'SI-8', 'Servidor DNS administrado con tecnología WEB basado en software libre - aplicación Ministerio de Economía y Finanzas Públicas', 'El presente Proyecto de Grado plantea el desarrollo de un sistema de administración para un servidor DNS de uso intuitivo y con ventajas sobre sistemas existentes utilizando tecnología web y herramientas de software libre. Inicialmente se identificaron los requerimientos necesarios para el desarrollo del sistema. Las herramientas de software libre empleadas para el desarrollo del sistema son Debian como Sistema Operativo; Apache como servidor web; MariaDB como Sistema Gestor de Base de Datos; PHP, HTML5, JavaScript y CSS como lenguajes para el desarrollo de aplicaciones web y BIND como el servicio de DNS a ser administrado.', '480363998e9c94cb735947f0892bf765', '2024-09-22', 2024),
(20, 15, 26, 'SI-2', 'Sistema web de gestión documental y digitalización de expedientes jurídicos, caso: Estudio Jurídico Integral “Medina & Asociados”', 'El presente proyecto de grado fue desarrollado para implementar un Sistema Web de Gestión Documental y Digitalización de Expedientes Jurídicos Caso: Estudio Jurídico Integral “Medina & Asociados”, a través de entrevistas y observaciones se logra identificar como problema representativo que los registros de cada proceso judicial son anotados manualmente por los encargados del estudio, esta información pierde seguridad y no es confiable, el estudio jurídico mencionado, no cuenta con un sistema informático para la clasificación de procesos judiciales, expedientes jurídicos y mucho menos de registro automatizado de clientes y documentos.', '811fdd1df285a55c871d2ca0958afb44', '2024-10-08', 2023),
(21, 18, 26, 'SI-3', 'Portal Web para el arzobispado de Nuestra Señora de La Paz', ' El presente Proyecto de Grado propone un Portal Web auto administrable en sus diversos módulos, el diseño del Portal para el Arzobispado de Nuestra Señora de La Paz es desarrollado a través de la herramienta Framework Zend Php, que comienza a ingresar al mercado con lo que llamamos la tecnología Web 2.0. La necesidad de contar con aplicaciones Web que sean fáciles de usar, que responda a las expectativas del usuario y que presenten un rendimiento aceptable, son aspectos importantes que se considera en los sitios y portales web, es por eso que se plantea un Portal Web con tecnología Web 2.0 que es la facilidad donde interactúa el usuario y el administrador cuando acceden al Portal.', 'f63395b98efd2e1c2f393352abeee4cf', '2024-10-08', 2024),
(22, 15, 26, 'SI-4', 'Sistema de información y afiliación via web del seguro de salud para el adulto mayor. Caso: Dirección de salud Gobierno Municipal de El Alto', 'El Proyecto de Grado titulado: ³Sistema de Información y Afiliación vía Web del Seguro de Salud para el Adulto Mayor SSPAM´ fue desarrollado para la Dirección de Salud del Gobierno Municipal de El Alto, con el propósito de brindar una herramienta que coadyuve con las tareas de afiliación y se obtenga información confiable de la población adulto mayor afiliada en todos los distritos de la ciudad de El Alto. Además de generar reportes mensuales por Subalcaldías.', '9540e2004ed41680a77931bedfa45d77', '2024-10-09', 2024),
(23, 15, 26, 'SI-5', 'Sistema de control y seguimiento de trámites vía web para el Ministerio de Trabajo', ' El objetivo del presente proyecto es el de implantar el Sistema de Control y Seguimiento de Trámites Vía Web para mejorar la atención a los tramitantes proporcionándole información óptima y confiable respecto de su trámite. Si el tramitante desea obtener información de su trámite lo puede hacer por medio del sistema web sin necesidad de acudir al Ministerio, el resultado de esto es que el tramitante no pierde tiempo ni dinero al acudir al Ministerio innecesariamente. Además de la información para el tramitante el sistema brinda información al público en general, como ser listado de trámites que se realizan en el Ministerio de Trabajo y sus respectivos requisitos.', '861fd9787d033d362ca836c5a0169bd1', '2024-10-10', 2024),
(24, 18, 26, 'SI-1', 'Sistema de control y seguimiento del uso de vehículos vía Web para la empresa CADEB', ' En el presente proyecto de grado se propone el Sistema de Control y Seguimiento del Uso de Vehículos vía Web, el cual está desarrollado por la necesidad de tener un sistema que brinde un mejor apoyo en la administración de la información, teniéndola así disponible en cualquier momento. La principal causa para el desarrollo de este proyecto, se basa en: el excesivo tiempo empleado en los procesos de generación de datos y la falta de información del mantenimiento de los vehículos lo que implica la utilización de recursos en demasía para la preparación de reportes y otros informes.', '97fd26dc2890fc4f7183b76b736bab40', '2024-10-10', 2023),
(25, 15, 25, 'SE-3', 'Sistema de información para la evaluación del desempeño docente. Caso: Facultad de Arquitectura, Artes y Urbanismo', 'El objetivo de este proyecto es implementar un Sistema de Información para la Evaluación del Desempeño Docente (SIPLEDD) para la Facultad de Arquitectura, Artes, Diseño y Urbanismo aplicando la metodología UWE basada en UML que es Orientada Objetos El SIPLEDD coadyuva con la eficiencia y la objetividad del proceso de evaluación docente apoyándose en los reglamentos universitarios e internos de la facultad', 'bd6fb8be2e5983511ae33a34bfa82185', '2024-10-15', 2023),
(26, 15, 24, 'CG-1', 'Software de ventas y control de inventarios, caso:auto class de la ciudad de La Paz', 'La presente Proyecto de Grado titulado “SOFTWARE DE VENTAS Y CONTROL DE INVENTARIOS CASO: AUTO CLASS DE LA CIUDAD DE LA PAZ” consiste en desarrollar un software de ventas y un control de inventarios para que la empresa Auto Class pueda automatizar los procesos que ahora desarrolla con papel y lápiz, con el Software diseñado para dar solución, la empresa Auto Class podrá agilizar sus procesos y tener un mejor control de todos los movimientos que se realiza en el negocio, así mismo el software ayuda con reportes de productos, los cuales le ayudan a la toma de decisiones acertada.', '02c5d4ac13ba8b6b1754d5f9c00c0611', '2024-10-15', 2024),
(27, 15, 26, 'SI-6', 'Sistema de gestión y seguimiento de artículos para revistas indexadas', 'El presente trabajo está enfocado a la gestión y seguimiento de los artículos científicos, estos son un medio de difusión de conocimientos muy importante para el campo académico. Para su publicación estos pasan por un proceso de selección y revisión. Debido a la necesidad de automatizar parte de este proceso, es abordado en el desarrollo del presente trabajo, desde el análisis que llevo al planteamiento del trabajo y la investigación, además del desarrollo e implementación. Mediante el enfoque de la modalidad de investigación documental, se realizó la recopilación, análisis e interpretación de la información existente con el fin de abstraer los procesos a ser automatizados.', '1355e1cf3f2792579aacb96fbc4fc35d', '2024-10-15', 2024),
(28, 15, 26, 'SI-7', 'Desarrollo de un sistema de reserva de servicios para la Empresa, Eventos Sociales Gran Poder (ESGP).', 'El presente proyecto tiene como objetivo el desarrollo de un sistema de reservas para la empresa Eventos Sociales Gran Poder con el fin de facilitar el proceso de reserva y cotización de servicios y permitir a los clientes de la empresa realizar sus reservas de forma más eficiente.', 'd00c760f0ac79420ed6731551b19a98f', '2024-10-15', 2024);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `rol` varchar(30) NOT NULL,
  `nombres` varchar(150) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `rol`, `nombres`, `usuario`, `clave`, `telefono`, `estado`) VALUES
(11, 'docente', 'daniel', 'docente', 'ac99fecf6fcb8c25d18788d14a5384ee', '1234567', 1),
(13, 'admin', 'junior', 'admin', '21232f297a57a5a743894a0e4a801fc3', '78451245', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_carrera` (`id_carrera`);

--
-- Indices de la tabla `integrantes`
--
ALTER TABLE `integrantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_estudiante` (`id_estudiante`),
  ADD KEY `id_proyecto` (`id_proyecto`);

--
-- Indices de la tabla `modalidad`
--
ALTER TABLE `modalidad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `trabajos`
--
ALTER TABLE `trabajos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_modalidad` (`id_modalidad`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de la tabla `integrantes`
--
ALTER TABLE `integrantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `modalidad`
--
ALTER TABLE `modalidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `trabajos`
--
ALTER TABLE `trabajos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`id_carrera`) REFERENCES `carrera` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `integrantes`
--
ALTER TABLE `integrantes`
  ADD CONSTRAINT `integrantes_ibfk_1` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiante` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `integrantes_ibfk_2` FOREIGN KEY (`id_proyecto`) REFERENCES `trabajos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `trabajos`
--
ALTER TABLE `trabajos`
  ADD CONSTRAINT `trabajos_ibfk_1` FOREIGN KEY (`id_modalidad`) REFERENCES `modalidad` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
