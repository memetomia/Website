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
    public function Create($sTitle, $iTypeMedia, $sInfoMedia, $sUrl, $sTag, $sComment, $sMeta = "", $bCensura) {
        $query = sprintf("INSERT INTO `gallery` "
                . "(`ID`, `TITLE`, `TYPEMEDIA`, `INFOMEDIA`, `URL`, `DATE`, `TAG`, `N_MORE`, `N_LESS`, `N_COMMENT`, `COMMENT_ADDITIONAL`,STATE,META,CENSURA) "
                . "VALUES (NULL, '%s', '%s', '%s', '%s', CURRENT_TIMESTAMP, '%s', 0, 0, 0, '%s','1','%s','%s');", $sTitle, $iTypeMedia, $sInfoMedia, $sUrl, $sTag, $sComment, $sMeta, $bCensura);
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
    public function CreateWithUser($sTitle, $iOwner, $iTypeMedia, $sInfoMedia, $sUrl, $sTag, $sComment, $sMeta = "", $bCensura) {
        $query = sprintf("INSERT INTO `gallery` "
                . "(`ID`,`OWNER`, `TITLE`, `TYPEMEDIA`, `INFOMEDIA`, `URL`, `DATE`, `TAG`, `N_MORE`, `N_LESS`, `N_COMMENT`, `COMMENT_ADDITIONAL`,STATE,META,CENSURA) "
                . "VALUES (NULL, '%s', '%s', '%s', '%s', CURRENT_TIMESTAMP, '%s', 0, 0, 0, '%s','1','%s','%s');", $sTitle, $iOwner, $iTypeMedia, $sInfoMedia, $sUrl, $sTag, $sComment, $sMeta, $bCensura);
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
        $query = sprintf("UPDATE  `gallery` SET  `TAG` =  '%s',DATE=DATE WHERE  `ID` ='%s';", $sData, $iID);
        $this->bd->hacer_query($query);
        return $this->bd->filas_retornadas_por_consulta();
    }

    /**
      suma uno a el campo N_MORE es decir suma un punto positivo al post
      @param Integer $iID post a modificar

      @return integer numero de filas retornados ejemplo 1 si agrego 0 sino agrego o -1 otro tipo de errores
     */
    public function UpdateNMorePlus($iID) {
        $query = sprintf("UPDATE  `gallery` SET  `N_MORE` = N_MORE+1,DATE=DATE WHERE  `ID` ='%s';", $iID);
        $this->bd->hacer_query($query);
        return $this->bd->filas_retornadas_por_consulta();
    }

    /**
      Resta un punto positivo del post
      @param Integer $iID id post a modificar
      @return integer numero de filas retornados ejemplo 1 si agrego 0 sino agrego o -1 otro tipo de errores
     */
    public function UpdateNMoreLess($iID) {
        $query = sprintf("UPDATE  `gallery` SET  `N_MORE` = N_MORE-1,DATE=DATE WHERE  `ID` ='%s';", $iID);
        $this->bd->hacer_query($query);
        return $this->bd->filas_retornadas_por_consulta();
    }

    /**
      suma un punto negativo a una imagen de post
      @param Integer $iID id post a modificar

      @return integer numero de filas retornados ejemplo 1 si agrego 0 sino agrego o -1 otro tipo de errores
     */
    public function UpdateNLessPlus($iID) {
        $query = sprintf("UPDATE  `gallery` SET  `N_LESS` = N_LESS+1,DATE=DATE WHERE  `ID` ='%s';", $iID);
        $this->bd->hacer_query($query);
        return $this->bd->filas_retornadas_por_consulta();
    }

    /**
      Resta un punto negativo a un post
      @param Integer $iID id post a modificar

      @return integer numero de filas retornados ejemplo 1 si agrego 0 sino agrego o -1 otro tipo de errores
     */
    public function UpdateNLessLess($iID) {
        $query = sprintf("UPDATE  `gallery` SET  `N_LESS` = N_LESS-1,DATE=DATE WHERE  `ID` ='%s';", $iID);
        $this->bd->hacer_query($query);
        return $this->bd->filas_retornadas_por_consulta();
    }

    /**
      aumenta numero de comentarios
      @param Integer $iID id de el post a modificar
      @return integer numero de filas retornados ejemplo 1 si agrego 0 sino agrego o -1 otro tipo de errores
     */
    public function UpdateNCOMMENTPlus($iID) {
        $query = sprintf("UPDATE  `gallery` SET  `N_COMMENT` = N_COMMENT+1,DATE=DATE WHERE  `ID` ='%s';", $iID);
        $this->bd->hacer_query($query);
        return $this->bd->filas_retornadas_por_consulta();
    }

    /**
      Resta numero de comentarios
      @param Integer $iID id post a modificar

      @return integer numero de filas retornados ejemplo 1 si agrego 0 sino agrego o -1 otro tipo de errores
     */
    public function UpdateNCOMMENTLess($iID) {
        $query = sprintf("UPDATE  `gallery` SET  `N_COMMENT` = N_COMMENT-1,DATE=DATE WHERE  `ID` ='%s';", $iID);
        $this->bd->hacer_query($query);
        return $this->bd->filas_retornadas_por_consulta();
    }

    public function All() {
        $query = sprintf("Select * from gallery ORDER BY  `ID` DESC");
        $this->bd->hacer_query($query);
        return $this->bd->filas_retornadas_por_consulta();
    }
 public function TodoNOAceptados() {
        $query = sprintf("Select * from gallery  where STATE=1 ORDER BY `ID` DESC");
        $this->bd->hacer_query($query);
        return $this->bd->filas_retornadas_por_consulta();
    }
    public function Trending($iN) {
        $query = sprintf("SELECT g.*,u.NAME,u.PICTURE 
FROM  `gallery` as g join user as u
WHERE g.STATE=0
ORDER BY  g.`N_MORE` ASC 
LIMIT 0 , %s", $iN);
        $this->bd->hacer_query($query);
        return $this->bd->filas_retornadas_por_consulta();
    }

    public function postSimilar($iIdGallery) {
        $query = sprintf("SELECT rgt.ID_TAG 
FROM  `gallery` as g join gallery_tag as rgt on rgt.ID_GALLERY=g.ID where g.ID='%s' limit 5", $iIdGallery);
        $this->bd->hacer_query($query);
        $sTag = "";
        $bandera = false;
        for ($i = 0; $i > $this->bd->filas_retornadas_por_consulta(); $i++) {
            if ($bandera == true) {
                $sTag.=" or ";
            }
            $sTag.="rgt.ID_TAG='" . $this->bd->obtener_respuesta($i, "ID_TAG") . "'";
            $bandera = true;
        }
        $query = sprintf("SELECT g.*
FROM  `gallery` as g join gallery_tag as rgt on rgt.ID_GALLERY=g.ID where %s ", $sTag);
        $this->bd->hacer_query($query);

        return $this->bd->filas_retornadas_por_consulta();
    }

    public function SearchById($iID) {
        $query = sprintf("Select g.ID, g.OWNER,g.TITLE,g.TYPEMEDIA,g.INFOMEDIA,g.URL,g.DATE,g.TAG,g.N_MORE,g.N_LESS,g.N_COMMENT,g.STATE,g.COMMENT_ADDITIONAL,u.NAME, g.META , g.CENSURA from gallery as g join user as u on (u.ID=g.OWNER) where g.ID='%s'", $iID);
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

// TODO ARREGLARAQUI UN PROBLEMA
    public function LastNArticle($iInicio, $iFin) {
        $query = sprintf("Select g.CENSURA,g.ID, g.OWNER,g.TITLE,g.TYPEMEDIA,g.INFOMEDIA,g.URL,g.DATE,g.TAG,g.N_MORE,g.N_LESS,g.N_COMMENT,g.STATE,g.COMMENT_ADDITIONAL,u.NAME from gallery as g join user as u on (u.ID=g.OWNER) WHERE STATE=0 ORDER BY  g.`DATE`  DESC LIMIT %s,%s;", $iInicio, $iFin);
        $this->bd->hacer_query($query);
        return $this->bd->filas_retornadas_por_consulta();
    }

    /*
     * Busca articulos por el tag
     * 
     * @param $sTag nombre del tag a buscar
     * @param $iInicio numero de inicio del limit
     * @param $iFin numero de fin del limit
     * 
     */

    public function ArticleForTAg($sTag, $iInicio, $iFin) {
        $query = sprintf("SELECT g.ID,
            g.OWNER,
            g.TITLE,
            g.TYPEMEDIA,
            g.INFOMEDIA,
            g.URL,
            g.DATE,
            g.TAG,
            g.CENSURA,
            g.N_MORE,
            g.N_LESS,
            g.N_COMMENT,
            g.STATE,
            g.COMMENT_ADDITIONAL,
            u.NAME 
FROM  `tag` AS t
JOIN gallery_tag AS gt ON ( t.ID = gt.ID_TAG ) 
JOIN gallery AS g ON ( g.ID = gt.ID_GALLERY ) 
join user as u on (u.ID=g.OWNER)
WHERE t.NAME =  '%s' LIMIT %s,%s ;", $sTag, $iInicio, $iFin);
        $this->bd->hacer_query($query);
        return $this->bd->filas_retornadas_por_consulta();
    }

    public function GetActivityMyPost($iUser) {
        $query = sprintf("select TITLE,N_MORE,N_COMMENT,URL,TYPEMEDIA FROM gallery where OWNER='%s'", $iUser);
        $this->bd->hacer_query($query);

        return $this->bd->ultimo_id_generado_por_la_bd();
    }

    public function GetTagOfArticleForId($iID) {
        $query = sprintf("SELECT 
t.NAME,
t.COUNT,
t.VISIT,
g_t.ID_GALLERY,
g_t.ID_TAG
FROM  `tag` AS t
JOIN gallery_tag AS g_t ON g_t.ID_TAG = t.ID
WHERE g_t.`ID_GALLERY` ='%s'", $iID);
        $this->bd->hacer_query($query);
         return $this->bd->filas_retornadas_por_consulta();
    }
  public function ModArticle($sTitle,$sTag, $sComment,$bCensura,$iId) {
        $query = sprintf("UPDATE  `gallery` SET  
            `TITLE` =  '%s',
            `TAG` =  '%s',
            `COMMENT_ADDITIONAL` =  '%s',
            `CENSURA` =  '%s'
WHERE  `gallery`.`ID` ='%s';", $sTitle,$sTag, $sComment,$bCensura,$iId);
        $this->bd->hacer_query($query);

        return $this->bd->filas_retornadas_por_consulta();
    }
    public function DelAllTagForArticleId($iID){
       $query = sprintf("delete from gallery_tag where ID_GALLERY='%s'",$iID);
        $this->bd->hacer_query($query);

        return $this->bd->filas_retornadas_por_consulta(); 
    }
    
}
