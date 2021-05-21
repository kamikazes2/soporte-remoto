<?php

namespace Src\ModuloEspecialidad\EspecialidadPersonal\Application;

use Src\ModuloEspecialidad\EspecialidadPersonal\Domain\Contracts\EspecialidadPersonalRepositoryContract;
use Src\ModuloEspecialidad\EspecialidadPersonal\Domain\EspecialidadPersonal;

class GetPersonalByIdEspecialidadUseCase
{
    private $repository;

    public function __construct(EspecialidadPersonalRepositoryContract $repository){
        $this->repository = $repository;
    }

    public function __invoke($idEspecialidad)
    {
        return $this->repository->getPersonalByIdEspecialidad($idEspecialidad);
    }


}
