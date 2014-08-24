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
    $sName = $_POST["sUser"];
} else {
    $bError = true;
}
if (isset($_POST["sRecordarme"])) {
    $sEmail = $_POST["sRecordarme"];
} else {
    $bError = true;
}
if (isset($_POST["sPassword"])) {
    $sPass = $_POST["sPassword"];
} else {
    $bError = true;
}
$json = new stdClass();
if ($bError == false) {
    $iResultado = $bd->login($sName, $sPass);
    if ($iResultado > 1) {
        if ($bd->bd->obtener_respuesta(0, "VERIFY") == 1) {
            $co = new ClassCookie("sec");
            $co->setSVar("iId", $bd->obtener_respuesta(0, "ID"));
            $json->Listo="ok";
        } else {
            $json->sError = "falta verificar la cuenta";
        }
    } else {
        $json->sError = "Clave y nombre de cuenta incorrecto";
    }
}
$json->Tupla = $iResultado;
echo json_encode($json);
?>