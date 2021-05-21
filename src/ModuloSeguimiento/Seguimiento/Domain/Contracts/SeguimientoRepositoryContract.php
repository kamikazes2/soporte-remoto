<?php

namespace Src\ModuloSeguimiento\Seguimiento\Domain\Contracts;
use Src\ModuloSeguimiento\Seguimiento\Domain\Seguimiento;

interface SeguimientoRepositoryContract{
    public function save(Seguimiento $seguimiento);
}