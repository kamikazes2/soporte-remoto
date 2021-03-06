<?php

namespace Src\ModuloServicioPorRealizar\ServicioRealizar\Infrastructure\Repositories;


use App\Models\ServicePack\ServicioRealizar as EloquentServicioRealizarModel;
use Src\ModuloServicioPorRealizar\ServicioRealizar\Domain\Contracts\ServicioRealizarRepositoryContract;
use Src\ModuloServicioPorRealizar\ServicioRealizar\Domain\ServicioRealizar;
use Illuminate\Support\Facades\DB;

class EloquentServicioRealizarRepository implements ServicioRealizarRepositoryContract
{
    private $eloquentServicioRealizarModel;

    public function __construct(){
        $this->eloquentServicioRealizarModel = new EloquentServicioRealizarModel;
    }

    public function save(ServicioRealizar $servicioRealizar)
    {
        $newServicioRealizar = $this->eloquentServicioRealizarModel;
        
        $newServicioRealizar->idServicio = $servicioRealizar->getIdServicio();
        $newServicioRealizar->idSolicitud = $servicioRealizar->getIdSolicitud();
        $newServicioRealizar->precioFijado = $servicioRealizar->getPrecioFijado();
        $newServicioRealizar->completado = $servicioRealizar->getCompletado();
        $newServicioRealizar->estado = $servicioRealizar->getEstado();

        $newServicioRealizar->save();
        return $newServicioRealizar;
    }
    
    public function getServicioPendiente()
    {
        return $this->eloquentServicioRealizarModel->getServicioPendiente();
    }

    public function complete($idServicioRealizar){
        return $this->eloquentServicioRealizarModel->updateToComplete($idServicioRealizar);
    }

    public function aceptar($idServicioRealizar){
        return $this->eloquentServicioRealizarModel->aceptar($idServicioRealizar);
    }
    public function finalizar($idServicioRealizar){
        return $this->eloquentServicioRealizarModel->SolicitarfinalizacionServicio($idServicioRealizar);
    }

    public function aceptarFinalizacion($idServicioRealizar){
        return $this->eloquentServicioRealizarModel->aceptarFinalizacionServicio($idServicioRealizar);
    }

}
