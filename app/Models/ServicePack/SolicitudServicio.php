<?php

namespace App\Models\ServicePack;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SolicitudServicio extends Model
{
    protected $table = 'solicitudservicio';

    // public function servicioRealizar()
    // {
    //     return $this->hasMany('App\Models\ServicePack\ServicioRealizar', 'idSolicitud');
    //     //->where('completado', false);
    // }

    public function getByIdCliente($idCliente){

        return $solicitudes = DB::table('solicitudservicio')->where('idCliente', $idCliente)->orderBy('created_at','asc')->get();

    }

}
