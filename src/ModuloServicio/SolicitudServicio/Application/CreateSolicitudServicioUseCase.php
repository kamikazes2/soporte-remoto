<?php

namespace Src\ModuloServicio\SolicitudServicio\Application;

use Src\ModuloServicio\SolicitudServicio\Domain\Contracts\SolicitudServicioRepositoryContract;
use Src\ModuloServicio\SolicitudServicio\Domain\SolicitudServicio;

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
