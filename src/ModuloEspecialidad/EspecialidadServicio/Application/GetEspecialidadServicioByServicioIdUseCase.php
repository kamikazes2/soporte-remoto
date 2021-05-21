<?php

namespace Src\ModuloEspecialidad\EspecialidadServicio\Application;

use Src\ModuloEspecialidad\EspecialidadServicio\Domain\Contracts\EspecialidadServicioRepositoryContract;
use Src\ModuloEspecialidad\EspecialidadServicio\Domain\EspecialidadServicio;

class GetEspecialidadServicioByServicioIdUseCase
{
    private $repository;

    public function __construct(EspecialidadServicioRepositoryContract $repository){
        $this->repository = $repository;
    }

    public function __invoke($idServicio)
    {
        return $this->repository->getEspecialidadByIdServicio($idServicio);
    }


}
