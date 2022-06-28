//Se validan los datos de los formularios correspondientes y en caso de tener error se regresa el mismo para manejarlo
//Formulario de registro de alumno
function validaDatosAlu(datos) {
    console.log(datos);
    let err = [];

    colorInput(EXP_REG_NOMBRE.test(datos[0].value), $("#nomAlu"), err, 0);
    colorInput(EXP_REG_NOMBRE.test(datos[1].value), $("#apPatAlu"), err, 1);
    colorInput(EXP_REG_NOMBRE.test(datos[2].value), $("#apMatAlu"), err, 2);
    colorInput(EXP_REG_MATRICULA.test(datos[3].value), $("#matrAlu"), err, 3);
    colorInput(datos[4].value !== "", $("#semesAlu"), err, 4);
    colorInput(datos[5].value !== "", $("#carreraAlu"), err, 5);
    colorInput(datos[6].value !== "", $("#grupoAlu"), err, 23);
    return err;
}
//Formulario de registro de grupo
function validaDatosGrup(datos) {
    console.log(datos);
    let err = [];

    colorInput(EXP_REG_CLAVE_GRUPO.test(datos[0].value), $("#claveGrup"), err, 24);
    colorInput(EXP_REG_SEMESTRE.test(datos[1].value), $("#semesGrup"), err, 4);
    colorInput(EXP_REG_CALLECOL.test(datos[2].value), $("#aulaGrup"), err, 26);
    colorInput(datos[3].value !== "", $("#carreraGrup"), err, 27);
    colorInput(datos[4].value !== "", $("#estadoGrup"), err, 28);
    return err;
}
//Formulario de generación de carta de término
function validaDatosCT(datos) {
    console.log(datos);
    let err = [];

    colorInput(EXP_REG_CALLECOL.test(datos[0].value), $("#nomERDetall"), err, 19);
    colorInput(EXP_REG_DIRCOMP.test(datos[1].value), $("#dirERDetall"), err, 20);
    colorInput(EXP_REG_TEL.test(datos[2].value), $("#telERDetall"), err, 9);
    colorInput(EXP_REG_NOMBRE.test(datos[3].value), $("#respERDetall"), err, 0);
    colorInput(datos[4].value !== "", $("#fechIniERDetall"), err, 21);
    colorInput(datos[5].value !== "", $("#fechTerERDetall"), err, 22);
    colorInput(EXP_REG_HORAS.test(datos[6].value), $("#horasERDetall"), err, 29);
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