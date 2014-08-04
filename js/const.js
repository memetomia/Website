var SERVER = "http://localhost:8080/memetomia";
//var SERVER          = "http://www.memetomia.com"
var RESOURCES = "/resources";
var FONTS = "/resources/fonts";
var MEDIA = "/media";
var MEME = SERVER + MEDIA + "/meme";
var DEFAULT = SERVER + MEDIA + "/default";
var ARTICLE = SERVER + MEDIA + "/article";
var IMAGE=ARTICLE+"/imagen.php?i="
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
function FunComment(iId) {
window.location.href = IMAGE+iId;   
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