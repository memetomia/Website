<?php



echo "prueba de conexion de la bd<br>";
require_once ('base/conexion_mysql.php');
require_once('base/const.php');
$b = new Conexion(MODO_DEBUG);
$b->hacer_query("select * from gallery");
echo $b->obtener_respuesta(0, "TITLE");
ECHO __DIR__;
?>