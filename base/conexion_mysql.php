<?php

require_once ('const.php');

/*
  Document   : conexion_mysql
  Created on : 20-jul-2012, 21:46:01
  Author     : jv
 */

/*
  TODO simplesk clase que permite conectar simplesk con la base de datos
 */

/**
 * Clase que facilita la conexion entre una base de datos en mysql y php 
 *
 * @author jaivic villegas
 * @copyright 20-jul-2012, 21:46:01 
 * @version 4.1
 * @access public
 */
class Conexion { /**
 * Variable que guarda el link de conexion de la base de dato 
 *
 * @access privado
 * @var link_a_la_bd
 */

    private $_link,
            /**
             * Variable que guarda la informacion generada por una consulta a la bd
             *
             * @access privado
             * @var mysql_array
             */
            $_stmt,
            /**
             * Variable que guarda la informacion de una consulta a la bd y puede ser
             * en forma de una matriz o en forma de un vector de objetos
             *
             * @access privado
             * @var matriz[][]|object
             */
            $_respuesta,
            /**
             * Variable que dice si ocurrio un error
             *
             * @access privado
             * @var boolean
             */
            $_ERROR,
            /**
             * Variable guarda la informacion de error generada en cualquier momento que 
             * una conexion y/o llamada a consulta falla
             *
             * @access privado
             * @var string
             */
            $_info_ERROR,
            /**
             * Guarda la cantidad de filas retornada por una consulta hecha con select o call
             *
             * @access privado
             * @var  int
             */
            $_filas,
            /**
             * Variable guarda la cantidad de filas afectadas por una consulta hecha por insert,delete,update,remplace
             *
             * @access privado
             * @var int
             */
            $_filas_afectadas,
            /**
             * Variable guarda el ultimo id (id autoincremental)generado por la base de dato
             * @access privado
             * @var int
             */
            $_insert_id,
            /**
             * variable q guarda el estado modo debug de la clase si esta en true la clase presenta los errores automaticamente
             * cuando estos son generados sino los deja en la variable info_error
             *
             * @access privado
             * @var NULL
             */
            $_numero_columnas,
            $_Array_con_nombres_columnas,
            $magic_quotes_active,
            $real_escape_string_exists;
    private $_modo_debug = true;

    public function __construct($debug = true) {



        $this->_modo_debug = MODO_DEBUG;

        $this->magic_quotes_active = get_magic_quotes_gpc();
        $this->real_escape_string_exists = function_exists("mysql_real_escape_string");
        $this->guardar_error();
    }

    /**
     * conexion::abrir_conexion()
     *
     * funcion q abre un link con la base de dato necesario para hacer consultas a las tablas
     * el parametro $bd es opcional y es para cambiar la base de datos a la cual se quiere  hacer
     * conexion
     *
     * @access protegido
     * @return NULL
     *
     */
    protected function abrir_conexion() {
        $this->_link = mysql_connect(DB_SERVER, DB_USER, DB_PASS, false, 1);
        if (!$this->_link) {
            $this->guardar_error("Fallo la conexion a la base de datos: " . mysql_error());
        } else {
            $db = mysql_select_db(DB_NAME, $this->_link);
            if (!$db)
                $this->guardar_error("Fallo en la selección de la base de datos: " . mysql_error());
        }
        mysql_query("SET NAMES 'utf8'");
    }

    /**
     * conexion::cerrar_conexion()
     *
     * funcion que destruye el link de conexion con la base de datos
     * se debe hacer cada vez que se termine de consultar la base de datos
     *
     * @access protegido
     * @param NULL 
     * @return NULL
     */
    protected function cerrar_conexion() {
        if ($this->_link) {
            mysql_close($this->_link);
        }
    }

    /**
     *  funcion encargada de hacer la consulta de insert o de select 
     * 
     * @param string $sql puede ser un query o la llamada a un procedure
     * 
     * 
     * @return String
     */
    public function hacer_query($sql) {
        if ($sql == "") {
            $this->guardar_error("La variable de consulta esta Vacia");
        } else {
            $this->_filas = - 1;
            $this->_filas_afectadas = -1;
            $this->_insert_id = - 1;
            $this->_numero_columnas = - 1;
            $this->guardar_error();
            $this->abrir_conexion();
            $taula = NULL;
            if ($this->_link) {
                $this->_stmt = mysql_query($sql, $this->_link);
                if (!$this->_stmt)
                    $this->guardar_error("Error: <br>Al intentar hacer la siguiente consulta<br>" . $sql . "<br> y mysql_error dice:<br>" . mysql_error());
            }// ($this->_cx) 
            if ($this->_ERROR == false) {
                if (preg_match("/^(insert|delete|update|replace)\s+/i", $sql)) {
                    $this->_filas_afectadas = @mysql_affected_rows();

                    // Take note of the insert_id
                    if (preg_match("/^(insert|replace)\s+/i", $sql)) {
                        $this->_insert_id = @mysql_insert_id($this->_link);
                    }
                } else {
                    $this->_filas = @mysql_num_rows($this->_stmt);

                    if ($this->_filas > 0) {
                        $this->_numero_columnas = @mysql_num_fields($this->_stmt);
                        for ($i = 0; $i < $this->_numero_columnas; $i++)
                            $this->_Array_con_nombres_columnas[$i] = mysql_field_name($this->_stmt, $i);
                        for ($i = 0; $i < $this->_filas; $i++)
                            $taula[$i] = @mysql_fetch_array($this->_stmt, MYSQL_BOTH);
                    }

                    $this->_respuesta = $taula;
                    if ($this->_filas > 0)
                        @mysql_free_result($this->_stmt);
                }//if ( preg_match("/^(insert|delete|update|replace)\s+/i",$sql) ) else
            }//$this->_ERROR == false
            $this->cerrar_conexion();
        }//if ($sql == "") else
    }

// function hacer_query($sql)

