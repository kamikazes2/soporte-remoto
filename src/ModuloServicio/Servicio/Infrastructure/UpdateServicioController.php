<?php

namespace Src\ModuloServicio\Servicio\Infrastructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Src\ModuloServicio\Servicio\Infrastructure\Repositories\EloquentServicioRepository;
use Src\ModuloServicio\Servicio\Application\UpdateServicioUseCase;



class UpdateServicioController
{
    private $repository;

    public function __construct(EloquentServicioRepository $repository){
        $this->repository = $repository;
    }

    public function __invoke(Request $request)
    {
        $id = $request['id'];
        $nombre = $request['nombre'];
        $descripcion = $request['descripcion'];
        $precio = $request['precio'];

        $updateServicioUseCase = new UpdateServicioUseCase($this->repository);
        $serv = $updateServicioUseCase->__invoke(
            $id,
            $nombre,
            $descripcion
        );
        
        return $serv;
    }

}
