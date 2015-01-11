<?php

include_once 'base/classSession.php';
$co = new oSession();
if (isset($_GET["code"])) {
    $sParam = $_GET["code"];
    include_once 'base/const.php';

    include_once 'base/TableUser.php';

    $user = new TableUser();
    $verifico = -1;
    $verifico = $user->SearchaVarifyUserByCode($sParam);
    if ($verifico == 1) {
        echo "se ha verficado correctamente su cuenta bienvenido";
        if ($user->SearchUserByCode($sParam) > 0) {

            $co->PutVar("iId", $user->bd->obtener_respuesta(0, "ID"));
        }
    } else {
        echo "por favor intente nuevamente";
    }
} else {
    echo "falta codigo de cuenta para ser verificado";
}
?>