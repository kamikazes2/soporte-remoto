<?php

namespace App\Models\PagoPack;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DetalleFactura extends Model
{
    protected $table = 'detallefactura';
    protected $fillable = ['idFactura', 'idSolicitudServicio', 'nroPago', 'monto', 'detalle'];
}
