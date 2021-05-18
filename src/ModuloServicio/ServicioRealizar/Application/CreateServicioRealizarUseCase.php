<?php

namespace Src\ModuloServicio\ServicioRealizar\Application;

use Src\ModuloServicio\ServicioRealizar\Domain\Contracts\ServicioRealizarRepositoryContract;
use Src\ModuloServicio\ServicioRealizar\Domain\ServicioRealizar;

class CreateServicioRealizarUseCase
{
    private $repository;

    public function __construct(ServicioRealizarRepositoryContract $repository){
        $this->repository = $repository;
    }

    public function __invoke(
        $idServicio,
        $idSolicitud,
        $precioFijado,
        $completado,
        $estado
    )
    {
        $ServicioRealizar = ServicioRealizar::create($idServicio, $idSolicitud, $precioFijado, $completado, $estado);
        $this->repository->save($ServicioRealizar);
    }

}