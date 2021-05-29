<?php

namespace Src\ModuloPagos\NitTributario\Infrastructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

use Src\ModuloPagos\NitTributario\Infrastructure\Repositories\EloquentNitTributarioRepository;


use Src\ModuloPagos\NitTributario\Application\CreateNitTributarioUseCase;
use Src\ModuloPagos\NitTributario\Application\BuscarNitTributarioClienteUseCase;




class NitTributarioController
{
    private $nitTributarioRepository;

    public function __construct(
        EloquentNitTributarioRepository $repository
        ){
        $this->nitTributarioRepository = $repository;
    }

    public function createNitTributario(Request $request){
        $createNitTributarioUC = new CreateNitTributarioUseCase($this->nitTributarioRepository);
        $idCliente = $request['idCliente'];
        $nombre = $request['nombre'];
        $nit = $request['nit'];
        $tipo = $request['tipo'];


        $nit = $createNitTributarioUC->__invoke(
            $idCliente,
            $nit,
            $nombre,
            $tipo
        );

        return $nit;
    }

    public function buscarNitTributarioCliente(Request $request){
        $userNit = new BuscarNitTributarioClienteUseCase($this->nitTributarioRepository);
        $idCliente = $request['idCliente'];
        $res = $userNit->__invoke($idCliente);
        if(count($res)>0){
            return response()->json(
                array(
                    'tiene'=>true,
                    'nitTributario'=>$res
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


}
