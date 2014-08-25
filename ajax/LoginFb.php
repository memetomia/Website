<?php

include_once '../base/TableGallery.php';
include_once '../base/ClassCookie.php';
$bd = new TableUser();
$bError = false;
//
// $this->GetRequest("iId"),
//                      str_replace(" ",".",$this->GetRequest("sUser")),
//                      $this->GetRequest("sName"),
//                      $this->GetRequest("sLName"),
//                      $this->GetRequest("sLink"),
//                       $this->GetRequest("sPicture"),
//                      $this->GetRequest("sEmail")
if (isset($_POST["sUser"])) {
    $sUser = $_POST["sUser"];
} else {
    $bError = true;
}
if (isset($_POST["iId"])) {
    $iID = $_POST["iId"];
} else {
    $bError = true;
}
if (isset($_POST["sName"])) {
    $sName = $_POST["sName"];
} else {
    $bError = true;
}
if (isset($_POST["sLName"])) {
    $sLName = $_POST["sLName"];
} else {
    $bError = true;
}
if (isset($_POST["sLink"])) {
    $sLink = $_POST["sLink"];
} else {
    $bError = true;
}
if (isset($_POST["sPicture"])) {
    $sPicture = $_POST["sPicture"];
} else {
    $bError = true;
}

if (isset($_POST["sEmail"])) {
    $sEmail = $_POST["sEmail"];
} else {
    $bError = true;
}

function CrearCookie($id) {
    $co = new ClassCookie("sec");
    $co->setSVar("iId", $id);
    $json->Listo = "ok";
}

$json = new stdClass();
if ($bError == false) {
    $iResultado = $bd->SearchFbID($iID);
    if ($iResultado > 1) {
        CrearCookie($iID);
    } else {
        $bd->CreateFB($iID, $sName, $sEmail, $sPicture, str_replace(" ", ".", $sUser), "");
    }
}
$json->Tupla = $iResultado;
echo json_encode($json);
?>