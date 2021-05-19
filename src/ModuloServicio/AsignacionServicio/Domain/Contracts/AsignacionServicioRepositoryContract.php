<?php

namespace Src\ModuloServicio\AsignacionServicio\Domain\Contracts;
use Src\ModuloServicio\AsignacionServicio\Domain\AsignacionServicio;

interface AsignacionServicioRepositoryContract{
    public function save(AsignacionServicio $asignacionServicio);
    //public function getAll();
}