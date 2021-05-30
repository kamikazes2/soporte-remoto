<?php

namespace Src\ModuloEspecialidad\EspecialidadPersonal\Application;

use Src\ModuloEspecialidad\EspecialidadPersonal\Domain\Contracts\EspecialidadPersonalRepositoryContract;
use Src\ModuloEspecialidad\EspecialidadPersonal\Domain\EspecialidadPersonal;

class GetEspecialidadesByIdPersonalUseCase
{
    private $repository;

    public function __construct(EspecialidadPersonalRepositoryContract $repository){
        $this->repository = $repository;
    }

    public function __invoke($idPersonal)
    {
        return $this->repository->GetEspecialidadesByIdPersonal($idPersonal);
    }


}
