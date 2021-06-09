<?php

namespace Src\ModuloAsignacion\RechazoAsignacion\Infrastructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Session;

use App\Models\ServicePack\RechazoAsignacion;

use App\Models\UserPack\User;
use App\Models\ServicePack\RechazoAsignacion;

class RechazoAsignacionController
{
    public function createRechazoAsignacion(Request $request){
        $rechazoAsignacion = new RechazoAsignacion;
        
            $rechazoAsignacion->idAsignacion = $request['idAsignacion'];
            $rechazoAsignacion->motivo = $request['motivo'];
            $rechazoAsignacion->estado = ""
            $rechazoAsignacion->save();
            $a['error'] = false;
            $a['id'] = $rechazoAsignacion->id;
            return $a;
    }

    public function getUltimoClienteDelUsuario(){
        $ra = new RechazoAsignacion;
        $idUsuario = Session::get('idUsuario');


        $idCliente = $ra->buscarUltimoIdClienteDelUsuario($idUsuario);

        if(count($idCliente)==0){
            return response()->json(
                ['error' => true, 'message' => "no existe cliente"]
            );
        }

        $c = new RechazoAsignacion;
        $cl = $c->getCliente($idCliente);
        if($cl != null){
            return response()->json(
                ['error' => false, 'rechazoasignacion' => $cl]
            );
        }else{
            return response()->json(
                ['error' => true, 'message' => "no existe solicitud"]
            );
        }
    }


}