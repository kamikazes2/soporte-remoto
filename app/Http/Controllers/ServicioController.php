<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Src\ModuloServicio\Servicio\Infrastructure\GetServicioController;
use Src\ModuloServicio\Servicio\Infrastructure\CreateServicioController;
use Src\ModuloServicio\PrecioServicio\Infrastructure\CreatePrecioServicioController;
use Src\ModuloServicio\SolicitudServicio\Infrastructure\CreateSolicitudServicioController;
use Src\ModuloServicio\ServicioRealizar\Infrastructure\CreateServicioRealizarController;


//pruebas//
use Src\ModuloServicio\AsignacionServicio\Infrastructure\CreateAsignacionServicioController;


//fin pruebas//

// use App\Models\ServicePack\Servicio as sr;

class ServicioController extends Controller
{
    private $getServicioController;
    private $createServicioController;
    private $createPrecioServicioController;
    private $createSolicitudServicioController;
    private $createServicioRealizarController;
    

    //pruebas
    private $createAsignacionServicioController;
    //fin pruebas
    public function __construct(
        GetServicioController $getServicioController,
        CreateServicioController $createServicioController,
        CreatePrecioServicioController $createPrecioServicioController,
        CreateSolicitudServicioController $createSolicitudServicioController,
        CreateServicioRealizarController $createServicioRealizarController,
        //pruebas
        CreateAsignacionServicioController $createAsignacionServicioController
        //fin pruebas
    ){
        $this->getServicioController = $getServicioController;
        $this->createServicioController = $createServicioController;
        $this->createPrecioServicioController = $createPrecioServicioController;
        $this->createSolicitudServicioController = $createSolicitudServicioController;
        $this->createServicioRealizarController = $createServicioRealizarController;
        //pruebas
        $this->createAsignacionServicioController = $createAsignacionServicioController;
        //fin pruebas
    }

    public function getServicios()
    {
        $servicios = $this->getServicioController->__invoke();
        return response()->json($servicios);
    }

    public function CreateServicio(Request $request)
    {
        $request['idServicio'] = $this->createServicioController->__invoke($request);
        $precio = $this->createPrecioServicioController->__invoke($request);

        return response()->json("creado correctamente");
    }

    public function CreateSolicitudServicio(Request $request)
    {
        $request['idSolicitud'] = $this->createSolicitudServicioController->__invoke($request);

        //enviar la lista de servicios en un array
        //un array asociativo [idServicio => precio]
        $this->createServicioRealizarController->__invoke($request);

        return response()->json("creado correctamente");
    }

    public function asignarServicio(){
        $algo = $this->createAsignacionServicioController->__invoke();
        return response()->json($algo);
    }


}
