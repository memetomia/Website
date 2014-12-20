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
<script type="text/javascript">
    function crearjson(numero) {
        var string = new Array();
        i = 0;
        $("#post-tags-" + numero + " a").each(function() {
            string[i] = $(this).html();
            i++;
        });
        return(JSON.stringify(string));
    }
    function PostGuardar(numero) {

        var string = crearjson(numero);

        $.post("ajax/SaveArticlerobado.php", {
            iNumero:numero,
            sTitulo: $("#Nombre-" + numero).val(),
            aEtiquetas: string,
            sImagen: $("#Imagen-" + numero).attr("src"),
            bCensura: $("#censura-" + numero).val()

        }, function(o) {
            if (o.Tupla > 0) {
                alert("guardo");
                $("#art-" + o.Numero).hide();
            } else {

            }

        }, "json");

        //   alert("espera falta algo");
    }
    function PostEliminar(numero) {

        $("#art-" + numero).hide();
         $("#botonera-" + numero).hide();
        
        //   alert("espera falta algo");
    }

</script>