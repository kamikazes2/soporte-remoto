<?php

namespace Src\ModuloServicio\AsignacionServicio\Infrastructure\Repositories;


use App\Models\ServicePack\AsignacionServicio as EloquentAsignacionServicioModel;
use Src\ModuloServicio\AsignacionServicio\Domain\Contracts\AsignacionServicioRepositoryContract;
use Src\ModuloServicio\AsignacionServicio\Domain\AsignacionServicio;
use Illuminate\Support\Facades\DB;



class EloquentAsignacionServicioRepository implements AsignacionServicioRepositoryContract
{
    private $eloquentAsignacionServicioModel;

    public function __construct(){
        $this->eloquentAsignacionServicioModel = new EloquentAsignacionServicioModel;
    }

    public function save(AsignacionServicio $asignacionServicio)
    {

        $newAsignacionServicio = $this->eloquentAsignacionServicioModel;

        // $newServicio->nombre = $servicio->getNombre();
        // $newServicio->descripcion = $servicio->getDescripcion();

        $newAsignacionServicio->save();
        return $newAsignacionServicio->id;
    }
    
    // public function getAll()
    // {
    //     return $this->eloquentServicioModel->getAllWithPrice();
    // }


}
