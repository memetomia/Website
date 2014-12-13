<?php
//aaaaaaaaaaaaaaaaaaa
header('Content-Type: application/json');
include_once '../base/TableGallery.php';
include_once '../base/TableTag.php';

$bd = new TableGallery();
$bError = false;

if (isset($_GET["iPag"])){
$iID = $_GET["iPag"];    
}else{
    $iID = 1;
}


$json = new stdClass();
$json->Error = "";




if ($bError == false) {
    $iResultado = $bd->Trending($iID);
    $json = new stdClass();
}

$ARRAY=  array();
for ($i=0;$i<$iResultado;$i++){
    
    $ARRAY[$i]["ID"]=$bd->bd->obtener_respuesta($i,"ID");
    //$ARRAY[$i]["OWNER"]=$bd->bd->obtener_respuesta($i,"OWNER");
    $ARRAY[$i]["TITLE"]=$bd->bd->obtener_respuesta($i,"TITLE");
    $ARRAY[$i]["TYPEMEDIA"]=$bd->bd->obtener_respuesta($i,"TYPEMEDIA");
    $ARRAY[$i]["INFOMEDIA"]=$bd->bd->obtener_respuesta($i,"INFOMEDIA");
    $ARRAY[$i]["URL"]="http://www.memetomia.com/media/article/".$bd->bd->obtener_respuesta($i,"URL");
    $ARRAY[$i]["DATE"]=$bd->bd->obtener_respuesta($i,"DATE");
    $ARRAY[$i]["TAG"]=$bd->bd->obtener_respuesta($i,"TAG");
    $ARRAY[$i]["N_MORE"]=$bd->bd->obtener_respuesta($i,"N_MORE");
    $ARRAY[$i]["N_LESS"]=$bd->bd->obtener_respuesta($i,"N_LESS");
    $ARRAY[$i]["N_COMMENT"]=$bd->bd->obtener_respuesta($i,"N_COMMENT");
    $ARRAY[$i]["META"]=$bd->bd->obtener_respuesta($i,"META");
    $ARRAY[$i]["COMMENT_ADDITIONAL"]=$bd->bd->obtener_respuesta($i,"COMMENT_ADDITIONAL");
    $ARRAY[$i]["CENSURA"]=$bd->bd->obtener_respuesta($i,"CENSURA");
    $ARRAY[$i]["STATE"]=$bd->bd->obtener_respuesta($i,"STATE");
    $ARRAY[$i]["NAME"]=$bd->bd->obtener_respuesta($i,"NAME");
    $ARRAY[$i]["PICTURE"]=$bd->bd->obtener_respuesta($i,"PICTURE");
    $ARRAY[$i]["IMAGENSOLA"]="http://www.memetomia.com/Imagen.php?id=".$ARRAY[$i]["ID"];
}
$json->Tupla = -1;
if ($iResultado > 0) {
   $json->Tupla =$ARRAY;
} else {
    $json->Error = $bd->bd->obtener_error();
}



echo json_encode($json);
?>