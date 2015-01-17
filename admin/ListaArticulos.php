<html lang="en">
    <head>
        <title>Gestionar Articulo</title>
        <?php include_once 'frames/head.php'; ?>
        <script src="../js/const.js"></script>
        <link rel="stylesheet" type="text/css" href="css/videoprueba.css" />
        <link rel="stylesheet" type="text/css" href="js/jquery.cleditor.css" />
        <link rel="stylesheet" type="text/css" href="js/autocomplete/jquery.autocomplete.css" />
        <script type="text/javascript" src="js/jq.js"></script>
        <script type="text/javascript" src="js/jquery.cleditor.js"></script>
        <script type="text/javascript" src="js/autocomplete/jquery.autocomplete.js"></script>
        <script src="../js/fileuploader.js"></script>
        <script type="text/javascript">
            sTitulo = "";
            sComentario = "";
            sDirImagen = "";
            $vardirImag="";
            /*
             MsgNombrePg
             MsgUrlPg
             MsginputTag
             MsgBtAgregar
             MsgBtGuardar
             */
            $(document).ready(function() {

                var uploader = new qq.FileUploader({
                    element: document.getElementById('BtSubir'),
                    action: 'ajax/SubirImagenArticle.php',
                    uploadButtonText: 'subir',
                    dragText: 'Suelta aqui',
                    debug: false,
                    onComplete: nombreFun
                });
                
                function ConstruirMetaData(){
                      $("#TextMeta").val('<meta property="og:type" content="photo"><meta property="twitter:card" content="photo"><meta name="twitter:title" content="'+sTitulo+'" /><meta name="twitter:image" content="' + $vardirImag + '" /><meta name="twitter:url" content="' + $vardirImag + '" />');
                    
                }
                function nombreFun(id, fileName, responseJSON) {
                    //$('#imgSubirid').attr('src','/OnionFW/means/'+responseJSON.info);
                    if (responseJSON.error) {
                        sDirImagen = "";
                        msj("#MsgUrlPg", responseJSON.error, "Error")
                    } else {
                        $vardirImag = ARTICLE + "/" + responseJSON.info;
                        $('#Imagen').attr('src', $vardirImag);
                        sDirImagen = responseJSON.info;
                        msj("#MsgUrlPg", "La imagen fue subida con exito", "Exito");
                         ConstruirMetaData();
                       }
                }


               // $("#TextAdicional").cleditor();
//                $('#BtAgregar').bind('click', function() {
//                    var $algo = $("#TextAdicional").cleditor()[0].$area[0].value;
//                    $("#ContentAdicional").html($algo);
//                    sComentario = $algo;
//                });
                 $("#TextAdicional").cleditor().change(function(){
                   
                       var $algo = $("#TextAdicional").cleditor()[0].$area[0].value;
                    $("#ContentAdicional").html($algo);
                    sComentario = $algo;
                     
                 } );
                
                $('#NombrePg').keydown(function() {
                    CargarTitulo(event, this);
                });
                function CargarTitulo(event, t) {
                    if (event.which == 13) {
                        $("#Titulo").html($(t).val());
                        sTitulo = $(t).val();
                        msj("#MsgNombrePg", "Titulo agregado correctamente", "Exito");
                         ConstruirMetaData()
                    }
                }

                $('#inputTag').autocomplete('ajax/SearchTag.php', {width: 200, matchContains: true, selectFirst: false, funtion: AgregarTag});
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
                    if (sDirImagen == "") {
                        bool = false;
                        msj("#MsgBtGuardar", "Suba una imagen", "Error");
                    }


                    if (bool == true) {
                        var sInfo = '<img class="post-media img-thumbnail" src="' + ARTICLE + '/' + sDirImagen + '" alt="' + sTitulo + '">'
                        $.post("ajax/SaveArticle.php", {
                            sTitulo: sTitulo,
                            sComentario: sComentario,
                            aEtiquetas: string,
                            sImagen: sDirImagen,
                            sinfo: sInfo,
                            sMetaData: $("#TextMeta").val(),
                            bCensura: $("#censura").val()
                        }, function(o) {
                            if (o.Tupla > 0) {
                                msj("#MsgBtGuardar", "Todo ok", "Exito");
                                $("#tabla tbody").prepend('<tr id="t' + $('#tabla >tbody >tr').length + '" class="trDel"><td>' + o.Tupla + '</td><td>' + $("#NombrePg").val() + '<br>Tag:<br>' + string + '</td><td><img id="" class="img-thumbnail img-small" src="' + ARTICLE + '/' + sDirImagen + '">' + sComentario + '</td>\n\
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
                    if ($("#inputTag").val() != "") {
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
                            $('#ImgMeme').attr('src', MEME + "/" + o[0]["URL"]);
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

            function toggleMetadata(){                
                $("#metadata-container").toggle();
            }
        </script>

    </head>

    <body>

        <?php include_once 'frames/titulo.php'; ?>

        <div class="container-fluid">
            <div class="row">
                <?php include_once 'frames/menu.php'; ?>
                 
                <div class="col-sm-8 col-sm-offset-3 col-md-8 col-md-offset-2 main">
                  
     <?php include_once 'frames/tablaAll.php'; ?>
               
                 
               
                </div>
              

            </div>

        </div>

    </body>
</html>