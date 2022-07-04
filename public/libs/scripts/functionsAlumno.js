$(document).ready(function() {
    //Validación formulario de datos personales
    $("#btnActualuarDatosPer").click(function (e) {
        e.preventDefault();
        let datos = $("#formDatosPerAlu").serializeArray();
        let err = validaDatosPer(datos);
        if (err.length === 0) {
            //msg("ok", "ok");
            $('#formDatosPerAlu').off('submit').submit();
            //let datosActualizar = [{name:'curp' ,value:datos[6].value}, {name:'correo' ,value:datos[7].value}, {name:'telefono' ,value:datos[8].value},
            //                        {name:'fecha_nac' ,value:datos[9].value}, {name:'nss' ,value:datos[10].value}, {name:'seguro_med' ,value:datos[11].value}];
            //console.log(datosActualizar);
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
    //select de municipios
    $('#municipioAlu, #estadoAlu').selectize();
    //Validación formulario de datos domiciliarios
    $("#btnActualuarDatosDom").click(function (e) {
        e.preventDefault();
        let datos = $("#formDatosDomAlu").serializeArray();
        let err = validaDatosDom(datos);
        if (err.length === 0) {
            //msg("ok", "ok");
            $('#formDatosDomAlu').off('submit').submit();
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
            //msg("ok", "ok");
            $('#formDatosTutor').off('submit').submit();
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
            //msg("ok", "ok");
            $('#formDatosEscReal').off('submit').submit();
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
    //Validación - subir Permiso
    $("#btnSubirPermiso").on("click", function (e) {
        if ($("#subirPermiso").val() == "") {
            e.preventDefault();
            msgError("<b>Atención</b>",
                "Tu <i><b>Permiso</b></i> debe ser un archivo válido.");
        }
    });
    $("#subirPermiso").on('change', function () {
        var ext = $(this).val().split('.').pop();
        if ($(this).val() != "") {
            if (ext == "pdf") {
                if ($(this)[0].files[0].size > 1048576) { // 1 MB
                    $(this).val("");
                    msgCallback("<b>Atención</b>",
                        "El archivo <i><b>es demasiado pesado</b></i>, no debe sobrepasar 1MB.",
                        $("#subirPermiso"));
                }
            }
            else {
                $(this).val("");
                msgCallback("<b>Atención</b>",
                    "Tu <i><b>Permiso</b></i> debe ser un archivo válido.",
                    $("#subirPermiso"));
            }
        }
    });
    //Validación - subir Guía de observación
    $("#btnSubirGuiaObs").on("click", function (e) {
        if ($("#subirGuiaObs").val() == "") {
            e.preventDefault();
            msgError("<b>Atención</b>",
                "Tu <i><b>Guía de observación</b></i> debe ser un archivo válido.");
        }
    });
    $("#subirGuiaObs").on('change', function () {
        var ext = $(this).val().split('.').pop();
        if ($(this).val() != "") {
            if (ext == "pdf") {
                if ($(this)[0].files[0].size > 2097152) { // 2 MB
                    $(this).val("");
                    msgCallback("<b>Atención</b>",
                        "El archivo <i><b>es demasiado pesado</b></i>, no debe sobrepasar 2MB.",
                        $("#subirGuiaObs"));
                }
            }
            else {
                $(this).val("");
                msgCallback("<b>Atención</b>",
                    "Tu <i><b>Guía de observación</b></i> debe ser un archivo válido.",
                    $("#subirGuiaObs"));
            }
        }
    });
    //Validación - subir INE
    $("#btnSubirINE").on("click", function (e) {
        if ($("#subirINE").val() == "") {
            e.preventDefault();
            msgError("<b>Atención</b>",
                "La copia de tu <i><b>INE</b></i> debe ser un archivo válido.");
        }
    });
    $("#subirINE").on('change', function () {
        var ext = $(this).val().split('.').pop();
        if ($(this).val() != "") {
            if (ext == "pdf") {
                if ($(this)[0].files[0].size > 1048576) { // 1 MB
                    $(this).val("");
                    msgCallback("<b>Atención</b>",
                        "El archivo <i><b>es demasiado pesado</b></i>, no debe sobrepasar 1MB.",
                        $("#subirINE"));
                }
            }
            else {
                $(this).val("");
                msgCallback("<b>Atención</b>",
                    "La copia de tu <i><b>INE</b></i> debe ser un archivo válido.",
                    $("#subirINE"));
            }
        }
    });
    //Validación - subir acta de nacimiento
    $("#btnsubirActNac").on("click", function (e) {
        if ($("#subirActNac").val() == "") {
            e.preventDefault();
            msgError("<b>Atención</b>",
                "La copia de tu <i><b>Acta de nacimiento</b></i> debe ser un archivo válido.");
        }
    });
    $("#subirActNac").on('change', function () {
        var ext = $(this).val().split('.').pop();
        if ($(this).val() != "") {
            if (ext == "pdf") {
                if ($(this)[0].files[0].size > 1048576) { //1 MB
                    $(this).val("");
                    msgCallback("<b>Atención</b>",
                        "El archivo <i><b>es demasiado pesado</b></i>, no debe sobrepasar 1MB.",
                        $("#subirActNac"));
                }
            }
            else {
                $(this).val("");
                msgCallback("<b>Atención</b>",
                    "La copia de tu <i><b>Acta de nacimiento</b></i> debe ser un archivo válido.",
                    $("#subirActNac"));
            }
        }
    });
    //Validación - subir carta de autorización
    $("#btnSubirCartAut").on("click", function (e) {
        if ($("#subirCartAut").val() == "") {
            e.preventDefault();
            msgError("<b>Atención</b>",
                "La <i><b>carta de autorización</b></i> debe ser un archivo válido.");
        }
    });
    $("#subirCartAut").on('change', function () {
        var ext = $(this).val().split('.').pop();
        if ($(this).val() != "") {
            if (ext == "pdf") {
                if ($(this)[0].files[0].size > 1048576) { //1 MB
                    $(this).val("");
                    msgCallback("<b>Atención</b>",
                        "El archivo <i><b>es demasiado pesado</b></i>, no debe sobrepasar 1MB.",
                        $("#subirCartAut"));
                }
            }
            else {
                $(this).val("");
                msgCallback("<b>Atención</b>",
                    "La <i><b>carta de autorización</b></i> debe ser un archivo válido.",
                    $("#subirCartAut"));
            }
        }
    });
    //Validación - subir constancia de termino
    $("#btnSubirCartPres").on("click", function (e) {
        if ($("#subirCartPres").val() == "") {
            e.preventDefault();
            msgError("<b>Atención</b>",
                "La <i><b>carta de presentación</b></i> debe ser un archivo válido.");
        }
    });
    $("#subirCartPres").on('change', function () {
        var ext = $(this).val().split('.').pop();
        if ($(this).val() != "") {
            if (ext == "pdf") {
                if ($(this)[0].files[0].size > 1048576) { //1 MB
                    $(this).val("");
                    msgCallback("<b>Atención</b>",
                    "El archivo <i><b>es demasiado pesado</b></i>, no debe sobrepasar 1MB.",
                        $("#subirCartPres"));
                }
            }
            else {
                $(this).val("");
                msgCallbackg("<b>Atención</b>",
                    "La <i><b>carta de presentación</b></i> debe ser un archivo válido.",
                    $("#subirCartPres"));
            }
        }
    });
    //Validación - subir constancia de termino
    $("#btnSubirCartTer").on("click", function (e) {
        if ($("#subirCartTer").val() == "") {
            e.preventDefault();
            msgError("<b>Atención</b>",
                "La <i><b>constancia de término</b></i> debe ser un archivo válido.");
        }
    });
    $("#subirCartTer").on('change', function () {
        var ext = $(this).val().split('.').pop();
        if ($(this).val() != "") {
            if (ext == "pdf") {
                if ($(this)[0].files[0].size > 1048576) { //1 MB
                    $(this).val("");
                    msgCallback("<b>Atención</b>",
                        "El archivo <i><b>es demasiado pesado</b></i>, no debe sobrepasar 1MB.",
                        $("#subirCartTer"));
                }
            }
            else {
                $(this).val("");
                msgCallbackg("<b>Atención</b>",
                    "La <i><b>constancia de término</b></i> debe ser un archivo válido.",
                    $("#subirCartTer"));
            }
        }
    });
    //Validación - subir informe
    $("#btnSubirInforme").on("click", function (e) {
        if ($("#subirInforme").val() == "") {
            e.preventDefault();
            msgError("<b>Atención</b>",
                "El <i><b>informe</b></i> debe ser un archivo válido.");
        }
    });
    $("#subirInforme").on('change', function () {
        var ext = $(this).val().split('.').pop();
        if ($(this).val() != "") {
            if (ext == "pdf") {
                if ($(this)[0].files[0].size > 1048576) { //1 MB
                    $(this).val("");
                    msgCallback("<b>Atención</b>",
                        "El archivo <i><b>es demasiado pesado</b></i>, no debe sobrepasar 1MB.",
                        $("#subirInforme"));
                }
            }
            else {
                $(this).val("");
                msgCallback("<b>Atención</b>",
                    "El <i><b>informe</b></i> debe ser un archivo válido.",
                    $("#subirInforme"));
            }
        }
    });
    //Validación - subir MTP
    $("#btnSubirMTP").on("click", function (e) {
        if ($("#subirMTP").val() == "") {
            e.preventDefault();
            msgError("<b>Atención</b>",
                "Las <i><b>Memorias de trabajo profesional</b></i> seleccionadas no son un archivo válido.");
        }
    });
    $("#subirMTP").on('change', function () {
        var ext = $(this).val().split('.').pop();
        if ($(this).val() != "") {
            if (ext == "pdf") {
                if ($(this)[0].files[0].size > 2097152) { //2 MB
                    $(this).val("");
                    msgCallback("<b>Atención</b>",
                        "El archivo <i><b>es demasiado pesado</b></i>, no debe sobrepasar 2MB.",
                        $("#subirMTP"));
                }
            }
            else {
                $(this).val("");
                msgCallback("<b>Atención</b>",
                    "Las <i><b>Memorias de trabajo profesional</b></i> seleccionadas no son un archivo válido.",
                    $("#subirMTP"));
            }
        }
    });
    //Validación - subir bitácoras
    $("#btnSubirBitacoras").on("click", function (e) {
        if ($("#subirBitacoras").val() == "") {
            e.preventDefault();
            msgError("<b>Atención</b>",
                "Las <i><b>bitácoras</b></i> debe ser un archivo válido.");
        }
    });
    $("#subirBitacoras").on('change', function () {
        var ext = $(this).val().split('.').pop();
        if ($(this).val() != "") {
            if (ext == "pdf") {
                if ($(this)[0].files[0].size > 1048576) { //1 MB
                    $(this).val("");
                    msgCallback("<b>Atención</b>",
                        "El archivo <i><b>es demasiado pesado</b></i>, no debe sobrepasar 1MB.",
                        $("#subirBitacoras"));
                }
            }
            else {
                $(this).val("");
                msgCallback("<b>Atención</b>",
                    "Las <i><b>bitácoras</b></i> deben ser un archivo válido.",
                    $("#subirBitacoras"));
            }
        }
    });

    //--------------------------------------------------------------------------------------------------------------------------
    //FORMATEO de campos datos personales
    //Se limita lo que el usuario puede ingresar mediante teclado
    $("#nomAlu, #apPatAlu, #apMatAlu").on("keypress", function (evento) {
        $(this).attr('maxlength', '16');
        $(this).attr('minlength', '3');
        let caracter = String.fromCharCode(evento.which);
        if (! /[A-ZÁÉÍÓÚÜÑa-záéíóúüñ\s]/.test(caracter))
            evento.preventDefault();
    });
    $("#matrAlu").on("keypress", function (evento) {
        $(this).attr('maxlength', '8');
        $(this).attr('minlength', '8');
        let caracter = String.fromCharCode(evento.which);
        if (! /[0-9]/.test(caracter))
            evento.preventDefault();
    });
    $("#curpAlu").on("input", function (evento) {
        $(this).attr('maxlength', '18');
        $(this).attr('minlength', '18');
        let posCursor = this.selectionStart;
        let texto = $(this).val();
        $(this).val(texto.toUpperCase());
        this.selectionStart = posCursor;
        this.selectionEnd = posCursor;
    });
    $("#telAlu").on("keypress", function (evento) {
        $(this).attr('maxlength', '10');
        $(this).attr('minlength', '10');
        let caracter = String.fromCharCode(evento.which);
        if (! /[0-9]/.test(caracter))
            evento.preventDefault();
    });
    $("#nssAlu").on("keypress", function (evento) {
        $(this).attr('maxlength', '11');
        $(this).attr('minlength', '11');
        let caracter = String.fromCharCode(evento.which);
        if (! /[0-9]/.test(caracter))
            evento.preventDefault();
    });
    /*$("#segMedAlu").on("input", function (evento) {
        $(this).attr('maxlength', '18');
        $(this).attr('minlength', '18');
        let posCursor = this.selectionStart;
        let texto = $(this).val();
        $(this).val(texto.toUpperCase());
        this.selectionStart = posCursor;
        this.selectionEnd = posCursor;
    });*/
    //FORMATEO de campos datos domiciliarios
    $("#calleAlu, #coloniaAlu").on("keypress", function (evento) {
        $(this).attr('maxlength', '35');
        $(this).attr('minlength', '3');
        let caracter = String.fromCharCode(evento.which);
        if (! /[A-ZÁÉÍÓÚÜÑa-záéíóúüñ0-9\s]/.test(caracter))
            evento.preventDefault();
    });
    $("#cpAlu, #numExAlu").on("keypress", function (evento) {
        $(this).attr('maxlength', '5');
        $(this).attr('minlength', '5');
        let caracter = String.fromCharCode(evento.which);
        if (! /[0-9]/.test(caracter))
            evento.preventDefault();
    });
    //FORMATEO de campos datos escenario real
    $("#nomER, #dirER, #cargoER").on("keypress", function (evento) {
        $(this).style.height = 'auto';
        $(this).style.height = ($(this).scrollHeight) + 'px';
        $(this).attr('maxlength', '150');
        $(this).attr('minlength', '3');
    });
    $("#dirER").keyup(function(e) {
        while($(this).outerHeight() < this.scrollHeight + parseFloat($(this).css("borderTopWidth")) + parseFloat($(this).css("borderBottomWidth"))) {
            $(this).height($(this).height()+1);
        };
    });
    $("#telER").on("keypress", function (evento) {
        $(this).attr('maxlength', '10');
        $(this).attr('minlength', '10');
        let caracter = String.fromCharCode(evento.which);
        if (! /[0-9]/.test(caracter))
            evento.preventDefault();
    });
    $("#respER, #apPatER, #apMatER").on("keypress", function (evento) {
        $(this).attr('maxlength', '16');
        $(this).attr('minlength', '3');
        let caracter = String.fromCharCode(evento.which);
        if (! /[A-ZÁÉÍÓÚÜÑa-záéíóúüñ\s]/.test(caracter))
            evento.preventDefault();
    });
    //Eventos para obtener la fecha de nacimiento a partir de la CURP
    $("#curpAlu").focusout(function () {
        $("#fechNacAlu").val(curp2date($("#curpAlu").val()));
    });
    $("#curpAlu").focusin(function () {
        $("#fechNacAlu").val(curp2date($("#curpAlu").val()));
    });
    $("#curpAlu").keypress(function () {
        $("#fechNacAlu").val(curp2date($("#curpAlu").val()));
    });
});

//--------------------------------------------------------------------------------------------------------------------------
//Mis funciones
function msg(titulo, mensaje) {
    bootbox.alert({
        title: titulo,
        message: mensaje,
        buttons: {
            ok: {
                label: "Aceptar",
                className: "btn-info"
            }
        }
    });
}
function msgError(titulo, mensaje) {
    bootbox.alert({
        title: titulo,
        message: mensaje,
        buttons: {
            ok: {
                label: "Aceptar",
                className: "btn-danger"
            }
        }
    });
}
function msgCallback(titulo, mensaje, elemento) {
    bootbox.alert({
        title: titulo,
        message: mensaje,
        buttons: {
            ok: {
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
//Función para obtener la fecha a partir de la CURP del alumno
function curp2date(curp) {
    let actualAnio = ((new Date).getFullYear()).toString();
    let valido = EXP_REG_CURP.test(curp);
    if (valido) {
        let fechaNac = curp.substring(4, 10);
        console.log(fechaNac);
        let fechaResultante;
        let anio = fechaNac.substring(0, 2);
        anio = parseInt(anio) + 2000;
        anio = anio.toString();
        console.log(anio);
        let mes = fechaNac.substring(2, 4);
        console.log(mes);
        let dia = fechaNac.substring(4, 6);
        console.log(dia);
        if (parseInt(anio) >= actualAnio) {
            anio = parseInt(anio) - 100;
            anio = anio.toString();
            console.log(anio);
        }
        fechaResultante = anio + "-" + mes + "-" + dia;
        console.log(fechaResultante);
        return fechaResultante;
    }
}