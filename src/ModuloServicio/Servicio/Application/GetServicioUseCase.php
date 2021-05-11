<?php

namespace Src\ModuloServicio\Servicio\Application;

use Src\ModuloServicio\Servicio\Domain\Contracts\ServicioRepositoryContract;
use Src\ModuloServicio\Servicio\Domain\Servicio;

class GetServicioUseCase
{
    private $repository;

    public function __construct(ServicioRepositoryContract $repository){
        $this->repository = $repository;
    }

    public function __invoke()
    {
        return $this->repository->getAll();
    }

}
