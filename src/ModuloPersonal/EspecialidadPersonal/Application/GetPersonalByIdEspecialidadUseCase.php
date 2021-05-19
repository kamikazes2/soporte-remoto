<?php

namespace Src\ModuloPersonal\EspecialidadPersonal\Application;

use Src\ModuloPersonal\EspecialidadPersonal\Domain\Contracts\EspecialidadPersonalRepositoryContract;
use Src\ModuloPersonal\EspecialidadPersonal\Domain\EspecialidadPersonal;

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
