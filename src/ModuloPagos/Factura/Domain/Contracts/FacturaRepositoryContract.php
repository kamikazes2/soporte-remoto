<?php

namespace Src\ModuloPagos\Factura\Domain\Contracts;
use Src\ModuloPagos\Factura\Domain\Factura;

interface FacturaRepositoryContract{
    public function save(Factura $factura);
}