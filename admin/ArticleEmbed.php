<html lang="en">
    <head>
        <title>Gestionar Articulo (video)</title>
        <?php include_once 'frames/head.php'; ?>
        <script src="../js/const.js"></script>

        <link rel="stylesheet" type="text/css" href="js/jquery.cleditor.css" />
        <link rel="stylesheet" type="text/css" href="js/autocomplete/jquery.autocomplete.css" />
        <link rel="stylesheet" type="text/css" href="css/videoprueba.css" />
        <script type="text/javascript" src="js/jq.js"></script>
        <script type="text/javascript" src="js/jquery.cleditor.js"></script>
        <script type="text/javascript" src="js/autocomplete/jquery.autocomplete.js"></script>
        <script src="../js/fileuploader.js"></script>
        <script type="text/javascript">
            sTitulo = "";
            sComentario = "";
            sInfoMedia = "";
            /*
             MsgNombrePg
             MsgUrlPg
             MsginputTag
             MsgBtAgregar
             MsgBtGuardar
             http://www.bing.com/videos/browse/viral
             https://vimeo.com/
             */
            $(document).ready(function() {
                $("#TextMeta").val('<meta property="og:type" content="video"><meta property="twitter:card" content="player">\n\
<meta property = "twitter:player:width" content = "435">\n\
<meta property = "twitter:player:height" content = "435">\n\
<meta property = "twitter:player" content ="">\n\
<meta property = "og:video" content ="">');
                algo = $("#TextEmbed").cleditor();

                $("#TextAdicional").cleditor();

                $('#BtAgregar').bind('click', function() {
                    var $algo = $("#TextAdicional").cleditor()[0].$area[0].value;

                    $("#ContentAdicional").html($algo);
                    sComentario = $algo;

                });
                $('#BtAgregarEmbed').bind('click', function() {
                    var $algo = $("#TextEmbed").cleditor()[0].$area[0].value;

                    $("#DivUrlImagen").html($algo);
                    sInfoMedia = $algo;

                });
                $('#NombrePg').keydown(function() {
                    CargarTitulo(event, this);
                });

                function CargarTitulo(event, t) {
                    if (event.which == 13) {

                        $("#Titulo").html($(t).val());
                        sTitulo = $(t).val();
                        msj("#MsgNombrePg", "Titulo agregado correctamente", "Exito");
                    }
                }

                $('#inputTag').autocomplete('../buscarTag', {width: 200, matchContains: true, selectFirst: false, funtion: AgregarTag});

                $('#inputTag').keydown(function() {
                    AgregarTagWithEnter(event, this)
                });





                $('#BtGuardar').bind('click', function() {
                    PostGuardar();
                });
                function PostGuardar() {
                    var string = crearjson();
                    var bool = true;
                    if (sTitulo == "") {
                        bool = false;
                        msj("#MsgBtGuardar", "Ingrese titulo", "Error");
                    }



                    if (bool == true) {
                        $.post("ajax/SaveEmbedArticle.php", {
                            sTitulo: sTitulo,
                            sComentario: sComentario,
                            aEtiquetas: string,
                            sImagen: "",
                            sHtmlMedia: sInfoMedia,
                            bCensura: $("#censura").val()
                        }, function(o) {
                            if (o.Tupla > 0) {
                                msj("#MsgBtGuardar", "Todo ok", "Exito");
                                $("#tabla tbody").prepend('<tr id="t' + $('#tabla >tbody >tr').length + '"><td>' + o.Tupla + '</td><td>' + $("#NombrePg").val() + '<br>Tag:<br>' + string + '</td><td><img id="" class="img-thumbnail img-small" src="' + sDirImagen + '">' + sComentario + '</td>\n\
                                <td> <button type="button" class="btn btn-default"  onclick="Activar(\'' + $('#tabla >tbody >tr').length + '\',\'' + o.Tupla + '\')" >Activar</button>\n\
                                    <button type="button" class="btn btn-default"  onclick="Desactivar(\'' + $('#tabla >tbody >tr').length + '\',\'' + o.Tupla + '\')" >Desactivar</button>\n\
                                    <button type="button" class="btn btn-default"  onclick="Modificar(\'' + $('#tabla >tbody >tr').length + '\',\'' + o.Tupla + '\')" >Modificar</button>\n\
                                    <button type="button" class="btn btn-default"  onclick="Eliminar(\'' + $('#tabla >tbody >tr').length + '\',\'' + o.Tupla + '\')" >Eliminar</button>\n\
</td></tr>');
                            } else {
                                msj("#MsgBtGuardar", o.Error, "Error");
                            }

                        }, "json");
                    }
//   alert("espera falta algo");
                }

                function AgregarTagWithEnter() {
                    if (event.which == 13) {
                        AgregarTag();
                    }
                }
                function AgregarTag()
                {
                    var newTag = $("#inputTag").val();
                    $("#inputTag").val("");
                    $("#post-tags").data("count", $("#post-tags").data("count") + 1);
                    //$("#post-tags-"+id).data("count",++);

                    var input = "<a href='#' class='label label-default'>" + newTag + "</a><span id='eliminartag-" + $("#post-tags").data("count") + "'>X</span>";
                    $("#post-tags").append(input);
                    $("#eliminartag-" + $("#post-tags").data("count")).click(function() {
                        $("#post-tags").data("count", $("#post-tags").data("count") - 1);
                        $(this).prev().remove();
                        $(this).remove();
                    });
                }
                function EliminarTag(t) {
                    $("#post-tags").data("count", $("#post-tags").data("count") - 1);
                    $(t).prev().remove();
                    $(t).remove();
                }
                function crearjson() {
                    var string = new Array();
                    i = 0;
                    $("#post-tags a").each(function() {
                        string[i] = $(this).html();
                        i++;
                    });
                    return(JSON.stringify(string));
                }
                function BuscarMeme(palabra) {
                    $.post("ajax/SearchMemePreReturnImg.php", {
                        q: palabra
                    }, function(o) {
                        if (o) {
                            $('#ImgMeme').attr('src', "" + MEME + "/" + o[0]["URL"]);
                            msj("#MsgBtAgregar", "Meme predeterminado encontrado", "Exito");
                        } else {
                            msj("#MsgBtAgregar", "No se ha encontrado el meme", "Error");
                        }

                    }, "json");
                }
                $('#meme').autocomplete('ajax/SearchMemePre.php', {width: 200, matchContains: true, selectFirst: false, funtion: BuscarMeme});
            });
            (function($) {

                // Define the hello button
                $.cleditor.buttons.hello = {
                    name: "hello",
                    image: "hello.gif",
                    title: "meme",
                    command: "inserthtml",
                    popupName: "hello",
                    popupClass: "cleditorPrompt",
                    popupContent: "meme:<br><input id=meme type=text size=50><br><img id=ImgMeme src=" + DEFAULT + "/MemePredeterminado.jpg height=200 width=200 /><br><input type=button value=Agregar>",
                    buttonClick: helloClick
                };

                // Add the button to the default controls before the bold button
                $.cleditor.defaultOptions.controls = $.cleditor.defaultOptions.controls
                        .replace("bold", "hello bold");

                // Handle the hello button click event
                function helloClick(e, data) {

                    // Wire up the submit button click event
                    $(data.popup).children(":button")
                            .unbind("click")
                            .bind("click", function(e) {

                                // Get the editor
                                var editor = data.editor;

                                // Get the entered name
                                var name = $("#ImgMeme").attr("src");

                                // Insert some html into the document
                                var html = "<img src=" + name + " height='467' width='460' class='img-thumbnail'>";
                                editor.execCommand(data.command, html, null, data.button);
                                msj("#MsgBtAgregar", "se ha agregado un meme; verifique el tamaño por favor", "Advertencia");
                                // Hide the popup and set focus back to the editor
                                editor.hidePopups();
                                editor.focus();

                            });

                }

            })(jQuery);
