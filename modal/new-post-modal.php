<!-- NEW POST MODAL -->
<style>
    #new-post-modal textarea
    {
        resize: none;
    }

    .delete-tag
    {                
        margin-left: 5px;
        color: #fff;
        font-size: 16px;          
    }
    .delete-tag:hover
    {                
        cursor: pointer;
    }
</style>

<div class="modal fade" id="new-post-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Nuevo Post</h4>
            </div>
            <div class="modal-body">

                <div id="new-post-mode" class="btn-group btn-group-justified" data-toggle="buttons">
                    <!--                    <label id="new-post-url-mode" class="btn btn-default ">
                                            <input type="radio" name="options"><span class="glyphicon glyphicon-globe"></span> Cargar desde URL
                                        </label>-->
                    <!--                    <label id="new-post-image-mode" class="btn btn-default Oculto">
                                            <input type="radio" name="options"><span class="glyphicon glyphicon-picture"></span> Subir imágen
                                        </label>-->
                </div><br/>

                <form id="new-post-form" role="form">
                    <div class="form-group">
                        <label for="new-post-title">Título</label><span class="pull-right char-counter text-muted">150</span>
                        <textarea class="form-control" name="title" id="new-post-title" placeholder="Ingresa título"></textarea>
                    </div>
                    <!--                    <div id="new-post-url-field" class="form-group">
                                            <label for="new-post-url">URL</label>
                                            <input type="url" class="form-control" name="url" id="new-post-url" placeholder="http://">
                                            <p class="help-block">Pueden colocarse URL de youtube</p>
                                        </div>-->
                    <div id="new-post-image-field" class="form-group">
                        <label for="new-post-img">Cargar imágen</label>
                        <button id='BtSubir' type="button" class="btn btn-default"  >Subir</button>
                        <!--<p class="help-block">Formatos: JPG / GIF / PNG máx: 4 mb</p>-->
                        <img id="new-post-image-show" src="./media/default/ArticlePredeterminado.jpg" height="200px">
                    </div>
                    <!--                    <div id="new-post-tags-search-field" class="form-group">
                                            <label for="new-post-tags-search">Etiquetas</label>                        
                                            <div class="input-group">
                                                <input type="text" name="tag" class="form-control" id="new-post-tags-search" placeholder="Ingresa etiquetas">
                                                <span class="input-group-btn">
                                                    <button id="new-post-add-tag" class="btn btn-default" type="button">
                                                        <span class="gylphicon glyphicon-plus"></span>
                                                    </button>
                                                </span>
                                            </div>
                                            <p class="help-block">Presiona 'enter' para agregar</p>
                                        </div>-->

                    <div id="new-post-tags-field" class="form-group"></div>
                </form>
            </div>
            <div class="modal-footer">                        
                <button id="new-post-success" type="button" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-upload"></span> Publicar</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

   
    modalNewPost = function() {
        // Prefijo del modal
        var MODAL_PREFIX;
        var $_VentanaActual;
        var $_DirUrl;
        var $_sTitle;
        var $_sUrl;
        //   var $_sTag;
        var $_urlImagen;
        var $_sBoton;
        var $_postImage;
        /**
         * 
         *     inicia todo el modal carga los div y li necesarios
         * @return 
         *  
         <li><a href="#"><span class="not-readed"></span> <span class="glyphicon glyphicon-thumbs-up"></span> A Erika33 le gustó tu post</a></li>                                
         
         */
        function Iniciar() {
            $_DirUrl = "";
            MODAL_PREFIX = 'new-post-';
            $_sTitle = $('#' + MODAL_PREFIX + 'title');
            // $_sUrl = $('#' + MODAL_PREFIX + 'url');
            //  $_sTag = $('#' + MODAL_PREFIX + 'tags-search');
            $_sBoton = $('#' + MODAL_PREFIX + 'success');
            $_postImage = $('#' + MODAL_PREFIX + 'image');
            $_sTitle.val("");
            $_urlImagen = $('#' + MODAL_PREFIX + 'image-show');
            // $_sUrl.val("");
            //  $_sTag.val("");
            //$_sBoton.click(Cargar());
            $('#new-post-success').click(Cargar());
            $_VentanaActual = "";
             

        }

        
        function Cargar() {

            if ($_DirUrl != "") {
                $_DirUrl = $_sTitle.val();
            }

            if ($_DirUrl != "") {
                $.post("ajax/SaveArticleByUser.php", {
                    sTitle: $_sTitle.val(),
                    sUrl: $_DirUrl
                 
                }, function(o) {

                }, "json");
            }
        }/* fin de funcion Cargar*/
        function GuardarDir(DirUrl) {
            this.$_DirUrl= DirUrl;
            $_urlImagen.attr("src", "./media/article/user/" + DirUrl);
        }

        return {
            Iniciar: Iniciar,
            Cargar: Cargar,
            GuardarDir: GuardarDir


        }
    }();
    $(function() {
        modalNewPost.Iniciar();
        var uploader = new qq.FileUploader({
            element: document.getElementById('BtSubir'),
            action: 'admin/ajax/subirImagenArticleUser.php',
            uploadButtonText: 'subir',
            dragText: 'Suelta aqui',
            debug: false,
            onComplete: nombreFun
        });
        function nombreFun(id, fileName, responseJSON) {
            //$('#imgSubirid').attr('src','/OnionFW/means/'+responseJSON.info);
            if (responseJSON.error) {
                modalNewPost.GuardarDir("");

            } else {
                // var $vardirImag = ARTICLE + "/user" + responseJSON.info;
                // $('#Imagen').attr('src', $vardirImag);

                modalNewPost.GuardarDir(responseJSON.info);

            }
        }
        // Prefijo del modal
        var MODAL_PREFIX = 'new-post-';
        // constante de la máxima cantidad de caracteres del título del post.
        const POST_TITLE_MAX_LENGTH = 150;
        // Variables cacheadas
//        var $_modal = $('#' + MODAL_PREFIX + 'modal');
//        var $_menu = $('#' + MODAL_PREFIX + 'mode');
//        var $_form = $('#' + MODAL_PREFIX + 'form');
        var $_postTitle = $('#' + MODAL_PREFIX + 'title');
        //   var $_postURL = $('#' + MODAL_PREFIX + 'url-field');
//        var $_postImage = $('#' + MODAL_PREFIX + 'image-field');
        //var $_tagInput = $('#' + MODAL_PREFIX + 'tags-search');
      //  var $_tagButton = $('#' + MODAL_PREFIX + 'add-tag');
//        var $_tags = $('#' + MODAL_PREFIX + 'tags-field');
        /*
         * activa el autocompletado de tags para
         * tratar de evitar duplicado de tags. 
         */
//        $_tagInput.autocomplete({
//            source: "ajax/autocomplete-tags.php",
//            delay: 500,
//            minLength: 2
//        });
        /*
         * Evento que modifica el formulario dependiendo
         * del modo seleccionado.
         */
//        $_menu.find('label').click(function()
//        {
//
//            // obtiene el id de la opción del menú al que se le dió click
//            var selectedMode = $(this).attr('id').toString();
//            // oculta y muestra los campos dependiendo de la opción seleccionada
//            switch (selectedMode)
//            {
//                // caso modo URL
////                case 'new-post-url-mode':
////                    // ocultamos campo de imágen
////                    $_postImage.hide();
////                    // mostramos campo de URL
////                    $_postURL.show();
////                    break;
//                // caso modo imágen
//                case 'new-post-image-mode':
//                    // ocultamos campo URL
//                    //  $_postURL.hide();
//                    // mostramos campo de imágen
//                    $_postImage.show();
//                    break;
//            }
//        });
        /*
         * Evento que realiza el conteo de caracteres
         * del titulo y valida cuando sobrepasa el limite.
         */
        $_postTitle.on('keyup change blur', function()
        {
            // calcula los caracteres restantes
            var remainingChars = POST_TITLE_MAX_LENGTH - $(this).val().length;
            // cacheamos campo que muestra caracteres restantes
            var $charCounter = $_form.find('.char-counter');
            // cacheamos el div que contiene el textarea del título
            var $titleField = $(this).parent('div.form-group');
            // asignamos el valor de los caracteres restantes al elemento
            $charCounter.text(remainingChars);
            // caracteres restantes sobrepasa el límite
            if (remainingChars < 0)
            {
                // colocamos el contador de caracteres de color rojo para indicar error
                $charCounter.addClass('text-danger');
                // colocamos el campo del titulo de color rojo para indicar error
                $titleField.addClass('has-error');
            }
            // caracteres restantes dentro del límite y algun elemento indica error
            else if ((remainingChars >= 0) && ($charCounter.hasClass('text-danger')))
            {
                // removemos el color rojo en el contador de caracteres
                $charCounter.removeClass('text-danger');
                // removemos el color rojo en el campo del título
                $titleField.removeClass('has-error');
            }
        });
        /*
         * Evento que permite agregar tag presionando
         * el botón + del input de tags
         */
//        $_tagButton.click(function()
//        {
//            // antes de agregar, desenfoca para activar validación
//            $_tagInput.blur();
//            if (!$_tagInput.parents('.form-group').hasClass('has-error'))
//            {
//                // se obtiene el valor del tag
//                var tagValue = $_tagInput.val();
//                // se construye el html agregando el valor del tag
//                var tagHtml = '<span class="label label-default tag">'
//                        .concat(tagValue.toUpperCase())
//                        .concat('<label class="delete-tag">&times;</label></span>')
//                        .concat(' '); // espacio en blanco para separar tags (importante)
//
//                // agrega el código html al documento
//                $_tags.append(tagHtml);
//                // limpia el campo donde se agrega el tag
//                $_tagInput.val('');
//            }
//        });
        /*
         * Evento que se ejecuta al presionar cualquier tecla
         * y teniendo la ventana modal disponible, permite
         * agregar tags a una lista al presionar la tecla 'enter'
         * o 'intro'.
         */
//        $_modal.keypress(function(e)
//        {
//            // la tecla presionada es "enter"
//            if (e.which === 13)
//            {
//                // el campo de tags está seleccionado
////                if ($_tagInput.is(':focus'))
////                {
////                    // ejecuta el evento click del boton agrega tag
////                    $_tagButton.click();
////                }
//            }
//        });
        /*
         * Evento que permite elimiar un tag agregado
         * al formulario.
         */
//        $_modal.on('click', '.delete-tag', function()
//        {
//            // selecciona y elimina tag con animacion fadeOut
//            $(this).parent().fadeOut('fast');
//        });
        /*
         * Eventos que se ejecutan cuando el modal se carga
         * pero aún no es visible para el usuario
         */
//        $_modal.on('show.bs.modal', function()
//        {
//            // reinicia lo valores del formulario por default
//
//            $_form.get(0).reset();
//            $_form.children().removeAttr('has-error has-success');
//            // remueve la clase .active del menú que lo posea actualmente
//            $_menu.find('label.active').removeClass('active');
//            // coloca la clase .active al primer elemento del menú y llama al evento click
//            $_menu.find('label:first').addClass('active').click();
//            // reinicia el contador de caracteres asignando el valor máximo
//            $_form.find('.char-counter').text(POST_TITLE_MAX_LENGTH);
//            // elimina todos los tags introducidos previamente
//            $_tags.empty();
//            // Configurar las validaciones
//            var $field = null;
//            var $params = {rules: {}, messages: {}};
//            // validaciones de titulo
//            $field = $_postTitle.attr('name');
//            $params['rules'][$field] = {"required": true, "rangelength": [3, 150]};
//            $params['messages'][$field] = {"rangelength": jQuery.validator.format("El título del post debe contener entre {0} y {1} caracteres")};
//            // validaciones de url
//            // $field = $_postURL.attr('name');
//            $params['rules'][$field] = {"required": true};
//            $params['messages'][$field] = {};
//            // validaciones de tags
////            $field = $_tagInput.attr('name');
//            $params['rules'][$field] = {"lettersonly": true};
//            $params['messages'][$field] = {"lettersonly": "Las etiquetas sólo permiten caracteres alfabéticos"};
//            // envia parametros de validación al formulario
//            $_form.validate($params).resetForm();
//        });
    });
</script>