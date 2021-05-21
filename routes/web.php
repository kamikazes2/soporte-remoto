<?php

use Illuminate\Support\Facades\Route;
// use ServicePack\ServicioController;
// //use ServicePack\SolicitudServicioController;
// use ServicePack\ServicioRealizarController;


use App\Http\Controllers\ServicioController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\FrontController;
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

// Route::get('/', function () {
//      return view('index');
// });
Route::get('/cliente', function () {
    return view('ClienteHome');
});
Route::get('/admin', function () {
    return view('AdminHome');
});
Route::get('/', [FrontController::class, 'index']);
Route::get('/cerrar-sesion', [FrontController::class, 'cerrarSesion']);


//Route::get('/hello' , 'HolaMundo@mostrarContenido' );


//////////////////////////////////////////////
// Route::view('/', 'home')->name('home');

// Route::view('admin', 'ServicePackViews.homeAdmin')->name('admin');
// Route::view('cliente', 'ServicePackViews.homeCliente')->name('cliente');
// Route::view('tecnico', 'ServicePackViews.homeTecnico')->name('tecnico');


// Route::resource('admin/servicios',ServicioController::class); //para el crud de los servicios

// Route::resource('cliente/solicitud',SolicitudServicioController::class); //para el lado del cliente

// Route::resource('admin/solicitudes',ServicioRealizarController::class); //para el lado del admin




Route::get('/listaServicios', [ServicioController::class, 'getServicios']);
Route::post('/request/nuevo-servicio', [ServicioController::class, 'CreateServicio']);
Route::post('/request/actualizar-servicio', [ServicioController::class, 'updateServicio']);
Route::post('/request/actualizar-precio', [ServicioController::class, 'newPrecioServicio']);

Route::post('/request/nuevo-solicitud-servicio', [ServicioController::class, 'CreateSolicitudServicio']);

Route::post('/request/nuevo-seguimiento', [ServicioController::class, 'CreateSeguimiento']);
Route::post('/request/finalizar-servicio', [ServicioController::class, 'completarServicio']);

Route::post('/request/buscar-usuario', [UsuarioController::class, 'buscarUsuario']);
//pruebas
//Route::get('/request/asignar-servicio', [ServicioController::class, 'asignarServicio']);

Route::get('/listarMisSolicitudes', [ServicioController::class, 'getMisSolicitudes']);
