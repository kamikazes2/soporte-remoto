<?php

namespace Src\ModuloServicio\PrecioServicio\Infrastructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

use Src\ModuloServicio\PrecioServicio\Infrastructure\Repositories\EloquentPrecioServicioRepository;
use Src\ModuloServicio\PrecioServicio\Application\CreatePrecioServicioUseCase;



class CreatePrecioServicioController
{
    private $repository;

    public function __construct(EloquentPrecioServicioRepository $repository){
        $this->repository = $repository;
    }

    public function __invoke(Request $request)
    {
        $idServicio = $request['idServicio'];
        $precio = $request['precio'];
        $date = Carbon::now();
        $fecha = $date->toDateTimeString();

        $createPrecioServicioUseCase = new CreatePrecioServicioUseCase($this->repository);
        $createPrecioServicioUseCase->__invoke(
            $idServicio,
            $precio,
            $fecha
        );
        
        return true;
    }

}
