<?php

namespace Src\ModuloPagos\DetalleFactura\Infrastructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

use Src\ModuloPagos\DetalleFactura\Infrastructure\Repositories\EloquentDetalleFacturaRepository;


use Src\ModuloPagos\DetalleFactura\Application\CreateDetalleFacturaUseCase;
use Src\ModuloPagos\DetalleFactura\Application\BuscarDetalleFacturaClienteUseCase;

use App\Models\PagoPack\DetalleFactura;
use App\Models\ServicePack\ServicioRealizar;
use App\Models\ServicePack\SolicitudServicio;


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

    public function createCobro(Request $request){
        $idServicioRealizar = $request['idServicioRealizar'];

        $sr = new ServicioRealizar;
        $idss = $sr->getIdSolicitudServicioByIdServicioRealizar($idServicioRealizar);
        $idSolicitudServicio = $idss->idSolicitud;
        //sacar la cantidad de servicios por realizar que tiene
        $ss = new SolicitudServicio;
        $cant = $ss->getCantidadServiciosRealizar($idSolicitudServicio);
        $cantServicios = $cant->cant;

        $montoTotal = $ss->getMontoTotal($idSolicitudServicio);
        $montoTotal = $montoTotal->montoTotal;
        //obtener la cantidad de detalles factura
        $dff = new DetalleFactura;
        $detalles = $dff->getDetallesFacturaByIdSolicitudServicio($idSolicitudServicio);
        $cantDetalle = count($detalles);


        $df = new DetalleFactura;

        if($cantDetalle == $cantServicios){
            //si no es el ultimo, pagar el monto total del servicio
            $df->idFactura = $detalles[0]->idFactura;
            $df->idSolicitudServicio = $idSolicitudServicio;
            $df->nroPago = $cantDetalle+1;
            $df->monto = $idss->precio - $montoTotal*0.1;
            $df->detalle = "Pago por servicio de ".$idss->nombreServicio;
            $df->estado = "NOPAGADO";
            $df->save();
        }else{
            //si el el ultimo, pagar el monto total - la cantidad que ya pago
            $df->idFactura = $detalles[0]->idFactura;
            $df->idSolicitudServicio = $idSolicitudServicio;
            $df->nroPago = $cantDetalle+1;
            $df->monto = $idss->precio;
            $df->detalle = "Pago por servicio de ".$idss->nombreServicio;
            $df->estado = "NOPAGADO";
            $df->save();
        }

    
        return response()->json($df);
    }



}
