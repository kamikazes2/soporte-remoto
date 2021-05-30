<?php

namespace Src\ModuloPersonal\Personal\Application;

use Src\ModuloPersonal\Personal\Domain\Contracts\PersonalRepositoryContract;
use Src\ModuloPersonal\Personal\Domain\Personal;

class CreatePersonalUseCase
{
    private $repository;

    public function __construct(PersonalRepositoryContract $repository){
        $this->repository = $repository;
    }

    public function __invoke(
        $idUsuario,
        $dni,
        $nombre,
        $apellido,
        $fechaNacimiento,
        $disponible
    )
    {
        $personal = Personal::create($idUsuario, $dni, $nombre, $apellido, $fechaNacimiento, $disponible);
        return $this->repository->save($personal);
    }

}
