<?php
include_once '../../base/TablePage.php';
$bd=new TablePage();
$iID = $_POST["iID"];
$sName = $_POST["sNombre"];
$sUrl = $_POST["sUrl"];
$iResultado=$bd->Mod($sName, $sUrl, $iID);
$json=new stdClass();
$json->Tupla=$iResultado;
echo json_encode($json);

?>