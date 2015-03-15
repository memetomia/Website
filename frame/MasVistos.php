<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">Mas vistos</h3>
    </div>
    <style type="text/css">
        .thumbdestacados{
            overflow: hidden; 
            max-height: 100px;

        }
        .imagenOverFlow{
            max-width: 318px;
        }
        .titleImagenOverFlow{
            font-size: 15px;
            line-height: 1.1em;
            margin-top: 10px;
        }
    </style>
    <div class="panel-body">
        <?php
        include_once 'base/TableGallery.php';

        $bd = new TableGallery();
        $todo = $bd->MoreVisit(5);
        $html = "";
        if ($todo > 0) {
            $sClass = "";
            ?>
            <?php
            for ($i = 0; $i < $todo; $i++) {
                $SePuedeImprimir = false;

                if ($bd->bd->obtener_respuesta($i, "STATE") == 0) {
//thumbdestacados post-media img-thumbnail
                    $sUrlaMostrar = '<h3 class="titleImagenOverFlow"><a href="./Imagen.php?id=' . $bd->bd->obtener_respuesta($i, "ID") . '">' . $bd->bd->obtener_respuesta($i, "TITLE") . '</a></h3>';
                
                    if ($bd->bd->obtener_respuesta($i, "TYPEMEDIA") == TYPEMEDIA_IMAGEN) {
                        $sUrlaMostrar .='<div class="thumbdestacados"<a href="' . EXT_IMAGEN . "?id=" . $bd->bd->obtener_respuesta($i, "ID") . '" ><img class="imagenOverFlow" src="' . EXT_ARTICLE . "/" . $bd->bd->obtener_respuesta($i, "URL") . '"/></a></div>';
                        $SePuedeImprimir = true;
                    }
                    if ($bd->bd->obtener_respuesta($i, "TYPEMEDIA") == TYPEMEDIA_VIDEO_YOUTUBE) {
                        $sUrlaMostrar .= '<div class="thumbdestacados"><a href="' . EXT_IMAGEN . "?id=" . $bd->bd->obtener_respuesta($i, "ID") . '" ><img class="imagenOverFlow" src="' . $bd->bd->obtener_respuesta($i, "URL") . '"/></a></div>';
                        $SePuedeImprimir = true;
                    }
                    if ($bd->bd->obtener_respuesta($i, "TYPEMEDIA") == TYPEMEDIA_VIDEO_VINE) {
                        $sUrlaMostrar .= '<div class="thumbdestacados"><a href="' . EXT_IMAGEN . "?id=" . $bd->bd->obtener_respuesta($i, "ID") . '" ><img class="imagenOverFlow" src="' . $bd->bd->obtener_respuesta($i, "URL") . '"/></a></div>';
                        $SePuedeImprimir = true;
                    }
                    if ($bd->bd->obtener_respuesta($i, "TYPEMEDIA") == TYPEMEDIA_VIDEO_EMBED) {
                        //$sUrlaMostrar = $bd->bd->obtener_respuesta($i, "INFOMEDIA");
                        $SePuedeImprimir = false;
                    }
                     if ($bd->bd->obtener_respuesta($i, "TYPEMEDIA") == TYPEMEDIA_GIF) {
                        //$sUrlaMostrar = $bd->bd->obtener_respuesta($i, "INFOMEDIA");
                        $SePuedeImprimir = false;
                    }
                    if ($bd->bd->obtener_respuesta($i, "TYPEMEDIA") == TYPEMEDIA_IMAGEN_CORTADA) {
                        //$sUrlaMostrar = $bd->bd->obtener_respuesta($i, "INFOMEDIA");
                        $SePuedeImprimir = false;
                    }
                    if ($SePuedeImprimir) {
                        echo '<div class="">' . $sUrlaMostrar . '     </div>';
                    }
                }
            }
        }
        ?>


    </div>
</div>        