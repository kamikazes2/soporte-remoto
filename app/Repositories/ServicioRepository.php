<?php

namespace App\Repositories;

use App\Models\ServicePack\Servicio;

class ServicioRepository{

    private $model;

    public function __construct(){
        $this->model = new Servicio();
    }

    public function all(){
        return $this->model::all();
    }

}