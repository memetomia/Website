<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">Destacados</h3>
    </div>
    <div class="panel-body">
        <?php
        include_once 'base/TableGallery.php';

        $bd = new TableGallery();
        $todo = $bd->Trending(5);
        $html = "";
        if ($todo > 0) {
            $sClass = "";
            ?>
            <?php
            for ($i = 0; $i < $todo; $i++) {
                $SePuedeImprimir = false;

                if ($bd->bd->obtener_respuesta($i, "STATE") == 0) {

                    if ($bd->bd->obtener_respuesta($i, "TYPEMEDIA") == 0) {
                        $sUrlaMostrar = '<a href="' . EXT_IMAGEN . "?id=" . $bd->bd->obtener_respuesta($i, "ID") . '" ><img class="post-media img-thumbnail" src="' . EXT_ARTICLE . "/" . $bd->bd->obtener_respuesta($i, "URL") . '"/></a>';
                        $SePuedeImprimir = true;
                    }
                    if ($bd->bd->obtener_respuesta($i, "TYPEMEDIA") == 1) {
                        $sUrlaMostrar = '<a href="" ><img class="post-media img-thumbnail" src="' . $bd->bd->obtener_respuesta($i, "URL") . '"/></a>';
                        $SePuedeImprimir = true;
                    }
                    if ($bd->bd->obtener_respuesta($i, "TYPEMEDIA") == 2) {
                        $sUrlaMostrar = '<a href="" ><img class="post-media img-thumbnail" src="' . $bd->bd->obtener_respuesta($i, "URL") . '"/></a>';
                        $SePuedeImprimir = true;
                    }
                    if ($bd->bd->obtener_respuesta($i, "TYPEMEDIA") == 3) {
                        //$sUrlaMostrar = $bd->bd->obtener_respuesta($i, "INFOMEDIA");
                        $SePuedeImprimir = false;
                    }
                    if ($SePuedeImprimir) {
                        echo '<div class="col-md-6 col-xs-4">' . $sUrlaMostrar . '     </div>';
                    }
                }
            }
        }
        ?>


    </div>
</div>        