<?php

namespace Src\ModuloPagos\DetalleFactura\Infrastructure\Repositories;


use App\Models\PagoPack\DetalleFactura as EloquentDetalleFacturaModel;
use Src\ModuloPagos\DetalleFactura\Domain\Contracts\DetalleFacturaRepositoryContract;
use Src\ModuloPagos\DetalleFactura\Domain\DetalleFactura;
use Illuminate\Support\Facades\DB;



class EloquentDetalleFacturaRepository implements DetalleFacturaRepositoryContract
{
    private $eloquentDetalleFacturaModel;

    public function __construct(){
        $this->eloquentDetalleFacturaModel = new EloquentDetalleFacturaModel;
    }

    public function save(DetalleFactura $detalleFactura)
    {
        $df = $this->eloquentDetalleFacturaModel;
        $df->idServicioRealizar = $detalleFactura->getIdServicioRealizar();
        $df->idFactura = $detalleFactura->getIdFactura();
        $df->save();
        return $df;
    }


}
