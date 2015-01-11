<?php

include_once '../base/TableComment.php';
include_once '../base/classSession.php';
$co = new oSession();
$bd = new TableComment();
$bd->GetActivityMyComment($co->GetVar("iId"));
//$bd->GetActivityMyComment(0);

$json = new stdClass();
$json->Tupla = -1;
$json->aComment = null;
$bError = false;
$array = array();
$TYPEMEDIA = "";
for ($i = 0; (($i < $bd->bd->filas_retornadas_por_consulta()) && ($i < 5)); $i++) {
    $TYPEMEDIA = $bd->bd->obtener_respuesta($i, "TYPEMEDIA");
    if ($TYPEMEDIA == 1) {

        $array[$i]["Surl"] = EXT_ARTICLE . $bd->bd->obtener_respuesta($i, "URL");
    } else {
        $array[$i]["Surl"] = $bd->bd->obtener_respuesta($i, "URL");
    }    $array[$i]["sTitle"] = $bd->bd->obtener_respuesta($i, "TITLE");
    $array[$i]["NMore"] = $bd->bd->obtener_respuesta($i, "N_MORE");
    $array[$i]["NComment"] = $bd->bd->obtener_respuesta($i, "N_COMMENT");
    $array[$i]["Surl"] = $bd->bd->obtener_respuesta($i, "URL");
}

$json->Tupla = $i;
$json->aActivity = $array;
echo json_encode($json);
?> 
