<?php

include_once '../../base/TableMeme.php';
$bd = new TableMeme();
$bError = false;
$sName = $_POST["q"];
$iResultado = $bd->rSearchByName($sName);

echo json_encode($bd->bd->obtener_respuesta_completa());

?>