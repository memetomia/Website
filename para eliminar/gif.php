
<?php

$image = new Gmagick('media/4276.gif');
$image = $image->coalesceImages();
foreach ($image as $frame) {
    $frame->cropThumbnailImage(90, 90);
    break;
}
$frame->writeImage('frame.gif'); 
?>
