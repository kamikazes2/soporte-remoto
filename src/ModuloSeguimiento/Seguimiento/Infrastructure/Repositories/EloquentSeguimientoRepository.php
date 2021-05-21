<?php

namespace Src\ModuloSeguimiento\Seguimiento\Infrastructure\Repositories;


use App\Models\ServicePack\Seguimiento as EloquentSeguimientoModel;
use Src\ModuloSeguimiento\Seguimiento\Domain\Contracts\SeguimientoRepositoryContract;
use Src\ModuloSeguimiento\Seguimiento\Domain\Seguimiento;
use Illuminate\Support\Facades\DB;



class EloquentSeguimientoRepository implements SeguimientoRepositoryContract
{
    private $eloquentSeguimientoModel;

    public function __construct(){
        $this->eloquentSeguimientoModel = new EloquentSeguimientoModel;
    }

    public function save(Seguimiento $seguimiento)
    {

        $newSeguimiento = $this->eloquentSeguimientoModel;

        $newSeguimiento->idAsignacionServicio = $seguimiento->getIdAsignacionServicio();
        $newSeguimiento->idJefeTecnico = $seguimiento->getIdJefeTecnico();
        $newSeguimiento->descripcion = $seguimiento->getDescripcion();
        $newSeguimiento->fecha = $seguimiento->getFecha();

        $newSeguimiento->save();
        return $newSeguimiento->id;
    }
    
    public function getAll()
    {
        //return $this->eloquentSeguimientoModel->getAllWithPrice();
    }


}
