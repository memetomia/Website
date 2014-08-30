<?php

require ('conexion_mysql.php');
require ('const.php');

class TableUser {

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
      @param String $sFBID Descripcion aqui
      @param String $sName Descripcion aqui
      @param String $sEmail Descripcion aqui
      @param String $sDirPicture Descripcion aqui
      @param String $sUrlFbPicture Descripcion aqui
      @param String $sUser Descripcion aqui
      @param String $sPass Descripcion aqui

      @return type description
     */
    public function Create( $sName, $sEmail, $sUser, $sPass) {
       
        $query = sprintf("INSERT INTO `user` "
                . "(`ID`, `FBID`, `NAME`, `EMAIL`, `PICTURE`, `VERIFY`, `USER`, `PASS`) VALUES "
                . "(NULL, '', '%s', '%s', '', 0, '%s', md5('%s'));", $sName, $sEmail, $sUser, $sPass);
        $this->bd->hacer_query($query);
        return $this->bd->ultimo_id_generado_por_la_bd();
    }

    public function CreateFB($sFBID, $sName, $sEmail, $sDirPicture, $sUser, $sPass) {
        $query = sprintf("INSERT INTO `user` "
                . "(`ID`, `FBID`, `NAME`, `EMAIL`, `PICTURE`, `VERIFY`, `USER`, `PASS`) VALUES "
                . "(NULL, '%s', '%s', '%s', '%s', 1, '%s', md5('%s'));", $sFBID, $sName, $sEmail, $sDirPicture, $sUser, $sPass);
        $this->bd->hacer_query($query);
        return $this->bd->ultimo_id_generado_por_la_bd();
    }

    public function SearchCountExist($sEmail, $sUser, $sFBID) {
        $query = sprintf("SELECT * FROM  `user` WHERE  `EMAIL` =  '%s' OR  `USER` =  '%s'"
                . "  or `FBID`='%s'", $sEmail, $sUser, $sFBID);
        $this->bd->hacer_query($query);
        return $this->bd->filas_retornadas_por_consulta();
    }

    public function SearchEmail($sParam) {
        $query = sprintf("SELECT * FROM  `user` WHERE `EMAIL` =  '%s'", $sParam);
        $this->bd->hacer_query($query);
        return $this->bd->filas_retornadas_por_consulta();
    }

    public function SearchUser($sParam) {
        $query = sprintf("SELECT * FROM  `user` WHERE USER=  '%s'", $sParam);
        $this->bd->hacer_query($query);
        return $this->bd->filas_retornadas_por_consulta();
    }

    public function login($sName, $sPass) {
        $query = sprintf("SELECT * 
FROM  `user` 
WHERE (
`USER` =  '%s'
OR  `EMAIL` =  '%s'
)
AND  `PASS` =  md5('%s')", $sName, $sName, $sPass);
        $this->bd->hacer_query($query);
        return $this->bd->filas_retornadas_por_consulta();
    }

    function SearchFbID($iID) {
        $query = sprintf("SELECT * 
FROM  `user` 
WHERE (
`FBID` =  '%s'
", $iID);
        $this->bd->hacer_query($query);
        return $this->bd->filas_retornadas_por_consulta();
    }

    /**
      Descripcion aqui
      @param String $sData Descripcion aqui
      @param Integer $iID Descripcion aqui

      @return type description
     */
    public function UpdateUserPicture($sData, $iID) {
        $query = sprintf("UPDATE  `user` SET  `PICTURE` =  '%s' WHERE  `user`.`ID` ='%s';", $sData, $iID);
        $this->bd->hacer_query($query);
        return $this->bd->filas_retornadas_por_consulta();
    }

    /**
      Descripcion aqui
      @param String $sData Descripcion aqui
      @param Integer $iID Descripcion aqui

      @return type description
     */
    public function UpdateUserVerify($sData, $iID) {
        $query = sprintf("UPDATE  `user` SET  `VERIFY` =  '%s' WHERE  `user`.`ID` ='%s';", $sData, $iID);
        $this->bd->hacer_query($query);
        return $this->bd->filas_retornadas_por_consulta();
    }

    /**
      Descripcion aqui
      @param String $sData Descripcion aqui
      @param Integer $iID Descripcion aqui

      @return type description
     */
    public function UpdateUserPass($sData, $iID) {
        $query = sprintf("UPDATE  `user` SET  `PASS` =  '%s' WHERE  `user`.`ID` ='%s';", $sData, $iID);
        $this->bd->hacer_query($query);
        return $this->bd->filas_retornadas_por_consulta();
    }

    /**
      Descripcion aqui
      @param String $sData Descripcion aqui
      @param Integer $iID Descripcion aqui

      @return type description
     */
    public function UpdateUserLogin($sData, $iID) {
        $query = sprintf("UPDATE  `user` SET  `USER` =  '%s' WHERE  `user`.`ID` ='%s';", $sData, $iID);
        $this->bd->hacer_query($query);
        return $this->bd->filas_retornadas_por_consulta();
    }

}
