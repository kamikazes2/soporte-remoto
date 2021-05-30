<?php

namespace Src\ModuloPersonal\Tecnico\Application;

use Src\ModuloPersonal\Tecnico\Domain\Contracts\TecnicoRepositoryContract;
use Src\ModuloPersonal\Tecnico\Domain\Tecnico;

class DeleteTecnicoUseCase
{
    private $repository;

    public function __construct(TecnicoRepositoryContract $repository){
        $this->repository = $repository;
    }

    public function __invoke(
        $idPersonal
    )
    {
        $tecnico = Tecnico::create($idPersonal);
        return $this->repository->delete($tecnico);
    }

}
