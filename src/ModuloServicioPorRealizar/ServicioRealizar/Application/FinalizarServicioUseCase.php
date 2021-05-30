<?php

namespace Src\ModuloServicioPorRealizar\ServicioRealizar\Application;

use Src\ModuloServicioPorRealizar\ServicioRealizar\Domain\Contracts\ServicioRealizarRepositoryContract;
use Src\ModuloServicioPorRealizar\ServicioRealizar\Domain\ServicioRealizar;

class FinalizarServicioUseCase
{
    private $repository;

    public function __construct(ServicioRealizarRepositoryContract $repository){
        $this->repository = $repository;
    }

    public function __invoke(
        $idServicioRealizar
    )
    {
        $this->repository->finalizar($idServicioRealizar);
    }

}