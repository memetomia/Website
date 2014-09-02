      <div class="table-responsive">
                        <h2 class="sub-header">Lista de Articulo </h2>
                        <table id="tabla" class="table ">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Titulo</th>
                                    <th>Articulo</th>

                                    <th>Acción</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                include_once '../base/TableGallery.php';
                                $bd = new TableGallery();
                                $todo = $bd->All();
                                $html = "";
                                   if ($todo > 0) {
                                    $sClass = "";
                                    for ($i = 0; $i < $todo; $i++) {
                                        if ($bd->bd->obtener_respuesta($i, "STATE") == "1") {
                                            $sClass = "trDel";
                                        } else {
                                            $sClass = "";
                                        }
                                        $sUrlaMostrar = "";
                                        $botonplay = "";
                                        if ($bd->bd->obtener_respuesta($i, "TYPEMEDIA") == 0) {
                                         
                                             $sUrlaMostrar = '<img class="img-thumbnail img-small" src="' . EXT_ARTICLE . "/" . $bd->bd->obtener_respuesta($i, "URL"). '"/>';
                                            $botonplay = "";
                                        }
                                        if ($bd->bd->obtener_respuesta($i, "TYPEMEDIA") == 1) {
                                              $sUrlaMostrar = '<img class="img-thumbnail img-small" src="' . $bd->bd->obtener_respuesta($i, "URL"). '"/>';
                                        
                                            $botonplay = '<div id="Video-' . $bd->bd->obtener_respuesta($i, "ID") . '" class="play"></div>';
                                            $botonplay .= '<script type="text/javascript">'
                                                    . '$("#Video-' . $bd->bd->obtener_respuesta($i, "ID") . '").click(function() {
                                                           $("#d-' . $bd->bd->obtener_respuesta($i, "ID") . '").html(\'' . $bd->bd->obtener_respuesta($i, "INFOMEDIA") . '\');
                                                       });                               </script>';
                                        }
                                        if ($bd->bd->obtener_respuesta($i, "TYPEMEDIA") == 2) {
                                         $sUrlaMostrar = '<img class="img-thumbnail img-small" src="' . $bd->bd->obtener_respuesta($i, "URL"). '"/>';
                                        
                                            $botonplay = '<div id="Vine-' . $bd->bd->obtener_respuesta($i, "ID") . '" class="play"></div>';
                                            $botonplay .= '<script type="text/javascript">'
                                                    . '$("#Vine-' . $bd->bd->obtener_respuesta($i, "ID") . '").click(function() {
                                                           $("#d-' . $bd->bd->obtener_respuesta($i, "ID") . '").html(\'' . $bd->bd->obtener_respuesta($i, "INFOMEDIA") . '\');
                                                        $(".Vine").click(function() {
                                                            $(this).get(0).paused ? $(this).get(0).play() : $(this).get(0).pause();
                            });});                               </script>';
                                        }
                                        if ($bd->bd->obtener_respuesta($i, "TYPEMEDIA") == 3) {
                                            $sUrlaMostrar = $bd->bd->obtener_respuesta($i, "INFOMEDIA");
                                            $botonplay ="" ;
                                          
                                        }
                                        $html .= '<tr id="t' . $i . '" class="' . $sClass . '"><td>' . $bd->bd->obtener_respuesta($i, "ID") . '</td>'
                                                . '<td >' . $bd->bd->obtener_respuesta($i, "TITLE") . '<br><strong>Tag:</strong><br>' . $bd->bd->obtener_respuesta($i, "TAG") . '</td>'
                                                . '<td><div class="DivPlay" style="width:150px" id="d-' . $bd->bd->obtener_respuesta($i, "ID") . '">' . $sUrlaMostrar   . $botonplay . "</div>" . $bd->bd->obtener_respuesta($i, "COMMENT_ADDITIONAL") . '</td>'
                                                . '<td>   '
                                                . '    <button type="button" class="btn btn-default"  onclick="Activar(\'' . $i . '\',\'' . $bd->bd->obtener_respuesta($i, "ID") . '\')" >Activar</button>    '
                                                . '    <button type="button" class="btn btn-default"  onclick="Desactivar(\'' . $i . '\',\'' . $bd->bd->obtener_respuesta($i, "ID") . '\')" >Desactivar</button>    '
                                                . '    <button type="button" class="btn btn-default"  onclick="Modificar(\'' . $i . '\',\'' . $bd->bd->obtener_respuesta($i, "ID") . '\')" >Modificar</button>    '
                                                . '    <button type="button" class="btn btn-default"  onclick="Eliminar(\'' . $i . '\',\'' . $bd->bd->obtener_respuesta($i, "ID") . '\')" >Eliminar</button>      </td></tr>';
                                    }
                                    echo $html;
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>