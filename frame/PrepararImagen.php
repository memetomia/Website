<?php
$sMetaImagen="";
if ($iTipoMedia ==TYPEMEDIA_IMAGEN) {
$sMetaImagen= EXT_ARTICLE . "/" . $sUrl;
    $sUrlaMostrar = '<img style="width:100%" class="img-thumbnail img-small" src="' . EXT_ARTICLE . "/" . $sUrl . '"/>';
    $botonplay = "";
}
if ($iTipoMedia == TYPEMEDIA_VIDEO_YOUTUBE) {
    $sMetaImagen=  $sUrl;
    $sUrlaMostrar = '<img style="width:100%" class="img-thumbnail img-small" src="' . $sUrl . '"/>';

    $botonplay = '<div id="Video-' . $iID . '" class="play"></div>';
    $botonplay .= '<script type="text/javascript">'
            . '$("#Video-' . $iID . '").click(function() {
                                                           $("#d-' . $iID . '").html(\'<div class="flex-video widescreen">' . $sInfoMedia . '</div>\');
                                                       });                               </script>';
}
//   VINE
if ($iTipoMedia == TYPEMEDIA_VIDEO_VINE) {
    $sMetaImagen= $sUrl;
    $sUrlaMostrar = '<img style="width:100%" class="img-thumbnail img-small" src="' . $sUrl . '"/>';

    $botonplay = '<div id="Vine-' . $iID . '" class="play"></div>';
    $botonplay .= '<script type="text/javascript">'
            . '$("#Vine-' . $iID . '").click(function() {
                                                           $("#d-' . $iID . '").html(\'' . $sInfoMedia . '\');
                                                        $(".Vine").click(function() {
                                                            $(this).get(0).paused ? $(this).get(0).play() : $(this).get(0).pause();
                            });});                               </script>';
}
//EMB
if ($iTipoMedia == TYPEMEDIA_VIDEO_EMBED) {
    $sUrlaMostrar = $sInfoMedia;
    $botonplay = "";
}

if ($iTipoMedia == TYPEMEDIA_GIF) {
    $sMetaImagen= EXT_ARTICLE . "/" . $sUrl;
    $sUrlaMostrar = '<img style="width:100%" class="img-thumbnail img-small" src="' . EXT_ARTICLE . "/" . $sUrl . '"/>';

    $botonplay = '<div id="Video-' . $iID . '" class="play"></div>';
    $botonplay .= '<script type="text/javascript">'
            . '$("#Video-' . $iID . '").click(function() {
                                                           $("#d-' . $iID . '").html(\'<img style="width:100%" class="img-thumbnail img-small" src="' . EXT_ARTICLE . "/" . $sInfoMedia . '"/>\');
                                                       });                               </script>';
}
if ($iTipoMedia == TYPEMEDIA_IMAGEN_CORTADA) {
    $sMetaImagen= EXT_ARTICLE . "/" . $sUrl;
    $sUrlaMostrar = '<img  style="width:100%" class="img-thumbnail img-small" src="' . EXT_ARTICLE . "/" . $sUrl . "" . '"/>'
    ;

    $botonplay = '<div id="Video-' . $iID . '" class="desplegar"></div>';
    $botonplay .= '<script type="text/javascript">'
            . '$("#Video-' . $iID . '").click(function() {
                                                           $("#d-' . $iID . '").html(\'<img style="width:100%" class="img-thumbnail img-small" src="' . EXT_ARTICLE . "/" . $sInfoMedia . '"/>\');
                                                       });                               </script>';
}
            