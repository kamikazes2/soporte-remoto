<?php

namespace App\Models\ServicePack;

use Illuminate\Database\Eloquent\Model;

class ServicioRealizar extends Model
{
    protected $table = 'serviciorealizar';
    protected $fillable = ['idServicio', 'idSolicitud', 'precioFijado', 'completado'];

    // public function idSolicitud()
    // {
    //     return $this->belongsTo('App\Models\ServicePack\SolicitudServicio', 'idSolicitud');
    // }
}
