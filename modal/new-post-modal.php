<!-- NEW POST MODAL LOCAL STYLE -->
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
                    <label id="new-post-url-mode" class="btn btn-default active">
                        <input type="radio" name="options"><span class="glyphicon glyphicon-globe"></span> Cargar desde URL
                    </label>
                    <label id="new-post-image-mode" class="btn btn-default">
                        <input type="radio" name="options"><span class="glyphicon glyphicon-picture"></span> Subir imágen
                    </label>
                </div><br/>

                <form id="new-post-form" role="form">
                    <div class="form-group">
                        <label for="new-post-title">Título</label><span class="pull-right char-counter text-muted">150</span>
                        <textarea class="form-control" id="new-post-title" placeholder="Ingresa título"></textarea>
                    </div>
                    <div id="new-post-url-field" class="form-group">
                        <label for="new-post-url">URL</label>
                        <input type="url" class="form-control" id="new-post-url" placeholder="http://">
                        <p class="help-block">Pueden colocarse URL de youtube</p>
                    </div>
                    <div id="new-post-image-field" class="form-group">
                        <label for="new-post-img">Cargar imágen</label>
                        <input type="file" id="new-post-img" accept="image/*">
                        <p class="help-block">Formatos: JPG / GIF / PNG máx: 4 mb</p>
                    </div>
                    <div id="new-post-tags-search-field" class="form-group">
                        <label for="new-post-tags-search">Etiquetas</label>                        
                        <div class="input-group">
                            <input type="text" class="form-control" id="new-post-tags-search" placeholder="Ingresa etiquetas">
                            <span class="input-group-btn">
                                <button id="new-post-add-tag" class="btn btn-default" type="button">
                                    <span class="gylphicon glyphicon-plus"></span>
                                </button>
                            </span>
                        </div>
                        <p class="help-block">Presiona 'enter' para agregar</p>
                    </div>

                    <div id="new-post-tags-field" class="form-group"></div>
                </form>
            </div>
            <div class="modal-footer">                        
                <button type="button" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-upload"></span> Publicar</button>
            </div>
        </div>
    </div>
</div>

<!-- NEW POST MODAL LOCAL JAVASCRIPT -->
<script type="text/javascript">
    // documento preparado
    $(function()
    {        
        /*
         * los eventos y funciones de este modal son capturados
         * y manejados por un objeto controlador el cual inicia
         * recibe parametros de control y ejecuta los eventos.
         */

        
        // asignación de los elementos de control
        NewPostController.init(
                $('#new-post-modal'),
                $('#new-post-mode'),
                $('#new-post-form'),
                $('#new-post-title'),
                $('#new-post-url-field'),
                $('#new-post-image-field'),
                $('#new-post-tags-search'),
                $('#new-post-add-tag'),
                $('#new-post-tags-field'));        

        // activa captador de eventos 
        NewPostController.activateEventListeners();
    });
</script>