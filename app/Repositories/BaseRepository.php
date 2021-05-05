<?php

namespace App\Repositories;

use App\Models\ServicePack\Servicio;
use Illuminate\Support\Facades\DB;

class BaseRepository{

    protected $model;

    public function __construct($model){
        $this->model = $model;
    }

    public function all(){
        return $this->model::all();
    }
    public function store($modelo){
        $modelo->save();
        $id = $modelo->id;
        return $id;
    }
}

