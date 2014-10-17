-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 08-10-2014 a las 14:29:50
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
  `DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `ID_GALLERY` (`ID_GALLERY`,`ID_USER`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `comment`
--

INSERT INTO `comment` (`ID_GALLERY`, `ID_USER`, `COMMENT`, `DATE`) VALUES
(0, 0, 'c', '2014-07-13 23:47:09');

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
  UNIQUE KEY `TITLE_2` (`TITLE`),
  UNIQUE KEY `URL` (`URL`),
  KEY `TITLE` (`TITLE`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `gallery`
--

INSERT INTO `gallery` (`ID`, `OWNER`, `TITLE`, `TYPEMEDIA`, `INFOMEDIA`, `URL`, `DATE`, `TAG`, `N_MORE`, `N_LESS`, `N_COMMENT`, `COMMENT_ADDITIONAL`, `META`, `CENSURA`, `STATE`) VALUES
(7, 0, 'cosasa', 0, '<img class="post-media img-thumbnail" src="http://localhost:8080/memetomia/media/article/jUiRlAD.jpg" alt="cosasa">', 'jUiRlAD.jpg', '2014-08-07 17:06:59', '["etiqueta1","etiqueta 2","eitqueta 3"]', 1, 0, 0, '', '', 0, 0),
(8, 0, 'titulo', 0, '<img class="post-media img-thumbnail" src="http://localhost:8080/Website/media/article/fav1.png" alt="titulo">', 'fav1.png', '2014-09-07 17:26:14', '["corazon","algo","boenito"]', 9, 0, 0, '', '', 1, 0),
(9, 0, 'YdZ3FXHdKuU', 1, 'https://www.youtube.com/embed/yb7g7dfv0kc', 'http://img.youtube.com/vi/YdZ3FXHdKuU/maxresdefault.jpg', '2014-08-08 15:46:45', '[]', 6, 0, 0, '', '', 0, 0),
(10, 0, 'vine', 2, '<video class="Vine" autoplay loop preload="auto" src="https://v.cdn.vine.co/r/videos/CBBAE5C3741084627082752978944_21f03ed0169.0.3.1032442651813206051.mp4?versionId=8nwHMw_cD_NlVMji4rD6rWVqf_3nCfKZ" style="width:100%"></video>', 'https://v.cdn.vine.co/r/thumbs/46B23C3BB91084627087769432064_2.0.3.1032442651813206051.mp4.jpg?versionId=Woob3BUJHmxQYcuOAXq22p82fybFDEeL', '2014-08-31 16:58:16', '[]', 6, 0, 0, '', '', 0, 0),
(15, 0, 'titulo nuevo video youtube', 1, '<iframe id="iframe" width="430" height="315" src="//www.youtube.com/embed/BashkKR08qo?autoplay=1&amp;controls=1&amp;iv_load_policy=3" frameborder="0" allowfullscreen></iframe>', 'http://img.youtube.com/vi/BashkKR08qo/0.jpg', '2014-08-08 20:32:38', '["wqeqweq","weqweqwr","sadasda","dffdgdfs"]', 19, 0, 0, '<img src="http://localhost:8080/Website/media/default/MemePredeterminado.jpg" height="467" width="460" class="img-thumbnail">', '<meta property="og:type" content="video"><meta property="twitter:card" content="player">\n<meta property = "twitter:player:width" content = "435">\n<meta property = "twitter:player:height" content = "435">\n<meta property = "twitter:player" content ="https://www.youtube.com/embed/BashkKR08qo">\n<meta property = "og:video" content ="https://www.youtube.com/embed/BashkKR08qo">', 0, 0),
(16, 0, 'jaivic nuevo', 0, '<img class="post-media img-thumbnail" src="http://localhost/Website/media/article/ArticlePredeterminado.jpg" alt="jaivic nuevo">', 'ArticlePredeterminado.jpg', '2014-09-29 01:35:50', '["entre otras ","blablabla"]', 3, 0, 0, '', '<meta property="og:type" content="photo"><meta property="twitter:card" content="photo"><meta name="twitter:title" content="" /><meta name="twitter:image" content="http://localhost/Website/media/article/ArticlePredeterminado.jpg" /><meta name="twitter:url" content="http://localhost/Website/media/article/ArticlePredeterminado.jpg" />', 0, 0),
(17, 0, 'dasfdfsfer wer', 0, '<img class="post-media img-thumbnail" src="http://localhost/Website/media/article/post1.jpg" alt="dasfdfsfer wer">', 'post1.jpg', '2014-09-29 01:35:49', '["erwrwe"]', 0, 0, 0, '', '<meta property="og:type" content="photo"><meta property="twitter:card" content="photo"><meta name="twitter:title" content="" /><meta name="twitter:image" content="http://localhost/Website/media/article/post1.jpg" /><meta name="twitter:url" content="http://localhost/Website/media/article/post1.jpg" />', 0, 0),
(18, 0, 'ewqrwerqwereqwr er qwrqwer', 0, '<img class="post-media img-thumbnail" src="http://localhost/Website/media/article/MemePredeterminado.jpg" alt="ewqrwerqwereqwr er qwrqwer">', 'MemePredeterminado.jpg', '2014-09-29 01:35:48', '[]', 0, 0, 0, '', '<meta property="og:type" content="photo"><meta property="twitter:card" content="photo"><meta name="twitter:title" content="" /><meta name="twitter:image" content="http://localhost/Website/media/article/MemePredeterminado.jpg" /><meta name="twitter:url" content="http://localhost/Website/media/article/MemePredeterminado.jpg" />', 0, 0),
(19, 0, 'grandfantasia', 0, '<img class="post-media img-thumbnail" src="http://localhost/Website/media/article/post2.jpg" alt="grandfantasia">', 'post2.jpg', '2014-09-29 00:27:33', '[]', 0, 0, 0, '', '<meta property="og:type" content="photo"><meta property="twitter:card" content="photo"><meta name="twitter:title" content="" /><meta name="twitter:image" content="http://localhost/Website/media/article/post2.jpg" /><meta name="twitter:url" content="http://localhost/Website/media/article/post2.jpg" />', 1, 0);

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
(8, 10, 0),
(8, 11, 0),
(8, 12, 0),
(15, 17, 0),
(15, 18, 0),
(15, 19, 0),
(15, 20, 0),
(16, 21, 0),
(16, 22, 0),
(17, 23, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Volcado de datos para la tabla `meme`
--

INSERT INTO `meme` (`ID`, `NAME`, `URL`, `COUNT`, `STATE`) VALUES
(4, 'niña llorando', '1017535_10152426125439438_7869903852508330077_n.jpg', 0, 0),
(5, 'asco', '15650_523924374346764_858061345_n.jpg', 0, 0),
(6, 'chica del telefono', 'chica_del_telefono.jpg', 0, 0),
(7, 'jackie chan', '1511598_10152296787603774_579420375_n.jpg', 0, 0),
(8, 'besame', 'besameeee.jpg', 0, 0),
(9, 'hora de aventura "ohhhh"', '10173642_10202404808856041_1163638034_n.jpg', 0, 0),
(10, 'no me digas', '1006218_594577307230912_1431532286_n (2).jpg', 0, 0),
(11, 'yo se lo meto', 'yo se lo meto.jpg', 0, 0),
(12, 'ultra gay', 'ultra_gay.png', 0, 0),
(13, 'gif patricio estrella y britnei', 'surprised-patrick-meme-xfactor-britney.gif', 0, 0),
(14, 'surprised rainbow face', 'surprised-rainbow-face-l.png', 0, 0),
(15, 'calmate bro', 'nLi9qiU.jpg', 0, 0),
(16, 'injusticia', 'BSg8sMa.gif', 0, 0),
(17, 'caidas menos 2', 'C3N2txf.gif', 0, 0),
(18, 'argumento invalid', 'fVkc3qi.gif', 0, 0),
(19, 'gif de barnie exito', 'jr4kGB1.gif', 0, 0),
(21, 'its somethig', 'jUiRlAD.jpg', 0, 0),
(23, 'Gif Risas señor de los anillos', 'amXDR06_460sa_v1.gif', 0, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Volcado de datos para la tabla `tag`
--

INSERT INTO `tag` (`ID`, `NAME`, `COUNT`, `VISIT`) VALUES
(4, 'nueva eitqueta', 0, 0),
(5, 'una', 1, 0),
(6, 'dos', 1, 0),
(7, '3', 1, 0),
(8, '4', 1, 0),
(9, 'r', 1, 0),
(10, 'corazon', 1, 0),
(11, 'algo', 1, 0),
(12, 'boenito', 1, 0),
(13, 'sdasd', 1, 0),
(14, 'wqeqwe', 1, 0),
(15, 'asdasda', 1, 0),
(16, 'qweqweq', 1, 0),
(17, 'wqeqweq', 1, 0),
(18, 'weqweqwr', 1, 0),
(19, 'sadasda', 1, 0),
(20, 'dffdgdfs', 1, 0),
(21, 'entre otras ', 1, 0),
(22, 'blablabla', 1, 0),
(23, 'erwrwe', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `FBID` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ID DE FACEBOOK',
  `NAME` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `EMAIL` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `PICTURE` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'IMAGEN DEUSUARIO',
  `VERIFY` tinyint(3) unsigned NOT NULL COMMENT 'SI VERIFICO CORREO',
  `USER` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `PASS` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`ID`, `FBID`, `NAME`, `EMAIL`, `PICTURE`, `VERIFY`, `USER`, `PASS`) VALUES
(0, '', 'Admin', '', '', 1, 'Admin', ''),
(12, '', 'jaivic', 'jaivicx10a@gmail.com', '', 1, 'jaivic', '5c38bad31604f72f4a1522e32423e39d'),
(15, '', 'sura', 'suranaigle@gmail.com', '', 0, 'sura', '5ec0b6355d9a5fdb2996c5b9950cc1c6'),
(16, '', 'prueba', 'prueba@gmail.com', '', 0, 'prueba', '5c38bad31604f72f4a1522e32423e39d'),
(17, '', 'jaivicddd', 'asdfsda@fdsafsd.com', '', 0, 'jaivicddd', 'b9c1b237f9fc92b7c84ed587fd73399f');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_gallery`
--

CREATE TABLE IF NOT EXISTS `user_gallery` (
  `ID_USER` int(10) unsigned NOT NULL,
  `ID_GALLARY` int(10) unsigned NOT NULL,
  `INFO_IMAGEN` tinyint(3) unsigned NOT NULL COMMENT '0:VISTA;1:MENOS;2:MAS;3:FAV;4:AMBOS',
  `DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `ID_USER` (`ID_USER`,`ID_GALLARY`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user_gallery`
--

INSERT INTO `user_gallery` (`ID_USER`, `ID_GALLARY`, `INFO_IMAGEN`, `DATE`) VALUES
(1, 1, 0, '2014-07-14 01:25:14');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `gallery_tag`
--
ALTER TABLE `gallery_tag`
  ADD CONSTRAINT `gallery_tag_ibfk_1` FOREIGN KEY (`ID_GALLERY`) REFERENCES `gallery` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gallery_tag_ibfk_2` FOREIGN KEY (`ID_TAG`) REFERENCES `tag` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
