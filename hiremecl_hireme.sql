-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 09-03-2018 a las 22:08:02
-- Versión del servidor: 10.1.24-MariaDB-cll-lve
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hiremecl_hireme`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admcontrato`
--

CREATE TABLE `admcontrato` (
  `idAdm` int(11) NOT NULL,
  `nombreAdm` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `apellidoAdm` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `telefonoAdm` varchar(11) CHARACTER SET ascii NOT NULL,
  `fkusuario` int(11) NOT NULL,
  `fkorganizacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `admcontrato`
--

INSERT INTO `admcontrato` (`idAdm`, `nombreAdm`, `apellidoAdm`, `telefonoAdm`, `fkusuario`, `fkorganizacion`) VALUES
(1, 'Gerardo', 'Rivera', '87635245', 181, 6),
(2, 'Dida', 'Dida', '123', 229, 7),
(6, 'penka2', 'penka2', '123456789', 243, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `idAdmin` int(11) NOT NULL,
  `nombreAdmin` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `apellidoAdmin` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `fkusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`idAdmin`, `nombreAdmin`, `apellidoAdmin`, `fkusuario`) VALUES
(1, 'Hugo', 'Paez', 208);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `afp`
--

CREATE TABLE `afp` (
  `idAfp` int(11) NOT NULL,
  `nombreAfp` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `afp`
--

INSERT INTO `afp` (`idAfp`, `nombreAfp`) VALUES
(1, 'Cuprum');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivo`
--

CREATE TABLE `archivo` (
  `idArchivo` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipoArchivo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `tam` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fkusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `archivo`
--

INSERT INTO `archivo` (`idArchivo`, `nombre`, `tipoArchivo`, `fecha`, `tam`, `fkusuario`) VALUES
(2, '02-M02-Mecanismos de prevencion.pdf', 'application/pdf', '2018-03-07', '489575', 221),
(3, 'drakenetflix-1.jpg', 'image/jpeg', '2018-03-07', '41236', 221),
(4, 'dota2_ss_by_risq55-d6hh8qj.jpg', 'image/jpeg', '2018-03-07', '108639', 221),
(5, '04-M04-Aplicaciones seguras (1).pdf', 'application/pdf', '2018-03-07', '1391532', 221);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargoProyecto`
--

CREATE TABLE `cargoProyecto` (
  `idCargoProyecto` int(11) NOT NULL,
  `remuneracion` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cantidad` int(6) NOT NULL,
  `fkProyecto` int(11) NOT NULL,
  `fkCargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cargoProyecto`
--

INSERT INTO `cargoProyecto` (`idCargoProyecto`, `remuneracion`, `cantidad`, `fkProyecto`, `fkCargo`) VALUES
(2, '5000', 3, 16, 3),
(3, '3000', 3, 27, 2),
(4, '6000', 3, 27, 4),
(5, '100', 3, 28, 4),
(6, '500', 2, 30, 6),
(7, '200', 32, 29, 4),
(8, '70000', 3, 16, 1),
(9, '500000', 3, 16, 2),
(10, '50000', 4, 32, 3),
(11, '100000', 7, 32, 1),
(12, '200000', 4, 14, 1),
(13, '111', 3, 33, 3),
(14, '111', 2, 33, 6),
(15, '222', 5, 33, 1),
(16, '200000', 3, 34, 4),
(17, '3000000', 3, 34, 1),
(18, '6537388', 1, 34, 3),
(19, '1222211', 10, 35, 1),
(20, '15000', 7, 36, 1),
(21, '4544433', 5, 37, 1),
(22, '1323322', 3, 37, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `idCargo` int(11) NOT NULL,
  `cargo` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`idCargo`, `cargo`) VALUES
(1, 'SOLDADOR 2G'),
(2, 'SOLDADOR 6G'),
(3, 'PREVENCIONISTA'),
(4, 'Programador ctrlc ctrl v'),
(5, 'SOLDADOR MILG'),
(6, 'SOLDADOR 21MILG');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `idCiudad` int(11) NOT NULL,
  `nombreCiudad` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`idCiudad`, `nombreCiudad`) VALUES
(1, 'La Serena');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `idComentarios` int(11) NOT NULL,
  `comentario` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `fechaComentario` date NOT NULL,
  `fkTrabajador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`idComentarios`, `comentario`, `fechaComentario`, `fkTrabajador`) VALUES
(1, 'Buen trabajador\r\n', '2018-02-26', 122),
(2, 'Asiste a las reuniones', '2018-02-26', 124),
(3, 'Pajero', '2018-02-26', 124),
(19, 'Hermoso', '2018-03-02', 172),
(20, '1%', '2018-03-05', 122);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadoProyecto`
--

CREATE TABLE `estadoProyecto` (
  `idEstadoProyecto` int(11) NOT NULL,
  `estadoProyecto` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `estadoProyecto`
--

INSERT INTO `estadoProyecto` (`idEstadoProyecto`, `estadoProyecto`) VALUES
(1, 'En desarrollo'),
(2, 'Cancelado'),
(3, 'Finalizado'),
(4, 'Concluido'),
(5, 'Creado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadoSolicitud`
--

CREATE TABLE `estadoSolicitud` (
  `idestadoSolicitud` int(11) NOT NULL,
  `estadoSolicitud` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fcm_info`
--

CREATE TABLE `fcm_info` (
  `idToken` int(11) NOT NULL,
  `fcm_token` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `fktrabajador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fcm_info`
--

INSERT INTO `fcm_info` (`idToken`, `fcm_token`, `fktrabajador`) VALUES
(15, 'f6nyRaVA4bw:APA91bEd65mN0pquC2_Un5rLyvBo1eiOXYnX9M-UTosTDd7Rx5uTPbnVREQ8BuAx4OFL4U7_lReptWCMvV0jIj7mqqofNhCv6EKbQezOpPNyBD5LLiYT2C8d-10N91n3tThtkUE54rAF', 23),
(20, 'epD46zGWf6o:APA91bG10opFtL8ZuViqsKt_RZTfjrBY7Vz9u8t5k3HB7CwezNqMHt_OVi_SQqdJvk6LA5BbnlnkUr9mwmGLNLgFUz8Dw9sd0Lj90BnKrGrVxopIi2H3Ulx6nI08W7G-XdPKBKN5Xcu5', 46),
(29, 'dZ47tyH00rQ:APA91bHhReDND4EWhNf_IoDRDCJ63-wn9xkF7iAUl8PchWFGtptWEmjktqT5OjXtjPdX_Sbxg3EgESUKy8nDpAZHrnIGkDkcm9rVgc4FqO8pht9TCt9yPz5ksxxgtGdr2U3uWi7irLUO', 59),
(31, 'fVDZHc9jHEw:APA91bGcpZHHFhm_JPthHma4BfONbxrs3-SCddvkspV_NPUTO4Puw4QMkeLfzfCjCyYkj63rBHnScFR3XTnybTbmftYjdziBXf77Q3K01iZcc-7nmlnguE3fPp0jsrAioY5yzLcUKEan', 125),
(32, 'fYR-CaAMRFQ:APA91bGAvVGMCAKKmmqLOunnD6MH142UbURg6vUDux6HOxr8AxDdaTO0CCrGdS9za_gOJSXomDIs4YyEJCH2RqVe9FkJ7Dx_2zJgDo5NZ9UleT0ST6JRftJj3KK0nuZhez2RQX0G9yP1', 20),
(52, 'f15LlXMJzLs:APA91bH4vDmfjYO8bp0yyYkBQ-n7Na57aE7CjLSFMfpr5IwpSSDl_vv2i8wV1pxW9baGyFtG15oGWKmCHTqeDZmpQ50vBLuhekqff74zK98nv5pim51jNmwt2EpDI1K210XszLHpGslh', 2),
(55, 'dn_TnTp1Wrk:APA91bF3WjmAlXMzy5LUSzTfxXa1ut3cSZy2IuQvYaDakS_7A4IuhudZpJSgyctRJ0-_ngXGxKK0yPhq4r6YlYeOMyB8V9bOtCge0BG49YpOZQjd4ekwlTUDezAJhHfTB8fORjlL004g', 3),
(116, 'dp3mbH6ycFo:APA91bGrL5G6DFXtVtIJyzaMC_qXkYQ1I71ltk2hG-YyHpDbbiJI746hwnsJfM4O0p36a1PDRM5vKE73g9rlJUysd7TBcsaWJPM3xXdt2GlQIKGleO4nj5VKYR5_MtZFyF2G6UUfRHv8', 172),
(151, 'c4lRlPw35wo:APA91bF1rLhFXqbJH6fRQxEGVX6xdg3_8A2aWEX4W0d-MWgLNbRhadsos1nJvv12IcAPVS-i1Yfmj153yZWqHbyyGWzxC_BTpHnvpkm6b1LmVWkBaJxBTN6TtTqm1ZKBUB12TviEElBU', 1),
(155, 'cwsFIxwImjE:APA91bHRojmpjiBQR2eWX-d7Z8SAqxYpW3VEfeN3G8e7Aod_Fuh2YT5foH_HTpp5ZYZ-y1vHxpqQP7yrtnj8XxQPujYGNZq42uNi8NLQ_Pe4Vrzm1swL_WI4HXWZ6fyhNKmOJEE5Y5Jx', 124),
(215, 'dh6MPzj36E8:APA91bFNJcfjRCOfsyOclX3Ody_7X8arnQAMNx-TKmThyO_0Q-EIDXANHiR0qYThSDSp9QV8P0AHD6KNbWPwuczBAYs9H_hee2yD3TNqnq3rjbhMvikgZ2kEKXXhNPNGE0D40dihexTf', 173),
(224, 'eZNYTGfwxRY:APA91bGkrfpNiwinH5glN1u5w7w8hUiFtrZbAqeGG7sK1rKS-Ecit6W7Dc3BgeKgtm0n-COsWAoGiFj8F5f-lmtkGbLz4Q38lzSaI-yjZCWhes0UfYsLSyFPt0UGQCHXVBYR_-SxJc2W', 174),
(229, 'cYnNMc7yVLA:APA91bHwyX3IejsupRWMdBuByc4V01gDCbaa1yZdLNvu2DajF-fAogD_nKVNKAXbZDjefH2fw0LKp9NWdj6WtcxGiyWy7TLmqHT-CzW3ed0Uku3sMQIw4DzCR-SoyTU2PpzjiKkNr8pi', 184),
(237, 'eB7ThxrEh1M:APA91bFiRDuvINawn3UDbkff7w8uGga-72DvNVleK73SadWFQSvdCJsvwPKishGJ_a_bHJ-9KG4-LYI3QkE21GT7hdCu9TBhraUjzK9j-ZVCFptjF2igYXIyZ1B0IWbDscJCz9IiR3iF', 177),
(242, 'dR3FG_jtA4A:APA91bHwe11kekaSenMcIH6JBthL3W5M6Ujy00x75ecPXvpT-KWatMzRdGlTVsEFCZWdPISuWvH-lPlzMZYR4acXzkwAZqlT2ekTk8EWTdUrP5FPBN0aN1Lei7dEAxdCONeTkKgWnRER', 122),
(243, 'fAisddgXsIQ:APA91bFqFfoSkQTeupyFduKYrN9tUYpicU0D3Y3w1MOBmSv_50GKip9Wx9E7tjw_8YLDAzvL1twau3BAVkcKxn2DI3r89Vryuej3a6_ucjXK6Pm4uH_-J0FNsu9ZOh9hIVX0H3U88P11', 123),
(244, 'cjLKf869l48:APA91bEzKJtrdX_Pn9dH-6A5iQuZWIq0gGZ9A79ReZ25-8SqsM0lb0QXicC5PAHOhA9jYRJNiW0VvOkg78DmPaF0CyxAgQDNd0XivQq3IzTZQqyIHlJPJt9YXkG7zJr-8Uc20us_Q-bq', 121);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gerente`
--

CREATE TABLE `gerente` (
  `idgerente` int(11) NOT NULL,
  `nombreGerente` varchar(50) NOT NULL,
  `apellidoGerente` varchar(50) NOT NULL,
  `fkusuario` int(11) NOT NULL,
  `fkorganizacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `gerente`
--

INSERT INTO `gerente` (`idgerente`, `nombreGerente`, `apellidoGerente`, `fkusuario`, `fkorganizacion`) VALUES
(6, 'Gerente', 'Gerente', 221, 6),
(7, 'Ronaldinho', 'Gaucho', 229, 7),
(8, 'penkas', 'penkas', 241, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jefeproyecto`
--

CREATE TABLE `jefeproyecto` (
  `idjefeProyecto` int(11) NOT NULL,
  `nombreJefeP` varchar(50) NOT NULL,
  `apellidoJefeP` varchar(50) NOT NULL,
  `telefonoJefeP` varchar(15) NOT NULL,
  `fkusuario` int(11) NOT NULL,
  `fkorganizacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `jefeproyecto`
--

INSERT INTO `jefeproyecto` (`idjefeProyecto`, `nombreJefeP`, `apellidoJefeP`, `telefonoJefeP`, `fkusuario`, `fkorganizacion`) VALUES
(18, 'Manuel', 'Traslavi&ntildea', '  123456789', 172, 6),
(23, 'pancracio', 'de las petunias', '3211', 226, 6),
(24, 'Roberto Carlos', 'Da silva', '321', 230, 7),
(27, 'Ronaldo', 'De Asis', '4321', 233, 7),
(29, 'Roberto', 'Mamalluca', '21312312321', 235, 6),
(30, 'Leonardo', 'Farkas', '  111111111', 237, 6),
(31, 'Maria', 'guadalupe', '543', 239, 6),
(32, 'penka1', 'penka1', '123456789', 242, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nacionalidad`
--

CREATE TABLE `nacionalidad` (
  `idNacionalidad` int(11) NOT NULL,
  `nombreNacionalidad` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `nacionalidad`
--

INSERT INTO `nacionalidad` (`idNacionalidad`, `nombreNacionalidad`) VALUES
(1, 'Chileno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `organizacion`
--

CREATE TABLE `organizacion` (
  `idOrganizacion` int(11) NOT NULL,
  `RutOrganizacion` varchar(20) NOT NULL,
  `NombreOrganizacion` varchar(30) NOT NULL,
  `PaginaWebOrganizacion` varchar(30) NOT NULL,
  `CorreoOrganizacion` varchar(30) NOT NULL,
  `imgOrganizacion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `organizacion`
--

INSERT INTO `organizacion` (`idOrganizacion`, `RutOrganizacion`, `NombreOrganizacion`, `PaginaWebOrganizacion`, `CorreoOrganizacion`, `imgOrganizacion`) VALUES
(2, '123122563-3', 'Ingenieria Choapa', 'www.ingchoapa.cl', 'ingchoapa@gmail.com', ''),
(5, '1556669997', 'Inmobiliaria elqui', 'www.ielqui.cl', 'contacto@ielqui.cl', ''),
(6, '763761924', 'Teknova Limitada', 'teknova.cl', 'gerencia@teknova.cl', 'http://hireme.cl/AplicacionMovil/imagenes/teknova.jpg'),
(7, '', 'Miincorp', 'miincorp.cl', 'contacto@miincorp.cl', 'http://hireme.cl/AplicacionMovil/imagenes/empresa.jpg'),
(10, '10213215', 'penkas', 'www.penkas.cl', 'contacto@penkas.cl', 'http://hireme.cl/AplicacionMovil/imagenes/descarga.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE `proyecto` (
  `IdProyecto` int(11) NOT NULL,
  `NombreProyecto` varchar(250) NOT NULL,
  `DescripcionProyecto` varchar(250) NOT NULL,
  `FechaInicioProyecto` date NOT NULL,
  `FechaTerminoProyecto` date NOT NULL,
  `CantNecesaria` int(11) NOT NULL,
  `fkjefeproyecto` int(11) NOT NULL,
  `fkEstadoProyecto` int(11) NOT NULL,
  `fkOrganizacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`IdProyecto`, `NombreProyecto`, `DescripcionProyecto`, `FechaInicioProyecto`, `FechaTerminoProyecto`, `CantNecesaria`, `fkjefeproyecto`, `fkEstadoProyecto`, `fkOrganizacion`) VALUES
(13, 'ReparaciÃ³n Tope de Camiones Chancador 1 MLP', 'ReparaciÃ³n Estructural', '2018-02-14', '2018-02-16', 15, 18, 2, 6),
(14, 'Prueba Proyecto1', 'Prueba de funcionalidades HireMe', '2018-02-28', '2018-03-16', 90, 18, 4, 6),
(15, 'Prueba de funcionalidades 2', 'En este proyecto, se analizarÃ¡n distintas funcionalidades que permiten ejecutar los procesos de comunicaciÃ³n entre los jefes de proyectos y los especialistas.', '2018-02-26', '2018-03-31', 9, 18, 3, 6),
(16, 'Nuevo Proyecto', 'Nuevo proyecto para verificar el proceso de comunicaciÃ³n.', '2018-02-28', '2018-03-31', 22, 18, 1, 6),
(27, 'el mejor proyecto', 'hola1112', '2018-03-06', '2018-03-28', 11, 18, 3, 6),
(28, 'prueba borrame', 'asd', '2018-03-07', '2018-03-13', 32, 18, 5, 6),
(29, 'proyecto rancio', 'asadsads', '2018-03-02', '2018-03-03', 32, 27, 1, 7),
(30, 'Proyecto para pancracio', 'Pancracio <3', '2018-03-01', '2018-03-03', 32, 23, 1, 6),
(31, 'Copa del mundo', 'Final 1998', '2018-03-01', '2018-03-03', 23, 24, 4, 7),
(32, 'SeparaciÃ³n de porcentajes', 'Se separarÃ¡n los porcentajes', '2018-03-05', '2018-03-07', 10, 18, 3, 6),
(33, 'penkas', '>gerente', '2018-03-07', '2018-04-26', 5, 32, 4, 10),
(34, 'teknova', 'teknova', '2018-03-07', '2018-04-02', 10, 18, 1, 6),
(35, 'jesus', 'jesus is live', '2018-03-08', '2018-03-29', 10, 18, 1, 6),
(36, 'Proyecto prueba de seguimiento', 'Se hace el seguimiento al conducto regular del sistema', '2018-03-12', '2018-03-16', 7, 18, 1, 6),
(37, 'apagado', 'apagado', '2018-03-09', '2018-03-12', 10, 18, 3, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salud`
--

CREATE TABLE `salud` (
  `idSalud` int(11) NOT NULL,
  `nombreSalud` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `salud`
--

INSERT INTO `salud` (`idSalud`, `nombreSalud`) VALUES
(1, 'Consalud');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `idsolicitud` int(11) NOT NULL,
  `fechaSolicitud` date NOT NULL,
  `estadoSolicitud` int(11) NOT NULL,
  `leido` int(11) NOT NULL,
  `fechaRespuesta` datetime NOT NULL,
  `fkproyecto` int(11) NOT NULL,
  `fktrabajador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`idsolicitud`, `fechaSolicitud`, `estadoSolicitud`, `leido`, `fechaRespuesta`, `fkproyecto`, `fktrabajador`) VALUES
(11, '2018-02-15', 1, 1, '2018-03-16 10:32:38', 13, 7),
(16, '2018-02-15', 4, 1, '2018-03-16 10:32:38', 13, 23),
(17, '2018-02-15', 4, 1, '2018-03-16 10:32:38', 13, 20),
(18, '2018-02-15', 4, 1, '2018-03-16 10:32:38', 13, 59),
(24, '2018-02-15', 2, 1, '2018-03-16 10:32:38', 13, 125),
(25, '2018-02-15', 5, 1, '2018-03-16 10:32:38', 13, 46),
(39, '2018-02-19', 1, 1, '2018-03-16 10:32:38', 13, 126),
(40, '2018-02-19', 5, 1, '2018-03-16 10:32:38', 13, 128),
(45, '2018-02-20', 1, 1, '2018-03-16 10:32:38', 13, 142),
(51, '2018-02-21', 4, 1, '2018-03-16 10:32:38', 13, 123),
(71, '2018-02-22', 1, 1, '2018-03-16 10:32:38', 13, 122),
(74, '2018-02-22', 4, 1, '2018-03-16 10:32:38', 14, 174),
(75, '2018-02-22', 4, 1, '2018-03-16 10:32:38', 14, 175),
(78, '2018-02-22', 5, 1, '2018-03-16 10:32:38', 14, 172),
(79, '2018-02-22', 4, 1, '2018-03-16 10:32:38', 14, 173),
(104, '2018-02-25', 4, 1, '2018-03-16 10:32:38', 15, 121),
(105, '2018-02-25', 4, 1, '2018-03-16 10:32:38', 15, 121),
(106, '2018-02-25', 4, 1, '2018-03-16 10:32:38', 14, 121),
(107, '2018-02-25', 4, 1, '2018-03-16 10:32:38', 15, 121),
(108, '2018-02-25', 4, 1, '2018-03-16 10:32:38', 15, 121),
(114, '2018-02-26', 4, 1, '2018-03-16 10:32:38', 16, 173),
(123, '2018-02-26', 1, 1, '2018-03-09 23:06:57', 16, 122),
(124, '2018-02-27', 1, 1, '2018-03-16 10:32:38', 16, 2),
(126, '2018-02-27', 4, 1, '2018-03-16 10:32:38', 16, 177),
(128, '2018-02-27', 4, 1, '2018-03-16 10:32:38', 13, 122),
(129, '2018-02-27', 4, 1, '2018-03-16 10:32:38', 13, 121),
(133, '2018-02-28', 1, 1, '2018-03-16 10:32:38', 15, 1),
(134, '2018-03-01', 1, 1, '2018-03-16 10:32:38', 16, 1),
(136, '2018-03-01', 4, 1, '2018-03-16 10:32:38', 27, 123),
(143, '2018-03-01', 1, 1, '2018-03-16 10:32:38', 27, 20),
(153, '2018-03-01', 1, 1, '2018-03-16 10:32:38', 27, 6),
(154, '2018-03-01', 4, 1, '2018-03-16 10:32:38', 27, 7),
(157, '2018-03-01', 4, 1, '2018-03-16 10:32:38', 27, 177),
(158, '2018-03-01', 4, 1, '2018-03-16 10:32:38', 27, 122),
(164, '2018-03-01', 4, 1, '2018-03-16 10:32:38', 29, 177),
(172, '2018-03-01', 4, 1, '2018-03-16 10:32:38', 27, 124),
(173, '2018-03-01', 4, 1, '2018-03-16 10:32:38', 29, 122),
(174, '2018-03-01', 1, 1, '2018-03-16 10:32:38', 29, 180),
(175, '2018-03-01', 4, 1, '2018-03-16 10:32:38', 29, 124),
(176, '2018-03-01', 1, 1, '2018-03-16 10:32:38', 29, 172),
(178, '2018-03-01', 4, 1, '2018-03-16 10:32:38', 30, 177),
(179, '2018-03-01', 4, 1, '2018-03-16 10:32:38', 31, 47),
(180, '2018-03-04', 4, 1, '2018-03-16 10:32:38', 16, 123),
(181, '2018-03-04', 4, 1, '2018-03-16 10:32:38', 16, 180),
(182, '2018-03-04', 4, 1, '2018-03-16 10:32:38', 32, 122),
(183, '2018-03-04', 1, 1, '2018-03-16 10:32:38', 32, 172),
(184, '2018-03-04', 4, 1, '2018-03-16 10:32:38', 32, 123),
(185, '2018-03-04', 4, 1, '2018-03-16 10:32:38', 32, 177),
(186, '2018-03-04', 4, 1, '2018-03-16 10:32:38', 32, 124),
(187, '2018-03-05', 4, 1, '2018-03-16 10:32:38', 33, 180),
(188, '2018-03-05', 4, 1, '2018-03-16 10:32:38', 33, 122),
(189, '2018-03-05', 4, 1, '2018-03-16 10:32:38', 33, 177),
(190, '2018-03-05', 4, 1, '2018-03-16 10:32:38', 33, 123),
(191, '2018-03-05', 5, 1, '2018-03-16 10:32:38', 33, 124),
(193, '2018-03-06', 5, 1, '2018-03-16 10:32:38', 34, 122),
(194, '2018-03-06', 6, 1, '2018-03-16 10:32:38', 34, 173),
(195, '2018-03-06', 5, 1, '2018-03-16 10:32:38', 34, 121),
(196, '2018-03-06', 5, 1, '2018-03-16 10:32:38', 34, 177),
(197, '2018-03-06', 5, 1, '2018-03-16 10:32:38', 34, 180),
(198, '2018-03-07', 2, 1, '2018-03-16 10:32:38', 35, 180),
(206, '2018-03-07', 4, 1, '2018-03-16 10:32:38', 35, 123),
(207, '2018-03-07', 6, 1, '2018-03-16 10:32:38', 35, 122),
(208, '2018-03-08', 5, 1, '2018-03-16 10:32:38', 36, 123),
(209, '2018-03-08', 2, 1, '2018-03-16 10:32:38', 36, 173),
(210, '2018-03-08', 2, 1, '2018-03-16 10:32:38', 36, 122),
(211, '2018-03-08', 2, 1, '2018-03-16 10:32:38', 36, 124),
(212, '2018-03-08', 2, 1, '2018-03-16 10:32:38', 36, 174),
(213, '2018-03-08', 2, 1, '2018-03-16 10:32:38', 36, 177),
(214, '2018-03-08', 2, 1, '2018-03-16 10:32:38', 36, 121),
(215, '2018-03-08', 2, 1, '2018-03-16 10:32:38', 34, 174),
(217, '2018-03-08', 5, 1, '2018-03-16 10:32:38', 34, 123),
(223, '2018-03-08', 1, 1, '2018-03-16 10:32:38', 35, 177),
(224, '2018-03-08', 1, 1, '2018-03-16 10:32:38', 36, 184),
(225, '2018-03-08', 1, 1, '2018-03-16 10:32:38', 35, 185),
(226, '2018-03-08', 2, 1, '2018-03-16 10:32:38', 37, 183),
(228, '2018-03-09', 7, 1, '2018-03-16 10:32:38', 37, 122);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE `tipousuario` (
  `idtipousuario` int(11) NOT NULL,
  `tipousuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`idtipousuario`, `tipousuario`) VALUES
(1, 'jefeproyecto'),
(2, 'trabajador'),
(3, 'gerente'),
(4, 'admcontrato'),
(5, 'administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajador`
--

CREATE TABLE `trabajador` (
  `idTrabajador` int(11) NOT NULL,
  `nombreCompleto` varchar(50) NOT NULL,
  `fono` varchar(15) NOT NULL,
  `fkCargo` int(11) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `fkCiudad` int(11) NOT NULL,
  `venExamenMed` date NOT NULL,
  `venInd` date NOT NULL,
  `talla` varchar(4) NOT NULL,
  `bloqueo` date NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `fkNacionalidad` int(11) NOT NULL,
  `fkSalud` int(11) NOT NULL,
  `fkAfp` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `DisfechaInicio` date NOT NULL,
  `DisfechaTermino` date NOT NULL,
  `fkusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `trabajador`
--

INSERT INTO `trabajador` (`idTrabajador`, `nombreCompleto`, `fono`, `fkCargo`, `direccion`, `fkCiudad`, `venExamenMed`, `venInd`, `talla`, `bloqueo`, `fechaNacimiento`, `fkNacionalidad`, `fkSalud`, `fkAfp`, `foto`, `DisfechaInicio`, `DisfechaTermino`, `fkusuario`) VALUES
(1, 'MARCELO CARVAJAL GUERRA', '9-9426 0161', 1, 'Errazuriz # 625 huayacan ', 1, '2018-03-22', '2018-11-14', 'XL', '2015-04-08', '1990-07-10', 1, 1, 1, 'asd', '2018-03-14', '2018-03-29', 1),
(2, 'CRISTIAN CARVAJAL GUERRA', '9-7665 5598', 1, 'Errazuriz # 625 huayacan ', 1, '2017-12-30', '2018-11-14', 'XL', '2016-06-09', '1993-08-21', 1, 1, 1, 'asd', '1993-08-21', '2016-06-09', 2),
(3, 'JAVIER ROJO BUGUE?O', '9-9161 2691', 1, 'PSJE. LASTARRIA # 2745 ', 1, '2018-01-06', '2019-02-09', 'XL', '2017-11-13', '1991-04-04', 1, 1, 1, 'asd', '1991-04-04', '2017-11-13', 3),
(4, 'CRISTOFER MU?OZ MARAMBIO', '9-56465595', 1, 'Antonio varas # 450 ', 1, '2018-08-30', '2018-06-09', 'XXL', '2017-11-13', '1986-04-15', 1, 1, 1, 'asd', '1986-04-15', '2017-11-13', 4),
(5, 'VICENTE PIZARRO PIZARRO', '9-57414907', 1, 'La Pampilla # 24', 1, '2018-10-28', '2019-03-13', 'XL', '2017-11-13', '1989-05-21', 1, 1, 1, 'asd', '1989-05-21', '2017-11-13', 5),
(6, 'LUIS CORTEZ SANTANDER', '9-58995879', 1, 'Psje. La ligua # 165 Tierra Blanca', 1, '2018-03-22', '2019-11-13', 'XXL', '2017-11-13', '1973-09-12', 1, 1, 1, 'http://hireme.cl/AplicacionMovil/imagenes/6.jpg', '1973-09-12', '2017-11-13', 6),
(7, 'FERNANDO ROJAS INOSTROZA', '9-76533288', 1, 'Avenida los clarines # 3131 ', 1, '2018-07-21', '2018-10-11', 'XL', '2017-11-13', '1990-02-09', 1, 1, 1, 'asd', '1990-02-09', '2017-11-13', 7),
(8, 'RICARDO ZAMBRA MENESES', '9-53746945', 1, 'Poniente 1826', 1, '2018-07-14', '2018-11-13', 'XL', '2017-11-13', '1987-01-11', 1, 1, 1, 'asd', '1987-01-11', '2017-11-13', 8),
(9, 'MARCELO PAEZ POBLETE', '9-978738907', 1, 'Nuevo trece # 1591', 1, '2018-03-24', '2019-10-30', 'XL', '2017-11-13', '1985-02-11', 1, 1, 1, 'asd', '1985-02-11', '2017-11-13', 9),
(10, 'ALEXIS ALVAREZ MONTESINOS', '9-82647250', 1, 'Volcan Puntiagudo # 2781', 1, '2017-11-21', '2018-11-14', 'XL', '2017-11-13', '1988-12-17', 1, 1, 1, 'asd', '1988-12-17', '2017-11-13', 10),
(11, 'JUAN CORTES OSSANDON', '9-7653 0649', 1, 'Avda. Francisco de Aguirre #075', 1, '2018-03-31', '2018-02-24', '', '2016-02-24', '1986-01-15', 1, 1, 1, 'asd', '1986-01-15', '2016-02-24', 11),
(12, 'ANIBAL ASTUDILLO ASTUDILLO', '9-3282 9145', 1, 'Simon Bolivar % 14', 1, '2020-05-19', '2019-06-13', '', '2017-11-06', '1983-09-30', 1, 1, 1, 'asd', '1983-09-30', '2017-11-06', 12),
(13, 'CRISTIAN JOFRE COVARRUBIAS', '9-8576 2111', 1, 'Los Canelos #353 Pob. Juan 23 La Antena', 1, '2019-08-19', '2019-11-13', 'XL', '2017-11-13', '1980-09-12', 1, 1, 1, 'asd', '2018-02-01', '2018-02-08', 13),
(14, 'GABRIEL MULET ZARATE', '9-9351 8816', 1, 'Colon # 450', 1, '2018-02-20', '2019-01-05', 'XL', '2017-11-06', '1966-01-14', 1, 1, 1, 'asd', '1966-01-14', '2017-11-06', 14),
(15, 'LUIS OSSANDON TAPIA', '9-9072 6440', 1, 'Poblacion 10 Casa 14 ', 1, '2018-01-27', '2019-02-13', 'XL', '2017-11-13', '1976-03-15', 1, 1, 1, 'asd', '1976-03-15', '2017-11-13', 15),
(16, 'CARLOS VILLENA GALLARDO', '9-7967 7336', 1, 'Ohiggins 330', 1, '2018-08-25', '2018-02-25', '', '2016-09-06', '1985-12-18', 1, 1, 1, 'asd', '1985-12-18', '2016-09-06', 16),
(17, 'PATRICIO ROJAS HERRERA', '9-6204 4151', 1, 'Tagna # 1830 benostar ', 1, '2017-04-25', '2017-04-06', '', '2015-11-19', '1966-02-06', 1, 1, 1, 'asd', '1966-02-06', '2015-11-19', 17),
(18, 'CARLOS SALINAS JORQUERA', '9-7485 8579', 1, 'Jose Antonio Carvajal # 736 ', 1, '2017-03-17', '2019-02-20', '', '2015-11-19', '1975-09-13', 1, 1, 1, 'asd', '1975-09-13', '2015-11-19', 18),
(19, 'JUAN VALDES ALARCON', '9-8256 5290', 1, 'El Magnolio # 1224 Villa Los Naranjos', 1, '2018-01-10', '2019-11-13', '', '2017-11-06', '1968-10-19', 1, 1, 1, 'asd', '1968-10-19', '2017-11-06', 19),
(20, 'CLAUDIO GOMEZ ZAMORANO', '9-9344 6504', 1, 'Parcelacion San Ignacio, Parcela 5 ', 1, '2018-03-21', '2018-05-24', '', '2017-11-13', '1986-03-23', 1, 1, 1, 'asd', '2018-02-01', '2018-02-08', 20),
(21, 'LUIS FELIPE SIAS SIAS', '9-7891 9156', 1, '3 Oriente 44, Pob, el Esfuerzo ', 1, '2018-03-17', '2018-01-18', '', '2017-07-02', '0000-00-00', 1, 1, 1, 'asd', '0000-00-00', '2017-07-02', 21),
(22, 'LUIS ARAYA TABILO', '', 1, 'Bulnes Psje los sauces', 1, '2017-12-23', '2019-06-25', '', '2016-11-22', '1978-10-11', 1, 1, 1, 'asd', '1978-10-11', '2016-11-22', 22),
(23, 'YESENIA RIVEROS MOLINA', '', 1, 'Villa el Bosque, Psje.Los Avellanos N? 52 P.14', 1, '2018-02-07', '2018-06-26', '', '2017-02-12', '1986-04-21', 1, 1, 1, 'asd', '2018-02-01', '2018-02-08', 23),
(24, 'MAIRON MALLA MALLA', '9-5320 1586', 1, 'Argando?a # 801 ', 1, '2018-04-13', '2019-04-20', '', '2015-05-04', '1986-06-24', 1, 1, 1, 'asd', '1986-06-24', '2015-05-04', 24),
(25, 'STEFANO VALENCIA ALVAREZ', '9-5782 9694', 1, 'Argando?a # 801 ', 1, '2015-10-11', '2019-04-20', '', '2015-05-04', '1995-12-08', 1, 1, 1, 'asd', '1995-12-08', '2015-05-04', 25),
(26, 'ALEXIS ROJAS ARGANDO?A', '9-9618 3712', 1, 'Diego Portales # 991', 1, '2016-12-13', '2018-05-19', '', '0000-00-00', '1984-02-01', 1, 1, 1, 'asd', '1984-02-01', '0000-00-00', 26),
(27, 'DARWIN ROJAS ARGANDO?A', '9- 7828 9319', 1, 'Alvarez perez # 2067', 1, '2015-11-30', '2017-01-22', '', '0000-00-00', '1991-07-07', 1, 1, 1, 'asd', '1991-07-07', '0000-00-00', 27),
(28, 'SEBASTIAN ROJAS ROJAS', '9-4488 1249', 1, 'Santa Filomena # 63', 1, '2016-03-02', '2017-04-23', '', '2016-02-24', '1990-09-03', 1, 1, 1, 'asd', '1990-09-03', '2016-02-24', 28),
(29, 'DIEGO ORREGO CORTEZ', '9-7274 8419', 1, 'Puntilla Norte # 1420', 1, '0000-00-00', '0000-00-00', '', '0000-00-00', '1993-05-02', 1, 1, 1, 'asd', '1993-05-02', '0000-00-00', 29),
(30, 'DENIS ROZAS ROZAS', '9- 8466 0006', 1, 'Calle Brasil # 414 ', 1, '2018-10-03', '2018-04-20', 'M', '2016-04-20', '1986-06-26', 1, 1, 1, 'asd', '1986-06-26', '2016-04-20', 30),
(31, 'FERNANDO SALAS MATURANA', '9-6563 8690', 1, 'Calle Principal # 14', 1, '2018-03-31', '2017-06-09', 'XXL', '2016-02-17', '1992-11-28', 1, 1, 1, 'asd', '1992-11-28', '2016-02-17', 31),
(32, 'ALEXIS ALBORNOZ SAEZ', '9-8953 2999', 1, 'Ignacio Carrera Pinto # 31 Pob el Esfuerzo', 1, '2016-06-18', '2017-06-25', '', '2016-01-06', '1985-10-25', 1, 1, 1, 'asd', '1985-10-25', '2016-01-06', 32),
(33, 'LUIS EMILIO MONTECINOS YA?EZ', '9-7588 7620', 1, 'Psje. Vado Azul # 2283', 1, '0000-00-00', '0000-00-00', 'XL', '0000-00-00', '0000-00-00', 1, 1, 1, 'asd', '0000-00-00', '0000-00-00', 33),
(34, 'MICHAEL MANCILLA MU?OZ', '9-33346145', 1, 'Psje. 65 N? 6773', 1, '0000-00-00', '0000-00-00', '', '0000-00-00', '1980-05-05', 1, 1, 1, 'asd', '1980-05-05', '0000-00-00', 34),
(35, 'NELSON ORELLANA MUENA', '9-7374 5960', 1, 'Consule S/N', 1, '2019-11-04', '2018-05-12', 'XL', '2017-03-06', '1980-09-05', 1, 1, 1, 'asd', '1980-09-05', '2017-03-06', 35),
(36, 'LEONIDAS SALINAS TAPIA', '9-8225 2948', 1, 'Tahuinco Parcela 50', 1, '2018-06-23', '2015-01-07', 'L', '2017-07-02', '1979-06-28', 1, 1, 1, 'asd', '1979-06-28', '2017-07-02', 36),
(37, 'ISMAEL ISAAC CORTES GONZALEZ', '9-7520 8263', 1, 'PORTALES # 670', 1, '2018-04-18', '2018-02-25', 'L', '2016-02-25', '1967-05-29', 1, 1, 1, 'asd', '1967-05-29', '2016-02-25', 37),
(38, 'VICTOR BARRAZA GUERRA', '9-56052149', 1, 'Tahuinco Casa n? 2', 1, '2017-11-23', '2018-02-24', 'XL', '2016-02-24', '1991-06-09', 1, 1, 1, 'asd', '1991-06-09', '2016-02-24', 38),
(39, 'WALDO VILCHES ANDRADE', '9-6633 7399', 1, 'MAR Adriatico # 1373', 1, '0000-00-00', '0000-00-00', 'XXL', '0000-00-00', '1971-05-29', 1, 1, 1, 'asd', '1971-05-29', '0000-00-00', 39),
(40, 'JOSE PIZARRO ALAMOS', '9-98349390', 1, 'El Tambo s/n', 1, '2017-11-23', '0000-00-00', 'L', '2017-09-24', '1968-11-02', 1, 1, 1, 'asd', '1968-11-02', '2017-09-24', 40),
(41, 'ANACLETO GARCIA AREVALO', '', 1, 'Maturana #1256 Stgo Centro', 1, '2014-09-09', '0000-00-00', 'XL', '0000-00-00', '1961-01-02', 1, 1, 1, 'asd', '1961-01-02', '0000-00-00', 41),
(42, 'CAMILO GALINDO AHUMADA', '9-7896 4502', 1, 'Avenida Belloto # 1205 Casa B 4', 1, '2018-07-17', '2015-01-04', 'XL', '2016-02-24', '1981-10-03', 1, 1, 1, 'asd', '1981-10-03', '2016-02-24', 42),
(43, 'GABRIEL CHAPARRO IBACACGE ', '9- 8283 4806', 1, 'Camisa peladero S/n', 1, '2018-04-01', '2018-02-16', 'XL', '2016-02-05', '1984-08-02', 1, 1, 1, 'asd', '1984-08-02', '2016-02-05', 43),
(44, 'JOEL RIVEROS COLLAO', '9-8731 4482', 1, 'Consuelo Norte S/N', 1, '2019-09-28', '2019-09-28', 'L', '0000-00-00', '1976-06-19', 1, 1, 1, 'asd', '1976-06-19', '0000-00-00', 44),
(45, 'HORACIO AYALA NEIRA', '9-57246552', 1, '2 Oriente con Reina Mar Edif. Pacifico  Depto 303', 1, '0000-00-00', '0000-00-00', 'L', '0000-00-00', '1986-05-27', 1, 1, 1, 'asd', '1986-05-27', '0000-00-00', 45),
(46, 'SEGUNDO FREDES FLORES\n\n', '9-5230 1653', 1, 'VILLA EMPART PASAJE MAULE CASA 61', 1, '2018-03-23', '2019-03-02', '', '2017-03-06', '1985-09-28', 1, 1, 1, 'http://hireme.cl/AplicacionMovil/imagenes/46.jpg', '1985-09-28', '2017-03-06', 46),
(47, 'JUAN FREDES RIVEROS', '9-9717 5987', 1, 'Pobl.Manuel Rodriguez, Alesandri #478', 1, '2018-02-11', '2019-03-02', '', '2017-03-06', '1968-02-04', 1, 1, 1, 'asd', '1968-02-04', '2017-03-06', 47),
(48, 'RODRIGO GUZMAN INOSTROZA', '9-9476 0080', 1, 'Quinta las encinas # 156 ', 1, '2018-06-08', '2019-03-08', 'L', '2016-01-06', '1975-04-29', 1, 1, 1, 'asd', '1975-04-29', '2016-01-06', 48),
(49, 'LUIS GUERRERO SANCHEZ', '', 1, 'Pob. Claudia Raul Calle Itata 01003', 1, '2016-11-24', '0000-00-00', 'XXL', '2016-02-25', '0000-00-00', 1, 1, 1, 'asd', '0000-00-00', '2016-02-25', 49),
(50, 'ALEJANDRO ARAYA MOLINA', '9-7995 3654', 1, 'Papadono # 3184 La Nueva Cantera ', 1, '2018-02-21', '2019-03-02', 'XXL', '2017-03-02', '1983-06-25', 1, 1, 1, 'asd', '1983-06-25', '2017-03-02', 50),
(51, 'LUIS GONZALEZ HOYOS', '9-8192 9863', 1, 'Juana de salamanca # 83 Sector Llano ', 1, '2013-11-29', '2019-02-09', 'XL', '2017-02-09', '1993-02-14', 1, 1, 1, 'asd', '1993-02-14', '2017-02-09', 51),
(52, 'JOSE ARAYA HENRIQUEZ', '9-5988 6274', 1, 'Guillermo Portales # 115', 1, '2018-01-26', '2018-02-24', 'L', '2017-07-02', '1974-01-18', 1, 1, 1, 'asd', '1974-01-18', '2017-07-02', 52),
(53, 'LORENZO ARACENA CORDOVA', '9-4277 9369', 1, 'Sergio Montecinos # 2368', 1, '2016-03-17', '2018-02-16', '', '0000-00-00', '1966-10-19', 1, 1, 1, 'asd', '1966-10-19', '0000-00-00', 53),
(54, 'ROBERTO AVALOS ZUAREZ', '9-9565 3030', 1, 'Villa el Mirador # 02 Colliguay', 1, '2018-05-16', '2019-11-14', '', '0000-00-00', '1981-05-29', 1, 1, 1, 'asd', '1981-05-29', '0000-00-00', 54),
(55, 'ENSON  RUIZ FLORES', '', 1, 'Los Pimientos 215 Sinderpar', 1, '2018-03-16', '2019-07-18', 'XL', '2017-07-19', '1984-11-07', 1, 1, 1, 'asd', '1984-11-07', '2017-07-19', 55),
(56, 'JONATHAN ALBORNOZ CONTRERAS', '9-66161151', 1, 'Calle ViÃ±a del Mar 2676', 1, '0000-00-00', '0000-00-00', 'XL', '0000-00-00', '1984-12-06', 1, 1, 1, 'asd', '1984-12-06', '0000-00-00', 56),
(57, 'JUAN HERRERA GONZALEZ', '9-4488 4924', 1, 'Las pircas # 1714 Villa el Romero', 1, '2018-11-02', '2018-11-03', 'L', '2016-11-03', '1988-07-29', 1, 1, 1, 'asd', '1988-07-29', '2016-11-03', 57),
(58, 'EMILIO TAPIA', '9-53328181', 1, '', 1, '0000-00-00', '0000-00-00', '', '0000-00-00', '0000-00-00', 1, 1, 1, 'asd', '0000-00-00', '0000-00-00', 58),
(59, 'CRISTIAN RIVEROS MOLINA', '', 1, 'Las palmera 53 La florida', 1, '0000-00-00', '2018-07-21', 'XL', '2016-07-14', '1983-03-03', 1, 1, 1, 'asd', '2018-02-04', '2018-02-06', 59),
(60, 'AMADIEL IBACACHE VASQUEZ', '9-7375 5837', 1, 'Pob. El arrayan Calle Miyarai n? 16 Camisas', 1, '0000-00-00', '2019-06-01', 'XL', '2017-09-03', '1994-08-08', 1, 1, 1, 'asd', '1994-08-08', '2017-09-03', 60),
(61, 'HECTOR GONZALEZ FIGUEROA', '9-78840440', 1, 'Manuel Rodriguez 1245 Casa N? 6', 1, '2018-04-03', '2019-04-04', 'XL', '0000-00-00', '1977-11-29', 1, 1, 1, 'asd', '1977-11-29', '0000-00-00', 61),
(121, 'LUIS TAPIA LIBERÃ“N', '90365267', 1, 'talinay 1532', 1, '2019-05-17', '2018-05-11', 'L', '2018-04-20', '1995-11-18', 1, 1, 1, 'http://hireme.cl/AplicacionMovil/imagenes/121.jpg', '2018-04-06', '2018-05-19', 173),
(122, 'CRISTIAN QUEZADA FUENTES', '85852532', 1, 'parque nacional lauca #1648', 1, '2018-04-08', '2018-07-29', 'M', '2018-07-22', '1991-05-17', 1, 1, 1, 'http://hireme.cl/AplicacionMovil/imagenes/122.jpg', '2018-03-09', '2018-03-09', 174),
(123, 'SEBASTIAN ALANIZ ASTORGA', '965285475', 1, 'juan Pablo i #868', 1, '2018-05-18', '2018-04-13', 'XL', '2018-04-20', '1994-04-08', 1, 1, 1, 'http://hireme.cl/AplicacionMovil/imagenes/123.jpg', '2018-03-09', '2018-03-16', 175),
(124, 'JOAQUIN ROBLES ARAVENA', '94249389', 1, 'Ernesto Molina ', 1, '2018-05-16', '2018-05-16', 'L', '2018-05-16', '1994-02-15', 1, 1, 1, 'http://hireme.cl/AplicacionMovil/imagenes/124.jpg', '2018-03-05', '2018-03-07', 176),
(125, 'LUIS ALBERTO RODRIGUEZ ALARCOM', '982581769', 1, 'los lirios #400', 1, '2018-02-15', '2018-02-15', 'XL', '2018-02-15', '1993-02-09', 1, 1, 1, 'http://hireme.cl/AplicacionMovil/imagenes/125.jpg', '2018-02-01', '2018-02-08', 177),
(126, 'GSHS GZGZ GZHZ', '54348427', 1, 'hsus', 1, '2018-02-15', '2018-02-15', 'M', '2018-02-15', '2018-02-16', 1, 1, 1, '', '0000-00-00', '0000-00-00', 178),
(127, 'PATRICIO FERNANDO TORRES RODRIGUEZ       ', '975120018', 1, 'Lagar 1645 DoÃ±a Gabriela                      \n c', 1, '2018-02-19', '2018-02-19', 'XL', '2018-02-19', '1967-02-19', 1, 1, 1, 'http://hireme.cl/AplicacionMovil/imagenes/127.jpg', '0000-00-00', '0000-00-00', 179),
(128, 'GABRIEL DIAZ CAMPUSANO', '133', 2, 'mi casa', 1, '2018-02-19', '2018-02-19', 'L', '2018-02-19', '2018-02-19', 1, 1, 1, '', '2018-01-10', '2018-02-13', 182),
(142, 'Jacinto', 'Mercedes', 4, 'La Pampilla # 24', 1, '2020-03-07', '2019-03-07', 'XXL', '2022-03-07', '0000-00-00', 1, 1, 1, 'http://hireme.cl/AplicacionMovil/imagenes/142.jpg', '0000-00-00', '0000-00-00', 188),
(170, 'HHH HH HHHY', '555', 1, 'rgg', 1, '2018-02-21', '2018-02-21', 'XL', '2018-02-21', '2018-02-21', 1, 1, 1, '', '0000-00-00', '0000-00-00', 196),
(171, 'IGNACIO ARAVENA ROBLES', '942494389', 1, 'Ernesto Molina 1461', 1, '2018-11-22', '2019-01-18', 'L', '2019-01-18', '2018-02-22', 1, 1, 1, '', '2018-02-01', '2018-02-10', 200),
(172, 'GERARD CASTILLO VILLALOBOS', '254951', 1, 'diego muller 4494', 1, '2018-02-22', '2018-02-22', 'XL', '2018-02-22', '2018-02-22', 1, 1, 1, '', '2018-01-20', '2018-01-21', 204),
(173, 'CARLOS LUCO MONTOFRE', '91732750', 1, 'las fardellas', 1, '2018-03-22', '2018-02-27', 'M', '2018-03-22', '2002-01-26', 1, 1, 1, 'http://hireme.cl/AplicacionMovil/imagenes/173.jpg', '2018-03-06', '2018-03-06', 203),
(174, 'ANDRES HÃ‰CTOR  QUINTERO ', '968632709', 1, 'ensenada el panul  390 ', 1, '2018-02-22', '2018-02-22', 'L', '2018-02-22', '2018-02-22', 1, 1, 1, 'http://hireme.cl/AplicacionMovil/imagenes/174.jpg', '2018-03-04', '2018-03-06', 206),
(175, 'BRUCE EMMANUEL VILLAGRA SAAVEDRA', '93522181', 1, 'serrano1142', 1, '2018-02-22', '2018-02-22', 'XL', '2018-02-22', '2018-02-22', 1, 1, 1, '', '0000-00-00', '0000-00-00', 205),
(176, 'GGGG HHH HH', '2588', 1, 'jjj', 1, '2018-02-23', '2018-02-23', 'L', '2018-02-23', '2018-02-23', 1, 1, 1, '', '0000-00-00', '0000-00-00', 207),
(177, 'MATEO CANIHUANTE CONTADOR', '133', 1, 'mi casa', 1, '2022-02-26', '2019-02-26', 'XL', '2019-02-26', '1994-04-26', 1, 1, 1, 'http://hireme.cl/AplicacionMovil/imagenes/177.jpg', '2018-05-18', '2018-06-06', 194),
(179, 'UUU JJ JJ', '65489', 3, 'jjjk', 1, '2018-03-01', '2018-03-01', 'L', '2018-03-01', '2018-03-01', 1, 1, 1, '', '0000-00-00', '0000-00-00', 224),
(180, 'MICHAEL JORDAN GARNETT', '872484247', 1, 'nose', 1, '2018-05-25', '2018-07-27', 'L', '2018-04-13', '2018-03-01', 1, 1, 1, '', '2018-03-07', '2018-04-02', 225),
(181, 'ROSO ROSO ROSO', '454949497', 2, 'lauca', 1, '2018-03-05', '2018-03-05', 'L', '2018-03-05', '2018-03-05', 1, 1, 1, '', '2018-03-05', '2018-03-05', 244),
(182, 'JAIME BARRAZA MENJUNDIA', '771', 4, 'por ahi', 1, '2018-03-07', '2018-03-07', 'XL', '2018-03-07', '2018-03-07', 1, 1, 1, '', '2018-03-07', '2018-03-07', 187),
(183, 'PRUEBA6 PROBANDO ROANDO', '69521789', 3, 'geronimo 123', 1, '2018-03-08', '2018-06-24', 'M', '2018-03-08', '2018-03-08', 1, 1, 1, 'http://hireme.cl/AplicacionMovil/imagenes/183.jpg', '2018-06-09', '2018-08-18', 245),
(184, 'KEN EXTREME PEPSI', '25464312', 1, 'no tengo', 1, '2018-07-27', '2018-06-01', 'L', '2018-07-28', '2018-03-08', 1, 1, 1, 'http://hireme.cl/AplicacionMovil/imagenes/184.jpg', '2018-04-27', '2018-04-29', 246),
(185, 'CRISTIANA ALANIZA ROBLESA', '12345698', 1, 'rd', 1, '2018-03-08', '2018-03-08', 'XL', '2018-03-08', '2018-03-08', 1, 1, 1, '', '2018-03-08', '2018-03-08', 247);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `rut` varchar(50) CHARACTER SET latin1 NOT NULL,
  `password` varchar(50) CHARACTER SET latin1 NOT NULL,
  `fktipousuario` int(11) NOT NULL,
  `estadoUsuario` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `rut`, `password`, `fktipousuario`, `estadoUsuario`) VALUES
(1, '174533040', '1234', 2, 'LISTO'),
(2, '183887688', '1234', 2, 'LISTO'),
(3, '176268743', '1234', 2, 'LISTO'),
(4, '163072858', '1234', 2, 'LISTO'),
(5, '172757863', '1234', 2, 'LISTO'),
(6, '101125890', '1234', 2, 'LISTO'),
(7, '175151206', '1234', 2, 'HABILITADO'),
(8, '164384098', '1234', 2, 'HABILITADO'),
(9, '158858886', '1234', 2, 'HABILITADO'),
(10, '169035016', '1234', 2, 'HABILITADO'),
(11, '163134160', '1234', 2, 'HABILITADO'),
(12, '150474132', '1234', 2, 'HABILITADO'),
(13, '138759946', '1234', 2, 'HABILITADO'),
(14, '92617246', '1234', 2, 'HABILITADO'),
(15, '129465387', '1234', 2, 'HABILITADO'),
(16, '16299543K', '1234', 2, 'HABILITADO'),
(17, '105694814', '1234', 2, 'HABILITADO'),
(18, '128246797', '1234', 2, 'HABILITADO'),
(19, '102268520', '1234', 2, 'HABILITADO'),
(20, '162086332', '1234', 2, 'HABILITADO'),
(21, '17965783K', '1234', 2, 'HABILITADO'),
(22, '133607277', '1234', 2, 'HABILITADO'),
(23, '162891359', '1234', 2, 'HABILITADO'),
(24, '163137372', '1234', 2, 'HABILITADO'),
(25, '192958849', '1234', 2, 'HABILITADO'),
(26, '157849352', '1234', 2, 'HABILITADO'),
(27, '179687747', '1234', 2, 'HABILITADO'),
(28, '176289570', '1234', 2, 'HABILITADO'),
(29, '150499402', '1234', 2, 'HABILITADO'),
(30, '163137682', '1234', 2, 'HABILITADO'),
(31, '179689944', '1234', 2, 'HABILITADO'),
(32, '162996002', '1234', 2, 'HABILITADO'),
(33, '120309110', '1234', 2, 'HABILITADO'),
(34, '139421108', '1234', 2, 'HABILITADO'),
(35, '138713628', '1234', 2, 'HABILITADO'),
(36, '135379085', '1234', 2, 'HABILITADO'),
(37, '98137661', '1234', 2, 'HABILITADO'),
(38, '179655292', '1234', 2, 'HABILITADO'),
(39, '12046096K', '1234', 2, 'HABILITADO'),
(40, '142343460', '1234', 2, 'HABILITADO'),
(41, '9198184K', '1234', 2, 'HABILITADO'),
(42, '139888758', '1234', 2, 'HABILITADO'),
(43, '150478243', '1234', 2, 'HABILITADO'),
(44, '10370491K', '1234', 2, 'HABILITADO'),
(45, '162597906', '1234', 2, 'HABILITADO'),
(46, '162874853', '1234', 2, 'HABILITADO'),
(47, '109381241', '1234', 2, 'HABILITADO'),
(48, '143729699', '1234', 2, 'HABILITADO'),
(49, '137187647', '1234', 2, 'HABILITADO'),
(50, '156106577', '1234', 2, 'HABILITADO'),
(51, '183842056', '1234', 2, 'HABILITADO'),
(52, '125978835', '1234', 2, 'HABILITADO'),
(53, '96998511', '1234', 2, 'HABILITADO'),
(54, '139780965', '1234', 2, 'HABILITADO'),
(55, '159130770', '1234', 2, 'HABILITADO'),
(56, '159090205', '1234', 2, 'HABILITADO'),
(57, '168522398', '1234', 2, 'HABILITADO'),
(58, '', '1234', 2, 'HABILITADO'),
(59, '165389050', '1234', 2, 'HABILITADO'),
(60, '185617599', '1234', 2, 'HABILITADO'),
(61, '131857454', '1234', 2, 'HABILITADO'),
(172, '158855402', '1234', 1, '0'),
(173, '19295813k', '1234', 2, 'LISTO'),
(174, '177317578', 'xxx', 2, 'LISTO'),
(175, '187573602', '1234', 2, 'LISTO'),
(176, '185025497', '1234', 2, 'LISTO'),
(177, '183172387', '1234', 2, 'HABILITADO'),
(179, '101900088', '1234', 2, 'HABILITADO'),
(181, '187575362', '1234', 4, 'LISTO'),
(182, '184946149', '1234', 2, 'HABILITADO'),
(183, '156214671', '1234', 2, 'HABILITADO'),
(184, '161198617', '1234', 2, 'HABILITADO'),
(185, '8987334-7', '1234', 2, 'HABILITADO'),
(186, '233842621', '1234', 2, 'HABILITADO'),
(187, '468197812', '1234', 2, 'LISTO'),
(188, '775111348', '1234', 2, 'LISTO'),
(190, '223294235', '1234', 2, 'HABILITADO'),
(191, '574228670', '1234', 2, 'LISTO'),
(192, '877717216', '1234', 2, 'LISTO'),
(194, '116686880', '1234', 2, 'LISTO'),
(195, '952955438', '1234', 2, 'LISTO'),
(196, '89873347', '1234', 2, 'LISTO'),
(199, '383268265', '1234', 1, 'HABILITADO'),
(200, '152330383', '1234', 2, 'LISTO'),
(203, '91732750', 'luco', 2, 'LISTO'),
(204, '718888549', '1234', 2, 'LISTO'),
(205, '161340812', '1234', 2, 'LISTO'),
(206, '244074278', '1234', 2, 'LISTO'),
(207, '180925120', '1234', 2, 'LISTO'),
(208, '190260607', '1234', 5, 'LISTO'),
(214, '18650061K', '1234', 1, 'HABILITADO'),
(217, '141641409', '1234', 1, 'HABILITADO'),
(219, '100622505', '1234', 1, 'HABILITADO'),
(220, '116616041', '1234', 1, 'HABILITADO'),
(221, '142463881', '1234', 3, 'LISTO'),
(224, '154358242', '1234', 2, 'LISTO'),
(225, '156466158', '1234', 2, 'LISTO'),
(226, '861307433', '1234', 1, 'HABILITADO'),
(228, '381158470', '3811', 2, 'HABILITADO'),
(229, '172762913', '1234', 4, 'LISTO'),
(230, '89830354', 'S56cOe', 1, 'HABILITADO'),
(233, '204114757', 'E9Z8Ok', 1, 'HABILITADO'),
(235, '44040395', 'Sv5kxw', 1, 'HABILITADO'),
(237, '184652978', 'eU1Uey', 1, 'HABILITADO'),
(239, '183362615', '6dYuUQ', 1, 'HABILITADO'),
(241, '114123005', '1234', 3, 'LISTO'),
(242, '209903318', 'jLwTpf', 1, 'HABILITADO'),
(243, '164390411', 't6lgH2', 4, 'LISTO'),
(244, '22949838K', '1234', 2, 'LISTO'),
(245, '51241223', '5124', 2, 'LISTO'),
(246, '58700770', '5870', 2, 'LISTO'),
(247, '689989780', '6899', 2, 'LISTO');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admcontrato`
--
ALTER TABLE `admcontrato`
  ADD PRIMARY KEY (`idAdm`),
  ADD KEY `fkusuario` (`fkusuario`),
  ADD KEY `fkorganizacion` (`fkorganizacion`);

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`idAdmin`),
  ADD KEY `fkusuario` (`fkusuario`);

--
-- Indices de la tabla `afp`
--
ALTER TABLE `afp`
  ADD PRIMARY KEY (`idAfp`);

--
-- Indices de la tabla `archivo`
--
ALTER TABLE `archivo`
  ADD PRIMARY KEY (`idArchivo`),
  ADD KEY `fkusers` (`fkusuario`);

--
-- Indices de la tabla `cargoProyecto`
--
ALTER TABLE `cargoProyecto`
  ADD PRIMARY KEY (`idCargoProyecto`),
  ADD KEY `fkProyecto` (`fkProyecto`),
  ADD KEY `fkCargo` (`fkCargo`);

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`idCargo`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`idCiudad`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`idComentarios`),
  ADD KEY `fkTrabajador` (`fkTrabajador`);

--
-- Indices de la tabla `estadoProyecto`
--
ALTER TABLE `estadoProyecto`
  ADD PRIMARY KEY (`idEstadoProyecto`);

--
-- Indices de la tabla `estadoSolicitud`
--
ALTER TABLE `estadoSolicitud`
  ADD PRIMARY KEY (`idestadoSolicitud`);

--
-- Indices de la tabla `fcm_info`
--
ALTER TABLE `fcm_info`
  ADD PRIMARY KEY (`idToken`),
  ADD KEY `fktrabajador` (`fktrabajador`);

--
-- Indices de la tabla `gerente`
--
ALTER TABLE `gerente`
  ADD PRIMARY KEY (`idgerente`),
  ADD KEY `fkusuario` (`fkusuario`),
  ADD KEY `fkorganizacion` (`fkorganizacion`),
  ADD KEY `fkorganizacion_2` (`fkorganizacion`);

--
-- Indices de la tabla `jefeproyecto`
--
ALTER TABLE `jefeproyecto`
  ADD PRIMARY KEY (`idjefeProyecto`),
  ADD KEY `fkusuario` (`fkusuario`),
  ADD KEY `fkorganizacion` (`fkorganizacion`);

--
-- Indices de la tabla `nacionalidad`
--
ALTER TABLE `nacionalidad`
  ADD PRIMARY KEY (`idNacionalidad`);

--
-- Indices de la tabla `organizacion`
--
ALTER TABLE `organizacion`
  ADD PRIMARY KEY (`idOrganizacion`);

--
-- Indices de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`IdProyecto`),
  ADD KEY `fkjefeproyecto` (`fkjefeproyecto`),
  ADD KEY `fkEstadoProyecto` (`fkEstadoProyecto`),
  ADD KEY `fkOrganizacion` (`fkOrganizacion`);

--
-- Indices de la tabla `salud`
--
ALTER TABLE `salud`
  ADD PRIMARY KEY (`idSalud`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`idsolicitud`),
  ADD KEY `fkproyecto` (`fkproyecto`),
  ADD KEY `fktrabajador` (`fktrabajador`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`idtipousuario`);

--
-- Indices de la tabla `trabajador`
--
ALTER TABLE `trabajador`
  ADD PRIMARY KEY (`idTrabajador`),
  ADD KEY `fkusuario` (`fkusuario`),
  ADD KEY `fkCargo` (`fkCargo`),
  ADD KEY `fkCiudad` (`fkCiudad`),
  ADD KEY `fkNacionalidad` (`fkNacionalidad`),
  ADD KEY `fkSalud` (`fkSalud`),
  ADD KEY `fkAfp` (`fkAfp`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `fktipousuario` (`fktipousuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admcontrato`
--
ALTER TABLE `admcontrato`
  MODIFY `idAdm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `afp`
--
ALTER TABLE `afp`
  MODIFY `idAfp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `archivo`
--
ALTER TABLE `archivo`
  MODIFY `idArchivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cargoProyecto`
--
ALTER TABLE `cargoProyecto`
  MODIFY `idCargoProyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `idCargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `idCiudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `idComentarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `estadoProyecto`
--
ALTER TABLE `estadoProyecto`
  MODIFY `idEstadoProyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `estadoSolicitud`
--
ALTER TABLE `estadoSolicitud`
  MODIFY `idestadoSolicitud` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fcm_info`
--
ALTER TABLE `fcm_info`
  MODIFY `idToken` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;

--
-- AUTO_INCREMENT de la tabla `gerente`
--
ALTER TABLE `gerente`
  MODIFY `idgerente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `jefeproyecto`
--
ALTER TABLE `jefeproyecto`
  MODIFY `idjefeProyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `nacionalidad`
--
ALTER TABLE `nacionalidad`
  MODIFY `idNacionalidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `organizacion`
--
ALTER TABLE `organizacion`
  MODIFY `idOrganizacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  MODIFY `IdProyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `salud`
--
ALTER TABLE `salud`
  MODIFY `idSalud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `idsolicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `idtipousuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `trabajador`
--
ALTER TABLE `trabajador`
  MODIFY `idTrabajador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `admcontrato`
--
ALTER TABLE `admcontrato`
  ADD CONSTRAINT `FK_adm_organizacion` FOREIGN KEY (`fkorganizacion`) REFERENCES `organizacion` (`idOrganizacion`),
  ADD CONSTRAINT `FK_adm_usuario` FOREIGN KEY (`fkusuario`) REFERENCES `usuario` (`idusuario`);

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `fk_admin_usuario1` FOREIGN KEY (`fkusuario`) REFERENCES `usuario` (`idusuario`);

--
-- Filtros para la tabla `archivo`
--
ALTER TABLE `archivo`
  ADD CONSTRAINT `fkusers` FOREIGN KEY (`fkusuario`) REFERENCES `usuario` (`idusuario`);

--
-- Filtros para la tabla `cargoProyecto`
--
ALTER TABLE `cargoProyecto`
  ADD CONSTRAINT `cargoProyecto_ibfk_1` FOREIGN KEY (`fkProyecto`) REFERENCES `proyecto` (`IdProyecto`),
  ADD CONSTRAINT `cargoProyecto_ibfk_2` FOREIGN KEY (`fkCargo`) REFERENCES `cargos` (`idCargo`);

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`fkTrabajador`) REFERENCES `trabajador` (`idTrabajador`);

--
-- Filtros para la tabla `fcm_info`
--
ALTER TABLE `fcm_info`
  ADD CONSTRAINT `fcm_info_ibfk_1` FOREIGN KEY (`fktrabajador`) REFERENCES `trabajador` (`idTrabajador`);

--
-- Filtros para la tabla `gerente`
--
ALTER TABLE `gerente`
  ADD CONSTRAINT `fkorganiza` FOREIGN KEY (`fkorganizacion`) REFERENCES `organizacion` (`idOrganizacion`),
  ADD CONSTRAINT `fkuser` FOREIGN KEY (`fkusuario`) REFERENCES `usuario` (`idusuario`);

--
-- Filtros para la tabla `jefeproyecto`
--
ALTER TABLE `jefeproyecto`
  ADD CONSTRAINT `fko` FOREIGN KEY (`fkorganizacion`) REFERENCES `organizacion` (`idOrganizacion`),
  ADD CONSTRAINT `fku` FOREIGN KEY (`fkusuario`) REFERENCES `usuario` (`idusuario`);

--
-- Filtros para la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD CONSTRAINT `fkjefep` FOREIGN KEY (`fkjefeproyecto`) REFERENCES `jefeproyecto` (`idjefeProyecto`),
  ADD CONSTRAINT `proyecto_ibfk_1` FOREIGN KEY (`fkEstadoProyecto`) REFERENCES `estadoProyecto` (`idEstadoProyecto`),
  ADD CONSTRAINT `proyecto_ibfk_2` FOREIGN KEY (`fkOrganizacion`) REFERENCES `organizacion` (`idOrganizacion`);

--
-- Filtros para la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `fkp` FOREIGN KEY (`fkproyecto`) REFERENCES `proyecto` (`IdProyecto`),
  ADD CONSTRAINT `fkt` FOREIGN KEY (`fktrabajador`) REFERENCES `trabajador` (`idTrabajador`);

--
-- Filtros para la tabla `trabajador`
--
ALTER TABLE `trabajador`
  ADD CONSTRAINT `fkus` FOREIGN KEY (`fkusuario`) REFERENCES `usuario` (`idusuario`),
  ADD CONSTRAINT `trabajador_ibfk_1` FOREIGN KEY (`fkCargo`) REFERENCES `cargos` (`idCargo`),
  ADD CONSTRAINT `trabajador_ibfk_2` FOREIGN KEY (`fkCiudad`) REFERENCES `ciudad` (`idCiudad`),
  ADD CONSTRAINT `trabajador_ibfk_3` FOREIGN KEY (`fkNacionalidad`) REFERENCES `nacionalidad` (`idNacionalidad`),
  ADD CONSTRAINT `trabajador_ibfk_4` FOREIGN KEY (`fkSalud`) REFERENCES `salud` (`idSalud`),
  ADD CONSTRAINT `trabajador_ibfk_5` FOREIGN KEY (`fkAfp`) REFERENCES `afp` (`idAfp`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fkti` FOREIGN KEY (`fktipousuario`) REFERENCES `tipousuario` (`idtipousuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
