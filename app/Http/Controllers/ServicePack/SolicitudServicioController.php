<?php

namespace App\Http\Controllers\ServicePack;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//repositories
use App\Repositories\ServicioRepository;
use App\Repositories\SolicitarServicioRepository;
use App\Repositories\ServicioRealizarRepository;

//factories
use App\Factories\SolicitudServicioFactory;
use App\Factories\ServicioRealizarFactory;

class SolicitudServicioController extends Controller
{
    private $servicioRepository;
    private $solicitarServicioRepository;
    private $servicioRealizarRepository;

    public function __construct(ServicioRepository $sr, SolicitarServicioRepository $ss, ServicioRealizarRepository $srr){
        $this->servicioRepository = $sr;
        $this->solicitarservicioRepository = $ss;
        $this->servicioRealizarRepository = $srr;

    }

    public function index()
    {
        $datos['servicios'] = $this->servicioRepository->getAllWithPrice(); 
        return view('ServicePackViews.solicitarServicio', $datos);
    }

    public function store(Request $request)
    {
        $solicitud = SolicitudServicioFactory::create($request); //devuelve un objeto SolicitudServicio
        $request['idSolicitud'] =  $this->solicitarservicioRepository->store($solicitud); 

        if(count($request['idServicio']) > 1){ //si quiere mas de un servicio
            $cont = 0;
            foreach($request['idServicio'] as $serv){
                $servRealizarObj = ServicioRealizarFactory::create($request);
                $servRealizarObj->idServicio = $serv;
                $servRealizarObj->precioFijado = $this->servicioRepository->getPrice($serv);
                $this->servicioRealizarRepository->store($servRealizarObj);
                $cont++;
            }
            return response()->json($cont);
        }else{
            $servRealizarObj = ServicioRealizarFactory::create($request);
            $servRealizarObj->idServicio = $serv;
            $servRealizarObj->precioFijado = $this->servicioRepository->getPrice($request['idServicio'][0]);
            $this->servicioRealizarRepository->store($servRealizarObj);
        }

        return redirect('cliente/solicitud');

    }

}
