<html lang="en">
    <head>
        <?php include_once 'frames/head.php'; ?>
        <script src="../js/const.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#BtAgregar').bind('click', function() {
                    var flag = false;
                    if ($("#NombrePg").val() == "") {
                        alert("introduzca nombre");
                        flag = true;
                    }
                    if ($("#UrlPg").val() == "") {
                        alert("introduzca Url");
                        flag = true;
                    }
                    if (flag == false) {
                        $.post("ajax/AddPage.php", {
                            sNombre: $("#NombrePg").val(),
                            sUrl: $("#UrlPg").val()
                        }
                        , function(o) {

                            if (o.Tupla > 0) {

                                $("#tabla tbody").append('<tr id="t' + $('#tabla >tbody >tr').length + '"><td>' + o.Tupla + '</td><td>' + $("#NombrePg").val() + '</td><td>' + $("#UrlPg").val() + '</td><td>0</td>\n\
                                <td><button type="button" class="btn btn-default"  onclick="Activar(\'' + $('#tabla >tbody >tr').length + '\',\'' + o.Tupla + '\')" >Activar</button>\n\
<button type="button" class="btn btn-default"  onclick="Buscar(\'' + $('#tabla >tbody >tr').length + '\',\'' + o.Tupla + '\')" >Buscar</button>\n\
                                    <button type="button" class="btn btn-default"  onclick="Modificar(\'' + $('#tabla >tbody >tr').length + '\',\'' + o.Tupla + '\')" >Modificar</button>\n\
                                    <button type="button" class="btn btn-default"  onclick="Eliminar(\'' + $('#tabla >tbody >tr').length + '\',\'' + o.Tupla + '\')" >Eliminar</button>\n\
</td></tr>');
                                $("#NombrePg").val("");
                                $("#UrlPg").val("");
                            }
                        }, "json");
                    }
                });
            });
            function Eliminar(iPosicionEnPantalla, iIdEnTabla) {

                var respuesta = true;
                if ($("#t" + iPosicionEnPantalla).hasClass('trDel') == true) {
                    respuesta = false;
                    respuesta = confirm("¿Desea eliminar este registro?");
                    if (respuesta == true) {
                        $("#t" + iPosicionEnPantalla).hide();
                    }

                } else {
                    $("#t" + iPosicionEnPantalla).addClass("trDel");
                }

                if (respuesta == true) {

                    $.post("ajax/DelPage.php", {
                        iID: iIdEnTabla
                    }
                    , function(o) {

                    }, "json");
                }

            }
            function Activar(iPosicionEnPantalla, iIdEnTabla) {

                var respuesta = false;
                if ($("#t" + iPosicionEnPantalla).hasClass('trDel') == true) {
                    respuesta = true;
                    $("#t" + iPosicionEnPantalla).removeClass("trDel");
                }

                if (respuesta == true) {
                    $.post("ajax/ActivePage.php", {
                        iID: iIdEnTabla
                    }
                    , function(o) {

                    }, "json");
                }

            }
            function Buscar(iPosicionEnPantalla, iIdEnTabla) {
                location.href = SERVER + ADMIN + "/memetomizar.php?IDPage=" + iIdEnTabla;
            }
            function Modificar(iPosicionEnPantalla, iIdEnTabla) {
                location.href = SERVER + ADMIN + "/buscar.php?IDPage=" + iIdEnTabla;
            }
        </script>
    </head>

    <body>

        <?php include_once 'frames/titulo.php'; ?>

        <div class="container-fluid">
            <div class="row">
                <?php include_once 'frames/menu.php'; ?>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h1 class="page-header">Agregar Página</h1>

                    <div class="row placeholders">
                        <form role="form">
                            <?php
                            if (isset($_GET["IDPage"])) {
                                $sName = "";
                                $sUrl = "";
                                include_once '../base/TablePage.php';
                                $bd = new TablePage();

                                if ($bd->SearchPage($_GET["IDPage"]) > 0) {

                                    $sName = $bd->bd->obtener_respuesta(0, "NAME");
                                    $sUrl = $bd->bd->obtener_respuesta(0, "URL");
                                }
                                ?> 
                                <div class="form-group">
                                    <label for="IDPg">ID</label>
                                    <input type="text" class="form-control" id="IDPg"  disabled="disabled" value="<?php echo $_GET["IDPage"] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="NombrePg">Nombre de la Página</label>
                                    <input type="text" class="form-control" id="NombrePg" placeholder="Agrega una pagina nueva" value ="<?php echo $sName ?>">
                                    <script type="text/javascript">
                                        //     $('#NombrePg').autocomplete('../buscarNombrePagina', {width: 200, matchContains: true, selectFirst: false, funtion: BuscarNombrePagina});
                                    </script> 
                                </div>
                                <div class="form-group">
                                    <label for="UrlPg">URL de la Página</label>
                                    <input type="text" class="form-control" id="UrlPg" placeholder="Agrega una URL pagina nueva" value ="<?php echo $sUrl ?>">
                                    <script type="text/javascript">
                                        //  $('#UrlPg').autocomplete('../buscarUrlPagina', {width: 200, matchContains: true, selectFirst: false, funtion: BuscarUrlPagina});
                                    </script> 
                                </div>
                                <button type="button" class="btn btn-default" id="BtModificar" >Modificar</button>   
                                <script type="text/javascript">
                                    $('#BtModificar').bind('click', function() {
                                        var flag = false;
                                        if ($("#NombrePg").val() == "") {
                                            alert("introduzca nombre");
                                            flag = true;
                                        }
                                        if ($("#UrlPg").val() == "") {
                                            alert("introduzca Url");
                                            flag = true;
                                        }
                                        if (flag == false) {
                                            $.post("ajax/ModPage.php", {
                                                iID: $("#IDPg").val(),
                                                sNombre: $("#NombrePg").val(),
                                                sUrl: $("#UrlPg").val()
                                            }
                                            , function(o) {

                                                if (o.Tupla > 0) {
                                                    $("#NombrePg").val("");
                                                    $("#UrlPg").val("");

                                                }
                                            }, "json");
                                        }
                                    });

                                </script>
                                <?php
                            } else {
                                ?> 


                                <div class="form-group">
                                    <label for="NombrePg">Nombre de la Página</label>
                                    <input type="text" class="form-control" id="NombrePg" placeholder="Agrega una pagina nueva">
                                    <script type="text/javascript">
                                        //     $('#NombrePg').autocomplete('../buscarNombrePagina', {width: 200, matchContains: true, selectFirst: false, funtion: BuscarNombrePagina});
                                    </script> 
                                </div>
                                <div class="form-group">
                                    <label for="UrlPg">URL de la Página</label>
                                    <input type="text" class="form-control" id="UrlPg" placeholder="Agrega una URL pagina nueva">
                                    <script type="text/javascript">
                                        //  $('#UrlPg').autocomplete('../buscarUrlPagina', {width: 200, matchContains: true, selectFirst: false, funtion: BuscarUrlPagina});
                                    </script> 
                                </div>


                                <button id='BtAgregar' type="button" class="btn btn-default"  >Agregar</button>
                                <?php
                            }
                            ?> 


                        </form>

                    </div>

                    <h2 class="sub-header">Lista de Páginas donde se puedes buscar chistes</h2>
                    <div class="table-responsive">
                        <table id="tabla" class="table ">
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
                                include_once '../base/TablePage.php';
                                $bd = new TablePage();
                                $todo = $bd->AllPage();
                                $html = "";
                                if ($todo > 0) {
                                    $sClass = "";
                                    for ($i = 0; $i < $todo; $i++) {
                                        if ($bd->bd->obtener_respuesta($i, "STATE") == "1") {
                                            $sClass = "trDel";
                                        }
                                        $html .= '<tr id="t' . $i . '" class="' . $sClass . '"><td>' . $bd->bd->obtener_respuesta($i, "ID") . '</td>'
                                                . '<td>' . $bd->bd->obtener_respuesta($i, "NAME") . '</td>'
                                                . '<td><a href="' . $bd->bd->obtener_respuesta($i, "URL") . '" target="_blank">' . $bd->bd->obtener_respuesta($i, "URL") . '</a></td>'
                                                . '<td>' . $bd->bd->obtener_respuesta($i, "COUNT") . '</td>'
                                                . '<td> <button type="button" class="btn btn-default"  onclick="Activar(\'' . $i . '\',\'' . $bd->bd->obtener_respuesta($i, "ID") . '\')" >Activar</button>  '
                                                . '    <button type="button" class="btn btn-default"  onclick="Buscar(\'' . $i . '\',\'' . $bd->bd->obtener_respuesta($i, "ID") . '\')" >Buscar</button>  '
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