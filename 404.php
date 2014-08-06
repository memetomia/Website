<?php include_once 'base/const.php' ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Memetomía</title>        
        
        <link href="css/bootstrap.min.css" rel="stylesheet">        
        

        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
            h1{
                font-size: 45pt;                
            }

            p{
                font-size: 17pt;
            }
        </style>
    </head>
    <body>       

        <nav class="navbar navbar-static-top navbar-inverse" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">                    
                    <a class="navbar-brand" href="<?php echo SERVER ?>">Memetomía</a>
                </div>  
            </div>              
        </nav>

        <div class="container text-center">

            <h1>404. Página no encontrada</h1><br/>
            <p>¡Lo sentimos! No pudimos encontrar la página que buscas.</p>
            <p>Usa la flecha <b>atrás</b> del navegador para volver.</p>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">                    
                        <img src="media/default/okayguy.jpg" alt="ok-guy-meme">                    
                </div>
            </div>
            <p>O presiona este <b>botón</b> para volver a la diversión:</p>
            <p>
                <a href="<?php echo SERVER ?>" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-arrow-left"></span> Volver a Memetomía</a>
            </p>                
        </div>
    </body>
</html>