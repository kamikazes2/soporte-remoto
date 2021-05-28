<?php

namespace Src\ModuloUsuario\Usuario\Application;

use Src\ModuloUsuario\Usuario\Domain\Contracts\UsuarioRepositoryContract;
use Src\ModuloUsuario\Usuario\Domain\Usuario;

class CreateUsuarioUseCase
{
    private $repository;

    public function __construct(UsuarioRepositoryContract $repository){
        $this->repository = $repository;
    }

    public function __invoke(
        $nombre,
        $usuario,
        $email,
        $password,
        $tipoUsuario
    )
    {
        $usuario = Usuario::create($nombre, $usuario, $email, $password, $tipoUsuario);
        return $this->repository->save($usuario);
    }

}
