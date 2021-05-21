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

    public function estaAsignado($idServicioRealizar){
        $AsignacionServicio = DB::table('asignacionservicio')->where('idServicioRealizar', $idServicioRealizar)->get();
        if(count($AsignacionServicio)>0){
            return $AsignacionServicio[0];
        }else{
            return false;
        }
    }

}
