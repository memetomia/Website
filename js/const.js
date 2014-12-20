//var SERVER = "http://localhost/Website";
var SERVER          = "http://www.memetomia.com";
var RESOURCES = "/resources";
var FONTS = "/resources/fonts";
var MEDIA = "/media";
var MEME = SERVER + MEDIA + "/meme";
var DEFAULT = SERVER + MEDIA + "/default";
var ARTICLE = SERVER + MEDIA + "/article";
var IMAGE = SERVER + "/Imagen.php?id="
var JS = "/js";

var CSS = "/css";
var BASE = "/base";
var AJAX = "/ajax";
var ADMIN = "/admin";
var ADMIN_CSS = "/admin/css";
var ADMIN_JS = "/admin/js";



function FB(id) {
    window.open($("#FB-" + id).attr("d-link"), "nuevo", "directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=600, height=400");
}
function TW(iId) {
    window.open($("#TW-" + iId).attr("d-link"), "nuevo", "directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=600, height=400");
}

function FunLike(iId) {
    $.post("ajax/AddLike.php", {
        iID: iId
    }, function(o) {
        if (o.Tupla > 0) {

        } else {

        }

    }, "json");
}
function LoginFB()
{
    fb.login(function() {

        if (fb.logged) {
            $.post("ajax/loginFB.php", {
                iId: fb.user.id,
                sUser: fb.user.name,
                sName: fb.user.first_name,
                sLName: fb.user.last_name,
                sLink: fb.user.link,
                sEmail: fb.user.email,
                sPicture: fb.user.picture

            }, function(o) {


                if (o.iError == 1) {

                    location.href = "index.php";

                }/*end if o.valor==1 */
                else {
                    alert(o.sInfo);
                }
            }, "json");
        } else {
            alert("No se pudo identificar al usuario");
        }
    })
}