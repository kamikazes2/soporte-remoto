<?php

namespace Src\ModuloServicio\Servicio\Infrastructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

use Src\ModuloServicio\Servicio\Infrastructure\Repositories\EloquentServicioRepository;
use Src\ModuloServicio\PrecioServicio\Infrastructure\Repositories\EloquentPrecioServicioRepository;
use Src\ModuloEspecialidad\EspecialidadServicio\Infrastructure\Repositories\EloquentEspecialidadServicioRepository;



use Src\ModuloServicio\Servicio\Application\GetServicioUseCase;
use Src\ModuloServicio\PrecioServicio\Application\CreatePrecioServicioUseCase;
use Src\ModuloServicio\Servicio\Application\CreateServicioUseCase;
use Src\ModuloServicio\Servicio\Application\UpdateServicioUseCase;
use Src\ModuloServicio\Servicio\Application\BuscarServicioUseCase;
use Src\ModuloEspecialidad\EspecialidadServicio\Application\GetEspecialidadServicioByServicioIdUseCase;


class ServicioController
{
    private $servicioRepository;
    private $precioServicioRepository;
    private $especialidadRepository;

    public function __construct(
        EloquentServicioRepository $Srepository,
        EloquentPrecioServicioRepository $Prepository,
        EloquentEspecialidadServicioRepository $Erepository
        ){
        $this->servicioRepository = $Srepository;
        $this->precioServicioRepository = $Prepository;
        $this->especialidadRepository = $Erepository;
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

    public function getServiciosWithEspecialides(Request $request){
        $idServicio = $request['idServicio'];
        $buscarUseCase = new BuscarServicioUseCase($this->servicioRepository);
        $servicio = $buscarUseCase->__invoke($idServicio);

        $getEspecialidadServicio = new GetEspecialidadServicioByServicioIdUseCase($this->especialidadRepository);
        $esp = $getEspecialidadServicio->__invoke($idServicio);

        $arrayServicio = array(
            'id' => $servicio[0]->id,
            'nombre' => $servicio[0]->nombre,
            'descripcion'=>$servicio[0]->descripcion,
            'precio'=>$servicio[0]->precio,
        );
        $arrayEspecialidades = array();
        foreach($esp as $e){
            $aux['idEspecialidad'] = $e->idEspecialidad;
            $aux['nombre'] = $e->nombre;
            $aux['descripcion'] = $e->descripcion;
            array_push($arrayEspecialidades, $aux); 
        }
        $arrayServicio['arrayEspecialidades'] = $arrayEspecialidades;


        return $arrayServicio;
    }

    public function getAllServiciosWithEspecialides(Request $request){
        $getServiciosUseCase = new GetServicioUseCase($this->servicioRepository);
        $servicio = $getServiciosUseCase->__invoke();

       // $getEspecialidadServicio = new GetEspecialidadServicioByServicioIdUseCase($this->especialidadRepository);
       // $esp = $getEspecialidadServicio->__invoke($idServicio);

       $arrayTodoLosServicios = array();
       $arrayServicios = array();
       $espeArray = array();
       foreach($servicio as $serv){
            $getEspecialidadServicio = new GetEspecialidadServicioByServicioIdUseCase(new EloquentEspecialidadServicioRepository);
            $esp = $getEspecialidadServicio->__invoke($serv->id);
            $arrayServicio = array(
                'id' => $serv->id,
                'nombre' => $serv->nombre,
                'descripcion'=>$serv->descripcion,
                'precio'=>$serv->precio
            );
            $eArray = array();
            foreach($esp as $e){
                $aux['idEspecialidad'] = $e->idEspecialidad;
                $aux['nombre'] = $e->nombre;
                $aux['descripcion'] = $e->descripcion;
                array_push($eArray, $aux); 
            }
            $arrayServicio['arrayEspecialidades'] = $eArray;
            array_push($arrayTodoLosServicios, $arrayServicio);
        }

        return $arrayTodoLosServicios;


        return $arrayServicio;
    }

    public function deleteServicio(Request $request){
        //falta
    }

}
