<?php

namespace App\Models\ServicePack;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RechazoAsignacion extends Model
{
    protected $table = 'rechazoasignacion';
    protected $fillable = ['idAsignacion', 'idTecnico', 'descripcion', 'estado'];

    public function getRechazoAsignacion(){
        //return $especialidadServicio = DB::table('especialidadservicio, especialidad')->where('idServicio', $id)->where('especialidad.id = especialidadservicio.idEspecialidad')->get();
        /*return $esp = DB::table('rechazoasignacion')
        ->join('tecnico', 'tecnico.id', '=', 'rechazoasignacion.idTecnico')
        ->join('personal', 'personal.id', '=', 'tecnico.idPersonal')
        ->where('especialidadservicio.idServicio', '=' , $id)
        ->get();
        */
        $sql = "SELECT ra.id as id, t.id as idTecnico, p.nombre as nombreTecnico, ra.idAsignacion as idAsignacion, s.nombre as nombreServicio, ra.descripcion, ra.estado 
        FROM rechazoasignacion as ra
        INNER JOIN tecnico as t on t.id = ra.idTecnico
        INNER JOIN personal as p on p.id = t.idPersonal
        INNER JOIN asignacionservicio as asi on asi.id = ra.idAsignacionServicio
        INNER JOIN serviciorealizar as sr on asi.idServicioRealizar = sr.id
        INNER JOIN servicio as s on s.id = sr.idServicio
        ORDER BY ra.estado DESC";
        $res = DB::select($sql);
        return $res;
    }

    // public function deleteByIdServicio($idServicio){
    //     $a = DB::table('precioservicio')->where('idServicio', $idServicio)->delete();
    //     return $a;
    // }
}
