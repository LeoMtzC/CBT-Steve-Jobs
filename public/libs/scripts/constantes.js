//expresiones regulares
const EXP_REG_NOMBRE = /^[a-záéíóúüñA-ZÁÉÍÓÚÜÑ]{2,}(\s[a-záéíóúüñA-ZÁÉÍÓÚÑ]{1,})*$/;
const EXP_REG_MATRICULA = /^[0-9]{10}$/;
const EXP_REG_SEMESTRE = /^[0-9]{1}$/;
const EXP_REG_EDAD = /^[0-9]{2,3}$/;
const EXP_REG_TEL = /^[0-9]{10,13}$/;
const EXP_REG_NSS = /^[0-9]{11}$/;
const EXP_REG_EMAIL = /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
const EXP_REG_CURP = /^[A-Z]{1}[AEIOU]{1}[A-Z]{2}[0-9]{4}[A-Z0-9]{10}$/;
const EXP_REG_CALLECOL = /^[a-záéíóúüñA-ZÁÉÍÓÚÜÑ0-9]{2,}(\s[a-záéíóúüñA-ZÁÉÍÓÚÑ0-9]{1,})*$/;
const EXP_REG_CP = /^[0-9]{5}$/;
const EXP_REG_NUMEX = /^[0-9]{1,4}$/;
const EXP_REG_NUMINT = /^$|[A-Z0-9]/;
const EXP_REG_DIR = /^[a-záéíóúüñA-ZÁÉÍÓÚÜÑ0-9#,. ]{2,}(\s[a-záéíóúüñA-ZÁÉÍÓÚÑ0-9 ]{10,300})*$/;




//mensajes de error
const MSJ_ERROR = [
    "El <b>Nombre</b> introducido no es válido, solo letras",
    "El <b>Apellido Paterno</b> introducido no es válido, solo letras",
    "El <b>Apellido Materno</b> introducido no es válido, solo letras",
    "La <b>Matrícula</b> introducida no es válida, debe contener solo 10 números",
    "El <b>Semestre</b> no es válido. Debe contener solo 1 número",
    "Asegúrese de seleccionar una <b>Carrera</b>",
    "La <b>CURP</b> introducida no es válida, asegúrese de cumplir con el formato",
    "El <b>Correo electrónico</b> no tiene un formato válido",
    "El <b>Número telefónico</b> no es válido. Debe contener entre 10 y 13 digitos",
    "La <b>Fecha de Nacimiento</b> no es válida o no cumple con el formato solicitado",
    "El <b>Número de seguro social</b> no es válido. Debe contener entre 11 digitos",
    "El <b>Seguro médico</b> introducido no es válido, solo letras",   


    "El <b>Estado</b> seleccionado no es válido",   
    "El <b>Municipio</b> seleccionado no es válido",   
    "La <b>Calle</b> proporcionada no puede estár vacía o no es válida",   
    "La <b>Colonia</b> proporcionada no puede estár vacía o no es válida",   
    "El <b>Código postal</b> introducido no es válido, deben ser 5 digitos",   
    "El <b>Número exterior</b> introducido no es válido, solo números", 
    
    "El <b>Parentesco</b> seleccionado no es válido", 

    "El <b>Nombre del escenario</b> cuenta con carácteres no válidos",
    "La <b>Dirección del escenario</b> cuenta con carácteres no válidos",
    "La <b>Fecha de inicio</b> no es válida o no cumple con el formato solicitado",
    "La <b>Fecha de termino</b> no es válida o no cumple con el formato solicitado",
];