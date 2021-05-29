<?php

namespace Src\ModuloServicioPorRealizar\ServicioRealizar\Application;

use Src\ModuloServicioPorRealizar\ServicioRealizar\Domain\Contracts\ServicioRealizarRepositoryContract;
use Src\ModuloServicioPorRealizar\ServicioRealizar\Domain\ServicioRealizar;

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
        return $this->repository->save($ServicioRealizar);
    }

}