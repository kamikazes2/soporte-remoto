<?php

namespace Src\ModuloPagos\Factura\Application;

use Src\ModuloPagos\Factura\Domain\Contracts\FacturaRepositoryContract;
use Src\ModuloPagos\Factura\Domain\Factura;

class CreateFacturaUseCase
{
    private $repository;

    public function __construct(FacturaRepositoryContract $repository){
        $this->repository = $repository;
    }

    public function __invoke(
        $idNit,
        $fecha
    )
    {
        $factura = Factura::create($idNit, $fecha);
        return $this->repository->save($factura);
    }

}
