<?php

include_once '../../base/TableMeme.php';
$bd = new TableMeme();

$iID = $_POST["iID"];
$sDirImagen = $bd->SearchById($iID);
$iResultado = -1;
$bRespuestaArchivoEliminado = unlink(MEME . "/" . $sDirImagen[0]["URL"]);
if ($bRespuestaArchivoEliminado) {
    $iResultado = $bd->Del($iID);
} else {
    $bd->Desactive($iID);
}
$json = new stdClass();
$json->Tupla = $iResultado;
echo json_encode($json);
?>