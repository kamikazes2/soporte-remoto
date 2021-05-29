<?php

namespace Src\ModuloCliente\Cliente\Infrastructure\Repositories;


use App\Models\ClientePack\Cliente as EloquentClienteModel;
use Src\ModuloCliente\Cliente\Domain\Contracts\ClienteRepositoryContract;
use Src\ModuloCliente\Cliente\Domain\Cliente;




class EloquentClienteRepository implements ClienteRepositoryContract
{
    private $eloquentClienteModel;

    public function __construct(){
        $this->eloquentClienteModel = new EloquentClienteModel;
    }

    public function save(Cliente $cliente)
    {
        $nuevoCliente = $this->eloquentClienteModel;
        $nuevoCliente->dni = $cliente->getDni();
        $nuevoCliente->nombre = $cliente->getNombre();
        $nuevoCliente->apellido = $cliente->getApellido();
        $nuevoCliente->fechaNacimiento = $cliente->getFechaNacimiento();
        $nuevoCliente->idUsuario = $cliente->getIdUsuario();
        $nuevoCliente->save();

        return $nuevoCliente;
    }

    public function verificarCliente($dni){
        $cliente = $this->eloquentClienteModel;
        $cliente = $cliente->verificarCliente($dni);
        if(count($cliente)>0){
            return response()->json(
                [
                    'existe' => true,
                    'cliente'=> $cliente
                ]
            );
        }else{
            return response()->json(
                [
                    'existe' => false
                ]
            );
        }
    }


}
