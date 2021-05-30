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

    public function deleteRelacion($idPersonal, $idEspecialidad){
        $especialidadPersonal = DB::table('especialidadpersonal')->where('idPersonal', $idPersonal)->where('idEspecialidad',$idEspecialidad)->delete();
        return true;
    }

    public function existeEspecialidadPersonal($idPersonal, $idEspecialidad){
        $esp = DB::table('especialidadpersonal')->where('idPersonal', $idPersonal)->where('idEspecialidad',$idEspecialidad)->get();
        if($esp!=null && count($esp)>0){
            return true;
        }else{
            return false;
        }
    }

    public function GetEspecialidadesByIdPersonal($idPersonal){
        return $esp = DB::table('especialidadpersonal')->where('idPersonal', $idPersonal)->get();
    }

    public function GetEspecialidadesWithNombreByIdPersonal($idPersonal){
        return $esp = DB::table('especialidadpersonal')
        ->join('especialidad', 'especialidad.id', '=', 'especialidadpersonal.idEspecialidad')
        ->where('especialidadpersonal.idPersonal', '=' , $idPersonal)
        ->get();
    }

}
