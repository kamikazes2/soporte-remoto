<?php

namespace App\Http\Controllers\ServicePack;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//repositories
use App\Repositories\ServicioRepository;
use App\Repositories\SolicitarServicioRepository;
use App\Repositories\ServicioRealizarRepository;

class ServicioRealizarController extends Controller
{

    private $servicioRepository;
    private $solicitarServicioRepository;
    private $servicioRealizarRepository;

    public function __construct(ServicioRepository $sr, SolicitarServicioRepository $ss, ServicioRealizarRepository $srr){
        $this->servicioRepository = $sr;
        $this->solicitarServicioRepository = $ss;
        $this->servicioRealizarRepository = $srr;
    }

    public function index()
    {
        $datos['solicitudServicio'] = $this->solicitarServicioRepository->all();
        foreach ($datos['solicitudServicio'] as $solSer){
            foreach($solSer->servicioRealizar as $sr){
                $sr['nombre'] = $this->servicioRepository->getServiceName($sr->idServicio);
            }
        }
        //return response()->json($datos);
        return view('ServicePackViews.asignacionServicio', $datos);
    }
}
