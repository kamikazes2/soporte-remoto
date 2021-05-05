<?php

namespace App\Repositories;

use App\Models\ServicePack\Servicio;
use Illuminate\Support\Facades\DB;

class ServicioRepository{

    private $model;

    public function __construct(){
        $this->model = new Servicio();
    }

    public function all(){
        return $this->model::all();
    }

    public function getService($id){
        return DB::table('servicio')->where('id', $id)->get();
    }

    public function getPrice($idServicio){
        $precio = DB::select('(SELECT precio FROM precioservicio WHERE id = (
            SELECT MAX(id) FROM precioservicio as pc2 WHERE pc2.idServicio = ?))', [$idServicio]);
        return $precio[0]->precio;
    }

    public function getAllWithPrice(){
        return DB::table('servicio AS t1')
        ->leftJoin(DB::raw('(SELECT idServicio, precio from precioservicio A where fecha >= (Select max(fecha) from precioservicio B  WHERE A.idServicio=B.idServicio )) AS t2'), function($join) {
           $join->on('t1.id', '=', 't2.idServicio');
       })->get();
    }
}

