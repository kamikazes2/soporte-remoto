<?php

namespace Src\ModuloAsignacion\AsignacionServicio\Domain\Contracts;
use Src\ModuloAsignacion\AsignacionServicio\Domain\AsignacionServicio;

interface AsignacionServicioRepositoryContract{
    public function save(AsignacionServicio $asignacionServicio);
    //public function getAll();
}