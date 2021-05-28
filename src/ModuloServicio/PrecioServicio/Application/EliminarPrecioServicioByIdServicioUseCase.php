<?php

namespace Src\ModuloServicio\PrecioServicio\Application;

use Src\ModuloServicio\PrecioServicio\Domain\Contracts\PrecioServicioRepositoryContract;
use Src\ModuloServicio\PrecioServicio\Domain\PrecioServicio;

class EliminarPrecioServicioByIdServicioUseCase
{
    private $repository;

    public function __construct(PrecioServicioRepositoryContract $repository){
        $this->repository = $repository;
    }

    public function __invoke(
        $idServicio
    )
    {
        return $this->repository->delete($idServicio);
    }

}