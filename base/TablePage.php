<?php

require ('conexion_mysql.php');
require ('const.php');

class TablePage {

    public $bd;

    /**
      Descripcion aqui

      @return type description
     */
    function __construct() {
        $this->bd = new Conexion(MODO_DEBUG);
    }

    /**
      crear una tupla de pagina
      @param String $sName Nombre de la pagina
      @param String $sUrl url de la pagina

      @return integer nuemo de la tupla creada o -1 si falla
     */
    public function Create($sName, $sUrl) {
        $query = sprintf("INSERT INTO `gallery`.`page` (`ID`, `NAME`, `URL`, `COUNT`) "
                . "VALUES "
                . "(NULL, '%s', '%s', '0');", $sName, $sUrl);
        $this->bd->hacer_query($query);
        return $this->bd->ultimo_id_generado_por_la_bd();
    }

    public function Del($iID) {
        $query = sprintf("UPDATE  `gallery`.`page` "
                . "SET  `STATE` =  '1' WHERE  `page`.`ID` =%s;", $iID);
        $this->bd->hacer_query($query);
        return $this->bd->filas_retornadas_por_consulta();
    }

    public function Mod($sName, $sUrl, $iID) {
        $query = sprintf("UPDATE  `gallery`.`page` "
                . "SET  `NAME` =  '%s', URL='%s' WHERE  `page`.`ID` =%s;", $sName, $sUrl, $iID);
        $this->bd->hacer_query($query);
        return $this->bd->filas_retornadas_por_consulta();
    }

    /**
      agrega un contador si se saca una imagen de la pagina
      @param Integer $iID id del post a modificar

      @return interger retorna el id de la filas modificadas
     */
    public function UpdateCountPlus($iID) {
        $query = sprintf("UPDATE  `gallery`.`page` SET  `COUNT` =  COUNT+1 WHERE  `user`.`ID` ='%s';", $sData, $iID);
        $this->bd->hacer_query($query);
        return $this->bd->filas_retornadas_por_consulta();
    }

    /**
      resta un contador de count
      @param Integer $iID id de post a modificar

      @return integer retorna el id de las filas a modificar
     */
    public function UpdateCountLess($iID) {
        $query = sprintf("UPDATE  `gallery`.`page` SET  `COUNT` =  COUNT-1 WHERE  `user`.`ID` ='%s';", $sData, $iID);
        $this->bd->hacer_query($query);
        return $this->bd->filas_retornadas_por_consulta();
    }

    public function SearchPage($iID) {
        $query = sprintf("Select * from `gallery`.page where ID='%s';", $iID);
        $this->bd->hacer_query($query);

        return $this->bd->filas_retornadas_por_consulta();
    }

    public function AllPage() {
        $query = sprintf("Select * from `gallery`.page ORDER BY  `page`.`STATE` ASC ;");
        $this->bd->hacer_query($query);
        return $this->bd->filas_retornadas_por_consulta();
    }

}
