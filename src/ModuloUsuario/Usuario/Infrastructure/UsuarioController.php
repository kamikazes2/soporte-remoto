<?php

namespace Src\ModuloUsuario\Usuario\Infrastructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

use Src\ModuloUsuario\Usuario\Infrastructure\Repositories\EloquentUsuarioRepository;


use Src\ModuloUsuario\Usuario\Application\CreateUsuarioUseCase;
use Src\ModuloUsuario\Usuario\Application\BuscarUsuarioUseCase;
// use Src\ModuloUsuario\Usuario\Application\UpdateUsuarioUseCase;
// use Src\ModuloUsuario\Usuario\Application\GetUsuarioUseCase;


class UsuarioController
{
    private $usuarioRepository;

    public function __construct(
        EloquentUsuarioRepository $repository
        ){
        $this->usuarioRepository = $repository;
    }

    public function createUsuario(Request $request){
        $nombre = $request['nombre'];
        $usuario = $request['usuario'];
        $email = $request['email'];
        $tipoUsuario = $request['tipoUsuario'];
        $password = Hash::make($request['password']);
        $buscarUsuarioUseCase = new BuscarUsuarioUseCase($this->usuarioRepository);

        $res = $buscarUsuarioUseCase->__invoke(
            $usuario,
            $email
        );
        if($res != null){
            return response()->json(
                [
                    'error' => true,
                    'message' => 'El usuario o correo ya existe'
                ]
            );
        }
        $createUsuarioUseCase = new CreateUsuarioUseCase($this->usuarioRepository);
        $newUser = $createUsuarioUseCase->__invoke(
            $nombre,
            $usuario,
            $email,
            $password,
            $tipoUsuario
        );
        return response()->json(
            [
                'error' => false,
                'user'  => $newUser
            ]
        );
    }

    public function getUsuarios(){
        //
    }

    public function updateUsuario(Request $request)
    {
        //
    }

    public function deleteUsuario(Request $request){
        //falta
    }

}
