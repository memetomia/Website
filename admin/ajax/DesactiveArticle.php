<?php

include_once '../../base/TableGallery.php';
include_once '../../base/TableTag.php';

$bd = new TableGallery();
$bError = false;
$iID = $_POST["iID"];

$json = new stdClass();
$json->Error = "";




if ($bError == false) {
    $iResultado = $bd->Desactive($iID);
    $json = new stdClass();
}
$json->Tupla = -1;
if ($iResultado > 0) {
   $json->Tupla = $iResultado;
} else {
    $json->Error = $bd->bd->obtener_error();
}



echo json_encode($json);
?>