<?php

include_once '../base/TableGallery.php';
include_once '../base/ClassCookie.php';
$bd = new TableUser();
$bError = false;
if (isset($_POST["sUser"])) {
    $sName = $_POST["sUser"];
} else {
    $bError = true;
}
if (isset($_POST["sEmail"])) {
    $sEmail = $_POST["sEmail"];
} else {
    $bError = true;
}
if (isset($_POST["sPassword"])) {
    $sPass = $_POST["sPassword"];
} else {
    $bError = true;
}


if ($bError == false) {
    $iResultado = $bd->Create("", $sName, $sEmail, "", "", $sName, $sPass);
 



    $json = new stdClass();
}
$json->Tupla = $iResultado;
echo json_encode($json);
?>