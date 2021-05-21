<?php

namespace Src\ModuloAsignacion\AsignacionServicio\Infrastructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Src\ModuloAsignacion\AsignacionServicio\Infrastructure\Repositories\EloquentAsignacionServicioRepository;
use Src\ModuloAsignacion\AsignacionServicio\Application\GetPersonalAsignadoUseCase;



class GetAsignacionServicioController
{
    private $repository;

    public function __construct(EloquentAsignacionServicioRepository $repository){
        $this->repository = $repository;
    }

    public function __invoke()
    {
        //
    }

    public function getTecnicoAsignado(Request $request){
        $idServicioRealizar = $request['idServicioRealizar'];
        $getPersonalAsignadoUseCase = new GetPersonalAsignadoUseCase($this->repository);
        $idPersonal = $getPersonalAsignadoUseCase->__invoke($idServicioRealizar);
        return $idPersonal;
    }

}
