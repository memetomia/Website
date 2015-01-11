<?php session_start() ?>
<html lang="en">
    <head>
        <?php include_once 'frames/head.php'; ?>
    </head>

    <body>

        <?php include_once 'frames/titulo.php'; ?>

        <div class="container-fluid">            
            <div class="row">
                <?php //include_once 'frames/menu.php'; ?>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-md-offset-4 main">
                    
                    <?php
                        if(isset($_SESSION['message'])) {                        
                            echo '<div class="alert alert-warning"><strong>Atención!</strong> <span id="alert-message">'.$_SESSION['message'].'</span></div>';                            
                            unset($_SESSION['message']);
                        }
                    ?>                

                    <form action="ajax/login.php" method="POST" role="form">
                        <legend>Memetomia - Administración</legend>
                    
                        <div class="form-group">
                            <label for="user">Usuario</label>
                            <input type="text" class="form-control" name="user" placeholder="Ingrese su usuario">
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" class="form-control" name="password" placeholder="Ingrese su contraseña">
                        </div>
                                            
                        <div class="text-center"><button type="submit" class="btn btn-warning">Ingresar</button></div>
                    </form>
                </div>                
            </div>
        </div>
    </body>
</html>