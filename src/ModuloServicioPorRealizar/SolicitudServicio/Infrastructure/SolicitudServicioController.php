<?php

namespace Src\ModuloServicioPorRealizar\SolicitudServicio\Infrastructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Session;

use Src\ModuloServicioPorRealizar\SolicitudServicio\Infrastructure\Repositories\EloquentSolicitudServicioRepository;
use Src\ModuloServicioPorRealizar\SolicitudServicio\Application\CreateSolicitudServicioUseCase;

use Src\ModuloServicioPorRealizar\ServicioRealizar\Infrastructure\Repositories\EloquentServicioRealizarRepository;
use Src\ModuloServicioPorRealizar\ServicioRealizar\Application\CreateServicioRealizarUseCase;

use Src\ModuloAsignacion\AsignacionServicio\Infrastructure\Repositories\EloquentAsignacionServicioRepository;
use Src\ModuloAsignacion\AsignacionServicio\Application\CreateAsignacionServicioUseCase;
use Src\ModuloServicioPorRealizar\SolicitudServicio\Application\GetSolicitudesDeUsuarioUseCase;



class SolicitudServicioController
{
    private $ssRepository;
    private $srRepository;
    private $aRepository;
    public function __construct(
        EloquentSolicitudServicioRepository $SSrepository,
        EloquentServicioRealizarRepository $SRrepository,
        EloquentAsignacionServicioRepository $Arepository
        ){
        $this->ssRepository = $SSrepository;
        $this->srRepository = $SRrepository;
        $this->aRepository = $Arepository;
    }

    public function createSolicitud(Request $request)
    {
        //creamos la solicitud
        $idCliente = $request['idCliente'];
        $date = Carbon::now();
        $fecha = $date->toDateTimeString();
        $fechaSolicitud = $fecha;

        $createSolicitudServicioUseCase = new CreateSolicitudServicioUseCase($this->ssRepository);
        $sol = $createSolicitudServicioUseCase->__invoke(
            $idCliente,
            $fechaSolicitud
        );

        //creamos el servicio por realizar
        $arraySol = array();
        foreach($request['arrayServicios'] as $array){
            if($array['idServicio']!='' && $array['precioFijado']!=''){
                $idSolicitud = $sol->id;
                $idServicio = $array['idServicio'];
                $precioFijado = $array['precioFijado'];
                $completado = false;
                $estado = "PENDIENTE";
                $createServicioRealizarUseCase = new CreateServicioRealizarUseCase(new EloquentServicioRealizarRepository);
                $serv = $createServicioRealizarUseCase->__invoke(
                    $idServicio,
                    $idSolicitud,
                    $precioFijado,
                    $completado,
                    $estado
                );
                array_push($arraySol, $serv);
            }
        }
        $createAsignacionServicioUseCase = new CreateAsignacionServicioUseCase($this->aRepository);
        $a = $createAsignacionServicioUseCase->__invoke();
        return response()->json($arraySol);
    }

    public function getSolicitudesDeUsuario(){
        $idUsuario = 4;//Session::get('idUsuario');
        $solUC = new GetSolicitudesDeUsuarioUseCase($this->ssRepository);
        $result = $solUC->__invoke($idUsuario);
        if(count($result)==0){
            return response()->json(false);
        }
        $idAnt = 0;
        $arrayAux = array();
        $count = -1;
        foreach($result as $res){
             if($idAnt == $res->idSolicitud){
                $d['nombreServicio'] = $res->nombreServicio;
                $d['estado'] = $res->estado;
                array_push($arrayAux[$count]['detalle'], $d);
             }else{
                $count++;
                $idAnt = $res->idSolicitud;
                $a['idSolicitud'] = $res->idSolicitud;
                $a['nombreCliente'] = $res->nombreCliente;
                $a['fechaSolicitud'] = $res->fechaSolicitud;
                $a['idFactura'] = $res->idFactura;
                $d['nombreServicio'] = $res->nombreServicio;
                $d['estado'] = $res->estado;
                $ar = array(
                    $d
                );
                $a['detalle'] = $ar;
                array_push($arrayAux, $a);
             }
        }
        return $arrayAux;
    }


}
