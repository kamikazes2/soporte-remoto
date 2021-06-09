<?php

namespace Src\ModuloPagos\DetalleFactura\Infrastructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

use Src\ModuloPagos\DetalleFactura\Infrastructure\Repositories\EloquentDetalleFacturaRepository;


use Src\ModuloPagos\DetalleFactura\Application\CreateDetalleFacturaUseCase;
use Src\ModuloPagos\DetalleFactura\Application\BuscarDetalleFacturaClienteUseCase;

use App\Models\PagoPack\DetalleFactura;



class DetalleFacturaController
{
    private $detalleFacturaRepository;

    public function __construct(
        EloquentDetalleFacturaRepository $repository
        ){
        $this->detalleFacturaRepository = $repository;
    }

    public function createDetalleFacturass(Request $request){
        
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


    public function createDetalleFactura(Request $request){

        $idFactura = $request['idFactura'];
        $idSolicitudServicio = $request['idSolicitudServicio'];
        $nroPago = $request['nroPago'];
        $monto = $request['monto'];
        $detalle = $request['detalle'];
        $estado = $request['estado'];

        $df = new DetalleFactura;
        $df->idFactura = $idFactura;
        $df->idSolicitudServicio = $idSolicitudServicio;
        $df->nroPago = $nroPago;
        $df->monto = $monto;
        $df->detalle = $detalle;
        $df->estado = "PAGADO";

        $df->save();
        return $df;
    }



}
