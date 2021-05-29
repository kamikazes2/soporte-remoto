<?php

namespace Src\ModuloCliente\Cliente\Application;

use Src\ModuloCliente\Cliente\Domain\Contracts\ClienteRepositoryContract;
use Src\ModuloCliente\Cliente\Domain\Cliente;

class BuscarClienteUsuarioLogueadoUseCase
{
    private $repository;

    public function __construct(ClienteRepositoryContract $repository){
        $this->repository = $repository;
    }

    public function __invoke(
        $idUsuario
    )
    {
        return $this->repository->buscarUltimoCliente($idUsuario);
    }

}
