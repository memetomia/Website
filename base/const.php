<?php

include_once 'programador.php';
if ($usuario == "jaivic") {
    defined('DB_SERVER') ? null : define("DB_SERVER", "localhost");
    defined('DB_USER') ? null : define("DB_USER", "root");
    defined('DB_PASS') ? null : define("DB_PASS", "");
    defined('DB_NAME') ? null : define("DB_NAME", "Gallery");
    defined('MODO_DEBUG') ? null : define("MODO_DEBUG", false);
    defined('SERVER') ? null : define("SERVER", "http://localhost:8080/Website");
    defined('RESOURCES') ? null : define("RESOURCES", "/resources");
    defined('FONTS') ? null : define("FONTS", "/resources/fonts");
    defined('MEDIA') ? null : define("MEDIA", "/media");
    defined('MEME') ? null : define("MEME", "C:\wamp\www\Website\media\meme");
    defined('ARTICLE') ? null : define("ARTICLE", "C:\wamp\www\Website\media\article");
    defined('MEME') ? null : define("MEME", "C:\wamp\www\memetomia\media\meme"); 
    defined('ARTICLE') ? null : define("ARTICLE", "C:\wamp\www\memetomia\media\article"); 
    defined('ERROR_FILE') ? null : define("ERROR_FILE", "C:\wamp\www\memetomia\media\article"); 
   
    defined('JS') ? null : define("JS", "/js");
    defined('MODAL_CONTROLLER') ? null : define("MODAL_CONTROLLER", "/js/modal_controllers");
    defined('CSS') ? null : define("CSS", "/css");
    defined('BASE') ? null : define("BASE", "/base");
    defined('AJAX') ? null : define("AJAX", "/ajax");
    defined('ADMIN') ? null : define("ADMIN", "/admin");
    defined('ADMIN_CSS') ? null : define("ADMIN_CSS", "/admin/css");
    defined('ADMIN_JS') ? null : define("ADMIN_JS", "/admin/js");
    defined('EXT_MEDIA') ? null : define("EXT_MEDIA", SERVER . MEDIA);
    defined('EXT_MEME') ? null : define("EXT_MEME", EXT_MEDIA . "/meme");
    defined('EXT_ARTICLE') ? null : define("EXT_ARTICLE", EXT_MEDIA . "/article");
    defined('EXT_TAG') ? null : define("EXT_TAG", SERVER . "/Tag.php");
    defined('EXT_IMAGEN') ? null : define("EXT_IMAGEN", SERVER . "/Imagen.php");
    defined('EXT_DEFAULT') ? null : define("EXT_DEFAULT", EXT_MEDIA . "/default");
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
   
    defined('JS') ? null : define("JS", "/js");
    defined('MODAL_CONTROLLER') ? null : define("MODAL_CONTROLLER", "/js/modal_controllers");
    defined('CSS') ? null : define("CSS", "/css");
    defined('BASE') ? null : define("BASE", "/base");
    defined('AJAX') ? null : define("AJAX", "/ajax");
    defined('ADMIN') ? null : define("ADMIN", "/admin");
    defined('ADMIN_CSS') ? null : define("ADMIN_CSS", "/admin/css");
    defined('ADMIN_JS') ? null : define("ADMIN_JS", "/admin/js");
    defined('EXT_MEDIA') ? null : define("EXT_MEDIA", SERVER . MEDIA);
    defined('EXT_MEME') ? null : define("EXT_MEME", EXT_MEDIA . "/meme");
    defined('EXT_ARTICLE') ? null : define("EXT_ARTICLE", EXT_MEDIA . "/article");
    defined('EXT_TAG') ? null : define("EXT_TAG", SERVER . "/Tag.php");
    defined('EXT_IMAGEN') ? null : define("EXT_IMAGEN", SERVER  . "/Imagen.php");
    defined('EXT_DEFAULT') ? null : define("EXT_DEFAULT", EXT_MEDIA . "/default");
}

if ($usuario == "hector") {
    defined('DB_SERVER') ? null : define("DB_SERVER", "localhost");
    defined('DB_USER') ? null : define("DB_USER", "root");
    defined('DB_PASS') ? null : define("DB_PASS", "");
    defined('DB_NAME') ? null : define("DB_NAME", "gallery");
   
    defined('MODO_DEBUG') ? null : define("MODO_DEBUG", false);
    defined('SERVER') ? null : define("SERVER", "http://localhost/memetomia");
    defined('RESOURCES') ? null : define("RESOURCES", "/resources");
    defined('FONTS') ? null : define("FONTS", "/resources/fonts");
    defined('MEDIA') ? null : define("MEDIA", "/media");
    defined('MEME') ? null : define("MEME", "/Library/WebServer/documents/memetomia/media/meme");
    defined('ARTICLE') ? null : define("ARTICLE", "/Library/WebServer/documents/memetomia/media/article");
    
    defined('JS') ? null : define("JS", "/js");
    defined('MODAL_CONTROLLER') ? null : define("MODAL_CONTROLLER", "/js/modal_controllers");
    defined('CSS') ? null : define("CSS", "/css");
    defined('BASE') ? null : define("BASE", "/base");
    defined('AJAX') ? null : define("AJAX", "/ajax");
    defined('ADMIN') ? null : define("ADMIN", "/admin");
    defined('ADMIN_CSS') ? null : define("ADMIN_CSS", "/admin/css");
    defined('ADMIN_JS') ? null : define("ADMIN_JS", "/admin/js");
    defined('EXT_MEDIA') ? null : define("EXT_MEDIA", SERVER . MEDIA);
    defined('EXT_MEME') ? null : define("EXT_MEME", EXT_MEDIA . "/meme");
    defined('EXT_ARTICLE') ? null : define("EXT_ARTICLE", EXT_MEDIA . "/article");
    defined('EXT_TAG') ? null : define("EXT_TAG", SERVER . "/Tag.php");
    defined('EXT_IMAGEN') ? null : define("EXT_IMAGEN", EXT_MEDIA . "/Imagen.php");
    defined('EXT_DEFAULT') ? null : define("EXT_DEFAULT", EXT_MEDIA . "/default");
}
?>

