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
}

$json = new stdClass();
if ($bError == false) {
    $iResultado = $bd->SearchFbID($iID);
    if ($iResultado > 1) {
        CrearCookie($iResultado);
        $json->Tupla = 1;
        $json->Listo = "ok";
    } else {
        $registro = -1;
        $registro = $bd->CreateFB($iID, $sName, $sEmail, $sPicture, str_replace(" ", ".", $sUser), "");
        if ($registro != -1) {
            CrearCookie($registro);
            $json->Tupla = 1;
            $json->Listo = "ok";
        } else {
            $json->Tupla = -1;
            $json->sError = "no se pudo guardar los datos de facebook";
        }
    }
}

echo json_encode($json);
?>