<?php

namespace Src\ModuloEspecialidad\EspecialidadPersonal\Infrastructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Src\ModuloEspecialidad\EspecialidadPersonal\Infrastructure\Repositories\EloquentEspecialidadPersonalRepository;
use Src\ModuloEspecialidad\EspecialidadPersonal\Application\BuscarSiExisteRelacionUseCase;
use Src\ModuloEspecialidad\EspecialidadPersonal\Application\CreateEspecialidadPersonalUseCase;
use Src\ModuloEspecialidad\EspecialidadPersonal\Application\DeleteEspecialidadPersonalUseCase;
use Src\ModuloEspecialidad\EspecialidadPersonal\Application\GetEspecialidadesByIdPersonalUseCase;



class EspecialidadPersonalController
{
    private $repository;

    public function __construct(EloquentEspecialidadPersonalRepository $repository){
        $this->repository = $repository;
    }

    public function createOrUpdateEspecialidadPersonal(Request $request){
        $idPersonal = $request['idPersonal'];
        $arrayEspecialidades = $request['idEspecialidades'];
        $buscar = new BuscarSiExisteRelacionUseCase($this->repository);
        $crear = new CreateEspecialidadPersonalUseCase($this->repository);
        $eliminar = new DeleteEspecialidadPersonalUseCase($this->repository);
        $get = new GetEspecialidadesByIdPersonalUseCase($this->repository);

        //obtener las especialidades de la db
        //eliminar si no existe en array de especialidades
        $bd = $get->__invoke($idPersonal);
        
        foreach($arrayEspecialidades as $esp){
            $existe = false;
            foreach($bd as $d){
                if($esp['id'] == $d->idEspecialidad){
                    $existe = true;
                }
            }
            if(!$existe){
                $crear = new CreateEspecialidadPersonalUseCase(new EloquentEspecialidadPersonalRepository);
                $crear->__invoke($idPersonal, $esp['id']);
            }
        }
        //si existe en array especialidades y no en la db crear

        foreach($bd as $d){
            $existe = false;
            foreach($arrayEspecialidades as $esp){
                if($esp['id'] == $d->idEspecialidad){
                    $existe = true;
                }
            }
            if(!$existe){
                $eliminar->__invoke($d->idPersonal, $d->idEspecialidad);
            }
        }

        return response()->json("se creo correctamente");
        

    }

}