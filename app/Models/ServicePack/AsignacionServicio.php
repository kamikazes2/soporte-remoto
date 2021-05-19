<?php

namespace App\Models\ServicePack;

use Illuminate\Database\Eloquent\Model;

class AsignacionServicio extends Model
{
    protected $table = 'asignacionservicio';
    protected $fillable = ['idServicioRealizar', 'idTecnico','fecha'];
}
