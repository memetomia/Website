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
                        <li><a href="#" data-toggle="modal" data-target="#sign-in-modal">¡Regístrate en Memetomía!</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#login-modal">Iniciar sesión</a></li>                        
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

                    <?php
                    include_once 'base/const.php';
                    $paginador = "";
                    $index = 0;
                    if (isset($_GET["i"])) {
                        $index = $_GET["i"];
                    }
                    if ($index <= 0) {
                        $index = 0;
                        $prev = $index - 1;
                        $next = $index + 1;
                        $paginador = '<li class="previous disabled"><a href="' . SERVER . "/index.php?i=" . $prev . '">&larr; Atrás</a></li><li class="next"><a href="' . SERVER . "/index.php?i=" . $next . '">Siguiente &rarr;</a></li>';
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
                    if ($todo > 0) {
                        $html = "";
                        for ($i = 0; $i < $todo; $i++) {

                            $iState = $bd->bd->obtener_respuesta($i, "STATE");
                            $iTipoMedia = $bd->bd->obtener_respuesta($i, "TYPEMEDIA");
                            $sUrl = $bd->bd->obtener_respuesta($i, "URL");
                            $iID = $bd->bd->obtener_respuesta($i, "ID");
                            $sInfoMedia = $bd->bd->obtener_respuesta($i, "INFOMEDIA");
                            $sName = $bd->bd->obtener_respuesta($i, "NAME");
                            $sTitle = $bd->bd->obtener_respuesta($i, "TITLE");
                            $iNMore = $bd->bd->obtener_respuesta($i, "N_MORE");
                            $iNComment = $bd->bd->obtener_respuesta($i, "N_COMMENT");

                            include_once 'frame/TagTimeLine.php';
                        }
                    }
                    ?>
                    <?php // include_once 'frame/TimeLine.php'; ?>

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
                $('#sign-in-modal').modal('show');            
            });
        </script>

    </body>
</html>