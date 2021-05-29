<?php

namespace Src\ModuloPagos\NitTributario\Application;

use Src\ModuloPagos\NitTributario\Domain\Contracts\NitTributarioRepositoryContract;
use Src\ModuloPagos\NitTributario\Domain\NitTributario;

class BuscarNitTributarioClienteUseCase
{
    private $repository;

    public function __construct(NitTributarioRepositoryContract $repository){
        $this->repository = $repository;
    }

    public function __invoke(
        $idCliente
    )
    {
        return $this->repository->buscarNitTributarioCliente($idCliente);
    }

}
