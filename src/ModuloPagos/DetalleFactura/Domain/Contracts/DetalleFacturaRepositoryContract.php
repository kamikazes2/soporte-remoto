<?php

namespace Src\ModuloPagos\DetalleFactura\Domain\Contracts;
use Src\ModuloPagos\DetalleFactura\Domain\DetalleFactura;

interface DetalleFacturaRepositoryContract{
    public function save(DetalleFactura $detalleFactura);
}