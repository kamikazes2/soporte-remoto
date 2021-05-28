<?php

namespace Src\ModuloUsuario\Usuario\Infrastructure\Repositories;


use App\Models\UserPack\User as EloquentUsuarioModel;
use Src\ModuloUsuario\Usuario\Domain\Contracts\UsuarioRepositoryContract;
use Src\ModuloUsuario\Usuario\Domain\Usuario;
use Illuminate\Support\Facades\DB;



class EloquentUsuarioRepository implements UsuarioRepositoryContract
{
    private $eloquentUsuarioModel;

    public function __construct(){
        $this->eloquentUsuarioModel = new EloquentUsuarioModel;
    }

    public function save(Usuario $usuario)
    {
        $nuevoUsuario = $this->eloquentUsuarioModel;
        $nuevoUsuario->nombre = $usuario->getNombre();
        $nuevoUsuario->usuario = $usuario->getUsuario();
        $nuevoUsuario->email = $usuario->getEmail();
        $nuevoUsuario->password = $usuario->getPassword();
        $nuevoUsuario->tipoUsuario = $usuario->getTipoUsuario();
        $nuevoUsuario->save();

        return $nuevoUsuario;
    }

    public function search($user, $email){
        $usuario = $this->eloquentUsuarioModel;
        $result = $usuario->search($user, $email);
        return $result;
    }



}
