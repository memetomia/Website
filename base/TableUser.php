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
 public function Create($sFBID, $sName, $sEmail, $sDirPicture, $sUrlFbPicture, $sUser, $sPass) {
        $query = sprintf("INSERT INTO `gallery`.`user` "
                . "(`ID`, `FBID`, `NAME`, `EMAIL`, `PICTURE`, `VERIFY`, `USER`, `PASS`) VALUES "
                . "(NULL, '%s', '%s', '%s', '%s', 0, '%s', '%s');", $sFBID, $sName, $sEmail, $sDirPicture, $sUrlFbPicture, $sUser, $sPass);
        $this->bd->hacer_query($query);
        return $this->bd->ultimo_id_generado_por_la_bd();
    }
   /**
Descripcion aqui 
@param String $sData Descripcion aqui 
@param Integer $iID Descripcion aqui 

 @return type description
*/
 public function UpdateUserPicture($sData, $iID) {
        $query = sprintf("UPDATE  `gallery`.`user` SET  `PICTURE` =  '%s' WHERE  `user`.`ID` ='%s';", $sData, $iID);
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
        $query = sprintf("UPDATE  `gallery`.`user` SET  `VERIFY` =  '%s' WHERE  `user`.`ID` ='%s';", $sData, $iID);
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
        $query = sprintf("UPDATE  `gallery`.`user` SET  `PASS` =  '%s' WHERE  `user`.`ID` ='%s';", $sData, $iID);
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
        $query = sprintf("UPDATE  `gallery`.`user` SET  `USER` =  '%s' WHERE  `user`.`ID` ='%s';", $sData, $iID);
          $this->bd->hacer_query($query);
        return $this->bd->filas_retornadas_por_consulta();
    }
}