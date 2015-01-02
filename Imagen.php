<!DOCTYPE html>
<html lang="es">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?php
        include_once 'frame/init.php';
        include_once 'base/TableGallery.php';
        include_once 'base/TableComment.php';
        $bdGallery = new TableGallery();
        $bdComment = new TableComment();
        $iID = 0;
        $sMetaTitulo = "";
        $sMetaImagen = "";
        $sUser = "";
        $iLike = 0;
        $iComment = 0;
        $sUrlaMostrar = "";
        $botonplay = "";
        $ComentarioAdicional = "";
        $bCuenta = 0;

        $imagenUserCurrent = "media/default/profile-example.jpg";
        if ($co->IsSession()) {
            $bCuenta = 1;
            $imagenUserCurrent = "media/default/profile-example.jpg";
        }
        if (isset($_GET["id"])) {
            $iID = $_GET["id"];

            $bdGallery->SearchById($iID);
            $sMetaTitulo = $bdGallery->bd->obtener_respuesta(0, "TITLE");
            $iState = $bdGallery->bd->obtener_respuesta(0, "STATE");
            $iTipoMedia = $bdGallery->bd->obtener_respuesta(0, "TYPEMEDIA");
            $sUrl = $bdGallery->bd->obtener_respuesta(0, "URL");
            //  $iID = $bdGallery->bd->obtener_respuesta(0, "ID");
            $sInfoMedia = $bdGallery->bd->obtener_respuesta(0, "INFOMEDIA");
            $sUser = $bdGallery->bd->obtener_respuesta(0, "NAME");
            $sTitle = $bdGallery->bd->obtener_respuesta(0, "TITLE");
            $iLike = $bdGallery->bd->obtener_respuesta(0, "N_MORE");
            $iComment = $bdGallery->bd->obtener_respuesta(0, "N_COMMENT");
            $ComentarioAdicional = $bdGallery->bd->obtener_respuesta(0, "COMMENT_ADDITIONAL");
            $sMeta = $bdGallery->bd->obtener_respuesta(0, "META");
            $bCensura = $bdGallery->bd->obtener_respuesta(0, "CENSURA");
            if ($bCuenta == 1) {
                $bCensura = 0;
            }
            if ($iState == 0) {
                if ($bCensura == 0) {
//IAMGEN NORMAL
                    if ($iTipoMedia == 0) {
                        $sMetaImagen = EXT_ARTICLE . "/" . $sUrl;
                        ECHO '<meta name="twitter:card" value="photo"><meta property="twitter:card" content="photo">';
                        $sUrlaMostrar = '<img class="img-thumbnail img-small" src="' . EXT_ARTICLE . "/" . $sUrl . '"/>';
                        $botonplay = "";
                    }
                    //VIDEO YOTUBE
                    if ($iTipoMedia == 1) {
                        $sMetaImagen = $sUrl;
                        echo $sMeta;


                        $sUrlaMostrar = '<img class="post-media img-thumbnail" src="' . $sMetaImagen . '" width="100%" alt="' . $sMetaTitulo . '"/>';

                        $botonplay = '<div id="Video-' . $iID . '" class="play"></div>';
                        $botonplay .= '<script type="text/javascript">'
                                . '$("#Video-' . $iID . '").click(function() {
                                                           $("#d-' . $iID . '").html(\'<div class="flex-video widescreen">' . $sInfoMedia . '</div>\');
                                                       });                               </script>';
                    }
                    //   VINE
                    if ($iTipoMedia == 2) {
                        $sMetaImagen = $sUrl;
                        echo $sMeta;
                        $sUrlaMostrar = '<img class="post-media img-thumbnail" src="' . $sMetaImagen . '" width="100%" alt="' . $sMetaTitulo . '"/>';

                        $botonplay = '';
                        $botonplay .= '<script type="text/javascript">'
                                . '                                    $("#d-' . $iID . '").html(\'' . $sInfoMedia . '\');
                                                        $(".Vine").click(function() {
                                                        
                                                            $(this).get(0).paused ? $(this).get(0).play() : $(this).get(0).pause();
                       });                               </script>';
                    }
                    //EMB
                    if ($iTipoMedia == 3) {
                        $sUrlaMostrar = $sInfoMedia;
                        $botonplay = "";
                    }
                } else {
                    $sUrlaMostrar = '<img class="post-media img-thumbnail" src="' . EXT_MEDIA . '/default/INS.png" width="100%" alt="' . $sMetaTitulo . '"/>';

                    $botonplay = "";
                }
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
        <script src="js/fb.js"></script>
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
        <?php include_once 'frame/bar.php'; ?>

        <div id="main-content" class="container">            

            <!--            <div class="ad-panel col-md-12">
                            <div class="panel panel-info">                    
                                <div class="panel-body">
                                    publicidad aqui
                                </div>
                            </div>
                        </div>-->
            <?php
            $html = "";

            include_once 'frame/Imagen.php';
            ?>


            <div id="sidebar" class="col-md-4">

                <?php include_once 'frame/PostSimilares.php'; ?>            

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



                <!--                <div class="panel panel-info">                        
                                    <div class="panel-body">
                                        publicidad aqui
                                    </div>
                                </div>-->
            </div>


        </div>

        <footer class="navbar-inverse">
            <div class="container">
                <p class="text-muted">Footer</p>
            </div>
        </footer>


        <?php
        if ($bTodoSimple != true) {
            if ($co->IsSession()) {
                include_once 'modal/notifications-modal.php';
                include_once 'modal/new-post-modal.php';
                include_once 'modal/activity-modal.php';
                include_once 'modal/settings-modal.php';
                ?> 
                <script>
                    // Activating All Switches
                    $(".settings-switch").bootstrapSwitch();
                </script>
                <?php
            } else {
                include_once 'modal/login-modal.php';
                include_once 'modal/sign-in-modal.php';
                ?>
                <script>
                    // activa modal registro al presionar botones
                    $('.comment-button, .like-button').click(function() {
                        $('#sign-in-modal').modal('show');
                    });










                </script>
                <?php
            }
        } else {
            ?>

        <?php } ?>








    </body>
</html>