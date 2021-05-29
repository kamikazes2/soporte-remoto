<?php

namespace Src\ModuloTarjeta\Tarjeta\Domain\Contracts;
use Src\ModuloTarjeta\Tarjeta\Domain\Tarjeta;

interface TarjetaRepositoryContract{
    public function save(Tarjeta $tarjeta);
}