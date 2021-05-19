<?php

namespace Src\ModuloServicio\ServicioRealizar\Domain\Contracts;
use Src\ModuloServicio\ServicioRealizar\Domain\ServicioRealizar;

interface ServicioRealizarRepositoryContract{
    public function save(ServicioRealizar $servicioRealizar);
    public function getServicioPendiente();
}