<!-- SETTINGS MODAL -->
<style>
    #settings-modal .modal-body
    {
        overflow: auto;        
    }
    #settings-modal .settings-birthdate
    {
        text-align: center;
    }
    #settings-modal textarea
    {
        resize: none;
    }
    #settings-modal img
    {
        cursor: pointer;
    }
</style>

<div class="modal fade" id="settings-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Ajustes</h4>
            </div>
            <div class="modal-body">                    
                
                <!-- MENU -->
                <div id="settings-options" class="btn-group btn-group-justified" data-toggle="buttons">
                    <label id="settings-account-option" class="btn btn-default active">
                        <input type="radio" name="options"><span class="glyphicon glyphicon-cog"></span> Cuenta
                    </label>
                    <label id="settings-new-password-option" class="btn btn-default">
                        <input type="radio" name="options"><span class="glyphicon glyphicon-asterisk"></span> Contraseña
                    </label>
                    <label id="settings-profile-option" class="btn btn-default">
                        <input type="radio" name="options"><span class="glyphicon glyphicon-user"></span> Perfil
                    </label>
                    <label id="settings-notifications-option" class="btn btn-default">
                        <input type="radio" name="options"><span class="glyphicon glyphicon-bell"></span> Notificaciones
                    </label>
                </div><br/>

                <!-- CUENTA -->
                <div id="settings-account-content" class="settings-option-content col-md-12">
                    <form id="settings-account-form" role="form">                                            
                        <div class="form-group">
                            <label for="settings-username">Nombre de usuario</label>
                            <input type="text" class="form-control" id="settings-username" placeholder="Nombre de usuario"/>                            
                        </div>
                        <div class="form-group">
                            <label for="settings-email">Correo electrónico</label>
                            <input type="text" class="form-control" id="settings-email" placeholder="Correo electrónico"/>
                        </div>
                        
                        <p class="help-block">Mostrar en mi timeline: </p>
                        <div class="well well-sm">                            
                            <div class="row">
                                <div class="col-md-6 text-right">
                                    <label for="settings-videos">Videos</label>    
                                </div>
                                <div class="col-md-6">
                                    <input type="checkbox" checked="checked" id="settings-videos" class="settings-switch"/>
                                </div>                                                    
                            </div></br>
                            <div class="row">
                                <div class="col-md-6 text-right">
                                    <label for="settings-gif">Imágenes GIF</label>    
                                </div>
                                <div class="col-md-6">
                                    <input type="checkbox" checked="checked" id="settings-gif" class="settings-switch"/>
                                </div>                                                    
                            </div>
                        </div></br>
                        <div class="row">                        
                            <div class="col-md-6">
                                <small><a href="#">Eliminar mi cuenta</a></small>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success pull-right">Guardar Cambios</button>
                            </div>                            
                        </div>                        
                    </form>
                </div>

                <!-- PASSWORD -->
                <div id="settings-new-password-content" class="settings-option-content col-md-12">
                    <form id="settings-new-password-form" role="form">
                        <div class="form-group">
                            <label for="settings-old-password">Contraseña actual</label>
                            <input type="password" class="form-control" id="settings-old-password" placeholder="Ingresa contraseña actual"/>
                        </div>
                        <div class="form-group">
                            <label for="settings-new-password">Contraseña nueva</label>
                            <input type="password" class="form-control" id="settings-new-password" placeholder="Ingresa contraseña nueva"/>
                        </div>
                        <div class="form-group">
                            <label for="settings-new-password-again">Reingresa contraseña nueva</label>
                            <input type="password" class="form-control" id="settings-old-password-again" placeholder="Reingresa contraseña nueva"/>
                        </div></br>
                        <button type="submit" class="btn btn-success pull-right">Guardar Cambios</button>
                    </form>
                </div>

                <!-- PERFIL -->
                <div id="settings-profile-content" class="settings-option-content col-md-12">
                    <form id="settings-profile-form" role="form">
                        <div class="form-group">
                            <label for="settings-picture">Imágen de perfil</label>
                            <div class="well well-sm text-center">
                                <label for="settings-picture"><img src="media/example_img/post1.jpg" alt="user_pic" class="img-thumbnail" width="128" height="128"></label>
                                <input type="file" class="form-control hidden" id="settings-picture">                                
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label for="settings-name">Nombre</label>
                            <input type="text" class="form-control" id="settings-name" placeholder="Ingresa tu nombre" maxlength="70"/>
                        </div>

                        <div class="form-group">
                            <label>Género</label>
                            <div id="settings-gender-options" class="btn-group btn-group-justified" data-toggle="buttons">
                                <label id="settings-gender-unespecific-option" class="btn btn-default active">
                                    <input type="radio" name="-gender-options">No especificado
                                </label>
                                <label id="settings-gender-male-option" class="btn btn-default">
                                    <input type="radio" name="-gender-options">Hombre
                                </label>
                                <label id="settings-gender-female-option" class="btn btn-default">
                                    <input type="radio" name="-gender-options">Mujer
                                </label>                                
                            </div>
                        </div>
                        
                        <div class="row">                                                    
                            <div class="form-group col-md-3">
                                <label for="settings-day">Día</label>
                                <input type="text" class="form-control settings-birthdate" id="settings-day" placeholder="DD" maxlength="2" />
                            </div>                        
                            <div class="form-group col-md-3">
                                <label for="settings-month">Mes</label>
                                <select id="settings-month" class="form-control" name="settings-month">  
                                    <option value="01">Enero</option>
                                    <option value="02">Febrero</option>
                                    <option value="03">Marzo</option>
                                    <option value="04">Abril</option>
                                    <option value="05">Mayo</option>
                                    <option value="06">Junio</option>
                                    <option value="07">Julio</option>
                                    <option value="08">Agosto</option>
                                    <option value="09">Septiembre</option>
                                    <option value="10">Octubre</option>
                                    <option value="11">Noviembre</option>
                                    <option value="12">Diciembre</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="settings-year">Año</label>
                                <input type="text" class="form-control settings-birthdate" id="settings-year" placeholder="YYYY" maxlength="4" />
                            </div>    
                        </div>
                        
                        <div class="form-group">
                            <label for="settings-country">País</label>
                            <select id="settings-country" class="form-control" name="settings-country">
                                <option value="AF">Afganistán</option>
                                <option value="AL">Albania</option>
                                <option value="DE">Alemania</option>
                                <option value="AD">Andorra</option>
                                <option value="AO">Angola</option>
                                <option value="AI">Anguilla</option>
                                <option value="AQ">Antártida</option>
                                <option value="AG">Antigua y Barbuda</option>
                                <option value="AN">Antillas Holandesas</option>
                                <option value="SA">Arabia Saudí</option>
                                <option value="DZ">Argelia</option>
                                <option value="AR">Argentina</option>
                                <option value="AM">Armenia</option>
                                <option value="AW">Aruba</option>
                                <option value="AU">Australia</option>
                                <option value="AT">Austria</option>
                                <option value="AZ">Azerbaiyán</option>
                                <option value="BS">Bahamas</option>
                                <option value="BH">Bahrein</option>
                                <option value="BD">Bangladesh</option>
                                <option value="BB">Barbados</option>
                                <option value="BE">Bélgica</option>
                                <option value="BZ">Belice</option>
                                <option value="BJ">Benin</option>
                                <option value="BM">Bermudas</option>
                                <option value="BY">Bielorrusia</option>
                                <option value="MM">Birmania</option>
                                <option value="BO">Bolivia</option>
                                <option value="BA">Bosnia y Herzegovina</option>
                                <option value="BW">Botswana</option>
                                <option value="BR">Brasil</option>
                                <option value="BN">Brunei</option>
                                <option value="BG">Bulgaria</option>
                                <option value="BF">Burkina Faso</option>
                                <option value="BI">Burundi</option>
                                <option value="BT">Bután</option>
                                <option value="CV">Cabo Verde</option>
                                <option value="KH">Camboya</option>
                                <option value="CM">Camerún</option>
                                <option value="CA">Canadá</option>
                                <option value="TD">Chad</option>
                                <option value="CL">Chile</option>
                                <option value="CN">China</option>
                                <option value="CY">Chipre</option>
                                <option value="VA">Ciudad del Vaticano (Santa Sede)</option>
                                <option value="CO">Colombia</option>
                                <option value="KM">Comores</option>
                                <option value="CG">Congo</option>
                                <option value="CD">Congo, República Democrática del</option>
                                <option value="KR">Corea</option>
                                <option value="KP">Corea del Norte</option>
                                <option value="CI">Costa de Marfíl</option>
                                <option value="CR">Costa Rica</option>
                                <option value="HR">Croacia (Hrvatska)</option>
                                <option value="CU">Cuba</option>
                                <option value="DK">Dinamarca</option>
                                <option value="DJ">Djibouti</option>
                                <option value="DM">Dominica</option>
                                <option value="EC">Ecuador</option>
                                <option value="EG">Egipto</option>
                                <option value="SV">El Salvador</option>
                                <option value="AE">Emiratos Árabes Unidos</option>
                                <option value="ER">Eritrea</option>
                                <option value="SI">Eslovenia</option>
                                <option value="ES">España</option>
                                <option value="US">Estados Unidos</option>
                                <option value="EE">Estonia</option>
                                <option value="ET">Etiopía</option>
                                <option value="FJ">Fiji</option>
                                <option value="PH">Filipinas</option>
                                <option value="FI">Finlandia</option>
                                <option value="FR">Francia</option>
                                <option value="GA">Gabón</option>
                                <option value="GM">Gambia</option>
                                <option value="GE">Georgia</option>
                                <option value="GH">Ghana</option>
                                <option value="GI">Gibraltar</option>
                                <option value="GD">Granada</option>
                                <option value="GR">Grecia</option>
                                <option value="GL">Groenlandia</option>
                                <option value="GP">Guadalupe</option>
                                <option value="GU">Guam</option>
                                <option value="GT">Guatemala</option>
                                <option value="GY">Guayana</option>
                                <option value="GF">Guayana Francesa</option>
                                <option value="GN">Guinea</option>
                                <option value="GQ">Guinea Ecuatorial</option>
                                <option value="GW">Guinea-Bissau</option>
                                <option value="HT">Haití</option>
                                <option value="HN">Honduras</option>
                                <option value="HU">Hungría</option>
                                <option value="IN">India</option>
                                <option value="ID">Indonesia</option>
                                <option value="IQ">Irak</option>
                                <option value="IR">Irán</option>
                                <option value="IE">Irlanda</option>
                                <option value="BV">Isla Bouvet</option>
                                <option value="CX">Isla de Christmas</option>
                                <option value="IS">Islandia</option>
                                <option value="KY">Islas Caimán</option>
                                <option value="CK">Islas Cook</option>
                                <option value="CC">Islas de Cocos o Keeling</option>
                                <option value="FO">Islas Faroe</option>
                                <option value="HM">Islas Heard y McDonald</option>
                                <option value="FK">Islas Malvinas</option>
                                <option value="MP">Islas Marianas del Norte</option>
                                <option value="MH">Islas Marshall</option>
                                <option value="UM">Islas menores de Estados Unidos</option>
                                <option value="PW">Islas Palau</option>
                                <option value="SB">Islas Salomón</option>
                                <option value="SJ">Islas Svalbard y Jan Mayen</option>
                                <option value="TK">Islas Tokelau</option>
                                <option value="TC">Islas Turks y Caicos</option>
                                <option value="VI">Islas Vírgenes (EEUU)</option>
                                <option value="VG">Islas Vírgenes (Reino Unido)</option>
                                <option value="WF">Islas Wallis y Futuna</option>
                                <option value="IL">Israel</option>
                                <option value="IT">Italia</option>
                                <option value="JM">Jamaica</option>
                                <option value="JP">Japón</option>
                                <option value="JO">Jordania</option>
                                <option value="KZ">Kazajistán</option>
                                <option value="KE">Kenia</option>
                                <option value="KG">Kirguizistán</option>
                                <option value="KI">Kiribati</option>
                                <option value="KW">Kuwait</option>
                                <option value="LA">Laos</option>
                                <option value="LS">Lesotho</option>
                                <option value="LV">Letonia</option>
                                <option value="LB">Líbano</option>
                                <option value="LR">Liberia</option>
                                <option value="LY">Libia</option>
                                <option value="LI">Liechtenstein</option>
                                <option value="LT">Lituania</option>
                                <option value="LU">Luxemburgo</option>
                                <option value="MK">Macedonia, Ex-República Yugoslava de</option>
                                <option value="MG">Madagascar</option>
                                <option value="MY">Malasia</option>
                                <option value="MW">Malawi</option>
                                <option value="MV">Maldivas</option>
                                <option value="ML">Malí</option>
                                <option value="MT">Malta</option>
                                <option value="MA">Marruecos</option>
                                <option value="MQ">Martinica</option>
                                <option value="MU">Mauricio</option>
                                <option value="MR">Mauritania</option>
                                <option value="YT">Mayotte</option>
                                <option value="MX">México</option>
                                <option value="FM">Micronesia</option>
                                <option value="MD">Moldavia</option>
                                <option value="MC">Mónaco</option>
                                <option value="MN">Mongolia</option>
                                <option value="MS">Montserrat</option>
                                <option value="MZ">Mozambique</option>
                                <option value="NA">Namibia</option>
                                <option value="NR">Nauru</option>
                                <option value="NP">Nepal</option>
                                <option value="NI">Nicaragua</option>
                                <option value="NE">Níger</option>
                                <option value="NG">Nigeria</option>
                                <option value="NU">Niue</option>
                                <option value="NF">Norfolk</option>
                                <option value="NO">Noruega</option>
                                <option value="NC">Nueva Caledonia</option>
                                <option value="NZ">Nueva Zelanda</option>
                                <option value="OM">Omán</option>
                                <option value="NL">Países Bajos</option>
                                <option value="PA">Panamá</option>
                                <option value="PG">Papúa Nueva Guinea</option>
                                <option value="PK">Paquistán</option>
                                <option value="PY">Paraguay</option>
                                <option value="PE">Perú</option>
                                <option value="PN">Pitcairn</option>
                                <option value="PF">Polinesia Francesa</option>
                                <option value="PL">Polonia</option>
                                <option value="PT">Portugal</option>
                                <option value="PR">Puerto Rico</option>
                                <option value="QA">Qatar</option>
                                <option value="UK">Reino Unido</option>
                                <option value="CF">República Centroafricana</option>
                                <option value="CZ">República Checa</option>
                                <option value="ZA">República de Sudáfrica</option>
                                <option value="DO">República Dominicana</option>
                                <option value="SK">República Eslovaca</option>
                                <option value="RE">Reunión</option>
                                <option value="RW">Ruanda</option>
                                <option value="RO">Rumania</option>
                                <option value="RU">Rusia</option>
                                <option value="EH">Sahara Occidental</option>
                                <option value="KN">Saint Kitts y Nevis</option>
                                <option value="WS">Samoa</option>
                                <option value="AS">Samoa Americana</option>
                                <option value="SM">San Marino</option>
                                <option value="VC">San Vicente y Granadinas</option>
                                <option value="SH">Santa Helena</option>
                                <option value="LC">Santa Lucía</option>
                                <option value="ST">Santo Tomé y Príncipe</option>
                                <option value="SN">Senegal</option>
                                <option value="SC">Seychelles</option>
                                <option value="SL">Sierra Leona</option>
                                <option value="SG">Singapur</option>
                                <option value="SY">Siria</option>
                                <option value="SO">Somalia</option>
                                <option value="LK">Sri Lanka</option>
                                <option value="PM">St Pierre y Miquelon</option>
                                <option value="SZ">Suazilandia</option>
                                <option value="SD">Sudán</option>
                                <option value="SE">Suecia</option>
                                <option value="CH">Suiza</option>
                                <option value="SR">Surinam</option>
                                <option value="TH">Tailandia</option>
                                <option value="TW">Taiwán</option>
                                <option value="TZ">Tanzania</option>
                                <option value="TJ">Tayikistán</option>
                                <option value="TF">Territorios franceses del Sur</option>
                                <option value="TP">Timor Oriental</option>
                                <option value="TG">Togo</option>
                                <option value="TO">Tonga</option>
                                <option value="TT">Trinidad y Tobago</option>
                                <option value="TN">Túnez</option>
                                <option value="TM">Turkmenistán</option>
                                <option value="TR">Turquía</option>
                                <option value="TV">Tuvalu</option>
                                <option value="UA">Ucrania</option>
                                <option value="UG">Uganda</option>
                                <option value="UY">Uruguay</option>
                                <option value="UZ">Uzbekistán</option>
                                <option value="VU">Vanuatu</option>
                                <option value="VE">Venezuela</option>
                                <option value="VN">Vietnam</option>
                                <option value="YE">Yemen</option>
                                <option value="YU">Yugoslavia</option>
                                <option value="ZM">Zambia</option>
                                <option value="ZW">Zimbabue</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="settings-about-me">Acerca de ti</label><span class="pull-right char-counter text-muted">180</span>
                            <textarea class="form-control" id="settings-about-me" placeholder="Ingresa una descripción"></textarea>
                        </div>

                        </br><button type="submit" class="btn btn-success pull-right">Guardar Cambios</button>
                    </form>                    
                </div>

                <!-- NOTIFICACIONES -->
                <div id="settings-notifications-content" class="settings-option-content col-md-12">                    
                    <form id="settings-notifications-form" role="form">
                        <p class="help-block">Notificarme cuando: </p>
                        <div class="well well-sm">                            
                            <div class="row">
                                <div class="col-md-6 text-right">
                                    <label for="settings-like-notification">Den "me gusta" a un post mio</label>    
                                </div>
                                <div class="col-md-6">
                                    <input type="checkbox" checked="checked" id="settings-like-notification" class="settings-switch"/>
                                </div>                                                    
                            </div></br>

                            <div class="row">
                                <div class="col-md-6 text-right">
                                    <label for="settings-comment-notification">Comenten en un post mio</label>    
                                </div>
                                <div class="col-md-6">
                                    <input type="checkbox" checked="checked" id="settings-comment-notification" class="settings-switch"/>
                                </div>                                                    
                            </div>
                        </div><br/>        
                        <button type="submit" class="btn btn-success pull-right">Guardar Cambios</button>
                    </form>                  
                </div>               
            </div>
        </div>
    </div>

    
