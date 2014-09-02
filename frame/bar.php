<?php
include 'base/const.php';
include_once 'base/ClassCookie.php';
$co=new ClassCookie();

if (!$co->IsSession()) {
    echo "galletas"
    . "";
}
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
            <a class="navbar-brand" href="#">Memetomía</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-media/example-navbar-collapse-1">




            <div class="collapse navbar-collapse" id="memetomia-navbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Inicio</a></li>
                    <li><a href="#">Top</a></li>

                </ul>                    
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-bell"></span> Notificaciones <span class="label label-danger">2</span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><span class="not-readed"></span> <span class="glyphicon glyphicon-comment"></span> Alejandro123 comentó en tu post</a></li>                                
                            <li><a href="#"><span class="not-readed"></span> <span class="glyphicon glyphicon-thumbs-up"></span> A Erika33 le gustó tu post</a></li>                                
                            <li class="divider"></li>
                            <li class="text-center"><a href="#" data-toggle="modal" data-target="#notifications-modal">Ver todas las notificaciones</a></li>                                
                        </ul>
                    </li>
                    <li><a href="#" data-toggle="modal" data-target="#new-post-modal"><span class="glyphicon glyphicon-upload"></span> Nuevo Post</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Jaivic Villegas<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#" data-toggle="modal" data-target="#activity-modal"><span class="glyphicon glyphicon-tasks"></span> Actividad</a></li>                                
                            <li><a href="#" data-toggle="modal" data-target="#settings-modal"><span class="glyphicon glyphicon-cog"></span> Ajustes</a></li>                                
                            <li class="divider"></li>
                            <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Cerrar sesión</a></li>
                        </ul>
                    </li>
                </ul>                    
            </div>
        </div>
</nav>
