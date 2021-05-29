<?php

namespace Src\ModuloPagos\NitTributario\Domain\Contracts;
use Src\ModuloPagos\NitTributario\Domain\NitTributario;

interface NitTributarioRepositoryContract{
    public function save(NitTributario $nitTributario);
}