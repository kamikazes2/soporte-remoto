<?php

namespace Src\ModuloServicio\Servicio\Application;

use Src\ModuloServicio\Servicio\Domain\Contracts\ServicioRepositoryContract;
use Src\ModuloServicio\Servicio\Domain\Servicio;

class UpdateServicioUseCase
{
    private $repository;

    public function __construct(ServicioRepositoryContract $repository){
        $this->repository = $repository;
    }

    public function __invoke(
        $idServicio,
        $nombre,
        $descripcion
    )
    {
        $servicio = Servicio::create($nombre, $descripcion);
        $servicio->setId($idServicio);
        return $this->repository->update($servicio);
    }

}
