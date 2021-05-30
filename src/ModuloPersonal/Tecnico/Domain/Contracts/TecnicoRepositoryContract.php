<?php

namespace Src\ModuloPersonal\Tecnico\Domain\Contracts;
use Src\ModuloPersonal\Tecnico\Domain\Tecnico;

interface TecnicoRepositoryContract{
    public function save(Tecnico $personal);
}