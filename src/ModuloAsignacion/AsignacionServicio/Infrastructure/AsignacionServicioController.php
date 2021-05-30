<?php

namespace Src\ModuloAsignacion\AsignacionServicio\Infrastructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Src\ModuloAsignacion\AsignacionServicio\Infrastructure\Repositories\EloquentAsignacionServicioRepository;
use Src\ModuloAsignacion\AsignacionServicio\Application\CreateAsignacionServicioUseCase;



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

}
