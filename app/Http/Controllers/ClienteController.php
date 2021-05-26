<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClientePack\Cliente;
use App\Models\PersonalPack\Personal;

class ClienteController extends Controller
{
    public function buscarCliente(Request $request){
        $cliente = new Cliente();
        $usuario = $request['usuario'];
        $pass = $request['password'];
        $cl = $cliente->buscarCliente($usuario, $pass);
        return $cl;
    }

    public function createCliente(Request $request){
        $cliente = new Cliente;
        $personal = new Personal;
        if($cliente->existeCliente($request['usuario']) || $personal->existePersonal($request['usuario'])){
            $a['error'] = true;
            $a['message'] = "El usuario ya se encuentra en uso";
            return response()->json($a); 
        }else{
            $cliente->dni = $request['dni'];
            $cliente->nombre = $request['nombre'];
            $cliente->apellido = $request['apellido'];
            $cliente->fechaNacimiento = $request['fechaNacimiento'];
            $cliente->usuario = $request['usuario'];
            $cliente->password = $request['password'];
            $cliente->save();
            $a['error'] = false;
            $a['idCliente'] = $cliente->id;
            return $a;
        }
    }


    public function updateDatosPersonales(Request $request){
        $cliente = new Cliente;
        $cliente = $cliente->find($request['idCliente']);
        $cliente->nombre = $request['nombre'];
        $cliente->apellido = $request['apellido'];
        $cliente->dni = $request['dni'];
        $cliente->save();
        return response()->json("Actualizado");
    }

    public function changePassword(Request $request){
        $cliente = new Cliente;
        $cliente = $cliente->find($request['idCliente']);
        
        if($cliente->password == $request['oldPassword']){
            $cliente->password = $request['newPassword'];
            $cliente->save();
            return response()->json("contraseña actualizado");
        }else{
            return response()->json("error");
        }

    }

    


}
