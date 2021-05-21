<?php

namespace Src\ModuloServicioPorRealizar\SolicitudServicio\Domain\Contracts;
use Src\ModuloServicioPorRealizar\SolicitudServicio\Domain\SolicitudServicio;

interface SolicitudServicioRepositoryContract{
    public function save(SolicitudServicio $solicitudServicio);
}