//            http://premiumsoftware.net/cleditor/gettingstarted

            function Eliminar(iPosicionEnPantalla, iIdEnTabla) {

                $.post("ajax/DelArticle.php", {
                    iID: iIdEnTabla
                }
                , function(o) {
                    if (o.Tupla > 0) {
                        $("#t" + iPosicionEnPantalla).hide();
                    }
                }, "json");
            }
            function Activar(iPosicionEnPantalla, iIdEnTabla) {

                $.post("ajax/ActiveArticle.php", {
                    iID: iIdEnTabla
                }
                , function(o) {
                    if (o.Tupla > 0) {
                        $("#t" + iPosicionEnPantalla).removeClass("trDel");
                    }
                }, "json");
            }
            function Desactivar(iPosicionEnPantalla, iIdEnTabla) {

                $.post("ajax/DesactiveArticle.php", {
                    iID: iIdEnTabla
                }
                , function(o) {
                    if (o.Tupla > 0) {
                        $("#t" + iPosicionEnPantalla).addClass("trDel");
                    }
                }, "json");
            }
            function Modificar(iPosicionEnPantalla, iIdEnTabla) {
                location.href = SERVER + ADMIN + "/EditArticle.php?IDPage=" + iIdEnTabla;
            }
        </script>

    </head>

    <body>

        <?php include_once 'frames/titulo.php'; ?>

        <div class="container-fluid">
            <div class="row">
                <?php include_once 'frames/menu.php'; ?>
                <div class="col-sm-5 col-sm-offset-3 col-md-5 col-md-offset-2 main">
                    <h1 class="page-header">Subir un chiste</h1>

                    <div class="row placeholders">
                        <form role="form">
                            <!--<iframe class="vine-embed" src="https://vine.co/v/M0Yv0AnKLgF/embed/postcard" width="600" height="600" frameborder="0"></iframe><script async src="//platform.vine.co/static/scripts/embed.js" charset="utf-8"></script>-->
                            http://seenive.com/u/931262037621878784
                            <div class="form-group">
                                <label for="NombrePg">Título</label>
                                <input type="text" class="form-control" id="NombrePg" placeholder="Agrega una pagina nueva">
                                <div id="MsgNombrePg" class="msgbox Oculto "></div>
                            </div>



                            <textarea id="TextEmbed" style="width:400px; height: 500px"></textarea>
                            <button id='BtAgregarEmbed' type="button" class="btn btn-default"  >Agregar</button>
                            <div id="MsgBtAgregarEmbed" class="msgbox Oculto"><span class="spanNoti"></span></div>

                            <br/>
                            <div class="form-group">
                                <label for="inputTag">Etiqueta</label>
                                <input type="text" class="form-control" id="inputTag" placeholder="Agrega una etiqueta y presiona enter">
                                <div id="MsginputTag" class="msgbox Oculto"><span class="spanNoti"></span></div>

                            </div>
                            <textarea id="TextAdicional" style="width:400px; height: 500px"></textarea>


                            <button id='BtAgregar' type="button" class="btn btn-default"  >Agregar</button>
                            <div class="form-group">
                                <label for="inputTag">Metas datas</label><br>
                                <textarea id="TextMeta" style="width:500px; height: 100px">                                


                                </textarea>

                            </div>

                            <div class="form-group">
                                <label for="UrlPg">Imagen</label>
                                <select id="censura"><option selected value="0">sin cuenta</option>
                                    <option value="1">con cuenta</option></select>

                            </div>

                            <div id="MsgBtAgregar" class="msgbox Oculto"><span class="spanNoti"></span></div>

                            <br/>
                            <button id='BtGuardar' type="button" class="btn btn-default"  >Guardar</button>
                            <div id="MsgBtGuardar" class="msgbox Oculto"><span class="spanNoti"></span></div>
                            <br/>
                        </form>
