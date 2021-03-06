<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Memetomía</title>
        
        <!--STYLES-->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/jqueryUI.custom.min.css" rel="stylesheet">        
        <link rel="stylesheet" type="text/css" href="css/bootstrap-switch.min.css">        
        <link href="css/videoprueba.css" rel="stylesheet">
        <script src="js/const.js"></script>     
        <script src="js/jquery-2.1.0.min.js"></script>        
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jqueryUI.custom.min.js"></script>  
        <script src="js/bootstrap-switch.min.js"></script>  
        <script src="js/jquery.validate.min.js"></script>    

        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <style>
            .post-options {
                margin-bottom: 10px;
            }

            .user-picture img{
                max-height: 82px !important;
                max-width: 82px !important;
            }            
            #user-comment textarea {
                width: 100%;
                min-height: 82px;
            }
            #post-comments-section {
                margin-bottom: 20px;
            }
            #post-comments-section .comment-block {
                margin: 10 0;
            }
            #report-container{
                margin-top: 10px;
            }
            #comment-button-container{
                margin-top: 10px; 
            }
        </style>
    </head>
    <body>       
        <nav class="navbar navbar-static-top navbar-inverse" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#memetomia-navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Memetomía</a>
                </div>
                <div class="collapse navbar-collapse" id="memetomia-navbar">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Inicio</a></li>
                        <li><a href="#">Top</a></li>
                        <li><a href="#">Vídeos</a></li>
                        <li><a href="#">GIF</a></li>
                    </ul>                    
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#" data-toggle="modal" data-target="#sign-in-modal">¡Regístrate en Memetomía!</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#login-modal">Iniciar sesión</a></li>                        
                    </ul>                    

                </div>
        </nav>
        
        <div id="main-content" class="container">            

            <div class="ad-panel col-md-12">
                <div class="panel panel-info">                    
                    <div class="panel-body">
                        publicidad aqui
                    </div>
                </div>
            </div>

            <div id="post" class="col-md-8">        

                <!-- HEADER INFO -->
                <div class="post-header ">
                    <h3 class="post-title text-info">Los Vengadores de Spidey</h3>
                    <h5 class="post-subtitle text-muted">
                        Publicado por: <a href="#">Jaivic Villegas</a> <b>·</b> 
                        <span class="like-counter"><span class="glyphicon glyphicon-thumbs-up"></span> 84 me gusta</span> <b>·</b> 
                        <span class="comment-counter"><span class="glyphicon glyphicon-comment"></span> 451 comentarios</span>
                    </h5>
                </div>

                <!-- BUTTONS -->
                <div class="post-options row">
                    <div class="col-md-4">
                        <button type="button" class="btn btn-default btn-block like-button">
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
                    <img class="post-media img-thumbnail" src="media/default/post3.jpg" width="100%" alt="Los Vengadores de Spidey"/>
                </div>
                <div id="report-container" class="text-right"><a href="#" class="text-muted">Reportar Post</a></div>
                <div class="col-md-12"><hr/></div>                

                <!-- COMMENT SECTION -->                                            
                <form action="#" method="POST" class="form-inline" role="form">                                
                    <div class="user-picture col-md-2 form-group">                            
                        <img src="media/default/profile-example.jpg" class="img-rounded">
                    </div>
                    <div id="user-comment" class="col-md-10 form-group">                            
                        <textarea id="user-comment-input" class="form-control" placeholder="Deja un comentario"></textarea>
                    </div>
                    <div id="comment-button-container" class="text-right col-md-12">
                        <button class="btn btn-sm btn-success">Comentar</button>                                
                    </div>
                    
                </form>
            
                <div class="col-md-12"><hr/></div>                

                <div id="post-comments-section">
                    <p id="comment-count" class="text-right text-muted">451 comentarios</p>
                    <div class="comment-block row">
                        <div class="user-picture col-md-2 form-group">                            
                            <img src="media/default/profile-example.jpg" class="img-rounded">
                        </div>

                        <div class="col-md-10 form-group">                            
                            <b class="username">María Rodríguez</b>
                            <p>jajajajaja!, que divertida la foto!</p>
                        </div>    
                    </div>

                    <div class="comment-block row">
                        <div class="user-picture col-md-2 form-group">                            
                            <img src="media/default/profile-example.jpg" class="img-rounded">
                        </div>

                        <div class="col-md-10 form-group">                            
                            <b class="username">María Rodríguez</b>
                            <p>Tuve que poner otro comentario, porque Héctor no quizo buscar otra foto cuadrada para poner de ejemplo, si es flojo!</p>
                        </div>   
                    </div>

                    <div class="comment-block row">
                        <div class="user-picture col-md-2 form-group">                            
                            <img src="media/default/profile-example.jpg" class="img-rounded">
                        </div>

                        <div class="col-md-10 form-group">                            
                            <b class="username">María Rodríguez</b>
                            <p>Le regalo un comentario más pa que no diga que soy mala.</p>
                        </div> 
                    </div>

                </div>                                            
            </div>

            <div id="sidebar" class="col-md-4">
                
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Posts Similares</h3>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-6 col-xs-4">
                            <a href="#"><img class="post-media img-thumbnail" src="media/default/post2.jpg" alt="El pintor mas honesto en la historia de la humanidad"/></a>
                        </div>
                        <div class="col-md-6 col-xs-4">
                            <a href="#"><img class="featured-media img-thumbnail" src="media/default/post1.jpg" alt="I must become someone else, I must become something else" height="50px"/></a>
                        </div>                            
                        <div class="col-md-6 col-xs-4">
                            <a href="#"><img class="post-media img-thumbnail" src="media/default/post3.jpg" alt="Los Vengadores de Spidey"/></a>
                        </div>
                    </div>
                </div>                      

                <?php include_once 'frame/Destacados.php';?>

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Memetomía en tu Smartphone</h3>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12 text-center">
                            <a href="#" target="itunes_store" style="display:inline-block;overflow:hidden;background:url(https://linkmaker.itunes.apple.com/htmlResources/assets/es_mx//images/web/linkmaker/badge_appstore-lrg.png) no-repeat;width:135px;height:40px;@media only screen{background-image:url(https://linkmaker.itunes.apple.com/htmlResources/assets/es_mx//images/web/linkmaker/badge_appstore-lrg.svg);}"></a>
                        </div>
                        <div class="col-md-12 text-center">
                            <a href="#"><img alt="Get it on Google Play" src="https://developer.android.com/images/brand/es-419_generic_rgb_wo_45.png"/></a>
                        </div>
                    </div>
                </div>

               
                <?php include_once 'frame/Tag.php';?>
                
                

                <div class="panel panel-info">                        
                    <div class="panel-body">
                        publicidad aqui
                    </div>
                </div>
            </div>
            
            
        </div>

        <footer class="navbar-inverse">
            <div class="container">
                <p class="text-muted">Footer</p>
            </div>
        </footer>
        

        <!-- MODAL Windows -->
        <?php
        include_once 'modal/login-modal.php';
        include_once 'modal/sign-in-modal.php';
        ?>        


        <!--Ver donde poner esto-->
        <script>
            // activa modal registro al presionar botones
            $('.like-button, #report-container a, #comment-button-container button').click(function(event) {
                event.preventDefault()
                $('#sign-in-modal').modal('show')
            });
        </script>
    </body>
</html>