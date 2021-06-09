<?php

namespace Src\ModuloCliente\Cliente\Infrastructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Session;

use Src\ModuloCliente\Cliente\Infrastructure\Repositories\EloquentClienteRepository;


use Src\ModuloCliente\Cliente\Application\CreateClienteUseCase;
use Src\ModuloCliente\Cliente\Application\VerificarClienteUseCase;
use Src\ModuloCliente\Cliente\Application\UpdateClienteUseCase;
use Src\ModuloCliente\Cliente\Application\BuscarClienteUsuarioLogueadoUseCase;
// use Src\ModuloCliente\Cliente\Application\GetClienteUseCase;


class ClienteController
{
    private $clienteRepository;

    public function __construct(
        EloquentClienteRepository $repository
        ){
        $this->clienteRepository = $repository;
    }

    public function createCliente(Request $request){
        $dni = $request['dni'];
        $nombre = $request['nombre'];
        $apellido = $request['apellido'];
        $fechaNacimiento = $request['fechaNacimiento'];
        $telefono = $request['telefono'];

        $createClienteUseCase = new CreateClienteUseCase($this->clienteRepository);
        $cl = $createClienteUseCase->__invoke(
            $dni,
            $nombre,
            $apellido,
            $fechaNacimiento,
            $telefono
        );

        return $cl;
    }

    public function verificarCliente(Request $request){

        $dni = $request['dni'];
        $idUsuario = Session::get('idUsuario');
        $verificarClienteUseCase = new VerificarClienteUseCase($this->clienteRepository);
        $cliente = $verificarClienteUseCase->__invoke(
            $dni,
            $idUsuario
        );
        return $cliente;
    }

    public function updateCliente(Request $request)
    {
        $updateUserUC = new UpdateClienteUseCase($this->clienteRepository);
        $id = $request['idCliente'];
        $nombre = $request['nombre'];
        $apellido = $request['apellido'];
        $fechaNacimiento = $request['fechaNacimiento'];
        $telefono = $request['telefono'];
        $clien = $updateUserUC->__invoke(
            $id,
            $nombre,
            $apellido,
            $fechaNacimiento,
            $telefono
        );
        return $clien;
    }

    public function buscarUltimoClienteDeUsuarioLogueado(){
        $idUsuario = Session::get('idUsuario');
        $bcul = new BuscarClienteUsuarioLogueadoUseCase($this->clienteRepository);
        $res = $bcul->__invoke($idUsuario);
        return $res;
    }

    public function deleteCliente(Request $request){
        //
    }

}
