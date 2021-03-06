<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/request/nuevo-servicio*',
        '/request/nuevo-solicitud-servicio*',
        '/request/asignar-servicio*',
        '/request/nuevo-seguimiento*',
        '/request/finalizar-servicio*',
        '/request/actualizar-servicio*',
        '/request*'
        
    ];
}
