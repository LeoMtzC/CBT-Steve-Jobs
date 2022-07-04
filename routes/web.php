<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AlumnoHomeController;
use App\Http\Controllers\DocenteController;
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

Route::get('/', [LoginController::class,'show'])->name('home');

//Login
Route::get('/login', [LoginController::class,'show'])->name('login');
Route::post('/login', [LoginController::class,'login']);

//logout
Route::get('/logout', [LogoutController::class,'logout']);


//Recuperar contraseña ** En desuso **
Route::get('recupContra', function () {
    return view('General.recupContra');
})->name('recuperar-contra');

//Grupo middleware login y tipo alumno
Route::middleware(['auth', 'alumno'])->group(function () {
    //Rutas de alumnos:
    //Inicio 
    Route::get('/panel-alumno', [AlumnoHomeController::class,'show'])->name('homeAlumno');

    //DATOS:
    //Datos personales
    Route::get('/datos-alumno', [AlumnoController::class,'showDatosP'])->name('DatosPAlumno');
    //Datos del tutor:
    Route::get('/datos-tutor', [AlumnoController::class,'showDatosT'])->name('DatosTAlumno');
    //Subir documentos personales
    Route::get('/subir-docs', [AlumnoController::class,'showSubirDocs'])->name('subirDocsAlu');
        //Subir INE de tutor
        Route::post('/subir-ine', [AlumnoController::class,'subirINE']);
        //Subir Acta de nacimiento
        Route::post('/subir-acta', [AlumnoController::class,'subirActa']);
        //Ver documentos
        Route::get('/storage/{ruta}', [AlumnoController::class,'verPDF'])->name('VerPDF');
    //Datos del escenario real
    Route::get('/escenario-real', [AlumnoController::class,'showEscenarioR'])->name('EscenarioR');

    //GENERAR
    //Permiso
    Route::get('/generar-permiso', [AlumnoController::class,'showGPermiso'])->name('GPermiso')->middleware('semestreUno');
    //Carta de autorización
    Route::get('/generar-carta-autorizacion', [AlumnoController::class,'showGCartaAut'])->name('GCartaAut')->middleware('semestreAvanzado');
        //Practicas de ejecución
        Route::get('/generar-carta-autorizacion-PE', [AlumnoController::class,'GenerarCartaAut'])->name('GCartaAutPE')->middleware('PracEj');
        //Servicio social
        Route::get('/generar-carta-autorizacion-SS', [AlumnoController::class,'GenerarCartaAut'])->name('GCartaAutSS')->middleware('ServSoc');
        //Estadías
        Route::get('/generar-carta-autorizacion-EP', [AlumnoController::class,'GenerarCartaAut'])->name('GCartaAutEP')->middleware('Estadias');
    //Carta de presentación
    Route::get('/generar-carta-presentacion', [AlumnoController::class,'showGCartaPres'])->name('GCartaPres')->middleware('semestreAvanzado');
        //Practicas de ejecución
        Route::get('/generar-carta-presentacion-PE', [AlumnoController::class,'GenerarCartaPres'])->name('GCartaPresPE')->middleware('PracEj');
        //Servicio social
        Route::get('/generar-carta-presentacion-SS', [AlumnoController::class,'GenerarCartaPres'])->name('GCartaPresSS')->middleware('ServSoc');
        //Estadías
        Route::get('/generar-carta-presentacion-EP', [AlumnoController::class,'GenerarCartaPres'])->name('GCartaPresEP')->middleware('Estadias');
    //Carta de acepración
    Route::get('/generar-carta-aceptacion', [AlumnoController::class,'showGCartaAcep'])->name('GCartaAcep')->middleware('semestreAvanzado');
        //Practicas de ejecución
        Route::get('/generar-carta-aceptacion-PE', [AlumnoController::class,'GenerarCartaAcep'])->name('GCartaAcepPE')->middleware('PracEj');
        //Servicio social
        Route::get('/generar-carta-aceptacion-SS', [AlumnoController::class,'GenerarCartaAcep'])->name('GCartaAcepSS')->middleware('ServSoc');
        //Estadías
        Route::get('/generar-carta-aceptacion-EP', [AlumnoController::class,'GenerarCartaAcep'])->name('GCartaAcepEP')->middleware('Estadias');
    //Carta de termino *-*EN DESUSO*-*
    Route::get('/generar-carta-termino', [AlumnoController::class,'showGCartaTer'])->name('GCartaTer')->middleware('semestreAvanzado');
    //Informe
    Route::get('/generar-informe', [AlumnoController::class,'showGInforme'])->name('GInforme')->middleware('semestreAvanzado');
        //Generar todos los informes
        Route::get('/generar-informes', [AlumnoController::class,'GenerarInforme'])->name('GInformeTodo')->middleware('semestreAvanzado');
    //Bitacora
    Route::get('/generar-bitacora', [AlumnoController::class,'showGBitacora'])->name('GBitacora')->middleware('semestreAvanzado');
        //Generar todos las bitácoras    
        Route::get('/generar-bitacoras', [AlumnoController::class,'GenerarBitacoras'])->name('GBitacoraTodos')->middleware('semestreAvanzado');

    //Descargar archivos ( utilizado para bitácoras e informe)
    Route::get('/descargar-bitacora/{archivo}/{nombre}', [AlumnoController::class,'descargarArchivo'])->name('Descargar');
    
    //Actualizar datos personales
    Route::post('/datos-alumno', [AlumnoController::class,'actualizarDatosPersonales']);
     //Actualizar datos domiciliarios
     Route::post('/datos-alumno-domicilio', [AlumnoController::class,'actualizarDatosDomicilio']);

     //Actualizar datos del tutor
    Route::post('/datos-tutor', [AlumnoController::class,'actualizarDatosTutor']);

    //Actualizar datos del escenario real
    Route::post('/escenario-real', [AlumnoController::class,'actualizarDatosEscenario']);


    //SUBIR
    //Permiso
    Route::get('/subir-permiso', [AlumnoController::class,'showSPermiso'])->name('SPermiso')->middleware('semestreUno');
        //Subir
        Route::post('/subir-permiso', [AlumnoController::class,'subirPermiso']);
    //Guía de observación
    Route::get('/subir-guia-observacion', [AlumnoController::class,'showSGuiaObs'])->name('SGuiaObs')->middleware('semestreUno');
        //Subir
        Route::post('/subir-guia-observacion', [AlumnoController::class,'subirGuiaObs']);
    //Carta de autorización
    Route::get('/subir-carta-autorizacion', [AlumnoController::class,'showSCartaAut'])->name('SCartaAut')->middleware('semestreAvanzado');
        //Subir
        Route::post('/subir-carta-autorizacion', [AlumnoController::class,'subirCartaAut']);    
    //Carta de presentación
    Route::get('/subir-carta-presentacion', [AlumnoController::class,'showSCartaPres'])->name('SCartaPres')->middleware('semestreAvanzado');
        //Subir
        Route::post('/subir-carta-presentacion', [AlumnoController::class,'subirCartaPres']);
    //Carta de acepración
    Route::get('/subir-carta-aceptacion', [AlumnoController::class,'showSCartaAcep'])->name('SCartaAcep')->middleware('semestreAvanzado');
        //Subir
        Route::post('/subir-carta-aceptacion', [AlumnoController::class,'subirCartaAcep']);
    //Constancia de término
    Route::get('/subir-constancia-termino', [AlumnoController::class,'showSConstaTer'])->name('SConstaTer')->middleware('semestreAvanzado');
        //Subir
        Route::post('/subir-constancia-termino', [AlumnoController::class,'subirConsTer']);
    //Informe
    Route::get('/subir-informe', [AlumnoController::class,'showSInforme'])->name('SInforme')->middleware('semestreAvanzado');
        //Subir
        Route::post('/subir-informe', [AlumnoController::class,'subirInforme']);
    //Bitácoras
    Route::get('/subir-bitacoras', [AlumnoController::class,'showSBitacora'])->name('SBitacoras')->middleware('semestreAvanzado');
        //Subir
        Route::post('/subir-bitacoras', [AlumnoController::class,'subirBitacoras']);
    //MTP
    Route::get('/subir-MTP', [AlumnoController::class,'showSMTP'])->name('SMTP')->middleware('semestreAvanzado');
        //Subir
        Route::post('/subir-MTP', [AlumnoController::class,'subirMTP']);
});


