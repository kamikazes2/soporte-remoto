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
        $idUsuario = Session::get('idUsuario');
        $rechazoAsignacion->idAsignacion = $request['idAsignacion'];
        $rechazoAsignacion->idTecnico = $request['idTecnico'];
        $rechazoAsignacion->motivo = $request['descripcion'];
        $rechazoAsignacion->estado = "En revision";
        $rechazoAsignacion->save();
        $a['error'] = false;
        $a['id'] = $rechazoAsignacion->id;
        return $a;
    }

    public function aceptarRechazoAsignacion(Request $request){
        $rechazoAsignacion = new RechazoAsignacion;
        $idUsuario = Session::get('idUsuario');
        $rechazoAsignacion->idAsignacion = $request['idAsignacion'];
        $rechazoAsignacion->idTecnico = $request['idTecnico'];
        $rechazoAsignacion->motivo = $request['descripcion'];
        $rechazoAsignacion->estado = "Aceptado";
        $rechazoAsignacion->save();
        $a['error'] = false;
        $a['idTecnico'] = $rechazoAsignacion->idTecnico;
        return $a;
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