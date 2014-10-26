<?php

include_once '../base/TableUser_Gallery.php';
include_once '../base/ClassCookie.php';
$co = new ClassCookie("sec");
$bdCommentNotificaciones = new TableUser_Gallery();
$bdCommentNotificaciones->SeeLikeByUser($co->getSVar("iId"));

$json = new stdClass();
$json->Tupla = -1;
$json->aComment=null;
$bError = false;
$array = array();
for ($iNotification = 0; (($iNotification < $bdCommentNotificaciones->bd->filas_retornadas_por_consulta()) && ($iNotification < 5)); $iNotification++) {
    $array[$iNotification]["sTitleImagen"] = $bdCommentNotificaciones->bd->obtener_respuesta($iNotification, "TITLE");
    $array[$iNotification]["sNameUser"] = $bdCommentNotificaciones->bd->obtener_respuesta($iNotification, "NAME");
     $array[$iNotification]["iIDGalery"] = $bdCommentNotificaciones->bd->obtener_respuesta($iNotification, "ID_GALLARY");
      $array[$iNotification]["iIDUser"] = $bdCommentNotificaciones->bd->obtener_respuesta($iNotification, "ID_USER");
    $array[$iNotification]["bSeeByOwner"] = $bdCommentNotificaciones->bd->obtener_respuesta($iNotification, "SEE_IT_BY_OWNER");

      
    
}
$json->Tupla = $iNotification;

 $json->aComment=$array;


echo json_encode($json);

//        <span class="not-readed"></span> 
//        <span class="glyphicon glyphicon-comment"></span>
//            <a href="#">      </a> hizo un comentario en tu post: <a href="#"> </a>
?> 
