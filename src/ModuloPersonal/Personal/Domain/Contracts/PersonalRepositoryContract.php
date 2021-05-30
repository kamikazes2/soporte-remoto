<?php

namespace Src\ModuloPersonal\Personal\Domain\Contracts;
use Src\ModuloPersonal\Personal\Domain\Personal;

interface PersonalRepositoryContract{
    public function save(Personal $personal);
}