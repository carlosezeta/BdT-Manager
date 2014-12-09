-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-12-2014 a las 19:00:52
-- Versión del servidor: 5.6.15-log
-- Versión de PHP: 5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `tests`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncios`
--

CREATE TABLE IF NOT EXISTS `anuncios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `tipo` enum('O','D') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `anuncios_user_id_index` (`user_id`),
  KEY `anuncios_tipo_index` (`tipo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Volcado de datos para la tabla `anuncios`
--

INSERT INTO `anuncios` (`id`, `user_id`, `titulo`, `categoria_id`, `descripcion`, `tipo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Ruso', 1, 'Puedo ayudar en el estudio y la práctica de la lengua ruso.', 'O', '2014-11-13 23:08:57', '2014-11-13 23:08:57', NULL),
(2, 1, 'English', 2, 'Do you want to chat? What do you want to talk about? I can help you to practice and improve your English.', 'O', '2014-11-13 23:08:57', '2014-11-13 23:08:57', NULL),
(3, 2, 'Boix grèbol', 3, 'Tinc planta de grèbol', 'O', '2014-11-13 23:08:57', '2014-11-13 23:08:57', NULL),
(4, 1, 'Assesorament en Disseny d''espais i posar ordre', 4, 'Tothom diu que se treure el major partit i que faig molt amb poc, que tinc molta capacitat visual i d''imaginar i organitzar espais. si estas pensant en fer canvis a la teva llar, et puc ajudar.', 'O', '2014-11-13 23:08:57', '2014-11-13 23:08:57', NULL),
(5, 1, 'Clases d''Alemany Bàsic', 1, 'Estic buscant una persona nadiua alemana que m''ensenyi l''idioma.', 'D', '2014-11-13 23:08:57', '2014-11-13 23:08:57', NULL),
(6, 2, 'Frances', 1, 'J''étudie français. Je voudraiis pratiquer mon français', 'D', '2014-11-13 23:08:57', '2014-11-13 23:08:57', NULL),
(7, 1, 'castellana', 5, 'Estudio espanol. Quiero encontrar compañeros para la práctica de la lengua hablada', 'D', '2014-11-13 23:08:57', '2014-11-13 23:08:57', NULL),
(8, 2, 'AdWords', 6, 'Necessito una persona que conegui i sàpiga gestionar l''Adwords i el posicionament de la pàpina web. Gràcies.', 'D', '2014-11-13 23:08:57', '2014-11-13 23:08:57', NULL),
(9, 1, 'LLoc o ideas per festa aniversari nena de 6 anys', 7, 'Bon dia, necessito si algú em pot donar una idea o cedir un espai chulo, per celebrar una festa d''aniversari amb 9 nens de uns 6 anys, amb la meva filla ja som 10. més els papis i mamis.Al novembre es el seu aniversari però fa fred per fer-ho a un parc, i no em puc permetre pagar un lloc tancat d''aquets on fan festes. alguna idea? merci', 'D', '2014-11-13 23:08:57', '2014-11-13 23:08:57', NULL),
(10, 2, 'Ajudar-me a buscar un pis de lloguer', 4, 'Busco un lloguer molt baratet per mi i la meva filla perquè ens doblaran el lloguer. Saps on puc trobar quelcom interesant? merci', 'D', '2014-11-13 23:08:57', '2014-11-13 23:08:57', NULL),
(11, 1, 'modista cosir', 4, 'necessito algu que sàpiga cosir per fer petits arranjaments e roba i en bolsos', 'D', '2014-11-13 23:08:57', '2014-11-13 23:08:57', NULL),
(17, 2, 'Informática', 6, 'Excel, Access, Office en general.', 'O', '2014-12-06 16:20:59', '2014-12-06 16:20:59', NULL),
(14, 2, 'Una prueba más', 1, 'Probatorio...', 'O', '2014-11-15 12:54:38', '2014-11-15 12:54:38', NULL),
(15, 2, 'Reparación de ordenadores', 6, 'Tengo conocimientos de informática y te puedo ayudar si le pasó algo a tu ordenador.', 'O', '2014-11-17 17:52:47', '2014-11-17 17:52:47', NULL),
(16, 2, 'Limpiar alfombra', 4, 'Tengo una aspiradora industrial ideal para limpiar alfombras. Te la puedo dejar o ir yo a limpiártela.', 'O', '2014-11-17 18:57:49', '2014-11-17 18:57:49', NULL),
(18, 2, 'Informática', 6, 'Excel, Access, Office en general.', 'O', '2014-12-06 16:27:33', '2014-12-06 16:27:33', NULL),
(20, 2, 'Prueba', 1, 'Publicar', 'O', '2014-12-08 23:21:19', '2014-12-08 23:21:19', NULL),
(21, 2, 'Prueba', 1, 'Esto es una prueba', 'O', '2014-12-08 23:22:33', '2014-12-08 23:22:33', NULL),
(22, 2, 'Prueba', 1, 'Esto es una prueba', 'O', '2014-12-08 23:28:11', '2014-12-08 23:28:11', NULL),
(23, 2, 'Prueba', 1, 'Esto es una prueba', 'O', '2014-12-08 23:29:53', '2014-12-08 23:29:53', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `extracto` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `extracto`, `created_at`, `updated_at`, `slug`) VALUES
(1, 'Ensenyament', '', '2014-11-13 23:08:57', '2014-11-15 23:01:53', 'ensenyament'),
(2, 'Ensenyament Llengua Anglesa', '', '2014-11-13 23:08:57', '2014-11-15 23:01:53', 'ensenyament-llengua-anglesa'),
(3, 'Treballs de jardineria', '', '2014-11-13 23:08:57', '2014-11-15 23:01:53', 'treballs-de-jardineria'),
(4, 'Treballs de la llar', '', '2014-11-13 23:08:57', '2014-11-15 23:01:53', 'treballs-de-la-llar'),
(5, 'Ensenyament Llengua Castellana', '', '2014-11-13 23:08:57', '2014-11-15 23:01:53', 'ensenyament-llengua-castellana'),
(6, 'Informática', '', '2014-11-13 23:08:57', '2014-11-15 23:01:54', 'informatica'),
(7, 'Lleure', '', '2014-11-13 23:08:57', '2014-11-15 23:01:54', 'lleure');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `groups_name_unique` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `groups`
--

INSERT INTO `groups` (`id`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'Users', '{"users":1, "users.view":1}', '2014-11-12 16:49:41', '2014-11-12 16:49:41'),
(2, 'Admins', '{"admin":1,"users":1}', '2014-11-12 16:49:41', '2014-11-12 16:49:41'),
(3, 'NoSocis', '', '2014-11-29 16:04:17', '2014-11-29 16:04:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intercambios`
--

CREATE TABLE IF NOT EXISTS `intercambios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pagador_id` int(11) NOT NULL,
  `cobrador_id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `horas` float(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `valoracion` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `intercambios_pagador_id_index` (`pagador_id`),
  KEY `intercambios_cobrador_id_index` (`cobrador_id`),
  KEY `intercambios_categoria_id_index` (`categoria_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `intercambios`
--

INSERT INTO `intercambios` (`id`, `pagador_id`, `cobrador_id`, `categoria_id`, `descripcion`, `horas`, `created_at`, `updated_at`, `valoracion`) VALUES
(1, 2, 1, 2, 'Una muy agradable conversación en ingles. Perfecto.', 1.00, '2014-11-13 19:05:46', '2014-11-13 19:05:46', 0),
(2, 2, 1, 6, 'Me ha ayudado con unos programas que se habían instalado.', 1.25, '2014-11-13 20:24:27', '2014-11-13 20:24:27', 0),
(4, 1, 2, 4, 'M''ha arreglat dues persianes.Una tenia la corda trencada i l''altre no baixava del tot.', 2.00, '2014-11-21 21:11:09', '2014-11-21 21:11:09', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2012_12_06_225921_migration_cartalyst_sentry_install_users', 1),
('2012_12_06_225929_migration_cartalyst_sentry_install_groups', 1),
('2012_12_06_225945_migration_cartalyst_sentry_install_users_groups_pivot', 1),
('2012_12_06_225988_migration_cartalyst_sentry_install_throttle', 1),
('2014_11_10_233723_add_hours_to_users', 2),
('2014_11_12_212345_create_categoria_table', 3),
('2014_11_13_163735_create_intercambios_table', 4),
('2014_11_14_000111_create_anuncios_table', 5),
('2014_11_15_212542_add_slug_to_categorias', 6),
('2014_11_16_112701_create_tallers_table', 7),
('2014_11_16_233633_create_propuestas_table', 8),
('2014_11_17_214913_rename_descripcion_from_categorias', 9),
('2014_11_17_220528_add_softdelete_to_anuncios', 10),
('2014_11_21_174111_add_img_to_users', 11),
('2014_11_22_160750_add_valoracion_to_intercambios', 11),
('2014_11_22_195706_create_noticias_table', 12),
('2014_11_23_234706_add_activado_to_users', 13),
('2014_11_25_221903_add_softdeletes_to_propuestas', 14),
('2014_11_26_205639_create_tareas_table', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `entradilla` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mensaje` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `user_id`, `titulo`, `entradilla`, `mensaje`, `slug`, `created_at`, `updated_at`) VALUES
(1, 1, 'Temps x Aliments, Gran Recapte.', 'Els dies 29 i 30, a Santa Eugènia i Sant Narcís.', '<p>Un any m&eacute;s, el Banc del Temps Pont del Dimoni col&middot;labora en la <strong>Gran Recapte</strong> d&#39;aliments amb el Banc d&#39;aliments de Girona.</p>\r\n\r\n<p>La col&middot;laboraci&oacute; consistir&agrave; a col&middot;locar dos punts de recollida: un a <strong>Santa Eug&egrave;nia</strong> i un altre a <strong>Sant Narc&iacute;s</strong>.</p>\r\n\r\n<p>Necessitem socis voluntaris per ajudar en la recapte. A m&eacute;s, tothom que aquest dia porti aliments, rebr&agrave; <ins>mitja hora</ins> de Temps.</p>\r\n', 'temps-x-aliments-gran-recapte', '2014-11-22 21:10:18', '2014-11-23 17:39:24'),
(2, 1, 'Vídeo del BdT de Bilbao', 'Compartimos este vídeo que han hecho los <a href="http://www.bdtbilbao.org">compañeros de Bilbao</a>', '<div class="video-container">\r\n<iframe width="853" height="480" src="//www.youtube.com/embed/36A1VSArcX8?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>\r\n</div>', 'video-del-bdt-de-bilbao', '2014-11-23 21:22:40', '2014-12-01 22:18:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propuestas`
--

CREATE TABLE IF NOT EXISTS `propuestas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tallerista_id` int(11) NOT NULL,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `duracion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `horario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `min_asistentes` int(11) NOT NULL,
  `max_asistentes` int(11) NOT NULL,
  `espacio` text COLLATE utf8_unicode_ci NOT NULL,
  `material_alumnos` text COLLATE utf8_unicode_ci NOT NULL,
  `material_bdt` text COLLATE utf8_unicode_ci NOT NULL,
  `oyentes` tinyint(1) NOT NULL,
  `img` blob NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `propuestas`
--

INSERT INTO `propuestas` (`id`, `tallerista_id`, `titulo`, `descripcion`, `duracion`, `horario`, `min_asistentes`, `max_asistentes`, `espacio`, `material_alumnos`, `material_bdt`, `oyentes`, `img`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Artesanos del Web', 'Aprenderemos bla bla bla', 'varios meses en sesiones de una hora', '', 0, 0, 'aula de informática', 'ordenador', 'proyector', 1, 0x66656d616c652e706e67, '2014-11-25 23:38:20', '2014-11-25 23:38:20', NULL),
(2, 2, 'Diseño 3D con Blender', 'Conocimientos básicos de renderizado 3D con el software Blender.', '2 horas', '', 0, 0, 'Aula de informática', 'ordenador portatil', 'Proyector y sala con ordenadores para alumnos que no traigan su propio ordenador', 1, 0x736b696e2d646f632d30302e706e67, '2014-12-06 16:52:29', '2014-12-06 16:52:29', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tallers`
--

CREATE TABLE IF NOT EXISTS `tallers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `esgrupo` tinyint(1) NOT NULL,
  `textorepeticion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `lugar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tallerista_id` int(10) unsigned NOT NULL,
  `plazas` int(11) NOT NULL,
  `publicado` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tallers`
--

INSERT INTO `tallers` (`id`, `titulo`, `descripcion`, `esgrupo`, `textorepeticion`, `fecha`, `hora_inicio`, `hora_fin`, `lugar`, `img`, `tallerista_id`, `plazas`, `publicado`, `created_at`, `updated_at`) VALUES
(1, 'Prueba', 'una prueba', 1, 'nunca', '2014-11-30', '08:00:00', '10:00:00', 'No se sabe', 'Evento-Facebook-15min.jpg', 2, 15, 1, '2014-11-22 23:00:00', '2014-11-24 16:41:34'),
(2, 'Prueba', 'probando probando', 1, 'cada semana', '0000-00-00', '18:45:00', '19:45:00', 'Can Ninetes (sala dels miralls)', 'skin-doc-00(1).png', 2, 10, 0, '2014-12-06 17:46:14', '2014-12-06 17:46:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE IF NOT EXISTS `tareas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `autor_id` int(10) unsigned NOT NULL,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dificultad` int(11) NOT NULL,
  `tiempo` int(11) NOT NULL,
  `responsable_id` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `comentario` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`id`, `autor_id`, `titulo`, `descripcion`, `dificultad`, `tiempo`, `responsable_id`, `estado`, `comentario`, `created_at`, `updated_at`) VALUES
(1, 1, 'Que un usuario no pueda pagar más horas de las que tiene', '', 4, 0, 0, 0, 'Entran varias cuestiones, como limitarlo en el controller, en la validación, en el frontend (establecer en la plantilla que ya no tenga la opción de darle a pagar intercambio si no tiene horas).', '2014-11-26 20:36:01', '2014-11-26 22:58:19'),
(2, 1, 'Mejorar la presentación de los talleres', '', 0, 0, 0, 0, '', '2014-11-26 20:37:26', '2014-11-26 20:37:26'),
(3, 1, 'Tachar las tareas completadas', '', 0, 0, 0, 1, '', '2014-11-26 20:42:02', '2014-11-26 20:42:02'),
(4, 1, 'Mejorar la presentación del perfil de los usuarios', '', 0, 0, 0, 0, '', '2014-11-26 21:56:45', '2014-11-26 21:56:45'),
(5, 1, 'Añadir la opción de editar la fotografía del usuario', '', 0, 0, 0, 1, '', '2014-11-26 21:57:08', '2014-11-29 13:08:47'),
(6, 1, 'Añadir la opción de marcar tareas como completadas', '', 0, 0, 0, 1, '', '2014-11-26 22:15:06', '2014-11-26 22:48:48'),
(7, 1, 'Módulo de mensajes', '', 0, 0, 0, 0, '', '2014-11-27 17:43:22', '2014-11-27 17:43:22'),
(8, 1, 'En administración de usuarios, poder filtrar por usuarios no activados.', '', 0, 0, 0, 0, '', '2014-12-01 23:28:24', '2014-12-01 23:28:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `throttle`
--

CREATE TABLE IF NOT EXISTS `throttle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attempts` int(11) NOT NULL DEFAULT '0',
  `suspended` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `last_attempt_at` timestamp NULL DEFAULT NULL,
  `suspended_at` timestamp NULL DEFAULT NULL,
  `banned_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `throttle_user_id_index` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `throttle`
--

INSERT INTO `throttle` (`id`, `user_id`, `ip_address`, `attempts`, `suspended`, `banned`, `last_attempt_at`, `suspended_at`, `banned_at`) VALUES
(1, 1, NULL, 0, 0, 0, NULL, NULL, NULL),
(2, 2, NULL, 0, 0, 0, NULL, NULL, NULL),
(3, 3, NULL, 0, 0, 0, NULL, NULL, NULL),
(4, 4, NULL, 0, 0, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `activation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `persist_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_password_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `horas` decimal(8,2) NOT NULL DEFAULT '3.00',
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'male.png',
  `activado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`),
  KEY `users_activation_code_index` (`activation_code`),
  KEY `users_reset_password_code_index` (`reset_password_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `permissions`, `activated`, `activation_code`, `activated_at`, `last_login`, `persist_code`, `reset_password_code`, `first_name`, `last_name`, `created_at`, `updated_at`, `horas`, `img`, `activado`) VALUES
(1, 'admin@admin.com', 'admin', '$2y$10$Ga4vt70sfgbbwiancSxxoOcCFXF5m0mEUH/ycnlfV0oqupoYwb7sS', NULL, 1, NULL, '2014-12-03 16:47:28', '2014-12-06 17:16:40', '$2y$10$s6Y1EYLb.KIXlTcSrpU6N.uI01Rg4xYjjHhp9PLbFibqsojsWQWO6', NULL, NULL, NULL, '2014-11-12 16:49:41', '2014-12-06 17:16:40', '3.25', 'adminjpg.jpg', 1),
(2, 'user@user.com', 'user', '$2y$10$rM/QfC8dphK0Vocb684Qh.rQbnI0q9Zg355HN6W5tMh0H8XWf3b8u', NULL, 1, NULL, '2014-12-03 16:47:40', '2014-12-08 23:17:36', '$2y$10$3BP4cHhOfedOKhN6FB5BpOYbKUBI.S5WGy/mbXS3SSCpYYzSy6SYu', NULL, 'Usuario', '', '2014-11-12 16:49:41', '2014-12-08 23:17:36', '2.75', 'userjpg.jpg', 0),
(3, 'carlos.ezetateam@gmail.com', 'carlos_ezeta', '$2y$10$QbQm4edsXGepdRJTbxhCIebPXJ7oC9DBGbDhDuOkALgoEytn0eGme', NULL, 1, 'Q8UFN4R2w11dbnmwUMRsFRmCKXuJ0r1yfRPLwBSMab', '2014-12-03 16:47:45', '2014-12-03 16:47:45', '$2y$10$2D6bc5jBAIiBEWY4UsqO2.v3oeidxveCDnekS5ruxZyNNa5oxcGeO', NULL, '', '', '2014-11-23 22:32:52', '2014-11-29 17:51:35', '3.00', '', 0),
(4, 'prueba@gmail.com', 'prueba_reg', '$2y$10$A.vTqn2XuJOJvotPs4lk5O4E/yvXTLXWruHO0iPjkNg2b6k5vIpCK', NULL, 0, 'ny9jHgFj4NyWpyzuChRJbiqLTmje5MUQAv8lm5Ap1i', NULL, NULL, NULL, NULL, NULL, NULL, '2014-12-06 16:42:25', '2014-12-06 16:42:25', '3.00', 'male.png', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `user_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users_groups`
--

INSERT INTO `users_groups` (`user_id`, `group_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(3, 1),
(4, 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
