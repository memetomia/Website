<?php

/*$serverArray = filter_input_array(INPUT_SERVER);

if ($serverArray['REQUEST_METHOD'] != "POST") {
    header('Location: ../index.php');
}
session_start();
include_once ('../base/datosBD.php');

$conexion = @mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

if ($conexion) {

    $resultado = @mysqli_query($conexion, " SELECT e.`CODIGO` as value
                                            FROM `equipos` AS e
                                            WHERE e.`CODIGO` LIKE '%" . $term . "%'
                                            ORDER BY e.`CODIGO`");

    while ($fila = @mysqli_fetch_array($resultado)) {
        $json[] = $fila;
    }

    mysqli_close($conexion);
}*/
$json = ["Tag1","Tag2","Tag3","Tag4","Tag5"];
	echo json_encode($json);
?>

