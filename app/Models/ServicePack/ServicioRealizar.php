<?php

namespace App\Models\ServicePack;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ServicioRealizar extends Model
{
    protected $table = 'serviciorealizar';
    protected $fillable = ['idServicio', 'idSolicitud', 'precioFijado', 'completado'];

    public function getServicioPendiente(){
        return $serviciosPendientes = DB::table('serviciorealizar')->where('estado', 'PENDIENTE')->orderBy('created_at','asc')->get();
    }

}
