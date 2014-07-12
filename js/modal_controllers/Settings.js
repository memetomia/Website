SettingsController = function()
{
    // elemeto padre modal
    var $_modal;
    // elementos menú de opciones
    var $_menu;
    // elementos de contenedores de contenido
    var $_contents;

    // constructor
    function init(modal, menu, contents)
    {
        $_modal    = modal;
        $_menu     = menu;
        $_contents = contents;
    }
    
    // activa los eventos y los ejecuta          
    function activateEventListeners()
    {   
        /*
         * Evento que resetea el formulario del modal
         * y restaura los valores por defecto al 
         * llamar a la ventana modal.
         */
        $_modal.on('show.bs.modal', function()
        {
            // removemos la clase .active del menú que lo posea actualmente
            $_menu.find('label.active').removeClass('active');
            // colocamos la clase .active al primer elemento del menú y llama al evento click
            $_menu.find('label:first').addClass('active').click();            
        });
        
        /*
         * Evento que modifica el contenido del modal dependiendo
         * de la opción seleccionada.
         */
        $_menu.find('label').click(function()
        {
            /*
             * 1- captura el ID de la opción seleccionada.
             * 2- reemplaza el 'option' del ID por 'content'.
             * 3- agrega el signo # al inicio de la cadena.
             */
            var idContent = '#'.concat($(this).attr('id').toString().replace('option', 'content'));
            // ocultamos todos los contenidos del modal
            $_contents.hide();
            // busca dentro del modal y muestra el contenido escogido
            $_modal.find(idContent).show();            
        });
    }

    // public methods interface
    return {
        init: init,
        activateEventListeners: activateEventListeners
    };
}();