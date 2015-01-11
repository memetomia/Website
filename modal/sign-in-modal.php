<!-- SIGN IN MODAL -->
<style></style>

<div class="modal fade" id="sign-in-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Registro de usuario</h4>
            </div>
            <div class="modal-body">                        
                <div class="row">

                    <div class="col-md-6">
                        <p class="text-muted">Regístrate a través de una red social</p><br/>
                        <button id="sign-in-facebook" class="btn btn-lg btn-primary btn-block">Iniciar sesión con Facebook</button>        
                    </div>

                    <div class="col-md-6">
                        <p class="text-muted">Regístrate a través de tu correo electrónico</p><br/>
<!--                        <span id="sign-in-username-error" class="help-block" style="display: none;">Este campo es requerido</span>-->
                        <form id="sign-in-form" role="form">
                            <div class="form-group">
                                <label class="control-label" for="sign-in-username">Nombre de usuario</label>
                                <input type="text" name="username" class="form-control" id="sign-in-username" placeholder="Ingresa nombre de usuario">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="sign-in-email">Correo eletrónico</label>
                                <input type="email" name="email" class="form-control" id="sign-in-email" placeholder="Ingresa tu correo eletrónico">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="sign-in-password">Contraseña</label>
                                <input type="password" name="password" class="form-control" id="sign-in-password" placeholder="Ingresa una contraseña">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="sign-in-re-password">Repite la Contraseña</label>
                                <input type="password" name="confirmpassword" class="form-control" id="sign-in-confirm-password" placeholder="Ingresa nuevamente tu contraseña">
                            </div>
                            <span id="sign-in-total-Mensaje" class="help-block" style="display: none;">Este campo es requerido</span>
                            <div class="text-right">

                                <button id="sign-in-Registrar" type="button" class="btn btn-success">Registrarme</button>    
                            </div>                                                                                  
                        </form>
                    </div>
                </div>                        
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    // Prefijo del modal
    var MODAL_PREFIX = 'sign-in-';

    // Variables cacheadas
    var $_modal = $('#' + MODAL_PREFIX + 'modal');
    var $_form = $('#' + MODAL_PREFIX + 'form');
    var $_username = $('#' + MODAL_PREFIX + 'username');
    var $_email = $('#' + MODAL_PREFIX + 'email');
    var $_password = $('#' + MODAL_PREFIX + 'password');
    var $_confirmPassword = $('#' + MODAL_PREFIX + 'confirm-password');
    var $_registrar = $('#' + MODAL_PREFIX + 'Registrar');
    var $_registrarFB = $('#' + MODAL_PREFIX + 'facebook');
    var Dir = "ajax/AddCliente.php";
$_registrarFB.click(function() {
     LoginFB();
    
});
    $_registrar.click(function() {

        if ($_form.valid()) {
            $.post(Dir, {
                sUser: $_username.val(),
                sEmail: $_email.val(),
                sPassword: $_password.val()
            }, function(o) {
                $("#sign-in-total-Mensaje").css("display", "none");
                if (o.Tupla > 1) {
                   location.href = "./index.php";
                } else {
                    $("#sign-in-total-Mensaje").html(o.sError);
                    $("#sign-in-total-Mensaje").css("display", "block");
                    $("#sign-in-total-Mensaje").css("color", "red");
                }

            }, "json");
        }
    });
    /*
     * Eventos que se ejecutan cuando el modal se carga
     * y ya es visible para el usuario
     */
    $_modal.on('shown.bs.modal', function()
    {
        // Configurar las validaciones
        var $field = null;
        var $params = {rules: {}, messages: {}};

        // validaciones de username
        $field = $_username.attr('name');
        $params['rules'][$field] = {"required": true, "rangelength": [3, 10]};
        $params['messages'][$field] = {"rangelength": jQuery.validator.format("El nombre de usuario debe contener entre {0} y {1} caracteres")};

        // validaciones de email
        $field = $_email.attr('name');
        $params['rules'][$field] = {"required": true, "maxlength": 50};
        $params['messages'][$field] = {"maxlength": jQuery.validator.format("El correo no puede sobrepasar los {0} caracteres")};

        // validaciones de password
        $field = $_password.attr('name');
        $params['rules'][$field] = {"required": true, "passwordcheck": true};
        $params['messages'][$field] = {"minlength": jQuery.validator.format("La contraseña debe contener el menos 6 caracteres")};

        // validaciones de confirm password
        $field = $_confirmPassword.attr('name');
        $params['rules'][$field] = {"required": true, "equalTo": $_password};
        $params['messages'][$field] = {"equalTo": "Las contraseñas no coinciden"};

        // envia parametros de validación al formulario
        $_form.validate($params);
    });

    /*
     * Eventos que se ejecutan una vez el modal ha sido
     * cerrado y ya no es visible para el usuario.
     */
    $_modal.on('hidden.bs.modal', function()
    {
        // Limpia el formulario
        $_form.validate().resetForm();
        $_form.get(0).reset();
        $_form.children().removeClass('has-error has-success');
    });

   

</script>