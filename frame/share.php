

        <div class=" col-md-3" style="padding: 2px;">
                <button id="Like-<?php echo $iID ?>" type="button" class="btn btn-default btn-block like-button" data-toggle="button">
                    <span class="glyphicon glyphicon-thumbs-up"></span> Me gusta
                </button>  

            </div>
            <div class="col-md-3" style="padding: 1px;">
                <button id="Comment-<?php echo $iID ?>" type="button" class="btn btn-default btn-block comment-button">
                    <span class="glyphicon glyphicon-comment"></span> Comentar
                </button> 
             <script type="text/javascript">$('#Comment-<?php echo $iID ?>').click(function() {
                       location.href='<?php echo EXT_IMAGEN."?id=".$iID ?>#post-comments-sectionya t'
                    });</script>
            
            
            </div>
            <div class=" col-md-3"  style="padding: 1px;">
                <button id="FB-<?php echo $iID ?>" d-link="http://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode("http://www.memetomia.com/Imagen.php?id=") . $iID . "&t=" . $sTitle ?>" type="button" class="btn btn-primary btn-block">Facebook</button>
                <script type="text/javascript">$('#FB-<?php echo $iID ?>').click(function() {
                        funFB(<?php echo $iID ?>);
                    });</script>

            </div>
            <div class=" col-md-3" style="padding: 1px;">
                <button id="TW-<?php echo $iID ?>" d-link="https://twitter.com/intent/tweet?button_hashtag=&text=<?php echo urlencode("http://www.memetomia.com/Imagen.php?id=") . $iID ?>"type="button" class="btn btn-info btn-block">Twitter</button>
                <script type="text/javascript">$('#TW-<?php echo $iID ?>').click(function() {
                        TW(<?php echo $iID ?>);
                    });</script>

            </div>