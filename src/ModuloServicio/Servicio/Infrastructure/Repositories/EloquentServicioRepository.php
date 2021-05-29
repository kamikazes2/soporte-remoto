<?php

namespace Src\ModuloServicio\Servicio\Infrastructure\Repositories;


use App\Models\ServicePack\Servicio as EloquentServicioModel;
use Src\ModuloServicio\Servicio\Domain\Contracts\ServicioRepositoryContract;
use Src\ModuloServicio\Servicio\Domain\Servicio;
use Illuminate\Support\Facades\DB;



class EloquentServicioRepository implements ServicioRepositoryContract
{
    private $eloquentServicioModel;

    public function __construct(){
        $this->eloquentServicioModel = new EloquentServicioModel;
    }

    public function save(Servicio $servicio)
    {

        $newServicio = $this->eloquentServicioModel;

        $newServicio->nombre = $servicio->getNombre();
        $newServicio->descripcion = $servicio->getDescripcion();

        $newServicio->save();
        return $newServicio;
    }
    
    public function getAll()
    {
        return $this->eloquentServicioModel->getAllWithPrice();
    }

    public function update(Servicio $servicio){
        $EloquentServicio = $this->eloquentServicioModel;
        $EloquentServicio =  $EloquentServicio::find($servicio->getId());
        $EloquentServicio->nombre = $servicio->getNombre();
        $EloquentServicio->descripcion = $servicio->getDescripcion();
        $EloquentServicio->save();
        return $EloquentServicio;
    }

    public function buscarServicio($idServicio){
        $EloquentServicio = $this->eloquentServicioModel;
        $servicio = $EloquentServicio->getByIdServicio($idServicio);
        return $servicio;
    }

}
