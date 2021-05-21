<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

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





}
