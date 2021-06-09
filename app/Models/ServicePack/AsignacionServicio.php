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

    public function getServiciosAsignadosByIdUsuario($idUsuarioTecnico){
        $sql = "SELECT ads.id as idAsignacion, sr.id as idServicioRealizar, s.nombre as nombreServicio, ads.fecha as fecha, sr.estado, c.nombre as nombreCliente, u2.email
        FROM asignacionservicio as ads 
        INNER JOIN serviciorealizar as sr ON ads.idServicioRealizar = sr.id
        INNER JOIN solicitudservicio as ss ON ss.id = sr.idSolicitud
        INNER JOIN cliente as c ON c.id = ss.idCliente
        INNER JOIN clienteusuario as cu on cu.idCliente = c.id
        INNER JOIN users as u2 ON u2.id = cu.idUsuario
        INNER JOIN tecnico as t ON t.id = ads.idTecnico
        INNER JOIN personal as p ON p.id = t.idPersonal
        INNER JOIN servicio as s ON s.id = sr.idServicio
        INNER JOIN users as u ON u.id = p.idUsuario AND u.id = ".$idUsuarioTecnico.""
        ;
        $res = DB::select($sql);
        return $res;
    }

}
