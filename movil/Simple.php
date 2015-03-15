<?php

header('Content-Type: application/json');
include_once '../base/TableGallery.php';
include_once '../base/TableTag.php';

$bd = new TableGallery();
$bError = false;

if (isset($_GET["iPag"])) {
    $iID = $_GET["iPag"];
} else {
    $iID = 1;
}


$json = new stdClass();
$json->Error = "";




if ($bError == false) {
    $iResultado = $bd->Trending($iID);
    $json = new stdClass();
}

$ARRAY = array();
for ($i = 0; $i < $iResultado; $i++) {
    $ARRAY[$i]["TITLE"] = $bd->bd->obtener_respuesta($i, "TITLE");
    $ARRAY[$i]["TYPEMEDIA"] = $bd->bd->obtener_respuesta($i, "TYPEMEDIA");
    $ARRAY[$i]["INFOMEDIA"] = $bd->bd->obtener_respuesta($i, "INFOMEDIA");
    $ARRAY[$i]["URL"] = EXT_ARTICLE . "/" . $bd->bd->obtener_respuesta($i, "URL");
    $ARRAY[$i]["DATE"] = $bd->bd->obtener_respuesta($i, "DATE");
    $ARRAY[$i]["IMAGENSOLA"] = EXT_IMAGEN . "?id=" . $ARRAY[$i]["ID"];
}
$json->Tupla = -1;
if ($iResultado > 0) {
    $json->Tupla = $ARRAY;
} else {
    $json->Error = $bd->bd->obtener_error();
}



echo json_encode($json);
?>