<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?php
        include_once 'base/TableGallery.php';
        $bdGallery = new TableGallery();

        $sMetaTitulo = "";
        $sMetaImagen = "";
        if (isset($_GET["id"])) {
            $iID = $_GET["id"];

            $bdGallery->SearchById($iID);
            $sMetaTitulo = $bdGallery->bd->obtener_respuesta(0, "TITLE");
        }
        $i = 0;
        if ($bdGallery->bd->obtener_respuesta($i, "STATE") == 0) {

//IAMGEN NORMAL
            if ($bdGallery->bd->obtener_respuesta($i, "TYPEMEDIA") == 0) {
                $sMetaImagen = EXT_ARTICLE . "/" . $bdGallery->bd->obtener_respuesta($i, "URL");
                ECHO '<meta name="twitter:card" value="photo"><meta property="twitter:card" content="photo">';
            }
            //VIDEO YOTUBE
            if ($bdGallery->bd->obtener_respuesta($i, "TYPEMEDIA") == 1) {
                $sMetaImagen = $bdGallery->bd->obtener_respuesta($i, "URL");
                echo $bdGallery->bd->obtener_respuesta($i, "META");
            }
            //   VINE
            if ($bdGallery->bd->obtener_respuesta($i, "TYPEMEDIA") == 2) {
                $sMetaImagen = $bdGallery->bd->obtener_respuesta($i, "URL");
                echo $bdGallery->bd->obtener_respuesta($i, "META");
            }
            //EMB
            if ($bdGallery->bd->obtener_respuesta($i, "TYPEMEDIA") == 3) {
                $sUrlaMostrar = $bdGallery->bd->obtener_respuesta($i, "INFOMEDIA");
                $botonplay = "";
            }
        }



        include_once 'frame/metadato.php';
        ?>
        <title> <?php echo $sMetaTitulo; ?> | Memetomía</title>
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
                <div class="collapse navbar-collapse" id="bs-media/example-navbar-collapse-1">




                    <div class="collapse navbar-collapse" id="memetomia-navbar">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="#">Inicio</a></li>
                            <li><a href="#">Top</a></li>
                            <li><a href="#">Vídeos</a></li>
                            <li><a href="#">GIF</a></li>
                        </ul>                    
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-bell"></span> Notificaciones <span class="label label-danger">2</span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#"><span class="not-readed"></span> <span class="glyphicon glyphicon-comment"></span> Alejandro123 comentó en tu post</a></li>                                
                                    <li><a href="#"><span class="not-readed"></span> <span class="glyphicon glyphicon-thumbs-up"></span> A Erika33 le gustó tu post</a></li>                                
                                    <li class="divider"></li>
                                    <li class="text-center"><a href="#" data-toggle="modal" data-target="#notifications-modal">Ver todas las notificaciones</a></li>                                
                                </ul>
                            </li>
                            <li><a href="#" data-toggle="modal" data-target="#new-post-modal"><span class="glyphicon glyphicon-upload"></span> Nuevo Post</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Jaivic Villegas<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#" data-toggle="modal" data-target="#activity-modal"><span class="glyphicon glyphicon-tasks"></span> Actividad</a></li>                                
                                    <li><a href="#" data-toggle="modal" data-target="#settings-modal"><span class="glyphicon glyphicon-cog"></span> Ajustes</a></li>                                
                                    <li class="divider"></li>
                                    <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Cerrar sesión</a></li>
                                </ul>
                            </li>
                        </ul>                    
                    </div>
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
   <?php
        $sUser = "jaivic";
        $iLike = 3;
        $iComment = 1;
        $sTitle = "tit";
       ;
        ?>
            <?php include_once 'frame/Imagen.php'; ?>

            <div id="sidebar" class="col-md-4">

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Posts Similares</h3>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-6 col-xs-4">
                            <a href="#"><img class="post-media img-thumbnail" src="media/example_img/post2.jpg" alt="El pintor mas honesto en la historia de la humanidad"/></a>
                        </div>
                        <div class="col-md-6 col-xs-4">
                            <a href="#"><img class="featured-media img-thumbnail" src="media/example_img/post1.jpg" alt="I must become someone else, I must become something else" height="50px"/></a>
                        </div>                            
                        <div class="col-md-6 col-xs-4">
                            <a href="#"><img class="post-media img-thumbnail" src="media/example_img/post3.jpg" alt="Los Vengadores de Spidey"/></a>
                        </div>
                    </div>
                </div>                      

                <?php include_once 'frame/Destacados.php'; ?>

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


                <?php include_once 'frame/Tag.php'; ?>



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
        include_once 'modal/notifications-modal.php';
        include_once 'modal/new-post-modal.php';
        include_once 'modal/activity-modal.php';
        include_once 'modal/settings-modal.php';
        ?>        




        <!--Ver donde poner esto-->
        <script>
            // Activating All Switches
            $(".settings-switch").bootstrapSwitch();
        </script>
    </body>
</html>