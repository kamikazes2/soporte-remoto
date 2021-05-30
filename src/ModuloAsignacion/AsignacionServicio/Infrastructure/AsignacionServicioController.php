<?php

namespace Src\ModuloAsignacion\AsignacionServicio\Infrastructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;

use Src\ModuloAsignacion\AsignacionServicio\Infrastructure\Repositories\EloquentAsignacionServicioRepository;
use Src\ModuloAsignacion\AsignacionServicio\Application\CreateAsignacionServicioUseCase;
use Src\ModuloAsignacion\AsignacionServicio\Application\GetServiciosAsignadosUseCase;



class AsignacionServicioController
{
    private $repository;

    public function __construct(EloquentAsignacionServicioRepository $repository){
        $this->repository = $repository;
    }

    public function AsignarServicio()
    {
        $createAsignacionServicioUseCase = new CreateAsignacionServicioUseCase($this->repository);
        $serv = $createAsignacionServicioUseCase->__invoke();

        return $serv;
    }

    public function getServiciosAsignados(Request $request){
        $idUsuario = Session::get('idUsuario');
        $sa = new GetServiciosAsignadosUseCase($this->repository);
        $res = $sa->__invoke($idUsuario);
        return $res;
    }

}
