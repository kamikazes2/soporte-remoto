<?php

namespace App\Models\PagoPack;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Factura extends Model
{
    protected $table = 'factura';
    protected $fillable = ['idNit','fecha'];
}
