<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">Destacados</h3>
    </div>
    <div class="panel-body">
        <?php
        include_once '/base/TableGallery.php';

        $bd = new TableGallery();
        $todo = $bd->Trending(5);
        $html = "";
        if ($todo > 0) {
            $sClass = "";
            ?>
            <?php
            for ($i = 0; $i < $todo; $i++) {
                if ($bd->bd->obtener_respuesta($i, "TYPEMEDIA") == 0) {
                    $sUrlaMostrar = '<img class="post-media img-thumbnail" src="' . EXT_ARTICLE . "/" . $bd->bd->obtener_respuesta($i, "URL") . '"/>';
                }
                if ($bd->bd->obtener_respuesta($i, "TYPEMEDIA") == 1) {
                    $sUrlaMostrar = '<img class="post-media img-thumbnail" src="' . $bd->bd->obtener_respuesta($i, "URL") . '"/>';
                }
                if ($bd->bd->obtener_respuesta($i, "TYPEMEDIA") == 2) {
                    $sUrlaMostrar = '<img class="post-media img-thumbnail" src="' . $bd->bd->obtener_respuesta($i, "URL") . '"/>';
                }
                if ($bd->bd->obtener_respuesta($i, "TYPEMEDIA") == 3) {
                    $sUrlaMostrar = $bd->bd->obtener_respuesta($i, "INFOMEDIA");
                }

                echo '<div class="col-md-6 col-xs-4">' . $sUrlaMostrar . '     </div>
        ';
            }
        }
        ?>


    </div>
</div>        