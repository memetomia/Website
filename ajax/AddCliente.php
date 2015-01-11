<?php

include_once '../base/TableUser.php';

$bd = new TableUser();
$json = new stdClass();
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
$iAcountExist = $bd->SearchEmail($sEmail);
if ($iAcountExist > 0) {
    $bError = true;
    $json->Tupla = -1;
    $json->sError = "El correo no esta disponible por favor use otro";
}

if ($bError == false) {
    $iAcountExist = $bd->SearchUser($sName);
    if ($iAcountExist > 0) {
        $bError = true;
        $json->Tupla = -1;
        $json->sError = "El nombre de cuenta no esta disponible por favor use otro";
    }
}


if ($bError == false) {

    $iResultado = $bd->Create($sName, $sEmail, $sName, $sPass);
//    $co = new ClassCookie("sec");
//    $co->setSVar("iId", $iResultado);
//    $co->SaveAll();
    if ($iResultado > 0) {
        $link = "http://memetomia.com/verificar.php?code=" . md5($iResultado) . md5($sName);
        ini_set('sendmail_path', '/usr/sbin/sendmail');


        ini_set('sendmail_from', 'info@memetomia.com');
        $mens = sprintf("Estimado(a) Usuario(a) (%s), reciba un cordial saludo por parte del equipo de Memetomia.
    Su cuenta ha sido creada satisfactoriamente. 

    Haz clic en el siguiente enlace para verificar la dirección de correo electrónico en tu cuenta de Memetomia.com:
    %s
    
    Este correo electrónico ha sido generado automáticamente y una respuesta al mismo no sera atendida.", $sName, $link);
        mail($sEmail, "Memetomia - Activacion de cuenta", $mens);



        $json->Tupla = $iResultado;
    } else {
        $json->Tupla = -1;
        $json->sError = "no se pudo guardar los datos; por favor intente mas tarde";
    }
}

echo json_encode($json);
?>