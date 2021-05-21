<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClientePack\Cliente;
use App\Models\PersonalPack\Personal;
use App\Models\PersonalPack\Tecnico;
use App\Models\PersonalPack\JefeTecnico;
use Session;

class UsuarioController extends Controller
{

    public function buscarUsuario(Request $request){
        $user = $request['usuario'];
        $pass = $request['password'];
        $cliente = new Cliente;
        $cl = $cliente->buscarCliente($user, $pass);
        if(count($cl)>0){
            $data['userData'] = $cl[0];
            $data['tipoUsuario'] = 'cliente';
            Session::put('idUsuario', $cl[0]->id);
            Session::put('tipoUsuario', 'cliente');
            Session::put('nombre', $cl[0]->nombre);
            return response()->json($data);
            //return view("homeCliente");
        }else{
            $personal = new Personal;
            $ps = $personal->buscarPersonal($user, $pass);
            if(count($ps)>0){
                //buscar si es tecnico o jefe
                $tecnico = new tecnico;
                $tec = $tecnico->isTecnico($ps[0]->id);

                if(count($tec)>0){
                    $data['userData'] = $tec[0];
                    $data['tipoUsuario'] = 'tecnico';
                    Session::put('idUsuario', $tec[0]->id);
                    Session::put('tipoUsuario', 'tecnico');
                    Session::put('nombre', $ps[0]->nombre);
                    return response()->json($data);
                }
                $jefeTecnico = new JefeTecnico;
                $jefTec = $jefeTecnico->isJefeTecnico($ps[0]->id);
                if(count($jefTec)>0){
                    $data['userData'] = $jefTec[0];
                    $data['tipoUsuario'] = 'jefeTecnico';
                    Session::put('idUsuario', $jefTec[0]->id);
                    Session::put('tipoUsuario', 'jefeTecnico');
                    Session::put('nombre', $ps[0]->nombre);
                    return response()->json($data);
                }
            }else{
                return 0;
            }
        }
    }
}
