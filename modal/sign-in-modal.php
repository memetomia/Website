<!-- sign-in MODAL LOCAL STYLE -->
<style>
    
</style>

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
                        <form id="sign-in-form" role="form">
                            <div class="form-group">
                                <label for="sign-in-username">Nombre de usuario</label>
                                <input type="text" class="form-control" id="sign-in-username" placeholder="Ingresa nombre de usuario">
                            </div>
                            <div class="form-group">
                                <label for="sign-in-email">Correo eletrónico</label>
                                <input type="text" class="form-control" id="sign-in-email" placeholder="Ingresa tu correo eletrónico">
                            </div>
                            <div class="form-group">
                                <label for="sign-in-password">Contraseña</label>
                                <input type="password" class="form-control" id="sign-in-password" placeholder="Ingresa una contraseña">
                            </div>
                            <div class="form-group">
                                <label for="sign-in-re-password">Repite la Contraseña</label>
                                <input type="password" class="form-control" id="sign-in-re-password" placeholder="Ingresa nuevamente tu contraseña">
                            </div>  
                            <div class="text-right">
                                <button type="button" class="btn btn-success">Registrarme</button>    
                            </div>                                                                                  
                        </form>
                    </div>
                </div>                        
            </div>
        </div>
    </div>
</div>

<!-- sign-in MODAL LOCAL JAVASCRIPT -->
<script type="text/javascript">
    // documento preparado
    $(function()
    {        
        
    });
</script>