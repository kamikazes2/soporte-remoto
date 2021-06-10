<?php

namespace Src\ModuloUsuario\Usuario\Infrastructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Session;

use Src\ModuloUsuario\Usuario\Infrastructure\Repositories\EloquentUsuarioRepository;


use Src\ModuloUsuario\Usuario\Application\CreateUsuarioUseCase;
use Src\ModuloUsuario\Usuario\Application\BuscarUsuarioUseCase;
// use Src\ModuloUsuario\Usuario\Application\UpdateUsuarioUseCase;
// use Src\ModuloUsuario\Usuario\Application\GetUsuarioUseCase;
use App\Models\UserPack\User;

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


    public function getDataUsuario(){
        $idUsuario = Session::get('idUsuario');
        $user = new User;
        $us = $user->getUserById($idUsuario);
        return response()->json($us);
    }

    public function verificarSiExisteUsuarioCorreo(Request $request){
        $correo = $request['correo'];
        $user = new User;
        $user = $user->buscarUsuarioByCorreo($correo);

        if($user != false){
            return response()->json(
                ['existe'=> true, 'usuario' => $user]
            );
        }else{
            return response()->json(
                ['existe'=> false, 'message' => 'no existe usuario']
            );
        }

    }

    public function cambiarusuarioypass(Request $request){
        $user = new User;
        $user = $user->existeUsuario($request['usuario']);

        if(count($user)>0){
            return response()->json(
                [
                'error' => true,
                'message'=> "El nombre de usuario ya existe"
                ]
            );
        }else{
            $idUsuario = Session::get('idUsuario');
            $user = new User;
            $us = $user->find($idUsuario);
            $us->usuario = $request['usuario'];
            $us->tipoUsuario = "cliente";
            $us->password = Hash::make($request['password']);
            $us->save();
            Session::put('tipoUsuario', 'cliente');
            return response()->json(
                ["error"=>false]
            );
        }
    }

}
