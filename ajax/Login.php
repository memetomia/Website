<?php

include_once '../base/TableUser.php';
include_once '../base/ClassCookie.php';
$bd = new TableUser();
$bError = false;
 $iResultado=-1;
 $json = new stdClass();
if (isset($_POST["sUser"])) {
    $sName = $_POST["sUser"];
} else {
    $bError = true;
}
//if (isset($_POST["sRecordarme"])) {
//    $sEmail = $_POST["sRecordarme"];
//} else {
//    $bError = true;
//}
if (isset($_POST["sPassword"])) {
    $sPass = $_POST["sPassword"];
} else {
    $bError = true;
}

if ($bError == false) {
    $iResultado = $bd->login($sName, $sPass);
    if ($iResultado == 1) {
        if ($bd->bd->obtener_respuesta(0, "VERIFY") == 1) {
            $co = new ClassCookie("sec");
            $co->setSVar("iId", $bd->bd->obtener_respuesta(0, "ID"));
           $co->SaveAll();
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