<?php

namespace Src\ModuloEspecialidad\EspecialidadPersonal\Application;

use Src\ModuloEspecialidad\EspecialidadPersonal\Domain\Contracts\EspecialidadPersonalRepositoryContract;
use Src\ModuloEspecialidad\EspecialidadPersonal\Domain\EspecialidadPersonal;

class BuscarSiExisteRelacionUseCase
{
    private $repository;

    public function __construct(EspecialidadPersonalRepositoryContract $repository){
        $this->repository = $repository;
    }

    public function __invoke($idPersonal, $idEspecialidad)
    {
        return $this->repository->BuscarSiExisteRelacion($idPersonal, $idEspecialidad);
    }


}
