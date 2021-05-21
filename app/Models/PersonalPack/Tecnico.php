<?php

namespace App\Models\PersonalPack;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tecnico extends Model
{
    protected $table = 'tecnico';
    protected $fillable = ['idPersonal'];

    public function getIdPersonal($idTecnico){
        $idPersonal = DB::table('tecnico')->where('id', $idTecnico)->get();
        return $idPersonal[0]->idPersonal;
    }

}
