<?php

/*

 */
http://localhost:8080/memetomia/media/meme/
/** constantes q define el nombre del servidor
 * @access public
 */
include_once 'programador.php';
if ($usuario == "jaivic") {
    defined('DB_SERVER') ? null : define("DB_SERVER", "localhost");
    defined('DB_USER') ? null : define("DB_USER", "root");
    defined('DB_PASS') ? null : define("DB_PASS", "");
    defined('DB_NAME') ? null : define("DB_NAME", "Gallery");
    defined('DIR_LOG') ? null : define("DIR_LOG", "class/log_de_conexion_con_bd.txt");
    defined('MODO_DEBUG') ? null : define("MODO_DEBUG", false);
    defined('SERVER') ? null : define("SERVER", "http://localhost:8080/memetomia");
    defined('RESOURCES') ? null : define("RESOURCES", "/resources");
    defined('FONTS') ? null : define("FONTS", "/resources/fonts");
    defined('MEDIA') ? null : define("MEDIA", "/media");
    defined('MEME') ? null : define("MEME", "C:\wamp\www\memetomia\media\meme"); // no fue cambiada por HG
    defined('ARTICLE') ? null : define("ARTICLE", "C:\wamp\www\memetomia\media\article"); // no fue cambiada por HG
    defined('CONTS_DEFAULT') ? null : define("CONTS_DEFAULT", SERVER . MEDIA . "/default");
    defined('JS') ? null : define("JS", "/js");
    defined('MODAL_CONTROLLER') ? null : define("MODAL_CONTROLLER", "/js/modal_controllers");
    defined('CSS') ? null : define("CSS", "/css");
    defined('BASE') ? null : define("BASE", "/base");
    defined('AJAX') ? null : define("AJAX", "/ajax");
    defined('ADMIN') ? null : define("ADMIN", "/admin");
    defined('ADMIN_CSS') ? null : define("ADMIN_CSS", "/admin/css");
    defined('ADMIN_JS') ? null : define("ADMIN_JS", "/admin/js");
    defined('EXT_MEME') ? null : define("EXT_MEME", SERVER . MEDIA . "/meme");
    defined('EXT_ARTICLE') ? null : define("EXT_ARTICLE", SERVER . MEDIA . "/article");
    defined('EXT_TAG') ? null : define("EXT_TAG", SERVER . "/Tag.php");
    defined('EXT_IMAGEN') ? null : define("EXT_IMAGEN", SERVER . MEDIA . "/Imagen.php");
}
if ($usuario == "memetomia") {
    defined('DB_SERVER') ? null : define("DB_SERVER", "localhost");
    defined('DB_USER') ? null : define("DB_USER", "MemetomiaPage");
    defined('DB_PASS') ? null : define("DB_PASS", "ClaveMemetomia123");
    defined('DB_NAME') ? null : define("DB_NAME", "memetomia");
    defined('DIR_LOG') ? null : define("DIR_LOG", "class/log_de_conexion_con_bd.txt");
    defined('MODO_DEBUG') ? null : define("MODO_DEBUG", false);
    defined('SERVER') ? null : define("SERVER", "http://memetomia.com");
    defined('RESOURCES') ? null : define("RESOURCES", "/resources");
    defined('FONTS') ? null : define("FONTS", "/resources/fonts");
    defined('MEDIA') ? null : define("MEDIA", "/media");
    defined('MEME') ? null : define("MEME", "/home/memetomia/public_html/media/meme"); // no fue cambiada por HG
    defined('ARTICLE') ? null : define("ARTICLE", "/home/memetomia/public_html/media/article"); // no fue cambiada por HG
    defined('CONTS_DEFAULT') ? null : define("CONTS_DEFAULT", SERVER . MEDIA . "/default");
    defined('JS') ? null : define("JS", "/js");
    defined('MODAL_CONTROLLER') ? null : define("MODAL_CONTROLLER", "/js/modal_controllers");
    defined('CSS') ? null : define("CSS", "/css");
    defined('BASE') ? null : define("BASE", "/base");
    defined('AJAX') ? null : define("AJAX", "/ajax");
    defined('ADMIN') ? null : define("ADMIN", "/admin");
    defined('ADMIN_CSS') ? null : define("ADMIN_CSS", "/admin/css");
    defined('ADMIN_JS') ? null : define("ADMIN_JS", "/admin/js");
    defined('EXT_MEME') ? null : define("EXT_MEME", SERVER . MEDIA . "/meme");
    defined('EXT_ARTICLE') ? null : define("EXT_ARTICLE", SERVER . MEDIA . "/article");
    defined('EXT_TAG') ? null : define("EXT_TAG", SERVER . "/Tag.php");
    defined('EXT_IMAGEN') ? null : define("EXT_IMAGEN", SERVER . MEDIA . "/Imagen.php");
}

if ($usuario == "hector") {
    defined('DB_SERVER') ? null : define("DB_SERVER", "localhost");
    defined('DB_USER') ? null : define("DB_USER", "root");
    defined('DB_PASS') ? null : define("DB_PASS", "");
    defined('DB_NAME') ? null : define("DB_NAME", "gallery");
    defined('DIR_LOG') ? null : define("DIR_LOG", "class/log_de_conexion_con_bd.txt");
    defined('MODO_DEBUG') ? null : define("MODO_DEBUG", false);
    defined('SERVER') ? null : define("SERVER", "http://localhost/memetomia");
    defined('RESOURCES') ? null : define("RESOURCES", "/resources");
    defined('FONTS') ? null : define("FONTS", "/resources/fonts");
    defined('MEDIA') ? null : define("MEDIA", "/media");
    defined('MEME') ? null : define("MEME", "/Library/WebServer/documents/memetomia/media/meme");
    defined('ARTICLE') ? null : define("ARTICLE", "/Library/WebServer/documents/memetomia/media/article");
    defined('CONTS_DEFAULT') ? null : define("CONTS_DEFAULT", SERVER . MEDIA . "/default");
    defined('JS') ? null : define("JS", "/js");
    defined('CSS') ? null : define("CSS", "/css");
    defined('BASE') ? null : define("BASE", "/base");
    defined('AJAX') ? null : define("AJAX", "/ajax");
    defined('ADMIN') ? null : define("ADMIN", "/admin");
    defined('ADMIN_CSS') ? null : define("ADMIN_CSS", "/admin/css");
    defined('ADMIN_JS') ? null : define("ADMIN_JS", "/admin/js");
    defined('EXT_MEME') ? null : define("EXT_MEME", SERVER . MEDIA . "/meme");
    defined('EXT_ARTICLE') ? null : define("EXT_ARTICLE", SERVER . MEDIA . "/article");
    defined('EXT_TAG') ? null : define("EXT_TAG", SERVER . "/Tag.php");
    defined('EXT_IMAGEN') ? null : define("EXT_IMAGEN", SERVER . MEDIA . "/Imagen.php");
}
?>
