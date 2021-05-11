<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Src\ModuloServicio\Servicio\Infrastructure\GetServicioController;
use Src\ModuloServicio\Servicio\Infrastructure\CreateServicioController;
use Src\ModuloServicio\PrecioServicio\Infrastructure\CreatePrecioServicioController;

use App\Models\ServicePack\Servicio as sr;

class ServicioController extends Controller
{
    private $getServicioController;
    private $createServicioController;
    private $createPrecioServicioController;
    public function __construct(
        GetServicioController $getServicioController,
        CreateServicioController $createServicioController,
        CreatePrecioServicioController $createPrecioServicioController
    ){
        $this->getServicioController = $getServicioController;
        $this->createServicioController = $createServicioController;
        $this->createPrecioServicioController = $createPrecioServicioController;
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


}
