<?php

namespace Src\ModuloServicioPorRealizar\SolicitudServicio\Infrastructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

use Src\ModuloServicioPorRealizar\SolicitudServicio\Infrastructure\Repositories\EloquentSolicitudServicioRepository;
use Src\ModuloServicioPorRealizar\SolicitudServicio\Application\CreateSolicitudServicioUseCase;



class CreateSolicitudServicioController
{
    private $repository;

    public function __construct(EloquentSolicitudServicioRepository $repository){
        $this->repository = $repository;
    }

    public function __invoke(Request $request)
    {
        $idCliente = $request['idCliente'];
        $date = Carbon::now();
        $fecha = $date->toDateTimeString();
        $fechaSolicitud = $fecha;

        $createSolicitudServicioUseCase = new CreateSolicitudServicioUseCase($this->repository);
        $serv = $createSolicitudServicioUseCase->__invoke(
            $idCliente,
            $fechaSolicitud
        );

        return $serv;
    }

}
