<?php

include_once '../../base/TableGallery.php';
$bd = new TableGallery();

$iID = $_POST["iID"];
$sDirImagen = $bd->SearchById($iID);
$iResultado = -1;
if ($sDirImagen[0]["TYPEMEDIA"] == 0) {
    $bRespuestaArchivoEliminado = unlink(ARTICLE . "/" . $sDirImagen[0]["URL"]);
    if ($bRespuestaArchivoEliminado) {
        $iResultado = $bd->Del($iID);
    } else {
        $bd->Desactive($iID);
    }
} else {
     $iResultado = $bd->Del($iID);
}

$json = new stdClass();
$json->Tupla = $iResultado;
echo json_encode($json);
?>