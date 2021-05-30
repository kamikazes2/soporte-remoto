<?php

namespace Src\ModuloAsignacion\AsignacionServicio\Application;

use Src\ModuloAsignacion\AsignacionServicio\Domain\Contracts\AsignacionServicioRepositoryContract;
use Src\ModuloAsignacion\AsignacionServicio\Domain\AsignacionServicio;

class GetServiciosAsignadosUseCase
{
    private $repository;

    public function __construct(AsignacionServicioRepositoryContract $repository){
        $this->repository = $repository;
    }

    public function __invoke($idUsuario)
    {
        return $this->repository->getServiciosAsignados($idUsuario);
    }


}