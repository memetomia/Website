<!-- SETTINGS MODAL -->
<style>
    #settings-modal .modal-body
    {
        overflow: auto;
    }
    #settings-modal .settings-birthdate
    {
        text-align: center;
    }
    #settings-modal textarea
    {
        resize: none;
    }
    #settings-modal img
    {
        cursor: pointer;
    }
</style>

<div class="modal fade" id="settings-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Ajustes</h4>
            </div>
            <div class="modal-body">

                <!-- MENU -->
                <div id="settings-options" class="btn-group btn-group-justified" data-toggle="buttons">
                    <label id="settings-account-option" class="btn btn-default active">
                        <input type="radio" name="options"><span class="glyphicon glyphicon-cog"></span> Cuenta
                    </label>
                    <label id="settings-new-password-option" class="btn btn-default">
                        <input type="radio" name="options"><span class="glyphicon glyphicon-asterisk"></span> Contraseña
                    </label>
                    <label id="settings-profile-option" class="btn btn-default">
                        <input type="radio" name="options"><span class="glyphicon glyphicon-user"></span> Perfil
                    </label>
                    <label id="settings-notifications-option" class="btn btn-default">
                        <input type="radio" name="options"><span class="glyphicon glyphicon-bell"></span> Notificaciones
                    </label>
                </div><br/>

                <!-- CUENTA -->
                <div id="settings-account-content" class="settings-option-content col-md-12">
                    <form id="settings-account-form" role="form">
                        <div class="form-group">
                            <label for="settings-username">Nombre de usuario</label>
                            <input type="text" name="username" class="form-control" id="settings-username" placeholder="Nombre de usuario"/>
                        </div>
                        <div class="form-group">
                            <label for="settings-email">Correo electrónico</label>
                            <input type="email" name="email" class="form-control" id="settings-email" placeholder="Correo electrónico"/>
                        </div>

                        <p class="help-block">Mostrar en mi timeline: </p>
                        <div class="well well-sm">
                            <div class="row">
                                <div class="col-md-6 text-right">
                                    <label for="settings-videos">Videos</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="checkbox" checked="checked" id="settings-videos" class="settings-switch"/>
                                </div>
                            </div></br>
                            <div class="row">
                                <div class="col-md-6 text-right">
                                    <label for="settings-gif">Imágenes GIF</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="checkbox" checked="checked" id="settings-gif" class="settings-switch"/>
                                </div>
                            </div>
                        </div></br>
                        <div class="row">
                            <div class="col-md-6">
                                <small><a href="#">Eliminar mi cuenta</a></small>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success pull-right">Guardar Cambios</button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- PASSWORD -->
                <div id="settings-new-password-content" class="settings-option-content col-md-12">
                    <form id="settings-new-password-form" role="form">
                        <div class="form-group">
                            <label for="settings-old-password">Contraseña actual</label>
                            <input type="password" name="oldpassword" class="form-control" id="settings-old-password" placeholder="Ingresa contraseña actual"/>
                        </div>
                        <div class="form-group">
                            <label for="settings-new-password">Contraseña nueva</label>
                            <input type="password" name="newpassword" class="form-control" id="settings-new-password" placeholder="Ingresa contraseña nueva"/>
                        </div>
                        <div class="form-group">
                            <label for="settings-new-password-again">Reingresa contraseña nueva</label>
                            <input type="password" name="confirmpassword" class="form-control" id="settings-confirm-password" placeholder="Reingresa contraseña nueva"/>
                        </div></br>
                        <button type="submit" class="btn btn-success pull-right">Guardar Cambios</button>
                    </form>
                </div>

                <!-- PERFIL -->
                <div id="settings-profile-content" class="settings-option-content col-md-12">
                    <form id="settings-profile-form" role="form">
                        <div class="form-group">
                            <label for="settings-picture">Imágen de perfil</label>
                            <div class="well well-sm text-center">
                                <label for="settings-picture"><img src="media/example_img/post1.jpg" alt="user_pic" class="img-thumbnail" width="128" height="128"></label>
                                <input type="file" class="form-control hidden" id="settings-picture" accept="image/jpeg, image/png">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="settings-name">Nombre</label>
                            <input type="text" class="form-control" name="fullname" id="settings-name" placeholder="Ingresa tu nombre" maxlength="70"/>
                        </div>

                        <div class="form-group">
                            <label>Género</label>
                            <div id="settings-gender-options" class="btn-group btn-group-justified" data-toggle="buttons">
                                <label id="settings-gender-unespecific-option" class="btn btn-default active">
                                    <input type="radio" name="-gender-options">No especificado
                                </label>
                                <label id="settings-gender-male-option" class="btn btn-default">
                                    <input type="radio" name="-gender-options">Hombre
                                </label>
                                <label id="settings-gender-female-option" class="btn btn-default">
                                    <input type="radio" name="-gender-options">Mujer
                                </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="settings-day">Día</label>
                                <select id="settings-day" class="form-control" name="day">
                                    <?php
                                        for ($i=1; $i <= 31; $i++) 
                                        {
                                            if ($i < 10) 
                                            {
                                                echo '<option value="0'.$i.'">0'.$i.'</option>';    
                                            }
                                            else
                                            {
                                                echo '<option value="'.$i.'">'.$i.'</option>';    
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="settings-month">Mes</label>
                                <select id="settings-month" class="form-control" name="month">
                                    <option value="01">Enero</option>
                                    <option value="02">Febrero</option>
                                    <option value="03">Marzo</option>
                                    <option value="04">Abril</option>
                                    <option value="05">Mayo</option>
                                    <option value="06">Junio</option>
                                    <option value="07">Julio</option>
                                    <option value="08">Agosto</option>
                                    <option value="09">Septiembre</option>
                                    <option value="10">Octubre</option>
                                    <option value="11">Noviembre</option>
                                    <option value="12">Diciembre</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="settings-year">Año</label>
                                <select id="settings-year" class="form-control" name="year">
                                    <?php
                                        $currentYear = date("Y");
                                        $yearsRange = range($currentYear, ($currentYear-100));
                                        foreach ($yearsRange as $year) 
                                        {
                                            echo '<option value="'.$year.'">'.$year.'</option>';
                                        }                                        
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="settings-country">País</label>
                            <select id="settings-country" class="form-control">
                                <?php include_once 'frame/Countries.php' ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="settings-about-me">Acerca de ti</label><span class="pull-right char-counter text-muted">180</span>
                            <textarea class="form-control" name="aboutme" id="settings-about-me" placeholder="Ingresa una descripción"></textarea>
                        </div>

                        </br><button type="submit" class="btn btn-success pull-right">Guardar Cambios</button>
                    </form>
                </div>

                <!-- NOTIFICACIONES -->
                <div id="settings-notifications-content" class="settings-option-content col-md-12">
                    <form id="settings-notifications-form" role="form">
                        <p class="help-block">Notificarme cuando: </p>
                        <div class="well well-sm">
                            <div class="row">
                                <div class="col-md-6 text-right">
                                    <label for="settings-like-notification">Den "me gusta" a un post mio</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="checkbox" checked="checked" id="settings-like-notification" class="settings-switch"/>
                                </div>
                            </div></br>

                            <div class="row">
                                <div class="col-md-6 text-right">
                                    <label for="settings-comment-notification">Comenten en un post mio</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="checkbox" checked="checked" id="settings-comment-notification" class="settings-switch"/>
                                </div>
                            </div>
                        </div><br/>
                        <button type="submit" class="btn btn-success pull-right">Guardar Cambios</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


<script type="text/javascript">
$(function()
{
    // Prefijo del modal
    var MODAL_PREFIX = 'settings-';

    // constante de la máxima cantidad de caracteres de la descripcion del usuario.
    const USER_DESCRIPTION_MAX_LENGTH = 180;

    // Variables cacheadas
    var $_modal    = $('#' + MODAL_PREFIX + 'modal');
    var $_menu     = $('#' + MODAL_PREFIX + 'options');
    var $_contents = $('.' + MODAL_PREFIX + 'option-content');

    /* CUENTA */
    var $_accountForm   = $('#' + MODAL_PREFIX + 'account-form');
    var $_usernameField = $('#' + MODAL_PREFIX + 'username');
    var $_emailField    = $('#' + MODAL_PREFIX + 'email');

    /* CONTRASEÑA */
    var $_newPasswordForm      = $('#' + MODAL_PREFIX + 'new-password-form');
    var $_oldPasswordField     = $('#' + MODAL_PREFIX + 'old-password');
    var $_newPasswordField     = $('#' + MODAL_PREFIX + 'new-password');
    var $_confirmPasswordField = $('#' + MODAL_PREFIX + 'confirm-password');

    /* PERFIL */
    var $_profileForm     = $('#' + MODAL_PREFIX + 'profile-form');
    var $_userDescription = $('#' + MODAL_PREFIX + 'about-me');
    var $_genderOptions   = $('#' + MODAL_PREFIX + 'gender-options');
    var $_nameField       = $('#' + MODAL_PREFIX + 'name');    

    /* NOTIFICACIONES */
    var $_notificationsForm = $('#' + MODAL_PREFIX + 'notifications-form');

    /*
     * Evento que inicializa la funcionalidad de
     * la libreria bootstrap-switch
     */
    $(".settings-switch").bootstrapSwitch();

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
     * Eventos que se ejecutan cuando el modal se carga
     * pero aún no es visible para el usuario
     */
    $_modal.on('show.bs.modal', function()
    {
        // removemos la clase .active del genero que lo posea actualmente
        $_genderOptions.find('label.active').removeClass('active');
        // colocamos la clase .active al primer elemento del menú y llama al evento click
        $_genderOptions.find('label:first').addClass('active').click();

        // removemos la clase .active del menú que lo posea actualmente
        $_menu.find('label.active').removeClass('active');
        // colocamos la clase .active al primer elemento del menú y llama al evento click
        $_menu.find('label:first').addClass('active').click();        

        // Configurar las validaciones
        var $field = null;
        var $params = {rules:{}, messages:{}};

        /* VALIDACIONES DE PESTAÑA: CUENTA */

        // validando username
        $field = $_usernameField.attr('name');
        $params['rules'][$field] = {"required":true, "rangelength":[3,10]};
        $params['messages'][$field] = {"rangelength": jQuery.validator.format("El nombre de usuario debe contener entre {0} y {1} caracteres")};

        // validando correo
        $field = $_emailField.attr('name');
        $params['rules'][$field] = {"required":true, "maxlength": 50};
        $params['messages'][$field] = {"maxlength": jQuery.validator.format("El correo no puede sobrepasar los {0} caracteres")};

        // envia parametros de validación al formulario
        $_accountForm.validate($params).resetForm();

        /* VALIDACIONES DE PESTAÑA: PASSWORD */

        // validando old password
        $field = $_oldPasswordField.attr('name');        
        $params['rules'][$field] = {"required":true, "passwordcheck": true};
        $params['messages'][$field] = {"minlength": jQuery.validator.format("La contraseña debe contener el menos 6 caracteres")};

        // validando new password
        $field = $_newPasswordField.attr('name');        
        $params['rules'][$field] = {"required":true, "passwordcheck": true, "notequal": $_oldPasswordField};
        $params['messages'][$field] = {"minlength": jQuery.validator.format("La contraseña debe contener el menos 6 caracteres"),
                                       "notequal": "La nueva contraseña no puede ser igual a la anterior"};
        // validando confirm password
        $field = $_confirmPasswordField.attr('name');        
        $params['rules'][$field] = {"required":true, "equalTo": $_newPasswordField};
        $params['messages'][$field] = {"equalTo": "Las contraseñas no coinciden"};        

        // envia parametros de validación al formulario
        $_newPasswordForm.validate($params).resetForm();

        /* VALIDACIONES DE PESTAÑA: PERFIL */

        // validando nombre
        $field = $_nameField.attr('name');        
        $params['rules'][$field] = {"rangelength":[3,70], "lettersonly": true};
        $params['messages'][$field] = {"rangelength": jQuery.validator.format("El nombre debe contener entre {0} y {1} caracteres"),
                                       "lettersonly": "El nombre sólo puede poseer caracteres alfabéticos"};

        // envia parametros de validación al formulario
        $_profileForm.validate($params).resetForm();        
    });

    /*
     * Eventos que se ejecutan cuando el modal se carga
     * pero aún no es visible para el usuario
     */
    $_modal.on('hidden.bs.modal', function()
    {
        // reseteando los formularios
        $_accountForm.get(0).reset();        
        $_accountForm.children().removeClass('has-error has-success');

        $_newPasswordForm.get(0).reset();        
        $_newPasswordForm.children().removeClass('has-error has-success');

        $_profileForm.get(0).reset();        
        $_profileForm.children().removeClass('has-error has-success');

        $_notificationsForm.get(0).reset();                        
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
});
</script>