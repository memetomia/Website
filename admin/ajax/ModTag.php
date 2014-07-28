<?php
include_once '../../base/TableTag.php';
$bd=new TableTag();
$iID = $_POST["iID"];
$sName = $_POST["sNewName"];

$iResultado=$bd->Mod($sName, $sUrl, $iID);
$json=new stdClass();
$json->Tupla=$iResultado;
echo json_encode($json);

?>