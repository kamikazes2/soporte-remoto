<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\UserPack\User;
use Illuminate\Support\Facades\Hash;

class FrontController extends Controller
{

    private $session;

    public function __construct(Session $session){
        $this->session = $session;
    }

    public function index(){
        if(self::isUserLogedIn()){
            $tipoUsuario = Session::get('tipoUsuario');
            switch($tipoUsuario){
                case "cliente":
                    return view("clienteHome");
                case "tecnico":
                    return view("tecnicoHome");
                case "jefeTecnico":
                    return view("jefetecnicohome");
                case "rrhh":
                    return view("AdminHome");
            }
        }else{
            return view("index");
        }
    }

    public function isUserLogedIn(){
        if($this->session::has('idUsuario')){
            return true;
        }
    }

    public function cerrarSesion(Request $request){
        //$request->session()->forget('idUsuario', 'tipoUsuario', 'nombre');
        Session::flush();
        return view("index");
    }


    public function login(Request $request){
        $usuario = $request['usuario'];
        $password = $request['password'];
        $user = new User;
        $result = $user->getUsuario($usuario);
        if($result != null){
            if(Hash::check($password, $result->password)){
                Session::put('idUsuario', $result->id);
                Session::put('nombre', $result->nombre);
                switch($result->tipoUsuario){
                    case 'cliente':
                        Session::put('tipoUsuario', 'cliente');
                        break;
                    case 'jefeTecnico':
                        Session::put('tipoUsuario', 'jefeTecnico');
                        break;
                    case 'rrhh':
                        Session::put('tipoUsuario', 'rrhh');
                        break;    
                    case 'tecnico':
                        Session::put('tipoUsuario', 'tecnico');
                        break;
                }
                return response()->json(
                    ['error'=> false, 'usuario'=>$result]
                );
            }else{
                return response()->json(
                    ['error'=> true, 'message'=>'password invalido']
                );
            }
        }else{
            return response()->json(
                ['error'=> true, 'message'=>'no existe usuario']
            );
        }
    }

    public function getLoggedUser(){
        return Session::get('nombre');
    }


}
