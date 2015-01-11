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
                <h4 class="modal-title" id="myModalLabel">Actividad</h4>
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



                    </div>
                </div>

                <!--ACTIVITY LIKED POSTS-->
                <div id="activity-likes-content" class="activity-option-content col-md-12">
                    <div class="list-group">
                        <a href="#" class="list-group-item">
                            <div class="col-md-2">
                                <img src="" width="90" height="90"/>                        
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
                                <img src="" width="90" height="90"/>                        
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

    /*
     TODO obj memetomia-notificaciones para mostrar las notificaciones en el menu  
     */

    /**
     * Clase carga las notificaciones de comentarios y megustas de menu notificaciones
     * 
     * @author jaivic villegas
     * @copyright 10-octubre-2012, 
     * @version 1
     * @access public
     */
    modalActivity = function() {
        // Prefijo del modal
        var MODAL_PREFIX;
        var CONST_A_INI;
        var CONST_TITLE;
        var CONST_LIKE;
        var CONST_COMMENT;
        // Variables cacheadas
        var $_modal;
        var $_Comment;
        var $_Post;
        var $_Like;
        var imagen;
        var titulo;
        var like;
        var comment;
        /**
         * 
         *     
         CONST_A_INI='<a href="#" class="list-group-item"><div class="col-md-2"><img width="90" height="90" src="'+imagen+'" />';
         CONST_TITLE='</div><div class="col-md-10"><h3 class="list-group-item-heading">'+titulo+'</h3>';
         CONST_LIKE='<p class="list-group-item-text"><span class="like-counter"><span class="glyphicon glyphicon-thumbs-up"></span>'+like+'</span><b></b>';
         CONST_COMMENT='<span class="comment-counter"><span class="glyphicon glyphicon-comment"></span>'+comment+'</span></p></div></a>'
         * 
         
         
         
         * 
         * @return 
         *  
         <li><a href="#"><span class="not-readed"></span> <span class="glyphicon glyphicon-thumbs-up"></span> A Erika33 le gustó tu post</a></li>                                
         
         */
        function Iniciar() {
            MODAL_PREFIX = 'activity-';
            $_modal = $("#" + MODAL_PREFIX + 'modal');
            $_Comment = $("#" + MODAL_PREFIX + 'comments-content');
            $_Post = $("#" + MODAL_PREFIX + 'posts-content');
            $_Like = $("#" + MODAL_PREFIX + 'likes-content');
            $_Comment.html("");
            $_Post.html("");
            $_Like.html("");
        }

        /**         
         *
         * Carga las notificacioens de comentarios en el menu 
         */
        function CargarPost() {

            $.post("ajax/GetActivity.php", function(o) {
                var i = 0;
                for (; i < o.Tupla; i++)
                {
                    titulo = o.aActivity[i]["sTitle"];
                    if (o.aActivity[i]["NMore"] > 1) {
                        like = o.aActivity[i]["NMore"] + " me gustas";
                    }
                    else {
                        like = o.aActivity[i]["NMore"] + " me gusta";
                    }
                    if (o.aActivity[i]["NComment"] > 1) {
                        comment = o.aActivity[i]["NComment"] + " Comentarios";
                    } else {
                        comment = o.aActivity[i]["NComment"] + " Comentario";
                    }
                    imagen = o.aActivity[i]["Surl"];
                    CONST_A_INI = '<a href="#" class="list-group-item"><div class="col-md-2"><img width="90" height="90" src="' + imagen + '" />';
                    CONST_TITLE = '</div><div class="col-md-10"><h3 class="list-group-item-heading">' + titulo + '</h3>';
                    CONST_LIKE = '<p class="list-group-item-text"><span class="like-counter"><span class="glyphicon glyphicon-thumbs-up"></span>' + like + '</span><b></b>';
                    CONST_COMMENT = '<span class="comment-counter"><span class="glyphicon glyphicon-comment"></span>' + comment + '</span></p></div></a>';
                    $_Post.append('<div class="list-group">' + CONST_A_INI + CONST_TITLE + CONST_LIKE + CONST_COMMENT + '</div>');
                }


            }, "json");
        }/* fin de funcion Cargar*/

        function CargarLike() {

            $.post("ajax/GetActivityLike.php", function(o) {
                var i = 0;
                for (; i < o.Tupla; i++)
                {
                    titulo = o.aActivity[i]["sTitle"];
                    if (o.aActivity[i]["NMore"] > 1) {
                        like = o.aActivity[i]["NMore"] + " me gustas";
                    }
                    else {
                        like = o.aActivity[i]["NMore"] + " me gusta";
                    }
                    if (o.aActivity[i]["NComment"] > 1) {
                        comment = o.aActivity[i]["NComment"] + " Comentarios";
                    } else {
                        comment = o.aActivity[i]["NComment"] + " Comentario";
                    }
                    imagen = o.aActivity[i]["Surl"];
                    CONST_A_INI = '<a href="#" class="list-group-item"><div class="col-md-2"><img width="90" height="90" src="' + imagen + '" />';
                    CONST_TITLE = '</div><div class="col-md-10"><h3 class="list-group-item-heading">' + titulo + '</h3>';
                    CONST_LIKE = '<p class="list-group-item-text"><span class="like-counter"><span class="glyphicon glyphicon-thumbs-up"></span>' + like + '</span><b></b>';
                    CONST_COMMENT = '<span class="comment-counter"><span class="glyphicon glyphicon-comment"></span>' + comment + '</span></p></div></a>';
                    $_Like.append('<div class="list-group">' + CONST_A_INI + CONST_TITLE + CONST_LIKE + CONST_COMMENT + '</div>');
                }


            }, "json");
        }
        /* fin de funcion Cargar*/

        function CargarComment() {

            $.post("ajax/GetActivityComment.php", function(o) {
                var i = 0;
                for (; i < o.Tupla; i++)
                {
                    titulo = o.aActivity[i]["sTitle"];
                    if (o.aActivity[i]["NMore"] > 1) {
                        like = o.aActivity[i]["NMore"] + " me gustas";
                    }
                    else {
                        like = o.aActivity[i]["NMore"] + " me gusta";
                    }
                    if (o.aActivity[i]["NComment"] > 1) {
                        comment = o.aActivity[i]["NComment"] + " Comentarios";
                    } else {
                        comment = o.aActivity[i]["NComment"] + " Comentario";
                    }
                    imagen = o.aActivity[i]["Surl"];
                    CONST_A_INI = '<a href="#" class="list-group-item"><div class="col-md-2"><img width="90" height="90" src="' + imagen + '" />';
                    CONST_TITLE = '</div><div class="col-md-10"><h3 class="list-group-item-heading">' + titulo + '</h3>';
                    CONST_LIKE = '<p class="list-group-item-text"><span class="like-counter"><span class="glyphicon glyphicon-thumbs-up"></span>' + like + '</span><b></b>';
                    CONST_COMMENT = '<span class="comment-counter"><span class="glyphicon glyphicon-comment"></span>' + comment + '</span></p></div></a>';
                    $_Comment.append('<div class="list-group">' + CONST_A_INI + CONST_TITLE + CONST_LIKE + CONST_COMMENT + '</div>');
                }


            }, "json");
        }/* fin de funcion Cargar*/
        return {
            Iniciar: Iniciar,
            CargarPost: CargarPost,
            CargarLike: CargarLike,
            CargarComment: CargarComment
        }
    }();
    $(function()
    {
        modalActivity.Iniciar();
        modalActivity.CargarPost();
        modalActivity.CargarLike();
        modalActivity.CargarComment();
        
    });
    $(function() {

        // Prefijo del modal
        var MODAL_PREFIX = 'activity-';
        // Variables cacheadas
        var $_modal = $('#' + MODAL_PREFIX + 'modal');
        var $_menu = $('#' + MODAL_PREFIX + 'options');
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
            //   alert($(this).attr('id').toString());
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