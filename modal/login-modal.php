<!-- LOGIN MODAL LOCAL STYLE -->
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
                        <input type="text" class="form-control" id="login-username-email" placeholder="correo@ejemplo.com">
                    </div>
                    <div class="form-group">
                        <label for="login-password">Contraseña</label>
                        <input type="password" class="form-control" id="login-password" placeholder="contraseña">                        
                    </div>
                    <small><a class="pull-right" href="#">¿Olvidaste tu contraseña?</a></small>
                    <div class="checkbox">
                        <label>
                          <input type="checkbox"> Recordarme
                        </label>
                    </div>                    
                </form>

            </div>
            <div class="modal-footer">                        
                <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-log-in"></span> Iniciar sesión</button>
            </div>
        </div>
    </div>
</div>

<!-- LOGIN MODAL LOCAL JAVASCRIPT -->
<script type="text/javascript">
    // documento preparado
    $(function()
    {        
        
    });
</script>