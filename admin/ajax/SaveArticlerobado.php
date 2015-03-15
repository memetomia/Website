<?php

include_once '../../base/TableGallery.php';
include_once '../../base/TableTag.php';
include_once '../../base/funciones.php';
//sTitulo 
//iNumero  
//aEtiqueta
//$sImagen 
//bCensura
//id
//Error 
//filename 

$bd = new TableGallery();
$bdTag = new TableTag();
$bError = false;
$sTitulo = $_POST["sTitulo"];
$iNumero = $_POST["iNumero"]; //numero de posicion de la imagen en la interfaz de imagen robada; funciona para luego de guardo borrarla de la pantalla
//$sComentario = $_POST["sComentario"];
$sComentario = "";
$aEtiqueta = $_POST["aEtiquetas"];
$sImagen = $_POST["sImagen"];
//$infomedia = $_POST["sinfo"];
$infomedia = "";
//$sMetaData=$_POST["sMetaData"];
$sMetaData = "";
//$bCensura = $_POST["bCensura"];
$filename = $_POST["filename"];
$id = $_POST["id"];

$nameGif = $_POST["nameGif"];
$height = $_POST["height"];
$width = $_POST["width"];

$ext = "";
$media = 0;
$json = new stdClass();
$json->Error = "";

if ($height > 1000) {
    if ($nameGif == true) {
        $fuente = @imagecreatefromgif(ARTICLE . "/" . $filename);
    } else {
        $fuente = @imagecreatefromjpeg(ARTICLE . "/" . $filename);
    }
    $imgAncho = imagesx($fuente);
    $imgAlto = imagesy($fuente);
     $imagen = imagecreatetruecolor($imgAncho, 350);
    imagecopyresampled($imagen, $fuente, 0, 0, 0, 0, $imgAncho, 350, $imgAncho, 350);
    imagejpeg($imagen, ARTICLE . "/C" . $filename . ".jpg");
    $media = 5;
    $infomedia = $filename;
    $filename="C".$filename;
    $filename.=".jpg";
} else {

    if ($nameGif == true) {
        $fuente = @imagecreatefromgif(ARTICLE . "/" . $filename);
        $imgAncho = imagesx($fuente);
        $imgAlto = imagesy($fuente);
        $imagen = imagecreatetruecolor($imgAncho, $imgAlto);
   //     $imagen = ImageCreate($imgAncho, $imgAlto);
        ImageCopyResized($imagen, $fuente, 0, 0, 0, 0, $imgAncho, $imgAlto, $imgAncho, $imgAlto);
        imagejpeg($imagen, ARTICLE . "/" . $filename . ".jpg");
        $media = 4;
        $infomedia = $filename;
        $filename.=".jpg";
    }
}
if ($bError == false) {
     $iResultado = $bd->UpdateUrl($filename, $id);
    if ($media != 0) {
        $iResultado = $bd->UpdateTypeMedia($media, $id);
        $iResultado = $bd->UpdateInfoMedia($infomedia, $id);
    }
    $json = new stdClass();
}
$json->Tupla = $iResultado;
//$json->iNumero = $iNumero;
$json->iNumero = 0;
echo json_encode($json);
?>