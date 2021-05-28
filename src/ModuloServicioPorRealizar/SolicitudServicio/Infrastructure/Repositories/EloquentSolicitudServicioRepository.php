<?php

namespace Src\ModuloServicioPorRealizar\SolicitudServicio\Infrastructure\Repositories;


use App\Models\ServicePack\SolicitudServicio as EloquentSolicitudServicioModel;
use Src\ModuloServicioPorRealizar\SolicitudServicio\Domain\Contracts\SolicitudServicioRepositoryContract;
use Src\ModuloServicioPorRealizar\SolicitudServicio\Domain\SolicitudServicio;
use Illuminate\Support\Facades\DB;



class EloquentSolicitudServicioRepository implements SolicitudServicioRepositoryContract
{
    private $eloquentSolicitudServicioModel;

    public function __construct(){
        $this->eloquentSolicitudServicioModel = new EloquentSolicitudServicioModel;
    }

    public function save(SolicitudServicio $solicitudServicio)
    {

        $newSolicitudServicio = $this->eloquentSolicitudServicioModel;

        $newSolicitudServicio->idCliente = $solicitudServicio->getIdCliente();
        $newSolicitudServicio->fechaSolicitud = $solicitudServicio->getFechaSolicitud();

        $newSolicitudServicio->save();
        return $newSolicitudServicio;
    }
    


}
