<?php

namespace Src\ModuloServicio\Servicio\Infrastructure\Repositories;


use App\Models\ServicePack\Servicio as EloquentServicioModel;
use Src\ModuloServicio\Servicio\Domain\Contracts\ServicioRepositoryContract;
use Src\ModuloServicio\Servicio\Domain\Servicio;
use Illuminate\Support\Facades\DB;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Hash;


class EloquentServicioRepository implements ServicioRepositoryContract
{
    private $eloquentServicioModel;

    public function __construct(){
        $this->eloquentServicioModel = new EloquentServicioModel;
    }

    public function save(Servicio $servicio)
    {

        $newServicio = $this->eloquentServicioModel;

        // $data = [
        //     'nombre' => $servicio->getNombre(),
        //     'descripcion' => $servicio->getDescripcion()
        // ];

        $newServicio->nombre = $servicio->getNombre();
        $newServicio->descripcion = $servicio->getDescripcion();

        $newServicio->save();
        return $newServicio->id;
    }
    
    public function getAll()
    {
        return $this->eloquentServicioModel->getAllWithPrice();
    }


}
