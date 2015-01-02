<?php

include_once '../../base/TableGallery.php';
include_once '../../base/TableTag.php';

$bd = new TableGallery();
$bdTag = new TableTag();
$bError = false;
$iId=$_POST["iId"];
$sTitulo = $_POST["sTitulo"];
$sComentario = $_POST["sComentario"];
$aEtiqueta = $_POST["aEtiquetas"];
$bCensura=$_POST["bCensura"];
$json = new stdClass();
$json->Error = "";
$bd->DelAllTagForArticleId($iId);

if ($bError == false) {
    $iResultado = $bd->ModArticle($sTitulo,$aEtiqueta, $sComentario,$bCensura,$iId);   
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