<?php

namespace Src\ModuloPersonal\Tecnico\Infrastructure\Repositories;


use App\Models\PersonalPack\Tecnico as EloquentTecnicoModel;
use Src\ModuloPersonal\Tecnico\Domain\Contracts\TecnicoRepositoryContract;
use Src\ModuloPersonal\Tecnico\Domain\Tecnico;
use Illuminate\Support\Facades\DB;



class EloquentTecnicoRepository implements TecnicoRepositoryContract
{
    private $eloquentTecnicoModel;

    public function __construct(){
        $this->eloquentTecnicoModel = new EloquentTecnicoModel;
    }

    public function save(Tecnico $tecnico)
    {
        $per = $this->eloquentTecnicoModel;
        $per->idPersonal= $tecnico->getIdPersonal();
        $per->save();
        return $per;
    }

    public function getAll(){
        $per = $this->eloquentTecnicoModel;
        $tecnicos = $per->all();
        return $tecnicos;
    }

    public function delete(Tecnico $tecnico){
        $per = $this->eloquentTecnicoModel;
        $res = $per->deleteByIdPersonal($tecnico->getIdPersonal());

        return $res;
    }

    public function getTecnicoByIdEspecialidad($idEspecialidad){
        $per = $this->eloquentTecnicoModel;
        $res = $per->getTecnicoByEspecialidad($idEspecialidad);
        return $res;
    }


}
