<?php

include_once '../../base/TableGallery.php';
include_once '../../base/TableTag.php';
include_once '../base/classSession.php';
$co = new oSession();

$bd = new TableGallery();
$bdTag = new TableTag();
$bError = false;
$sTitle = $_POST["sTitulo"];
$sComentario = "";
$aTag = $_POST["aEtiquetas"];
$sUrl = $_POST["sImagen"];
$infomedia = "";
//$sMetaData=$_POST["sMetaData"];
$bCensura=1;
//hacer losmetas datos
//
$json = new stdClass();
$json->Error = "";
if ($bError == false) {
    $iResultado = $bd->CreateWithUser($sTitle,$co->GetVar("iId"), 0, $infomedia, $sUrl, $aTag, $sComentario,$sMetaData,$bCensura);
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