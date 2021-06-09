<?php

namespace App\Models\ClientePack;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Cliente extends Model
{
    protected $table = 'cliente';
    protected $fillable = ['dni', 'nombre','apellido','fechaNacimiento','telefono'];

    public function verificarCliente($dni){
        $cliente = DB::table('cliente')->where('dni', $dni)->get();
        return $cliente;
    }

    public function getCliente($id){
        $cliente = DB::table('cliente')->where('id', $id)->get();
        if(count($cliente)>0){
            return $cliente[0];
        }else{
            return null;
        }
    }



}
