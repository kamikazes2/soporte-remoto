<?php

namespace Src\ModuloServicioPorRealizar\ServicioRealizar\Application;

use Src\ModuloServicioPorRealizar\ServicioRealizar\Domain\Contracts\ServicioRealizarRepositoryContract;
use Src\ModuloServicioPorRealizar\ServicioRealizar\Domain\ServicioRealizar;

class CompleteServicioRealizarUseCase
{
    private $repository;

    public function __construct(ServicioRealizarRepositoryContract $repository){
        $this->repository = $repository;
    }

    public function __invoke(
        $idServicioRealizar
    )
    {
        $this->repository->complete($idServicioRealizar);
    }

}