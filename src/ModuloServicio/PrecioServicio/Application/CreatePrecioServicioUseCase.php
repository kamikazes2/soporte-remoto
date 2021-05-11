<?php

namespace Src\ModuloServicio\PrecioServicio\Application;

use Src\ModuloServicio\PrecioServicio\Domain\Contracts\PrecioServicioRepositoryContract;
use Src\ModuloServicio\PrecioServicio\Domain\PrecioServicio;

class CreatePrecioServicioUseCase
{
    private $repository;

    public function __construct(PrecioServicioRepositoryContract $repository){
        $this->repository = $repository;
    }

    public function __invoke(
        $idServicio,
        $precio,
        $fecha
    )
    {
        $precioServicio = PrecioServicio::create($idServicio, $precio, $fecha);
        $this->repository->save($precioServicio);
    }

}