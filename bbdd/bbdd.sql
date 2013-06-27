-- phpMyAdmin SQL Dump
-- version 2.6.1
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 09-05-2008 a las 01:27:55
-- Versión del servidor: 4.1.9
-- Versión de PHP: 4.3.10
-- 
-- Base de datos: `seientlliure`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `carreras`
-- 

CREATE TABLE `carreras` (
  `id` int(11) NOT NULL auto_increment,
  `carrera` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

-- 
-- Volcar la base de datos para la tabla `carreras`
-- 

INSERT INTO `carreras` VALUES (1, 'Profesor');
INSERT INTO `carreras` VALUES (2, 'Empleado de la universidad');
INSERT INTO `carreras` VALUES (3, 'Arquitecto Técnico (ETSGE)\r\n');
INSERT INTO `carreras` VALUES (4, 'Diplomado en Gestión y Administración Pública (FADE)\r\n');
INSERT INTO `carreras` VALUES (5, 'Diplomado en Turismo (EPSG)\r\n');
INSERT INTO `carreras` VALUES (6, 'Ingeniero Técnico Agrícola, Explotaciones Agropecuarias (ETSMRE)');
INSERT INTO `carreras` VALUES (7, 'Ingeniero Técnico Agrícola, Hortofruticultura y Jardinería (ETSMRE)');
INSERT INTO `carreras` VALUES (8, 'Ingeniero Técnico Agrícola, Industrias Agrarias y Alimentarias (ETSMRE)');
INSERT INTO `carreras` VALUES (9, 'Ingeniero Técnico Agrícola, Mecanización y Construcciones Rurales (ETSMRE)');
INSERT INTO `carreras` VALUES (10, 'Ingeniero Obras Públicas, Construcciones Civiles (ETSICCP)');
INSERT INTO `carreras` VALUES (11, 'Ingeniero Obras Públicas, Hidrología (ETSICCP)');
INSERT INTO `carreras` VALUES (12, 'Ingeniero Obras Públicas, Transportes y Servicios Urbanos (ETSICCP)');
INSERT INTO `carreras` VALUES (13, 'Ingeniero Técnico en Diseño Industrial (ETSID)\r\n');
INSERT INTO `carreras` VALUES (14, 'Ingeniero Técnico en Diseño Industrial (EPSA)\r\n');
INSERT INTO `carreras` VALUES (15, 'Ingeniero Técnico en Informática de Gestión (ETSIAp)\r\n');
INSERT INTO `carreras` VALUES (16, 'Ingeniero Técnico en Informática de Gestión (EPSA)\r\n');
INSERT INTO `carreras` VALUES (17, 'Ingeniero Técnico en Informática de Sistemas (ETSIAp)\r\n');
INSERT INTO `carreras` VALUES (18, 'Ingeniero Técnico de Telecomunicación, especialidad en Sistemas de Telecomunicación (EPSG)\r\n');
INSERT INTO `carreras` VALUES (19, 'Ingeniero Técnico de Telecomunicación, especialidad en Sistemas Electrónicos (EPSG)\r\n');
INSERT INTO `carreras` VALUES (20, 'Ingeniero Técnico de Telecomunicación, especialidad en Sonido e Imagen (EPSG)\r\n');
INSERT INTO `carreras` VALUES (21, 'Ingeniero Técnico de Telecomunicación, especialidad en Telemática (EPSA)\r\n');
INSERT INTO `carreras` VALUES (22, 'Ingeniero Técnico en Topografía (ETSIGCT)\r\n');
INSERT INTO `carreras` VALUES (23, 'Ingeniero Técnico Forestal, especialidad en Explotaciones Forestales (EPSG)\r\n');
INSERT INTO `carreras` VALUES (24, 'Ingeniero Técnico Industrial, especialidad en Electricidad (ETSID)\r\n');
INSERT INTO `carreras` VALUES (25, 'Ingeniero Técnico Industrial, especialidad en Electricidad (EPSA)\r\n');
INSERT INTO `carreras` VALUES (26, 'Ingeniero Técnico Industrial, especialidad en Electrónica Industrial (ETSID)\r\n');
INSERT INTO `carreras` VALUES (27, 'Ingeniero Técnico Industrial, especialidad en Electrónica Industrial (EPSA)\r\n');
INSERT INTO `carreras` VALUES (28, 'Ingeniero Técnico Industrial, especialidad en Mecánica (ETSID)\r\n');
INSERT INTO `carreras` VALUES (29, 'Ingeniero Técnico Industrial, especialidad en Mecánica (EPSA)\r\n');
INSERT INTO `carreras` VALUES (30, 'Ingeniero Técnico Industrial, especialidad en Química Industrial (ETSID)\r\n');
INSERT INTO `carreras` VALUES (31, 'Ingeniero Técnico Industrial, especialidad en Química Industrial (EPSA)\r\n');
INSERT INTO `carreras` VALUES (32, 'Ingeniero Técnico Industrial, especialidad Textil (EPSA)\r\n');
INSERT INTO `carreras` VALUES (33, 'Arquitecto (ETSA)\r\n');
INSERT INTO `carreras` VALUES (34, 'Ingeniero Aeronáutico (ETSID)\r\n');
INSERT INTO `carreras` VALUES (35, 'Ingeniero Agrónomo (ETSIA)\r\n');
INSERT INTO `carreras` VALUES (36, 'Ingeniero de Caminos, Canales y Puertos (ETSICCP)\r\n');
INSERT INTO `carreras` VALUES (37, 'Ingeniero de Montes (ETSIA)\r\n');
INSERT INTO `carreras` VALUES (38, 'Ingeniero de Telecomunicación (ETSIT)\r\n');
INSERT INTO `carreras` VALUES (39, 'Ingeniero en Informática (FI)\r\n');
INSERT INTO `carreras` VALUES (40, 'Ingeniero Industrial (ETSII)\r\n');
INSERT INTO `carreras` VALUES (41, 'Ingeniero Químico (ETSII)\r\n');
INSERT INTO `carreras` VALUES (42, 'Licenciado en Administración y Dirección de Empresas (FADE)\r\n');
INSERT INTO `carreras` VALUES (43, 'Licenciado en Administración y Dirección de Empresas (EPSA)\r\n');
INSERT INTO `carreras` VALUES (44, 'Licenciado en Bellas Artes (FBBAA)\r\n');
INSERT INTO `carreras` VALUES (45, 'Licenciado en Biotecnología (ETSIA)\r\n');
INSERT INTO `carreras` VALUES (46, 'Licenciado en Ciencias Ambientales (EPSG)\r\n');
INSERT INTO `carreras` VALUES (47, 'Licenciado en Comunicación Audiovisual (EPSG)\r\n');
INSERT INTO `carreras` VALUES (48, 'Ingeniero de Materiales (ETSGE)\r\n');
INSERT INTO `carreras` VALUES (49, 'Ingeniero de Materiales (ETSII)\r\n');
INSERT INTO `carreras` VALUES (50, 'Ingeniero de Materiales (EPSA)\r\n');
INSERT INTO `carreras` VALUES (51, 'Ingeniero de Organización Industrial (ETSID)\r\n');
INSERT INTO `carreras` VALUES (52, 'Ingeniero de Organización Industrial (ETSII)\r\n');
INSERT INTO `carreras` VALUES (53, 'Ingeniero de Organización Industrial (EPSA)\r\n');
INSERT INTO `carreras` VALUES (54, 'Ingeniero en Automática y Electrónica Industrial (ETSII)\r\n');
INSERT INTO `carreras` VALUES (55, 'Ingeniero en Geodesia y Cartografía (ETSIGCT)\r\n');
INSERT INTO `carreras` VALUES (56, 'Ingeniero Geólogo (ETSICCP)\r\n');
INSERT INTO `carreras` VALUES (57, 'Licenciado en Ciencias Ambientales (ETSICCP)\r\n');
INSERT INTO `carreras` VALUES (58, 'Licenciado en Ciencia y Tecnología de los Alimentos (ETSIA)\r\n');
INSERT INTO `carreras` VALUES (59, 'Licenciado en Documentación (FI)\r\n');
INSERT INTO `carreras` VALUES (60, 'Licenciado en Enología (ETSMRE)');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `dias`
-- 

CREATE TABLE `dias` (
  `id` int(11) NOT NULL default '0',
  `dia` varchar(10) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Volcar la base de datos para la tabla `dias`
-- 

INSERT INTO `dias` VALUES (1, 'Lunes');
INSERT INTO `dias` VALUES (2, 'Martes');
INSERT INTO `dias` VALUES (3, 'Miercoles');
INSERT INTO `dias` VALUES (4, 'Jueves');
INSERT INTO `dias` VALUES (5, 'Viernes');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `fotos`
-- 

CREATE TABLE `fotos` (
  `id` int(11) NOT NULL auto_increment,
  `id_usuario` int(11) NOT NULL default '0',
  `imagen` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- 
-- Volcar la base de datos para la tabla `fotos`
-- 

INSERT INTO `fotos` VALUES (1, 2, 'fotmsn2006.jpg');
INSERT INTO `fotos` VALUES (4, 3, 'Neus30.jpg');
INSERT INTO `fotos` VALUES (5, 7, 'MFI(2).jpg');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `horarios`
-- 

CREATE TABLE `horarios` (
  `id` int(11) NOT NULL auto_increment,
  `dia` int(1) NOT NULL default '0',
  `curso` int(4) NOT NULL default '0',
  `semestre` int(1) NOT NULL default '0',
  `entrada_hora` int(2) NOT NULL default '0',
  `entrada_minuto` int(2) NOT NULL default '0',
  `salida_hora` int(2) NOT NULL default '0',
  `salida_minuto` int(2) NOT NULL default '0',
  `id_usuario` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

-- 
-- Volcar la base de datos para la tabla `horarios`
-- 

INSERT INTO `horarios` VALUES (8, 2, 2007, 2, 8, 0, 12, 0, 2);
INSERT INTO `horarios` VALUES (7, 1, 2007, 2, 8, 0, 13, 0, 2);
INSERT INTO `horarios` VALUES (9, 3, 2007, 2, 8, 0, 16, 30, 2);
INSERT INTO `horarios` VALUES (10, 4, 2007, 2, 9, 30, 17, 0, 2);
INSERT INTO `horarios` VALUES (11, 5, 2007, 2, 8, 0, 16, 0, 2);
INSERT INTO `horarios` VALUES (12, 1, 2007, 2, 8, 0, 16, 0, 4);
INSERT INTO `horarios` VALUES (13, 1, 2007, 2, 8, 0, 12, 0, 3);
INSERT INTO `horarios` VALUES (14, 2, 2007, 2, 10, 0, 14, 0, 3);
INSERT INTO `horarios` VALUES (15, 3, 2007, 2, 15, 0, 19, 0, 3);
INSERT INTO `horarios` VALUES (16, 4, 2007, 2, 11, 0, 15, 0, 3);
INSERT INTO `horarios` VALUES (17, 5, 2007, 2, 8, 0, 14, 0, 3);
INSERT INTO `horarios` VALUES (18, 1, 2007, 2, 10, 0, 19, 0, 8);
INSERT INTO `horarios` VALUES (19, 2, 2007, 2, 9, 30, 13, 0, 8);
INSERT INTO `horarios` VALUES (20, 3, 2007, 2, 12, 0, 21, 30, 8);
INSERT INTO `horarios` VALUES (21, 4, 2007, 2, 10, 0, 15, 0, 8);
INSERT INTO `horarios` VALUES (22, 5, 2007, 2, 15, 0, 17, 0, 8);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `mensajes`
-- 

CREATE TABLE `mensajes` (
  `id` int(11) NOT NULL auto_increment,
  `id_de` int(11) NOT NULL default '0',
  `id_a` int(11) NOT NULL default '0',
  `texto` longtext NOT NULL,
  `fecha` datetime NOT NULL default '0000-00-00 00:00:00',
  `asunto` varchar(200) NOT NULL default '',
  `leido` int(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

-- 
-- Volcar la base de datos para la tabla `mensajes`
-- 

INSERT INTO `mensajes` VALUES (2, 2, 3, 'hola esto es una prueba.', '2008-03-03 20:46:23', 'hola', 0);
INSERT INTO `mensajes` VALUES (3, 3, 2, 'Aquest és el text en qüestió.', '2008-03-07 22:02:34', 'Hola que tal açò és una prova per vore grandària de asumpte', 1);
INSERT INTO `mensajes` VALUES (5, 7, 3, 'provaaaaaaaaaaaaant.', '2008-03-07 23:05:01', 'prova', 1);
INSERT INTO `mensajes` VALUES (10, 2, 3, 'Mensaje de respuesta.', '2008-03-08 19:51:03', 'respondiendo', 0);
INSERT INTO `mensajes` VALUES (11, 2, 4, 'esto es para peppe', '2008-03-08 20:00:01', 'para pepe', 1);
INSERT INTO `mensajes` VALUES (12, 4, 2, 'ok, me parece bien.\r\n\r\n------------------------------\r\njoan16v dijo:\r\n\r\nesto es para peppe', '2008-03-10 12:33:40', 'te contesto', 1);
INSERT INTO `mensajes` VALUES (13, 2, 6, 'ario', '2008-03-10 12:41:44', 'hola oleg', 0);
INSERT INTO `mensajes` VALUES (14, 4, 2, 'potopom\r\n\r\n------------------------------\r\njoan16v dijo:\r\n\r\nesto es para peppe', '2008-03-10 12:56:13', 'pisha', 1);
INSERT INTO `mensajes` VALUES (15, 2, 4, 'q tal', '2008-04-05 17:58:33', 'hola', 0);
INSERT INTO `mensajes` VALUES (16, 2, 3, 'djsfhsjhfsjfhjfhsfh hjsf sj jhf sdkfh dsfhsdfhsdjfh dsfhj sdjf dsfhj hjsdfsd fhjsdfh sfhsdjf sdhjfds', '2008-04-07 20:49:38', 'hola', 1);
INSERT INTO `mensajes` VALUES (17, 2, 4, '\r\n\r\n------------------------------\r\npepe dijo:\r\n\r\npotopom\r\n\r\n------------------------------\r\njoan16v dijo:\r\n\r\nesto es para peppe', '2008-05-09 01:25:54', 'RE: pisha', 0);
INSERT INTO `mensajes` VALUES (18, 2, 3, '\r\n\r\n------------------------------\r\nneus dijo:\r\n\r\nAquest és el text en qüestió.', '2008-05-09 01:26:16', 'RE: Hola que tal açò és una prova per vore grandària de asumpte', 0);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `plazas`
-- 

CREATE TABLE `plazas` (
  `id` int(11) NOT NULL auto_increment,
  `id_propietario` int(11) NOT NULL default '0',
  `id_asignado` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `plazas`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pueblos`
-- 

CREATE TABLE `pueblos` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=266 ;

-- 
-- Volcar la base de datos para la tabla `pueblos`
-- 

INSERT INTO `pueblos` VALUES (1, 'ADEMUZ\r\n');
INSERT INTO `pueblos` VALUES (2, 'ADOR\r\n');
INSERT INTO `pueblos` VALUES (3, 'AGULLENT\r\n');
INSERT INTO `pueblos` VALUES (4, 'AIELO DE MALFERIT\r\n');
INSERT INTO `pueblos` VALUES (5, 'AIELO DE RUGAT\r\n');
INSERT INTO `pueblos` VALUES (6, 'ALAQUAS\r\n');
INSERT INTO `pueblos` VALUES (7, 'ALBAIDA\r\n');
INSERT INTO `pueblos` VALUES (8, 'ALBAL\r\n');
INSERT INTO `pueblos` VALUES (9, 'ALBALAT DE LA RIBERA\r\n');
INSERT INTO `pueblos` VALUES (10, 'ALBALAT DELS SORELLS\r\n');
INSERT INTO `pueblos` VALUES (11, 'ALBALAT DELS TARONGERS\r\n');
INSERT INTO `pueblos` VALUES (12, 'ALBERIC\r\n');
INSERT INTO `pueblos` VALUES (13, 'ALBORACHE\r\n');
INSERT INTO `pueblos` VALUES (14, 'ALBORAYA\r\n');
INSERT INTO `pueblos` VALUES (15, 'ALBUIXECH\r\n');
INSERT INTO `pueblos` VALUES (16, 'ALCANTERA DE XUQUER\r\n');
INSERT INTO `pueblos` VALUES (17, 'ALCASSER\r\n');
INSERT INTO `pueblos` VALUES (18, 'ALCUBLAS\r\n');
INSERT INTO `pueblos` VALUES (19, 'ALDAIA\r\n');
INSERT INTO `pueblos` VALUES (20, 'ALFAFAR\r\n');
INSERT INTO `pueblos` VALUES (21, 'ALFARA DE ALGIMIA\r\n');
INSERT INTO `pueblos` VALUES (22, 'ALFARA DEL PATRIARCA\r\n');
INSERT INTO `pueblos` VALUES (23, 'ALFARP\r\n');
INSERT INTO `pueblos` VALUES (24, 'ALFARRASI\r\n');
INSERT INTO `pueblos` VALUES (25, 'ALFAUIR\r\n');
INSERT INTO `pueblos` VALUES (26, 'ALGAR DE PALANCIA\r\n');
INSERT INTO `pueblos` VALUES (27, 'ALGEMESI\r\n');
INSERT INTO `pueblos` VALUES (28, 'ALGIMIA DE ALFARA\r\n');
INSERT INTO `pueblos` VALUES (29, 'ALGINET\r\n');
INSERT INTO `pueblos` VALUES (30, 'ALMASSERA\r\n');
INSERT INTO `pueblos` VALUES (31, 'ALMISERA\r\n');
INSERT INTO `pueblos` VALUES (32, 'ALMOINES\r\n');
INSERT INTO `pueblos` VALUES (33, 'ALMUSSAFES\r\n');
INSERT INTO `pueblos` VALUES (34, 'ALPUENTE\r\n');
INSERT INTO `pueblos` VALUES (35, 'ALQUERIA DE LA CONDESA');
INSERT INTO `pueblos` VALUES (36, 'ALZIRA\r\n');
INSERT INTO `pueblos` VALUES (37, 'ANDILLA\r\n');
INSERT INTO `pueblos` VALUES (38, 'ANNA\r\n');
INSERT INTO `pueblos` VALUES (39, 'ANTELLA\r\n');
INSERT INTO `pueblos` VALUES (40, 'ARAS DE LOS OLMOS\r\n');
INSERT INTO `pueblos` VALUES (41, 'ATZENETA D''ALBAIDA\r\n');
INSERT INTO `pueblos` VALUES (42, 'AYORA\r\n');
INSERT INTO `pueblos` VALUES (43, 'BARX\r\n');
INSERT INTO `pueblos` VALUES (44, 'BARXETA\r\n');
INSERT INTO `pueblos` VALUES (45, 'BELGIDA\r\n');
INSERT INTO `pueblos` VALUES (46, 'BELLREGUARD\r\n');
INSERT INTO `pueblos` VALUES (47, 'BELLUS\r\n');
INSERT INTO `pueblos` VALUES (48, 'BENAGEBER\r\n');
INSERT INTO `pueblos` VALUES (49, 'BENAGUASIL\r\n');
INSERT INTO `pueblos` VALUES (50, 'BENAVITES\r\n');
INSERT INTO `pueblos` VALUES (51, 'BENEIXIDA\r\n');
INSERT INTO `pueblos` VALUES (52, 'BENETUSSER\r\n');
INSERT INTO `pueblos` VALUES (53, 'BENIARJO\r\n');
INSERT INTO `pueblos` VALUES (54, 'BENIATJAR\r\n');
INSERT INTO `pueblos` VALUES (55, 'BENICOLET\r\n');
INSERT INTO `pueblos` VALUES (56, 'BENIFAIO\r\n');
INSERT INTO `pueblos` VALUES (57, 'BENIFAIRO DE LA VALLDIGNA\r\n');
INSERT INTO `pueblos` VALUES (58, 'BENIFAIRO DE LES VALLS\r\n');
INSERT INTO `pueblos` VALUES (59, 'BENIFLA\r\n');
INSERT INTO `pueblos` VALUES (60, 'BENIGANIM\r\n');
INSERT INTO `pueblos` VALUES (61, 'BENIMODO\r\n');
INSERT INTO `pueblos` VALUES (62, 'BENIMUSLEM\r\n');
INSERT INTO `pueblos` VALUES (63, 'BENIPARRELL\r\n');
INSERT INTO `pueblos` VALUES (64, 'BENIRREDRA\r\n');
INSERT INTO `pueblos` VALUES (65, 'BENISANO\r\n');
INSERT INTO `pueblos` VALUES (66, 'BENISSODA\r\n');
INSERT INTO `pueblos` VALUES (67, 'BENISUERA\r\n');
INSERT INTO `pueblos` VALUES (68, 'BETERA\r\n');
INSERT INTO `pueblos` VALUES (69, 'BICORP\r\n');
INSERT INTO `pueblos` VALUES (70, 'BOCAIRENT\r\n');
INSERT INTO `pueblos` VALUES (71, 'BOLBAITE\r\n');
INSERT INTO `pueblos` VALUES (72, 'BONREPOS I MIRAMBELL\r\n');
INSERT INTO `pueblos` VALUES (73, 'BUFALI\r\n');
INSERT INTO `pueblos` VALUES (74, 'BUGARRA\r\n');
INSERT INTO `pueblos` VALUES (75, 'BUÑOL\r\n');
INSERT INTO `pueblos` VALUES (76, 'BURJASSOT\r\n');
INSERT INTO `pueblos` VALUES (77, 'CALLES\r\n');
INSERT INTO `pueblos` VALUES (78, 'CAMPORROBLES\r\n');
INSERT INTO `pueblos` VALUES (79, 'CANALS\r\n');
INSERT INTO `pueblos` VALUES (80, 'CANET D''EN BERENGUER\r\n');
INSERT INTO `pueblos` VALUES (81, 'CARCAIXENT\r\n');
INSERT INTO `pueblos` VALUES (82, 'CARCER\r\n');
INSERT INTO `pueblos` VALUES (83, 'CARLET\r\n');
INSERT INTO `pueblos` VALUES (84, 'CARRICOLA\r\n');
INSERT INTO `pueblos` VALUES (85, 'CASAS ALTAS\r\n');
INSERT INTO `pueblos` VALUES (86, 'CASAS BAJAS\r\n');
INSERT INTO `pueblos` VALUES (87, 'CASINOS\r\n');
INSERT INTO `pueblos` VALUES (88, 'CASTELLO DE RUGAT\r\n');
INSERT INTO `pueblos` VALUES (89, 'CASTELLONET DE LA CONQUESTA\r\n');
INSERT INTO `pueblos` VALUES (90, 'CASTIELFABIB\r\n');
INSERT INTO `pueblos` VALUES (91, 'CATADAU\r\n');
INSERT INTO `pueblos` VALUES (92, 'CATARROJA\r\n');
INSERT INTO `pueblos` VALUES (93, 'CAUDETE DE LAS FUENTES\r\n');
INSERT INTO `pueblos` VALUES (94, 'CERDA\r\n');
INSERT INTO `pueblos` VALUES (95, 'COFRENTES\r\n');
INSERT INTO `pueblos` VALUES (96, 'CORBERA\r\n');
INSERT INTO `pueblos` VALUES (97, 'CORTES DE PALLAS\r\n');
INSERT INTO `pueblos` VALUES (98, 'COTES\r\n');
INSERT INTO `pueblos` VALUES (99, 'CULLERA\r\n');
INSERT INTO `pueblos` VALUES (100, 'CHELVA\r\n');
INSERT INTO `pueblos` VALUES (101, 'CHELLA\r\n');
INSERT INTO `pueblos` VALUES (102, 'CHERA\r\n');
INSERT INTO `pueblos` VALUES (103, 'CHESTE\r\n');
INSERT INTO `pueblos` VALUES (104, 'CHIVA\r\n');
INSERT INTO `pueblos` VALUES (105, 'CHULILLA\r\n');
INSERT INTO `pueblos` VALUES (106, 'DAIMUS\r\n');
INSERT INTO `pueblos` VALUES (107, 'DOMEÑO\r\n');
INSERT INTO `pueblos` VALUES (108, 'DOS AGUAS\r\n');
INSERT INTO `pueblos` VALUES (109, 'EL PALOMAR\r\n');
INSERT INTO `pueblos` VALUES (110, 'EMPERADOR\r\n');
INSERT INTO `pueblos` VALUES (111, 'ENGUERA\r\n');
INSERT INTO `pueblos` VALUES (112, 'ESTIVELLA\r\n');
INSERT INTO `pueblos` VALUES (113, 'ESTUBENY\r\n');
INSERT INTO `pueblos` VALUES (114, 'FAURA\r\n');
INSERT INTO `pueblos` VALUES (115, 'FAVARA\r\n');
INSERT INTO `pueblos` VALUES (116, 'FOIOS\r\n');
INSERT INTO `pueblos` VALUES (117, 'FONTANARS DELS ALFORINS\r\n');
INSERT INTO `pueblos` VALUES (118, 'FORTALENY\r\n');
INSERT INTO `pueblos` VALUES (119, 'FUENTERROBLES\r\n');
INSERT INTO `pueblos` VALUES (120, 'GANDIA\r\n');
INSERT INTO `pueblos` VALUES (121, 'GATOVA\r\n');
INSERT INTO `pueblos` VALUES (122, 'GAVARDA\r\n');
INSERT INTO `pueblos` VALUES (123, 'GENOVES\r\n');
INSERT INTO `pueblos` VALUES (124, 'GESTALGAR\r\n');
INSERT INTO `pueblos` VALUES (125, 'GILET\r\n');
INSERT INTO `pueblos` VALUES (126, 'GODELLA\r\n');
INSERT INTO `pueblos` VALUES (127, 'GODELLETA\r\n');
INSERT INTO `pueblos` VALUES (128, 'GUADASEQUIES\r\n');
INSERT INTO `pueblos` VALUES (129, 'GUADASSUAR\r\n');
INSERT INTO `pueblos` VALUES (130, 'GUARDAMAR DE LA SAFOR\r\n');
INSERT INTO `pueblos` VALUES (131, 'HIGUERUELAS\r\n');
INSERT INTO `pueblos` VALUES (132, 'JALANCE\r\n');
INSERT INTO `pueblos` VALUES (133, 'JARAFUEL\r\n');
INSERT INTO `pueblos` VALUES (134, 'L''ALCUDIA\r\n');
INSERT INTO `pueblos` VALUES (135, 'L''ALCUDIA DE CRESPINS\r\n');
INSERT INTO `pueblos` VALUES (136, 'L''ELIANA\r\n');
INSERT INTO `pueblos` VALUES (137, 'L''ENOVA\r\n');
INSERT INTO `pueblos` VALUES (138, 'L''OLLERIA\r\n');
INSERT INTO `pueblos` VALUES (139, 'LA FONT D''EN CARROS\r\n');
INSERT INTO `pueblos` VALUES (140, 'LA FONT DE LA FIGUERA\r\n');
INSERT INTO `pueblos` VALUES (141, 'LA GRANJA DE LA COSTERA\r\n');
INSERT INTO `pueblos` VALUES (142, 'LA LLOSA DE RANES\r\n');
INSERT INTO `pueblos` VALUES (143, 'LA POBLA DE FARNALS\r\n');
INSERT INTO `pueblos` VALUES (144, 'LA POBLA DE VALLBONA\r\n');
INSERT INTO `pueblos` VALUES (145, 'LA POBLA DEL DUC\r\n');
INSERT INTO `pueblos` VALUES (146, 'LA POBLA LLARGA\r\n');
INSERT INTO `pueblos` VALUES (147, 'LA YESA\r\n');
INSERT INTO `pueblos` VALUES (148, 'LORIGUILLA\r\n');
INSERT INTO `pueblos` VALUES (149, 'LOSA DEL OBISPO\r\n');
INSERT INTO `pueblos` VALUES (150, 'LUGAR NUEVO DE LA CORONA\r\n');
INSERT INTO `pueblos` VALUES (151, 'LLANERA DE RANES\r\n');
INSERT INTO `pueblos` VALUES (152, 'LLAURI\r\n');
INSERT INTO `pueblos` VALUES (153, 'LLIRIA\r\n');
INSERT INTO `pueblos` VALUES (154, 'LLOCNOU D''EN FENOLLET\r\n');
INSERT INTO `pueblos` VALUES (155, 'LLOCNOU DE SANT JERONI\r\n');
INSERT INTO `pueblos` VALUES (156, 'LLOMBAI\r\n');
INSERT INTO `pueblos` VALUES (157, 'LLUTXENT\r\n');
INSERT INTO `pueblos` VALUES (158, 'MACASTRE\r\n');
INSERT INTO `pueblos` VALUES (159, 'MANISES\r\n');
INSERT INTO `pueblos` VALUES (160, 'MANUEL\r\n');
INSERT INTO `pueblos` VALUES (161, 'MARINES\r\n');
INSERT INTO `pueblos` VALUES (162, 'MASALAVES\r\n');
INSERT INTO `pueblos` VALUES (163, 'MASSALFASSAR\r\n');
INSERT INTO `pueblos` VALUES (164, 'MASSAMAGRELL\r\n');
INSERT INTO `pueblos` VALUES (165, 'MASSANASSA\r\n');
INSERT INTO `pueblos` VALUES (166, 'MELIANA\r\n');
INSERT INTO `pueblos` VALUES (167, 'MILLARES\r\n');
INSERT INTO `pueblos` VALUES (168, 'MIRAMAR\r\n');
INSERT INTO `pueblos` VALUES (169, 'MISLATA\r\n');
INSERT INTO `pueblos` VALUES (170, 'MOGENTE/MOIXENT\r\n');
INSERT INTO `pueblos` VALUES (171, 'MONCADA\r\n');
INSERT INTO `pueblos` VALUES (172, 'MONSERRAT\r\n');
INSERT INTO `pueblos` VALUES (173, 'MONTAVERNER\r\n');
INSERT INTO `pueblos` VALUES (174, 'MONTESA\r\n');
INSERT INTO `pueblos` VALUES (175, 'MONTICHELVO\r\n');
INSERT INTO `pueblos` VALUES (176, 'MONTROY\r\n');
INSERT INTO `pueblos` VALUES (177, 'MUSEROS\r\n');
INSERT INTO `pueblos` VALUES (178, 'NAQUERA\r\n');
INSERT INTO `pueblos` VALUES (179, 'NAVARRES\r\n');
INSERT INTO `pueblos` VALUES (180, 'NOVELE/NOVETLE\r\n');
INSERT INTO `pueblos` VALUES (181, 'OLIVA\r\n');
INSERT INTO `pueblos` VALUES (182, 'OLOCAU\r\n');
INSERT INTO `pueblos` VALUES (183, 'ONTINYENT\r\n');
INSERT INTO `pueblos` VALUES (184, 'OTOS\r\n');
INSERT INTO `pueblos` VALUES (185, 'PAIPORTA\r\n');
INSERT INTO `pueblos` VALUES (186, 'PALMA DE GANDIA\r\n');
INSERT INTO `pueblos` VALUES (187, 'PALMERA\r\n');
INSERT INTO `pueblos` VALUES (188, 'PATERNA\r\n');
INSERT INTO `pueblos` VALUES (189, 'PEDRALBA\r\n');
INSERT INTO `pueblos` VALUES (190, 'PETRES\r\n');
INSERT INTO `pueblos` VALUES (191, 'PICANYA\r\n');
INSERT INTO `pueblos` VALUES (192, 'PICASSENT\r\n');
INSERT INTO `pueblos` VALUES (193, 'PILES\r\n');
INSERT INTO `pueblos` VALUES (194, 'PINET\r\n');
INSERT INTO `pueblos` VALUES (195, 'POLINYA DE XUQUER\r\n');
INSERT INTO `pueblos` VALUES (196, 'POTRIES\r\n');
INSERT INTO `pueblos` VALUES (197, 'PUCOL\r\n');
INSERT INTO `pueblos` VALUES (198, 'PUEBLA DE SAN MIGUEL\r\n');
INSERT INTO `pueblos` VALUES (199, 'PUIG\r\n');
INSERT INTO `pueblos` VALUES (200, 'QUART DE LES VALLS\r\n');
INSERT INTO `pueblos` VALUES (201, 'QUART DE POBLET\r\n');
INSERT INTO `pueblos` VALUES (202, 'QUARTELL\r\n');
INSERT INTO `pueblos` VALUES (203, 'QUATRETONDA\r\n');
INSERT INTO `pueblos` VALUES (204, 'QUESA\r\n');
INSERT INTO `pueblos` VALUES (205, 'RAFELBUÑOL/RAFELBUNYOL\r\n');
INSERT INTO `pueblos` VALUES (206, 'RAFELCOFER\r\n');
INSERT INTO `pueblos` VALUES (207, 'RAFELGUARAF\r\n');
INSERT INTO `pueblos` VALUES (208, 'RAFOL DE SALEM\r\n');
INSERT INTO `pueblos` VALUES (209, 'REAL DE GANDIA\r\n');
INSERT INTO `pueblos` VALUES (210, 'REAL DE MONTROI\r\n');
INSERT INTO `pueblos` VALUES (211, 'REQUENA\r\n');
INSERT INTO `pueblos` VALUES (212, 'RIBA-ROJA DE TURIA\r\n');
INSERT INTO `pueblos` VALUES (213, 'RIOLA\r\n');
INSERT INTO `pueblos` VALUES (214, 'ROCAFORT\r\n');
INSERT INTO `pueblos` VALUES (215, 'ROTGLA I CORBERA\r\n');
INSERT INTO `pueblos` VALUES (216, 'ROTOVA\r\n');
INSERT INTO `pueblos` VALUES (217, 'RUGAT\r\n');
INSERT INTO `pueblos` VALUES (218, 'SAGUNTO/SAGUNT\r\n');
INSERT INTO `pueblos` VALUES (219, 'SALEM\r\n');
INSERT INTO `pueblos` VALUES (220, 'SAN ANTONIO DE BENAGEBER\r\n');
INSERT INTO `pueblos` VALUES (221, 'SAN JUAN DE ENOVA\r\n');
INSERT INTO `pueblos` VALUES (222, 'SEDAVI\r\n');
INSERT INTO `pueblos` VALUES (223, 'SEGART\r\n');
INSERT INTO `pueblos` VALUES (224, 'SELLENT\r\n');
INSERT INTO `pueblos` VALUES (225, 'SEMPERE\r\n');
INSERT INTO `pueblos` VALUES (226, 'SENYERA\r\n');
INSERT INTO `pueblos` VALUES (227, 'SERRA\r\n');
INSERT INTO `pueblos` VALUES (228, 'SIETE AGUAS\r\n');
INSERT INTO `pueblos` VALUES (229, 'SILLA\r\n');
INSERT INTO `pueblos` VALUES (230, 'SIMAT DE LA VALLDIGNA\r\n');
INSERT INTO `pueblos` VALUES (231, 'SINARCAS\r\n');
INSERT INTO `pueblos` VALUES (232, 'SOLLANA\r\n');
INSERT INTO `pueblos` VALUES (233, 'SOT DE CHERA\r\n');
INSERT INTO `pueblos` VALUES (234, 'SUECA\r\n');
INSERT INTO `pueblos` VALUES (235, 'SUMACARCER\r\n');
INSERT INTO `pueblos` VALUES (236, 'TAVERNES BLANQUES\r\n');
INSERT INTO `pueblos` VALUES (237, 'TAVERNES DE LA VALLDIGNA\r\n');
INSERT INTO `pueblos` VALUES (238, 'TERESA DE COFRENTES\r\n');
INSERT INTO `pueblos` VALUES (239, 'TERRATEIG\r\n');
INSERT INTO `pueblos` VALUES (240, 'TITAGUAS\r\n');
INSERT INTO `pueblos` VALUES (241, 'TORREBAJA\r\n');
INSERT INTO `pueblos` VALUES (242, 'TORRELLA\r\n');
INSERT INTO `pueblos` VALUES (243, 'TORRENT\r\n');
INSERT INTO `pueblos` VALUES (244, 'TORRES TORRES\r\n');
INSERT INTO `pueblos` VALUES (245, 'TOUS\r\n');
INSERT INTO `pueblos` VALUES (246, 'TUEJAR\r\n');
INSERT INTO `pueblos` VALUES (247, 'TURIS\r\n');
INSERT INTO `pueblos` VALUES (248, 'UTIEL\r\n');
INSERT INTO `pueblos` VALUES (249, 'VALENCIA\r\n');
INSERT INTO `pueblos` VALUES (250, 'VALLADA\r\n');
INSERT INTO `pueblos` VALUES (251, 'VALLANCA\r\n');
INSERT INTO `pueblos` VALUES (252, 'VALLES\r\n');
INSERT INTO `pueblos` VALUES (253, 'VENTA DEL MORO\r\n');
INSERT INTO `pueblos` VALUES (254, 'VILAMARXANT\r\n');
INSERT INTO `pueblos` VALUES (255, 'VILLALONGA\r\n');
INSERT INTO `pueblos` VALUES (256, 'VILLANUEVA DE CASTELLON\r\n');
INSERT INTO `pueblos` VALUES (257, 'VILLAR DEL ARZOBISPO\r\n');
INSERT INTO `pueblos` VALUES (258, 'VILLARGORDO DEL CABRIEL\r\n');
INSERT INTO `pueblos` VALUES (259, 'VINALESA\r\n');
INSERT INTO `pueblos` VALUES (260, 'XATIVA\r\n');
INSERT INTO `pueblos` VALUES (261, 'XERACO\r\n');
INSERT INTO `pueblos` VALUES (262, 'XERESA\r\n');
INSERT INTO `pueblos` VALUES (263, 'XIRIVELLA\r\n');
INSERT INTO `pueblos` VALUES (264, 'YATOVA\r\n');
INSERT INTO `pueblos` VALUES (265, 'ZARRA');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `usuarios`
-- 

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL auto_increment,
  `login` varchar(100) NOT NULL default '',
  `password` varchar(100) NOT NULL default '',
  `localidad` int(10) NOT NULL default '0',
  `email` varchar(100) NOT NULL default '',
  `fecha` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- 
-- Volcar la base de datos para la tabla `usuarios`
-- 

INSERT INTO `usuarios` VALUES (2, 'joan16v', 'dad3a37aa9d50688b5157698acfd7aee', 218, 'joan16v@gmail.com', '2008-02-15 20:39:08');
INSERT INTO `usuarios` VALUES (3, 'neus', 'dad3a37aa9d50688b5157698acfd7aee', 218, 'nnneeeuuusss@hotmail.com', '2008-02-22 18:02:09');
INSERT INTO `usuarios` VALUES (4, 'pepe', 'f561aaf6ef0bf14d4208bb46a4ccb3ad', 6, 'pepe@hotmail.com', '2008-02-29 21:19:07');
INSERT INTO `usuarios` VALUES (5, 'ramon', 'f561aaf6ef0bf14d4208bb46a4ccb3ad', 243, 'ramon@yahoo.com', '2008-02-29 21:31:45');
INSERT INTO `usuarios` VALUES (6, 'olegario', 'f561aaf6ef0bf14d4208bb46a4ccb3ad', 75, 'olegario@hotmail.com', '2008-03-03 16:43:41');
INSERT INTO `usuarios` VALUES (7, 'joangimenez', 'f561aaf6ef0bf14d4208bb46a4ccb3ad', 218, 'joagido@yahoo.es', '2008-03-07 22:19:28');
INSERT INTO `usuarios` VALUES (8, 'evaristo', 'f561aaf6ef0bf14d4208bb46a4ccb3ad', 11, 'evaristo@hotmail.com', '2008-04-07 20:14:21');
INSERT INTO `usuarios` VALUES (9, 'daimeil', 'f561aaf6ef0bf14d4208bb46a4ccb3ad', 16, 'daimiel@hotmail.com', '2008-04-08 21:08:34');
INSERT INTO `usuarios` VALUES (10, 'juan', 'f561aaf6ef0bf14d4208bb46a4ccb3ad', 259, 'juan@gmail.com', '2008-04-08 21:09:17');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `usuarios_extra`
-- 

CREATE TABLE `usuarios_extra` (
  `id` int(11) NOT NULL auto_increment,
  `id_usuario` int(11) NOT NULL default '0',
  `nombre` varchar(100) NOT NULL default '',
  `apellidos` varchar(200) NOT NULL default '',
  `direccion` varchar(200) NOT NULL default '',
  `movil` varchar(50) NOT NULL default '',
  `carrera` int(11) NOT NULL default '0',
  `dia_nac` int(11) NOT NULL default '0',
  `mes_nac` int(11) NOT NULL default '0',
  `anyo_nac` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- 
-- Volcar la base de datos para la tabla `usuarios_extra`
-- 

INSERT INTO `usuarios_extra` VALUES (1, 2, 'Joan', 'Giménez Donat', 'Martínez Campos 30', '651137353', 39, 13, 1, 1982);
INSERT INTO `usuarios_extra` VALUES (2, 3, 'Neus', 'Giménez Donat', 'Martínez Campos 30', '635368369', 42, 19, 1, 1990);
INSERT INTO `usuarios_extra` VALUES (3, 4, '', '', '', '', 0, 0, 0, 0);
INSERT INTO `usuarios_extra` VALUES (4, 8, 'Evaristo', '', '', '', 36, 0, 0, 0);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `vehiculos`
-- 

CREATE TABLE `vehiculos` (
  `id` int(11) NOT NULL auto_increment,
  `id_usuario` int(11) NOT NULL default '0',
  `tipo_vehiculo` int(11) NOT NULL default '0',
  `plazas_libres` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Volcar la base de datos para la tabla `vehiculos`
-- 

INSERT INTO `vehiculos` VALUES (1, 2, 0, 3);
INSERT INTO `vehiculos` VALUES (2, 3, 1, 1);
INSERT INTO `vehiculos` VALUES (3, 4, 0, 1);
        