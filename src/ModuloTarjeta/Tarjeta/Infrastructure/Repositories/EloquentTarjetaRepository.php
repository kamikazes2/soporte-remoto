<?php

namespace Src\ModuloTarjeta\Tarjeta\Infrastructure\Repositories;


use App\Models\TarjetaPack\Tarjeta as EloquentTarjetaModel;
use Src\ModuloTarjeta\Tarjeta\Domain\Contracts\TarjetaRepositoryContract;
use Src\ModuloTarjeta\Tarjeta\Domain\Tarjeta;
use Illuminate\Support\Facades\DB;



class EloquentTarjetaRepository implements TarjetaRepositoryContract
{
    private $eloquentTarjetaModel;

    public function __construct(){
        $this->eloquentTarjetaModel = new EloquentTarjetaModel;
    }

    public function save(Tarjeta $tarjeta)
    {
        $tar = $this->eloquentTarjetaModel;
        $tar->idCliente = $tarjeta->getIdCliente();
        $tar->nombre= $tarjeta->getNombre();
        $tar->numero= $tarjeta->getNumero();
        $tar->mes= $tarjeta->getMes();
        $tar->anio= $tarjeta->getAnio();
        $tar->save();
        return $tar;
    }

    public function buscarTarjetaCliente($idCliente){
        $tar = $this->eloquentTarjetaModel;
        $tarjeta = $tar->getLastTarjetaUsedByIdCliente($idCliente);
        return $tarjeta;
    }


}
