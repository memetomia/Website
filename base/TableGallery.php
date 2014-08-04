<?php

require_once ('conexion_mysql.php');
require_once('const.php');

class TableGallery {

    public $bd;

    /**
      Descripcion aqui

      @return type description
     */
    function __construct() {
        $this->bd = new Conexion(MODO_DEBUG);
    }

    /**
      Crea una tupla en la base de dato gallery ; agrega una imagen en la tabla gallery
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
    public function Create($sTitle, $iTypeMedia, $sInfoMedia, $sUrl, $sTag, $sComment) {
        $query = sprintf("INSERT INTO `gallery` "
                . "(`ID`, `TITLE`, `TYPEMEDIA`, `INFOMEDIA`, `URL`, `DATE`, `TAG`, `N_MORE`, `N_LESS`, `N_COMMENT`, `COMMENT_ADDITIONAL`,STATE) "
                . "VALUES (NULL, '%s', '%s', '%s', '%s', CURRENT_TIMESTAMP, '%s', 0, 0, 0, '%s','1');", $sTitle, $iTypeMedia, $sInfoMedia, $sUrl, $sTag, $sComment);
        $this->bd->hacer_query($query);
        return $this->bd->ultimo_id_generado_por_la_bd();
    }

    /**
      cambia el titulo de el post
      @param String $sData titulo nuevo
      @param Integer $iID id del post en gallery a cambiar

      @return integer numero de filas retornados ejemplo 1 si agrego 0 sino agrego o -1 otro tipo de errores
     */
    public function UpdateTitle($sData, $iID) {
        $query = sprintf("UPDATE  `gallery` SET  `TITLE` =  '%s' WHERE  `ID` ='%s';", $sData, $iID);
        $this->bd->hacer_query($query);
        return $this->bd->filas_retornadas_por_consulta();
    }

    /**
      cambia los tag de el post
      @param String $sData nuevas etiquetas a cambiar
      @param Integer $iID Id del post en la gallery

      @return integer numero de filas retornados ejemplo 1 si agrego 0 sino agrego o -1 otro tipo de errores
     */
    public function UpdateTag($sData, $iID) {
        $query = sprintf("UPDATE  `gallery` SET  `TAG` =  '%s' WHERE  `ID` ='%s';", $sData, $iID);
        $this->bd->hacer_query($query);
        return $this->bd->filas_retornadas_por_consulta();
    }

    /**
      suma uno a el campo N_MORE es decir suma un punto positivo al post
      @param Integer $iID post a modificar

      @return integer numero de filas retornados ejemplo 1 si agrego 0 sino agrego o -1 otro tipo de errores
     */
    public function UpdateNMorePlus($iID) {
        $query = sprintf("UPDATE  `gallery` SET  `N_MORE` = N_MORE+1 WHERE  `ID` ='%s';", $iID);
        $this->bd->hacer_query($query);
        return $this->bd->filas_retornadas_por_consulta();
    }

    /**
      Resta un punto positivo del post
      @param Integer $iID id post a modificar
      @return integer numero de filas retornados ejemplo 1 si agrego 0 sino agrego o -1 otro tipo de errores
     */
    public function UpdateNMoreLess($iID) {
        $query = sprintf("UPDATE  `gallery` SET  `N_MORE` = N_MORE-1 WHERE  `ID` ='%s';", $iID);
        $this->bd->hacer_query($query);
        return $this->bd->filas_retornadas_por_consulta();
    }

    /**
      suma un punto negativo a una imagen de post
      @param Integer $iID id post a modificar

      @return integer numero de filas retornados ejemplo 1 si agrego 0 sino agrego o -1 otro tipo de errores
     */
    public function UpdateNLessPlus($iID) {
        $query = sprintf("UPDATE  `gallery` SET  `N_LESS` = N_LESS+1 WHERE  `ID` ='%s';", $iID);
        $this->bd->hacer_query($query);
        return $this->bd->filas_retornadas_por_consulta();
    }

    /**
      Resta un punto negativo a un post
      @param Integer $iID id post a modificar

      @return integer numero de filas retornados ejemplo 1 si agrego 0 sino agrego o -1 otro tipo de errores
     */
    public function UpdateNLessLess($iID) {
        $query = sprintf("UPDATE  `gallery` SET  `N_LESS` = N_LESS-1 WHERE  `ID` ='%s';", $iID);
        $this->bd->hacer_query($query);
        return $this->bd->filas_retornadas_por_consulta();
    }

    /**
      aumenta numero de comentarios
      @param Integer $iID id de el post a modificar
      @return integer numero de filas retornados ejemplo 1 si agrego 0 sino agrego o -1 otro tipo de errores
     */
    public function UpdateNCOMMENTPlus($iID) {
        $query = sprintf("UPDATE  `gallery` SET  `N_COMMENT` = N_COMMENT+1 WHERE  `ID` ='%s';", $iID);
        $this->bd->hacer_query($query);
        return $this->bd->filas_retornadas_por_consulta();
    }

    /**
      Resta numero de comentarios
      @param Integer $iID id post a modificar

      @return integer numero de filas retornados ejemplo 1 si agrego 0 sino agrego o -1 otro tipo de errores
     */
    public function UpdateNCOMMENTLess($iID) {
        $query = sprintf("UPDATE  `gallery` SET  `N_COMMENT` = N_COMMENT-1 WHERE  `ID` ='%s';", $iID);
        $this->bd->hacer_query($query);
        return $this->bd->filas_retornadas_por_consulta();
    }

    public function All() {
        $query = sprintf("Select * from gallery ORDER BY  `ID` DESC LIMIT 0 , 30;");
        $this->bd->hacer_query($query);
        return $this->bd->filas_retornadas_por_consulta();
    }

    public function Trending($iN) {
        $query = sprintf("SELECT * 
FROM  `gallery` 
ORDER BY  `gallery`.`N_MORE` ASC 
LIMIT 0 , %s", $iN);
        $this->bd->hacer_query($query);
        return $this->bd->filas_retornadas_por_consulta();
    }

    public function SearchById($iID) {
        $query = sprintf("Select * from gallery ORDER BY  `ID`='%s' DESC ;", $iID);
        $this->bd->hacer_query($query);
        return $this->bd->obtener_respuesta_completa();
    }

    public function Active($iID) {
        $query = sprintf("UPDATE  `gallery` SET  `STATE` = 0 WHERE  `ID` ='%s';", $iID);
        $this->bd->hacer_query($query);
        return $this->bd->filas_retornadas_por_consulta();
    }

    public function Desactive($iID) {
        $query = sprintf("UPDATE  `gallery` SET  `STATE` = 1 WHERE  `ID` ='%s';", $iID);
        $this->bd->hacer_query($query);
        return $this->bd->filas_retornadas_por_consulta();
    }

    public function Del($iID) {
        $query = sprintf("Delete from `gallery` "
                . " WHERE  `ID` =%s;", $iID);
        $this->bd->hacer_query($query);
        return $this->bd->filas_retornadas_por_consulta();
    }

    public function LastNArticle($iInicio, $iFin) {
        $query = sprintf("Select * from gallery join user on (user.ID=gallery.OWNER) ORDER BY  gallery.`DATE`  DESC LIMIT %s,%s;", $iInicio, $iFin);
        $this->bd->hacer_query($query);
        return $this->bd->filas_retornadas_por_consulta();
    }

}
