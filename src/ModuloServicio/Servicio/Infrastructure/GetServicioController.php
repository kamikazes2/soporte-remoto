<?php

namespace Src\ModuloServicio\Servicio\Infrastructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Src\ModuloServicio\Servicio\Infrastructure\Repositories\EloquentServicioRepository;
use Src\ModuloServicio\Servicio\Application\GetServicioUseCase;



class GetServicioController
{
    private $repository;

    public function __construct(EloquentServicioRepository $repository){
        $this->repository = $repository;
    }

    public function __invoke()
    {
        $getServicios = new GetServicioUseCase($this->repository);
        $servicios = $getServicios->__invoke();
        return $servicios;
    }

}
