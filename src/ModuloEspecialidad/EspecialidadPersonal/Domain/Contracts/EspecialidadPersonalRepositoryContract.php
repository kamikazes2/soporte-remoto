<?php

namespace Src\ModuloEspecialidad\EspecialidadPersonal\Domain\Contracts;
use Src\ModuloPersonal\EspecialidadPersonal\Domain\EspecialidadPersonal;

interface EspecialidadPersonalRepositoryContract{
    //public function save(PersonalRealizar $servicioRealizar);
    public function getPersonalByIdEspecialidad($idEspecialidad);
}