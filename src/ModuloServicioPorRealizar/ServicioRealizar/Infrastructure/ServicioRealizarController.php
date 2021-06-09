<?php

namespace Src\ModuloServicioPorRealizar\ServicioRealizar\Infrastructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Src\ModuloServicioPorRealizar\ServicioRealizar\Infrastructure\Repositories\EloquentServicioRealizarRepository;
use Src\ModuloServicioPorRealizar\ServicioRealizar\Application\CreateServicioRealizarUseCase;
use Src\ModuloServicioPorRealizar\ServicioRealizar\Application\AceptarServicioUseCase;
use Src\ModuloServicioPorRealizar\ServicioRealizar\Application\FinalizarServicioUseCase;
use Src\ModuloServicioPorRealizar\ServicioRealizar\Application\AprobarFinalizacionUseCase;

use Src\ModuloAsignacion\AsignacionServicio\Infrastructure\Repositories\EloquentAsignacionServicioRepository;
use Src\ModuloAsignacion\AsignacionServicio\Application\CreateAsignacionServicioUseCase;

use App\Models\ServicePack\ServicioRealizar;

class ServicioRealizarController
{
    private $repository;
    private $asignacionRespository;
    public function __construct(
        EloquentServicioRealizarRepository $repository,
        EloquentAsignacionServicioRepository $repo
        ){
        $this->repository = $repository;
        $this->asignacionRespository = $repo;
    }

    public function create(Request $request)
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

    public function aceptarServicio(Request $request){
        $idServicioRealizar = $request['idServicioRealizar'];
        $accept = new AceptarServicioUseCase($this->repository);
        $accept->__invoke($idServicioRealizar);
        return response()->json("aceptado");
    }
    public function finalizarServicio(Request $request){
        $idServicioRealizar = $request['idServicioRealizar'];
        $accept = new FinalizarServicioUseCase($this->repository);
        $accept->__invoke($idServicioRealizar);
        return response()->json("finalizado");
    }
    public function aprobarFinalizacionServicio(Request $request){
        $idServicioRealizar = $request['idServicioRealizar'];
        $accept = new AprobarFinalizacionUseCase($this->repository);
        $accept->__invoke($idServicioRealizar);
        $as = new CreateAsignacionServicioUseCase($this->asignacionRespository);
        $as->__invoke();
        return response()->json("finalizado");
    }

    public function update_Pendiente(Request $request)
    {
        $sr = new ServicioRealizar;
        $sr->updateToPendiente( $request['idServicioRealizar']);
        return true;
    }


}
