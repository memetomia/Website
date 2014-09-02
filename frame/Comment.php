

<?php
$imagenUserCurrent = "media/example_img/profile-example.jpg";
$imagenUserComment="media/example_img/profile-example.jpg";
$UserName="María Rodríguez";
$UserComment="jajajajaja!, que divertida la foto!"
?>
<form action="#" method="POST" class="form-inline" role="form">                                
    <div class="user-picture col-md-2 form-group">                            
        <img src="<?php echo $imagenUserCurrent; ?>" class="img-rounded">
    </div>
    <div id="user-comment" class="col-md-10 form-group">                            
        <textarea id="user-comment-input" class="form-control" placeholder="Deja un comentario"></textarea>
    </div>
    <div id="comment-button-container" class="text-right col-md-12">
        <button class="btn btn-sm btn-success">Comentar</button>                                
    </div>

</form>

<div class="col-md-12"><hr/></div>               
<div id="post-comments-section">
    <p id="comment-count" class="text-right text-muted">451 comentarios</p>
    <div class="comment-block row">
        <div class="user-picture col-md-2 form-group">                            
            <img src="<?php echo $imagenUserComment; ?>" class="img-rounded">
        </div>

        <div class="col-md-10 form-group">                            
            <b class="username"><?php echo $UserName; ?></b>
            <p><?php echo $UserComment; ?></p>
        </div>    
    </div>


</div>                   