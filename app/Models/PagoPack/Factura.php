<?php

namespace App\Models\PagoPack;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Factura extends Model
{
    protected $table = 'factura';
    protected $fillable = ['idNit','fecha'];

    public function getFacturaTotalByIdFactura($id){
        $sql = "SELECT sr.id, f.fecha, nt.nombre as nombreCliente, nt.nit, s.nombre as nombreServicio, ps.precio FROM factura as f
        INNER JOIN nittributario as nt on nt.id = f.idNit
        INNER JOIN detallefactura as df on df.idFactura = f.id AND f.id =".$id."
        INNER JOIN serviciorealizar as sr on sr.id = df.idServicioRealizar
        INNER JOIN servicio as s on s.id = sr.idServicio
        INNER JOIN precioservicio as ps on ps.idServicio = s.id";
        $res = DB::select($sql);
        return $res;
    }


}
