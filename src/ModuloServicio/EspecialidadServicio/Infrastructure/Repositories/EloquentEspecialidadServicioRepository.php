<?php

namespace Src\ModuloServicio\EspecialidadServicio\Infrastructure\Repositories;


use App\Models\ServicePack\EspecialidadServicio as EloquentEspecialidadServicioModel;
use Src\ModuloServicio\EspecialidadServicio\Domain\Contracts\EspecialidadServicioRepositoryContract;
use Src\ModuloServicio\EspecialidadServicio\Domain\EspecialidadServicio;
use Illuminate\Support\Facades\DB;

class EloquentEspecialidadServicioRepository implements EspecialidadServicioRepositoryContract
{
    private $eloquentEspecialidadServicioModel;

    public function __construct(){
        $this->eloquentEspecialidadServicioModel = new EloquentEspecialidadServicioModel;
    }

    public function getEspecialidadByIdServicio($idServicio)
    {
        return $this->eloquentEspecialidadServicioModel->getEspecialidadByIdServicio($idServicio);
    }


}
