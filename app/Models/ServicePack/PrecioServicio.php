<?php

namespace App\Models\ServicePack;

use Illuminate\Database\Eloquent\Model;

class PrecioServicio extends Model
{
    protected $table = 'precioservicio';
    protected $fillable = ['idServicio', 'precio', 'fecha'];
}
