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

                <ul class="list-group">
                    <p class="text-muted">Me gusta</p>                  
                    <li class="list-group-item">
                        <span class="not-readed"></span> 
                        <span class="glyphicon glyphicon-thumbs-up"></span>
                        <a href="#">Erika33</a> le gustó tu post: <a href="#">El pintor mas honesto en la historia de la humanidad</a>
                    </li>                    
                    <li class="list-group-item">                        
                        <span class="glyphicon glyphicon-thumbs-up"></span>
                        <a href="#">Erika33</a> le gustó tu post: <a href="#">Los Vengadores de Spidey</a>
                    </li>                    
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
        var $_ulComentarios
        var $_markAsReadButton;
        /**
         * 
         *     inicia todo el modal carga los div y li necesarios
         
         *
         * 
         * @return 
         *
         */
        function Iniciar() {
            MODAL_PREFIX = 'notifications-';
            CONST_NOT_READ = '<span class="not-readed"></span>';
            CONST_ICON_GLY = '<span class="glyphicon glyphicon-comment"></span>';

            $_modal = $('#' + MODAL_PREFIX + 'modal');
            $_ulComentarios = $('#' + MODAL_PREFIX + 'ul-comment');
            $_markAsReadButton = $('#' + MODAL_PREFIX + 'mark-as-read');
            $_markAsReadButton.click(NotReaded);
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
                    var i;
                    for (i = 0; i < o.Tupla; i++) {
                        if (o.aComment[i]["bSeeByOwner"] == 0) {
                            comment = CONST_NOT_READ +"   "+ CONST_ICON_GLY;
                        } else {
                            comment = "   "+ CONST_ICON_GLY;
                        }
                        comment += ' <a href="' + o.aComment[i]["iIDUser"] + '">' + o.aComment[i]["sNameUser"] + '</a>'
                        comment += " hizo un comentario en tu post: ";
                        comment += ' <a href="' + o.aComment[i]["iIDGalery"] + '">' + o.aComment[i]["sTitleImagen"] + '</a>'
                        $_ulComentarios.append('<li id="notifications-li-comment" class="list-group-item">' + comment + '</li>');
                    }


                }
            }, "json");

        }/* fin de funcion Guardar*/

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
            NotReaded: NotReaded


        }
    }();

    $(function()
    {
        modalNotifications.Iniciar();
 modalNotifications.Cargar();


    });
</script>