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
}
