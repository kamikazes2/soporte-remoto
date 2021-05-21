<?php

namespace Src\ModuloServicioPorRealizar\ServicioRealizar\Domain\Contracts;
use Src\ModuloServicioPorRealizar\ServicioRealizar\Domain\ServicioRealizar;

interface ServicioRealizarRepositoryContract{
    public function save(ServicioRealizar $servicioRealizar);
    public function getServicioPendiente();
}