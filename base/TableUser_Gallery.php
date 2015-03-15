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

    public function SeeLikeByUser($iIDUser) {
        $query = sprintf("select g.TITLE, u.PICTURE,u.NAME,c.SEE_IT_BY_OWNER,c.ID_GALLARY, c.ID_USER,c.INFO_IMAGEN,c.DATE from `user_gallery` as c join user as u on u.id=c.ID_USER JOIN gallery as g on g.ID=c.ID_GALLARY where c.ID_USER='%s'", $iIDUser);
        $this->bd->hacer_query($query);
        return $this->bd->filas_retornadas_por_consulta();
    }

    public function GetActivityMyLike($iUser) {
        $query = sprintf("SELECT DISTINCT g.TITLE, g.N_MORE, g.N_COMMENT, g.URL,g.TYPEMEDIA
FROM gallery AS g
JOIN user_gallery AS c ON g.ID = c.ID_GALLARY
WHERE c.`ID_USER` =  '%s'", $iUser);
        $this->bd->hacer_query($query);

        return $this->bd->ultimo_id_generado_por_la_bd();
    }

}
