-- phpMyAdmin SQL Dump
-- version 4.2.8
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2014 at 05:10 PM
-- Server version: 5.6.20
-- PHP Version: 5.4.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `ID_GALLERY` int(10) unsigned NOT NULL,
  `ID_USER` int(10) unsigned NOT NULL,
  `COMMENT` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `SEE_IT_BY_OWNER` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
`ID` int(10) unsigned NOT NULL COMMENT 'INDEX',
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
  `STATE` tinyint(3) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`ID`, `OWNER`, `TITLE`, `TYPEMEDIA`, `INFOMEDIA`, `URL`, `DATE`, `TAG`, `N_MORE`, `N_LESS`, `N_COMMENT`, `COMMENT_ADDITIONAL`, `META`, `CENSURA`, `STATE`) VALUES
(1, 0, 'primer titulo', 0, '<img class="post-media img-thumbnail" src="http://localhost/Website/media/article/15650_523924374346764_858061345_n.jpg" alt="primer titulo">', '15650_523924374346764_858061345_n.jpg', '2014-12-08 01:29:35', '[]', 0, 0, 0, 'holaaa', '<meta property="og:type" content="photo"><meta property="twitter:card" content="photo"><meta name="twitter:title" content="primer titulo" /><meta name="twitter:image" content="http://localhost/Website/media/article/15650_523924374346764_858061345_n.jpg" /><meta name="twitter:url" content="http://localhost/Website/media/article/15650_523924374346764_858061345_n.jpg" />', 0, 0),
(2, 0, 'otroas', 0, '<img class="post-media img-thumbnail" src="http://localhost/Website/media/article/1006218_594577307230912_1431532286_n_(2).jpg" alt="otroas">', '1006218_594577307230912_1431532286_n_(2).jpg', '2014-12-08 01:32:57', '[]', 0, 0, 0, '', '<meta property="og:type" content="photo"><meta property="twitter:card" content="photo"><meta name="twitter:title" content="otroas" /><meta name="twitter:image" content="http://localhost/Website/media/article/1006218_594577307230912_1431532286_n_(2).jpg" /><meta name="twitter:url" content="http://localhost/Website/media/article/1006218_594577307230912_1431532286_n_(2).jpg" />', 0, 0),
(3, 0, 'sin cuenta', 0, '<img class="post-media img-thumbnail" src="http://localhost/Website/media/article/1017535_10152426125439438_7869903852508330077_n.jpg" alt="sin cuenta">', '1017535_10152426125439438_7869903852508330077_n.jpg', '2014-12-08 14:48:58', '["algo"]', 0, 0, 0, '', '<meta property="og:type" content="photo"><meta property="twitter:card" content="photo"><meta name="twitter:title" content="sin cuenta" /><meta name="twitter:image" content="http://localhost/Website/media/article/1017535_10152426125439438_7869903852508330077_n.jpg" /><meta name="twitter:url" content="http://localhost/Website/media/article/1017535_10152426125439438_7869903852508330077_n.jpg" />', 0, 0),
(6, 0, 'prueba', 0, '', '4897.jpg', '2014-12-08 22:28:49', '["et"]', 0, 0, 0, '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gallery_tag`
--

CREATE TABLE IF NOT EXISTS `gallery_tag` (
  `ID_GALLERY` int(10) unsigned NOT NULL,
  `ID_TAG` int(10) unsigned NOT NULL,
  `PESO` tinyint(3) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `gallery_tag`
--

INSERT INTO `gallery_tag` (`ID_GALLERY`, `ID_TAG`, `PESO`) VALUES
(3, 1, 0),
(6, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `meme`
--

CREATE TABLE IF NOT EXISTS `meme` (
`ID` int(10) unsigned NOT NULL,
  `NAME` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `URL` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `COUNT` int(10) unsigned NOT NULL,
  `STATE` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
`ID` int(10) unsigned NOT NULL,
  `NAME` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `URL` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `COUNT` int(10) unsigned NOT NULL,
  `STATE` tinyint(3) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`ID`, `NAME`, `URL`, `COUNT`, `STATE`) VALUES
(1, 'cuanta razon', 'http://cuantarazon.com', 0, 0),
(2, 'Cuanto Gato', 'http://www.cuantogato.com/ ', 1, 0),
(3, 'aplus', 'http://aplus.com/', 0, 0),
(4, 'cuanto meme', 'http://cuantomeme.blogspot.com/', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
`ID` int(10) unsigned NOT NULL COMMENT 'ID DE LA ETIQUETA',
  `NAME` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'NOMBRE DE LA ETIQUETA',
  `COUNT` int(10) unsigned NOT NULL COMMENT 'NUMERO DE VECES QUE SE HA USADO ESTA ETIQUETA',
  `VISIT` int(10) unsigned NOT NULL COMMENT 'NUMERO DE VISITA QUE SE HA HECHO A LA ETIQUETA'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`ID`, `NAME`, `COUNT`, `VISIT`) VALUES
(1, 'algo', 1, 0),
(2, 'et', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`ID` int(10) unsigned NOT NULL,
  `FBID` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ID DE FACEBOOK',
  `NAME` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `GENERO` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `EMAIL` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `PICTURE` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'IMAGEN DEUSUARIO',
  `VERIFY` tinyint(3) unsigned NOT NULL COMMENT 'SI VERIFICO CORREO',
  `USER` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `PASS` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `TYPE` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'U' COMMENT 'A: Admin, M:Moderator, U:User',
  `FECHA` date NOT NULL,
  `CHECKVIDEO` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `CHECKGIF` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `PAIS` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ACERCADETI` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `FBID`, `NAME`, `GENERO`, `EMAIL`, `PICTURE`, `VERIFY`, `USER`, `PASS`, `TYPE`, `FECHA`, `CHECKVIDEO`, `CHECKGIF`, `PAIS`, `ACERCADETI`) VALUES
(0, '', 'Admin', 0, '', 'media/default/profile-example.jpg', 1, 'Admin', '', 'A', '0000-00-00', 0, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_gallery`
--

CREATE TABLE IF NOT EXISTS `user_gallery` (
  `ID_USER` int(10) unsigned NOT NULL,
  `ID_GALLARY` int(10) unsigned NOT NULL,
  `INFO_IMAGEN` tinyint(3) unsigned NOT NULL COMMENT '0:VISTA;1:MENOS;2:MAS;3:FAV;4:AMBOS',
  `SEE_IT_BY_OWNER` tinyint(3) unsigned NOT NULL,
  `DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
 ADD KEY `ID_GALLERY` (`ID_GALLERY`), ADD KEY `ID_USER` (`ID_USER`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `URL` (`URL`), ADD UNIQUE KEY `TITLE` (`TITLE`), ADD KEY `OWNER` (`OWNER`);

--
-- Indexes for table `gallery_tag`
--
ALTER TABLE `gallery_tag`
 ADD UNIQUE KEY `ID_GALLERY_2` (`ID_GALLERY`,`ID_TAG`), ADD KEY `ID_GALLERY` (`ID_GALLERY`), ADD KEY `ID_TAG` (`ID_TAG`);

--
-- Indexes for table `meme`
--
ALTER TABLE `meme`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `NAME` (`NAME`,`URL`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `NAME` (`NAME`,`URL`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `NAME` (`NAME`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user_gallery`
--
ALTER TABLE `user_gallery`
 ADD KEY `ID_GALLARY` (`ID_GALLARY`), ADD KEY `ID_USER` (`ID_USER`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'INDEX',AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `meme`
--
ALTER TABLE `meme`
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID DE LA ETIQUETA',AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`ID_GALLERY`) REFERENCES `gallery` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
ADD CONSTRAINT `gallery_ibfk_1` FOREIGN KEY (`OWNER`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gallery_tag`
--
ALTER TABLE `gallery_tag`
ADD CONSTRAINT `gallery_tag_ibfk_1` FOREIGN KEY (`ID_GALLERY`) REFERENCES `gallery` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `gallery_tag_ibfk_2` FOREIGN KEY (`ID_TAG`) REFERENCES `tag` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_gallery`
--
ALTER TABLE `user_gallery`
ADD CONSTRAINT `user_gallery_ibfk_1` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `user_gallery_ibfk_2` FOREIGN KEY (`ID_GALLARY`) REFERENCES `gallery` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
