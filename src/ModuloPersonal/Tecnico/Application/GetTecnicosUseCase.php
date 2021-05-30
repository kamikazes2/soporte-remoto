<?php

namespace Src\ModuloPersonal\Tecnico\Application;

use Src\ModuloPersonal\Tecnico\Domain\Contracts\TecnicoRepositoryContract;
use Src\ModuloPersonal\Tecnico\Domain\Tecnico;

class GetTecnicosUseCase
{
    private $repository;

    public function __construct(TecnicoRepositoryContract $repository){
        $this->repository = $repository;
    }

    public function __invoke(
    )
    {
        return $this->repository->getAll();
    }

}
