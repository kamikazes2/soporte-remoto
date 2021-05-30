<?php

namespace Src\ModuloPersonal\JefeTecnico\Domain\Contracts;
use Src\ModuloPersonal\JefeTecnico\Domain\JefeTecnico;

interface JefeTecnicoRepositoryContract{
    public function save(JefeTecnico $jefeTecnico);
}