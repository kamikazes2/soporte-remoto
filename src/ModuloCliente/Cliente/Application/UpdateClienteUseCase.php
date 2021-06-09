<?php

namespace Src\ModuloCliente\Cliente\Application;

use Src\ModuloCliente\Cliente\Domain\Contracts\ClienteRepositoryContract;
use Src\ModuloCliente\Cliente\Domain\Cliente;

class UpdateClienteUseCase
{
    private $repository;

    public function __construct(ClienteRepositoryContract $repository){
        $this->repository = $repository;
    }

    public function __invoke(
        $id,
        $nombre,
        $apellido,
        $fechaNacimiento,
        $telefono
    )
    {
        return $this->repository->update($id, $nombre, $apellido, $fechaNacimiento, $telefono);
    }

}
