@extends('ServicePackViews.layout')

@section('content')

<h1 style="text-align: center">Que desea realizar</h1>

    <ul>
    <li><a style="font-size: 30px" href='{{ url('cliente/solicitud') }}'>Solicitar un Servicio</a></li>
    </ul>


@endsection

