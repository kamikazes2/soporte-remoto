<?php

namespace Src\ModuloPagos\Factura\Infrastructure\Repositories;


use App\Models\PagoPack\Factura as EloquentFacturaModel;
use Src\ModuloPagos\Factura\Domain\Contracts\FacturaRepositoryContract;
use Src\ModuloPagos\Factura\Domain\Factura;
use Illuminate\Support\Facades\DB;



class EloquentFacturaRepository implements FacturaRepositoryContract
{
    private $eloquentFacturaModel;

    public function __construct(){
        $this->eloquentFacturaModel = new EloquentFacturaModel;
    }

    public function save(Factura $nitTributario)
    {
        $factura = $this->eloquentFacturaModel;
        $factura->idNit = $nitTributario->getIdNit();
        $factura->fecha = $nitTributario->getFecha();
        $factura->save();
        return $factura;
    }

    public function getFacturaCompleta($idFactura){
        $factura = $this->eloquentFacturaModel;
        return $factura->getFacturaTotalByIdFactura($idFactura);
    }


}
