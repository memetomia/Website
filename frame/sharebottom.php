

        <div class="col-md-3" style="padding: 2px;">
                <button id="bLike-<?php echo $iID ?>" type="button" class="btn btn-default btn-block like-button" data-toggle="button">
                    <span class="glyphicon glyphicon-thumbs-up"></span> Me gusta
                </button>  

            </div>
            <div class="col-md-3" style="padding: 1px;">
                <button id="bComment-<?php echo $iID ?>" type="button" class="btn btn-default btn-block comment-button">
                    <span class="glyphicon glyphicon-comment"></span> Comentar
                </button>  </div>
            <div class=" col-md-3"  style="padding: 1px;">
                <button id="bFB-<?php echo $iID ?>" d-link="http://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode("http://www.memetomia.com/Imagen.php?id=") . $iID . "&t=" . $sTitle ?>" type="button" class="btn btn-primary btn-block">Facebook</button>
                <script type="text/javascript">$('#bFB-<?php echo $iID ?>').click(function() {
                        funFB(<?php echo $iID ?>);
                    });</script>

            </div>
            <div class=" col-md-3" style="padding: 1px;">
                <button id="bTW-<?php echo $iID ?>" d-link="https://twitter.com/intent/tweet?button_hashtag=&text=<?php echo urlencode("http://www.memetomia.com/Imagen.php?id=") . $iID ?>"type="button" class="btn btn-info btn-block">Twitter</button>
                <script type="text/javascript">$('#bTW-<?php echo $iID ?>').click(function() {
                        TW(<?php echo $iID ?>);
                    });</script>

            </div>