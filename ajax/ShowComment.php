<?php

include_once '../base/TableComment.php';

$iIDGallery;
$bdCommentNotificaciones = new TableComment();

if (isset($_POST["idGallery"])) {
    $iIDGallery = $_POST["idGallery"];
} else {
    $bError = true;
}
$bdCommentNotificaciones->SeeComment($iIDGallery);
$json = new stdClass();
$json->Tupla = -1;
$json->aComment = null;
$bError = false;
$array = array();
////$imagenUserComment="media/default/profile-example.jpg";
////$UserName="María Rodríguez";
////$UserComment="jajajajaja!, que divertida la foto!"
//            include 'frame/Comment.php';
//        }

for ($iNotification = 0; (($iNotification < $bdCommentNotificaciones->bd->filas_retornadas_por_consulta())); $iNotification++) {
    $array[$iNotification]["iDirImagen"] = $bdCommentNotificaciones->bd->obtener_respuesta($iNotification, "PICTURE");
    $array[$iNotification]["sName"] = $bdCommentNotificaciones->bd->obtener_respuesta($iNotification, "NAME");
    $array[$iNotification]["sComment"] = $bdCommentNotificaciones->bd->obtener_respuesta($iNotification, "COMMENT");
    
}
$json->Tupla = $iNotification;

$json->aComment = $array;


echo json_encode($json);

//        <span class="not-readed"></span> 
//        <span class="glyphicon glyphicon-comment"></span>
//            <a href="#">      </a> hizo un comentario en tu post: <a href="#"> </a>
?> 
