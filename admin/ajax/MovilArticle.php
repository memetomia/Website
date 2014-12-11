<?php

header('Content-Type: application/json');
include_once '../../base/TableGallery.php';
include_once '../../base/TableTag.php';

$bd = new TableGallery();
$bError = false;
$iID = $_GET["iPag"];

$json = new stdClass();
$json->Error = "";




if ($bError == false) {
    $iResultado = $bd->Trending($iID);
    $json = new stdClass();
}

$ARRAY=  array();
for ($i=0;$i<$iResultado;$i++){
    
    $ARRAY[$i]["ID"]=$bd->bd->obtener_respuesta($i,"ID");
    $ARRAY[$i]["OWNER"]=$bd->bd->obtener_respuesta($i,"OWNER");
    $ARRAY[$i]["TITLE"]=$bd->bd->obtener_respuesta($i,"TITLE");
    $ARRAY[$i]["TYPEMEDIA"]=$bd->bd->obtener_respuesta($i,"TYPEMEDIA");
    $ARRAY[$i]["INFOMEDIA"]=$bd->bd->obtener_respuesta($i,"INFOMEDIA");
    $ARRAY[$i]["DATE"]=$bd->bd->obtener_respuesta($i,"DATE");
    $ARRAY[$i]["TAG"]=$bd->bd->obtener_respuesta($i,"TAG");
    $ARRAY[$i]["N_MORE"]=$bd->bd->obtener_respuesta($i,"N_MORE");
    $ARRAY[$i]["N_LESS"]=$bd->bd->obtener_respuesta($i,"N_LESS");
    $ARRAY[$i]["N_COMMENT"]=$bd->bd->obtener_respuesta($i,"N_COMMENT");
    $ARRAY[$i]["META"]=$bd->bd->obtener_respuesta($i,"META");
    $ARRAY[$i]["COMMENT_ADDITIONAL"]=$bd->bd->obtener_respuesta($i,"COMMENT_ADDITIONAL");
    $ARRAY[$i]["CENSURA"]=$bd->bd->obtener_respuesta($i,"CENSURA");
    $ARRAY[$i]["STATE"]=$bd->bd->obtener_respuesta($i,"STATE");
   // $ARRAY[$i]["IMAGENSOLA"]=$bd->bd->obtener_respuesta($i,"IMAGENSOLA");
}
$json->Tupla = -1;
if ($iResultado > 0) {
   $json->Tupla =$ARRAY;
} else {
    $json->Error = $bd->bd->obtener_error();
}



echo json_encode($json);
?>