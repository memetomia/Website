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
$sHtmlMedia=$_POST["sHtmlMedia"];
$sMetaData=$_POST["sMetaData"];
$bCensura=$_POST["bCensura"];
$json = new stdClass();
$json->Error = "";




if ($bError == false) {
    $iResultado = $bd->Create($sTitulo, 1, $sHtmlMedia, $sImagen, $aEtiqueta, $sComentario,$sMetaData,$bCensura);
    $json = new stdClass();
}
if ($iResultado > 0) {
    $stags = json_decode($aEtiqueta, true);
   

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