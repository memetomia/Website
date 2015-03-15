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
        include_once 'base/TableUser_Gallery.php';

        $bdtag = new TableUser_Gallery();
        $bdGallery = new TableGallery();
        $bdComment = new TableComment();
        $iID = 0;
        $sMetaTitulo = "";
        $sMetaImagen = "";
        $sUrlaMostrar = "";
        $botonplay = "";
        $bCuenta = 0;
        $iState = -1;
        $iTipoMedia = - 1;
        $sUrl = "";
        $sInfoMedia = "";
        $sName = "";
        $sTitle = "";
        $iNMore = 0;
        $iNComment = 0;
        $ComentarioAdicional = "";
        $sMeta = "";
        $bCensura = "";
        $iNVisit = 0;
        $imagenUserCurrent = "media/default/profile-example.jpg";
        if ($co->isEmpty()) {
            $bCuenta = 1;
            $imagenUserCurrent = "media/default/profile-example.jpg";
        }
        if (isset($_GET["id"])) {
            $iID = $_GET["id"];
            $bdGallery->UpdateNVISITPlus($iID);
            $bdGallery->SearchById($iID);
            $sMetaTitulo = $bdGallery->bd->obtener_respuesta(0, "TITLE");
            $iState = $bdGallery->bd->obtener_respuesta(0, "STATE");
            $iTipoMedia = $bdGallery->bd->obtener_respuesta(0, "TYPEMEDIA");
            $sUrl = $bdGallery->bd->obtener_respuesta(0, "URL");

            $sInfoMedia = $bdGallery->bd->obtener_respuesta(0, "INFOMEDIA");
            $sName = $bdGallery->bd->obtener_respuesta(0, "NAME");
            $sTitle = $bdGallery->bd->obtener_respuesta(0, "TITLE");
            $iNMore = $bdGallery->bd->obtener_respuesta(0, "N_MORE");
            $iNComment = $bdGallery->bd->obtener_respuesta(0, "N_COMMENT");
            $ComentarioAdicional = $bdGallery->bd->obtener_respuesta(0, "COMMENT_ADDITIONAL");
            $sMeta = $bdGallery->bd->obtener_respuesta(0, "META");
            $bCensura = $bdGallery->bd->obtener_respuesta(0, "CENSURA");

            if ($co->isEmpty()) {
                $bCensura = 0;
            }

            if (($iState == 0)) {
                include 'frame/PrepararImagen.php';
                if ($bCensura == 1) {
                    $sUrlaMostrar = '<img style="width:100%" class="img-thumbnail img-small" src="' . EXT_MEDIA . '/default/INS.png" />';
                    $botonplay = "";
                }
            }
        }


        echo $sMeta;

        if ($sMeta == "") {
            ?>    
            <meta name = "og:locale" value = "es_ES"><meta property = "og:locale" content = "es_ES">
            <meta name = "og:site_name" value = "Memetomia"><meta property = "og:site_name" content = "Memetomia">
            <meta name = "twitter:site" value = "@memetomia"><meta property = "twitter:site" content = "@memetomia">
            <meta name = "twitter:creator" value = "@memetomia"><meta property = "twitter:creator" content = "@memetomia">
            <meta name = "twitter:title" value = "@memetomia"><meta property = "twitter:title" content = "@memetomia">
            <meta name = "twitter:domain" value = "memetomia.com"><meta property = "twitter:domain" content = "http://memetomia.com/">
            <meta name = "twitter:description" value = "Paginas de imagenes y videos graciosos todos en un mismo luga">
            <meta property = "twitter:description" content = "Paginas de imagenes y videos graciosos todos en un mismo lugar">
            <meta name = "og:description" value = "Todas la imágenes graciosas de la red en un solo lugar!!!">
            <meta property = "og:description" content = "Todas la imágenes graciosas de la red en un solo lugar!!!">

            <!--            <meta name = "title" value = "<?php echo $sTitle; ?>">-->
            <meta property = "title" content = "<?php echo $sTitle; ?>">
    <!--            <meta name = "og:title" value = "<?php echo $sTitle; ?>">-->
            <meta property = "og:title" content = "<?php echo $sTitle; ?>">
    <!--            <meta name = "twitter:title" value = "<?php echo $sTitle; ?>">-->
            <meta property = "twitter:title" content = "<?php echo $sTitle; ?>">
            <meta property = "twitter:image:src" content = "<?php echo $sMetaImagen; ?>">
    <!--            <meta name = "og:image" value = "<?php echo $sMetaImagen; ?>">-->
            <meta property = "og:image" content = "<?php echo $sMetaImagen; ?>">



            <?php
        }

      
            echo '<meta property = "og:image" content = "'. $sMetaImagen . '">';
        
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

        <?php
        $html = "";

        include_once 'frame/Imagen.php';
        ?>


            <div id="sidebar" class="col-md-4">

            <?php include_once 'frame/PostSimilares.php'; ?>            

<?php include_once 'frame/Destacados.php'; ?>

                <?php include_once 'frame/Tag.php'; ?>


            </div>


        </div>

        <footer class="navbar-inverse">
            <div class="container">
                <p class="text-muted">Footer</p>
            </div>
        </footer>


<?php
if ($co->isEmpty()) {
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
                $('.comment-button, .like-button, #btComment').click(function() {
                    $('#sign-in-modal').modal('show');
                });
            </script>
    <?php
}
?>








    </body>
</html>