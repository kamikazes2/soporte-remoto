<?php

namespace Src\ModuloServicio\Servicio\Domain\Contracts;
use Src\ModuloServicio\Servicio\Domain\Servicio;

interface ServicioRepositoryContract{
    public function save(Servicio $servicio);
    public function getAll();
}