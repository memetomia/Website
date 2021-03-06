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
                $("form").submit(function() {

                    return false;
                });
                var id = -1;
                function BuscarTag(palabra) {

                    $.post("ajax/SearchTagReturnjson.php", {
                        q: palabra
                    }, function(o) {
                        if (o) {
                            // $('#ImgMeme').attr('src', "" + MEME + "/" + o[0]["URL"]);
                            msj("#MsgName", "No puede agregar esta etiqueta ya existe", "Error");



                        } else {
                            msj("#MsgName", "Etiqueta no encontrada puede agregarla", "Exito");
                        }

                    }, "json");

                }
                $('#Name').keydown(function() {
                    if (event.which == 13) {
                        BuscarTag($(this).val());
                    }
                });
                $('#BtAgregar').bind('click', function() {
                    var flag = false;
                    if ($("#Name").val() == "") {
                        msj("#MsgGeneral", "Falta un nombre", "Error");
                        msj("#MsgName", "Ingrese un nombre ", "Error");
                        flag = true;
                    }
                    if (flag == false) {
                        $.post("ajax/AddTag.php", {
                            sName: $("#Name").val(),
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
            function Eliminar(iPosicionEnPantalla) {
                if (confirm("Desea eliminar esta etiqueta?"))
                {
                    $.post("ajax/DelTag.php", {
                        iID: iPosicionEnPantalla
                    }
                    , function(o) {
                        $("#t" + iPosicionEnPantalla).hide();
                    }, "json");
                }
            }

            function Modificar(iPosicionEnPantalla) {
                location.href = SERVER + ADMIN + "/EditTag.php?ID=" + iPosicionEnPantalla;
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
                                <input type="text" class="form-control" id="Name" placeholder="buscar la etiqueta">

                                <div id="MsgName" class="msgbox Oculto"><span class="spanNoti"></span></div>

                            </div>





                            <br>
                            <button id='BtAgregar' type="button" class="btn btn-default"  >Cambiar</button>
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
                                    <th>Count</th>
                                    <th>Visit</th>
                                    <th>Botones</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                include_once '../base/TableTag.php';
                                $bd = new TableTag();
                                $todo = $bd->All();
                                $html = "";
                                if ($todo > 0) {
                                    $sClass = "";
                                    for ($i = 0; $i < $todo; $i++) {

                                        $html .= '<tr id="t' . $bd->bd->obtener_respuesta($i, "ID") . '" ><td>' . $bd->bd->obtener_respuesta($i, "ID") . '</td>'
                                                . '<td width="100" height="100">' . $bd->bd->obtener_respuesta($i, "NAME") . '</td>'
                                                . '<td>' . $bd->bd->obtener_respuesta($i, "COUNT") . '</td>'
                                                . '<td>' . $bd->bd->obtener_respuesta($i, "VISIT") . '</td>'
                                                . '<td>   '
                                                . '    <button type="button" class="btn btn-default"  onclick="Modificar(\'' . $bd->bd->obtener_respuesta($i, "ID") . '\')" >Modificar</button>    '
                                                . '    <button type="button" class="btn btn-default"  onclick="Eliminar(\'' . $bd->bd->obtener_respuesta($i, "ID") . '\')" >Eliminar</button>      </td></tr>';
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