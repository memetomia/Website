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
             $_sBoton = $('#' + MODAL_PREFIX + 'success');
            $_postImage = $('#' + MODAL_PREFIX + 'image');
            $_sTitle.val("");
            $_urlImagen = $('#' + MODAL_PREFIX + 'image-show');
            //$_sBoton.click(Cargar());
            $_VentanaActual = "";
           $('#new-post-success').click(function(){Cargar();});  

        }

        
        function Cargar() {

          
                $.post("ajax/SaveArticleByUser.php", {
                    sTitle: $_sTitle.val(),
                    sUrl: $_DirUrl
                 
                }, function(o) {

                }, "json");
           
        }/* fin de funcion Cargar*/
        function GuardarDir(DirUrl) {
            $_DirUrl= DirUrl;
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
       
    });
</script>