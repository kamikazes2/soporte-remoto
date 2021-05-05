<?php

namespace App\Factories;
use App\Models\ServicePack\SolicitudServicio;
use Carbon\Carbon;

class SolicitudServicioFactory{

    public static function create($request)
    {
        if(isset($request['idCliente'])){
            $solicitud = new SolicitudServicio();
            $solicitud->idCliente = $request['idCliente'];
            $date = Carbon::now();
            $solicitud->fechaSolicitud = $date->toDateTimeString();
            return $solicitud;
        }else{
            return "error";
        }
    }

}