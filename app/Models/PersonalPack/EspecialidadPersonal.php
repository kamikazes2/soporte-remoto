<?php

namespace App\Models\PersonalPack;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EspecialidadPersonal extends Model
{    
    protected $table = 'especialidadpersonal';
    protected $fillable = ['idPersonal', 'idEspecialidad'];

    public function getPersonalByIdEspecialidad($idEspecialidad){
         //$personales = DB::table('especialidadpersonal')->where('idEspecialidad', $idEspecialidad)->get();
         return $tecnicos = DB::table('especialidadPersonal')->where('especialidadPersonal.idEspecialidad', $idEspecialidad)
           ->whereExists(function ($query) {
               $query->select(DB::raw(1))
                     ->from('tecnico')
                     ->whereColumn('tecnico.idPersonal', 'especialidadpersonal.idPersonal')
                     ->whereExists(function ($query) {
                        $query->select(DB::raw(1))
                              ->from('personal')
                              ->whereColumn('tecnico.idPersonal', 'personal.id')
                              ->where('personal.disponible',1);
                        });
           })
           ->get();
    }
}
