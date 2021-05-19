<?php

namespace Src\ModuloServicio\ServicioRealizar\Infrastructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Src\ModuloServicio\ServicioRealizar\Infrastructure\Repositories\EloquentServicioRealizarRepository;
use Src\ModuloServicio\ServicioRealizar\Application\CreateServicioRealizarUseCase;



class CreateServicioRealizarController
{
    private $repository;

    public function __construct(EloquentServicioRealizarRepository $repository){
        $this->repository = $repository;
    }

    public function __invoke(Request $request)
    {
        $idServicio = $request['idServicio'];
        $idSolicitud = $request['idSolicitud'];
        $precioFijado = $request['precioFijado'];
        $completado = false;
        $estado = "PENDIENTE";

        $createServicioRealizarUseCase = new CreateServicioRealizarUseCase($this->repository);
        $serv = $createServicioRealizarUseCase->__invoke(
            $idServicio,
            $idSolicitud,
            $precioFijado,
            $completado,
            $estado
        );

        return $serv;
    }

}
