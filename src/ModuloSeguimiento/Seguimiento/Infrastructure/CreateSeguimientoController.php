<?php

namespace Src\ModuloSeguimiento\Seguimiento\Infrastructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Src\ModuloSeguimiento\Seguimiento\Infrastructure\Repositories\EloquentSeguimientoRepository;
use Src\ModuloSeguimiento\Seguimiento\Application\CreateSeguimientoUseCase;



class CreateSeguimientoController
{
    private $repository;

    public function __construct(EloquentSeguimientoRepository $repository){
        $this->repository = $repository;
    }

    public function __invoke(Request $request)
    {
        $idAsignacionServicio = $request['idAsignacionServicio'];
        $idJefeTecnico = $request['idJefeTecnico'];
        $descripcion = $request['descripcion'];
        $createSeguimientoUseCase = new CreateSeguimientoUseCase($this->repository);
        $seg = $createSeguimientoUseCase->__invoke(
            $idAsignacionServicio,
            $idJefeTecnico,
            $descripcion
        );

        return $seg;
    }

}
