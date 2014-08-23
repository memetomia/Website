<div class="post col-md-12">   
    <?php
    $sClass = "";



    $sUrlaMostrar = "";
    $botonplay = "";
    if ($iState == 0) {

//IAMGEN NORMAL
        if ($iTipoMedia == 0) {

            $sUrlaMostrar = '<img class="img-thumbnail img-small" src="' . EXT_ARTICLE . "/" . $sUrl . '"/>';
            $botonplay = "";
        }
        if ($iTipoMedia == 1) {
            $sUrlaMostrar = '<img class="img-thumbnail img-small" src="' . $sUrl . '"/>';

            $botonplay = '<div id="Video-' . $iID . '" class="play"></div>';
            $botonplay .= '<script type="text/javascript">'
                    . '$("#Video-' . $iID . '").click(function() {
                                                           $("#d-' . $iID . '").html(\'<div class="flex-video widescreen">' . $sInfoMedia . '</div>\');
                                                       });                               </script>';
        }
        //   VINE
        if ($iTipoMedia == 2) {
            $sUrlaMostrar = '<img class="img-thumbnail img-small" src="' . $sUrl . '"/>';

            $botonplay = '<div id="Vine-' . $iID . '" class="play"></div>';
            $botonplay .= '<script type="text/javascript">'
                    . '$("#Vine-' . $iID . '").click(function() {
                                                           $("#d-' . $iID . '").html(\'' . $sInfoMedia . '\');
                                                        $(".Vine").click(function() {
                                                            $(this).get(0).paused ? $(this).get(0).play() : $(this).get(0).pause();
                            });});                               </script>';
        }
        //EMB
        if ($iTipoMedia == 3) {
            $sUrlaMostrar = $sInfoMedia;
            $botonplay = "";
        }
        ?>
        <div id="A<?php echo $iID ?>" class="post-header col-md-12">
            <h3 class="post-title text-info"><a href="./Imagen.php?id=<?php echo $iID ?>"><?php echo $sTitle ?></a></h3>
            <h5 class="post-subtitle text-muted">
                Publicado por: <a href="#"><?php echo $sName ?></a> <b>·</b> 
                <span class="like-counter"><span class="glyphicon glyphicon-thumbs-up"></span> <?php echo $iNMore ?> me gusta</span> <b>·</b> 
                <span class="comment-counter"><span class="glyphicon glyphicon-comment"></span> <?php echo $iNComment ?> comentarios</span>
            </h5>                        
        </div>
        <div class="post-media-content col-md-9">

            <?php
            echo '<div class="DivPlay" id="d-' . $iID . '" >' . $sUrlaMostrar;
            echo $botonplay . "</div>";
            echo $ComentarioAdicional
            ?>    

        </div>
        <div class="post-options col-md-3">
            <button id="Like-<?php echo $iID ?>" type="button" class="btn btn-default btn-block like-button" data-toggle="button">
                <span class="glyphicon glyphicon-thumbs-up"></span> Me gusta
            </button>
            <script type="text/javascript">$('#Like-<?php echo $iID ?>').click(function() {
                    FunLike(<?php echo $iID ?>);
                });</script>
            <button id="Comment-<?php echo $iID ?>" type="button" class="btn btn-default btn-block comment-button">
                <span class="glyphicon glyphicon-comment"></span> Comentar
            </button>
            <script type="text/javascript">$('#Comment-<?php echo $iID ?>').click(function() {
                    FunComment(<?php echo $iID ?>);
                });</script>

            <button id="FB-<?php echo $iID ?>" d-link="http://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode("http://www.memetomia.com/Imagen.php?i=") . $iID . "&t=" . $sTitle ?>" type="button" class="btn btn-primary btn-block">Facebook</button>
            <script type="text/javascript">$('#FB-<?php echo $iID ?>').click(function() {
                    FB(<?php echo $iID ?>);
                });</script>

            <button id="TW-<?php echo $iID ?>" d-link="https://twitter.com/intent/tweet?button_hashtag=&text=<?php echo urlencode("http://www.memetomia.com/Imagen.php?i=") . $iID ?>"type="button" class="btn btn-info btn-block">Twitter</button>
            <script type="text/javascript">$('#TW-<?php echo $iID ?>').click(function() {
                    TW(<?php echo $iID ?>);
                });</script>

        </div>
        <div class="post-footer col-md-12">
            <div class="post-tags">     
                <?php
                $tag = $bdtag->SearchArticlesTag($iID);
                for ($j = 0; $j < $bdtag->bd->filas_retornadas_por_consulta(); $j++) {
                    echo'  <a href="' . EXT_TAG . "?Name=" . $tag[$j]["NAME"] . '"><span class="label label-default">' . $tag[$j]["NAME"] . '</span></a>';
                }
                ?>
            </div>
        </div>
        <?php
    }
    ?> 


</div>

