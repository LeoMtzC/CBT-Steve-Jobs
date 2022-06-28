$(document).ready(function() {
    //Validación formulario de datos personales
    $("#btnActualuarDatosPer").click(function (e) {
        e.preventDefault();
        let datos = $("#formDatosPerAlu").serializeArray();
        let err = validaDatosPer(datos);
        if (err.length === 0) {
            msg("ok","ok");
        } else {
            let mensaje = "<b><i>Estimado alumno, sus datos personales no fueron actualizados debido a lo siguiente:</b></i><br><br>" +
                    "<ul>";
            $.each(err, function (idx, ele) {
                mensaje += "<li>" + MSJ_ERROR[ele] + "</li>";
            });
            mensaje += "</ul>";
            msgError("Atención", mensaje);
        }
    });
    //Validación formulario de datos domiciliarios
    $("#btnActualuarDatosDom").click(function (e) {
        e.preventDefault();
        let datos = $("#formDatosDomAlu").serializeArray();
        let err = validaDatosDom(datos);
        if (err.length === 0) {
            msg("ok","ok");
        } else {
            let mensaje = "<b><i>Estimado alumno, sus datos domiciliarios no fueron actualizados debido a lo siguiente:</b></i><br><br>" +
                    "<ul>";
            $.each(err, function (idx, ele) {
                mensaje += "<li>" + MSJ_ERROR[ele] + "</li>";
            });
            mensaje += "</ul>";
            msgError("Atención", mensaje);
        }
    });
    //Validación formulario de datos del tutor
    $("#btnActualuarDatosTutor").click(function (e) {
        e.preventDefault();
        let datos = $("#formDatosTutor").serializeArray();
        let err = validaDatosTutor(datos);
        if (err.length === 0) {
            msg("ok","ok");
        } else {
            let mensaje = "<b><i>Estimado alumno, los datos de su tutor no fueron actualizados debido a lo siguiente:</b></i><br><br>" +
                    "<ul>";
            $.each(err, function (idx, ele) {
                mensaje += "<li>" + MSJ_ERROR[ele] + "</li>";
            });
            mensaje += "</ul>";
            msgError("Atención", mensaje);
        }
    });
    //Validación formulario de datos del escenario real
    $("#btnActualuarDatosEscReal").click(function (e) {
        e.preventDefault();
        let datos = $("#formDatosEscReal").serializeArray();
        let err = validaDatosEscR(datos);
        if (err.length === 0) {
            msg("ok","ok");
        } else {
            let mensaje = "<b><i>Estimado alumno, los datos del escenario real no fueron actualizados debido a lo siguiente:</b></i><br><br>" +
                    "<ul>";
            $.each(err, function (idx, ele) {
                mensaje += "<li>" + MSJ_ERROR[ele] + "</li>";
            });
            mensaje += "</ul>";
            msgError("Atención", mensaje);
        }
    });
    //Validación - subir INE
    $("#btnSubirINE").on("click",function(e) {
        e.preventDefault();
        if($("#subirINE").val() == ""){
            msgError("<b>Atención</b>",
                    "La copia de tu <i><b>INE</b></i> debe ser un archivo válido.");
        }
    });
    $("#subirINE").on('change', function(){
        var ext = $( this ).val().split('.').pop();
        if ($(this).val() != "") {
          if(ext == "pdf"){
            if($(this)[0].files[0].size > 1048576){
                $(this).val("");
                msgCallback("<b>Atención</b>",
                "El archivo <i><b>es demasiado pesado</b></i>, no debe sobrepasar 1MB.",
                $("#subirINE"));
            }
          }
          else
          {
            $(this).val("");
            msgCallback("<b>Atención</b>",
                    "La copia de tu <i><b>INE</b></i> debe ser un archivo válido.",
                    $("#subirINE"));
          }
        }
    });
    //Validación - subir acta de nacimiento
    $("#btnsubirActNac").on("click",function(e) {
        e.preventDefault();
        if($("#subirActNac").val() == ""){
            msgError("<b>Atención</b>",
                    "La copia de tu <i><b>Acta de nacimiento</b></i> debe ser un archivo válido.");
        }
    });
    $("#subirActNac").on('change', function(){
        var ext = $( this ).val().split('.').pop();
        if ($(this).val() != "") {
          if(ext == "pdf"){
            if($(this)[0].files[0].size > 1048576){
                $(this).val("");
                msgCallback("<b>Atención</b>",
                "El archivo <i><b>es demasiado pesado</b></i>, no debe sobrepasar 1MB.",
                $("#subirActNac"));
            }
          }
          else
          {
            $(this).val("");
            msgCallback("<b>Atención</b>",
                    "La copia de tu <i><b>Acta de nacimiento</b></i> debe ser un archivo válido.",
                    $("#subirActNac"));
          }
        }
    });
    //Validación - subir carta de autorización
    $("#btnSubirCartAut").on("click",function(e) {
        e.preventDefault();
        if($("#subirCartAut").val() == ""){
            msgError("<b>Atención</b>",
                    "La <i><b>carta de autorización</b></i> debe ser un archivo válido.");
        }
    });    
    $("#subirCartAut").on('change', function(){
        var ext = $( this ).val().split('.').pop();
        if ($(this).val() != "") {
          if(ext == "pdf"){
            if($(this)[0].files[0].size > 1048576){
                $(this).val("");
                msgCallback("<b>Atención</b>",
                "El archivo <i><b>es demasiado pesado</b></i>, no debe sobrepasar 1MB.",
                $("#subirCartAut"));
            }
          }
          else
          {
            $(this).val("");
            msgCallback("<b>Atención</b>",
                "La <i><b>carta de autorización</b></i> debe ser un archivo válido.",
                $("#subirCartAut"));
          }
        }
    });
    //Validación - subir carta de termino
    $("#btnSubirCartTer").on("click",function(e) {
        e.preventDefault();
        if($("#subirCartTer").val() == ""){
            msgError("<b>Atención</b>",
                    "La <i><b>carta de término</b></i> debe ser un archivo válido.");
        }
    });
    $("#subirCartTer").on('change', function(){
        var ext = $( this ).val().split('.').pop();
        if ($(this).val() != "") {
          if(ext == "pdf"){
            if($(this)[0].files[0].size > 1048576){
                $(this).val("");
                msgCallback("<b>Atención</b>",
                "El archivo <i><b>es demasiado pesado</b></i>, no debe sobrepasar 1MB.",
                $("#subirCartTer"));
            }
          }
          else
          {
            $(this).val("");
            msgCallbackg("<b>Atención</b>",
                "La <i><b>carta de termino</b></i> debe ser un archivo válido.",
                $("#subirCartTer"));
          }
        }
    });    
    //Validación - subir informe
    $("#btnSubirInforme").on("click",function(e) {
        e.preventDefault();
        if($("#subirInforme").val() == ""){
            msgError("<b>Atención</b>",
                    "El <i><b>informe</b></i> debe ser un archivo válido.");
        }
    });    
    $("#subirInforme").on('change', function(){
        var ext = $( this ).val().split('.').pop();
        if ($(this).val() != "") {
          if(ext == "pdf"){
            if($(this)[0].files[0].size > 10485760){
                $(this).val("");
                msgCallback("<b>Atención</b>",
                "El archivo <i><b>es demasiado pesado</b></i>, no debe sobrepasar 10MB.",
                $("#subirInforme"));
            }
          }
          else
          {
            $(this).val("");
            msgCallback("<b>Atención</b>",
                "El <i><b>informe</b></i> debe ser un archivo válido.",
                $("#subirInforme"));
          }
        }
    });
    //Validación - subir MTP
    $("#btnSubirMTP").on("click",function(e) {
        e.preventDefault();
        if($("#subirMTP").val() == ""){
            msgError("<b>Atención</b>",
                    "Las <i><b>Memorias de trabajo profesional</b></i> seleccionadas no son un archivo válido.");
        }
    });
    $("#subirMTP").on('change', function(){
        var ext = $( this ).val().split('.').pop();
        if ($(this).val() != "") {
          if(ext == "pdf"){
            if($(this)[0].files[0].size > 10485760){
                $(this).val("");
                msgCallback("<b>Atención</b>",
                "El archivo <i><b>es demasiado pesado</b></i>, no debe sobrepasar 10MB.",
                $("#subirMTP"));
            }
          }
          else
          {
            $(this).val("");
            msgCallback("<b>Atención</b>",
                "Las <i><b>Memorias de trabajo profesional</b></i> seleccionadas no son un archivo válido.",
                $("#subirMTP"));
          }
        }
    });

    //--------------------------------------------------------------------------------------------------------------------------
    //FORMATEO de campos datos personales
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
    $("#curpAlu").on("input", function (evento) {
        $(this).attr('maxlength','18');
        $(this).attr('minlength','18'); 
        let posCursor = this.selectionStart;
        let texto = $(this).val();
        $(this).val(texto.toUpperCase());
        this.selectionStart = posCursor;
        this.selectionEnd = posCursor;
    });
   $("#telAlu").on("keypress", function(evento)
   {
       $(this).attr('maxlength','13');
       $(this).attr('minlength','10');
       let caracter = String.fromCharCode(evento.which);
       if(! /[0-9]/.test(caracter))
           evento.preventDefault();
   });
   $("#nssAlu").on("keypress", function(evento)
   {
       $(this).attr('maxlength','11');
       $(this).attr('minlength','11');
       let caracter = String.fromCharCode(evento.which);
       if(! /[0-9]/.test(caracter))
           evento.preventDefault();
   });
   $("#segMedAlu").on("input", function (evento) {
    $(this).attr('maxlength','18');
    $(this).attr('minlength','18'); 
    let posCursor = this.selectionStart;
    let texto = $(this).val();
    $(this).val(texto.toUpperCase());
    this.selectionStart = posCursor;
    this.selectionEnd = posCursor;
    });
    //FORMATEO de campos datos domiciliarios
   $("#calleAlu, #coloniaAlu").on("keypress", function(evento)
   {
       $(this).attr('maxlength','35');
       $(this).attr('minlength','3');
       let caracter = String.fromCharCode(evento.which);
       if(! /[A-ZÁÉÍÓÚÜÑa-záéíóúüñ0-9\s]/.test(caracter))
           evento.preventDefault();
   });
   $("#cpAlu, #numExAlu").on("keypress", function(evento)
   {
       $(this).attr('maxlength','5');
       $(this).attr('minlength','5');
       let caracter = String.fromCharCode(evento.which);
       if(! /[0-9]/.test(caracter))
           evento.preventDefault();
   });
   //FORMATEO de campos datos escenario real
   $("#nomER, #dirER").on("keypress", function(evento)
   {
       $(this).attr('maxlength','150');
       $(this).attr('minlength','3');
   });
   $("#telER").on("keypress", function(evento)
   {
       $(this).attr('maxlength','13');
       $(this).attr('minlength','10');
       let caracter = String.fromCharCode(evento.which);
       if(! /[0-9]/.test(caracter))
           evento.preventDefault();
   });
   $("#respER, #apPatER, #apMatER").on("keypress", function(evento)
   {
        $(this).attr('maxlength','16');
        $(this).attr('minlength','3');
        let caracter = String.fromCharCode(evento.which);
        if(! /[A-ZÁÉÍÓÚÜÑa-záéíóúüñ\s]/.test(caracter))
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