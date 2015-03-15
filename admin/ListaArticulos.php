<html lang="en">
    <head>
        <title>Gestionar Articulo</title>
        <?php include_once 'frames/head.php'; ?>
        <script src="../js/const.js"></script>
        <link rel="stylesheet" type="text/css" href="css/videoprueba.css" />
       
     
        <script type="text/javascript" src="js/jq.js"></script>
       
     
        <script type="text/javascript">
         

            function Eliminar(iPosicionEnPantalla, iIdEnTabla) {

                $.post("ajax/DelArticle.php", {
                    iID: iIdEnTabla
                }
                , function(o) {
                    if (o.Tupla > 0) {
                        $("#t" + iPosicionEnPantalla).hide();
                    }
                }, "json");
            }
            function Activar(iPosicionEnPantalla, iIdEnTabla) {

                $.post("ajax/ActiveArticle.php", {
                    iID: iIdEnTabla
                }
                , function(o) {
                    if (o.Tupla > 0) {
                        $("#t" + iPosicionEnPantalla).removeClass("trDel");
                    }
                }, "json");
            }
            function Desactivar(iPosicionEnPantalla, iIdEnTabla) {

                $.post("ajax/DesactiveArticle.php", {
                    iID: iIdEnTabla
                }
                , function(o) {
                    if (o.Tupla > 0) {
                        $("#t" + iPosicionEnPantalla).addClass("trDel");
                    }
                }, "json");
            }
            function Modificar(iPosicionEnPantalla, iIdEnTabla) {
                location.href = SERVER + ADMIN + "/EditArticle.php?IDPage=" + iIdEnTabla;
            }
        </script>

    </head>

    <body>

        <?php include_once 'frames/titulo.php'; ?>

        <div class="container-fluid">
            <div class="row">
                <?php include_once 'frames/menu.php'; ?>
                 
                <div class="col-sm-8 col-sm-offset-3 col-md-8 col-md-offset-2 main">
                  
     <?php include_once 'frames/tablaAll.php'; ?>
               
                 
               
                </div>
              

            </div>

        </div>

    </body>
</html>