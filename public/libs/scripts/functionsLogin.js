var cd;
var esPermitido = false;
$(document).ready(function() {
    crearCaptcha();

    $("#btnLogin").click(function (e) {
        e.preventDefault();
        $('#btnLogin').prop('disabled', true);
        $('#btnLogin').html(`<i class="fas fa-spinner fa-spin"></i>`);
        let datos = $("#formLogin").serializeArray();
        let err = validaDatosLogin(datos);
        if (err.length === 0) {
            revisarCaptcha();
        } else {
            $('#btnLogin').html(`Entrar`);
            $('#btnLogin').prop('disabled', false);
            let mensaje = "<b><i>Estimado usuario, no pudo iniciar sesión debido a lo siguiente:</b></i><br><br>" +
                    "<ul>";
            $.each(err, function (idx, ele) {
                mensaje += "<li>" + MSJ_ERROR[ele] + "</li>";
            });
            mensaje += "</ul>";
            msgError("Atención", mensaje);
        }
    });

    $("#matricula").on("keypress", function(evento)
   {
       $(this).attr('maxlength','10');
       $(this).attr('minlength','10');
       let caracter = String.fromCharCode(evento.which);
       if(! /[0-9]/.test(caracter))
           evento.preventDefault();
   });
});

// Se revisa que los campos de usuario y contraseña no estén vacíos
function revisarCampos(){
    if ($("#matricula").val() === "") {
        $('#msjErrorUser').text('Usuario no ingresado.').show();
    } else if($("#password").val() === "") {
        $('#msjErrorPassword').text('La contraseña no puede estár vacía.').show();
    }else if($("#user").val() !== "" && ("#password").val() !== ""){
        $('#msjErrorUser').fadeOut(100);
        $('#msjErrorPassword').fadeOut(100);
    }
}
 
// Se crea el captcha
function crearCaptcha() {
  //$('#InvalidCapthcaError').hide();
  var alpha = new Array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
                    
  var i;
  for (i = 0; i < 6; i++) {
    var a = alpha[Math.floor(Math.random() * alpha.length)];
    var b = alpha[Math.floor(Math.random() * alpha.length)];
    var c = alpha[Math.floor(Math.random() * alpha.length)];
    var d = alpha[Math.floor(Math.random() * alpha.length)];
    var e = alpha[Math.floor(Math.random() * alpha.length)];
    var f = alpha[Math.floor(Math.random() * alpha.length)];
  }
  cd = a + ' ' + b + ' ' + c + ' ' + d + ' ' + e + ' ' + f;
  $('#captchaImagenCodigo').empty().append('<canvas id="CapCode" class="capcode"style="width:100%; height:100%""></canvas>')
  
  var c = document.getElementById("CapCode"),
      ctx=c.getContext("2d"),
      x = c.width / 2,
      img = new Image();
 
  img.src = "img/captchaback.jpg";
  img.onload = function () {
      var pattern = ctx.createPattern(img, "repeat");
      ctx.fillStyle = pattern;
      ctx.fillRect(0, 0, c.width, c.height);
      ctx.font="50px Roboto Slab";
      ctx.fillStyle = '#212121';
      ctx.textAlign = 'center';
      ctx.setTransform (1, -0.12, 0, 1, 0, 15);
      ctx.fillText(cd,x,55);
  };
}
 
// Se valida el Captcha
function validarCaptcha() {
  var string1 = quitarEspacios(cd);
  var string2 = quitarEspacios($('#usuarioCaptcha').val());
  if (string1 == string2) {
    return true;
  }
  else {
    return false;
  }
}
 
// Quitar espacios del captcha
function quitarEspacios(string) {
  return string.split(' ').join('');
}
 
// Revisar la validez del captcha
function revisarCaptcha() {
  var result = validarCaptcha();
  if( $("#usuarioCaptcha").val() == "" || $("#usuarioCaptcha").val() == null || $("#usuarioCaptcha").val() == "undefined") {
    //msgError("Atención", "Por favor, ingrese el código de seguridad mostrado");
    $('#msjErrorCaptcha').text('Por favor ingrese el código de seguridad mostrado.').show();
    $('#usuarioCaptcha').focus();
    $('#btnLogin').html(`Entrar`);
    $('#btnLogin').prop('disabled', false);
  } else {
    if(result == false) { 
      esPermitido = false;
      $('#msjErrorCaptcha').text('Código incorrecto, intente nuevamente.').show();
      //msgError("Atención", "Código incorrecto, intente de nuevo");
      $('#btnLogin').html(`Entrar`);
      $('#btnLogin').prop('disabled', false);
      crearCaptcha();
      $('#usuarioCaptcha').focus().select();
    }
    else { 
      esPermitido = true;
      $('#usuarioCaptcha').val('').attr('place-holder','Ingrese el código de seguridad - minúsculas y mayúsculas');
      crearCaptcha();
      $('#msjErrorCaptcha').fadeOut(100);
      //msg("Ok","Aquí acción de login");
      $('#formLogin').off('submit').submit();
    }
  }  
}
//Mensajes
function msg(titulo, mensaje)
{
    bootbox.alert({
        title: titulo,
        message: mensaje,
        buttons:{
            ok:{
                label: "Aceptar",
                className: "btn-info"
            }
        }
    });
}
function msgError(titulo, mensaje)
{
    bootbox.alert({
        title: titulo,
        message: mensaje,
        buttons:{
            ok:{
                label: "Aceptar",
                className: "btn-danger"
            }
        }
    });
}

function validaDatosLogin(datos) {
    let err = [];

    colorInput(EXP_REG_MATRICULA.test(datos[1].value), $("#matricula"), err, 3);
    colorInput(datos[2].value !== "", $("#password"), err, 30);
    return err;
}
//Método que permite colorear los imputs dependiendo de su estatus (correcto o incorrecto)
function colorInput(valido, elem, arr, n) {
    if (valido) {
        elem.removeClass('is-invalid');
        elem.addClass('is-valid');
    } else {
        elem.removeClass('is-valid');
        elem.addClass('is-invalid');
        arr.push(n);
    }
}

function removeColor(form){
    $(form).each(function(){
        $(this).removeClass('is-invalid');
        $(this).removeClass('is-valid');
    });
}