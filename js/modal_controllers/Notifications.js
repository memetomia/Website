NotificationsController = function()
{
    // elemeto padre modal
    var $_modal;    

    // elemento boton marcar como leído
    var $_markAsReadButton

    // constructor
    function init(modal, markAsReadButton)
    {
        $_modal            = modal;        
        $_markAsReadButton = markAsReadButton;
    }
    
    // activa los eventos y los ejecuta          
    function activateEventListeners()
    {
        /*
         * Evento que ejecuta código al cargar el modal
         */
        $_modal.on('show.bs.modal', function()
        {
            //llamadas a ajax
        });
        
        /**
         * Evento que marca como leído todas las 
         * notificaciones pendientes
         */
        $_markAsReadButton.click(function(){

            // llamadas a ajax y BD
            
            // eliminar marca roja de notificaciones no leidas
            $_modal.find('span.not-readed').remove();

            // falta eliminar puntos rojos fuera del modal
            // ocultar contador de notificaciones sin leer
            // mensaje de "no tienes notificaciones nuevas" en el nav
        });
    }

    // public methods interface
    return {
        init: init,
        activateEventListeners: activateEventListeners
    };
}();