<?php

namespace Src\ModuloPersonal\Personal\Infrastructure\Repositories;


use App\Models\PersonalPack\Personal as EloquentPersonalModel;
use Src\ModuloPersonal\Personal\Domain\Contracts\PersonalRepositoryContract;
use Src\ModuloPersonal\Personal\Domain\Personal;
use Illuminate\Support\Facades\DB;



class EloquentPersonalRepository implements PersonalRepositoryContract
{
    private $eloquentPersonalModel;

    public function __construct(){
        $this->eloquentPersonalModel = new EloquentPersonalModel;
    }

    public function save(Personal $personal)
    {
        $per = $this->eloquentPersonalModel;
        $per->idUsuario = $personal->getIdUsuario();
        $per->dni= $personal->getDni();
        $per->nombre = $personal->getNombre();
        $per->apellido = $personal->getApellido();
        $per->fechaNacimiento  = $personal->getFechaNacimiento();
        $per->disponible = true;
        $per->save();
        return $per;
    }

    public function getAll(){
        $per = $this->eloquentPersonalModel;
        $personales = $per->all();
        return $personales;
    }

    public function update(Personal $personal){
        $per = $this->eloquentPersonalModel;
        $per = $per->find($personal->getId());
        $per->idUsuario = $personal->getIdUsuario();
        $per->dni= $personal->getDni();
        $per->nombre = $personal->getNombre();
        $per->apellido = $personal->getApellido();
        $per->fechaNacimiento  = $personal->getFechaNacimiento();
        $per->disponible = $personal->getDisponible();
        $per->save();
        return $per;
    }


}
