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

    public function createClienteUsuario(Request $request){
        $idUsuario = $request['idUsuario'];
        $idUsuarioLogueado = Session::get('idUsuario');
        $idCliente = $request['idCliente'];
        if($idUsuario == $idUsuarioLogueado){
            //crear solo 1
            $clienteUsuario = new ClienteUsuario;
            $clienteUsuario->idUsuario = $idUsuario;
            $clienteUsuario->idCliente = $idCliente;
            $clienteUsuario->save();
            return $clienteUsuario;
        }else{
            //crear para los 2
            $clienteUsuario = new ClienteUsuario;
            $clienteUsuario->idUsuario = $idUsuario;
            $clienteUsuario->idCliente = $idCliente;
            $clienteUsuario->save();

            $clienteUsuario = new ClienteUsuario;
            $clienteUsuario->idUsuario = $idUsuarioLogueado;
            $clienteUsuario->idCliente = $idCliente;
            $clienteUsuario->save();
        }
    }

    public function getUltimoClienteDelUsuario(){
        $cu = new ClienteUsuario;
        $idUsuario = 1;//Session::get('idUsuario');
        $clienteusuario = $cu->buscarUltimoIdClienteDelUsuario($idUsuario);

        if(count($clienteusuario)==0){
            return response()->json(
                ['error' => true, 'message' => "no existe cliente"]
            );
        }
        $c = new Cliente;
        $cl = $c->getCliente($clienteusuario[0]->idCliente);
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
