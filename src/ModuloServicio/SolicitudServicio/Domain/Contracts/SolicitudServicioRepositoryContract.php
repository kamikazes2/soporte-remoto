<?php

namespace Src\ModuloServicio\SolicitudServicio\Domain\Contracts;
use Src\ModuloServicio\SolicitudServicio\Domain\SolicitudServicio;

interface SolicitudServicioRepositoryContract{
    public function save(SolicitudServicio $solicitudServicio);
}