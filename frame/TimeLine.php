<div class="post col-md-12">   
    <?php
    include_once 'base/const.php';
    $index = 0;
    if (isset($_GET["i"])) {
        $index = $_GET["i"];
    }
    if ($index <= 0) {
        $index = 0;
        $prev = $index - 1;
        $next = $index + 1;
        $paginador = '<li class="previous disabled"><a href="' . SERVER . "/index.php?i=" .$prev . '">&larr; Atrás</a></li><li class="next"><a href="' . SERVER . "/index.php?i=" .  $next. '">Siguiente &rarr;</a></li>';
    } else {
        $prev = $index - 1;
        $next = $index + 1;
        $paginador = '<li class="previous"><a href="' . SERVER . "/index.php?i=" . $prev . '">&larr; Atrás</a></li><li class="next"><a href="' . SERVER . "/index.php?i=" . $next . '">Siguiente &rarr;</a></li>';
    }

    include_once 'base/TableGallery.php';
    include_once 'base/TableUser_Gallery.php';
    $bd = new TableGallery();
    $bdtag = new TableUser_Gallery();
    $todo = $bd->LastNArticle($index, 5);
    $html = "";
    if ($todo > 0) {
        $sClass = "";
        for ($i = 0; $i < $todo; $i++) {


            $sUrlaMostrar = "";
            $botonplay = "";
            if ($bd->bd->obtener_respuesta($i, "STATE") == 0) {


                if ($bd->bd->obtener_respuesta($i, "TYPEMEDIA") == 0) {

                    $sUrlaMostrar = '<img class="img-thumbnail img-small" src="' . EXT_ARTICLE . "/" . $bd->bd->obtener_respuesta($i, "URL") . '"/>';
                    $botonplay = "";
                }
                if ($bd->bd->obtener_respuesta($i, "TYPEMEDIA") == 1) {
                    $sUrlaMostrar = '<img class="img-thumbnail img-small" src="' . $bd->bd->obtener_respuesta($i, "URL") . '"/>';

                    $botonplay = '<div id="Video-' . $bd->bd->obtener_respuesta($i, "ID") . '" class="play"></div>';
                    $botonplay .= '<script type="text/javascript">'
                            . '$("#Video-' . $bd->bd->obtener_respuesta($i, "ID") . '").click(function() {
                                                           $("#d-' . $bd->bd->obtener_respuesta($i, "ID") . '").html(\'<div class="flex-video widescreen">' . $bd->bd->obtener_respuesta($i, "INFOMEDIA") . '</div>\');
                                                       });                               </script>';
                }
                if ($bd->bd->obtener_respuesta($i, "TYPEMEDIA") == 2) {
                    $sUrlaMostrar = '<img class="img-thumbnail img-small" src="' . $bd->bd->obtener_respuesta($i, "URL") . '"/>';

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
                    $botonplay = "";
                }
                ?>
                <div id="A<?php echo $bd->bd->obtener_respuesta($i, "ID") ?>" class="post-header col-md-12">
                    <h3 class="post-title text-info"><?php echo $bd->bd->obtener_respuesta($i, "TITLE") ?></h3>
                    <h5 class="post-subtitle text-muted">
                        Publicado por: <a href="#"><?php echo $bd->bd->obtener_respuesta($i, "NAME") ?></a> <b>·</b> 
                        <span class="like-counter"><span class="glyphicon glyphicon-thumbs-up"></span> <?php echo $bd->bd->obtener_respuesta($i, "N_MORE") ?> me gusta</span> <b>·</b> 
                        <span class="comment-counter"><span class="glyphicon glyphicon-comment"></span> <?php echo $bd->bd->obtener_respuesta($i, "N_COMMENT") ?> comentarios</span>
                    </h5>                        
                </div>
                <div class="post-media-content col-md-9">

                    <?php
                    echo '<div class="DivPlay" id="d-' . $bd->bd->obtener_respuesta($i, "ID") . '" >' . $sUrlaMostrar;
                    echo $botonplay . "</div>";
                    echo $bd->bd->obtener_respuesta($i, "COMMENT_ADDITIONAL");
                    ?>    

                </div>
                <div class="post-options col-md-3">
                    <button id="Like-<?php echo $bd->bd->obtener_respuesta($i, "ID") ?>" type="button" class="btn btn-default btn-block like-button" data-toggle="button">
                        <span class="glyphicon glyphicon-thumbs-up"></span> Me gusta
                    </button>
                    <script type="text/javascript">$('#Like-<?php echo $bd->bd->obtener_respuesta($i, "ID") ?>').click(function() {
                            FunLike(<?php echo $bd->bd->obtener_respuesta($i, "ID") ?>);
                        });</script>
                    <button id="Comment-<?php echo $bd->bd->obtener_respuesta($i, "ID") ?>" type="button" class="btn btn-default btn-block comment-button">
                        <span class="glyphicon glyphicon-comment"></span> Comentar
                    </button>
                    <script type="text/javascript">$('#Comment-<?php echo $bd->bd->obtener_respuesta($i, "ID") ?>').click(function() {
                            FunComment(<?php echo $bd->bd->obtener_respuesta($i, "ID") ?>);
                        });</script>

                    <button id="FB-<?php echo $bd->bd->obtener_respuesta($i, "ID") ?>" d-link="http://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode("http://www.memetomia.com/Imagen.php?i=") . $bd->bd->obtener_respuesta($i, "ID") . "&t=" . $bd->bd->obtener_respuesta($i, "TITLE") ?>" type="button" class="btn btn-primary btn-block">Facebook</button>
                    <script type="text/javascript">$('#FB-<?php echo $bd->bd->obtener_respuesta($i, "ID") ?>').click(function() {
                            FB(<?php echo $bd->bd->obtener_respuesta($i, "ID") ?>);
                        });</script>

                    <button id="TW-<?php echo $bd->bd->obtener_respuesta($i, "ID") ?>" d-link="https://twitter.com/intent/tweet?button_hashtag=&text=<?php echo urlencode("http://www.memetomia.com/Imagen.php?i=") . $bd->bd->obtener_respuesta($i, "ID") ?>"type="button" class="btn btn-info btn-block">Twitter</button>
                    <script type="text/javascript">$('#TW-<?php echo $bd->bd->obtener_respuesta($i, "ID") ?>').click(function() {
                            TW(<?php echo $bd->bd->obtener_respuesta($i, "ID") ?>);
                        });</script>

                </div>
                <div class="post-footer col-md-12">
                    <div class="post-tags">     
                        <?php
                        $tag = $bdtag->SearchArticlesTag($bd->bd->obtener_respuesta($i, "ID"));
                        for ($j = 0; $j < $bdtag->bd->filas_retornadas_por_consulta(); $j++) {
                            echo'  <a href="' . EXT_TAG . "?Name=" . $tag[$j]["NAME"] . '"><span class="label label-default">' . $tag[$j]["NAME"] . '</span></a>';
                        }
                        ?>
                    </div>
                </div>
                <?php
            }
        }
    }
    ?> 


</div>


<div class="col-md-12">
    <ul class="pager">
        <?php
        echo $paginador;
        ?>

    </ul>
</div>