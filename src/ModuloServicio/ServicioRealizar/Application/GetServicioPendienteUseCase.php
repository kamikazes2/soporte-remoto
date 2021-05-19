<?php

namespace Src\ModuloServicio\ServicioRealizar\Application;

use Src\ModuloServicio\ServicioRealizar\Domain\Contracts\ServicioRealizarRepositoryContract;
use Src\ModuloServicio\ServicioRealizar\Domain\ServicioRealizar;

class GetServicioPendienteUseCase
{
    private $repository;

    public function __construct(ServicioRealizarRepositoryContract $repository){
        $this->repository = $repository;
    }

    public function __invoke()
    {
        return $this->repository->getServicioPendiente();
    }


}
