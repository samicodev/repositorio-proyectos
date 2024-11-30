-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 20-11-2024 a las 00:02:38
-- Versión del servidor: 10.11.10-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u802985069_repositorio1`
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
(74, 24, '78451245', 'AGUSTIN OJOPI MENACHO', NULL, NULL, 'agustin@gmail.com', '78451245'),
(75, 24, '78451245', 'YUSARA ZAMBRANA KARAGEORGE', NULL, NULL, 'yusara@gmail.com', '784751245'),
(76, 24, '89562356', 'NAYELY MAMANI CHAMBI', NULL, NULL, 'nayely@gmail.com', '89562356'),
(77, 24, '89562356', 'LISSY SOE PURO', NULL, NULL, 'lissy@gmail.com', '89562356'),
(78, 28, '79461346', 'SANDRA FLORES CASERES', NULL, NULL, 'sandra@gmail.com', '79461346'),
(79, 28, '79461346', 'DAYSI PACO CRUZ', NULL, NULL, 'daysi@gmail.com', '79461346'),
(80, 28, '97643164', 'DIEGO JAVIER NOVOA ALA', NULL, NULL, 'diego@gmail.com', '97643164'),
(81, 28, '97643146', 'ANA FLAVIA FERREIRA RODRIGUEZ ', NULL, NULL, 'ana@gmail.com', '97643164'),
(83, 28, '13467946', 'DAVID SALOMA MAMANI', NULL, NULL, 'david@gmail.com', '13467946'),
(84, 28, '13467946', 'DAYANA ALEJANDRA GANDRA SUÁREZ', NULL, NULL, 'dayana@gmail.com', '13467946'),
(85, 27, '89562356', 'SABINO CALLE SANCHEZ', NULL, NULL, 'sabino@gmail.com', '89562356'),
(86, 27, '89562356', 'JOSE ABEL NINA CUIZARA', NULL, NULL, 'jose@gmail.com', '89562356'),
(87, 27, '89562356', 'FRANZ MACHON YANAHUAYA', NULL, NULL, 'franz@gmail.com', '89562356'),
(88, 27, '89562356', 'BIEMNER OYOLA GONGORA', NULL, NULL, 'biemner@gmail.com', '32656983'),
(89, 27, '94643164', 'Omar Ariel Callizaya Moya', NULL, NULL, 'omar@gmail.com', '45464531'),
(90, 27, '64913467', 'Alvaro Alvarado Mocho', NULL, NULL, 'alvaro@gmail.com', '94613568'),
(91, 25, '79464674', 'Adriana Caiquiri Copareare', NULL, NULL, 'adriana@gmail.com', '14253669'),
(92, 25, '47586936', 'Daniela Saldaña Duri', NULL, NULL, 'daniela@gmail.com', '47856952'),
(93, 25, '48592615', ' Brigida Gualy Aguilera', NULL, NULL, 'brigida@gmai.com', '78541256'),
(94, 25, '56232154', 'Maria Mercedes Peinado Macuyama', NULL, NULL, 'maria@gmail.com', '89457821'),
(95, 25, '23654521', 'Ariela Arauz Lozano', NULL, NULL, 'ariela@gmail.com', '23654521'),
(96, 25, '78456589', 'Sharon Esdenka Quiroga Alvarez', NULL, NULL, 'sharon@gmail.com', '89654578'),
(97, 26, '89456521', 'ARMINDA CANO MAMANI', NULL, NULL, 'armainda@gmail.com', '89455612'),
(98, 26, '56451298', 'DANIEL MAURICIO DELGADO CAMARGO', NULL, NULL, 'daniel@gmail.com', '45786521'),
(99, 26, '23125465', 'JUANA LUDIM ADUVIRI SALGADO', NULL, NULL, 'juana@gmail.com', '89872123'),
(100, 26, '23124587', 'REYNALDO HUANCA MORALES', NULL, NULL, 'reynaldo@gmial.com', '78542132'),
(101, 26, '89651223', ' LUZ VANIA DAVALOS GUARI', NULL, NULL, 'luz@gmail.com', '89874521'),
(102, 26, '89654512', 'CARLOS ALEXANDRO CAHUA BLANCO', NULL, NULL, 'carlos@gmail.com', '23659845'),
(104, 26, '5700406', 'CARLOS DANIEL PARADY ESPIONZA', NULL, NULL, 'CARLOS.@Ggmail.com', '74777670'),
(105, 26, '454545', 'JUAN', NULL, NULL, 'JUAN@gmail.com', '5656');

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
(37, 29, 76, 85, 'APROBADO'),
(38, 29, 77, 85, 'APROBADO'),
(39, 30, 74, 90, 'APROBADO'),
(40, 30, 75, 90, 'APROBADO'),
(41, 31, 78, 90, 'APROBADO'),
(42, 31, 79, 90, 'APROBADO'),
(43, 32, 80, 90, 'APROBADO'),
(44, 32, 81, 90, 'APROBADO'),
(45, 33, 83, 90, 'APROBADO'),
(46, 33, 84, 90, 'APROBADO'),
(47, 34, 85, 90, 'APROBADO'),
(48, 34, 86, 90, 'APROBADO'),
(49, 35, 87, 90, 'APROBADO'),
(50, 35, 88, 90, 'APROBADO'),
(51, 36, 89, 90, 'APROBADO'),
(52, 36, 90, 90, 'APROBADO'),
(53, 37, 91, 95, 'APROBADO'),
(54, 37, 92, 95, 'APROBADO'),
(55, 38, 93, 90, 'APROBADO'),
(56, 38, 94, 90, 'APROBADO'),
(57, 39, 95, 90, 'APROBADO'),
(58, 39, 96, 90, 'APROBADO'),
(59, 40, 97, 90, 'APROBADO'),
(60, 40, 98, 90, 'APROBADO'),
(61, 41, 99, 90, 'APROBADO'),
(62, 41, 100, 90, 'APROBADO'),
(63, 42, 101, 80, 'APROBADO'),
(64, 42, 102, 80, 'APROBADO'),
(71, 48, 104, 100, 'APROBADO');

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
(29, 17, 24, 'CG-2023-1', 'PRODUCCIÓN ARTESANAL DE MERMELADA PARA \r\nDIABETICOS A BASE DE COPUAZU Y MARACUYA', 'El presente proyecto estará realizado en el departamento de pando más \r\nespecíficamente en la ciudad de cobija ya que en este lugar se cuenta con nuestra materia \r\nprima con la cual realizaremos el producto y también se tiene un mercado amplio para el \r\npresente emprendimiento ya que en la ciudad se cuenta con un porcentaje alto de personas \r\nque sufren de diabetes y nuestro producto es objetivamente para ellos.', 'ba1ed61fc8576b807069681a497f0c37', '2024-10-22', 2023),
(30, 17, 24, 'CG-2023-2', 'IMPLEMENTACIÒN DE UNA GRANJA PORCINA PARA \r\nLA COMERCIALIZACION DE CARNE DE CERDO \r\nCRIOLLO EN EL MUNICIPIO DE PUERTO RICO.', 'Este proyecto tiene como objetivo capitalizarse en el mercado local de carnes como una \r\nempresa creada con el propósito de contribuir con una alimentación sana a las familias  \r\ndel municipio de Puerto Rico. Se ha establecido una estrategia para aprovechar la \r\nmateria prima, lo que nos brinda la oportunidad de establecer.', 'd1dd6508296e6633a956104cb218ee9e', '2024-10-22', 2023),
(31, 15, 28, 'G-2023-1', 'PROPUESTA DE CERVEZA ARTESANAL CON SABOR  \r\nCOPOAZU, ASAI Y SININI EN EL MUNICIPIO DE COBIJA \r\nEN LA GESTIÓN 2023', 'La presente propuesta, permitirá que el producto llegue a la mente del \r\nconsumidor como una nueva opción muy buena además de dar a conocer a los \r\nturistas la existencia de estos frutos.', '274845c11d72975c88d092e3e24ffab6', '2024-10-22', 2023),
(32, 16, 28, 'G-2023-2', 'PRODUCCION Y COMERCIALIZACION DE CHOCOLATE \r\nCON SABOR A FRUTOS AMAZONICOS DE LA \r\nASOCIACIÓN PRODUCTORA Y CULTIVO DE \r\nCHOCOLATE COMUNIDAD GRAN PROGRESO DE LA \r\nRESERVA MANURIPI ', 'El presente trabajo surge de un análisis de los frutos amazónicos del \r\ndepartamento que no están siendo aprovechados para generar flujo \r\neconómico en la región, resultará trascendente para el desarrollo \r\nsocioeconómico el aprovechamiento de los frutos amazónicos que será de \r\ngran ayuda a muchas generaciones de productores agrícolas y así beneficiar \r\na las familias de la Comunidad Campesina Gran Progreso de la Reserva \r\nManuripi.', 'ed4c50ab38d6daa81eb8c3f2e1cc0ded', '2024-10-22', 2023),
(33, 16, 28, 'G-2023-3', 'ELABORACIÓN DE PLATILLOS DE PESCADO \r\nFUSIONADOS CON FRUTOS AMAZONICOS (ASAI Y \r\nCARAMBOLA) PARA LA ASOCIACION DE \r\nPESCADORES TAHUAMANU DEL MUNICIPIO DE \r\nPORVENIR', 'Lo que se pretende con este trabajo es dar a conocer los platillos elaborados a base del \r\npescado Paiche con frutos regionales e integrar las distintas implementaciones que se da \r\na conocer la nueva cocina regional del Municipio de Porvenir en el departamento de Pando \r\na manos de la asociación de pescadores Tahuamanu, combinando los frutos amazónicos \r\nque son el asai y la carambola junto con el pescado Paiche dando así una nueva \r\nimplementación gastronómica en estas tres preparaciones en la cocina que resaltara el \r\nsabor de este pescado fusionado con una fruta amazónica.', '420182d9e039d8e2a949df7fdca03138', '2024-10-22', 2023),
(34, 17, 27, 'MA-2023-1', 'PROYECTO DE EMPRENDIMIENTO PRODUCTIVO \r\nIMPLEMENTACION DE UN TALLER MECANICO \r\nAUTOMOTRIZ EN EL MUNICIPIO DE FILADELFIA', 'Implementar un Taller Mecánico Automotriz en el Municipio de Filadelfia \r\nDepartamento de Pando, para prestar Servicios Mecánicos a todos los \r\nvehiculos liviano', 'dbe713eeef7da196059a9e2437de6d27', '2024-10-22', 2023),
(35, 15, 27, 'MA-2023-2', 'IMPLEMENTACIÓN DE UN BANCO DIDÁCTICO DEL SISTEMA DE AIRE\r\n ACONDICIONADO EN EL TALLER AUTOMOTRIZ DEL INSTITUTO TÉCNICO\r\n INCOS PANDO', 'El diseño del banco didáctico como una herramienta que ayuda y facilita a los \r\nestudiantes la identificación, diagnóstico, operación y control de sistemas de \r\naire acondicionado, Pretende facilitar el aprendizaje de los futuros mecánicos \r\nde automoción que conozcan las últimas tecnologías y tengan una sólida base \r\nacadémica.', 'e855befce4946e09b52326ff1e3d9584', '2024-10-22', 2023),
(36, 15, 27, 'MA-2023-3', 'CONSTRUCCIÓN DE UN BANCO DIDÁCTICO DE MOTOR A \r\nGASOLINA PARA EL TALLER MECÁNICO DEL INSTITUTO \r\nTÉCNICO  INCOS PANDO', 'El proyecto se realizará con un enfoque en un motor de cuatro tiempos ya que \r\nlas especificaciones del material de aprendizaje son teóricas en sus primeras etapas de \r\ndesarrollo los cuales nos da una visión inicial de la materia de motores a gasolina, la \r\nparte práctica se realiza en motores funcionales los cuales se llegan a dañar y oxidar por \r\nla constante manipulación y en algunos casos la mala práctica al momento.', '489210a9fd88dbf5296c7b7ff7179518', '2024-10-22', 2023),
(37, 15, 25, 'SE-2023-1', 'ORGANIZACIÓN DE DOCUMENTOS FÍSICO \r\nEXPEDIDOS Y RECIBIDOS EN LA SUBDIRECCIÓN \r\nALTERNATIVA Y ESPECIAL DE LA DIRECCIÓN \r\nDEPARTAMENTAL DE PANDO GESTIÓN 2021', 'La realización de esta investigación pretende ser ayuda eficaz para todo el \r\npersonal que tenga que recurrir a la documentación de las oficinas de la sub \r\nDirección Alternativa y Especial de la Dirección Departamental de Pando \r\nGestión 2021.', '4cb425857d1ac453b535051eea60b9ee', '2024-10-22', 2023),
(38, 15, 25, 'SE-2023-2', 'ORGANIZACIÓN Y CODIFICACIÓN DE LOS LIBROS DE LA \r\nBIBLIOTECA DE LA UNIDAD EDUCATIVA HÉROES DE LA \r\nDISTANCIA ', 'El presenté proyecto de grado tiene como propuesta de innovación o solución de los \r\nproblemas planteados desarrollar una Organización y una Codificación de los libros que \r\nexisten en la Unidad Educativa que de una buena organización para evitar la pérdida de \r\nlos libros así evitando la demora a la hora de requerir un libro de la biblioteca así teniendo \r\nuna biblioteca mejor organizada y en su inventario físico que tienen.', '9e89a9b86861d8691ebeeabe8fc032ba', '2024-10-22', 2023),
(39, 15, 25, 'SE-2023-3', 'ORGANIZACIÓN Y DIGITALIZACIÓN DE \r\nDOCUMENTOS FÍSICOS PARA EL ACCESO A LA \r\nDOCUMENTACIÓN MEDIANTE CÓDIGOS QR EN LA \r\nUNIDAD EDUCATIVA SERAFÍN CASTEDO  \r\nGESTIÓN 2022', 'Este proyecto tiene por objetivo implementar el sistema de archivo alfabético para los \r\nFiles de los docentes y el sistema de archivo por asunto para las correspondencias \r\nexpedidas, ya que la organización y la digitalización de los documentos es importante. De \r\nesta manera se podrá resguardar y evitar pérdida de documentos, para el inmediato \r\nsuperior y docentes de la Unidad, para que sean atendidos con la calidad de atención.', '5e0629e7c407aeb7eb187696c5d8b987', '2024-10-22', 2023),
(40, 15, 26, 'SI-2023-1', 'SISTEMA WEB EN LÍNEA PARA EL REGISTRO DE \r\nLICENCIAS DE ESTUDIANTES EN LA UNIDAD \r\nEDUCATIVA “DEFENSORES DEL ACRE” ', 'La finalidad de este proyecto es mejorar el proceso de registro de licencias \r\nmediante el desarrollo de un sistema web en línea, para brindar calidad en el \r\nservicio de atención a los padres de familia o tutores por parte de la \r\nadministración de la institución educativa, así mismo coadyuvar a la toma de \r\ndecisiones mediante la generación de reportes diarios, apto para fines de \r\nconsulta con un almacenamiento de datos eficiente y oportuno.', '17c825dd6d29efea01747e071620dddc', '2024-10-22', 2023),
(41, 15, 26, 'SI-2023-2', 'SISTEMA INFORMÁTICO DE CONTROL DE ENTRADA \r\nY SALIDA DEL PERSONAL DEL AEROPUERTO “CAP. \r\nANIBAL ARAB FADUL” DE COBIJA-PANDO', 'La implementación de este proyecto se encarga de automatizar los procesos que \r\nrealizaba el personal de NAABOL (Navegación Aérea y Aeropuertos Bolivianos) \r\nmanualmente, reduciendo el tiempo de registro y evitando malos entendidos con \r\nlos empleados, bridará reportes que permita tener día a día la información \r\nactualizada de entrada y salida de cada empleado del aeropuerto.', '07a4b12a628f186560c16b52af8d9795', '2024-10-22', 2023),
(42, 15, 26, 'SI-2023-3', 'SISTEMA INFORMÁTICO PARA EL MANEJO Y \r\nCONTROL DE INFORMACIÓN DE LA MICROEMPRESA \r\n“EMPRENDA TU ORO”', 'La gestión manual de información, la falta de seguimiento efectivo de clientes y \r\nproveedores, y la generación laboriosa de informes financieros son solo algunas de las \r\ndificultades que afectan su operatividad y su capacidad para satisfacer las demandas cambiantes \r\nde un mercado competitivo. En este contexto, surge la propuesta de diseñar y desarrollar un \r\nSistema Informático Integral, diseñado específicamente para atender las necesidades \r\nparticulares de \"Emprenda Tu Oro\". Esta propuesta busca aprovechar la tecnología moderna \r\npara revolucionar la manera en que la empresa gestiona su información, interactúa con sus \r\nclientes y optimiza sus procesos internos.', 'ceab3a7800b67519505e4fc9e31fefd1', '2024-10-22', 2023),
(48, 15, 26, 'SI-2024-5', 'Repositorio web', 'Repositorio web ', '2d952d9dddb82f3eeebaeef43469a5fa', '2024-11-16', 2024);

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
(15, 'admin', 'CARLOS DANIEL PARADY ESPINOZA', 'carlos', '827ccb0eea8a706c4c34a16891f84e7b', '78451245', 1),
(17, 'docente', 'IDEL JUNIOR PARADY ESPINOZA', 'docente', 'ac99fecf6fcb8c25d18788d14a5384ee', '78451245', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT de la tabla `integrantes`
--
ALTER TABLE `integrantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de la tabla `modalidad`
--
ALTER TABLE `modalidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `trabajos`
--
ALTER TABLE `trabajos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
