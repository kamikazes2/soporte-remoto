<?php

namespace App\Models\PersonalPack;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Personal extends Model
{
    protected $table = 'personal';
    protected $fillable = ['id', 'dni', 'nombre','apellido','fechaNacimiento','disponible'];


    public function deshabilitarPersonal($idPersonal){
       return  $affected = DB::table('personal')
        ->where('id', $idPersonal)
        ->update(['disponible' => 0]);
    }

    public function habilitarPersonal($idPersonal){
        return  $affected = DB::table('personal')
         ->where('id', $idPersonal)
         ->update(['disponible' => 1]);
     }

}
