$(document).ready(function() {
    //Limpiar form de registro grupo (registroGrup)
    $("#limpiarButtonGrup").click(function(){
        $("#formRegGrup").trigger("reset");
    });
    //Validación formulario de registro de alumno
    $("#btnRegGrupo").click(function (e) {
        e.preventDefault();
        let datos = $("#formRegGrup").serializeArray();
        let err = validaDatosGrup(datos);
        if (err.length === 0) {
            msg("ok","ok");
        } else {
            let mensaje = "<b><i>Estimado docente, el grupo no pudo ser registrado debido a lo siguiente:</b></i><br><br>" +
                    "<ul>";
            $.each(err, function (idx, ele) {
                mensaje += "<li>" + MSJ_ERROR[ele] + "</li>";
            });
            mensaje += "</ul>";
            msgError("Atención", mensaje);
        }
    });

    //Limpiar form de registro alumno (registroAlu)
    $("#limpiarButtonAlu").click(function(){
        $("#formRegAlu").trigger("reset");
    });
    //Validación formulario de registro de alumno
    $("#btnRegAlu").click(function (e) {
        e.preventDefault();
        let datos = $("#formRegAlu").serializeArray();
        let err = validaDatosAlu(datos);
        if (err.length === 0) {
            msg("ok","ok");
        } else {
            let mensaje = "<b><i>Estimado docente, el alumno no pudo ser registrado debido a lo siguiente:</b></i><br><br>" +
                    "<ul>";
            $.each(err, function (idx, ele) {
                mensaje += "<li>" + MSJ_ERROR[ele] + "</li>";
            });
            mensaje += "</ul>";
            msgError("Atención", mensaje);
        }
    });

    //Validación formulario de modificación de alumno
    $("#btnModAlu").click(function (e) {
        e.preventDefault();
        let datos = $("#formModAlu").serializeArray();
        let err = validaDatosAlu(datos);
        if (err.length === 0) {
            msg("ok","ok");
        } else {
            let mensaje = "<b><i>Estimado docente, los datos del alumno no pudieron ser modificado debido a lo siguiente:</b></i><br><br>" +
                    "<ul>";
            $.each(err, function (idx, ele) {
                mensaje += "<li>" + MSJ_ERROR[ele] + "</li>";
            });
            mensaje += "</ul>";
            msgError("Atención", mensaje);
        }
    });
    //Limpiar form de modificación de grupo
    $("#cancelModAlu").click(function(){
        removeColor("#formModAlu :input");
        $("#formModAlu").trigger("reset");
    });

    //Validación formulario de modificación de grupo
    $("#btnModGrupo").click(function (e) {
        e.preventDefault();
        let datos = $("#formModGrup").serializeArray();
        let err = validaDatosGrup(datos);
        if (err.length === 0) {
            msg("ok","ok");
        } else {
            let mensaje = "<b><i>Estimado docente, el grupo no pudo ser modificado debido a lo siguiente:</b></i><br><br>" +
                    "<ul>";
            $.each(err, function (idx, ele) {
                mensaje += "<li>" + MSJ_ERROR[ele] + "</li>";
            });
            mensaje += "</ul>";
            msgError("Atención", mensaje);
        }
    });
    //Limpiar form de modificación de grupo
    $("#cancelModGrup").click(function(){
        removeColor("#formModGrup :input");
        $("#formModGrup").trigger("reset");
    });

    //Validación formulario de generación de carta de término
    $("#btnGenCT").click(function (e) {
        e.preventDefault();
        let datos = $("#formCartaTer").serializeArray();
        let err = validaDatosCT(datos);
        if (err.length === 0) {
            msg("ok","ok");
        } else {
            let mensaje = "<b><i>Estimado docente, la carta de término no pudo ser generada debido a lo siguiente:</b></i><br><br>" +
                    "<ul>";
            $.each(err, function (idx, ele) {
                mensaje += "<li>" + MSJ_ERROR[ele] + "</li>";
            });
            mensaje += "</ul>";
            msgError("Atención", mensaje);
        }
    });







    //--------------------------------------------------------------------------------------------------------------------------
    //FORMATEO de campos registro de alumnos
    //Se limita lo que el usuario puede ingresar mediante teclado
   $("#nomAlu, #apPatAlu, #apMatAlu").on("keypress", function(evento)
   {
       $(this).attr('maxlength','16');
       $(this).attr('minlength','3');
       let caracter = String.fromCharCode(evento.which);
       if(! /[A-ZÁÉÍÓÚÜÑa-záéíóúüñ\s]/.test(caracter))
           evento.preventDefault();
   });
   $("#matrAlu").on("keypress", function(evento)
   {
       $(this).attr('maxlength','8');
       $(this).attr('minlength','8');
       let caracter = String.fromCharCode(evento.which);
       if(! /[0-9]/.test(caracter))
           evento.preventDefault();
   });
   $("#semesAlu").on("keypress", function(evento)
   {
       $(this).attr('maxlength','1');
       $(this).attr('minlength','1');
       let caracter = String.fromCharCode(evento.which);
       if(! /[0-6]/.test(caracter))
           evento.preventDefault();
   });
   //FORMATEO de campos registro de grupo
   $("#claveGrup").on("keypress", function(evento)
   {
       $(this).attr('maxlength','12');
       $(this).attr('minlength','3');
       let caracter = String.fromCharCode(evento.which);
       if(! /[0-9a-zA-ZñÑ-]/.test(caracter) || evento.keyCode == 186)
           evento.preventDefault();
   });
   $("#semesGrup").on("keypress", function(evento)
   {
       $(this).attr('maxlength','1');
       $(this).attr('minlength','1');
       let caracter = String.fromCharCode(evento.which);
       if(! /[0-6]/.test(caracter))
           evento.preventDefault();
   });
   $("#aulaGrup").on("keypress", function(evento)
   {
       $(this).attr('maxlength','20');
       $(this).attr('minlength','1');
       let caracter = String.fromCharCode(evento.which);
       if(! /[A-ZÁÉÍÓÚÜÑa-záéíóúüñ0-9\s]/.test(caracter))
           evento.preventDefault();
   });
   $("#nomERDetall").on("keypress", function(evento)
   {
       $(this).attr('maxlength','30');
       $(this).attr('minlength','3');
       let caracter = String.fromCharCode(evento.which);
       if(! /[A-ZÁÉÍÓÚÜÑa-záéíóúüñ0-9\s]/.test(caracter))
           evento.preventDefault();
   });
   $("#dirERDetall").on("keypress", function(evento)
   {
       $(this).attr('maxlength','60');
       $(this).attr('minlength','3');
       let caracter = String.fromCharCode(evento.which);
       if(! /[A-ZÁÉÍÓÚÜÑa-záéíóúüñ0-9.#\s]/.test(caracter))
           evento.preventDefault();
   });
   $("#telERDetall").on("keypress", function(evento)
   {
       $(this).attr('maxlength','13');
       $(this).attr('minlength','10');
       let caracter = String.fromCharCode(evento.which);
       if(! /[0-9]/.test(caracter))
           evento.preventDefault();
   });
   $("#respERDetall").on("keypress", function(evento)
   {
       $(this).attr('maxlength','30');
       $(this).attr('minlength','3');
       let caracter = String.fromCharCode(evento.which);
       if(! /[A-ZÁÉÍÓÚÜÑa-záéíóúüñ\s]/.test(caracter))
           evento.preventDefault();
   });
   $("#horasERDetall").on("keypress", function(evento)
   {
       $(this).attr('maxlength','3');
       $(this).attr('minlength','2');
       let caracter = String.fromCharCode(evento.which);
       if(! /[0-9]/.test(caracter))
           evento.preventDefault();
   });
});

//--------------------------------------------------------------------------------------------------------------------------
//Mis funciones
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
function msgCallback(titulo, mensaje, elemento)
{
    bootbox.alert({
        title: titulo,
        message: mensaje,
        buttons:{
            ok:{
                label: "Aceptar",
                className: "btn-danger"
            }
        },
        callback: function () {
            //console.log(elemento.val());
            elemento.siblings(".custom-file-label").addClass("selected").html("Seleccionar Archivo");
        }
    });
}