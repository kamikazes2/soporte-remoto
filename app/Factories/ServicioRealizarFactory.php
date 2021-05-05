<?php

namespace App\Factories;
use App\Models\ServicePack\ServicioRealizar;
use Carbon\Carbon;

class ServicioRealizarFactory{

    public static function create($request)
    {
        $obj = new ServicioRealizar();
        $obj->idSolicitud = $request['idSolicitud'];
        $obj->completado = false;
        $obj->estado = "PENDIENTE";
        return $obj;
    }

}

