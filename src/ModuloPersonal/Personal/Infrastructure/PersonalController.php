<?php

namespace Src\ModuloPersonal\Personal\Infrastructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

use Src\ModuloPersonal\Personal\Infrastructure\Repositories\EloquentPersonalRepository;


use Src\ModuloPersonal\Personal\Application\CreatePersonalUseCase;
use Src\ModuloPersonal\Personal\Application\GetPersonalesUseCase;
use Src\ModuloPersonal\Personal\Application\UpdatePersonalUseCase;


use Src\ModuloEspecialidad\EspecialidadPersonal\Infrastructure\Repositories\EloquentEspecialidadPersonalRepository;
use Src\ModuloEspecialidad\EspecialidadPersonal\Application\GetEspecialidadesWithNombreByIdPersonalUseCase;





class PersonalController
{
    private $personalRepository;

    public function __construct(
        EloquentPersonalRepository $repository
        ){
        $this->personalRepository = $repository;
    }

    public function createPersonal(Request $request){
        $createPersonalUC = new CreatePersonalUseCase($this->personalRepository);
        $idUsuario = $request['idUsuario'];
        $dni = $request['dni'];
        $nombre =$request['nombre'];
        $apellido = $request['apellido'];
        $fechaNacimiento = $request['fechaNacimiento'];
        $disponible = $request['disponible'];
        $usu = $createPersonalUC->__invoke(
            $idUsuario,
            $dni,
            $nombre,
            $apellido,
            $fechaNacimiento,
            $disponible
        );
        return $usu;
    }

    public function getPersonales(){
        $gpUC = new GetPersonalesUseCase($this->personalRepository);
        $personales = $gpUC->__invoke();
        return $personales;
    }

    public function updatePersonal(Request $request){
        $updatePersonalUC = new UpdatePersonalUseCase($this->personalRepository);
        $id = $request['idPersonal'];
        $idUsuario = $request['idUsuario'];
        $dni = $request['dni'];
        $nombre =$request['nombre'];
        $apellido = $request['apellido'];
        $fechaNacimiento = $request['fechaNacimiento'];
        $disponible = true;
        $usu = $updatePersonalUC->__invoke(
            $id,
            $idUsuario,
            $dni,
            $nombre,
            $apellido,
            $fechaNacimiento,
            $disponible
        );
        return $usu;
    }

    public function getAllPersonalesWithEspecialides(Request $request){
        $gpUC = new GetPersonalesUseCase($this->personalRepository);
        $personales = $gpUC->__invoke();

       $arrayTodoLosPersonales = array();
       $arrayPersonales = array();
       $espeArray = array();
       foreach($personales as $espe){
            $getEspecialidadPersonal = new GetEspecialidadesWithNombreByIdPersonalUseCase(new EloquentEspecialidadPersonalRepository);
            $esp = $getEspecialidadPersonal->__invoke($espe->id);
            $arrayPersonales = array(
                'id' => $espe->id,
                'idUsuario' => $espe->idUsuario,
                'dni'=>$espe->dni,
                'nombre'=>$espe->nombre,
                'apellido'=>$espe->apellido,
                'fechaNacimiento'=>$espe->fechaNacimiento,
                'disponible' => $espe->disponible
            );
            $eArray = array();
            foreach($esp as $e){
                $aux['id'] = $e->idEspecialidad;
                $aux['nombre'] = $e->nombre;
                $aux['descripcion'] = $e->descripcion;
                array_push($eArray, $aux); 
            }
            $arrayPersonales['arrayEspecialidades'] = $eArray;
            array_push($arrayTodoLosPersonales, $arrayPersonales);
        }

        return $arrayTodoLosPersonales;
    }


}
