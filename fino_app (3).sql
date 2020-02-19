-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-07-2016 a las 12:57:19
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `fino_app`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calculadora_calorias`
--

CREATE TABLE IF NOT EXISTS `calculadora_calorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria_id` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL,
  `calorias_por_kcal` float NOT NULL,
  `peso_racion` float NOT NULL,
  `calorias` float NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('active','deleted') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `categoria_id` (`categoria_id`),
  KEY `alimento_id` (`ingredient_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `calculadora_calorias`
--

INSERT INTO `calculadora_calorias` (`id`, `categoria_id`, `ingredient_id`, `calorias_por_kcal`, `peso_racion`, `calorias`, `date_added`, `status`) VALUES
(1, 1, 1, 123, 22, 33, '2016-07-13 01:59:53', 'deleted'),
(2, 1, 1, 123, 22, 33, '2016-07-13 02:01:01', 'active');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calculadora_calorias_diarias`
--

CREATE TABLE IF NOT EXISTS `calculadora_calorias_diarias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nivel_de_actividad` varchar(250) NOT NULL,
  `incremento_nutricional` float NOT NULL,
  `decremento_nutricional` float NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('active','deleted') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`),
  KEY `status` (`status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `calculadora_calorias_diarias`
--

INSERT INTO `calculadora_calorias_diarias` (`id`, `nivel_de_actividad`, `incremento_nutricional`, `decremento_nutricional`, `date_added`, `status`) VALUES
(1, 'asdasd', 2, 3, '2016-07-13 02:01:12', 'active');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calculadora_nutrientes`
--

CREATE TABLE IF NOT EXISTS `calculadora_nutrientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ingredient_id` int(11) NOT NULL,
  `porcion` float NOT NULL,
  `nombre_porcion` varchar(250) NOT NULL,
  `calorias` float NOT NULL,
  `carbohidratos` float NOT NULL,
  `proteinas` float NOT NULL,
  `grasas` float NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('active','deleted') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `alimento_id` (`ingredient_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `calculadora_nutrientes`
--

INSERT INTO `calculadora_nutrientes` (`id`, `ingredient_id`, `porcion`, `nombre_porcion`, `calorias`, `carbohidratos`, `proteinas`, `grasas`, `date_added`, `status`) VALUES
(1, 1, 2, 'asasd', 123, 3, 333, 123, '2016-07-13 02:01:21', 'deleted'),
(2, 1, 2, 'asasd', 123, 3, 333, 123, '2016-07-13 02:02:24', 'deleted'),
(3, 1, 2, 'asasd', 123, 3, 333, 123, '2016-07-13 02:03:02', 'deleted'),
(4, 1, 2, 'asasd', 123, 3, 333, 123, '2016-07-13 02:04:21', 'active');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calculadora_proteinas`
--

CREATE TABLE IF NOT EXISTS `calculadora_proteinas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria_id` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL,
  `proteinas_por_kcal` float NOT NULL,
  `peso_racion` float NOT NULL,
  `proteinas` float NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('active','deleted') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `categoria_id` (`categoria_id`),
  KEY `alimento_id` (`ingredient_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `calculadora_proteinas`
--

INSERT INTO `calculadora_proteinas` (`id`, `categoria_id`, `ingredient_id`, `proteinas_por_kcal`, `peso_racion`, `proteinas`, `date_added`, `status`) VALUES
(1, 1, 1, 22, 233, 123, '2016-07-13 02:04:42', 'active');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('active','deleted') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`),
  KEY `status` (`status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`, `date_added`, `status`) VALUES
(1, 'Categoria1', '2016-07-13 01:59:39', 'active');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('active','deleted') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`),
  KEY `status` (`status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id`, `name`, `date_added`, `status`) VALUES
(1, 'Platos Típicos de Bolivia', '2016-06-18 13:07:16', 'active'),
(2, 'Comida Internacional', '2016-06-18 22:18:18', 'active'),
(3, 'Comida Gourmet', '2016-06-18 22:18:25', 'active'),
(4, 'Maestros de la Parrilla', '2016-06-19 00:48:19', 'active'),
(5, 'asd', '2016-06-19 12:56:48', 'deleted'),
(6, 'Postres', '2016-06-19 13:04:54', 'active'),
(7, 'sadasd', '2016-07-10 18:49:56', 'active');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `food`
--

CREATE TABLE IF NOT EXISTS `food` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `duration` time NOT NULL,
  `photo` varchar(500) NOT NULL,
  `video` varchar(500) NOT NULL,
  `likes` int(11) NOT NULL,
  `recipes` int(11) NOT NULL,
  `type` enum('normal','video') NOT NULL DEFAULT 'normal',
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('active','deleted') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `type` (`type`),
  KEY `category_id` (`category_id`),
  KEY `subcategory_id` (`subcategory_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `food`
--

INSERT INTO `food` (`id`, `category_id`, `subcategory_id`, `name`, `duration`, `photo`, `video`, `likes`, `recipes`, `type`, `date_added`, `status`) VALUES
(1, 1, 2, 'Titulo del plato en Fila simple Título del plato en Fila Doble', '00:00:00', 'sample1.jpg', '', 5, 1, 'normal', '2016-06-18 22:18:04', 'active'),
(2, 1, 3, 'Titulo del plato en Fila simple y doble x', '00:00:00', 'sample2.jpg', '', 4, 0, 'normal', '2016-06-18 22:33:09', 'active'),
(3, 1, 3, 'Titulo del plato en Fila simple y doble', '00:00:00', '', '5S5RY9JOQiY', 5, 0, 'video', '2016-06-19 00:45:04', 'active');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `food_ingredient`
--

CREATE TABLE IF NOT EXISTS `food_ingredient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `food_id` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('active','deleted') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`),
  KEY `food_id` (`food_id`),
  KEY `ingredient_id` (`ingredient_id`),
  KEY `status` (`status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `food_ingredient`
--

INSERT INTO `food_ingredient` (`id`, `food_id`, `ingredient_id`, `quantity`, `date_added`, `status`) VALUES
(1, 2, 2, '0', '2016-06-19 00:38:13', 'active'),
(2, 2, 2, '0', '2016-06-19 00:39:15', 'active'),
(3, 2, 4, '0', '2016-06-19 00:40:10', 'active'),
(4, 3, 1, '0', '2016-06-19 00:45:14', 'active'),
(5, 1, 1, '999', '2016-06-19 11:48:22', 'active'),
(6, 1, 2, '1/2', '2016-07-08 01:35:34', 'active'),
(7, 1, 11, '1', '2016-07-08 01:37:12', 'active'),
(8, 1, 3, '1/2', '2016-07-08 01:37:12', 'active'),
(9, 1, 4, '1', '2016-07-08 01:37:12', 'active'),
(10, 1, 5, '2', '2016-07-08 01:37:12', 'active'),
(11, 1, 6, '1', '2016-07-08 01:37:12', 'active'),
(12, 1, 7, '2', '2016-07-08 01:37:12', 'active'),
(13, 1, 8, '1', '2016-07-08 01:37:12', 'active'),
(14, 1, 9, '1', '2016-07-08 01:37:12', 'active'),
(15, 1, 10, '4', '2016-07-08 01:37:12', 'active');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `food_step`
--

CREATE TABLE IF NOT EXISTS `food_step` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `food_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('active','deleted') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `food_id` (`food_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `food_step`
--

INSERT INTO `food_step` (`id`, `food_id`, `name`, `description`, `date_added`, `status`) VALUES
(1, 1, 'Paso 1', 'primero ir al mercado', '2016-06-19 00:37:21', 'active'),
(2, 1, 'Paso 2', 'cocinar', '2016-06-19 00:37:21', 'active'),
(3, 2, 'bb', 'aa1', '2016-06-19 00:38:21', 'active');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `food_step_media`
--

CREATE TABLE IF NOT EXISTS `food_step_media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `food_step_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `image` varchar(250) NOT NULL,
  `video` varchar(250) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('active','deleted') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`),
  KEY `food_id` (`food_id`),
  KEY `step_id` (`food_step_id`),
  KEY `status` (`status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `food_step_media`
--

INSERT INTO `food_step_media` (`id`, `food_step_id`, `food_id`, `image`, `video`, `date_added`, `status`) VALUES
(1, 1, 0, 'Chef-START-PAGE.jpg', '', '2016-06-19 00:37:21', 'active'),
(2, 2, 0, 'Chef_02_Family_Dinner_-FINAL_0.jpg', '', '2016-06-19 00:37:21', 'active'),
(3, 2, 0, 'Chef_02_Family_Dinner_-FINAL.jpg', '', '2016-06-19 00:37:40', 'active'),
(4, 2, 0, 'tips-de-higiene.jpg', '', '2016-07-07 10:19:40', 'active'),
(5, 2, 0, '', '5S5RY9JOQiY', '2016-07-10 12:54:54', 'active');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredient`
--

CREATE TABLE IF NOT EXISTS `ingredient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('active','deleted') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `unit_id` (`unit_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `ingredient`
--

INSERT INTO `ingredient` (`id`, `unit_id`, `name`, `date_added`, `status`) VALUES
(1, 3, 'pollo entero', '2016-06-18 13:12:18', 'active'),
(2, 3, 'taza de sal', '2016-06-18 13:15:52', 'active'),
(3, 11, 'taza de azúcar', '2016-06-18 21:28:46', 'active'),
(4, 1, 'limón', '2016-06-19 00:40:06', 'active'),
(5, 3, 'cucharadas de miel', '2016-06-19 00:40:46', 'active'),
(6, 3, 'cucharada de mostaza', '2016-06-19 01:08:28', 'active'),
(7, 3, 'cucharadas de salsa de soya', '2016-07-08 01:32:22', 'active'),
(8, 3, 'cucharadas de aceite de oliva', '2016-07-08 01:32:34', 'active'),
(9, 3, 'ramita de tomillo fresco', '2016-07-08 01:32:47', 'active'),
(10, 3, 'dientes de ajo, enteros', '2016-07-08 01:32:57', 'active'),
(11, 3, 'cucharadita de pimienta', '2016-07-08 01:35:49', 'active');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medidas`
--

CREATE TABLE IF NOT EXISTS `medidas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ingredient_id` int(11) NOT NULL,
  `cantidad` float NOT NULL,
  `unit_id_2` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('active','deleted') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `unit_id_2` (`unit_id_2`),
  KEY `ingredient_id` (`ingredient_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `medidas`
--

INSERT INTO `medidas` (`id`, `ingredient_id`, `cantidad`, `unit_id_2`, `date_added`, `status`) VALUES
(1, 1, 1, 3, '2016-07-15 01:37:04', 'active');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medidas_caseras`
--

CREATE TABLE IF NOT EXISTS `medidas_caseras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria_id` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL,
  `cantidad` float NOT NULL,
  `unit_id_2` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('active','deleted') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `categoria_1` (`categoria_id`),
  KEY `unit_id_2` (`unit_id_2`),
  KEY `ingredient_id` (`ingredient_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `medidas_caseras`
--

INSERT INTO `medidas_caseras` (`id`, `categoria_id`, `ingredient_id`, `cantidad`, `unit_id_2`, `date_added`, `status`) VALUES
(1, 1, 2, 1, 3, '2016-07-15 01:39:13', 'active');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategory`
--

CREATE TABLE IF NOT EXISTS `subcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('active','deleted') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `status` (`status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `subcategory`
--

INSERT INTO `subcategory` (`id`, `category_id`, `name`, `date_added`, `status`) VALUES
(1, 1, 'test', '2016-07-10 18:49:19', 'active'),
(2, 7, 'asd', '2016-07-10 18:49:56', 'active'),
(3, 1, 'test2', '2016-07-10 18:51:01', 'active'),
(4, 2, 'test1', '2016-07-10 21:42:53', 'active'),
(5, 3, 'test2', '2016-07-10 21:42:59', 'active'),
(6, 4, 'test3', '2016-07-10 21:43:04', 'active'),
(7, 6, 'test4', '2016-07-10 21:43:14', 'active');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tip`
--

CREATE TABLE IF NOT EXISTS `tip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tip_category_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(500) NOT NULL,
  `content` text NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('active','deleted') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `tip_category_id` (`tip_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `tip`
--

INSERT INTO `tip` (`id`, `tip_category_id`, `title`, `content`, `date_added`, `status`) VALUES
(2, 2, 'asd', '<p>asd</p>', '2016-07-02 13:32:54', 'active'),
(4, 3, 'Tip 2', '<p>asdasd</p>', '2016-07-02 15:56:38', 'active'),
(5, 3, 'Tip 3', '<p>tesadasdasd&nbsp;</p>', '2016-07-02 15:56:38', 'active'),
(7, 1, 'Como evitar que la cascara de la papa se rompa al cocer', '<h4><span style="color: rgb(255, 0, 0);">Paso 1</span></h4><p>Lorem ipsum dolor et sit amet, conserterum</p><p><span class="f-img-wrap"><img alt="Image title" src="http://localhost/fino_app/admin/uploads/tip/082be44f751eaeacf238b16cb4168f84278cf28c.jpg" width="300" style="min-width: 16px; min-height: 16px; margin-bottom: 10px; margin-left: auto; margin-right: auto; margin-top: 10px"></span></p><p>test another</p>', '2016-07-02 15:57:04', 'active'),
(9, 4, 'Tip1', '<p>contenido</p>', '2016-07-05 02:27:18', 'active'),
(10, 5, 'Tip', '<p>contenido</p>', '2016-07-05 02:27:27', 'active'),
(11, 6, 'Tip', '<p>contenido</p>', '2016-07-05 02:27:41', 'active'),
(12, 7, 'Tip', '<p>contenido</p>', '2016-07-05 02:27:51', 'active'),
(13, 8, 'Tip', '<p>contenido</p>', '2016-07-05 02:28:35', 'active'),
(14, 9, 'Tip', '<p>contenido</p><p></p>', '2016-07-05 02:31:19', 'active'),
(15, 10, 'Tip', '<p>contenido</p>', '2016-07-05 02:31:27', 'active'),
(16, 11, 'Tip', '<p>contenido</p>', '2016-07-05 02:31:37', 'active');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tip_category`
--

CREATE TABLE IF NOT EXISTS `tip_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('active','deleted') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`),
  KEY `status` (`status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `tip_category`
--

INSERT INTO `tip_category` (`id`, `title`, `image`, `date_added`, `status`) VALUES
(1, 'Tips de Cocina', 'tips-de-cocina.jpg', '2016-07-02 12:33:59', 'active'),
(2, 'aasd', 'fino-button.png', '2016-07-02 13:32:46', 'deleted'),
(3, 'Tips de Higiene', 'tips-de-higiene.jpg', '2016-07-02 15:23:06', 'active'),
(4, 'Tips para Compras', 'tips-de-compras.jpg', '2016-07-05 02:25:54', 'active'),
(5, 'Tips Especiales', 'tips-especiales.jpg', '2016-07-05 02:26:09', 'active'),
(7, 'Tips de Parrilla', 'tips-de-parrilla.jpg', '2016-07-05 02:28:35', 'active'),
(8, 'Tips de Salud', 'tips-de-salud.jpg', '2016-07-05 02:26:21', 'active'),
(11, 'Tips Fino', 'tips-fino.jpg', '2016-07-05 02:26:30', 'active');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unit`
--

CREATE TABLE IF NOT EXISTS `unit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `measure` enum('ml','gr','unit','alimento') NOT NULL,
  `value` float NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('active','deleted') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `measure` (`measure`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `unit`
--

INSERT INTO `unit` (`id`, `name`, `measure`, `value`, `date_added`, `status`) VALUES
(1, 'Litro', 'gr', 1, '2016-06-18 13:10:14', 'active'),
(3, 'Kilogramo', 'gr', 1000, '2016-06-18 13:15:48', 'active'),
(4, 'asda1', '', 0, '2016-06-18 21:27:58', 'deleted'),
(5, '123', '', 0, '2016-06-18 21:28:42', 'deleted'),
(6, '', '', 0, '2016-06-18 21:49:20', 'deleted'),
(7, 'asd', '', 0, '2016-06-19 00:40:40', 'deleted'),
(8, 'test', '', 0, '2016-06-19 00:48:03', 'deleted'),
(9, 'test', '', 0, '2016-06-19 00:49:29', 'deleted'),
(10, 'asd', '', 0, '2016-06-19 01:08:15', 'deleted'),
(11, 'Taza', 'gr', 120, '2016-06-19 13:27:54', 'active'),
(12, '1/2 Taza', 'gr', 60, '2016-06-19 13:28:55', 'active');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(250) NOT NULL,
  `ci` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(500) NOT NULL,
  `photo` text NOT NULL,
  `role` enum('sadmin','admin','userapp','userweb') NOT NULL DEFAULT 'admin',
  `token` varchar(500) NOT NULL,
  `app_id` varchar(500) NOT NULL,
  `device` enum('android','ios') NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('active','inactive','deleted','blocked') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `device` (`device`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `ci`, `phone`, `address`, `photo`, `role`, `token`, `app_id`, `device`, `date_added`, `status`) VALUES
(1, 'Admin', 'Admin', 'admin@gmail.com', 'a7a1884b073673a9c955aab9ab489759', '', '', '', '', 'sadmin', '', '', '', '2016-06-16 23:51:31', 'active'),
(20, '', '', 'sisjosex@gmail.com', 'a4ad866772fbbfbef23e6d9b770a56d3', '', '', '', '', 'userapp', '', '123', '', '2016-07-10 01:23:54', 'inactive');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_favorite`
--

CREATE TABLE IF NOT EXISTS `user_favorite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('active','deleted') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`),
  KEY `food_id` (`food_id`),
  KEY `user_id` (`user_id`),
  KEY `status` (`status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `user_favorite`
--

INSERT INTO `user_favorite` (`id`, `user_id`, `food_id`, `date_added`, `status`) VALUES
(8, 12, 3, '2016-07-07 02:02:16', 'active'),
(9, 12, 2, '2016-07-07 02:34:31', 'active'),
(10, 12, 1, '2016-07-09 02:29:58', 'active'),
(11, 0, 2, '2016-07-10 16:12:32', 'active'),
(12, 1, 2, '2016-07-10 17:40:01', 'active'),
(13, 1, 1, '2016-07-10 17:40:13', 'active'),
(14, 1, 3, '2016-07-10 17:42:29', 'active'),
(15, 20, 3, '2016-07-10 18:03:27', 'active'),
(16, 20, 1, '2016-07-11 00:10:27', 'active');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_recipe`
--

CREATE TABLE IF NOT EXISTS `user_recipe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `portions` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `direccion` text NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('active','deleted') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`),
  KEY `food_id` (`food_id`),
  KEY `user_id` (`user_id`),
  KEY `status` (`status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `user_recipe`
--

INSERT INTO `user_recipe` (`id`, `user_id`, `food_id`, `portions`, `fecha`, `hora`, `direccion`, `date_added`, `status`) VALUES
(1, 8, 2, 0, '0000-00-00', '00:00:00', '', '2016-06-19 12:27:15', 'active'),
(2, 8, 2, 0, '0000-00-00', '00:00:00', '', '2016-06-19 12:27:20', 'active'),
(3, 11, 2, 0, '0000-00-00', '00:00:00', '', '2016-06-19 13:01:26', 'active'),
(4, 20, 1, 1, '0000-00-00', '00:00:00', '', '2016-07-11 00:09:06', 'active');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
