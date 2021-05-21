<?php

namespace Src\ModuloAsignacion\AsignacionServicio\Infrastructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Src\ModuloAsignacion\AsignacionServicio\Infrastructure\Repositories\EloquentAsignacionServicioRepository;
use Src\ModuloAsignacion\AsignacionServicio\Application\CreateAsignacionServicioUseCase;



class CreateAsignacionServicioController
{
    private $repository;

    public function __construct(EloquentAsignacionServicioRepository $repository){
        $this->repository = $repository;
    }

    public function __invoke()
    {

        $createAsignacionServicioUseCase = new CreateAsignacionServicioUseCase($this->repository);
        $serv = $createAsignacionServicioUseCase->__invoke();

        return $serv;
    }

}
