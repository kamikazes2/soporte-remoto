<?php

namespace App\Models\ServicePack;

use Illuminate\Database\Eloquent\Model;

class ServicioRealizar extends Model
{
    protected $table = 'serviciorealizar';

    public function idSolicitud()
    {
        return $this->belongsTo('App\Models\ServicePack\SolicitudServicio', 'idSolicitud');
    }
}
