<!-- NOTIFICATIONS MODAL LOCAL STYLE -->
<style>

</style>

<div class="modal fade" id="notifications-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Notificaciones</h4>
            </div>
            <div class="modal-body">
                
                <button id="notifications-mark-as-read" class="pull-right btn btn-xs btn-default">Marcar todo como leído</button>                                  

                <ul class="list-group">                      
                    <p class="text-muted">Comentarios</p>                
                    <li class="list-group-item">
                        <span class="not-readed"></span> 
                        <span class="glyphicon glyphicon-comment"></span>
                        <a href="#">Alejandro123</a> hizo un comentario en tu post: <a href="#">I must become someone else, I must become something else</a>
                    </li>
                    <li class="list-group-item">
                        <span class="glyphicon glyphicon-comment"></span>
                        <a href="#">JaivicX</a> hizo un comentario en tu post: <a href="#">El pintor mas honesto en la historia de la humanidad</a>
                    </li>
                    <li class="list-group-item">
                        <span class="glyphicon glyphicon-comment"></span>
                        <a href="#">hegd26</a> hizo un comentario en tu post: <a href="#">El pintor mas honesto en la historia de la humanidad</a>
                    </li>                    
                </ul>    
                
                <ul class="list-group">
                    <p class="text-muted">Me gusta</p>                  
                    <li class="list-group-item">
                        <span class="not-readed"></span> 
                        <span class="glyphicon glyphicon-thumbs-up"></span>
                        <a href="#">Erika33</a> le gustó tu post: <a href="#">El pintor mas honesto en la historia de la humanidad</a>
                    </li>                    
                    <li class="list-group-item">                        
                        <span class="glyphicon glyphicon-thumbs-up"></span>
                        <a href="#">Erika33</a> le gustó tu post: <a href="#">Los Vengadores de Spidey</a>
                    </li>                    
                </ul>        
                                
            </div>
            <!-- <div class="modal-footer">                        
                <button type="button" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-upload"></span> Publicar</button>
            </div> -->
        </div>
    </div>
</div>

<!-- NOTIFICATIONS MODAL LOCAL JAVASCRIPT -->
<script type="text/javascript">
    // documento preparado
    $(function()
    {        
        NotificationsController.init(
            $('#notifications-modal'),
            $('#notifications-mark-as-read'));

        NotificationsController.activateEventListeners();
    });
</script>