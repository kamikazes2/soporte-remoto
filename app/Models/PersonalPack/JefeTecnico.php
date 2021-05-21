<?php

namespace App\Models\PersonalPack;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class JefeTecnico extends Model
{
    protected $table = 'jefetecnico';
    protected $fillable = ['idPersonal'];
    public function isJefeTecnico($idPersonal){
        return $tecnico = DB::table('jefetecnico')->where('idPersonal', $idPersonal)->get();
    }
}
