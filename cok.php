<?php

include_once 'base/classSession.php';
$co = new oSession();
include_once 'base/TableUser.php';
$bd = new TableUser();
$iResultado = $bd->login("jaivic", "A2jy8gfeobbyff");
if ($iResultado == 1) {

    if ($bd->bd->obtener_respuesta(0, "VERIFY") == 1) {

        $resultado = $bd->bd->obtener_respuesta(0, "ID");


        $co->PutVar("iId", $resultado);
        echo $co->GetVar("iId");
        //header('Location: index.php');
    }
}    
 