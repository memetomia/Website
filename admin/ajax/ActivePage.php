<?php
include_once '../../base/TablePage.php';
$bd=new TablePage();

$iID = $_POST["iID"];

    $iResultado=$bd->Active($iID);

$json=new stdClass();
$json->Tupla=$iResultado;
echo json_encode($json);

?>