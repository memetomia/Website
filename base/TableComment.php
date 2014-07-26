<?php
require ('conexion_mysql.php');
require ('const.php');
class TableComment {
    public $bd;
 /**
Descripcion aqui 

 @return type description
*/
   function __construct() {
        $this->bd = new Conexion(MODO_DEBUG);
    }
   /**
permite crear un comentario a una imagen dado la imagen el usuario y el comentario 
@param Integer $iIDGallery Id de imagen en la tabla gallery (sin consultar en tabla gallery) 
@param Integer $iIDUser id de usuario en la tabla user (sin consultar en tabla user)
@param String $sComment texto a guardar;comentario a guardar

 @return int retorna id de la tubla creada o -1 si hay error
*/
 public function Create($iIDGallery, $iIDUser, $sComment) {
        $query = sprintf("INSERT INTO `gallery`.`comment` (`ID_GALLERY`, `ID_USER`, `COMMENT`, `DATE`)"
                . " VALUES ('%s', '%s', '%s', CURRENT_TIMESTAMP);",
                $iIDGallery, $iIDUser, $sComment);
        $this->bd->hacer_query($query);
        return $this->bd->ultimo_id_generado_por_la_bd();
    }
}
