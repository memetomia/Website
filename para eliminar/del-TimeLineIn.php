<div class="post col-md-12">   
    <?php
    $sClass = "";



    $sUrlaMostrar = "";
    $botonplay = "";
    if ($iState == 0) {
include_once 'frame/PrepararImagen.php';
        ?>
        <div id="A<?php echo $iID ?>" class="post-header col-md-12">
            <h3 class="post-title text-info"><a href="./Imagen.php?id=<?php echo $iID ?>"><?php echo $sTitle ?></a></h3>
            <h5 class="post-subtitle text-muted">
                Publicado por: <a href="#"><?php echo $sName ?></a> <b>·</b> 
                <span class="like-counter"><span class="glyphicon glyphicon-thumbs-up"></span> <?php echo $iNMore ?> me gusta</span> <b>·</b> 
                <span class="comment-counter"><span class="glyphicon glyphicon-comment"></span> <?php echo $iNComment ?> comentarios</span>
            </h5>                        
        </div>
        <?php include_once 'frame/share.php'; ?>
        <div class="post-media-content col-md-12">

            <?php
            echo '<div class="DivPlay" id="d-' . $iID . '" >' . $sUrlaMostrar;
            echo $botonplay . "</div>";
            echo $ComentarioAdicional;
            ?>    

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
    include_once 'frame/sharebottom.php';
    ?> 


</div>

