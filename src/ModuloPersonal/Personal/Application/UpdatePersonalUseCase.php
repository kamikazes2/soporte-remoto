<?php

namespace Src\ModuloPersonal\Personal\Application;

use Src\ModuloPersonal\Personal\Domain\Contracts\PersonalRepositoryContract;
use Src\ModuloPersonal\Personal\Domain\Personal;

class UpdatePersonalUseCase
{
    private $repository;

    public function __construct(PersonalRepositoryContract $repository){
        $this->repository = $repository;
    }

    public function __invoke(
        $id,
        $idUsuario,
        $dni,
        $nombre,
        $apellido,
        $fechaNacimiento,
        $disponible
    )
    {
        $personal = Personal::create($idUsuario, $dni, $nombre, $apellido, $fechaNacimiento, $disponible);
        $personal->setId($id);
        return $this->repository->update($personal);
    }

}
