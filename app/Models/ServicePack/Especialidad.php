<?php

namespace App\Models\ServicePack;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Especialidad extends Model
{
    protected $table = 'especialidad';
    protected $fillable = ['nombre', 'descripcion'];

    public function deleteById($id){
        $s = DB::table('especialidad')->where('id', $id)->delete();
        return $s;
    }
    public function actualizar(){
        return  $affected = DB::table('especialidad')
         ->where('id', $this->id)
         ->update(['nombre' => $this->nombre, 'descripcion'=>$this->descripcion]);
    }
    public function getById($id){
        $esp = DB::table('especialidad')->where('id', $id)->get();
        return $esp[0];
    }

    public function getAll(){
        return DB::table('especialidad')->get();
    }

}
