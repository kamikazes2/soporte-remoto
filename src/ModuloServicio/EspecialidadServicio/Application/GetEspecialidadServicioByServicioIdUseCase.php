<?php

namespace Src\ModuloServicio\EspecialidadServicio\Application;

use Src\ModuloServicio\EspecialidadServicio\Domain\Contracts\EspecialidadServicioRepositoryContract;
use Src\ModuloServicio\EspecialidadServicio\Domain\EspecialidadServicio;

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
