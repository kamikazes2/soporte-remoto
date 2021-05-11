<?php

namespace Src\ModuloServicio\Servicio\Infrastructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Src\ModuloServicio\Servicio\Infrastructure\Repositories\EloquentServicioRepository;
use Src\ModuloServicio\Servicio\Application\CreateServicioUseCase;



class CreateServicioController
{
    private $repository;

    public function __construct(EloquentServicioRepository $repository){
        $this->repository = $repository;
    }

    public function __invoke(Request $request)
    {
        $nombre = $request['nombre'];
        $descripcion = $request['descripcion'];
        $precio = $request['precio'];

        $createServicioUseCase = new CreateServicioUseCase($this->repository);
        $serv = $createServicioUseCase->__invoke(
            $nombre,
            $descripcion
        );

        return $serv;
    }

}