//Grupo middleware login y tipo docente
Route::middleware(['auth', 'docente'])->group(function () {
    //Rutas de docentes:
    //Inicio 
    Route::get('/panel-docente', [DocenteHomeController::class,'show'])->name('homeDocente');

    //REGISTRO:
    //Alumnos
    Route::get('/registro-alumno', [DocenteController::class,'showRegistroAlumno'])->name('RegistroAlumno');
    //Grupos
    Route::get('/registro-grupo', [DocenteController::class,'showRegistroGrupo'])->name('RegistroGrupo');
 
    //CONSULTA:
    //Alumnos
    Route::get('/consulta-alumno', [DocenteController::class,'showConsultaAlumno'])->name('ConsultaAlumno');
    //Grupos
    Route::get('/consulta-grupo', [DocenteController::class,'showConsultaGrupo'])->name('ConsultaGrupo');
    //Historial completo x alumno
    Route::get('/consulta-historial-alumno', [DocenteController::class,'showConsultaHistAlu'])->name('ConsultaHistAlu');
    //Detalles Alumno
    Route::get('/detalles-alumno', [DocenteController::class,'showDetallesAlu'])->name('detallesAlu');
    //Historial P. Observación > Listado Grupos
    Route::get('/practicas-observacion-grupos', [DocenteController::class,'showPractObs_Grupos'])->name('PractObs_Grupos');
    //Historial P.  Observación > Listado Alumnos
    Route::get('/practicas-observacion-alumnos', [DocenteController::class,'showPractObs_Alumnos'])->name('PractObs_Alumnos');
    //Historial P. Ejecución > Listado Grupos 
    Route::get('/practicas-ejecucion-grupos', [DocenteController::class,'showPractEjec_Grupos'])->name('PractEjec_Grupos');
    //Historial P. Ejecución  > Listado Alumnos
    Route::get('/practicas-ejecucion-alumnos', [DocenteController::class,'showPractEjec_Alumnos'])->name('PractEjec_Alumnos');
    //Historial ServSocial  > Listado Grupos
    Route::get('/servicio-social-grupos', [DocenteController::class,'showServSoc_Grupos'])->name('ServSoc_Grupos');
    //Historial ServSocial  > Listado Alumnos
    Route::get('/servicio-social-alumnos', [DocenteController::class,'showServSoc_Alumnos'])->name('ServSoc_Alumnos');
    //Historial Estadías  > Listado Grupos
    Route::get('/estadias-grupos', [DocenteController::class,'showEstadias_Grupos'])->name('Estadias_Grupos');
    //Historial Estadías  > Listado Alumnos
    Route::get('/estadias-alumnos', [DocenteController::class,'showEstadias_Alumnos'])->name('Estadias_Alumnos');
});

//Pagina de no acceso
Route::get('/no-autorizado', function () {
    return view('General.sinAcceso');
})->name('No_Autorizado');