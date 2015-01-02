<html lang="en">
    <head>
        <?php
        $aArticle = null;
        if (isset($_GET["IDPage"])) {
            $iIDImagen = $_GET["IDPage"];
            include_once '../base/TableGallery.php';
            $bd = new TableGallery();
            $aArticle = $bd->SearchById($iIDImagen);
        } else {
            
        }
        ?>
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
            iID =<?php echo $iIDImagen; ?>;
            sTitulo = "";
            sComentario = "";
            sDirImagen =  ARTICLE + "/" + '<?php echo $aArticle[0]["URL"]; ?>';
            $vardirImag = "";
            /*
             MsgNombrePg
             MsgUrlPg
             MsginputTag
             MsgBtAgregar
             MsgBtGuardar
             */
            function EliminarTag(t) {
                $("#post-tags").data("count", $("#post-tags").data("count") - 1);
                $(t).prev().remove();
                $(t).remove();
            }
            $(document).ready(function() {
                function ConstruirMetaData() {
                    $("#TextMeta").val('<meta property="og:type" content="photo"><meta property="twitter:card" content="photo"><meta name="twitter:title" content="' + sTitulo + '" /><meta name="twitter:image" content="' + $vardirImag + '" /><meta name="twitter:url" content="' + $vardirImag + '" />');

                }
               
              
                $("#TextAdicional").cleditor().change(function() {

                    var $algo = $("#TextAdicional").cleditor()[0].$area[0].value;
                    $("#ContentAdicional").html($algo);
                    sComentario = $algo;

                });

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
                    if (bool == true) {
                         $.post("ajax/ModArticle.php", {
                            iId:iID,
                            sTitulo: sTitulo,
                            sComentario: sComentario,
                            aEtiquetas: string,
                            sMetaData: $("#TextMeta").val(),
                            bCensura: $("#censura").val()
                        }, function(o) {


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

            function toggleMetadata() {
                $("#metadata-container").toggle();
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


                            <div class="form-group">
                                <label for="NombrePg">Título</label>
                                <input type="text" class="form-control" id="NombrePg" placeholder="Agrega una pagina nueva" value="<?php if ($aArticle != null) {
                    echo $aArticle[0]["TITLE"];
                } ?>">
                                <div id="MsgNombrePg" class="msgbox Oculto "></div>

                            </div>

                            <div class="form-group">
                                <label for="inputTag">Etiqueta</label>
                                <input type="text" class="form-control" id="inputTag" placeholder="Agrega una pagina nueva">
                                <div id="MsginputTag" class="msgbox Oculto"><span class="spanNoti"></span></div>

                            </div>

                            <textarea id="TextAdicional" style="width:400px; height: 500px">
                                <?php if ($aArticle != null) {
                                    echo $aArticle[0]["COMMENT_ADDITIONAL"];
                                } ?>                                


                            </textarea>
                            <div class="form-group">
                                <label for="UrlPg">censura?</label>
                                <select id="censura"><option selected value="0">sin cuenta</option>
                                    <option value="1">con cuenta</option></select>

                            </div>

                            <!--                            <button id='BtAgregar' type="button" class="btn btn-default"  >Agregar</button>
                                                        <div id="MsgBtAgregar" class="msgbox Oculto"><span class="spanNoti"></span></div>-->

                            <br/>
                            <button id='BtGuardar' type="button" class="btn btn-default"  >Guardar</button>
                            <div id="MsgBtGuardar" class="msgbox Oculto"><span class="spanNoti"></span></div>
                            <br/>
                        </form>

                    </div>
                    <!--tabla para verficiar-->
<?php include_once 'frames/tabla.php'; ?>
                </div>
                <div class="col-sm-5  col-md-5 ">

                    <h2 class="sub-header">Así deberia quedar el articulo</h2>
                    <div class="table-responsive">
                        <div class="post col-md-12">
                            <div class="post-header col-md-12">    
                                <button class="btn btn-default" onclick="toggleMetadata()">Show/Hide Metadata</button><br/>                                    
                                <div id="metadata-container" class="form-group" style="display: none">                                    
                                    <label for="inputTag">Metas datas</label><br>
                                    <textarea id="TextMeta" style="width:500px; height: 100px"><?php
echo $aArticle[0]["META"];
?></textarea>                                    

                                </div>
                                <h3 id="Titulo" class="post-title text-info"><?php if ($aArticle != null) {
    echo $aArticle[0]["TITLE"];
} ?></h3>
                                <h5 class="post-subtitle text-muted">
                                    Publicado por: <a href="#">Memetomia</a> <b>·</b> 
                                    <span class="like-counter"><span class="glyphicon glyphicon-thumbs-up"></span> <?php if ($aArticle != null) {
    echo $aArticle[0]["N_MORE"];
} ?> me gusta</span> <b>·</b> 
                                    <span class="comment-counter"><span class="glyphicon glyphicon-comment"></span> <?php if ($aArticle != null) {
    echo $aArticle[0]["N_COMMENT"];
} ?> comentarios</span>
                                </h5>                        
                            </div>
                            <div class="post-media-content col-md-9">
                                <img id="Imagen" class="post-media img-thumbnail" src="<?php if ($aArticle != null) {
    echo "../media/article/" . $aArticle[0]["URL"];
} else {
    echo "../media/default/ArticlePredeterminado.jpg";
} ?>" height="467" width="460" alt="I must become someone else, I must become something else">
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
<?php if ($aArticle != null) {
    echo $aArticle[0]["COMMENT_ADDITIONAL"];
} ?>
                            </div>
                            <div class="post-footer col-md-12">
<?php
echo' <div id="post-tags" data-count="' . $bd->GetTagOfArticleForId($iIDImagen) . '"> ';
for ($i = 0; $i < $bd->bd->filas_retornadas_por_consulta(); $i++) {
    echo '<a href="#" class="label label-default">' . $bd->bd->obtener_respuesta($i, "NAME") . '</a><span id="eliminartag-' . $i . '" onclick="EliminarTag(\'#eliminartag-' . $i . '\')">X</span>';
}
//

echo '</div>';
?>




                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </body>
</html>