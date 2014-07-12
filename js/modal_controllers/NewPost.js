NewPostController = function()
{
    // constante de la máxima cantidad de caracteres del título del post.
    POST_TITLE_MAX_LENGTH = 150;

    // elemeto padre modal
    var $_modal;
    // elementos menú de opciones
    var $_menu;
    // elemento form del modal
    var $_form;
    // elemento título del post
    var $_postTitle;
    // elemento url post
    var $_postURL;
    // elemento imágen del post
    var $_postImage;
    // elemento input de tags
    var $_tagInput;
    // elemento boton de tags
    var $_tagButton;
    // elemento contenedor de tags agregados
    var $_tags;

    // constructor
    function init(modal, menu, form, postTitle, postURL, postImage, tagInput, tagButton, tags)
    {
        $_modal     = modal;
        $_menu      = menu;
        $_form      = form;
        $_postTitle = postTitle;
        $_postURL   = postURL;
        $_postImage = postImage;
        $_tagInput  = tagInput;
        $_tagButton = tagButton;
        $_tags      = tags;
    }

    /*
     * activa los eventos y los ejecuta     
     */
    function activateEventListeners()
    {
        /*
         * activa el autocompletado de tags para
         * tratar de evitar duplicado de tags. 
         */
        $_tagInput.autocomplete({
            source: "ajax/autocomplete-tags.php",
            delay: 500,
            minLength: 2
        });

        /*
         * Evento que reinicia el formulario del modal
         * y restaura los valores por defecto al 
         * llamar a la ventana modal.
         */
        $_modal.on('show.bs.modal', resetModal);

        /*
         * Evento que modifica el formulario dependiendo
         * del modo seleccionado.
         */
        $_menu.find('label').click(function()
        {
            // obtenemos el id de la opción del menú al que se le dió click
            var selectedMode = $(this).attr('id').toString();
            // ocultamos y mostramos los campos dependiendo de la opción seleccionada
            switch (selectedMode)
            {
                // caso modo URL
                case 'new-post-url-mode':
                    // ocultamos campo de imágen
                    $_postImage.hide();
                    // mostramos campo de URL
                    $_postURL.show();
                    break;
                    // caso modo imágen
                case 'new-post-image-mode':
                    // ocultamos campo URL
                    $_postURL.hide();
                    // mostramos campo de imágen
                    $_postImage.show();
                    break;
            }
        });

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
        $_tagButton.click(function()
        {
            addTag($_tagInput.val(), $_tags);
            $_tagInput.val('');
        });

        /*
         * Evento que se ejecuta al presionar cualquier tecla
         * y teniendo la ventana modal disponible, permite
         * agregar tags a una lista al presionar la tecla 'enter'
         * o 'intro'.
         */
        $_modal.keypress(function(e)
        {
            // la tecla presionada es "enter"
            if (e.which === 13)
            {
                // el campo de tags está seleccionado
                if ($_tagInput.is(':focus'))
                {
                    // llamada a funcion agregar tag.
                    addTag($_tagInput.val(), $_tags);
                    // limpia el campo donde se agrega el tag
                    $_tagInput.val('');
                }
            }
        });

        /*
         * Evento que permite elimiar un tag agregado
         * al formulario.
         */
        $_modal.on('click', '.delete-tag', function()
        {
            // selecciona y elimina tag con animacion fadeOut
            $(this).parent().fadeOut('fast');
        });
    }

    /*
     * HELPER METHODS
     * 
     * métodos no públicos
     */

    /*
     * permite resetear los elementos del modal por default
     */
    function resetModal()
    {
        // reinicia lo valores del formulario por default
        $_form.get(0).reset();
        // remueve la clase .active del menú que lo posea actualmente
        $_menu.find('label.active').removeClass('active');
        // coloca la clase .active al primer elemento del menú y llama al evento click
        $_menu.find('label:first').addClass('active').click();
        // reinicia el contador de caracteres asignando el valor máximo
        $_form.find('.char-counter').text(POST_TITLE_MAX_LENGTH);
        // elimina todos los tags introducidos previamente
        $_tags.empty();
    }

    /*
     * Permite crear un tag en un div. 
     * @param sValue valor del tag
     * @param $destination donde se van a almacenar
     */
    function addTag(sValue, $destination)
    {
        // se construye el html agregando el valor del tag
        var tagHtml = '<span class="label label-default tag">'
                .concat(sValue.toUpperCase())
                .concat('<label class="delete-tag">&times;</label></span>')
                .concat(' '); // espacio en blanco para separar tags (importante)

        // agrega el código html al documento
        $destination.append(tagHtml);
    }

    // public methods interface
    return {
        init: init,
        activateEventListeners: activateEventListeners
    };
}();




