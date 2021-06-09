<?php

namespace App\Models\ServicePack;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RechazoAsignacion extends Model
{
    protected $table = 'rechazoasignacion';
    protected $fillable = ['idAsignacion', 'idTecnico', 'motivo'];


    // public function deleteByIdServicio($idServicio){
    //     $a = DB::table('precioservicio')->where('idServicio', $idServicio)->delete();
    //     return $a;
    // }
}
