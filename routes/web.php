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
use App\Http\Controllers\ClienteController;
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
//Route::post('/request/eliminar', [ServicioController::class, 'eliminarServicio']);
Route::delete('/request/eliminar-servicio/{idServicio}', [ServicioController::class, 'eliminarServicio']);
#FIN SERVICIO ------------------------------------------------------

#personales
Route::post('/request/nuevo-tecnico', [PersonalController::class, 'createTecnico']);
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
Route::post('/request/nueva-especialidad-personal', [PersonalController::class, 'addEspecialidadPersonal']);
Route::post('/request/nueva-especialidad-servicio', [ServicioController::class, 'addEspecialidadServicio']);
Route::get('/request/get-especialidad', [ServicioController::class, 'getEspecialidadesServicio']);
Route::post('/request/update-especialidad-servicio',[ServicioController::class, 'updateEspecialidadServicio']);
#FIN ESPECIALIDAD ---------------------------

#clientes-------------------------------------
Route::post('/request/new-cliente', [ClienteController::class, 'createCliente']);
Route::post('/request/update-cliente-datos-personales',[ClienteController::class,'updateDatosPersonales']);
Route::post('/request/update-cliente-password',[ClienteController::class,'changePassword']);


#fin clientes-----------------------------------



use Src\ModuloServicio\Servicio\Infrastructure\ServicioController as SR;
use Src\ModuloServicio\PrecioServicio\Infrastructure\PrecioServicioController as PSR;
use Src\ModuloServicioPorRealizar\SolicitudServicio\Infrastructure\SolicitudServicioController as SSC;
use Src\ModuloUsuario\Usuario\Infrastructure\UsuarioController as UC;
use Src\ModuloCliente\Cliente\Infrastructure\ClienteController as CC;
use Src\ModuloTarjeta\Tarjeta\Infrastructure\TarjetaController as TC;
use Src\ModuloPagos\NitTributario\Infrastructure\NitTributarioController as NTC;
use Src\ModuloPagos\Factura\Infrastructure\FacturaController as FC;
use Src\ModuloPagos\DetalleFactura\Infrastructure\DetalleFacturaController as DFC;


//para el login
Route::post('/request/login', [FrontController::class, 'login']);

//para usuarios
Route::post('/request/nuevo-usuario',[UC::class, 'createUsuario']);
//para cliente
Route::post('/request/nuevo-cliente2',[CC::class, 'createCliente']);
Route::get('/request/verificar-cliente/{dni}',[CC::class, 'verificarCliente']);
Route::post('/request/actualizar-cliente2',[CC::class, 'updateCliente']);
Route::get('/request/buscar-ultimo-cliente-usuario-logueado',[CC::class, 'buscarUltimoClienteDeUsuarioLogueado']);

//para tarjeta de cliente
Route::post('/request/nueva-tarjeta',[TC::class, 'createTarjeta']);
Route::get('/request/buscar-tarjeta-cliente/{idCliente}',[TC::class, 'buscarTarjetaCliente']);

//para nit del cliente
Route::post('/request/nuevo-nit',[NTC::class, 'createNitTributario']);
Route::get('/request/buscar-nit-cliente/{idCliente}',[NTC::class, 'buscarNitTributarioCliente']);
//para factura del cliente
Route::post('/request/nueva-factura',[FC::class, 'createFactura']);
Route::get('/request/get-factura-completa/{idFactura}',[FC::class, 'getFacturaCompleta']);

//para el detalle de la factura
Route::post('/request/nuevo-detalle-factura',[DFC::class, 'createDetalleFactura']);


//para servicio
Route::post('/request/nuevo-servicio2', [SR::class, 'createServicio']);
Route::get('/request/get-servicios2', [SR::class, 'getServicios']);
Route::post('/request/update-servicio2', [SR::class, 'updateServicio']);
//falta delete servicio

//para precioServicio
Route::post('/request/create-precio-servicio2', [PSR::class, 'createPrecioServicio']);
Route::delete('/request/eliminar-precio-servicio2/{idServicio}',[PSR::class,'deletePrecioServicioByIdServicio']);

//para la solicitud
Route::post('/request/create-solicitud-servicio2', [SSC::class, 'createSolicitud']); //revisar asignacion

