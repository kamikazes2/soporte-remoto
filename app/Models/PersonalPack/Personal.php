<?php

namespace App\Models\PersonalPack;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $table = 'personal';
    protected $fillable = ['id', 'dni', 'nombre','apellido','fechaNacimiento'];
}
