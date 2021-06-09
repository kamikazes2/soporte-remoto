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

    public function isTecnico($idPersonal){
        return $tecnico = DB::table('tecnico')->where('idPersonal', $idPersonal)->get();
    }
    public function deleteByIdPersonal($idPersonal){
        $especialidadServicio = DB::table('tecnico')->where('idPersonal', $idPersonal)->delete();
        return true;
    }

    public function getTecnicoByEspecialidad($idEspecialidad){
        $sql = "SELECT t.id as idTecnico, p.nombre, p.id as idPersonal FROM personal as p 
        INNER JOIN tecnico as t ON t.idPersonal = p.id AND 	P.disponible = 1
        INNER JOIN especialidadpersonal as ep ON ep.idPersonal = p.id AND ep.idEspecialidad = ".$idEspecialidad."
        INNER JOIN especialidad as e ON e.id = ep.idEspecialidad";    
        $res = DB::select($sql);
        return $res;
    }

    public function getTecnicobyUserId($idUsuario){
        $sql = "SELECT t.id as idTecnico, p.nombre, p.id as idPersonal 
        FROM tecnico as t 
        INNER JOIN personal as p ON t.idPersonal = p.id
        INNER JOIN users as u ON u.id = p.idUsuario AND u.id = ".$idUsuario."";    
        $res = DB::select($sql);
        return $res;
    }

}
