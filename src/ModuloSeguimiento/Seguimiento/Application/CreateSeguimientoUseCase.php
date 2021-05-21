<?php

namespace Src\ModuloSeguimiento\Seguimiento\Application;

use Src\ModuloSeguimiento\Seguimiento\Domain\Contracts\SeguimientoRepositoryContract;
use Src\ModuloSeguimiento\Seguimiento\Domain\Seguimiento;

use Carbon\Carbon;

class CreateSeguimientoUseCase
{
    private $repository;

    public function __construct(SeguimientoRepositoryContract $repository){
        $this->repository = $repository;
    }

    public function __invoke(
        $idAsignacionServicio,
        $idJefeTecnico,
        $descripcion
    )
    {
        $date = Carbon::now();
        $fecha = $date->toDateTimeString();
        $seguimiento = Seguimiento::create($idAsignacionServicio, $idJefeTecnico, $fecha, $descripcion);
        return $this->repository->save($seguimiento);
    }

}
