<?php
include_once '../../base/TableTag.php';
$bd=new TableTag();
$bError=false;
$sNamePage = $_POST["sName"];

if ($sNamePage==""){
    $bError=true;
}

if ($bError==false){
$iResultado=$bd->Create($sNamePage);
$json=new stdClass();
}
$json->Tupla=$iResultado;
echo json_encode($json);

?>