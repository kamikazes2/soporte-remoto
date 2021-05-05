<?php

namespace App\Repositories;

use App\Models\ServicePack\Servicio;
use Illuminate\Support\Facades\DB;

class ServicioRepository extends BaseRepository{

    public function __construct(Servicio $servicio){
        parent::__construct($servicio);
    }

    public function getService($id){
        return DB::table('servicio')->where('id', $id)->get();
    }

    public function getServiceName($id){
        $name = DB::table('servicio')->where('id', $id)->get();
        return $name[0]->nombre;
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

