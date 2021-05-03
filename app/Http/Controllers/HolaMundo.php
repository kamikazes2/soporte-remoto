<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HolaMundo extends Controller
{
    public function mostrarContenido(){
        $data = "hola mundo";
        return $data;
    }
}
