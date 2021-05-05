<?php

namespace App\Http\Controllers\ServicePack;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    public function index()
    {
        return view('ServicePackViews.solicitarServicio');
    }

    public function create()
    {
        //
    }
}
