<?php

namespace Src\ModuloServicioPorRealizar\SolicitudServicio\Application;

use Src\ModuloServicioPorRealizar\SolicitudServicio\Domain\Contracts\SolicitudServicioRepositoryContract;
use Src\ModuloServicioPorRealizar\SolicitudServicio\Domain\SolicitudServicio;

class CreateSolicitudServicioUseCase
{
    private $repository;

    public function __construct(SolicitudServicioRepositoryContract $repository){
        $this->repository = $repository;
    }

    public function __invoke(
        $idCliente,
        $fechaSolicitud
    )
    {
        $solicitudServicio = SolicitudServicio::create($idCliente, $fechaSolicitud);
        return $this->repository->save($solicitudServicio);
    }

}
