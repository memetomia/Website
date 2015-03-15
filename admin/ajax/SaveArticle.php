<?php

include_once '../../base/TableGallery.php';
include_once '../../base/TableTag.php';

$bd = new TableGallery();
$bdTag = new TableTag();
$bError = false;
$sTitulo = $_POST["sTitulo"];
$sComentario = $_POST["sComentario"];
$aEtiqueta = $_POST["aEtiquetas"];
$filename = $_POST["sImagen"];
$infomedia = $_POST["sImagen"];
//$infomedia = $_POST["sinfo"];
$sMetaData = $_POST["sMetaData"];
$bCensura = $_POST["bCensura"];
$sExt = $_POST["sExt"];
$json = new stdClass();
$json->Error = "";
$typemedia = 0;
if ($bError == false) {
    $size = getimagesize(ARTICLE . "/" . $filename);
    $height = $size[1];
    $width = $size[0];
    if ($height > 1000) {
       if ($sExt == "gif") {
            $fuente = @imagecreatefromgif(ARTICLE . "/" . $filename);
        } else {
            $fuente = @imagecreatefromjpeg(ARTICLE . "/" . $filename);
        }
        $imgAncho = imagesx($fuente);
        $imgAlto = imagesy($fuente);
        $imagen = imagecreatetruecolor($imgAncho, 350);
        imagecopyresampled($imagen, $fuente, 0, 0, 0, 0, $imgAncho, 350, $imgAncho, 350);
        imagejpeg($imagen, ARTICLE . "/C" . $filename . ".jpg");
        $typemedia = 5;
        $infomedia = $filename;
        $filename = "C" . $filename;
        $filename.=".jpg";
    } else {
        if ($sExt == "gif") {
            $typemedia = 4;
            $fuente = @imagecreatefromgif(ARTICLE . "/" . $filename);
            $imgAncho = imagesx($fuente);
            $imgAlto = imagesy($fuente);
            $imagen = imagecreatetruecolor($imgAncho, $imgAlto);
            ImageCopyResized($imagen, $fuente, 0, 0, 0, 0, $imgAncho, $imgAlto, $imgAncho, $imgAlto);
            imagejpeg($imagen, ARTICLE . "/" . $filename . ".jpg");
            $infomedia = $filename;
            $filename.=".jpg";
        }
    }

    $iResultado = $bd->Create($sTitulo, $typemedia, $infomedia, $filename, $aEtiqueta, $sComentario, $sMetaData, $bCensura);
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