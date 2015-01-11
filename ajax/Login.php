<?php

include_once '../base/classSession.php';
$co = new oSession();
include_once '../base/TableUser.php';
$bd = new TableUser();
$bError=false;
if (isset($_POST["sUser"])) {
    $sUser = $_POST["sUser"];
} else {
    $bError = true;
}
if (isset($_POST["sPassword"])) {
    $sPassword = $_POST["sPassword"];
} else {
    $bError = true;
}

$json = new stdClass();
if ($bError == false) {
    $iResultado = $bd->login($sUser, $sPassword);
    if ($iResultado == 1) {
        if ($bd->bd->obtener_respuesta(0, "VERIFY") == 1) {
            $resultado = $bd->bd->obtener_respuesta(0, "ID");
            $co->PutVar("iId", $resultado);
            $json->Tupla = 1;
            $json->iError = 1;
        } else {
            $json->Tupla = -1;
            $json->sError = "Falta verificar la cuenta";
        }
    } else {
        $json->Tupla = -1;
        $json->sError = "cuenta o contraseña incorrecta";
    }
}


echo json_encode($json);
?>