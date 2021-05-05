<?php

namespace App\Repositories;

use App\Models\ServicePack\SolicitudServicio;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SolicitarServicioRepository extends BaseRepository{


    const RELATIONS = [
        'servicioRealizar.idSolicitud'
    ];

    public function __construct(SolicitudServicio $Sservicio){
        parent::__construct($Sservicio);
    }

    public function all(){
        return $this->model->with(self::RELATIONS)->get();
    }
}
