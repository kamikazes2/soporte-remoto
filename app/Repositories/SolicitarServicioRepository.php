<?php

namespace App\Repositories;

use App\Models\ServicePack\SolicitudServicio;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SolicitarServicioRepository{

    private $model;

    public function __construct(){
        $this->model = new SolicitudServicio();
    }

    public function all(){
        return $this->model::all();
    }

    public function store($solicitud){
        $date = Carbon::now();
        // unset($solicitud['idServicio']);
        // $solicitud['fechaSolicitud'] = $date->toDateTimeString();;
        // $id = SolicitudServicio::insert($solicitud); 
        $data = new SolicitudServicio;
        $data->fechaSolicitud = $date->toDateTimeString();
        $data->idCliente = $solicitud['idCliente'];
        $data->save();
        $id = $data->id;
        return $id;
    }

}
