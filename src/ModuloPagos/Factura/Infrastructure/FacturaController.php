<?php

namespace Src\ModuloPagos\Factura\Infrastructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

use Src\ModuloPagos\Factura\Infrastructure\Repositories\EloquentFacturaRepository;


use Src\ModuloPagos\Factura\Application\CreateFacturaUseCase;
use Src\ModuloPagos\Factura\Application\GetFacturaCompletaUseCase;




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

    public function getFacturaCompleta(Request $request){
        $idFactura = $request['idFactura'];
        $getFacUC = new GetFacturaCompletaUseCase($this->facturaRepository);
        $factura = $getFacUC->__invoke($idFactura);

        $res = array();
        $res['fecha'] = $factura[0]->fecha;
        $res['nombreCliente'] = $factura[0]->nombreCliente;
        $res['nit'] = $factura[0]->nit;

        $arrayServ = array();
        foreach($factura as $fac){
            $array['nombreServicio'] = $fac->nombreServicio;
            $array['precio'] = $fac->precio;
            $array['id'] = $fac->id;
            array_push($arrayServ, $array);
        }
        $res['detalleFactura'] = $arrayServ;


        return response()->json($res);
    }



}
