<html lang="en">
    <head>
        <?php
        include_once 'frames/head.php';

        function get_image($content, $url) {

            $arreglo = parse_url($url);
            $suburl = $arreglo["scheme"] . "://" . $arreglo["host"];


            $vector = array();
            //   preg_match_all('/<img ([^>]+)>/', $content, $title);

            preg_match_all('/src=(?:\'|\")(?P<imagen>[^(\"|\')]+)(?:\'|\")(?:[^>])/', $content, $title);
            //  preg_match_all('/(?:<div class="post-img">)(?:.*)(src=(?:\'|\")(?P<imagen>[^(\"|\')]+)(?:\'|\")(?:[^>]))(?:.*)(?:<\/div>)/', $content, $title);

            $resultado = array();
            $vector = $title["imagen"];

            for ($i = 0; $i < count($vector); $i++) {
                $listo = false;

                if (preg_match('/^\./', $vector[$i])) {

                    $resultado[] = $suburl . substr($vector[$i], 1);
                    $listo = true;
                }
                if ($listo == false) {
                    if (preg_match('/^\//', $vector[$i])) {

                        $resultado[] = $suburl . $vector[$i];
                        $listo = true;
                    }
                }
                if ($listo == false) {
                    if (preg_match('/^([^http:])/', $vector[$i])) {

                        $resultado[] = $suburl . "/" . $vector[$i];
                        $listo = true;
                    } else {
                        $resultado[] = $vector[$i];
                    }
                }
            }


            return $resultado;
        }

//          if (isset($_GET["N"])) {
//                    $sURL = $_GET["N"];
//                } else {
        $sURL = "http://www.cuantarazon.com/";
