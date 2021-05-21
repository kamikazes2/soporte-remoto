<?php

namespace Src\ModuloEspecialidad\EspecialidadServicio\Domain\Contracts;
use Src\ModuloEspecialidad\EspecialidadServicio\Domain\EspecialidadServicio;

interface EspecialidadServicioRepositoryContract{
    //public function save(ServicioRealizar $servicioRealizar);
    public function getEspecialidadByIdServicio($idServicio);
}