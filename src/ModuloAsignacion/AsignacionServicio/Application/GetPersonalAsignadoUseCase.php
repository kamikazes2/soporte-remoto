<?php

namespace Src\ModuloAsignacion\AsignacionServicio\Application;

use Src\ModuloAsignacion\AsignacionServicio\Domain\Contracts\AsignacionServicioRepositoryContract;
use Src\ModuloAsignacion\AsignacionServicio\Domain\AsignacionServicio;

class GetPersonalAsignadoUseCase
{
    private $repository;

    public function __construct(AsignacionServicioRepositoryContract $repository){
        $this->repository = $repository;
    }

    public function __invoke($id)
    {
        return $this->repository->getPersonalAsignado($id);
    }


}
