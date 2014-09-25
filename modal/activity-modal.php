<!-- ACTIVITY MODAL -->
<style>
    #activity-modal .modal-body, #activity-modal .list-group-item
    {
        overflow: auto;        
    }    
</style>

<div class="modal fade" id="activity-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Actividad · Jaivic Villegas</h4>
            </div>
            <div class="modal-body">

                <div id="activity-options" class="btn-group btn-group-justified" data-toggle="buttons">
                    <label id="activity-posts-option" class="btn btn-default active">
                        <input type="radio" name="options"><span class="glyphicon glyphicon-th-list"></span> Mis posts
                    </label>
                    <label id="activity-likes-option" class="btn btn-default">
                        <input type="radio" name="options"><span class="glyphicon glyphicon-thumbs-up"></span> Posts que me gustan
                    </label>
                    <label id="activity-comments-option" class="btn btn-default">
                        <input type="radio" name="options"><span class="glyphicon glyphicon-comment"></span> Posts que he comentado
                    </label>
                </div><br/>

                <!--ACTIVITY MY POSTS-->
                <div id="activity-posts-content" class="activity-option-content col-md-12">
                    <div class="list-group">
                        <a href="#" class="list-group-item">
                            <div class="col-md-2">
                                <img src="media/default/post3.jpg" width="90" height="90"/>                        
                            </div>
                            <div class="col-md-10">
                                <h3 class="list-group-item-heading">Los Vengadores de Spidey</h3>
                                <p class="list-group-item-text">
                                    <span class="like-counter"><span class="glyphicon glyphicon-thumbs-up"></span> 84 me gusta</span> <b>·</b> 
                                    <span class="comment-counter"><span class="glyphicon glyphicon-comment"></span> 451 comentarios</span>
                                </p>                
                            </div>
                        </a>
                        <a href="#" class="list-group-item">
                            <div class="col-md-2">
                                <img src="media/default/post3.jpg" width="90" height="90"/>                        
                            </div>
                            <div class="col-md-10">
                                <h3 class="list-group-item-heading">Los Vengadores de Spidey</h3>
                                <p class="list-group-item-text">
                                    <span class="like-counter"><span class="glyphicon glyphicon-thumbs-up"></span> 84 me gusta</span> <b>·</b> 
                                    <span class="comment-counter"><span class="glyphicon glyphicon-comment"></span> 451 comentarios</span>
                                </p>                        
                            </div>
                        </a>
                        <a href="#" class="list-group-item">
                            <div class="col-md-2">
                                <img src="media/default/post3.jpg" width="90" height="90"/>                        
                            </div>
                            <div class="col-md-10">
                                <h3 class="list-group-item-heading">Los Vengadores de Spidey</h3>
                                <p class="list-group-item-text">
                                    <span class="like-counter"><span class="glyphicon glyphicon-thumbs-up"></span> 84 me gusta</span> <b>·</b> 
                                    <span class="comment-counter"><span class="glyphicon glyphicon-comment"></span> 451 comentarios</span>
                                </p>                        
                            </div>
                        </a>
                    </div>
                </div>

                <!--ACTIVITY LIKED POSTS-->
                <div id="activity-likes-content" class="activity-option-content col-md-12">
                    <div class="list-group">
                        <a href="#" class="list-group-item">
                            <div class="col-md-2">
                                <img src="media/default/post2.jpg" width="90" height="90"/>                        
                            </div>
                            <div class="col-md-10">
                                <h3 class="list-group-item-heading">El pintor mas honesto en la historia de la humanidad</h3>
                                <p class="list-group-item-text">
                                    <span class="like-counter"><span class="glyphicon glyphicon-thumbs-up"></span> 33 me gusta</span> <b>·</b> 
                                    <span class="comment-counter"><span class="glyphicon glyphicon-comment"></span> 251 comentarios</span>
                                </p>                
                            </div>
                        </a>
                    </div>
                </div>

                <!--ACTIVITY COMMENTED POSTS-->
                <div id="activity-comments-content" class="activity-option-content col-md-12">
                    <div class="list-group">
                        <a href="#" class="list-group-item">
                            <div class="col-md-2">
                                <img src="media/default/post1.jpg" width="90" height="90"/>                        
                            </div>
                            <div class="col-md-10">
                                <h3 class="list-group-item-heading">I must become someone else, I must become something else</h3>
                                <p class="list-group-item-text">                                    
                                    <span class="like-counter"><span class="glyphicon glyphicon-thumbs-up"></span> 93 me gusta</span> <b>·</b> 
                                    <span class="comment-counter"><span class="glyphicon glyphicon-comment"></span> 341 comentarios</span>
                                </p>                
                            </div>
                        </a>
                    </div>
                </div>

            </div>            
        </div>
    </div>
</div>

<script type="text/javascript">
$(function(){

    // Prefijo del modal
    var MODAL_PREFIX = 'activity-';    

    // Variables cacheadas
    var $_modal    = $('#' + MODAL_PREFIX + 'modal');
    var $_menu     = $('#' + MODAL_PREFIX + 'options');    
    var $_contents = $('.' + MODAL_PREFIX + 'option-content');

    /*
     * Evento que se ejecutan al hacer click sobre una opción
     * del menú, selecciona el contenido a mostrar dependiendo
     * de la opción seleccionada.
     */
    $_menu.find('label').click(function()
    {            
        /* 
         * Descripción: 
         * 1- captura el ID de la opción seleccionada.
         * 2- reemplaza el 'option' del ID por 'content'.
         * 3- agrega el signo # al inicio de la cadena.
         */
        var idContent = '#'.concat($(this).attr('id').toString().replace('option', 'content'));
        // oculta todos los contenidos del modal
        $_contents.hide();
        // busca dentro del modal y muestra el contenido escogido
        $_modal.find(idContent).show();            
    });

    /*
     * Eventos que se ejecutan cuando el modal se carga
     * pero aún no es visible para el usuario
     */
    $_modal.on('show.bs.modal', function()
    {                                 
        // remueve la clase .active del menú que lo posea actualmente
        $_menu.find('label.active').removeClass('active');
        // coloca la clase .active al primer elemento del menú y llama al evento click
        $_menu.find('label:first').addClass('active').click();     
    });
});    
</script>