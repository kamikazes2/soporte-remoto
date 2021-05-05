<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Solicitar Un Servicio</title>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
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
                        <input type="hidden" value="{{ $servicio->id }}" name="idServicio">
                        <input type="hidden" value="1" name="idCliente">
                        <input type="submit" value="Solicitar" class='btn btn-success agregar'>
                    </form>
                    
                </td>
            </tr> 
            @endforeach
        </tbody>
    </table>
</body>

<script src="{{ asset('js/ServicePack/solicitarServicio.js') }}" defer></script>

</html>

