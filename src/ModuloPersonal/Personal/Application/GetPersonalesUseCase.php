<?php

namespace Src\ModuloPersonal\Personal\Application;

use Src\ModuloPersonal\Personal\Domain\Contracts\PersonalRepositoryContract;
use Src\ModuloPersonal\Personal\Domain\Personal;

class GetPersonalesUseCase
{
    private $repository;

    public function __construct(PersonalRepositoryContract $repository){
        $this->repository = $repository;
    }

    public function __invoke(
    )
    {
        return $this->repository->getAll();
    }

}
