<?php

namespace Src\ModuloServicio\Servicio\Infrastructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

use Src\ModuloServicio\Servicio\Infrastructure\Repositories\EloquentServicioRepository;
use Src\ModuloServicio\PrecioServicio\Infrastructure\Repositories\EloquentPrecioServicioRepository;



use Src\ModuloServicio\Servicio\Application\GetServicioUseCase;
use Src\ModuloServicio\PrecioServicio\Application\CreatePrecioServicioUseCase;
use Src\ModuloServicio\Servicio\Application\CreateServicioUseCase;
use Src\ModuloServicio\Servicio\Application\UpdateServicioUseCase;



class ServicioController
{
    private $servicioRepository;
    private $precioServicioRepository;

    public function __construct(
        EloquentServicioRepository $Srepository,
        EloquentPrecioServicioRepository $Prepository
        ){
        $this->servicioRepository = $Srepository;
        $this->precioServicioRepository = $Prepository;
    }

    public function createServicio(Request $request){
        $nombre = $request['nombre'];
        $descripcion = $request['descripcion'];
        $createServicioUseCase = new CreateServicioUseCase($this->servicioRepository);
        $serv = $createServicioUseCase->__invoke(
            $nombre,
            $descripcion
        );
        $precio = $request['precio'];
        $date = Carbon::now();
        $fecha = $date->toDateTimeString();
        $createPrecioServicioUseCase = new CreatePrecioServicioUseCase($this->precioServicioRepository);
        $createPrecioServicioUseCase->__invoke(
            $serv->id,
            $precio,
            $fecha
        );
        return response()->json($serv->id);
    }

    public function getServicios(){
        $getServicios = new GetServicioUseCase($this->servicioRepository);
        $servicios = $getServicios->__invoke();
        return $servicios;
    }

    public function updateServicio(Request $request)
    {
        $id = $request['id'];
        $nombre = $request['nombre'];
        $descripcion = $request['descripcion'];

        $updateServicioUseCase = new UpdateServicioUseCase($this->servicioRepository);
        $serv = $updateServicioUseCase->__invoke(
            $id,
            $nombre,
            $descripcion
        );
        
        return $serv;
    }

    public function deleteServicio(Request $request){
        //falta
    }

}