    public function reset_all() {
        $this->_filas = - 1;
        $this->_filas_afectadas = -1;
        $this->_insert_id = - 1;
        $this->_numero_columnas = - 1;
        $this->guardar_error();
    }

    protected function guardar_error($error = '') {
        if ($error != '') {
            $this->_ERROR = true;
            $this->_info_ERROR = $error;
            if ($this->_modo_debug) {
                echo '<div class="error" style=" background-color : #f69a9e; border : 1px solid #993333;">' . $this->_info_ERROR . '</div>';
            }
        }//if ($error != '')
        else {
            $this->_ERROR = false;
            $this->_info_ERROR = '';
            $this->_stmt = null;
            $this->_respuesta = null;
        }//if ($error != '') else
    }

//public function guardar_error($error = '')

    /**
     *  funcion que retorna la infomacion obtenida de una consulta
     * (el resultado es a un objeto) ejemplo resultado[0]->id
     * que es resultado de una consulta igual a select id from usuario;
     * si la consulta retorna mas campos se podra trata asi resultado[0]->id,resultado[0]->nombre...
     * @param int $fila 
     * @param int $columna
     * @example echo $bd->obtener_respuesta(0,0); //retorna el valor de la tupla 0 en la columna 0;
     * @example $bd->obtener_respuesta(1,"CI");//retorna el valor de la tupla 1 en la columna con nombre "CI"
     * @return String
     */
    public function obtener_respuesta($fila, $columna) {
        if ($this->_filas == -1) {
            echo "La variable de respuesta esta vacia" . $fila . $columna . "<br/>";
            return NULL;
        }

        if (!is_numeric($fila)) {
            echo "Error el campo filas de la funcion obtener respuesta debe ser numerico" . $fila . $columna . "<br/>";
            return NULL;
        }
        if ($fila < 0) {
            echo "El numero de la filas debe ser mayor que cero" . $fila . $columna . "<br/>";
            return NULL;
        }

        if ($fila >= $this->_filas) {//revisar posible esto por problemas de index
            echo "El numero de la fila debe ser menor que el numero total de tuplas en el resultado" . $fila . $columna . "<br/>";
            return NULL;
        }

        if (is_numeric($columna)) {
            if ($columna >= $this->_numero_columnas) {
                echo "El numero de la columna debe ser menor que el numero total columnas de tuplas en el resultado" . $fila . $columna . "<br/>";
                return NULL;
            }
            if (isset($this->_respuesta[$fila][$columna])) {
                return $this->_respuesta[$fila][$columna];
            } else {
                echo "no hay dato en la fila y columna dada" . $fila . $columna . "<br/>";
                return NULL;
            }
        } else {
            if (!is_string($columna)) {
                echo "la columna no es numero y tampoco string";
                return NULL;
            } else {
                if (in_array($columna, $this->_Array_con_nombres_columnas)) {
                    if (isset($this->_respuesta[$fila][$columna])) {
                        return $this->_respuesta[$fila][$columna];
                    } else {
                        echo "no hay dato en la fila y columna dada" . $fila . $columna . "<br/>";
                        return NULL;
                    }
                } else {
                    echo "la columna no existe en el conjunto de columnas obtenidas en el resultado" . $fila . $columna . "<br/>";
                    return NULL;
                }
            }
        }
    }

    public function obtener_respuesta_completa() {
        return $this->_respuesta;
    }

    /**
     * conexion::get_error()
     * funcion q retorna la informacion de error dada en
     * cualquier momento en que se hace una consulta
     *
     * @return _info_ERROR
     */
    public function obtener_error() {
        return $this->_info_ERROR;
    }

    /**
     * conexion:filas_afectadas_por_insert()
     * 
     * funcion que retorna  el numero de filas que fuero encontradas por el query de consulta
     *
     * @access publico
     * @param NULL 
     * @return int
     */
    public function filas_retornadas_por_consulta() {
        if ($this->_filas >= 0)
            return $this->_filas;
        if ($this->_filas_afectadas>=0)
            return $this->_filas_afectadas;
        return -1;
    }

    /**
     * conexion:ultimo_id_generado_por_la_bd()
     * retorna ultimo ide generado al agregar una nueva tupla
     * @access publico
     * @param NULL 
     * @return INT
     */
    public function ultimo_id_generado_por_la_bd() {
        return $this->_insert_id;
    }

}

?>
