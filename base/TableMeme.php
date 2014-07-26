<?php
require ('conexion_mysql.php');
require ('const.php');
class TableMeme {
    public $bd;
 /**
Descripcion aqui 

 @return type description
*/
   function __construct() {
        $this->bd = new Conexion(MODO_DEBUG);
    }
   /**
crea un meme dado el nombre y la url
@param String $sName nombre del meme 
@param String $sUrl  direccion del meme

 @return integer numero de la nueva tupla o -1 si hay un error
*/
 public function Create($sName, $sUrl) {
        $query = sprintf("INSERT INTO `gallery`.`meme` (`ID`, `NAME`, `URL`, `COUNT`) "
                . "VALUES "
                . "(NULL, '%s', '%s', '0');", $sName, $sUrl);
        $this->bd->hacer_query($query);
        return $this->bd->ultimo_id_generado_por_la_bd();
    }
   /**
cada vez que se usa el meme se puede sumar su count para llevar un control
@param Integer $iID id del meme a cambiar 

 @return type description
*/
 public function UpdateCountPlus($iID) {
        $query = sprintf("UPDATE  `gallery`.`meme` SET  `COUNT` =  COUNT+1 WHERE  `user`.`ID` ='%s';", $sData, $iID);
        $this->bd->hacer_query($query);
        return $this->bd->filas_retornadas_por_consulta();
    }
   /**
resta el punto de count
@param Integer $iID id de post a generar 

 @return type description
*/
 public function UpdateCountLess($iID) {
        $query = sprintf("UPDATE  `gallery`.`meme` SET  `COUNT` =  COUNT-1 WHERE  `user`.`ID` ='%s';", $sData, $iID);
        $this->bd->hacer_query($query);
        return $this->bd->filas_retornadas_por_consulta();
    }
    
      public function All() {
        $query = sprintf("Select * from `gallery`.meme ORDER BY  `meme`.`STATE` ASC ;");
        $this->bd->hacer_query($query);
        return $this->bd->filas_retornadas_por_consulta();
    }
      public function SearchByName($sName) {
        $query = sprintf("Select * from `gallery`.meme where NAME LIKE '%s%%';",$sName);
        $this->bd->hacer_query($query);
         
        return $this->bd->filas_retornadas_por_consulta();
    }
     public function rSearchByName($sName) {
        $query = sprintf("Select * from `gallery`.meme where NAME ='%s';",$sName);
        $this->bd->hacer_query($query);
            return $this->bd->filas_retornadas_por_consulta();
    }
}
