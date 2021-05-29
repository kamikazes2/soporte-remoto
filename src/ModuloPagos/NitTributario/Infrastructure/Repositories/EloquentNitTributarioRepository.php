<?php

namespace Src\ModuloPagos\NitTributario\Infrastructure\Repositories;


use App\Models\PagoPack\NitTributario as EloquentNitTributarioModel;
use Src\ModuloPagos\NitTributario\Domain\Contracts\NitTributarioRepositoryContract;
use Src\ModuloPagos\NitTributario\Domain\NitTributario;
use Illuminate\Support\Facades\DB;



class EloquentNitTributarioRepository implements NitTributarioRepositoryContract
{
    private $eloquentNitTributarioModel;

    public function __construct(){
        $this->eloquentNitTributarioModel = new EloquentNitTributarioModel;
    }

    public function save(NitTributario $nitTributario)
    {
        $nit = $this->eloquentNitTributarioModel;
        $nit->idCliente = $nitTributario->getIdCliente();
        $nit->nombre = $nitTributario->getNombre();
        $nit->nit = $nitTributario->getNit();
        $nit->tipo = $nitTributario->getTipo();
        $nit->save();
        return $nit;
    }

    public function buscarNitTributarioCliente($idCliente){
        $nt = $this->eloquentNitTributarioModel;
        $nit = $nt->getLastNitTributarioUsedByIdCliente($idCliente);
        return $nit;
    }


}
