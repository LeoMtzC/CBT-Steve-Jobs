//Se validan los datos de los formularios correspondientes y en caso de tener error se regresa el mismo para manejarlo
//Formulario de datos personales
function validaDatosPer(datos) {
    console.log(datos);
    let err = [];

    //colorInput(EXP_REG_NOMBRE.test(datos[0].value), $("#nomAlu"), err, 0);
    //colorInput(EXP_REG_NOMBRE.test(datos[1].value), $("#apPatAlu"), err, 1);
    //colorInput(EXP_REG_NOMBRE.test(datos[2].value), $("#apMatAlu"), err, 2);
    //colorInput(EXP_REG_MATRICULA.test(datos[3].value), $("#matrAlu"), err, 3);
    //colorInput(EXP_REG_SEMESTRE.test(datos[4].value), $("#semesAlu"), err, 4);
    //colorInput(EXP_REG_NOMBRE.test(datos[5].value), $("#carrAlu"), err, 5);
    colorInput(EXP_REG_CURP.test(datos[7].value), $("#curpAlu"), err, 6);
    colorInput(EXP_REG_EMAIL.test(datos[8].value), $("#emailAlu"), err, 7);
    colorInput(EXP_REG_TEL.test(datos[9].value), $("#telAlu"), err, 8);
    colorInput(datos[10].value !== "", $("#fechNacAlu"), err, 9);
    colorInput(EXP_REG_NSS.test(datos[11].value), $("#nssAlu"), err, 10);
    colorInput(datos[12].value !== '', $("#segMedAlu"), err, 11);
    return err;
}
//Formulario de datos domiciliarios
function validaDatosDom(datos) {
    console.log(datos);
    let err = [];

    colorInput(datos[2].value !== "", $("#estadoAlu"), err, 12);
    colorInput(datos[3].value !== "", $("#municipioAlu"), err, 13);
    colorInput(EXP_REG_CALLECOL.test(datos[4].value), $("#calleAlu"), err, 14);
    colorInput(EXP_REG_CALLECOL.test(datos[5].value), $("#coloniaAlu"), err, 15);
    colorInput(EXP_REG_CP.test(datos[6].value), $("#cpAlu"), err, 16);
    colorInput(EXP_REG_NUMEX.test(datos[7].value), $("#numExAlu"), err, 17);
    return err;
}
//Formulario de datos del tutor
function validaDatosTutor(datos) {
    console.log(datos);
    let err = [];

    colorInput(EXP_REG_NOMBRE.test(datos[2].value), $("#nomTut"), err, 0);
    colorInput(EXP_REG_NOMBRE.test(datos[3].value), $("#apPatTut"), err, 1);
    colorInput(EXP_REG_NOMBRE.test(datos[4].value), $("#apMatTut"), err, 2);
    colorInput(EXP_REG_CURP.test(datos[5].value), $("#curpTut"), err, 6);
    colorInput(EXP_REG_EMAIL.test(datos[6].value), $("#emailTut"), err, 7);
    colorInput(EXP_REG_TEL.test(datos[7].value), $("#telTut"), err, 8);
    colorInput(EXP_REG_TEL.test(datos[8].value), $("#celTut"), err, 8);
    colorInput(datos[9].value !== "", $("#parentTut"), err, 18);
    return err;
}
//Formulario de datos del escenario real
function validaDatosEscR(datos) {
    console.log(datos);
    let err = [];

    colorInput(EXP_REG_CALLECOL.test(datos[2].value), $("#nomER"), err, 19);
    colorInput(EXP_REG_DIR.test(datos[3].value), $("#dirER"), err, 20);
    colorInput(EXP_REG_TEL.test(datos[4].value), $("#telER"), err, 8);
    colorInput(EXP_REG_NOMBRE.test(datos[5].value), $("#respER"), err, 0);
    colorInput(EXP_REG_NOMBRE.test(datos[6].value), $("#apPatER"), err, 1);
    colorInput(EXP_REG_NOMBRE.test(datos[7].value), $("#apMatER"), err, 1);
    colorInput(EXP_REG_DIR.test(datos[8].value), $("#cargoER"), err, 31);
    colorInput(datos[9].value !== "", $("#fechIniER"), err, 21);
    colorInput(datos[10].value !== "", $("#fechTerER"), err, 22);
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