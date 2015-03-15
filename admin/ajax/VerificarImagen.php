<?php

include_once '../../base/TableGallery.php';
include_once '../../base/TableTag.php';
include_once '../../base/funciones.php';

$bd = new TableGallery();
$bdTag = new TableTag();
$bError = false;

$json = new stdClass();
$json->sTitulo = $_POST["sTitulo"];
$json->iNumero = $_POST["iNumero"]; //numero de posicion de la imagen en la interfaz de imagen robada; funciona para luego de guardo borrarla de la pantalla
$json->aEtiquetas = $_POST["aEtiquetas"];
$json->sImagen = $_POST["sImagen"];
$json->bCensura = $_POST["bCensura"];
$json->height = -1;
$json->width = -1;
$json->id = -1;

$json->nameGif = 0;
$json->Error = "";
$json->filename = "";
$filename = "";
$ext = "";
$media = 0;
$infomedia = "";
$bd->SearchByTitle($json->sTitulo);
if ($bd->bd->filas_retornadas_por_consulta() <= 0) {
    $NombreArchivo = sanear_string($json->sTitulo);
    $NombreArchivo = substr($NombreArchivo, 0, 15);
    $filename = "R_" . $NombreArchivo . "_";
    $filename .= rand(10, 99);
    $filename .= rand(10, 99);

    $contents = file_get_contents($json->sImagen);
    if ($contents != null) {
        $nameGif = false;
        $size = getimagesize($json->sImagen);
        $json->height = $size[1];
        $json->width = $size[0];

        switch ($size['mime']) {
            case "image/gif":
                $json->nameGif = 1;
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

        //    $filename .= "_" . $NombreArchivo;
//    while (file_exists($filename . $ext)) {
//        $filename .= rand(10, 99);
//    }
        $filename.=$ext;
//   $filename .="." . end($trozos);

        $savefile = fopen(ARTICLE . "/" . $filename, 'w');
        fwrite($savefile, $contents);
        fclose($savefile);

        $json->filename = $filename;
        $json->sImagen = ARTICLE . "/" . $filename;
        $iResultado = $bd->Create($json->sTitulo, $media, $infomedia, $json->filename, $json->aEtiquetas, "", "", $json->bCensura);
        $json->id = $iResultado;
        if ($iResultado > 0) {
            $stags = json_decode($json->aEtiquetas, true);
            for ($i = 0; $i < count($stags); $i++) {
                $iIDTag = $bdTag->iSearchTagByNameExact($stags[$i]);
                $bdTag->AddTagToArticle($iIDTag, $iResultado);
            }
        } else {
            $iResultado = -1;
            $json->Error = $bd->bd->obtener_error();
        }
    }
}



echo json_encode($json);
?>