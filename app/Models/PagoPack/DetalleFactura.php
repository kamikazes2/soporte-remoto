<?php

namespace App\Models\PagoPack;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DetalleFactura extends Model
{
    protected $table = 'detallefactura';
    protected $fillable = ['idFactura', 'idSolicitudServicio', 'nroPago', 'monto', 'detalle', 'estado'];


    public function getDetallesFacturaByIdSolicitudServicio($idSolicitudServicio){
        $sql = "SELECT *  FROM serviciorealizar as sr
        INNER JOIN solicitudservicio as ss ON sr.idSolicitud = ss.id and ss.id = ".$idSolicitudServicio."
        INNER JOIN servicio as s ON s.id = sr.idServicio
        INNER JOIN detallefactura as df ON df.idSolicitudServicio = ss.id
        GROUP BY df.id";
        
        $res = DB::select($sql);
        return $res;
    }

    public function getDeudas($idUsuario){
        $sql = "select ss.id as idSolicitudServicio, c.nombre as nombre, df.nroPago, df.monto, df.detalle, df.id as idDetalle FROM detallefactura as dF
        INNER JOIN solicitudservicio as ss ON ss.id = df.idFactura AND df.estado = 'NOPAGADO'
        INNER JOIN cliente as c ON c.id = ss.idCliente
        INNER JOIN clienteusuario as cu ON cu.idCliente = c.id
        INNER JOIN users as u ON u.id = cu.idUsuario and cu.idUsuario = ".$idUsuario."";
        $res = DB::select($sql);
        return $res;
    }

    public function pagar($idDetalle){
            return  $affected = DB::table('detallefactura')
             ->where('id', $idDetalle)
             ->update(['estado' => "PAGADO"]);
    }

}
