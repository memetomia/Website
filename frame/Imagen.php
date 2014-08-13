          <div id="post" class="col-md-8">        
    <!-- HEADER INFO -->
                    <div class="post-header ">
                        <h3 class="post-title text-info"><?php echo $sMetaTitulo; ?></h3>
                        <h5 class="post-subtitle text-muted">
                            Publicado por: <a href="#"><?php echo $sUser; ?></a> <b>·</b> 
                            <span class="like-counter"><span class="glyphicon glyphicon-thumbs-up"></span> <?php echo $iLike; ?> me gusta</span> <b>·</b> 
                            <span class="comment-counter"><span class="glyphicon glyphicon-comment"></span><?php echo $iComment; ?> comentarios</span>
                        </h5>
                    </div>

                    <!-- BUTTONS -->
                    <div class="post-options row">
                        <div class="col-md-4">
                            <button type="button" class="btn btn-default btn-block" data-toggle="button">
                                <span class="glyphicon glyphicon-thumbs-up"></span> Me gusta
                            </button>
                        </div>
                        <div class="col-md-4">
                            <button type="button" class="btn btn-primary btn-block">Facebook</button>
                        </div>
                        <div class="col-md-4">
                            <button type="button" class="btn btn-info btn-block">Twitter</button>
                        </div>                        
                    </div>

                    <!-- BIG PICTURE -->
                    <div id="post-media-content" class="">
                        <img class="post-media img-thumbnail" src=" <?php  echo $sMetaImagen  ?>" width="100%" alt="Los Vengadores de Spidey"/>
                    </div>
                    <div id="report-container" class="text-right"><a href="#" class="text-muted">Reportar Post</a></div>
                    <div class="col-md-12"><hr/></div>                

                    <!-- COMMENT SECTION -->                                            
         <?php include_once 'frame/Comment.php';?>        

                                      
                </div>