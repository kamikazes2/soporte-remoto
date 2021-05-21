<?php

namespace App\Models\PersonalPack;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Personal extends Model
{
    protected $table = 'personal';
    protected $fillable = ['id', 'dni', 'nombre','apellido','fechaNacimiento','disponible','usuario','password'];


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

    public function buscarPersonal($user, $pass){
        return $personal = DB::table('personal')->where('usuario', $user)->where('password',$pass)->get();
    }

    public function getByIdPersonal($id){
        $personal = DB::table('personal')->where('id', $id)->get();
        return  $personal[0];
    }

}
