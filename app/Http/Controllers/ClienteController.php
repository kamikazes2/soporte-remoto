<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClientePack\Cliente;

class ClienteController extends Controller
{
    public function buscarCliente(Request $request){
        $cliente = new Cliente();
        $usuario = $request['usuario'];
        $pass = $request['password'];
        $cl = $cliente->buscarCliente($usuario, $pass);
        return $cl;
    }
}
