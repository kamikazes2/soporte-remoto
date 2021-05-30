<?php

namespace Src\ModuloEspecialidad\EspecialidadPersonal\Infrastructure\Repositories;


use App\Models\PersonalPack\EspecialidadPersonal as EloquentEspecialidadPersonalModel;
use Src\ModuloEspecialidad\EspecialidadPersonal\Domain\Contracts\EspecialidadPersonalRepositoryContract;
use Src\ModuloEspecialidad\EspecialidadPersonal\Domain\EspecialidadPersonal;
use Illuminate\Support\Facades\DB;

class EloquentEspecialidadPersonalRepository implements EspecialidadPersonalRepositoryContract
{
    private $eloquentEspecialidadPersonalModel;

    public function __construct(){
        $this->eloquentEspecialidadPersonalModel = new EloquentEspecialidadPersonalModel;
    }

    public function getPersonalByIdEspecialidad($idEspecialidad)
    {
        return $this->eloquentEspecialidadPersonalModel->getPersonalByIdEspecialidad($idEspecialidad);
    }
    public function save(EspecialidadPersonal $espPer){
        $es = $this->eloquentEspecialidadPersonalModel;
        $es->idPersonal = $espPer->getIdPersonal();
        $es->idEspecialidad = $espPer->getIdEspecialidad();
        $es->save();
        return $es;
    }
    public function delete(EspecialidadPersonal $espPer){
        $es = $this->eloquentEspecialidadPersonalModel;
        $es->deleteRelacion($espPer->getIdPersonal(), $espPer->getIdEspecialidad());
        return $es;
    }

    public function BuscarSiExisteRelacion($idPersonal, $idEspecialidad){
        $es = $this->eloquentEspecialidadPersonalModel;
        $res = $es->existeEspecialidadPersonal($idPersonal, $idEspecialidad);
        return $res;
    }

    public function GetEspecialidadesByIdPersonal($idEspecialidad){
        $es = $this->eloquentEspecialidadPersonalModel;
        $res = $es->GetEspecialidadesByIdPersonal($idEspecialidad);
        return $res;
    }
    public function GetEspecialidadesWithNombreByIdPersonal($idEspecialidad){
        $es = $this->eloquentEspecialidadPersonalModel;
        $res = $es->GetEspecialidadesWithNombreByIdPersonal($idEspecialidad);
        return $res;
    }


}
