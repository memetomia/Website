<?php

include_once '../../base/TableUser.php';


$bd = new TableUser();
include_once '../base/ClassCookie.php';
$co = new ClassCookie("sec");

$sUser = $_POST["sUser"];
$sEmail = $_POST["sMail"];
$bVideo = $_POST["bCheckVideo"];
$bGif = $_POST["bCheckGif"];
$json = new stdClass();
$json->Error = "";
$bd->SearchById($co->getSVar("iId"));
$CurrentUser = $bd->bd->obtener_respuesta(0, "USER");
$CurrentEmail = $bd->bd->obtener_respuesta(0, "EMAIL");
$CurrentVideo = $bd->bd->obtener_respuesta(0, "VIDEO");
$CurrentGif = $bd->bd->obtener_respuesta(0, "GIF");
if ($sUser != $CurrentUser) {
    $bd->UpdateUserLogin($sData, $iID);
}
if ($sEmail != $CurrentEmail) {
    $bd->UpdateUserEmail($sData, $iID);
}
if ($bVideo != $CurrentVideo) {
    $bd->UpdateUserCheckVideo($sData, $iID);
}
if ($bGif != $CurrentGif) {
    $bd->UpdateUserCheckGif($sData, $iID);
}
//if ($iResultado > 0) {
//
//} else {
//    $json->Error = $bd->bd->obtener_error();
//}


$json->Tupla = $iResultado;
echo json_encode($json);
?>