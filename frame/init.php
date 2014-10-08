<?php
include_once 'base/const.php';
include_once 'base/ClassCookie.php';
include_once 'base/TableUser.php';

$co = new ClassCookie("sec");
$bTodoSimple = false;
$bdUser = new TableUser();

    if ($co->IsSession()) {

        $bdUser->SearchByID($co->getSVar("iId"));
        $user = $bdUser->bd->obtener_respuesta(0, "NAME");
    }
    ?>