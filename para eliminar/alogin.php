<?php

include_once '../base/TableUser.php';

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
    
    $json->iError=-1;
    $json->Tupla = $iResultado;
    if ($iResultado == 1) {
        if ($bd->bd->obtener_respuesta(0, "VERIFY") == 1) {
         include_once '../base/ClassCookie.php';
            $co = new ClassCookie("sec");
            $resultado=$bd->bd->obtener_respuesta(0, "ID");
            $co->setSVar("iId", $resultado);
            $co->SaveAll();  
            $json->iError=0;
        } else {
            $json->iError = -2;
            $json->sError = "falta verificar la cuenta";
        }
    } else {
         $json->iError=-1;
        $json->sError = "Clave y nombre de cuenta incorrecto";
    }
}
 
echo json_encode($json);
?>