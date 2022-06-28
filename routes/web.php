<?php

use App\Http\Controllers\AlumnoHomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');//diseñar landing page para bienvenida
});

//Login
Route::get('login', function () {
    return view('General.login');
})->name('login');
//Recuperar contraseña
Route::get('recupContra', function () {
    return view('General.recupContra');
})->name('recuperar-contra');

//Rutas de alumnos:
//Inicio 
Route::get('/panel-alumno', [AlumnoHomeController::class,'index'])->name('homeAlumno');

//DATOS:
//Datos perosnales
Route::get('datos-alumno', function () {
    return view('Alumno.datos.datosP');
})->name('DatosPAlumno');
//Datos del tutor:
Route::get('datos-tutor', function () {
    return view('Alumno.datos.datosT');
})->name('DatosTAlumno');
//Subir documentos personales
Route::get('subir-docs', function () {
    return view('Alumno.datos.subirD');
})->name('subirDocsAlu');
//Datos del escenario real
Route::get('escenario-real', function () {
    return view('Alumno.datos.escenarioR');
})->name('EscenarioR');

//GENERAR
//Carta de autorización
Route::get('generar-carta-autorizacion', function () {
    return view('Alumno.generar.cartaAut');
})->name('GCartaAut');
//Carta de presentación
Route::get('generar-carta-presentacion', function () {
    return view('Alumno.generar.cartaPres');
})->name('GCartaPres');
//Carta de acepración
Route::get('generar-carta-aceptacion', function () {
    return view('Alumno.generar.cartaAcep');
})->name('GCartaAcep');
//Carta de termino
Route::get('generar-carta-termino', function () {
    return view('Alumno.generar.cartaTer');
})->name('GCartaTer');
//Informe
Route::get('generar-informe', function () {
    return view('Alumno.generar.informe');
})->name('GInforme');
//Bitacora
Route::get('generar-cartaAut', function () {
    return view('Alumno.generar.bitacora');
})->name('GBitacora');

//SUBIR
//Carta de autorización
Route::get('subir-carta-autorizacion', function () {
    return view('Alumno.subir.cartaAut');
})->name('SCartaAut');
//Carta de presentación
Route::get('subir-carta-presentacion', function () {
    return view('Alumno.subir.cartaPres');
})->name('SCartaPres');
//Carta de acepración
Route::get('subir-carta-aceptacion', function () {
    return view('Alumno.subir.cartaAcep');
})->name('SCartaAcep');
//Carta de termino
Route::get('subir-carta-termino', function () {
    return view('Alumno.subir.cartaTer');
})->name('SCartaTer');
//Informe
Route::get('subir-informe', function () {
    return view('Alumno.subir.informe');
})->name('SInforme');
//MTP
Route::get('subir-MTP', function () {
    return view('Alumno.subir.MTP');
})->name('SMTP');



//Rutas de docentes:
//Inicio 
Route::get('panel-docente', function () {
    return view('Docente.home.index');
})->name('homeDocente');

//REGISTRO:
//Alumnos
Route::get('registro-alumno', function () {
    return view('Docente.registro.registroAlu');
})->name('RegistroAlumno');
//Grupos
Route::get('registro-grupo', function () {
    return view('Docente.registro.registroGrup');
})->name('RegistroGrupo');

//CONSULTA:
//Alumnos
Route::get('consulta-alumno', function () {
    return view('Docente.consulta.consultaAlu');
})->name('ConsultaAlumno');
//Grupos
Route::get('consulta-grupo', function () {
    return view('Docente.consulta.consultaGrup');
})->name('ConsultaGrupo');
//Historial completo x alumno
Route::get('consulta-historial-alumno', function () {
    return view('Docente.historial.alumno.histAluComp');
})->name('ConsultaHistAlu');
//Detalles Alumno
Route::get('detalles-alumno', function () {
    return view('Docente.detalles.detallesAlu');
})->name('detallesAlu');
//Historial P. Observación > Listado Grupos
Route::get('practicas-observacion-grupos', function () {
    return view('Docente.historial.practObs.listGrup');
})->name('PractObs_Grupos');
//Historial P.  Observación > Listado Alumnos
Route::get('practicas-observacion-alumnos', function () {
    return view('Docente.historial.practObs.listAlu');
})->name('PractObs_Alumnos');
//Historial P. Ejecución > Listado Grupos 
Route::get('practicas-ejecucion-grupos', function () {
    return view('Docente.historial.practEjec.listGrup');
})->name('PractEjec_Grupos');
//Historial P. Ejecución  > Listado Alumnos
Route::get('practicas-ejecucion-alumnos', function () {
    return view('Docente.historial.practEjec.listAlu');
})->name('PractEjec_Alumnos');
//Historial ServSocial  > Listado Grupos
Route::get('servicio-social-grupos', function () {
    return view('Docente.historial.servSoc.listGrup');
})->name('ServSoc_Grupos');
//Historial ServSocial  > Listado Alumnos
Route::get('servicio-social-alumnos', function () {
    return view('Docente.historial.servSoc.listAlu');
})->name('ServSoc_Alumnos');
//Historial Estadías  > Listado Grupos
Route::get('estadias-grupos', function () {
    return view('Docente.historial.estadias.listGrup');
})->name('Estadias_Grupos');
//Historial Estadías  > Listado Alumnos
Route::get('estadias-alumnos', function () {
    return view('Docente.historial.estadias.listAlu');
})->name('Estadias_Alumnos');