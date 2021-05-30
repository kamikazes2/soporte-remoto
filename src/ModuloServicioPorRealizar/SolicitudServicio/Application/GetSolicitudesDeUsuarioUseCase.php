<?php

namespace Src\ModuloServicioPorRealizar\SolicitudServicio\Application;

use Src\ModuloServicioPorRealizar\SolicitudServicio\Domain\Contracts\SolicitudServicioRepositoryContract;
use Src\ModuloServicioPorRealizar\SolicitudServicio\Domain\SolicitudServicio;

class GetSolicitudesDeUsuarioUseCase
{
    private $repository;

    public function __construct(SolicitudServicioRepositoryContract $repository){
        $this->repository = $repository;
    }

    public function __invoke(
        $idUsuario
    )
    {
        return $this->repository->getByIdUsuario($idUsuario);
    }

}
