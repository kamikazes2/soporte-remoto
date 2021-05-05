<?php

use Illuminate\Support\Facades\Route;
use ServicePack\ServicioController;
use ServicePack\SolicitudServicioController;
use ServicePack\ServicioRealizarController;
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
//     return view('welcome');
// });

//Route::get('/hello' , 'HolaMundo@mostrarContenido' );

Route::view('/', 'home')->name('home');
Route::view('admin', 'ServicePackViews.homeAdmin')->name('admin');
Route::view('cliente', 'ServicePackViews.homeCliente')->name('cliente');
Route::view('tecnico', 'ServicePackViews.homeTecnico')->name('tecnico');

Route::resource('admin/servicios',ServicioController::class); //para el crud de los servicios

Route::resource('cliente/solicitud',SolicitudServicioController::class); //para el lado del cliente

Route::resource('admin/solicitudes',ServicioRealizarController::class); //para el lado del admin
