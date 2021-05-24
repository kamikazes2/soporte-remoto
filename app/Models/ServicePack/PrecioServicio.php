<?php

namespace App\Models\ServicePack;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PrecioServicio extends Model
{
    protected $table = 'precioservicio';
    protected $fillable = ['idServicio', 'precio', 'fecha'];


    public function deleteByIdServicio($idServicio){
        $a = DB::table('precioservicio')->where('idServicio', $idServicio)->delete();
        return $a;
    }


}
