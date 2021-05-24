<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ServicePack\Especialidad;

class EspecialidadController extends Controller
{
    public function createEspecialidad(Request $request){
        $esp = new Especialidad;
        $esp->nombre = $request['nombre'];
        $esp->descripcion = $request['descripcion'];
        $esp->save();
    }

    public function getEspecialidades(){
        $esp = new Especialidad;
        return $esp->getAll();
    }

    public function actualizarEspecialidad(Request $request){
        $esp = new Especialidad;
        $esp->id = $request['id'];
        $esp->nombre = $request['nombre'];
        $esp->descripcion = $request['descripcion'];
        $esp->actualizar();
        return response()->json("actualizado");
    }

    public function eliminarEspecialidad(Request $request){
        $esp = new Especialidad;
        $esp->deleteById($request['id']);
        return response()->json("eliminado");
    }



}
