<!-- LOGIN MODAL -->
<style>

</style>

<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Iniciar Sesión</h4>
            </div>
            <div class="modal-body">                

                <div class="row">
                    <button id="login-facebook" class="btn btn-lg btn-primary col-md-6 col-md-offset-3">Iniciar sesión con Facebook</button>    
                </div>

                <hr/>

                <form id="login-form" role="form">
                    <div class="form-group">
                        <label for="login-username-email">Nombre de usuario o correo eletrónico</label>
                        <input type="text" name="emailusername" class="form-control" id="login-username-email" placeholder="correo@ejemplo.com">
                    </div>
                    <div class="form-group">
                        <label for="login-password">Contraseña</label>
                        <input type="password" name="password" class="form-control" id="login-password" placeholder="contraseña">                        
                    </div>
                    <small><a class="pull-right" href="#">¿Olvidaste tu contraseña?</a></small>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Recordarme
                        </label>
                    </div>                    
                </form>

            </div>
            <span id="login-total-Mensaje" class="help-block" style="display: none;">Este campo es requerido</span>

            <div class="modal-footer">                        
                <button id="login-log" type="button" class="btn btn-success"><span class="glyphicon glyphicon-log-in"></span> Iniciar sesión</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function() {

        // Prefijo del modal
        var MODAL_PREFIX = 'login-';

        // Variables cacheadas
        var $_modal = $('#' + MODAL_PREFIX + 'modal');
        var $_form = $('#' + MODAL_PREFIX + 'form');
        var $_usernameEmail = $('#' + MODAL_PREFIX + 'username-email');
        var $_password = $('#' + MODAL_PREFIX + 'password');
        var $_login = $('#' + MODAL_PREFIX + 'log');  
        var $_loginFB = $('#' + MODAL_PREFIX + 'facebook');
//        
//        $_loginFB.click(function() {
//            LoginFB();
//
//        });
        /*
         * Eventos que se ejecutan cuando el modal se carga
         * y ya es visible para el usuario
         */
        var Dir = "ajax/Login.php";

        $_login.click(function() {

            if ($_form.valid()) {
                $.post(Dir, {
                    sUser: $_usernameEmail.val(),
                    sPassword: $_password.val()
                }, function(o) {
                    $("#login-total-Mensaje").css("display", "none");
                    if (o.iError == 1) {
                      location.href = "./index.php";
                    } else {
                        $("#login-total-Mensaje").html(o.sError);
                        $("#login-total-Mensaje").css("display", "block");
                        $("#login-total-Mensaje").css("color", "red");
                    }

                }, "json");
            }
        });

        $_modal.on('show.bs.modal', function()
        {
            // Configurar las validaciones
            var $field = null;
            var $params = {rules: {}, messages: {}};

            // validaciones de username
            $field = $_usernameEmail.attr('name');
            $params['rules'][$field] = {"required": true};
            $params['messages'][$field] = {};

            // validaciones de password
            $field = $_password.attr('name');
            $params['rules'][$field] = {"required": true, "passwordcheck": true};
            $params['messages'][$field] = {"minlength": jQuery.validator.format("La contraseña debe contener el menos 6 caracteres")};

            // envia parametros de validación al formulario
            $_form.validate($params).resetForm();

            // limpia el formulario
            $_form.get(0).reset();
            $_form.children().removeClass('has-error has-success');
        });
    });
</script>