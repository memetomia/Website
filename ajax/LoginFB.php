<?php

include_once '../base/classSession.php';
$co = new oSession();
include_once '../base/TableUser.php';
$bd = new TableUser();
$bError = false;
if (isset($_POST["sGenero"])) {
    $sGenero = $_POST["sGenero"];
} else {
    $bError = true;
}

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
if ($sGenero == 'male') {
    $sGenero = 1;
}
if ($sGenero == 'female') {
    $sGenero = '2';
}

$json = new stdClass();
if ($bError == false) {
    $iResultado = $bd->SearchFbID($iID);
    $iResultado = $bd->bd->obtener_respuesta(0, "ID");
    if ($iResultado == 1) {
        $co->PutVar("iId", $iResultado);
        $json->Tupla = 1;
        $json->Listo = "ok";
    } else {
        $iResultado = -1;
        $iResultado = $bd->SearchEmail($sEmail);
        if ($iResultado > 0) {
            $idObtenido = $bd->bd->obtener_respuesta(0, "ID");
            if ($bd->bd->obtener_respuesta(0, "NAME") == "") {

                $bd->UpdateUserName($sName, $idObtenido);
            }
            if ($bd->bd->obtener_respuesta(0, "GENERO") == 0) {
                $bd->UpdateUserGenero($sGenero, $idObtenido);
            }
            if ($bd->bd->obtener_respuesta(0, "PICTURE") == "") {
                $bd->UpdateUserPicture($sPicture, $idObtenido);
            }
            if ($bd->bd->obtener_respuesta(0, "FBID") == "") {
                $bd->UpdateUserFBID($iID, $idObtenido);
            }
            if ($bd->bd->obtener_respuesta(0, "VERIFY") == "0") {
                $bd->UpdateUserVerify(1, $idObtenido);
            }
            $co->PutVar("iId", $idObtenido);

            $json->Tupla = 1;
            $json->Listo = "actualizado ok";
        } else {
            $registro = -1;
            $registro = $bd->CreateFB($iID, $sName, $sEmail, $sPicture, str_replace(" ", ".", $sUser), "", $sGenero);
            if ($registro > -1) {
                $co->PutVar("iId", $registro);

                $json->Tupla = 1;
                $json->Listo = "Creado ok";
            } else {
                $json->Tupla = -1;
                $json->sError = "no se pudo guardar los datos de facebook";
            }
        }
    }
}

echo json_encode($json);
?>