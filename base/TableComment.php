<?php

require_once  ('conexion_mysql.php');
require_once  ('const.php');

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
        $query = sprintf("INSERT INTO `comment` (`ID_GALLERY`, `ID_USER`, `COMMENT`, `DATE`)"
                . " VALUES ('%s', '%s', '%s', CURRENT_TIMESTAMP);", $iIDGallery, $iIDUser, $sComment);
        $this->bd->hacer_query($query);
        return $this->bd->ultimo_id_generado_por_la_bd();
           
    }

    public function SeeComment($iIDGallery) {
            $query = sprintf("select u.PICTURE,u.NAME,c.ID_GALLERY, c.ID_USER,c.COMMENT,c.DATE from `comment` as c join user as u on u.id=c.ID_USER JOIN gallery as g on g.ID=c.ID_GALLERY where c.ID_GALLERY='%s'", $iIDGallery);
            $this->bd->hacer_query($query);
        return $this->bd->filas_retornadas_por_consulta();
    }
  public function SeeCommentbyUser($iIDUser) {
            $query = sprintf("select g.TITLE, u.PICTURE,u.NAME,c.ID_GALLERY, c.ID_USER,c.COMMENT,c.DATE from `comment` as c join user as u on u.id=c.ID_USER JOIN gallery as g on g.ID=c.ID_GALLERY where c.ID_USER='%s'", $iIDUser);
            $this->bd->hacer_query($query);
        return $this->bd->filas_retornadas_por_consulta();
    }
}
