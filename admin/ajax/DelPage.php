<?php
include_once '../../base/TablePage.php';
$bd=new TablePage();

$iID = $_POST["iID"];
$bd->SearchPage($iID);
if ($bd->bd->obtener_respuesta(0, "STATE")==1){
    $iResultado=$bd->Del($iID);
}else{
    $iResultado=$bd->SeudoDel($iID);
}

$json=new stdClass();
$json->Tupla=$iResultado;
echo json_encode($json);

?>