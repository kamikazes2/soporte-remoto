<?php

namespace Src\ModuloTarjeta\Tarjeta\Application;

use Src\ModuloTarjeta\Tarjeta\Domain\Contracts\TarjetaRepositoryContract;
use Src\ModuloTarjeta\Tarjeta\Domain\Tarjeta;

class CreateTarjetaUseCase
{
    private $repository;

    public function __construct(TarjetaRepositoryContract $repository){
        $this->repository = $repository;
    }

    public function __invoke(
        $idCliente,
        $nombre,
        $numero,
        $mes,
        $anio
    )
    {
        $tarjeta = Tarjeta::create($idCliente, $nombre, $numero, $mes, $anio);
        return $this->repository->save($tarjeta);
    }

}
