<?php

require_once ('conexion_mysql.php');
require_once ('const.php');

class TableUser_Gallery {

    public $bd;

    /**
      Descripcion aqui

      @return type description
     */
    function __construct() {
        $this->bd = new Conexion(MODO_DEBUG);
    }

    /**
      Descripcion aqui
      @param Integer $iIDUser Descripcion aqui
      @param Integer $iIDGallery Descripcion aqui
      @param String $sInfoImagen Descripcion aqui

      @return type description
     */
    public function Create($iIDUser, $iIDGallery, $sInfoImagen) {
        $query = sprintf("INSERT INTO `user_gallery` "
                . "(`ID_USER`, `ID_GALLARY`, `INFO_IMAGEN`, `DATE`) VALUES "
                . "('%s', '%s', '%s', CURRENT_TIMESTAMP);", $iIDUser, $iIDGallery, $sInfoImagen);
        $this->bd->hacer_query($query);
        return $this->bd->ultimo_id_generado_por_la_bd();
    }

  public function SearchArticlesTag($iID) {
        $query = sprintf("SELECT * FROM `gallery_tag` as gt  join tag as t on (gt.`ID_TAG`=t.ID) where
gt.`ID_GALLERY`=%s", $iID);
        $this->bd->hacer_query($query);
        
        return $this->bd->obtener_respuesta_completa();
    }

}
