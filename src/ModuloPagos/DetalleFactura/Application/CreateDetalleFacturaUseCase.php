<?php

namespace Src\ModuloPagos\DetalleFactura\Application;

use Src\ModuloPagos\DetalleFactura\Domain\Contracts\DetalleFacturaRepositoryContract;
use Src\ModuloPagos\DetalleFactura\Domain\DetalleFactura;

class CreateDetalleFacturaUseCase
{
    private $repository;

    public function __construct(DetalleFacturaRepositoryContract $repository){
        $this->repository = $repository;
    }

    public function __invoke(
        $idServicioRealizar,
        $idFactura
    )
    {
        $factura = DetalleFactura::create($idServicioRealizar, $idFactura);
        return $this->repository->save($factura);
    }

}
