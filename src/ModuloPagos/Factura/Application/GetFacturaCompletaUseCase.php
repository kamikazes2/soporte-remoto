<?php

namespace Src\ModuloPagos\Factura\Application;

use Src\ModuloPagos\Factura\Domain\Contracts\FacturaRepositoryContract;
use Src\ModuloPagos\Factura\Domain\Factura;

class GetFacturaCompletaUseCase
{
    private $repository;

    public function __construct(FacturaRepositoryContract $repository){
        $this->repository = $repository;
    }

    public function __invoke(
        $idFactura
    )
    {
        return $this->repository->getFacturaCompleta($idFactura);
    }

}
