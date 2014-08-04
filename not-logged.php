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
        
        <script src="js/jquery-2.1.0.min.js"></script>        
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jqueryUI.custom.min.js"></script>  
        <script src="js/bootstrap-switch.min.js"></script>   
        <script src="js/jquery.validate.min.js"></script>       

        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>       
        <nav class="navbar navbar-static-top navbar-inverse" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-media/example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Memetomía</a>
                </div>
                
                <div class="collapse navbar-collapse" id="bs-media/example-navbar-collapse-1">
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
            </div>
        </nav>
        
        <div id="main-content" class="container">
            <div id="timeline-container" class="col-md-12">

                <div class="ad-panel col-md-12">
                    <div class="panel panel-info">                    
                        <div class="panel-body">
                            publicidad aqui
                        </div>
                    </div>
                </div>

                <div id="timeline" class="col-md-8">

                    <div class="post col-md-12">
                        <div class="post-header col-md-12">
                            <h3 class="post-title text-info">I must become someone else, I must become something else</h3>
                            <h5 class="post-subtitle text-muted">
                                Publicado por: <a href="#">9gag</a> <b>·</b> 
                                <span class="like-counter"><span class="glyphicon glyphicon-thumbs-up"></span> 93 me gusta</span> <b>·</b> 
                                <span class="comment-counter"><span class="glyphicon glyphicon-comment"></span> 341 comentarios</span>
                            </h5>                        
                        </div>
                        <div class="post-media-content col-md-9">
                            <img class="post-media img-thumbnail" src="media/example_img/post1.jpg" height="467" width="460" alt="I must become someone else, I must become something else"/>
                        </div>
                        <div class="post-options col-md-3">
                            <button type="button" class="btn btn-default btn-block like-button">
                                <span class="glyphicon glyphicon-thumbs-up"></span> Me gusta
                            </button>
                            <button type="button" class="btn btn-default btn-block comment-button">
                                <span class="glyphicon glyphicon-comment"></span> Comentar
                            </button>
                            <button type="button" class="btn btn-primary btn-block">Facebook</button>
                            <button type="button" class="btn btn-info btn-block">Twitter</button>
                            
                        </div>
                        <div class="post-footer col-md-12">
                            <div class="post-tags">                                
                                <a href="#"><span class="label label-default">MEMETOMIA 2</span></a>
                                <a href="#"><span class="label label-default">ARROW</span></a>
                                <a href="#"><span class="label label-default">HONOR</span></a>
                                <a href="#"><span class="label label-default">COMICS</span></a>
                                <a href="#"><span class="label label-default">DIVERSION</span></a>
                            </div>
                        </div>
                    </div>

                    <div class="post col-md-12">
                        <div class="post-header col-md-12">
                            <h3 class="post-title text-info">El pintor mas honesto en la historia de la humanidad</h3>
                            <h5 class="post-subtitle text-muted">
                                Publicado por: <a href="#">Oh Dios</a> <b>·</b> 
                                <span class="like-counter"><span class="glyphicon glyphicon-thumbs-up"></span> 33 me gusta</span> <b>·</b> 
                                <span class="comment-counter"><span class="glyphicon glyphicon-comment"></span> 251 comentarios</span>
                            </h5>
                        </div>
                        <div class="post-media-content col-md-9">
                            <img class="post-media img-thumbnail" src="media/example_img/post2.jpg" alt="El pintor mas honesto en la historia de la humanidad"/>
                        </div>
                        <div class="post-options col-md-3">
                            <button type="button" class="btn btn-default btn-block like-button">
                                <span class="glyphicon glyphicon-thumbs-up"></span> Me gusta
                            </button>
                            <button type="button" class="btn btn-default btn-block comment-button">
                                <span class="glyphicon glyphicon-comment"></span> Comentar
                            </button>
                            <button type="button" class="btn btn-primary btn-block">Facebook</button>
                            <button type="button" class="btn btn-info btn-block">Twitter</button>
                            <br/>
                            <div class="post-tags">                                
                                <a href="#"><span class="label label-default">MEMETOMIA 2</span></a>
                                <a href="#"><span class="label label-default">ARROW</span></a>
                                <a href="#"><span class="label label-default">HONOR</span></a>
                                <a href="#"><span class="label label-default">COMICS</span></a>
                                <a href="#"><span class="label label-default">DIVERSION</span></a>
                            </div>
                        </div>  
                    </div>

                    <div class="post col-md-12">
                        <div class="post-header col-md-12">
                            <h3 class="post-title text-info">Los Vengadores de Spidey</h3>
                            <h5 class="post-subtitle text-muted">
                                Publicado por: <a href="#">Jaivic Villegas</a> <b>·</b> 
                                <span class="like-counter"><span class="glyphicon glyphicon-thumbs-up"></span> 84 me gusta</span> <b>·</b> 
                                <span class="comment-counter"><span class="glyphicon glyphicon-comment"></span> 451 comentarios</span>
                            </h5>
                        </div>
                        <div class="post-media-content col-md-9">
                            <img class="post-media img-thumbnail" src="media/example_img/post3.jpg" alt="Los Vengadores de Spidey"/>
                        </div>
                        <div class="post-options col-md-3">
                            <button type="button" class="btn btn-default btn-block like-button">
                                <span class="glyphicon glyphicon-thumbs-up"></span> Me gusta
                            </button>
                            <button type="button" class="btn btn-default btn-block comment-button">
                                <span class="glyphicon glyphicon-comment"></span> Comentar
                            </button>
                            <button type="button" class="btn btn-primary btn-block">Facebook</button>
                            <button type="button" class="btn btn-info btn-block">Twitter</button>
                        </div>  
                    </div>

                    <div class="col-md-12">
                        <ul class="pager">
                            <li class="previous disabled"><a href="#">&larr; Atrás</a></li>
                            <li class="next"><a href="#">Siguiente &rarr;</a></li>
                        </ul>
                    </div>

                </div>

                <div id="sidebar" class="col-md-4">

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

                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">Tendencias</h3>
                        </div>
                        <div class="panel-body">
                            <a href="#"><span class="label label-warning">MEMETOMIA 2</span></a>
                            <a href="#"><span class="label label-warning">JAVIC</span></a>
                            <a href="#"><span class="label label-warning">HECTOR</span></a>
                            <a href="#"><span class="label label-warning">FRANCO</span></a>
                            <a href="#"><span class="label label-warning">LUIS</span></a>
                            <a href="#"><span class="label label-warning">VIDEOS</span></a>
                            <a href="#"><span class="label label-warning">PROGRAMACION</span></a>
                            <a href="#"><span class="label label-warning">TENDENCIA</span></a>
                            <a href="#"><span class="label label-warning">MUJERES</span></a>
                            <a href="#"><span class="label label-warning">GIF</span></a>
                            <a href="#"><span class="label label-warning">COMICS</span></a>
                            <a href="#"><span class="label label-warning">DIVERSION</span></a>
                            <a href="#"><span class="label label-warning">PADRES</span></a>
                        </div>
                    </div>
                    
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">Destacados</h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-6 col-xs-4">
                                <img class="post-media img-thumbnail" src="media/example_img/post2.jpg" alt="El pintor mas honesto en la historia de la humanidad"/>
                            </div>
                            <div class="col-md-6 col-xs-4">
                                <img class="featured-media img-thumbnail" src="media/example_img/post1.jpg" alt="I must become someone else, I must become something else" height="50px"/>
                            </div>                            
                            <div class="col-md-6 col-xs-4">
                                <img class="post-media img-thumbnail" src="media/example_img/post3.jpg" alt="Los Vengadores de Spidey"/>
                            </div>
                        </div>
                    </div>                    

                    <div class="panel panel-info">                        
                        <div class="panel-body">
                            publicidad aqui
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL Windows -->
        <?php             
        include_once 'modal/login-modal.php';
        include_once 'modal/sign-in-modal.php';         
        ?>                    

        <!--Ver donde poner esto-->
        <script>
            // activa modal registro al presionar botones
            $('.comment-button, .like-button').click(function(){$('#sign-in-modal').modal('show')});
        </script>
    </body>
</html>