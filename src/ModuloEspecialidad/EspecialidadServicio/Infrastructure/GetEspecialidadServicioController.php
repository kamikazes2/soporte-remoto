<?php

namespace Src\ModuloEspecialidad\EspecialidadServicio\Infrastructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Src\ModuloEspecialidad\EspecialidadServicio\Infrastructure\Repositories\EloquentEspecialidadServicioRepository;
use Src\ModuloEspecialidad\EspecialidadServicio\Application\GetEspecialidadServicioUseCase;



class GetEspecialidadServicioController
{
    private $repository;

    public function __construct(EloquentEspecialidadServicioRepository $repository){
        $this->repository = $repository;
    }

    public function __invoke()
    {
        //  
    }

    public function getEspecialidadByIdServicio($idServicio){
        $getEspecialidadServicio = new GetEspecialidadServicioUseCase($this->repository);
        $esp = $getEspecialidadServicio->__invoke($idServicio);
        return $esp;
    }


}
