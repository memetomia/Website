 
                    
                      <?php
        include_once 'base/TableGallery.php';

        $bd = new TableGallery();
        $todo = $bd->postSimilar($iID);
        $html = "";
        if ($todo > 0) {
            $sClass = "";
            ?>
 <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Posts Similares</h3>
                    </div>
                    <div class="panel-body">
            <?php
            for ($i = 0; $i < $todo; $i++) {
                $SePuedeImprimir = false;

                if ($bd->bd->obtener_respuesta($i, "STATE") == 0) {
//thumbdestacados post-media img-thumbnail
                    $sUrlaMostrar = '<h3 class="titleImagenOverFlow"><a href="./Imagen.php?id=' . $bd->bd->obtener_respuesta($i, "ID") . '">' . $bd->bd->obtener_respuesta($i, "TITLE") . '</a></h3>';
                
                    if ($bd->bd->obtener_respuesta($i, "TYPEMEDIA") == 0) {
                        $sUrlaMostrar .='<div class="thumbdestacados"<a href="' . EXT_IMAGEN . "?id=" . $bd->bd->obtener_respuesta($i, "ID") . '" ><img class="imagenOverFlow" src="' . EXT_ARTICLE . "/" . $bd->bd->obtener_respuesta($i, "URL") . '"/></a></div>';
                        $SePuedeImprimir = true;
                    }
                    if ($bd->bd->obtener_respuesta($i, "TYPEMEDIA") == 1) {
                        $sUrlaMostrar .= '<div class="thumbdestacados"><a href="' . EXT_IMAGEN . "?id=" . $bd->bd->obtener_respuesta($i, "ID") . '" ><img class="imagenOverFlow" src="' . $bd->bd->obtener_respuesta($i, "URL") . '"/></a></div>';
                        $SePuedeImprimir = true;
                    }
                    if ($bd->bd->obtener_respuesta($i, "TYPEMEDIA") == 2) {
                        $sUrlaMostrar .= '<div class="thumbdestacados"><a href="' . EXT_IMAGEN . "?id=" . $bd->bd->obtener_respuesta($i, "ID") . '" ><img class="imagenOverFlow" src="' . $bd->bd->obtener_respuesta($i, "URL") . '"/></a></div>';
                        $SePuedeImprimir = true;
                    }
                    if ($bd->bd->obtener_respuesta($i, "TYPEMEDIA") == 3) {
                        //$sUrlaMostrar = $bd->bd->obtener_respuesta($i, "INFOMEDIA");
                        $SePuedeImprimir = false;
                    }
                    if ($SePuedeImprimir) {
                        echo '<div class="">' . $sUrlaMostrar . '     </div>';
                    }
                }
            }
            ?>
                   </div></div>   
                <?php
        }
        ?>


 
     