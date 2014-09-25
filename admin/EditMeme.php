<html lang="en">
    <head>
        <?php include_once 'frames/head.php'; ?>
        <script src="../js/const.js"></script>


        <link rel="stylesheet" type="text/css" href="js/autocomplete/jquery.autocomplete.css" />
        <script type="text/javascript" src="js/jq.js"></script>

        <script type="text/javascript" src="js/autocomplete/jquery.autocomplete.js"></script>

        <script src="../js/fileuploader.js"></script>
        <style>
            .img-small{
                max-height: 50%;
            }
        </style>
        <script type="text/javascript">
            $(document).ready(function() {
                function nombreFun(id, fileName, responseJSON) {
                    //$('#imgSubirid').attr('src','/OnionFW/means/'+responseJSON.info);
                    if (responseJSON.error) {
                        sDirImagen = "";
                        msj("#MsgMeme", responseJSON.error, "Error")
                    } else {
                        $('#ImgMeme').attr('src', MEME + "/" + responseJSON.info);
                        sDirImagen = responseJSON.info;
                        msj("#MsgMeme", "La imagen fue subida con exito", "Exito");
                    }
                }
                var uploader = new qq.FileUploader({
                    element: document.getElementById('BtSubir'),
                    action: 'ajax/SubirImagenMeme.php',
                    uploadButtonText: 'subir',
                    dragText: 'Suelta aqui',
                    debug: false,
                    onComplete: nombreFun
                });
                function BuscarMeme(palabra) {
                    $.post("ajax/SearchMemePreReturnImg.php", {
                        q: palabra
                    }, function(o) {
                        if (o) {
                            // $('#ImgMeme').attr('src', "" + MEME + "/" + o[0]["URL"]);
                            msj("#MsgName", "El nombre del meme ya existe Por favor busque otro", "Error");
                        } else {
                            msj("#MsgName", "Perfecto!!!;No se ha encontrado el meme", "Exito");
                        }

                    }, "json");
                }
                $('#Name').autocomplete('ajax/SearchMemePre.php', {width: 200, matchContains: true, selectFirst: false, funtion: BuscarMeme});
                //      $('#Name').bind()
                $('#BtAgregar').bind('click', function() {
                    var flag = false;
                    if ($("#Name").val() == "") {
                        msj("#MsgGeneral", "Falta un nombre", "Error");
                        msj("#MsgName", "Ingrese un nombre ", "Error");
                        flag = true;
                    }
                    if (sDirImagen == "") {
                        msj("#MsgGeneral", "Falta una imagen", "Error");
                        msj("#MsgName", "necesita subir el meme ", "Error");
                        flag = true;
                    }
                    if (flag == false) {
                        $.post("ajax/AddMeme.php", {
                            sNombre: $("#Name").val(),
                            sUrl: sDirImagen
                        }
                        , function(o) {

                            if (o.Tupla > 0) {

                                $("#tabla tbody").append('<tr id="t' + $('#tabla >tbody >tr').length + '"><td>' + o.Tupla + '</td><td>' + $("#Name").val() + '</td><td><img id="" class="img-thumbnail img-small" src="'+SERVER+'/media/meme/' + sDirImagen + '"></td><td>0</td>\n\
                                <td>\n\
                                    <button type="button" class="btn btn-default"  onclick="Modificar(\'' + $('#tabla >tbody >tr').length + '\',\'' + o.Tupla + '\')" >Modificar</button>\n\
                                    <button type="button" class="btn btn-default"  onclick="Eliminar(\'' + $('#tabla >tbody >tr').length + '\',\'' + o.Tupla + '\')" >Eliminar</button>\n\
</td></tr>');
                                $("#NombrePg").val("");
                                $("#UrlPg").val("");
                                   msj("#MsgGeneral", "el meme fue guardado correctamente", "Exito");
                            }
                        }, "json");
                    }
                });
            });
            function Eliminar(iPosicionEnPantalla, iIdEnTabla) {
                $("#t" + iPosicionEnPantalla).hide();
                $.post("ajax/DelMeme.php", {
                    iID: iIdEnTabla
                }
                , function(o) {

                }, "json");
            }

            function Modificar(iPosicionEnPantalla, iIdEnTabla) {
                location.href = SERVER + ADMIN + "/EditMeme.php?ID=" + iIdEnTabla;
            }
        </script>
    </head>

    <body>

        <?php include_once 'frames/titulo.php'; ?>

        <div class="container-fluid">
            <div class="row">
                <?php include_once 'frames/menu.php'; ?>
                <div class="col-sm-3 col-sm-offset-2 col-md-3 col-md-offset-2 main">
                    <h1 class="page-header">Agregar Meme Predeterminado</h1>

                    <div class="row placeholders">
                        <form role="form">






                            <div class="form-group">
                                <label for="Name">Nombre </label>
                                <input type="text" class="form-control" id="Name" placeholder="Agrega una pagina nueva">
                                <script type="text/javascript">
                                    //     $('#NombrePg').autocomplete('../buscarNombrePagina', {width: 200, matchContains: true, selectFirst: false, funtion: BuscarNombrePagina});
                                </script> 
                                <div id="MsgName" class="msgbox Oculto"><span class="spanNoti"></span></div>

                            </div>
                            <img id="ImgMeme" class="img-thumbnail img-small"  src="<?php echo SERVER;?>/media/default/MemePredeterminado.jpg">
                            <button id='BtSubir' type="button" class="btn btn-default"  >Subir</button>
                            <div id="MsgMeme" class="msgbox Oculto"><span class="spanNoti"></span></div>



                            <br>
                            <button id='BtAgregar' type="button" class="btn btn-default"  >Agregar</button>
                            <div id="MsgGeneral" class="msgbox Oculto"><span class="spanNoti"></span></div>





                        </form>

                    </div></div>
                <div class="col-sm-7  col-md-7 ">

                    <h2 class="sub-header">Lista de MEMES Predeterminados</h2>

                    <div class="table-responsive">
                        <table id="tabla" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>URL</th>
                                    <th>Count</th>
                                    <th>Botones</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                include_once '../base/TableMeme.php';
                                $bd = new TableMeme();
                                $todo = $bd->All();
                                $html = "";
                                if ($todo > 0) {
                                    $sClass = "";
                                    for ($i = 0; $i < $todo; $i++) {
                                        if ($bd->bd->obtener_respuesta($i, "STATE") == "1") {
                                            $sClass = "trDel";
                                        }
                                        $html .= '<tr id="t' . $i . '" class="' . $sClass . '"><td>' . $bd->bd->obtener_respuesta($i, "ID") . '</td>'
                                                . '<td width="100" height="100">' . $bd->bd->obtener_respuesta($i, "NAME") . '</td>'
                                                . '<td><img class="img-thumbnail img-small" width="150" height="150" src="' . EXT_MEME . "/" . $bd->bd->obtener_respuesta($i, "URL") . '"/></td>'
                                                . '<td>' . $bd->bd->obtener_respuesta($i, "COUNT") . '</td>'
                                                . '<td>   '
                                                . '    <button type="button" class="btn btn-default"  onclick="Modificar(\'' . $i . '\',\'' . $bd->bd->obtener_respuesta($i, "ID") . '\')" >Modificar</button>    '
                                                . '    <button type="button" class="btn btn-default"  onclick="Eliminar(\'' . $i . '\',\'' . $bd->bd->obtener_respuesta($i, "ID") . '\')" >Eliminar</button>      </td></tr>';
                                    }
                                    echo $html;
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->


    </body>
</html>