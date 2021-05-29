<?php

namespace Src\ModuloCliente\Cliente\Infrastructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Session;

use Src\ModuloCliente\Cliente\Infrastructure\Repositories\EloquentClienteRepository;


use Src\ModuloCliente\Cliente\Application\CreateClienteUseCase;
use Src\ModuloCliente\Cliente\Application\VerificarClienteUseCase;
// use Src\ModuloCliente\Cliente\Application\UpdateClienteUseCase;
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
        $idUsuario = Session::get('idUsuario');

        $createClienteUseCase = new CreateClienteUseCase($this->clienteRepository);
        $cl = $createClienteUseCase->__invoke(
            $dni,
            $nombre,
            $apellido,
            $fechaNacimiento,
            $idUsuario
        );

        return $cl;
    }

    public function verificarCliente(Request $request){
        $dni = $request['dni'];
        $verificarClienteUseCase = new VerificarClienteUseCase($this->clienteRepository);
        $cliente = $verificarClienteUseCase->__invoke(
            $dni
        );
        return $cliente;
    }

    public function updateCliente(Request $request)
    {
        //
    }

    public function deleteCliente(Request $request){
        //
    }

}
