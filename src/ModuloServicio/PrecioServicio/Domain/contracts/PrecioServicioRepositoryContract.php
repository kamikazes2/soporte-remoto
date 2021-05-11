<?php

namespace Src\ModuloServicio\PrecioServicio\Domain\Contracts;
use Src\ModuloServicio\PrecioServicio\Domain\PrecioServicio;

interface PrecioServicioRepositoryContract{
    public function save(PrecioServicio $precioServicio);
}