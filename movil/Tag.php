<?php
//aaaaaaaaaaaaaaaaaaa
header('Content-Type: application/json');
include_once '../base/TableTag.php';

$bd = new TableTag();
$bError = false;


$json = new stdClass();
$json->Error = "";

if ($bError == false) {
    $iResultado = $bd->All($iID);
    $json = new stdClass();
}

$ARRAY=  array();
for ($i=0;$i<$iResultado;$i++){
    
    $ARRAY[$i]["ID"]=$bd->bd->obtener_respuesta($i,"ID");
    $ARRAY[$i]["NAME"]=$bd->bd->obtener_respuesta($i,"NAME");
   
}
$json->Tupla = -1;
if ($iResultado > 0) {
   $json->Tupla =$ARRAY;
} else {
    $json->Error = $bd->bd->obtener_error();
}
echo json_encode($json);
?>