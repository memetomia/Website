-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-12-2014 a las 01:29:19
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `gallery`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `ID_GALLERY` int(10) unsigned NOT NULL,
  `ID_USER` int(10) unsigned NOT NULL,
  `COMMENT` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `SEE_IT_BY_OWNER` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `ID_GALLERY` (`ID_GALLERY`),
  KEY `ID_USER` (`ID_USER`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'INDEX',
  `OWNER` int(10) unsigned NOT NULL DEFAULT '0',
  `TITLE` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'TITULO DEL CHISTE',
  `TYPEMEDIA` tinyint(3) unsigned NOT NULL COMMENT 'TIPO DE MEDIA SI ES VIDEO IMAGEN VINE O GIF;0:imagen;1;gif;2:youtube;',
  `INFOMEDIA` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'HTML PARA INCRUSTRAR EN CHISTE POR EJMPLO UN VIDEO DE YOUTUBE',
  `URL` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'URL DE LA IMAGEN DE PREVISUALIZACION',
  `DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `TAG` text COLLATE utf8_unicode_ci NOT NULL,
  `N_MORE` int(10) unsigned NOT NULL,
  `N_LESS` int(10) unsigned NOT NULL,
  `N_COMMENT` int(10) unsigned NOT NULL,
  `COMMENT_ADDITIONAL` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'COMENTARIO Y MEMES QUE SE INCRUSTARA ',
  `META` text COLLATE utf8_unicode_ci NOT NULL,
  `CENSURA` tinyint(3) unsigned NOT NULL,
  `STATE` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `URL` (`URL`),
  UNIQUE KEY `TITLE` (`TITLE`),
  KEY `OWNER` (`OWNER`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `gallery`
--

INSERT INTO `gallery` (`ID`, `OWNER`, `TITLE`, `TYPEMEDIA`, `INFOMEDIA`, `URL`, `DATE`, `TAG`, `N_MORE`, `N_LESS`, `N_COMMENT`, `COMMENT_ADDITIONAL`, `META`, `CENSURA`, `STATE`) VALUES
(1, 0, 'primer titulo', 0, '<img class="post-media img-thumbnail" src="http://localhost/Website/media/article/15650_523924374346764_858061345_n.jpg" alt="primer titulo">', '15650_523924374346764_858061345_n.jpg', '2014-12-08 01:29:35', '[]', 0, 0, 0, 'holaaa', '<meta property="og:type" content="photo"><meta property="twitter:card" content="photo"><meta name="twitter:title" content="primer titulo" /><meta name="twitter:image" content="http://localhost/Website/media/article/15650_523924374346764_858061345_n.jpg" /><meta name="twitter:url" content="http://localhost/Website/media/article/15650_523924374346764_858061345_n.jpg" />', 0, 0),
(2, 0, 'otroas', 0, '<img class="post-media img-thumbnail" src="http://localhost/Website/media/article/1006218_594577307230912_1431532286_n_(2).jpg" alt="otroas">', '1006218_594577307230912_1431532286_n_(2).jpg', '2014-12-08 01:32:57', '[]', 0, 0, 0, '', '<meta property="og:type" content="photo"><meta property="twitter:card" content="photo"><meta name="twitter:title" content="otroas" /><meta name="twitter:image" content="http://localhost/Website/media/article/1006218_594577307230912_1431532286_n_(2).jpg" /><meta name="twitter:url" content="http://localhost/Website/media/article/1006218_594577307230912_1431532286_n_(2).jpg" />', 0, 0),
(3, 0, 'sin cuenta', 0, '<img class="post-media img-thumbnail" src="http://localhost/Website/media/article/1017535_10152426125439438_7869903852508330077_n.jpg" alt="sin cuenta">', '1017535_10152426125439438_7869903852508330077_n.jpg', '2014-12-08 14:48:58', '["algo"]', 0, 0, 0, '', '<meta property="og:type" content="photo"><meta property="twitter:card" content="photo"><meta name="twitter:title" content="sin cuenta" /><meta name="twitter:image" content="http://localhost/Website/media/article/1017535_10152426125439438_7869903852508330077_n.jpg" /><meta name="twitter:url" content="http://localhost/Website/media/article/1017535_10152426125439438_7869903852508330077_n.jpg" />', 0, 0),
(6, 0, 'prueba', 0, '', '4897.jpg', '2014-12-08 22:28:49', '["et"]', 0, 0, 0, '', '', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gallery_tag`
--

CREATE TABLE IF NOT EXISTS `gallery_tag` (
  `ID_GALLERY` int(10) unsigned NOT NULL,
  `ID_TAG` int(10) unsigned NOT NULL,
  `PESO` tinyint(3) unsigned NOT NULL DEFAULT '0',
  UNIQUE KEY `ID_GALLERY_2` (`ID_GALLERY`,`ID_TAG`),
  KEY `ID_GALLERY` (`ID_GALLERY`),
  KEY `ID_TAG` (`ID_TAG`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Volcado de datos para la tabla `gallery_tag`
--

INSERT INTO `gallery_tag` (`ID_GALLERY`, `ID_TAG`, `PESO`) VALUES
(3, 1, 0),
(6, 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `meme`
--

CREATE TABLE IF NOT EXISTS `meme` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NAME` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `URL` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `COUNT` int(10) unsigned NOT NULL,
  `STATE` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `NAME` (`NAME`,`URL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NAME` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `URL` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `COUNT` int(10) unsigned NOT NULL,
  `STATE` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `NAME` (`NAME`,`URL`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `page`
--

INSERT INTO `page` (`ID`, `NAME`, `URL`, `COUNT`, `STATE`) VALUES
(1, 'cuanta razon', 'http://cuantarazon.com', 0, 0),
(2, 'Cuanto Gato', 'http://www.cuantogato.com/ ', 1, 0),
(3, 'aplus', 'http://aplus.com/', 0, 0),
(4, 'cuanto meme', 'http://cuantomeme.blogspot.com/', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID DE LA ETIQUETA',
  `NAME` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'NOMBRE DE LA ETIQUETA',
  `COUNT` int(10) unsigned NOT NULL COMMENT 'NUMERO DE VECES QUE SE HA USADO ESTA ETIQUETA',
  `VISIT` int(10) unsigned NOT NULL COMMENT 'NUMERO DE VISITA QUE SE HA HECHO A LA ETIQUETA',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `NAME` (`NAME`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tag`
--

INSERT INTO `tag` (`ID`, `NAME`, `COUNT`, `VISIT`) VALUES
(1, 'algo', 1, 0),
(2, 'et', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `FBID` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ID DE FACEBOOK',
  `NAME` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `GENERO` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `EMAIL` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `PICTURE` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'IMAGEN DEUSUARIO',
  `VERIFY` tinyint(3) unsigned NOT NULL COMMENT 'SI VERIFICO CORREO',
  `USER` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `PASS` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `FECHA` date NOT NULL,
  `CHECKVIDEO` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `CHECKGIF` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `PAIS` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ACERCADETI` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`ID`, `FBID`, `NAME`, `GENERO`, `EMAIL`, `PICTURE`, `VERIFY`, `USER`, `PASS`, `FECHA`, `CHECKVIDEO`, `CHECKGIF`, `PAIS`, `ACERCADETI`) VALUES
(0, '', 'Admin', 0, '', 'media/default/profile-example.jpg', 1, 'Admin', '', '0000-00-00', 0, 0, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_gallery`
--

CREATE TABLE IF NOT EXISTS `user_gallery` (
  `ID_USER` int(10) unsigned NOT NULL,
  `ID_GALLARY` int(10) unsigned NOT NULL,
  `INFO_IMAGEN` tinyint(3) unsigned NOT NULL COMMENT '0:VISTA;1:MENOS;2:MAS;3:FAV;4:AMBOS',
  `SEE_IT_BY_OWNER` tinyint(3) unsigned NOT NULL,
  `DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `ID_GALLARY` (`ID_GALLARY`),
  KEY `ID_USER` (`ID_USER`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`ID_GALLERY`) REFERENCES `gallery` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `gallery_ibfk_1` FOREIGN KEY (`OWNER`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `gallery_tag`
--
ALTER TABLE `gallery_tag`
  ADD CONSTRAINT `gallery_tag_ibfk_1` FOREIGN KEY (`ID_GALLERY`) REFERENCES `gallery` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gallery_tag_ibfk_2` FOREIGN KEY (`ID_TAG`) REFERENCES `tag` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `user_gallery`
--
ALTER TABLE `user_gallery`
  ADD CONSTRAINT `user_gallery_ibfk_1` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_gallery_ibfk_2` FOREIGN KEY (`ID_GALLARY`) REFERENCES `gallery` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
