<?php

namespace Src\ModuloPagos\NitTributario\Application;

use Src\ModuloPagos\NitTributario\Domain\Contracts\NitTributarioRepositoryContract;
use Src\ModuloPagos\NitTributario\Domain\NitTributario;

class CreateNitTributarioUseCase
{
    private $repository;

    public function __construct(NitTributarioRepositoryContract $repository){
        $this->repository = $repository;
    }

    public function __invoke(
        $idCliente,
        $nit,
        $nombre,
        $tipo
    )
    {
        $nitTributario = NitTributario::create($idCliente, $nit, $nombre, $tipo);
        return $this->repository->save($nitTributario);
    }

}
