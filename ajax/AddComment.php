<?php
include_once '../base/TableComment.php';
$bd=new TableComment();
$bError=false;
$iIDUser = $_POST["iIDUser"];
$iIDGallery=$_POST["iID"];
$sComment = $_POST["sComment"];


if ($bError==false){
$iResultado=$bd->Create($iIDGallery, $iIDUser, $sComment);
$json=new stdClass();
}
$json->Tupla=$iResultado;
echo json_encode($json);

?>