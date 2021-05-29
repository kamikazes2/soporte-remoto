<?php

namespace Src\ModuloPagos\Factura\Infrastructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

use Src\ModuloPagos\Factura\Infrastructure\Repositories\EloquentFacturaRepository;


use Src\ModuloPagos\Factura\Application\CreateFacturaUseCase;
use Src\ModuloPagos\Factura\Application\BuscarFacturaClienteUseCase;




class FacturaController
{
    private $facturaRepository;

    public function __construct(
        EloquentFacturaRepository $repository
        ){
        $this->facturaRepository = $repository;
    }

    public function createFactura(Request $request){
        $createFacturaUC = new CreateFacturaUseCase($this->facturaRepository);
        $idNit = $request['idNit'];
        $date = Carbon::now();
        $fecha = $date->toDateTimeString();

        $fa = $createFacturaUC->__invoke(
            $idNit,
            $fecha
        );

        return $fa;
    }



}
