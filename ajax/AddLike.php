<?php

include_once '../base/TableGallery.php';
include_once '../base/classSession.php';
include_once '../base/TableUser_Gallery.php';
$bd = new TableGallery();
$bdug = new TableUser_Gallery();
$co = new oSession();
$bError = false;
$iID = $_POST["iID"];

if ($iID == "") {
    $bError = true;
}

if ($co->isEmpty()) {
    $bdug->Create($co->GetVar("iId"), $iID, 2);
}
if ($bError == false) {
    $iResultado = $bd->UpdateNMorePlus($iID);
    $json = new stdClass();
}
$json->Tupla = $iResultado;
echo json_encode($json);
?>