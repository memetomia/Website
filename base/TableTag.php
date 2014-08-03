<?php

require_once ('conexion_mysql.php');
require_once ('const.php');

class TableTag {

    public $bd;

    /**
      Descripcion aqui

      @return type description
     */
    function __construct() {
        $this->bd = new Conexion(MODO_DEBUG);
    }

    /**
      crea una tupla de tag
      @param String $sName nombre del tag

      @return integer numero de la tupla creada
     */
    public function Create($sName) {
        $query = sprintf("INSERT INTO `tag` (`ID`, `NAME`, `COUNT`, `VISIT`)"
                . " VALUES (NULL, '%s', '0', '0');", $sName);
        $this->bd->hacer_query($query);
        return $this->bd->ultimo_id_generado_por_la_bd();
    }

    /**
      agrega un contador a el tag cuando es usado en un post
      @param Integer $iID id del post para modificar

      @return type description
     */
    public function UpdateCountPlus($iID) {
        $query = sprintf("UPDATE  `tag` SET  `COUNT` =  COUNT+1 WHERE  `tag`.`ID` ='%s';", $iID);
        $this->bd->hacer_query($query);
        return $this->bd->filas_retornadas_por_consulta();
    }

    /**
      resta un contador
      @param Integer $iID id del post a modificar
      @return type description
     */
    public function UpdateCountLess($iID) {
        $query = sprintf("UPDATE  `tag` SET  `COUNT` =  COUNT-1 WHERE  `ID` ='%s';", $iID);
        $this->bd->hacer_query($query);
        return $this->bd->filas_retornadas_por_consulta();
    }

    /**
      agrega una vista a el tag; esto pasa cuando es visitada el apartado de tag
      @param Integer $iID id del post a modificar

      @return type description
     */
    public function UpdateVisitPlus($iID) {
        $query = sprintf("UPDATE  `tag` SET  `VISIT` =  VISIT+1 WHERE  `ID` ='%s';", $iID);
        $this->bd->hacer_query($query);
        return $this->bd->filas_retornadas_por_consulta();
    }

    /**
      Descripcion aqui
      @param Integer $iID id del post a modificar

      @return type description
     */
    public function UpdateVisitLess($iID) {
        $query = sprintf("UPDATE  `tag` SET  `VISIT` =  VISIT-1 WHERE  `ID` ='%s';", $iID);
        $this->bd->hacer_query($query);
        return $this->bd->filas_retornadas_por_consulta();
    }

    public function iSearchTagByNameExact($sName) {
        $query = sprintf("SELECT *
FROM  `tag` where NAME='%s'", $sName);
        $this->bd->hacer_query($query);

        if ($this->bd->filas_retornadas_por_consulta() <= 0) {
            return $this->Create($sName);
        }
        return $this->bd->obtener_respuesta(0, "ID");
    }

    function AddTagToArticle($iIDTag, $UltimoId) {
        $sQuery = sprintf("SELECT * FROM `gallery_tag` "
                . "WHERE `ID_TAG` = '%s' AND `ID_GALLERY` = '%s';", $iIDTag, $UltimoId);
        $this->bd->hacer_query($sQuery);
        if ($this->bd->filas_retornadas_por_consulta() <= 0) {
            $sQuery = sprintf("INSERT INTO `gallery_tag` "
                    . "(`ID_TAG`, `ID_GALLERY`, `PESO`) "
                    . "VALUES"
                    . " ('%s', '%s', '0');", $iIDTag, $UltimoId);
            $this->bd->hacer_query($sQuery);
        } else {
            $sQuery = sprintf("UPDATE `gallery_tag` SET PESO=PESO+1 "
                    . "WHERE `ID_TAG` = '%s' AND `ID_GALLERY` = '%s';", $iIDTag, $UltimoId);
            $this->bd->hacer_query($sQuery);
        }
        $this->UpdateCountPlus($iIDTag);
    }

    public function All() {
        $query = sprintf("Select * from tag ORDER BY  `tag`.`COUNT` DESC ;");
        $this->bd->hacer_query($query);
        return $this->bd->filas_retornadas_por_consulta();
    }

   

    public function SearchByName($sName) {
        $query = sprintf("Select * from tag where NAME LIKE '%s%%';", $sName);
        $this->bd->hacer_query($query);

        return $this->bd->filas_retornadas_por_consulta();
    }

    public function SearchByExactName($sName) {
        $query = sprintf("Select * from tag where NAME = '%s';", $sName);
        $this->bd->hacer_query($query);

        return $this->bd->filas_retornadas_por_consulta();
    }

    public function mod($id, $new) {
        $query = sprintf("UPDATE  `tag` SET  `NAME` =  '%s' WHERE  `tag`.`ID` ='%s';", $new, $id);
        $this->bd->hacer_query($query);

        return $this->bd->filas_retornadas_por_consulta();
    }

    public function Del($iID) {
        $query = sprintf("Delete from `tag` "
                . " WHERE  `tag`.`ID` =%s;", $iID);
        $this->bd->hacer_query($query);
        return $this->bd->filas_retornadas_por_consulta();
    }

}
