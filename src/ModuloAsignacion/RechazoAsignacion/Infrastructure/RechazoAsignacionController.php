<?php

namespace Src\ModuloAsignacion\RechazoAsignacion\Infrastructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Session;

use App\Models\UserPack\User;
use App\Models\ServicePack\RechazoAsignacion;

class RechazoAsignacionController
{
    public function createRechazoAsignacion(Request $request){
        $rechazoAsignacion = new RechazoAsignacion;
        $idUsuario = Session::get('idUsuario');
        //$idUsuario = 3;
        $rechazoAsignacion->idAsignacionServicio = $request['idAsignacionServicio'];
        $rechazoAsignacion->idTecnico = $request['idTecnico'];
        $rechazoAsignacion->descripcion = $request['descripcion'];
        $rechazoAsignacion->estado = "En revision";
        $rechazoAsignacion->save();
        $a['error'] = false;
        $a['id'] = $rechazoAsignacion->id;
        return $a;
    }

    public function aceptarRechazoAsignacion(Request $request){

        $rechazoAsignacion = new RechazoAsignacion;
        $rechazoAsignacion->aceptarRechazo( $request['id']);
        return true;
    }

    public function getRechazoAsignacion(){
        $ra = new RechazoAsignacion;


        $res = $ra->getRechazoAsignacion();

        if($res != null){
            return response()->json(
                ['error' => false, 'rechazoasignacion' => $res]
            );
        }else{
            return response()->json(
                ['error' => true, 'message' => "no existe solicitud"]
            );
        }
    }


}