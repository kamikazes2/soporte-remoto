<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PersonalPack\Tecnico;
use App\Models\PersonalPack\Personal;
use App\Models\PersonalPack\EspecialidadPersonal;
use App\Models\ClientePack\Cliente;

class PersonalController extends Controller
{

    public function __construct(
    ){
    }

    public function CreatePersonal(Request $request)
    {
        //
    }

    public function createTecnico(Request $request){
        $personal = new Personal;
        $cliente = new Cliente;

        if($personal->existePersonal($request['usuario']) || $cliente->existeCliente($request['usuario'])){
            return response()->json("ya existe el usuario");
        }

        $personal->dni = $request['dni'];
        $personal->nombre = $request['nombre'];
        $personal->apellido = $request['apellido'];
        $personal->fechaNacimiento = $request['fechaNacimiento'];
        $personal->usuario = $request['usuario'];
        $personal->password = $request['password'];
        $personal->disponible = true;


        $personal->save();

        $id = $personal->id;
        $tecnico = new Tecnico;
        $tecnico->idPersonal = $id;

        $tecnico->save();
        return response()->json("creado correctamente");
    }

    public function addEspecialidadPersonal(Request $request){
        $idPersonal = $request['idPersonal'];
        foreach($request['idEspecialidades'] as $especialidad){
            $esp = new EspecialidadPersonal;
            $esp->idPersonal = $idPersonal;
            $esp->idEspecialidad = $especialidad['id'];
            $esp->save();
        }
        return response()->json("creado correctamente");
    }


}
