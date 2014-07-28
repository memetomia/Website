<?php

include_once '../../base/TableTag.php';
$bd = new TableTag();
$bError = false;
$sName = $_POST["q"];
$iResultado = $bd->SearchByName($sName);
for ($i = 0; $i < $iResultado; $i++) {
    if ($bd->bd->obtener_respuesta($i, "NAME") != "NO_INFO")
        ECHO $bd->bd->obtener_respuesta($i, "NAME") . "\n";
}
?>