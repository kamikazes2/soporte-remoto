<?php

namespace Src\ModuloUsuario\ClienteUsuario\Infrastructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Session;
use App\Models\ClientePack\ClienteUsuario;

use App\Models\UserPack\User;
use App\Models\ClientePack\Cliente;

class ClienteUsuarioController
{

    public function getUltimoClienteDelUsuario(){
        $cu = new ClienteUsuario;
        $idUsuario = Session::get('idUsuario');
        $idCliente = $cu->buscarUltimoIdClienteDelUsuario($idUsuario);

        if(count($idCliente)==0){
            return response()->json(
                ['error' => true, 'message' => "no existe cliente"]
            );
        }

        $c = new Cliente;
        $cl = $c->getCliente($idCliente);
        if($cl != null){
            return response()->json(
                ['error' => false, 'cliente' => $cl]
            );
        }else{
            return response()->json(
                ['error' => true, 'message' => "no existe cliente"]
            );
        }
    }


}