<!--<iframe src="http://blip.tv/play/h8Z9g6LUfAI.x?p=1" width="720" height="433" frameborder="0" allowfullscreen></iframe><embed type="application/x-shockwave-flash" src="http://a.blip.tv/api.swf#h8Z9g6LUfAI" style="display:none"></embed>-->
                    </div>
                    <?php include_once 'frames/tabla.php'; ?>
                </div>
                <div class="col-sm-5  col-md-5 ">

                    <h2 class="sub-header">Así deberia quedar el articulo</h2>
                    <div class="table-responsive">
                        <div class="post col-md-12">
                            <div class="post-header col-md-12">
                                <h3 id="Titulo" class="post-title text-info">Ingrese nombre del articulo</h3>
                                <h5 class="post-subtitle text-muted">
                                    Publicado por: <a href="#">Memetomia</a> <b>·</b> 
                                    <span class="like-counter"><span class="glyphicon glyphicon-thumbs-up"></span> 93 me gusta</span> <b>·</b> 
                                    <span class="comment-counter"><span class="glyphicon glyphicon-comment"></span> 341 comentarios</span>
                                </h5>                        
                            </div>
                            <div id="DivUrlImagen" class="post-media-content col-md-9">

                                <img id="Imagen" class="post-media img-thumbnail" src="../media/default/VideoPredeterminado.jpg" height="467" width="460" alt="I must become someone else, I must become something else">
                            </div>

                            <div class="post-options col-md-3">
                                <button type="button" class="btn btn-default btn-block" data-toggle="button">
                                    <span class="glyphicon glyphicon-thumbs-up"></span> Me gusta
                                </button>
                                <button type="button" class="btn btn-default btn-block">
                                    <span class="glyphicon glyphicon-comment"></span> Comentar
                                </button>
                                <button type="button" class="btn btn-primary btn-block">Facebook</button>
                                <button type="button" class="btn btn-info btn-block">Twitter</button>

                            </div> 
                            <div id="ContentAdicional" class="post-media-content col-md-9">
                            </div>
                            <div class="post-footer col-md-12">
                                <div id="post-tags" data-count="0">                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </body>
</html>