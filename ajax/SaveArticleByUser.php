<?php

include_once '../base/classSession.php';
$co = new oSession();
include_once '../base/TableGallery.php';
include_once '../base/funciones.php';

$bd = new TableGallery();

$bError = false;
$sTitle = $_POST["sTitle"];
$sUrl = $_POST["sUrl"];
$pathinfo = pathinfo($sUrl);
$ext = $pathinfo['extension'];

$infomedia = EXT_USER . "/"; //imagen
$sMetaData = '';
$bCensura = 0;
$json = new stdClass();

$iResultado = -1;
$json->Error = "";
if ($bError == false) {
    $NewDir = USER . "/" . $co->GetVar("iId");
    $SePuedeMover = False;
    if (!file_exists($NewDir)) {
        $SePuedeMover = mkdir($NewDir);
    } else {
        $SePuedeMover = true;
    }

    if ($SePuedeMover) {
        $infomedia.="/" . sanear_string($sTitle) . "." . $ext;
        $sNewURL = $NewDir . "/" . sanear_string($sTitle) . "." . $ext;
        if (!file_exists(($sNewURL))) {
            rename("../media/article/user/" . $_POST["sUrl"], $sNewURL);
            $iResultado = $bd->CreateWithUser($sTitle, $co->GetVar("iId"), 0, $infomedia, sanear_string($sTitle) . "." . $ext);
        } else {
            $json->Error = "Problema  al intentar Mover El archivo";
        }
    } else {
         $json->Error = "Problema  al intentar encontra la caperta";
       
    }
//   
}
$json->Tupla = $iResultado;
echo json_encode($json);
?>