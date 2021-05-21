<?php

namespace App\Models\ServicePack;

use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
    protected $table = 'seguimiento';
    protected $fillable = ['idAsignacionServicio', 'idJefeTecnico', 'fecha', 'descripcion'];
}
