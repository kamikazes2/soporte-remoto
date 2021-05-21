<?php

namespace Src\ModuloServicioPorRealizar\ServicioRealizar\Infrastructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Src\ModuloServicioPorRealizar\ServicioRealizar\Infrastructure\Repositories\EloquentServicioRealizarRepository;
use Src\ModuloServicioPorRealizar\ServicioRealizar\Application\CompleteServicioRealizarUseCase;



class UpdateServicioRealizarController
{
    private $repository;

    public function __construct(EloquentServicioRealizarRepository $repository){
        $this->repository = $repository;
    }

    public function __invoke(Request $request)
    {
        //
    }

    public function complete(Request $request){
        $idServicioRealizar = $request['idServicioRealizar'];

        $completeServicioRealizarUseCase = new CompleteServicioRealizarUseCase($this->repository);
        $serv = $completeServicioRealizarUseCase->__invoke(
            $idServicioRealizar
        );

        return $serv; 
    }

}
