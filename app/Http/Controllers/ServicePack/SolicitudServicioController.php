<?php

namespace App\Http\Controllers\ServicePack;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\ServicioRepository;
use App\Repositories\SolicitarServicioRepository;
use App\Repositories\ServicioRealizarRepository;

class SolicitudServicioController extends Controller
{
    private $servicioRepository;
    private $solicitarServicioRepository;
    private $servicioRealizarRepository;

    public function __construct(){
        $this->servicioRepository = new ServicioRepository;
        $this->solicitarservicioRepository = new SolicitarServicioRepository;
        $this->servicioRealizarRepository = new ServicioRealizarRepository;
    }

    public function index()
    {
        $datos['servicios'] = $this->servicioRepository->getAllWithPrice(); 
        return view('ServicePackViews.solicitarServicio', $datos);
    }

    public function store(Request $request)
    {
         $idSolicitud =  $this->solicitarservicioRepository->store(request()->except('_token')); 
         // $servicio = $this->servicioRepository->getService($request['idServicio']);
         $request['precioFijado'] = $this->servicioRepository->getPrice($request['idServicio']);
         $this->servicioRealizarRepository->store($request, $idSolicitud);
         return redirect('cliente/solicitud');

    }

}
