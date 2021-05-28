<?php

namespace Src\ModuloCliente\Cliente\Application;

use Src\ModuloCliente\Cliente\Domain\Contracts\ClienteRepositoryContract;
use Src\ModuloCliente\Cliente\Domain\Cliente;

class CreateClienteUseCase
{
    private $repository;

    public function __construct(ClienteRepositoryContract $repository){
        $this->repository = $repository;
    }

    public function __invoke(
        $dni,
        $nombre,
        $apellido,
        $fechaNacimiento,
        $idUsuario
    )
    {
        $cliente = Cliente::create($dni, $nombre, $apellido, $fechaNacimiento, $idUsuario);
        return $this->repository->save($cliente);
    }

}
