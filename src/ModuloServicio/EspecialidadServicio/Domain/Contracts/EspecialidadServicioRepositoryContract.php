<?php

namespace Src\ModuloServicio\EspecialidadServicio\Domain\Contracts;
use Src\ModuloServicio\EspecialidadServicio\Domain\EspecialidadServicio;

interface EspecialidadServicioRepositoryContract{
    //public function save(ServicioRealizar $servicioRealizar);
    public function getEspecialidadByIdServicio($idServicio);
}