<script type="text/javascript">
$(function()
{
    // Prefijo del modal
    var MODAL_PREFIX = 'settings-';

    // constante de la máxima cantidad de caracteres de la descripcion del usuario.
    const USER_DESCRIPTION_MAX_LENGTH = 180;

    // Variables cacheadas
    var $_modal           = $('#' + MODAL_PREFIX + 'modal');            
    var $_menu            = $('#' + MODAL_PREFIX + 'options');            
    var $_contents        = $('.' + MODAL_PREFIX + 'option-content');            
    
    /* PERFIL */
    var $_profileForm     = $('#' + MODAL_PREFIX + 'profile-form');            
    var $_userDescription = $('#' + MODAL_PREFIX + 'about-me');            
    
    /*
     * Evento que inicializa la funcionalidad de
     * la libreria bootstrap-switch
     */    
    $(".settings-switch").bootstrapSwitch();
    
    /*
     * Evento que modifica el contenido del modal dependiendo
     * de la opción seleccionada.
     */
    $_menu.find('label').click(function()
    {
        /*
         * 1- captura el ID de la opción seleccionada.
         * 2- reemplaza el 'option' del ID por 'content'.
         * 3- agrega el signo # al inicio de la cadena.
         */
        var idContent = '#'.concat($(this).attr('id').toString().replace('option', 'content'));
        // ocultamos todos los contenidos del modal
        $_contents.hide();
        // busca dentro del modal y muestra el contenido escogido
        $_modal.find(idContent).show();            
    });

    /*
     * Eventos que se ejecutan cuando el modal se carga
     * pero aún no es visible para el usuario
     */
    $_modal.on('show.bs.modal', function()
    {        
        // removemos la clase .active del menú que lo posea actualmente
        $_menu.find('label.active').removeClass('active');
        // colocamos la clase .active al primer elemento del menú y llama al evento click
        $_menu.find('label:first').addClass('active').click();            
    });

    /*
     * Evento que realiza el conteo de caracteres
     * del titulo y valida cuando sobrepasa el limite.
     */
    $_userDescription.on('keyup change blur', function()
    {
        // calcula los caracteres restantes
        var remainingChars = USER_DESCRIPTION_MAX_LENGTH - $(this).val().length;
        // cacheamos campo que muestra caracteres restantes
        var $charCounter = $_profileForm.find('.char-counter');
        // cacheamos el div que contiene el textarea del título
        var $titleField = $(this).parent('div.form-group');
        // asignamos el valor de los caracteres restantes al elemento
        $charCounter.text(remainingChars);
        // caracteres restantes sobrepasa el límite
        if (remainingChars < 0)
        {
            // colocamos el contador de caracteres de color rojo para indicar error
            $charCounter.addClass('text-danger');
            // colocamos el campo del titulo de color rojo para indicar error
            $titleField.addClass('has-error');
        }
        // caracteres restantes dentro del límite y algun elemento indica error
        else if ((remainingChars >= 0) && ($charCounter.hasClass('text-danger')))
        {
            // removemos el color rojo en el contador de caracteres
            $charCounter.removeClass('text-danger');
            // removemos el color rojo en el campo del título
            $titleField.removeClass('has-error');
        }
    });
});
</script>