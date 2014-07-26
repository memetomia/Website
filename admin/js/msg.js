
function msj(id, Info, valor)
{
    var a = "";
    $(id).removeClass("Oculto Error Advertencia Exito Informacion");
    $(id).addClass(valor)
    a += '<span class="spanNoti">' + Info + '</span>';
    if (valor == "ErrorMeme") {
        a = ""
        a += '<img src="bcss/img/jvmeme/molesto.png" class="imgNoti"></img>';
        $(id).addClass("Error");
        a += '<span class="spanNoti" style="   max-width: 140px;">' + Info + '</span>';

    }
    $(id).html(a);
    $(id).unbind('click');
    $(id).click(function() {
        $(this).addClass("Oculto");
    });
}
function OcultarMsj(id) {
    $(id).removeClass("Error Advertencia Exito Informacion");
    $(id).addClass("Oculto");
}


