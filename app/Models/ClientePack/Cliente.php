<?php

namespace App\Models\ClientePack;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Cliente extends Model
{
    protected $table = 'cliente';
    protected $fillable = ['dni', 'nombre','apellido','fechaNacimiento','usuario','password'];

    public function buscarCliente($usuario, $pass){
        return $cliente = DB::table('cliente')->where('usuario', $usuario)->where('password',$pass)->get();
    }
}
