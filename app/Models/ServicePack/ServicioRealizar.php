<?php

namespace App\Models\ServicePack;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ServicioRealizar extends Model
{
    protected $table = 'serviciorealizar';
    protected $fillable = ['idServicio', 'idSolicitud', 'precioFijado', 'completado'];

    public function getServicioPendiente(){
        return $serviciosPendientes = DB::table('serviciorealizar')->where('estado', 'PENDIENTE')->orderBy('created_at','asc')->get();
    }

    public function updateToAsignado($id){
        return  $affected = DB::table('serviciorealizar')
         ->where('id', $id)
         ->update(['estado' => 'ASIGNADO']);
    }
    public function updateToComplete($id){
        $affected = DB::table('serviciorealizar')
         ->where('id', $id)
         ->update(['estado' => 'COMPLETADO']);
        $affected = DB::table('serviciorealizar')
         ->where('id', $id)
         ->update(['completado' => 1]);
         return 1;
    }

    public function getServicioRealizarByIdSolicitud($id){
        return $serv = DB::table('serviciorealizar')->where('idSolicitud', $id)->get();
    }

    public function existeServicio($idServicio){
        $serv = DB::table('serviciorealizar')->where('idServicio', $idServicio)->get();
        if(count($serv)>0){
            return true;
        }else{
            return false;
        }
    }

}
