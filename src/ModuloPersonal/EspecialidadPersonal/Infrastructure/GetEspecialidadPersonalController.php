<?php

namespace Src\ModuloPersonal\EspecialidadPersonal\Infrastructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Src\ModuloPersonal\EspecialidadPersonal\Infrastructure\Repositories\EloquentEspecialidadPersonalRepository;
use Src\ModuloPersonal\EspecialidadPersonal\Application\GetEspecialidadPersonalUseCase;



class GetEspecialidadPersonalController
{
    private $repository;

    public function __construct(EloquentEspecialidadPersonalRepository $repository){
        $this->repository = $repository;
    }

    public function __invoke()
    {
        //  
    }

    public function getPersonalByIdEspecialidad($idEspecialidad){
        $getEspecialidadPersonal = new GetEspecialidadPersonalUseCase($this->repository);
        $esp = $getEspecialidadPersonal->__invoke($idEspecialidad);
        return $esp;
    }


}
