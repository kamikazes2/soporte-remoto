<?php

namespace Src\ModuloServicio\ServicioRealizar\Infrastructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Src\ModuloServicio\ServicioRealizar\Infrastructure\Repositories\EloquentServicioRealizarRepository;
use Src\ModuloServicio\ServicioRealizar\Application\GetServicioPendienteUseCase;



class GetServicioRealizarController
{
    private $repository;

    public function __construct(EloquentServicioRealizarRepository $repository){
        $this->repository = $repository;
    }

    public function __invoke()
    {
        // $getServiciosPendientes = new GetServicioPendienteUseCase($this->repository);
        // $servicios = $getServiciosPendientes->__invoke();
        // return $servicios;
    }

    public function getServicioPendiente(){
        $getServiciosPendientes = new GetServicioPendienteUseCase($this->repository);
        $servicios = $getServiciosPendientes->__invoke();
        return $servicios;
    }


}
