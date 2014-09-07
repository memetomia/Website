/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function funRegistro()
{
        location.href="login.php";
}


function registrar()
{
      $.post("lib/ControllerUserNuevo.php",{
                    iImg:x
                },function(o){   });
}
function LoginFB()
{
   fb.login(function(){ 
      
    if (fb.logged) {
       $.post("lib/loginfb.php",{
		iId:fb.user.id,
                sUser:fb.user.name,
                sName:fb.user.first_name,
                sLName:fb.user.last_name,
                sLink:fb.user.link,
                sEmail:fb.user.email,
                 sPicture:fb.user.picture
                  
            },function(o){
                
            
                if (o.iError==1) {
                  
                    location.href="nuevo.php";
              
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
VentanaCrearsesion = function(){
    //etq es abreviatura de etiqueta 
       
    var etqInputUsername;
    var etqInputPassword;
     var etqInputRePassword;
    var etqInputCorreo;
   
    function Constructor() {
        etqInputUsername=$("#Username");
        etqInputPassword=$("#Password");
        etqInputCorreo=$("#Correo");
	  etqInputRePassword=$("#RePassword");
        etqInputUsername.val("");
        etqInputPassword.val("");
        etqInputRePassword.val("");
        etqInputCorreo.val("");
       
        $("#CrearSesion").click(Guardar);
    
      
      
    }
      
    /**
         * VentanaCambiarPass::Guardar
         *
         * valida y guarda la comfiguracion del usuario
         */
    function Guardar() {
                   
        var bUsername, bPassword,bCorreo, bRePassword;
        bUsername = etqInputUsername.val().length > 0;
        bCorreo = etqInputCorreo.val().length > 0;
        bPassword = etqInputPassword.val().length > 0;
            bRePassword = etqInputRePassword.val().length > 0;
        var bLocalError=false;
        if (!bUsername || !bPassword || !bCorreo || !bRePassword) {
            alert("Por favor llene todo los campos");
            bLocalError=true;
        }
           
          if (etqInputPassword.val()!=etqInputRePassword.val())
          {
              alert("Las contraseñas no coincide");
              bLocalError=true;
          }

        if ((bLocalError==false)){
            $.post("lib/CrearCuenta.php",{
		
                sUsername: bUsername ? etqInputUsername.val() : "",
                sPassword: bPassword ? etqInputPassword.val() : "",
                sCorreo: bCorreo ? etqInputCorreo.val() : ""
                  
            },function(o){
                
            
                if (o.iError==1) {
                  
                    location.href="cuentacreada.php";
                   
                }/*end if o.valor==1 */ 
                else {
                    alert(o.sInfo);
                }
            }, "json");
        }/*end if bError==false */ 
    }/* fin de funcion Guardar*/
      
    
    
    return {
        Constructor:Constructor,
        Guardar:Guardar
    }
}();
$(document).ready(function() {VentanaCrearsesion.Constructor();   });