//                }



        $opts = array(
            'http' => array(
                'method' => "GET",
                'header' => "Content-Type: text/html; charset=utf-8",
                'user_agent' => $_SERVER["HTTP_USER_AGENT"]
            )
        );

        $context = stream_context_create($opts);


        $supervector = get_image(@file_get_contents($sURL, false, $context), $sURL);
        ?>
    </head>

    <body>


        <?php include_once 'frames/titulo.php'; ?>

        <div class="container-fluid">
            <div class="row">
                <?php include_once 'frames/menu.php'; ?>
                <?php
                $id = 0;
                for ($i = 0; $i < count($supervector); $i++) {
                    $id = $i;
                    $error = false;
                    $LinkImagen = $supervector[$i];

                    $arreglo = parse_url($LinkImagen);
                    $LinkImagen = "http://" . $arreglo["host"] . $arreglo["path"];
                    ?>
                    <div class="col-sm-10 col-sm-offset-3 col-md-10 col-md-offset-2 main">

                        <div class="row col-sm-5 col-md-5">

                            <h1 class="page-header">chiste </h1>
                            <form role="form">
                                <div class="form-group">
                                    <label for="Nombre-<?php echo $id; ?>">Título</label>
                                    <input type="text" class="form-control" id="Nombre-<?php echo $id; ?>" placeholder="Agrega una pagina nueva">
                                    <div id="MsgNombre-<?php echo $id; ?>" class="msgbox Oculto "></div>
                                    <script type="text/javascript">
                                        
                                        $(document).ready(function() {

                                            $("#Nombre-<?php echo $id; ?>").keydown(function() {
                                                if (event.which == 13) {

                                                    $("#Titulo-<?php echo $id; ?>").html($("#Nombre-<?php echo $id; ?>").val());
                                                }
                                            });
                                        });

                                    </script>
                                </div>

                                <div class="form-group">
                                    <label for="Url-<?php echo $id; ?>">Imagen</label><br>
                                    <img id="Url-<?php echo $id; ?>" class="post-media img-thumbnail" src="<?php echo $LinkImagen; ?>"  width="405" alt="I must become someone else, I must become something else">
                                    <div id="MsgUrl-<?php echo $id; ?>" class="msgbox Oculto"><span class="spanNoti"></span></div>
                                </div>
                                <div class="form-group">
                                    <label for="inputTag-<?php echo $id; ?>">Etiqueta</label>
                                    <input type="text" class="form-control" id="inputTag-<?php echo $id; ?>" placeholder="Agrega una pagina nueva">
                                    <div id="MsginputTag-<?php echo $id; ?>" class="msgbox Oculto"><span class="spanNoti"></span></div>
                                    <script type="text/javascript">

                                        $('#inputTag-<?php echo $id; ?>').keydown(function() {
                                            if (event.which == 13) {

                                                if ($("#inputTag-<?php echo $id; ?>").val() != "") {
                                                    var newTag = $("#inputTag-<?php echo $id; ?>").val();
                                                    $("#inputTag-<?php echo $id; ?>").val("");
                                                    $("#post-tags-<?php echo $id; ?>").data("count", $("#post-tags-<?php echo $id; ?>").data("count") + 1);
                                                    //$("#post-tags-"+id).data("count",++);

                                                    var input = "<a href='#' class='label label-default'>" + newTag + "</a><span id='eliminartag-<?php echo $id; ?>-" + $("#post-tags-<?php echo $id; ?>").data("count") + "'>X</span>";
                                                    $("#post-tags-<?php echo $id; ?>").append(input);
                                                    $("#eliminartag-<?php echo $id; ?>-" + $("#post-tags-<?php echo $id; ?>").data("count")).click(function() {
                                                        $("#post-tags-<?php echo $id; ?>").data("count", $("#post-tags-<?php echo $id; ?>").data("count") - 1);
                                                        $(this).prev().remove();
                                                        $(this).remove();
                                                    });
                                                }
                                            }
                                        }


                                        );

                                    </script>
                                </div>
    <!--                                <textarea id="TextAdicional-<?php echo $id; ?>" style="width:400px; height: 500px"></textarea>
                                <script type="text/javascript">
                                      $(document).ready(function() {
                                      $("#TextAdicional-<?php echo $id; ?>").cleditor();
                                  });
                                </script>
                                <button id='BtAgregar-<?php echo $id; ?>' type="button" class="btn btn-default"  >Agregar</button>-->
                                <div id="MsgBtAgregar-<?php echo $id; ?>" class="msgbox Oculto"><span class="spanNoti"></span></div>

                            </form>
                        </div>
                        <!--tabla para verficiar-->
                        <div class="col-sm-7 col-md-7  ">
                            <div class="table-responsive">
                                <div class="post col-md-12">
                                    <div class="post-header col-md-12">
                                        <h3 id="Titulo-<?php echo $id; ?>" class="post-title text-info">Ingrese nombre del articulo</h3>
                                        <h5 class="post-subtitle text-muted">
                                            Publicado por: <a href="#">Memetomia</a> <b>·</b> 
                                            <span class="like-counter"><span class="glyphicon glyphicon-thumbs-up"></span> 93 me gusta</span> <b>·</b> 
                                            <span class="comment-counter"><span class="glyphicon glyphicon-comment"></span> 341 comentarios</span>
                                        </h5>                        
                                    </div>
                                    <div class="post-media-content col-md-9">
                                        <img id="Imagen-<?php echo $id; ?>" class="post-media img-thumbnail" src="<?php echo $LinkImagen; ?>" alt="I must become someone else, I must become something else">
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
                                    <div id="ContentAdicional-<?php echo $id; ?>" class="post-media-content col-md-9">
                                    </div>
                                    <div class="post-footer col-md-12">
                                        <div id="post-tags-<?php echo $id; ?>" data-count="0">                                
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-10 col-sm-offset-3 col-md-10 col-md-offset-2"> 
                        <div class="form-group">
                            <label for="censura-<?php echo $id; ?>">Imagen</label>
                            <select id="censura-<?php echo $id; ?>"><option selected value="0">sin cuenta</option>
                                <option value="1">con cuenta</option></select>

                        </div>
                        <br/>
                        <button id='BtGuardar-<?php echo $id; ?>' type="button" class="btn btn-default"  >Guardar</button>
                        <div id="MsgBtGuardar-<?php echo $id; ?>" class="msgbox Oculto"><span class="spanNoti"></span></div>
                        <br/>
                        <script type="text/javascript">

                            $(document).ready(function() {
                                $("#BtGuardar-<?php echo $id; ?>").click(
                                        function() {
                                            PostGuardar(<?php echo $id; ?>);
                                        });


                            });



                        </script>
                    </div>
                <?php } ?>
            </div>
            <!--            fin de class row-->

        </div>


    </body>
</html>