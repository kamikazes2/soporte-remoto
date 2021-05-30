<?php
namespace Src\ModuloEspecialidad\EspecialidadPersonal\Application;

use Src\ModuloEspecialidad\EspecialidadPersonal\Domain\Contracts\EspecialidadPersonalRepositoryContract;
use Src\ModuloEspecialidad\EspecialidadPersonal\Domain\EspecialidadPersonal;

class CreateEspecialidadPersonalUseCase
{
    private $repository;

    public function __construct(EspecialidadPersonalRepositoryContract $repository){
        $this->repository = $repository;
    }

    public function __invoke(
        $idPersonal,
        $idEspecialidad
    )
    {
        $esp = EspecialidadPersonal::create($idPersonal, $idEspecialidad);
        return $this->repository->save($esp);
    }


}
