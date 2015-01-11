<?php
include_once 'base/TableUser.php';
$bd = new TableUser();
include_once 'base/ClassCookie.php';
$co = new ClassCookie("sec");
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">



        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/dashboard.css" rel="stylesheet">
        <script src="js/jquery-2.1.0.min.js"></script>
        <script type="text/javascript" src="js/jquery.cleditor.js"></script>



        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style id="holderjs-style" type="text/css"></style>
    </head>

    <body>

        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Memetomia</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <!--                        <li><a href="#">Dashboard</a></li>
                                                <li><a href="#">Settings</a></li>
                                                <li><a href="#">Profile</a></li>
                                                <li><a href="#">Help</a></li>-->
                    </ul>
                </div>
            </div>
        </div>

        <div class="container-fluid">            
            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-md-offset-4 main">



                    <form action="login.php" method="POST" role="form">
                        <legend>Memetomia</legend>

                        <div class="form-group">
                            <label for="user">Usuario</label>
                            <input type="text" class="form-control" name="user" placeholder="Ingrese su usuario">
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" class="form-control" name="password" placeholder="Ingrese su contraseña">
                        </div>
                        <div class="text-center" id="MsgError">
                            <?php
                              echo "introduzca la nombre y contraseña";
                            if (isset($_POST["user"])) {
                                if (isset($_POST["password"])) {
                                    $bError = false;
                                    $sName = $_POST["user"];
                                    $sPass = $_POST["password"];
                                    $iResultado = $bd->login($sName, $sPass);
                                    if ($iResultado == 1) {
                                        if ($bd->bd->obtener_respuesta(0, "VERIFY") == 1) {
                                            $resultado = $bd->bd->obtener_respuesta(0, "ID");
                                            $co->setSVar("iId", $resultado);
                                            $co->SaveAll();
                                            //    header('Location: index.php');
                                            echo "listo!";
                                        } else {
                                            echo "falta verificar la cuenta";
                                        }
                                    } else {
                                        echo "Clave y nombre de cuenta incorrecto";
                                    }
                                }
                            }
                            ?>


                        </div>
                        <div class="text-center"><button type="submit" class="btn btn-warning">Ingresar</button></div>
                    </form>
                </div>                
            </div>
        </div>
    </body>
</html>