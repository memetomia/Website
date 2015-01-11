<?php
include_once 'base/const.php';
include_once 'base/classSession.php';
include_once 'base/TableUser.php';

$co = new oSession();
$bTodoSimple = false;
$bdUser = new TableUser();

    if ($co->isEmpty()) {

        $bdUser->SearchByID($co->GetVar("iId"));
        $user = $bdUser->bd->obtener_respuesta(0, "NAME");
    }
    ?>