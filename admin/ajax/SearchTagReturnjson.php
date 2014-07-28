<?php

include_once '../../base/TableTag.php';
$bd = new TableTag();
$bError = false;
$sName = $_POST["q"];
$iResultado = $bd->SearchByExactName($sName);

echo json_encode($bd->bd->obtener_respuesta_completa());

?>