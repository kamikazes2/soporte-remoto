<?php

namespace Src\ModuloPersonal\JefeTecnico\Application;

use Src\ModuloPersonal\JefeTecnico\Domain\Contracts\JefeTecnicoRepositoryContract;
use Src\ModuloPersonal\JefeTecnico\Domain\JefeTecnico;

class DeleteJefeTecnicoUseCase
{
    private $repository;

    public function __construct(JefeTecnicoRepositoryContract $repository){
        $this->repository = $repository;
    }

    public function __invoke(
        $idPersonal
    )
    {
        $jefeTecnico = JefeTecnico::create($idPersonal);
        return $this->repository->delete($jefeTecnico);
    }

}
