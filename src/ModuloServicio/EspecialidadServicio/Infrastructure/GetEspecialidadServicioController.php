<?php

namespace Src\ModuloServicio\EspecialidadServicio\Infrastructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Src\ModuloServicio\EspecialidadServicio\Infrastructure\Repositories\EloquentEspecialidadServicioRepository;
use Src\ModuloServicio\EspecialidadServicio\Application\GetEspecialidadServicioUseCase;



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
