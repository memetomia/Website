<!DOCTYPE html>
<?php
include_once 'frame/init.php';
?>
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
           <script src="js/fileuploader.js"></script>
        <script src="js/fb.js"></script>

        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>       

        <?php include_once 'frame/bar.php'; ?>
        <div id="main-content" class="container">
            <div id="timeline-container" class="col-md-12">


                <div id="timeline" class="col-md-8">

                    <?php
                    //           include_once 'base/const.php';
                    $paginador = "";
                    $index = 0;
                    if (isset($_GET["i"])) {
                        $index = $_GET["i"];
                    }
                    if ($index <= 0) {
                        $index = 0;
                        $prev = $index - 1;
                        $next = $index + 1;
                        if ($index <= 0) {
                            $paginador = '<li class="previous disabled"><a >&larr; Atrás</a></li><li class="next"><a href="' . SERVER . "/index.php?i=" . $next . '">Siguiente &rarr;</a></li>';
                        } else {
                            $paginador = '<li class="previous disabled"><a href="' . SERVER . "/index.php?i=" . $prev . '">&larr; Atrás</a></li><li class="next"><a href="' . SERVER . "/index.php?i=" . $next . '">Siguiente &rarr;</a></li>';
                        }
                    } else {
                        $prev = $index - 1;
                        $next = $index + 1;
                        $paginador = '<li class="previous"><a href="' . SERVER . "/index.php?i=" . $prev . '">&larr; Atrás</a></li><li class="next"><a href="' . SERVER . "/index.php?i=" . $next . '">Siguiente &rarr;</a></li>';
                    }

                    include_once 'base/TableGallery.php';
                    include_once 'base/TableUser_Gallery.php';
                    $bd = new TableGallery();
                    $bdtag = new TableUser_Gallery();
                    if ($index != 0) {
                        $index = $index * 5;
                    }

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
                            $ComentarioAdicional = $bd->bd->obtener_respuesta($i, "COMMENT_ADDITIONAL");
                            $bCensura = $bd->bd->obtener_respuesta($i, "CENSURA");

                           
                                if ($co->IsSession()) {
                                    $bCensura = 0;
                                      include 'frame/TimeLineIn.php';
                                }else{
                                    //  $bCensura = 1;
                                        include 'frame/TimeLineOut.php';
                                }
                            
                          
                        }
                    }
                    ?>
                    <?php // include_once 'frame/TimeLine.php'; ?>

                    <div class="col-md-12">
                        <ul class="pager">
                            <?php
                            echo $paginador;
                            ?>

                        </ul>
                    </div>
                </div>

                <div id="sidebar" class="col-md-4">
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
                    function FunComment(iId) {
                        window.location.href = IMAGE + iId;
                    }
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
        }
        ?>
        <!-- MODAL Windows -->




    </body>
</html>