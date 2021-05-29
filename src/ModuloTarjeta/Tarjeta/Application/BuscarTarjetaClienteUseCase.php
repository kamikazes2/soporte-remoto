<?php

namespace Src\ModuloTarjeta\Tarjeta\Application;

use Src\ModuloTarjeta\Tarjeta\Domain\Contracts\TarjetaRepositoryContract;
use Src\ModuloTarjeta\Tarjeta\Domain\Tarjeta;

class BuscarTarjetaClienteUseCase
{
    private $repository;

    public function __construct(TarjetaRepositoryContract $repository){
        $this->repository = $repository;
    }

    public function __invoke(
        $idCliente
    )
    {
        return $this->repository->buscarTarjetaCliente($idCliente);
    }

}
