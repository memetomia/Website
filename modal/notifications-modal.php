<!-- NOTIFICATIONS MODAL -->
<style></style>

<div id="notifications-modal" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Notificaciones</h4>
            </div>
            <div class="modal-body">

                <button id="notifications-mark-as-read" class="pull-right btn btn-xs btn-default">Marcar todo como leído</button>                                  

                <ul id="notifications-ul-comment" class="list-group">                      


                </ul>    

                <ul id="notifications-ul-like" class="list-group">
<!--                    <p class="text-muted">Me gusta</p>                  
                    <li class="list-group-item">
                        <span class="not-readed"></span> 
                        <span class="glyphicon glyphicon-thumbs-up"></span>
                        <a href="#">Erika33</a> le gustó tu post: <a href="#">El pintor mas honesto en la historia de la humanidad</a>
                    </li>                    
                    <li class="list-group-item">                        
                        <span class="glyphicon glyphicon-thumbs-up"></span>
                        <a href="#">Erika33</a> le gustó tu post: <a href="#">Los Vengadores de Spidey</a>
                    </li>                    -->
                </ul>        

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
    modalNotifications = function() {
        // Prefijo del modal
        var MODAL_PREFIX;
        var CONST_NOT_READ;
        var CONST_ICON_GLY;

        // Variables cacheadas
        var $_modal;
        var $_ulComentarios;
        var $_ulLike;
        var $_ulMenuDrop;
        var $_markAsReadButton;
        var $_iNNotify;
        /**
         * 
         *     inicia todo el modal carga los div y li necesarios
         
         *
         * 
         * @return 
         *  
         <li><a href="#"><span class="not-readed"></span> <span class="glyphicon glyphicon-thumbs-up"></span> A Erika33 le gustó tu post</a></li>                                
         
         */
        function Iniciar() {
            MODAL_PREFIX = 'notifications-';
            CONST_NOT_READ = '<span class="not-readed"></span>';
            CONST_ICON_GLY = '<span class="glyphicon glyphicon-comment"></span>';
            $_ulMenuDrop = $("#MenuDropNotify");
            $_modal = $('#' + MODAL_PREFIX + 'modal');
            $_ulComentarios = $('#' + MODAL_PREFIX + 'ul-comment');
            $_ulLike = $('#' + MODAL_PREFIX + 'ul-like');
            $_markAsReadButton = $('#' + MODAL_PREFIX + 'mark-as-read');
            $_markAsReadButton.click(NotReaded);
            $_iNNotify = 0;
        }

        /**
         
         
         *
         * Carga las notificacioens de comentarios en el menu 
         */
        function Cargar() {
            $.post("ajax/NotificationsComment.php", function(o) {
                if (o.Tupla > 0) {
                    $_ulComentarios.html("");
                    $_ulComentarios.append('<p class="text-muted">Comentarios</p>');
                    var comment = "";
                    var notify = "";
                    var i;
                    $_iNNotify = o.Tupla;
                    for (i = 0; i < o.Tupla; i++) {
                        if (o.aComment[i]["bSeeByOwner"] == 0) {
                            comment = CONST_NOT_READ + "   " + CONST_ICON_GLY;

                        } else {
                            comment = "   " + CONST_ICON_GLY;
                        }
                        comment += ' <a href="' + o.aComment[i]["iIDUser"] + '">' + o.aComment[i]["sNameUser"] + '</a>'
                        comment += " hizo un comentario en tu post: ";
                        comment += ' <a href="' + o.aComment[i]["iIDGalery"] + '">' + o.aComment[i]["sTitleImagen"] + '</a>'
                        if ((i < 3) && (o.aComment[i]["bSeeByOwner"] == 0)) {
                            notify += '<li><a href="' + o.aComment[i]["iIDGalery"] + '">' + CONST_NOT_READ + "   " + CONST_ICON_GLY + " " + o.aComment[i]["sNameUser"] + ' comentó en tu post</a></li>                                '
                        }
                        $_ulComentarios.append('<li id="notifications-li-comment" class="list-group-item">' + comment + '</li>');
                    }
                    $_ulMenuDrop.append(notify);


                }
            }, "json");
            $.post("ajax/LikeComment.php", function(o) {
                if (o.Tupla > 0) {
                    $_ulLike.html("");
                    $_ulLike.append('<p class="text-muted">Me Gusta</p>');
                    var comment = "";
                    var notify = "";
                    var i;
                    $_iNNotify = $_iNNotify + o.Tupla;
                    for (i = 0; i < o.Tupla; i++) {
                        if (o.aComment[i]["bSeeByOwner"] == 0) {
                            comment = CONST_NOT_READ + "   " + CONST_ICON_GLY;
                        } else {
                            comment = "   " + CONST_ICON_GLY;
                        }
                        comment += ' <a href="' + o.aComment[i]["iIDUser"] + '">' + o.aComment[i]["sNameUser"] + '</a>';
                        comment += " le gustó tu post: ";
                        comment += ' <a href="' + o.aComment[i]["iIDGalery"] + '">' + o.aComment[i]["sTitleImagen"] + '</a>';
                        if ((i < 3) && (o.aComment[i]["bSeeByOwner"] == 0)) {
                            notify += '<li><a href="' + o.aComment[i]["iIDGalery"] + '">' + CONST_NOT_READ + "   " + CONST_ICON_GLY + " A " + o.aComment[i]["sNameUser"] + ' le gustó tu post</a></li>                                '
                        }
                        $_ulLike.append('<li id="notifications-li-comment" class="list-group-item">' + comment + '</li>');
                        $_ulMenuDrop.append(notify);
                        showNumberNotify();
                    }
                }
            }, "json");
        }/* fin de funcion Guardar*/
        function showNumberNotify() {
            if ($_iNNotify > 0) {
                $("#spanTitleNotify").html('<span class = "glyphicon glyphicon-bell"> </span> Notificaciones <span  class="label label-danger">' + $_iNNotify + '</span >');

            } else {
               $("#spanTitleNotify").html('<span class = "glyphicon glyphicon-bell"> </span> Notificaciones <span  class="label label-danger">' + $_iNNotify + '</span >');


            }

        }
        /**
         * Evento que marca como leído todas las 
         * notificaciones pendientes
         */
        function NotReaded() {

            // llamadas a ajax y BD

            // eliminar marca roja de notificaciones no leidas
            $_modal.find('span.not-readed').remove();

            // falta eliminar puntos rojos fuera del modal
            // ocultar contador de notificaciones sin leer
            // mensaje de "no tienes notificaciones nuevas" en el nav
        }/* fin de funcion MensajeExito*/

        return {
            Iniciar: Iniciar,
            Cargar: Cargar,
            NotReaded: NotReaded,
            showNumberNotify: showNumberNotify


        }
    }();

    $(function()
    {
        modalNotifications.Iniciar();
        modalNotifications.Cargar();
      

    });
</script>