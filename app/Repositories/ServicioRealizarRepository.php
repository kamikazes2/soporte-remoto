<?php

namespace App\Repositories;

use App\Models\ServicePack\Servicio;
use App\Models\ServicePack\ServicioRealizar;
use Illuminate\Support\Facades\DB;

class ServicioRealizarRepository extends BaseRepository{

    public function __construct(ServicioRealizar $servicioR){
        parent::__construct($servicioR);
    }

    public function getServicioRealizarByID($id){
        return DB::table('serviciorealizar')->where('idSolicitud', $id)->get();
    }

}

