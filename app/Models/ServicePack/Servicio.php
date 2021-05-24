<?php

namespace App\Models\ServicePack;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Servicio extends Model
{
    protected $table = 'servicio';
    protected $fillable = ['nombre', 'descripcion'];

    public function getAllWithPrice(){
        return DB::table('servicio AS t1')
        ->leftJoin(DB::raw('(SELECT idServicio, precio from precioservicio A where fecha >= (Select max(fecha) from precioservicio B  WHERE A.idServicio=B.idServicio )) AS t2'), function($join) {
           $join->on('t1.id', '=', 't2.idServicio');
        })->get();
    }

    public function actualizar(){
        return  $affected = DB::table('servicio')
         ->where('id', $this->id)
         ->update(['nombre' => $this->nombre, 'descripcion'=>$this->descripcion]);
    }

    public function getById($id){
        $serv = DB::table('servicio')->where('id', $id)->get();
        return $serv[0];
    }

    public function deleteById($idServicio){
        DB::table('servicio')->where('id', $idServicio)->delete();
        return true;
    }



}
