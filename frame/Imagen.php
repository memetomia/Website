<div id="post" class="col-md-8">        
    <!-- HEADER INFO -->
    <div class="post-header ">
        <h3 class="post-title text-info"><?php echo $sMetaTitulo; ?></h3>
        <h5 class="post-subtitle text-muted">
            Publicado por: <a href="#"><?php echo $sUser; ?></a> <b>·</b> 
            <span class="like-counter"><span class="glyphicon glyphicon-thumbs-up  "></span> <?php echo $iLike; ?> me gusta</span> <b>·</b> 
            <span class="comment-counter"><span class="glyphicon glyphicon-comment"></span><?php echo $iComment; ?> comentarios</span>
        </h5>
    </div>

    <!-- BUTTONS -->
    <div class="post-options row">
        <div class="col-md-4">
            <button id="Like-<?php echo $iID ?>" type="button" class="btn btn-default btn-block like-button" data-toggle="button">
                <span class="glyphicon glyphicon-thumbs-up"></span> Me gusta
            </button>
            <script type="text/javascript">$('#Like-<?php echo $iID ?>').click(function() {
                    FunLike(<?php echo $iID ?>);
                });</script>
        </div>
        <div class="col-md-4">

            <button id="FB-<?php echo $iID ?>" d-link="http://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode("http://www.memetomia.com/Imagen.php?i=") . $iID . "&t=" . $sMetaTitulo ?>" type="button" class="btn btn-primary btn-block">Facebook</button>
            <script type="text/javascript">$('#FB-<?php echo $iID ?>').click(function() {
                    FB(<?php echo $iID ?>);
                });</script>

        </div>
        <div class="col-md-4">
            <button id="TW-<?php echo $iID ?>" d-link="https://twitter.com/intent/tweet?button_hashtag=&text=<?php echo urlencode("http://www.memetomia.com/Imagen.php?i=") . $iID ?>"type="button" class="btn btn-info btn-block">Twitter</button>
            <script type="text/javascript">$('#TW-<?php echo $iID ?>').click(function() {
                    TW(<?php echo $iID ?>);
                });</script>
        </div>                        
    </div>

    <!-- BIG PICTURE -->
    <div id="post-media-content" class="">
        <?php
        echo '<div class="DivPlay" id="d-' . $iID . '" >' . $sUrlaMostrar;
        echo $botonplay . "</div>";
        echo $ComentarioAdicional;
        $RComentarios = $bdComment->SeeComment($iID);
        ?>    

                        <!--<img class="post-media img-thumbnail" src="<?php echo $sMetaImagen ?>" width="100%" alt="<?php echo $sMetaTitulo ?>"/>-->
    </div>
    <div id="report-container" class="text-right"><a href="#" class="text-muted">Reportar Post</a></div>
    <div class="col-md-12"><hr/></div>                


    <div id="post-comments-section">
        <p id="comment-count" class="text-right text-muted"><?php echo $RComentarios; ?> comentarios</p>

        <?php
        for ($iComment = 0; $iComment < $RComentarios; $iComment++) {
            $imagenUserComment = $bdComment->bd->obtener_respuesta($iComment, "PICTURE");
            $UserName = $bdComment->bd->obtener_respuesta($iComment, "NAME");
            $UserComment = $bdComment->bd->obtener_respuesta($iComment, "COMMENT");
//$imagenUserComment="media/default/profile-example.jpg";
//$UserName="María Rodríguez";
//$UserComment="jajajajaja!, que divertida la foto!"
            include 'frame/Comment.php';
        }
        ?>        
    </div>  


    <!-- COMMENT SECTION -->  
    <?php
    if ($co->IsSession()) {

        $imagenUserCurrent = "media/default/profile-example.jpg";
        ?>
        <div class="col-md-12"><hr/></div>    
        <!--<form action="#" method="POST" class="form-inline" role="form">-->                                
        <div class="user-picture col-md-2 form-group">                            
            <img src="<?php echo $imagenUserCurrent; ?>" class="img-rounded">
        </div>
        <div id="user-comment" class="col-md-10 form-group">                            
            <textarea id="user-comment-input" class="form-control" placeholder="Deja un comentario"></textarea>
        </div>
        <div id="comment-button-container" class="text-right col-md-12">
            <button class="btn btn-sm " id="btComment" data-id="" >Comentar</button>                                
        </div>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#btComment').click(
                        function() {

                            $.post("ajax/AddComment.php", {
                                //iID:  $('#btComment').attr("data-id"),
                                iID:<?php echo $iID; ?>,
                                iIDUser: <?php echo $co->getSVar("iId"); ?>,
                                sComment: $('#user-comment-input').val()
                            }, function(o) {
                                if (o.Tupla==0){
                                    
                                    $('#user-comment-input').val("");
                                }
                            }, "json");
                        }
                );
            });



        </script>
        <!--</form>-->     
        <div class="col-md-12"><hr/></div>    
        <?php
    } else {
        $imagenUserCurrent = "media/default/profile-example.jpg";
        ?>  
        <div class="col-md-12"><hr/></div>    
        <form action="#" method="POST" class="form-inline" role="form">                                
            <div class="user-picture col-md-2 form-group">                            
                <img src="<?php echo $imagenUserCurrent; ?>" class="img-rounded">
            </div>
            <div id="user-comment" class="col-md-10 form-group">                            
                <textarea id="user-comment-input" class="form-control" placeholder="Deja un comentario"></textarea>
            </div>
            <div id="comment-button-container" class="text-right col-md-12">
                <button class="btn btn-sm btn-success">Comentar</button>                                
            </div>
        </form>    
        <div class="col-md-12"><hr/></div>    
            <?php
        }
        ?>


</div>
