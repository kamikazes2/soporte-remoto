<?php

namespace App\Repositories;

use App\Models\ServicePack\Servicio;
use App\Models\ServicePack\ServicioRealizar;
use Illuminate\Support\Facades\DB;

class ServicioRealizarRepository{

    private $model;

    public function __construct(){
        $this->model = new ServicioRealizar();
    }

    public function all(){
        return $this->model::all();
    }

    public function store($request, $idSolicitud){
        $this->model->idServicio = $request['idServicio'];
        $this->model->idSolicitud = $idSolicitud;
        $this->model->precioFijado = $request['precioFijado'];
        $this->model->completado = false;
        $this->model->estado = "PENDIENTE";
        $this->model->save();
        return $this->model->id;
    }


}

