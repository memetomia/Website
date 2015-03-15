<?php

require_once ('conexion_mysql.php');
require_once('const.php');

class TableControl {

    public $bd;

    /**
      Descripcion aqui

      @return type description
     */
    function __construct() {
        $this->bd = new Conexion(MODO_DEBUG);
    }

    public function Create($iItem, $sDescripcion, $iNumerico, $sCadena) {
        $query = sprintf("INSERT INTO `gallery`.`control` (`ID`, `ITEM`, `DESCRIPCION`, `VALOR_NUMERICO`, `VALOR_CADENA`) "
                . "VALUES (NULL, '%s', '%s', '%s', '%s');", $iItem, $sDescripcion, $iNumerico, $sCadena);
        $this->bd->hacer_query($query);

        return $this->bd->ultimo_id_generado_por_la_bd();
    }

    /**
      Crea una tupla en la base de dato gallery ; agrega una imagen en la tabla gallery y a un usuario dueño de la tupla
      @param String $sTitle almacena el titulo maximo 255 caracteristica .
      @param integer $iTypeMedia 0:imagen;1:gif;2:videoyoutube;3:videovine;
      @param String $sInfoMedia html para incrustar dependiendo que tipo de media sea
      @param String $sUrl direccion de la imagen base a mostrar cuando sea cargado el post
      @param String $sTag cadenas de etiquetas en json
      @param Integer $iNMore puntos positivos del post
      @param Integer $iNLess puntos negativos del post
      @param Integer $iNComment numero de comentarios
      @param String $sComment html de memes o comentarios adicionales

      @return integer numero de tupla o -1 si falla la creacion
     */
    function addVisitGlobal() {
        $query = sprintf("update `control` set VALOR_NUMERICO=VALOR_NUMERICO+1 where ID=1 and ITEM=1");
        $this->bd->hacer_query($query);

    }

}
