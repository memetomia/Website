<?php
include_once '../../base/TableMeme.php';
$bd=new TablePage();
$bError=false;
$sNamePage = $_POST["sNombre"];
$sUrlPage = $_POST["sUrl"];
$iResultado=0;
if ($sNamePage==""){
    $bError=true;
}
if ($sUrlPage=="") {
    $bError=true; 
}
if ($bError==false){
$iResultado=$bd->Create($sNamePage, $sUrlPage);
$json=new stdClass();
}
$json->Tupla=$iResultado;
echo json_encode($json);

?>