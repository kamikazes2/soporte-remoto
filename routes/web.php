<?php

use Illuminate\Support\Facades\Route;
// use ServicePack\ServicioController;
// //use ServicePack\SolicitudServicioController;
// use ServicePack\ServicioRealizarController;


use App\Http\Controllers\ServicioController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\EspecialidadController;

Route::get('/cliente', function () {
    return view('ClienteHome');
});
Route::get('/admin', function () {
    return view('AdminHome');
});
Route::get('/', [FrontController::class, 'index']);
Route::get('/cerrar-sesion', [FrontController::class, 'cerrarSesion']);




#SERVICIO ------------------------------------------------------
Route::get('/listaServicios', [ServicioController::class, 'getServicios']);
Route::post('/request/nuevo-servicio', [ServicioController::class, 'CreateServicio']);
Route::post('/request/actualizar-servicio', [ServicioController::class, 'updateServicio']);
Route::post('/request/actualizar-precio', [ServicioController::class, 'newPrecioServicio']);
Route::post('/request/eliminar', [ServicioController::class, 'eliminarServicio']);
Route::delete('/request/eliminar/{idServicio}', [ServicioController::class, 'eliminarServicio']);
#FIN SERVICIO ------------------------------------------------------

#personales
Route::post('/request/nuevo-tecnico', [PersonalController::class, 'createTecnico']);
Route::post('/request/nueva-especialidad-personal', [PersonalController::class, 'addEspecialidadPersonal']);

#fin personales

Route::post('/request/nuevo-solicitud-servicio', [ServicioController::class, 'CreateSolicitudServicio']);

Route::post('/request/nuevo-seguimiento', [ServicioController::class, 'CreateSeguimiento']);
Route::post('/request/finalizar-servicio', [ServicioController::class, 'completarServicio']);

Route::post('/request/buscar-usuario', [UsuarioController::class, 'buscarUsuario']);

Route::get('/listarMisSolicitudes', [ServicioController::class, 'getMisSolicitudes']);


#ESPECIALIDAD------------------------------
Route::post('/request/nuevo-especialidad', [EspecialidadController::class, 'createEspecialidad']);
Route::post('/request/actualizar-especialidad', [EspecialidadController::class, 'actualizarEspecialidad']);
Route::get('/request/lista-especialidad', [EspecialidadController::class, 'getEspecialidades']);
Route::delete('/request/eliminar-especialidad/{id}', [EspecialidadController::class, 'eliminarEspecialidad']);
#FIN ESPECIALIDAD ---------------------------