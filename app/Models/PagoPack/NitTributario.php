<?php

namespace App\Models\PagoPack;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class NitTributario extends Model
{
    protected $table = 'nittributario';
    protected $fillable = ['idCliente','nit', 'nombre', 'tipo'];

    public function getLastNitTributarioUsedByIdCliente($idCliente){
        $nt = DB::table('nittributario')->where('idCliente', $idCliente)->orderBy('created_at','asc')->get();
        return $nt;
    }
}
