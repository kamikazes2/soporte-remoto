<?php

namespace Src\ModuloServicio\Servicio\Application;

use Src\ModuloServicio\Servicio\Domain\Contracts\ServicioRepositoryContract;
use Src\ModuloServicio\Servicio\Domain\Servicio;

class BuscarServicioUseCase
{
    private $repository;

    public function __construct(ServicioRepositoryContract $repository){
        $this->repository = $repository;
    }

    public function __invoke($idServicio)
    {
        return $this->repository->buscarServicio($idServicio);
    }

}