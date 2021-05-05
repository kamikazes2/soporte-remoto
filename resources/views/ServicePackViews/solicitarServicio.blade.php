@extends('ServicePackViews.layout')

@section('content')

<h1 style="text-align: center">Lista de Servicios disponibles</h1>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($servicios as $servicio)
        <tr>
            <td>{{ $servicio->id }}</td>
            <td>{{ $servicio->nombre }}</td>
            <td>{{ $servicio->descripcion }}</td>
            <td>{{ $servicio->precio }}</td>
            <td>
                <form action="{{ url('/cliente/solicitud') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{ $servicio->id }}" name="idServicio[]">
                    <!--<input type="hidden" value="1" name="idServicio[]">-->
                    <input type="hidden" value="1" name="idCliente">
                    <input type="submit" value="Solicitar" class='btn btn-success agregar'>
                </form>
                
            </td>
        </tr> 
        @endforeach
    </tbody>
</table>

@endsection

