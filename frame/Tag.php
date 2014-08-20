<?php
include_once 'base/TableTag.php';

$bd = new TableTag();

$todo = $bd->All();
$html = "";
if ($todo > 0) {
    $sClass = "";
    ?>
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">Tendencias</h3>
        </div>
        <div class="panel-body">
            <?php
            for ($i = 0; $i < $todo; $i++) {
                echo '<a href="' . SERVER . '/Tag.php?Name=' . $bd->bd->obtener_respuesta($i, "NAME") . '"><span class="label label-warning">' . $bd->bd->obtener_respuesta($i, "NAME") . '</span></a> ' . '';
            }
        }
        ?>
    </div>
</div>