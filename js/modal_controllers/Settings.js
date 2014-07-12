SettingsController = function()
{
    // constante de la máxima cantidad de caracteres de la descripcion del usuario.
    USER_DESCRIPTION_MAX_LENGTH = 180;

    // elemeto padre modal
    var $_modal;
    // elementos menú de opciones
    var $_menu;
    // elementos de contenedores de contenido
    var $_contents;

    /* PERFIL */
    // formulario de perfil
    var $_profileForm
    // elemento textarea de descripcion de usuario
    var $_userDescription

    // constructor
    function init(modal, menu, contents, profileForm, userDescription)
    {
        $_modal    = modal;
        $_menu     = menu;
        $_contents = contents;

        /* PERFIL */
        $_profileForm = profileForm;
        $_userDescription = userDescription;
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

        /*
         * Evento que realiza el conteo de caracteres
         * del titulo y valida cuando sobrepasa el limite.
         */
        $_userDescription.on('keyup change blur', function()
        {
            // calcula los caracteres restantes
            var remainingChars = USER_DESCRIPTION_MAX_LENGTH - $(this).val().length;
            // cacheamos campo que muestra caracteres restantes
            var $charCounter = $_profileForm.find('.char-counter');
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
    }

    // public methods interface
    return {
        init: init,
        activateEventListeners: activateEventListeners
    };
}();