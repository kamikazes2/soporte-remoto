<?php

namespace App\Models\PersonalPack;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EspecialidadPersonal extends Model
{    
    protected $table = 'especialidadpersonal';
    protected $fillable = ['idPersonal', 'idEspecialidad'];

    public function getPersonalByIdEspecialidad($idEspecialidad){
        return $personales = DB::table('especialidadpersonal')->where('idEspecialidad', $idEspecialidad)->get();
    }
}
