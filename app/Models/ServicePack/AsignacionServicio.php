<?php

namespace App\Models\ServicePack;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AsignacionServicio extends Model
{
    protected $table = 'asignacionservicio';
    protected $fillable = ['idServicioRealizar', 'idTecnico','fecha'];


    public function getIdTecnicoByIdServicioRealizar($idServicioRealizar){
        $AsignacionServicio = DB::table('asignacionservicio')->where('idServicioRealizar', $idServicioRealizar)->get();
        return $AsignacionServicio[0]->idTecnico;
    }

}
