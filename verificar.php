<!DOCTYPE html>
<?php
include_once 'frame/init.php';
include_once 'base/classSession.php';
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

        <style type="text/css">  
            .well {
                padding-bottom: 0px;
            }      
            span#ok-sign {
                font-size: 8em;
                color: #74ff55;
            }
            span#warning-sign {
                font-size: 8em;
                color: #c9bcce;
            }
            img {                
                float: right;                
            }
        </style>
    </head>
    <body>   

    <?php include_once 'frame/bar.php';?>

    <div id="main-content" class="container">  
        
        <?php
        $co = new oSession();
        if (isset($_GET["code"])) {
            $sParam = $_GET["code"];
            include_once 'base/const.php';

            include_once 'base/TableUser.php';

            $user = new TableUser();
            $verifico = -1;
            $verifico = $user->SearchaVarifyUserByCode($sParam);
            if ($verifico == 1) {                

                echo '<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-md-offset-3 well well-lg text-center">
                        <span id="ok-sign" class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span><br><br>
                        <p class="lead text-muted">Su cuenta ha sido verificada correctamente</p>            
                        <img src="media/default/all the things meme.png">
                     </div>';
                if ($user->SearchUserByCode($sParam) > 0) {

                    $co->PutVar("iId", $user->bd->obtener_respuesta(0, "ID"));
                }
            } else {
                echo '<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-md-offset-3 well well-lg text-center">
                    <span id="warning-sign" class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span><br><br>
                    <p class="lead text-muted">Ocurrió algo inesperado :(<br>Intente de nuevo o pongase en contacto con soporte</p>
                    <img src="media/default/all the things meme sad.png">                          
                  </div>';
            }
        } else {
            echo '<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-md-offset-3 well well-lg text-center">
                    <span id="warning-sign" class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span><br><br>
                    <p class="lead text-muted">Ocurrió algo inesperado :(<br>Intente de nuevo o pongase en contacto con soporte</p>
                    <img src="media/default/all the things meme sad.png">                          
                  </div>';
        }
        ?>

    </div>
</body>
</html>

