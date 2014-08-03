<?php
include_once '../base/TableGallery.php';
$bd=new TableGallery();
$bError=false;
$iID = $_POST["iID"];

if ($iID==""){
    $bError=true;
}

if ($bError==false){
$iResultado=$bd->UpdateNMorePlus($iID);
$json=new stdClass();
}
$json->Tupla=$iResultado;
echo json_encode($json);

?>