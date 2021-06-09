<?php

namespace Src\ModuloCliente\Cliente\Application;

use Src\ModuloCliente\Cliente\Domain\Contracts\ClienteRepositoryContract;
use Src\ModuloCliente\Cliente\Domain\Cliente;

class VerificarClienteUseCase
{
    private $repository;

    public function __construct(ClienteRepositoryContract $repository){
        $this->repository = $repository;
    }

    public function __invoke(
        $dni,
        $telefono
    )
    {
        return $this->repository->verificarCliente($dni, $telefono);
    }

}
