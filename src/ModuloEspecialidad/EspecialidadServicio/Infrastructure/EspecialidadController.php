<?php

namespace Src\ModuloEspecialidad\EspecialidadServicio\Infrastructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Src\ModuloEspecialidad\EspecialidadServicio\Infrastructure\Repositories\EloquentEspecialidadServicioRepository;
use Src\ModuloEspecialidad\EspecialidadServicio\Application\GetEspecialidadServicioUseCase;



class EspecialidadServicioController
{
    private $repository;

    public function __construct(EloquentEspecialidadServicioRepository $repository){
        $this->repository = $repository;
    }

    public function __invoke()
    {
        //  
    }

}
