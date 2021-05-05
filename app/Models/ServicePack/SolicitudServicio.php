<?php

namespace App\Models\ServicePack;

use Illuminate\Database\Eloquent\Model;

class SolicitudServicio extends Model
{
    protected $table = 'solicitudservicio';

    public function servicioRealizar()
    {
        return $this->hasMany('App\Models\ServicePack\ServicioRealizar', 'idSolicitud');
        //->where('completado', false);
    }

}
