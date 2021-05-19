<?php

namespace Src\ModuloPersonal\EspecialidadPersonal\Infrastructure\Repositories;


use App\Models\PersonalPack\EspecialidadPersonal as EloquentEspecialidadPersonalModel;
use Src\ModuloPersonal\EspecialidadPersonal\Domain\Contracts\EspecialidadPersonalRepositoryContract;
use Src\ModuloPersonal\EspecialidadPersonal\Domain\EspecialidadPersonal;
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


}
