<?php

namespace Src\ModuloUsuario\Usuario\Domain\Contracts;
use Src\ModuloUsuario\Usuario\Domain\Usuario;

interface UsuarioRepositoryContract{
    public function save(Usuario $usuario);
}