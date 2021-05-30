<?php

namespace App\Models\ServicePack;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EspecialidadServicio extends Model
{
    protected $table = 'especialidadservicio';
    protected $fillable = ['idServicio', 'idEspecialidad'];

    public function getEspecialidadByIdServicio($id){
        //return $especialidadServicio = DB::table('especialidadservicio, especialidad')->where('idServicio', $id)->where('especialidad.id = especialidadservicio.idEspecialidad')->get();
        
        return $esp = DB::table('especialidadservicio')
        ->join('especialidad', 'especialidad.id', '=', 'especialidadservicio.idEspecialidad')
        ->where('especialidadservicio.idServicio', '=' , $id)
        ->get();
    }

    public function deleteAsociation($idServicio, $idEspecialidad){
        $especialidadServicio = DB::table('especialidadservicio')->where('idServicio', $idServicio)->where('idEspecialidad',$idEspecialidad)->delete();
        return true;
    }
}
