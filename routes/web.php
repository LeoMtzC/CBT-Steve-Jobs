<?php

use App\Http\Controllers\AlumnoHomeController;
use App\Http\Controllers\DocenteHomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
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
    return view('welcome');
});

//Login
Route::get('/login', [LoginController::class,'show'])->name('login');
Route::post('/login', [LoginController::class,'login']);

//logout
Route::get('/logout', [LogoutController::class,'logout']);


//Recuperar contraseña
Route::get('recupContra', function () {
    return view('General.recupContra');
})->name('recuperar-contra');

//Rutas de alumnos:
//Inicio 
Route::get('/panel-alumno', [AlumnoHomeController::class,'show'])->name('homeAlumno')->middleware(['auth','alumno']);

//DATOS:
//Datos perosnales
Route::get('datos-alumno', function () {
    return view('Alumno.datos.datosP');
})->name('DatosPAlumno')->middleware(['auth','alumno']);
//Datos del tutor:
Route::get('datos-tutor', function () {
    return view('Alumno.datos.datosT');
})->name('DatosTAlumno')->middleware(['auth','alumno']);
//Subir documentos personales
Route::get('subir-docs', function () {
    return view('Alumno.datos.subirD');
})->name('subirDocsAlu')->middleware(['auth','alumno']);
//Datos del escenario real
Route::get('escenario-real', function () {
    return view('Alumno.datos.escenarioR');
})->name('EscenarioR')->middleware(['auth','alumno']);

//GENERAR
//Permiso
Route::get('generar-permiso', function () {
    return view('Alumno.generar.permiso');
})->name('GPermiso')->middleware(['auth','alumno']);
//Carta de autorización
Route::get('generar-carta-autorizacion', function () {
    return view('Alumno.generar.cartaAut');
})->name('GCartaAut')->middleware(['auth','alumno']);
//Carta de presentación
Route::get('generar-carta-presentacion', function () {
    return view('Alumno.generar.cartaPres');
})->name('GCartaPres')->middleware(['auth','alumno']);
//Carta de acepración
Route::get('generar-carta-aceptacion', function () {
    return view('Alumno.generar.cartaAcep');
})->name('GCartaAcep')->middleware(['auth','alumno']);
//Carta de termino *-*EN DESUSO*-*
Route::get('generar-carta-termino', function () {
    return view('Alumno.generar.cartaTer');
})->name('GCartaTer')->middleware(['auth','alumno']);
//Informe
Route::get('generar-informe', function () {
    return view('Alumno.generar.informe');
})->name('GInforme')->middleware(['auth','alumno']);
//Bitacora
Route::get('generar-cartaAut', function () {
    return view('Alumno.generar.bitacora');
})->name('GBitacora')->middleware(['auth','alumno']);

//SUBIR
//Permiso
Route::get('subir-permiso', function () {
    return view('Alumno.subir.permiso');
})->name('SPermiso')->middleware(['auth','alumno']);
//Guía de observación
Route::get('subir-guia-observacion', function () {
    return view('Alumno.subir.guiaObs');
})->name('SGuiaObs')->middleware(['auth','alumno']);
//Carta de autorización
Route::get('subir-carta-autorizacion', function () {
    return view('Alumno.subir.cartaAut');
})->name('SCartaAut')->middleware(['auth','alumno']);
//Carta de presentación
Route::get('subir-carta-presentacion', function () {
    return view('Alumno.subir.cartaPres');
})->name('SCartaPres')->middleware(['auth','alumno']);
//Carta de acepración
Route::get('subir-carta-aceptacion', function () {
    return view('Alumno.subir.cartaAcep');
})->name('SCartaAcep')->middleware(['auth','alumno']);
//Constancia de término
Route::get('subir-constancia-termino', function () {
    return view('Alumno.subir.consTer');
})->name('SConstaTer')->middleware(['auth','alumno']);
//Informe
Route::get('subir-informe', function () {
    return view('Alumno.subir.informe');
})->name('SInforme')->middleware(['auth','alumno']);
//Bitácoras
Route::get('subir-bitacoras', function () {
    return view('Alumno.subir.bitacoras');
})->name('SBitacoras')->middleware(['auth','alumno']);
//MTP
Route::get('subir-MTP', function () {
    return view('Alumno.subir.MTP');
})->name('SMTP')->middleware(['auth','alumno']);



//Rutas de docentes:
//Inicio 
Route::get('/panel-docente', [DocenteHomeController::class,'show'])->name('homeDocente')->middleware(['auth','docente']);

//REGISTRO:
//Alumnos
Route::get('registro-alumno', function () {
    return view('Docente.registro.registroAlu');
})->name('RegistroAlumno')->middleware(['auth','docente']);
//Grupos
Route::get('registro-grupo', function () {
    return view('Docente.registro.registroGrup');
})->name('RegistroGrupo')->middleware(['auth','docente']);

//CONSULTA:
//Alumnos
Route::get('consulta-alumno', function () {
    return view('Docente.consulta.consultaAlu');
})->name('ConsultaAlumno')->middleware(['auth','docente']);
//Grupos
Route::get('consulta-grupo', function () {
    return view('Docente.consulta.consultaGrup');
})->name('ConsultaGrupo')->middleware(['auth','docente']);
//Historial completo x alumno
Route::get('consulta-historial-alumno', function () {
    return view('Docente.historial.alumno.histAluComp');
})->name('ConsultaHistAlu')->middleware(['auth','docente']);
//Detalles Alumno
Route::get('detalles-alumno', function () {
    return view('Docente.detalles.detallesAlu');
})->name('detallesAlu')->middleware(['auth','docente']);
//Historial P. Observación > Listado Grupos
Route::get('practicas-observacion-grupos', function () {
    return view('Docente.historial.practObs.listGrup');
})->name('PractObs_Grupos')->middleware(['auth','docente']);
//Historial P.  Observación > Listado Alumnos
Route::get('practicas-observacion-alumnos', function () {
    return view('Docente.historial.practObs.listAlu');
})->name('PractObs_Alumnos')->middleware(['auth','docente']);
//Historial P. Ejecución > Listado Grupos 
Route::get('practicas-ejecucion-grupos', function () {
    return view('Docente.historial.practEjec.listGrup');
})->name('PractEjec_Grupos')->middleware(['auth','docente']);
//Historial P. Ejecución  > Listado Alumnos
Route::get('practicas-ejecucion-alumnos', function () {
    return view('Docente.historial.practEjec.listAlu');
})->name('PractEjec_Alumnos')->middleware(['auth','docente']);
//Historial ServSocial  > Listado Grupos
Route::get('servicio-social-grupos', function () {
    return view('Docente.historial.servSoc.listGrup');
})->name('ServSoc_Grupos')->middleware(['auth','docente']);
//Historial ServSocial  > Listado Alumnos
Route::get('servicio-social-alumnos', function () {
    return view('Docente.historial.servSoc.listAlu');
})->name('ServSoc_Alumnos')->middleware(['auth','docente']);
//Historial Estadías  > Listado Grupos
Route::get('estadias-grupos', function () {
    return view('Docente.historial.estadias.listGrup');
})->name('Estadias_Grupos')->middleware(['auth','docente']);
//Historial Estadías  > Listado Alumnos
Route::get('estadias-alumnos', function () {
    return view('Docente.historial.estadias.listAlu');
})->name('Estadias_Alumnos')->middleware(['auth','docente']);

//Pagina de no acceso
Route::get('/no-autorizado', function () {
    return view('General.sinAcceso');
})->name('No_Autorizado');