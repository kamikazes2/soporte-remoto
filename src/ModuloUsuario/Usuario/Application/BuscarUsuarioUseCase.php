<?php

namespace Src\ModuloUsuario\Usuario\Application;

use Src\ModuloUsuario\Usuario\Domain\Contracts\UsuarioRepositoryContract;
use Src\ModuloUsuario\Usuario\Domain\Usuario;

class BuscarUsuarioUseCase
{
    private $repository;

    public function __construct(UsuarioRepositoryContract $repository){
        $this->repository = $repository;
    }

    public function __invoke(
        $usuario,
        $email
    )
    {
        return $this->repository->search($usuario, $email);
    }

}
