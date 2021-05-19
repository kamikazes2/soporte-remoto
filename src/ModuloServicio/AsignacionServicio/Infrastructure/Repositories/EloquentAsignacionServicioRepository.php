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

        $newAsignacionServicio = new EloquentAsignacionServicioModel;
        $newAsignacionServicio->idServicioRealizar = $asignacionServicio->getIdServicioRealizar();
        $newAsignacionServicio->idTecnico = $asignacionServicio->getIdTecnico();
        $newAsignacionServicio->fecha = $asignacionServicio->getFecha();
        $newAsignacionServicio->save();
        return $newAsignacionServicio->id;
    }
    

}
