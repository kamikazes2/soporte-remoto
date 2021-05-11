<?php

namespace Src\ModuloServicio\Servicio\Application;

use Src\ModuloServicio\Servicio\Domain\Contracts\ServicioRepositoryContract;
use Src\ModuloServicio\Servicio\Domain\Servicio;

class CreateServicioUseCase
{
    private $repository;

    public function __construct(ServicioRepositoryContract $repository){
        $this->repository = $repository;
    }

    public function __invoke(
        $nombre,
        $descripcion
    )
    {
        $servicio = Servicio::create($nombre, $descripcion);
        return $this->repository->save($servicio);
    }

}
