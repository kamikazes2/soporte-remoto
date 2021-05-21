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


}
