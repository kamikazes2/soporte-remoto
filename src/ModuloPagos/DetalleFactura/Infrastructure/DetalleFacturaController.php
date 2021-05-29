<?php

namespace Src\ModuloPagos\DetalleFactura\Infrastructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

use Src\ModuloPagos\DetalleFactura\Infrastructure\Repositories\EloquentDetalleFacturaRepository;


use Src\ModuloPagos\DetalleFactura\Application\CreateDetalleFacturaUseCase;
use Src\ModuloPagos\DetalleFactura\Application\BuscarDetalleFacturaClienteUseCase;




class DetalleFacturaController
{
    private $detalleFacturaRepository;

    public function __construct(
        EloquentDetalleFacturaRepository $repository
        ){
        $this->detalleFacturaRepository = $repository;
    }

    public function createDetalleFactura(Request $request){
        
        $arrayServiciosRealizar = $request['arrayIdServiciosRealizar'];
        $idFactura = $request['idFactura'];
        $resArray= array();
        foreach($arrayServiciosRealizar as $sr){
            $createDetalleFacturaUC = new CreateDetalleFacturaUseCase(new EloquentDetalleFacturaRepository);
            $res = $createDetalleFacturaUC->__invoke($sr['id'], $idFactura);
            array_push($resArray, $res);
        }

        return $resArray;
    }



}
