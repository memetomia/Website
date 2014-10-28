<?php
if ($bTodoSimple != true) {
    if ($co->IsSession()) {

//   $bdUser->SearchByID($co->getSVar("iId"));
//   $user=$bdUser->bd->obtener_respuesta(0,"NAME");
        ?>
        <nav class="navbar navbar-static-top navbar-inverse" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#memetomia-navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo SERVER; ?>">Memetomía</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-media/example-navbar-collapse-1">
                    <div class="collapse navbar-collapse" id="memetomia-navbar">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="<?php echo SERVER; ?>">Inicio</a></li>
                            <li><a href="#">Top</a></li>

                        </ul>                    
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a id="spanTitleNotify" href="#" class="dropdown-toggle" data-toggle="dropdown"></a>
                                <ul  class="dropdown-menu">
                                    <div  id="MenuDropNotify"></div>
                                    <li class="divider"></li>
                                    <li class="text-center"><a href="#" data-toggle="modal" data-target="#notifications-modal">Ver todas las notificaciones</a></li>                                
                                </ul>
                            </li>
                            <li><a href="#" data-toggle="modal" data-target="#new-post-modal"><span class="glyphicon glyphicon-upload"></span> Nuevo Post</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php ECHO $user; ?><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#" data-toggle="modal" data-target="#activity-modal"><span class="glyphicon glyphicon-tasks"></span> Actividad</a></li>                                
                                    <li><a href="#" data-toggle="modal" data-target="#settings-modal"><span class="glyphicon glyphicon-cog"></span> Ajustes</a></li>                                
                                    <li class="divider"></li>
                                    <li><a href="LogOut.php"><span class="glyphicon glyphicon-log-out"></span> Cerrar sesión</a></li>
                                </ul>
                            </li>
                        </ul>                    
                    </div>
                </div>
        </nav>
        <?php
    } else {
        ?>    
        <nav class="navbar navbar-static-top navbar-inverse" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#memetomia-navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo SERVER; ?>">Memetomía</a>
                </div>
                <div class="collapse navbar-collapse" id="memetomia-navbar">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="<?php echo SERVER; ?>">Inicio</a></li>
                    </ul>                    
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#" data-toggle="modal" data-target="#sign-in-modal">¡Regístrate en Memetomía!</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#login-modal">Iniciar sesión</a></li>                        
                    </ul>                    

                </div>
        </nav>
    <?php
    }
} else {
    ?>
    <nav class="navbar navbar-static-top navbar-inverse" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#memetomia-navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo SERVER; ?>">Memetomía</a>
            </div>
            <div class="collapse navbar-collapse" id="memetomia-navbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="<?php echo SERVER; ?>">Inicio</a></li>
                </ul>                    
                <ul class="nav navbar-nav navbar-right">
                </ul>                    

            </div>
    </nav>
<?php } ?>