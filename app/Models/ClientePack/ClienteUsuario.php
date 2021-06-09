<?php

namespace App\Models\ClientePack;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ClienteUsuario extends Model
{
    protected $table = 'clienteusuario';
    protected $fillable = ['idUsuario', 'idCliente'];

    public function buscarUltimoIdClienteDelUsuario($idUsuario){
        $cliente = DB::table('clienteusuario')->where('idUsuario', $idUsuario)->orderBy('updated_at','desc')->get();
        return $cliente;
    }

    public function existe($idUsuario, $idCliente){
        $cliente = DB::table('clienteusuario')->where('idUsuario', $idUsuario)->where('idCliente', $idCliente)->get();
        if(count($cliente)>0){
            return true;
        }else{
            return false;
        }
    }

}
