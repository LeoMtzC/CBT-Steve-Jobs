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
    return view('welcome');
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



