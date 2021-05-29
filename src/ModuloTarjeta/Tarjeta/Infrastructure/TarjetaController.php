<?php

namespace Src\ModuloTarjeta\Tarjeta\Infrastructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

use Src\ModuloTarjeta\Tarjeta\Infrastructure\Repositories\EloquentTarjetaRepository;


use Src\ModuloTarjeta\Tarjeta\Application\CreateTarjetaUseCase;
use Src\ModuloTarjeta\Tarjeta\Application\BuscarTarjetaClienteUseCase;




class TarjetaController
{
    private $tarjetaRepository;

    public function __construct(
        EloquentTarjetaRepository $repository
        ){
        $this->tarjetaRepository = $repository;
    }

    public function createTarjeta(Request $request){
        $createTarjetaUC = new CreateTarjetaUseCase($this->tarjetaRepository);
        $idCliente = $request['idCliente'];
        $nombre = $request['nombre'];
        $numero = $request['numero'];
        $mes = $request['mes'];
        $anio = $request['anio'];

        $tar = $createTarjetaUC->__invoke(
            $idCliente,
            $nombre,
            $numero,
            $mes,
            $anio
        );

        return $tar;

    }

    public function buscarTarjetaCliente(Request $request){
        $userTar = new BuscarTarjetaClienteUseCase($this->tarjetaRepository);
        $idCliente = $request['idCliente'];
        $res = $userTar->__invoke($idCliente);
        if(count($res)>0){
            return response()->json(
                array(
                    'tiene'=>true,
                    'tarjeta'=>$res
                )
            );
        }else{
            return response()->json(
                array(
                    'tiene'=>false
                )
            );
        }
    }

    public function updateTarjeta(Request $request)
    {
        //
    }

    public function deleteTarjeta(Request $request){
        //falta
    }

}
