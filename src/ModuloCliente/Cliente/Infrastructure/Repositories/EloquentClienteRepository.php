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
        $nuevoCliente->telefono = $cliente->getTelefono();
        $nuevoCliente->save();

        return $nuevoCliente;
    }

    public function verificarCliente($dni, $telefono){
        $cliente = $this->eloquentClienteModel;
        $cliente = $cliente->verificarCliente($dni, $telefono);
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

    public function update($id, $nombre, $apellido, $fechaNacimiento, $telefono){
        $cli = $this->eloquentClienteModel;
        $cli = $cli->find($id);
        $cli->nombre = $nombre;
        $cli->apellido = $apellido;
        $cli->fechaNacimiento = $fechaNacimiento;
        $cli->telefono = $telefono;
        $cli->save();
        return $cli;
    }

    public function buscarUltimoCliente($telefono){
        $cli = $this->eloquentClienteModel;
        $res = $cli->buscarUltimoCliente($telefono);
        if(count($res)>0){
            return response()->json($res[0]);
        }else{
            return false;
        }
    }


}
