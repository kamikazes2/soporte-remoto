<?php

namespace App\Http\Controllers\ServicePack;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\ServicioRepository;

class SolicitudServicioController extends Controller
{
    private $servicioRepository;

    public function __construct(ServicioRepository $servicioRepository){
        $this->servicioRepository = $servicioRepository;
    }

    public function index()
    {
        $datos['servicios'] = $this->servicioRepository->all();
        return view('ServicePackViews.solicitarServicio', $datos);
    }
}
