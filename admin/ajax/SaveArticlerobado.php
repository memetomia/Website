<?php

include_once '../../base/TableGallery.php';
include_once '../../base/TableTag.php';

$bd = new TableGallery();
$bdTag = new TableTag();
$bError = false;
$sTitulo = $_POST["sTitulo"];
//$sComentario = $_POST["sComentario"];
$sComentario = "";
$aEtiqueta = $_POST["aEtiquetas"];
$sImagen = $_POST["sImagen"];
//$infomedia = $_POST["sinfo"];
$infomedia = "";
//$sMetaData=$_POST["sMetaData"];
$sMetaData = "";
$bCensura = $_POST["bCensura"];

$json = new stdClass();
$json->Error = "";

$contents = file_get_contents($sImagen);

$filename = "";
$ext="";
if ($contents != null) {
    $filename .= rand(10, 99);
    $filename .= rand(10, 99);
 
    $size = getimagesize($sImagen);
    switch ($size['mime']) {
        case "image/gif":
            $ext .=".gif";
            break;
        case "image/jpeg":
            $ext .=".jpg";
            break;
        case "image/png":
            $ext .=".png";
            break;
        case "image/bmp":
            $ext .=".bmp";
            break;
    }
}
while (file_exists($filename.$ext)){
     $filename .= rand(10, 99);
}
$filename.=$ext;
//   $filename .="." . end($trozos);
$savefile = fopen(ARTICLE . "/" . $filename, 'w');
fwrite($savefile, $contents);
fclose($savefile);


if ($bError == false) {
    $iResultado = $bd->Create($sTitulo, 0, $infomedia, $filename, $aEtiqueta, $sComentario, $sMetaData, $bCensura);

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