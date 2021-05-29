<?php

namespace App\Models\TarjetaPack;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tarjeta extends Model
{
    protected $table = 'tarjeta';
    protected $fillable = ['idCliente', 'nombre', 'numero', 'mes', 'anio'];


    public function getLastTarjetaUsedByIdCliente($idCliente){
        $tar = DB::table('tarjeta')->where('idCliente', $idCliente)->orderBy('created_at','asc')->get();
        return $tar;
    }

    public function tieneTarjeta($idCliente){
        $tar = DB::table('tarjeta')->where('idCliente', $idCliente)->get();
        if($tar!=null || count($tar)>0){
            return true;
        }else{
            return false;
        }
    }

}
