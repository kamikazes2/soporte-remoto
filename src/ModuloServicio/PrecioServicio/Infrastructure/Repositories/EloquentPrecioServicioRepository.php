<?php

namespace Src\ModuloServicio\PrecioServicio\Infrastructure\Repositories;


use App\Models\ServicePack\PrecioServicio as EloquentPrecioServicioModel;
use Src\ModuloServicio\PrecioServicio\Domain\Contracts\PrecioServicioRepositoryContract;
use Src\ModuloServicio\PrecioServicio\Domain\PrecioServicio;
use Illuminate\Support\Facades\DB;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Hash;


class EloquentPrecioServicioRepository implements PrecioServicioRepositoryContract
{
    private $eloquentPrecioServicioModel;

    public function __construct(){
        $this->eloquentPrecioServicioModel = new EloquentPrecioServicioModel;
    }

    public function save(PrecioServicio $precioServicio)
    {

        $newPrecioServicio = $this->eloquentPrecioServicioModel;

        $data = [
            'idServicio' => $precioServicio->getIdServicio(),
            'precio' => $precioServicio->getPrecio(),
            'fecha' => $precioServicio->getFecha()
        ];

        $newPrecioServicio->create($data);

    }

}
