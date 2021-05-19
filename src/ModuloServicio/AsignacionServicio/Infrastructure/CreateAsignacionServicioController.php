<?php

namespace Src\ModuloServicio\AsignacionServicio\Infrastructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Src\ModuloServicio\AsignacionServicio\Infrastructure\Repositories\EloquentAsignacionServicioRepository;
use Src\ModuloServicio\AsignacionServicio\Application\CreateAsignacionServicioUseCase;



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
