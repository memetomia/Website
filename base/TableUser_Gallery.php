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
@param Integer $iIDUser Descripcion aqui 
@param Integer $iIDGallery Descripcion aqui 
@param String $sInfoImagen Descripcion aqui 

 @return type description
*/
 public function Create($iIDUser, $iIDGallery, $sInfoImagen) {
        $query = sprintf("INSERT INTO `gallery`.`user_gallery` "
                . "(`ID_USER`, `ID_GALLARY`, `INFO_IMAGEN`, `DATE`) VALUES "
                . "('%s', '%s', '%s', CURRENT_TIMESTAMP);", $iIDUser, $iIDGallery, $sInfoImagen);
        $this->bd->hacer_query($query);
        return $this->bd->ultimo_id_generado_por_la_bd();
    }
}
