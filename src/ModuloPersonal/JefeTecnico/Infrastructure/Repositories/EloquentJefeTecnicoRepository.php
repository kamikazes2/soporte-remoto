<?php

namespace Src\ModuloPersonal\JefeTecnico\Infrastructure\Repositories;


use App\Models\PersonalPack\JefeTecnico as EloquentJefeTecnicoModel;
use Src\ModuloPersonal\JefeTecnico\Domain\Contracts\JefeTecnicoRepositoryContract;
use Src\ModuloPersonal\JefeTecnico\Domain\JefeTecnico;
use Illuminate\Support\Facades\DB;



class EloquentJefeTecnicoRepository implements JefeTecnicoRepositoryContract
{
    private $eloquentJefeTecnicoModel;

    public function __construct(){
        $this->eloquentJefeTecnicoModel = new EloquentJefeTecnicoModel;
    }

    public function save(JefeTecnico $tecnico)
    {
        $per = $this->eloquentJefeTecnicoModel;
        $per->idPersonal= $tecnico->getIdPersonal();
        $per->save();
        return $per;
    }

    public function getAll(){
        $per = $this->eloquentJefeTecnicoModel;
        $tecnicos = $per->all();
        return $tecnicos;
    }

    public function delete(JefeTecnico $tecnico){
        $per = $this->eloquentJefeTecnicoModel;
        $res = $per->deleteByIdPersonal($tecnico->getIdPersonal());

        return $res;
    }


}
