<?php

include_once '../../base/TableTag.php';
$bd = new TableTag();

$iID = $_POST["iID"];

$iResultado = -1;

$iResultado = $bd->Del($iID);
$json = new stdClass();
$json->Tupla = $iResultado;
echo json_encode($json);
?>