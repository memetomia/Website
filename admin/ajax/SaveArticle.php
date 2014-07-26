<?php

include_once '../../base/TableGallery.php';
include_once '../../base/TableTag.php';

$bd = new TableGallery();
$bdTag = new TableTag();
$bError = false;
$sTitulo = $_POST["sTitulo"];
$sComentario = $_POST["sComentario"];
$aEtiqueta = $_POST["aEtiquetas"];
$sImagen = $_POST["sImagen"];
$infomedia = $_POST["sinfo"];
$json = new stdClass();
$json->Error = "";




if ($bError == false) {
    $iResultado = $bd->Create($sTitulo, 0, $infomedia, $sImagen, $aEtiqueta, $sComentario);
    $json = new stdClass();
}
if ($iResultado > 0) {
    $stags = json_decode($aEtiqueta, true);
    ECHO count($stags);

    for ($i = 0; $i < count($stags); $i++) {
        $iIDTag = $bdTag->iSearchTagByNameExact($stags[$i]);
        $bdTag->AddTagToArticle($iIDTag, $iResultado);
    }
} else {
    $json->Error = $bd->bd->obtener_error();
}


$json->Tupla = $iResultado;
echo json_encode($json);
?>