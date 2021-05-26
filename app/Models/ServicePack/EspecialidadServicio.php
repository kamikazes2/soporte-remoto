<?php

namespace App\Models\ServicePack;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EspecialidadServicio extends Model
{
    protected $table = 'especialidadservicio';
    protected $fillable = ['idServicio', 'idEspecialidad'];

    public function getEspecialidadByIdServicio($id){
        return $especialidadServicio = DB::table('especialidadservicio')->where('idServicio', $id)->get();
    }
}
