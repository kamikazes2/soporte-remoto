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

    public function getSolicitudByIdUsuario($idUsuario){   
        $sql = "SELECT ss.id as idSolicitud, s.nombre as nombreServicio, sr.id as idServicioRealizar, c.nombre as nombreCliente, sr.estado, ss.fechaSolicitud
        FROM solicitudservicio as ss
        INNER JOIN serviciorealizar as sr on ss.id = sr.idSolicitud
        INNER JOIN servicio as s on s.id = sr.idServicio
        INNER JOIN cliente as c ON c.id = ss.idCliente
        INNER JOIN clienteusuario as cu ON cu.idCliente = c.id
        INNER JOIN users as u ON u.id = cu.idUsuario and u.id = ".$idUsuario."
        ORDER BY ss.id DESC";
        $res = DB::select($sql);
        return $res;
    }

    public function getMontoTotal($idSolicitudServicio){
        $sql = "SELECT SUM(sr.precioFijado) as montoTotal  FROM serviciorealizar as sr
        INNER JOIN solicitudservicio as ss ON sr.idSolicitud = ss.id and ss.id = ".$idSolicitudServicio."
        INNER JOIN servicio as s ON s.id = sr.idServicio";
        $res = DB::select($sql);
        return $res[0];
    }

    public function getCantidadServiciosRealizar($idSolicitudServicio){
        $sql = "SELECT count(id) as cant FROM serviciorealizar 	WHERE idSolicitud = ".$idSolicitudServicio."";
        $res = DB::select($sql);
        return $res[0];
    }

}
