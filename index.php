
<?php //header ("Location: coming-soon.php");  ?>

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


                    <?php include_once 'frame/TimeLine.php'; ?>
                    
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


                    <?php include_once 'frame/Tag.php'; ?>

                    <?php include_once 'frame/Destacados.php'; ?>


                    <!--                    <div class="panel panel-info">                        
                                            <div class="panel-body">
                                                publicidad aqui
                                            </div>
                                        </div>-->
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
            $('.comment-button, .like-button').click(function() {
                $('#sign-in-modal').modal('show')
            });
        </script>
        <?php
        include_once 'modal/notifications-modal.php';
        include_once 'modal/new-post-modal.php';
        include_once 'modal/activity-modal.php';
        include_once 'modal/settings-modal.php';
        ?>        

    </body>
</html>